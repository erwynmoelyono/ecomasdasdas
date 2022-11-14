<?php
/**
 * Techmarket hooks
 *
 * @package techmarket
 */

/**
 * General
 *
 * @see  techmarket_get_sidebar()
 */
add_action( 'after_setup_theme',         'techmarket_template_debug_mode',  20 );
add_action( 'techmarket_sidebar',        'techmarket_get_sidebar',          10 );
add_action( 'techmarket_content_top', 	 'techmarket_breadcrumb', 			10 );

/**
 * Header
 *
 * @see  techmarket_skip_links()
 * @see  techmarket_header_top_bar()
 * @see  techmarket_secondary_navigation()
 * @see  techmarket_site_branding()
 * @see  techmarket_primary_navigation()
 */
add_action( 'techmarket_before_header_v1', 	'techmarket_skip_links', 					0 );
add_action( 'techmarket_before_header_v1', 	'techmarket_header_top_bar', 				5 );

add_action( 'techmarket_header_v1', 		'techmarket_sticky_wrap_start', 			7 );
add_action( 'techmarket_header_v1', 		'techmarket_row_wrap_start', 				8 );
add_action( 'techmarket_header_v1', 		'techmarket_site_branding', 				10 );
add_action( 'techmarket_header_v1', 		'techmarket_primary_navigation', 			20 );
add_action( 'techmarket_header_v1', 		'techmarket_secondary_navigation', 			30 );
add_action( 'techmarket_header_v1', 		'techmarket_row_wrap_end', 					32 );
add_action( 'techmarket_header_v1', 		'techmarket_sticky_wrap_end', 				33 );
add_action( 'techmarket_header_v1', 		'techmarket_row_wrap_start', 				38 );
add_action( 'techmarket_header_v1', 		'techmarket_departments_menu', 				40 );
add_action( 'techmarket_header_v1', 		'techmarket_navbar_search', 				50 );
add_action( 'techmarket_header_v1', 		'techmarket_row_wrap_end', 					82 );

add_action( 'techmarket_before_header_v2', 	'techmarket_skip_links', 					0 );
add_action( 'techmarket_before_header_v2', 	'techmarket_header_top_bar', 				5 );

add_action( 'techmarket_header_v2', 		'techmarket_row_wrap_start', 				8 );
add_action( 'techmarket_header_v2', 		'techmarket_site_branding', 				10 );
add_action( 'techmarket_header_v2', 		'techmarket_departments_menu', 				20 );
add_action( 'techmarket_header_v2', 		'techmarket_navbar_search', 				30 );
add_action( 'techmarket_header_v2', 		'techmarket_row_wrap_end', 					62 );
add_action( 'techmarket_header_v2', 		'techmarket_sticky_wrap_start', 			67 );
add_action( 'techmarket_header_v2', 		'techmarket_row_wrap_start', 				68 );
add_action( 'techmarket_header_v2', 		'techmarket_navbar_primary_menu', 			70 );
add_action( 'techmarket_header_v2', 		'techmarket_row_wrap_end', 					72 );
add_action( 'techmarket_header_v2', 		'techmarket_sticky_wrap_end', 				73 );

add_action( 'techmarket_before_header_v3', 	'techmarket_skip_links', 					0 );
add_action( 'techmarket_before_header_v3', 	'techmarket_header_top_bar', 				5 );

add_action( 'techmarket_header_v3', 		'techmarket_sticky_wrap_start', 			7 );
add_action( 'techmarket_header_v3', 		'techmarket_row_wrap_start', 				8 );
add_action( 'techmarket_header_v3', 		'techmarket_site_branding', 				10 );
add_action( 'techmarket_header_v3', 		'techmarket_departments_menu', 				20 );
add_action( 'techmarket_header_v3', 		'techmarket_navbar_search', 				30 );
add_action( 'techmarket_header_v3', 		'techmarket_row_wrap_end', 					62 );
add_action( 'techmarket_header_v3', 		'techmarket_sticky_wrap_end', 				63 );

