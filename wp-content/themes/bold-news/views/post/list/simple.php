<?php
	
	BoldThemesFramework::$share_html = '<div class="btIconRow">' . boldthemes_get_share_html( BoldThemesFramework::$permalink, 'blog', 'btIcoSmallSize', 'btIcoFilledType' ) . '</div>';
	if ( is_search() ) BoldThemesFramework::$share_html = '';
	
	$dash = BoldThemesFramework::$blog_use_dash ? 'bottom' : '';

	if( boldthemes_get_option( 'sidebar' ) ) {
		$left_col_class = ' col-md-6 btTextCenter';
		$right_col_class = ' col-md-6 ';
	} else {
		$left_col_class = ' col-md-6 btTextCenter';
		$right_col_class = ' col-md-6 ';

	}
	
	$l_class = esc_attr( BoldThemesFramework::$left_alignment_class )  . ' ' . ' col-sm-3';
	$r_class = 'col-sm-9';
	
	if ( ! BoldThemesFramework::$blog_side_info ) {
		$l_class = '';
		$r_class = 'col-sm-12';
	}

	echo '<article class="' . implode( ' ', get_post_class( BoldThemesFramework::$class_array ) ) . ' btBlogSimpleView">';
		echo '<div class="port">';
			echo '<div class="boldCell">';
				echo '<div class = "boldRow bottomMediumSpaced">';
					echo '<div class="rowItem ' . esc_attr( $l_class ) . ' btBlogSimpleViewCategories">';
					if ( BoldThemesFramework::$blog_side_info ) {
						echo '<div class="simpleArticleSideGutter btTextCenter">' . BoldThemesFramework::$date_author_html . '</div>';
					}
					echo '</div>';
					echo '<div class="rowItem ' . esc_attr( BoldThemesFramework::$left_alignment_class )  . ' ' . esc_attr( $r_class ) . ' ">';
						echo '<div class="rowItemContent">';
							echo boldthemes_get_heading_html( BoldThemesFramework::$supertitle_html, '<a href="' . esc_url_raw( BoldThemesFramework::$permalink ) . '">' . wp_kses_post( get_the_title() ) . '</a>', BoldThemesFramework::$subtitle_html, 'large', $dash, '', '' );
							echo '<div class="btIconRow">' . wp_kses_post( BoldThemesFramework::$share_html ) . '</div>';
						echo '</div>' ;
					echo '</div>';

				echo '</div><!-- /boldRow -->';
			echo '</div><!-- boldCell -->';			
		echo '</div><!-- port -->';
	echo '</article><!-- /articles -->';