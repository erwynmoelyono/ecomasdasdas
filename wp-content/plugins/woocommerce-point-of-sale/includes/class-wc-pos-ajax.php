<?php
/**
 * AJAX Event Handlers
 *
 * @package WooCommerce_Point_Of_Sale/Classes
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_AJAX.
 */
class WC_POS_AJAX {

	/**
	 * Hook in AJAX handlers.
	 */
	public static function init() {
		self::add_ajax_events();
	}

	/**
	 * Hook in methods.
	 */
	public static function add_ajax_events() {
		$ajax_events_nopriv = array(
			'set_register_cash_management_data',
			'generate_order_id',
			'auth_user',
			'check_db_changes',
		);

		foreach ( $ajax_events_nopriv as $ajax_event ) {
			add_action( 'wp_ajax_wc_pos_' . $ajax_event, array( __CLASS__, $ajax_event ) );
			add_action( 'wp_ajax_nopriv_wc_pos_' . $ajax_event, array( __CLASS__, $ajax_event ) );
		}

		$ajax_events = array(
			'json_search_registers',
			'json_search_outlet',
			'json_search_cashier',
			'filter_product_barcode',
			'change_stock',
			'add_product_for_barcode',
			'get_product_variations_for_barcode',
			'json_search_categories',
			'get_products_by_categories',
			'check_user_card_uniqueness',
			'get_user_by_card_number',
			'logout',
			'load_grid_tiles',
			'add_grid_tile',
			'delete_grid_tile',
			'delete_all_grid_tiles',
			'reorder_grid_tile',
			'update_receipt',
			'date_i18n',
			'paymentsense_eod_report',
			'receipt_print_url',
			'update_option',
		);

		foreach ( $ajax_events as $ajax_event ) {
			add_action( 'wp_ajax_wc_pos_' . $ajax_event, array( __CLASS__, $ajax_event ) );
		}
	}

