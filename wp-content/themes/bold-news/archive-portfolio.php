<?php

if ( get_option( 'page_for_posts' ) ) {
	BoldThemesFramework::$page_for_header_id = get_option( 'page_for_posts' );
}

get_header();

if ( have_posts() ) {
	
	while ( have_posts() ) {
	
		the_post();
		
		$images = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_images', 'type=image' );
		if ( $images == null ) $images = array();
		$video = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_video' );
		$audio = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_audio' );
		
		$link_title = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_link_title' );
		$link_url = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_link_url' );
		$quote = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_quote' );
		$quote_author = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_quote_author' );
		
		$permalink = get_permalink();
		
		BoldThemesFramework::$post_format = get_post_format();
	
		BoldThemesFramework::$media_html = '';
		
		if ( has_post_thumbnail() ) {
		
			$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
			$img = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );
			
			if ( $img != '' ) {
				BoldThemesFramework::$media_html = boldthemes_get_media_html( 'image', array( $permalink, $img[0] ) );
			}

		} else if ( count( $images ) == 1 ) {
		
			foreach ( $images as $img ) {
				$img = wp_get_attachment_image_src( $img['ID'], 'large' );
				BoldThemesFramework::$media_html = boldthemes_get_media_html( 'image', array( $permalink, $img[0] ) );
				break;
			}
			
		} else if ( count( $images ) > 1 ) {

			$images_ids = array();
			foreach ( $images as $img ) {
				$images_ids[] = $img['ID'];
			}			
			BoldThemesFramework::$media_html = boldthemes_get_media_html( 'gallery', array( $images_ids ) );
			
		} 
		
		if ( $video != '' ) {
			
			BoldThemesFramework::$media_html = boldthemes_get_media_html( 'video', array( $video ) );
			
		} else if ( $audio != '' ) {
			
			BoldThemesFramework::$media_html = boldthemes_get_media_html( 'audio', array( $audio ) );
			
		}
		
		BoldThemesFramework::$content_html = apply_filters( 'the_content', get_the_content( '', false ) );
		BoldThemesFramework::$content_html = str_replace( ']]>', ']]&gt;', BoldThemesFramework::$content_html );
		
		BoldThemesFramework::$categories_html = boldthemes_get_post_categories();

		if ( is_search() ) BoldThemesFramework::$share_html = '';
		
		$blog_author = boldthemes_get_option( 'blog_author' );
		$blog_date = boldthemes_get_option( 'blog_date' );		
		
		BoldThemesFramework::$blog_side_info = boldthemes_get_option( 'blog_side_info' );
		$blog_list_view = boldthemes_get_option( 'blog_list_view' );
		
		BoldThemesFramework::$class_array = array( 'btArticleListItem', 'animate', 'animate-fadein', 'animate-moveup', 'btTextLeft', 'gutter' );
		
		if ( BoldThemesFramework::$blog_side_info ) BoldThemesFramework::$class_array[] = 'btHasAuthorInfo';
		if ( BoldThemesFramework::$media_html != '' ) BoldThemesFramework::$class_array[] = 'wPhoto';

		$comments_open = comments_open();
		$comments_number = get_comments_number();
		$show_comments_number = true;
		if ( ! $comments_open && $comments_number == 0 ) {
			$show_comments_number = false;
		}

		$post_type = get_post_type();
		
		$content_final_html = get_post()->post_excerpt != '' ? '<p>' . esc_html( get_the_excerpt() ) . '</p>' : BoldThemesFramework::$content_html;

		if ( boldthemes_get_option( 'blog_list_view' ) == 'columns' ) {
			get_template_part( 'views/post-list-columns' );
		} else {
			get_template_part( 'views/post-list-standard' );
		}

	}
	
	boldthemes_pagination();
	
} else {
	if ( is_search() ) { ?>
		<article class="btNoSearchResults">
			<?php echo boldthemes_get_heading_html( esc_html__( 'We are sorry, no results for: ', 'bold-news' ) . get_query_var( 's' ), '', "<a href='" . site_url() . "'>" . esc_html__( 'Back to homepage', 'bold-news' )."</a>", 'extralarge', 'bottom', '', '' ) ?>
		</article>
	<?php }
}
 
?>

<?php

get_footer();

?>