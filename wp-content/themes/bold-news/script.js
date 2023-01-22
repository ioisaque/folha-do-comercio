jQuery(document).ready(function() {
	var $container = jQuery( 'ul.btTicker > li' );
	if ( $container.length ) {

		var interval = jQuery( 'ul.btTicker' ).data( 'interval' );

		var slides = $container.length,
		slide = 0;
		$container.eq(0).addClass("btTickerSlide")
	
		ticker = setInterval(function(){
			$container.removeClass("btTickerSlide");					
			if (slide === slides - 1) {
				slide = 0;
			}else{
				slide++;
			}
			$container.eq( slide ).addClass("btTickerSlide");
		}, interval )
			
		jQuery('.btTicker').mouseover(function(){
			clearInterval(ticker);
		})

		jQuery('.btTicker').mouseout(function(){
			 ticker = setInterval(function(){
				$container.removeClass("btTickerSlide");					
				if (slide === slides - 1) {
					slide = 0;
				}else{
					slide++;
				}
				$container.eq( slide ).addClass("btTickerSlide");
			}, interval )
		})
	}
});