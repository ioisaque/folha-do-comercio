<?php

// Register action/filter callbacks

add_action( 'after_setup_theme', 'bold_news_register_menus' );
add_action( 'wp_enqueue_scripts', 'bold_news_enqueue_scripts_styles' );
add_action( 'tgmpa_register', 'bold_news_register_plugins' );
add_action( 'wp_enqueue_scripts', 'bold_news_load_fonts' );
add_action( 'wp_enqueue_scripts', 'bold_news_cat_col' );
add_action( 'wp_enqueue_scripts', 'bold_news_cat_col_shop' );

add_filter( 'boldthemes_extra_class', 'bold_news_extra_class' );
add_filter( 'visualizer-chart-wrapper-class', 'bold_news_charts_class', 10, 2 );
add_filter( 'boldthemes_product_headline_size', 'bold_news_product_headline_size' );
add_filter( 'walker_nav_menu_start_el', 'bold_news_nav_menu_start_el', 10, 4 );
add_filter( 'wp_list_categories', 'bold_news_cat_count_span' );



add_theme_support( 'customize-selective-refresh-widgets' );

// callbacks

/**
 * Register navigation menus
 */
if ( ! function_exists( 'bold_news_register_menus' ) ) {
	function bold_news_register_menus() {
		register_nav_menus( array (
			'primary' => esc_html__( 'Primary Menu', 'bold-news' ),
			'footer'  => esc_html__( 'Footer Menu', 'bold-news' )
		));
	}
}

/**
 * Enqueue scripts and styles
 */
