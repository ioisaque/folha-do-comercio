<?php

class bt_bb_section extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {

		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'layout'                => '',
			'full_screen'           => '',
			'vertical_align'        => '',
			'top_spacing'           => '',
			'bottom_spacing'        => '',
			'color_scheme'          => '',
			'background_color'      => '',
			'background_image'      => '',
			'background_overlay'    => '',
			'background_video_yt'   => '',
			'yt_video_settings'     => '',
			'background_video_mp4'  => '',
			'background_video_ogg'  => '',
			'background_video_webm' => '',
			'parallax'              => '',
			'parallax_offset'       => ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

		wp_enqueue_script(
			'bt_bb_googlemaps-scrollprevent',
			plugin_dir_url( __FILE__ ) . 'googlemaps-scrollprevent.min.js',
			array( 'jquery' ),
			'',
			true
		);

		wp_enqueue_script(
			'bt_bb_elements',
			plugin_dir_url( __FILE__ ) . 'bt_bb_elements.js',
			array( 'jquery' ),
			'',
			true
		);

		if ( $top_spacing != '' ) {
			$class[] = $this->prefix . 'top_spacing' . '_' . $top_spacing;
		}

		if ( $bottom_spacing != '' ) {
			$class[] = $this->prefix . 'bottom_spacing' . '_' . $bottom_spacing;
		}

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}
		
		if ( $background_color != '' ) {
			$el_style = $el_style . ';' . 'background-color:' . $background_color . ';';
		}

		if ( $layout != '' ) {
			$class[] = $this->prefix . 'layout' . '_' . $layout;
		}

		if ( $full_screen == 'yes' ) {
			$class[] = $this->prefix . 'full_screen';
		}

		if ( $vertical_align != '' ) {
			$class[] = $this->prefix . 'vertical_align' . '_' . $vertical_align;
		}

		$data_parallax_attr = '';
		if ( $parallax != '' && ! wp_is_mobile() ) {
			$data_parallax_attr = 'data-parallax="' . $parallax . '" data-parallax-offset="' . intval( $parallax_offset ) . '"';
			$class[] = $this->prefix . 'parallax';
		}

		if ( $background_image != '' ) {
			$background_image = wp_get_attachment_image_src( $background_image, 'full' );
			$background_image_url = $background_image[0];
			$background_image_style = 'background-image:url(\'' . $background_image_url . '\');';
			$el_style = $background_image_style . $el_style;	
			$class[] = $this->prefix . 'background_image';
		}

		if ( $background_overlay != '' ) {
			$class[] = $this->prefix . 'background_overlay' . '_' . $background_overlay;
		}

		$id_attr = '';
		if ( $el_id == '' ) {
			$el_id = uniqid( 'bt_bb_section' );
		}
		$id_attr = 'id="' . $el_id . '"';

		$background_video_attr = '';

		$video_html = '';

		if ( $background_video_yt != '' && ! wp_is_mobile() ) {
			wp_enqueue_style( 'bt_bb_style_yt', plugin_dir_url( __FILE__ ) . 'YTPlayer.css' );
			wp_enqueue_script( 
				'bt_bb_yt',
				plugin_dir_url( __FILE__ ) . 'jquery.mb.YTPlayer.min.js',
				array( 'jquery' ),
				'',
				true
			);

			$class[] = $this->prefix . 'background_video_yt';

			if ( $yt_video_settings == '' ) {
				$yt_video_settings = 'showControls:false,showYTLogo:false,mute:true,stopMovieOnBlur:false,opacity:1';
			}

			$background_video_attr = ' ' . 'data-property="{videoURL:\'' . $background_video_yt . '\',containment:\'self\',' . $yt_video_settings . '}"';
			$proxy = new BT_BB_YT_Video_Proxy( $this->prefix );
			add_action( 'wp_footer', array( $proxy, 'js_init' ) );

		} else if ( ( $background_video_mp4 != '' || $background_video_ogg != '' || $background_video_webm != '' ) && ! wp_is_mobile() ) {
			$class[] = $this->prefix . 'video';
			$video_html = '<video autoplay loop muted onplay="bt_bb_video_callback( this )">';
			if ( $background_video_mp4 != '' ) {
				$video_html .= '<source src="' . $background_video_mp4 . '" type="video/mp4">';
			}
			if ( $background_video_ogg != '' ) {
				$video_html .= '<source src="' . $background_video_ogg . '" type="video/ogg">';
			}
			if ( $background_video_webm != '' ) {
				$video_html .= '<source src="' . $background_video_webm . '" type="video/webm">';
			}
			$video_html .= '</video>';
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		$class_attr = implode( ' ', $class );

		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = 'style="' . $el_style . '"';
		}

		$output = '<section ' . $id_attr . ' ' . $data_parallax_attr . ' class="' . $class_attr . '" ' . $style_attr . $background_video_attr . '>';
		$output .= $video_html;
			$output .= '<div class="' . $this->prefix . 'port">';
				$output .= '<div class="' . $this->prefix . 'cell">';
					$output .= '<div class="' . $this->prefix . 'cell_inner">';
					$output .= wptexturize( do_shortcode( $content ) );
					$output .= '</div>';
				$output .= '</div>';
		$output .= '</div>';

		$output .= '</section>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {
		
		require_once( dirname(__FILE__) . '/../../content_elements_misc/misc.php' );
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Section', 'bold-builder' ), 'description' => esc_html__( 'Basic root element', 'bold-builder' ), 'root' => true, 'container' => 'vertical', 'accept' => array( 'bt_bb_row' => true ), 'toggle' => true, 'auto_add' => 'bt_bb_row', 'show_settings_on_create' => false,
			'params' => array( 
				array( 'param_name' => 'layout', 'type' => 'dropdown', 'default' => 'boxed_1200', 'heading' => esc_html__( 'Layout', 'bold-builder' ), 'group' => esc_html__( 'General', 'bold-builder' ), 'weight' => 0, 'preview' => true,
					'value' => array(
						__( 'Boxed (800px)', 'bold-builder' ) => 'boxed_800',
						__( 'Boxed (900px)', 'bold-builder' ) => 'boxed_900',
						__( 'Boxed (1000px)', 'bold-builder' ) => 'boxed_1000',
						__( 'Boxed (1100px)', 'bold-builder' ) => 'boxed_1100',
						__( 'Boxed (1200px)', 'bold-builder' ) => 'boxed_1200',
						__( 'Boxed (1300px)', 'bold-builder' ) => 'boxed_1300',
						__( 'Boxed (1400px)', 'bold-builder' ) => 'boxed_1400',
						__( 'Boxed (1500px)', 'bold-builder' ) => 'boxed_1500',
						__( 'Boxed (1600px)', 'bold-builder' ) => 'boxed_1600',
						__( 'Wide', 'bold-builder' ) => 'wide'
					)
				),
				array( 'param_name' => 'top_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Top spacing', 'bold-builder' ), 'preview' => true,
					'value' => array(
						__( 'No spacing', 'bold-builder' ) => '',
						__( 'Extra small', 'bold-builder' ) => 'extra_small',
						__( 'Small', 'bold-builder' ) => 'small',		
						__( 'Normal', 'bold-builder' ) => 'normal',
						__( 'Medium', 'bold-builder' ) => 'medium',
						__( 'Large', 'bold-builder' ) => 'large',
						__( 'Extra large', 'bold-builder' ) => 'extra_large'
					)
				),
				array( 'param_name' => 'bottom_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Bottom spacing', 'bold-builder' ), 'preview' => true,
					'value' => array(
						__( 'No spacing', 'bold-builder' ) => '',
						__( 'Extra small', 'bold-builder' ) => 'extra_small',
						__( 'Small', 'bold-builder' ) => 'small',		
						__( 'Normal', 'bold-builder' ) => 'normal',
						__( 'Medium', 'bold-builder' ) => 'medium',
						__( 'Large', 'bold-builder' ) => 'large',
						__( 'Extra large', 'bold-builder' ) => 'extra_large'
					)
				),
				array( 'param_name' => 'full_screen', 'type' => 'dropdown', 'heading' => esc_html__( 'Full screen', 'bold-builder' ), 
					'value' => array(
						__( 'No', 'bold-builder' ) => '',
						__( 'Yes', 'bold-builder' ) => 'yes'
					)
				),
				array( 'param_name' => 'vertical_align', 'type' => 'dropdown', 'heading' => esc_html__( 'Vertical align (for fullscreen section)', 'bold-builder' ), 'preview' => true,
					'value' => array(
						__( 'Top', 'bold-builder' )     => 'top',
						__( 'Middle', 'bold-builder' )  => 'middle',
						__( 'Bottom', 'bold-builder' )  => 'bottom'					
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'bold-builder' ), 'value' => $color_scheme_arr, 'preview' => true, 'group' => esc_html__( 'Design', 'bold-builder' )  ),
				array( 'param_name' => 'background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Background color', 'bold-builder' ), 'group' => esc_html__( 'Design', 'bold-builder' ), 'preview' => true ),
				array( 'param_name' => 'background_image', 'type' => 'attach_image',  'preview' => true, 'heading' => esc_html__( 'Background image', 'bold-builder' ), 'group' => esc_html__( 'Design', 'bold-builder' ) ),
				array( 'param_name' => 'background_overlay', 'type' => 'dropdown', 'heading' => esc_html__( 'Background overlay', 'bold-builder' ), 'group' => esc_html__( 'Design', 'bold-builder' ), 
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
				array( 'param_name' => 'parallax', 'type' => 'textfield', 'heading' => esc_html__( 'Parallax (e.g. -.7)', 'bold-builder' ), 'group' => esc_html__( 'Design', 'bold-builder' ) ),
				array( 'param_name' => 'parallax_offset', 'type' => 'textfield', 'heading' => esc_html__( 'Parallax offset in px (e.g. -100)', 'bold-builder' ), 'group' => esc_html__( 'Design', 'bold-builder' ) ),
				array( 'param_name' => 'background_video_yt', 'type' => 'textfield', 'heading' => esc_html__( 'YouTube background video', 'bold-builder' ), 'group' => esc_html__( 'Video', 'bold-builder' ) ),
				array( 'param_name' => 'yt_video_settings', 'type' => 'textfield', 'heading' => esc_html__( 'Video settings (e.g. startAt:20, mute:true, stopMovieOnBlur:false)', 'bold-builder' ), 'group' => esc_html__( 'Video', 'bold-builder' ) ),
				array( 'param_name' => 'background_video_mp4', 'type' => 'textfield', 'heading' => esc_html__( 'MP4 background video', 'bold-builder' ), 'group' => esc_html__( 'Video', 'bold-builder' ) ),
				array( 'param_name' => 'background_video_ogg', 'type' => 'textfield', 'heading' => esc_html__( 'OGG background video', 'bold-builder' ), 'group' => esc_html__( 'Video', 'bold-builder' ) ),
				array( 'param_name' => 'background_video_webm', 'type' => 'textfield', 'heading' => esc_html__( 'WEBM background video', 'bold-builder' ), 'group' => esc_html__( 'Video', 'bold-builder' ) )
			)
		) );		

	} 

}

class BT_BB_YT_Video_Proxy {
	function __construct( $prefix ) {
		$this->prefix = $prefix;
	}
	public function js_init() { ?>
		<script>
			jQuery(function() {
				jQuery( '.<?php echo $this->prefix; ?>background_video_yt' ).YTPlayer();
			});
		</script>
	<?php }
}