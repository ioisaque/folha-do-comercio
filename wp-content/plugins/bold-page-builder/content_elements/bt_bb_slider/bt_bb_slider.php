<?php

class bt_bb_slider extends BT_BB_Element {
	
	public $auto_play = '';

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'images'    			=> '',
			'height'    			=> '',
			'show_dots'     		=> '',
			'animation' 			=> '',
			'slides_to_show' 		=> '',
			'auto_play' 			=> ''
		) ), $atts, $this->shortcode ) );
		
		$slider_class = array( 'slick-slider' );
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . $el_id . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . $el_style . '"';
		}
		
	
		if ( $height != '' ) {
			$class[] = $this->prefix . 'height' . '_' . $height;
		}	
		
		$data_slick = ' ' . 'data-slick=\'{ "lazyLoad": "progressive", "cssEase": "ease-out", "speed": "300", "prevArrow": "&lt;button type=\"button\" class=\"slick-prev\"&gt;", "nextArrow": "&lt;button type=\"button\" class=\"slick-next\"&gt;"';
		
		if ( $animation == 'fade' ) {
			$data_slick .= ', "fade": true';
			$slider_class[] = 'fade';
			$slides_to_show = 1;
		}
		
		if ( $height != 'keep-height' ) {
			$data_slick .= ', "adaptiveHeight": true';
		}
		
		if ( $show_dots != 'hide' ) {
			$data_slick .= ', "dots": true' ;
		}
		
		if ( $slides_to_show > 1 ) {
			$data_slick .= ',"slidesToShow": ' . intval( $slides_to_show );
			$class[] = $this->prefix . 'multiple_slides';
		}
		
		if ( $auto_play != '' ) {
			$data_slick .= ',"autoplay": true, "autoplaySpeed": ' . intval( $auto_play );
		}
		
		if ( is_rtl() ) {
			$data_slick .= ', "rtl": true' ;
		}
		
		if ( $slides_to_show > 1 ) {
			$data_slick .= ', "responsive": [';
			if ( $slides_to_show > 1 ) {
				$data_slick .= '{ "breakpoint": 480, "settings": { "slidesToShow": 1, "slidesToScroll": 1 } }';	
			}
			if ( $slides_to_show > 2 ) {
				$data_slick .= ',{ "breakpoint": 768, "settings": { "slidesToShow": 2, "slidesToScroll": 2 } }';	
			}
			if ( $slides_to_show > 3 ) {
				$data_slick .= ',{ "breakpoint": 920, "settings": { "slidesToShow": 3, "slidesToScroll": 3 } }';	
			}
			if ( $slides_to_show > 4 ) {
				$data_slick .= ',{ "breakpoint": 1024, "settings": { "slidesToShow": 3, "slidesToScroll": 3 } }';	
			}				
			$data_slick .= ']';
		}
		
		$data_slick = $data_slick . '}\' ';
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		$output = '';

		if ( $images != '' ) {
			$image_array = explode( ',', $images );
			foreach( $image_array as $image ) {
				$caption = "";
				if ( is_numeric($image) ) {
					$post_image = get_post( $image );
					$caption = get_post( $image )->post_excerpt;
					$image = wp_get_attachment_image_src( $image, 'full' );
					$image = $image[0];	
				}
				if ( $height == 'auto' || $height == 'keep-height' ) {
					$output .= '<div class="bt_bb_slider_item"><img src="' . $image . '" alt="' . $caption . '"></div>';
				} else {
					$output .= '<div class="bt_bb_slider_item" style="background-image:url(\'' . $image . '\')"></div>';
				}
				
			}
		}

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '><div class="' . implode( ' ', $slider_class ) . '" ' . $data_slick . '>' . $output . '</div></div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Image Slider', 'bold-builder' ), 'description' => esc_html__( 'Slider with images', 'bold-builder' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'images', 'type' => 'attach_images', 'heading' => esc_html__( 'Images', 'bold-builder' ) ),
				array( 'param_name' => 'height', 'type' => 'dropdown', 'heading' => esc_html__( 'Height', 'bold-builder' ),
					'value' => array(
						__( 'Auto', 'bold-builder' ) => 'auto',
						__( 'Keep height', 'bold-builder' ) => 'keep-height',
						__( 'Half screen', 'bold-builder' ) => 'half_screen',
						__( 'Full screen', 'bold-builder' ) => 'full_screen'
					)
				),
				array( 'param_name' => 'animation', 'type' => 'dropdown', 'heading' => esc_html__( 'Animation', 'bold-builder' ), 'description' => esc_html__( 'If fade is selected, number of slides to show will be 1', 'bold-builder' ),
					'value' => array(
						__( 'Default', 'bold-builder' ) => 'slide',
						__( 'Fade', 'bold-builder' ) => 'fade'
					)
				),
				array( 'param_name' => 'show_dots', 'type' => 'dropdown', 'heading' => esc_html__( 'Dots navigation', 'bold-builder' ),
					'value' => array(
						__( 'Bottom', 'bold-builder' ) => 'bottom',
						__( 'Hide', 'bold-builder' ) => 'hide'
					)
				),
				array( 'param_name' => 'slides_to_show', 'type' => 'textfield', 'preview' => true, 'default' => 1, 'heading' => esc_html__( 'Number of slides to show', 'bold-builder' ), 'description' => esc_html__( 'e.g. 3', 'bold-builder' ) ),
				array( 'param_name' => 'auto_play', 'type' => 'textfield', 'heading' => esc_html__( 'Autoplay interval (ms)', 'bold-builder' ), 'description' => esc_html__( 'e.g. 2000', 'bold-builder' ) )
			)
		) );
	}
}