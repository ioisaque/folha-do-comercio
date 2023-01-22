<?php

$custom_css = "

	.btArticleCategory.cat-item-{$cat_id} { background: {$cat_color}; }
	.btBox.widget_categories li.cat-item-{$cat_id} a:hover { color: {$cat_color}; }
	.btBox.widget_categories li.cat-item-{$cat_id} a:before { border-color: {$cat_color}; }
	.btBox.widget_categories li.cat-item-{$cat_id} { color: {$cat_color}; }
	.btBox.widget_categories li.cat-item-{$cat_id} a > span { color: {$cat_color}; box-shadow: 0 0 0 1px {$cat_color} inset; }
	.btBox.widget_categories li.cat-item-{$cat_id} a:hover > span {box-shadow: 0 0 0 1.5em {$cat_color} inset;}
	.btBox.widget_categories ul.options li[data-raw-value='{$cat_id}']:hover { color: {$cat_color}; }
	.btBox.widget_categories ul.options li[data-raw-value='{$cat_id}']:hover:before { border-color: {$cat_color} !important; }
	.btBox.shortcode_widget_categories li.cat-item-{$cat_id} a:hover { color: {$cat_color}; }
	.btBox.shortcode_widget_categories li.cat-item-{$cat_id} a:before { border-color: {$cat_color}; }
	.btBox.shortcode_widget_categories li.cat-item-{$cat_id} { color: {$cat_color}; }
	.btBox.shortcode_widget_categories li.cat-item-{$cat_id} a > span { color: {$cat_color}; box-shadow: 0 0 0 1px {$cat_color} inset; }
	.btBox.shortcode_widget_categories li.cat-item-{$cat_id} a:hover > span {box-shadow: 0 0 0 1.5em {$cat_color} inset;}
	.btBox.shortcode_widget_categories ul.options li[data-raw-value='{$cat_id}']:hover { color: {$cat_color}; }
	.btBox.shortcode_widget_categories ul.options li[data-raw-value='{$cat_id}']:hover:before { border-color: {$cat_color} !important; }
	
	.btCategoryTitle .sIcon.cat-item-{$cat_id} .btIco.btIcoDefaultType .btIcoHolder:before {color: {$cat_color};}
	.btCategoryTitle .sIcon.cat-item-{$cat_id} .btIco.btIcoFilledType .btIcoHolder:before {background: {$cat_color}; color: #FFF;}
	.btCategoryTitle .sIcon.cat-item-{$cat_id} .btIco.btIcoOutlineType .btIcoHolder:before {box-shadow: 0 0 0 1px {$cat_color} inset; color: {$cat_color};}
	.btCategoryTitle .sIcon.cat-item-{$cat_id} .btIco.btIcoDefaultType.btIconHexagonShape .btIcoHolder {color: {$cat_color};}
	.btCategoryTitle .sIcon.cat-item-{$cat_id} .btIco.btIcoDefaultType.btIconHexagonShape .btIcoHolder svg { display: none;}
	.btCategoryTitle .sIcon.cat-item-{$cat_id} .btIco.btIcoFilledType.btIconHexagonShape .btIcoHolder svg {fill: {$cat_color}; color: #FFF;}
	.btCategoryTitle .sIcon.cat-item-{$cat_id} .btIco.btIcoOutlineType.btIconHexagonShape .btIcoHolder svg {stroke: {$cat_color}; stroke-width: 1px; stroke-linecap: square; color: {$cat_color};}

";