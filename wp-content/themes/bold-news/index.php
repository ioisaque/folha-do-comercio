<?php 

if ( get_option( 'page_for_posts' ) ) {
	BoldThemesFramework::$page_for_header_id = get_option( 'page_for_posts' );
}

get_header();

if ( have_posts() ) {
	
	while ( have_posts() ) {
	
		the_post();
		BoldThemesFramework::$permalink = get_permalink();
		BoldThemesFramework::$post_format = get_post_format();
		
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
		
		if ( has_post_thumbnail() ) {
		
			$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
			$img = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );
			
			if ( $img != '' ) {
				BoldThemesFramework::$media_html = boldthemes_get_media_html( 'image', array( BoldThemesFramework::$permalink, $img[0] ) );
			}
			
		}
		
		if ( BoldThemesFramework::$post_format == 'image' ) {
		
			foreach ( $images as $img ) {
				$img = wp_get_attachment_image_src( $img['ID'], 'large' );
				BoldThemesFramework::$media_html = boldthemes_get_media_html( 'image', array( BoldThemesFramework::$permalink, $img[0] ) );
				break;
			}
			
		} else if ( BoldThemesFramework::$post_format == 'gallery' ) {
		
			if ( count( $images ) > 0 ) {
				$images_ids = array();
				foreach ( $images as $img ) {
					$images_ids[] = $img['ID'];
				}			
				BoldThemesFramework::$media_html = boldthemes_get_media_html( 'gallery', array( $images_ids ) );
			}
			
		} else if ( BoldThemesFramework::$post_format == 'video' ) {
			
			BoldThemesFramework::$media_html = boldthemes_get_media_html( 'video', array( $video ) );
			
		} else if ( BoldThemesFramework::$post_format == 'audio' ) {
			
			BoldThemesFramework::$media_html = boldthemes_get_media_html( 'audio', array( $audio ) );
			
		} else if ( BoldThemesFramework::$post_format == 'link' ) {
			
			BoldThemesFramework::$media_html = boldthemes_get_media_html( 'link', array( $link_url, $link_title ) );
			
		} else if ( BoldThemesFramework::$post_format == 'quote' ) {
			
			BoldThemesFramework::$media_html = boldthemes_get_media_html( 'quote', array( $quote, $quote_author ) );
			
		}
		
		BoldThemesFramework::$content_html = apply_filters( 'the_content', get_the_content( '', false ) );
		BoldThemesFramework::$content_html = str_replace( ']]>', ']]&gt;', BoldThemesFramework::$content_html );
		
		/* GET MEDIA HTML END */
		
		/* CUSTOMIZER START */
		
		$blog_author = boldthemes_get_option( 'blog_author' );
		$blog_date = boldthemes_get_option( 'blog_date' );
		$blog_reading_time = boldthemes_get_option( 'blog_reading_time' );		
		$blog_views_count = boldthemes_get_option( 'blog_views_count' );
		$blog_rating = boldthemes_get_option( 'blog_rating' );
		$blog_categories = boldthemes_get_option( 'blog_categories' );
		$blog_comments = boldthemes_get_option( 'blog_comments' );		
		BoldThemesFramework::$blog_side_info = boldthemes_get_option( 'blog_side_info' ) && ( $blog_date || $blog_author );
		$blog_list_view = boldthemes_get_option( 'blog_list_view' );
		BoldThemesFramework::$blog_use_dash = boldthemes_get_option( 'blog_use_dash' );
		
		/* CUSTOMIZER END */
			
		BoldThemesFramework::$class_array = array( 'btArticleListItem', 'animate', 'animate-fadein', 'animate-moveup', 'gutter' );
		if ( BoldThemesFramework::$blog_side_info ) BoldThemesFramework::$class_array[] = 'btHasAuthorInfo';
		if ( BoldThemesFramework::$media_html != '' ) BoldThemesFramework::$class_array[] = 'wPhoto';
		
		/* DATA START */

		BoldThemesFramework::$supertitle_html = '';
		if ( $blog_categories ) BoldThemesFramework::$supertitle_html = boldthemes_get_post_categories();
		
		BoldThemesFramework::$subtitle_html = '';
		if ( $blog_reading_time ) BoldThemesFramework::$subtitle_html .= bold_news_get_reading_time();
		if ( $blog_views_count ) BoldThemesFramework::$subtitle_html .= bold_news_get_view_count();
		if ( $blog_comments ) {
			$comments_open = comments_open();
			$comments_number = get_comments_number();
			$show_comments_number = true;
			if ( ! $comments_open ) {
				$show_comments_number = false;
			}
			if ( $show_comments_number ) BoldThemesFramework::$subtitle_html .= boldthemes_get_post_comments();
		}
		if ( $blog_rating ) BoldThemesFramework::$subtitle_html .= boldthemes_get_post_star_rating();
		
		BoldThemesFramework::$date_author_html = '';
		if( $blog_author ) BoldThemesFramework::$date_author_html .= boldthemes_get_post_author();
		if( $blog_date ) BoldThemesFramework::$date_author_html .= boldthemes_get_post_date(); 
		
		if ( ! BoldThemesFramework::$blog_side_info ) {
			BoldThemesFramework::$subtitle_html = BoldThemesFramework::$date_author_html . BoldThemesFramework::$subtitle_html;
		}

		/* DATA END */

		
		
		BoldThemesFramework::$content_final_html = get_post()->post_excerpt != '' || is_search() ? '<p>' . esc_html( get_the_excerpt() ) . '</p>' : BoldThemesFramework::$content_html;

		if ( boldthemes_get_option( 'blog_list_view' ) == 'columns' ) {
			get_template_part( 'views/post/list/columns' );
		} else if ( boldthemes_get_option( 'blog_list_view' ) == 'columns-swap' ) {
			BoldThemesFramework::$class_array[] = 'btListSwap';
			get_template_part( 'views/post/list/columns' );
		} else if (boldthemes_get_option( 'blog_list_view' ) == 'simple' ) {
			get_template_part( 'views/post/list/simple' );
		} else {
			get_template_part( 'views/post/list/standard' );
		}

	}
	
	boldthemes_pagination();
	
} else {
	if ( is_search() ) { ?>
		<article class="btNoSearchResults boldSection gutter bottomSemiSpaced topSemiSpaced ">
			<div class="port">
			<?php echo boldthemes_get_heading_html( '', esc_html__( 'We are sorry, no results for: ', 'bold-news' ) . get_query_var( 's' ), '<a href="' . site_url() . '">' . esc_html__( 'Back to homepage', 'bold-news' ) . '</a>', 'medium', '', '', '' ) ?>
			</div>
		</article>
	<?php }
}
 
?>

<?php

get_footer();

?>