	/**
	 * Search for registers and echo json.
	 */
	public static function json_search_registers() {
		ob_start();

		check_ajax_referer( 'search-products', 'security' );

		$search = isset( $_GET['term'] ) ? wc_clean( wp_unslash( $_GET['term'] ) ) : '';

		if ( empty( $search ) ) {
			die();
		}

		global $wpdb;

		$registers = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM $wpdb->posts WHERE post_type = 'pos_register' AND name LIKE %s OR slug LIKE %s",
				'%' . $wpdb->esc_like( $search ) . '%'
			)
		);

		$found = array();

		if ( $registers ) {
			foreach ( $registers as $register ) {
				$found[ $register->ID ] = rawurldecode( $register->post_title );
			}
		}

		$found = apply_filters( 'wc_pos_json_search_registers', $found );

		wp_send_json( $found );
	}

	/**
	 * Search for outlet and echo json.
	 */
	public static function json_search_outlet() {
		ob_start();

		check_ajax_referer( 'search-products', 'security' );

		$search = isset( $_GET['term'] ) ? wc_clean( wp_unslash( $_GET['term'] ) ) : '';

		if ( empty( $search ) ) {
			die();
		}

		global $wpdb;

		$outlets = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM $wpdb->posts WHERE post_type = 'pos_outlet' AND name LIKE %s",
				'%' . $wpdb->esc_like( $search ) . '%'
			)
		);

		$found = array();

		if ( $outlets ) {
			foreach ( $outlets as $outlet ) {
				$found[ $outlet->ID ] = rawurldecode( $outlet->name );
			}
		}

		$found = apply_filters( 'wc_pos_json_search_outlet', $found );

		wp_send_json( $found );
	}

	/**
	 * Search for outlet and echo json.
	 */
	public static function json_search_cashier() {
		// ob_start();

		check_ajax_referer( 'search-products', 'security' );

		$search = isset( $_GET['term'] ) ? wc_clean( wp_unslash( $_GET['term'] ) ) : '';

		if ( empty( $search ) ) {
			die();
		}

		$found      = array();
		$user_query = WC_POS()->user()->get_data();

		if ( $user_query ) {
			foreach ( $user_query as $user ) {
				$search   = strtolower( $search );
				$name     = strtolower( $user['name'] );
				$username = strtolower( $user['username'] );

				if ( false !== strpos( $name, $search ) || false !== strpos( $username, $search ) ) {
					$found[ $user['ID'] ] = $user['name'] . ' (' . $user['username'] . ')';
				}
			}
		}

		$found = apply_filters( 'wc_pos_json_search_cashier', $found );

		wp_send_json( $found );
	}

	public static function filter_product_barcode() {
		check_ajax_referer( 'filter-product', 'security' );

		global $wpdb;
		$barcode    = isset( $_POST['barcode'] ) ? wc_clean( wp_unslash( $_POST['barcode'] ) ) : '';
		$product_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_sku' AND meta_value = %s LIMIT 1", $barcode ) );

		$result = array();
		if ( $product_id ) {

			$result['status']   = 'success';
			$result['response'] = self::get_sku_controller_product( $product_id );

		} else {
			$result['response'] = '<h2>No product found</h2>';
			$result['status']   = '404';
		}

		wp_send_json( $result );
	}

	public static function change_stock() {
		check_ajax_referer( 'change-stock', 'security' );

		global $wpdb;

		$product_id = isset( $_POST['id'] ) ? absint( $_POST['id'] ) : 0;
		$operation  = isset( $_POST['operation'] ) ? wc_clean( wp_unslash( $_POST['operation'] ) ) : '';
		$value      = isset( $_POST['value'] ) ? intval( $_POST['value'] ) : 0;
		$note       = __( 'Product ', 'woocommerce-point-of-sale' );

		$result = array();
		if ( $product_id ) {
			$product               = wc_get_product( $product_id );
			$product->manage_stock = 'yes';
			$stock                 = $product->get_stock_quantity();

			if ( 'increase' === $operation ) {
				$stock += $value;
				$note  .= '<strong>' . esc_html( $product->get_name() ) . '</strong>' . esc_html__( ' stock increased by ', 'woocommerce-point-of-sale' ) . esc_html( $value );
			} elseif ( 'replace' === $operation ) {
				$stock = $value;
				$note .= '<strong>' . esc_html( $product->get_name() ) . '</strong>' . esc_html__( ' stock replaced by ', 'woocommerce-point-of-sale' ) . esc_html( $value );
			} else {
				$stock -= $value;
				$note  .= esc_html( $product->get_name() . __( ' stock reduced by ', 'woocommerce-point-of-sale' ) . $value );
			}

			wc_update_product_stock( $product, $stock );

			$post_modified     = current_time( 'mysql' );
			$post_modified_gmt = current_time( 'mysql', 1 );

			wp_update_post(
				array(
					'ID'                => $product_id,
					'post_modified'     => $post_modified,
					'post_modified_gmt' => $post_modified_gmt,
				)
			);

			if ( 'variation' === $product->get_type() && $product->get_parent_id() && $product->get_parent_id() > 0 ) {
				wp_update_post(
					array(
						'ID'                => $product->parent->id,
						'post_modified'     => $post_modified,
						'post_modified_gmt' => $post_modified_gmt,
					)
				);
			}

			$order_id = isset( $_POST['order_id'] ) ? wc_clean( wp_unslash( $_POST['order_id'] ) ) : '';
			$order    = wc_get_order( $order_id );

			if ( $order ) {
				$order->add_order_note( $note );
			}

			$result['status']   = 'success';
			$result['response'] = self::get_sku_controller_product( $product_id );

		} else {
			$result['status'] = '404';
		}

		wp_send_json( $result );
	}

	public static function get_sku_controller_product( $product_id = 0 ) {
		$product_data = array();
		if ( $product_id ) {
			$post = get_post( $product_id );
			if ( 'product' === $post->post_type ) {
				$product                      = new WC_Product( $product_id );
				$product_data['id']           = $product_id;
				$product_data['name']         = $product->get_title();
				$product_data['sku']          = $product->get_sku();
				$product_data['image']        = $product->get_image( array( 85, 85 ) );
				$product_data['price']        = $product->get_price_html();
				$product_data['stock']        = wc_stock_amount( $product->get_stock_quantity() );
				$product_data['stock_status'] = '';
				if ( $product->is_in_stock() ) {
					$product_data['stock_status'] = '<mark class="instock">' . __( 'In stock', 'woocommerce-point-of-sale' ) . '</mark>';
				} else {
					$product_data['stock_status'] = '<mark class="outofstock">' . __( 'Out of stock', 'woocommerce-point-of-sale' ) . '</mark>';
				}
				$product_data['stock_status'] .= ' &times; ' . wc_stock_amount( $product->get_stock_quantity() );
			} elseif ( 'product_variation' === $post->post_type ) {
				$product                      = new WC_Product_Variation( $product_id );
				$product_data['id']           = $product_id;
				$product_data['name']         = $post->post_title;
				$product_data['sku']          = $product->get_name();
				$product_data['image']        = $product->get_image( array( 85, 85 ) );
				$product_data['price']        = $product->get_price_html();
				$product_data['stock']        = $product->get_stock_quantity();
				$product_data['stock_status'] = '';
				if ( $product_data['stock'] ) {
					$product_data['stock_status'] = '<mark class="instock">' . __( 'In stock', 'woocommerce-point-of-sale' ) . '</mark>';
				} else {
					$product_data['stock_status'] = '<mark class="outofstock">' . __( 'Out of stock', 'woocommerce-point-of-sale' ) . '</mark>';
				}
				$product_data['stock_status'] .= ' &times; ' . wc_stock_amount( $product_data['stock'], 2 );
			}
		}
		return $product_data;
	}

	public static function add_product_for_barcode() {
		check_ajax_referer( 'product_for_barcode', 'security' );

		if ( ! current_user_can( 'manage_woocommerce_point_of_sale' ) ) {
			die( -1 );
		}

		$item_to_add = isset( $_POST['item_to_add'] ) ? sanitize_text_field( $_POST['item_to_add'] ) : '';

		// Find the item
		if ( ! is_numeric( $item_to_add ) ) {
			die();
		}

		$post = get_post( $item_to_add );

		if ( ! $post || ( 'product' !== $post->post_type && 'product_variation' !== $post->post_type ) ) {
			die();
		}

		$_product = wc_get_product( $post->ID );
		$class    = 'new_row ' . $_product->get_type();

		include 'views/html-admin-barcode-item.php';

		die();
	}

	public static function get_product_variations_for_barcode() {
		check_ajax_referer( 'product_for_barcode', 'security' );

		if ( ! current_user_can( 'manage_woocommerce_point_of_sale' ) ) {
			die( -1 );
		}

		$prid = isset( $_POST['prid'] ) ? array_map( 'absint', wp_unslash( $_POST['prid'] ) ) : array();

		// Find the item.
		if ( ! is_array( $prid ) ) {
			die();
		}

		$variations = array();

		foreach ( $prid as $id ) {
			$args           = array(
				'post_parent' => $id,
				'post_type'   => 'product_variation',
				'numberposts' => -1,
				'fields'      => 'ids',
			);
			$children_array = get_children( $args, ARRAY_A );
			if ( $children_array ) {

				$variations = array_merge( $variations, $children_array );
			}
		}

		wp_send_json( $variations );

		die();
	}

	public static function json_search_categories() {
		global $wpdb;

		ob_start();

		check_ajax_referer( 'search-products', 'security' );

		$search = isset( $_GET['term'] ) ? wc_clean( wp_unslash( $_GET['term'] ) ) : '';

		if ( empty( $search ) ) {
			die();
		}

		$categories = array_unique(
			$wpdb->get_col(
				$wpdb->prepare(
					"
					SELECT terms.term_id FROM {$wpdb->terms} terms
					LEFT JOIN {$wpdb->term_taxonomy} taxonomy ON terms.term_id = taxonomy.term_id
					WHERE taxonomy.taxonomy = 'product_cat'
					AND terms.name LIKE %s
					",
					'%' . $wpdb->esc_like( $search ) . '%'
				)
			)
		);

		$found_categories = array();

		if ( ! empty( $categories ) ) {
			foreach ( $categories as $term_id ) {
				$category = get_term( $term_id );

				if ( is_wp_error( $category ) || ! $category ) {
					continue;
				}

				$found_categories[ $term_id ] = rawurldecode( $category->name );
			}
		}

		$found_categories = apply_filters( 'wc_pos_json_search_categories', $found_categories );

		wp_send_json( $found_categories );
	}

	public static function get_products_by_categories() {
		check_ajax_referer( 'product_for_barcode', 'security' );

		if ( ! current_user_can( 'manage_woocommerce_point_of_sale' ) || ! isset( $_POST['categories'] ) ) {
			die( -1 );
		}

		$cats = isset( $_POST['categories'] ) ? wc_clean( wp_unslash( $_POST['categories'] ) ) : '';

		// Find the item
		if ( ! is_array( $cats ) ) {
			die();
		}

		$args     = array(
			'post_type'   => 'product',
			'numberposts' => -1,
			'fields'      => 'ids',
			'tax_query'   => array(
				array(
					'terms'    => $cats,
					'taxonomy' => 'product_cat',
				),
			),
		);
		$products = array();
		$posts    = get_posts( $args, ARRAY_A );

		if ( $posts ) {
			$products = $posts;
		}

		wp_send_json( $products );
	}

	/**
	 * Set cash management data via Ajax.
	 */
	public static function set_register_cash_management_data() {
		check_ajax_referer( 'cash-management', 'security' );

		$register_id = isset( $_POST['register_id'] ) ? absint( $_POST['register_id'] ) : 0;
		$register    = wc_pos_get_register( $register_id );

		if ( ! $register ) {
			wp_send_json_error( array( 'error' => __( 'Invalid register ID', 'woocommerce-point-of-sale' ) ) );
		}

		$session = wc_pos_get_session( $register->get_current_session() );

		if ( ! $session ) {
			wp_send_json_error( array( 'error' => __( 'Could not get session', 'woocommerce-point-of-sale' ) ) );
		}

		$data = array(
			'opening_cash_total' => isset( $_POST['amount'] ) ? floatval( $_POST['amount'] ) : 0.0,
			'opening_note'       => isset( $_POST['note'] ) ? wc_clean( wp_unslash( $_POST['note'] ) ) : '',
		);

		$session->set_props( $data );

		if ( ! $session->save() ) {
			wp_send_json_error( array( 'error' => __( 'Could not update session', 'woocommerce-point-of-sale' ) ) );
		}

		wp_send_json_success( $data );
	}

	public static function check_user_card_uniqueness() {
		check_ajax_referer( 'check-user-card-uniqueness', 'security' );

		$code = isset( $_POST['code'] ) ? wc_clean( wp_unslash( ( $_POST['code'] ) ) ) : '';

		$users = get_users(
			array(
				'meta_key'   => 'wc_pos_user_card_number',
				'meta_value' => $code,
			)
		);

		if ( 0 === count( $users ) ) {
			wp_send_json_success( __( 'You can use this code', 'woocommerce-point-of-sale' ) );
		} else {
			wp_send_json_error( __( 'Sorry, this code is already present', 'woocommerce-point-of-sale' ) );
		}
	}

	public static function get_user_by_card_number() {
		check_ajax_referer( 'get-user-by-card-number', 'security' );

		$code = isset( $_POST['code'] ) ? wc_clean( wp_unslash( ( $_POST['code'] ) ) ) : '';

		$users = get_users(
			array(
				'meta_key'   => 'wc_pos_user_card_number',
				'meta_value' => $code,
			)
		);

		if ( 0 === count( $users ) ) {
			wp_send_json_error( __( 'User not found', 'woocommerce-point-of-sale' ) );
		} else {
			$customer = new WC_Customer( $users[0]->ID );
			wp_send_json_success( $customer->get_data() );
		}
	}

	/**
	 * Logout from POS via Ajax.
	 */
	public static function logout() {
		check_ajax_referer( 'logout', 'security' );

		$register_id    = isset( $_POST['register_id'] ) ? absint( $_POST['register_id'] ) : 0;
		$close_register = isset( $_POST['close_register'] ) ? true : false;

		if ( $register_id ) {
			if ( $close_register ) {
				$data                   = array();
				$data['open_last']      = ! empty( $_POST['open_last'] ) ? wc_clean( wp_unslash( $_POST['open_last'] ) ) : 0;
				$data['counted_totals'] = ! empty( $_POST['counted_totals'] ) ? (array) json_decode( stripslashes( wc_clean( $_POST['counted_totals'] ) ) ) : array();
				$data['closing_note']   = ! empty( $_POST['closing_note'] ) ? wc_clean( wp_unslash( $_POST['closing_note'] ) ) : '';

				$logout = wc_pos_close_register( $register_id, $data );
			} else {
				$logout = wc_pos_switch_user( $register_id );
			}

			if ( $logout ) {
				$data = WC_POS_Sell::instance()->get_register( (int) $register_id );
				wp_send_json_success( $data );
			}
		}

		wp_send_json_error( __( 'An error occurred', 'woocommerce-point-of-sale' ), 500 );
	}

	/**
	 * Generate a new order ID via Ajax.
	 */
	public static function generate_order_id() {
		check_ajax_referer( 'generate-order-id', 'security' );

		if ( ! isset( $_POST['register_id'] ) ) {
			wp_send_json_error( __( 'Register not found.', 'woocommerce-point-of-sale' ), 404 );
		}

		$order_id = wc_pos_create_temp_order( (int) $_POST['register_id'] );

		wp_send_json_success(
			array(
				'order_id' => $order_id,
			),
			200
		);
	}

	/**
	 * Ajax - log in to the POS.
	 */
	public static function auth_user() {
		check_ajax_referer( 'auth-user', 'security' );

		// @todo The password field should not be sanitized. Sanitization is done here to pass PHPCS checks. POS-61.
		$username = isset( $_POST['username'] ) ? sanitize_user( wp_unslash( $_POST['username'] ) ) : '';
		$password = isset( $_POST['password'] ) ? wc_clean( $_POST['password'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.MissingUnslash

		$user = wp_authenticate_username_password( null, $username, $password );

		if ( is_wp_error( $user ) ) {
			wp_send_json_error( $user->get_error_data() );
		}

		$register_id = isset( $_POST['register_id'] ) ? absint( $_POST['register_id'] ) : 0;
		$register    = wc_pos_get_register( $register_id );

		if ( ! $register ) {
			wp_send_json_error( __( 'Register not found', 'woocommerce-point-of-sale' ), 400 );
		}

		$date_opened = is_null( $register->get_date_opened() ) ? null : $register->get_date_opened()->getTimestamp();
		$date_closed = is_null( $register->get_date_closed() ) ? null : $register->get_date_closed()->getTimestamp();

		// Is first opened?
		if ( is_null( $date_opened ) || $date_opened < $date_closed ) {
			$date_opened = time(); // GMT;
			$register->set_date_opened( $date_opened );
			$register->set_open_last( $user->ID );

			// Create a new session.
			$session = new WC_POS_Session();
			$session->set_props(
				array(
					'date_opened' => $date_opened,
					'open_first'  => $user->ID,
					'open_last'   => $user->ID,
					'register_id' => $register_id,
					'outlet_id'   => $register->get_outlet(),
				)
			);

			$session_id = $session->save();

			$register->set_current_session( $session_id );
			$register->set_open_first( $user->ID );
			$register->set_open_last( $user->ID );
			$register->save();

			$register_data               = WC_POS_Sell::instance()->get_register( $register_id );
			$register_data['first_open'] = true;

			wp_send_json_success( $register_data );
		}

		$register->set_open_last( $user->ID );
		$register->save();

		$register_data = WC_POS_Sell::instance()->get_register( $register_id );

		wp_send_json_success( $register_data );
	}

	/**
	 * Load grid tiles via AJAX.
	 */
	public static function load_grid_tiles() {
		check_ajax_referer( 'grid-tile', 'security' );

		if ( ! current_user_can( 'manage_woocommerce_point_of_sale' ) || ! isset( $_POST['grid_id'] ) ) {
			wp_die( -1 );
		}

		$grid_object = new WC_POS_Grid( (int) $_POST['grid_id'] );

		try {
			// Get HTML to return.
			ob_start();
			include WC_POS_ABSPATH . '/includes/admin/meta-boxes/views/html-grid-tiles-panel.php';
			$html = ob_get_clean();
		} catch ( Exception $e ) {
			wp_send_json_error( array( 'error' => $e->getMessage() ) );
		}

		wp_send_json_success(
			array(
				'html' => $html,
			)
		);
	}

	/**
	 * Add a grid tile via AJAX.
	 *
	 * @throws Exception
	 */
	public static function add_grid_tile() {
		check_ajax_referer( 'grid-tile', 'security' );

		if ( ! current_user_can( 'manage_woocommerce_point_of_sale' ) || ! isset( $_POST['grid_id'] ) ) {
			wp_die( -1 );
		}

		try {
			$grid_object = new WC_POS_Grid( (int) $_POST['grid_id'] );

			if ( ! isset( $_POST['data']['tile_type'] ) || ! in_array( $_POST['data']['tile_type'], array( 'product', 'product_cat' ) ) ) {
				throw new Exception( 'Invalid tile type', 'woocommerce-point-of-sale' );
			}

			if ( 'product' === $_POST['data']['tile_type'] ) {
				$id      = isset( $_POST['data']['product_id'] ) ? (int) $_POST['data']['product_id'] : 0;
				$product = wc_get_product( $id );

				if ( ! $product ) {
					throw new Exception( 'Invalid product ID' );
				}

				$grid_object->add_tile(
					array(
						'type'    => isset( $_POST['data']['tile_type'] ) ? wc_clean( wp_unslash( $_POST['data']['tile_type'] ) ) : '',
						'item_id' => $id,
					)
				);
			}

			if ( 'product_cat' === $_POST['data']['tile_type'] ) {
				$term        = isset( $_POST['data']['product_cat'] ) ? wc_clean( wp_unslash( $_POST['data']['product_cat'] ) ) : '';
				$product_cat = get_term_by( 'slug', $term, 'product_cat' );

				if ( ! $product_cat ) {
					throw new Exception( 'Invalid product category ID' . json_encode( $product_cat ) );
				}

				$grid_object->add_tile(
					array(
						'type'    => isset( $_POST['data']['tile_type'] ) ? wc_clean( wp_unslash( $_POST['data']['tile_type'] ) ) : '',
						'item_id' => $product_cat->term_id,
					)
				);
			}

			$grid_object->save();
		} catch ( Exception $e ) {
			wp_send_json_error( array( 'error' => $e->getMessage() ) );
		}

		wp_send_json_success();
	}

	/**
	 * Delete a grid tile via AJAX.
	 *
	 * @throws Exception
	 */
	public static function delete_grid_tile() {
		check_ajax_referer( 'grid-tile', 'security' );

		if ( ! current_user_can( 'manage_woocommerce_point_of_sale' ) || ! isset( $_POST['grid_id'], $_POST['tile_id'] ) ) {
			wp_die( -1 );
		}

		try {
			$grid_object = new WC_POS_Grid( (int) $_POST['grid_id'] );
			$grid_object->delete_tile( (int) $_POST['tile_id'] );
			$grid_object->save();
		} catch ( Exception $e ) {
			wp_send_json_error( array( 'error' => $e->getMessage() ) );
		}

		wp_send_json_success();
	}

	/**
	 * Delete all tiles in a grid via AJAX.
	 *
	 * @throws Exception
	 */
	public static function delete_all_grid_tiles() {
		global $wpdb;

		check_ajax_referer( 'grid-tile', 'security' );

		if ( ! current_user_can( 'manage_woocommerce_point_of_sale' ) || ! isset( $_POST['grid_id'] ) ) {
			wp_die( -1 );
		}

		try {
			$result = $wpdb->delete(
				$wpdb->prefix . 'wc_pos_grid_tiles',
				array(
					'grid_id' => (int) $_POST['grid_id'],
				),
				array( '%d' )
			);

			if ( ! $result ) {
				wp_send_json_error( array( 'error' => __( 'No tiles to be deleted!', 'woocommerce-point-of-sale' ) ) );
			}
		} catch ( Exception $e ) {
			wp_send_json_error( array( 'error' => $e->getMessage() ) );
		}

		wp_send_json_success();
	}

	/**
	 * Re-order grid tile via Ajax.
	 */
	public function reorder_grid_tile() {
		check_ajax_referer( 'grid-tile', 'security' );

		$grid_id          = isset( $_POST['grid_id'] ) ? absint( $_POST['grid_id'] ) : 0;
		$current_position = isset( $_POST['current_position'] ) ? absint( $_POST['current_position'] ) : 0;
		$new_position     = isset( $_POST['new_position'] ) ? absint( $_POST['new_position'] ) : 0;

		try {
			$result = wc_pos_reorder_grid_tiles( $grid_id, $current_position, $new_position );
		} catch ( Exception $e ) {
			wp_send_json_error( array( 'error' => $e->getMessage() ) );
		}

		if ( $result ) {
			wp_send_json_success();
		}

		wp_send_json_error( array( 'error' => __( 'Tile could not be moved.', 'woocommerce-point-of-sale' ) ) );
	}

	/**
	 * Update a receipt via AJAX.
	 *
	 * @throws Exception
	 */
	public static function update_receipt() {
		check_ajax_referer( 'update-receipt', 'security' );

		if ( ! current_user_can( 'manage_woocommerce_point_of_sale' ) ) {
			wp_die( -1 );
		}

		if ( ! isset( $_POST['data'] ) ) {
			wp_send_json_error( array( 'error' => __( 'No data sent', 'woocommerce-point-of-sale' ) ) );
		}

		$receipt_id = isset( $_POST['receipt_id'] ) ? (int) $_POST['receipt_id'] : 0;

		if ( ! empty( $_POST['data']['order_date_format'] ) ) {
			$order_date_format = sanitize_option( 'date_format', wp_unslash( $_POST['data']['order_date_format'] ) );
		} elseif ( ! empty( $_POST['data']['order_date_format_custom'] ) ) {
			$order_date_format = sanitize_option( 'date_format', wp_unslash( $_POST['data']['order_date_format_custom'] ) );
		} else {
			$order_date_format = 'jS F Y';
		}

		if ( ! empty( $_POST['data']['order_time_format'] ) ) {
			$order_time_format = sanitize_option( 'date_format', wp_unslash( $_POST['data']['order_time_format'] ) );
		} elseif ( ! empty( $_POST['data']['order_time_format_custom'] ) ) {
			$order_time_format = sanitize_option( 'date_format', wp_unslash( $_POST['data']['order_time_format_custom'] ) );
		} else {
			$order_time_format = 'g:i a';
		}

		try {
			$fields = array(
				'name'                           => isset( $_POST['data']['name'] ) ? wc_clean( wp_unslash( $_POST['data']['name'] ) ) : __( 'Receipt', 'woocommerce-point-of-sale' ),
				'show_title'                     => isset( $_POST['data']['show_title'] ),
				'title_position'                 => isset( $_POST['data']['title_position'] ) ? wc_clean( wp_unslash( $_POST['data']['title_position'] ) ) : 'center',
				'no_copies'                      => isset( $_POST['data']['no_copies'] ) ? (int) $_POST['data']['no_copies'] : 1,
				'width'                          => isset( $_POST['data']['width'] ) ? (int) $_POST['data']['width'] : 0,
				'type'                           => isset( $_POST['data']['type'] ) ? wc_clean( wp_unslash( $_POST['data']['type'] ) ) : 'normal',
				'logo'                           => isset( $_POST['data']['logo'] ) ? (int) $_POST['data']['logo'] : 0,
				'logo_position'                  => isset( $_POST['data']['logo_position'] ) ? wc_clean( wp_unslash( $_POST['data']['logo_position'] ) ) : 'center',
				'logo_size'                      => isset( $_POST['data']['logo_size'] ) ? wc_clean( wp_unslash( $_POST['data']['logo_size'] ) ) : 'normal',
				'outlet_details_position'        => isset( $_POST['data']['outlet_details_position'] ) ? wc_clean( wp_unslash( $_POST['data']['outlet_details_position'] ) ) : 'center',
				'show_shop_name'                 => isset( $_POST['data']['show_shop_name'] ),
				'show_outlet_name'               => isset( $_POST['data']['show_outlet_name'] ),
				'show_outlet_address'            => isset( $_POST['data']['show_outlet_address'] ),
				'show_outlet_contact_details'    => isset( $_POST['data']['show_outlet_contact_details'] ),
				'social_details_position'        => isset( $_POST['data']['social_details_position'] ) ? wc_clean( wp_unslash( $_POST['data']['social_details_position'] ) ) : 'header',
				'show_social_twitter'            => isset( $_POST['data']['show_social_twitter'] ),
				'show_social_facebook'           => isset( $_POST['data']['show_social_facebook'] ),
				'show_social_instagram'          => isset( $_POST['data']['show_social_instagram'] ),
				'show_social_snapchat'           => isset( $_POST['data']['show_social_snapchat'] ),
				'show_wifi_details'              => isset( $_POST['data']['show_wifi_details'] ),
				'show_tax_number'                => isset( $_POST['data']['show_tax_number'] ),
				'tax_number_label'               => isset( $_POST['data']['tax_number_label'] ) ? wc_clean( wp_unslash( $_POST['data']['tax_number_label'] ) ) : '',
				'tax_number_position'            => isset( $_POST['data']['tax_number_position'] ) ? wc_clean( wp_unslash( $_POST['data']['tax_number_position'] ) ) : 'center',
				'show_order_date'                => isset( $_POST['data']['show_order_date'] ),
				'order_date_format'              => $order_date_format,
				'order_time_format'              => $order_time_format,
				'show_customer_name'             => isset( $_POST['data']['show_customer_name'] ),
				'show_customer_email'            => isset( $_POST['data']['show_customer_email'] ),
				'show_customer_phone'            => isset( $_POST['data']['show_customer_phone'] ),
				'show_customer_shipping_address' => isset( $_POST['data']['show_customer_shipping_address'] ),
				'show_customer_billing_address'  => isset( $_POST['data']['show_customer_billing_address'] ),
				'show_cashier_name'              => isset( $_POST['data']['show_cashier_name'] ),
				'show_register_name'             => isset( $_POST['data']['show_register_name'] ),
				'cashier_name_format'            => isset( $_POST['data']['cashier_name_format'] ) ? wc_clean( wp_unslash( $_POST['data']['cashier_name_format'] ) ) : 'display_name',
				'product_details_layout'         => isset( $_POST['data']['product_details_layout'] ) ? wc_clean( wp_unslash( $_POST['data']['product_details_layout'] ) ) : 'single',
				'show_product_image'             => isset( $_POST['data']['show_product_image'] ),
				'show_product_sku'               => isset( $_POST['data']['show_product_sku'] ),
				'show_product_cost'              => isset( $_POST['data']['show_product_cost'] ),
				'show_product_discount'          => isset( $_POST['data']['show_product_discount'] ),
				'show_no_items'                  => isset( $_POST['data']['show_no_items'] ),
				'show_tax_summary'               => isset( $_POST['data']['show_tax_summary'] ),
				'show_order_barcode'             => isset( $_POST['data']['show_order_barcode'] ),
				'barcode_type'                   => isset( $_POST['data']['barcode_type'] ) ? wc_clean( wp_unslash( $_POST['data']['barcode_type'] ) ) : 'code128',
				'text_size'                      => isset( $_POST['data']['text_size'] ) ? wc_clean( wp_unslash( $_POST['data']['text_size'] ) ) : 'normal',
				'header_text'                    => isset( $_POST['data']['header_text'] ) ? wp_kses_post( $_POST['data']['header_text'] ) : '',
				'footer_text'                    => isset( $_POST['data']['footer_text'] ) ? wp_kses_post( $_POST['data']['footer_text'] ) : '',
				'custom_css'                     => isset( $_POST['data']['custom_css'] ) ? sanitize_textarea_field( $_POST['data']['custom_css'] ) : '',
			);

			$receipt = new WC_POS_Receipt( $receipt_id );
			$receipt->set_props( $fields );
			$receipt->save();
		} catch ( Exception $e ) {
			wp_send_json_error( array( 'error' => $e->getMessage() ) );
		}

		wp_send_json_success(
			array(
				'id' => $receipt->get_id(),
			)
		);

	}

	/**
	 * Returns the formatted date/time string from a timestamp.
	 *
	 * @throws Exception
	 */
	public static function date_i18n() {
		check_ajax_referer( 'date-i18n', 'security' );

		try {
			$format = isset( $_POST['data']['format'] ) ? wc_clean( wp_unslash( $_POST['data']['format'] ) ) : '';
			$time   = isset( $_POST['data']['time'] ) ? wc_clean( wp_unslash( $_POST['data']['time'] ) ) : '';

			$date = date_i18n( $format, $time );
		} catch ( Exception $e ) {
			wp_send_json_error( array( 'error' => $e->getMessage() ) );
		}

		wp_send_json_success(
			array(
				'date' => $date,
			)
		);
	}

	public static function paymentsense_eod_report() {
		check_ajax_referer( 'paymentsense-eod-report', 'security' );

		$terminal_id = isset( $_POST['terminal_id'] ) ? wc_clean( wp_unslash( $_POST['terminal_id'] ) ) : 0;
		if ( empty( $_POST['terminal_id'] ) || 'none' === $terminal_id ) {
			wp_send_json_error(
				array(
					'message' => 'invalid terminal id',
				),
				400
			);
		}

		$message       = __( 'no data found', 'woocommerce-point-of-sale' );
		$payment_sense = new WC_POS_Gateway_Paymentsense_API();
		$request       = $payment_sense->pac_reports(
			$terminal_id,
			0,
			array(
				'method' => 'POST',
				'body'   => json_encode(
					array(
						'reportType' => 'END_OF_DAY',
					)
				),
			)
		);

		if ( ! is_wp_error( $request ) ) {
			$body = wp_remote_retrieve_body( $request );
			$body = json_decode( $body );
			if ( isset( $body->requestId ) ) {
				$report      = null;
				$report_body = null;

				while ( ! isset( $report_body->balances ) ) {
					sleep( 1 );
					$report      = $payment_sense->pac_reports( $terminal_id, $body->requestId );
					$report_body = json_decode( wp_remote_retrieve_body( $report ) );

					if ( empty( $report_body ) || isset( $report_body->messages ) ) {
						break;
					}
				}

				if ( isset( $report_body->balances ) ) {
					ob_start();

					include trailingslashit( WC_POS()->plugin_path() ) . 'includes/gateways/paymentsense/includes/views/html-paymentsense-report.php';

					$template = ob_get_clean();

					if ( $template ) {
						$meta_key    = 'wc_pos_payment_sense_EOD_' . strtotime( gmdate( 'Ymd' ) );
						$register_id = isset( $_POST['register'] ) ? intval( $_POST['register'] ) : 0;
						update_post_meta( $register_id, $meta_key, $report_body );

						wp_send_json_success( $template );
					}
				} elseif ( isset( $report_body->messages ) ) {
					$message = $report_body->messages->error[0];
				}
			} elseif ( isset( $body->messages ) ) {
				$message = $body->messages->error[0];
			}
		}

		wp_send_json_error(
			array(
				'message' => $message,
			),
			400
		);
	}

	/**
	 * Returns the receipt printing URL.
	 */
	public static function receipt_print_url() {
		check_ajax_referer( 'receipt-print-url', 'security' );

		$order_id = isset( $_POST['order_id'] ) ? intval( $_POST['order_id'] ) : 0;
		$order    = wc_get_order( $order_id );

		if ( $order_id && is_a( $order, 'WC_Order' ) ) {
			wp_send_json_success(
				array(
					'url' => add_query_arg( '_wpnonce', wp_create_nonce( 'print_pos_receipt' ), admin_url( 'admin.php?print_pos_receipt=true&order_id=' . $order_id ) ),
				)
			);
		}

		wp_send_json_error( array( 'error' => __( 'Could not retrieve receipt printing URL', 'woocommerce-point-of-sale' ) ) );
	}

	/**
	 * Check if server database has changed.
	 *
	 * This check let us know if we should update the client DB (IndexedDB).
	 *
	 * @throws Exception
	 */
	public static function check_db_changes() {
		check_ajax_referer( 'check-db-changes', 'security' );

		$tables  = isset( $_POST['tables'] ) ? json_decode( sanitize_text_field( wp_unslash( $_POST['tables'] ) ), true ) : array();
		$tables  = array(
			'products' => array(
				'total'       => 10022,
				'total_pages' => 101,
				'checksum'    => '',
			),
		);
		$results = array();

		if ( empty( $tables ) ) {
			wp_send_json_success( array( 'tables' => $results ) );
		}

		$server = rest_get_server();

		// Products table.
		if ( isset( $tables['products'] ) && ! empty( $tables['products'] ) ) {
			$products_checksum    = isset( $tables['products']['checksum'] ) ? $tables['products']['checksum'] : '';
			$products_total       = isset( $tables['products']['total'] ) ? intval( $tables['products']['total'] ) : 0;
			$products_total_pages = isset( $tables['products']['total_pages'] ) ? intval( $tables['products']['total_pages'] ) : 0;

			// Do one request to check if the totals are different.
			$request = new WP_REST_Request( 'GET', '/wc/v3/products' );
			$request->set_query_params(
				array(
					'per_page'      => 100,
					'wc_pos_search' => 'true',
				)
			);
			$response = rest_do_request( $request );
			$body     = $response;
			// update_option('wc_pos_test2', $response);
			$headers = $response->get_headers();
			$data    = $server->response_to_data( $response, false );
			$json    = wp_json_encode( $data );

			// Add the checksum of the first page. Can be used if we are going to loop over all products.
			$page_checksums = array( md5( $json ) );

			// Totals from response headers.
			$total       = isset( $headers['X-WP-Total'] ) ? intval( $headers['X-WP-Total'] ) : 0;
			$total_pages = isset( $headers['X-WP-TotalPages'] ) ? intval( $headers['X-WP-TotalPages'] ) : 0;

			if ( $total !== $products_total || $total_pages !== $products_total_pages ) {
				// Totals changed (i.e. one or more products have been added/removed).
				$results['products'] = array(
					'changed'     => true,
					'total'       => $total,
					'total_pages' => $total_pages,
					'checksum'    => '', // No need to calculate the new checksum.
				);
			} else {

				// Raise memory limit as the following can be a memory intensive process,
				add_filter(
					'admin_memory_limit',
					function() {
						return '32GB';
					}
				);
				wp_raise_memory_limit();
				set_time_limit( 0 );
				remove_filter(
					'admin_memory_limit',
					function() {
						return '32GB';
					}
				);

				// Load all products and calculate the checksums. Skip the first page as we already have its checksum.
				for ( $page = 2; $page <= $total_pages; $page++ ) {
					$request = new WP_REST_Request( 'GET', '/wc/v3/products' );
					$request->set_query_params(
						array(
							'page'          => $page,
							'per_page'      => 100,
							'wc_pos_search' => 'true',
						)
					);

					$response = rest_do_request( $request );
					$data     = $server->response_to_data( $response, false );
					$json     = wp_json_encode( $data );

					$page_checksums[] = md5( $json );
				}

				// Sum page checksums.
				$checksum = md5( implode( '', $page_checksums ) );
				update_option( 'wc_pos_test', $page_checksums );

				// Compare checksums.
				$changed = $checksum !== $products_checksum ? true : false;

				$results['products'] = array(
					'changed'     => $changed,
					'total'       => $total,
					'total_pages' => $total_pages,
					'checksum'    => $checksum,
					'body'        => $body,
				);
			}
		}

		wp_send_json_success( array( 'tables' => $results ) );
	}

	/**
	 * Update site option.
	 */
	public static function update_option() {
		check_ajax_referer( 'update-option', 'security' );

		$option = isset( $_POST['option'] ) ? wc_clean( wp_unslash( $_POST['option'] ) ) : '';
		$value  = isset( $_POST['value'] ) ? wc_clean( wp_unslash( $_POST['value'] ) ) : '';

		if ( ! empty( $option ) ) {
			$success = update_option( $option, $value );
		}

		if ( $success ) {
			wp_send_json_success( array( 'value' => $value ) );
		}

		wp_send_json_error( array( 'error' => __( 'Could not update option', 'woocommerce-point-of-sale' ) ) );
	}
}

WC_POS_AJAX::init();
