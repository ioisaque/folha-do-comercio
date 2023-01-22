<div class="btSinglePostTemplate btSinglePostTemplateCount <?php echo implode( ' ', $class ); ?>"<?php echo $el_style_attr; ?>>
	{{ video_player }}
	<div class="btPostImageHolder">
		<?php if ( $image_position == 'background' ) { ?>
			<div class="btSinglePostBackgroundImage" <?php echo $style_attr; ?>><a href="{{ permalink1 }}"></a></div>{{ ! permalink2 }}
		<?php } else if ( $image_position == 'left' ) { ?>
			<div class="btSinglePostLeftImage"><div class="btSinglePostLeftContainer" <?php echo $style_attr; ?>><a href="{{ permalink2 }}"></a></div></div>{{ ! permalink1 }}
		<?php } else { ?>
			{{ ! bg_image }}{{ ! permalink1 }}{{ ! permalink2 }}
		<?php } ?>
		<?php if ( $image_position == 'top' ) { ?>
			<div class="btSinglePostImage">
				<a href="{{ permalink3 }}">{{ image }}</a>
			</div>
		<?php } else { ?>
			{{ ! image }}{{ ! permalink3 }}
		<?php } ?>
		<div class="btSinglePostTopMetaData">
			<div class="btSinglePostFormat">{{ video_player_text }}</div>
			<?php if ( $image_position != 'left' || $template != 'small' ) { ?>
				<?php if ( ! empty( $show_categories ) && $show_categories == true ) { ?>
					{{ categories }}
				<?php } else { ?>
					{{ ! categories }}
				<?php } ?>
			<?php } ?>
		</div>
	</div>
	<div class="btSinglePostContent">
		<?php if ( $image_position == 'left' && $template == 'small' ) { ?>
		<div class="btSinglePostTopMetaData">
			<?php if ( ! empty( $show_categories ) && $show_categories == true ) { ?>
				{{ categories }}
			<?php } else { ?>
				{{ ! categories }}
			<?php } ?>
		</div>
		<?php } ?>	
		<div class="btSinglePostTopData">
			<?php if ( ! empty( $show_date ) && $show_date == true ) { ?>
				<span class="btArticleDate">{{ date }}</span>
			<?php } else { ?>
				{{ ! date }}
			<?php } ?>
			<?php if ( ! empty( $show_author ) && $show_author == true ) { ?>
				{{ author }}
			<?php } else { ?>
				{{ ! author }}
			<?php } ?>
		</div>
		<h4>
			<a href="{{ permalink4 }}">
				{{ title }}
			</a>
		</h4>
		<?php if ( ! empty( $show_excerpt ) && $show_excerpt == true ) { ?>
		<div class="btSinglePostExcerpt">
			{{ excerpt }}
		</div>
		<?php } else { ?>
			{{ ! excerpt }}
		<?php } ?>

		<?php if ( (! empty( $show_comments ) && $show_comments == true) || ( ! empty( $show_reading_time ) && $show_reading_time == true ) || ( ! empty( $show_views_count ) && $show_views_count == true ) || ( ! empty( $show_review ) && $show_review == true ) ) { ?>
			<div class="btSinglePostBottomData">
				<?php if ( ! empty( $show_comments ) && $show_comments == true ) { ?>
					{{ comments }}
				<?php } else { ?>
					{{ ! comments }}
				<?php } ?>
				<?php if ( ! empty( $show_reading_time ) && $show_reading_time == true ) { ?>
					{{ reading_time }}
				<?php } else { ?>
					{{ ! reading_time }}
				<?php } ?>
				<?php if ( ! empty( $show_views_count ) && $show_views_count == true ) { ?>
					{{ views_count }}
				<?php } else { ?>
					{{ ! views_count }}
				<?php } ?>
				<?php if ( ! empty( $show_review ) && $show_review == true ) { ?>
					{{ star_rating }}
				<?php } else { ?>
					{{ ! star_rating }}
				<?php } ?>
			</div>
		<?php } else { ?>{{ ! comments }}{{ ! reading_time }}{{ ! views_count }}{{ ! star_rating }}<?php } ?>

	</div>
</div>