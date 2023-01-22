<?php
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars ) ) {
	$boldthemes_crush_vars = BoldThemesFramework::$crush_vars;
}
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars_def ) ) {
	$boldthemes_crush_vars_def = BoldThemesFramework::$crush_vars_def;
}
if ( isset( $boldthemes_crush_vars['headingFont'] ) ) {
	$headingFont = $boldthemes_crush_vars['headingFont'];
} else {
	$headingFont = "Roboto Slab";
}
if ( isset( $boldthemes_crush_vars['headingSuperTitleFont'] ) ) {
	$headingSuperTitleFont = $boldthemes_crush_vars['headingSuperTitleFont'];
} else {
	$headingSuperTitleFont = "Roboto Condensed";
}
if ( isset( $boldthemes_crush_vars['headingSubTitleFont'] ) ) {
	$headingSubTitleFont = $boldthemes_crush_vars['headingSubTitleFont'];
} else {
	$headingSubTitleFont = "Roboto Condensed";
}
if ( isset( $boldthemes_crush_vars['menuFont'] ) ) {
	$menuFont = $boldthemes_crush_vars['menuFont'];
} else {
	$menuFont = "Roboto Slab";
}
if ( isset( $boldthemes_crush_vars['bodyFont'] ) ) {
	$bodyFont = $boldthemes_crush_vars['bodyFont'];
} else {
	$bodyFont = "Roboto";
}
if ( isset( $boldthemes_crush_vars['accentColor'] ) ) {
	$accentColor = $boldthemes_crush_vars['accentColor'];
} else {
	$accentColor = "#dc0003";
}
$accentColorDark = CssCrush\fn__l_adjust( $accentColor." -20" );$accentColorVeryDark = CssCrush\fn__l_adjust( $accentColor." -35" );$accentColorVeryVeryDark = CssCrush\fn__l_adjust( $accentColor." -42" );$accentColorLight = CssCrush\fn__a_adjust( $accentColor." -30" );if ( isset( $boldthemes_crush_vars['alternateColor'] ) ) {
	$alternateColor = $boldthemes_crush_vars['alternateColor'];
} else {
	$alternateColor = "#616161";
}
$alternateColorDark = CssCrush\fn__l_adjust( $alternateColor." -20" );$alternateColorVeryDark = CssCrush\fn__l_adjust( $alternateColor." -25" );$alternateColorLight = CssCrush\fn__a_adjust( $alternateColor." -40" );if ( isset( $boldthemes_crush_vars['logoHeight'] ) ) {
	$logoHeight = $boldthemes_crush_vars['logoHeight'];
} else {
	$logoHeight = "50";
}
$css_override = sanitize_text_field("select,
input{font-family: {$bodyFont};}
input:not([type='checkbox']):not([type='radio']),
textarea,
select{
    font-family: \"{$bodyFont}\";}
html a:hover,
.btLightSkin a:hover,
.btDarkSkin .btLightSkin a:hover,
.btLightSkin .btDarkSkin .btLightSkin a:hover,
.btDarkSkin a:hover,
.btLightSkin .btDarkSkin a:hover,
.btDarkSkin.btLightSkin .btDarkSkin a:hover{
    color: {$accentColor};}
.btLightSkin .btText a,
.btDarkSkin .btLightSkin .btText a,
.btLightSkin .btDarkSkin .btLightSkin .btText a,
.btDarkSkin .btText a,
.btLightSkin .btDarkSkin .btText a,
.btDarkSkin.btLightSkin .btDarkSkin .btText a{color: {$accentColor};}
figcaption{
    font-family: {$headingSuperTitleFont};}
body{font-family: \"{$bodyFont}\",Arial,sans-serif;}
.btContentHolder blockquote{
    font-family: {$headingFont};}
.btContentHolder blockquote:before{
    font-family: {$headingFont};}
.btContentHolder cite{
    font-family: {$headingFont};}
h1,
h2,
h3,
h4,
h5,
h6{font-family: \"{$headingFont}\";}
.btContentHolder table thead th{
    background-color: {$accentColor};
    font-family: {$headingFont};
    -webkit-box-shadow: 0 -3px 0 {$accentColorDark};
    box-shadow: 0 -3px 0 {$accentColorDark};}
.btAccentColorBackground{background-color: {$accentColor} !important;}
.btAccentColorBackground .headline b.animate.animated{color: {$alternateColor};}
.btAccentColorBackground .btDash.bottomDash .dash:after{border-color: {$alternateColor};}
.btAccentDarkColorBackground{background-color: {$accentColorDark} !important;}
.btAccentDarkColorBackground .headline b.animate.animated{color: {$alternateColor};}
.btAccentVeryDarkColorBackground{background-color: {$accentColorVeryDark} !important;}
.btAccentLightColorBackground{background-color: {$accentColorLight} !important;}
.btAlternateColorBackground{background-color: {$alternateColor} !important;}
.btAlternateDarkColorBackground{background-color: {$alternateColorDark} !important;}
.btAlternateVeryDarkColorBackground{background-color: {$alternateColorVeryDark} !important;}
.btAlternateLightColorBackground{background-color: {$alternateColorLight} !important;}
.btAccentDarkHeader .btPreloader .animation > div:first-child,
.btLightAccentHeader .btPreloader .animation > div:first-child{
    background-color: {$accentColorDark};}
.btPreloader .animation .preloaderLogo{height: {$logoHeight}px;}
.btPageHeadline .header .dash .btSuperTitleHeading{font-family: {$headingSuperTitleFont};}
.btPageHeadline .header .dash .btSubTitleHeading{font-family: {$headingSubTitleFont};}
.mainHeader{
    font-family: \"{$menuFont}\";}
.btMenuVertical.btAccentDarkHeader .mainHeader,
.btMenuVertical.btLightAccentHeader .mainHeader{background-color: {$accentColor};}
.menuPort{font-family: \"{$menuFont}\";}
.menuPort nav ul ul li > a:hover,
.menuPort nav ul ul li > .bt_mega_menu_title:hover{color: {$accentColor} !important;}
.menuPort nav > ul > li > a,
.menuPort nav > ul > li > .bt_mega_menu_title{line-height: {$logoHeight}px;}
.btTextLogo{
    line-height: {$logoHeight}px;}
.btLogoArea .logo{line-height: {$logoHeight}px;}
.btLogoArea .logo img{height: {$logoHeight}px;}
.btHorizontalMenuTrigger:hover:before,
.btHorizontalMenuTrigger:hover:after{border-color: {$accentColor};}
.btHorizontalMenuTrigger:hover .btIco{border-color: {$accentColor};}
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-page-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor > .bt_mega_menu_title,
.btMenuHorizontal .menuPort nav > ul > li.current-page-ancestor > .bt_mega_menu_title,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item > .bt_mega_menu_title{color: {$accentColor};}
.btMenuHorizontal .menuPort ul ul li > a:before{
    background-color: {$accentColor};}
.btMenuHorizontal .menuPort ul ul li.menu-item-has-children > a:hover:after{
    color: {$accentColor};}
.btMenuHorizontal .menuPort ul ul li.current-menu-item > a:hover:before{background-color: {$accentColor};
    border-color: {$accentColor};}
body.btMenuHorizontal .subToggler{
    line-height: {$logoHeight}px;}
.btMenuHorizontal .menuPort > nav > ul ul{
    font-family: {$bodyFont};}
html:not(.touch) body.btMenuHorizontal .menuPort > nav > ul > li.btMenuWideDropdown > ul > li > a{
    font-family: {$headingFont};}
@media (min-width: 1024px){html.touch body.btMenuHorizontal .menuPort > nav > ul > li.btMenuWideDropdown > ul > li > a{
    font-family: {$headingFont};}
html.touch body.btMenuHorizontal .menuPort > nav > ul li.btMenuWideDropdown .subToggler{
    margin: 0 0 -{$logoHeight}px 0;}
}.btMenuHorizontal.btMenuBelowLogo .menuPort{height: {$logoHeight}px;}
.btAccentLightHeader.btMenuHorizontal .btBelowLogoArea .topBarInMenu a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btAccentLightHeader.btMenuHorizontal .btBelowLogoArea .topBarInMenu .widget_shopping_cart .widget_shopping_cart_content.on .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btAccentLightHeader.btMenuHorizontal .topBar .topBarInMenu a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btAccentLightHeader.btMenuHorizontal .topBar .topBarInMenu .widget_shopping_cart .widget_shopping_cart_content.on .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor} !important;}
.btAccentLightHeader.btMenuHorizontal .btBelowLogoArea .topBarInMenu .widget_shopping_cart .btIco:hover .btIcoHolder:before,
.btAccentLightHeader.btMenuHorizontal .topBar .topBarInMenu .widget_shopping_cart .btIco:hover .btIcoHolder:before{color: {$accentColor} !important;}
.btAccentLightHeader.btMenuHorizontal .btBelowLogoArea .topBarInMenu .btSearch .btIco a:hover:before,
.btAccentLightHeader.btMenuHorizontal .topBar .topBarInMenu .btSearch .btIco a:hover:before{
    color: {$accentColor} !important;}
.btAccentLightHeader.btMenuHorizontal .topTools a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btAccentLightHeader.btMenuHorizontal .topTools .widget_shopping_cart .widget_shopping_cart_content.on .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor} !important;}
.btAccentLightHeader.btMenuHorizontal .topTools .widget_shopping_cart .btIco:hover .btIcoHolder:before{color: {$accentColor} !important;}
.btAccentLightHeader.btMenuHorizontal .topTools .btSearch .btIco a:hover:before{
    color: {$accentColor} !important;}
.btAccentLightHeader.btMenuHorizontal:not(.btBelowMenu) .btBelowLogoArea,
.btAccentLightHeader.btMenuHorizontal:not(.btBelowMenu) .topBar,
.btAccentLightHeader.btMenuHorizontal.btStickyHeaderActive .btBelowLogoArea,
.btAccentLightHeader.btMenuHorizontal.btStickyHeaderActive .topBar{background-color: {$accentColor};}
.btAccentLightHeader.btMenuHorizontal:not(.btBelowMenu) .btBelowLogoArea:before,
.btAccentLightHeader.btMenuHorizontal:not(.btBelowMenu) .topBar:before,
.btAccentLightHeader.btMenuHorizontal.btStickyHeaderActive .btBelowLogoArea:before,
.btAccentLightHeader.btMenuHorizontal.btStickyHeaderActive .topBar:before{
    background-color: {$accentColor};}
.btAccentLightHeader.btMenuHorizontal.btBelowMenu:not(.btStickyHeaderActive) .mainHeader .btBelowLogoArea,
.btAccentLightHeader.btMenuHorizontal.btBelowMenu:not(.btStickyHeaderActive) .mainHeader .topBar{background-color: {$accentColor};}
.btLightSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .btBelowLogoArea .menuPort > nav > ul > li.current-menu-item > a,
.btLightSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .btBelowLogoArea .menuPort > nav > ul > li.current-menu-item > .bt_mega_menu_title,
.btLightSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .btBelowLogoArea .menuPort > nav > ul > li.current-menu-ancestor > a,
.btLightSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .btBelowLogoArea .menuPort > nav > ul > li.current-menu-ancestor > .bt_mega_menu_title,
.btLightSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .btBelowLogoArea .menuPort > nav > ul > li.current-page-ancestor > a,
.btLightSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .btBelowLogoArea .menuPort > nav > ul > li.current-page-ancestor > .bt_mega_menu_title,
.btDarkSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .btBelowLogoArea .menuPort > nav > ul > li.current-menu-item > a,
.btDarkSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .btBelowLogoArea .menuPort > nav > ul > li.current-menu-item > .bt_mega_menu_title,
.btDarkSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .btBelowLogoArea .menuPort > nav > ul > li.current-menu-ancestor > a,
.btDarkSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .btBelowLogoArea .menuPort > nav > ul > li.current-menu-ancestor > .bt_mega_menu_title,
.btDarkSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .btBelowLogoArea .menuPort > nav > ul > li.current-page-ancestor > a,
.btDarkSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .btBelowLogoArea .menuPort > nav > ul > li.current-page-ancestor > .bt_mega_menu_title,
.btLightSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .topBar .menuPort > nav > ul > li.current-menu-item > a,
.btLightSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .topBar .menuPort > nav > ul > li.current-menu-item > .bt_mega_menu_title,
.btLightSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .topBar .menuPort > nav > ul > li.current-menu-ancestor > a,
.btLightSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .topBar .menuPort > nav > ul > li.current-menu-ancestor > .bt_mega_menu_title,
.btLightSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .topBar .menuPort > nav > ul > li.current-page-ancestor > a,
.btLightSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .topBar .menuPort > nav > ul > li.current-page-ancestor > .bt_mega_menu_title,
.btDarkSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .topBar .menuPort > nav > ul > li.current-menu-item > a,
.btDarkSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .topBar .menuPort > nav > ul > li.current-menu-item > .bt_mega_menu_title,
.btDarkSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .topBar .menuPort > nav > ul > li.current-menu-ancestor > a,
.btDarkSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .topBar .menuPort > nav > ul > li.current-menu-ancestor > .bt_mega_menu_title,
.btDarkSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .topBar .menuPort > nav > ul > li.current-page-ancestor > a,
.btDarkSkin.btLightHeader.btMenuHorizontal.btMenuBelowLogo .topBar .menuPort > nav > ul > li.current-page-ancestor > .bt_mega_menu_title{color: {$accentColor} !important;}
.btLightHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu a:hover.btIconWidget .btIconWidgetContent{color: {$accentColor};}
.btLightHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu span.btIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btLightHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu a.btIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.btLightHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu span.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btLightHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu a.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor};
    -webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.btLightHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btLightHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu .widget_shopping_cart .widget_shopping_cart_content.on .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btLightHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu .widget_shopping_cart .btIco:hover .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset !important;
    box-shadow: 0 0 0 1.5em {$accentColor} inset !important;}
.btLightHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu .btSearch .btIco a:hover:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset !important;
    box-shadow: 0 0 0 1.5em {$accentColor} inset !important;}
.btLightHeader.btMenuHorizontal .topTools a:hover.btIconWidget .btIconWidgetContent{color: {$accentColor};}
.btLightHeader.btMenuHorizontal .topTools span.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btLightHeader.btMenuHorizontal .topTools a.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor};}
.btLightHeader.btMenuHorizontal .topTools a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btLightHeader.btMenuHorizontal .topTools .btSearch .btIco a:hover:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset !important;
    box-shadow: 0 0 0 1.5em {$accentColor} inset !important;}
.btAccentDarkHeader.btMenuHorizontal .mainHeader .topTools a:hover.btIconWidget .btIconWidgetContent{color: {$accentColor};}
.btAccentDarkHeader.btMenuHorizontal .mainHeader .topTools span.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btAccentDarkHeader.btMenuHorizontal .mainHeader .topTools a.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor};}
.btAccentDarkHeader.btMenuHorizontal .mainHeader .topTools a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btAccentDarkHeader.btMenuHorizontal .mainHeader .topTools .btSearch .btIco a:hover:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset !important;
    box-shadow: 0 0 0 1.5em {$accentColor} inset !important;}
.btLightSkin.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .menuPort > nav > ul > li.current-menu-item > a,
.btLightSkin.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .menuPort > nav > ul > li.current-menu-item > .bt_mega_menu_title,
.btLightSkin.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .menuPort > nav > ul > li.current-menu-ancestor > a,
.btLightSkin.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .menuPort > nav > ul > li.current-menu-ancestor > .bt_mega_menu_title,
.btLightSkin.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .menuPort > nav > ul > li.current-page-ancestor > a,
.btLightSkin.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .menuPort > nav > ul > li.current-page-ancestor > .bt_mega_menu_title,
.btDarkSkin.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .menuPort > nav > ul > li.current-menu-item > a,
.btDarkSkin.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .menuPort > nav > ul > li.current-menu-item > .bt_mega_menu_title,
.btDarkSkin.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .menuPort > nav > ul > li.current-menu-ancestor > a,
.btDarkSkin.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .menuPort > nav > ul > li.current-menu-ancestor > .bt_mega_menu_title,
.btDarkSkin.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .menuPort > nav > ul > li.current-page-ancestor > a,
.btDarkSkin.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .menuPort > nav > ul > li.current-page-ancestor > .bt_mega_menu_title{color: {$accentColor} !important;}
.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu a:hover.btIconWidget .btIconWidgetContent{color: {$accentColor};}
.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu span.btIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu a.btIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu span.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu a.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor};
    -webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu .widget_shopping_cart .widget_shopping_cart_content.on .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu .widget_shopping_cart .btIco:hover .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset !important;
    box-shadow: 0 0 0 1.5em {$accentColor} inset !important;}
.btAccentDarkHeader.btMenuHorizontal.btMenuBelowLogo .mainHeader .topBarInMenu .btSearch .btIco a:hover:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset !important;
    box-shadow: 0 0 0 1.5em {$accentColor} inset !important;}
.btAccentDarkHeader.btMenuHorizontal:not(.btMenuBelowLogo) .mainHeader .topBarInMenu a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btAccentDarkHeader.btMenuHorizontal:not(.btMenuBelowLogo) .mainHeader .topBarInMenu .widget_shopping_cart .widget_shopping_cart_content.on .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor} !important;}
.btAccentDarkHeader.btMenuHorizontal:not(.btMenuBelowLogo) .mainHeader .topBarInMenu .widget_shopping_cart .btIco:hover .btIcoHolder:before{color: {$accentColor} !important;}
.btAccentDarkHeader.btMenuHorizontal:not(.btMenuBelowLogo) .mainHeader .topBarInMenu .btSearch .btIco a:hover:before{
    color: {$accentColor} !important;}
.btAccentDarkHeader.btMenuHorizontal:not(.btBelowMenu) .mainHeader,
.btAccentDarkHeader.btMenuHorizontal.btStickyHeaderActive .mainHeader{background-color: {$accentColor};}
.btAccentDarkHeader.btMenuHorizontal.btBelowMenu:not(.btStickyHeaderActive) .mainHeader .port .btLogoArea{background-color: {$accentColor};}
.btLightAccentHeader.btMenuHorizontal:not(.btMenuBelowLogo):not(.btStickyHeaderActive) .mainHeader .topBarInMenu a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btLightAccentHeader.btMenuHorizontal:not(.btMenuBelowLogo):not(.btStickyHeaderActive) .mainHeader .topBarInMenu .widget_shopping_cart .widget_shopping_cart_content.on .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor} !important;}
.btLightAccentHeader.btMenuHorizontal:not(.btMenuBelowLogo):not(.btStickyHeaderActive) .mainHeader .topBarInMenu .widget_shopping_cart .btIco:hover .btIcoHolder:before{color: {$accentColor} !important;}
.btLightAccentHeader.btMenuHorizontal:not(.btMenuBelowLogo):not(.btStickyHeaderActive) .mainHeader .topBarInMenu .btSearch .btIco a:hover:before{
    color: {$accentColor};}
