<?php

/**
 * Add to cart button.
 */
if ( ! function_exists( 'boldthemes_wc_get_add_to_cart_button' ) ) {
	function boldthemes_wc_get_add_to_cart_button( $product ) {
		return sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="btBtn btnFilledStyle btnSmall btnNormal btnAccentColor add_to_cart_button ajax_add_to_cart %s"><span class="btnInnerText">%s</span></a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $quantity ) ? $quantity : 1 ),
			esc_attr( $product->get_id() ),
			esc_attr( $product->get_sku() ),
			esc_attr( isset( $class ) ? $class : '' ),
			esc_html( $product->add_to_cart_text() )
		);
	}
}

/* Customizer start */

if ( ! function_exists( 'boldthemes_customize_custom_register' ) ) {
	function boldthemes_customize_custom_register( $wp_customize ) {
		
		global $wpdb;

		$wp_customize->add_section( BoldThemesFramework::$pfx . '_default_headline_section' , array(
			'title'      => esc_html__( 'Default headline', 'bold-news' ),
			'priority'   => 21,
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_custom_register' );

// FULL HEIGHT BANNER LEFT
if ( ! function_exists( 'boldthemes_customize_full_height_banner_left' ) ) {
	function boldthemes_customize_full_height_banner_left( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[full_height_banner_left]', array(
			'default'           => BoldThemes_Customize_Default::$data['full_height_banner_left'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_custom_js'
		));
		$wp_customize->add_control( 'full_height_banner_left', array(
			'label'     => esc_html__( 'Full Height Banner Left', 'bold-news' ),
			'section'   => BoldThemesFramework::$pfx . '_general_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[full_height_banner_left]',
			'priority'  => 110,
			'type'      => 'textarea'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_full_height_banner_left' );

// FULL HEIGHT BANNER RIGHT
if ( ! function_exists( 'boldthemes_customize_full_height_banner_right' ) ) {
	function boldthemes_customize_full_height_banner_right( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[full_height_banner_right]', array(
			'default'           => BoldThemes_Customize_Default::$data['full_height_banner_right'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_custom_js'
		));
		$wp_customize->add_control( 'full_height_banner_right', array(
			'label'     => esc_html__( 'Full Height Banner Right', 'bold-news' ),
			'section'   => BoldThemesFramework::$pfx . '_general_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[full_height_banner_right]',
			'priority'  => 115,
			'type'      => 'textarea'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_full_height_banner_right' );

if ( ! function_exists( 'boldthemes_customize_header_style' ) ) {
	function boldthemes_customize_header_style( $wp_customize ) {
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[header_style]', array(
			'default'           => BoldThemes_Customize_Default::$data['header_style'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'header_style', array(
			'label'     => esc_html__( 'Header Style', 'bold-news' ),
			'section'   => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[header_style]',
			'priority'  => 62,
			'type'      => 'select',
			'choices'   => array(
				'no_change'       => esc_html__( 'Default', 'bold-news' ),
				'btAccentDarkHeader' => esc_html__( 'Accent + Dark', 'bold-news' ),
				'btAccentLightHeader' => esc_html__( 'Accent + Light', 'bold-news' ),
				'btLightAccentHeader' => esc_html__( 'Light + Accent', 'bold-news' ),
				'btLightHeader' => esc_html__( 'Light + Dark elements', 'bold-news' ),				
				'btBlackHeader' => esc_html__( 'Black', 'bold-news' )				
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_header_style' );

// header_parallax_offset
if ( ! function_exists( 'boldthemes_customize_header_parallax_offset' ) ) {
	function boldthemes_customize_header_parallax_offset( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[header_parallax_offset]', array(
			'default'           => BoldThemes_Customize_Default::$data['header_parallax_offset'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control( 'header_parallax_offset', array(
			'label'    => esc_html__( 'Header Parallax Offset', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[header_parallax_offset]',
			'priority' => 62,
			'type'     => 'text'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_header_parallax_offset' );

// blog_categories
if ( ! function_exists( 'boldthemes_customize_blog_categories' ) ) {
	function boldthemes_customize_blog_categories( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_categories]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_categories'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_categories', array(
			'label'    => esc_html__( 'Show Post Categories', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_categories]',
			'priority' => 9,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_categories' );

// BLOG SINGLE VIEW
if ( ! function_exists( 'boldthemes_customize_blog_single_view' ) ) {
	function boldthemes_customize_blog_single_view( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_single_view]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_single_view'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'blog_single_view', array(
			'label'     => esc_html__( 'Single Post Layout', 'bold-news' ),
			'section'   => BoldThemesFramework::$pfx . '_blog_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[blog_single_view]',
			'priority'  => 8,
			'type'      => 'select',
			'choices'   => array(
				'standard' => esc_html__( 'Standard', 'bold-news' ),
				'columns' => esc_html__( 'Columns', 'bold-news' ),
				'columns-swap' => esc_html__( 'Columns (odd/even swap)', 'bold-news' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_single_view' );



// blog_comments
if ( ! function_exists( 'boldthemes_customize_blog_comments' ) ) {
	function boldthemes_customize_blog_comments( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_comments]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_comments'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_comments', array(
			'label'    => esc_html__( 'Show Number of Comments', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_comments]',
			'priority' => 9,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_comments' );



// blog_reading_time
if ( ! function_exists( 'boldthemes_customize_blog_reading_time' ) ) {
	function boldthemes_customize_blog_reading_time( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_reading_time]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_reading_time'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_reading_time', array(
			'label'    => esc_html__( 'Show Post Reading Time', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_reading_time]',
			'priority' => 9,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_reading_time' );

// blog_views_count
if ( ! function_exists( 'boldthemes_customize_blog_views_count' ) ) {
	function boldthemes_customize_blog_views_count( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_views_count]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_views_count'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_views_count', array(
			'label'    => esc_html__( 'Show Post Views Count', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_views_count]',
			'priority' => 9,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_views_count' );

// blog_rating
if ( ! function_exists( 'boldthemes_customize_blog_rating' ) ) {
	function boldthemes_customize_blog_rating( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_rating]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_rating'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_rating', array(
			'label'    => esc_html__( 'Show Post Rating', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_rating]',
			'priority' => 9,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_rating' );

// BLOG SIDE INFO
if ( ! function_exists( 'boldthemes_customize_blog_side_info' ) ) {
	function boldthemes_customize_blog_side_info( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_side_info]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_side_info'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_side_info', array(
			'label'    => esc_html__( 'Show Side Info', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_single_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_side_info]',
			'priority' => 100,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_side_info' );

// BLOG NEXT/PREV
if ( ! function_exists( 'boldthemes_customize_blog_next_prev' ) ) {
	function boldthemes_customize_blog_next_prev( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_next_prev]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_next_prev'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_next_prev', array(
			'label'    => esc_html__( 'Show Next Prev Navigation', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_single_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_next_prev]',
			'priority' => 101,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_next_prev' );

// RELATED POSTS
if ( ! function_exists( 'boldthemes_customize_blog_related_posts' ) ) {
	function boldthemes_customize_blog_related_posts( $wp_customize ) {
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_related_posts]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_related_posts'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'blog_related_posts', array(
			'label'     => esc_html__( 'Related Posts', 'bold-news' ),
			'section'   => BoldThemesFramework::$pfx . '_blog_single_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[blog_related_posts]',
			'priority'  => 150,
			'type'      => 'select',
			'choices'   => array(
				'show' => esc_html__( 'Show next to content', 'bold-news' ),
				'show_under_post' => esc_html__( 'Show always under the post', 'bold-news' ),
				'hide' => esc_html__( 'Hide', 'bold-news' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_related_posts' );

// BLOG SINGLE VIEW
if ( ! function_exists( 'boldthemes_customize_blog_single_view' ) ) {
	function boldthemes_customize_blog_single_view( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_single_view]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_single_view'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'blog_single_view', array(
			'label'     => esc_html__( 'Single Post Layout', 'bold-news' ),
			'section'   => BoldThemesFramework::$pfx . '_blog_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[blog_single_view]',
			'priority'  => 15,
			'type'      => 'select',
			'choices'   => array(
				'standard' => esc_html__( 'Standard', 'bold-news' ),
				'standard_media_top' => esc_html__( 'Standard with media on top', 'bold-news' ),
				'columns' => esc_html__( 'Columns', 'bold-news' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_single_view' );

// BLOG CATEGORIES COLORS
if ( ! function_exists( 'boldthemes_customize_blog_cat_col' ) ) {
	function boldthemes_customize_blog_cat_col( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_cat_col]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_cat_col'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_textarea'
		));
		$wp_customize->add_control( 'blog_cat_col', array(
			'label'     => esc_html__( 'Category Colors', 'bold-news' ),
			'section'   => BoldThemesFramework::$pfx . '_blog_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[blog_cat_col]',
			'priority'  => 150,
			'type'      => 'textarea'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_cat_col' );

// BLOG WORDS PER MINUTE
if ( ! function_exists( 'boldthemes_customize_blog_words_per_minute' ) ) {
	function boldthemes_customize_blog_words_per_minute( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_words_per_minute]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_words_per_minute'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control( 'blog_words_per_minute', array(
			'label'    => esc_html__( 'Words per Minute', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_words_per_minute]',
			'priority' => 170,
			'type'     => 'text'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_words_per_minute' );

// HIDE HEADLINE
if ( ! function_exists( 'boldthemes_customize_hide_headline' ) ) {
	function boldthemes_customize_hide_headline( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[hide_headline]', array(
				'default'           => BoldThemes_Customize_Default::$data['hide_headline'],
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'hide_headline', array(
				'label'    => esc_html__( 'Hide Default Headline', 'bold-news' ),
				'section'  => BoldThemesFramework::$pfx . '_default_headline_section',
				'settings' => BoldThemesFramework::$pfx . '_theme_options[hide_headline]',
				'priority' => 64,
				'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_hide_headline' );

// DEFAULT HEADLINE STYLE
if ( ! function_exists( 'boldthemes_customize_default_headline_style' ) ) {
	function boldthemes_customize_default_headline_style( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_headline_style]', array(
				'default'           => BoldThemes_Customize_Default::$data['default_headline_style'],
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'default_headline_style', array(
				'label'    => esc_html__( 'Default Headline Style', 'bold-news' ),
				'section'  => BoldThemesFramework::$pfx . '_default_headline_section',
				'settings' => BoldThemesFramework::$pfx . '_theme_options[default_headline_style]',
				'priority' => 64,
				'type'     => 'select',
				'choices'   => array(
					'standard' => esc_html__( 'Standard', 'bold-news' ),
					'standard_overlay' => esc_html__( 'Standard with content over it', 'bold-news' ),
					'boxed' => esc_html__( 'Boxed', 'bold-news' ),
					'boxed_overlay' => esc_html__( 'Boxed with content over it', 'bold-news' )
				)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_headline_style' );

// DEFAULT HEADLINE CONTENT
if ( ! function_exists( 'boldthemes_customize_default_headline_content' ) ) {
	function boldthemes_customize_default_headline_content( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_headline_content]', array(
				'default'           => BoldThemes_Customize_Default::$data['default_headline_content'],
				'type'              => 'option',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'default_headline_content', array(
				'label'    => esc_html__( 'Default Headline Content', 'bold-news' ),
				'section'  => BoldThemesFramework::$pfx . '_default_headline_section',
				'settings' => BoldThemesFramework::$pfx . '_theme_options[default_headline_content]',
				'priority' => 64,
				'type'     => 'select',
				'choices'   => array(
					'image_title' => esc_html__( 'Image and title', 'bold-news' ),
					'image' => esc_html__( 'Only image', 'bold-news' ),
					'title' => esc_html__( 'Only title', 'bold-news' )
				)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_headline_content' );

// SHOP CATEGORIES COLORS
if ( ! function_exists( 'boldthemes_customize_shop_cat_col' ) ) {
	function boldthemes_customize_shop_cat_col( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[shop_cat_col]', array(
			'default'           => BoldThemes_Customize_Default::$data['shop_cat_col'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_textarea'
		));
		$wp_customize->add_control( 'shop_cat_col', array(
			'label'     => esc_html__( 'Category Colors', 'bold-news' ),
			'section'   => BoldThemesFramework::$pfx . '_shop_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[shop_cat_col]',
			'priority'  => 150,
			'type'      => 'textarea'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_shop_cat_col' );

/**
 * Get post meta data
 */
if ( ! function_exists( 'boldthemes_get_post_meta' ) ) {
	function boldthemes_get_post_meta() {
		$blog_author = boldthemes_get_option( 'blog_author' );
		$blog_date = boldthemes_get_option( 'blog_date' );
		$comments_open = comments_open();
		$comments_number = get_comments_number();
		$show_comments_number = true;
		if ( ! $comments_open && $comments_number == 0 ) {
			$show_comments_number = false;
		}
		BoldThemesFramework::$meta_html = '';
		if ( $blog_author || $blog_date || $show_comments_number ) {
			if ( $blog_author ) BoldThemesFramework::$meta_html .= boldthemes_get_post_author();
			if ( $blog_date ) BoldThemesFramework::$meta_html .= boldthemes_get_post_date(); 
			if ( $show_comments_number ) BoldThemesFramework::$meta_html .= boldthemes_get_post_comments();
		}
		$post_reading_time = bold_news_get_reading_time();
		$post_views_count = '<span class="btArticleViewsCount">' . bold_news_get_view_count() . '</span>';

		BoldThemesFramework::$meta_html .= $post_reading_time;
		BoldThemesFramework::$meta_html .= $post_views_count;

		return BoldThemesFramework::$meta_html;
	}
}

/**
 * Get post rating
 */
if ( ! function_exists( 'boldthemes_get_post_rating' ) ) {
	function boldthemes_get_post_rating( $post_id = null ) {
		$review = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_review', array(), $post_id );
		$review_arr = explode( PHP_EOL, $review );
		$sum = 0;
		foreach( $review_arr as $r ) {
			$r_arr = explode( ';', $r );
			if ( isset( $r_arr[1] ) ) {
				$item_rating = round( floatval( $r_arr[1] ) );
			} else {
				$item_rating = 0;
			}
			$sum += $item_rating;
		}
		$rating = round( $sum / count( $review_arr ) , 1 );
		return $rating;
	}
}

/**
 * Get post star rating
 */
if ( ! function_exists( 'boldthemes_get_post_star_rating' ) ) {
	function boldthemes_get_post_star_rating( $post_id = null ) {
		$rating = boldthemes_get_post_rating( $post_id );
		if ( $rating == 0 ) {
			return '';
		}
		return '<div class="star-rating"><span style="width:' . $rating . '%"><strong class="rating">' . $rating . '</strong>' . __( 'min', 'bold-news' ) . '100</span></div>';
	}
}

/**
 * Get post author
 */
if ( ! function_exists( 'boldthemes_get_post_author' ) ) {
	function boldthemes_get_post_author( $author_url = false, $author_id = false ) {

		$post_author_id = get_the_author_meta( 'ID' );
		if ( $author_id !== false ) {
			$post_author_id = $author_id;
		}
		
		$blog_square_avatar = boldthemes_get_option( 'blog_square_avatar' );
		$avatar_html = ( $blog_square_avatar ) ? get_avatar( $post_author_id, 144, '', '', array('class' => 'square_avatar') ) : get_avatar( $post_author_id, 144 );

		if ( ! $author_url ) {
			$author_url = get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) );
		}		
		return '<a href="' . esc_url_raw( $author_url ) . '" class="btArticleAuthor"> ' . $avatar_html . esc_html( get_the_author_meta( 'display_name', $post_author_id )  )  . '</a>';
	}
}

/**
 * Get post author without avatar
 */
if ( ! function_exists( 'boldthemes_get_post_author_wo_avatar' ) ) {
	function boldthemes_get_post_author_wo_avatar( $author_url = false, $author_id = false ) {

		$post_author_id = get_the_author_meta( 'ID' );
		if ( $author_id !== false ) {
			$post_author_id = $author_id;
		}

		if ( ! $author_url ) {
			$author_url = get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) );
		}		
		return '<a href="' . esc_url_raw( $author_url ) . '" class="btArticleAuthor" target="_blank"> ' . esc_html( get_the_author_meta( 'display_name', $post_author_id )  )  . '</a>';
	}
}

/**
 * Get post author by post id
 */
if ( ! function_exists( 'boldthemes_get_post_author_id' ) ) {
	function boldthemes_get_post_author_id( $author_url = false , $post_id = '' ) {
		$post_id = empty($post_id) ?  get_queried_object_id() : $post_id;
		$post_author_id = get_post_field( 'post_author', $post_id );
		
		$blog_square_avatar = boldthemes_get_option( 'blog_square_avatar' );
		$avatar_html = ( $blog_square_avatar ) ? get_avatar( $post_author_id, 144, '', '', array('class' => 'square_avatar') ) : get_avatar( $post_author_id, 144 );

		//$avatar_html = get_avatar( $post_author_id, 144 );
		if ( ! $author_url ) {
			$author_url = get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) );
		}
		return '<a href="' . esc_url_raw( $author_url ) . '" class="btArticleAuthor"> ' . $avatar_html . esc_html( get_the_author_meta( 'display_name', $post_author_id )  )  . '</a>';
	}
}

/**
 * Custom body classes
 *
 * @return array
 */
if ( ! function_exists( 'boldthemes_get_body_class' ) ) {
	function boldthemes_get_body_class( $extra_class ) {
		
		$extra_class[] = 'bodyPreloader'; 
		
		$menu_type = boldthemes_get_option( 'menu_type' );
		if ( $menu_type == 'hCenter' ) {
			$extra_class[] = 'btMenuCenterEnabled'; 
		} else if ( $menu_type == 'hLeft' ) {
			$extra_class[] = 'btMenuLeftEnabled';
		}  else if ( $menu_type == 'hRight' ) {
			$extra_class[] = 'btMenuRightEnabled';
		} else if ( $menu_type == 'hLeftBelow' ) {
			$extra_class[] = 'btMenuLeftEnabled';
			$extra_class[] = 'btMenuBelowLogo';
		} else if ( $menu_type == 'hRightBelow' ) {
			$extra_class[] = 'btMenuRightEnabled';
			$extra_class[] = 'btMenuBelowLogo';
		} else if ( $menu_type == 'hCenterBelow' ) {
			$extra_class[] = 'btMenuCenterEnabled';
			$extra_class[] = 'btMenuBelowLogo';
		} else if ( $menu_type == 'vLeft' ) {
			$extra_class[] = 'btMenuVerticalLeftEnabled';
		} else if ( $menu_type == 'vRight' ) {
			$extra_class[] = 'btMenuVerticalRightEnabled';
		} else {
			$extra_class[] = 'btMenuRightEnabled';
		}

		if ( boldthemes_get_option( 'sticky_header' ) ) {
			$extra_class[] = 'btStickyEnabled';
		}

		if ( boldthemes_get_option( 'hide_menu' ) ) {
			$extra_class[] = 'btHideMenu';
		}
		
		$default_headline_style = boldthemes_get_option( 'default_headline_style' );
		BoldThemesFramework::$default_headline_content = boldthemes_get_option( 'default_headline_content' );
		BoldThemesFramework::$hide_headline = boldthemes_get_option( 'hide_headline' );
		if ( ! BoldThemesFramework::$hide_headline ) {
			if ( $default_headline_style == 'standard_overlay' ) {
				$extra_class[] = 'btStandardHeadline';
				$extra_class[] = 'btContentOverHeadline';
			} else if ( $default_headline_style == 'standard' ) {
				$extra_class[] = 'btStandardHeadline';
			} else if ( $default_headline_style == 'boxed_overlay' ) {
				$extra_class[] = 'btBoxedHeadline';
				$extra_class[] = 'btContentOverHeadline';
			} else if ( $default_headline_style == 'boxed' ) {
				$extra_class[] = 'btBoxedHeadline';
			} else {
				$extra_class[] = 'btHideHeadline';
			}
			if ( BoldThemesFramework::$default_headline_content == 'image'  ) {
				$extra_class[] = 'btHeadlineImage';
			} else if ( BoldThemesFramework::$default_headline_content == 'title_image'  ) {
				$extra_class[] = 'btHeadlineTitleImage';
			} else if ( BoldThemesFramework::$default_headline_content == 'title'  ) {
				$extra_class[] = 'btHeadlineTitleTitle';
			}		
		} 


		if ( boldthemes_get_option( 'template_skin' ) ) {
			$extra_class[] = 'btDarkSkin';
		} else {
			$extra_class[] = 'btLightSkin';
		}

		if ( boldthemes_get_option( 'below_menu' ) ) {
			$extra_class[] = 'btBelowMenu';
		}

		if ( ! boldthemes_get_option( 'sidebar_use_dash' ) ) {
			$extra_class[] = 'btNoDashInSidebar';
		}

		if ( boldthemes_get_option( 'top_tools_in_menu' ) ) {
			$extra_class[] = 'btTopToolsInMenuArea';
		}
		
		if ( boldthemes_get_option( 'disable_preloader' ) ) {
			$extra_class[] = 'btRemovePreloader';
		}
		
		if ( boldthemes_get_option( 'buttons_shape' ) != "no_change" ) {
			$extra_class[] = boldthemes_get_option( 'buttons_shape' );
		}
		
		if ( boldthemes_get_option( 'header_style' ) != "no_change" ) {
			$extra_class[] = boldthemes_get_option( 'header_style' );
		}
		
		if ( boldthemes_get_option( 'page_width' ) != "no_change" ) {
			$extra_class[] = boldthemes_get_option( 'page_width' );
		}
	
		BoldThemesFramework::$sidebar = boldthemes_get_option( 'sidebar' );

		if ( ! ( ( BoldThemesFramework::$sidebar == 'left' || BoldThemesFramework::$sidebar == 'right' ) && ! is_404() ) ) {
			BoldThemesFramework::$has_sidebar = false;
			$extra_class[] = 'btNoSidebar';
		} else {
			BoldThemesFramework::$has_sidebar = true;
			if ( BoldThemesFramework::$sidebar == 'left' ) {
				$extra_class[] = 'btWithSidebar btSidebarLeft';
			} else {
				$extra_class[] = 'btWithSidebar btSidebarRight';
			}
		}
		
		$animations = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_animations' );
		if ( $animations == 'half_page' ) {
			$extra_class[] = 'btHalfPage';
		}
		
		$extra_class = apply_filters( 'boldthemes_extra_class', $extra_class );
		
		return $extra_class;
	}
}
add_filter( 'body_class', 'boldthemes_get_body_class' );

/**
 * Breadcrumbs
 */
if ( ! function_exists( 'boldthemes_breadcrumbs' ) ) {
	function boldthemes_breadcrumbs( $simple = false, $title, $subtitle ) {
		$home_link = home_url( '/' );
		$output  = '';
		$item_prefix = '<li>';
		$item_suffix = '</li>';
		if ( $simple ) {
			$item_prefix = '';
			$item_suffix = ' / ';
		}

		if ( ! is_404() && ! is_front_page() ) {
		
			if ( ! $simple ) {
				$output .= '<div class="btBreadCrumbs"><nav><ul>';
				if ( ! is_singular() || is_page() ) {
					$output .= '<li><a href="' . esc_url_raw( $home_link ) . '">' . esc_html__( 'Home', 'bold-news' ) . '</a></li>';
				}
			} else {
				if ( ! is_singular() || is_page() ) {
					$output .= '<a href="' . esc_url_raw( $home_link ) . '">' . esc_html__( 'Home', 'bold-news' ) . '</a>';
				}
			}
			
			if ( is_home() ) {
				
				$subtitle = '';
				
				$page_for_posts = get_option( 'page_for_posts' );
				if ( $page_for_posts ) {
					$page = get_post( $page_for_posts );
					$subtitle = $page->post_excerpt;
				}
			
			} else if ( is_page() ) {

				$ancestors = get_ancestors( get_the_ID(), 'page' );
				$ancestors = array_reverse( $ancestors );
			
				foreach( $ancestors as $ancestor ) {
					$output .= wp_kses_post( $item_prefix ) . '<a href="' . esc_url_raw( get_permalink( $ancestor ) ) . '">' . wp_kses_post( get_the_title( $ancestor ) ) . '</a>' . wp_kses_post( $item_suffix );
				}
				
				$page = get_post( get_the_ID() );
				if ( $page ) {
					$subtitle = $page->post_excerpt;
				} else {
					$subtitle = '';
				}
		  
			} else if ( is_singular( 'post' ) && boldthemes_get_option( 'blog_single_categories' ) ) {
				
				$output .= boldthemes_get_post_categories();
				
				// $subtitle = boldthemes_get_post_meta();
				$subtitle = "";
				
			} else if ( is_singular( 'portfolio' ) ) {
				
				$categories = wp_get_post_terms( get_the_ID(), 'portfolio_category' );
				$output .= boldthemes_get_post_categories( array( 'categories' => $categories ) );
				
				$subtitle = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_subheading' );
				
			} else if ( is_singular( 'product' ) ) {
				
				$id = get_queried_object_id();
				$categories = wp_get_post_terms( $id, 'product_cat' );
				$output .= boldthemes_get_post_categories( array( 'categories' => $categories ) );
				
				$pf = new WC_Product_Factory();
				$product = $pf->get_product( $id );
				$rating_count = $product->get_rating_count();
				if ( $rating_count > 0 ) {

					if ( boldthemes_woocommerce_is_new_version() ) {
						$subtitle = wc_get_rating_html( $product->get_average_rating() );
					}else{
						$subtitle = $product->get_rating_html();
					}
				}
				
			} else if ( is_post_type_archive( 'portfolio' ) ) {
				
				$output .= $item_prefix . esc_html__( 'Portfolio', 'bold-news' ) . $item_suffix;
				
			} else if ( is_attachment() ) {
			
				$output .= $item_prefix . get_the_title() . $item_suffix;
				
			} else if ( is_category() ) {

				$output .= $item_prefix . esc_html__( 'Category', 'bold-news' ) . $item_suffix;

				$subtitle = '';
				
			} else if ( is_tax() ) {
				
				$output .= $item_prefix . esc_html__( 'Category', 'bold-news' ) . $item_suffix;
				
				$title = single_term_title( '', false );
				$subtitle = '';				
		  
			} else if ( is_tag() ) {
			
				$output .= $item_prefix . esc_html__( 'Tag', 'bold-news' ) . $item_suffix;
				
				$subtitle = '';
		  
			} else if ( is_author() ) {
			
				$output .= $item_prefix . esc_html__( 'Author', 'bold-news' ) . $item_suffix;
				
				$subtitle = '';
				
			} else if ( is_day() ) {

				$output .= $item_prefix . get_the_time( 'Y / m / d' ) . $item_suffix;
		  
			} else if ( is_month() ) {
			
				$output .= $item_prefix . get_the_time( 'Y / m' ) . $item_suffix;
		  
			} else if ( is_year() ) {
			
				$output .= $item_prefix . get_the_time( 'Y' ) . $item_suffix;			
				
			} else if ( is_search() ) {
				
				$output .= $item_prefix . esc_html__( 'Search', 'bold-news' ) . $item_suffix;

				$title = get_query_var( 's' );
				$subtitle = '';
				
			}
			
			if ( ! $simple ) {
				$output .= '</ul></nav></div>';
			}
			
		}

		return array( 'supertitle' => $output, 'title' => $title, 'subtitle' => $subtitle );
	
	}
}

/**
 * Header headline output
 */
if ( ! function_exists( 'boldthemes_header_headline' ) ) {
	function boldthemes_header_headline( $arg = array() ) {
		
		BoldThemesFramework::$hide_headline = boldthemes_get_option( 'hide_headline' );
		BoldThemesFramework::$default_headline_content = boldthemes_get_option( 'default_headline_content' );
		
		$supertitle = '';
		$subtitle = '';
		$title = '';
		$dash  = '';
		$page_header = "";
		$feat_image = "";
		$parallax = 0;
		
		if ( ( ! BoldThemesFramework::$hide_headline && ! is_404() ) ) {

			$extra_class = '';
			
			if ( BoldThemesFramework::$default_headline_content == "image" || BoldThemesFramework::$default_headline_content == "image_title" ) {	
				if ( BoldThemesFramework::$page_for_header_id != '' ) {
					$feat_image = wp_get_attachment_url( get_post_thumbnail_id( BoldThemesFramework::$page_for_header_id ) );
					if ( ! $feat_image ) {
						if ( is_singular() && ! is_singular( "product" ) ) {
							
							//var_dump(get_post_thumbnail_id( get_the_ID() ));
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
						} else {
							$feat_image = false;
						}
					}
				} else {
					if ( is_singular() ) {
						$feat_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
					} else {
						$feat_image = false;
					}
				}
				
				$parallax = isset( $arg['parallax'] ) ? $arg['parallax'] : '0.8';
				$parallax_class = 'btParallax';
				if ( wp_is_mobile() ) {
					$parallax = 0;
					$parallax_class = '';
				}
			}
				
			if ( BoldThemesFramework::$default_headline_content == "title" || BoldThemesFramework::$default_headline_content == "image_title" ) {

				$use_dash = boldthemes_get_option( 'sidebar_use_dash' );
				if ( $use_dash ) $dash  = apply_filters( 'boldthemes_header_headline_dash', 'large' );
				$title = is_front_page() ? get_bloginfo( 'description' ) : wp_title( '', false );

				if ( BoldThemesFramework::$page_for_header_id != '' ) {
					$excerpt = boldthemes_get_the_excerpt( BoldThemesFramework::$page_for_header_id );
				} else {
					$excerpt = boldthemes_get_the_excerpt( get_the_ID() );
				}
				$subtitle = $excerpt;
				
				$breadcrumbs = isset( $arg['breadcrumbs'] ) ? $arg['breadcrumbs'] : true;
				
				if ( $breadcrumbs ) {
					$heading_args = boldthemes_breadcrumbs( false, $title, $subtitle );
					$supertitle = $heading_args['supertitle'];
					$title = $heading_args['title'];
					$subtitle = $heading_args['subtitle'];
				}

				// yoast plugin checking
				if ( $title != '' && is_singular() ) {
					if ( class_exists( 'WPSEO_Options' ) ) {
						$title = get_the_title();
					}
				}
	
				if ( is_singular( 'post' ) ) {

					$page_header = boldthemes_get_heading_html( $supertitle, $title, $subtitle, apply_filters( 'boldthemes_header_headline_size', 'extralarge' ), $dash, '', '', true );
	
				} else {

					$page_header = boldthemes_get_heading_html( $supertitle, $title, $subtitle, apply_filters( 'boldthemes_header_headline_size', 'extralarge' ), $dash, '', '' );

				}

			
			} else {
				$extra_class .= ' btNoTitle';
			}

			$offset = boldthemes_get_option( 'header_parallax_offset' ) != '' ? boldthemes_get_option( 'header_parallax_offset' ) : '-250';
			
			$extra_class .= boldthemes_get_option( 'below_menu' ) ? ' topLargeSpaced' : ' topSemiSpaced';
			$extra_class .= $feat_image ? ' wBackground cover ' . $parallax_class . ' btDarkSkin btBackgroundOverlay btSolidDarkBackground ' : ' ';
			$feat_image_style = '';
			if ( $feat_image != '' ) {
				$feat_image_style = ' ' . 'style="background-image:url(' . esc_url_raw( $feat_image ) . ')"' . ' ';
			}
			echo '<section class="boldSection bottomSemiSpaced btPageHeadline gutter ' . esc_attr( $extra_class ) . '"' . $feat_image_style . 'data-parallax="' . esc_attr( $parallax ) . '" data-parallax-offset="' . $offset . '"><div class="port">' . wp_kses_post( $page_header );
			echo '</div></section>';
		}
 	}
}

/**
 * Top bar HTML output
 */
 if ( ! function_exists( 'boldthemes_top_bar_html' ) ) {
	function boldthemes_top_bar_html( $type = 'top' ) {
			
			if ( $type == 'top' ) { 
				if ( is_active_sidebar( 'header_left_widgets' ) || is_active_sidebar( 'header_right_widgets' ) ) { ?>
					<div class="topBar btClear">
						<div class="topBarPort btClear">
							<?php if ( is_active_sidebar( 'header_left_widgets' ) ) { ?>
							
							<div class="topTools btTopToolsLeft <?php echo( esc_attr( BoldThemesFramework::$left_alignment_class ) ); ?>">
								<?php dynamic_sidebar( 'header_left_widgets' ); ?>
							</div><!-- /ttLeft -->
							
							<?php } ?>
							<?php if ( is_active_sidebar( 'header_right_widgets' ) ) { ?>
								
								<div class="topTools btTopToolsRight <?php echo ( esc_attr( BoldThemesFramework::$right_alignment_class ) ) ?>">
									<?php dynamic_sidebar( 'header_right_widgets' ); ?>
								</div><!-- /ttRight -->
								
							<?php } ?>
						</div><!-- /topBarPort -->
					</div><!-- /topBar -->
				<?php }
				
			} else if( $type == 'menu' ) { ?>
				<?php if ( is_active_sidebar( 'header_menu_widgets' ) ) { ?>
					<div class="topBarInMenu">
						<div class="topBarInMenuCell">
							<?php dynamic_sidebar( 'header_menu_widgets' ); ?>
						</div><!-- /topBarInMenu -->
					</div><!-- /topBarInMenuCell -->
				<?php } ?>
			<?php }	else if( $type == 'banner' ) { ?>	
				<?php if ( is_active_sidebar( 'header_banner_widgets' ) ) { ?>
					<div class="topBarInLogoArea">
						<div class="topBarInLogoAreaCell">
							<?php dynamic_sidebar( 'header_banner_widgets' ); ?>
						</div><!-- /topBarInLogoAreaCell -->
					</div><!-- /topBarInLogoArea -->
				<?php } ?>
			<?php }
				
		

	}
}

/**
 * Share buttons for WC.
 */
if ( ! function_exists( 'boldthemes_wc_get_share_buttons' ) ) {
	function boldthemes_wc_get_share_buttons( $permalink ) {
		return boldthemes_get_share_html( $permalink, 'shop', 'btIcoSmallSize', 'btIcoFilledType btIcoDefaultColor' );
	}
}

/**
 * Show the product title in the product loop  WC.
 */
if (  ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
	function woocommerce_template_loop_product_title() {
		global $product;

		$subtitle = '';


		if ( boldthemes_woocommerce_is_new_version() ) {
			if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' && $rating_html = wc_get_rating_html( $product->get_average_rating() ) ) {
				$subtitle = $rating_html;
			}
		}else{
			if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' && $rating_html = $product->get_rating_html() ) {
				$subtitle = $rating_html;
			}
		}

		if ( $subtitle == '' ) {
			$subtitle = '<span class="btNoStarRating"></span>';	;
		}

		$categories = wp_get_post_terms( $product->get_id(), 'product_cat' );
		$supertitle = boldthemes_get_post_categories( array( 'categories' => $categories ) );

		$title = '<a href = "' . get_permalink() . '">' . get_the_title() . '</a>';
		
		$dash = boldthemes_get_option( 'shop_use_dash' );
		if ( $dash != '' ) {
			$dash = 'bottom';
		}

		echo boldthemes_get_heading_html( $supertitle, $title, $subtitle, 'extrasmall', $dash, '', '' ) ;

	}
}

// BLOG SINGLE SECTION

if ( ! function_exists( 'boldthemes_customize_custom_register_blog_single' ) ) {
	function boldthemes_customize_custom_register_blog_single( $wp_customize ) {
		
		global $wpdb;

		$wp_customize->add_section( BoldThemesFramework::$pfx . '_blog_single_section' , array(
			'title'      => esc_html__( 'Blog Single Post', 'bold-news' ),
			'priority'   => 45,
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_custom_register_blog_single' );

// AUTHOR
if ( ! function_exists( 'boldthemes_customize_blog_single_author' ) ) {
	function boldthemes_customize_blog_single_author( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_single_author]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_single_author'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_single_author', array(
			'label'    => esc_html__( 'Show Author Name', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_single_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_single_author]',
			'priority' => 1,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_single_author' );

// blog_single_categories
if ( ! function_exists( 'boldthemes_customize_blog_single_categories' ) ) {
	function boldthemes_customize_blog_single_categories( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_single_categories', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_single_categories'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_single_categories', array(
			'label'    => esc_html__( 'Show Post Categories', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_single_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_single_categories]',
			'priority' => 2,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_single_categories' );

// blog_single_comments
if ( ! function_exists( 'boldthemes_customize_blog_single_comments' ) ) {
	function boldthemes_customize_blog_single_comments( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_single_comments', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_single_comments'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_single_comments', array(
			'label'    => esc_html__( 'Show Number of Comments', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_single_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_single_comments]',
			'priority' => 9,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_single_comments' );

// blog_single_reading_time
if ( ! function_exists( 'boldthemes_customize_blog_single_reading_time' ) ) {
	function boldthemes_customize_blog_single_reading_time( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_single_reading_time', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_single_reading_time'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_single_reading_time', array(
			'label'    => esc_html__( 'Show Post Reading Time', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_single_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_single_reading_time]',
			'priority' => 9,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_single_reading_time' );

// blog_single_views_count
if ( ! function_exists( 'boldthemes_customize_blog_single_views_count' ) ) {
	function boldthemes_customize_blog_single_views_count( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_single_views_count', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_single_views_count'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_single_views_count', array(
			'label'    => esc_html__( 'Show Post Views Count', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_single_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_single_views_count]',
			'priority' => 9,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_single_views_count' );

// blog_rating
if ( ! function_exists( 'boldthemes_customize_blog_single_rating' ) ) {
	function boldthemes_customize_blog_single_rating( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_single_rating', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_single_rating'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_single_rating', array(
			'label'    => esc_html__( 'Show Post Rating', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_single_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_single_rating]',
			'priority' => 9,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_single_rating' );

// DATE
if ( ! function_exists( 'boldthemes_customize_blog_single_date' ) ) {
	function boldthemes_customize_blog_single_date( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[blog_single_date]', array(
			'default'           => BoldThemes_Customize_Default::$data['blog_single_date'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'blog_single_date', array(
			'label'    => esc_html__( 'Show Post Date', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_single_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[blog_single_date]',
			'priority' => 10,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_blog_single_date' );

//TICKER SECTION
if ( ! function_exists( 'boldthemes_customize_custom_register_ticker' ) ) {
	function boldthemes_customize_custom_register_ticker( $wp_customize ) {
		
		global $wpdb;

		$wp_customize->add_section( BoldThemesFramework::$pfx . '_ticker_section' , array(
			'title'      => esc_html__( 'Ticker', 'bold-news' ),
			'priority'   => 65,
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_custom_register_ticker' );

// TICKER ACTIVE
if ( ! function_exists( 'boldthemes_customize_ticker_active' ) ) {
	function boldthemes_customize_ticker_active( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[ticker_active]', array(
			'default'           => BoldThemes_Customize_Default::$data['ticker_active'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'ticker_active', array(
			'label'    => esc_html__( 'Show Ticker', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_ticker_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[ticker_active]',
			'priority' => 1,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_ticker_active' );

// TICKER CUSTOM TEXT
if ( ! function_exists( 'boldthemes_customize_ticker_custom_text' ) ) {
	function boldthemes_customize_ticker_custom_text( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[ticker_custom_text]', array(
			'default'           => BoldThemes_Customize_Default::$data['ticker_custom_text'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control( 'ticker_custom_text', array(
			'label'    => esc_html__( 'Custom Ticker Text', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_ticker_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[ticker_custom_text]',
			'priority' => 2,
			'type'     => 'text'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_ticker_custom_text' );

// TICKER POSTS
if ( ! function_exists( 'boldthemes_customize_ticker_posts' ) ) {
	function boldthemes_customize_ticker_posts( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[ticker_posts]', array(
			'default'           => BoldThemes_Customize_Default::$data['ticker_posts'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_textarea'
		));
		$wp_customize->add_control( 'ticker_posts', array(
			'label'     => esc_html__( 'Ticker Posts', 'bold-news' ),
			'section'   => BoldThemesFramework::$pfx . '_ticker_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[ticker_posts]',
			'priority'  => 3,
			'type'      => 'textarea'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_ticker_posts' );

// TICKER POST CATEGORY
if ( ! function_exists( 'boldthemes_customize_ticker_post_category' ) ) {
	function boldthemes_customize_ticker_post_category( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[ticker_post_category]', array(
			'default'           => BoldThemes_Customize_Default::$data['ticker_post_category'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control( 'ticker_post_category', array(
			'label'    => esc_html__( 'Post Category Slugs or IDs', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_ticker_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[ticker_post_category]',
			'priority' => 4,
			'type'     => 'text'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_ticker_post_category' );

// TICKER POST CATEGORY NUMBER
if ( ! function_exists( 'boldthemes_customize_ticker_post_category_number' ) ) {
	function boldthemes_customize_ticker_post_category_number( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[ticker_post_category_number]', array(
			'default'           => BoldThemes_Customize_Default::$data['ticker_post_category_number'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control( 'ticker_post_category_number', array(
			'label'    => esc_html__( 'Number of posts to show', 'bold-news' ),
			'section'  => BoldThemesFramework::$pfx . '_ticker_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[ticker_post_category_number]',
			'priority' => 4,
			'type'     => 'text'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_ticker_post_category_number' );

// TICKER INTERVAL
if ( ! function_exists( 'boldthemes_customize_ticker_interval' ) ) {
	function boldthemes_customize_ticker_interval( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[ticker_interval]', array(
			'default'           => BoldThemes_Customize_Default::$data['ticker_interval'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control( 'ticker_interval', array(
			'label'     => esc_html__( 'Ticker Interval', 'bold-news' ),
			'section'   => BoldThemesFramework::$pfx . '_ticker_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[ticker_interval]',
			'priority'  => 5,
			'type'      => 'text'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_ticker_interval' );

if ( ! function_exists( 'boldthemes_get_template_posts_data' ) ) {
	function boldthemes_get_template_posts_data( $number, $offset, $cat_slug, $exclude_ids, $author_username, $show_sticky = false, $post_type = 'blog' ) {
		
		$posts_data1 = array();
		$posts_data2 = array();
		
		if ( $show_sticky && $post_type == 'blog' ) {
			$sticky = true;
			$sticky_array = get_option( 'sticky_posts' );
		} else {
			$sticky = false;
		}
		
		if ( $offset == 0 && $sticky && count( $sticky_array ) > 0 ) {
			$recent_posts_q_sticky = new WP_Query( array( 'post__in' => $sticky_array, 'post_status' => 'publish' ) );
			$posts_data1 = boldthemes_get_posts_array( $recent_posts_q_sticky, $post_type, array() );
		}

		if ( $offset > 0 && $post_type == 'blog' && $sticky ) {
			$sticky_array = array();
			$sticky = false;
		}
		if ( $offset > 0 && $post_type == 'blog' && ! $sticky ) {
			$sticky_array = get_option( 'sticky_posts' );
			$sticky = true;
		}

		if ( $number > 0 ) {
			if ( $post_type == 'portfolio' ) {
				if ( $cat_slug != '' ) {
					$recent_posts_q = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => $number, 'offset' => $offset, 'tax_query' => array( array( 'taxonomy' => 'portfolio_category', 'field' => 'slug', 'terms' => explode( ',', $cat_slug ) ) ), 'post_status' => 'publish' ) );
				} else {
					$recent_posts_q = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => $number, 'offset' => $offset, 'post_status' => 'publish' ) );
				}
			} else {
				$q = array( 'post__not_in' => $exclude_ids, 'posts_per_page' => $number, 'offset' => $offset, 'post_status' => 'publish' );
				if ( $author_username != '' ) {
					$q['author_name'] = $author_username;
				}
				if ( $cat_slug != '' ) {

					if ( strpos( $cat_slug, ':' ) !== false ) {
						$taxonomy_arr = explode( ':', $cat_slug );
						$taxonomy = $taxonomy_arr[0];
						$cat_slug = $taxonomy_arr[1];
						$q['tax_query'] = array(
							array(
								'taxonomy' => $taxonomy,
								'field'    => 'slug',
								'terms'    => explode( ',', $cat_slug )
							)
						);

					} else {
						$q['category_name'] = $cat_slug;
					}
				}
				$recent_posts_q = new WP_Query( $q );
			}
		}

		if ( $sticky ) {
			$posts_data2 = boldthemes_get_posts_array( $recent_posts_q, $post_type, $sticky_array );
		} else {
			$posts_data2 = boldthemes_get_posts_array( $recent_posts_q, $post_type, array() );
		}		

		return array_merge( $posts_data1, $posts_data2 );

	}
}

if ( ! function_exists( 'boldthemes_get_posts_array' ) ) {
	function boldthemes_get_posts_array( $recent_posts_q, $post_type = 'blog', $sticky_arr ) {
		
		$posts_data = array();

		while ( $recent_posts_q->have_posts() ) {
			$recent_posts_q->the_post();
			$post = get_post();
			$post_author = $post->post_author;
			$post_id = get_the_ID();
			if ( in_array( $post_id, $sticky_arr ) ) {
				continue;
			}
			$posts_data[] = boldthemes_get_posts_array_item( $post_type, $post_id, $post_author );
		}
		
		wp_reset_postdata();
		
		return $posts_data;
	}
}

 if ( ! function_exists( 'boldthemes_get_heading_html' ) ) {
	function boldthemes_get_heading_html( $superheadline, $headline, $subheadline, $headline_size, $dash, $el_class, $el_style, $singular_post = false ) {

		if ( $singular_post ) {
			$post_heading_supertitle	= boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_heading_supertitle' );
			$post_heading_subtitle		= boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_heading_subtitle' );
		} else {
			$post_heading_supertitle = '';
			$post_heading_subtitle = '';
		}

		if ( $post_heading_supertitle != '' ) {
			$post_heading_supertitle = '<div class="btSuperTitleHeading"><span>' . wp_kses_post( $post_heading_supertitle ) . '</span></div>';
		}

		if ( $post_heading_subtitle != '' ) {
			$post_heading_subtitle = '<div class="btSubTitleHeading">' . wp_kses_post( $post_heading_subtitle ) . '</div>';
		}

		if ( $superheadline != '' ) {
			$superheadline = '<div class="btSuperTitle"><span>' . wp_kses_post( $superheadline ) . '</span></div>';
		}

		if ( $subheadline != '' ) {
			$subheadline = '<div class="btSubTitle">' . wp_kses_post( $subheadline ) . '</div>';
		}
		
		$h_tag = 'h1';
		$class = '';

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = 'style="' . esc_attr( $el_style ) . '"';
		}

		if ( $headline_size != 'no' ) {
			$class .= $headline_size;
		}
		if ( $headline_size == 'extralarge' || $headline_size == 'huge' ) {
			$h_tag = 'h1';
		} else if ( $headline_size == 'large' ) {
			$h_tag = 'h2';
		} else if ( $headline_size == 'medium' ) {
			$h_tag = 'h3';
		} else {
			$h_tag = 'h4';
		}

		if ( $dash == 'yes' ) {
			$dash = 'top';
		}
		
		if ( $dash != 'no' && $dash != '' ) {
			$dash = str_replace( ' ', 'Dash ', $dash );
			$class .= ' btDash ' . $dash . 'Dash';
		}

		if ( $el_class != '' ) {
			$class .= ' ' . $el_class;
		}
		
		$output = '<header class="header btClear ' . $class . '" ' . $style_attr . '>';
		
		$output .= $superheadline;

		
		
        if ( $headline != '' || $subheadline != '' ) {
			
				$output .= '<div class="dash">';
					$pattern = "/<(b|u|i|em|del)([> ])/";
					$replace = '<$1 class="animate">';
					$headline = preg_replace( $pattern, $replace, $headline );
					
					if ( $headline != '' && $post_heading_supertitle != '' ) {
						$output .= $post_heading_supertitle;
					}

					if ( $headline != '' ) {
						$output .= '<' . $h_tag . '><span class="headline">' . wp_kses_post( $headline ) . '</span></' . $h_tag . '>';
					}

					if ( $headline != '' && $post_heading_subtitle != '' ) {
						$output .= $post_heading_subtitle;
					}
					
				$output .= '</div>';
				$output .= $subheadline;
			
		}
		
        $output .= '</header>';	

		return $output;
		
	}
}