<?php if ( boldthemes_get_option( 'blog_author_info' ) ) { 
		
		$about_author_html = '';
		if ( BoldThemesFramework::$blog_author_info ) {
		
			$blog_square_avatar = boldthemes_get_option( 'blog_square_avatar' );
			$avatar_html = ( $blog_square_avatar ) ? get_avatar( get_the_author_meta( 'ID' ), 280, '', '', array('class' => 'square_avatar') ) : get_avatar( get_the_author_meta( 'ID' ), 280 );

			$avatar_html = str_replace ( 'width=\'280\'', 'width=\'140\'', $avatar_html );
			$avatar_html = str_replace ( 'height=\'280\'', 'height =\'140\'', $avatar_html );
			$avatar_html = str_replace ( 'width="280"', 'width="140"', $avatar_html );
			$avatar_html = str_replace ( 'height="280"', 'height ="140"', $avatar_html );
			
			$about_author_html = '<div class="btAboutAuthor">';
			
			$user_url = get_the_author_meta( 'user_url' );
			if ( $user_url != '' ) {	
				$author_html = boldthemes_get_post_author_wo_avatar( $user_url );
			} else {
				$author_html = esc_html( get_the_author_meta( 'display_name' ) );
			}
			
			if ( $avatar_html ) {
				$about_author_html .= '<div class="aaAvatar">' . $avatar_html . '</div>';
			}

			// social icons SMALL, SOCIAL, DEFAULT TYPE
			$size	= 'btIcoExtraSmallSize'; 
			$style	= 'btIcoDefaultType';

			$facebook_link		= esc_url_raw( get_the_author_meta('facebook') );
			$twitter_link		= esc_url_raw( get_the_author_meta('twitter') );
			$linkedin_link		= esc_url_raw( get_the_author_meta('linkedin') );
			$google_plus_link	= esc_url_raw( get_the_author_meta('google_plus') );
			$vkontakte_link		= esc_url_raw( get_the_author_meta('vkontakte') );	
			
			BoldThemesFramework::$share_html = '';
			if ( $facebook_link || $twitter_link || $google_plus_link || $linkedin_link || $vkontakte_link ) {				
				if ( $facebook_link ) {
					BoldThemesFramework::$share_html .=	boldthemes_get_icon_html( 'fa_f09a', $facebook_link , '', $style . ' '  . $size . ' btIcoFacebook' );
				}
				if ( $twitter_link ) {
					BoldThemesFramework::$share_html .= boldthemes_get_icon_html( 'fa_f099', $twitter_link , '', $style . ' '  . $size . ' btIcoTwitter'  );
				}
				if ( $linkedin_link ) {
					BoldThemesFramework::$share_html .= boldthemes_get_icon_html( 'fa_f0e1', $linkedin_link , '', $style . ' '  . $size . ' btIcoLinkedin'  );
				}
				if ( $google_plus_link ) {
					BoldThemesFramework::$share_html .= boldthemes_get_icon_html( 'fa_f0d5', $google_plus_link , '', $style . ' '  . $size . ' btIcoGooglePlus'  );
				}
				if ( $vkontakte_link ) {
					BoldThemesFramework::$share_html .= boldthemes_get_icon_html( 'fa_f189', $vkontakte_link , '', $style . ' '  . $size . ' btIcoVK'  );
				}
			}
			// /social icons	
			
			$about_author_html .= '<div class="aaTxt"><h4>' . $author_html;
			$about_author_html .= '</h4>
					<p>' . get_the_author_meta( 'description' ) . '</p>
					<div class="btClear btSeparator bottomExtraSmallSpaced noBorder"><hr></div>
					<div class="aaSocial">
						<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" class="btBtn btBtn btnFilledStyle btnAlternateColor btnSmall btnNormalWidth btnLeftPosition btnNoIcon"><span class="btnInnerText">' . __( 'VIEW ALL POSTS', 'bold-news' ) . '</span></a>
						' . BoldThemesFramework::$share_html . '
					</div>
				</div>
			</div>';			
		}

?>

	<section class="boldSection gutter bottomMediumSpaced btAboutAutorSection">
		<div class="port">
			<div class="boldRow">
				<div class="rowItem col-sm-12 btAboutAutor">
					<?php echo $about_author_html; ?>
				</div><!-- /rowItem -->
			</div><!-- /boldRow -->
		</div><!-- /port -->
	</section>
<?php } ?>