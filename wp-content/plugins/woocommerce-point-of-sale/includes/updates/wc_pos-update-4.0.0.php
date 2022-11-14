<?php
/**
 * Database Update Script for 4.0.0
 *
 * @package WooCommerce_Point_Of_Sale/Updates
 */

defined( 'ABSPATH' ) || exit;
global $wpdb;

$wpdb->hide_errors();
$result['pos_custom_product'] = $wpdb->query( "UPDATE $wpdb->posts SET post_type = 'product' WHERE post_type = 'pos_custom_product' " );

