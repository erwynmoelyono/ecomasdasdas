<?php
/**
 * Analytics.
 *
 * Extend WC Analytics to display POS reports.
 *
 * @since 5.4.1
 * @package WooCommerce_Point_Of_Sale/Classes
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Analytics', false ) ) {
	return new WC_POS_Admin_Analytics();
}

/**
 * WC_POS_Admin_Analytics.
 *
 * @since 5.4.1
 */
class WC_POS_Admin_Analytics {

	/**
	 * Constructor.
	 *
	 * @since 5.4.1
	 */
	public function __construct() {
		// SELECT clauses.
		add_filter( 'woocommerce_analytics_clauses_select_orders_subquery', array( $this, 'add_order_select_clauses' ) );
		add_filter( 'woocommerce_analytics_clauses_select_orders_stats_total', array( $this, 'add_order_select_clauses' ) );
		add_filter( 'woocommerce_analytics_clauses_select_orders_stats_interval', array( $this, 'add_order_select_clauses' ) );

		// JOIN clauses.
		add_filter( 'woocommerce_analytics_clauses_join_orders_subquery', array( $this, 'add_orders_join_clauses' ), 10, 1 );
		add_filter( 'woocommerce_analytics_clauses_join_orders_stats_total', array( $this, 'add_orders_join_clauses' ), 10, 1 );
		add_filter( 'woocommerce_analytics_clauses_join_orders_stats_interval', array( $this, 'add_orders_join_clauses' ), 10, 1 );

		// WHERE clauses.
		add_filter( 'woocommerce_analytics_clauses_where_orders_subquery', array( $this, 'add_orders_where_clauses' ), 10, 1 );
		add_filter( 'woocommerce_analytics_clauses_where_orders_stats_total', array( $this, 'add_orders_where_clauses' ), 10, 1 );
		add_filter( 'woocommerce_analytics_clauses_where_orders_stats_interval', array( $this, 'add_orders_where_clauses' ), 10, 1 );

		// Query args.
		add_filter( 'woocommerce_analytics_orders_query_args', array( $this, 'apply_orders_filter_arg' ) );
		add_filter( 'woocommerce_analytics_orders_stats_query_args', array( $this, 'apply_orders_filter_arg' ) );
	}

	/**
	 * Add SELECT clauses to the orders report query.
	 *
	 * @since 5.4.1
	 * @param array $clauses an array of WHERE query strings.
	 * @return array augmented clauses.
	 */
	public function add_order_select_clauses( $clauses ) {
		// if ( isset( $_GET['filter'] ) && in_array( $_GET['filter'], array( 'pos', 'online' ), true ) ) {
			$clauses[] = ', created_via_postmeta.meta_value AS created_via';
		// }

		return $clauses;
	}


	/**
	 * Add JOIN clauses to the orders report query.
	 *
	 * @since 5.4.1
	 * @param array $clauses an array of JOIN query strings.
	 * @return array augmented clauses.
	 */
	public function add_orders_join_clauses( $clauses ) {
		global $wpdb;

		// JOIN created_via.
		$clauses[] = "LEFT JOIN {$wpdb->postmeta} created_via_postmeta ON {$wpdb->prefix}wc_order_stats.order_id = created_via_postmeta.post_id AND created_via_postmeta.meta_key = '_created_via'";

		// JOIN wc_pos_register_id.
		if (
			isset( $_GET['pos_outlet_is'] ) ||
			isset( $_GET['pos_outlet_is_not'] ) ||
			isset( $_GET['pos_register_is'] ) ||
			isset( $_GET['pos_register_is_not'] )
		) {
			$clauses[] = "LEFT JOIN {$wpdb->postmeta} register_postmeta ON {$wpdb->prefix}wc_order_stats.order_id = register_postmeta.post_id AND register_postmeta.meta_key = 'wc_pos_register_id'";
		}

		return $clauses;
	}

	/**
	 * Add WHERE clauses to the orders report query.
	 *
	 * @since 5.4.1
	 * @param array $clauses an array of WHERE query strings.
	 * @return array augmented clauses.
	 */
	public function add_orders_where_clauses( $clauses ) {
		// WHERE created_via.
		if ( isset( $_GET['filter'] ) ) {
			if ( 'pos' === $_GET['filter'] ) {
				$clauses[] = "AND created_via_postmeta.meta_value = 'POS'";
			} elseif ( 'online' === $_GET['filter'] ) {
				$clauses[] = "AND created_via_postmeta.meta_value != 'POS'";
			}
		}

		// WHERE wc_pos_register_id.
		if ( isset( $_GET['pos_register_is'] ) || isset( $_GET['pos_register_is_not'] ) ) {
			$sql_operator = isset( $_GET['pos_register_is'] ) ? '=' : '!=';
			$register_id  = isset( $_GET['pos_register_is'] ) ? wc_clean( wp_unslash( $_GET['pos_register_is'] ) ) : wc_clean( wp_unslash( $_GET['pos_register_is_not'] ) );

			$clauses[] = "AND register_postmeta.meta_value {$sql_operator} {$register_id}";
		}

		// WHERE wc_pos_register_id (for outlets).
		if ( isset( $_GET['pos_outlet_is'] ) || isset( $_GET['pos_outlet_is_not'] ) ) {
			$sql_operator        = isset( $_GET['pos_outlet_is'] ) ? 'IN' : 'NOT IN';
			$outlet_id           = isset( $_GET['pos_outlet_is'] ) ? wc_clean( wp_unslash( $_GET['pos_outlet_is'] ) ) : wc_clean( wp_unslash( $_GET['pos_outlet_is_not'] ) );
			$register_ids        = wc_pos_get_registers_by_outlet( wc_clean( wp_unslash( $outlet_id ) ) );
			$sql_operator_values = implode( ',', $register_ids );

			$clauses[] = "AND register_postmeta.meta_value {$sql_operator} ({$sql_operator_values})";
		}

		return $clauses;
	}

	/**
	 * Add the query argument `filter` for caching purposes. Otherwise, a change of the filter
	 * will return the previous request's data.
	 *
	 * @param array $args query arguments.
	 * @return array augmented query arguments.
	 */
	public function apply_orders_filter_arg( $args ) {
		// Query vars used.
		$query_vars = array(
			'filter',
			'pos_outlet_is',
			'pos_outlet_is_not',
			'pos_register_is',
			'pos_register_is_not',
		);

		foreach ( $query_vars as $var ) {
			if ( isset( $_GET[ $var ] ) ) {
				$args[ $var ] = sanitize_text_field( wp_unslash( $_GET[ $var ] ) );
			}
		}

		return $args;
	}

}

return new WC_POS_Admin_Analytics();
