<?php
/**
 * WooCommerce Extensions Integrations
 *
 * @package techmarket
 */

if ( techmarket_is_yith_wcwl_activated() ) {

	global $yith_wcwl;

	function techmarket_add_to_wishlist_button() {
		echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
	}

	add_action( 'woocommerce_single_product_summary',				'techmarket_add_to_wishlist_button', 5 );
	add_action( 'woocommerce_before_shop_loop_item',				'techmarket_add_to_wishlist_button', 5 );
	add_action( 'woocommerce_before_grid_extended_item',			'techmarket_add_to_wishlist_button', 5 );
	add_action( 'woocommerce_before_list_view_large_item_title',	'techmarket_add_to_wishlist_button', 17 );
	add_action( 'woocommerce_before_list_view_item_title',			'techmarket_add_to_wishlist_button', 17 );
	add_action( 'woocommerce_before_list_view_small_item_title',	'techmarket_add_to_wishlist_button', 17 );
	add_action( 'woocommerce_before_landscape_product_card_item',	'techmarket_add_to_wishlist_button', 10 );
	add_action( 'woocommerce_before_product_isotope_item_title',	'techmarket_add_to_wishlist_button', 5 );

	if( property_exists( $yith_wcwl, 'wcwl_init' ) ) {
		remove_action( 'wp_enqueue_scripts', array( $yith_wcwl->wcwl_init, 'enqueue_styles_and_stuffs' ) );
	}

	if( ! function_exists( 'techmarket_get_wishlist_page_id' ) ){
		/**
		 * Gets the page ID of wishlist page
		 * 
		 * @return int
		 */
		function techmarket_get_wishlist_page_id() {
			$wishlist_page_id = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) );
			return $wishlist_page_id;
		}
	}

	if( ! function_exists( 'techmarket_is_wishlist_page' ) ) {
		/**
		 * Conditional tag to determine if a page is a wishlist page or not
		 *
		 * @return boolean
		 */
		function techmarket_is_wishlist_page() {
			$wishlist_page_id = techmarket_get_wishlist_page_id();
			return is_page( $wishlist_page_id );
		}
	}

	if( ! function_exists( 'techmarket_get_wishlist_url') ) {
		/**
		 * Returns URL of wishlist page
		 *
		 * @return string
		 */
		function techmarket_get_wishlist_url(){
			$wishlist_page_id = techmarket_get_wishlist_page_id();
			return get_permalink( $wishlist_page_id );
		}
	}

	if ( ! function_exists( 'techmarket_handheld_header_wishlist_link') ) {
		function techmarket_handheld_header_wishlist_link() { ?>
			<a href="<?php echo esc_attr( techmarket_get_wishlist_url() ); ?>" class="has-icon"><i class="tm-wishlist-icon <?php echo esc_attr( apply_filters( 'techmarket_wishlist_icon', 'tm tm-favorites' ) ); ?>"></i><span class="tm-wcwl-ajax-count count"><?php echo yith_wcwl_count_products(); ?></span></a><?php
		}
	}

	if( ! function_exists( 'techmarket_wcwl_ajax_update_count' ) ) {
		function techmarket_wcwl_ajax_update_count(){
			wp_send_json( array(
				'count' => yith_wcwl_count_all_products()
			) );
		}
	}

	add_action( 'wp_ajax_tm_wcwl_update_wishlist_count', 'techmarket_wcwl_ajax_update_count' );
	add_action( 'wp_ajax_nopriv_tm_wcwl_update_wishlist_count', 'techmarket_wcwl_ajax_update_count' );
}

