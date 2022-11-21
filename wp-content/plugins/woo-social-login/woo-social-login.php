<?php
/**
 * Plugin Name: WooCommerce - Social Login
 * Plugin URI: https://wpwebelite.com/
 * Description: Allow your customers to login and checkout with social networks such as  Facebook, Twitter, Google, Yahoo, LinkedIn, Foursquare, Windows Live, VK.com, Amazon and PayPal.
 * Version: 2.3.10
 * Author: WPWeb
 * Author URI: https://wpwebelite.com/
 * Text Domain: wooslg
 * Domain Path: languages
 * 
 * WC tested up to: 5.5.2
 * Tested up to: 5.7.2
 * 
 * @package WooCommerce - Social Login
 * @category Core
 * @author WPWeb
 */
// Exit if accessed directly
if( !defined('ABSPATH') ) exit;

/**
 * Basic plugin definitions
 * 
 * @package WooCommerce - Social Login
 * @since 1.0.0
 */
global $wpdb;

if( !defined('WOO_SLG_VERSION') ) {
	define( 'WOO_SLG_VERSION', '2.3.10' ); //version of plugin
}
if( !defined('WOO_SLG_URL') ) {
	define( 'WOO_SLG_URL', plugin_dir_url(__FILE__) ); // plugin url
}
if( !defined('WOO_SLG_DIR') ) {
	define( 'WOO_SLG_DIR', dirname(__FILE__) ); // plugin dir
}
if( !defined('WOO_SLG_SOCIAL_DIR') ) {
	define( 'WOO_SLG_SOCIAL_DIR', WOO_SLG_DIR . '/includes/social' ); // social dir
}
if( !defined('WOO_SLG_SOCIAL_LIB_DIR') ) {
	define( 'WOO_SLG_SOCIAL_LIB_DIR', WOO_SLG_DIR . '/includes/social/libraries' ); // lib dir
}
if( !defined('WOO_SLG_IMG_URL') ) {
	define( 'WOO_SLG_IMG_URL', WOO_SLG_URL . 'includes/images' ); // image url
}
if( !defined('WOO_SLG_ADMIN') ) {
	define( 'WOO_SLG_ADMIN', WOO_SLG_DIR . '/includes/admin' ); // plugin admin dir
}
if( !defined('WOO_SLG_USER_PREFIX') ) {
	define( 'WOO_SLG_USER_PREFIX', 'woo_user_' ); // username prefix
}
if( !defined('WOO_SLG_USER_META_PREFIX') ) {
	define( 'WOO_SLG_USER_META_PREFIX', 'wooslg_' ); // username prefix
}
if( !defined('WOO_SLG_BASENAME') ) {
	define( 'WOO_SLG_BASENAME', basename(WOO_SLG_DIR) );
}
if( !defined('WOO_SLG_PLUGIN_KEY') ) {
	define( 'WOO_SLG_PLUGIN_KEY', 'wooslg' );
}
if( !defined('WOO_SLG_SOCIAL_BLOCK_DIR') ) {
	define( 'WOO_SLG_SOCIAL_BLOCK_DIR', WOO_SLG_DIR . '/includes/blocks/' ); // block dir
}

// Required Wpweb updater functions file
if( !function_exists('wpweb_updater_install') ) {
	require_once( 'includes/wpweb-upd-functions.php' );
}

global $woo_slg_options;

/**
 * Activation Hook
 * Register plugin activation hook.
 * 
 * @package WooCommerce - Social Login
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'woo_slg_install' );

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * stest default values for the plugin options.
 * 
 * @package WooCommerce - Social Login
 * @since 1.0.0
 */
