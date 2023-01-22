<?php

if ( post_password_required() ) {
	return;
}

?>

<div id="comments" class="btCommentsBox">

	<?php if ( have_comments() ) : ?>

	<h4>
		<?php
			printf( _n( 'One comment', '%1$s comments', get_comments_number(), 'bold-news' ), number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	</h4>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<?php 
			$prev_html = get_previous_comments_link( esc_html__( 'Older Comments', 'bold-news' ) );
			$next_html = get_next_comments_link( esc_html__( 'Newer Comments', 'bold-news' ) );
			if ( $prev_html != '' && $next_html != '' ) {
				echo get_previous_comments_link( esc_html__( 'Older Comments', 'bold-news' ) );
				echo '<span>|</span>';
				echo get_next_comments_link( esc_html__( 'Newer Comments', 'bold-news' ) );
			} else {
				echo get_previous_comments_link( esc_html__( 'Older Comments', 'bold-news' ) );
				echo get_next_comments_link( esc_html__( 'Newer Comments', 'bold-news' ) );
			}
			?>
		</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ul class="comments">
		<?php
			wp_list_comments( array(
				'style'      => 'ul',
				'short_ping' => true,
				'callback'   => 'boldthemes_theme_comment'
			) );
		?>
	</ul><!-- .comments -->

	<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bold-news' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php 
	
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
	
		$fields =  array(
			'author' =>
				'<div class="pcItem"><label for="author">' . esc_html__( 'Name', 'bold-news' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>
				<p><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				'" ' . $aria_req . ' /></p></div>',

			'email' =>
				'<div class="pcItem"><label for="email">' . esc_html__( 'Email', 'bold-news' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>
				<p><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" ' . $aria_req . ' /></p></div>',

			'url' =>
				'<div class="pcItem"><label for="url">' . esc_html__( 'Website', 'bold-news' ) . '</label>' .
				'<p><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></p></div>',
		);
	
		$args = array(
		  'id_form'           => 'commentform',
		  'id_submit'         => 'submit',
		  'title_reply'       => esc_html__( 'Leave a Reply', 'bold-news' ),
		  'title_reply_to'    => esc_html__( 'Leave a Reply to %s', 'bold-news' ),
		  'cancel_reply_link' => esc_html__( 'Cancel Reply', 'bold-news' ),
		  'label_submit'      => esc_html__( 'Post Comment', 'bold-news' ),
		  
		  'submit_button' => '<button type="submit" value="' . esc_html__( 'Post Comment', 'bold-news' ) . '" id="btSubmit" class="btBtn btnFilledStyle btnRightPosition btnSmall btnAccent btnAccentColor btnIco" name="submit"><span class="btnInnerText">' . esc_html__( 'Post Comment', 'bold-news' ) . '</span><span class="btIco "><span data-ico-fa="&#xf1d8;" class="btIcoHolder"></span></span></button>',

		  'comment_field' =>  '<div class="pcItem btComment"><label for="comment">' . _x( 'Comment', 'noun', 'bold-news' ) .
			' <span class="required">*</span></label><p><textarea id="comment" name="comment" cols="30" rows="8" aria-required="true">' .
			'</textarea></p></div>',

		  'must_log_in' => '<p class="must-log-in">' .
			sprintf(
				wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'bold-news' ), array( 'a' => array( 'href' => array() ) ) ),
				wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
			) . '</p>',

		  'logged_in_as' => '<p class="logged-in-as">' .
			sprintf(
				wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'bold-news' ), array( 'a' => array( 'href' => array() ) ) ),
				admin_url( 'profile.php' ),
				$user_identity,
				wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
			) . '</p>',

		  'comment_notes_before' => '<p class="comment-notes">' .
			esc_html__( 'Your email address will not be published.', 'bold-news' ) . ' ' . ( $req ? esc_html__( 'Required fields are marked *', 'bold-news' ) : '' ) .
			'</p>',

		  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		);

		function bold_news_before_comment_fields() {
			echo '<div class="row">';
		}
		
		function bold_news_after_comment_fields() {
			echo '</div>';
		}
		add_action( 'comment_form_before_fields', 'bold_news_before_comment_fields' );
		add_action( 'comment_form_after_fields', 'bold_news_after_comment_fields' );
		
		comment_form( $args );
	?>

</div><!-- #comments -->