<?php
/**
 * Database Update Script for 4.4.7
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
			AND column_name = 'print_tax'"
) )
) {
	$result['tax_summary'] = $wpdb->query( "ALTER TABLE {$wpdb->prefix}wc_poin_of_sale_receipts ADD `print_tax` VARCHAR (255) DEFAULT '' NOT NULL" );
}
