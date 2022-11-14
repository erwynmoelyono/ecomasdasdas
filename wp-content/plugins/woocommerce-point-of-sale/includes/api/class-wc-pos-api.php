<?php
/**
 * Class WC_POS_API file.
 *
 * This class is only loaded when the request is coming from the POS. Therefore, there is no need to
 * to perform is_pos() or wc_pos_is_pos_referer() checks.
 *
 * @see WC_POS_Sell::wc_api_init().
 * @package WooCommerce_Point_Of_Sale/Classes/API
 */

defined( 'ABSPATH' ) || exit;

require_once WC_ABSPATH . 'includes/wc-cart-functions.php';

/**
 * WC_POS_API.
 */
class WC_POS_API {
	public function __construct() {
		// Compatibility for clients that can't use PUT/PATCH/DELETE
		if ( isset( $_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'] ) ) {
			$_GET['_method'] = wc_clean( wp_unslash( $_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'] ) );
		}

		$this->init_hooks();
	}

	public function init_hooks() {
		remove_filter( 'comments_clauses', array( 'WC_Comments', 'exclude_order_comments' ), 10, 1 );

		// add_filter( 'woocommerce_rest_check_permissions', array( $this, 'rest_check_permissions' ), 999, 4 );
		add_action( 'woocommerce_api_coupon_response', array( $this, 'api_coupon_response' ), 99, 4 );
		add_filter( 'woocommerce_rest_shop_order_object_query', array( $this, 'filter_order_query' ), 999, 2 );
		add_filter( 'woocommerce_rest_prepare_shop_order_object', array( $this, 'filter_order_response' ), 999, 3 );
		add_filter( 'woocommerce_rest_prepare_shop_order_refund_object', array( $this, 'filter_order_refund_response' ), 999, 3 );
		add_filter( 'woocommerce_api_query_args', array( $this, 'filter_api_query_args' ), 99, 2 );
		add_filter( 'woocommerce_rest_customer_query', array( $this, 'filter_user_api_query_args' ), 99, 2 );
		add_action( 'woocommerce_rest_orders_prepare_object_query', array( $this, 'filter_order_args' ), 99, 2 );
		add_filter( 'woocommerce_rest_prepare_customer', array( $this, 'filter_customer_response' ), 99, 3 );
		add_action( 'users_pre_query', array( $this, 'filter_users_where_query' ), 10, 2 );
		add_filter( 'woocommerce_payment_complete_order_status', array( $this, 'payment_complete_order_status' ), 9999, 3 );

		// Override WC tax settings.
		add_filter( 'woocommerce_order_get_tax_location', array( $this, 'order_get_tax_location' ), 9999, 2 );
		add_filter( 'wc_tax_enabled', array( $this, 'tax_enabled' ), 9999, 1 );

		add_action( 'pre_get_users', array( $this, 'pre_get_users' ), 99, 1 );
		add_filter( 'rest_prepare_user', array( $this, 'prepare_user_response' ), 99, 3 );
	}

	public function order_get_tax_location( $args, $order ) {
		$tax_based_on = get_option( 'wc_pos_calculate_tax_based_on', 'outlet' );

		if ( 'default' === $tax_based_on ) {
			$tax_based_on = get_option( 'woocommerce_tax_based_on' );
		}

		if ( 'shipping' === $tax_based_on && ! $order->get_shipping_country() ) {
			$tax_based_on = 'billing';
		}

		if ( 'billing' === $tax_based_on ) {
			$args = array(
				'country'  => $order->get_billing_country(),
				'state'    => $order->get_billing_state(),
				'postcode' => $order->get_billing_postcode(),
				'city'     => $order->get_billing_city(),
			);
		} elseif ( 'shipping' === $tax_based_on ) {
			$args = array(
				'country'  => $order->get_shipping_country(),
				'state'    => $order->get_shipping_state(),
				'postcode' => $order->get_shipping_postcode(),
				'city'     => $order->get_shipping_city(),
			);
		} elseif ( 'outlet' === $tax_based_on ) {
			$headers     = array_change_key_case( wc_pos_getallheaders(), CASE_UPPER );
			$register_id = ! empty( $headers['X-POS-ID'] ) ? intval( $headers['X-POS-ID'] ) : 0;
			$outlet      = wc_pos_get_outlet_location( $register_id );

			if ( is_array( $outlet ) ) {
				$args['country']  = isset( $outlet['country'] ) ? $outlet['country'] : $args['country'];
				$args['state']    = isset( $outlet['state'] ) ? $outlet['state'] : $args['state'];
				$args['postcode'] = isset( $outlet['postcode'] ) ? $outlet['postcode'] : $args['postcode'];
				$args['city']     = isset( $outlet['city'] ) ? $outlet['city'] : $args['city'];
			}
		}

		// Default to base.
		if ( 'base' === $tax_based_on || empty( $args['country'] ) ) {
			$args['country']  = WC()->countries->get_base_country();
			$args['state']    = WC()->countries->get_base_state();
			$args['postcode'] = WC()->countries->get_base_postcode();
			$args['city']     = WC()->countries->get_base_city();
		}

		return $args;
	}

	/**
	 * Override wc_tax_enabled() when used by POS.
	 *
	 * @param bool $tax_enabled
	 * @return bool
	 */
	public function tax_enabled( $tax_enabled ) {
		if ( is_pos() || wc_pos_is_pos_referer() ) {
			return $tax_enabled && 'enabled' === get_option( 'wc_pos_tax_calculation', 'enabled' );
		}

		return $tax_enabled;
	}

	/**
	 * Change REST API permissions so that clerks have access to the WooCommerce API.
	 *
	 * @todo This is no longer needed. However, before removing it please make sure that all API
	 * endpoints are accessible by clerks.
	 *
	 * @param bool   $permission Does the current user have access to the WooCommerce API.
	 * @param string $context    Request context.
	 * @param int    $object_id  Object ID
	 * @param string $object     Object.
	 *
	 * @return bool
	 */
	public function rest_check_permissions( $permission = false, $context = 'read', $object_id = 0, $object ) {
		// If user has access already, we can bypass additional checks.
		if ( $permission ) {
			return $permission;
		}

		$objects = array(
			'settings' => 'view_register', // Allow clerks to access the shipping/zones route.
		);

		if ( isset( $objects[ $object ] ) ) {
			return current_user_can( $objects[ $object ] );
		}

		return $permission;
	}

	public function pre_get_users( $query ) {
		if ( isset( $query->query_vars['role'] ) && 'all' === $query->query_vars['role'] ) {
			$query->query_vars['role'] = '';
		}

		return $query;
	}

	/**
	 * Filter product response from WC REST API for easier handling by backbone.js
	 *
	 * @param  WP_REST_Response $response
	 * @param  WC_Product       $product
	 * @param  WP_REST_Request  $request
	 * @return WP_REST_Response $response
	 */
	public function filter_product_response( $response, $product, $request ) {
		$product_data = $response->get_data();
		// flatten variable data
		$product_data['categories_ids'] = array_map(
			function( $category ) {
				return $category['id'];
			},
			$product_data['categories']
		);

		if ( ! empty( $product_data['attributes'] ) ) {

			foreach ( $product_data['attributes'] as $attr_key => $attribute ) {

				$taxonomy = wc_get_attribute( $attribute['id'] );

				$product_data['attributes'][ $attr_key ]['slug']        = $taxonomy ? $taxonomy->slug : wc_sanitize_taxonomy_name( $attribute['name'] );
				$product_data['attributes'][ $attr_key ]['is_taxonomy'] = $taxonomy ? true : false;

				$terms   = wc_get_product_terms( $product->get_id(), $product_data['attributes'][ $attr_key ]['slug'], array( 'fields' => 'all' ) );
				$options = array();
				if ( $taxonomy && count( $terms ) ) {
					$options = array_map(
						function( $term ) {
							return array(
								'slug' => $term->slug,
								'name' => $term->name,
							);
						},
						$terms
					);
				} else {
					$options = array();
					if ( isset( $product_data['attributes'][ $attr_key ]['options'] ) ) {
						foreach ( $product_data['attributes'][ $attr_key ]['options'] as $opt ) {
							$options[] = array(
								'name' => $opt,
								'slug' => wc_clean( stripslashes( $opt ) ),
							);
						}
					}
				}
				$product_data['attributes'][ $attr_key ]['options'] = $options;

			}
		}
		$thumbnail_size = array( 350, 350 );
		$parent_image   = wc_pos_grid_thumbnail( get_post_thumbnail_id( $product_data['id'] ), $thumbnail_size );
		$parent_src     = wc_pos_grid_thumbnail( get_post_thumbnail_id( $product_data['id'] ), $thumbnail_size );

		$product_data['thumbnail_src'] = $parent_image;
		$product_data['featured_src']  = $parent_src ? $parent_src : $parent_image;

		if ( 'subscription' === $product->get_type() || 'variable-subscription' === $product->get_type() ) {
			$product_data['subscription'] = $this->get_subscription( $product->get_id() );
		}

		$scan_field = get_option( 'woocommerce_pos_register_scan_field' );
		if ( $scan_field ) {
			$product_data['post_meta'][ $scan_field ][] = get_post_meta( $product->get_id(), $scan_field, true );
		}
		$product_data['post_meta']['product_addons'] = get_post_meta( $product->get_id(), '_product_addons', true );

		$product_data['points_earned']       = '';
		$product_data['points_max_discount'] = '';
		if ( isset( $GLOBALS['wc_points_rewards'] ) ) {
			$product_data['points_earned']       = self::get_product_points( $product );
			$product_data['points_max_discount'] = self::get_product_max_discount( $product );
		}

		if ( count( $product_data['variations'] ) ) {
			foreach ( $product_data['variations'] as $key => $variation ) {
				$variation = new WC_Product_Variation( $variation );

				$product_data['variations'][ $key ]                   = $variation->get_data();
				$product_data['variations'][ $key ]['type']           = $product->get_type();
				$product_data['variations'][ $key ]['categories_ids'] = $product_data['categories_ids'];

				$image   = wc_pos_grid_thumbnail( get_post_thumbnail_id( $variation->get_id() ), $thumbnail_size );
				$f_image = wc_pos_grid_thumbnail( get_post_thumbnail_id( $variation->get_id() ), $thumbnail_size );
				$product_data['variations'][ $key ]['thumbnail_src'] = $image ? $image : $product_data['thumbnail_src'];
				$product_data['variations'][ $key ]['featured_src']  = $f_image ? $image : $product_data['thumbnail_src'];

				if ( $scan_field ) {
					$product_data['variations'][ $key ]['post_meta'][ $scan_field ][] = get_post_meta( $variation->get_id(), $scan_field, true );
				}

				$product_data['variations'][ $key ]['points_earned'] = '';
				if ( isset( $GLOBALS['wc_points_rewards'] ) ) {
					$variation_product                                   = new WC_Product_Variation( $variation->get_id() );
					$product_data['variations'][ $key ]['points_earned'] = self::get_product_points( $variation_product );
					$product_data['variations'][ $key ]['points_max_discount'] = self::get_product_max_discount( $variation_product );
				}

				if ( 'subscription' === $product->get_type() || 'variable-subscription' === $product->get_type() ) {
					$product_data['variations'][ $key ]['subscription'] = $this->get_subscription( $variation->get_id() );
				}
			}
		}

		if ( 'variable' === $product_data['type'] ) {
			$product_data['default_variations'] = get_post_meta( $product->get_id(), '_default_attributes', true );
		}

		$response->set_data( $product_data );

		return $response;
	}

	private function get_subscription( $product_id ) {
		$subscription   = array();
		$post_meta_keys = array(
			'trial_length'      => '_subscription_trial_length',
			'sign_up_fee'       => '_subscription_sign_up_fee',
			'period'            => '_subscription_period',
			'period_interval'   => '_subscription_period_interval',
			'length'            => '_subscription_length',
			'trial_period'      => '_subscription_trial_period',
			'limit'             => '_subscription_limit',
			'one_time_shipping' => '_subscription_one_time_shipping',
			'payment_sync_date' => '_subscription_payment_sync_date',

		);
		foreach ( $post_meta_keys as $key => $meta_value ) {
			$subscription[ $key ] = get_post_meta( $product_id, $meta_value, true );
		}
		return $subscription;
	}


	private static function get_product_max_discount( $product ) {

		if ( empty( $product->variation_id ) ) {

			// simple product
			$max_discount = ( isset( $product->wc_points_max_discount ) ) ? $product->wc_points_max_discount : '';

		} else {
			// variable product
			$points_max_discount = get_post_meta( $product->variation_id, '_wc_points_max_discount', true );
			$max_discount        = ( isset( $points_max_discount ) ? $points_max_discount : '' );
		}

		return $max_discount;
	}

	private static function get_product_points( $product ) {

		if ( empty( $product->variation_id ) ) {
			// simple or variable product, for variable product return the maximum possible points earned
			if ( method_exists( $product, 'get_variation_price' ) ) {
				$points = ( isset( $product->wc_max_points_earned ) ) ? $product->wc_max_points_earned : '';
			} else {
				$points = ( isset( $product->wc_points_earned ) ) ? $product->wc_points_earned : '';

				// subscriptions integration - if subscriptions is active check if this is a renewal order
				if ( class_exists( 'WC_Subscriptions_Renewal_Order' ) && is_object( $order ) ) {
					if ( WC_Subscriptions_Renewal_Order::is_renewal( $order ) ) {
						$points = ( isset( $product->wc_points_rewnewal_points ) ) ? $product->wc_points_rewnewal_points : $points;
					}
				}
			}
		} else {
			// variation product
			$points = get_post_meta( $product->variation_id, '_wc_points_earned', true );

			// subscriptions integration - if subscriptions is active check if this is a renewal order
			if ( class_exists( 'WC_Subscriptions_Renewal_Order' ) && is_object( $order ) ) {
				if ( WC_Subscriptions_Renewal_Order::is_renewal( $order ) ) {
					$renewal_points = get_post_meta( $product->variation_id, '_wc_points_rewnewal_points', true );
					$points         = ( '' === $renewal_points ) ? $points : $renewal_points;
				}
			}

			// if points aren't set at variation level, use them if they're set at the product level
			if ( '' === $points ) {
				$points = ( isset( $product->parent->wc_points_earned ) ) ? $product->parent->wc_points_earned : '';

				// subscriptions integration - if subscriptions is active check if this is a renewal order
				if ( class_exists( 'WC_Subscriptions_Renewal_Order' ) && is_object( $order ) ) {
					if ( WC_Subscriptions_Renewal_Order::is_renewal( $order ) ) {
						$points = ( isset( $product->parent->wc_points_rewnewal_points ) ) ? $product->parent->wc_points_rewnewal_points : $points;
					}
				}
			}
		}
		return $points;
	}

	/**
	 * Filter customer response.
	 *
	 * @param WP_REST_Response $response
	 * @param WP_User          $user_data
	 * @param WP_REST_Request  $request
	 *
	 * @return mixed
	 */
	public function filter_customer_response( $response, $user_data, $request ) {
		$customer_data                   = $response->get_data();
		$customer_data['points_balance'] = 0;

		if ( isset( $GLOBALS['wc_points_rewards'] ) ) {
			$customer_data['points_balance'] = WC_Points_Rewards_Manager::get_users_points( $user_data->ID );
		}

		if ( class_exists( 'WC_Gateway_Account_Funds' ) && in_array( 'accountfunds', wc_pos_get_payment_gateways_ids( true ), true ) ) {
			$customer_data['account_funds'] = WC_Account_Funds::get_account_funds( $user_data->ID );
		}

		$customer_data['avatar_url']   = get_avatar_url( $customer_data['email'], array( 'size' => '256' ) );
		$customer_data['capabilities'] = $user_data->get_role_caps();

		global $wpdb;
		$roles                  = (array) get_user_meta( $user_data->id, $wpdb->prefix . 'capabilities', true );
		$customer_data['roles'] = array_keys( $roles );

		$response->set_data( $customer_data );

		return $response;
	}

	/**
	 * Get attribute taxonomy by slug.
	 */
	private function get_attribute_taxonomy_by_id( $id ) {
		$taxonomy             = null;
		$attribute_taxonomies = wc_get_attribute_taxonomies();

		foreach ( $attribute_taxonomies as $key => $tax ) {
			if ( $id === $tax->attribute_id ) {
				$taxonomy = wc_attribute_taxonomy_name( $tax->attribute_name );
				break;
			}
		}

		return $taxonomy;
	}

	/**
	 * Filter order response.
	 *
	 * @param WP_REST_Response $response  The response object.
	 * @param WC_Data          $the_order Object data.
	 * @param WP_REST_Request  $request   Request object.
	 */
	public function filter_order_response( $response, $the_order, $request ) {
		global $wpdb;

		$order_data = $response->get_data();
		$post       = get_post( $order_data['id'] );

		$order_data['order_status'] = sprintf( '<mark class="order-status status-%s tips" data-tip="%s"><span>%s</span></mark>', sanitize_title( $the_order->get_status() ), wc_get_order_status_name( $the_order->get_status() ), wc_get_order_status_name( $the_order->get_status() ) );

		$formatted_address = '';
		$f_address         = $the_order->get_formatted_shipping_address();
		if ( $f_address ) {
			$formatted_address = '<a target="_blank" href="' . esc_url( $the_order->get_shipping_address_map_url() ) . '">' . esc_html( preg_replace( '#<br\s*/?>#i', ', ', $f_address ) ) . '</a>';
		} else {
			$formatted_address = '<span>&ndash;</span>';
		}

		if ( $the_order->get_shipping_method() ) {
			$formatted_address .= '<small class="meta">' . __( 'Via', 'woocommerce-point-of-sale' ) . ' ' . esc_html( $the_order->get_shipping_method() ) . '</small>';
		}

		$order_data['formatted_shipping_address'] = $formatted_address;

		if ( '0000-00-00 00:00:00' === $post->post_date ) {
			$t_time = __( 'Unpublished', 'woocommerce-point-of-sale' );
			$h_time = __( 'Unpublished', 'woocommerce-point-of-sale' );
		} else {
			$t_time = get_the_time( __( 'Y/m/d g:i:s A', 'woocommerce-point-of-sale' ), $post );
			$h_time = get_the_time( __( 'Y/m/d', 'woocommerce-point-of-sale' ), $post );
		}

		$order_data['order_date'] = '<abbr title="' . esc_attr( $t_time ) . '">' . esc_html( apply_filters( 'post_date_column_time', $h_time, $post ) ) . '</abbr>';

		if ( $the_order->get_customer_note() ) {
			$order_data['customer_message'] = '<span class="note-on tips" data-tip="' . wc_sanitize_tooltip( $the_order->get_customer_note() ) . '">' . __( 'Yes', 'woocommerce-point-of-sale' ) . '</span>';
		} else {
			$order_data['customer_message'] = '<span class="na">&ndash;</span>';
		}

		$order_notes = '<span class="na">&ndash;</span>';

		if ( $post->comment_count ) {
			$comment_count = absint( $post->comment_count );

			// check the status of the post
			$status = ( 'trash' !== $post->post_status ) ? '' : 'post-trashed';

			$latest_notes = get_comments(
				array(
					'post_id' => $post->ID,
					'number'  => 1,
					'status'  => $status,
				)
			);

			$latest_note = current( $latest_notes );

			if ( isset( $latest_note->comment_content ) && 1 === $comment_count ) {
				$order_notes = '<span class="note-on tips" data-tip="' . wc_sanitize_tooltip( $latest_note->comment_content ) . '">' . __( 'Yes', 'woocommerce-point-of-sale' ) . '</span>';
			} elseif ( isset( $latest_note->comment_content ) ) {
				/* translators:  %d notes count */
				$order_notes = '<span class="note-on tips" data-tip="' . wc_sanitize_tooltip( $latest_note->comment_content . '<br/><small style="display:block">' . sprintf( _n( 'plus %d other note', 'plus %d other notes', ( $comment_count - 1 ), 'woocommerce-point-of-sale' ), $comment_count - 1 ) . '</small>' ) . '">' . __( 'Yes', 'woocommerce-point-of-sale' ) . '</span>';
			} else {
				/* translators:  %d notes count */
				$order_notes = '<span class="note-on tips" data-tip="' . wc_sanitize_tooltip( sprintf( _n( '%d note', '%d notes', $comment_count, 'woocommerce-point-of-sale' ), $comment_count ) ) . '">' . __( 'Yes', 'woocommerce-point-of-sale' ) . '</span>';
			}
		}

		$order_data['order_notes'] = $order_notes;
		$order_data['order_total'] = $the_order->get_formatted_order_total();

		if ( $the_order->get_payment_method_title() ) {
			$order_data['order_total'] .= '<small class="meta">' . __( 'Via', 'woocommerce-point-of-sale' ) . ' ' . esc_html( $the_order->get_payment_method_title() ) . '</small>';
		}

		if ( count( $order_data['line_items'] ) > 0 ) {
			foreach ( $order_data['line_items'] as $key => $item ) {
				$parents = get_post_ancestors( $item['product_id'] );
				if ( $parents && ! empty( $parents ) ) {
					$order_data['line_items'][ $key ]['variation_id'] = $item['product_id'];
					$order_data['line_items'][ $key ]['product_id']   = $parents[0];
				}
				$thumb_id                                  = get_post_thumbnail_id( $item['product_id'] );
				$order_data['line_items'][ $key ]['image'] = $thumb_id ? wp_get_attachment_image( get_post_thumbnail_id( $item['product_id'] ) ) : wc_placeholder_img();
				$price                                     = $item['price'];
				if ( $price ) {
					$order_data['line_items'][ $key ]['price'] = $price;
				} else {
					$dp                                        = ( isset( $filter['dp'] ) ? intval( $filter['dp'] ) : 2 );
					$order_data['line_items'][ $key ]['price'] = wc_format_decimal( $this->get_item_price( $item ), $dp );
				}

				$_product = wc_get_product( $item['product_id'] );
			}
		}

		$order_data['print_url']     = add_query_arg( '_wpnonce', wp_create_nonce( 'print_pos_receipt' ), admin_url( 'admin.php?print_pos_receipt=true&order_id=' . $the_order->get_id() ) );
		$order_data['pay_url']       = $the_order->get_checkout_payment_url();
		$order_data['stock_reduced'] = get_post_meta( $the_order->get_id(), '_order_stock_reduced', true ) ? true : false;

		if ( 'create' === $request->get_param( 'action' ) ) {
			foreach ( $request->get_param( 'meta_data' ) as $meta ) {
				if ( 'wc_pos_register_id' === $meta['key'] ) {
					$order_data['new_order'] = wc_pos_create_temp_order( (int) $meta['value'] );
					break;
				}
			}
		}

		$order_data['print_type'] = 'normal';

		$response->set_data( $order_data );

		return $response;
	}

	/**
	 * Filter refund response.
	 *
	 * @param WP_REST_Response $response The response object.
	 * @param WC_Data          $object   Object data.
	 * @param WP_REST_Request  $request  Request object.
	 */
	public function filter_order_refund_response( $response, $object, $request ) {
		$refund_data              = $response->get_data();
		$refund_data['print_url'] = add_query_arg( '_wpnonce', wp_create_nonce( 'print_pos_receipt' ), admin_url( 'admin.php?print_pos_receipt=true&order_id=' . $request['order_id'] . '&refund_id=' . $refund_data['id'] ) );
		$response->set_data( $refund_data );

		return $response;
	}

	public function get_item_price( $item ) {
		$round   = false;
		$inc_tax = wc_prices_include_tax();

		$qty = ( ! empty( $item['quantity'] ) ) ? $item['quantity'] : 1;

		if ( $inc_tax ) {
			$price = ( $item['subtotal'] + $item['subtotal_tax'] ) / max( 1, $qty );
		} else {
			$price = $item['subtotal'] / max( 1, $qty );
		}

		$price = $round ? round( $price, wc_get_price_decimals() ) : $price;

		return $price;
	}


	public function filter_api_query_args( $args, $request_args ) {
		if ( ! empty( $request_args['meta_key'] ) ) {
			$args['meta_key'] = $request_args['meta_key'];
			unset( $request_args['meta_key'] );
		}
		if ( ! empty( $request_args['meta_value'] ) ) {
			$args['meta_value'] = $request_args['meta_value'];
			unset( $request_args['meta_value'] );
		}
		if ( ! empty( $request_args['meta_compare'] ) ) {
			$args['meta_compare'] = $request_args['meta_compare'];
			unset( $request_args['meta_compare'] );
		}

		if ( ! empty( $args['s'] ) ) {
			global $wpdb;
			$search_fields = array_map(
				'wc_clean',
				apply_filters(
					'woocommerce_shop_order_search_fields',
					array(
						'_order_key',
						'_billing_company',
						'_billing_address_1',
						'_billing_address_2',
						'_billing_city',
						'_billing_postcode',
						'_billing_country',
						'_billing_state',
						'_billing_email',
						'_billing_phone',
						'_shipping_address_1',
						'_shipping_address_2',
						'_shipping_city',
						'_shipping_postcode',
						'_shipping_country',
						'_shipping_state',
					)
				)
			);

			$search_order_id = str_replace( 'Order #', '', $args['s'] );
			if ( ! is_numeric( $search_order_id ) ) {
				$search_order_id = 0;
			}

			// Search orders
			$post_ids = array_unique(
				array_merge(
					$wpdb->get_col(
						$wpdb->prepare(
							"
							SELECT DISTINCT p1.post_id
							FROM {$wpdb->postmeta} p1
							INNER JOIN {$wpdb->postmeta} p2 ON p1.post_id = p2.post_id
							WHERE
								( p1.meta_key = '_billing_first_name' AND p2.meta_key = '_billing_last_name' AND CONCAT(p1.meta_value, ' ', p2.meta_value) LIKE %s ) OR
								( p1.meta_key = '_shipping_first_name' AND p2.meta_key = '_shipping_last_name' AND CONCAT(p1.meta_value, ' ', p2.meta_value) LIKE %s ) OR
								( p1.meta_key IN (%s) AND p1.meta_value LIKE %s )
							",
							$wpdb->esc_like( '%' . $args['s'] . '%' ),
							$wpdb->esc_like( '%' . $args['s'] . '%' ),
							"'" . implode( "','", $search_fields ) . "'",
							$wpdb->esc_like( '%' . $args['s'] . '%' )
						)
					),
					$wpdb->get_col(
						$wpdb->prepare(
							"
							SELECT order_id
							FROM {$wpdb->prefix}woocommerce_order_items as order_items
							WHERE order_item_name LIKE %s
							",
							$wpdb->esc_like( '%' . $args['s'] . '%' )
						)
					),
					array( $search_order_id )
				)
			);
			unset( $args['s'] );

			$args['shop_order_search'] = true;

			// Search by found posts
			if ( ! empty( $args['post__in'] ) ) {
				$args['post__in'] = array_merge( $args['post__in'], $post_ids );
			} else {
				$args['post__in'] = $post_ids;
			}
		}
		return $args;
	}

	public function api_coupon_response( $coupon_data, $coupon, $fields, $server ) {
		if ( ! empty( $coupon_data ) && is_array( $coupon_data ) ) {
			$used_by = get_post_meta( $coupon_data['id'], '_used_by' );
			if ( $used_by ) {
				$coupon_data['used_by'] = (array) $used_by;
			} else {
				$coupon_data['used_by'] = null;
			}

			if ( ! $coupon->get_date_expires() ) {
				$coupon_data['expiry_date'] = false;
			}

			$coupon_data['maximum_amount']         = $coupon->get_maximum_amount();
			$coupon_data['limit_usage_to_x_items'] = ! empty( $coupon->get_limit_usage_to_x_items() ) ? absint( $coupon->get_limit_usage_to_x_items() ) : $coupon->get_limit_usage_to_x_items();
			$coupon_data['coupon_custom_fields']   = get_post_meta( $coupon_data['id'] );
		}
		return $coupon_data;
	}


	/**
	 * Filter order args.
	 *
	 * @param array           $args
	 * @param WP_REST_Request $request
	 *
	 * @return array
	 */
	public function filter_order_args( $args, $request ) {
		if ( empty( $request->get_param( 'reg_id' ) ) ) {
			return $args;
		}

		if ( 'all' === $request->get_param( 'reg_id' ) ) {
			return $args;
		}

		$meta_query = isset( $args['meta_query'] ) ? $args['meta_query'] : array();
		$data       = array(
			'key'   => 'wc_pos_register_id',
			'value' => isset( $_REQUEST['reg_id'] ) ? sanitize_text_field( $_REQUEST['reg_id'] ) : '',
		);
		array_push( $meta_query, $data );

		$args['meta_query'] = $meta_query;

		return $args;
	}

	/**
	 * Filter query args.
	 *
	 * @param array           $args
	 * @param WP_REST_Request $request
	 *
	 * @return array
	 */
	public function filter_user_api_query_args( $args, $request ) {
		$referer = $request->get_header( 'referer' );
		if ( strpos( $referer, 'point-of-sale' ) === false ) {
			return $args;
		}

		$meta_query = isset( $args['meta_query'] ) ? (array) $args['meta_query'] : array();
		if ( array_key_exists( 'search', $request->get_params() ) ) {
			array_push(
				$meta_query,
				array(
					'relation' => 'OR',
					array(
						'key'     => 'first_name',
						'value'   => isset( $_REQUEST['search'] ) ? explode( ' ', trim( sanitize_text_field( $_REQUEST['search'] ) ) ) : '',
						'compare' => 'IN',
					),
					array(
						'key'     => 'last_name',
						'value'   => isset( $_REQUEST['search'] ) ? explode( ' ', trim( sanitize_text_field( $_REQUEST['search'] ) ) ) : '',
						'compare' => 'IN',
					),
					array(
						'key'     => 'billing_phone',
						'value'   => isset( $_REQUEST['search'] ) ? sanitize_text_field( $_REQUEST['search'] ) : '',
						'compare' => 'LIKE',
					),
					array(
						'key'   => 'wc_pos_user_card_number',
						'value' => isset( $_REQUEST['search'] ) ? sanitize_text_field( $_REQUEST['search'] ) : '',
					),
				)
			);

			$args['search_columns'] = array( 'user_login', 'user_nicename', 'user_email' );
		}

		if ( array_key_exists( 'outlet_id', $request->get_params() ) ) {
			array_push(
				$meta_query,
				array(
					array(
						'key'     => 'wc_pos_assigned_outlets',
						'value'   => sprintf( 's:%s:"%s";', strlen( $request->get_param( 'outlet_id' ) ), $request->get_param( 'outlet_id' ) ),
						'compare' => 'LIKE',
					),
				)
			);

			// when search has any value it tries to add search_columns arg automatically. so we mute it.
			$args['search'] = '';
		}

		$args['meta_query'] = $meta_query;

		return $args;
	}

	/**
	 * Filter users where query.
	 *
	 * @param $null
	 * @param $wp_query WP_User_Query
	 *
	 * @return null
	 */
	public function filter_users_where_query( $null, $wp_query ) {
		$referer = isset( $_SERVER['HTTP_REFERER'] ) ? filter_var( $_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL ) : '';
		if ( strpos( $referer, 'point-of-sale' ) !== false && ! empty( $_GET['search'] ) ) {
			$wp_query->query_where = str_replace( ') AND (', ') OR (', $wp_query->query_where );
		}

		return $null;
	}

	/**
	 * Filter order query.
	 *
	 * @param $args
	 * @param WP_REST_Request $request
	 *
	 * @return mixed
	 */
	public function filter_order_query( $args, $request ) {
		$referer = isset( $_SERVER['HTTP_REFERER'] ) ? filter_var( $_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL ) : '';
		if ( strpos( $referer, 'point-of-sale' ) === false ) {
			return $args;
		}

		$args['meta_query'] = array(
			'relation' => 'AND',
		);

		if ( 'yes' !== get_option( 'wc_pos_load_website_orders', 'no' ) ) {
			$args['meta_query'][] = array(
				'key'     => 'wc_pos_register_id',
				'value'   => $request->get_param( 'pos_id' ),
				'compare' => '=',
			);
			$args['meta_query'][] = array(
				'key'   => '_created_via',
				'value' => 'POS',
			);
		}

		if (
			'yes' === get_option( 'wc_pos_display_orders_for_logged_in_user', 'yes' )
			&& $request->get_param( 'current_user' )
		) {
			$args['meta_query'][] = array(
				'key'     => 'wc_pos_served_by',
				'value'   => $request->get_param( 'current_user' ),
				'compare' => '=',
			);
		}

		return $args;
	}

	/**
	 * Prepare user response.
	 *
	 * @param WP_REST_Response $response
	 * @param object           $user
	 * @param WP_REST_Request  $request
	 *
	 * @return WP_REST_Response
	 * @throws Exception
	 */
	public function prepare_user_response( $response, $user, $request ) {
		if ( $request->get_header( 'X-POS-ID' ) ) {

			$user = new WC_Customer( $user->id );
			if ( $user ) {
				$data         = $response->get_data();
				$data['meta'] = $user->get_meta_data();

				$response->set_data( $data );
			}
		}

		return $response;
	}

	/**
	 * Makes sure order status does not change after running WC_Order::payment_complete().
	 *
	 * The status of POS orders should be set based on the Status Options under Settings > General.
	 *
	 * @param  string         $status Current order status.
	 * @param  int            $order_id Order ID.
	 * @param  WC_Order|false $order Order object.
	 *
	 * @return string
	 */
	public function payment_complete_order_status( $status, $order_id = 0, $order = false ) {
		if ( $order && $order->get_status() && 'POS' === $order->get_created_via() ) {
			return $order->get_status();
		}

		return $status;
	}
}
