<?php
// Exit if accessed directly
if( !defined('ABSPATH') ) exit;

/**
 * VK Class
 *
 * Handles all vk functions 
 *
 * @package WooCommerce - Social Login
 * @since 1.3.0
 */
if( !class_exists('WOO_Slg_Social_VK') ) {
	
	class WOO_Slg_Social_VK {
		
		var $vk;
		var $vk_authurl;
		public function __construct() {
			
		}
		
		/**
		 * Include VK Class
		 * 
		 * Handles to load vk class
		 * 
		 * @package WooCommerce - Social Login
	 	 * @since 1.3.0
		 */
		public function woo_slg_load_vk() {
			
			global $woo_slg_options;
			
			//vk declaration
			if( !empty($woo_slg_options['woo_slg_enable_vk']) && 
				!empty($woo_slg_options['woo_slg_vk_app_secret']) && 
				!empty( $woo_slg_options['woo_slg_vk_app_id']) ) {
			
				// loads the class
				require_once ( WOO_SLG_SOCIAL_LIB_DIR . '/vk/classes/VkPhpSdk.php' ); 
				require_once ( WOO_SLG_SOCIAL_LIB_DIR . '/vk/classes/Oauth2Proxy.php' );

				// filter for VK application scope
				$vk_scope = apply_filters( 'woo_slg_vk_access_scope', 'email,photos,offline,friends,audio,video' ); 					
				
			    // VK Object
			    $this->vk = new Oauth2Proxy(
					WOO_SLG_VK_APP_ID, // app id
					WOO_SLG_VK_APP_SECRET, // app secret
					esc_url_raw( 'https://oauth.vk.com/access_token' ), // access token url
					esc_url( 'https://oauth.vk.com/authorize' ), // dialog uri
					'code', // response type
					esc_url( WOO_SLG_VK_REDIRECT_URL ), // redirect url
					$vk_scope
				);
				
				return true;
			} else {
				return false;
			}
		}
		
		/**
		 * Initializes VK API
		 * 
		 * @package WooCommerce - Social Login
		 * @since 1.3.0
		 */
		public function woo_slg_initialize_vk() {
			
			if( isset($_REQUEST['state']) ) {

				$vkPhpSdkstate = \WSL\PersistentStorage\WOOSLGPersistent::get('vkPhpSdkstate'); // CSRF protection
				
				//load vk class
				if( !empty($_REQUEST['state']) && !empty($vkPhpSdkstate) && $_REQUEST['state'] == $vkPhpSdkstate && isset($_GET['wooslg']) && $_GET['wooslg'] == 'vk' ) {

					$vk = $this->woo_slg_load_vk();
					
					//check vk class is loaded or not
					if( !$vk ) return false;
					
					// Authentication URL
					$vk_auth_url = $this->vk->_accessTokenUrl.'?client_id=' . $this->vk->_clientId
									. '&client_secret='.$this->vk->_clientSecret . '&code=' . $_REQUEST['code']
									. '&redirect_uri='.$this->vk->_redirectUri;
					
					$auth_json = $this->woo_slg_get_data_from_url( $vk_auth_url );
					$auth_json = $this->vk->object_to_array( $auth_json );
					
					if( !empty($auth_json) && !empty($auth_json['access_token']) ) {
						
						$vkPhpSdk = new VkPhpSdk();
						
						$vkPhpSdk->setAccessToken( $auth_json['access_token'] );
						$vkPhpSdk->setUserId( $auth_json['user_id'] );
					
						// API call - get profile
						$user_profile_data	= $vkPhpSdk->api( 'getProfiles', array(
							'uids' => $vkPhpSdk->getUserId(),
							'v' => '5.73',
							'fields' => 'uid, first_name, last_name, nickname, screen_name, photo_big, email',
						) );

						//Get User Profile Data
						$user_profile_data	= isset($user_profile_data['response'][0]) ? $user_profile_data['response'][0] : array();
						
						//UserData Session
						$user_data_session = \WSL\PersistentStorage\WOOSLGPersistent::get( 'woo_slg_vk_user_cache' );
						
						$user_data_session = !empty( $user_data_session ) ? $user_data_session : array();
						
						//Add email field to array if found email address field
						if( !empty($user_data_session['email']) ) {
							$user_profile_data['email']	= $auth_json['email'];
						}
						
						$auth_json	= array_merge( $auth_json, $user_profile_data );
						\WSL\PersistentStorage\WOOSLGPersistent::set( 'woo_slg_vk_user_cache', $auth_json );
					}
				}
			}
		}
		
		/**
		 * Get Data From URL
		 * 
		 * Handels to return data from url 
		 * via calling CURL
		 * 
		 * @package WooCommerce - Social Login
		 * @since 1.0.0
		 */
		public function woo_slg_get_data_from_url( $url, $data = array(), $post = false ) {
			
			$result	= wp_remote_retrieve_body( wp_remote_get($url) );
			
			$this->vk->_authJson = $result;
			
			// Decode the JSON request and remove the access token from it
			$data = json_decode( $result );
			
			return $data;
		}
		
		/**
		 * Get auth url for vk
		 * 
		 * @param WooCommerce - Social Login
		 * @since 1.3.0
		 */
		public function woo_slg_get_vk_auth_url () {
			
			//load vk class
			$vk = $this->woo_slg_load_vk();
			
			//check vk is loaded or not
			if( !$vk ) return false;
			
			if( $this->vk ) {
				$this->vk_authurl = $this->vk->authorize();
				return $this->vk_authurl;
			}
		}
		 
		/**
		 * Get VK user's Data
		 * 
		 * @param WooCommerce - Social Login
		 * @since 1.3.0
		 */
		public function woo_slg_get_vk_user_data() {
			
			$user_data = '';
			$user_data = \WSL\PersistentStorage\WOOSLGPersistent::get( 'woo_slg_vk_user_cache' );

			\WSL\PersistentStorage\WOOSLGPersistent::delete( 'woo_slg_vk_user_cache' );
			$user_data = !empty( $user_data )? $user_data : array();

			return $user_data;
		}
	}
}