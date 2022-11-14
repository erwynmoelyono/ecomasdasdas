<?php
/**
 * Database Update Script for 4.2.6.8
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
			AND column_name = 'print_customer_phone'"
) )
) {
	$result['print_customer_phone'] = $wpdb->query( "ALTER TABLE {$wpdb->prefix}wc_poin_of_sale_receipts ADD `print_customer_phone` VARCHAR (11) NOT NULL DEFAULT 'yes' " );
}
if ( ! ( $wpdb->get_results(
	"SELECT *
			FROM INFORMATION_SCHEMA.COLUMNS
			WHERE table_name = '{$wpdb->prefix}wc_poin_of_sale_receipts'
			AND table_schema = '{$wpdb->dbname}'
			AND column_name = 'customer_phone_label'"
) )
) {
	$result['customer_phone_label'] = $wpdb->query( "ALTER TABLE {$wpdb->prefix}wc_poin_of_sale_receipts ADD `customer_phone_label` VARCHAR (11) NOT NULL DEFAULT 'Telephone' " );
}
