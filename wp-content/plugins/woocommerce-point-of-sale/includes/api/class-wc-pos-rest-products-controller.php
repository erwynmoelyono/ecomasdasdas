<?php
/**
 * REST API Products Controller
 *
 * Handles requests to wc-pos/products.
 *
 * @package WooCommerce_Point_Of_Sale/Classes/API
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_REST_Products_Controller.
 */
class WC_POS_REST_Products_Controller extends WC_REST_Products_Controller {

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
	protected $rest_base = 'products';

	/**
	 * Register additional routes for products.
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
	 * Modify the response.
	 *
	 * @param WC_Data         $object  Object data.
	 * @param WP_REST_Request $request Request object.
	 *
	 * @return WP_REST_Response
	 */
	public function prepare_object_for_response( $object, $request ) {
		$response = parent::prepare_object_for_response( $object, $request );
		$data     = $response->get_data();

		// Ignore object?
		$ignore = array_map( 'intval', explode( ',', $request['ignore'] ) );
		if ( ! empty( $ignore ) && in_array( intval( $data['id'] ), $ignore ) ) {
			return null;
		}

		// Remove unneeded product data.
		if ( isset( $data ) && is_array( $data ) ) {
			$remove_fields = array_unique(
				apply_filters(
					'wc_pos_rest_products_removed_fields',
					array(
						// Core fields.
						'date_created',
						'date_modified',
						'date_modified_gmt',
						'date_on_sale_from',
						'date_on_sale_from_gmt',
						'date_on_sale_to',
						'date_on_sale_to_gmt',
						'virtual',
						'downloads',
						'download_limit',
						'download_expiry',
						'date_created',
						'external_url',
						'button_text',
						'reviews_allowed',
						'average_rating',
						'rating_count',
						'related_ids',
						'upsell_ids',
						'cross_sell_ids',
						'menu_order',
						'price_html',
						// Non-core fields.
						'yoast_head',
					)
				)
			);

			foreach ( $remove_fields as $key ) {
				unset( $data[ $key ] );
			}

			if ( isset( $data['meta_data'] ) && is_array( $data['meta_data'] ) ) {
				$remove_meta_data_fields = array_unique( apply_filters( 'wc_pos_rest_products_removed_meta_data_fields', array() ) );

				$data['meta_data'] = array_values(
					array_filter(
						$data['meta_data'],
						function( $field ) use ( $remove_meta_data_fields ) {
							return ! in_array( $field->key, $remove_meta_data_fields, true );
						}
					)
				);
			}
		}

		// Add product variations.
		if ( isset( $data['variations'] ) ) {
			$page        = 1;
			$total_pages = 1;
			$variations  = array();

			while ( $page <= $total_pages ) {
				$request = new WP_REST_Request(
					'GET',
					"/wc-pos/products/{$data['id']}/variations"
				);
				$request->set_param( 'page', $page );
				$request->set_param( 'per_page', 100 );

				$res     = rest_do_request( $request );
				$server  = rest_get_server();
				$headers = $res->get_headers();
				$results = $server->response_to_data( $res, false );

				$variations  = array_merge( $variations, $results );
				$total_pages = intval( $headers['X-WP-TotalPages'] );
				$page++;
			}

			// Sort variations based on the order of $data['variations] which is the correct order.
			$variations = array_map(
				function( $id ) use ( $variations ) {
					return $variations[ array_search( $id, array_column( $variations, 'id' ) ) ];
				},
				$data['variations']
			);

			// Add parent_id to variations.
			foreach ( $variations as &$variation ) {
				$variation['parent_id'] = $data['id'];
			}

			$data['product_variations'] = $variations;
		}

		// Modify product attributes to include slugs.
		// TODO: move this logic to self::get_attributes().
		if ( isset( $data['attributes'] ) ) {
			foreach ( $data['attributes'] as &$attribute ) {
				$taxonomy          = wc_get_attribute( $attribute['id'] );
				$attribute['slug'] = sanitize_title( $taxonomy ? $taxonomy->slug : wc_sanitize_taxonomy_name( $attribute['name'] ) );

				$terms   = wc_get_product_terms( $data['id'], $attribute['slug'], array( 'fields' => 'all' ) );
				$options = array();
				if ( $taxonomy && count( $terms ) ) {
					$options = array_map(
						function( $term ) {
							return array(
								'slug' => sanitize_title( $term->slug ),
								'name' => $term->name,
							);
						},
						$terms
					);
				} elseif ( isset( $attribute['options'] ) ) {
					foreach ( $attribute['options'] as $option ) {
						$options[] = array(
							'slug' => sanitize_title( wc_sanitize_taxonomy_name( $option ) ),
							'name' => $option,
						);
					}
				}

				$attribute['options'] = $options;
			}
		}

		$response->set_data( $data );

		return rest_ensure_response( $response );
	}

