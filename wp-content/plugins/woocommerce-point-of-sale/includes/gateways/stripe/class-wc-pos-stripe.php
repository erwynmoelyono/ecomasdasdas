<?php
/**
 * Stripe for POS.
 *
 * @package WooCommerce_Point_Of_Sale/Gateways
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_Stripe.
 */
class WC_POS_Stripe {

	/**
	 * Init.
	 */
	public static function init() {
		self::includes();
		self::add_ajax_events();

		add_filter( 'wc_pos_params', array( __CLASS__, 'params' ) );
		add_action( 'admin_notices', array( __CLASS__, 'show_stripe_notice' ) );
		add_filter( 'wc_pos_register_options_tabs', array( __CLASS__, 'register_options_tabs' ) );
		add_action( 'wc_pos_register_options_panels', array( __CLASS__, 'register_options_panels' ), 10, 2 );
		add_action( 'wc_pos_register_options_save', array( __CLASS__, 'save_register_data' ), 10, 2 );
		add_filter( 'wc_pos_register_data', array( __CLASS__, 'add_register_data' ) );
	}

	/**
	 * Includes.
	 */
	public static function includes() {
		if ( ! class_exists( '\Stripe\Stripe' ) ) {
			include WC_POS()->plugin_path() . '/vendor/stripe/stripe-php/init.php';
		}

		include dirname( __FILE__ ) . '/class-wc-pos-stripe-api.php';
		include dirname( __FILE__ ) . '/payment-methods/class-wc-pos-gateway-stripe-terminal.php';
		include dirname( __FILE__ ) . '/payment-methods/class-wc-pos-gateway-stripe-credit-card.php';
	}

	/**
	 * Returns the general Stripe gateway settings.
	 *
	 * @param $option null|string Whether to return the value of a specific option.
	 *
	 * @return array|string
	 */
	public static function get_stripe_settings( $option = null ) {
		$stripe_settings = maybe_unserialize( get_option( 'woocommerce_stripe_settings', array() ) );
		$stripe_settings = empty( $stripe_settings ) ? array() : $stripe_settings;

		// If no option specified, return all settings.
		if ( is_null( $option ) ) {
			return $stripe_settings;
		}

		// Return specific option value.
		return isset( $stripe_settings[ $option ] ) ? $stripe_settings[ $option ] : '';
	}

	/**
	 * Returns the publishable key based on Stripe mode.
	 *
	 * @return string
	 */
	public static function get_publishable_key() {
		if ( 'yes' === self::get_stripe_settings( 'testmode' ) ) {
			return self::get_stripe_settings( 'test_publishable_key' );
		}

		return self::get_stripe_settings( 'publishable_key' );
	}

	/**
	 * Returns the secret key based on Stripe mode.
	 *
	 * @return string
	 */
	public static function get_secret_key() {
		if ( 'yes' === self::get_stripe_settings( 'testmode' ) ) {
			return self::get_stripe_settings( 'test_secret_key' );
		}

		return self::get_stripe_settings( 'secret_key' );
	}

	/**
	 * Add gateway params.
	 *
	 * @param array $params
	 * @return array
	 */
	public static function params( $params ) {
		$stripe_data = get_option( 'woocommerce_pos_stripe_terminal_settings', array() );

		$params['stripe_publishable_key']       = self::get_publishable_key();
		$params['stripe_secret_key']            = self::get_secret_key(); // Should not be sent to the front-end.
		$params['stripe_terminal_debug_mode']   = ! empty( $stripe_data['debug_mode'] ) && 'yes' === $stripe_data['debug_mode'];
		$params['stripe_payment_intent_nonce']  = wp_create_nonce( 'stripe-payment-intent' );
		$params['stripe_capture_payment_nonce'] = wp_create_nonce( 'stripe-capture-payment' );

		return $params;
	}

	/**
	 * Show a notice if any of the POS Stripe payment methods is enabled and the main
	 * Stripe gateway is not installed or inactive.
	 */
	public static function show_stripe_notice() {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';

		global $wpdb;
		$pos_stripe_methods = $wpdb->get_results(
			"SELECT option_value
			FROM {$wpdb->options}
			WHERE option_name = 'woocommerce_pos_stripe_terminal_settings'
			OR option_name = 'woocommerce_pos_stripe_credit_card_settings'"
		);

		// Check if any of the Stripe methods is enabled.
		$enabled = false;
		if ( $pos_stripe_methods ) {
			foreach ( $pos_stripe_methods as $method ) {
				$settings = maybe_unserialize( $method->option_value );
				if ( 'yes' === $settings['enabled'] ) {
					$enabled = true;
					break;
				}
			}
		}

		// If any of the POS Stripe payment methods is enabled, we require the main Stripe plugin to be installed and active.
		if ( $enabled && ! is_plugin_active( 'woocommerce-gateway-stripe/woocommerce-gateway-stripe.php' ) ) {
			?>
			<div id="message" class="error">
				<p><?php esc_html_e( 'Point of Sale Stripe payment methods require the WooCommerce Stripe Payment Gateway to be installed and active.', 'woocommerce-point-of-sale' ); ?></p>
			</div>
			<?php
		}
	}

