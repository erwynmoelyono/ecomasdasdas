<?php
/**
 * REST API Customers Controller
 *
 * Handles requests to wc-pos/customers.
 *
 * @package WooCommerce_Point_Of_Sale/Classes/API
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_REST_Customers_Controller.
 */
class WC_POS_REST_Customers_Controller extends WC_REST_Customers_Controller {
	protected $namespace = 'wc-pos';
	protected $rest_base = 'customers';

	/**
	 * Register additional routes for customers.
	 *
	 * TODO: create schemas.
	 */
	public function register_routes() {
		parent::register_routes();

		register_rest_route(
			$this->namespace,
			'/' . $this->rest_base . '/totals',
			array(
				array(
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_totals' ),
					'permission_callback' => array( $this, 'get_totals_permissions_check' ),
					'args'                => $this->get_collection_params(),
				),
			)
		);

		register_rest_route(
			$this->namespace,
			'/' . $this->rest_base . '/ids',
			array(
				array(
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_ids' ),
					'permission_callback' => array( $this, 'get_ids_permissions_check' ),
					'args'                => $this->get_collection_params(),
				),
			)
		);
	}

	/**
	 * Create a single customer.
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return WP_Error|WP_REST_Response
	 */
	public function create_item( $request ) {
		try {
			if ( ! empty( $request['id'] ) ) {
				throw new WC_REST_Exception( 'woocommerce_rest_customer_exists', __( 'Cannot create existing resource.', 'woocommerce-point-of-sale' ), 400 );
			}

			// Sets the username.
			$request['username'] = ! empty( $request['username'] ) ? $request['username'] : '';

			// Sets the password.
			$request['password'] = ! empty( $request['password'] ) ? $request['password'] : wp_generate_password();

			// Create customer.
			$customer = new WC_Customer();
			$customer->set_username( $request['username'] );
			$customer->set_password( $request['password'] );
			$customer->set_email( $request['email'] );
			$this->update_customer_meta_fields( $customer, $request );
			$customer->save();

			if ( ! $customer->get_id() ) {
				throw new WC_REST_Exception( 'woocommerce_rest_cannot_create', __( 'This resource cannot be created.', 'woocommerce-point-of-sale' ), 400 );
			}

			$user_data = get_userdata( $customer->get_id() );
			$this->update_additional_fields_for_object( $user_data, $request );

			/**
			 * Fires after a customer is created or updated via the REST API.
			 *
			 * @param WP_User         $user_data Data used to create the customer.
			 * @param WP_REST_Request $request   Request object.
			 * @param boolean         $creating  True when creating customer, false when updating customer.
			 */
			do_action( 'woocommerce_rest_insert_customer', $user_data, $request, true );

			$request->set_param( 'context', 'edit' );
			$response = $this->prepare_item_for_response( $user_data, $request );
			$response = rest_ensure_response( $response );
			$response->set_status( 201 );
			$response->header( 'Location', rest_url( sprintf( '/%s/%s/%d', $this->namespace, $this->rest_base, $customer->get_id() ) ) );

			// Send notification email.
			WC()->mailer()->emails['WC_Email_Customer_New_Account']->trigger( $customer->get_id(), $request['password'], true );

			return $response;
		} catch ( Exception $e ) {
			return new WP_Error( $e->getErrorCode(), $e->getMessage(), array( 'status' => $e->getCode() ) );
		}
	}

