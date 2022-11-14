<?php
/**
 * My Account Page
 *
 * @package WooCommerce_Point_Of_Sale/Classes
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_My_Account', false ) ) {
	return new WC_POS_My_Account();
}

/**
 * WC_POS_My_Account.
 */
class WC_POS_My_Account {

	public function __construct() {
		add_action( 'init', array( $this, 'pos_endpoint' ) );
		add_filter( 'woocommerce_get_query_vars', array( $this, 'pos_query_vars' ), 9999, 1 );

		// Show this tab for the authorized users.
		if ( current_user_can( 'view_register' ) ) {
			add_filter( 'woocommerce_account_menu_items', array( $this, 'pos_myaccount_tab' ) );
			add_action( 'woocommerce_account_point-of-sale_endpoint', array( $this, 'pos_myaccount_content' ) );
		}
	}

	public function pos_endpoint() {
		add_rewrite_endpoint( 'point-of-sale', EP_ROOT | EP_PAGES );
		flush_rewrite_rules();
	}

	public function pos_query_vars( $vars ) {
		$vars[] = 'point-of-sale';
		return $vars;
	}

	public function pos_myaccount_tab( $items ) {
		if ( ! array_key_exists( 'edit-account', $items ) ) {
			$items['point-of-sale'] = __( 'Point of Sale', 'woocommerce-point-of-sale' );

			return $items;
		}

		$new_items = array();

		foreach ( $items as $key => $item ) {
			$new_items[ $key ] = $item;
			if ( 'edit-account' === $key ) {
				$new_items['point-of-sale'] = __( 'Point of Sale', 'woocommerce-point-of-sale' );
			}
		}

		return $new_items;
	}

	public function pos_myaccount_content() {
		include_once 'views/html-my-account-tab.php';
	}
}

return new WC_POS_My_Account();
