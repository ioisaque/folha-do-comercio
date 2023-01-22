<div class="<?php echo implode( ' ', $class );?>"<?php echo $style_attr;?>>
	{{ video_player }}
	<div class="btSliderPort wBackground cover <?php echo implode( ' ', $class_single_post );?>" <?php echo $bg_style; ?>>
		<div class="btSliderCell" data-slick="yes">
			<div class="btSlideGutter">
				 <div class="btSlidePane">
					
					<div class="btSinglePostTemplate btSinglePostTemplateCount <?php echo implode( ' ', $class_template ); ?>">
						<div class="btPostImageHolder" <?php echo $bg_style_side; ?>>
							<?php if ( $image_position == 'background' ) { ?>
								<div class="btSinglePostBackgroundImage"><a href="{{ permalink1 }}"></a></div>
							<?php } ?>					
							<div class="btSinglePostTopMetaData">
								<div class="btSinglePostFormat">{{ video_player_text }}</div>
								<?php if ( $image_position != 'side' || $template != 'small' ) { ?>
									<?php if ( ! empty( $show_categories ) && $show_categories == true ) { ?>
										{{ categories }}
									<?php } else { ?>
										{{ ! categories }}
									<?php } ?>
								<?php } ?>
							</div>
						</div>
						<div class="btSinglePostContent">
							<?php if ( $image_position == 'side' && $template == 'small' ) { ?>
							<div class="btSinglePostTopMetaData">
								<?php if ( ! empty( $show_categories ) && $show_categories == true ) { ?>
									{{ categories }}
								<?php } else { ?>
									{{ ! categories }}
								<?php } ?>
							</div>
							<?php } ?>	
							<?php if ( ( ! empty( $show_date ) && $show_date == true ) || ( ! empty( $show_author ) && $show_author == true ) ) { ?>
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
							<?php } ?>
							<h4>
								<a href="{{ permalink2 }}">
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
							<?php if ( ( ! empty( $show_comments ) && $show_comments == true ) || ( ! empty( $show_reading_time ) && $show_reading_time == true ) || ( ! empty( $show_views_count ) && $show_views_count == true ) || ( ! empty( $show_review  ) && $show_review == true ) ) { ?>
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

				</div>
			</div>
		</div>
	</div>	
</div><?php if ( $image_position != 'background' && $image_position != 'side' ) echo '{{ ! bg_image }}';