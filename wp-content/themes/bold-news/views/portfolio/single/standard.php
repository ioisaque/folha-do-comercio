<?php

	$extra_class = 'col-sm-12';
	if ( ( BoldThemesFramework::$cf != '' && count( BoldThemesFramework::$cf ) > BoldThemesFramework::$data_items_split ) || ! BoldThemesFramework::$hide_headline == 'true' ) {
		$extra_class = ' col-sm-9';
	}

	echo '<article class="' . esc_attr( implode( ' ', get_post_class( BoldThemesFramework::$class_array ) ) ) . ' btPortfolioSingleItemStandard">';
		echo '<div class="port">';
			echo '<div class="boldCell">';
			
			if ( BoldThemesFramework::$hide_headline || ( isset( BoldThemesFramework::$default_headline_content ) && BoldThemesFramework::$default_headline_content == "image" ) ) {
				echo '<div class="boldRow btArticleHeader">';
					echo '<div class="rowItem col-sm-9 ' . esc_attr( BoldThemesFramework::$left_alignment_class )  . '">';
						
						echo boldthemes_get_heading_html( BoldThemesFramework::$categories_html, BoldThemesFramework::$full_title, boldthemes_get_the_excerpt( get_the_ID() ), 'large', BoldThemesFramework::$pf_dash, 'wArticleMeta', '' ) ;
						
					echo '</div><!-- /rowItem -->';
					echo '<div class="rowItem col-sm-3 ' . esc_attr( BoldThemesFramework::$right_alignment_class )  . '">';
						echo '<dl class="btArticleMeta onBottom">';
						echo wp_kses_post( BoldThemesFramework::$meta_right_html );
						echo '</dl>';
					echo '</div><!-- /rowItem -->';
				echo '</div><!-- /boldRow -->';
			}
			
			if ( BoldThemesFramework::$media_html != '' ) {
				echo '<div class="boldRow boldRow bottomMediumSpaced">';
					echo '<div class="rowItem col-sm-12 btTextCenter btGridGap5">' . BoldThemesFramework::$media_html . '</div><!-- /rowItem -->';
				echo '</div><!-- /boldRow -->';
			}
			
			echo '<div class="boldRow">';
				echo '<div class="rowItem ' . esc_attr( BoldThemesFramework::$left_alignment_class )  . ' ' . esc_attr( $extra_class ) . '">';
					echo '<div class="boldArticleBody btArticleBody">' . BoldThemesFramework::$content_html . '</div>';
				echo '</div><!-- /rowItem -->';
				
				if ( ( BoldThemesFramework::$cf != '' && count( BoldThemesFramework::$cf ) > BoldThemesFramework::$data_items_split ) || ! BoldThemesFramework::$hide_headline ) {
					echo '<div class="rowItem col-sm-3 ' . esc_attr( BoldThemesFramework::$right_alignment_class )  . '">';
						echo '<dl class="btArticleMeta onBottom">';
						if ( ! BoldThemesFramework::$hide_headline ) {
							echo wp_kses_post( BoldThemesFramework::$cf_right_html );
						}
						for ( $i = BoldThemesFramework::$data_items_split; $i < count( BoldThemesFramework::$cf ); $i++ ) {
							$item = BoldThemesFramework::$cf[ $i ];
							$item_key = substr( $item, 0, strpos( $item, ':' ) );
							$item_value = substr( $item, strpos( $item, ':' ) + 1 );
							echo '<dt>' . wp_kses_post( $item_key ) . '</dt>';
							echo '<dd>' . wp_kses_post( $item_value ) . '</dd>';
						}
						echo '</dl>';
					echo '</div><!-- /rowItem -->';
				}
			echo '</div><!-- /boldRow -->';
			
			echo '<div class="boldRow">';
				echo '<div class="rowItem col-sm-12 ' . esc_attr( BoldThemesFramework::$right_alignment_class )  . ' btArticleShare">';
					echo '<div class="socialRow ">' . boldthemes_get_share_html( BoldThemesFramework::$permalink, 'pf', 'btIcoSmallSize', 'btIcoFilledType' ) . '</div>';
				echo '</div><!-- /rowItem -->';
			echo '</div><!-- /boldRow >';
			
			echo '<div class="boldRow">';
				echo '<div class="rowItem col-sm-12">';
						echo '<div class="btLinkPages"><div class="btClear btSeparator border"><hr></div>';
				wp_link_pages( array( 
					'before'      => '<ul>' . esc_html__( 'Pages:', 'bold-news' ),
					'separator'   => '<li>',
					'after'       => '</ul>'
				));
				
				echo '</div></div><!-- /rowItem -->';
			echo '</div><!-- /boldRow -->';
		echo '</div><!-- /port -->';
	echo '</article>';

?>