if ( ! function_exists( 'bold_news_enqueue_scripts_styles' ) ) {
	function bold_news_enqueue_scripts_styles() {
		
		BoldThemesFramework::$crush_vars_def = array( 'accentColor', 'alternateColor', 'bodyFont', 'menuFont', 'headingFont', 'headingSuperTitleFont', 'headingSubTitleFont', 'logoHeight' );

		// Create override file without local settings

		if ( function_exists( 'boldthemes_csscrush_file' ) ) {
			boldthemes_csscrush_file( get_stylesheet_directory() . '/style.crush.css', array( 'source_map' => true, 'minify' => false, 'output_file' => 'style', 'formatter' => 'block', 'boilerplate' => false, 'plugins' => array( 'loop', 'ease' ) ) );
		}

		//custom accent color and font style

		$accent_color = boldthemes_get_option( 'accent_color' );
		$alternate_color = boldthemes_get_option( 'alternate_color' );
		$body_font = urldecode( boldthemes_get_option( 'body_font' ) );
		$menu_font = urldecode( boldthemes_get_option( 'menu_font' ) );
		$heading_font = urldecode( boldthemes_get_option( 'heading_font' ) );
		$heading_supertitle_font = urldecode( boldthemes_get_option( 'heading_supertitle_font' ) );
		$heading_subtitle_font = urldecode( boldthemes_get_option( 'heading_subtitle_font' ) );
		$logo_height = urldecode( boldthemes_get_option( 'logo_height' ) );

		if ( $accent_color != '' ) {
			BoldThemesFramework::$crush_vars['accentColor'] = $accent_color;
		}

		if ( $alternate_color != '' ) {
			BoldThemesFramework::$crush_vars['alternateColor'] = $alternate_color;
		}

		if ( $body_font != 'no_change' ) {
			BoldThemesFramework::$crush_vars['bodyFont'] = $body_font;
		}

		if ( $menu_font != 'no_change' ) {
			BoldThemesFramework::$crush_vars['menuFont'] = $menu_font;
		}

		if ( $heading_font != 'no_change' ) {
			BoldThemesFramework::$crush_vars['headingFont'] = $heading_font;
		}

		if ( $heading_supertitle_font != 'no_change' ) {
			BoldThemesFramework::$crush_vars['headingSuperTitleFont'] = $heading_supertitle_font;
		}

		if ( $heading_subtitle_font != 'no_change' ) {
			BoldThemesFramework::$crush_vars['headingSubTitleFont'] = $heading_subtitle_font;
		}
		
		if ( $logo_height != '' ) {
			BoldThemesFramework::$crush_vars['logoHeight'] = $logo_height;
		}

		// custom theme css
		wp_enqueue_style( 'bold_news_style_css', get_template_directory_uri() . '/style.css', array(), false, 'screen' );

		wp_enqueue_style( 'bold_news_style_print_css', get_template_directory_uri() . '/print.css', array(), false, 'print' );
		
		// custom buggyfill css
		wp_enqueue_style( 'bold_news_buggyfill_css', get_template_directory_uri() . '/css/viewport-buggyfill.css', array(), false, 'screen' );
		// custom magnific popup css
		wp_enqueue_style( 'bold_news_magnific-popup_css', get_template_directory_uri() . '/css/magnific-popup.css', array(), false, 'screen' );
		
		// third-party js
		wp_enqueue_script( 'viewport-units-buggyfill', get_template_directory_uri() . '/framework/js/viewport-units-buggyfill.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/framework/js/slick.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery.magnific-popup', get_template_directory_uri() . '/framework/js/jquery.magnific-popup.min.js', array( 'jquery' ), '', true );
		if ( ! wp_is_mobile() ) wp_enqueue_script( 'iscroll', get_template_directory_uri() . '/framework/js/iscroll.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'fancySelect', get_template_directory_uri() . '/framework/js/fancySelect.js', array( 'jquery' ), '', true );			
		wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/framework/js/html5shiv.min.js', array(), true );
		wp_enqueue_script( 'respond', get_template_directory_uri() . '/framework/js/respond.min.js', array(), true );
			
		// custom modernizr js
		wp_enqueue_script( 'bold_news_modernizr_js', get_template_directory_uri() . '/framework/js/modernizr.custom.js', array( 'jquery' ), '', false );
		// custom buggyfill js
		wp_enqueue_script( 'bold_news_buggyfill_hacks_js', get_template_directory_uri() . '/framework/js/viewport-units-buggyfill.hacks.js', array( 'jquery' ), '', true );
		wp_add_inline_script( 'bold_news_buggyfill_hacks_js', boldthemes_buggyfill_function() );
		// custom theme js
		wp_enqueue_script( 'bold_news_js', get_template_directory_uri() . '/script.js', array( 'jquery' ), '', true );
		// custom header related js
		wp_enqueue_script( 'bold_news_header_js', get_template_directory_uri() . '/framework/js/header.misc.js', array( 'jquery' ), '', true );
		// custom miscellaneous js
		wp_enqueue_script( 'bold_news_misc_js', get_template_directory_uri() . '/framework/js/misc.js', array( 'jquery' ), '', true );
		// custom tile hover effect js
		wp_enqueue_script( 'bold_news_dirhover_js', get_template_directory_uri() . '/framework/js/dir.hover.js', array( 'jquery' ), '', true );
		wp_add_inline_script( 'bold_news_header_js', boldthemes_set_global_uri(), 'before' );
		// custom slider js
		wp_enqueue_script( 'bold_news_sliders_js', get_template_directory_uri() . '/framework/js/sliders.js', array( 'jquery' ), '', true );
		// custom parallax js
		wp_enqueue_script( 'bold_news_parallax_js', get_template_directory_uri() . '/framework/js/bt_parallax.js', array( 'jquery' ), '', true );

		// dequeue cost calculator plugin style
		wp_dequeue_style( 'bt_cc_style' );
		
		if ( file_exists( get_template_directory() . '/css_override.php' ) ) {
			require_once( get_template_directory() . '/css_override.php' );
			if ( count( BoldThemesFramework::$crush_vars ) > 0 ) wp_add_inline_style( 'bold_news_style_css', $css_override );
		}
		
		if ( boldthemes_get_option( 'custom_css' ) != '' ) {
			wp_add_inline_style( 'bold_news_style_css', boldthemes_get_option( 'custom_css' ) );
		}

		if ( boldthemes_get_option( 'custom_js_top' ) != '' ) {
			wp_add_inline_script( 'bold_news_modernizr_js', boldthemes_get_option( 'custom_js_top' ) );
		}	
		
	}
}

/**
 * Register the required plugins for this theme
 */
if ( ! function_exists( 'bold_news_register_plugins' ) ) {
	function bold_news_register_plugins() {

		$plugins = array(
	 
			array(
				'name'               => esc_html__( 'Bold News', 'bold-news' ), // The plugin name.
				'slug'               => 'bold-news', // The plugin slug (typically the folder name).
				'source'             => get_template_directory() . '/plugins/bold-news.zip', // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'version'            => '1.1.5', ///!do not change this comment! E.g. 1.0.0. If set, the active plugin must be this version or higher.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			),
			array(
				'name'               => esc_html__( 'Cost Calculator', 'bold-news' ), // The plugin name.
				'slug'               => 'bt' . '_cost_calculator', // The plugin slug (typically the folder name).
				'source'             => get_template_directory() . '/plugins/' . 'bt' . '_cost_calculator.zip', // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'version'            => '1.1.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			),
			array(
				'name'               => esc_html__( 'Bold Builder', 'bold-news' ), // The plugin name.
				'slug'               => 'bold-page-builder', // The plugin slug (typically the folder name).
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),
			array(
				'name'               => esc_html__( 'BoldThemes WordPress Importer', 'bold-news' ), // The plugin name.
				'slug'               => 'bt' . '_wordpress_importer', // The plugin slug (typically the folder name).
				'source'             => get_template_directory() . '/plugins/' . 'bt' . '_wordpress_importer.zip', // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'version'            => '1.1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			),
			array(
				'name'               => esc_html__( 'Meta Box', 'bold-news' ), // The plugin name.
				'slug'               => 'meta-box', // The plugin slug (typically the folder name).
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),
			array(
				'name'               => esc_html__( 'Contact Form 7', 'bold-news' ), // The plugin name.
				'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),
			array(
				'name'               => esc_html__( 'WooSidebars', 'bold-news' ), // The plugin name.
				'slug'               => 'woosidebars', // The plugin slug (typically the folder name).
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),
			array(
				'name'               => esc_html__( 'WordPress Charts and Graphs', 'bold-news' ), // The plugin name.
				'slug'               => 'visualizer', // The plugin slug (typically the folder name).
				'required'           => false, // If false, the plugin is only 'recommended' instead of required.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),
			array(
				'name'               => esc_html__( 'Post Views Counter', 'bold-news' ), // The plugin name.
				'slug'               => 'post-views-counter', // The plugin slug (typically the folder name).
				'required'           => false, // If false, the plugin is only 'recommended' instead of required.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			)
		);
	 
		$config = array(
			'default_path' => '',                      // Default absolute path to pre-packaged plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'bold-news' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'bold-news' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'bold-news' ), // %s = plugin name.
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'bold-news' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'bold-news' ), // %1$s = plugin name(s).
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'bold-news' ), // %1$s = plugin name(s).
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'bold-news' ), // %1$s = plugin name(s).
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'bold-news' ), // %1$s = plugin name(s).
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'bold-news' ), // %1$s = plugin name(s).
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'bold-news' ), // %1$s = plugin name(s).
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'bold-news' ), // %1$s = plugin name(s).
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'bold-news' ), // %1$s = plugin name(s).
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'bold-news' ),
				'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'bold-news' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'bold-news' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'bold-news' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'bold-news' ), // %s = dashboard link.
				'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			)
		);
	 
		tgmpa( $plugins, $config );
	 
	}
}

