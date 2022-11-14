<?php
/**
 * Redux Framworks hooks
 *
 * @package techmarket
 */

add_action( 'init',                                         'redux_remove_demo_mode' );
add_action( 'redux/page/techmarket_options/enqueue',        'redux_queue_font_awesome' );

//General Filters
add_filter( 'techmarket_site_logo_svg',                     'redux_toggle_logo_svg',                        10 );
add_filter( 'techmarket_enable_scrollup',                   'redux_toggle_scrollup',                        10 );
add_filter( 'techmarket_register_image_sizes',              'redux_toggle_register_image_size',             10 );

// Shop Filters
add_filter( 'techmarket_shop_catalog_mode',                 'redux_toggle_shop_catalog_mode',               10 );
add_filter( 'woocommerce_loop_add_to_cart_link',            'redux_apply_catalog_mode_for_product_loop',    100, 2 );
add_filter( 'techmarket_product_brand_taxonomy',            'redux_apply_product_brand_taxonomy',           10 );
add_filter( 'techmarket_product_label_taxonomy',            'redux_apply_product_label_taxonomy',           10 );
add_filter( 'techmarket_product_comparison_page_id',        'redux_apply_product_comparison_page_id',       10 );
add_filter( 'techmarket_sticky_order_review',               'redux_toggle_checkout_sticky',                 10 );
add_filter( 'techmarket_enable_shop_footer_products_carousel', 'redux_toggle_shop_footer_products_carousel',   10 );
add_filter( 'techmarket_enable_shop_footer_brands_carousel',   'redux_toggle_shop_footer_brands_carousel',     10 );
add_filter( 'techmarket_shop_jumbotron_id',                 'redux_apply_shop_jumbotron_id',                10 );
add_filter( 'techmarket_shop_views_args',                   'redux_set_shop_view_args',                     10 );
add_filter( 'techmarket_shop_layout',                       'redux_apply_shop_layout',                      10 );
add_filter( 'techmarket_shop_loop_subcategories_columns',   'redux_apply_shop_loop_subcategories_columns',  10 );
add_filter( 'techmarket_shop_loop_products_columns',        'redux_apply_shop_loop_products_columns',       10 );
add_filter( 'techmarket_loop_shop_per_page',                'redux_apply_shop_loop_per_page',               10 );
add_filter( 'techmarket_single_product_layout',             'redux_apply_single_product_layout',            10 );
add_filter( 'techmarket_single_product_style',              'redux_apply_single_product_style',             10 );
add_filter( 'woocommerce_product_tabs',                     'redux_apply_specs_tab_title',                  30 );
add_filter( 'techmarket_default_attr_style',                'redux_apply_default_attr_style',               20 );
add_filter( 'techmarket_default_attr_col',                  'redux_apply_default_attr_col',                 20 );
add_filter( 'techmarket_show_related_products',             'redux_toggle_related_products',                10 );
add_filter( 'techmarket_before_login_text',                 'redux_apply_myaccount_before_login_text',      10 );
add_filter( 'techmarket_before_register_text',              'redux_apply_myaccount_before_register_text',   10 );
add_filter( 'techmarket_register_benefits',                 'redux_apply_myaccount_register_benefits',      10 );
add_filter( 'techmarket_register_benefits_title',           'redux_apply_myaccount_register_benefits_title',10 );

// Header Filters
add_filter( 'techmarket_header_version',                    'redux_apply_header_style',                     10 );
add_filter( 'techmarket_has_sticky_header',                 'redux_toggle_sticky_header',                   10 );
add_filter( 'techmarket_header_top_bar',                    'redux_toggle_header_topbar',                   10 );
add_filter( 'techmarket_departments_menu_title',            'redux_apply_header_departments_menu_title',    10 );
add_filter( 'techmarket_departments_menu_icon',             'redux_apply_header_departments_menu_icon',     10 );
add_filter( 'techmarket_navbar_search_placeholder',         'redux_apply_header_search_placeholder_text',   10 );
add_filter( 'techmarket_navbar_search_dropdown_text',       'redux_apply_header_search_dropdown_text',      10 );
add_filter( 'techmarket_navbar_search_button_text',         'redux_apply_header_search_button_text',        10 );
add_filter( 'techmarket_enable_live_search',                'redux_toggle_header_live_search',              10 );
add_filter( 'techmarket_header_action_button_args',         'redux_apply_header_action_button_args',        10 );

