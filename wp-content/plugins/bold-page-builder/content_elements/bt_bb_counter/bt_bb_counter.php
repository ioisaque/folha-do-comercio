<?php

class bt_bb_counter extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'number'   => '',
			'size'     => ''
		) ), $atts, $this->shortcode ) );
		
		$class = array(); //array( $this->shortcode );
		
		$class[] = 'bt_bb_counter_holder';

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . $el_id . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . $el_style . '"';
		}

		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		$class_attr = implode( ' ', $class );
		
		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}

		$output = '';
		$output .= '<div' . $id_attr . ' class="' . $class_attr . '"' . $style_attr . '>';
			$output .= '<span class="bt_bb_counter animate" data-digit-length="' . strlen( $number ) . '">';			
				for ( $i = 0; $i < strlen( $number ); $i++ ) {
					
					$output .= '<span class="onedigit p' . ( strlen( $number ) - $i ) . ' d' . $number[ $i ] . '" data-digit="' . $number[ $i ] . '">';
					
						if ( ctype_digit( $number[ $i ] ) ) {
							for ( $j = 0; $j <= 9; $j++ ) {
								$output .= '<span class="n' . $j . '">' . $j . '</span>';
							}
							$output .= '<span class="n0">0</span>';				
						} else {
							$output .= '<span class="t">' . $number[ $i ] . '</span>';	
						}
					
					$output .= '</span>';
				}			
			$output .= '</span>';
		$output .= '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
			
		return $output;
	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Counter', 'bold-builder' ), 'description' => esc_html__( 'Animated counter', 'bold-builder' ),  
			'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'number', 'type' => 'textfield', 'heading' => esc_html__( 'Number', 'bold-builder' ), 'preview' => true ),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'bold-builder' ), 'preview' => true,
					'value' => array(
						__( 'Small', 'bold-builder' ) => 'small',
						__( 'Extra small', 'bold-builder' ) => 'xsmall',
						__( 'Normal', 'bold-builder' ) => 'normal',
						__( 'Large', 'bold-builder' ) => 'large',
						__( 'Extra large', 'bold-builder' ) => 'xlarge'		
				) )
			)
		) );

	}
}