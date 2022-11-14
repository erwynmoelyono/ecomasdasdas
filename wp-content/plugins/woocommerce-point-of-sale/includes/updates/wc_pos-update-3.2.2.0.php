<?php
/**
 * Database Update Script for 3.2.2.0
 *
 * @package WooCommerce_Point_Of_Sale/Updates
 */

defined( 'ABSPATH' ) || exit;

global $wpdb;

$wpdb->hide_errors();

$wpdb->query(
	"
	CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}wc_point_of_sale_sale_reports` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`register_id` int(11) NOT NULL,
	`register_name` varchar(255) NOT NULL,
	`outlet_id` int(11) NOT NULL,
	`opened` datetime NOT NULL,
	`closed` datetime NOT NULL,
	`cashier_id` int(11) NOT NULL,
	`total_sales` float DEFAULT '0',
	`report_data` text NOT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=latin1
	"
);
