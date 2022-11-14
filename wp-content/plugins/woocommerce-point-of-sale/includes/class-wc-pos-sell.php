<?php
/**
 * Responsible for the POS front-end
 *
 * @package WooCommerce_Point_Of_Sale/Classes
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Sell', false ) ) {
	return new WC_POS_Sell();
}

/**
 * WC_POS_Sell.
 */
class WC_POS_Sell {

	/**
	 * The single instance of the class.
	 *
	 * @var WC_POS_Sell
	 */
	protected static $_instance = null;

	/**
	 * Current register data.
	 *
	 * @var array
	 */
	public $data = null;

	/**
	 * Current register ID.
	 *
	 * @var int
	 */
	public $id = null;

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'template_redirect', array( $this, 'template_redirect' ) );
		add_action( 'rest_api_init', array( $this, 'wc_api_init' ), 11 );
		add_action( 'rest_api_init', array( $this, 'wc_api_loaded' ), 12 );
		add_action( 'rest_api_init', array( $this, 'wc_api_classes' ), 15 );
		add_action( 'option_woocommerce_stripe_settings', array( $this, 'woocommerce_stripe_settings' ), 100, 1 );
		add_action( 'init', array( $this, 'wc_pos_checkout_gateways' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'assets' ), PHP_INT_MAX );
		add_action( 'wp_print_footer_scripts', array( $this, 'assets' ), PHP_INT_MAX );
		add_filter( 'style_loader_tag', array( $this, 'filter_asset_tags' ), PHP_INT_MAX, 2 );
		add_filter( 'script_loader_tag', array( $this, 'filter_asset_tags' ), PHP_INT_MAX, 2 );
		add_action( 'plugins_loaded', array( $this, 'init_addons_hooks' ), 99999 );
		add_filter( 'woocommerce_available_payment_gateways', array( $this, 'available_payment_gateways' ), 100, 1 );
		add_filter( 'woocommerce_checkout_fields', array( $this, 'custom_order_fields' ) );
		add_filter( 'woocommerce_payment_complete_reduce_order_stock', array( $this, 'payment_complete_reduce_order_stock' ), 100, 2 );
	}

	/**
	 * Load POS assets and dequeue everything else.
	 */
	public function assets() {
		if ( is_pos() ) {
			global $wp_scripts, $wp_styles;

			// Filter enqueued scripts to include only the scripts that have 'wc-pos-main' in deps.
			$wp_scripts->queue = array_filter(
				$wp_scripts->queue,
				function( $handle ) use ( $wp_scripts ) {
					$script = $wp_scripts->registered[ $handle ];

					return $script->deps && count( array_intersect( $script->deps, array( 'wc-pos-main', 'wc-pos-before-main' ) ) );
				}
			);

			// Filter enqueued styles to include only the styles that have 'wc-pos-main' in deps.
			$wp_styles->queue = array_filter(
				$wp_styles->queue,
				function( $handle ) use ( $wp_styles ) {
					$style = $wp_styles->registered[ $handle ];

					return $style->deps && in_array( 'wc-pos-main', $style->deps );
				}
			);

			// Dynamic style data.
			$primary_color = empty( get_option( 'wc_pos_theme_primary_color' ) ) ? '#7f54b3' : get_option( 'wc_pos_theme_primary_color', '#7f54b3' );

			wp_enqueue_style( 'wc-pos-open-sans-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap', array(), WC_POS_VERSION );
			wp_enqueue_style( 'wc-pos-main', WC_POS()->plugin_url() . '/assets/css/register/main.css', array(), WC_POS_VERSION );
			wp_add_inline_style(
				'wc-pos-main',
				"
				.product_grids .product-card.q-card:active,
				.pos-order-card:active,
				.category-card:active,
				.variation-card:active,
				.product-card:active,
				.product-card-rectangle:active{
					box-shadow: 0 0 0px 1px {$primary_color} !important;
					border-color: {$primary_color} !important;
				}
				"
			);
			wp_enqueue_script( 'wc-pos-stripe-js', 'https://js.stripe.com/v3/', array(), WC_POS_VERSION );
			wp_enqueue_script( 'wc-pos-stripe-sdk', 'https://js.stripe.com/terminal/v1/', array(), WC_POS_VERSION );
			wp_enqueue_script( 'wc-pos-before-main', WC_POS()->plugin_url() . '/assets/dist/js/before-main.min.js', array(), WC_POS_VERSION );
			wp_enqueue_script( 'wc-pos-main', WC_POS()->plugin_url() . '/assets/dist/js/register/main.' . ( wc_pos_is_dev() ? '' : 'min.' ) . 'js', array(), WC_POS_VERSION );
		}
	}

	/**
	 * Additional filtering to omit unwanted third-party script/style tags that could not be excluded.
	 *
	 * @param $tag The HTML tag.
	 * @param $handle The tag's registered handle.
	 *
	 * @return string
	 */
	public function filter_asset_tags( $tag, $handle ) {
		if ( is_pos() && 'wc-pos' !== substr( $handle, 0, 6 ) ) {
			return '';
		}

		return $tag;
	}

	public function init_addons_hooks() {
		if ( class_exists( 'WC_Subscriptions' ) ) {
			include_once 'class-wc-pos-subscriptions.php';
		}
		if ( class_exists( 'WC_Product_Addons' ) && 'yes' === get_option( 'wc_pos_force_enable_addons', 'wc_pos_force_enable_addons' ) ) {
			include_once 'class-wc-pos-product-addons.php';
		}
		include_once 'class-wc-pos-payment-gateways.php';
		add_filter( 'bwp_minify_is_loadable', array( $this, 'bwp_minify' ) );

	}

	public function bwp_minify( $is_loadable ) {
		if ( is_pos() ) {
			$is_loadable = false;
		}
		return $is_loadable;
	}

	public function custom_order_fields( $checkout_fields ) {
		if ( is_pos() && is_plugin_active( 'woocommerce-admin-custom-order-fields/woocommerce-admin-custom-order-fields.php' ) ) {
			$custom_fields = array();
			foreach ( wc_admin_custom_order_fields()->get_order_fields() as $field_id => $field ) {
				$f = array(
					'type'        => $field->type,
					'label'       => $field->label,
					'description' => $field->description,
					'id'          => '_wc_acof_' . $field_id,
				);

				if ( 'select' === $field->type || 'checkbox' === $field->type || 'radio' === $field->type ) {
					$opt = array();

					foreach ( $field->get_options() as $val ) {
						$opt[ $val['value'] ] = $val['label'];
					}
					$f['options'] = $opt;
				} else {
					$f['default'] = $field->default;
				}
				$custom_fields[ $field->label ] = $f;
			}
			$checkout_fields['pos_custom_order'] = $custom_fields;
		}

		return $checkout_fields;
	}

	/**
	 * Display the POS front-end.
	 */
	public function template_redirect() {
		// Bail if not POS.
		if ( ! is_pos() ) {
			return;
		}

		// User not logged in? Redirect to the login page.
		if ( ! is_user_logged_in() ) {
			auth_redirect();
		}

		// Not authorized?
		if ( ! current_user_can( 'view_register' ) ) {
			wp_die( esc_html__( 'You are not allowed to view this page.', 'woocommerce-point-of-sale' ) );
		}

		global $wp;

		$register_data = $this->get_register( $wp->query_vars['register'] );
		$outlet_data   = $this->get_outlet( $wp->query_vars['outlet'] );
		$primary_color = empty( get_option( 'wc_pos_theme_primary_color' ) ) ? '#7f54b3' : get_option( 'wc_pos_theme_primary_color', '#7f54b3' );

		// Update manifest.json.
		$file                          = WC_POS()->plugin_path() . '/assets/dist/images/manifest.json';
		$contents                      = wc_pos_file_get_contents( $file );
		$contents_decoded              = json_decode( $contents, true );
		$contents_decoded['start_url'] = esc_url( home_url( $wp->request ) );
		$json                          = json_encode( $contents_decoded );

		if ( is_writable( $file ) ) {
			file_put_contents( $file, $json );
		}

		include_once WC_POS()->plugin_path() . '/includes/views/html-admin-pos.php';
		exit;
	}

	/**
	 * Init POS REST API.
	 *
	 * @param object $api_server WC_API_Server Object
	 */
	public function wc_api_init( $api_server ) {
		if ( wc_pos_is_pos_referer() || is_pos() ) {
			include_once 'api/class-wc-pos-api.php';
			new WC_POS_API();
		}
	}

	/**
	 * Include required files for REST API request
	 *
	 * @since 3.0.0
	 */
	public function wc_api_loaded() {
		include_once 'api/class-wc-pos-api-orders.php';
		include_once 'api/class-wc-pos-rest-orders-refunds.php';
		include_once 'api/class-wc-pos-rest-products-controller.php';
		include_once 'api/class-wc-pos-rest-product-variations-controller.php';
		include_once 'api/class-wc-pos-rest-product-categories-controller.php';
		include_once 'api/class-wc-pos-rest-product-shipping-classes-controller.php';
		include_once 'api/class-wc-pos-rest-users-controller.php';
		include_once 'api/class-wc-pos-rest-data-countries-controller.php';
		include_once 'api/class-wc-pos-rest-customers-controller.php';
		include_once 'api/class-wc-pos-rest-options-controller.php';
		include_once 'api/class-wc-pos-rest-taxes-controller.php';
		include_once 'api/class-wc-pos-rest-coupons-controller.php';
		include_once 'api/class-wc-pos-rest-shipping-zones-controller.php';
		include_once 'api/class-wc-pos-rest-shipping-zone-locations-controller.php';
		include_once 'api/class-wc-pos-rest-shipping-zone-methods-controller.php';
		include_once 'api/class-wc-pos-rest-payment-gateways-controller.php';
	}

	/**
	 * Register available API resources
	 *
	 * @since 3.0.0
	 * @param WC_API_Server $server the REST server
	 */
	public function wc_api_classes() {
		$api_classes = array(
			'WC_API_POS_Orders',
			'WC_POS_REST_Orders_Refunds',
			'WC_POS_REST_Products_Controller',
			'WC_POS_REST_Product_Variations_Controller',
			'WC_POS_REST_Product_Categories_Controller',
			'WC_POS_REST_Product_Shipping_Classes_Controller',
			'WC_POS_REST_Users_Controller',
			'WC_POS_REST_Data_Countries_Controller',
			'WC_POS_REST_Customers_Controller',
			'WC_POS_REST_Options_Controller',
			'WC_POS_REST_Taxes_Controller',
			'WC_POS_REST_Coupons_Controller',
			'WC_POS_REST_Shipping_Zones_Controller',
			'WC_POS_REST_Shipping_Zone_Locations_Controller',
			'WC_POS_REST_Shipping_Zone_Methods_Controller',
			'WC_POS_REST_Payment_Gateways_Controller',
		);

		foreach ( $api_classes as $api_class ) {
			$this->$api_class = new $api_class();
			$this->$api_class->register_routes();
		}

	}

	public function available_payment_gateways( $available_gateways ) {
		if ( is_pos() ) {
			$available_gateways = array();
			$payment_gateways   = WC()->payment_gateways->payment_gateways;
			$enabled_gateways   = wc_pos_get_payment_gateways_ids( true );

			foreach ( $payment_gateways as $gateway ) {
				if ( in_array( $gateway->id, $enabled_gateways, true ) ) {
					$available_gateways[ $gateway->id ] = $gateway;
				}
			}
		}

		return $available_gateways;
	}

	public function woocommerce_stripe_settings( $value ) {
		if ( is_pos() ) {
			$value['saved_cards']     = 'no';
			$value['stripe_checkout'] = 'no';
		}
		return $value;
	}

	public function wc_pos_checkout_gateways() {
		if ( is_pos() ) {
			$enabled_gateways   = wc_pos_get_payment_gateways_ids( true );
			$pos_exist_gateways = wc_pos_get_payment_gateways_ids( false );

			foreach ( $pos_exist_gateways as $gateway_id ) {
				if ( ! in_array( $gateway_id, $enabled_gateways, true ) ) {
					add_filter( 'option_woocommerce_' . $gateway_id . '_settings', array( $this, 'disable_gateway' ) );
				} else {
					if ( 'pos_cash' === $gateway_id ) {
						add_filter( 'pre_option_woocommerce_' . $gateway_id . '_settings', array( $this, 'enable_gateway_cod' ) );
					} else {
						add_filter( 'option_woocommerce_' . $gateway_id . '_settings', array( $this, 'enable_gateway' ) );
					}
				}
			}
		}
	}

	public function disable_gateway( $val ) {
		$val['enabled'] = 'no';
		return $val;
	}

	public function enable_gateway( $val ) {

		$val['enabled'] = 'yes';
		if ( isset( $val['enable_for_virtual'] ) ) {
			$val['enable_for_virtual'] = 'yes';
		}

		if ( isset( $val['enable_for_methods'] ) ) {
			$val['enable_for_methods'] = array();
		}

		return $val;
	}

	public function enable_gateway_cod() {
		$val                       = array();
		$val['enabled']            = 'yes';
		$val['enable_for_virtual'] = 'yes';
		$val['enable_for_methods'] = array();

		return $val;
	}

	/**
	 * Returns register data.
	 *
	 * @param int|string $register Register ID or slug.
	 * @return array
	 */
	public function get_register( $register ) {
		global $wpdb;

		// Get register data.
		$register_object = wc_pos_get_register( $register );
		$register_data   = array();

		if ( $register_object ) {
			$register_data = array(
				'id'              => $register_object->get_id(),
				'name'            => $register_object->get_name(),
				'slug'            => $register_object->get_slug(),
				'date_opened'     => $register_object->get_date_opened() ? gmdate( 'Y-m-d H:i:s', $register_object->get_date_opened()->getTimestamp() ) : null,
				'date_closed'     => $register_object->get_date_closed() ? gmdate( 'Y-m-d H:i:s', $register_object->get_date_closed()->getTimestamp() ) : null,
				'open_first'      => $register_object->get_open_first(),
				'open_last'       => $register_object->get_open_last(),
				'current_session' => $register_object->get_current_session(),
				'grid'            => $register_object->get_grid(),
				'receipt'         => $register_object->get_receipt(),
				'grid_layout'     => $register_object->get_grid_layout(),
				'prefix'          => $register_object->get_prefix(),
				'suffix'          => $register_object->get_suffix(),
				'outlet'          => $register_object->get_outlet(),
				'customer'        => $register_object->get_customer(),
				'cash_management' => $register_object->get_cash_management(),
				'dining_option'   => $register_object->get_dining_option(),
				'default_mode'    => $register_object->get_default_mode(),
				'change_user'     => $register_object->get_change_user(),
				'email_receipt'   => $register_object->get_email_receipt(),
				'print_receipt'   => $register_object->get_print_receipt(),
				'gift_receipt'    => $register_object->get_gift_receipt(),
				'note_request'    => $register_object->get_note_request(),
				'order_id'        => $register_object->get_temp_order(),
			);

			// Create a temp_order for the register if not created yet.
			if ( ! $register_object->get_temp_order() ) {
				$register_data['order_id'] = wc_pos_create_temp_order( $register_object->get_id() );
			}

			// Set is_open field.
			if ( is_null( $register_object->get_date_opened() ) ) {
				$register_data['is_open'] = false;
			} elseif ( is_null( $register_object->get_date_closed() ) ) {
				$register_data['is_open'] = true;
			} else {
				$register_data['is_open'] = $register_object->get_date_opened()->getTimestamp() > $register_object->get_date_closed()->getTimestamp();
			}
		}

		// Session data.
		$register_data['session'] = array(
			'opening_note'       => '',
			'opening_cash_total' => 0,
			'orders_count'       => 0,
			'orders_total'       => 0,
			'refunds_total'      => 0,
			'gateways'           => array(
				'pos_cash'               => array(
					'orders_count'  => 0,
					'orders_total'  => 0,
					'refunds_total' => 0,
				),
				'pos_bacs'               => array(
					'orders_count'  => 0,
					'orders_total'  => 0,
					'refunds_total' => 0,
				),
				'pos_cheque'             => array(
					'orders_count'  => 0,
					'orders_total'  => 0,
					'refunds_total' => 0,
				),
				'pos_stripe_terminal'    => array(
					'orders_count'  => 0,
					'orders_total'  => 0,
					'refunds_total' => 0,
				),
				'pos_stripe_credit_card' => array(
					'orders_count'  => 0,
					'orders_total'  => 0,
					'refunds_total' => 0,
				),
				'pos_paymentsense'       => array(
					'orders_count'  => 0,
					'orders_total'  => 0,
					'refunds_total' => 0,
				),
			),
		);

		$chip_and_pin = empty( get_option( 'wc_pos_number_chip_and_pin_gateways', 1 ) ) ? 1 : get_option( 'wc_pos_number_chip_and_pin_gateways', 1 );

		for ( $n = 1; $n <= (int) $chip_and_pin; $n++ ) {
			$gateway_name = 1 === $n ? 'pos_chip_and_pin' : 'pos_chip_and_pin_' . $n;
			$register_data['session']['gateways'][ $gateway_name ] = array(
				'orders_count'  => 0,
				'orders_total'  => 0,
				'refunds_total' => 0,
			);
		}

		// Get session.
		$session = wc_pos_get_session( $register_data['current_session'] );
		if ( $register_data['current_session'] && is_a( $session, 'WC_POS_Session' ) ) {
			$register_data['session']['opening_note']       = $session->get_opening_note();
			$register_data['session']['opening_cash_total'] = $session->get_opening_cash_total();
		}

		// Skip if this is the first open.
		if ( ! is_null( $register_data['date_opened'] ) ) {
			$results = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT ID FROM {$wpdb->posts} p
					 INNER JOIN {$wpdb->postmeta} pm
					 ON ( pm.post_id = p.ID AND pm.meta_key = 'wc_pos_register_id' AND pm.meta_value = %d )
					 WHERE p.post_type = 'shop_order'
					 AND p.post_date_gmt >= %s
					",
					$register_object->get_id(),
					gmdate( 'Y-m-d H:i:s', $register_object->get_date_opened()->getTimestamp() )
				)
			);

			if ( $results ) {
				foreach ( $results as $result ) {
					$order   = wc_get_order( $result->ID );
					$refunds = $order->get_refunds();

					if ( array_key_exists( $order->get_payment_method(), $register_data['session']['gateways'] ) ) {
						$register_data['session']['gateways'][ $order->get_payment_method() ]['orders_count'] += 1;
						$register_data['session']['gateways'][ $order->get_payment_method() ]['orders_total'] += $order->get_total();

						// TODO: Bad practice. Total's should be counted from the gateways data.
						$register_data['session']['orders_count'] += 1;
						$register_data['session']['orders_total'] += $order->get_total();

						foreach ( $refunds as $refund ) {
							$register_data['session']['gateways'][ $order->get_payment_method() ]['refnds_count']  += 1;
							$register_data['session']['gateways'][ $order->get_payment_method() ]['refunds_total'] += abs( $refund->get_total() );
							$register_data['session']['refunds_total'] += abs( $refund->get_total() );
						}
					}
				}
			}
		}

		$this->data = $register_data;
		$this->id   = $register_data['id'];

		return apply_filters( 'wc_pos_register_data', $register_data );
	}

	/**
	 * Returns outlet data.
	 *
	 * @param int|string $outlet Outlet ID or slug.
	 * @return array
	 */
	public function get_outlet( $outlet ) {
		// Get outlet data.
		$outlet_object = wc_pos_get_outlet( $outlet );
		$outlet_data   = array();

		if ( $outlet_object ) {
			$outlet_data = array(
				'id'                => $outlet_object->get_id(),
				'name'              => $outlet_object->get_name(),
				'address_1'         => $outlet_object->get_address_1(),
				'address_2'         => $outlet_object->get_address_2(),
				'city'              => $outlet_object->get_city(),
				'postcode'          => $outlet_object->get_postcode(),
				'country'           => $outlet_object->get_country(),
				'state'             => $outlet_object->get_state(),
				'email'             => $outlet_object->get_email(),
				'phone'             => $outlet_object->get_phone(),
				'fax'               => $outlet_object->get_fax(),
				'website'           => $outlet_object->get_website(),
				'wifi_network'      => $outlet_object->get_wifi_network(),
				'wifi_password'     => $outlet_object->get_wifi_password(),
				'social_accounts'   => $outlet_object->get_social_accounts(),
				'formatted_address' => explode(
					'<br/>',
					WC()->countries->get_formatted_address(
						array(
							'address_1' => $outlet_object->get_address_1(),
							'address_2' => $outlet_object->get_address_2(),
							'city'      => $outlet_object->get_city(),
							'state'     => empty( $outlet_object->get_state() ) ? $outlet_object->get_state() : '',
							'postcode'  => $outlet_object->get_postcode(),
							'country'   => $outlet_object->get_country(),
						)
					)
				),
			);
		}

		return $outlet_data;
	}

	public function get_receipt( $receipt ) {
		$receipt_object = wc_pos_get_receipt( $receipt );
		$receipt_data   = array();

		if ( $receipt_object ) {
			$receipt_data = $receipt_object->get_data();
		}

		return apply_filters( 'wc_pos_receipt_params', $receipt_data );
	}

	public static function get_js_params() {
		$pos_icon = wp_get_attachment_image_src( get_option( 'wc_pos_theme_logo' ), 0 );
		$pos_icon = $pos_icon ? $pos_icon[0] : WC_POS()->plugin_url() . '/assets/dist/images/woo.png';

		$fetch_order_statuses = get_option( 'wc_pos_fetch_order_statuses', array( 'pending' ) );
		$fetch_order_statuses = empty( $fetch_order_statuses ) ? array( 'pending' ) : $fetch_order_statuses;
		$fetch_order_statuses = implode( ',', $fetch_order_statuses );

		$custom_order_fields = wc_pos_get_custom_order_fields();
		$a_billing_fields    = array();
		$a_shipping_fields   = array();

		$wc_fields_additional = get_option( 'wc_fields_billing' );

		if ( $wc_fields_additional ) {
			foreach ( $wc_fields_additional as $id => $opt ) {
				if ( true === $opt['custom'] ) {
					$a_billing_fields[] = $id;
				}
			}
		}

		$wc_fields_additional = get_option( 'wc_fields_shipping' );

		if ( $wc_fields_additional ) {
			foreach ( $wc_fields_additional as $id => $opt ) {
				if ( true === $opt['custom'] ) {
					$a_shipping_fields[] = $id;
				}
			}
		}

		$customer_required_fields = array_merge(
			get_option(
				'wc_pos_customer_create_required_fields',
				array(
					'billing_address_1',
					'billing_city',
					'billing_state',
					'billing_postcode',
					'billing_country',
					'billing_phone',
				)
			),
			array(
				'billing_first_name',
				'billing_last_name',
				'billing_email',
			)
		);

		$hidden_order_itemmeta = apply_filters(
			'woocommerce_hidden_order_itemmeta',
			array(
				'_qty',
				'_tax_class',
				'_product_id',
				'_variation_id',
				'_line_subtotal',
				'_line_subtotal_tax',
				'_line_total',
				'_line_tax',
				'method_id',
				'cost',
				'_reduced_stock',
				// WooCommerce Cost of Goods by SkyVerge.
				'_wc_cog_item_cost',
				'_wc_cog_item_total_cost',
				// Cost of Goods for WooCommerce by The Rite Sites.
				'_cog_wc_order_item_cost',
				'_cog_wc_order_item_cost_total',
			)
		);

		$params = apply_filters(
			'wc_pos_params',
			array(
				'date_format'                    => get_option( 'date_format' ),
				'pos_icon'                       => $pos_icon,
				'avatar'                         => function_exists( 'get_avatar_url' ) ? get_avatar_url( 0, array( 'size' => 64 ) ) : '',
				'ajax_url'                       => admin_url( 'admin-ajax.php' ),
				'edit_link'                      => get_admin_url( get_current_blog_id(), '/post.php?post={{post_id}}&action=edit' ),
				'admin_url'                      => admin_url(),
				'site_url'                       => home_url(),
				'ajax_loader_url'                => apply_filters( 'woocommerce_ajax_loader_url', WC()->plugin_url() . '/assets/images/ajax-loader@2x.gif' ),
				'def_img'                        => wc_placeholder_img_src(),
				'offline_url'                    => WC_POS()->plugin_url() . '/assets/vendor/offline/blank.png',
				'enable_user_card'               => 'yes' === get_option( 'wc_pos_enable_user_card', 'no' ),
				'tabs_count'                     => get_option( 'wc_pos_tabs_count', 1 ),
				'default_country'                => get_option( 'wc_pos_default_country' ),
				'currency'                       => get_woocommerce_currency(),
				'currency_format_symbol'         => html_entity_decode( get_woocommerce_currency_symbol() ),
				'guest_checkout'                 => 'yes' === get_option( 'wc_pos_guest_checkout', 'yes' ),
				'enable_currency_rounding'       => 'yes' === get_option( 'wc_pos_enable_currency_rounding', 'no' ),
				'currency_rounding_value'        => get_option( 'wc_pos_currency_rounding_value' ),
				'spinner'                        => WC_POS()->plugin_url() . '/assets/dist/images/spinner.gif',
				'currency_format'                => esc_attr( str_replace( array( '%1$s', '%2$s' ), array( '%s', '%v' ), get_woocommerce_price_format() ) ), // For accounting JS
				'fulfilled_order_status'         => get_option( 'wc_pos_fulfilled_order_status', 'processing' ),
				'parked_order_status'            => get_option( 'wc_pos_parked_order_status', 'pending' ),
				'fetch_order_statuses'           => $fetch_order_statuses,
				'wc_api_url'                     => WC_POS()->wc_api_url(),
				'wc_pos_api_url'                 => WC_POS()->wc_pos_api_url(),
				'discount_presets'               => (array) get_option( 'wc_pos_discount_presets', array( '5', '10', '15', '20' ) ),
				'signature_panel'                => 'yes' === get_option( 'wc_pos_signature', 'no' ),
				'signature_required'             => 'yes' === get_option( 'wc_pos_signature_required', 'no' ),
				'signature_required_on'          => get_option( 'wc_pos_signature_required_on', array( 'pay' ) ),
				'custom_order_fields'            => $custom_order_fields,
				'a_billing_fields'               => $a_billing_fields,
				'a_shipping_fields'              => $a_shipping_fields,
				'rest_nonce'                     => wp_create_nonce( 'wp_rest' ),
				'auto_logout_session'            => (int) get_option( 'wc_pos_auto_logout', 0 ),
				'disable_transitions_effects'    => 'yes' === get_option( 'wc_pos_disable_transitions_effects', 'no' ),
				'enable_dining'                  => 'yes' === get_option( 'wc_pos_enable_dining', 'no' ),
				'version'                        => WC_POS_VERSION,
				'cash_denominations'             => (array) get_option( 'wc_pos_cash_denominations', array() ),
				'show_out_of_stock'              => 'yes' === get_option( 'wc_pos_show_out_of_stock_products', 'no' ),
				'enable_pos_visibility'          => 'yes' === get_option( 'wc_pos_visibility', 'no' ),
				'show_product_preview'           => 'yes' === get_option( 'wc_pos_show_product_preview', 'no' ),
				'keyboard_shortcuts'             => get_option( 'wc_pos_keyboard_shortcuts', 'no' ),
				'customer_required_fields'       => $customer_required_fields,
				'hide_optional_fields'           => get_option( 'wc_pos_hide_not_required_fields', 'no' ),
				'save_customer_default'          => 'yes' === get_option( 'wc_pos_save_customer_default', 'no' ),
				'payment_gateways'               => wc_pos_get_available_payment_gateways(),
				'cash_management_nonce'          => wp_create_nonce( 'cash-management' ),
				'logout_nonce'                   => wp_create_nonce( 'logout' ),
				'generate_order_id_nonce'        => wp_create_nonce( 'generate-order-id' ),
				'auth_user_nonce'                => wp_create_nonce( 'auth-user' ),
				'receipt_print_url_nonce'        => wp_create_nonce( 'receipt-print-url' ),
				'check_db_changes_nonce'         => wp_create_nonce( 'check-db-changes' ),
				'update_option_nonce'            => wp_create_nonce( 'update-option' ),
				'locale'                         => get_locale(),
				'gmt_offset'                     => get_option( 'gmt_offset' ),
				'thousand_separator'             => wc_get_price_thousand_separator(),
				'decimal_separator'              => wc_get_price_decimal_separator(),
				'after_add_to_cart_behavior'     => get_option( 'wc_pos_after_add_to_cart_behavior', 'home' ),
				'tax_number'                     => get_option( 'wc_pos_tax_number' ),
				'hidden_order_itemmeta'          => $hidden_order_itemmeta,
				'hide_tender_suggestions'        => 'yes' === get_option( 'wc_pos_hide_tender_suggestions', 'no' ),
				'theme_show_icon'                => 'yes' === get_option( 'wc_pos_show_theme_icon', 'yes' ),
				'theme_primary_color'            => empty( get_option( 'wc_pos_theme_primary_color' ) ) ? '#7f54b3' : get_option( 'wc_pos_theme_primary_color', '#7f54b3' ),
				'refresh_data_on_load'           => 'yes' === get_option( 'wc_pos_refresh_on_load', 'yes' ),
				'force_refresh_db'               => 'yes' === get_option( 'wc_pos_force_refresh_db', 'no' ),
				'search_includes'                => (array) get_option( 'wc_pos_search_includes', array( 'title', 'sku' ) ),
				'scanning_fields'                => (array) get_option( 'wc_pos_scanning_fields', array( '_sku' ) ),
				'custom_product_required_fields' => (array) get_option( 'wc_pos_custom_product_required_fields', array() ),
				'publish_product_default'        => 'yes' === get_option( 'wc_pos_publish_product_default', 'yes' ),
			)
		);

		return json_encode( $params );
	}

	public static function get_js_wc_params() {
		$precision = function_exists( 'wc_get_rounding_precision' ) ? wc_get_rounding_precision() : ( defined( 'WC_ROUNDING_PRECISION' ) ? WC_ROUNDING_PRECISION : 4 );

		$params = apply_filters(
			'wc_pos_wc_params',
			array(
				'tax_display_shop'               => get_option( 'woocommerce_tax_display_shop' ),
				'calc_taxes'                     => get_option( 'woocommerce_calc_taxes' ),
				'prices_include_tax'             => wc_prices_include_tax(),
				'tax_round_at_subtotal'          => get_option( 'woocommerce_tax_round_at_subtotal' ),
				'tax_display_cart'               => get_option( 'woocommerce_tax_display_cart' ),
				'calc_discounts_seq'             => get_option( 'woocommerce_calc_discounts_sequentially', 'no' ),
				'precision'                      => $precision,
				'all_rates'                      => wc_pos_get_all_tax_rates(),
				'shop_location'                  => wc_pos_get_shop_location(),
				'tax_enabled'                    => wc_tax_enabled(),
				'european_union_countries'       => WC()->countries->get_european_union_countries(),
				'base_country'                   => WC()->countries->get_base_country(),
				'base_state'                     => WC()->countries->get_base_state(),
				'base_postcode'                  => WC()->countries->get_base_postcode(),
				'base_city'                      => WC()->countries->get_base_city(),
				'registration_generate_username' => get_option( 'woocommerce_registration_generate_username', 'yes' ),
				'registration_generate_password' => get_option( 'woocommerce_registration_generate_password', 'yes' ),
				'shipping_enabled'               => get_option( 'woocommerce_ship_to_countries', '' ),
				'shipping_rates'                 => array(),
				'shop_name'                      => get_bloginfo( 'name' ),
			)
		);

		return json_encode( $params );
	}

	public static function get_js_cart_params() {
		$tax_classes = array();
		foreach ( WC_Tax::get_tax_classes() as $class ) {
			$tax_classes[ sanitize_title( $class ) ] = $class;
		}

		$tax_display_cart = get_option( 'woocommerce_tax_display_cart' );
		$params           = apply_filters(
			'wc_pos_cart_params',
			array(
				'prices_include_tax'    => wc_prices_include_tax(),
				'calc_shipping'         => 'yes' === get_option( 'woocommerce_calc_shipping' ),
				'tax_round_at_subtotal' => 'yes' === get_option( 'woocommerce_tax_round_at_subtotal' ),
				'tax_total_display'     => get_option( 'woocommerce_tax_total_display' ),
				'tax_display_cart'      => $tax_display_cart,
				'dp'                    => wc_get_price_decimals(),
				'display_totals_ex_tax' => 'excl' === $tax_display_cart,
				'display_cart_ex_tax'   => 'excl' === $tax_display_cart,
				'enable_coupons'        => apply_filters( 'woocommerce_coupons_enabled', 'yes' === get_option( 'woocommerce_enable_coupons' ) ),
				'tax_or_vat'            => WC()->countries->tax_or_vat(),
				'ex_tax_or_vat'         => WC()->countries->ex_tax_or_vat(),
				'inc_tax_or_vat'        => WC()->countries->inc_tax_or_vat(),
				'shipping_tax_class'    => get_option( 'woocommerce_shipping_tax_class' ),
				'tax_classes'           => $tax_classes,
				'coupons_labels'        => self::get_coupons_labels(),
				'tax_round_half_up'     => self::tax_round_half_up(),
			)
		);
		return json_encode( $params );
	}

	public static function get_pos_options() {
		$request  = new WP_REST_Request( 'GET', '/wc-pos/options' );
		$response = rest_do_request( $request );
		$server   = rest_get_server();
		$options  = $server->response_to_data( $response, false );

		return $options;
	}

	/**
	 * Check if WC will round the tax total half up/down.
	 *
	 * @todo This is replicated in WC_POS_REST_Options_Controller. Make sure it's no longer used and
	 * then remove it.
	 *
	 * @return bool
	 */
	public static function tax_round_half_up() {
		return 1.15 === wc_round_tax_total( 1.145, 2 ) ? true : false;
	}

	public function get_custom_product_params() {
		$product_id = (int) get_option( 'wc_pos_custom_product_id', 0 );
		$product    = wc_get_product( $product_id );

		if ( ! is_a( $product, 'WC_Product' ) ) {
			return json_encode( (object) array() );
		}

		$prices_precision = wc_get_price_decimals();
		$product_data     = array(
			'name'               => $product->get_title(),
			'id'                 => (int) $product->is_type( 'variation' ) ? $product->get_id() : $product->get_id(),
			'created_at'         => '',
			'updated_at'         => '',
			'type'               => $product->get_type(),
			'status'             => $product->get_status(),
			'downloadable'       => $product->is_downloadable(),
			'virtual'            => $product->is_virtual(),
			'permalink'          => $product->get_permalink(),
			'sku'                => $product->get_sku(),
			'price'              => wc_format_decimal( $product->get_price(), $prices_precision ),
			'regular_price'      => wc_format_decimal( $product->get_regular_price(), $prices_precision ),
			'sale_price'         => $product->get_sale_price() ? wc_format_decimal( $product->get_sale_price(), $prices_precision ) : null,
			'taxable'            => $product->is_taxable(),
			'tax_status'         => $product->get_tax_status(),
			'tax_class'          => $product->get_tax_class(),
			'manage_stock'       => $product->managing_stock(),
			'stock_quantity'     => $product->get_stock_quantity(),
			'in_stock'           => $product->is_in_stock(),
			'backorders_allowed' => $product->backorders_allowed(),
			'backordered'        => $product->is_on_backorder(),
			'sold_individually'  => $product->is_sold_individually(),
			'purchaseable'       => $product->is_purchasable(),
			'featured'           => $product->is_featured(),
			'visible'            => $product->is_visible(),
			'catalog_visibility' => $product->get_catalog_visibility(),
			'on_sale'            => $product->is_on_sale(),
			'product_url'        => $product->is_type( 'external' ) ? $product->get_product_url() : '',
			'button_text'        => $product->is_type( 'external' ) ? $product->get_button_text() : '',
			'weight'             => $product->get_weight() ? wc_format_decimal( $product->get_weight(), 2 ) : null,
			'dimensions'         => array(
				'length' => $product->get_length(),
				'width'  => $product->get_width(),
				'height' => $product->get_height(),
				'unit'   => get_option( 'woocommerce_dimension_unit' ),
			),
			'shipping_required'  => $product->needs_shipping(),
			'shipping_taxable'   => $product->is_shipping_taxable(),
			'shipping_class'     => $product->get_shipping_class(),
			'shipping_class_id'  => ( 0 !== $product->get_shipping_class_id() ) ? $product->get_shipping_class_id() : null,
			'description'        => wpautop( do_shortcode( get_post( $product->get_id() )->post_content ) ),
			'short_description'  => apply_filters( 'woocommerce_short_description', get_post( $product->get_id() )->post_excerpt ),
			'reviews_allowed'    => ( 'open' === get_post( $product->get_id() )->comment_status ),
			'average_rating'     => wc_format_decimal( $product->get_average_rating(), 2 ),
			'rating_count'       => (int) $product->get_rating_count(),
			'related_ids'        => array_map( 'absint', array_values( wc_get_related_products( $product->get_id() ) ) ),
			'upsell_ids'         => array_map( 'absint', $product->get_upsell_ids() ),
			'cross_sell_ids'     => array_map( 'absint', $product->get_cross_sell_ids() ),
			'parent_id'          => get_post( $product->get_id() )->post_parent,
			'categories'         => wp_get_post_terms( $product->get_id(), 'product_cat', array( 'fields' => 'names' ) ),
			'tags'               => wp_get_post_terms( $product->get_id(), 'product_tag', array( 'fields' => 'names' ) ),
			'featured_src'       => wp_get_attachment_url( get_post_thumbnail_id( $product->is_type( 'variation' ) ? $product->variation_id : $product->get_id() ) ),
			'attributes'         => array(),
			'downloads'          => array(),
			'download_limit'     => (int) $product->get_download_limit(),
			'download_expiry'    => (int) $product->get_download_expiry(),
			'download_type'      => $product->is_downloadable(),
			'purchase_note'      => wpautop( do_shortcode( wp_kses_post( $product->get_purchase_note() ) ) ),
			'total_sales'        => metadata_exists( 'post', $product->get_id(), 'total_sales' ) ? (int) get_post_meta( $product->get_id(), 'total_sales', true ) : 0,
			'variations'         => array(),
			'parent'             => array(),
			'images'             => array(),
		);

		return json_encode( $product_data );
	}

	public static function get_coupons_labels() {
		$c = array( 'WC_POINTS_REDEMPTION' );
		$l = array();
		foreach ( $c as $code ) {
			$l[ $code ] = $code;
		}

		return $l;
	}

	/**
	 * Returns grid data.
	 *
	 * @return array|null
	 */
	public function get_grid() {
		$register_data = $this->data;
		$grid_id       = $register_data['grid'];
		$grid          = wc_pos_get_grid( $grid_id );

		/*
		 * Get product categories.
		 */
		$categories = array();
		$terms      = get_terms(
			'product_cat',
			array(
				'orderby' => 'name',
				'order'   => 'ASC',
				'fields'  => 'all',
			)
		);
		if ( $terms ) {
			foreach ( $terms as $term ) {
				$thumbnail_id = absint( get_term_meta( $term->term_id, 'thumbnail_id', true ) );

				if ( $thumbnail_id ) {
					$image = wc_pos_grid_thumbnail( $thumbnail_id, array( 250, 250 ) );
				} else {
					$image = wc_placeholder_img_src();
				}

				if ( ! $image || null === $image ) {
					$image = wc_placeholder_img_src();
				}

				$term->image        = $image;
				$term->display_type = get_term_meta( $term->term_id, 'display_type', true );
				$term->description  = wp_slash( $term->description );

				$categories[ '_' . $term->term_id ] = $term;
			}
		}

		$tiles             = $grid_id && $grid ? $grid->get_tiles() : array();
		$product_tiles     = array();
		$product_cat_tiles = array();

		foreach ( $tiles as $tile_id => $tile ) {
			if ( 'product' === $tile['type'] ) {
				$product_tiles[] = (int) $tile['item_id'];
			} elseif ( 'product_cat' === $tile['type'] ) {
				$product_cat_tiles[] = (int) $tile['item_id'];
			}
		}

		$grid_data = array(
			'product_tiles'     => $product_tiles,
			'product_cat_tiles' => $product_cat_tiles,
			'grid_name'         => $grid_id && $grid ? $grid->get_name() : '',
			'grid_id'           => $grid_id,
			'categories'        => $categories, // TODO: what the heck is this?
			'tile_sorting'      => get_option( 'wc_pos_default_tile_orderby', 'menu_order' ),
		);

		return json_encode( $grid_data );
	}

	/**
	 * Main WC_POS_Sell Instance.
	 *
	 * Ensures only one instance of WC_POS_Sell is loaded or can be loaded.
	 *
	 * @return WC_POS_Sell Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function payment_complete_reduce_order_stock( $trigger_reduce, $order_id ) {
		$order = wc_get_order( $order_id );

		if ( ! $order || 'POS' !== $order->get_created_via() ) {
			return $trigger_reduce;
		}

		if ( $order->is_paid() ) {
			return true;
		}

		return false;
	}
}

return new WC_POS_Sell();