add_action( 'techmarket_before_header_v4', 	'techmarket_skip_links', 					0 );
add_action( 'techmarket_before_header_v4', 	'techmarket_header_top_bar', 				5 );

add_action( 'techmarket_header_v4', 		'techmarket_sticky_wrap_start', 			7 );
add_action( 'techmarket_header_v4', 		'techmarket_row_wrap_start', 				8 );
add_action( 'techmarket_header_v4', 		'techmarket_site_branding', 				10 );
add_action( 'techmarket_header_v4', 		'techmarket_departments_menu', 				20 );
add_action( 'techmarket_header_v4', 		'techmarket_navbar_search', 				30 );
add_action( 'techmarket_header_v4', 		'techmarket_row_wrap_end', 					62 );
add_action( 'techmarket_header_v4', 		'techmarket_sticky_wrap_end', 				63 );

add_action( 'techmarket_before_header_v5', 	'techmarket_skip_links', 					0 );

add_action( 'techmarket_header_v5', 		'techmarket_sticky_wrap_start', 			7 );
add_action( 'techmarket_header_v5', 		'techmarket_row_wrap_start', 				8 );
add_action( 'techmarket_header_v5', 		'techmarket_site_branding', 				10 );
add_action( 'techmarket_header_v5', 		'techmarket_departments_menu', 				20 );
add_action( 'techmarket_header_v5', 		'techmarket_primary_navigation', 			30 );
add_action( 'techmarket_header_v5', 		'techmarket_navbar_search', 				40 );
add_action( 'techmarket_header_v5', 		'techmarket_row_wrap_end', 					62 );
add_action( 'techmarket_header_v5', 		'techmarket_sticky_wrap_end', 				63 );

add_action( 'techmarket_before_header_v6', 	'techmarket_skip_links', 					0 );

add_action( 'techmarket_header_v6', 		'techmarket_sticky_wrap_start', 			7 );
add_action( 'techmarket_header_v6', 		'techmarket_row_wrap_start', 				8 );
add_action( 'techmarket_header_v6', 		'techmarket_departments_menu', 				10 );
add_action( 'techmarket_header_v6', 		'techmarket_site_branding', 				20 );
add_action( 'techmarket_header_v6', 		'techmarket_header_action_button', 			30 );
add_action( 'techmarket_header_v6', 		'techmarket_row_wrap_end', 					62 );
add_action( 'techmarket_header_v6', 		'techmarket_sticky_wrap_end', 				63 );

add_action( 'techmarket_before_header_v7', 	'techmarket_skip_links', 					0 );

add_action( 'techmarket_header_v7', 		'techmarket_sticky_wrap_start', 			7 );
add_action( 'techmarket_header_v7', 		'techmarket_row_wrap_start', 				8 );
add_action( 'techmarket_header_v7', 		'techmarket_primary_navigation', 			10 );
add_action( 'techmarket_header_v7', 		'techmarket_site_branding', 				20 );
add_action( 'techmarket_header_v7', 		'techmarket_row_wrap_end', 					62 );
add_action( 'techmarket_header_v7', 		'techmarket_sticky_wrap_end', 				63 );

add_action( 'techmarket_before_header_v8', 	'techmarket_skip_links', 					0 );

add_action( 'techmarket_header_v8', 		'techmarket_sticky_wrap_start', 			7 );
add_action( 'techmarket_header_v8', 		'techmarket_row_wrap_start', 				8 );
add_action( 'techmarket_header_v8', 		'techmarket_site_branding', 				10 );
add_action( 'techmarket_header_v8', 		'techmarket_primary_navigation', 			20 );
add_action( 'techmarket_header_v8', 		'techmarket_row_wrap_end', 					62 );
add_action( 'techmarket_header_v8', 		'techmarket_sticky_wrap_end', 				63 );

add_action( 'techmarket_before_header_v9', 	'techmarket_skip_links', 					0 );
add_action( 'techmarket_before_header_v9', 	'techmarket_header_top_bar', 				5 );

