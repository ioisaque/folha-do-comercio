<?php
	
$related = boldthemes_get_related_posts();

$related_posts = boldthemes_get_option( 'blog_related_posts' );

if ( $related_posts != 'hide' && count( $related ) > 2  ) {

	$side_info = boldthemes_get_option( 'blog_side_info' );

	if ( $related_posts == 'show_under_post' ) { ?>

		<!-- Bottom related -->
		<div class="btRelatedPosts">
			<h3><span><?php _e( 'Related Articles', 'bold-news' ); ?></span></h3>
			<div class="boldRow">
		
		<?php

		foreach ( $related as $item ) {

			$img = wp_get_attachment_image_src( $item['thumbnail'], 'medium' );
			$img_src = $img[0];

			$blog_square_avatar = boldthemes_get_option( 'blog_square_avatar' );
			$avatar_html = ( $blog_square_avatar ) ? get_avatar( $item['author_id'], 60, '', '', array('class' => 'square_avatar') ) : get_avatar( $item['author_id'], 60 );

			$avatar_html = str_replace ( 'width=\'60\'', 'width=\'30\'', $avatar_html );
			$avatar_html = str_replace ( 'height=\'60\'', 'height =\'30\'', $avatar_html );
			$avatar_html = str_replace ( 'width="60"', 'width="30"', $avatar_html );
			$avatar_html = str_replace ( 'height="60"', 'height ="30"', $avatar_html );

			?>

			<div class="rowItem col-md-4 col-sm-12">
				<div class="btSinglePostTemplate smallTemplate backgroundImagePosition">

					<div class="btPostImageHolder">
						<div class="btSinglePostBackgroundImage" style="background-image:url(<?php echo esc_url_raw( $img_src ); ?>); ">
							<a href="<?php echo esc_url_raw( $item['permalink'] ); ?>" title="<?php echo esc_attr( $item['title'] ); ?>" target="_blank"></a>
						</div>
						<div class="btSinglePostTopMetaData">
							<div class="btSinglePostFormat"></div>
							<?php if ( boldthemes_get_option( 'blog_categories' ) ) {
								echo wp_kses_post( $item['category'] ); 
							} ?>
						</div>
					</div>

					<div class="btSinglePostContent">
						<div class="btSinglePostTopData">	
							<?php if ( boldthemes_get_option( 'blog_date' ) ) { ?>
								<span class="btArticleDate"><?php echo wp_kses_post( $item['date'] ); ?></span>
							<?php } ?>
							<?php if ( boldthemes_get_option( 'blog_author' ) ) { ?>
								<a href="<?php echo esc_url_raw( $item['author_url'] ); ?>" class="btArticleAuthor"> <?php echo wp_kses_post( $avatar_html ); ?><?php echo wp_kses_post( $item['author_name'] ); ?></a>
							<?php } ?>
						</div>
						<h4>
							<a href="<?php echo esc_url_raw( $item['permalink'] ); ?>" title="<?php echo wp_kses_post( $item['title'] ); ?>" target="_blank"><?php echo wp_kses_post( $item['title'] ); ?></a>
						</h4>
					</div>

				</div>
			</div>

		<?php } ?>

			</div>
		</div>

	<?php } else if ( $related_posts != 'show_under_post' ) { ?>

		<!-- Side related -->
		<div class="btRelatedPosts">
			<h3><span><?php _e( 'Related Articles', 'bold-news' ); ?></span></h3>
			<div class="boldRow">
			
				<?php
		
				$i = 0;

				foreach ( $related as $item ) { 

					if ( $i == 0 ) {

						$img = wp_get_attachment_image_src( $item['thumbnail'], 'medium' );
						$img_src = $img[0];

						?>

						<div class="rowItem col-sm-12">
							<div class="btSinglePostTemplate smallTemplate <?php echo esc_attr( $item['format'] ); ?> backgroundImagePosition">
								<div class="btPostImageHolder">
									<div class="btSinglePostBackgroundImage" style="background-image:url(<?php echo esc_url_raw( $img_src ); ?>); ">
										<a href="<?php echo esc_url_raw( $item['permalink'] ); ?>" title="<?php echo esc_attr( $item['title'] ); ?>" target="_blank"></a>
									</div>
									<div class="btSinglePostTopMetaData">
										<div class="btSinglePostFormat"></div>
										<?php if ( boldthemes_get_option( 'blog_categories' ) ) {
											echo wp_kses_post( $item['category'] ); 
										} ?>
									</div>
								</div>
								<div class="btSinglePostContent">
									<h4>
										<a href="<?php echo esc_url_raw( $item['permalink'] ); ?>" title="<?php echo esc_attr( $item['title'] ); ?>" target="_blank"><?php echo esc_attr( $item['title'] ); ?></a>
									</h4>
								</div>
							</div>
						</div>

					<?php } else { ?>

						<div class="rowItem col-sm-12">
							<div class="btSinglePostTemplate smallTemplate no-imageImagePosition">
								<div class="btPostImageHolder">
									<div class="btSinglePostTopMetaData">
										<div class="btSinglePostFormat"></div>
										<?php if ( boldthemes_get_option( 'blog_categories' ) ) {
											echo wp_kses_post( $item['category'] ); 
										} ?>
									</div>
								</div>
								<div class="btSinglePostContent">
									<h4>
										<a href="<?php echo esc_url_raw( $item['permalink'] ); ?>" title="<?php echo esc_attr( $item['title'] ); ?>" target="_blank"><?php echo wp_kses_post( $item['title'] ); ?></a>
									</h4>
								</div>
							</div>
						</div>

						<div class="rowItem col-sm-12">
							<div class="btClear btSeparator topSmallSpaced bottomSmallSpaced border"><hr></div>
						</div>

					<?php }

					$i++;

				} ?>

			</div>
		</div>

	<?php }

}

 ?>