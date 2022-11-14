<?php
/**
 * WooCommerce Layout Functions
 */

if ( ! function_exists( 'techmarket_get_shop_layout' ) ) {
	function techmarket_get_shop_layout() {
		
		if ( is_product() ) {
			$layout = techmarket_get_single_product_layout();
		} else {
			$layout = apply_filters( 'techmarket_shop_layout', 'left-sidebar' );
		}

		return $layout;
	}
}

if( ! function_exists( 'techmarket_shop_archive_jumbotron' ) ) {
	function techmarket_shop_archive_jumbotron() {
		$static_block_id = '';
		$brands_taxonomy = techmarket_get_brand_taxonomy();

		if( is_shop() ) {
			$static_block_id = apply_filters( 'techmarket_shop_jumbotron_id', '' );
		} else if ( is_product_category() || is_tax( $brands_taxonomy ) ) {
			$term 				= get_queried_object();
			$term_id 			= $term->term_id;
			$static_block_id 	= get_term_meta( $term_id, 'static_block_id', true );
		}

		if( ! empty( $static_block_id ) ) {
			if ( function_exists( 'kc_do_shortcode' ) ) {
				$raw_content = kc_raw_content( $static_block_id );
				$content = kc_do_shortcode( $raw_content );
			} else {
				$static_block = get_post( $static_block_id );
				$content = do_shortcode( $static_block->post_content );
			}
			echo '<div class="shop-archive-header">' . $content . '</div>';
		}
	}
}