.btLightAccentHeader.btMenuHorizontal:not(.btBelowMenu) .mainHeader,
.btLightAccentHeader.btMenuHorizontal.btStickyHeaderActive .mainHeader{background-color: {$accentColor};}
.btLightAccentHeader.btMenuHorizontal.btBelowMenu:not(.btStickyHeaderActive) .mainHeader .port .btLogoArea{background-color: {$accentColor};}
.btLightSkin.btBlackHeader.btMenuHorizontal .mainHeader .menuPort > nav > ul > li.current-menu-item > a,
.btLightSkin.btBlackHeader.btMenuHorizontal .mainHeader .menuPort > nav > ul > li.current-menu-item > .bt_mega_menu_title,
.btLightSkin.btBlackHeader.btMenuHorizontal .mainHeader .menuPort > nav > ul > li.current-menu-ancestor > a,
.btLightSkin.btBlackHeader.btMenuHorizontal .mainHeader .menuPort > nav > ul > li.current-menu-ancestor > .bt_mega_menu_title,
.btLightSkin.btBlackHeader.btMenuHorizontal .mainHeader .menuPort > nav > ul > li.current-page-ancestor > a,
.btLightSkin.btBlackHeader.btMenuHorizontal .mainHeader .menuPort > nav > ul > li.current-page-ancestor > .bt_mega_menu_title,
.btDarkSkin.btBlackHeader.btMenuHorizontal .mainHeader .menuPort > nav > ul > li.current-menu-item > a,
.btDarkSkin.btBlackHeader.btMenuHorizontal .mainHeader .menuPort > nav > ul > li.current-menu-item > .bt_mega_menu_title,
.btDarkSkin.btBlackHeader.btMenuHorizontal .mainHeader .menuPort > nav > ul > li.current-menu-ancestor > a,
.btDarkSkin.btBlackHeader.btMenuHorizontal .mainHeader .menuPort > nav > ul > li.current-menu-ancestor > .bt_mega_menu_title,
.btDarkSkin.btBlackHeader.btMenuHorizontal .mainHeader .menuPort > nav > ul > li.current-page-ancestor > a,
.btDarkSkin.btBlackHeader.btMenuHorizontal .mainHeader .menuPort > nav > ul > li.current-page-ancestor > .bt_mega_menu_title{color: {$accentColor} !important;}
.btBlackHeader.btMenuHorizontal .mainHeader .topTools a:hover.btIconWidget .btIconWidgetContent,
.btBlackHeader.btMenuHorizontal .mainHeader .topBarInMenu a:hover.btIconWidget .btIconWidgetContent{color: {$accentColor};}
.btBlackHeader.btMenuHorizontal .mainHeader .topTools span.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btBlackHeader.btMenuHorizontal .mainHeader .topTools a.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btBlackHeader.btMenuHorizontal .mainHeader .topBarInMenu span.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btBlackHeader.btMenuHorizontal .mainHeader .topBarInMenu a.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor};
    -webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.btBlackHeader.btMenuHorizontal .mainHeader .topTools a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btBlackHeader.btMenuHorizontal .mainHeader .topBarInMenu a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btBlackHeader.btMenuHorizontal .mainHeader .topTools a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btBlackHeader.btMenuHorizontal .mainHeader .topTools .widget_shopping_cart .widget_shopping_cart_content.on .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btBlackHeader.btMenuHorizontal .mainHeader .topBarInMenu a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btBlackHeader.btMenuHorizontal .mainHeader .topBarInMenu .widget_shopping_cart .widget_shopping_cart_content.on .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset !important;
    box-shadow: 0 0 0 1.5em {$accentColor} inset !important;}
.btBlackHeader.btMenuHorizontal .mainHeader .topTools .widget_shopping_cart .btIco:hover .btIcoHolder:before,
.btBlackHeader.btMenuHorizontal .mainHeader .topBarInMenu .widget_shopping_cart .btIco:hover .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset !important;
    box-shadow: 0 0 0 1.5em {$accentColor} inset !important;}
.btBlackHeader.btMenuHorizontal .mainHeader .topTools .widget_shopping_cart .widget_shopping_cart_content .btIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btBlackHeader.btMenuHorizontal .mainHeader .topBarInMenu .widget_shopping_cart .widget_shopping_cart_content .btIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.btBlackHeader.btMenuHorizontal .mainHeader .topTools .btSearch .btIco a:hover:before,
.btBlackHeader.btMenuHorizontal .mainHeader .topBarInMenu .btSearch .btIco a:hover:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset !important;
    box-shadow: 0 0 0 1.5em {$accentColor} inset !important;}
.btBlackHeader.btMenuHorizontal.btBelowMenu:not(.btStickyHeaderActive) .mainHeader .port .btLogoArea{background-color: {$accentColor};}
.btVerticalMenuTrigger:hover:before,
.btVerticalMenuTrigger:hover:after{border-color: {$accentColor};}
.btVerticalMenuTrigger:hover .btIco{border-color: {$accentColor};}
.btLightAccentHeader .btVerticalMenuTrigger:hover:hover:before,
.btLightAccentHeader .btVerticalMenuTrigger:hover:hover:after,
.btLightAccentHeader.btMenuVerticalOn .btVerticalMenuTrigger:hover:hover:before,
.btLightAccentHeader.btMenuVerticalOn .btVerticalMenuTrigger:hover:hover:after,
.btBlackHeader .btVerticalMenuTrigger:hover:hover:before,
.btBlackHeader .btVerticalMenuTrigger:hover:hover:after,
.btBlackHeader.btMenuVerticalOn .btVerticalMenuTrigger:hover:hover:before,
.btBlackHeader.btMenuVerticalOn .btVerticalMenuTrigger:hover:hover:after,
.btAccentDarkHeader .btVerticalMenuTrigger:hover:hover:before,
.btAccentDarkHeader .btVerticalMenuTrigger:hover:hover:after,
.btAccentDarkHeader.btMenuVerticalOn .btVerticalMenuTrigger:hover:hover:before,
.btAccentDarkHeader.btMenuVerticalOn .btVerticalMenuTrigger:hover:hover:after{border-color: {$alternateColor};}
.btLightAccentHeader .btVerticalMenuTrigger:hover:hover .btIco,
.btLightAccentHeader.btMenuVerticalOn .btVerticalMenuTrigger:hover:hover .btIco,
.btBlackHeader .btVerticalMenuTrigger:hover:hover .btIco,
.btBlackHeader.btMenuVerticalOn .btVerticalMenuTrigger:hover:hover .btIco,
.btAccentDarkHeader .btVerticalMenuTrigger:hover:hover .btIco,
.btAccentDarkHeader.btMenuVerticalOn .btVerticalMenuTrigger:hover:hover .btIco{border-color: {$alternateColor};}
.btAccentDarkHeader.btMenuVertical > .menuPort .logo,
.btLightAccentHeader.btMenuVertical > .menuPort .logo{background-color: {$accentColor};}
.btMenuVertical > .menuPort nav ul ul li{font-family: {$bodyFont};}
.btMenuVertical .bt_mega_menu_content{font-family: {$bodyFont};}
@media (min-width: 1386px){.btMenuVerticalOn .btVerticalMenuTrigger .btIco a:before{color: {$accentColor} !important;}
}.btMenuHorizontal .topBarInLogoArea .topBarInLogoAreaCell{border: 0 solid {$accentColor};}
.btSearchInner.btFromTopBox .btSearchInnerClose .btIco a.btIcoHolder{color: {$accentColor};}
.btSearchInner.btFromTopBox .btSearchInnerClose .btIco:hover a.btIcoHolder{color: {$accentColorDark};}
.btSearchInner.btFromTopBox button:hover:before{color: {$accentColor};}
.btDarkSkin .btSiteFooter .port:before,
.btLightSkin .btDarkSkin .btSiteFooter .port:before,
.btDarkSkin.btLightSkin .btDarkSkin .btSiteFooter .port:before{background-color: {$accentColor};}
.btLightSkin .btFooterBelow,
.btDarkSkin .btLightSkin .btFooterBelow,
.btLightSkin .btDarkSkin .btLightSkin .btFooterBelow,
.btDarkSkin .btFooterBelow,
.btLightSkin .btDarkSkin .btFooterBelow,
.btDarkSkin.btLightSkin .btDarkSkin .btFooterBelow{
    border-bottom: {$accentColor} 4px solid;}
.btLightSkin .btFooterBelow ul li a:after,
.btDarkSkin .btLightSkin .btFooterBelow ul li a:after,
.btLightSkin .btDarkSkin .btLightSkin .btFooterBelow ul li a:after,
.btDarkSkin .btFooterBelow ul li a:after,
.btLightSkin .btDarkSkin .btFooterBelow ul li a:after,
.btDarkSkin.btLightSkin .btDarkSkin .btFooterBelow ul li a:after{
    border-bottom: 1px solid {$accentColor};}
.btFooterLargeTitle .btIcoHolder span{font-family: {$headingFont};}
.btMediaBox.btQuote,
.btMediaBox.btLink{
    font-family: {$headingSuperTitleFont};
    background-color: {$accentColor} !important;}
.btArticleListItem .headline a:hover{color: {$accentColor};}
.btCommentsBox > h4:before{
    color: {$accentColor};}
