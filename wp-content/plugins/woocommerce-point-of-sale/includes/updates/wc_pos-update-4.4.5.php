<?php
/**
 * Database Update Script for 4.4.5
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
			AND column_name = 'print_dining_option'"
) )
) {
	$wpdb->query( "ALTER TABLE {$wpdb->prefix}wc_poin_of_sale_receipts ADD `print_dining_option` VARCHAR (11) NOT NULL DEFAULT 'no' " );
}
if ( ! ( $wpdb->get_results(
	"SELECT *
			FROM INFORMATION_SCHEMA.COLUMNS
			WHERE table_name = '{$wpdb->prefix}wc_poin_of_sale_receipts'
			AND table_schema = '{$wpdb->dbname}'
			AND column_name = 'print_tab'"
) )
) {
	$wpdb->query( "ALTER TABLE {$wpdb->prefix}wc_poin_of_sale_receipts ADD `print_tab` VARCHAR (11) NOT NULL DEFAULT 'no' " );
}
