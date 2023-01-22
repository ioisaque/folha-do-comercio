<?php

	BoldThemesFramework::$share_html = '<div class="btIconRow">' . boldthemes_get_share_html( BoldThemesFramework::$permalink, 'blog', 'btIcoSmallSize', 'btIcoFilledType' ) . '</div>';
	if ( is_search() ) BoldThemesFramework::$share_html = '';

	$dash = BoldThemesFramework::$blog_use_dash ? 'bottom' : '';
	
	echo '<article class="' . esc_attr( implode( ' ', get_post_class( BoldThemesFramework::$class_array ) ) ) . '">';
		echo '<div class="port">';
			echo '<div class="boldCell">';
				echo '<div class = "boldRow bottomMediumSpaced">';
					echo '<div class="rowItem col-sm-12">';
						echo '<div class="rowItemContent ' . esc_attr( BoldThemesFramework::$left_alignment_class )  . '">';
							if ( BoldThemesFramework::$blog_side_info ) {
									echo '<div class="articleSideGutter btTextCenter">' . BoldThemesFramework::$date_author_html . '</div>';
								}
								
								$extra_class = '';
								if ( BoldThemesFramework::$post_format == 'link' && BoldThemesFramework::$media_html == '' ) {
									$extra_class = ' linkOrQuote';
								}

								echo '<div class="btArticleListBody' . esc_attr( $extra_class ) . '">';				
									if ( BoldThemesFramework::$media_html != '' ) {
										echo ' ' . BoldThemesFramework::$media_html;
									}

									echo '<div class="btClear btSeparator bottomSmallSpaced noBorder"><hr></div>';
									echo boldthemes_get_heading_html( BoldThemesFramework::$supertitle_html, '<a href="' . esc_url_raw( BoldThemesFramework::$permalink ) . '">' . get_the_title() . '</a>', BoldThemesFramework::$subtitle_html, 'large', $dash, '', '' );
									echo '<div class="btArticleListBodyContent">' . BoldThemesFramework::$content_final_html . '</div>';
									echo '<div class="btClear btSeparator bottomSmallSpaced noBorder"><hr></div>';
									echo '<div class="boldRow btArticleFooter">';
										echo '<div class="boldRowInner">';
											echo '<div class="rowItem col-md-6 col-ms-12 btShareArticle btMiddleVertical ' . esc_attr( BoldThemesFramework::$left_alignment_class ) .'"><div class="rowItemContent">' . BoldThemesFramework::$share_html . '</div></div>';
											 $continue_ico = 'fa_f061';
											 $continue_ico_style = 'btnRightPosition';
											 if ( is_rtl() ) {
												 $continue_ico_style = 'btnLeftPosition';
												 $continue_ico = 'fa_f060';
											 };
											 $continue_ico_style .= ' btContinueReading btnFilledStyle btnAccentColor btnExtraSmall btnNormalWidth btnIco';
											echo '<div class="rowItem col-md-6 col-ms-12 btReadArticle btMiddleVertical ' . esc_attr( BoldThemesFramework::$right_alignment_class ) . '"><div class="rowItemContent">' . boldthemes_get_button_html( $continue_ico, BoldThemesFramework::$permalink, esc_html__( 'CONTINUE READING', 'bold-news' ), $continue_ico_style , '', '' ) . '</div></div>';
										echo '</div><!-- /boldRowInner -->';
									echo '</div><!-- /boldRow -->';
								echo '</div><!-- /btArticleListBody -->' ;
							echo '</div><!-- /rowItemContent -->' ;
						echo '</div><!-- /rowItem -->';
				echo '</div><!-- /boldRow -->';			
			echo '</div><!-- boldCell -->';			
		echo '</div><!-- port -->';
	echo '</article><!-- /articles -->';

?>