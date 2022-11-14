<?php
/**
 * REST API Options Controller
 *
 * Handles requests to wc-pos/options.
 *
 * @package WooCommerce_Point_Of_Sale/Classes/API
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_REST_Options_Controller.
 *
 * @since 5.3.0
 */
class WC_POS_REST_Options_Controller extends WP_REST_Controller {

	/**
	 * Endpoint namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'wc-pos';


	/**
	 * Route base.
	 *
	 * @var string
	 */
	protected $rest_base = 'options';


	/**
	 * Registers the necessary REST API routes.
	 */
	public function register_routes() {
		register_rest_route(
			$this->namespace,
			'/' . $this->rest_base,
			array(
				array(
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_items' ),
					'permission_callback' => array( $this, 'get_items_permissions_check' ),
					'args'                => $this->get_collection_params(),
				),
			)
		);
	}

	/**
	 * Check if a given request has access to read POS options.
	 *
	 * @since 5.3.0
	 *
	 * @param  WP_REST_Request $request Full details about the request.
	 * @return WP_Error|boolean
	 */
	public function get_items_permissions_check( $request ) {
		if ( ! current_user_can( 'view_register' ) ) {
			return new WP_Error( 'woocommerce_rest_cannot_view', __( 'Sorry, you cannot list resources.', 'woocommerce-point-of-sale' ), array( 'status' => rest_authorization_required_code() ) );
		}

		return true;
	}

