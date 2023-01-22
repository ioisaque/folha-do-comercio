<div class="btTileBox" data-hw="<?php echo $hw ?>">
<div class = "btTilesArticleTop"><?echo $bold_article_categories; ?></div>
<?php 
	echo boldthemes_get_image_html(
		array(
			'image' => esc_url( $img_src ),
			'caption_title' => $post['title'],
			'caption_text' => $bold_article_top,
			'content' => $content,
			'size' => 'large',
			'shape' => 'square',
			'url' => esc_url_raw( $post['permalink'] ),
			'target' => '_self',
			'show_titles' => $tiles_title,
			'el_style' => '',
			'el_class' => ''
		)
	);
?>
</div>