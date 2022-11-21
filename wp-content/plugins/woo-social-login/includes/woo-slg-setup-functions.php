<?php
// Exit if accessed directly
if( !defined('ABSPATH') ) exit;

/**
 * Plugin Setup Functions
 *
 * @package WooCommerce - Social Login
 * @since 2.3.0
 */

/**
 * Manage plugin default settings on
 * plugin install
 *
 * @package WooCommerce - Social Login
 * @since 2.3.0
 */
function woo_slg_manage_plugin_install_settings() {

	//Get plugin version option
	$woo_slg_set_option = get_option( 'woo_slg_set_option' );

	//get social order options
	$woo_social_order = get_option( 'woo_social_order' );

	if( empty($woo_slg_set_option) ) { //check plugin version option

		// Plugin settings function file
		if( ! function_exists('woo_slg_default_settings') ) {
			require_once( WOO_SLG_DIR . '/includes/woo-slg-setting-functions.php' );
		}

		//get option for when plugin is activating first time
		woo_slg_default_settings();

		$woo_social_order = array( 'facebook', 'twitter', 'googleplus', 'linkedin', 'yahoo', 'foursquare', 'windowslive', 'vk','apple' );

		update_option( 'woo_social_order', $woo_social_order );

		//update plugin version to option
		update_option( 'woo_slg_set_option', '1.0' );
	}

	//get social order options
	$woo_slg_set_option = get_option( 'woo_slg_set_option' );
	if( $woo_slg_set_option == '1.0' ) {

		//Update default behaviour for new user's username
		update_option( 'woo_slg_base_reg_username', '' );

		//update plugin version to option
		update_option( 'woo_slg_set_option', '1.1' );
	}

	//get social order options
	$woo_slg_set_option = get_option( 'woo_slg_set_option' );

	if( $woo_slg_set_option == '1.1' ) {
		//update plugin version to option
		update_option( 'woo_slg_set_option', '1.2' );
	}

	//get social order options
	$woo_slg_set_option = get_option( 'woo_slg_set_option' );

	if( $woo_slg_set_option == '1.2' ) {

		//Custom icon link options
		$link_options = array(
			'woo_slg_fb_link_icon_url' => esc_url( WOO_SLG_IMG_URL ) . '/facebook-link.png',
			'woo_slg_gp_link_icon_url' => esc_url( WOO_SLG_IMG_URL ) . '/googleplus-link.png',
			'woo_slg_li_link_icon_url' => esc_url( WOO_SLG_IMG_URL ) . '/linkedin-link.png',
			'woo_slg_tw_link_icon_url' => esc_url( WOO_SLG_IMG_URL ) . '/twitter-link.png',
			'woo_slg_yh_link_icon_url' => esc_url( WOO_SLG_IMG_URL ) . '/yahoo-link.png',
			'woo_slg_fs_link_icon_url' => esc_url( WOO_SLG_IMG_URL ) . '/foursquare-link.png',
			'woo_slg_wl_link_icon_url' => esc_url( WOO_SLG_IMG_URL ) . '/windowslive-link.png',
			'woo_slg_vk_link_icon_url' => esc_url( WOO_SLG_IMG_URL ) . '/vk-link.png',
			'woo_slg_display_link_thank_you' => 'yes',
		);

		foreach( $link_options as $key => $value ) {
			update_option( $key, $value );
		}

		//update plugin version to option
		update_option( 'woo_slg_set_option', '1.3' );
	}

	//get social order options
	$woo_slg_set_option = get_option( 'woo_slg_set_option' );
	if( $woo_slg_set_option == '1.3' ) {

		// Amazon and paypal api added in api array
		$authorize_array = array('amazon', 'paypal');
		$woo_social_order = array_merge($woo_social_order, $authorize_array);
		update_option('woo_social_order', $woo_social_order);

		// Amazon and paypal options
		$authorize_options = array(
			'woo_slg_enable_amazon' => '',
			'woo_slg_amazon_client_id' => '',
			'woo_slg_amazon_client_secret' => '',
			'woo_slg_amazon_icon_url' => esc_url(WOO_SLG_IMG_URL) . '/amazon.png',
			'woo_slg_amazon_link_icon_url' => esc_url(WOO_SLG_IMG_URL) . '/amazon-link.png',
			'woo_slg_enable_paypal' => '',
			'woo_slg_paypal_client_id' => '',
			'woo_slg_paypal_client_secret' => '',
			'woo_slg_paypal_icon_url' => esc_url(WOO_SLG_IMG_URL) . '/paypal.png',
			'woo_slg_paypal_link_icon_url' => esc_url(WOO_SLG_IMG_URL) . '/paypal-link.png',
			'woo_slg_paypal_environment' => 'sandbox',
		);

		foreach( $authorize_options as $key => $value ) {
			update_option( $key, $value );
		}

		//update plugin version to option
		update_option( 'woo_slg_set_option', '1.4' );
	}

	//get social order options
	$woo_slg_set_option = get_option( 'woo_slg_set_option' );
	if( $woo_slg_set_option == '1.4' ) {

		// Social Buttons options
		$Social_buttons_options = array(
			'woo_slg_fb_icon_text' => esc_html__('Sign in with Facebook', 'wooslg'),
			'woo_slg_fb_link_icon_text' => esc_html__('Link your account to Facebook', 'wooslg'),
			'woo_slg_gp_icon_text' => esc_html__('Sign in with Google', 'wooslg'),
			'woo_slg_gp_link_icon_text' => esc_html__('Link your account to Google', 'wooslg'),
			'woo_slg_li_icon_text' => esc_html__('Sign in with LinkedIn', 'wooslg'),
			'woo_slg_li_link_icon_text' => esc_html__('Link your account to LinkedIn', 'wooslg'),
			'woo_slg_tw_icon_text' => esc_html__('Sign in with Twitter', 'wooslg'),
			'woo_slg_tw_link_icon_text' => esc_html__('Link your account to Twitter', 'wooslg'),
			'woo_slg_yh_icon_text' => esc_html__('Sign in with Yahoo', 'wooslg'),
			'woo_slg_yh_link_icon_text' => esc_html__('Link your account to Yahoo', 'wooslg'),
			'woo_slg_fs_icon_text' => esc_html__('Sign in with Foursquare', 'wooslg'),
			'woo_slg_fs_link_icon_text' => esc_html__('Link your account to Foursquare', 'wooslg'),
			'woo_slg_wl_icon_text' => esc_html__('Sign in with Windows Live', 'wooslg'),
			'woo_slg_wl_link_icon_text' => esc_html__('Link your account to Windows Live', 'wooslg'),
			'woo_slg_vk_icon_text' => esc_html__('Sign in with VK.com', 'wooslg'),
			'woo_slg_vk_link_icon_text' => esc_html__('Link your account to VK.com', 'wooslg'),
			'woo_slg_amazon_icon_text' => esc_html__('Sign in with Amazon', 'wooslg'),
			'woo_slg_amazon_link_icon_text' => esc_html__('Link your account to Amazon', 'wooslg'),
			'woo_slg_paypal_icon_text' => esc_html__('Sign in with Paypal', 'wooslg'),
			'woo_slg_paypal_link_icon_text' => esc_html__('Link your account to Paypal', 'wooslg'),
		);

		foreach( $Social_buttons_options as $key => $value ) {
			update_option($key, $value);
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '1.5');
	}

	//get social order options
	$woo_slg_set_option = get_option('woo_slg_set_option');
	if( $woo_slg_set_option == '1.5' ) {

		$woo_slg_enable_login_page = get_option('woo_slg_enable_login_page');

		if( !empty($woo_slg_enable_login_page) && $woo_slg_enable_login_page == 'yes' ) {
			update_option('woo_slg_enable_wp_login_page', 'yes');
			update_option('woo_slg_enable_wp_register_page', 'yes');
		}
		//update plugin version to option
		update_option('woo_slg_set_option', '1.6');
	}

	//get social order options
	$woo_slg_set_option = get_option('woo_slg_set_option');
	if( $woo_slg_set_option == '1.6' ) {

		// added peepso plugin support since 1.6.3
		$woo_slg_peepso_login_page = get_option('woo_slg_enable_peepso_login_page');
		$woo_slg_peepso_registration_page = get_option('woo_slg_enable_peepso_register_page');

		if (empty($woo_slg_peepso_login_page)) {
			update_option('woo_slg_enable_peepso_login_page', '');
		}
		if (empty($woo_slg_peepso_registration_page)) {
			update_option('woo_slg_enable_peepso_register_page', '');
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '1.7');
	}

	//get social order options
	$woo_slg_set_option = get_option('woo_slg_set_option');

	if ($woo_slg_set_option == '1.7') {

		// added peepso plugin support since 1.6.3
		$woo_slg_peepso_login_avatar = get_option('woo_slg_allow_peepso_avatar');

		if (empty($woo_slg_peepso_login_avatar)) {
			update_option('woo_slg_allow_peepso_avatar', '');
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '1.8');
	}

	//get social order options
	$woo_slg_set_option = get_option('woo_slg_set_option');

	if ($woo_slg_set_option == '1.8') {

		// added peepso plugin support since 1.6.3
		$woo_slg_peepso_login_cover = get_option('woo_slg_allow_peepso_cover');

		if (empty($woo_slg_peepso_login_cover)) {
			update_option('woo_slg_allow_peepso_cover', '');
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '1.9');
	}

	//get social options version
	$woo_slg_set_option = get_option('woo_slg_set_option');
	
	if ($woo_slg_set_option == '1.9') {

		$woo_slg_display_link_acc_detail = get_option('woo_slg_display_link_acc_detail', 'yes');

		if (!empty($woo_slg_display_link_acc_detail)) {

			update_option('woo_slg_display_link_acc_detail', 'yes');
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '1.9.1');
	}

	//get social order options
	$woo_slg_set_option = get_option('woo_slg_set_option');

	if ($woo_slg_set_option == '1.9.1') {

		$woo_slg_peepso_avatar_each_time = get_option('woo_slg_peepso_avatar_each_time');
		$woo_slg_peepso_cover_each_time = get_option('woo_slg_peepso_cover_each_time');

		if (!empty($woo_slg_peepso_avatar_each_time)) {

			update_option('woo_slg_peepso_avatar_each_time', '');
		}

		if (!empty($woo_slg_peepso_cover_each_time)) {

			update_option('woo_slg_peepso_cover_each_time', '');
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '2.0');
	}

	//get social order options
	$woo_slg_set_option = get_option('woo_slg_set_option');
	if ( $woo_slg_set_option == '2.0' ) {

		$woo_slg_enable_email = get_option('woo_slg_enable_email');
		$woo_slg_login_email_heading = get_option('woo_slg_login_email_heading');
		$woo_slg_login_email_placeholder = get_option('woo_slg_login_email_placeholder');
		$woo_slg_login_btn_text = get_option('woo_slg_login_btn_text');
		$woo_slg_login_email_seprater_text = get_option('woo_slg_login_email_seprater_text');
		$woo_slg_login_email_position = get_option('woo_slg_login_email_position');

		if (empty($woo_slg_enable_email)) {

			update_option('woo_slg_enable_email', 'no');
		}
		if (empty($woo_slg_login_email_heading)) {
			update_option('woo_slg_login_email_heading', esc_html__('Sign in with e-mail', 'wooslg'));
		}
		if (empty($woo_slg_login_email_placeholder)) {
			update_option('woo_slg_login_email_placeholder', esc_html__('Enter your email address', 'wooslg'));
		}

		if (empty($woo_slg_login_btn_text)) {
			update_option('woo_slg_login_btn_text', esc_html__('Sign in', 'wooslg'));
		}

		if (empty($woo_slg_login_email_seprater_text)) {
			update_option('woo_slg_login_email_seprater_text', esc_html__('OR', 'wooslg'));
		}

		if (empty($woo_slg_login_email_position)) {
			update_option('woo_slg_login_email_position', 'top');
		}

		// Add order of email login
		if( !empty( $woo_social_order ) && !in_array( 'email', $woo_social_order ) ){
			$authorize_array = array('email');
			$woo_social_order = array_merge($woo_social_order, $authorize_array);
			update_option('woo_social_order', $woo_social_order);
		}


		//update plugin version to option
		update_option('woo_slg_set_option', '2.1');
	}

	$woo_slg_set_option = get_option('woo_slg_set_option');
	if ( $woo_slg_set_option == '2.1' ) {

		if (class_exists('Woocommerce')) {

			// Get woocommerce options
			$woo_privacy_policy_page = get_option('wp_page_for_privacy_policy');
			$woo_privacy_policy_text = get_option('woocommerce_registration_privacy_policy_text');
			
			$gdpr_setting = get_option('woo_slg_enable_gdpr');
			$gdpr_privacy_page = get_option('woo_slg_gdpr_privacy_page');
			$gdpr_privacy_text = get_option('woo_slg_gdpr_privacy_policy');

			// Update GDPR options
			if( empty( $gdpr_setting ) ){
				update_option('woo_slg_enable_gdpr', 'yes');
			}

			if( empty( $gdpr_privacy_page ) ) {
				update_option('woo_slg_gdpr_privacy_page', $woo_privacy_policy_page);
			}
			
			if( empty( $gdpr_privacy_text ) ) {            
				update_option('woo_slg_gdpr_privacy_policy', $woo_privacy_policy_text);
			}
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '2.2');
	}

	$woo_slg_set_option = get_option('woo_slg_set_option');

	if ( $woo_slg_set_option == '2.2' ) {


		// Set default email verification option
		$woo_slg_enable_email_varification = get_option('woo_slg_enable_email_varification');

		$email_varification_subject = get_option('woo_slg_mail_subject');
		$email_varification_content = get_option('woo_slg_mail_content');


		// Update email confirmation option
		if( empty( $woo_slg_enable_email_varification ) ){
			update_option('woo_slg_enable_email_varification', '');    
		}

		// Update email confirmation subject
		if( empty( $email_varification_subject ) ){
			update_option('woo_slg_mail_subject', esc_html__('Verification of your account', 'wooslg') );    
		}

		// Update email confirmation content
		if( empty( $email_varification_content ) ){

			$email_content = esc_html__('Please click {verify_link} to verify your email address and complete the registration process.', 'wooslg');
			update_option('woo_slg_mail_content', $email_content );    
		}


		// code to set new option for default role
		$role = get_option( 'default_role' ); // get wordpress default role
		
		$social_role = get_option( 'woo_slg_default_role' );
		
		if( empty( $social_role ) ) {

			// Update default role of user
			update_option( 'woo_slg_default_role', $role);
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '2.3');
	}

	$woo_slg_set_option = get_option('woo_slg_set_option');

	if ( $woo_slg_set_option == '2.3' ) {


		// Get woocommerce options
		$woo_slg_public_js_unique_version = get_option('woo_slg_public_js_unique_version');

		if( empty( $woo_slg_public_js_unique_version ) ){

			// Update option to use timestamp for public js instead of version
			update_option('woo_slg_public_js_unique_version', '');
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '2.4');
	}

	$woo_slg_set_option = get_option('woo_slg_set_option');

	if ( $woo_slg_set_option == '2.4' ) {


		//get social order options
		$woo_social_order = get_option('woo_social_order');

		$woo_social_order = array_unique($woo_social_order);
		$woo_social_order = array_values($woo_social_order);

		if( !empty( $woo_social_order) && !in_array('line', $woo_social_order) ) {
			$woo_social_order[] = 'line';
			update_option('woo_social_order', $woo_social_order);
		}

		//Line options
		$line_options = array(
			'woo_slg_enable_line' => '',
			'woo_slg_line_client_id' => '',
			'woo_slg_line_client_secret' => '',
			'woo_slg_line_icon_url' => esc_url(WOO_SLG_IMG_URL) . '/line.png',
			'woo_slg_line_link_icon_url' => esc_url(WOO_SLG_IMG_URL) . '/line-link.png',
			'woo_slg_enable_line_avatar' => '',
			'woo_slg_line_icon_text' => esc_html__('Sign in with Line', 'wooslg'),
			'woo_slg_line_link_icon_text' => esc_html__('Link your account to Line', 'wooslg'),
		);

		foreach ($line_options as $key => $value) {
			update_option($key, $value);
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '2.5');
	}

	// Link your account on peepso
	$woo_slg_set_option = get_option('woo_slg_set_option');

	if ( $woo_slg_set_option == '2.5' ) {
		$woo_slg_display_link_peepso_acc_detail = get_option('woo_slg_display_link_peepso_acc_detail');

		if (empty($woo_slg_display_link_peepso_acc_detail)) {

			update_option('woo_slg_display_link_peepso_acc_detail', '');
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '2.6');
	}

	$woo_slg_set_option = get_option('woo_slg_set_option');
	if ( $woo_slg_set_option == '2.6' ) {

		// Update email OTP confirmation option with verification type
		$woo_slg_enable_email_otp_varification = get_option('woo_slg_enable_email_otp_varification');

		$woo_slg_mail_otp_subject = get_option('woo_slg_mail_otp_subject');
		$woo_slg_mail_otp_content = get_option('woo_slg_mail_otp_content');


		// Update OTP email confirmation option
		if( empty( $woo_slg_enable_email_otp_varification ) ){
			update_option('woo_slg_enable_email_otp_varification', '');    
		}

		// Update OTP email confirmation subject
		if( empty( $woo_slg_mail_otp_subject ) ){
			update_option('woo_slg_mail_otp_subject', esc_html__('{otp} is your OTP to login to your {site_title} Account', 'wooslg') );    
		}

		// Update OTP email confirmation content
		if( empty( $woo_slg_mail_otp_content ) ){

			$email_otp_content = sprintf( __('Please use OTP %s{otp}%s to verify your account on {site_title} for Sign in.', 'wooslg'),'<strong>','</strong>');
			update_option('woo_slg_mail_otp_content', $email_otp_content );    
		}

		update_option('woo_slg_set_option', '2.7');
	}


	$woo_slg_set_option = get_option('woo_slg_set_option');
	if ( $woo_slg_set_option == '2.7' ) {

		$apple_array = array('apple');
		$woo_social_order = array_merge($woo_social_order, $apple_array);
		update_option('woo_social_order', $woo_social_order);

		$woo_slg_enable_apple = get_option('woo_slg_enable_apple');
		$woo_slg_apple_client_id = get_option('woo_slg_apple_client_id');

		// check apple is enable or not
		if( empty( $woo_slg_enable_apple ) ){
			update_option('woo_slg_enable_apple', '');    
		}

		// check apple client id is available or not
		if( empty( $woo_slg_apple_client_id ) ){
			update_option('woo_slg_apple_client_id', '');    
		}

		$Social_buttons_options = array(
			'woo_slg_apple_icon_text' => esc_html__('Sign in with Apple', 'wooslg'),
			'woo_slg_apple_link_icon_text' => esc_html__('Link your account to Apple', 'wooslg'),
			
		);

		foreach( $Social_buttons_options as $key => $value ) {
			update_option($key, $value);
		}

		$link_options = array(
			'woo_slg_apple_icon_url' => esc_url(WOO_SLG_IMG_URL) . '/apple.png',
			'woo_slg_apple_link_icon_url' => esc_url(WOO_SLG_IMG_URL) . '/apple-link.png',
		);

		foreach ($link_options as $key => $value) {
			update_option($key, $value);
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '2.8');
	}

	$woo_slg_set_option = get_option('woo_slg_set_option');
	if( $woo_slg_set_option == '2.8' ) {

		$woo_social_order = get_option('woo_social_order');

		// Remove instagram
		$search = array_search( 'instagram', $woo_social_order );

		if( $search !== false ) {
			unset( $woo_social_order[$search] );
			$woo_social_order = array_values($woo_social_order);

			update_option('woo_social_order', $woo_social_order);
		}

		//update plugin version to option
		update_option('woo_slg_set_option', '2.9');
	}

	$woo_slg_set_option = get_option('woo_slg_set_option');
	if( $woo_slg_set_option == '2.9' ) {
		// future code
	}

}

/**
 * Remove plugin settings on uninstall
 *
 * @package WooCommerce - Social Login
 * @since 2.3.0
 */
function woo_slg_manage_plugin_uninstall_settings() {

	// Plugin settings function file
	if( ! function_exists('woo_slg_default_settings') ) {
		require_once( WOO_SLG_DIR . '/includes/woo-slg-setting-functions.php' );
	}

	$options = woo_slg_get_settings();

	//delete all options
	foreach( $options as $key ) {
		delete_option( $key );
	}
}