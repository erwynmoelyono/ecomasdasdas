<?php
/**
 * Database Update Script for 4.5.9
 *
 * @package WooCommerce_Point_Of_Sale/Updates
 */

defined( 'ABSPATH' ) || exit;

global $wpdb;
$wpdb->hide_errors();

// Delete options.
delete_option( 'wc_pos_enable_new_api' );
delete_option( 'wc_pos_new_api_time' );