add_action( 'techmarket_header_v9', 		'techmarket_sticky_wrap_start', 			7 );
add_action( 'techmarket_header_v9', 		'techmarket_row_wrap_start', 				8 );
add_action( 'techmarket_header_v9', 		'techmarket_site_branding', 				10 );
add_action( 'techmarket_header_v9', 		'techmarket_primary_navigation', 			20 );
add_action( 'techmarket_header_v9', 		'techmarket_row_wrap_end', 					62 );
add_action( 'techmarket_header_v9', 		'techmarket_sticky_wrap_end', 				63 );

add_action( 'techmarket_before_header_v10', 	'techmarket_skip_links', 				0 );
add_action( 'techmarket_before_header_v10', 	'techmarket_header_top_bar', 			5 );

add_action( 'techmarket_header_v10', 		'techmarket_row_wrap_start', 				8 );
add_action( 'techmarket_header_v10', 		'techmarket_site_branding', 				10 );
add_action( 'techmarket_header_v10', 		'techmarket_departments_menu', 				20 );
add_action( 'techmarket_header_v10', 		'techmarket_navbar_search', 				30 );
add_action( 'techmarket_header_v10', 		'techmarket_row_wrap_end', 					62 );
add_action( 'techmarket_header_v10', 		'techmarket_sticky_wrap_start', 			67 );
add_action( 'techmarket_header_v10', 		'techmarket_stretch_row_wrap_start', 		68 );
add_action( 'techmarket_header_v10', 		'techmarket_navbar_primary_menu', 			70 );
add_action( 'techmarket_header_v10', 		'techmarket_stretch_row_wrap_end', 			72 );
add_action( 'techmarket_header_v10', 		'techmarket_sticky_wrap_end', 				73 );

add_action( 'techmarket_after_header', 		'techmarket_handheld_header', 				10 );

add_action( 'techmarket_handheld_header', 	'techmarket_row_wrap_start', 				8 );
add_action( 'techmarket_handheld_header', 	'techmarket_site_branding', 				10 );
add_action( 'techmarket_handheld_header', 	'techmarket_row_wrap_end', 					32 );
add_action( 'techmarket_handheld_header', 	'techmarket_sticky_wrap_start', 			37 );
add_action( 'techmarket_handheld_header', 	'techmarket_row_wrap_start', 				38 );
add_action( 'techmarket_handheld_header', 	'techmarket_handheld_navigation', 			40 );
add_action( 'techmarket_handheld_header', 	'techmarket_handheld_header_search', 		50 );
add_action( 'techmarket_handheld_header', 	'techmarket_row_wrap_end', 					78 );
add_action( 'techmarket_handheld_header', 	'techmarket_sticky_wrap_end', 				79 );

/**
 * Footer
 *
 * @see  techmarket_before_footer_block()
 * @see  techmarket_footer_widgets()
 * @see  techmarket_footer_site_info()
 */
add_action( 'techmarket_footer_v1',					'techmarket_before_footer_block',				10 );
add_action( 'techmarket_footer_v1',					'techmarket_footer_widgets',					30 );
add_action( 'techmarket_footer_v1',					'techmarket_footer_site_info',					50 );

add_action( 'techmarket_before_footer_block',		'techmarket_before_footer_wrap',				10 );
add_action( 'techmarket_before_footer_block', 		'techmarket_footer_newsletter', 				20 );
add_action( 'techmarket_before_footer_block', 		'techmarket_social_icons', 						30 );
add_action( 'techmarket_before_footer_block',		'techmarket_before_footer_wrap_end',			40 );

add_action( 'techmarket_footer_contact_payment',	'techmarket_footer_logo', 						10 );
add_action( 'techmarket_footer_contact_payment',	'techmarket_footer_contact_payment_wrap',		20 );
add_action( 'techmarket_footer_contact_payment',	'techmarket_footer_contact',					30 );
add_action( 'techmarket_footer_contact_payment',	'techmarket_footer_payment',					40 );
add_action( 'techmarket_footer_contact_payment',	'techmarket_footer_contact_payment_wrap_end',	50 );

add_action( 'techmarket_default_footer_widgets',	'techmarket_default_footer_widgets',	20 );

/**
 * Homepage
 *
 * @see  techmarket_homepage_content()
 */