	/**
	 * Retrieve Point of Sale options.
	 *
	 * @since 5.3.0
	 *
	 * @param  WP_REST_Request $request Full details about the request.
	 * @return WP_Error|WP_REST_Response Response object on success, or WP_Error object on failure
	 */
	public function get_items( $request ) {
		$tax_classes = array_map(
			function( $class ) {
				return array(
					'slug' => sanitize_title( $class ),
					'name' => $class,
				);
			},
			WC_Tax::get_tax_classes()
		);

		$options = apply_filters(
			'wc_pos_options',
			array(
				'localeconv'                      => localeconv(),
				'site_url'                        => home_url(),
				'coupons_enabled'                 => wc_coupons_enabled(),
				'prices_include_tax'              => wc_prices_include_tax(),
				'tax_enabled'                     => wc_tax_enabled(),
				'shipping_enabled'                => wc_shipping_enabled(),
				'rounding_precision'              => wc_get_rounding_precision(),
				'price_decimal_separator'         => wc_get_price_decimal_separator(),
				'price_thousand_separator'        => wc_get_price_thousand_separator(),
				'price_decimals'                  => wc_get_price_decimals(),
				'price_format'                    => get_woocommerce_price_format(),
				'tax_classes'                     => $tax_classes,
				'base_location'                   => wc_pos_get_shop_location(),
				'tax_round_half_up'               => self::tax_round_half_up(),
				'base_address_1'                  => WC()->countries->get_base_address(),
				'base_address_2'                  => WC()->countries->get_base_address_2(),
				'base_city'                       => WC()->countries->get_base_city(),
				'base_postcode'                   => WC()->countries->get_base_postcode(),
				'base_country'                    => WC()->countries->get_base_country(),
				'base_state'                      => '*' === WC()->countries->get_base_state() ? '' : WC()->countries->get_base_state(),
				'continents'                      => WC()->countries->get_continents(),
				'shipping_countries'              => WC()->countries->get_shipping_countries(),
				'allowed_countries'               => WC()->countries->get_allowed_countries(),
				'currency'                        => get_woocommerce_currency(),
				'currency_symbols'                => get_woocommerce_currency_symbols(),
				'order_statuses'                  => wc_pos_get_order_statuses_no_prefix(),
				// TODO: Let's prefix woocommerce options with `woocommerce_`.
				'tax_based_on'                    => get_option( 'woocommerce_tax_based_on' ),
				'pos_tax_based_on'                => get_option( 'wc_pos_calculate_tax_based_on', 'outlet' ),
				'shipping_tax_class'              => get_option( 'woocommerce_shipping_tax_class' ),
				'default_customer_address'        => get_option( 'woocommerce_default_customer_address' ),
				'default_country'                 => get_option( 'woocommerce_default_country' ),
				'tax_round_at_subtotal'           => 'yes' === get_option( 'woocommerce_tax_round_at_subtotal' ),
				'tax_display_cart'                => get_option( 'woocommerce_tax_display_cart' ),
				'tax_display_shop'                => get_option( 'woocommerce_tax_display_shop' ),
				'tax_total_display'               => get_option( 'woocommerce_tax_total_display' ),
				'price_display_suffix'            => get_option( 'woocommerce_price_display_suffix' ),
				'cache_customers'                 => 'yes' === get_option( 'wc_pos_cache_customers', 'no' ),
				'enable_weight_embedded_barcodes' => 'yes' === get_option( 'wc_pos_enable_weight_embedded_barcodes', 'no' ),
				'upca_disable_middle_check_digit' => 'yes' === get_option( 'wc_pos_upca_disable_middle_check_digit', 'no' ),
				'upca_type'                       => get_option( 'wc_pos_upca_type', 'price' ),
				'upca_multiplier'                 => get_option( 'wc_pos_upca_multiplier', 100 ),
				'max_concurrent_requests'         => get_option( 'wc_pos_max_concurrent_requests', 30 ),
				'calc_discounts_sequentially'     => 'yes' === get_option( 'woocommerce_calc_discounts_sequentially', 'no' ),
				'image_resolution'                => get_option( 'wc_pos_image_resolution', 'thumbnail' ),
				'display_product_attributes'      => get_option( 'wc_pos_display_product_attributes', array() ),
				'custom_product_id'               => get_option( 'wc_pos_custom_product_id', 0 ),
				// POS options.
				// Filters.
				'adjust_non_base_location_prices' => apply_filters( 'woocommerce_adjust_non_base_location_prices', true ),
				'apply_base_tax_for_local_pickup' => apply_filters( 'woocommerce_apply_base_tax_for_local_pickup', true ),
				'local_pickup_methods'            => apply_filters( 'woocommerce_local_pickup_methods', array( 'legacy_local_pickup', 'local_pickup' ) ),
				'cart_remove_taxes_zero_rate_id'  => apply_filters( 'woocommerce_cart_remove_taxes_zero_rate_id', 'zero-rated' ),
				'cart_hide_zero_taxes'            => apply_filters( 'woocommerce_cart_hide_zero_taxes', true ),
				// Named constants.
				'PHP_VERSION'                     => PHP_VERSION,
				'WC_DISCOUNT_ROUNDING_MODE'       => self::get_discount_rounding_mode_string( WC_DISCOUNT_ROUNDING_MODE ),
			)
		);

		return rest_ensure_response( $options );
	}

	/**
	 * Check if WC will round the tax total half up/down.
	 *
	 * @return bool
	 */
	protected static function tax_round_half_up() {
		return 1.15 === wc_round_tax_total( 1.145, 2 ) ? true : false;
	}

	/**
	 * Converts and returns PHP rounding constant integers to their equivalnet constant name to be
	 * used with locutus/php/math/round.
	 *
	 * @param int constatn Constant integer value.
	 * @return string Constant name.
	 */
	protected static function get_discount_rounding_mode_string( $constant ) {
		if ( PHP_ROUND_HALF_UP === $constant ) {
			return 'PHP_ROUND_HALF_UP';
		}

		if ( PHP_ROUND_HALF_DOWN === $constant ) {
			return 'PHP_ROUND_HALF_DOWN';
		}

		if ( PHP_ROUND_HALF_EVEN === $constant ) {
			return 'PHP_ROUND_HALF_EVEN';
		}

		if ( PHP_ROUND_HALF_ODD === $constant ) {
			return 'PHP_ROUND_HALF_ODD';
		}
	}
}
