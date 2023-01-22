<div class="btGridOuterContent">
	<?php echo $media_html;  ?>
	<div class = "btGridArticleTop"><?php echo $bold_article_categories; ?></div>
	<div class="btGridContent">
		<?php echo boldthemes_get_heading_html( $bold_article_top, '<a href="' . esc_url_raw( $post['permalink'] ) . '">' . $post['title'] . '</a>', $bold_article_bottom, 'small', $dash, '', '' ); ?>
		<p><?php echo $post['excerpt'];  ?></p>
		<div class="btGridShare">
		<?php echo $share_html  ?>
		</div>
	</div>
</div>