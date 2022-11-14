<?php
/**
 * Single Product Hooks
 */
remove_action( 'woocommerce_before_single_product_summary',	'woocommerce_show_product_images',				20 );
remove_action( 'woocommerce_single_product_summary',		'woocommerce_template_single_price',			10 );
remove_action( 'woocommerce_single_product_summary',		'woocommerce_template_single_add_to_cart',		30 );
remove_action( 'woocommerce_single_product_summary',		'woocommerce_template_single_meta',				40 );
remove_action( 'woocommerce_single_product_summary',		'woocommerce_template_single_sharing',			50 );

remove_action( 'woocommerce_after_single_product_summary',	'woocommerce_upsell_display',					15 );
remove_action( 'woocommerce_after_single_product_summary',	'woocommerce_output_related_products',			20 );

add_action( 'woocommerce_before_single_product_summary',	'techmarket_wrap_single_product',				0  );
add_action( 'woocommerce_before_single_product_summary',	'techmarket_wrap_product_images',				5  );
add_action( 'woocommerce_before_single_product_summary',	'techmarket_wc_show_product_images',			20 );
add_action( 'woocommerce_before_single_product_summary',	'techmarket_wrap_product_images_close',			30 );

add_action( 'woocommerce_single_product_summary', 			'techmarket_single_product_title_wrap_open',	4 );
add_action( 'woocommerce_single_product_summary', 			'techmarket_single_product_title_wrap_close',	7 );
add_action( 'woocommerce_single_product_summary', 			'techmarket_single_product_meta',				8  );
add_action( 'woocommerce_single_product_summary',			'techmarket_wrap_rating_and_sharing_open',		9  );
add_action( 'woocommerce_single_product_summary',			'woocommerce_template_single_sharing',			10 );
add_action( 'woocommerce_single_product_summary',			'techmarket_wrap_rating_and_sharing_close',		11 );
add_action( 'woocommerce_single_product_summary',			'techmarket_single_product_action', 			50 );

add_action( 'woocommerce_after_single_product_summary',		'techmarket_wrap_single_product_close',			9  );
add_action( 'woocommerce_after_single_product_summary',		'techmarket_related_display',					15 );
add_action( 'woocommerce_after_single_product_summary',		'techmarket_upsell_display',					20 );

add_action( 'techmarket_single_product_meta', 				'techmarket_single_product_brand',       		10 );
add_action( 'techmarket_single_product_meta', 				'techmarket_single_product_cat_and_sku', 		20 );
add_action( 'techmarket_single_product_meta',				'techmarket_single_product_label',      		30 );

add_action( 'techmarket_single_product_action', 			'woocommerce_template_single_price',			30 );
add_action( 'techmarket_single_product_action', 			'techmarket_template_single_add_to_cart',		40 );

add_action( 'woocommerce_before_single_product',			'techmarket_toggle_single_product_hooks',		10 );

add_action( 'woocommerce_review_before_comment_meta',	'techmarket_single_product_review_comment_text_inner_open', 9 );
add_action( 'woocommerce_review_meta',			'techmarket_single_product_review_comment_text_inner_close', 11 );

if ( ! function_exists( 'techmarket_toggle_single_product_hooks' ) ) {
	function techmarket_toggle_single_product_hooks() {

		$style 	= techmarket_get_single_product_style();
		$layout = techmarket_get_single_product_layout();

		if ( 'extended' === $style ) {
			remove_action( 'woocommerce_single_product_summary',		'techmarket_single_product_action', 	50 );
			remove_action( 'woocommerce_after_single_product_summary',	'woocommerce_output_product_data_tabs', 10 );
			add_action( 'woocommerce_after_single_product_summary',		'techmarket_single_product_action', 	8  );
			add_action( 'woocommerce_after_single_product_summary',		'techmarket_output_product_data_tabs', 	10 );
			add_action( 'techmarket_single_product_action', 			'techmarket_single_product_availability',		10 );
			add_action( 'techmarket_single_product_action', 			'techmarket_single_product_additional_info',	20 );
		} elseif( 'full-width' === $layout ) {
			remove_action( 'woocommerce_after_single_product_summary',	'woocommerce_output_product_data_tabs', 		10 );
			add_action( 'woocommerce_after_single_product_summary',		'woocommerce_output_product_data_tabs', 		18 );
		}
	}
}

add_filter( 'woocommerce_gallery_image_size', 'techmarket_wc_gallery_thumbnail_size' );