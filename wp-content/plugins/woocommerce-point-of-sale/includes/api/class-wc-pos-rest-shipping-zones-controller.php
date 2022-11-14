<?php
/**
 * REST API Shipping Zones Controller
 *
 * Handles requests to wc-pos/shipping/zones.
 *
 * @package WooCommerce_Point_Of_Sale/Classes/API
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_REST_Shipping_Zones_Controller.
 */
class WC_POS_REST_Shipping_Zones_Controller extends WC_REST_Shipping_Zones_Controller {

	/**
	 * Endpoint namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'wc-pos';

	/**
	 * Prepare the Shipping Zone for the REST response.
	 *
	 * @param array           $item Shipping Zone.
	 * @param WP_REST_Request $request Request object.
	 * @return WP_REST_Response $response
	 */
	public function prepare_item_for_response( $item, $request ) {
		$data = array(
			'id'        => (int) $item['id'],
			'name'      => $item['zone_name'],
			'order'     => (int) $item['zone_order'],
			'locations' => $item['zone_locations'],
		);

		// Shipping methods.
		$zone = $this->get_zone( (int) $data['id'] );
		if ( is_wp_error( $zone ) ) {
			return $zone;
		}
		$methods                  = $zone->get_shipping_methods();
		$data['shipping_methods'] = array();

		foreach ( $methods as $method_obj ) {
			$method                     = array(
				'id'                 => $method_obj->instance_id,
				'instance_id'        => $method_obj->instance_id,
				'title'              => $method_obj->instance_settings['title'],
				'order'              => $method_obj->method_order,
				'enabled'            => ( 'yes' === $method_obj->enabled ),
				'method_id'          => $method_obj->id,
				'method_title'       => $method_obj->method_title,
				'method_description' => $method_obj->method_description,
				'settings'           => $this->get_method_settings( $method_obj ),
			);
			$data['shipping_methods'][] = $method;
		}

		$context = empty( $request['context'] ) ? 'view' : $request['context'];
		$data    = $this->add_additional_fields_to_object( $data, $request );
		$data    = $this->filter_response_by_context( $data, $context );

		// Wrap the data in a response object.
		$response = rest_ensure_response( $data );

		$response->add_links( $this->prepare_links( $data['id'] ) );

		return $response;
	}

	/**
	 * Return settings associated with a shipping method instance.
	 *
	 * @see WC_REST_Shipping_Zone_Methods_V2_Controller->get_settings().
	 *
	 * @param WC_Shipping_Method $item Shipping method data.
	 *
	 * @return array
	 */
	public function get_method_settings( $item ) {
		$item->init_instance_settings();
		$settings = array();
		foreach ( $item->get_instance_form_fields() as $id => $field ) {
			$data = array(
				'id'          => $id,
				'label'       => $field['title'],
				'description' => empty( $field['description'] ) ? '' : $field['description'],
				'type'        => $field['type'],
				'value'       => $item->get_instance_option( $id ),
				'default'     => empty( $field['default'] ) ? '' : $field['default'],
				'tip'         => empty( $field['description'] ) ? '' : $field['description'],
				'placeholder' => empty( $field['placeholder'] ) ? '' : $field['placeholder'],
			);
			if ( ! empty( $field['options'] ) ) {
				$data['options'] = $field['options'];
			}
			$settings[ $id ] = $data;
		}
		return $settings;
	}

	/**
	 * Check whether a given request has permission to read shipping zones.
	 *
	 * @param  WP_REST_Request $request Full details about the request.
	 * @return WP_Error|boolean
	 */
	public function get_items_permissions_check( $request ) {
		if ( ! wc_shipping_enabled() ) {
			return new WP_Error( 'rest_no_route', __( 'Shipping is disabled.', 'woocommerce-point-of-sale' ), array( 'status' => 404 ) );
		}

		if ( ! current_user_can( 'view_register' ) ) {
			return new WP_Error( 'woocommerce_rest_cannot_view', __( 'Sorry, you cannot list resources.', 'woocommerce-point-of-sale' ), array( 'status' => rest_authorization_required_code() ) );
		}

		return true;
	}
}
