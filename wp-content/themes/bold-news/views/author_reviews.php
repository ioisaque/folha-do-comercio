<?php

$review = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_review' );
$review_arr = explode( PHP_EOL, $review );
$review_summary = boldthemes_rwmb_meta( BoldThemesFramework::$pfx . '_review_summary' );

if ( $review != '' && $review_summary != '' ) { ?>

	<div class="btReviewHolder">
		<div class="boldRow">
			<div class="rowItem col-sm-12 col-md-6">
				<h5 class="btReviewHeadingOverview"><?php _e( 'Overview', 'bold-news' ); ?></h5>

				<?php

					foreach( $review_arr as $r ) {

						$r_arr = explode( ';', $r );

						if ( isset( $r_arr[1] ) ) {
							$rating = round( floatval( $r_arr[1] ) );
						} else {
							$rating = 0;
						}

						?>

						<div class="btReviewOverviewSegment">
							<span class="btReviewSegmentTitle"><?php echo wp_kses_post( $r_arr[0] ); ?></span>
							<div class="btProgressBar animate">
								<div class="btProgressContent">
									<div data-percentage="<?php echo wp_kses_post( $rating ); ?>" class="btProgressAnim animate" style="">
										<span><?php echo wp_kses_post( $rating ); ?>%</span>
									</div>
								</div>
							</div>
						</div>

				<?php }

					$overall_score = boldthemes_get_post_rating();

				?>

			</div>
			<div class="rowItem col-sm-12 col-md-6">
				<h5 class="btReviewHeadingSummary"><?php _e( 'Summary', 'bold-news' ); ?></h5>
				<div class="btSummary">
					<p><?php echo wp_kses_post( $review_summary ); ?></p>
				</div>
				<div class="btReviewScore">
					<div class="btReviewPercentage">
						<span class="btScoreTitle"><?php _e( 'Overall score', 'bold-news' ); ?></span>
						<strong><?php echo wp_kses_post( $overall_score ); ?>%</strong>
					</div>
					<div class="btReviewStars">
						<div class="star-rating">
							<span style="width:<?php echo wp_kses_post( $overall_score ); ?>%">
								<strong class="rating"><?php echo wp_kses_post( $overall_score ); ?></strong>
								min100
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>