add_action( 'techmarket_homepage_v1', 'techmarket_revslider_v1',                                           10 );
add_action( 'techmarket_homepage_v1', 'techmarket_features_list_v1',                                       20 );
add_action( 'techmarket_homepage_v1', 'techmarket_deals_carousel_and_products_carousel_tabs',              30 );
add_action( 'techmarket_homepage_v1', 'techmarket_fullwidth_notice_v1',                                    40 );
add_action( 'techmarket_homepage_v1', 'techmarket_product_categories_carousel_v1',                         50 );
add_action( 'techmarket_homepage_v1', 'techmarket_products_cards_carousel_with_bg_v1',                     60 );
add_action( 'techmarket_homepage_v1', 'techmarket_products_carousel_tabs_v1',                              70 );
add_action( 'techmarket_homepage_v1', 'techmarket_2_column_banners_v1',                                    80 );
add_action( 'techmarket_homepage_v1', 'techmarket_products_carousel_block_v1_1',                           90 );
add_action( 'techmarket_homepage_v1', 'techmarket_products_carousel_vertical_tabs_v1',                     100 );
add_action( 'techmarket_homepage_v1', 'techmarket_products_carousel_tabs_with_featured_product_v1',        110 );
add_action( 'techmarket_homepage_v1', 'techmarket_full_width_banner_v1',                                   120 );
add_action( 'techmarket_homepage_v1', 'techmarket_products_carousel_with_banners',                         130 );
add_action( 'techmarket_homepage_v1', 'techmarket_products_carousel_block_v1_2',                           140 );
add_action( 'techmarket_homepage_v1', 'techmarket_brands_carousel_v1',                                     150 );
add_action( 'techmarket_homepage_v1', 'techmarket_homepage_content',                                       200 );

add_action( 'techmarket_homepage_v2', 'techmarket_slider_with_banners_v2',                                 10 );
add_action( 'techmarket_homepage_v2', 'techmarket_product_categories_carousel_v2',                         20 );
add_action( 'techmarket_homepage_v2', 'techmarket_6_1_6_tabs_with_deals_v2',                               30 );
add_action( 'techmarket_homepage_v2', 'techmarket_fullwidth_notice_v2',                                    40 );
add_action( 'techmarket_homepage_v2', 'techmarket_3_column_banners_v2',                                    50 );
add_action( 'techmarket_homepage_v2', 'techmarket_products_carousel_tabs_v2_1',                            60 );
add_action( 'techmarket_homepage_v2', 'techmarket_3_2_3_product_cards_tab_with_featured_product_v2',       70 );
add_action( 'techmarket_homepage_v2', 'techmarket_products_carousel_tabs_v2_2',                            80 );
add_action( 'techmarket_homepage_v2', 'techmarket_full_width_banner_v2',                                   90 );
add_action( 'techmarket_homepage_v2', 'techmarket_products_carousel_with_bg_v2',                           100 );
add_action( 'techmarket_homepage_v2', 'techmarket_products_landscape_with_tab_carousel',                   110 );
add_action( 'techmarket_homepage_v2', 'techmarket_brands_carousel_v2',                                     120 );
add_action( 'techmarket_homepage_v2', 'techmarket_products_carousel_block_v2',                             130 );
add_action( 'techmarket_homepage_v2', 'techmarket_homepage_content',                                       200 );

add_action( 'techmarket_homepage_v3', 'techmarket_slider_with_banners_v3',                                 10 );
add_action( 'techmarket_homepage_v3', 'techmarket_features_list_v3',                                       20 );
add_action( 'techmarket_homepage_v3', 'techmarket_product_categories_carousel_v3_1',                       30 );
add_action( 'techmarket_homepage_v3', 'techmarket_fullwidth_notice_v3',                                    40 );
add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_block_v3_1',                           50 );
add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_block_v3_2',                           60 );
add_action( 'techmarket_homepage_v3', 'techmarket_2_column_banners_v3',                                    70 );
add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_tabs_v3_1',                            80 );
add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_block_v3_3',                           90 );
add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_with_bg_v3',                           100 );
add_action( 'techmarket_homepage_v3', 'techmarket_products_cards_carousel_tabs_v3',                        110 );
add_action( 'techmarket_homepage_v3', 'techmarket_banner_with_products_carousel_v3',                       120 );
add_action( 'techmarket_homepage_v3', 'techmarket_full_width_banner_v3',                                   130 );
add_action( 'techmarket_homepage_v3', 'techmarket_product_categories_carousel_v3_2',                       140 );
add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_tabs_v3_2',                            150 );
add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_block_v3_4',                           160 );
add_action( 'techmarket_homepage_v3', 'techmarket_brands_carousel_v3',                                     170 );
add_action( 'techmarket_homepage_v3', 'techmarket_homepage_content',                                       200 );

