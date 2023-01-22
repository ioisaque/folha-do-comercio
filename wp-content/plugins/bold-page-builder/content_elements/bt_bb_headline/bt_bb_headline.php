<?php

class bt_bb_headline extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'headline'      => '',
			'html_tag'      => '',
			'font'          => '',
			'font_subset'   => '',
			'size'     		=> '',
			'font_size'     => '',
			'font_weight'   => '',
			'color_scheme'  => '',
			'color'         => '',
			'dash'          => '',
			'align'         => '',
			'url'           => '',
			'target'        => '',
			'superheadline' => '',
			'subheadline'   => ''
		) ), $atts, $this->shortcode ) );

		$superheadline = html_entity_decode( $superheadline, ENT_QUOTES, 'UTF-8' );
		$subheadline = html_entity_decode( $subheadline, ENT_QUOTES, 'UTF-8' );
		$headline = html_entity_decode( $headline, ENT_QUOTES, 'UTF-8' );

		if ( $font != '' && $font != 'inherit' ) {
			require_once( dirname(__FILE__) . '/../../content_elements_misc/misc.php' );
			bt_bb_enqueue_google_font( $font, $font_subset );
		}

		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . $el_id . '"';
		}
		
		$html_tag_style = "";
		if ( $font != '' && $font != 'inherit' ) {
			$el_style = $el_style . ';' . 'font-family:\'' . urldecode( $font ) . '\'';
			$html_tag_style .= ';font-family:\'' . urldecode( $font ) . '\'';
		}
		if ( $font_size != '' ) {
			$html_tag_style .= ' ' . ';font-size:' . $font_size ;
		}
		if ( $html_tag_style != "" ) {
			$html_tag_style = " style=\"" . $html_tag_style . "\"";
		}
		
		if ( $font_weight != '' ) {
			$class[] = $this->prefix . 'font_weight_' . $font_weight ;
		}
		
		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		if ( $color != '' ) {
			$el_style = $el_style . ';' . 'color:' . $color . ';border-color:' . $color . ';';
		}

		if ( $dash != '' ) {
			$class[] = $this->prefix . 'dash' . '_' . $dash;
		}
		
		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}
		
		if ( $target == '' ) {
			$target = '_self';
		}

		if ( $superheadline != '' ) {
			$class[] = $this->prefix . 'superheadline';
			$superheadline = '<span class="' . $this->shortcode . '_superheadline">' . $superheadline . '</span>';
		}
		
		if ( $subheadline != '' ) {
			$class[] = $this->prefix . 'subheadline';
			$subheadline = '<div class="' . $this->shortcode . '_subheadline">' . $subheadline . '</div>';
			$subheadline = nl2br( $subheadline );
		}
		

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . $el_style . '"';
		}

		if ( $align != '' ) {
			$class[] = $this->prefix . 'align' . '_' . $align;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		if ( $headline != '' ) {
			if ( $url != '' ) {
				$url_title = strip_tags( str_replace( array("\n", "\r"), ' ', $headline ) );
				$headline = '<a href="' . $url . '" target="' . $target . '" title="' . $url_title  . '">' . $headline . '</a>';
			}		
			$headline = '<span class="' . $this->shortcode . '_content"><span>' . $headline . '</span></span>';			
		}
		
		$headline = nl2br( $headline );

		$output = '<header' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>';
		if ( $headline != '' || $superheadline != '' ) $output .= '<' . $html_tag . $html_tag_style . '>' . $superheadline . $headline . '</' . $html_tag . '>';
		$output .= $subheadline . '</header>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		require_once( dirname(__FILE__) . '/../../content_elements_misc/fonts.php' );
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();	

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Headline', 'bold-builder' ), 'description' => esc_html__( 'Headline with custom Google fonts', 'bold-builder' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'highlight' => true,
			'params' => array(
				array( 'param_name' => 'superheadline', 'type' => 'textfield', 'heading' => esc_html__( 'Superheadline', 'bold-builder' ) ),
				array( 'param_name' => 'headline', 'type' => 'textarea', 'heading' => esc_html__( 'Headline', 'bold-builder' ), 'preview' => true, 'preview_strong' => true ),
				array( 'param_name' => 'subheadline', 'type' => 'textarea', 'heading' => esc_html__( 'Subheadline', 'bold-builder' ) ),
				array( 'param_name' => 'html_tag', 'type' => 'dropdown', 'heading' => esc_html__( 'HTML tag', 'bold-builder' ), 'preview' => true,
					'value' => array(
						__( 'h1', 'bold-builder' ) => 'h1',
						__( 'h2', 'bold-builder' ) => 'h2',
						__( 'h3', 'bold-builder' ) => 'h3',
						__( 'h4', 'bold-builder' ) => 'h4',
						__( 'h5', 'bold-builder' ) => 'h5',
						__( 'h6', 'bold-builder' ) => 'h6'
				) ),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'bold-builder' ), 'description' => 'Predefined heading sizes, independent of html tag',
					'value' => array(
						__( 'Inherit', 'bold-builder' ) => 'inherit',
						__( 'Extra Small', 'bold-builder' ) => 'extrasmall',
						__( 'Small', 'bold-builder' ) => 'small',
						__( 'Medium', 'bold-builder' ) => 'medium',
						__( 'Normal', 'bold-builder' ) => 'normal',
						__( 'Large', 'bold-builder' ) => 'large',
						__( 'Extra large', 'bold-builder' ) => 'extralarge',
						__( 'Huge', 'bold-builder' ) => 'huge'
					)
				),				
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Alignment', 'bold-builder' ),
					'value' => array(
						__( 'Inherit', 'bold-builder' ) => 'inherit',
						__( 'Center', 'bold-builder' ) => 'center',
						__( 'Left', 'bold-builder' ) => 'left',
						__( 'Right', 'bold-builder' ) => 'right'
					)
				),
				array( 'param_name' => 'dash', 'type' => 'dropdown', 'heading' => esc_html__( 'Dash', 'bold-builder' ), 'group' => esc_html__( 'Design', 'bold-builder' ),
					'value' => array(
						__( 'None', 'bold-builder' ) => 'none',
						__( 'Top', 'bold-builder' ) => 'top',
						__( 'Bottom', 'bold-builder' ) => 'bottom',
						__( 'Top and bottom', 'bold-builder' ) => 'top_bottom'
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'bold-builder' ), 'group' => esc_html__( 'Design', 'bold-builder' ), 'value' => $color_scheme_arr, 'preview' => true ),
				array( 'param_name' => 'color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Color', 'bold-builder' ), 'group' => esc_html__( 'Design', 'bold-builder' ), 'preview' => true ),
				array( 'param_name' => 'font', 'type' => 'dropdown', 'heading' => esc_html__( 'Font', 'bold-builder' ), 'group' => esc_html__( 'Font', 'bold-builder' ), 'preview' => true,
					'value' => array( esc_html__( 'Inherit', 'bold-builder' ) => 'inherit' ) + $font_arr
				),
				array( 'param_name' => 'font_subset', 'type' => 'textfield', 'heading' => esc_html__( 'Font subset', 'bold-builder' ), 'group' => esc_html__( 'Font', 'bold-builder' ), 'value' => 'latin,latin-ext', 'description' => 'E.g. latin,latin-ext,cyrillic,cyrillic-ext' ),
				array( 'param_name' => 'font_size', 'type' => 'textfield', 'heading' => esc_html__( 'Custom font size', 'bold-builder' ), 'group' => esc_html__( 'Font', 'bold-builder' ), 'description' => 'E.g. 20px or 1.5rem' ),
				array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'bold-builder' ), 'group' => esc_html__( 'Font', 'bold-builder' ),
					'value' => array(
						__( 'Default', 'bold-builder' ) => '',
						__( 'Normal', 'bold-builder' ) => 'normal',
						__( 'Bold', 'bold-builder' ) => 'bold',
						__( 'Bolder', 'bold-builder' ) => 'bolder',
						__( 'Lighter', 'bold-builder' ) => 'lighter',
						__( 'Light', 'bold-builder' ) => 'light',
						__( 'Thin', 'bold-builder' ) => 'thin'
					)
				),
				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'bold-builder' ), 'group' => esc_html__( 'URL', 'bold-builder' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'bold-builder' ), 'group' => esc_html__( 'URL', 'bold-builder' ),
					'value' => array(
						__( 'Self (open in same tab)', 'bold-builder' ) => '_self',
						__( 'Blank (open in new tab)', 'bold-builder' ) => '_blank'
					)
				)
			)
		) );
	}
}