function woo_slg_install() {

	global $wpdb, $woo_slg_options;

	// Plugin install setup function file
	require_once( WOO_SLG_DIR . '/includes/woo-slg-setup-functions.php' );

	// Manage plugin version wise settings when plugin install and activation
	woo_slg_manage_plugin_install_settings();
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation.
 * 
 * @package WooCommerce - Social Login
 * @since 1.2.6
 */
function woo_slg_load_text_domain() {

	// Set filter for plugin's languages directory
	$woo_slg_lang_dir = dirname( plugin_basename(__FILE__) ) . '/languages/';
	$woo_slg_lang_dir = apply_filters( 'woo_slg_languages_directory', $woo_slg_lang_dir );

	// Traditional WordPress plugin locale filter
	$locale = apply_filters( 'plugin_locale', get_locale(), 'wooslg' );
	$mofile = sprintf( '%1$s-%2$s.mo', 'wooslg', $locale );

	// Setup paths to current locale file
	$mofile_local = $woo_slg_lang_dir . $mofile;
	$mofile_global = WP_LANG_DIR . '/' . WOO_SLG_BASENAME . '/' . $mofile;

	if( file_exists($mofile_global) ) { // Look in global /wp-content/languages/woo-social-login folder
		load_textdomain( 'wooslg', $mofile_global );
	} elseif( file_exists($mofile_local) ) { // Look in local /wp-content/plugins/woo-social-login/languages/ folder
		load_textdomain( 'wooslg', $mofile_local );
	} else { // Load the default language files
		load_plugin_textdomain( 'wooslg', false, $woo_slg_lang_dir );
	}
}

/**
 * Add plugin action links
 * 
 * Adds a Settings, Support and Docs link to the plugin list.
 * 
 * @package WooCommerce - Social Login
 * @since 1.2.2
 */
function woo_slg_add_plugin_links( $links ) {
	$plugin_links = array(
		'<a href="admin.php?page=woo-social-settings">' . esc_html__( 'Settings', 'wooslg' ) . '</a>',
		'<a href="' . esc_url( 'https://support.wpwebelite.com/' ) . '">' . esc_html__( 'Support', 'wooslg' ) . '</a>',
		'<a href="' . esc_url( 'https://docs.wpwebelite.com/woocommerce-social-login/' ) . '">' . esc_html__( 'Docs', 'wooslg' ) . '</a>'
	);

	return array_merge( $plugin_links, $links );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'woo_slg_add_plugin_links' );

// Add action to read plugin default option to Make it WPML Compatible
add_action( 'plugins_loaded', 'woo_slg_read_default_options', 999 );

/**
 * Re read all options to make it wpml compatible
 *
 * @package WooCommerce - Social Login
 * @since 1.3.0
 */
function woo_slg_read_default_options() {

	// Re-read settings because read plugin default option to Make it WPML Compatible
	global $woo_slg_options;
	$woo_slg_options['woo_slg_login_heading'] = get_option('woo_slg_login_heading');
}

//add action to load plugin
add_action('plugins_loaded', 'woo_slg_plugin_loaded', 20);

/**
 * Load Plugin
 * 
 * Handles to load plugin after
 * dependent plugin is loaded
 * successfully
 * 
 * @package WooCommerce - Social Login
 * @since 1.0.0
 */
function woo_slg_plugin_loaded() {

	// load first text domain.
	woo_slg_load_text_domain();

	/**
	 * Deactivation Hook
	 * Register plugin deactivation hook.
	 * 
	 * @package WooCommerce - Social Login
	 * @since 1.0.0
	 */
	register_deactivation_hook( __FILE__, 'woo_slg_uninstall' );

	/**
	 * Plugin Setup (On Deactivation)
	 * Delete  plugin options.
	 * 
	 * @package WooCommerce - Social Login
	 * @since 1.0.0
	 */
	function woo_slg_uninstall() {

		global $wpdb;

		// Getting delete option
		$woo_slg_delete_options = get_option( 'woo_slg_delete_options' );

		if( $woo_slg_delete_options == 'yes' ) {

			// Plugin install setup function file
			require_once( WOO_SLG_DIR . '/includes/woo-slg-setup-functions.php' );

			// Manage plugin version wise settings when plugin install and activation
			woo_slg_manage_plugin_uninstall_settings();
		}
	}
	
	/**
	 * Notice on PHP version lower then 5.4
	 */
	function woo_slg_php_version() {
		/* translators: %2$s: PHP version */
		$message = sprintf( esc_html__('%1$s requires PHP version %2$s+, plugin is currently NOT ACTIVE.', 'nextend-facebook-connect'), 'WooCommerce Social Login', '5.4' );

		$html_message = sprintf( '<div class="error">%s</div>', wpautop($message) );
		echo wp_kses_post( $html_message );
	}

	//Global variables
	global $woo_slg_model, $woo_slg_scripts, $woo_slg_render, $woo_slg_persistant_anonymous,
	$woo_slg_shortcodes, $woo_slg_public, $woo_slg_admin,
	$woo_slg_admin_settings_tabs, $woo_slg_options, $woo_slg_opath, $pagenow;

	// Plugin settings function file
	require_once( WOO_SLG_DIR . '/includes/woo-slg-setting-functions.php' );

	// Global Options
	$woo_slg_options = woo_slg_global_settings();

	if( !version_compare(PHP_VERSION, '5.4', '>=') ) {
		add_action( 'admin_notices', 'woo_slg_php_version' );
	} else {
		require_once( WOO_SLG_DIR . '/includes/WSL/Persistent/PersistentStorage.php' );
	}
	
	// loads the Misc Functions file
	require_once( WOO_SLG_DIR . '/includes/woo-slg-misc-functions.php' );
	woo_slg_initialize();

	require_once( WOO_SLG_DIR . '/includes/class-woo-slg-persistant.php' );
	$woo_slg_persistant_anonymous = new WooSocialLoginPersistentAnonymous();

	//social class loads
	require_once( WOO_SLG_SOCIAL_DIR . '/woo-slg-social.php' );
	
	//Model Class for generic functions
	require_once( WOO_SLG_DIR . '/includes/class-woo-slg-model.php' );
	$woo_slg_model = new WOO_Slg_Model();

	//Scripts Class for scripts / styles
	require_once( WOO_SLG_DIR . '/includes/class-woo-slg-scripts.php' );
	$woo_slg_scripts = new WOO_Slg_Scripts();
	$woo_slg_scripts->add_hooks();

	//Renderer Class for HTML
	require_once( WOO_SLG_DIR . '/includes/class-woo-slg-renderer.php' );
	$woo_slg_render = new WOO_Slg_Renderer();

	//Shortcodes class for handling shortcodes
	require_once( WOO_SLG_DIR . '/includes/class-woo-slg-shortcodes.php' );
	$woo_slg_shortcodes = new WOO_Slg_Shortcodes();
	$woo_slg_shortcodes->add_hooks();

	// Check BuddyPress is installed
	if( class_exists('BuddyPress') ) {
		require_once( WOO_SLG_DIR . '/includes/compatibility/class-woo-slg-buddypress.php' );
		$woo_slg_buddypress = new WOO_Slg_BuddyPress();
		$woo_slg_buddypress->add_hooks();
	}

	// check PeepSo is installed @since 1.6.3
	if( class_exists('PeepSo') ) {
		require_once( WOO_SLG_DIR . '/includes/compatibility/class-woo-slg-peepso.php' );
		$woo_slg_peepso = new WOO_Slg_PeepSo();
		$woo_slg_peepso->add_hooks();
	}

	// check bbPress is installed
	if( class_exists('bbPress') ) {
		require_once( WOO_SLG_DIR . '/includes/compatibility/class-woo-slg-bbpress.php' );
		$woo_slg_bbpress = new WOO_Slg_bbPress();
		$woo_slg_bbpress->add_hooks();
	}

	// check bbPress is installed
	if( defined('WP_ROCKET_PLUGIN_NAME') ) {
		require_once( WOO_SLG_DIR . '/includes/compatibility/class-woo-slg-wp-rocket.php' );
		$woo_slg_wp_rocket = new WOO_Slg_Wp_Rocket();
		$woo_slg_wp_rocket->add_hooks();
	}

	//Public Class for public functionlities
	require_once( WOO_SLG_DIR . '/includes/class-woo-slg-public.php' );
	$woo_slg_public = new WOO_Slg_Public();
	$woo_slg_public->add_hooks();

	//Admin Pages Class for admin site
	require_once( WOO_SLG_ADMIN . '/class-woo-slg-admin.php' );
	$woo_slg_admin = new WOO_Slg_Admin();
	$woo_slg_admin->add_hooks();

	//Register Widget
	require_once( WOO_SLG_DIR . '/includes/widgets/class-woo-slg-login-buttons.php' );

	//Loads the Templates Functions file
	require_once( WOO_SLG_DIR . '/includes/woo-slg-template-functions.php' );

	//Loads the Template Hook File
	require_once( WOO_SLG_DIR . '/includes/woo-slg-template-hooks.php' );

	// Check if Wpweb Updter is not activated then load updater from plugin itself
	if( !class_exists('Wpweb_Upd_Admin') ) {

		// Load the updater file
		include_once( WOO_SLG_DIR . '/includes/updater/wpweb-updater.php' );

		// call to updater function
		woo_slg_wpweb_updater();
	} else { // added code from the end of file to fix the undefind contstant WPWEB_UPD_DOMAIN
		// call to updater function
		woo_slg_wpweb_updater();
	}

	//Loads the file to register block
	require_once( WOO_SLG_SOCIAL_BLOCK_DIR .'/social/index.php' );
}

/**
 * Add plugin to updater list and create updater object
 * 
 * @package WooCommerce - Social Login
 * @since 1.6.3
 */
function woo_slg_wpweb_updater() {

	// Plugin updates
	wpweb_queue_update( plugin_basename(__FILE__), WOO_SLG_PLUGIN_KEY );

	/**
	 * Include Auto Updating Files
	 * 
	 * @package WooCommerce - Social Login
	 * @since 1.0.0
	 */
	if( class_exists('Wpweb_Upd_Admin') ) {
		require_once( WPWEB_UPD_DIR . '/updates/class-plugin-update-checker.php' ); // auto updating
	} else {
		require_once( WOO_SLG_WPWEB_UPD_DIR . '/updates/class-plugin-update-checker.php' ); // auto updating
	}

	$WpwebWooslgUpdateChecker = new WpwebPluginUpdateChecker(
		WPWEB_UPD_DOMAIN . '/Updates/WOOSLG/license-info.php', __FILE__, WOO_SLG_PLUGIN_KEY
	);

	/**
	 * Auto Update
	 * Get the license key and add it to the update checker.
	 * 
	 * @package WooCommerce - Social Login
	 * @since 1.0.0
	 */
	function woo_slg_add_secret_key( $query ) {
		$plugin_key = WOO_SLG_PLUGIN_KEY;

		$query['lickey'] = wpweb_get_plugin_purchase_code( $plugin_key );
		return $query;
	}

	$WpwebWooslgUpdateChecker->addQueryArgFilter( 'woo_slg_add_secret_key' );
}