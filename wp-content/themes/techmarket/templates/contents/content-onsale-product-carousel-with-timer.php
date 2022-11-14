<?php
/**
 * The template for displaying sale product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php post_class( 'onsale-product-carousel-with-timer' ); ?>>
	<?php
	/**
	 * woocommerce_before_sale_product_with_timer_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_onsale_product_carousel_with_timer_item' );

	/**
	 * woocommerce_before_sale_product_with_timer_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_before_onsale_product_carousel_with_timer_item_title' );

	/**
	 * woocommerce_sale_product_with_timer_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_onsale_product_carousel_with_timer_item_title' );

	/**
	 * woocommerce_after_sale_product_with_timer_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_onsale_product_carousel_with_timer_item_title' );

	/**
	 * woocommerce_after_sale_product_with_timer_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_onsale_product_carousel_with_timer_item' );
	?>
</div>