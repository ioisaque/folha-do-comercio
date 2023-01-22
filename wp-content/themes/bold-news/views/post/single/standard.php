<?php
		if ( BoldThemesFramework::$media_html != '' && BoldThemesFramework::$media_position == 'top' ) {
			echo '<div class="boldRow btTopMediaPosition">';
				echo '<div class="rowItem col-xs-12">' . BoldThemesFramework::$media_html . '</div><!-- /rowItem -->';
			echo '</div><!-- /boldRow -->';
		}

		$related = boldthemes_get_related_posts();
		
		$related_posts = boldthemes_get_option( 'blog_related_posts' );
		if ( BoldThemesFramework::$blog_side_info || ( $related_posts == 'show' && count( $related ) > 2 )  ) {
			BoldThemesFramework::$class_array[] = 'btArticleWithSideInfo';
		}
		
		echo '<article class="' . esc_attr( implode( ' ', get_post_class( BoldThemesFramework::$class_array ) ) ) . ' btPostSingleItemStandard">';
			echo '<div class="port">';
				echo '<div class="boldCell">';
					echo '<div class="boldRow">';
						echo '<div class="rowItem col-sm-12 ' . esc_attr( BoldThemesFramework::$left_alignment_class )  . '">';
							echo '<div class="btArticleContentWrap">';
								if ( BoldThemesFramework::$blog_side_info || ( $related_posts == 'show' && count( $related ) > 2 ) ) {
									echo '<div class="btArticleSideinfo">';
										if ( BoldThemesFramework::$blog_side_info ) { 
											echo '<div class="btArticleSideMeta">';
											echo boldthemes_get_heading_html( "", "", BoldThemesFramework::$meta_html , 'medium', "", '', '' );
											echo wp_kses_post( BoldThemesFramework::$tags_html );
											echo ( BoldThemesFramework::$share_html );
											echo '</div>';
										}
										if ( $related_posts == 'show' ) { 
											get_template_part( 'views/related_articles' );
										}

										if ( is_active_sidebar( 'left_banner' ) ) {											
											echo '
												<section class="boldSection btSinglePostBanner gutter bottomMediumSpaced">													
														';
														dynamic_sidebar( 'left_banner' );
												echo '	
																											
												</section>';
										}

									echo '</div><!-- /btArticleSideinfo -->';
								}							
								echo '<div class="btArticleContent">';
									if ( BoldThemesFramework::$hide_headline || BoldThemesFramework::$default_headline_content == 'image'  ) {
										echo boldthemes_get_heading_html( BoldThemesFramework::$categories_html_single, get_the_title(), '' , 'extralarge', BoldThemesFramework::$blog_dash, '', '' );
									}
									if ( ! BoldThemesFramework::$blog_side_info ) {
										echo '<div class="btArticleMeta">';
											echo boldthemes_get_heading_html( '', '', BoldThemesFramework::$meta_html , 'medium', '', '', '' );
										echo '</div><!-- /btArticleMeta -->';
									}

									if ( BoldThemesFramework::$media_html != '' && BoldThemesFramework::$media_position != 'top' ) {
										if ( ! ( boldthemes_get_option( 'hide_headline' ) == '' && BoldThemesFramework::$media_is_feat ) ) {
											echo '<div class="btRegularMediaPosition">' . BoldThemesFramework::$media_html . '</div><!-- /rowItem -->';
										}
									}
				
									$extra_class = '';
									
									if ( BoldThemesFramework::$post_format == 'link' && BoldThemesFramework::$media_html == '' ) {
										$extra_class = ' btLinkOrQuote';
									}

									echo '<div class="btArticleExcerpt">' . BoldThemesFramework::$content_excerpt_html . '</div>';
									
									if ( BoldThemesFramework::$blog_single_rating ){
										get_template_part( 'views/author_reviews' );
									}									
									
									echo '<div class="btArticleBody portfolioBody ' . esc_attr( BoldThemesFramework::$left_alignment_class )  . esc_attr( $extra_class ) . '">' . BoldThemesFramework::$content_html;
									echo '</div><!-- /btArticleBody -->';
								echo '</div><!-- /btArticleContent -->';
							echo '</div><!-- /btArticleContentWrap -->';
						echo '</div><!-- /rowItem -->';
					echo '</div><!-- /boldRow -->';
				global $multipage;
				if ( $multipage ) { 
					echo '<div class="boldRow bottomSmallSpaced">';
						echo '<div class="rowItem col-sm-12">';
							echo '<div class="btLinkPages"><div class="btClear btSeparator border"><hr></div>';
							wp_link_pages( array( 
								'before'      => '<ul>' . esc_html__( 'Pages:', 'bold-news' ),
								'separator'   => '<li>',
								'after'       => '</ul>'
							));

						echo '</div></div><!-- /rowItem -->';
					echo '</div><!-- /boldRow -->';
				}
				if ( ! BoldThemesFramework::$blog_side_info ) {
					echo '<div class="boldRow topMediumSpaced boldShare">';
						echo '<div class="rowItem col-sm-6 tagsRowItem  ' . esc_attr( BoldThemesFramework::$left_alignment_class )  . '">';

							echo wp_kses_post( BoldThemesFramework::$tags_html );

						echo '</div><!-- /rowItem -->';
						echo '<div class="rowItem col-sm-6 cellRight shareRowItem  ' . esc_attr( BoldThemesFramework::$right_alignment_class )  . '">';

							echo '<div class="socialRow">' . BoldThemesFramework::$share_html . '</div>';
					
						echo '</div><!-- /rowItem -->';
					echo '</div><!-- /boldRow -->';
				}
				
				if ( $related_posts == 'show_under_post' ) { 
					echo '<div class="boldRow topMediumSpaced boldRelated">';
						echo '<div class="rowItem col-sm-12 ' . esc_attr( BoldThemesFramework::$left_alignment_class )  . '">';

							get_template_part( 'views/related_articles' );

						echo '</div><!-- /rowItem -->';
					echo '</div><!-- /boldRow -->';
				}

			echo '</div><!-- /boldCell -->';
		echo '</div><!-- /port -->';
	echo '</article>';

?>