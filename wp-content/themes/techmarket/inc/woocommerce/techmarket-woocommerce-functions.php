<?php

if ( ! function_exists( 'techmarket_get_shop_catalog_mode' ) ) {
	/**
	 * Shop Catelog Mode
	 * 
	 * @return bool
	 */
	function techmarket_get_shop_catalog_mode() {
		return apply_filters( 'techmarket_shop_catalog_mode', false );
	}
}

if ( ! function_exists( 'techmarket_format_sale_price' ) ) {
	/**
	 * Functions for getting parts of a price, in html, used by get_price_html.
	 */
	function techmarket_format_sale_price( $price, $regular_price, $sale_price ) {

		if ( ! is_product() ) {
			$price = '<ins>' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) : $sale_price ) . '</ins> <del>' . ( is_numeric( $regular_price ) ? wc_price( $regular_price ) : $regular_price ) . '</del>';
		}

		return apply_filters( 'techmarket_format_sale_price', $price, $regular_price, $sale_price );
	}
}

if ( ! function_exists( 'techmarket_get_sale_flash' ) ) {
	/**
	 * Functions for getting sale flash with sale amount.
	 */
	function techmarket_get_sale_flash( $html, $post, $product ) {
		$html = '<span class="onsale">-' . techmarket_get_savings_on_sale( $product ) . '</span>';

		return apply_filters( 'techmarket_get_sale_flash', $html, $post, $product );
	}
}

if ( ! function_exists( 'techmarket_add_template_atts_to_wc_shortcodes' ) ) {
	function techmarket_add_template_atts_to_wc_shortcodes( $out, $pairs, $atts, $shortcode ) {

		if ( array_key_exists( 'template', $atts ) ) {
			$out['template'] = $atts['template'];
		} else {
			$out['template'] = 'content-product';
		}

		return $out;
	}
}

if ( ! function_exists( 'techmarket_set_template_in_wc_shortcode' ) ) {
	function techmarket_set_template_in_wc_shortcode( $atts ) {
		if ( array_key_exists( 'template', $atts ) ) {
			if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '<' ) ) {
				global $woocommerce_loop;
				$woocommerce_loop['template'] = $atts['template'];
			} else {
				wc_set_loop_prop( 'template', $atts['template'] );
			}
		}
	}
}

/**
 * Ajax Product Categories Filter
 *
 * @since  1.0.0
 */
if( ! function_exists( 'techmarket_ajax_product_categories_filter' ) ) {
	function techmarket_ajax_product_categories_filter() {

		if( isset( $_REQUEST['shortcode_atts'] ) ) {
			$shortcode_tag = 'recent_products';
			$shortcode_atts = $_REQUEST['shortcode_atts'];
			if( ! empty( $shortcode_atts['category'] ) ) {
				$shortcode_tag = 'product_category';
			}

			echo techmarket_do_shortcode( $shortcode_tag, $shortcode_atts );
		}
		die();
	}
}

/**
 * Track product views.
 */
if( ! function_exists( 'techmarket_wc_track_product_view' ) ) {
	function techmarket_wc_track_product_view() {
		if ( ! is_singular( 'product' ) ) {
			return;
		}

		global $post;

		$limit = apply_filters( 'techmarket_wc_track_product_view_limit', 15 );

		if ( empty( $_COOKIE['techmarket_wc_recently_viewed'] ) ) {
			$viewed_products = array();
		} else {
			$viewed_products = (array) explode( '|', $_COOKIE['techmarket_wc_recently_viewed'] );
		}

		if ( ! in_array( $post->ID, $viewed_products ) ) {
			$viewed_products[] = $post->ID;
		}

		if ( sizeof( $viewed_products ) > $limit ) {
			array_shift( $viewed_products );
		}

		// Store for session only
		wc_setcookie( 'techmarket_wc_recently_viewed', implode( '|', $viewed_products ) );
	}
}

/**
 * Get viewed products
 *
 * @since  1.0.0
 */
