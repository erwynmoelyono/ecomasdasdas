<?php
/**
 * Shop Archive Hooks
 */
remove_filter( 'woocommerce_product_loop_start',     'woocommerce_maybe_show_product_subcategories' );
remove_action( 'woocommerce_before_shop_loop',       'woocommerce_result_count',               20 );
remove_action( 'woocommerce_before_shop_loop',       'woocommerce_catalog_ordering',           30 );
remove_action( 'woocommerce_after_shop_loop',        'woocommerce_pagination',                 10 );

add_action( 'woocommerce_before_shop_loop', 				'techmarket_product_subcategories', 			0  );
add_action( 'woocommerce_before_shop_loop',					'techmarket_shop_control_bar',					11 );
add_action( 'woocommerce_before_shop_loop',					'techmarket_reset_woocommerce_loop', 			90 );

add_action( 'woocommerce_after_shop_loop',					'techmarket_shop_control_bar_bottom',			90 );

add_action( 'techmarket_shop_control_bar',					'techmarket_wc_handheld_sidebar',				4 );
add_action( 'techmarket_shop_control_bar',					'techmarket_wc_loop_title',						5 );
add_action( 'techmarket_shop_control_bar',					'techmarket_shop_view_switcher',				10 );
add_action( 'techmarket_shop_control_bar',					'techmarket_wc_products_per_page',				20 );
add_action( 'techmarket_shop_control_bar',					'woocommerce_catalog_ordering',					30 );
add_action( 'techmarket_shop_control_bar',					'techmarket_advanced_pagination',				40 );

add_action( 'techmarket_shop_control_bar_bottom',			'techmarket_wc_products_per_page',				10 );
add_action( 'techmarket_shop_control_bar_bottom',			'woocommerce_result_count',						20 );
add_action( 'techmarket_shop_control_bar_bottom',			'woocommerce_pagination',						30 );

add_action( 'woocommerce_shop_loop',						'techmarket_shop_loop',							10 );

add_filter( 'woocommerce_show_page_title',					'__return_false' );
add_filter( 'loop_shop_columns',							'techmarket_set_loop_shop_columns', 			10 );
add_filter( 'loop_shop_per_page', 							'techmarket_set_loop_shop_per_page', 			20 );

/**
 * Product Item
 */
remove_action( 'woocommerce_after_shop_loop_item_title',   'woocommerce_template_loop_rating',               5 );
remove_action( 'woocommerce_after_shop_loop_item_title',   'woocommerce_template_loop_price',               10 );
remove_action( 'woocommerce_after_shop_loop_item',         'woocommerce_template_loop_add_to_cart',         10 );

add_action( 'woocommerce_before_shop_loop_item_title',     'woocommerce_template_loop_price',               20 );
add_action( 'woocommerce_before_shop_loop_item',           'techmarket_wrap_shop_loop_product_inner',       0  );
add_action( 'woocommerce_after_shop_loop_item',            'techmarket_wc_template_loop_hover',             10 );
add_action( 'woocommerce_after_shop_loop_item',            'techmarket_wrap_shop_loop_product_inner_close', 30 );
add_action( 'techmarket_product_item_hover_area',          'woocommerce_template_loop_add_to_cart',         10 );

/**
 * Grid View Extended
 */
add_action( 'woocommerce_before_grid_extended_item_title', 	  'woocommerce_template_loop_product_link_open',  15 );
add_action( 'woocommerce_before_grid_extended_item_title', 	  'woocommerce_template_loop_product_thumbnail',  16 );
add_action( 'woocommerce_before_grid_extended_item_title', 	  'woocommerce_template_loop_price',              20 );

add_action( 'woocommerce_grid_extended_item_title',        	  'woocommerce_template_loop_product_title',      20 );

add_action( 'woocommerce_after_grid_extended_item_title', 	  'woocommerce_template_loop_product_link_close', 10 );
add_action( 'woocommerce_after_grid_extended_item_title',	  'techmarket_template_loop_rating',              15 );
add_action( 'woocommerce_after_grid_extended_item_title', 	  'techmarket_single_product_sku',                16 );
add_action( 'woocommerce_after_grid_extended_item_title',     'woocommerce_template_single_excerpt',          17 );
add_action( 'woocommerce_after_grid_extended_item_title',  	  'woocommerce_template_loop_add_to_cart',        18 );

/**
 * List View Large
 */
