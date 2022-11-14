<?php
/**
 * Plugin Name: Point of Sale for WooCommerce
 * Plugin URI: https://www.woocommerce.com/products/woocommerce-point-of-sale/
 * Description: An advanced toolkit for placing in-store orders through a WooCommerce based Point of Sale (POS) interface. Requires <a href="http://wordpress.org/plugins/woocommerce/">WooCommerce</a>.
 * Author: Actuality Extensions
 * Author URI: http://actualityextensions.com/
 * Version: 5.5.3
 * Text Domain: woocommerce-point-of-sale
 * Domain Path: /i18n/languages/
 *
 * Copyright: (c) 2013-2021 Actuality Extensions (info@actualityextensions.com)
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package WooCommerce_Point_Of_Sale
 *
 * Woo: 5120689:8f6df80c02320298a50e6985162cc35f
 * WC requires at least: 3.5.0
 * WC tested up to: 5.4.1
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'WC_POS_PLUGIN_FILE' ) ) {
	define( 'WC_POS_PLUGIN_FILE', __FILE__ );
}

require_once ABSPATH . 'wp-admin/includes/plugin.php';
require_once 'vendor/autoload.php';


if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	add_action(
		'admin_notices',
		function() {
			/* translators: 1. URL link. */
			echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'Point of Sale for WooCommerce requires WooCommerce to be installed and active. You can download %s here.', 'woocommerce-point-of-sale' ), '<a href="https://woocommerce.com/" target="_blank">WooCommerce</a>' ) . '</strong></p></div>';
		}
	);

	return;
}

if ( is_plugin_active( 'woocommerce-pos/woocommerce-pos.php' ) ) {
	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p><strong>' . esc_html__( 'Point of Sale for WooCommerce requires the “WooCommerce POS” plugin to be deactivated to avoid conflicts.', 'woocommerce-point-of-sale' ) . '</strong></p></div>';
		}
	);

	return;
}

// Include the main WC_POS class.
if ( ! class_exists( 'WC_POS', false ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-wc-pos.php';
}

/**
 * Returns the main instance of WC_POS.
 *
 * @since 3.0.5
 * @return WC_POS
 */
function WC_POS() {
	return WC_POS::instance();
}

// Global for backwards compatibility.
$GLOBALS['wc_pos'] = WC_POS();
