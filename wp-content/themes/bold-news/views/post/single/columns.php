<?php
	
	echo '<article class="' . implode( ' ', get_post_class( BoldThemesFramework::$class_array ) ) . ' btPostSingleItemColumns">';
		echo '<div class="port">';
			echo '<div class="boldCell">';
				echo '<div class="boldRow bottomSmallSpaced">';
					
					$extra_class = 'col-sm-12';
					if ( BoldThemesFramework::$media_html != '' ) {
							$extra_class = 'col-sm-3';
							echo '<div class="rowItem col-sm-9 btTextCenter btGridGap5">' . BoldThemesFramework::$media_html . '</div><!-- /rowItem -->';
					}
					echo '<div class="rowItem ' . esc_attr( BoldThemesFramework::$left_alignment_class )  . ' ' . esc_attr( $extra_class ) . '">';
				
					echo '<div class="btClear btSeparator bottomSmallSpaced noBorder visible-ms visible-xs"><hr></div>';
					if( BoldThemesFramework::$hide_headline || BoldThemesFramework::$default_headline_content == "image" ) {
						echo boldthemes_get_heading_html( BoldThemesFramework::$categories_html_single, get_the_title(), BoldThemesFramework::$meta_html , 'large', $dash, '', '' ) ;
					}
					
					$extra_class = '';
					
					if ( BoldThemesFramework::$post_format == 'link' && BoldThemesFramework::$media_html == '' ) {
						$extra_class = 'linkOrQuote';
					}

					echo '<div class="btArticleExcerpt">' . BoldThemesFramework::$content_excerpt_html . '</div>';
					
					if ( BoldThemesFramework::$blog_single_rating ){
						get_template_part( 'views/author_reviews' );
					}
					
					echo '<div class="btArticleBody bottomSmallSpaced ' . esc_attr( $extra_class ) . '">' . BoldThemesFramework::$content_html . '</div>';
					
					echo wp_kses_post( BoldThemesFramework::$tags_html );
					echo '<div class="btClear btSeparator bottomSmallSpaced noBorder"><hr></div>' . BoldThemesFramework::$share_html;
					
					global $multipage;
					if ( $multipage ) { 
						echo '<div class="btClear btSeparator bottomSmallSpaced noBorder"><hr></div>';
						wp_link_pages( array( 
							'before'      => '<ul>' . esc_html__( 'Pages:', 'bold-news' ),
							'separator'   => '<li>',
							'after'       => '</ul>'
						));	
					}

					echo '</div><!-- /rowItem -->';
				echo '</div><!-- /boldRow -->';
			echo '</div><!-- /boldCell -->';
		echo '</div><!-- /port -->';
	echo '</article>';

?>