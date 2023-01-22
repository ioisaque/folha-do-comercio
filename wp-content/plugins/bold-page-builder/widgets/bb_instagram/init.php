<?php

if ( ! class_exists( 'BB_Instagram' ) ) {
	
	// INSTAGRAM	
	
	class BB_Instagram extends WP_Widget {
		
		private $feed_id;
	
		function __construct() {
			parent::__construct(
				'bt_bb_instagram', // Base ID
				__( 'BB Instagram', 'bold-builder' ), // Name
				array( 'description' => __( 'Instagram photos.', 'bold-builder' ) ) // Args
			);
		}

		public function widget( $args, $instance ) {
			
			wp_enqueue_script( 'bt_bb_instagram', plugin_dir_url( __FILE__ ) . 'instafeed.min.js', array(), '', true );

			$number = intval( trim( $instance['number'] ) );
			if ( $number < 1 ) {
				$number = 4;
			} else if ( $number > 30 ) {
				$number = 30;
			}
			
			if ( !isset( $instance['resolution'] ) || $instance['resolution'] == '' ) {
				$instance['resolution'] = 'thumbnail';
			}
			
			$instance['user_id'] = isset( $instance['user_id'] ) ? $instance['user_id'] : '';
			$instance['hashtag'] = isset( $instance['hashtag'] ) ? $instance['hashtag'] : '';
			$instance['access_token'] = isset( $instance['access_token'] ) ? $instance['access_token'] : '';
			
			$this->feed_id = uniqid( 'instafeed' );
			// $this->resolution = trim( $instance['resolution'] );
			$this->resolution = 'thumbnail';
			$this->number = $number;
			$this->user_id = trim( $instance['user_id'] );
			$this->hashtag = trim( $instance['hashtag'] );
			$this->client_id = trim( $instance['client_id'] );
			$this->access_token = trim( $instance['access_token'] );

			// if ( $this->number == '' || $this->user_id == '' || $this->client_id == '' ) {
			if ( $this->access_token == '' || $this->client_id == '' || ($this->hashtag == '' && $this->user_id == '')) {
				return;
			}

			echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			}
			
			echo '<div class="btInstaWrap">';
			echo '<div id="' . $this->feed_id . '" class="btInstaGrid"></div>';
			echo '</div>';				
			echo $args['after_widget'];
			
			$proxy = new BB_Instagram_Proxy( $this->feed_id, $this->number, $this->resolution, $this->user_id, $this->hashtag, $this->client_id, $this->access_token );
			add_action( 'wp_footer', array( $proxy, 'js' ) );
		}
	
		
		public function form( $instance ) {
			$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Instagram', 'bold-builder' );
			$number = ! empty( $instance['number'] ) ? $instance['number'] : '4';
			$user_id = ! empty( $instance['user_id'] ) ? $instance['user_id'] : '';
			$hashtag = ! empty( $instance['hashtag'] ) ? $instance['hashtag'] : '';
			$client_id = ! empty( $instance['client_id'] ) ? $instance['client_id'] : '';
			$access_token = ! empty( $instance['access_token'] ) ? $instance['access_token'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'bold-builder' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of photos:', 'bold-builder' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>">			
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'user_id' ) ); ?>"><?php _e( 'User ID:', 'bold-builder' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'user_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'user_id' ) ); ?>" type="text" value="<?php echo esc_attr( $user_id ); ?>">			
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'hashtag' ) ); ?>"><?php _e( 'Hashtag:', 'bold-builder' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hashtag' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hashtag' ) ); ?>" type="text" value="<?php echo esc_attr( $hashtag ); ?>">			
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'client_id' ) ); ?>"><?php _e( 'Client ID:', 'bold-builder' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'client_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'client_id' ) ); ?>" type="text" value="<?php echo esc_attr( $client_id ); ?>">			
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'access_token' ) ); ?>"><?php _e( 'Access token:', 'bold-builder' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'access_token' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'access_token' ) ); ?>" type="text" value="<?php echo esc_attr( $access_token ); ?>">			
			</p>
			<?php 
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
			$instance['user_id'] = ( ! empty( $new_instance['user_id'] ) ) ? strip_tags( $new_instance['user_id'] ) : '';
			$instance['hashtag'] = ( ! empty( $new_instance['hashtag'] ) ) ? strip_tags( $new_instance['hashtag'] ) : '';
			$instance['client_id'] = ( ! empty( $new_instance['client_id'] ) ) ? strip_tags( $new_instance['client_id'] ) : '';
			$instance['access_token'] = ( ! empty( $new_instance['access_token'] ) ) ? strip_tags( $new_instance['access_token'] ) : '';
			
			return $instance;
		}
	}
	
	class BB_Instagram_Proxy {
		function __construct( $feed_id, $number, $resolution, $user_id, $hashtag, $client_id, $access_token ) {
			$this->feed_id = $feed_id;
			$this->number = $number;
			$this->resolution = $resolution;
			$this->user_id = $user_id;
			$this->hashtag = $hashtag;
			$this->client_id = $client_id;
			$this->access_token = $access_token;
		}
		public function js() {
			if( $this->hashtag != '' ){ ?>
			<script>
				var bt_bb_instagram_init_finished = false;
	
				document.addEventListener('readystatechange', function() { 
					if ( ! bt_bb_instagram_init_finished && ( document.readyState === 'interactive' || document.readyState === 'complete' ) ) {
						var feed = new Instafeed({
							get: 'tagged',
							resolution: '<?php echo $this->resolution; ?>',
							tagName: '<?php echo $this->hashtag; ?>',
							target: '<?php echo $this->feed_id; ?>', 
							limit: '<?php echo $this->number; ?>',
							template: '<span><a href="{{link}}"><img src="{{image}}" /></a></span>',
							clientId: '<?php echo $this->client_id; ?>',
							accessToken: '<?php echo $this->access_token; ?>'
						});
						feed.run();						
						bt_bb_instagram_init_finished = true;		
					}
				}, false);

			</script>
		<?php } else { ?>
				<script>
				var bt_bb_instagram_init_finished = false;
				
				document.addEventListener('readystatechange', function() { 
					if ( ! bt_bb_instagram_init_finished && ( document.readyState === 'interactive' || document.readyState === 'complete' ) ) {
						var feed = new Instafeed({
							get: 'user',
							userId: <?php echo $this->user_id; ?>,
							resolution: '<?php echo $this->resolution; ?>',
							target: '<?php echo $this->feed_id; ?>', 
							limit: '<?php echo $this->number; ?>',
							template: '<span><a href="{{link}}"><img src="{{image}}" /></a></span>',
							clientId: '<?php echo $this->client_id; ?>',
							accessToken: '<?php echo $this->access_token; ?>'
						});
						feed.run();						
						bt_bb_instagram_init_finished = true;		
					}

				}, false);

			</script>
		<?php 
				}

		}	
	}
}