<?php

if ( ! class_exists( 'BB_Weather_Widget' ) ) {

	// ICON

	class BB_Weather_Widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				'bt_bb_weather_widget', // Base ID
				__( 'BB Weather', 'bold-builder' ), // Name
				array( 'description' => __( 'Weather widget.', 'bold-builder' ) ) // Args
			);
		}

		public function widget( $args, $instance ) {
			
			wp_enqueue_style( 'bt_bb_weather', plugin_dir_url( __FILE__ ) . 'weather_icons.css' );
			
			$this->latitude = ! empty( $instance['latitude'] ) ? $instance['latitude'] : '';
			$this->longitude = ! empty( $instance['longitude'] ) ? $instance['longitude'] : '';
			$this->temp_unit = ! empty( $instance['temp_unit'] ) ? $instance['temp_unit'] : '';
			$this->type = ! empty( $instance['type'] ) ? $instance['type'] : '';
			$this->cache = ! empty( $instance['cache'] ) ? $instance['cache'] : '';

			$this->cache = intval( $this->cache );

			if ( $this->cache < 0 ) {
				$this->cache = 0;
			} else if ( $this->cache > 60 * 12 ) {
				$this->cache = 60 * 12;
			}

			$trans_name = 'bt_bb_weather_data_' . md5( $this->latitude . $this->longitude . $this->temp_unit . $this->type . $this->cache );

			$transient = get_transient( $trans_name );
			$weather_data = unserialize( base64_decode( $transient ) );

			if ( $transient == false || $weather_data['code'] == false ) {

				$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
				$yql_query = 'select * from weather.forecast where woeid in (SELECT woeid FROM geo.places(1) WHERE text="(' . $this->latitude . ', ' . $this->longitude . ')")';
				$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
				// Make call with cURL
				$session = curl_init($yql_query_url);
				curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
				$json = curl_exec($session);
				// Convert JSON to PHP object
				
				$result = json_decode($json,true);
				
				$result_temp_unit = $result['query']['results']['channel']['units']['temperature'];
				
				$code = $result['query']['results']['channel']['item']['condition']['code'];
				$temp = $result['query']['results']['channel']['item']['condition']['temp'];
				
				$code_today = $result['query']['results']['channel']['item']['forecast'][0]['code'];
				$temp_low_today = $result['query']['results']['channel']['item']['forecast'][0]['low'];
				$temp_high_today = $result['query']['results']['channel']['item']['forecast'][0]['high'];
				
				$code_tomorrow = $result['query']['results']['channel']['item']['forecast'][1]['code'];
				$temp_low_tomorrow = $result['query']['results']['channel']['item']['forecast'][1]['low'];
				$temp_high_tomorrow = $result['query']['results']['channel']['item']['forecast'][1]['high'];

				if ( $result_temp_unit == 'F' && strtolower( $this->temp_unit ) == 'c' ) {
					$temp = $this->f_to_c( $temp );
					$temp_low_today = $this->f_to_c( $temp_low_today );
					$temp_high_today = $this->f_to_c( $temp_high_today );
					$temp_low_tomorrow = $this->f_to_c( $temp_low_tomorrow );
					$temp_high_tomorrow = $this->f_to_c( $temp_high_tomorrow );
				}

				$weather_data = array(
					'code' => $code,
					'code_today' => $code_today,
					'code_tomorrow' => $code_tomorrow,
					'temp' => $temp,
					'temp_low_today' => $temp_low_today,
					'temp_high_today' => $temp_high_today,
					'temp_low_tomorrow' => $temp_low_tomorrow,
					'temp_high_tomorrow' => $temp_high_tomorrow,
				);
				
				if ( $weather_data['code'] != false ) {
					set_transient( $trans_name, base64_encode( serialize( $weather_data ) ), $this->cache );
				}

			}

			if ( $weather_data['code'] != false ) {
				if ( $this->type == 'now' ) {
					echo '<span class="btIconWidget btWidgetWithText">';
						echo '<span class="btIconWidgetIcon">';
							echo bt_bb_icon::get_html( 'wi_' . $this->get_icon_code( $weather_data['code'] ) );
						echo '</span>';
						echo '<span class="btIconWidgetContent">';
							echo '<span class="btIconWidgetTitle">' . __( 'Now', 'bold-builder' ) . '</span>';
							echo '<span class="btIconWidgetText">' . $weather_data['temp'] . '&deg;' . $this->temp_unit . '</span>';
						echo '</span>';
					echo '</span>';
				} else if ( $this->type == 'today' ) {
					echo '<span class="btIconWidget">';
						echo '<span class="btIconWidgetIcon">';
							echo bt_bb_icon::get_html( 'wi_' . $this->get_icon_code( $weather_data['code_today'] ) );
						echo '</span>';
						echo '<span class="btIconWidgetContent">';
							echo '<span class="btIconWidgetTitle">' . __( 'Today', 'bold-builder' ) . '</span>';
							echo '<span class="btIconWidgetText">' . $weather_data['temp_low_today'] . '/' . $weather_data['temp_high_today'] . '&deg;' . $this->temp_unit . '</span>';
						echo '</span>';
					echo '</span>';
				} else if ( $this->type == 'tomorrow' ) {
					echo '<span class="btIconWidget">';
						echo '<span class="btIconWidgetIcon">';
							echo bt_bb_icon::get_html( 'wi_' . $this->get_icon_code( $weather_data['code_today'] ) );
						echo '</span>';
						echo '<span class="btIconWidgetContent">';
							echo '<span class="btIconWidgetTitle">' . __( 'Tomorrow', 'bold-builder' ) . '</span>';
							echo '<span class="btIconWidgetText">' . $weather_data['temp_low_tomorrow'] . '/' . $weather_data['temp_high_tomorrow'] . '&deg;' . $this->temp_unit . '</span>';
						echo '</span>';
					echo '</span>';
				}
			}
		}
		
		public function f_to_c( $f ) {
			$c = intval((5/9)*($f-32));
			return $c;
		}

		public function get_icon_code( $code ) {
			$yahoo_map = array('yahoo-0' => 'ea02', 'yahoo-1' => 'e9cd', 'yahoo-2' => 'e9f3', 'yahoo-3' => 'e9d2', 'yahoo-4' => 'e9d2', 'yahoo-5' => 'e9cc', 'yahoo-6' => 'e9cc', 'yahoo-7' => 'e9cc', 'yahoo-8' => 'e9d6', 'yahoo-9' => 'e9cc', 'yahoo-10' => 'e9d6', 'yahoo-11' => 'e9cc', 'yahoo-12' => 'e9cc', 'yahoo-13' => 'e9cf' ,'yahoo-14' => 'e9d0', 'yahoo-15' => 'e9cf', 'yahoo-16' => 'e9cf', 'yahoo-17' => 'e9d6', 'yahoo-18' => 'e9cc', 'yahoo-19' => 'e9e0', 'yahoo-20' => 'e9e0', 'yahoo-21' => 'e9d5', 'yahoo-22' => 'e9c9', 'yahoo-23' => 'e9f3', 'yahoo-24' => 'e9f3', 'yahoo-25' => 'ea12', 'yahoo-26' => 'e9dc', 'yahoo-27' => 'e9cb', 'yahoo-28' => 'e9ca', 'yahoo-29' => 'e9cb', 'yahoo-30' => 'e9ca', 'yahoo-31' => 'e9e4', 'yahoo-32' => 'e9e5', 'yahoo-33' => 'e9cb', 'yahoo-34' => 'e9ca', 'yahoo-35' => 'e9cc', 'yahoo-36' => 'ea0f', 'yahoo-37' => 'e9cd', 'yahoo-38' => 'e9cd', 'yahoo-39' => 'e9cd', 'yahoo-40' => 'e9cc', 'yahoo-41' => 'e9cf', 'yahoo-42' => 'e9cf', 'yahoo-43' => 'e9cf', 'yahoo-44' => 'e9ca', 'yahoo-45' => 'e9cd', 'yahoo-46' => 'e9cf', 'yahoo-47' => 'e9cd', 'yahoo-3200' => 'e9ef');

			return $yahoo_map['yahoo-' . $code];
		}

		public function form( $instance ) {
			$latitude = ! empty( $instance['latitude'] ) ? $instance['latitude'] : '';
			$longitude = ! empty( $instance['longitude'] ) ? $instance['longitude'] : '';
			$temp_unit = ! empty( $instance['temp_unit'] ) ? $instance['temp_unit'] : '';
			$type = ! empty( $instance['type'] ) ? $instance['type'] : '';
			$cache = ! empty( $instance['cache'] ) ? $instance['cache'] : '30';
			
			?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'latitude' ) ); ?>"><?php _e( 'Latitude:', 'bold-builder' ); ?></label> 
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'latitude' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'latitude' ) ); ?>" type="text" value="<?php echo esc_attr( $latitude ); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'longitude' ) ); ?>"><?php _e( 'Longitude:', 'bold-builder' ); ?></label> 
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'longitude' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'longitude' ) ); ?>" type="text" value="<?php echo esc_attr( $longitude ); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'temp_unit' ) ); ?>"><?php _e( 'Temperature unit:', 'bold-builder' ); ?></label> 
					<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'temp_unit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'temp_unit' ) ); ?>">
						<?php
						$target_arr = array( __( 'Celsius', 'bold-builder' ) => 'C', __( 'Fahrenheit', 'bold-builder' ) => 'F' );
						foreach( $target_arr as $key => $value ) {
							if ( $value == $temp_unit ) {
								echo '<option value="' . $value . '" selected>' . $key . '</option>';
							} else {
								echo '<option value="' . $value . '">' . $key . '</option>';
							}
						}
						?>
					</select>
				</p>				
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>"><?php _e( 'Type:', 'bold-builder' ); ?></label> 
					<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'type' ) ); ?>">
						<?php
						$target_arr = array( __( 'Now', 'bold-builder' ) => 'now', __( 'Today', 'bold-builder' ) => 'today', __( 'Tomorrow', 'bold-builder' ) => 'tomorrow' );
						foreach( $target_arr as $key => $value ) {
							if ( $value == $type ) {
								echo '<option value="' . $value . '" selected>' . $key . '</option>';
							} else {
								echo '<option value="' . $value . '">' . $key . '</option>';
							}
						}
						?>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'cache' ) ); ?>"><?php _e( 'Cache (minutes):', 'bold-builder' ); ?></label> 
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cache' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cache' ) ); ?>" type="text" value="<?php echo esc_attr( $cache ); ?>">			
				</p>
			<?php 
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['latitude'] = ( ! empty( $new_instance['latitude'] ) ) ? strip_tags( $new_instance['latitude'] ) : '';
			$instance['longitude'] = ( ! empty( $new_instance['longitude'] ) ) ? strip_tags( $new_instance['longitude'] ) : '';
			$instance['temp_unit'] = ( ! empty( $new_instance['temp_unit'] ) ) ? strip_tags( $new_instance['temp_unit'] ) : '';
			$instance['type'] = ( ! empty( $new_instance['type'] ) ) ? strip_tags( $new_instance['type'] ) : '';
			$instance['cache'] = ( ! empty( $new_instance['cache'] ) ) ? strip_tags( $new_instance['cache'] ) : '';

			return $instance;
		}
	}
}