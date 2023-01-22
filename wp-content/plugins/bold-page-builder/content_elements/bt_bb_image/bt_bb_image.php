<?php

class bt_bb_image extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'image'  							=> '',
			'size'   							=> '',
			'shape'  							=> '',
			'image_height'  					=> '',
			'align'  							=> '',
			'caption'    						=> '',
			'url'    							=> '',
			'target' 							=> '',
			'hover_style'  						=> '',
			'content_display'  					=> '',
			'content_background_color' 			=> '',
			'content_background_opacity'	    => '',
			'content_align'						=> ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		if ( $hover_style == 'scroll' ) {
			$el_id = 'bt_bb_random_id_' . rand();
		}

		$style_attr = '';
		
		if ( $image_height != '' ) {
			$el_style .= 'height:' . $image_height . '; overflow: hidden;';
		}
		
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . $el_style . '"';
		}	
		
		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . $el_id . '"';
		}

		
		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}
		
		if ( $align != '' ) {
			$class[] = $this->prefix . 'align' . '_' . $align;
		}
		
		if ( $hover_style != '' ) {
			$class[] = $this->prefix . 'hover_style' . '_' . $hover_style;
		}
		
		if ( $content_display != '' ) {
			$class[] = $this->prefix . 'content_display' . '_' . $content_display;
		}

		if ( $content_align != '' ) {
			$class[] = $this->prefix . 'content_align' . '_' . $content_align;
		}
		
		if ( $caption != '' ) {
			$title = ' title="' . $caption . '"';
		} else {
			$title = '';
		}
		$alt = $caption;
			
		if ( $image != '' && is_numeric( $image ) ) {
			$post_image = get_post( $image );
			if ( $post_image == '' ) return;
		
			$image = wp_get_attachment_image_src( $image, $size );
			if ( $alt == '' ) {
				$alt = $post_image->post_excerpt;
			}
			$image = $image[0];
			if ( $alt == '' ) {
				$alt = $image;
			}
		}
		
		$content = do_shortcode( $content );
		
		if ( $content != '' ) {
			$class[] = $this->prefix . 'content_exists';
		}
		
		$output = '';
		
		if ( ! empty( $image ) ) {
			$output .= '<img src="' . $image . '"' . $title . ' alt="' . $alt . '">';
		}
		
		if ( ! empty( $url ) ) {
			$output = '<a href="' . $url . '"  target="' . $target . '"' . $title . '>' . $output . '</a>';
		} else {
			$output = '<span>' . $output . '</span>';
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $output ;
		if ( $content != "") {
			$content_background_style = '';
			if ( $content_background_color != '' ) {
				$content_background_color = bt_bb_image::hex2rgb( $content_background_color );
				if ( $content_background_opacity == '' ) {
					$content_background_opacity = 1;
				}
				$content_background_style .= ' style="background-color: rgba(' . $content_background_color[0] . ', ' . $content_background_color[1] . ', ' . $content_background_color[2] . ', ' . $content_background_opacity . ');"';
			}
			$output .= '<div class="bt_bb_image_content"' . $content_background_style . '><div class="bt_bb_image_content_flex"><div class="bt_bb_image_content_inner">' . $content . '</div></div></div>';
		}
		$output .= '</div>';
		
		if ( $hover_style == 'scroll' && $image_height != '' ) {
			$output .= '<style>#' . $el_id . ':hover img { transform:translateY( calc(-100% + ' . $image_height . ') ); }</style>';	
		}
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Image', 'bold-builder' ), 'description' => esc_html__( 'Single image', 'bold-builder' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_button' => true, 'bt_bb_icon' => true, 'bt_bb_text' => true, 'bt_bb_headline' => true, 'bt_bb_separator' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'image', 'type' => 'attach_image', 'heading' => esc_html__( 'Image', 'bold-builder' ), 'preview' => true ),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'bold-builder' ), 'preview' => true,
					'value' => bt_bb_get_image_sizes()
				),
				array( 'param_name' => 'image_height', 'type' => 'textfield', 'heading' => esc_html__( 'Image height', 'bold-builder' )),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'bold-builder' ),
					'value' => array(
						__( 'Square', 'bold-builder' ) => 'square',
						__( 'Soft Rounded', 'bold-builder' ) => 'soft-rounded',
						__( 'Hard Rounded', 'bold-builder' ) => 'hard-rounded'
					)
				),
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Alignment', 'bold-builder' ),
					'value' => array(
						__( 'Inherit', 'bold-builder' ) => 'inherit',
						__( 'Left', 'bold-builder' ) => 'left',
						__( 'Right', 'bold-builder' ) => 'right'
					)
				),
				array( 'param_name' => 'caption', 'type' => 'textfield', 'heading' => esc_html__( 'Caption', 'bold-builder' ) ),
				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'bold-builder' ), 'group' => esc_html__( 'URL', 'bold-builder' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'bold-builder' ), 'group' => esc_html__( 'URL', 'bold-builder' ),
					'value' => array(
						__( 'Self (open in same tab)', 'bold-builder' ) => '_self',
						__( 'Blank (open in new tab)', 'bold-builder' ) => '_blank'
					)
				),
				array( 'param_name' => 'hover_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Mouse hover style', 'bold-builder' ), 'group' => esc_html__( 'URL', 'bold-builder' ),
					'value' => array(
						__( 'Simple', 'bold-builder' ) => 'simple',
						__( 'Flip', 'bold-builder' ) => 'flip',
						__( 'Zoom in', 'bold-builder' ) => 'zoom-in',
						__( 'To grayscale', 'bold-builder' ) => 'to-grayscale',
						__( 'From grayscale', 'bold-builder' ) => 'from-grayscale',
						__( 'Zoom in to grayscale', 'bold-builder' ) => 'zoom-in-to-grayscale',
						__( 'Zoom in from grayscale', 'bold-builder' ) => 'zoom-in-from-grayscale',
						__( 'Scroll', 'bold-builder' ) => 'scroll'
					)
				),
				array( 'param_name' => 'content_display', 'type' => 'dropdown', 'heading' => esc_html__( 'Show content', 'bold-builder' ), 'description' => esc_html__( 'Add selected elements and show them over the image', 'bold-builder' ), 'group' => esc_html__( 'Content', 'bold-builder' ),
					'value' => array(
						__( 'Always', 'bold-builder' ) => 'always',
						__( 'Show on hover', 'bold-builder' ) => 'show-on-hover',
						__( 'Hide on hover', 'bold-builder' ) => 'hide-on-hover'
					)
				),
				array( 'param_name' => 'content_background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Content background color', 'bold-builder' ), 'group' => esc_html__( 'Content', 'bold-builder' ) ),
				array( 'param_name' => 'content_background_opacity', 'type' => 'textfield', 'heading' => esc_html__( 'Content background opacity (e.g. 0.4)', 'bold-builder' ), 'group' => esc_html__( 'Content', 'bold-builder' ) ),
				array( 'param_name' => 'content_align', 'type' => 'dropdown', 'heading' => esc_html__( 'Content Alignment', 'bold-builder' ), 'group' => esc_html__( 'Content', 'bold-builder' ),
					'value' => array(
						__( 'Middle', 'bold-builder' ) => 'middle',
						__( 'Top', 'bold-builder' ) => 'top',						
						__( 'Bottom', 'bold-builder' ) => 'bottom'
					)
				)
			)
		) );
	}
	static function hex2rgb( $hex ) {
		$hex = str_replace( '#', '', $hex );
		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = array( $r, $g, $b );
		return $rgb;
	}
}