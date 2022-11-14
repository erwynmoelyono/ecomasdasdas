<?php
/**
 * All Hooks related to checkout page
 */

add_action( 'woocommerce_checkout_order_review',        'techmarket_wc_order_review_wrapper_open',         0 );
add_action( 'woocommerce_checkout_order_review',        'techmarket_wc_order_review_heading',              1 );
add_action( 'woocommerce_checkout_order_review',        'techmarket_wc_order_review_wrapper_close',       99 );
add_action( 'woocommerce_before_checkout_billing_form', 'techmarket_wc_billing_fields_wrapper_open',      10 );
add_action( 'woocommerce_after_checkout_billing_form',  'techmarket_wc_billing_fields_wrapper_close',     10 );

add_filter( 'woocommerce_checkout_cart_item_quantity',  'techmarket_hide_wc_checkout_cart_item_quantity', 10, 3 );
add_filter( 'woocommerce_cart_item_name',               'techmarket_prepend_checkout_cart_item_quantity', 10, 3 );