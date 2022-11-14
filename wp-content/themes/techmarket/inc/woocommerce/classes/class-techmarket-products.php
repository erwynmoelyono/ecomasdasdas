<?php
/**
 * Techmarket Products Class
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Techmarket_Products class
 */
if( class_exists( 'Techmarket_Shortcode_Products' ) ) {
	class Techmarket_Products {

		/**
		 * List products in a category shortcode.
		 *
		 * @param array $atts Attributes.
		 * @return string
		 */
		public static function product_category( $atts ) {
			if ( empty( $atts['category'] ) ) {
				return '';
			}

			$atts = array_merge( array(
				'limit'        => '12',
				'columns'      => '4',
				'orderby'      => 'menu_order title',
				'order'        => 'ASC',
				'category'     => '',
				'cat_operator' => 'IN',
			), (array) $atts );

			$shortcode = new Techmarket_Shortcode_Products( $atts, 'product_category' );

			return $shortcode->get_products();
		}

		/**
		 * List all (or limited) product categories.
		 *
		 * @param array $atts Attributes.
		 * @return string
		 */
		public static function product_categories( $atts ) {
			global $woocommerce_loop;
			
			$atts = shortcode_atts( array(
				'number'     => null,
				'orderby'    => 'name',
				'order'      => 'ASC',
				'columns'    => '4',
				'hide_empty' => 1,
				'parent'     => '',
				'include'    => '',
				'ids'        => '',
				'slug'       => '',
			), $atts, 'product_categories' );
			
			$ids        = array_filter( array_map( 'trim', explode( ',', $atts['ids'] ) ) );
			$include    = ! empty( $atts['include'] ) && is_array( $atts['include'] ) ? array_filter( array_map( 'trim', $atts['include'] ) ) : $ids;
			$hide_empty = ( true === $atts['hide_empty'] || 'true' === $atts['hide_empty'] || 1 === $atts['hide_empty'] || '1' === $atts['hide_empty'] ) ? 1 : 0;
			
			// get terms and workaround WP bug with parents/pad counts
			$args = array(
				'orderby'    => $atts['orderby'],
				'order'      => $atts['order'],
				'hide_empty' => $hide_empty,
				'slug'       => $atts['slug'],
				'include'    => $include,
				'pad_counts' => true,
				'child_of'   => $atts['parent'],
			);
			
			$product_categories = get_terms( 'product_cat', $args );
			
			if ( '' !== $atts['parent'] ) {
				$product_categories = wp_list_filter( $product_categories, array( 'parent' => $atts['parent'] ) );
			}
			
			if ( $hide_empty ) {
				foreach ( $product_categories as $key => $category ) {
					if ( 0 == $category->count ) {
						unset( $product_categories[ $key ] );
					}
				}
			}
			
			if ( $atts['number'] ) {
				$product_categories = array_slice( $product_categories, 0, $atts['number'] );
			}
			
			$columns = absint( $atts['columns'] );
			$woocommerce_loop['columns'] = $columns;
			
			ob_start();
			
			if ( $product_categories ) {
				
				woocommerce_product_loop_start();
				
				foreach ( $product_categories as $category ) {
					wc_get_template( 'content-product_cat.php', array(
						'category' => $category,
					) );
				}
				
				woocommerce_product_loop_end();
			
			}
			
			woocommerce_reset_loop();
			
			return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';
		}

		/**
		 * Recent Products shortcode.
		 *
		 * @param array $atts Attributes.
		 * @return string
		 */
		public static function recent_products( $atts ) {
			$atts = array_merge( array(
				'limit'        => '12',
				'columns'      => '4',
				'orderby'      => 'date',
				'order'        => 'DESC',
				'category'     => '',
				'cat_operator' => 'IN',
			), (array) $atts );

			$shortcode = new Techmarket_Shortcode_Products( $atts, 'recent_products' );

			return $shortcode->get_products();
		}

		/**
		 * List multiple products shortcode.
		 *
		 * @param array $atts Attributes.
		 * @return string
		 */
		public static function products( $atts ) {
			$atts = (array) $atts;
			$type = 'products';

			// Allow list product based on specific cases.
			if ( isset( $atts['on_sale'] ) && wc_string_to_bool( $atts['on_sale'] ) ) {
				$type = 'sale_products';
			} elseif ( isset( $atts['best_selling'] ) && wc_string_to_bool( $atts['best_selling'] ) ) {
				$type = 'best_selling_products';
			} elseif ( isset( $atts['top_rated'] ) && wc_string_to_bool( $atts['top_rated'] ) ) {
				$type = 'top_rated_products';
			}

			$shortcode = new Techmarket_Shortcode_Products( $atts, $type );

			return $shortcode->get_products();
		}

		/**
		 * List all products on sale.
		 *
		 * @param array $atts Attributes.
		 * @return string
		 */
		public static function sale_products( $atts ) {
			$atts = array_merge( array(
				'limit'        => '12',
				'columns'      => '4',
				'orderby'      => 'title',
				'order'        => 'ASC',
				'category'     => '',
				'cat_operator' => 'IN',
			), (array) $atts );

			$shortcode = new Techmarket_Shortcode_Products( $atts, 'sale_products' );

			return $shortcode->get_products();
		}

		/**
		 * List best selling products on sale.
		 *
		 * @param array $atts Attributes.
		 * @return string
		 */
		public static function best_selling_products( $atts ) {
			$atts = array_merge( array(
				'limit'        => '12',
				'columns'      => '4',
				'category'     => '',
				'cat_operator' => 'IN',
			), (array) $atts );

			$shortcode = new Techmarket_Shortcode_Products( $atts, 'best_selling_products' );

			return $shortcode->get_products();
		}

		/**
		 * List top rated products on sale.
		 *
		 * @param array $atts Attributes.
		 * @return string
		 */
		public static function top_rated_products( $atts ) {
			$atts = array_merge( array(
				'limit'        => '12',
				'columns'      => '4',
				'orderby'      => 'title',
				'order'        => 'ASC',
				'category'     => '',
				'cat_operator' => 'IN',
			), (array) $atts );

			$shortcode = new Techmarket_Shortcode_Products( $atts, 'top_rated_products' );

			return $shortcode->get_products();
		}
		
		/**
		 * Output featured products.
		 *
		 * @param array $atts Attributes.
		 * @return string
		 */
		public static function featured_products( $atts ) {
			$atts = array_merge( array(
				'limit'        => '12',
				'columns'      => '4',
				'orderby'      => 'date',
				'order'        => 'DESC',
				'category'     => '',
				'cat_operator' => 'IN',
			), (array) $atts );

			$atts['visibility'] = 'featured';

			$shortcode = new Techmarket_Shortcode_Products( $atts, 'featured_products' );

			return $shortcode->get_products();
		}

		/**
		 * List products with an attribute shortcode.
		 * Example [product_attribute attribute="color" filter="black"].
		 *
		 * @param array $atts Attributes.
		 * @return string
		 */
		public static function product_attribute( $atts ) {
			$atts = array_merge( array(
				'limit'     => '12',
				'columns'   => '4',
				'orderby'   => 'title',
				'order'     => 'ASC',
				'attribute' => '',
				'terms'     => '',
			), (array) $atts );
			
			if ( empty( $atts['attribute'] ) ) {
				return '';
			}
			
			$shortcode = new Techmarket_Shortcode_Products( $atts, 'product_attribute' );
			
			return $shortcode->get_products();
		}
	}
} else {
	class Techmarket_Products {

		private static function product_query( $query_args, $atts, $loop_name ) {
			$query_args                  = apply_filters( 'woocommerce_shortcode_products_query', $query_args, $atts, $loop_name );
			$transient_name              = 'wc_loop' . substr( md5( json_encode( $query_args ) . $loop_name ), 28 ) . WC_Cache_Helper::get_transient_version( 'product_query' );
			$products                    = get_transient( $transient_name );

			if ( false === $products || ! is_a( $products, 'WP_Query' ) ) {
				$products = new WP_Query( $query_args );
				set_transient( $transient_name, $products, DAY_IN_SECONDS * 30 );
			}

			return $products;
		}

		/**
		 * List products in a category shortcode.
		 *
		 * @param array $atts
		 * @return string
		 */
		public static function product_category( $atts ) {
			$atts = shortcode_atts( array(
				'per_page' => '12',
				'columns'  => '4',
				'orderby'  => 'menu_order title',
				'order'    => 'asc',
				'category' => '',  // Slugs
				'operator' => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
			), $atts, 'product_category' );

			if ( ! $atts['category'] ) {
				return '';
			}

			// Default ordering args
			$ordering_args = WC()->query->get_catalog_ordering_args( $atts['orderby'], $atts['order'] );
			$meta_query    = WC()->query->get_meta_query();
			$query_args    = array(
				'post_type'           => 'product',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'orderby'             => $ordering_args['orderby'],
				'order'               => $ordering_args['order'],
				'posts_per_page'      => $atts['per_page'],
				'meta_query'          => $meta_query,
				'tax_query'           => WC()->query->get_tax_query(),
			);

			$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

			if ( isset( $ordering_args['meta_key'] ) ) {
				$query_args['meta_key'] = $ordering_args['meta_key'];
			}

			$return = self::product_query( $query_args, $atts, 'product_cat' );

			// Remove ordering query arguments
			WC()->query->remove_ordering_args();

			return $return;
		}

		/**
		 * List all (or limited) product categories.
		 *
		 * @param array $atts
		 * @return string
		 */
		public static function product_categories( $atts ) {
			global $woocommerce_loop;
			
			$atts = shortcode_atts( array(
				'number'     => null,
				'orderby'    => 'name',
				'order'      => 'ASC',
				'columns'    => '4',
				'hide_empty' => 1,
				'parent'     => '',
				'ids'        => '',
				'slug'       => '',
			), $atts, 'product_categories' );
			
			$ids        = array_filter( array_map( 'trim', explode( ',', $atts['ids'] ) ) );
			$hide_empty = ( true === $atts['hide_empty'] || 'true' === $atts['hide_empty'] || 1 === $atts['hide_empty'] || '1' === $atts['hide_empty'] ) ? 1 : 0;
			
			// get terms and workaround WP bug with parents/pad counts
			$args = array(
				'orderby'    => $atts['orderby'],
				'order'      => $atts['order'],
				'hide_empty' => $hide_empty,
				'slug'       => $atts['slug'],
				'include'    => $ids,
				'pad_counts' => true,
				'child_of'   => $atts['parent'],
			);
			
			$product_categories = get_terms( 'product_cat', $args );
			
			if ( '' !== $atts['parent'] ) {
				$product_categories = wp_list_filter( $product_categories, array( 'parent' => $atts['parent'] ) );
			}
			
			if ( $hide_empty ) {
				foreach ( $product_categories as $key => $category ) {
					if ( 0 == $category->count ) {
						unset( $product_categories[ $key ] );
					}
				}
			}
			
			if ( $atts['number'] ) {
				$product_categories = array_slice( $product_categories, 0, $atts['number'] );
			}
			
			$columns = absint( $atts['columns'] );
			$woocommerce_loop['columns'] = $columns;
			
			ob_start();
			
			if ( $product_categories ) {
				
				woocommerce_product_loop_start();
				
				foreach ( $product_categories as $category ) {
					wc_get_template( 'content-product_cat.php', array(
						'category' => $category,
					) );
				}
				
				woocommerce_product_loop_end();
			
			}
			
			woocommerce_reset_loop();
			
			return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';
		}

		/**
		 * Recent Products shortcode.
		 *
		 * @param array $atts
		 * @return string
		 */
		public static function recent_products( $atts ) {
			$atts = shortcode_atts( array(
				'per_page' => '12',
				'columns'  => '4',
				'orderby'  => 'date',
				'order'    => 'desc',
				'category' => '',  // Slugs
				'operator' => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
			), $atts, 'recent_products' );

			$query_args = array(
				'post_type'           => 'product',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'posts_per_page'      => $atts['per_page'],
				'orderby'             => $atts['orderby'],
				'order'               => $atts['order'],
				'meta_query'          => WC()->query->get_meta_query(),
				'tax_query'           => WC()->query->get_tax_query(),
			);

			$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

			return self::product_query( $query_args, $atts, 'recent_products' );
		}

		/**
		 * List multiple products shortcode.
		 *
		 * @param array $atts
		 * @return string
		 */
		public static function products( $atts ) {
			$atts = shortcode_atts( array(
				'columns' => '4',
				'orderby' => 'title',
				'order'   => 'asc',
				'ids'     => '',
				'skus'    => '',
			), $atts, 'products' );

			$query_args = array(
				'post_type'           => 'product',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'orderby'             => $atts['orderby'],
				'order'               => $atts['order'],
				'posts_per_page'      => -1,
				'meta_query'          => WC()->query->get_meta_query(),
				'tax_query'           => WC()->query->get_tax_query(),
			);

			if ( ! empty( $atts['skus'] ) ) {
				$query_args['meta_query'][] = array(
					'key'     => '_sku',
					'value'   => array_map( 'trim', explode( ',', $atts['skus'] ) ),
					'compare' => 'IN',
				);
			}

			if ( ! empty( $atts['ids'] ) ) {
				$query_args['post__in'] = array_map( 'trim', explode( ',', $atts['ids'] ) );
			}

			return self::product_query( $query_args, $atts, 'products' );
		}

		/**
		 * List all products on sale.
		 *
		 * @param array $atts
		 * @return string
		 */
		public static function sale_products( $atts ) {
			$atts = shortcode_atts( array(
				'per_page' => '12',
				'columns'  => '4',
				'orderby'  => 'title',
				'order'    => 'asc',
				'category' => '', // Slugs
				'operator' => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
			), $atts, 'sale_products' );

			$query_args = array(
				'posts_per_page' => $atts['per_page'],
				'orderby'        => $atts['orderby'],
				'order'          => $atts['order'],
				'no_found_rows'  => 1,
				'post_status'    => 'publish',
				'post_type'      => 'product',
				'meta_query'     => WC()->query->get_meta_query(),
				'tax_query'      => WC()->query->get_tax_query(),
				'post__in'       => array_merge( array( 0 ), wc_get_product_ids_on_sale() ),
			);

			$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

			return self::product_query( $query_args, $atts, 'sale_products' );
		}

		/**
		 * List best selling products on sale.
		 *
		 * @param array $atts
		 * @return string
		 */
		public static function best_selling_products( $atts ) {
			$atts = shortcode_atts( array(
				'per_page' => '12',
				'columns'  => '4',
				'category' => '',  // Slugs
				'operator' => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
			), $atts, 'best_selling_products' );

			$query_args = array(
				'post_type'           => 'product',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'posts_per_page'      => $atts['per_page'],
				'meta_key'            => 'total_sales',
				'orderby'             => 'meta_value_num',
				'meta_query'          => WC()->query->get_meta_query(),
				'tax_query'           => WC()->query->get_tax_query(),
			);

			$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

			return self::product_query( $query_args, $atts, 'best_selling_products' );
		}
		
		/**
		 * List top rated products on sale.
		 *
		 * @param array $atts
		 * @return string
		 */
		public static function top_rated_products( $atts ) {
			$atts = shortcode_atts( array(
				'per_page' => '12',
				'columns'  => '4',
				'orderby'  => 'title',
				'order'    => 'asc',
				'category' => '',  // Slugs
				'operator' => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
			), $atts, 'top_rated_products' );

			$query_args = array(
				'post_type'           => 'product',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'orderby'             => $atts['orderby'],
				'order'               => $atts['order'],
				'posts_per_page'      => $atts['per_page'],
				'meta_query'          => WC()->query->get_meta_query(),
				'tax_query'           => WC()->query->get_tax_query(),
			);

			$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

			add_filter( 'posts_clauses', array( __CLASS__, 'order_by_rating_post_clauses' ) );

			$return = self::product_query( $query_args, $atts, 'top_rated_products' );

			remove_filter( 'posts_clauses', array( __CLASS__, 'order_by_rating_post_clauses' ) );

			return $return;
		}
		
		/**
		 * Output featured products.
		 *
		 * @param array $atts
		 * @return string
		 */
		public static function featured_products( $atts ) {
			$atts = shortcode_atts( array(
				'per_page' => '12',
				'columns'  => '4',
				'orderby'  => 'date',
				'order'    => 'desc',
				'category' => '',  // Slugs
				'operator' => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
			), $atts, 'featured_products' );

			$meta_query  = WC()->query->get_meta_query();
			$tax_query   = WC()->query->get_tax_query();
			$tax_query[] = array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => 'featured',
				'operator' => 'IN',
			);

			$query_args = array(
				'post_type'           => 'product',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'posts_per_page'      => $atts['per_page'],
				'orderby'             => $atts['orderby'],
				'order'               => $atts['order'],
				'meta_query'          => $meta_query,
				'tax_query'           => $tax_query,
			);

			$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

			return self::product_query( $query_args, $atts, 'featured_products' );
		}

		/**
		 * woocommerce_order_by_rating_post_clauses function.
		 *
		 * @param array $args
		 * @return array
		 */
		public static function order_by_rating_post_clauses( $args ) {
			global $wpdb;

			$args['where']   .= " AND $wpdb->commentmeta.meta_key = 'rating' ";
			$args['join']    .= "LEFT JOIN $wpdb->comments ON($wpdb->posts.ID               = $wpdb->comments.comment_post_ID) LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)";
			$args['orderby'] = "$wpdb->commentmeta.meta_value DESC";
			$args['groupby'] = "$wpdb->posts.ID";

			return $args;
		}

		/**
		 * List products with an attribute shortcode.
		 * Example [product_attribute attribute='color' filter='black'].
		 *
		 * @param array $atts
		 * @return string
		 */
		public static function product_attribute( $atts ) {
			$atts = shortcode_atts( array(
				'per_page'  => '12',
				'columns'   => '4',
				'orderby'   => 'title',
				'order'     => 'asc',
				'attribute' => '',
				'filter'    => '',
			), $atts, 'product_attribute' );

			$query_args = array(
				'post_type'           => 'product',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'posts_per_page'      => $atts['per_page'],
				'orderby'             => $atts['orderby'],
				'order'               => $atts['order'],
				'meta_query'          => WC()->query->get_meta_query(),
				'tax_query'           => WC()->query->get_tax_query(),
			);

			$query_args['tax_query'][] = array(
				'taxonomy' => strstr( $atts['attribute'], 'pa_' ) ? sanitize_title( $atts['attribute'] ) : 'pa_' . sanitize_title( $atts['attribute'] ),
				'terms'    => array_map( 'sanitize_title', explode( ',', $atts['filter'] ) ),
				'field'    => 'slug',
			);

			return self::product_query( $query_args, $atts, 'product_attribute' );
		}

		/**
		 * Adds a tax_query index to the query to filter by category.
		 *
		 * @param array $args
		 * @param string $category
		 * @param string $operator
		 * @return array;
		 * @access private
		 */
		private static function _maybe_add_category_args( $args, $category, $operator ) {
			if ( ! empty( $category ) ) {
				if ( empty( $args['tax_query'] ) ) {
					$args['tax_query'] = array();
				}
				$args['tax_query'][] = array(
					array(
						'taxonomy' => 'product_cat',
						'terms'    => array_map( 'sanitize_title', explode( ',', $category ) ),
						'field'    => 'slug',
						'operator' => $operator,
					),
				);
			}

			return $args;
		}
	}
}