add_action( 'techmarket_homepage_v4', 'techmarket_revslider_v4',                                           10 );
add_action( 'techmarket_homepage_v4', 'techmarket_3_column_banners_v4',                                    20 );
add_action( 'techmarket_homepage_v4', 'techmarket_products_carousel_with_tabs_carousel_v4',                30 );
add_action( 'techmarket_homepage_v4', 'techmarket_fullwidth_notice_v4',                                    40 );
add_action( 'techmarket_homepage_v4', 'techmarket_products_cards_carousel_block_v4',                       50 );
add_action( 'techmarket_homepage_v4', 'techmarket_2_column_banners_v4',                                    60 );
add_action( 'techmarket_homepage_v4', 'techmarket_products_widget_with_tab_carousel',                      70 );
add_action( 'techmarket_homepage_v4', 'techmarket_products_carousel_tabs_v4_1',                            80 );
add_action( 'techmarket_homepage_v4', 'techmarket_products_carousel_tabs_v4_2',                            90 );
add_action( 'techmarket_homepage_v4', 'techmarket_full_width_banner_v4',                                   100 );
add_action( 'techmarket_homepage_v4', 'techmarket_products_4_column_widget',                               110 );
add_action( 'techmarket_homepage_v4', 'techmarket_brands_carousel_v4',                                     120 );
add_action( 'techmarket_homepage_v4', 'techmarket_homepage_content',                                       200 );

add_action( 'techmarket_homepage_v5', 'techmarket_slider_with_banners_v5',                                 10 );
add_action( 'techmarket_homepage_v5', 'techmarket_product_categories_carousel_v5',                         20 );
add_action( 'techmarket_homepage_v5', 'techmarket_products_carousel_with_tabs_carousel_v5',                30 );
add_action( 'techmarket_homepage_v5', 'techmarket_fullwidth_notice_v5',                                    40 );
add_action( 'techmarket_homepage_v5', 'techmarket_deals_carousel_v5',                                      50 );
add_action( 'techmarket_homepage_v5', 'techmarket_products_carousel_vertical_tabs_v5',                     60 );
add_action( 'techmarket_homepage_v5', 'techmarket_full_width_banner_v5',                                   70 );
add_action( 'techmarket_homepage_v5', 'techmarket_products_carousel_tabs_with_featured_product_v5',        80 );
add_action( 'techmarket_homepage_v5', 'techmarket_products_carousel_with_bg_v5',                           90 );
add_action( 'techmarket_homepage_v5', 'techmarket_products_carousel_tabs_v5',                              100 );
add_action( 'techmarket_homepage_v5', 'techmarket_homepage_content',                                       200 );
add_action( 'techmarket_homepage_v5_before_footer', 'techmarket_brands_carousel_v5',                       10 );

