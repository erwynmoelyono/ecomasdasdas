<?php
class Themehunk_Library_Ajax{

	function __construct() {
			add_action( 'wp_ajax_themehunk_library_json', array($this,'themehunk_templates_json') );
			add_action( 'wp_ajax_themehunk-plugins-active', array($this,'plugins_active') );
			add_action( 'wp_ajax_themehunk-plugins-check', array($this,'required_plugin') );
			add_action( 'wp_ajax_themehunk-import-demo-data', array($this,'import_demo_data') );
			add_action( 'wp_ajax_themehunk-library-import-customizer', array( $this, 'import_customizer_settings' ) );
			add_action( 'wp_ajax_themehunk-import-xml', array( $this, 'import_xml_data' ) );
			add_action( 'wp_ajax_themehunk-library-import-options', array( $this, 'import_option_data' ) );
			add_action( 'wp_ajax_themehunk-library-import-widgets', array( $this, 'import_widgets' ) );
			add_action( 'wp_ajax_themehunk-library-import-close', array( $this, 'import_end' ) );

		}

		function get_current_theme(){
				$theme = wp_get_theme();
 				return $theme->get( 'TextDomain' ); 
 					//$theme->get( 'ThemeURI' );
		}



	function themehunk_templates_get( $title='themehunk',$cate = 'all',$builder = '' ) {
			// Collect the args
		$theme = $this->get_current_theme();
			$params = array(
				'i'  => 'themehunk',
				'th' => $theme,
				't'  => sanitize_text_field( $title ),
				'c'  =>  $cate,
				'b'  =>  $builder==''?$theme:$builder,
			);

			// Generate the URL
			$url = 'https://themehunk.com/wp-json/wp/v2/themehunk-site/';
			 $url = add_query_arg( $params, esc_url_raw( $url ) );

			// Make API request
			$response = wp_remote_get( esc_url_raw( $url ),array( 'timeout' => 120) );

			// Check the response code
			$response_code       = wp_remote_retrieve_response_code( $response );
			$response_message    = wp_remote_retrieve_response_message( $response );
			if ( 200 != $response_code && ! empty( $response_message ) ) {
				return new WP_Error( $response_code, $response_message );
			} elseif ( 200 != $response_code ) {
				return new WP_Error( $response_code, 'Unknown error occurred' );
			} else {
				return wp_remote_retrieve_body( $response );
		        }
		}


	 function themehunk_templates_json(){

			$response = $this->themehunk_templates_get('themehunk',$_POST['cate'],$_POST['builder']);

			if ( is_wp_error( $response ) ) {
				echo 'The following error occurred when contacting server: ' . wp_strip_all_tags( $response->get_error_message() );
			} else {

				print_r($response);
			}
			wp_die();
	}

	public function plugins_active(){
		if ( ! current_user_can( 'install_plugins' ) || ! isset( $_POST['init'] ) || ! $_POST['init'] ) {
						wp_send_json_error(
							array(
								'success' => false,
								'message' => __( 'No plugin specified', 'themehunk-site-library' ),
							)
						);
					}

					$data               = array();
					$plugin_init        = ( isset( $_POST['init'] ) ) ? esc_attr( $_POST['init'] ) : '';
					
					 $activate = activate_plugin( $plugin_init, '', false, true );

					if ( is_wp_error( $activate ) ) {
						wp_send_json_error(
							array(
								'success' => false,
								'message' => $activate->get_error_message(),
							)
						);
					}

					//do_action( '_after_plugin_activation', $plugin_init, $data );

					wp_send_json_success(
						array(
							'success' => true,
							'message' => __( 'Plugin Successfully Activated', 'themehunk-site-library' ),
						)
					);
	}

