<?php

BoldThemes_Customize_Default::$data['buttons_shape'] = 'btSquareButtons';
BoldThemes_Customize_Default::$data['blog_categories'] = 'true';
BoldThemes_Customize_Default::$data['blog_reading_time'] = 'true';
BoldThemes_Customize_Default::$data['blog_views_count'] = 'false';
BoldThemes_Customize_Default::$data['blog_comments'] = 'true';
BoldThemes_Customize_Default::$data['blog_rating'] = 'false';
BoldThemes_Customize_Default::$data['blog_cat_col'] = '';
BoldThemes_Customize_Default::$data['default_headline_style'] = 'standard';
BoldThemes_Customize_Default::$data['default_headline_content'] = 'title';
BoldThemes_Customize_Default::$data['full_height_banner_left'] = '';
BoldThemes_Customize_Default::$data['full_height_banner_right'] = '';
BoldThemes_Customize_Default::$data['shop_cat_col'] = '';

//BLOG SINGLE
BoldThemes_Customize_Default::$data['blog_single_categories'] = 'true';
BoldThemes_Customize_Default::$data['blog_single_author'] = 'true';
BoldThemes_Customize_Default::$data['blog_single_comments'] = 'true';
BoldThemes_Customize_Default::$data['blog_single_reading_time'] = 'true';
BoldThemes_Customize_Default::$data['blog_single_views_count'] = 'false';
BoldThemes_Customize_Default::$data['blog_single_comments'] = 'true';
BoldThemes_Customize_Default::$data['blog_single_rating'] = 'false';
BoldThemes_Customize_Default::$data['blog_single_date'] = 'true';

BoldThemes_Customize_Default::$data['blog_words_per_minute'] = '130';

BoldThemes_Customize_Default::$data['blog_related_posts'] = 'show';

//TICKER
BoldThemes_Customize_Default::$data['ticker_active'] = 'false';
BoldThemes_Customize_Default::$data['ticker_custom_text'] = '';
BoldThemes_Customize_Default::$data['ticker_post_category'] = '';
BoldThemes_Customize_Default::$data['ticker_post_category_number'] = '5';
BoldThemes_Customize_Default::$data['ticker_posts'] = '';
BoldThemes_Customize_Default::$data['ticker_interval'] = '3000';

BoldThemes_Customize_Default::$data['header_parallax_offset'] = '-250';

// AUTHOR REVIEW META BOX

boldthemes_add_mb_field( 
	array(
		'mb_id'    => 'post',
		'field_id' => 'review_summary',
		'name'     => esc_html__( 'Review Summary', 'bold-news' ),
		'type'     => 'textarea',
		'order'    => 12
	)
);

boldthemes_add_mb_field( 
	array(
		'mb_id'    => 'post',
		'field_id' => 'review',
		'name'     => esc_html__( 'Review', 'bold-news' ),
		'type'     => 'textarea',
		'order'    => 12
	)
);

// POST SUPERTITLE AND SUBTITLE META BOXES
boldthemes_add_mb_field( 
	array(
		'mb_id'    => 'post',
		'field_id' => 'heading_subtitle',
		'name'     => esc_html__( 'Heading Subtitle', 'bold-news' ),
		'type'     => 'textarea',
		'order'    => 0
	)
);

boldthemes_add_mb_field( 
	array(
		'mb_id'    => 'post',
		'field_id' => 'heading_supertitle',
		'name'     => esc_html__( 'Heading Supertitle', 'bold-news' ),
		'type'     => 'textarea',
		'order'    => 0
	)
);



