<?php

$boldthemes_options = get_option( BoldThemesFramework::$pfx . '_theme_options' );
if ( isset( $boldthemes_options['blog_settings_page_slug'] ) && $boldthemes_options['blog_settings_page_slug'] != '' ) {
	BoldThemesFramework::$page_for_header_id = boldthemes_get_id_by_slug( $boldthemes_options['blog_settings_page_slug'] );
}

get_header();

if ( have_posts() ) {
	
	while ( have_posts() ) {
	
		the_post();
		$permalink = get_permalink();
		BoldThemesFramework::$post_format = get_post_format();
		
		/* CUSTOMIZER START */
		
		$blog_single_author = boldthemes_get_option( 'blog_single_author' );
		$blog_single_date = boldthemes_get_option( 'blog_single_date' );
		$blog_single_reading_time = boldthemes_get_option( 'blog_single_reading_time' );		
		$blog_single_views_count = boldthemes_get_option( 'blog_single_views_count' );
		BoldThemesFramework::$blog_single_rating = boldthemes_get_option( 'blog_single_rating' );
		$blog_single_categories = boldthemes_get_option( 'blog_single_categories' );
		$blog_single_comments = boldthemes_get_option( 'blog_single_comments' );
		

		BoldThemesFramework::$blog_side_info = boldthemes_get_option( 'blog_side_info' );
		$blog_list_view = boldthemes_get_option( 'blog_list_view' );
		$blog_use_dash = boldthemes_get_option( 'blog_use_dash' );
		BoldThemesFramework::$blog_author_info = boldthemes_get_option( 'blog_author_info' );
		
		BoldThemesFramework::$hide_headline = boldthemes_get_option( 'hide_headline' );
		BoldThemesFramework::$default_headline_content = boldthemes_get_option( 'default_headline_content' );
		
		BoldThemesFramework::$blog_dash = $blog_use_dash ? 'bottom' : '';		

		BoldThemesFramework::$categories_html_single = $blog_single_categories ? boldthemes_get_post_categories() : '';

		BoldThemesFramework::$blog_next_prev = boldthemes_get_option( 'blog_next_prev' );
		
		$tags = get_the_tags();
		BoldThemesFramework::$tags_html = '';
		if ( $tags ) {
			foreach ( $tags as $tag ) {
				BoldThemesFramework::$tags_html .= '<li><a href="' . esc_url_raw( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a></li>';
			}
			BoldThemesFramework::$tags_html = rtrim( BoldThemesFramework::$tags_html, ', ' );
			BoldThemesFramework::$tags_html = '<div class="btTags"><ul>' . BoldThemesFramework::$tags_html . '</ul></div>';
		}

		BoldThemesFramework::$share_html = boldthemes_get_share_html( $permalink, 'blog', 'btIcoSmallSize', 'btIcoFilledType' );
		
		$comments_open = comments_open();
		$comments_number = get_comments_number();
		$show_comments_number = true;
		if ( ! $comments_open && $comments_number == 0 ) {
			$show_comments_number = false;
		}		
		
		/* CUSTOMIZER END */
		
		/* GET MEDIA HTML START */

		
		
		$images = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_images', 'type=image' );
		if ( $images == null ) $images = array();
		$video = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_video' );
		$audio = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_audio' );
		
		$link_title = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_link_title' );
		$link_url = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_link_url' );
		$quote = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_quote' );
		$quote_author = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_quote_author' );
		
		BoldThemesFramework::$media_html = '';
		BoldThemesFramework::$media_is_feat = false;

		if ( has_post_thumbnail() && ! BoldThemesFramework::$hide_headline && ! ( BoldThemesFramework::$page_for_header_id != '' && ! is_search() ) ) {
			$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
			$img = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );
			$thumb_img_slider = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
			$thumb_img_slider = $thumb_img_slider[0];
			if ( $img != '' ) {
				BoldThemesFramework::$media_html = boldthemes_get_media_html( 'image_single_post', array( $permalink, $img[0] ) );
				BoldThemesFramework::$media_is_feat = true;
			}
		}
		if ( !BoldThemesFramework::$post_format || BoldThemesFramework::$post_format == 'standard' || BoldThemesFramework::$post_format == 'gallery' || BoldThemesFramework::$post_format == 'image' ) {
			
			if ( count( $images ) > 0 ) {
				$images_ids = array();
				foreach ( $images as $img ) {
					$images_ids[] = $img['ID'];
				}
				if ( intval( boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_grid_gallery' ) ) != 0 ) {
					BoldThemesFramework::$media_html = boldthemes_get_media_html( 'grid_gallery', array( $images_ids , boldthemes_get_option( 'blog_grid_gallery_columns' ), has_post_thumbnail(), boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_grid_gallery_format' ), 'yes', boldthemes_get_option( 'blog_grid_gallery_gap' ) ) );
				} else {
					BoldThemesFramework::$media_html = boldthemes_get_media_html( 'gallery', array( $images_ids ) );
				};
			}
			BoldThemesFramework::$media_is_feat = false;
			 
		} else if ( BoldThemesFramework::$post_format == 'video' ) {
			
			BoldThemesFramework::$media_html = boldthemes_get_media_html( 'video', array( $video ) );
			BoldThemesFramework::$media_is_feat = false;
			
		} else if ( BoldThemesFramework::$post_format == 'audio' ) {
			
			BoldThemesFramework::$media_html = boldthemes_get_media_html( 'audio', array( $audio ) );
			BoldThemesFramework::$media_is_feat = false;
			
		} else if ( BoldThemesFramework::$post_format == 'link' ) {
			
			BoldThemesFramework::$media_html = boldthemes_get_media_html( 'link', array( $link_url, $link_title ) );
			BoldThemesFramework::$media_is_feat = false;
			
		} else if ( BoldThemesFramework::$post_format == 'quote' ) {
			
			BoldThemesFramework::$media_html = boldthemes_get_media_html( 'quote', array( $quote, $quote_author, $permalink ) );
			BoldThemesFramework::$media_is_feat = false;
			
		}

		if ( get_query_var('page') > 1 ) {
			BoldThemesFramework::$media_html = '';
		}
		
		BoldThemesFramework::$content_html = apply_filters( 'the_content', get_the_content() );
		BoldThemesFramework::$content_html = str_replace( ']]>', ']]&gt;', BoldThemesFramework::$content_html );

		BoldThemesFramework::$content_excerpt_html = get_post()->post_excerpt != '' ? esc_html( get_the_excerpt() ) : '';
		
		/* GET MEDIA HTML END */
		
	
		
		/* PREV-NEXT START */
		BoldThemesFramework::$prev_next_html = '';

		if ( BoldThemesFramework::$blog_next_prev ) {
			
			$prev = get_adjacent_post( false, '', true );
			BoldThemesFramework::$prev_next_html .= '<div class="rowItem col-xs-12 col-sm-12 col-md-6 ' . esc_attr( BoldThemesFramework::$left_alignment_class )  . '">';
			if ( '' != $prev ) {
				BoldThemesFramework::$prev_next_html .= '<h4 class="nbs nsPrev"><a href="' . esc_url_raw( get_permalink( $prev ) ) . '">';
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $prev->ID ), 'thumbnail' );
				$url = $thumb[0];	
				$style_el = '';
				if ($url != '') $style_el = ' style="background-image:url(\'' . $url . '\');"';
				BoldThemesFramework::$prev_next_html .= '<span class="nbsImage"><span class="nbsImgHolder"' . $style_el . '></span></span>';
				BoldThemesFramework::$prev_next_html .= '<span class="nbsItem"><span class="nbsDir">' . esc_html__( 'previous', 'bold-news' ) . '</span><span class="nbsTitle">' . esc_html( $prev->post_title ) . '</span></span>';
				BoldThemesFramework::$prev_next_html .= '</a></h4>';
			}
			BoldThemesFramework::$prev_next_html .= '</div>';

			$next = get_adjacent_post( false, '', false );
			
			BoldThemesFramework::$prev_next_html .= '<div class="rowItem col-xs-12 col-sm-12 col-md-6 ' . esc_attr( BoldThemesFramework::$right_alignment_class )  . '">';
			if ( '' != $next ) {
				BoldThemesFramework::$prev_next_html .= '<h4 class="nbs nsNext"><a href="' . esc_url_raw( get_permalink( $next ) ) . '">';
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'thumbnail' );
				$url = $thumb[0];
				BoldThemesFramework::$prev_next_html .= '<span class="nbsItem"><span class="nbsDir">' . esc_html__( 'next', 'bold-news' ) . '</span><span class="nbsTitle">' . esc_html( $next->post_title ) . '</span></span>';
				$style_el = '';
				if ($url != '') $style_el = ' style="background-image:url(\'' . $url . '\');"';
				BoldThemesFramework::$prev_next_html .= '<span class="nbsImage"><span class="nbsImgHolder"' . $style_el . '></span></span>';
				BoldThemesFramework::$prev_next_html .= '</a></h4>';
				
			}
			BoldThemesFramework::$prev_next_html .= '</div>';

		}
		
		/* PREV-NEXT END */
		
		BoldThemesFramework::$class_array = array( 'boldSection', 'btArticle', 'gutter' );
		if ( BoldThemesFramework::$content_html != '' ) BoldThemesFramework::$class_array[] = 'divider';
		if ( BoldThemesFramework::$media_html == '' ) BoldThemesFramework::$class_array[] = 'noPhoto';
		
		BoldThemesFramework::$meta_html = '';
		if ( $blog_single_author ) BoldThemesFramework::$meta_html .= boldthemes_get_post_author();
		if ( $blog_single_date ) BoldThemesFramework::$meta_html .= boldthemes_get_post_date(); 
		if ( $blog_single_reading_time ) BoldThemesFramework::$meta_html .= bold_news_get_reading_time();
		if ( $blog_single_views_count ) BoldThemesFramework::$meta_html .= bold_news_get_view_count();
		if ( $blog_single_comments ) {
			$comments_open = comments_open();
			$comments_number = get_comments_number();
			$show_comments_number = true;
			if ( ! $comments_open ) {
				$show_comments_number = false;
			}
			if ( $show_comments_number ) BoldThemesFramework::$meta_html .= boldthemes_get_post_comments();
		}
		if ( BoldThemesFramework::$blog_single_rating ) BoldThemesFramework::$meta_html .= boldthemes_get_post_star_rating();

		if ( has_post_thumbnail() && boldthemes_get_option( 'blog_ghost_slider' ) && get_query_var('page') == 0 ) {

			$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
			$img = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );
			$thumb_img_slider = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
			$thumb_img_slider = $thumb_img_slider[0];

		?>
			<section class="boldSection fullScreenHeight btMiddleVertical btGhost btDarkSkin wBackground cover" style="background-image: url('<?php echo esc_attr( $thumb_img_slider ); ?>')">
				<div class="btCloseGhost"><?php echo boldthemes_get_icon_html( 's7_e680', '#', '', 'btIcoOutlineType btIcoDefaultColor btIcoMediumSize' ); ?></div>
				<div class="port">
					<div class="boldCell">
						<div class="boldRow">
							<div class="rowItem col-ms-12 cellCenter btMiddleVertical btTextCenter">								
								<div class="rowItemContent">
									<?php echo boldthemes_get_heading_html( BoldThemesFramework::$categories_html_single, get_the_title(), BoldThemesFramework::$meta_html, 'extralarge', BoldThemesFramework::$blog_dash, '', '' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php }

			if ( boldthemes_get_option( 'blog_single_view' ) == 'columns' ) {
				get_template_part( 'views/post/single/columns' );	
			} else if ( boldthemes_get_option( 'blog_single_view' ) == 'standard_media_top' ) {
				BoldThemesFramework::$media_position = 'top';
				get_template_part( 'views/post/single/standard' );	
			} else {
				BoldThemesFramework::$media_position = '';
				get_template_part( 'views/post/single/standard' );
			}

			get_template_part( 'views/author_info' );
			
if ( is_active_sidebar( 'post_banner' ) ) {
	echo '
	<section class="boldSection btSinglePostBanner gutter bottomMediumSpaced">
		<div class="port">
			<div class="boldRow ' . esc_attr( BoldThemesFramework::$left_alignment_class ) . '" id="boldSiteFooterWidgetsRow">';
			dynamic_sidebar( 'post_banner' );
	echo '	
			</div>
		</div>
	</section>';
}

			get_template_part( 'views/comments' );
		}

	}

get_footer();

?>