		/**
		 * Required Plugin
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function required_plugin() {

			// Verify Nonce.
			check_ajax_referer( 'themehunk-site-nonce', '_ajax_nonce' );

			$response = array(
				'active'       => array(),
				'inactive'     => array(),
				'notinstalled' => array(),
			);

			if ( ! current_user_can( 'customize' ) ) {
				wp_send_json_error( $response );
			}

			$required_plugins = ( isset( $_POST['required_plugins'] ) ) ? $_POST['required_plugins']: array();
			if ( count( $required_plugins ) > 0 ) {
				foreach ( $required_plugins as $key => $plugin ) {

					 	// Lite - Installed but Inactive.
					 	if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin['init'] ) && is_plugin_inactive( $plugin['init'] ) ) {

					 		$response['inactive'][] = $plugin;

					 		// Lite - Not Installed.
					 	} elseif ( ! file_exists( WP_PLUGIN_DIR . '/' . $plugin['init'] ) ) {

							$response['notinstalled'][] = $plugin;

					 		// Lite - Active.
					 	} else {
					 		$response['active'][] = $plugin;
						}
				}
			}

			// Send response.
			wp_send_json_success( $response );
		}


	public static function import_data_filter($demo_api_uri){

				// default values.
			$remote_args = array();
			$defaults    = array(
				'id'                   		=> '',
				'themehunk-widgets-data'    => '',
				'themehunk-customizer-data' => '',
				'themehunk-xml-path'        => '',
				'required-plugins'     		=> '',
				'themehunk-option-data'     => '',
			);

			$api_args = apply_filters(
				'themhunk_sites_api_args', array(
					'timeout' => 15,
				)
			);

			// Use this for premium demos.
			$request_params = apply_filters(
				'themehunk_sites_api_params', array(
					'site_key' => '',
					'site_url'     => '',
				)
			);

			$demo_api_uri = add_query_arg( $request_params, $demo_api_uri );

			// API Call.
			$response = wp_remote_get( $demo_api_uri, $api_args );


			if ( is_wp_error( $response ) || ( isset( $response->customizer ) && 0 == $response->customizer ) ) {
				if ( isset( $response->customizer ) ) {
					$data = json_decode( $response, true );
				} else {
					return new WP_Error( 'api_invalid_response_code', $response->get_error_message() );
				}
			} else {
				$data = json_decode( wp_remote_retrieve_body( $response ), true );
			}

			$data = json_decode( wp_remote_retrieve_body( $response ), true );

			if ( ! isset( $data['data'] ) ) {
			 	$remote_args['id']                         = $data['id'];
			 	$remote_args['themehunk-widgets-data']    = json_decode( $data['themehunk-widget'] );
			 	$remote_args['themehunk-customizer-data'] = $data['themehunk-customizer'];
			 	$remote_args['themehunk-xml-path']        = $data['themehunk-xml'];
			 	$remote_args['themehunk-option-data']        = $data['themehunk-option'];
			// 	$remote_args['required-plugins']           = $data['required-plugins'];
			 }

			// Merge remote demo and defaults.
			return wp_parse_args( $remote_args, $defaults );
		}


		/**
		 * Start Site Import
		 */
		function import_demo_data() {

			if ( ! current_user_can( 'customize' ) ) {
				wp_send_json_error( __( 'You have not "customize" access to import the Themehunk site library.', 'themehunk-site-library' ) );
			}

			$demo_api_uri = isset( $_POST['api_url'] ) ? esc_url( $_POST['api_url'] ) : '';


			 if ( ! empty( $demo_api_uri ) ) {

			 	$demo_data = self::import_data_filter( $demo_api_uri );
		
				if ( is_wp_error( $demo_data ) ) {
					wp_send_json_error( $demo_data->get_error_message() );
				}

				$log_file = Themehunk_Importer_Log::add_log_file_url();
					if ( isset( $log_file['url'] ) && ! empty( $log_file['url'] ) ) {
						$demo_data['log_file'] = $log_file['url'];
					}
					do_action( 'themehunk_import_start', $demo_data, $demo_api_uri );
					

				wp_send_json_success( $demo_data );

			} else {
				wp_send_json_error( __( 'Request site API URL is empty. Try again!', 'themehunk-site-library' ) );
			 }

		} 

/**
 * Import xml Settings.
 *
 */

		function import_xml_data($wxr_url) {
			$xml_url = ( isset( $_REQUEST['xml_url'] ) ) ? urldecode( $_REQUEST['xml_url'] ) : '';

			if ( isset( $xml_url ) ) {
				Themehunk_Importer_Log::add( 'Importing from XML ' . $xml_url );

				// Download XML file.
				$xml_path = Themehunk_Library_Helper::download_file( $xml_url );

				if ( $xml_path['success'] ) {

					if ( isset( $xml_path['data']['file'] ) ) {
						$data        = Themehunk_Library_WXR_Importer::instance()->get_xml_data( $xml_path['data']['file'] );
						$data['xml'] = $xml_path['data'];
						wp_send_json_success( $data );
					} else {
						wp_send_json_error( __( 'There was an error downloading the XML file.', 'themehunk-site-library' ) );
					}
				} else {
					wp_send_json_error( $xml_path['data'] );
				}
			} else {
				wp_send_json_error( __( 'Invalid site XML file!', 'themehunk-site-library' ) );
			}
		}

		/**
		 * Import Customizer Settings.
		 *
		 */
		function import_customizer_settings() {

			$customizer_data = ( isset( $_POST['customizer_data'] ) ) ? (array) json_decode( stripcslashes( $_POST['customizer_data'] ), 1 ) : '';

			if ( isset( $customizer_data ) ) {
				Themehunk_Importer_Log::add( 'Imported Customizer Settings ' . json_encode( $customizer_data ) );


				Themehunk_Library_Helper::import( $customizer_data );
				wp_send_json_success( $customizer_data );

			} else {
				wp_send_json_error( __( 'Customizer data is empty!', 'themehunk-site-library' ) );
			}

		}

		function import_option_data(){
			 $options_data = ( isset( $_POST['options_data'] ) ) ? (array) json_decode( stripcslashes( $_POST['options_data'] ), 1 ) : '';
			 if ( isset( $options_data ) ) {
			 	Themehunk_Importer_Log::add( 'Imported - Site Options ' . json_encode( $options_data ) );
				$options_importer = Themehunk_Library_Options_Import::instance();
				$options_importer->import_options_data( $options_data );
				wp_send_json_success( $options_data );
			 } else {
			 	wp_send_json_error( __( 'Site options are empty!', 'themehunk-site-library' ) );
			 }


		}

		/**
		 * Import Widgets.
		 *
		 * @since 1.0.14
		 * @return void
		 */
		function import_widgets() {

			$widgets_data = ( isset( $_POST['widgets_data'] ) ) ? (object) json_decode( stripcslashes( $_POST['widgets_data'] ) ) : '';

			Themehunk_Importer_Log::add( 'Imported - Widgets ' . json_encode( $widgets_data ) );

			if ( isset( $widgets_data ) ) {
				$widgets_importer = Themehunk_Library_Widget_Importer::instance();
				$status           = $widgets_importer->import_widgets_data( $widgets_data );

				wp_send_json_success( $widgets_data );
			} else {
				wp_send_json_error( __( 'Widget data is empty!', 'themehunk-site-library' ) );
			}

		}

		/**
		 * Import End.
		 *
		 */
		function import_end() {
						Themehunk_Importer_Log::add( 'Complete ' );

			do_action( 'themehunk_site_library_import_complete' );
		}


}
	$obj = new Themehunk_Library_Ajax;