	/**
	 * Get a collection of products.
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
	 * Get product attribute taxonomy name.
	 *
	 * Important: this function is overriden here to apply sanitize_text() on $slug before using it.
	 * This is needed to make sure slugs are encoded before using them in comparisons.
	 *
	 * @param string     $slug    Taxonomy name.
	 * @param WC_Product $product Product data.
	 *
	 * @return string
	 */
	protected function get_attribute_taxonomy_name( $slug, $product ) {
		// Format slug so it matches attributes of the product.
		$slug       = wc_attribute_taxonomy_slug( $slug );
		$attributes = $product->get_attributes();
		$attribute  = false;

		// pa_ attributes.
		if ( isset( $attributes[ sanitize_title( wc_attribute_taxonomy_name( $slug ) ) ] ) ) {
			$attribute = $attributes[ sanitize_title( wc_attribute_taxonomy_name( $slug ) ) ];
		} elseif ( isset( $attributes[ sanitize_title( $slug ) ] ) ) {
			$attribute = $attributes[ sanitize_title( $slug ) ];
		}

		if ( ! $attribute ) {
			return $slug;
		}

		// Taxonomy attribute name.
		if ( $attribute->is_taxonomy() ) {
			$taxonomy = $attribute->get_taxonomy_object();
			return $taxonomy->attribute_label;
		}

		// Custom product attribute name.
		return $attribute->get_name();
	}

	/**
	 * Join posts meta tables when product search or low stock query is present.
	 *
	 * @param string $join Join clause used to search posts.
	 * @param object $wp_query WP_Query object.
	 * @return string
	 */
	public static function add_wp_query_join( $join, $wp_query ) {
		global $wpdb;

		$search = $wp_query->get( 's' );
		if ( $search ) {
			$wpdb->query( 'SET SESSION SQL_BIG_SELECTS = 1' );

			$join = '';

			// Join scanning fields.
			$scanning_fields = get_option( 'wc_pos_scanning_fields', array( '_sku' ) );
			$scanning_fields = empty( $scanning_fields ) ? array( '_sku' ) : array_unique( $scanning_fields );

			foreach ( $scanning_fields as $field ) {
				$join .= " LEFT JOIN {$wpdb->postmeta} pm_{$field} ON pm_{$field}.post_id = {$wpdb->posts}.ID AND pm_{$field}.meta_key = '{$field}'";
			}

			// Join postmeta on _variation_description
			$join .= " LEFT JOIN {$wpdb->postmeta} pm_vardesc ON pm_vardesc.post_id = {$wpdb->posts}.ID AND pm_vardesc.meta_key = '_variation_description'";

			// Join postmeta on _pos_visibility.
			$join .= " LEFT JOIN {$wpdb->postmeta} pm_vis ON pm_vis.post_id = {$wpdb->posts}.ID AND pm_vis.meta_key = '_pos_visibility'";

			// Join postmeta on _stock_status
			$join .= " LEFT JOIN {$wpdb->postmeta} pm_stk ON pm_stk.post_id = {$wpdb->posts}.ID AND pm_stk.meta_key = '_stock_status'";

		}

		return $join;
	}