	/**
	 * Hook in methods.
	 */
	public static function add_ajax_events() {
		$ajax_events_nopriv = array(
			'stripe_connection_token',
			'stripe_payment_intent',
			'stripe_capture_payment',
		);

		foreach ( $ajax_events_nopriv as $ajax_event ) {
			add_action( 'wp_ajax_wc_pos_' . $ajax_event, array( __CLASS__, 'ajax_' . $ajax_event ) );
			add_action( 'wp_ajax_nopriv_wc_pos_' . $ajax_event, array( __CLASS__, 'ajax_' . $ajax_event ) );
		}
	}

	/**
	 * Ajax: create token.
	 */
	public static function ajax_stripe_connection_token() {
		$api = new WC_POS_Stripe_API();
		wp_send_json_success( $api->create_token() );
	}

	/**
	 * Ajax: payment intent.
	 */
	public static function ajax_stripe_payment_intent() {
		check_ajax_referer( 'stripe-payment-intent', 'security' );

		$api = new WC_POS_Stripe_API();

		// Updating metadata (after order creation)?
		if ( isset( $_POST['updating'] ) && wc_string_to_bool( wc_clean( $_POST['updating'] ) ) ) {
			$payment_intent_id = isset( $_POST['payment_intent_id'] ) ? wc_clean( $_POST['payment_intent_id'] ) : '';
			$meta_data         = isset( $_POST['meta_data'] ) ? (array) json_decode( stripslashes( wc_clean( $_POST['meta_data'] ) ) ) : array();

			try {
				$intent = $api->update_payment_intent( $payment_intent_id, $meta_data );
				wp_send_json_success( $intent );
			} catch ( Exception $e ) {
				wp_send_json_error(
					array(
						'message' => $e->getMessage(),
						'code'    => $e->getCode(),
					)
				);
			}
		}

		$amount         = isset( $_POST['amount'] ) ? floatval( $_POST['amount'] ) : 0.0;
		$currency       = strtolower( get_woocommerce_currency() );
		$payment_method = isset( $_POST['payment_method'] ) ? wc_clean( $_POST['payment_method'] ) : '';

		switch ( $payment_method ) {
			case 'pos_stripe_terminal':
				$payment_method_types = array( 'card_present' );
				$capture_method       = 'manual';
				break;
			case 'pos_stripe_credit_card':
				$payment_method_types = array( 'card' );
				$capture_method       = 'automatic';
				break;
			default:
				$payment_method_types = array();
				$capture_method       = 'automatic';
		}

		try {
			$intent = $api->create_payment_intent( $amount, $currency, $payment_method_types, $capture_method );
			wp_send_json_success( $intent );
		} catch ( Exception $e ) {
			wp_send_json_error(
				array(
					'message' => $e->getMessage(),
					'code'    => $e->getCode(),
				)
			);
		}
	}

	/**
	 * Ajax: capture payment.
	 */
	public static function ajax_stripe_capture_payment() {
		check_ajax_referer( 'stripe-capture-payment', 'security' );

		$id  = isset( $_POST['intentId'] ) ? wc_clean( wp_unslash( $_POST['intentId'] ) ) : '';
		$api = new WC_POS_Stripe_API();

		try {
			$intent = $api->capture_payment( $id );
			wp_send_json_success( $intent );
		} catch ( Exception $e ) {
			wp_send_json_error(
				array(
					'message' => $e->getMessage(),
					'code'    => $e->getCode(),
				)
			);
		}
	}

	/**
	 * Add Stripe Terminal tab to the register data meta box.
	 *
	 * @param array $tabs
	 * @return array
	 */
	public static function register_options_tabs( $tabs ) {
		$stripe_terminal_data = get_option( 'woocommerce_pos_stripe_terminal_settings', array() );
		$enabled              = ! empty( $stripe_terminal_data['enabled'] ) && 'yes' === $stripe_terminal_data['enabled'];

		if ( $enabled ) {
			$tabs['stripe_terminal'] = array(
				'label'  => __( 'Stripe Terminal', 'woocommerce-point-of-sale' ),
				'target' => 'stripe_terminal_register_options',
				'class'  => '',
			);
		}

		return $tabs;
	}

	/**
	 * Display the Stripe Terminal tab content.
	 *
	 * @param int             $thepostid
	 * @param WC_POS_Register $register
	 */
	public static function register_options_panels( $thepostid, $register_object ) {
		include_once 'views/html-admin-register-options-stripe-terminal.php';
	}

	/**
	 * On save register data.
	 *
	 * @param int             $post_id
	 * @param WC_POS_Register $register
	 */
	public static function save_register_data( $post_id, $register ) {
		if ( empty( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_REQUEST['_wpnonce'] ) ), 'update-post_' . $post_id ) ) {
			wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'woocommerce-point-of-sale' ) );
		}

		$terminal = ! empty( $_POST['stripe_terminal'] ) ? wc_clean( wp_unslash( $_POST['stripe_terminal'] ) ) : 'none';
		update_post_meta( $post_id, 'stripe_terminal', $terminal );
	}

	/**
	 * Add Stripe Terminal data to register data.
	 *
	 * @param array $register_data
	 * @return array
	 */
	public static function add_register_data( $register_data ) {
		$register_data['stripe_terminal'] = get_post_meta( $register_data['id'], 'stripe_terminal', true );

		return $register_data;
	}
}

WC_POS_Stripe::init();