add_action( 'woocommerce_before_list_view_large_item',       'techmarket_template_loop_media_open',              10 );
add_action( 'woocommerce_before_list_view_large_item',       'woocommerce_template_loop_product_thumbnail',      20 );

add_action( 'woocommerce_before_list_view_large_item_title', 'techmarket_template_loop_media_body_open',         10 );
add_action( 'woocommerce_before_list_view_large_item_title', 'techmarket_wrap_shop_loop_product_info',           15 );
add_action( 'woocommerce_before_list_view_large_item_title', 'woocommerce_template_loop_product_link_open',      20 );

add_action( 'woocommerce_list_view_large_item_title',        'woocommerce_template_loop_product_title',          20 );

add_action( 'woocommerce_after_list_view_large_item_title',  'techmarket_template_loop_rating',                  5 );
add_action( 'woocommerce_after_list_view_large_item_title',  'woocommerce_template_loop_product_link_close',     10 );
add_action( 'woocommerce_after_list_view_large_item_title',  'techmarket_single_product_brand',                  20 );
add_action( 'woocommerce_after_list_view_large_item_title',  'woocommerce_template_single_excerpt',              30 );
add_action( 'woocommerce_after_list_view_large_item_title',  'techmarket_single_product_sku',                    40 );
add_action( 'woocommerce_after_list_view_large_item_title',  'techmarket_wrap_shop_loop_product_info_close',     44 );
add_action( 'woocommerce_after_list_view_large_item_title',  'techmarket_wrap_shop_loop_product_actions',        45 );
add_action( 'woocommerce_after_list_view_large_item_title',  'techmarket_single_product_availability',           50 );
add_action( 'woocommerce_after_list_view_large_item_title',  'techmarket_single_product_additional_info',        55 );
add_action( 'woocommerce_after_list_view_large_item_title',  'woocommerce_template_loop_price',                  60 );
add_action( 'woocommerce_after_list_view_large_item_title',  'woocommerce_template_loop_add_to_cart',            70 );
add_action( 'woocommerce_after_list_view_large_item_title',  'techmarket_wrap_shop_loop_product_actions_close',  85 );
add_action( 'woocommerce_after_list_view_large_item_title',  'techmarket_template_loop_media_body_close',        90 );

add_action( 'woocommerce_after_list_view_large_item',        'techmarket_template_loop_media_close',             10 );

/**
 * List View
 */
add_action( 'woocommerce_before_list_view_item',       'techmarket_template_loop_media_open',              10 );
add_action( 'woocommerce_before_list_view_item',       'woocommerce_template_loop_product_thumbnail',      20 );

add_action( 'woocommerce_before_list_view_item_title', 'techmarket_template_loop_media_body_open',         10 );
add_action( 'woocommerce_before_list_view_item_title', 'techmarket_wrap_shop_loop_product_info',           15 );
add_action( 'woocommerce_before_list_view_item_title', 'woocommerce_template_loop_product_link_open',      20 );

add_action( 'woocommerce_list_view_item_title',        'woocommerce_template_loop_product_title',          20 );

add_action( 'woocommerce_after_list_view_item_title',  'techmarket_template_loop_rating',                  5 );
add_action( 'woocommerce_after_list_view_item_title',  'woocommerce_template_loop_product_link_close',     10 );
add_action( 'woocommerce_after_list_view_item_title',  'techmarket_single_product_brand',                  20 );
add_action( 'woocommerce_after_list_view_item_title',  'woocommerce_template_single_excerpt',              30 );
// add_action( 'woocommerce_after_list_view_item_title',  'techmarket_single_product_sku',                    40 );
add_action( 'woocommerce_after_list_view_item_title',  'techmarket_wrap_shop_loop_product_info_close',     44 );
add_action( 'woocommerce_after_list_view_item_title',  'techmarket_wrap_shop_loop_product_actions',        45 );
add_action( 'woocommerce_after_list_view_item_title',  'techmarket_single_product_availability',           50 );
// add_action( 'woocommerce_after_list_view_item_title',  'techmarket_single_product_additional_info',        55 );
add_action( 'woocommerce_after_list_view_item_title',  'woocommerce_template_loop_price',                  60 );
add_action( 'woocommerce_after_list_view_item_title',  'woocommerce_template_loop_add_to_cart',            70 );
add_action( 'woocommerce_after_list_view_item_title',  'techmarket_wrap_shop_loop_product_actions_close',  85 );
add_action( 'woocommerce_after_list_view_item_title',  'techmarket_template_loop_media_body_close',        90 );