add_action( 'techmarket_homepage_v6', 'techmarket_slider_with_banners_v6',                                 10 );
add_action( 'techmarket_homepage_v6', 'techmarket_product_categories_carousel_v6',                         20 );
add_action( 'techmarket_homepage_v6', 'techmarket_products_carousel_with_tabs_carousel_v6',                30 );
add_action( 'techmarket_homepage_v6', 'techmarket_products_carousel_with_bg_v6',                           40 );
add_action( 'techmarket_homepage_v6', 'techmarket_products_landscape_with_gallery_v6',                     50 );
add_action( 'techmarket_homepage_v6', 'techmarket_products_carousel_block_v6_1',                           60 );
add_action( 'techmarket_homepage_v6', 'techmarket_full_width_banner_v6',                                   70 );
add_action( 'techmarket_homepage_v6', 'techmarket_products_carousel_tabs_v6_1',                            80 );
add_action( 'techmarket_homepage_v6', 'techmarket_fullwidth_notice_v6',                                    90 );
add_action( 'techmarket_homepage_v6', 'techmarket_products_carousel_tabs_with_featured_product_v6',        100 );
add_action( 'techmarket_homepage_v6', 'techmarket_products_carousel_tabs_v6_2',                            110 );
add_action( 'techmarket_homepage_v6', 'techmarket_homepage_content',                                       200 );
add_action( 'techmarket_homepage_v6_before_footer', 'techmarket_brands_carousel_v6',                       10 );

add_action( 'techmarket_homepage_v7', 'techmarket_deals_products_isotope_v7',                              10 );
add_action( 'techmarket_homepage_v7', 'techmarket_fullwidth_notice_v7',                                    20 );
add_action( 'techmarket_homepage_v7', 'techmarket_full_width_banner_v7',                                   30 );
add_action( 'techmarket_homepage_v7', 'techmarket_product_categories_list_v7',                             40 );
add_action( 'techmarket_homepage_v7', 'techmarket_products_carousel_block_v7',                             50 );
add_action( 'techmarket_homepage_v7', 'techmarket_brands_carousel_v7',                                     60 );
add_action( 'techmarket_homepage_v7', 'techmarket_homepage_content',                                       200 );

add_action( 'techmarket_homepage_v8', 'techmarket_deals_products_isotope_v8',                              10 );
add_action( 'techmarket_homepage_v8', 'techmarket_fullwidth_notice_v8',                                    20 );
add_action( 'techmarket_homepage_v8', 'techmarket_full_width_banner_v8',                                   30 );
add_action( 'techmarket_homepage_v8', 'techmarket_product_categories_list_v8',                             40 );
add_action( 'techmarket_homepage_v8', 'techmarket_products_carousel_block_v8',                             50 );
add_action( 'techmarket_homepage_v8', 'techmarket_brands_carousel_v8',                                     60 );
add_action( 'techmarket_homepage_v8', 'techmarket_homepage_content',                                       200 );

add_action( 'techmarket_homepage_v9', 'techmarket_revslider_v9',                                           10 );
add_action( 'techmarket_homepage_v9', 'techmarket_products_tabs_v9',                                       20 );
add_action( 'techmarket_homepage_v9', 'techmarket_full_width_banner_v9_1',                                 30 );
add_action( 'techmarket_homepage_v9', 'techmarket_2_column_banners_v9',                                    40 );
add_action( 'techmarket_homepage_v9', 'techmarket_full_width_banner_v9_2',                                 50 );
add_action( 'techmarket_homepage_v9', 'techmarket_brands_carousel_v9',                                     60 );
add_action( 'techmarket_homepage_v9', 'techmarket_homepage_content',                                       200 );

add_action( 'techmarket_homepage_v10', 'techmarket_revslider_v10',                                         10 );
add_action( 'techmarket_homepage_v10', 'techmarket_3_column_banners_v10_1',                                20 );
add_action( 'techmarket_homepage_v10', 'techmarket_products_carousel_tabs_v10_1',                          30 );
add_action( 'techmarket_homepage_v10', 'techmarket_fullwidth_notice_v10',                                  40 );
add_action( 'techmarket_homepage_v10', 'techmarket_banner_with_products_carousel_v10',                     50 );
add_action( 'techmarket_homepage_v10', 'techmarket_products_carousel_tabs_v10_2',                          60 );
add_action( 'techmarket_homepage_v10', 'techmarket_3_column_banners_v10_2',                                70 );
add_action( 'techmarket_homepage_v10', 'techmarket_brands_carousel_v10',                                   80 );
add_action( 'techmarket_homepage_v10', 'techmarket_homepage_content',                                      200 );

