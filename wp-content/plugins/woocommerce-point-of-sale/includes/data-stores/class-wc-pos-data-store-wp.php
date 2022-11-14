<?php
/**
 * WC_POS_Data_Store_WP
 *
 * @since 5.2.11
 *
 * @package WooCommerce_Point_Of_Sales/Classes/Data_Stores
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_Data_Store_WP.
 */
class WC_POS_Data_Store_WP extends WC_Data_Store_WP {

	/**
	 * This function is added to WC_Data_Store_WP since 3.6.0 and re-implemented here to support
	 * eariler versions of WC.
	 */
	protected function update_or_delete_post_meta( $object, $meta_key, $meta_value ) {
		if ( in_array( $meta_value, array( array(), '' ), true ) && ! in_array( $meta_key, $this->must_exist_meta_keys, true ) ) {
			$updated = delete_post_meta( $object->get_id(), $meta_key );
		} else {
			$updated = update_post_meta( $object->get_id(), $meta_key, $meta_value );
		}

		return (bool) $updated;
	}
}
