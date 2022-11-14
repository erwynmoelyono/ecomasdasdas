<?php

if ( ! function_exists( 'techmarket_wc_order_review_wrapper_open' ) ) {
	function techmarket_wc_order_review_wrapper_open() {
		?><div class="order-review-wrapper"><?php
	}
}

if ( ! function_exists( 'techmarket_wc_order_review_wrapper_close' ) ) {
	function techmarket_wc_order_review_wrapper_close() {
		?></div><!-- /.order-review-wrapper --><?php
	}
}

if ( ! function_exists( 'techmarket_wc_order_review_heading' ) ) {
	function techmarket_wc_order_review_heading(){
		?><h3 class="order_review_heading"><?php echo esc_html__( 'Your Order', 'techmarket' ); ?></h3><?php
	}
}

if ( ! function_exists( 'techmarket_wc_billing_fields_wrapper_open' ) ) {
	function techmarket_wc_billing_fields_wrapper_open() {
		?><div class="woocommerce-billing-fields__field-wrapper-outer"><?php
	}
}

if ( ! function_exists( 'techmarket_wc_billing_fields_wrapper_close' ) ) {
	function techmarket_wc_billing_fields_wrapper_close() {
		?></div><!-- /.woocommerce-billing-fields__field-wrapper --><?php
	}
}