/**
 * Loads custom Google Fonts
 */
if ( ! function_exists( 'bold_news_load_fonts' ) ) {
	function bold_news_load_fonts() {
		$body_font = urldecode( boldthemes_get_option( 'body_font' ) );
		$heading_font = urldecode( boldthemes_get_option( 'heading_font' ) );
		$menu_font = urldecode( boldthemes_get_option( 'menu_font' ) );
		$heading_subtitle_font = urldecode( boldthemes_get_option( 'heading_subtitle_font' ) );
		$heading_supertitle_font = urldecode( boldthemes_get_option( 'heading_supertitle_font' ) );
		
		$font_families = array();
		
		if ( $body_font != 'no_change' ) {
			$font_families[] = $body_font . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
		} else {
			$body_font_state = _x( 'on', 'Roboto font: on or off', 'bold-news' );
			if ( 'off' !== $body_font_state ) {
				$font_families[] = 'Roboto' . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
			}
		}
		
		if ( $heading_font != 'no_change' ) {
			$font_families[] = $heading_font . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
		} else {
			$heading_font_state = _x( 'on', 'Roboto Slab font: on or off', 'bold-news' );
			if ( 'off' !== $heading_font_state ) {
				$font_families[] = 'Roboto Slab' . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
			}
		}
		
		if ( $menu_font != 'no_change' ) {
			$font_families[] = $menu_font . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
		} else {
			$menu_font_state = _x( 'on', 'Roboto Slab font: on or off', 'bold-news' );
			if ( 'off' !== $menu_font_state ) {
				$font_families[] = 'Roboto Slab' . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
			}
		}

		if ( $heading_subtitle_font != 'no_change' ) {
			$font_families[] = $heading_subtitle_font . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
		} else {
			$heading_subtitle_font_state = _x( 'on', 'Roboto Condensed font: on or off', 'bold-news' );
			if ( 'off' !== $heading_subtitle_font_state ) {
				$font_families[] = 'Roboto Condensed' . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
			}
		}

		if ( $heading_supertitle_font != 'no_change' ) {
			$font_families[] = $heading_supertitle_font . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
		} else {
			$heading_supertitle_font_state = _x( 'on', 'Roboto Condensed font: on or off', 'bold-news' );
			if ( 'off' !== $heading_supertitle_font_state ) {
				$font_families[] = 'Roboto Condensed' . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
			}
		}

		if ( count( $font_families ) > 0 ) {
			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);
			$font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
			wp_enqueue_style( 'boldthemes_fonts', $font_url, array(), '1.0.0' );
		}
	}
}

