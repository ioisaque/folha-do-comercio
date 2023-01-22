<?php
$ticker_active		= boldthemes_get_option( 'ticker_active' );
if ( $ticker_active ) {	

	// ticker options
	$ticker_custom_text = boldthemes_get_option( 'ticker_custom_text' );
	$ticker_posts		= boldthemes_get_option( 'ticker_posts' );
	$ticker_interval	= boldthemes_get_option( 'ticker_interval' );
	$ticker_post_category			= boldthemes_get_option( 'ticker_post_category' );
	$ticker_post_category_number	= boldthemes_get_option( 'ticker_post_category_number' );

	if (empty($ticker_interval)){
		$ticker_interval = 3000;
	}		

	$ticker_posts_arr_rows = array();
	if ( !empty($ticker_posts) || !empty($ticker_post_category) ){

		// get posts 
		if ( !empty( $ticker_post_category ) ){// categories
			// find categories
			$_ticker_post_category = explode( "|",  $ticker_post_category );
			$tickers_post_category_arr = array();
			foreach( $_ticker_post_category as $_ticker_post_category_item ) {
				if (is_numeric( $_ticker_post_category_item )) {
					$catid = $_ticker_post_category_item;
				} else {
					$idObj = get_category_by_slug($_ticker_post_category_item); 
					$catid = $idObj->term_id;
				}
				if ( !in_array( $catid, $tickers_post_category_arr ) ) {
					array_push( $tickers_post_category_arr, $catid );
				}
			}			
			//find posts names in categories
			$cat_ticker_args = array( 
				'numberposts'	=> $ticker_post_category_number,
				'category__in'	=> $tickers_post_category_arr, // -> no subcategories
				'post_type'		=> 'post',
				'post_status'	=> 'publish',
				'orderby'		=> 'post_date',
				'order'			=> 'DESC' 
			);	
			$recent_posts_q = new WP_Query($cat_ticker_args);
			$cat_ticker_posts = boldthemes_get_posts_array( $recent_posts_q, 'post', array() );			

			// posts from ticker_post_category
			foreach( $cat_ticker_posts as $cat_ticker_post ) {
				array_push($ticker_posts_arr_rows, urlencode($cat_ticker_post["title"]));				
			}			
		} else if ( !empty( $ticker_posts ) ){//posts from ticker_posts, no categories
			$ticker_posts_arr_rows = explode( PHP_EOL, $ticker_posts );
		}


		$tickers_arr = array();
		foreach ($ticker_posts_arr_rows as $ticker_posts_arr_row){
			$_ticker_posts_arr_row = explode( "|",  $ticker_posts_arr_row );
			foreach( $_ticker_posts_arr_row as $item ) {
				array_push($tickers_arr, $item);
			}		
		}
		
		// get posts data
		$posts_data = array();
		foreach( $tickers_arr as $item ) {
			$data = array();
			$data_arr = array();
			$item_arr = explode( ';', $item );

			$title		= '';
			$url		= '';
			$title_url	= '';

			if ( count( $item_arr ) == 1 ) {									
				if ( empty($item_arr[0]) )
					continue;

				$title		= '';
				$url		= urldecode($item_arr[0]);
				$title_url	= urldecode($item_arr[0]);									
			}

			if ( count( $item_arr ) == 2 ) {
				if ( empty($item_arr[0]) && empty($item_arr[1]) )
					continue;

				$title	= urldecode($item_arr[0]);
				$url	= $item_arr[1];							
			}

			if( substr( $url, 0, 3 ) == 'www' ) $url = 'http://' . $url;			

			if ( $url != '' &&  $url != '#' && substr( $url, 0, 4 ) != 'http' && substr( $url, 0, 5 ) != 'https' && substr( $url, 0, 6 ) != 'mailto' ) {
				// numeric or slug
				if (is_numeric( $url )) {
					//numeric
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'p' => $url   // id of the post
					);
					$recent_posts_q = new WP_Query($args); 
					
				}else{
					//slug
					$args = array(
					  'name'        => $url, // slug of the post
					  'post_type'   => 'post',
					  'post_status' => 'publish',
					  'numberposts' => 1
					);
					$recent_posts_q = new WP_Query($args); 
				}

				$data = boldthemes_get_posts_array( $recent_posts_q, 'blog', array() );	
				if ( !empty($data) ) {
					$data_arr["title"]			= $data[0]["title"];
					$data_arr["permalink"]		= $data[0]["permalink"];				
					$data_arr["ticker_title"]	= $title ? $title : '';	
					$data_arr["date"]			= $data[0]["date"];
					$data_arr["ID"]				= $data[0]["ID"];
				}
				
			}else {
				//link
				$data_arr["title"]			= $title_url;
				$data_arr["permalink"]		= $url;				
				$data_arr["ticker_title"]	= $title ? $title : '';	
				$data_arr["date"]			= '';
				$data_arr["ID"]				= '';
			}
			
			array_push($posts_data, $data_arr);
		}

		$ticker_extra_class = ''; 
		if ( boldthemes_get_option( 'boxed_menu' ) ) {
			$ticker_extra_class .= 'gutter ';
		}
	
		?>
		<div class="btTickerHolder <?php echo esc_attr( $ticker_extra_class ); ?>">
			<div class="port">
				<div class="btTickerWrapper">
					<span class="btTickerTitle">
						<?php echo urldecode(wp_kses_post( $ticker_custom_text )); ?>
					</span>
					<ul class="btTicker" data-interval="<?php echo esc_attr( $ticker_interval ); ?>">
					<?php 			
							foreach( $posts_data as $post_data ) {

								$ticker_title		= !empty($post_data["ticker_title"])  ? $post_data["ticker_title"] : $post_data["title"];
								$ticker_link		= !empty($post_data["permalink"])  ? $post_data["permalink"] : '';		
								$ticker_date_html	= !empty($post_data["date"])  ? $post_data["date"] : '';
								$ticker_cats_html	= '';
								$ticker_cats_arr	= !empty($post_data["ID"])  ? get_the_category( $post_data["ID"] ) : array();

								if ( !empty($ticker_cats_arr) ){									
									foreach($ticker_cats_arr as $ticker_cat){
										$ticker_cats_html .= $ticker_cat->name . ", ";
									}
									$ticker_cats_html = ' <span class="btArticleCategories">( ' . urldecode(trim( $ticker_cats_html, ', ' )) . ' )</span>';
								}

								if ( !empty($ticker_title) ){
									echo "<li>";
										
											if ( !empty($ticker_link) ){
												echo "<a href='" . esc_url_raw( $ticker_link ) . "'>";
											}

											echo wp_kses_post( $ticker_date_html );
												echo "<span class='btArticleTitle'> ";
													echo esc_html( $ticker_title );
												echo  "</span>";											
											echo wp_kses_post( $ticker_cats_html );

											if ( !empty($ticker_link) ){
												echo "</a>";
											}
											
									echo "</li>";
								}
							}
						?>		
					</ul>
				</div>
			</div>
		</div>
		<?php	
			
	}
}