.btCommentsBox ul.comments .pingback p a{font-family: {$headingSuperTitleFont};}
.btCommentsBox .pcItem label .required{color: {$accentColor};}
.btCommentsBox .vcard .posted{
    font-family: \"{$headingSuperTitleFont}\";}
.btCommentsBox .commentTxt p.edit-link,
.btCommentsBox .commentTxt p.reply{
    font-family: \"{$headingSuperTitleFont}\";}
.btCommentsBox .comment-respond > h3:before{
    color: {$accentColor};}
.no-comments{
    font-family: {$headingSuperTitleFont};}
.comment-respond .btnOutline button[type=\"submit\"]{font-family: \"{$headingFont}\";}
a#cancel-comment-reply-link{
    font-family: {$headingSuperTitleFont};
    background: {$alternateColor};}
a#cancel-comment-reply-link:hover{background: {$alternateColorDark};}
.post-password-form input[type=\"submit\"]{
    background: {$accentColor};
    font-family: \"{$headingSuperTitleFont}\";}
.post-password-form input[type=\"submit\"]:hover{background: {$accentColorDark};}
.btPagination{font-family: \"{$headingFont}\";}
.btLinkPages ul a{
    background: {$accentColor};}
.btLinkPages ul a:hover{background: {$accentColorDark};}
.articleSideGutter{
    font-family: {$headingSuperTitleFont};}
.simpleArticleSideGutter{
    font-family: {$headingSuperTitleFont};}
span.btHighlight{
    background-color: {$accentColor};}
.btArticleCategories a{background: {$alternateColor};
    font-family: {$headingSuperTitleFont};}
.btPortfolioSubtitle{font-family: {$headingSuperTitleFont};}
.btArticleMeta{font-family: \"{$headingSuperTitleFont}\";}
.single-post .btPageHeadline.wBackground > .port header .dash .btSuperTitleHeading{font-family: {$headingSuperTitleFont};}
.single-post .btPageHeadline.wBackground > .port header .dash .btSubTitleHeading{font-family: {$headingSubTitleFont};}
.btReviewHolder h5.btReviewHeadingOverview,
.btReviewHolder h5.btReviewHeadingSummary{background: {$alternateColor};
    font-family: {$headingSuperTitleFont};}
.btReviewHolder .btReviewSegmentTitle,
.btReviewHolder .btSummary{font-family: {$headingSuperTitleFont};}
.btReviewHolder .btReviewScore .btReviewPercentage .btScoreTitle{
    font-family: {$headingSuperTitleFont};}
.btReviewHolder .btReviewScore .btReviewPercentage strong{
    font-family: {$headingFont};}
.btSinglePostTemplate .btPostImageHolder .btSinglePostTopMetaData .btArticleCategories{font-family: {$headingSuperTitleFont};}
.btSinglePostTemplate .btPostImageHolder .btSinglePostTopMetaData .btSinglePostFormat:before{
    -webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.quote.btSinglePostTemplate .btPostImageHolder .btSinglePostTopMetaData .btSinglePostFormat:after{
    font-family: {$headingFont};}
.btSinglePostTemplate .btPostImageHolder .btSinglePostTopMetaData .btSinglePostFormat .btVideoPopupText{
    font-family: {$headingSuperTitleFont};}
.btSinglePostTemplate:hover .btPostImageHolder .btSinglePostTopMetaData .btSinglePostFormat:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btSinglePostTemplate .btSinglePostContent .btSinglePostBottomData,
.btSinglePostTemplate .btSinglePostContent .btSinglePostTopData{
    font-family: {$headingSuperTitleFont};}
.btSingleHighlight.topImagePosition.btSinglePostTemplate{background: {$accentColorDark} !important;}
.btSingleHighlight.topImagePosition.btSinglePostTemplate .btSinglePostBottomData .star-rating span:before{color: {$accentColor};}
.backgroundImagePosition.btSinglePostTemplate .btSinglePostBottomData .star-rating span:before,
.backgroundImagePosition.smallTemplate.btSinglePostTemplate .btSinglePostBottomData .star-rating span:before{color: {$accentColor};}
.btSingleHighlight.no-imageImagePosition.btSinglePostTemplate{background: {$accentColorDark} !important;}
.btSingleHighlight.no-imageImagePosition.btSinglePostTemplate .btSinglePostBottomData .star-rating span:before{color: {$accentColor};}
.smallTemplate.leftImagePosition.btSinglePostTemplate .btSinglePostContent .btArticleCategories,
.smallTemplate.rightImagePosition.btSinglePostTemplate .btSinglePostContent .btArticleCategories,
.smallTemplate.sideImagePosition.text-left.btSinglePostTemplate .btSinglePostContent .btArticleCategories,
.smallTemplate.sideImagePosition.text-right.btSinglePostTemplate .btSinglePostContent .btArticleCategories{font-family: {$headingSuperTitleFont};}
.btSingleHighlight.leftImagePosition.btSinglePostTemplate,
.btSingleHighlight.rightImagePosition.btSinglePostTemplate,
.btSingleHighlight.sideImagePosition.text-left.btSinglePostTemplate,
.btSingleHighlight.sideImagePosition.text-right.btSinglePostTemplate{background: {$accentColorDark} !important;}
.btSingleHighlight.leftImagePosition.btSinglePostTemplate .btSinglePostBottomData .star-rating span:before,
.btSingleHighlight.rightImagePosition.btSinglePostTemplate .btSinglePostBottomData .star-rating span:before,
.btSingleHighlight.sideImagePosition.text-left.btSinglePostTemplate .btSinglePostBottomData .star-rating span:before,
.btSingleHighlight.sideImagePosition.text-right.btSinglePostTemplate .btSinglePostBottomData .star-rating span:before{color: {$accentColor};}
.btRelatedPosts h3:before{
    color: {$accentColor};}
.btArticleExcerpt{
    font-family: {$headingFont};}
body:not(.btNoDashInSidebar) .btBox > h4:after,
body:not(.btNoDashInSidebar) .btCustomMenu > h4:after,
body:not(.btNoDashInSidebar) .btTopBox > h4:after{
    border-bottom: 3px solid {$accentColor};}
.btBox ul li a:before,
.btCustomMenu ul li a:before,
.btTopBox ul li a:before{
    border-top: 1px solid {$accentColor};}
.btBox ul li.current-menu-item > a,
.btCustomMenu ul li.current-menu-item > a,
.btTopBox ul li.current-menu-item > a{color: {$accentColor};}
.btBox .ppTxt .header .headline a:hover,
.btCustomMenu .ppTxt .header .headline a:hover,
.btTopBox .ppTxt .header .headline a:hover{color: {$accentColor};}
.btBox p.posted,
.btBox .quantity,
.btCustomMenu p.posted,
.btCustomMenu .quantity,
.btTopBox p.posted,
.btTopBox .quantity{
    font-family: {$headingSuperTitleFont};}
.widget_calendar table caption{background: {$accentColor};
    font-family: \"{$headingFont}\";}
.widget_calendar table thead th{background: {$alternateColor};
    font-family: {$headingSuperTitleFont};}
.widget_calendar table tfoot td{font-family: {$headingSuperTitleFont};}
.btBox.widget_categories ul li a > span,
.btBox.shortcode_widget_categories ul li a > span,
.btBox.widget_product_categories ul li a > span{
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    color: {$accentColor};}
.btBox.widget_categories ul li a:hover > span,
.btBox.shortcode_widget_categories ul li a:hover > span,
.btBox.widget_product_categories ul li a:hover > span{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.widget_rss li a.rsswidget{font-family: \"{$headingFont}\";}
.fancy-select .trigger{font-family: {$headingSuperTitleFont};}
.fancy-select ul.options li,
.fancy-select ul.options li:first-child,
.fancy-select ul.options li:last-child{font-family: {$headingSuperTitleFont};}
.fancy-select ul.options li:before{
    border-top: 1px solid {$accentColor};}
.fancy-select ul.options li:hover{color: {$accentColor};}
.fancy-select ul.options li:hover:before{
    border-color: {$accentColor} !important;}
.widget_shopping_cart .total{
    font-family: {$headingSuperTitleFont};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove{
    background-color: {$accentColor};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove:hover{background-color: {$accentColorDark};}
.menuPort .widget_shopping_cart .btIco .btIcoHolder:before,
.topTools .widget_shopping_cart .btIco .btIcoHolder:before,
.topBarInLogoArea .widget_shopping_cart .btIco .btIcoHolder:before{-webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.menuPort .widget_shopping_cart .btIco:hover .btIcoHolder:before,
.topTools .widget_shopping_cart .btIco:hover .btIcoHolder:before,
.topBarInLogoArea .widget_shopping_cart .btIco:hover .btIcoHolder:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents{
    background-color: {$alternateColor};
    font: normal 10px/1 {$menuFont};}
.btMenuVertical .menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler{
    background-color: {$accentColor};}
.btMenuVertical .menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler:hover,
.btMenuVertical .topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler:hover,
.btMenuVertical .topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler:hover{background: {$accentColorDark};}
.menuPort .widget_shopping_cart .widget_shopping_cart_content.on .btIco .btIcoHolder:before,
.topTools .widget_shopping_cart .widget_shopping_cart_content.on .btIco .btIcoHolder:before,
.topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content.on .btIco .btIcoHolder:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.widget_recent_reviews{font-family: {$headingFont};}
.widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-handle{
    background-color: {$accentColor};}
.btBox .tagcloud a,
.btTags ul a{
    font-family: \"{$headingSuperTitleFont}\";}
.btSidebar .btIconWidget .btIconWidgetContent,
footer .btIconWidget .btIconWidgetContent{font-family: {$headingFont};}
.btSidebar .btIconWidget .btIconWidgetContent .btIconWidgetTitle,
footer .btIconWidget .btIconWidgetContent .btIconWidgetTitle{
    font-family: {$headingSuperTitleFont};}
.btSidebar .btIconWidget.btAccentIconWidget .btIconWidgetIcon .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btSidebar .btIconWidget.btAccentIconWidget .btIconWidgetIcon .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:hover:before,
footer .btIconWidget.btAccentIconWidget .btIconWidgetIcon .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
footer .btIconWidget.btAccentIconWidget .btIconWidgetIcon .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:hover:before{color: {$accentColor} !important;}
.btLightSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover,
.btDarkSkin .btLightSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover,
.btLightSkin .btDarkSkin .btLightSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover,
.btDarkSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover,
.btLightSkin .btDarkSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover,
.btDarkSkin.btLightSkin .btDarkSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover,
.btLightSkin footer a.btIconWidget.btAccentIconWidget:hover,
.btDarkSkin .btLightSkin footer a.btIconWidget.btAccentIconWidget:hover,
.btLightSkin .btDarkSkin .btLightSkin footer a.btIconWidget.btAccentIconWidget:hover,
.btDarkSkin footer a.btIconWidget.btAccentIconWidget:hover,
.btLightSkin .btDarkSkin footer a.btIconWidget.btAccentIconWidget:hover,
.btDarkSkin.btLightSkin .btDarkSkin footer a.btIconWidget.btAccentIconWidget:hover{color: {$accentColor} !important;}
.btLightSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetTitle,
.btDarkSkin .btLightSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetTitle,
.btLightSkin .btDarkSkin .btLightSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetTitle,
.btDarkSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetTitle,
.btLightSkin .btDarkSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetTitle,
.btDarkSkin.btLightSkin .btDarkSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetTitle,
.btLightSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetText,
.btDarkSkin .btLightSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetText,
.btLightSkin .btDarkSkin .btLightSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetText,
.btDarkSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetText,
.btLightSkin .btDarkSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetText,
.btDarkSkin.btLightSkin .btDarkSkin .btSidebar a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetText,
.btLightSkin footer a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetTitle,
.btDarkSkin .btLightSkin footer a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetTitle,
.btLightSkin .btDarkSkin .btLightSkin footer a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetTitle,
.btDarkSkin footer a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetTitle,
.btLightSkin .btDarkSkin footer a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetTitle,
.btDarkSkin.btLightSkin .btDarkSkin footer a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetTitle,
.btLightSkin footer a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetText,
.btDarkSkin .btLightSkin footer a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetText,
.btLightSkin .btDarkSkin .btLightSkin footer a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetText,
.btDarkSkin footer a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetText,
.btLightSkin .btDarkSkin footer a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetText,
.btDarkSkin.btLightSkin .btDarkSkin footer a.btIconWidget.btAccentIconWidget:hover .btIconWidgetContent .btIconWidgetText{color: {$accentColor} !important;}
.btTopBox.widget_bt_text_image .widget_sp_image-description{
    font-family: '{$bodyFont}',arial,sans-serif;}
.btMenuHorizontal .mainHeader span.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btMenuHorizontal .mainHeader a.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor};}
.btMenuHorizontal .mainHeader span.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btMenuHorizontal .mainHeader a.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor};
    -webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.btMenuHorizontal .mainHeader .btIconWidgetContent{font-family: {$bodyFont};}
.btMenuHorizontal.btLightSkin .mainHeader a.btIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor};}
.btMenuHorizontal.btLightSkin .mainHeader a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btMenuHorizontal.btDarkSkin .mainHeader a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btMenuVertical .menuPort span.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btMenuVertical .menuPort a.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor};}
.btMenuVertical .menuPort span.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before,
.btMenuVertical .menuPort a.btIconWidget.btAccentIconWidget .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor};
    -webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.btMenuVertical .menuPort .btIconWidget .btIconWidgetContent{font-family: {$bodyFont};}
.btMenuVertical.btLightSkin a.btIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{color: {$accentColor};}
.btMenuVertical.btLightSkin a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btMenuVertical.btLightSkin .btSearch .btIco a:before{
    -webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.btMenuVertical.btLightSkin .btSearch .btIco a:hover:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btMenuVertical.btDarkSkin a.btIconWidget.btAccentIconWidget:hover .btIco.btIcoDefaultType.btIcoDefaultColor .btIcoHolder:before{
    -webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btMenuVertical.btDarkSkin .btSearch .btIco a:hover:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btLightSkin .btBox .btSearch button:hover,
.btDarkSkin .btLightSkin .btBox .btSearch button:hover,
.btLightSkin .btDarkSkin .btLightSkin .btBox .btSearch button:hover,
.btDarkSkin .btBox .btSearch button:hover,
.btLightSkin .btDarkSkin .btBox .btSearch button:hover,
.btDarkSkin.btLightSkin .btDarkSkin .btBox .btSearch button:hover,
.btLightSkin form.woocommerce-product-search button:hover,
.btDarkSkin .btLightSkin form.woocommerce-product-search button:hover,
.btLightSkin .btDarkSkin .btLightSkin form.woocommerce-product-search button:hover,
.btDarkSkin form.woocommerce-product-search button:hover,
.btLightSkin .btDarkSkin form.woocommerce-product-search button:hover,
.btDarkSkin.btLightSkin .btDarkSkin form.woocommerce-product-search button:hover{background: {$accentColor} !important;
    border-color: {$accentColor} !important;}
form.woocommerce-product-search button:hover,
form.woocommerce-product-search input[type=submit]:hover{background: {$accentColor} !important;}
.topTools .widget_search button,
.topBarInMenu .widget_search button{
    background: {$accentColor};}
.topTools .widget_search button:before,
.topBarInMenu .widget_search button:before{
    color: {$accentColor};}
.topTools .widget_search button:hover,
.topBarInMenu .widget_search button:hover{background: {$accentColorDark};}
.btLightSkin.btMenuHorizontal .topTools .widget_search .btSearch .btIco a:before,
.btLightSkin.btMenuHorizontal .topBarInMenu .widget_search .btSearch .btIco a:before,
.btDarkSkin .btLightSkin.btMenuHorizontal .topTools .widget_search .btSearch .btIco a:before,
.btDarkSkin .btLightSkin.btMenuHorizontal .topBarInMenu .widget_search .btSearch .btIco a:before,
.btLightSkin .btDarkSkin .btLightSkin.btMenuHorizontal .topTools .widget_search .btSearch .btIco a:before,
.btLightSkin .btDarkSkin .btLightSkin.btMenuHorizontal .topBarInMenu .widget_search .btSearch .btIco a:before{
    -webkit-box-shadow: 0 0 0 0 {$accentColor} inset;
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.btLightSkin.btMenuHorizontal .topTools .widget_search .btSearch .btIco a:hover:before,
.btLightSkin.btMenuHorizontal .topBarInMenu .widget_search .btSearch .btIco a:hover:before,
.btDarkSkin .btLightSkin.btMenuHorizontal .topTools .widget_search .btSearch .btIco a:hover:before,
.btDarkSkin .btLightSkin.btMenuHorizontal .topBarInMenu .widget_search .btSearch .btIco a:hover:before,
.btLightSkin .btDarkSkin .btLightSkin.btMenuHorizontal .topTools .widget_search .btSearch .btIco a:hover:before,
.btLightSkin .btDarkSkin .btLightSkin.btMenuHorizontal .topBarInMenu .widget_search .btSearch .btIco a:hover:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btDarkSkin.btMenuHorizontal .topTools .widget_search .btSearch .btIco a:hover:before,
.btDarkSkin.btMenuHorizontal .topBarInMenu .widget_search .btSearch .btIco a:hover:before,
.btLightSkin .btDarkSkin.btMenuHorizontal .topTools .widget_search .btSearch .btIco a:hover:before,
.btLightSkin .btDarkSkin.btMenuHorizontal .topBarInMenu .widget_search .btSearch .btIco a:hover:before,
.btDarkSkin.btLightSkin .btDarkSkin.btMenuHorizontal .topTools .widget_search .btSearch .btIco a:hover:before,
.btDarkSkin.btLightSkin .btDarkSkin.btMenuHorizontal .topBarInMenu .widget_search .btSearch .btIco a:hover:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btIcoFilledType.btIcoAccentColor.btIconHexagonShape.btIco .btIcoHolder .hex{fill: {$accentColor};}
.btIcoFilledType.btIcoAlternateColor.btIconHexagonShape.btIco .btIcoHolder .hex{fill: {$alternateColor};}
.btIcoOutlineType.btIcoAccentColor.btIconHexagonShape.btIco .btIcoHolder .hex{
    stroke: {$accentColor};}
.btIcoOutlineType.btIcoAlternateColor.btIconHexagonShape.btIco .btIcoHolder .hex{
    stroke: {$alternateColor};}
.btLightSkin .btIconHexagonShape.btIcoOutlineType.btIcoAccentColor.btIco:hover .btIcoHolder .hex,
.btDarkSkin .btLightSkin .btIconHexagonShape.btIcoOutlineType.btIcoAccentColor.btIco:hover .btIcoHolder .hex,
.btLightSkin .btDarkSkin .btLightSkin .btIconHexagonShape.btIcoOutlineType.btIcoAccentColor.btIco:hover .btIcoHolder .hex,
.btDarkSkin .btIconHexagonShape.btIcoOutlineType.btIcoAccentColor.btIco:hover .btIcoHolder .hex,
.btLightSkin .btDarkSkin .btIconHexagonShape.btIcoOutlineType.btIcoAccentColor.btIco:hover .btIcoHolder .hex,
.btDarkSkin.btLightSkin .btDarkSkin .btIconHexagonShape.btIcoOutlineType.btIcoAccentColor.btIco:hover .btIcoHolder .hex{fill: {$accentColor};
    stroke: {$accentColor};}
.btLightSkin .btIconHexagonShape.btIcoOutlineType.btIcoAlternateColor.btIco:hover .btIcoHolder .hex,
.btDarkSkin .btLightSkin .btIconHexagonShape.btIcoOutlineType.btIcoAlternateColor.btIco:hover .btIcoHolder .hex,
.btLightSkin .btDarkSkin .btLightSkin .btIconHexagonShape.btIcoOutlineType.btIcoAlternateColor.btIco:hover .btIcoHolder .hex,
.btDarkSkin .btIconHexagonShape.btIcoOutlineType.btIcoAlternateColor.btIco:hover .btIcoHolder .hex,
.btLightSkin .btDarkSkin .btIconHexagonShape.btIcoOutlineType.btIcoAlternateColor.btIco:hover .btIcoHolder .hex,
.btDarkSkin.btLightSkin .btDarkSkin .btIconHexagonShape.btIcoOutlineType.btIcoAlternateColor.btIco:hover .btIcoHolder .hex{fill: {$alternateColor};
    stroke: {$alternateColor};}
.btLightSkin .btIconHexagonShape.btIcoFilledType.btIcoAlternateColor.btIco:hover .btIcoHolder .hex,
.btDarkSkin .btLightSkin .btIconHexagonShape.btIcoFilledType.btIcoAlternateColor.btIco:hover .btIcoHolder .hex,
.btLightSkin .btDarkSkin .btLightSkin .btIconHexagonShape.btIcoFilledType.btIcoAlternateColor.btIco:hover .btIcoHolder .hex,
.btDarkSkin .btIconHexagonShape.btIcoFilledType.btIcoAlternateColor.btIco:hover .btIcoHolder .hex,
.btLightSkin .btDarkSkin .btIconHexagonShape.btIcoFilledType.btIcoAlternateColor.btIco:hover .btIcoHolder .hex,
.btDarkSkin.btLightSkin .btDarkSkin .btIconHexagonShape.btIcoFilledType.btIcoAlternateColor.btIco:hover .btIcoHolder .hex{
    stroke: {$alternateColor};}
.btLightSkin .btIconHexagonShape.btIcoFilledType.btIcoAccentColor.btIco:hover .btIcoHolder .hex,
.btDarkSkin .btLightSkin .btIconHexagonShape.btIcoFilledType.btIcoAccentColor.btIco:hover .btIcoHolder .hex,
.btLightSkin .btDarkSkin .btLightSkin .btIconHexagonShape.btIcoFilledType.btIcoAccentColor.btIco:hover .btIcoHolder .hex,
.btDarkSkin .btIconHexagonShape.btIcoFilledType.btIcoAccentColor.btIco:hover .btIcoHolder .hex,
.btLightSkin .btDarkSkin .btIconHexagonShape.btIcoFilledType.btIcoAccentColor.btIco:hover .btIcoHolder .hex,
.btDarkSkin.btLightSkin .btDarkSkin .btIconHexagonShape.btIcoFilledType.btIcoAccentColor.btIco:hover .btIcoHolder .hex{
    stroke: {$accentColor};}
.btIconHexagonShape .btIco.btIcoFilledType .btIcoHolder svg .hex{
    fill: {$accentColor};}
.btIconHexagonShape .btIco.btIcoFilledType:hover .btIcoHolder svg .hex{stroke: {$accentColor};}
.btIconHexagonShape .btIco.btIcoOutlineType .btIcoHolder svg .hex{stroke: {$accentColor};}
.btIconHexagonShape .btIco.btIcoOutlineType:hover .btIcoHolder svg .hex{stroke: {$accentColor};
    fill: {$accentColor};}
.btIco.btIcoFilledType.btIcoAccentColor .btIcoHolder:before,
.btIco.btIcoOutlineType.btIcoAccentColor:hover .btIcoHolder:before{-webkit-box-shadow: 0 0 0 1.5em {$accentColor} inset;
    box-shadow: 0 0 0 1.5em {$accentColor} inset;}
.btIco.btIcoFilledType.btIcoAccentColor:hover .btIcoHolder:before,
.btIco.btIcoOutlineType.btIcoAccentColor .btIcoHolder:before{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    color: {$accentColor};}
.btIco.btIcoFilledType.btIcoAlternateColor .btIcoHolder:before,
.btIco.btIcoOutlineType.btIcoAlternateColor:hover .btIcoHolder:before{-webkit-box-shadow: 0 0 0 1.5em {$alternateColor} inset;
    box-shadow: 0 0 0 1.5em {$alternateColor} inset;}
.btIco.btIcoFilledType.btIcoAlternateColor:hover .btIcoHolder:before,
.btIco.btIcoOutlineType.btIcoAlternateColor .btIcoHolder:before{-webkit-box-shadow: 0 0 0 1px {$alternateColor} inset;
    box-shadow: 0 0 0 1px {$alternateColor} inset;
    color: {$alternateColor};}
.btLightSkin .btIco.btIcoDefaultType.btIcoAccentColor .btIcoHolder:before,
.btLightSkin .btIco.btIcoDefaultType.btIcoDefaultColor:hover .btIcoHolder:before,
.btDarkSkin .btLightSkin .btIco.btIcoDefaultType.btIcoAccentColor .btIcoHolder:before,
.btDarkSkin .btLightSkin .btIco.btIcoDefaultType.btIcoDefaultColor:hover .btIcoHolder:before,
.btLightSkin .btDarkSkin .btLightSkin .btIco.btIcoDefaultType.btIcoAccentColor .btIcoHolder:before,
.btLightSkin .btDarkSkin .btLightSkin .btIco.btIcoDefaultType.btIcoDefaultColor:hover .btIcoHolder:before,
.btDarkSkin .btIco.btIcoDefaultType.btIcoAccentColor .btIcoHolder:before,
.btDarkSkin .btIco.btIcoDefaultType.btIcoDefaultColor:hover .btIcoHolder:before,
.btLightSkin .btDarkSkin .btIco.btIcoDefaultType.btIcoAccentColor .btIcoHolder:before,
.btLightSkin .btDarkSkin .btIco.btIcoDefaultType.btIcoDefaultColor:hover .btIcoHolder:before,
.btDarkSkin.btLightSkin .btDarkSkin .btIco.btIcoDefaultType.btIcoAccentColor .btIcoHolder:before,
.btDarkSkin.btLightSkin .btDarkSkin .btIco.btIcoDefaultType.btIcoDefaultColor:hover .btIcoHolder:before{color: {$accentColor};}
.btLightSkin .btIco.btIcoDefaultType.btIcoAlternateColor .btIcoHolder:before,
.btDarkSkin .btLightSkin .btIco.btIcoDefaultType.btIcoAlternateColor .btIcoHolder:before,
.btLightSkin .btDarkSkin .btLightSkin .btIco.btIcoDefaultType.btIcoAlternateColor .btIcoHolder:before,
.btDarkSkin .btIco.btIcoDefaultType.btIcoAlternateColor .btIcoHolder:before,
.btLightSkin .btDarkSkin .btIco.btIcoDefaultType.btIcoAlternateColor .btIcoHolder:before,
.btDarkSkin.btLightSkin .btDarkSkin .btIco.btIcoDefaultType.btIcoAlternateColor .btIcoHolder:before{color: {$alternateColor};}
.btIcoAccentColor:hover span{color: {$accentColor};}
.btLightSkin .btIcoAccentColor:hover span,
.btDarkSkin .btLightSkin .btIcoAccentColor:hover span,
.btLightSkin .btDarkSkin .btLightSkin .btIcoAccentColor:hover span{color: {$accentColor};}
.btDarkSkin .btIcoAccentColor:hover span,
.btLightSkin .btDarkSkin .btIcoAccentColor:hover span,
.btDarkSkin.btLightSkin .btDarkSkin .btIcoAccentColor:hover span{color: {$accentColor};}
.btIcoAlternateColor:hover span{color: {$alternateColor};}
.btLightSkin .btIcoAlternateColor:hover span,
.btDarkSkin .btLightSkin .btIcoAlternateColor:hover span,
.btLightSkin .btDarkSkin .btLightSkin .btIcoAlternateColor:hover span{color: {$alternateColor};}
.btDarkSkin .btIcoAlternateColor:hover span,
.btLightSkin .btDarkSkin .btIcoAlternateColor:hover span,
.btDarkSkin.btLightSkin .btDarkSkin .btIcoAlternateColor:hover span{color: {$alternateColor};}
.btBtn{
    font-family: \"{$headingSuperTitleFont}\";}
.btnFilledStyle.btnAccentColor{background-color: {$accentColor};}
.btnFilledStyle.btnAccentColor:hover{background-color: {$accentColorDark};
    color: {$accentColor};}
.btnOutlineStyle.btnAccentColor{
    border: 2px solid {$accentColor};
    color: {$accentColor};}
.btnOutlineStyle.btnAccentColor span,
.btnOutlineStyle.btnAccentColor span:before,
.btnOutlineStyle.btnAccentColor a,
.btnOutlineStyle.btnAccentColor .btIco a:before,
.btnOutlineStyle.btnAccentColor button{color: {$accentColor} !important;}
.btnOutlineStyle.btnAccentColor:hover{background-color: {$accentColor};
    border: 2px solid {$accentColor};}
.btnBorderlessStyle.btnAccentColor span,
.btnBorderlessStyle.btnAccentColor span:before,
.btnBorderlessStyle.btnAccentColor a,
.btnBorderlessStyle.btnAccentColor .btIco a:before,
.btnBorderlessStyle.btnAccentColor button{color: {$accentColor};}
.btnFilledStyle.btnAlternateColor{background-color: {$alternateColor};}
.btnFilledStyle.btnAlternateColor:hover{background-color: {$alternateColorDark};
    color: {$alternateColor};}
.btnOutlineStyle.btnAlternateColor{
    border: 2px solid {$alternateColor};
    color: {$alternateColor};}
.btnOutlineStyle.btnAlternateColor span,
.btnOutlineStyle.btnAlternateColor span:before,
.btnOutlineStyle.btnAlternateColor a,
.btnOutlineStyle.btnAlternateColor .btIco a:before,
.btnOutlineStyle.btnAlternateColor button{color: {$alternateColor} !important;}
.btnOutlineStyle.btnAlternateColor:hover{background-color: {$alternateColor};
    border: 2px solid {$alternateColor};}
.btnBorderlessStyle.btnAlternateColor span,
.btnBorderlessStyle.btnAlternateColor span:before,
.btnBorderlessStyle.btnAlternateColor a,
.btnBorderlessStyle.btnAlternateColor .btIco a:before,
.btnBorderlessStyle.btnAlternateColor button{color: {$alternateColor};}
.btCounterHolder{font-family: \"{$headingFont}\";}
.btCounterHolder .btCountdownHolder .days_text,
.btCounterHolder .btCountdownHolder .hours_text,
.btCounterHolder .btCountdownHolder .minutes_text,
.btCounterHolder .btCountdownHolder .seconds_text{
    font-family: {$headingSuperTitleFont};}
.btProgressContent{font-family: \"{$headingSuperTitleFont}\";}
.btProgressContent .btProgressAnim{
    background-color: {$accentColor};}
.bpgPhoto:hover .captionPane .captionTable .captionTxt .btTilesArticleTop{
    font-family: {$headingSuperTitleFont};}
.bpgPhoto:hover .captionPane .captionTable .captionTxt .btTilesArticleBottom{
    font-family: {$headingSuperTitleFont};}
.btPriceTable .btPriceTableHeader{
    background: {$accentColor};}
.btPriceTableSticker{
    font-family: \"{$headingSuperTitleFont}\";}
.header .headline .btSuperTitleHeading,
.header .dash .btSuperTitleHeading{font-family: {$headingSuperTitleFont};}
.header .headline .btSubTitleHeading,
.header .dash .btSubTitleHeading{font-family: {$headingSubTitleFont};}
.header .btSuperTitle{font-family: \"{$headingSuperTitleFont}\";}
.header .btSubTitle{font-family: \"{$headingSubTitleFont}\";}
.btDash.bottomDash .dash:after{
    border-bottom: 4px solid {$accentColor};}
.btDash.topDash .btSuperTitle:after,
.btDash.topDash .btSuperTitle:before{
    border-top: 1px solid {$accentColor};}
.btNoMore{
    font-family: {$headingSuperTitleFont};}
.btGridContent .header .btSuperTitle a:hover{color: {$accentColor};}
.btCatFilter{
    font-family: {$headingSuperTitleFont};}
.btCatFilter .btCatFilterItem:hover{color: {$accentColor};}
.btCatFilter .btCatFilterItem:hover b:after{
    border-bottom-color: {$accentColor} !important;}
.btCatFilter .btCatFilterItem.active{color: {$accentColor};}
.btCatFilter .btCatFilterItem.active b:after{border-bottom-color: {$accentColor} !important;}
.btCatFilter .btCatFilterItem b:after{
    border-bottom: 1px solid {$accentColor};}
.nbs a .nbsItem .nbsDir{
    font-family: \"{$headingSuperTitleFont}\";}
.neighboringArticles .nbs a .nbsItem .nbsDir{
    font-family: '{$headingSuperTitleFont}',arial,sans-serif;}
.neighboringArticles .nbs a:hover .nbsTitle{color: {$accentColor};}
.recentTweets small:before{
    color: {$accentColor};}
.btInfoBar .btInfoBarMeta p{
    font-family: {$headingSuperTitleFont};}
.tabsHeader li{
    font-family: \"{$headingFont}\";}
.tabsHeader li a:hover,
.tabsHeader li span:hover{color: {$accentColor};}
.tabsVertical .tabAccordionTitle{
    font-family: \"{$headingFont}\";}
.tabsVertical .tabAccordionTitle:before{
    -webkit-box-shadow: 0 0 0 1em {$accentColor} inset;
    box-shadow: 0 0 0 1em {$accentColor} inset;}
.tabsVertical .tabAccordionTitle:hover:before{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    color: {$accentColor};}
.tabsVertical .tabAccordionTitle.on:before{-webkit-box-shadow: 0 0 0 1px {$alternateColor} inset;
    box-shadow: 0 0 0 1px {$alternateColor} inset;
    color: {$alternateColor};}
.tabsVertical .tabAccordionTitle.on:hover:before{-webkit-box-shadow: 0 0 0 1em {$alternateColor} inset;
    box-shadow: 0 0 0 1em {$alternateColor} inset;}
.btVisualizer{font-family: {$headingFont};}
form.wpcf7-form .wpcf7-submit{
    font-family: {$headingSuperTitleFont};}
.btLightSkin form.wpcf7-form .wpcf7-submit,
.btDarkSkin .btLightSkin form.wpcf7-form .wpcf7-submit,
.btLightSkin .btDarkSkin .btLightSkin form.wpcf7-form .wpcf7-submit,
.btDarkSkin form.wpcf7-form .wpcf7-submit,
.btLightSkin .btDarkSkin form.wpcf7-form .wpcf7-submit,
.btDarkSkin.btLightSkin .btDarkSkin form.wpcf7-form .wpcf7-submit{
    background-color: {$accentColor};}
.btLightSkin form.wpcf7-form .wpcf7-submit:hover,
.btDarkSkin .btLightSkin form.wpcf7-form .wpcf7-submit:hover,
.btLightSkin .btDarkSkin .btLightSkin form.wpcf7-form .wpcf7-submit:hover,
.btDarkSkin form.wpcf7-form .wpcf7-submit:hover,
.btLightSkin .btDarkSkin form.wpcf7-form .wpcf7-submit:hover,
.btDarkSkin.btLightSkin .btDarkSkin form.wpcf7-form .wpcf7-submit:hover{background-color: {$accentColorDark};}
.star-rating span:before{
    color: {$accentColor};}
.btTickerHolder{
    -webkit-box-shadow: 0 2.461em 0 {$accentColor} inset;
    box-shadow: 0 2.461em 0 {$accentColor} inset;}
.btBoxedPage .btTickerHolder{
    -webkit-box-shadow: 0 2.461em 0 {$accentColor} inset,0 0 20px 0 rgba(0,0,0,.15);
    box-shadow: 0 2.461em 0 {$accentColor} inset,0 0 20px 0 rgba(0,0,0,.15);}
.btTickerHolder .btTickerWrapper .btTickerTitle{
    font-family: {$headingFont};}
.btTickerHolder .btTickerWrapper .btTicker{
    font-family: {$headingSuperTitleFont};}
.btAccentDarkHeader .btTickerHolder .btTickerTitle,
.btAccentDarkHeader .btTickerHolder .btTicker{color: {$accentColor};}
.btLightSkin.btAccentDarkHeader .btTickerHolder .btTickerTitle li a,
.btDarkSkin.btAccentDarkHeader .btTickerHolder .btTickerTitle li a,
.btLightSkin.btAccentDarkHeader .btTickerHolder .btTicker li a,
.btDarkSkin.btAccentDarkHeader .btTickerHolder .btTicker li a{color: {$accentColor};}
.btAccentDarkHeader .btTickerHolder .btTickerTitle li a:after,
.btAccentDarkHeader .btTickerHolder .btTicker li a:after{border-color: {$accentColor};}
.btCategoryTitle .btCatFilter .btCatFilterItem:hover a{color: {$accentColor} !important;}
.btAnimNav li.btAnimNavDot{
    font-family: {$headingSuperTitleFont};}
.headline b.animate.animated{
    color: {$accentColor};}
.headline em.animate{
    font-family: {$bodyFont};}
p.demo_store{
    background-color: {$accentColor};}
.woocommerce .woocommerce-info a: not(.button),
.woocommerce .woocommerce-message a: not(.button),
.woocommerce-page .woocommerce-info a: not(.button),
.woocommerce-page .woocommerce-message a: not(.button){color: {$accentColor};}
.woocommerce .woocommerce-message:before,
.woocommerce .woocommerce-info:before,
.woocommerce-page .woocommerce-message:before,
.woocommerce-page .woocommerce-info:before{
    color: {$accentColor};}
.woocommerce a.button,
.woocommerce input[type=\"submit\"],
.woocommerce button[type=\"submit\"],
.woocommerce input.button,
.woocommerce input.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce .button.alt:hover,
.woocommerce button.alt:hover,
.woocommerce-page a.button,
.woocommerce-page input[type=\"submit\"],
.woocommerce-page button[type=\"submit\"],
.woocommerce-page input.button,
.woocommerce-page input.alt:hover,
.woocommerce-page a.button.alt:hover,
.woocommerce-page .button.alt:hover,
.woocommerce-page button.alt:hover{
    background-color: {$alternateColor};
    font-family: {$headingSuperTitleFont};}
.woocommerce a.button:hover,
.woocommerce input[type=\"submit\"]:hover,
.woocommerce .button:hover,
.woocommerce button:hover,
.woocommerce input.alt,
.woocommerce a.button.alt,
.woocommerce .button.alt,
.woocommerce button.alt,
.woocommerce-page a.button:hover,
.woocommerce-page input[type=\"submit\"]:hover,
.woocommerce-page .button:hover,
.woocommerce-page button:hover,
.woocommerce-page input.alt,
.woocommerce-page a.button.alt,
.woocommerce-page .button.alt,
.woocommerce-page button.alt{background-color: {$alternateColorDark};
    font-family: {$headingSuperTitleFont};}
.woocommerce a.button.checkout,
.woocommerce input.button.checkout,
.woocommerce-page a.button.checkout,
.woocommerce-page input.button.checkout{background-color: {$accentColor};}
.woocommerce a.button.checkout:hover,
.woocommerce input.button.checkout:hover,
.woocommerce-page a.button.checkout:hover,
.woocommerce-page input.button.checkout:hover{background-color: {$accentColorDark};}
.woocommerce p.lost_password:before,
.woocommerce-page p.lost_password:before{
    color: {$accentColor};}
.woocommerce form.login p.lost_password a:hover,
.woocommerce-page form.login p.lost_password a:hover{color: {$accentColor};}
.woocommerce .added:after,
.woocommerce .loading:after,
.woocommerce-page .added:after,
.woocommerce-page .loading:after{
    background-color: {$accentColor};}
.woocommerce form .form-row .select2-container,
.woocommerce-page form .form-row .select2-container{
    font-family: \"{$headingFont}\";}
.woocommerce div.product .btPriceTableSticker,
.woocommerce-page div.product .btPriceTableSticker{
    background: {$accentColor};}
.woocommerce div.product form.cart .single_add_to_cart_button,
.woocommerce-page div.product form.cart .single_add_to_cart_button{
    background: {$accentColor};}
.woocommerce div.product form.cart .single_add_to_cart_button:hover,
.woocommerce-page div.product form.cart .single_add_to_cart_button:hover{background: {$accentColorDark};}
.woocommerce div.product p.price,
.woocommerce div.product span.price,
.woocommerce-page div.product p.price,
.woocommerce-page div.product span.price{
    font-family: \"{$headingSuperTitleFont}\";}
.woocommerce div.product .stock,
.woocommerce-page div.product .stock{color: {$accentColor};}
.woocommerce div.product a.reset_variations:hover,
.woocommerce-page div.product a.reset_variations:hover{color: {$accentColor};}
.woocommerce .added_to_cart,
.woocommerce-page .added_to_cart{
    font-family: {$headingSuperTitleFont};}
.woocommerce .products ul li.product .btPriceTableSticker,
.woocommerce ul.products li.product .btPriceTableSticker,
.woocommerce-page .products ul li.product .btPriceTableSticker,
.woocommerce-page ul.products li.product .btPriceTableSticker{
    background: {$alternateColor};}
.woocommerce .products ul li.product .price,
.woocommerce ul.products li.product .price,
.woocommerce-page .products ul li.product .price,
.woocommerce-page ul.products li.product .price{
    font-family: \"{$headingSuperTitleFont}\";}
.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span,
.woocommerce-page nav.woocommerce-pagination ul li a,
.woocommerce-page nav.woocommerce-pagination ul li span{
    background: {$accentColor};}
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce-page nav.woocommerce-pagination ul li a:focus,
.woocommerce-page nav.woocommerce-pagination ul li a:hover{background: {$accentColorDark};}
.woocommerce p.stars a[class^=\"star-\"].active:after,
.woocommerce p.stars a[class^=\"star-\"]:hover:after,
.woocommerce-page p.stars a[class^=\"star-\"].active:after,
.woocommerce-page p.stars a[class^=\"star-\"]:hover:after{color: {$accentColor};}
.woocommerce .comment-respond > h4:before,
.woocommerce-page .comment-respond > h4:before{
    color: {$accentColor};}
.woocommerce .comment-form label .required,
.woocommerce-page .comment-form label .required{
    color: {$accentColor};}
.woocommerce .comment-form .form-submit input[type=\"submit\"],
.woocommerce-page .comment-form .form-submit input[type=\"submit\"]{
    background: {$accentColor};}
.woocommerce .comment-form .form-submit input[type=\"submit\"]:hover,
.woocommerce-page .comment-form .form-submit input[type=\"submit\"]:hover{background: {$accentColorDark};}
.woocommerce .related.products > .header > div > h4:before,
.woocommerce #tab-description > .header > div > h4:before,
.woocommerce-page .related.products > .header > div > h4:before,
.woocommerce-page #tab-description > .header > div > h4:before{
    color: {$accentColor};}
.woocommerce .woocommerce-noreviews,
.woocommerce-page .woocommerce-noreviews{font-family: {$headingSuperTitleFont};}
.woocommerce-cart table.cart td.product-remove a.remove{
    color: {$accentColor};
    border: 1px solid {$accentColor};}
.woocommerce-cart table.cart td.product-remove a.remove:hover{background-color: {$accentColor};}
.woocommerce-cart .cart_totals .discount td{color: {$accentColor};}
.woocommerce-account header.title .edit{
    color: {$accentColor};}
.woocommerce-account header.title .edit:before{
    color: {$accentColor};}
.btLightSkin.woocommerce-page .product .headline a:hover,
.btDarkSkin .btLightSkin.woocommerce-page .product .headline a:hover,
.btLightSkin .btDarkSkin .btLightSkin.woocommerce-page .product .headline a:hover,
.btDarkSkin.woocommerce-page .product .headline a:hover,
.btLightSkin .btDarkSkin.woocommerce-page .product .headline a:hover,
.btDarkSkin.btLightSkin .btDarkSkin.woocommerce-page .product .headline a:hover{color: {$accentColor};}
.woocommerce-MyAccount-navigation ul li{
    font-family: \"{$headingFont}\";}
.woocommerce-MyAccount-navigation ul li a:hover,
.woocommerce-MyAccount-navigation ul li span:hover{color: {$accentColor};}
.btQuoteBooking .btTotalNextWrapper{
    font-family: \"{$headingFont}\";}
.btQuoteBooking .btContactNext{
    border: {$accentColor} 2px solid;
    color: {$accentColor};}
.btQuoteBooking .btContactNext:hover,
.btQuoteBooking .btContactNext:active{background-color: {$accentColor} !important;}
.btQuoteBooking .btQuoteSwitch:hover{-webkit-box-shadow: 0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);
    box-shadow: 0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);}
.btQuoteBooking .btQuoteSwitch.on .btQuoteSwitchInner{
    background: {$accentColor};}
.btQuoteBooking .dd.ddcommon.borderRadiusTp .ddTitleText,
.btQuoteBooking .dd.ddcommon.borderRadiusBtm .ddTitleText{
    -webkit-box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);
    box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);}
.btQuoteBooking .ui-slider .ui-slider-handle{
    background: {$accentColor};}
.btQuoteBooking .btQuoteBookingForm .btQuoteTotal{
    background: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError input,
.btQuoteBooking .btContactFieldMandatory.btContactFieldError textarea{border: 1px solid {$accentColor};
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError .dd.ddcommon.borderRadius .ddTitleText{border: 1px solid {$accentColor};
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError input:hover,
.btQuoteBooking .btContactFieldMandatory.btContactFieldError textarea:hover{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);
    box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError .dd.ddcommon.borderRadius:hover .ddTitleText{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);
    box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError input:focus,
.btQuoteBooking .btContactFieldMandatory.btContactFieldError textarea:focus{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset,5px 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);
    box-shadow: 0 0 0 1px {$accentColor} inset,5px 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError .dd.ddcommon.borderRadiusTp .ddTitleText{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset,5px 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);
    box-shadow: 0 0 0 1px {$accentColor} inset,5px 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);}
.btQuoteBooking .btSubmitMessage{color: {$accentColor};}
.btDatePicker .ui-datepicker-header{
    background-color: {$accentColor};}
.btQuoteBooking .btContactSubmit{font-family: \"{$headingFont}\";
    background-color: {$accentColor};
    border: 1px solid {$accentColor};}
.btQuoteBooking .btContactSubmit:hover{
    color: {$accentColor};}
.btPayPalButton:hover{-webkit-box-shadow: 0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);
    box-shadow: 0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);}
#btSettingsPanel #btSettingsPanelToggler:before{
    color: {$accentColor};}
#btSettingsPanel h4{
    background-color: {$accentColor};}
#btSettingsPanel .btSettingsPanelRow.btAccentColorRow .trigger,
#btSettingsPanel .btSettingsPanelRow.btAccentColorRow select{border-color: {$accentColor};}
#btSettingsPanel .btSettingsPanelRow.btAlternateColorRow .trigger,
#btSettingsPanel .btSettingsPanelRow.btAlternateColorRow select{border-color: {$alternateColor};}
", array() );