add_action( 'woocommerce_after_list_view_item',        'techmarket_template_loop_media_close',             10 );

/**
 * List View Small
 */
add_action( 'woocommerce_before_list_view_small_item',       'techmarket_template_loop_media_open',              10 );
add_action( 'woocommerce_before_list_view_small_item',       'woocommerce_template_loop_product_thumbnail',      20 );

add_action( 'woocommerce_before_list_view_small_item_title', 'techmarket_template_loop_media_body_open',         10 );
add_action( 'woocommerce_before_list_view_small_item_title', 'techmarket_wrap_shop_loop_product_info',           15 );
add_action( 'woocommerce_before_list_view_small_item_title', 'woocommerce_template_loop_product_link_open',      20 );

add_action( 'woocommerce_list_view_small_item_title',        'woocommerce_template_loop_product_title',          20 );

add_action( 'woocommerce_after_list_view_small_item_title',  'techmarket_template_loop_rating',                  5 );
add_action( 'woocommerce_after_list_view_small_item_title',  'woocommerce_template_loop_product_link_close',     10 );
// add_action( 'woocommerce_after_list_view_small_item_title',  'techmarket_single_product_brand',                  20 );
add_action( 'woocommerce_after_list_view_small_item_title',  'woocommerce_template_single_excerpt',              30 );
// add_action( 'woocommerce_after_list_view_small_item_title',  'techmarket_single_product_sku',                    40 );
add_action( 'woocommerce_after_list_view_small_item_title',  'techmarket_wrap_shop_loop_product_info_close',     44 );
add_action( 'woocommerce_after_list_view_small_item_title',  'techmarket_wrap_shop_loop_product_actions',        45 );
// add_action( 'woocommerce_after_list_view_small_item_title',  'techmarket_single_product_availability',           50 );
// add_action( 'woocommerce_after_list_view_small_item_title',  'techmarket_single_product_additional_info',        55 );
add_action( 'woocommerce_after_list_view_small_item_title',  'woocommerce_template_loop_price',                  60 );
add_action( 'woocommerce_after_list_view_small_item_title',  'woocommerce_template_loop_add_to_cart',            70 );
add_action( 'woocommerce_after_list_view_small_item_title',  'techmarket_wrap_shop_loop_product_actions_close',  85 );
add_action( 'woocommerce_after_list_view_small_item_title',  'techmarket_template_loop_media_body_close',        90 );

add_action( 'woocommerce_after_list_view_small_item',        'techmarket_template_loop_media_close',             10 );

/**
 * Sale Product with Counter
 */
add_action( 'woocommerce_before_sale_product_with_timer_item', 'woocommerce_template_loop_product_link_open', 10 );

add_action( 'woocommerce_before_sale_product_with_timer_item_title', 'techmarket_sale_product_with_timer_header_open', 10 );
add_action( 'woocommerce_before_sale_product_with_timer_item_title', 'techmarket_sale_product_with_timer_price_and_title_open', 20 );
add_action( 'woocommerce_before_sale_product_with_timer_item_title', 'woocommerce_template_loop_price', 20 );
add_action( 'woocommerce_sale_product_with_timer_item_title',        'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_sale_product_with_timer_item_title',        'techmarket_sale_product_with_timer_price_and_title_close', 20 );
add_action( 'woocommerce_after_sale_product_with_timer_item_title',  'techmarket_product_loop_sale_saved_label', 10 );
add_action( 'woocommerce_after_sale_product_with_timer_item_title',  'techmarket_sale_product_with_timer_header_close', 20 );

add_action( 'woocommerce_after_sale_product_with_timer_item_title', 'woocommerce_template_loop_product_thumbnail', 20 );
add_action( 'woocommerce_after_sale_product_with_timer_item_title', 'techmarket_sale_product_deal_progress_bar', 30 );
add_action( 'woocommerce_after_sale_product_with_timer_item_title', 'techmarket_sale_product_countdown_timer', 40 );

add_action( 'woocommerce_after_sale_product_with_timer_item',  'woocommerce_template_loop_product_link_close', 5 );

/**
 * On Sale Product Carousel Timer
 */
add_action( 'woocommerce_before_onsale_product_carousel_with_timer_item',       'techmarket_template_loop_media_open',          10 );
add_action( 'woocommerce_before_onsale_product_carousel_with_timer_item',       'techmarket_show_product_images',               20 );