// Footer Filters
add_filter( 'techmarket_show_before_footer_block',          'redux_toggle_footer_before_block',             10 );
add_filter( 'techmarket_footer_newsletter',                 'redux_toggle_footer_newsletter',               10 );
add_filter( 'techmarket_footer_newsletter_title',           'redux_apply_footer_newsletter_title',          10 );
add_filter( 'techmarket_footer_newsletter_marketing_text',  'redux_apply_footer_newsletter_marketing_text', 10 );
add_filter( 'techmarket_newsletter_form',                   'redux_apply_footer_newsletter_form',           10 );
add_filter( 'techmarket_show_footer_social_icons',          'redux_toggle_footer_social_icons',             10 );
add_filter( 'techmarket_footer_logo',                       'redux_toggle_footer_logo',                     10 );
add_filter( 'techmarket_footer_logo_html',                  'redux_apply_footer_logo',                      10 );
add_filter( 'techmarket_show_footer_contact',               'redux_toggle_footer_contact_block',            10 );
add_filter( 'techmarket_footer_contact_info',               'redux_apply_footer_contact_info',              10 );
add_filter( 'techmarket_footer_contact_address',            'redux_toggle_footer_address',                  10 );
add_filter( 'techmarket_footer_contact_address_content',    'redux_apply_footer_address_content',           10 );
add_filter( 'techmarket_footer_contact_map_link_args',      'redux_apply_footer_contact_map_link_args',     10 );
add_filter( 'techmarket_footer_contact_map_target_new',     'redux_toggle_footer_contact_map_target',       10 );
add_filter( 'techmarket_show_footer_payment',               'redux_toggle_footer_payment',                  10 );
add_filter( 'techmarket_footer_payment_info',               'redux_apply_footer_payment_info',              10 );
add_filter( 'techmarket_footer_payment_icons',              'redux_toggle_footer_payment_icons',            10 );
add_filter( 'techmarket_footer_payment_icons_args',         'redux_apply_footer_payment_icons',             10 );
add_filter( 'techmarket_footer_payment_secure_by_info',     'redux_toggle_footer_payment_secure_icons',     10 );
add_filter( 'techmarket_footer_payment_secure_icons_args',  'redux_apply_footer_payment_secure_icons',      10 );
add_filter( 'techmarket_show_footer_widgets',               'redux_toggle_footer_widgets',                  10 );
add_filter( 'techmarket_footer_site_info',                  'redux_toggle_footer_site_info',                10 );
add_filter( 'techmarket_footer_copyright_text',             'redux_apply_footer_copyright_text',            10 );
add_filter( 'techmarket_footer_credit_text',                'redux_apply_footer_credit_text',               10 );

// Blog Filters
add_filter( 'techmarket_blog_style',                        'redux_apply_blog_page_view',                   10 );
add_filter( 'techmarket_blog_layout',                       'redux_apply_blog_page_layout',                 10 );
add_filter( 'techmarket_single_post_layout',                'redux_apply_single_post_layout',               10 );
add_filter( 'techmarket_loop_post_placeholder_img',         'redux_toggle_post_placeholder_img',            10 );
add_filter( 'techmarket_loop_post_force_excerpt',           'redux_toggle_post_force_excerpt',              10 );

// Social Filters
add_filter( 'techmarket_get_social_networks',               'redux_apply_social_networks',                  10 );

// Style Filters
add_filter( 'techmarket_use_predefined_colors',             'redux_toggle_use_predefined_colors',           10 );
add_action( 'techmarket_primary_color',                     'redux_apply_primary_color',                    10 );
add_filter( 'techmarket_should_add_custom_css_page',        'redux_toggle_custom_css_page',                 10 );
add_action( 'wp_enqueue_scripts',                           'redux_apply_custom_color_css',                 100 );

// Typography Filters
add_filter( 'techmarket_load_default_fonts',                'redux_has_google_fonts',                       10 );
add_filter( 'techmarket_switch_to_roboto',                  'redux_switch_to_roboto',                       10 );
add_action( 'wp_enqueue_scripts',                           'redux_apply_custom_fonts',                     100 );
add_action( 'wp_enqueue_scripts',                           'redux_get_roboto_vietnamese_css',              100 );