add_action( 'techmarket_homepage_v11', 'techmarket_revslider_v11',                                         10 );
add_action( 'techmarket_homepage_v11', 'techmarket_product_categories_list_v11',                           20 );
add_action( 'techmarket_homepage_v11', 'techmarket_3_column_banners_v11',                                  30 );
add_action( 'techmarket_homepage_v11', 'techmarket_products_carousel_tabs_v11_1',                          40 );
add_action( 'techmarket_homepage_v11', 'techmarket_deals_cards_carousel_with_gallery_v11',                 50 );
add_action( 'techmarket_homepage_v11', 'techmarket_products_carousel_tabs_v11_2',                          60 );
add_action( 'techmarket_homepage_v11', 'techmarket_products_carousel_tabs_v11_3',                          70 );
add_action( 'techmarket_homepage_v11', 'techmarket_brands_carousel_v11',                                   80 );
add_action( 'techmarket_homepage_v11', 'techmarket_homepage_content',                                      200 );

add_action( 'techmarket_homepage_v12', 'techmarket_slider_with_banners_v12',                               10 );
add_action( 'techmarket_homepage_v12', 'techmarket_products_carousel_block_v12_1',                         20 );
add_action( 'techmarket_homepage_v12', 'techmarket_products_carousel_tabs_v12_1',                          30 );
add_action( 'techmarket_homepage_v12', 'techmarket_product_categories_carousel_v12',                       40 );
add_action( 'techmarket_homepage_v12', 'techmarket_3_column_banners_v12',                                  50 );
add_action( 'techmarket_homepage_v12', 'techmarket_products_carousel_block_v12_2',                         60 );
add_action( 'techmarket_homepage_v12', 'techmarket_products_carousel_tabs_v12_2',                          70 );
add_action( 'techmarket_homepage_v12', 'techmarket_full_width_banner_v12',                                 80 );
add_action( 'techmarket_homepage_v12', 'techmarket_products_carousel_block_v12_3',                         90 );
add_action( 'techmarket_homepage_v12', 'techmarket_brands_carousel_v12',                                   100 );
add_action( 'techmarket_homepage_v12', 'techmarket_homepage_content',                                      200 );

add_action( 'techmarket_landingpage_v1', 'techmarket_revslider_lv1',                                       10 );
add_action( 'techmarket_landingpage_v1', 'techmarket_recent_posts_with_categories_lv1',                    20 );
add_action( 'techmarket_landingpage_v1', 'techmarket_products_with_image_lv1_1',                           30 );
add_action( 'techmarket_landingpage_v1', 'techmarket_products_with_image_lv1_2',                           40 );
add_action( 'techmarket_landingpage_v1', 'techmarket_products_with_image_lv1_3',                           50 );
add_action( 'techmarket_landingpage_v1', 'techmarket_homepage_content',                                    200 );

add_action( 'techmarket_landingpage_v2', 'techmarket_revslider_lv2',                                       10 );
add_action( 'techmarket_landingpage_v2', 'techmarket_page_header_info_lv2',                                20 );
add_action( 'techmarket_landingpage_v2', 'techmarket_media_single_banner_lv2_1',                           30 );
add_action( 'techmarket_landingpage_v2', 'techmarket_media_single_banner_lv2_2',                           40 );
add_action( 'techmarket_landingpage_v2', 'techmarket_media_single_banner_lv2_3',                           50 );
add_action( 'techmarket_landingpage_v2', 'techmarket_product_categories_filter_lv2',                       60 );
add_action( 'techmarket_landingpage_v2', 'techmarket_brands_carousel_lv2',                                 70 );
add_action( 'techmarket_landingpage_v2', 'techmarket_homepage_content',                                    200 );

