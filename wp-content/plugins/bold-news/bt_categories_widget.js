'use strict';

window.onunload = function(){};

window.boldthemes_loaded = false;

(function( $ ) {

	$( document ).ready(function() {

		$( '.shotcode_widget_categories select option' ).each(function() {
			$( this ).html( $( this ).html().replace( /\&nbsp;\&nbsp;(\()/, ' $1' ) );
		});		

		/* position on screen */
		$( '.no-touch .btContent .shortcode_widget_categories select' ).fancySelect().on( 'change.fs', function() {
			$( this ).trigger( 'change.$' );
		});

	});	

})( jQuery );