/**
 * Category colors
 */
if ( ! function_exists( 'bold_news_cat_col' ) ) {
	function bold_news_cat_col() {

		$cat_col = boldthemes_get_option( 'blog_cat_col' );
		$cat_col_arr = explode( PHP_EOL, $cat_col );

		foreach( $cat_col_arr as $item ) {

			$item_arr = explode( ';', $item );

			if ( count( $item_arr ) == 2 ) {

				$cat_slug = $item_arr[0];
				$cat_color = $item_arr[1];

				$cat_obj = get_category_by_slug( $cat_slug );
				if ( is_object( $cat_obj ) ) {
					$cat_id = $cat_obj->term_id;
				} else {
					$cat_id = 0;
				}

				require( 'php/cat_col_template.php' );

				$custom_css = str_replace( ': ', ':', $custom_css );
				$custom_css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $custom_css );

				wp_add_inline_style( 'bold_news_style_css', $custom_css );
			}
		}
	}
}

/**
 * Category colors shop
 */
if ( ! function_exists( 'bold_news_cat_col_shop' ) ) {
	function bold_news_cat_col_shop() {
		
		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {

			$cat_col = boldthemes_get_option( 'shop_cat_col' );
			$cat_col_arr = explode( PHP_EOL, $cat_col );
			foreach( $cat_col_arr as $item ) {

				$item_arr = explode( ';', $item );
				if ( count( $item_arr ) == 2 ) {
					$cat_slug = $item_arr[0];
					$cat_color = $item_arr[1];

					$category = get_term_by( 'slug', $cat_slug, 'product_cat' );
					if ( is_object( $category ) ) {
						$cat_id = $category->term_id;
					} else {
						$cat_id = 0;
					}

					require( 'php/cat_col_template_shop.php' );

					$custom_css = str_replace( ': ', ':', $custom_css );
					$custom_css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $custom_css );

					wp_add_inline_style( 'bold_news_style_css', $custom_css );
				}
			}
		}
	}
}

