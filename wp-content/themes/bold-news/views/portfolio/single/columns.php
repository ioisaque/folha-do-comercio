<?php

	echo '<article class="' . esc_attr( implode( ' ', get_post_class( BoldThemesFramework::$class_array ) ) ) . ' btPortfolioSingleItemColumns">';
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
						echo boldthemes_get_heading_html( '', BoldThemesFramework::$full_title . "</em>", boldthemes_get_the_excerpt( get_the_ID() ), 'large', BoldThemesFramework::$pf_dash, 'wArticleMeta', '' ) ;
					}
					
					echo '<div class="boldArticleBody btArticleBody">' . BoldThemesFramework::$content_html . '</div>';
					
					
					if ( ( BoldThemesFramework::$cf != '' && count( BoldThemesFramework::$cf ) > BoldThemesFramework::$data_items_split ) || BoldThemesFramework::$categories_html != '' || BoldThemesFramework::$cf_right_html != '' ) {
						echo '<dl class="btArticleMeta onBottom">';
						if ( BoldThemesFramework::$categories_html != '' ) {
							echo '<dt>' . esc_html__( 'Category', 'bold-news' ) . '</dt>';
							echo '<dd>' . BoldThemesFramework::$categories_html . '</dd>';
						}
						echo wp_kses_post( BoldThemesFramework::$cf_right_html );
						for ( $i = BoldThemesFramework::$data_items_split; $i < count( BoldThemesFramework::$cf ); $i++ ) {
							$item = BoldThemesFramework::$cf[ $i ];
							$item_key = substr( $item, 0, strpos( $item, ':' ) );
							$item_value = substr( $item, strpos( $item, ':' ) + 1 );
							echo '<dt>' . wp_kses_post( $item_key ) . '</dt>';
							echo '<dd>' . wp_kses_post( $item_value ) . '</dd>';
						}
						echo '</dl>';
					}

					echo '<div class="btClear btSeparator noBorder"><hr></div>';
						
					echo '<div class="socialRow">' . boldthemes_get_share_html( BoldThemesFramework::$permalink, 'pf', 'btIcoSmallSize', 'btIcoFilledType' ) . '</div>';
										
					wp_link_pages( array( 
						'before'      => '<ul>' . esc_html__( 'Pages:', 'bold-news' ),
						'separator'   => '<li>',
						'after'       => '</ul>'
					));					

					echo '</div><!-- /rowItem -->';
				echo '</div><!-- /boldRow -->';
			echo '</div><!-- boldCell -->';
		echo '</div><!-- /port -->';
	echo '</article>';

?>