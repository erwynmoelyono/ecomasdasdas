<?php
/**
 * All WC Marketplace Related functions
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'techmarket_wc_marketplace_scripts' ) ) {
	/**
	 * Enqueue WC Marketplace Scripts
	 */
	function techmarket_wc_marketplace_scripts() {
		global $techmarket_version;
		wp_enqueue_style( 'techmarket-wc-marketplace-style', get_template_directory_uri() . '/assets/css/wc-marketplace/wc-marketplace.css', '', $techmarket_version );
	}
}