	/**
	 * Add in conditional search filters for products.
	 *
	 * @param string $where Where clause used to search posts.
	 * @param object $wp_query WP_Query object.
	 * @return string
	 */
	public static function add_wp_query_filter( $where, $wp_query ) {
		global $wpdb;

		$search = $wp_query->get( 's' );
		if ( $search ) {
			$includes = get_option( 'wc_pos_search_includes', array( 'title', 'sku' ) );
			$q        = $wp_query->query_vars;
			$where    = '';

			if ( ! empty( $q['post__not_in'] ) ) {
				$where .= " AND {$wpdb->posts}.ID NOT IN (" . implode( ',', array_map( 'absint', $q['post__not_in'] ) ) . ')';
			}

			$scanning_fields = get_option( 'wc_pos_scanning_fields', array( '_sku' ) );
			$scanning_fields = empty( $scanning_fields ) ? array( '_sku' ) : array_unique( $scanning_fields );

			// Barcode scanning. Exact match of the SKU and/or the other scanning fields.
			$scanning = isset( $_GET['scanning'] ) ? boolval( $_GET['scanning'] ) : false;
			if ( $scanning ) {
				$like = '1 != 1';

				foreach ( $scanning_fields as $field ) {
					$like .= " OR (REPLACE(pm_{$field}.meta_value, ' ', '') LIKE REPLACE('{$search}', ' ', ''))";
				}

				$where .= " AND (${like})";
			} else {
				$where .= ' AND (';
				$where .= "(REPLACE({$wpdb->posts}.post_title, ' ', '') LIKE REPLACE('%{$search}%', ' ', ''))";
				$where .= " OR (REPLACE({$wpdb->posts}.post_name, ' ', '') LIKE REPLACE('%{$search}%', ' ', ''))";

				if ( in_array( 'content', $includes, true ) ) {
					$where .= " OR (REPLACE({$wpdb->posts}.post_content, ' ', '') LIKE REPLACE('%{$search}%', ' ', ''))";
					$where .= " OR (REPLACE(pm_vardesc.meta_value, ' ', '') LIKE REPLACE('%{$search}%', ' ', ''))";
				}

				if ( in_array( 'excerpt', $includes, true ) ) {
					$where .= " OR (REPLACE({$wpdb->posts}.post_excerpt, ' ', '') LIKE REPLACE('%{$search}%', ' ', ''))";
				}

				if ( in_array( 'sku', $includes, true ) ) {
					// Scanning fields.
					foreach ( $scanning_fields as $field ) {
						$where .= " OR (REPLACE(pm_{$field}.meta_value, ' ', '') LIKE REPLACE('%{$search}%', ' ', ''))";
					}
				}

				// Close AND.
				$where .= ')';
			}

			if ( 'yes' === get_option( 'wc_pos_visibility', 'no' ) ) {
				// Variations does not have a _pos_visibility meta, so we need to check their parent's visibliity.
				$where .= " AND (
					(
						pm_vis.meta_value IS NULL AND
						{$wpdb->posts}.post_parent != 0 AND
						( SELECT ppm.meta_value FROM {$wpdb->postmeta} ppm
							WHERE ppm.post_id = {$wpdb->posts}.post_parent
							AND ppm.meta_key = '_pos_visibility' LIMIT 1
						) NOT IN ('online')
					)
					OR
					pm_vis.meta_value NOT IN ('online')
				)";
			}

			if ( 'yes' !== get_option( 'wc_pos_show_out_of_stock_products', 'no' ) ) {
				$where .= " AND pm_stk.meta_value != 'outofstock'";
			}

			$where .= " AND {$wpdb->posts}.post_type IN ('product', 'product_variation')";
			$where .= " AND {$wpdb->posts}.post_status = 'publish'";
		}

		return $where;
	}

	public static function add_wp_query_distinct( $distinct, $query ) {
		return 'DISTINCT';
	}

	/**
	 * Get the images for a product.
	 *
	 * @param WC_Product $product Product instance.
	 * @return array
	 */
	protected function get_images( $product ) {
		$images         = array();
		$attachment_ids = array();

		// Add featured image.
		if ( $product->get_image_id() ) {
			$attachment_ids[] = $product->get_image_id();
		}

		// Add gallery images.
		$attachment_ids = array_merge( $attachment_ids, $product->get_gallery_image_ids() );

		// Build image data.
		foreach ( $attachment_ids as $attachment_id ) {
			$attachment_post = get_post( $attachment_id );
			if ( is_null( $attachment_post ) ) {
				continue;
			}

			$attachment_thumbnail = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
			$attachment_medium    = wp_get_attachment_image_src( $attachment_id, 'medium' );
			$attachment_large     = wp_get_attachment_image_src( $attachment_id, 'large' );
			$attachment_full      = wp_get_attachment_image_src( $attachment_id, 'full' );

			if (
				! is_array( $attachment_thumbnail ) ||
				! is_array( $attachment_medium ) ||
				! is_array( $attachment_large ) ||
				! is_array( $attachment_full )
			) {
				continue;
			}

			$images[] = array(
				'src'  => array(
					'thumbnail' => current( $attachment_thumbnail ),
					'medium'    => current( $attachment_medium ),
					'large'     => current( $attachment_large ),
					'full'      => current( $attachment_full ),
				),
				'name' => get_the_title( $attachment_id ),
				'alt'  => get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ),
			);
		}

		return $images;
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
	 * A lighter endpoint to get the totals only instead of using get_items(). It takes the same
	 * query arguments as get_items() or the /products endpoint and returns the totals based on
	 * these passed arguments.
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_totals( $request ) {
		$query_args    = $this->prepare_objects_query( $request );
		$query_results = $this->get_objects( $query_args );

		$response = rest_ensure_response(
			array(
				'total'      => $query_results['total'],
				'totalPages' => $query_results['pages'],
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
		$query_args    = $this->prepare_objects_query( $request );
		$query_results = $this->get_objects( $query_args );

		$data = array_map(
			function( &$object ) {
				return $object->get_id();
			},
			$query_results['objects']
		);

		$response = rest_ensure_response( $data );

		return $response;
	}
}