/**
 * Extra classes
 */
if ( ! function_exists( 'bold_news_extra_class' ) ) {
	function bold_news_extra_class( $extra_class ) {
		if ( boldthemes_get_option( 'buttons_shape' ) == "no_change" ) {
			$extra_class[] = 'btHardRoundedButtons' ;
		}
		return $extra_class;
	}
	
}

/**
 * Charts class
 */
if ( ! function_exists( 'bold_news_charts_class' ) ) {
	function bold_news_charts_class( $class, $id ) {
		return 'btVisualizer';
	}
}

/**
 * Product headline size
 */
if ( ! function_exists( 'bold_news_product_headline_size' ) ) {
	function bold_news_product_headline_size( $size ) {
		return 'extralarge';
	}
}

/**
 * Page layout menu item
 */
if ( ! function_exists( 'bold_news_nav_menu_start_el' ) ) {
	function bold_news_nav_menu_start_el( $item_output, $item, $depth, $args ) {
		if ( in_array( 'bt_mega_menu', $item->classes ) && $item->object == 'page' ) {
			$item_output = '<span class="bt_mega_menu_title">' . $item->title . '</span>';
			$page = get_post( $item->object_id );
			$content = $page->post_content;
			$content = apply_filters( 'the_content', $content );
			$content = preg_replace( '/data-edit_url="(.*?)"/s', 'data-edit_url="' . get_edit_post_link( $item->object_id, '' ) . '"', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );
			$item_output .= '<ul class="sub-menu"><div class="bt_mega_menu_content">' . $content . '</div></ul>';
		}
		return $item_output;
	}
}

/**
 * Get post views
 */
if ( ! function_exists( 'bold_news_get_view_count' ) ) {
	function bold_news_get_view_count( $id = 0 ) {
		if ( function_exists( 'pvc_get_post_views' ) ) {
			$c = pvc_get_post_views( $id );
		} else {
			$c = 0;
		}
		return '<span class="btArticleViewsCount">' . $c . '</span>';
	}
}

/**
 * Page layout menu item
 */
if ( ! function_exists( 'bold_news_get_reading_time' ) ) {
	function bold_news_get_reading_time( $id = 0 ) {
		$wpm = boldthemes_get_option( 'blog_words_per_minute' );
		if ( $id == 0 ) {
			$content = get_the_content();
		} else {
			$content = get_post_field( 'post_content', $id );
		}
		$w = str_word_count( $content );
		$reading_time = round( $w / $wpm );
		if ( $reading_time <= 0 ) {
			$reading_time = 1;	
		}
		$reading_time = '<span class="btArticleReadingTime">' . $reading_time . '<span>min</span></span>';
		return $reading_time;
	}
}

/**
 * Category list custom HTML
 *
 * @return string
 */
if ( ! function_exists( 'bold_news_cat_count_span' ) ) {
	function bold_news_cat_count_span( $links ) {
		$links = preg_replace( '/\(([0-9].*)\)/', '<span>$1</span>', $links );
		if ( strpos( $links, '</span>' ) ) {
			$links = str_replace( '</a>', '', $links );
			$links = str_replace( '</span>', '</span></a>', $links );
		}
		return $links;
	}
}

// set content width
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

require_once( get_template_directory() . '/php/before_framework.php' );

require_once( get_template_directory() . '/framework/framework.php' );

require_once( get_template_directory() . '/php/after_framework.php' );

require_once( get_template_directory() . '/amp/amp.php' );