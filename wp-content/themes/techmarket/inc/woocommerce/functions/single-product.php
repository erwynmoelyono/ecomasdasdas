<?php
/**
 * Functions used in WooCommerce
 */

if ( ! function_exists( 'techmarket_get_single_product_layout' ) ) {
	function techmarket_get_single_product_layout() {
		
		$layout         = apply_filters( 'techmarket_single_product_layout', 'full-width' );
		$product_layout = get_post_meta( get_the_ID(), '_product_layout', true );
		
		if( ! empty( $product_layout ) ) {
			$layout = $product_layout;
		}

		return $layout;
	}
}

if ( ! function_exists( 'techmarket_get_single_product_style' ) ) {
	function techmarket_get_single_product_style() {
		
		$style 	= 'normal';

		if ( 'full-width' === techmarket_get_single_product_layout() ) {
			$style 	= apply_filters( 'techmarket_single_product_style', 'normal' );
			$product_style = get_post_meta( get_the_ID(), '_product_style', true );

			if( ! empty( $product_style ) ) {
				$style = $product_style;
			}
		}

		return $style;
	}
}

if ( ! function_exists( 'techmarket_product_thumbnails_columns' ) ) {
	function techmarket_product_thumbnails_columns( $columns ) {
		
		if( is_product() ) {
			return '5';
		}

		return $columns;
	}
}

if( ! function_exists( 'techmarket_template_single_add_to_cart' ) ) {
	function techmarket_template_single_add_to_cart() {
		global $product;
		
		if( techmarket_get_shop_catalog_mode() == false ) {
			do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart'  );
		} elseif( techmarket_get_shop_catalog_mode() == true && $product->is_type( 'external' ) ) {
			do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart'  );
		}
	}
}