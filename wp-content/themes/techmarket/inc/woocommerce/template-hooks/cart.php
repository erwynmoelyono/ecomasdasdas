<?php
/**
 * Hooks for Cart page
 */

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

add_action( 'woocommerce_before_cart', 		   'techmarket_wc_cart_wrap_open',   	      10 );
add_action( 'woocommerce_after_cart',  		   'techmarket_wc_cart_wrap_close',  	      10 );
add_action( 'woocommerce_after_cart',          'techmarket_wc_cross_sell_display', 	      20 );

add_action( 'woocommerce_proceed_to_checkout', 'woocommerce_shipping_calculator',         10 );
add_action( 'woocommerce_proceed_to_checkout', 'techmarket_wc_link_back_to_shop',         30 );
add_action( 'woocommerce_after_cart_totals',   'techmarket_shop_features',                10 );

add_filter( 'woocommerce_cart_item_name',      'techmarket_cart_item_product_detail',     10, 3 );
add_filter( 'woocommerce_cart_item_subtotal',  'techmarket_append_cart_item_remove_link', 10, 3 );

add_action( 'woocommerce_before_mini_cart',    'techmarket_remove_cart_item_product_detail_filter', 20 );
add_action( 'woocommerce_after_mini_cart',     'techmarket_add_cart_item_product_detail_filter',    20 );

if ( ! function_exists( 'techmarket_remove_cart_item_product_detail_filter' ) ) {
    function techmarket_remove_cart_item_product_detail_filter() {
        remove_filter( 'woocommerce_cart_item_name', 'techmarket_cart_item_product_detail', 10 );
    }
}

if ( ! function_exists( 'techmarket_add_cart_item_product_detail_filter' ) ) {
    function techmarket_add_cart_item_product_detail_filter() {
        add_filter( 'woocommerce_cart_item_name', 'techmarket_cart_item_product_detail', 10, 3 );
    }
}
