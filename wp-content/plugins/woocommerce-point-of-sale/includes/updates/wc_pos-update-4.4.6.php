<?php
/**
 * Database Update Script for 4.4.6
 *
 * @package WooCommerce_Point_Of_Sale/Updates
 */

defined( 'ABSPATH' ) || exit;

global $wpdb;
$wpdb->hide_errors();

$rows = $wpdb->query(
	$wpdb->prepare(
		"DELETE FROM {$wpdb->prefix}woocommerce_api_keys
		WHERE description like %s
		 AND user_id = %d",
		'%pos%',
		0
	)
);
