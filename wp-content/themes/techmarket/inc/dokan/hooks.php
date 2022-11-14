<?php
/**
 * All Dokan Related functions
 */

add_action( 'wp_enqueue_scripts', 'techmarket_dokan_scripts', 20 );

add_filter( 'techmarket_shop_layout', 'techmarket_dokan_shop_layout', 100 );

add_filter( 'body_class', 'techmarket_dokan_body_classes', 100 );

add_action( 'dokan_product_edit_after_inventory_variants', 'techmarket_dokan_product_edit_add_specifications', 10, 2 );