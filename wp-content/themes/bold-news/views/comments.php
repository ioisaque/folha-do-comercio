<?php

	echo '<section class="boldSection gutter bottomSemiSpaced">';
		echo '<div class="port">';
			if ( BoldThemesFramework::$blog_next_prev ) {
				echo '<div class="boldRow btNextPrevRow neighboringArticles bottomSmallSpaced">' . BoldThemesFramework::$prev_next_html . '</div><!-- /boldRow -->';
			}
			echo '<div class="boldRow">';
				echo '<div class="rowItem col-sm-12 ' . esc_attr( BoldThemesFramework::$left_alignment_class )  . '">';
									
				if ( comments_open() || get_comments_number() ) {

					comments_template();
				}

				echo '</div><!-- /rowItem -->';
			echo '</div><!-- /boldRow -->';
		echo '</div><!-- /port -->';
	echo '</section>';

?>