<?php

$custom_css = "

	.btArticleCategory.{$cat_slug} { background: {$cat_color}; }
	.btBox.widget_product_categories li.cat-item-{$cat_id} a:hover { color: {$cat_color}; }
	.btBox.widget_product_categories li.cat-item-{$cat_id} a:before { border-color: {$cat_color}; }
	.btBox.widget_product_categories li.cat-item-{$cat_id} { color: {$cat_color}; }
	.btBox.widget_product_categories li.cat-item-{$cat_id} a > span { color: {$cat_color}; box-shadow: 0 0 0 1px {$cat_color} inset; }
	.btBox.widget_product_categories li.cat-item-{$cat_id} a:hover > span {box-shadow: 0 0 0 1.5em {$cat_color} inset;}
	.btBox.widget_product_categories ul.options li[data-raw-value='{$cat_id}']:hover { color: {$cat_color}; }
	.btBox.widget_product_categories ul.options li[data-raw-value='{$cat_id}']:hover:before { border-color: {$cat_color} !important; }

";