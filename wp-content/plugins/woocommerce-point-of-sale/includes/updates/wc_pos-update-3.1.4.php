<?php
/**
 * Database Update Script for 3.2.2.0
 *
 * @package WooCommerce_Point_Of_Sale/Updates
 */

defined( 'ABSPATH' ) || exit;

global $wpdb;
$wpdb->hide_errors();

$result = $wpdb->query( "ALTER TABLE {$wpdb->users} ADD user_modified_gmt DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' AFTER user_registered" );
$result = $wpdb->query( "UPDATE {$wpdb->users} SET user_modified_gmt=user_registered" );
