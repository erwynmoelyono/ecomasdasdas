<?php
/**
 * Filter functions for Custom Code Section of Theme Options
 */

if ( ! function_exists( 'redux_apply_custom_css' ) ) {
	function redux_apply_custom_css() {
		global $techmarket_options;

		if( isset( $techmarket_options['custom_css'] ) && trim( $techmarket_options['custom_css'] ) != '' ) {
			$custom_css_handle = 'techmarket-style';
			if ( isset( $techmarket_options['use_predefined_color'] ) && $techmarket_options['use_predefined_color'] ) {
				$custom_css_handle = 'techmarket-color';
			} elseif( techmarket_is_woocommerce_activated() ) {
				$custom_css_handle = 'techmarket-woocommerce-style';
			}
			wp_add_inline_style( $custom_css_handle, $techmarket_options['custom_css'] );
		}
	}
}