add_action( 'woocommerce_before_onsale_product_carousel_with_timer_item_title', 'techmarket_template_loop_media_body_open',     10 );
add_action( 'woocommerce_before_onsale_product_carousel_with_timer_item_title', 'woocommerce_show_product_loop_sale_flash',     10 );
add_action( 'woocommerce_before_onsale_product_carousel_with_timer_item_title', 'woocommerce_template_loop_price',              20 );
add_action( 'woocommerce_before_onsale_product_carousel_with_timer_item_title', 'woocommerce_template_loop_product_link_open',  15 );

add_action( 'woocommerce_onsale_product_carousel_with_timer_item_title',        'woocommerce_template_loop_product_title',      20 );

add_action( 'woocommerce_after_onsale_product_carousel_with_timer_item_title',  'woocommerce_template_loop_product_link_close', 15 );
add_action( 'woocommerce_after_onsale_product_carousel_with_timer_item_title',  'techmarket_sale_product_deal_progress_bar',	 5 );
add_action( 'woocommerce_after_onsale_product_carousel_with_timer_item_title',  'woocommerce_template_loop_add_to_cart',        10 );
add_action( 'woocommerce_after_onsale_product_carousel_with_timer_item_title',  'techmarket_template_loop_media_body_close',    20 );

add_action( 'woocommerce_after_onsale_product_carousel_with_timer_item',        'techmarket_template_loop_media_close',         10 );

/**
 * Sale Product with Timer and Gallery
 */
add_action( 'woocommerce_before_product_carousel_with_timer_gallery_item',       'techmarket_template_loop_media_open',          10 );
add_action( 'woocommerce_before_product_carousel_with_timer_gallery_item_title', 'techmarket_template_loop_media_body_open',     10 );
add_action( 'woocommerce_before_product_carousel_with_timer_gallery_item_title', 'woocommerce_template_loop_product_link_open',  15 );
add_action( 'woocommerce_before_product_carousel_with_timer_gallery_item_title', 'techmarket_sale_product_countdown_timer',	     20 );
add_action( 'woocommerce_product_carousel_with_timer_gallery_item_title',        'woocommerce_template_loop_product_title',      20 );
add_action( 'woocommerce_after_product_carousel_with_timer_gallery_item_title',  'woocommerce_template_loop_price',              10 );
add_action( 'woocommerce_after_product_carousel_with_timer_gallery_item_title',  'techmarket_template_loop_rating',              20 );
add_action( 'woocommerce_after_product_carousel_with_timer_gallery_item_title',  'woocommerce_template_loop_product_link_close', 25 );
add_action( 'woocommerce_after_product_carousel_with_timer_gallery_item_title',  'woocommerce_template_loop_add_to_cart',        27 );
add_action( 'woocommerce_after_product_carousel_with_timer_gallery_item_title',  'techmarket_template_loop_media_body_close',    30 );
add_action( 'woocommerce_after_product_carousel_with_timer_gallery_item',        'techmarket_wrap_product_images',               10 );
add_action( 'woocommerce_after_product_carousel_with_timer_gallery_item',  		 'techmarket_product_loop_sale_saved_label',     15 );
add_action( 'woocommerce_after_product_carousel_with_timer_gallery_item',        'techmarket_show_product_images',               20 );
add_action( 'woocommerce_after_product_carousel_with_timer_gallery_item',        'techmarket_wrap_product_images_close',         30 );
add_action( 'woocommerce_after_product_carousel_with_timer_gallery_item',        'techmarket_template_loop_media_close',         40 );

/**
 * Landscape Product
 */
add_action( 'woocommerce_before_landscape_product_item',       'woocommerce_template_loop_product_link_open',  10 );
add_action( 'woocommerce_before_landscape_product_item',       'techmarket_template_loop_media_open',          20 );
add_action( 'woocommerce_before_landscape_product_item',       'woocommerce_template_loop_product_thumbnail',  30 );

add_action( 'woocommerce_before_landscape_product_item_title', 'techmarket_template_loop_media_body_open',     10 );
add_action( 'woocommerce_before_landscape_product_item_title', 'woocommerce_template_loop_price',              20 );

add_action( 'woocommerce_landscape_product_item_title',        'woocommerce_template_loop_product_title',      10 );

add_action( 'woocommerce_after_landscape_product_item_title',  'techmarket_template_loop_rating',              10 );
add_action( 'woocommerce_after_landscape_product_item_title',  'techmarket_template_loop_media_body_close',    20 );

