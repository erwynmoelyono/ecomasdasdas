<?php
/**
 * Techmarket engine room
 *
 * @package techmarket
 */

/**
 * Assign the Techmarket version to a var
 */
$theme              = wp_get_theme( 'techmarket' );
$techmarket_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$techmarket = (object) array(
	'version' => $techmarket_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require get_template_directory() . '/inc/class-techmarket.php',
);

require get_template_directory() . '/inc/functions/extras.php';

require get_template_directory() . '/inc/techmarket-functions.php';
require get_template_directory() . '/inc/techmarket-template-hooks.php';
require get_template_directory() . '/inc/techmarket-template-functions.php';
require get_template_directory() . '/inc/classes/class-wp-bootstrap-navwalker.php';

/**
 * Redux Framework
 * Load theme options and their override filters
 */
if ( techmarket_is_redux_activated() ) {
	require get_template_directory() . '/inc/redux-framework/techmarket-options.php';
	require get_template_directory() . '/inc/redux-framework/hooks.php';
	require get_template_directory() . '/inc/redux-framework/functions.php';
}

if ( class_exists( 'Jetpack' ) ) {
	$techmarket->jetpack = require get_template_directory() . '/inc/jetpack/class-techmarket-jetpack.php';
}

if ( techmarket_is_woocommerce_activated() ) {
	$techmarket->woocommerce = require get_template_directory() . '/inc/woocommerce/class-techmarket-woocommerce.php';

	require get_template_directory() . '/inc/woocommerce/techmarket-woocommerce-template-hooks.php';
	require get_template_directory() . '/inc/woocommerce/techmarket-woocommerce-template-functions.php';
	require get_template_directory() . '/inc/woocommerce/techmarket-woocommerce-functions.php';
	require get_template_directory() . '/inc/woocommerce/integrations.php';
}

if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/class-techmarket-admin.php';
}

/**
 * One Click Demo Import
 */
if ( techmarket_is_ocdi_activated() ) {
	require get_template_directory() . '/inc/ocdi/hooks.php';
	require get_template_directory() . '/inc/ocdi/functions.php';
}

/**
 * Dokan Integration
 */
if ( techmarket_is_dokan_activated() ) {
	require get_template_directory() . '/inc/dokan/hooks.php';
	require get_template_directory() . '/inc/dokan/functions.php';
}

/**
 * WC Vendors Integration
 */
if ( techmarket_is_wc_vendors_activated() ) {
	require get_template_directory() . '/inc/wc-vendors/hooks.php';
	require get_template_directory() . '/inc/wc-vendors/functions.php';
}

/**
 * WC Marketplace Integration
 */
if ( techmarket_is_wc_marketplace_activated() ) {
	require get_template_directory() . '/inc/wc-marketplace/hooks.php';
	require get_template_directory() . '/inc/wc-marketplace/functions.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 */