if( techmarket_is_yith_woocompare_activated() ) {

	global $yith_woocompare;

	remove_action( 'woocommerce_single_product_summary', array( $yith_woocompare->obj , 'add_compare_link' ), 35 );

	function techmarket_add_compare_url_to_localize_data( $data ) {
		$data[ 'compare_page_url' ] = techmarket_get_compare_page_url();
		return $data;
	}

	add_filter( 'techmarket_localize_script_data', 'techmarket_add_compare_url_to_localize_data' );

	function techmarket_add_to_compare_link() {
		
		global $product, $yith_woocompare;
        $product_id = $product->get_id();

        $button_text = get_option( 'yith_woocompare_button_text', esc_html__( 'Add to Compare', 'techmarket' ) );
        $button_text = function_exists( 'icl_translate' ) ? icl_translate( 'Plugins', 'plugin_yit_compare_button_text', $button_text ) : $button_text;

        if( ! is_admin() ) {
        	echo apply_filters( 'techmarket_add_to_compare_link', sprintf( 
				'<a href="%s" class="%s" data-product_id="%d">%s</a>', 
				$yith_woocompare->obj->add_product_url( $product_id ),
				'add-to-compare-link',
				$product_id,
				$button_text
			) );
        }
	}

	add_action( 'techmarket_single_product_action',                              'techmarket_add_to_compare_link', 50 );
	add_action( 'techmarket_product_item_hover_area',                            'techmarket_add_to_compare_link', 20 );
	add_action( 'woocommerce_after_grid_extended_item_title',                    'techmarket_add_to_compare_link', 20 );
	add_action( 'woocommerce_after_list_view_large_item_title',                  'techmarket_add_to_compare_link', 80 );
	add_action( 'woocommerce_after_list_view_item_title',                        'techmarket_add_to_compare_link', 80 );
	add_action( 'woocommerce_after_list_view_small_item_title',                  'techmarket_add_to_compare_link', 80 );
	add_action( 'woocommerce_after_landscape_product_card_featured_item_title',  'techmarket_add_to_compare_link', 18 );
	
	function techmarket_update_yith_compare_options( $options ) {
		
		foreach( $options['general'] as $key => $option ) {
			
			if( $option['id'] == 'yith_woocompare_auto_open' ) {
				$options['general'][$key]['std'] = 'no';
				$options['general'][$key]['default'] = 'no';
			}
		
		}
		
		return $options;
	}
	
	add_filter( 'yith_woocompare_tab_options', 'techmarket_update_yith_compare_options' );

	if( ! function_exists( 'techmarket_get_compare_page_id' ) ) {
		/**
		 * Gets page ID of product comparision page
		 *
		 * @return int
		 */
		function techmarket_get_compare_page_id() {
			$compare_page_id = apply_filters( 'techmarket_product_comparison_page_id', 0 );
			
			if( 0 !== $compare_page_id && function_exists( 'icl_object_id' ) ) {
				$compare_page_id = icl_object_id( $compare_page_id, 'page' );
			}

			return $compare_page_id;
		}
	}

	if( ! function_exists( 'techmarket_get_compare_page_url' ) ) {
		/**
		 * Returns URL of Product Comparision Page
		 *
		 * @return string
		 */
		function techmarket_get_compare_page_url() {
			$compare_page_id = techmarket_get_compare_page_id();
			$compare_page_url = '#';

			if( 0 !== $compare_page_id ) {
				$compare_page_url = get_permalink( $compare_page_id );
			}

			return $compare_page_url;
		}
	}

	if ( ! function_exists( 'techmarket_handheld_header_compare_link') ) {
		function techmarket_handheld_header_compare_link() { 
			global $yith_woocompare; ?>
			<a href="<?php echo esc_attr( techmarket_get_compare_page_url() ); ?>" class="has-icon"><i class="tm-compare-icon <?php echo esc_attr( apply_filters( 'techmarket_compare_icon', 'tm tm-compare' ) ); ?>"></i><span class="tm-woocompare-ajax-count count"><?php echo count( $yith_woocompare->obj->products_list ); ?></span></a><?php
		}
	}
}

if ( techmarket_is_yith_wcan_activated() ) {
	add_action( 'woocommerce_before_shop_loop', 'techmarket_wcan_wrap_start', 10 );
	add_action( 'woocommerce_after_shop_loop', 'techmarket_wcan_wrap_end', 91 );

	function techmarket_wcan_wrap_start() {
		?><div class="wcan-products-container"><?php
	}

	function techmarket_wcan_wrap_end() {
		?></div><!-- /.wcan-products-container --><?php
	}

	function techmarket_wcan_custom_scripts() {
		if ( yith_wcan_can_be_displayed() ) {
			$custom_script = "
				(function($) {
					$( document ).on( 'yith-wcan-ajax-filtered', function( e, response ) {
						if ( $(response).find( '.wcan-products-container' ).length > 0 ) {
							$( '.wcan-products-container' ).html( $(response).find( '.wcan-products-container' ).html() );
						} else if ( $(response).find( '.woocommerce-info' ).length > 0 ) {
							$( '.wcan-products-container' ).html( $(response).find( '.woocommerce-info' ) );
						}
					} );
				})(jQuery);
			";
			wp_add_inline_script( 'techmarket-scripts', $custom_script );
		}
	}

	add_action( 'wp_enqueue_scripts', 'techmarket_wcan_custom_scripts', 20 );
}

/**
 * WooCommerce Quantity Increment Plugin
 */
add_action( 'wp_enqueue_scripts', 'wcs_dequeue_quantity' );
function wcs_dequeue_quantity() {
    wp_dequeue_style( 'wcqi-css' );
}