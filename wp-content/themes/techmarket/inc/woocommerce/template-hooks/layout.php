<?php
/**
 * WooCommerce Layout Hooks
 */
remove_action( 'woocommerce_before_main_content', 			'woocommerce_breadcrumb', 						20, 0 );
remove_action( 'woocommerce_before_main_content', 			'woocommerce_output_content_wrapper', 			10 );
remove_action( 'woocommerce_after_main_content', 			'woocommerce_output_content_wrapper_end', 		10 );
remove_action( 'woocommerce_sidebar', 						'woocommerce_get_sidebar', 						10 );
add_action( 'woocommerce_before_main_content', 				'techmarket_before_wc_content', 				10 );
add_action( 'woocommerce_before_main_content',				'techmarket_shop_archive_jumbotron',			50 );
add_action( 'woocommerce_after_main_content', 				'techmarket_after_wc_content', 					10 );

add_action( 'techmarket_before_footer_v1',					'techmarket_shop_before_footer_content',		10 );
add_action( 'techmarket_shop_before_footer_content',		'techmarket_shop_footer_products_carousel',		10 );
add_action( 'techmarket_shop_before_footer_content',		'techmarket_shop_footer_brands_carousel',		20 );