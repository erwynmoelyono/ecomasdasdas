<?php
/**
 * The template for displaying product content within loops
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
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

$template_path = 'templates/contents/';
$template_name = 'content-product';

if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '<' ) ) {
	global $woocommerce_loop;
	$loop_template_name = isset( $woocommerce_loop['template'] ) ? $woocommerce_loop['template'] : $template_name;
} else {
	$loop_template_name = wc_get_loop_prop( 'template', $template_name );
}

$template_name = ! empty( $loop_template_name ) ? $loop_template_name : $template_name;

$template_name = preg_replace( '/.php$/', '', $template_name );
$template_name = "{$template_name}.php";

techmarket_get_template( $template_name, array(), $template_path );