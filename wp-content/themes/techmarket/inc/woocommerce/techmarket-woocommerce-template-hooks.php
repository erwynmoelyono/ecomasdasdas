<?php
/**
 * Techmarket WooCommerce hooks
 *
 * @package techmarket
 */

/**
 * Styles
 *
 * @see  techmarket_woocommerce_scripts()
 */
add_action( 'wp_enqueue_scripts', 'techmarket_product_label_style', 100 );


/**
 * Header
 *
 * @see  techmarket_header_compare()
 * @see  techmarket_header_wishlist()
 * @see  techmarket_header_cart()
 */
add_action( 'techmarket_header_v1', 'techmarket_header_compare', 60 );
add_action( 'techmarket_header_v1', 'techmarket_header_wishlist', 70 );
add_action( 'techmarket_header_v1', 'techmarket_header_cart',    80 );

add_action( 'techmarket_header_v2', 'techmarket_header_compare', 40 );
add_action( 'techmarket_header_v2', 'techmarket_header_wishlist', 50 );
add_action( 'techmarket_header_v2', 'techmarket_header_cart',    60 );

add_action( 'techmarket_header_v3', 'techmarket_header_compare', 40 );
add_action( 'techmarket_header_v3', 'techmarket_header_wishlist', 50 );
add_action( 'techmarket_header_v3', 'techmarket_header_cart',    60 );

add_action( 'techmarket_header_v4', 'techmarket_header_compare', 40 );
add_action( 'techmarket_header_v4', 'techmarket_header_wishlist', 50 );
add_action( 'techmarket_header_v4', 'techmarket_header_cart',    60 );

add_action( 'techmarket_header_v7', 'techmarket_header_compare', 40 );
add_action( 'techmarket_header_v7', 'techmarket_header_wishlist', 50 );
add_action( 'techmarket_header_v7', 'techmarket_header_cart',    60 );

add_action( 'techmarket_header_v8', 'techmarket_header_compare', 40 );
add_action( 'techmarket_header_v8', 'techmarket_header_wishlist', 50 );
add_action( 'techmarket_header_v8', 'techmarket_header_cart',    60 );

add_action( 'techmarket_header_v9', 'techmarket_header_compare', 40 );
add_action( 'techmarket_header_v9', 'techmarket_header_wishlist', 50 );
add_action( 'techmarket_header_v9', 'techmarket_header_cart',    60 );

add_action( 'techmarket_header_v10', 'techmarket_header_compare', 40 );
add_action( 'techmarket_header_v10', 'techmarket_header_wishlist', 50 );
add_action( 'techmarket_header_v10', 'techmarket_header_cart',    60 );

add_action( 'techmarket_handheld_header', 'techmarket_handheld_header_links', 20 );
add_action( 'techmarket_handheld_header', 'techmarket_handheld_header_cart_link', 60 );


/**
 * Filters
 */
add_filter( 'loop_end', 'techmarket_wc_reset_loop' );
add_filter( 'woocommerce_add_to_cart_fragments',    'techmarket_cart_link_fragment' );
add_filter( 'woocommerce_format_sale_price',        'techmarket_format_sale_price', 20, 3 );
add_filter( 'woocommerce_sale_flash',               'techmarket_get_sale_flash', 20, 3 );
add_filter( 'woocommerce_pagination_args',          'techmarket_set_pagination_args', 10 );

/**
 * Recently Viewed Products
 */
add_action( 'template_redirect', 'techmarket_wc_track_product_view', 20 );

/**
 * Products Live Search
 */
add_action( 'wp_ajax_nopriv_products_live_search',				'techmarket_products_live_search' );
add_action( 'wp_ajax_products_live_search',						'techmarket_products_live_search' );

/**
 * Ajax Product Categories Filter
 */
add_action( 'wp_ajax_nopriv_product_categories_filter',			'techmarket_ajax_product_categories_filter' );
add_action( 'wp_ajax_product_categories_filter',				'techmarket_ajax_product_categories_filter' );

/**
 * WooCommerce Shortcode Filters
 */
add_filter( 'shortcode_atts_product',               'techmarket_add_template_atts_to_wc_shortcodes', 20, 4 );
add_filter( 'shortcode_atts_product_category',      'techmarket_add_template_atts_to_wc_shortcodes', 20, 4 );
add_filter( 'shortcode_atts_products',              'techmarket_add_template_atts_to_wc_shortcodes', 20, 4 );
add_filter( 'shortcode_atts_recent_products',       'techmarket_add_template_atts_to_wc_shortcodes', 20, 4 );
add_filter( 'shortcode_atts_sale_products',         'techmarket_add_template_atts_to_wc_shortcodes', 20, 4 );
add_filter( 'shortcode_atts_best_selling_products', 'techmarket_add_template_atts_to_wc_shortcodes', 20, 4 );
add_filter( 'shortcode_atts_top_rated_products',    'techmarket_add_template_atts_to_wc_shortcodes', 20, 4 );
add_filter( 'shortcode_atts_featured_products',     'techmarket_add_template_atts_to_wc_shortcodes', 20, 4 );
add_filter( 'shortcode_atts_product_attribute',     'techmarket_add_template_atts_to_wc_shortcodes', 20, 4 );
add_filter( 'shortcode_atts_related_products',      'techmarket_add_template_atts_to_wc_shortcodes', 20, 4 );

add_action( 'woocommerce_shortcode_before_product_loop',               'techmarket_set_template_in_wc_shortcode', 20 );
add_action( 'woocommerce_shortcode_before_product_cat_loop',           'techmarket_set_template_in_wc_shortcode', 20 );
add_action( 'woocommerce_shortcode_before_product_category_loop',      'techmarket_set_template_in_wc_shortcode', 20 );
add_action( 'woocommerce_shortcode_before_products_loop',              'techmarket_set_template_in_wc_shortcode', 20 );
add_action( 'woocommerce_shortcode_before_recent_products_loop',       'techmarket_set_template_in_wc_shortcode', 20 );
add_action( 'woocommerce_shortcode_before_sale_products_loop',         'techmarket_set_template_in_wc_shortcode', 20 );
add_action( 'woocommerce_shortcode_before_best_selling_products_loop', 'techmarket_set_template_in_wc_shortcode', 20 );
add_action( 'woocommerce_shortcode_before_top_rated_products_loop',    'techmarket_set_template_in_wc_shortcode', 20 );
add_action( 'woocommerce_shortcode_before_featured_products_loop',     'techmarket_set_template_in_wc_shortcode', 20 );
add_action( 'woocommerce_shortcode_before_product_attribute_loop',     'techmarket_set_template_in_wc_shortcode', 20 );
add_action( 'woocommerce_shortcode_before_related_products_loop',      'techmarket_set_template_in_wc_shortcode', 20 );

require get_template_directory() . '/inc/woocommerce/template-hooks/layout.php';
require get_template_directory() . '/inc/woocommerce/template-hooks/shop-loop.php';
require get_template_directory() . '/inc/woocommerce/template-hooks/single-product.php';
require get_template_directory() . '/inc/woocommerce/template-hooks/checkout.php';
require get_template_directory() . '/inc/woocommerce/template-hooks/cart.php';
require get_template_directory() . '/inc/woocommerce/template-hooks/myaccount.php';