<?php
/**
 * All WC Vendors Related functions
 */

add_action( 'wp_enqueue_scripts', 'techmarket_wc_vendors_scripts', 20 );

add_filter( 'techmarket_shop_jumbotron_id', 'techmarket_wc_vendors_shop_jumbotron_id', 100 );

add_filter( 'wcv_before_seller_info_tab', 'techmarket_wc_vendors_product_tab_seller_info_before_content' );

add_action( 'wp_loaded', 'techmarket_wc_vendors_wp_loaded' );