	/**
	 * Get a collection of customers.
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_items( $request ) {
		// Add query filters.
		add_filter( 'posts_join', array( __CLASS__, 'add_wp_query_join' ), 10, 2 );
		add_filter( 'posts_where', array( __CLASS__, 'add_wp_query_filter' ), 10, 2 );
		add_filter( 'posts_distinct_request', array( __CLASS__, 'add_wp_query_distinct' ), 10, 2 );

		$response = parent::get_items( $request );

		// Remove the added filters right away.
		remove_filter( 'posts_join', array( __CLASS__, 'add_wp_query_join' ), 10 );
		remove_filter( 'posts_where', array( __CLASS__, 'add_wp_query_filter' ), 10 );
		remove_filter( 'posts_distinct_request', array( __CLASS__, 'add_wp_query_distinct' ), 10 );

		return $response;
	}

	/**
	 * Join posts meta tables.
	 *
	 * @param string $join Join clause used to search posts.
	 * @param object $wp_query WP_Query object.
	 * @return string
	 */
	public static function add_wp_query_join( $join, $wp_query ) {
		global $wpdb;

		$search = $wp_query->get( 's' );
		if ( $search ) {
			// Join postmeta on wc_pos_card_number
			$join = " LEFT JOIN {$wpdb->postmeta} pm_card ON pm_card.post_id = {$wpdb->posts}.ID AND pm_card.meta_key = 'wc_pos_user_card_number'";
		}

		return $join;
	}

	/**
	 * Add in conditional search filters for customers.
	 *
	 * @param string $where Where clause used to search posts.
	 * @param object $wp_query WP_Query object.
	 * @return string
	 */
	public static function add_wp_query_filter( $where, $wp_query ) {
		global $wpdb;

		$search = $wp_query->get( 's' );
		if ( $search ) {
			$q     = $wp_query->query_vars;
			$where = '';

			if ( ! empty( $q['post__not_in'] ) ) {
				$where .= " AND {$wpdb->posts}.ID NOT IN (" . implode( ',', array_map( 'absint', $q['post__not_in'] ) ) . ')';
			}

			// Barcode scanning. Find exact match of card number.
			$scanning = isset( $_GET['scanning'] ) ? boolval( $_GET['scanning'] ) : false;
			if ( $scanning ) {
				$where .= "AND (REPLACE(pm_card.meta_value, ' ', '') LIKE REPLACE('{$search}', ' ', ''))";
			}
		}

		return $where;
	}

	public static function add_wp_query_distinct( $distinct, $query ) {
		return 'DISTINCT';
	}

	/**
	 * Check if a given request has access to read totals.
	 *
	 * @param  WP_REST_Request $request Full details about the request.
	 * @return WP_Error|boolean
	 */
	public function get_totals_permissions_check( $request ) {
		if ( ! current_user_can( 'view_register' ) ) {
			return new WP_Error( 'woocommerce_rest_cannot_view', __( 'Sorry, you cannot list resources.', 'woocommerce-point-of-sale' ), array( 'status' => rest_authorization_required_code() ) );
		}

		return true;
	}

	/**
	 * Check if a given request has access to read IDs.
	 *
	 * @param  WP_REST_Request $request Full details about the request.
	 * @return WP_Error|boolean
	 */
	public function get_ids_permissions_check( $request ) {
		if ( ! current_user_can( 'view_register' ) ) {
			return new WP_Error( 'woocommerce_rest_cannot_view', __( 'Sorry, you cannot list resources.', 'woocommerce-point-of-sale' ), array( 'status' => rest_authorization_required_code() ) );
		}

		return true;
	}

	/**
	 * Get request totals.
	 *
	 * This a lighter endpoint to get only the totals instead of using get_items(). It takes the
	 * same query arguments as get_items() or the /customers endpoint and returns the
	 * totals based on these passed arguments.
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_totals( $request ) {
		$response = parent::get_items( $request );
		$headers  = $response->get_headers();

		$response = rest_ensure_response(
			array(
				'total'      => $headers['X-WP-Total'],
				'totalPages' => $headers['X-WP-TotalPages'],
			)
		);

		return $response;
	}

	/**
	 * Get item IDs.
	 *
	 * A lighter endpoint that only returns the item IDs.
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_ids( $request ) {
		$response = parent::get_items( $request );
		$data     = $response->get_data();

		$data = array_map(
			function( &$item ) {
				return $item['id'];
			},
			$data
		);

		$response->set_data( $data );
		$response = rest_ensure_response( $data );

		return $response;
	}
}
