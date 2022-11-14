<?php
/**
 * Database Update Script for 3.0.9
 *
 * @package WooCommerce_Point_Of_Sale/Updates
 */

defined( 'ABSPATH' ) || exit;

global $wpdb;
$wpdb->hide_errors();

$orders = $wpdb->get_results(
	"
	SELECT posts.ID FROM {$wpdb->posts} as posts
	INNER JOIN {$wpdb->postmeta} AS pos ON (posts.ID = pos.post_id AND  pos.meta_key = 'wc_pos_order_type' AND pos.meta_value = 'POS')	
	WHERE posts.post_type = 'shop_order'
	"
);

if ( $orders ) {
	foreach ( $orders as $_order ) {
		$_tax = get_post_meta( $_order->ID, '_order_tax', true );
		if ( empty( $_tax ) && '' === $_tax ) {
			update_post_meta( $_order->ID, '_order_tax', 0 );
			update_post_meta( $_order->ID, '_order_shipping_tax', 0 );
		}
	}
}