// Hook Controls
add_action( 'techmarket_before_homepage_v1',		'techmarket_home_v1_hook_control',			10 );
add_action( 'techmarket_before_homepage_v2',		'techmarket_home_v2_hook_control',			10 );
add_action( 'techmarket_before_homepage_v3',		'techmarket_home_v3_hook_control',			10 );
add_action( 'techmarket_before_homepage_v4',		'techmarket_home_v4_hook_control',			10 );
add_action( 'techmarket_before_homepage_v5',		'techmarket_home_v5_hook_control',			10 );
add_action( 'techmarket_before_homepage_v6',		'techmarket_home_v6_hook_control',			10 );
add_action( 'techmarket_before_homepage_v7',		'techmarket_home_v7_hook_control',			10 );
add_action( 'techmarket_before_homepage_v8',		'techmarket_home_v8_hook_control',			10 );
add_action( 'techmarket_before_homepage_v9',		'techmarket_home_v9_hook_control',			10 );
add_action( 'techmarket_before_homepage_v10',		'techmarket_home_v10_hook_control',			10 );
add_action( 'techmarket_before_homepage_v11',		'techmarket_home_v11_hook_control',			10 );
add_action( 'techmarket_before_homepage_v12',		'techmarket_home_v12_hook_control',			10 );
add_action( 'techmarket_before_landingpage_v1',		'techmarket_landing_v1_hook_control',		10 );
add_action( 'techmarket_before_landingpage_v2',		'techmarket_landing_v2_hook_control',		10 );

/**
 * Posts
 *
 * @see  techmarket_post_header()
 * @see  techmarket_post_meta()
 * @see  techmarket_post_content()
 * @see  techmarket_init_structured_data()
 * @see  techmarket_paging_nav()
 * @see  techmarket_single_post_header()
 * @see  techmarket_post_nav()
 * @see  techmarket_display_comments()
 */
add_action( 'techmarket_loop_post',           'techmarket_post_media_attachment', 10 );
add_action( 'techmarket_loop_post',			  'techmarket_post_body_wrap_start',  15 );
add_action( 'techmarket_loop_post',           'techmarket_post_header',           20 );
add_action( 'techmarket_loop_post',           'techmarket_post_loop_content',     30 );
add_action( 'techmarket_loop_post',           'techmarket_init_structured_data',  40 );
add_action( 'techmarket_loop_post',			  'techmarket_post_body_wrap_end',	  45 );

add_action( 'techmarket_loop_before',         'techmarket_posts_loop_wrap_start', 90 );
add_action( 'techmarket_loop_after',          'techmarket_posts_loop_wrap_end',   10 );
add_action( 'techmarket_loop_after',          'techmarket_paging_nav',            20 );

add_action( 'techmarket_single_post',			'techmarket_post_media_attachment',		10 );
add_action( 'techmarket_single_post',			'techmarket_post_header',				20 );
add_action( 'techmarket_single_post',			'techmarket_post_content',				30 );
add_action( 'techmarket_single_post_after',		'techmarket_author_info',				10 );
add_action( 'techmarket_single_post_after',		'techmarket_post_nav',					20 );
add_action( 'techmarket_single_post_after',		'techmarket_display_comments',			30 );
add_action( 'techmarket_single_post_after', 	'techmarket_init_structured_data',		50 );


/**
 * Pages
 *
 * @see  techmarket_page_header()
 * @see  techmarket_page_content()
 * @see  techmarket_init_structured_data()
 * @see  techmarket_display_comments()
 */
add_action( 'techmarket_page',       'techmarket_page_header',          10 );
add_action( 'techmarket_page',       'techmarket_page_content',         20 );
add_action( 'techmarket_page',       'techmarket_init_structured_data', 30 );
add_action( 'techmarket_page_after', 'techmarket_display_comments',     10 );

/**
 * Credit Card Form
 */
add_action( 'woocommerce_credit_card_form_start', 'techmarket_row_wrap_start', 0 );
add_action( 'woocommerce_credit_card_form_end',   'techmarket_row_wrap_end',   0 );

/**
 * Filters
 */
add_filter( 'techmarket_show_page_header',		'techmarket_toggle_page_header',		10 );
add_filter( 'techmarket_show_breadcrumb',		'techmarket_toggle_breadcrumb',			10 );

/**
 * Extras
 */
add_filter( 'excerpt_length',					'techmarket_excerpt_length',			10 );
add_filter( 'excerpt_more',						'techmarket_excerpt_more',				10 );