<?php
/**
 * Database Update Script for 4.2.8.5
 *
 * @package WooCommerce_Point_Of_Sale/Updates
 */

defined( 'ABSPATH' ) || exit;

global $wpdb;

$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}wc_point_of_sale_cache" );
$wpdb->query(
	"CREATE TABLE IF NOT EXISTS {$wpdb->prefix}wc_point_of_sale_cache (
	`id` int(11) NOT NULL,
	`data` longtext NOT NULL,
	`pkey` longtext NOT NULL,
	`pos_id` int(11) DEFAULT NULL,
	`time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
);
