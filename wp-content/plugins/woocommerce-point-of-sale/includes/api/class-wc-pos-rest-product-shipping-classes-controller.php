<?php
/**
 * REST API Product Shipping Classes Controller
 *
 * Handles requests to wc-pos/products/shipping_classes.
 *
 * @package WooCommerce_Point_Of_Sale/Classes/API
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_REST_Product_Shipping_Classes_Controller.
 */
class WC_POS_REST_Product_Shipping_Classes_Controller extends WC_REST_Product_Shipping_Classes_Controller {

	/**
	 * Endpoint namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'wc-pos';
}
