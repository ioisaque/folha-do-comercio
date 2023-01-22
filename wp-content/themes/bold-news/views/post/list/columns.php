<?php

	BoldThemesFramework::$share_html = '<div class="btIconRow">' . boldthemes_get_share_html( BoldThemesFramework::$permalink, 'blog', 'btIcoSmallSize', 'btIcoFilledType' ) . '</div>';
	if ( is_search() ) BoldThemesFramework::$share_html = '';
	
	$dash = BoldThemesFramework::$blog_use_dash ? 'bottom' : '';

	if( boldthemes_get_option( 'sidebar' ) ) {
		$left_col_class = ' col-md-6 ';
		$right_col_class = ' col-md-6 ';
	} else {
		$left_col_class = ' col-md-6 ';
		$right_col_class = ' col-md-6 ';

	}
	
	echo '<article class="' . implode( ' ', get_post_class( BoldThemesFramework::$class_array ) ) . ' btBlogColumnView">';
		echo '<div class="port">';
			echo '<div class="boldCell">';

				echo '<div class = "boldRow">';
					echo '<div class="rowItem col-sm-12">';
						echo '<div class="rowItemContent">';

							if ( BoldThemesFramework::$blog_side_info ) {
								echo '<div class="articleSideGutter btTextCenter">' . wp_kses_post( BoldThemesFramework::$date_author_html ) . '</div>';
							}

							echo '<div class = "btArticleListBody">'; 
								echo '<div class = "boldRow">';
									if ( BoldThemesFramework::$media_html != '' ) {
										echo '<div class="rowItem ' . esc_attr( $left_col_class ) . ' btTextCenter"><div class="rowItemContent">' . BoldThemesFramework::$media_html . '</div></div>';
									} else {

									}

									echo '<div class="rowItem ' . esc_attr( BoldThemesFramework::$left_alignment_class )  . ' ' . esc_attr( $right_col_class ) . '">';
										echo '<div class="rowItemContent">';
											echo boldthemes_get_heading_html( BoldThemesFramework::$supertitle_html, '<a href="' . esc_url_raw( BoldThemesFramework::$permalink ) . '">' . get_the_title() . '</a>', BoldThemesFramework::$subtitle_html , 'medium', $dash, '', '' );
											echo '<div class="btArticleListBodyContent">' . BoldThemesFramework::$content_final_html . '</div>';
											echo '<div class="btIconRow">' . BoldThemesFramework::$share_html . '</div>';
										echo '</div><!-- /rowItemContent -->' ;
									echo '</div><!-- /rowItem -->';
								echo '</div><!-- /boldRow -->';
							echo '</div><!-- /btArticleListColumsBodyContent -->';
						
						echo '</div><!-- /rowItemContent -->';
					echo '</div><!-- /rowItem -->';
				echo '</div><!-- /boldRow -->';
			
			echo '</div><!-- boldCell -->';			
		echo '</div><!-- port -->';
	echo '</article><!-- /articles -->';

?>