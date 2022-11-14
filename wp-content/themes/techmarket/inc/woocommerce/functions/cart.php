<?php
/**
 * Cart functions
 */

if ( ! function_exists( 'techmarket_cart_item_product_detail' ) ) {
	function techmarket_cart_item_product_detail( $product_name, $cart_item, $cart_item_key ) {

		if ( ! is_cart() ) {
			return $product_name;
		}

		$_product          = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

		$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

		if ( ! $product_permalink ) {
			$product_thumbnail = $thumbnail;
		} else {
			$product_thumbnail = sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
		}

		return apply_filters( 'techmarket_cart_item_product_detail', sprintf( '<div class="media cart-item-product-detail">%s<div class="media-body align-self-center">%s</div></div>', wp_kses_post( $product_thumbnail ), wp_kses_post( $product_name ) ), $cart_item, $cart_item_key );
	}
}

if ( ! function_exists( 'techmarket_append_cart_item_remove_link' ) ) {
	function techmarket_append_cart_item_remove_link( $product_item_price, $cart_item, $cart_item_key ) {

		if ( ! is_cart() ) {
			return $product_item_price;
		}

		$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
		$cart_remove_url = function_exists( 'wc_get_cart_remove_url' ) ? wc_get_cart_remove_url( $cart_item_key ) : WC()->cart->get_remove_url( $cart_item_key );

		return apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
			'%s <span class="product-remove"><a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a></span>',
			$product_item_price,
			esc_url( $cart_remove_url ),
			esc_attr__( 'Remove this item', 'techmarket' ),
			esc_attr( $product_id ),
			esc_attr( $_product->get_sku() )
		), $cart_item_key );
	}
}

if ( ! function_exists( 'techmarket_wc_cross_sell_display' ) ) {
	function techmarket_wc_cross_sell_display() {
		if ( is_checkout() ) {
			return;
		}

		$cross_sells = WC()->cart->get_cross_sells();

		if ( ! $cross_sells ) {
			return;
		}

		$carousel_args	= array(
			'slidesToShow'		=> 7,
			'slidesToScroll'	=> 3,
			'dots'				=> true,
			'arrows'			=> true,
			'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
			'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>',
			'responsive'		=> array(
				array(
					'breakpoint'	=> 767,
					'settings'		=> array(
						'slidesToShow'		=> 2,
						'slidesToScroll'	=> 2
					)
				),
				array(
					'breakpoint'	=> 780,
					'settings'		=> array(
						'slidesToShow'		=> 3,
						'slidesToScroll'	=> 3
					)
				),
				array(
					'breakpoint'	=> 1200,
					'settings'		=> array(
						'slidesToShow'		=> 4,
						'slidesToScroll'	=> 4
					)
				),
				array(
					'breakpoint'	=> 1400,
					'settings'		=> array(
						'slidesToShow'		=> 5,
						'slidesToScroll'	=> 5
					)
				)
			)
		);

		if( is_rtl() ) {
			$carousel_args['rtl'] = true;
			if( isset( $carousel_args['prevArrow'] ) && isset( $carousel_args['nextArrow'] ) ) {
				$carousel_args_temp_arrow = $carousel_args['prevArrow'];
				$carousel_args['prevArrow'] = $carousel_args['nextArrow'];
				$carousel_args['nextArrow'] = $carousel_args_temp_arrow;
			}
		}

		$args = apply_filters( 'techmarket_wc_cross_sell_display_args', array(
			'shortcode_tag'		=> 'products',
			'shortcode_atts'	=> array(
				'columns'			=> '7',
				'orderby' 			=> 'post__in',
				'ids'				=> implode( ',', $cross_sells ),
			),
			'carousel_args'		=> $carousel_args
		) );

		techmarket_get_template( '/templates/shop/cart/cross-sells.php', $args );
	}
}
