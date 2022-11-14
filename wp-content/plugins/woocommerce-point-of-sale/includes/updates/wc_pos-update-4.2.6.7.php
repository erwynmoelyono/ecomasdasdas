<?php
/**
 * Database Update Script for 4.2.6.7
 *
 * @package WooCommerce_Point_Of_Sale/Updates
 */

defined( 'ABSPATH' ) || exit;

global $wpdb;
$wpdb->hide_errors();

if ( ! ( $wpdb->get_results(
	"SELECT *
			FROM INFORMATION_SCHEMA.COLUMNS
			WHERE table_name = '{$wpdb->prefix}wc_poin_of_sale_receipts'
			AND table_schema = '{$wpdb->dbname}'
			AND column_name = 'show_cost'"
) )
) {
	$result['show_cost'] = $wpdb->query( "ALTER TABLE {$wpdb->prefix}wc_poin_of_sale_receipts ADD `show_cost` VARCHAR (11) NOT NULL DEFAULT 'no' " );
}
