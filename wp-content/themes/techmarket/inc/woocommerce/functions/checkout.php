<?php
/**
 * Checkout related functions
 */

if ( ! function_exists( 'techmarket_hide_wc_checkout_cart_item_quantity' ) ) {
	function techmarket_hide_wc_checkout_cart_item_quantity( $item_quantity, $cart_item, $cart_item_key ) {
		if ( is_checkout() ) {
			return false;
		}

		return $item_quantity;
	}
}

if ( ! function_exists( 'techmarket_prepend_checkout_cart_item_quantity' ) ) {
	function techmarket_prepend_checkout_cart_item_quantity( $product_name, $cart_item, $cart_item_key ) {
		if ( ! is_checkout() ) {
			return $product_name;
		}

		return '<strong class="product-quantity">' . sprintf( '%s &times;', $cart_item['quantity'] ) . '</strong> '. $product_name;
	}
}