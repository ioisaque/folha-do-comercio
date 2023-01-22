<?php

class bt_bb_google_maps extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'api_key'      => '',
			'zoom'         => '',
			'height'       => '',
			'custom_style' => '',
			'center_map'   => ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		if ( $center_map == 'yes_no_overlay' ) {
			$class[] = $this->shortcode . '_no_overlay';
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . $el_id . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . $el_style . '"';
		}

		if ( $api_key != '' ) {
			wp_enqueue_script( 
				'gmaps_api',
				'https://maps.googleapis.com/maps/api/js?key=' . $api_key
			);
		} else {
			wp_enqueue_script( 
				'gmaps_api',
				'https://maps.googleapis.com/maps/api/js?v=&sensor=false'
			);
		}
		
		if ( $zoom == '' ) {
			$zoom = 14;
		}

		$style_height = '';
		if ( $height != '' ) {
			$style_height = ' ' . 'style="height:' . $height . '"';
		}
		
		$map_id = uniqid( 'map_canvas' );

		$content_html = wptexturize( do_shortcode( $content ) );

		$locations = substr_count( $content_html, '"bt_bb_google_maps_location' );
		$locations_without_content = substr_count( $content_html, 'bt_bb_google_maps_location_without_content' );
	
		if ( $content != '' && $locations != $locations_without_content ) {
			$content = '<span class="' . $this->shortcode . '_content_toggler"></span><div class="' . $this->shortcode . '_content"><div class="' . $this->shortcode . '_content_wrapper">' . $content_html . '</div></div>';

			$class[] = $this->shortcode . '_with_content';
		} else {
			$content = $content_html;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$output = '<div class="' . $this->shortcode . '_map" id="' . $map_id . '"' . $style_height . '></div>';

		$output .= $content;

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . ' data-center="' . $center_map . '">' . $output . '</div>';

		$output .= '<script type="text/javascript">';
			$output .= 'var bt_bb_google_map_' . $map_id . '_init_finished = false; ';
			$output .= 'document.addEventListener("readystatechange", function() { ';
				$output .= 'if ( !bt_bb_google_map_' . $map_id . '_init_finished && ( document.readyState === "interactive" || document.readyState === "complete" ) ) { ';
					$output .= 'if ( typeof( bt_bb_gmap_init ) !== typeof(Function) ) { return false; }';
					$output .= 'bt_bb_gmap_init( "' . $map_id . '", ' . $zoom . ', "' . $custom_style . '" );';
					$output .= 'bt_bb_google_map_' . $map_id . '_init_finished = true; ';
				$output .= '};';
			$output .= '}, false);';
		$output .= '</script>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Google Maps', 'bold-builder' ), 'description' => esc_html__( 'Google Maps with custom content', 'bold-builder' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_google_maps_location' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'api_key', 'type' => 'textfield', 'heading' => esc_html__( 'API key', 'bold-builder' ) ),
				array( 'param_name' => 'zoom', 'type' => 'textfield', 'heading' => esc_html__( 'Zoom (e.g. 14)', 'bold-builder' ) ),
				array( 'param_name' => 'height', 'type' => 'textfield', 'heading' => esc_html__( 'Height (e.g. 250px)', 'bold-builder' ), 'description' => esc_html__( 'Used when there is no content', 'bold-builder' ) ),
				array( 'param_name' => 'custom_style', 'type' => 'textarea_object', 'heading' => esc_html__( 'Custom map style array', 'bold-builder' ), 'description' => esc_html__( 'Find more custom styles at https://snazzymaps.com/', 'bold-builder' ) ),
				array( 'param_name' => 'center_map', 'type' => 'dropdown', 'heading' => esc_html__( 'Center map', 'bold-builder' ),
					'value' => array(
						__( 'No', 'bold-builder' ) => 'no',
						__( 'Yes', 'bold-builder' ) => 'yes',
						__( 'Yes (without overlay initially)', 'bold-builder' ) => 'yes_no_overlay'
					)
				),
			)
		) );
	}
}