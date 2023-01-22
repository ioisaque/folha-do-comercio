<?php

class bt_bb_content_slider_item extends BT_BB_Element {
	
	public $auto_play = '';

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'image'      => '',
			'background_overlay'    => '',
			'image_size' => ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . $el_id . '"';
		}

		$style_attr = ' ' . 'style="' . $el_style;

		if ( $image != '' ) {
			$image_src = wp_get_attachment_image_src( $image, $image_size );
			$style_attr .= ';background-image:url(' . $image_src[0] . ')';
		}
		
		if ( $background_overlay != '' ) {
			$class[] = 'bt_bb_background_overlay' . '_' . $background_overlay;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$style_attr .= '"';

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '><div class="bt_bb_content_slider_item_content content">' . wptexturize( do_shortcode( $content ) ) . '</div></div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Slider Item', 'bold-builder' ), 'description' => esc_html__( 'Individual slide element', 'bold-builder' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_section' => false, 'bt_bb_row' => false, 'bt_bb_column' => false, 'bt_bb_column_inner' => false, 'bt_bb_tab_item' => false, 'bt_bb_accordion_item' => false, 'bt_bb_cost_calculator_item' => false, 'bt_cc_group' => false, 'bt_cc_multiply' => false, 'bt_cc_item' => false, 'bt_bb_content_slider_item' => false, 'bt_bb_google_maps_location' => false, '_content' => false ), 'accept_all' => true, 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'image', 'type' => 'attach_image', 'heading' => esc_html__( 'Background image', 'bold-builder' ), 'preview' => true ),
				array( 'param_name' => 'background_overlay', 'type' => 'dropdown', 'heading' => esc_html__( 'Background overlay', 'bold-builder' ), 
					'value' => array(
						__( 'No overlay', 'bold-builder' )    => '',
						__( 'Light stripes', 'bold-builder' ) => 'light_stripes',
						__( 'Dark stripes', 'bold-builder' )  => 'dark_stripes',
						__( 'Light solid', 'bold-builder' )	  => 'light_solid',
						__( 'Dark solid', 'bold-builder' )	  => 'dark_solid',
						__( 'Light gradient', 'bold-builder' )	  => 'light_gradient',
						__( 'Dark gradient', 'bold-builder' )	  => 'dark_gradient'
					)
				),
				array( 'param_name' => 'image_size', 'type' => 'dropdown', 'heading' => esc_html__( 'Background image size', 'bold-builder' ), 'preview' => true,
					'value' => bt_bb_get_image_sizes()
				)
			)
		) );
	}
}