add_action( 'woocommerce_after_landscape_product_item',        'techmarket_template_loop_media_close',         10 );
add_action( 'woocommerce_after_landscape_product_item',        'woocommerce_template_loop_product_link_close', 20 );

/**
 * Landscape Product Widget
 */
add_action( 'woocommerce_before_landscape_product_widget_item',       'woocommerce_template_loop_product_link_open',  10 );
add_action( 'woocommerce_before_landscape_product_widget_item',       'techmarket_template_loop_media_open',          20 );
add_action( 'woocommerce_before_landscape_product_widget_item',       'woocommerce_template_loop_product_thumbnail',  30 );

add_action( 'woocommerce_before_landscape_product_widget_item_title', 'techmarket_template_loop_media_body_open',     10 );
add_action( 'woocommerce_before_landscape_product_widget_item_title', 'woocommerce_template_loop_price',              20 );

add_action( 'woocommerce_landscape_product_widget_item_title',        'woocommerce_template_loop_product_title',      10 );

add_action( 'woocommerce_after_landscape_product_widget_item_title',  'techmarket_template_loop_rating',              10 );
add_action( 'woocommerce_after_landscape_product_widget_item_title',  'techmarket_template_loop_media_body_close',    20 );

add_action( 'woocommerce_after_landscape_product_widget_item',        'techmarket_template_loop_media_close',         10 );
add_action( 'woocommerce_after_landscape_product_widget_item',        'woocommerce_template_loop_product_link_close', 20 );

/**
 * Landscape Product card
 */
add_action( 'woocommerce_before_landscape_product_card_item',       'techmarket_template_loop_media_open',          10 );
add_action( 'woocommerce_before_landscape_product_card_item',       'woocommerce_template_loop_product_link_open',  20 );
add_action( 'woocommerce_before_landscape_product_card_item',       'woocommerce_template_loop_product_thumbnail',  30 );
add_action( 'woocommerce_before_landscape_product_card_item',       'woocommerce_template_loop_product_link_close', 40 );

add_action( 'woocommerce_before_landscape_product_card_item_title', 'techmarket_template_loop_media_body_open',     10 );
add_action( 'woocommerce_before_landscape_product_card_item_title', 'woocommerce_template_loop_product_link_open',  15 );
add_action( 'woocommerce_before_landscape_product_card_item_title', 'woocommerce_template_loop_price',              20 );

add_action( 'woocommerce_landscape_product_card_item_title',        'woocommerce_template_loop_product_title',      20 );

add_action( 'woocommerce_after_landscape_product_card_item_title',  'techmarket_template_loop_product_labels',	     5 );
add_action( 'woocommerce_after_landscape_product_card_item_title',  'techmarket_template_loop_rating',              10 );
add_action( 'woocommerce_after_landscape_product_card_item_title',  'woocommerce_template_loop_product_link_close', 15 );
add_action( 'woocommerce_after_landscape_product_card_item_title',  'techmarket_wc_template_loop_hover',        	16 );
add_action( 'woocommerce_after_landscape_product_card_item_title',  'techmarket_template_loop_media_body_close',    20 );

add_action( 'woocommerce_after_landscape_product_card_item',        'techmarket_template_loop_media_close',         10 );

/**
 * Landscape Product card featured
 */
add_action( 'woocommerce_before_landscape_product_card_featured_item',       'techmarket_template_loop_media_open',          10 );
add_action( 'woocommerce_before_landscape_product_card_featured_item',       'techmarket_show_product_images',               20 );

add_action( 'woocommerce_before_landscape_product_card_featured_item_title', 'techmarket_template_loop_media_body_open',     10 );
add_action( 'woocommerce_before_landscape_product_card_featured_item_title', 'woocommerce_template_loop_product_link_open',  15 );
add_action( 'woocommerce_before_landscape_product_card_featured_item_title', 'woocommerce_template_loop_price',              20 );

add_action( 'woocommerce_landscape_product_card_featured_item_title',        'woocommerce_template_loop_product_title',      20 );

add_action( 'woocommerce_after_landscape_product_card_featured_item_title',  'techmarket_template_loop_product_labels',	     5 );
add_action( 'woocommerce_after_landscape_product_card_featured_item_title',  'techmarket_template_loop_rating',              10 );
add_action( 'woocommerce_after_landscape_product_card_featured_item_title',  'woocommerce_template_loop_product_link_close', 15 );
add_action( 'woocommerce_after_landscape_product_card_featured_item_title',  'woocommerce_template_single_excerpt',        	 16 );
add_action( 'woocommerce_after_landscape_product_card_featured_item_title',  'woocommerce_template_loop_add_to_cart',        17 );
add_action( 'woocommerce_after_landscape_product_card_featured_item_title',  'techmarket_template_loop_media_body_close',    20 );

