<?php
/**
 * REST API Data Countries Controller
 *
 * Handles requests to wc-pos/data/countries.
 *
 * @package WooCommerce_Point_Of_Sale/Classes/API
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_REST_Data_Countries_Controller.
 */
class WC_POS_REST_Data_Countries_Controller extends WC_REST_Data_Countries_Controller {

	/**
	 * Endpoint namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'wc-pos';

	/**
	 * Return the list of states for all countries.
	 *
	 * @param  WP_REST_Request $request Request data.
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_items( $request ) {
		if ( isset( $request['filter'] ) && 'allowed' === $request['filter'] ) {
			$countries = WC()->countries->get_allowed_countries();
		} elseif ( isset( $request['filter'] ) && 'shipping' === $request['filter'] ) {
			$countries = WC()->countries->get_shipping_countries();
		} else {
			$countries = WC()->countries->get_countries();
		}

		$data = array();
		foreach ( array_keys( $countries ) as $country_code ) {
			$country  = $this->get_country( $country_code, $request );
			$response = $this->prepare_item_for_response( $country, $request );
			$data[]   = $this->prepare_response_for_collection( $response );
		}

		return rest_ensure_response( $data );
	}

	/**
	 * Check whether a given request has permission to read countries data.
	 *
	 * @param  WP_REST_Request $request Full details about the request.
	 * @return WP_Error|boolean
	 */
	public function get_items_permissions_check( $request ) {
		if ( ! current_user_can( 'view_register' ) ) {
			return new WP_Error( 'woocommerce_rest_cannot_view', __( 'Sorry, you cannot list resources.', 'woocommerce-point-of-sale' ), array( 'status' => rest_authorization_required_code() ) );
		}

		return true;
	}
}