if( ! function_exists( 'techmarket_get_viewed_products' ) ) {
	function techmarket_get_viewed_products() {
		
		$viewed_products = ! empty( $_COOKIE['techmarket_wc_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['techmarket_wc_recently_viewed'] ) : array();
		$viewed_products = array_reverse( array_filter( array_map( 'absint', $viewed_products ) ) );

		return $viewed_products;
	}
}

if( ! function_exists( 'techmarket_products_live_search' ) ) {
	function techmarket_products_live_search() {
		if ( isset( $_REQUEST['fn'] ) && 'get_ajax_search' == $_REQUEST['fn'] ) {

			if( isset( $_REQUEST['terms'] ) ) {
				$term = $_REQUEST['terms'];
			}

			if ( empty( $term ) ) {
				echo json_encode( array() );
				die();
			}

			$data_store = WC_Data_Store::load( 'product' );
			$ids        = $data_store->search_products( $term, '', false );

			$results = array();

			if( ! empty( $ids ) ) {
				$product_objects = wc_get_products( apply_filters( 'techmarket_live_search_query_args', array( 'status' => array( 'publish' ), 'orderby' => 'date', 'order' => 'DESC', 'limit' => 10, 'include' => $ids ) ) );

				foreach ( $product_objects as $product_object ) {
					$id = $product_object->get_id();
					$title = get_the_title( $id );
					$title = html_entity_decode( $title , ENT_QUOTES, 'UTF-8' );
					$price = $product_object->get_price_html();
					$brand = '';

					if ( has_post_thumbnail( $id ) ) {
						$post_thumbnail_ID = get_post_thumbnail_id( $id );
						$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_ID, 'thumbnail' );
					} else{
						$dimensions = wc_get_image_size( 'thumbnail' );
						$post_thumbnail_src = array(
							wc_placeholder_img_src(),
							esc_attr( $dimensions['width'] ),
							esc_attr( $dimensions['height'] )
						);
					}

					$brand_taxonomy = techmarket_get_brand_taxonomy();
					if( ! empty( $brand_taxonomy ) ) {
						$terms = wc_get_product_terms( $id, $brand_taxonomy, array( 'fields' => 'names' ) );
						if ( $terms && ! is_wp_error( $terms ) ) {
							$brand_links = array();
							foreach ( $terms as $term ) {
								if( isset($term->name) ) {
									$brand_links[] = $term->name;
								}
							}
							$brand = join( ", ", $brand_links );
						}
					}

					$results[] = apply_filters( 'techmarket_live_search_results_args', array(
						'value' 	=> $title,
						'url' 		=> get_permalink( $id ),
						'tokens' 	=> explode( ' ', $title ),
						'image' 	=> $post_thumbnail_src[0],
						'price'		=> $price,
						'brand'		=> $brand,
						'id'		=> $id
					), $product_object );
				}

				wp_reset_postdata();
			}
			echo json_encode( $results );
		}
		die();
	}
}

if ( ! function_exists( 'woocommerce_products_will_display' ) ) {
	/**
	 * Check if we will be showing products or not (and not sub-categories only).
	 * @subpackage	Loop
	 * @return bool
	 */
	function woocommerce_products_will_display() {
		global $wpdb;
		if ( is_shop() ) {
			return 'subcategories' !== get_option( 'woocommerce_shop_page_display' ) || is_search();
		}
		if ( ! is_product_taxonomy() ) {
			return false;
		}
		if ( is_search() || is_filtered() || is_paged() ) {
			return true;
		}
		$term = get_queried_object();
		if ( is_product_category() ) {
			switch ( get_term_meta( $term->term_id, 'display_type', true ) ) {
				case 'subcategories' :
					// Nothing - we want to continue to see if there are products/subcats
				break;
				case 'products' :
				case 'both' :
					return true;
				break;
				default :
					// Default - no setting
					if ( get_option( 'woocommerce_category_archive_display' ) != 'subcategories' ) {
						return true;
					}
				break;
			}
		}
		// Begin subcategory logic
		if ( empty( $term->term_id ) || empty( $term->taxonomy ) ) {
			return true;
		}
		if ( is_tax( 'product_brand' ) ) {
			return true;
		}
		$transient_name = 'wc_products_will_display_' . $term->term_id . '_' . WC_Cache_Helper::get_transient_version( 'product_query' );
		if ( false === ( $products_will_display = get_transient( $transient_name ) ) ) {
			$has_children = $wpdb->get_col( $wpdb->prepare( "SELECT term_id FROM {$wpdb->term_taxonomy} WHERE parent = %d AND taxonomy = %s", $term->term_id, $term->taxonomy ) );
			if ( $has_children ) {
				// Check terms have products inside - parents first. If products are found inside, subcats will be shown instead of products so we can return false.
				if ( sizeof( get_objects_in_term( $has_children, $term->taxonomy ) ) > 0 ) {
					$products_will_display = false;
				} else {
					// If we get here, the parents were empty so we're forced to check children
					foreach ( $has_children as $term_id ) {
						$children = get_term_children( $term_id, $term->taxonomy );
						if ( sizeof( get_objects_in_term( $children, $term->taxonomy ) ) > 0 ) {
							$products_will_display = false;
							break;
						}
					}
				}
			} else {
				$products_will_display = true;
			}
		}
		set_transient( $transient_name, $products_will_display, DAY_IN_SECONDS * 30 );
		return $products_will_display;
	}
}

require get_template_directory() . '/inc/woocommerce/functions/layout.php';
require get_template_directory() . '/inc/woocommerce/functions/shop-loop.php';
require get_template_directory() . '/inc/woocommerce/functions/single-product.php';
require get_template_directory() . '/inc/woocommerce/functions/cart.php';
require get_template_directory() . '/inc/woocommerce/functions/checkout.php';