add_action( 'woocommerce_after_landscape_product_card_featured_item',        'techmarket_template_loop_media_close',         10 );

/**
 * Product featured
 */
add_action( 'woocommerce_before_product_featured_item_title', 'woocommerce_template_loop_product_link_open',  15 );
add_action( 'woocommerce_before_product_featured_item_title', 'woocommerce_template_loop_product_thumbnail',  16 );
add_action( 'woocommerce_before_product_featured_item_title', 'woocommerce_template_loop_price',              20 );

add_action( 'woocommerce_product_featured_item_title',        'woocommerce_template_loop_product_title',      20 );

add_action( 'woocommerce_after_product_featured_item_title',  'woocommerce_template_loop_product_link_close', 10 );
add_action( 'woocommerce_after_product_featured_item_title',  'techmarket_template_loop_rating',              15 );
add_action( 'woocommerce_after_product_featured_item_title',  'woocommerce_template_loop_add_to_cart',        17 );

/**
 * Tab Product featured
 */
add_action( 'woocommerce_before_tab_product_featured_item_title', 'woocommerce_template_loop_product_link_open',        15 );
add_action( 'woocommerce_before_tab_product_featured_item_title', 'techmarket_template_loop_single_product_thumbnail',  16 );
add_action( 'woocommerce_before_tab_product_featured_item_title', 'woocommerce_template_loop_price',                    20 );

add_action( 'woocommerce_tab_product_featured_item_title',        'woocommerce_template_loop_product_title',            20 );

add_action( 'woocommerce_after_tab_product_featured_item_title',  'woocommerce_template_loop_product_link_close',       10 );
add_action( 'woocommerce_after_tab_product_featured_item_title',  'techmarket_template_loop_rating',                    15 );
add_action( 'woocommerce_after_tab_product_featured_item_title',  'woocommerce_template_loop_add_to_cart',              17 );

/**
 * Product with rating
 */
add_action( 'woocommerce_before_product_with_rating_item',           'techmarket_wrap_shop_loop_product_inner',       0  );
add_action( 'woocommerce_before_product_with_rating_item_title', 	  'woocommerce_template_loop_product_link_open',  15 );
add_action( 'woocommerce_before_product_with_rating_item_title', 	  'woocommerce_template_loop_product_thumbnail',  16 );
add_action( 'woocommerce_before_product_with_rating_item_title', 	  'woocommerce_template_loop_price',              20 );

add_action( 'woocommerce_product_with_rating_item_title',        	  'woocommerce_template_loop_product_title',      20 );

add_action( 'woocommerce_after_product_with_rating_item_title', 	  'woocommerce_template_loop_product_link_close', 10 );
add_action( 'woocommerce_after_product_with_rating_item_title',		  'techmarket_template_loop_rating',              15 );
add_action( 'woocommerce_after_product_with_rating_item_title',  	  'techmarket_wc_template_loop_hover',        	  17 );
add_action( 'woocommerce_after_product_with_rating_item',            'techmarket_wrap_shop_loop_product_inner_close', 30 );

/**
 * Product Isotope
 */
add_action( 'woocommerce_before_product_isotope_item_title', 	  'woocommerce_show_product_loop_sale_flash',      		 9 );
add_action( 'woocommerce_before_product_isotope_item_title', 	  'woocommerce_template_loop_product_link_open',  		10 );
add_action( 'woocommerce_before_product_isotope_item_title', 	  'techmarket_template_loop_product_isotope_thumbnail', 16 );
add_action( 'woocommerce_before_product_isotope_item_title', 	  'woocommerce_template_loop_product_link_close', 		20 );

add_action( 'woocommerce_product_isotope_item_title', 			  'woocommerce_template_loop_product_link_open',  		15 );
add_action( 'woocommerce_product_isotope_item_title', 			  'woocommerce_template_loop_price',              		20 );
add_action( 'woocommerce_product_isotope_item_title',        	  'woocommerce_template_loop_product_title',      		20 );

add_action( 'woocommerce_after_product_isotope_item_title', 	  'woocommerce_template_loop_product_link_close', 		10 );
add_action( 'woocommerce_after_product_isotope_item_title',  	  'techmarket_wc_template_loop_hover',        	  		20 );
