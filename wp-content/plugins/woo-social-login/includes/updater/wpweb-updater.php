<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Basic plugin definitions 
 * 
 * @package WPWeb Updater
 * @since 1.0.0
 */
if( !defined( 'WOO_SLG_WPWEB_UPD_DIR' ) ) {
	define( 'WOO_SLG_WPWEB_UPD_DIR', dirname( __FILE__ ) ); // plugin dir
}
if( !defined( 'WOO_SLG_WPWEB_UPD_URL' ) ) {
	define( 'WOO_SLG_WPWEB_UPD_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}
if( !defined( 'WOO_SLG_WPWEB_UPD_ADMIN' ) ) {
	define( 'WOO_SLG_WPWEB_UPD_ADMIN', WOO_SLG_WPWEB_UPD_DIR . '/includes/admin' ); // plugin admin dir
}
if( !defined( 'WPWEB_UPD_DOMAIN' ) ) {
	define( 'WPWEB_UPD_DOMAIN', esc_url_raw('https://updater.wpwebelite.com') ); // updater domain
}

//Include misc functions file
require_once( WOO_SLG_WPWEB_UPD_DIR . '/includes/wpweb-upd-misc-functions.php' );

if( is_admin() ) {
	    
    //Include admin class file
    require_once( WOO_SLG_WPWEB_UPD_DIR . '/includes/admin/class-wpweb-upd-admin.php' );

    $wpweb_upd_admin = new Woo_Slg_Wpweb_Upd_Admin();
    $wpweb_upd_admin->add_hooks();
    
	
	include_once( WOO_SLG_WPWEB_UPD_DIR . '/updates/class-plugin-update-checker.php' );	
}