<?php
/**
 * Database Update Script for 4.2.9
 *
 * @package WooCommerce_Point_Of_Sale/Updates
 */

defined( 'ABSPATH' ) || exit;

global $wpdb;
$wpdb->hide_errors();

$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}wc_poin_of_sale_tabs" );
$wpdb->query(
	"
	CREATE TABLE IF NOT EXISTS {$wpdb->prefix}wc_poin_of_sale_tabs (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`title` varchar(255) NOT NULL,
		`spend_limit` float DEFAULT NULL,
		`register_id` int(11) DEFAULT NULL,
		`order_id` int(11) DEFAULT NULL,
		`tab_number` int(11) DEFAULT NULL,
		`opened` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8"
);
