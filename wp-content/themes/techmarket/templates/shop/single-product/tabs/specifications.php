<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$product_id                        = $product->get_id();
$specifications                    = get_post_meta( $product_id, '_specifications', true );
$specifications_display_attributes = get_post_meta( $product_id, '_specifications_display_attributes', true );
$shop_attributes_style             = apply_filters( 'techmarket_shop_attributes_style', get_post_meta( $product_id, '_specifications_attributes_style', true ) );
$shop_attributes_columns           = apply_filters( 'techmarket_shop_attributes_columns', get_post_meta( $product_id, '_specifications_attributes_columns', true ) );
$shop_attribute_detail_classes     = 'tm-shop-attributes-detail';
$default_shop_attributes_columns   = apply_filters( 'techmarket_default_attr_col', '3' );

if ( $shop_attributes_style != 'like_column' && $shop_attributes_style != 'like_table' ) {
	$shop_attributes_style = apply_filters( 'techmarket_default_attr_style', 'like_column' );
}

if ( 'like_column' == $shop_attributes_style ) {
	$shop_attribute_detail_classes .= ' like-column';
	$shop_attributes_columns  = empty( $shop_attributes_columns ) ? $default_shop_attributes_columns : $shop_attributes_columns;
	$shop_attribute_detail_classes .= ' columns-' . $shop_attributes_columns;	
} else {
	$shop_attribute_detail_classes .= ' like-table';
}

echo '<div class="' . esc_attr( $shop_attribute_detail_classes ) . '">';

if ( $specifications_display_attributes == 'yes' && ( $product->has_attributes() || ( apply_filters( 'wc_product_enable_dimensions_display', true ) && ( $product->has_dimensions() || $product->has_weight() ) ) ) ) {
	$attributes_title = get_post_meta( $product_id, '_specifications_attributes_title', true );
	
	if ( $attributes_title ) {
		echo wp_kses_post( '<h3 class="tm-attributes-title">' . $attributes_title . '</h3>' );
	}

	wc_display_product_attributes( $product );
}

echo apply_filters( 'the_content', wp_kses_post( $specifications ) );

echo '</div>';