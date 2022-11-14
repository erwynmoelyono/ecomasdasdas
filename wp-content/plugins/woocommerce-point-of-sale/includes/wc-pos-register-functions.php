<?php
/**
 * Register Functions
 *
 * @since 5.0.0
 *
 * @package WooCommerce_Point_Of_Sale/Functions
 */

defined( 'ABSPATH' ) || exit;

/**
 * Get register.
 *
 * @since 5.0.0
 *
 * @param int|string|WC_POS_Register $register Register ID, slug or object.
 *
 * @throws Exception If register cannot be read/found and $data parameter of WC_POS_Register class constructor is set.
 * @return WC_POS_Register|null
 */
function wc_pos_get_register( $register ) {
	$register_object = new WC_POS_Register( $register );

	// If getting the default register and it does not exist, create a new one and return it.
	if ( wc_pos_is_default_register( $register ) && ! $register_object->get_id() ) {
		delete_option( 'wc_pos_default_register' );
		WC_POS_Install::create_default_posts();

		return wc_pos_get_register( (int) get_option( 'wc_pos_default_register' ) );
	}

	return 0 !== $register_object->get_id() ? $register_object : null;
}

/**
 * Get register grid options.
 *
 * @since 5.0.0
 * @return array
 */
function wc_pos_get_register_grid_options() {
	$get_posts = get_posts(
		array(
			'numberposts' => -1,
			'post_type'   => 'pos_grid',
			'orderby'     => 'post_name',
			'order'       => 'asc',
		)
	);
	$grids     = array(
		0 => __( 'Categories Layout', 'woocommerce-point-of-sale' ),
	);

	foreach ( $get_posts as $post ) {
		$grids[ $post->ID ] = $post->post_title;
	}

	return $grids;
}

/**
 * Get register receipt options.
 *
 * @since 5.0.0
 * @return array
 */
function wc_pos_get_register_receipt_options() {
	$get_posts = get_posts(
		array(
			'numberposts' => -1,
			'post_type'   => 'pos_receipt',
			'orderby'     => 'post_name',
			'order'       => 'asc',
		)
	);
	$receipts  = array();

	foreach ( $get_posts as $post ) {
		$receipts[ $post->ID ] = $post->post_title;
	}

	return $receipts;
}

/**
 * Get register outlet options.
 *
 * @since 5.0.0
 * @return array
 */
function wc_pos_get_register_outlet_options() {
	$get_posts = get_posts(
		array(
			'post_type'   => 'pos_outlet',
			'numberposts' => -1,
			'orderby'     => 'post_name',
			'order'       => 'asc',
		)
	);
	$outlets   = array();

	foreach ( $get_posts as $post ) {
		$outlets[ $post->ID ] = $post->post_title;
	}

	return $outlets;
}

/**
 * Check if are register is locked by some user.
 *
 * @since 5.0.0
 *
 * @param int $register_id Register ID.
 * @return int|bool The ID of the user whom the register is locked by or false if not locked.
 */
function wc_pos_is_register_locked( $register_id ) {
	$register = wc_pos_get_register( $register_id );

	if ( ! $register ) {
		return false;
	}

	$open_last   = $register->get_open_last();
	$date_opened = $register->get_date_opened();
	$date_closed = $register->get_date_closed();

	if ( strtotime( $date_opened ) >= strtotime( $date_closed ) && get_current_user_id() !== $open_last ) {
		return $open_last;
	}

	return false;
}

/**
 * Check if are register is open at the present time.
 *
 * @since 5.0.0
 *
 * @param int $register_id Register ID.
 * @return bool
 */
function wc_pos_is_register_open( $register_id ) {
	$register = wc_pos_get_register( $register_id );

	if ( ! $register ) {
		return false;
	}

	$date_opened = $register->get_date_opened();
	$date_closed = $register->get_date_closed();

	if (
		$date_opened &&
		( ! $date_closed || ( $date_opened->getTimestamp() > $date_closed->getTimestamp() ) )
	) {
		return true;
	}

	return false;
}

/**
 * Check if the current user can open a specific register.
 *
 * @since 5.0.0
 *
 * @param int $register_id Register ID.
 * @return bool
 */
function wc_pos_current_user_can_open_register( $register_id ) {
	if ( ! current_user_can( 'view_register' ) ) {
		return false;
	}

	$register = wc_pos_get_register( $register_id );

	if ( ! $register ) {
		return false;
	}

	$user_outlets = get_user_meta( get_current_user_id(), 'wc_pos_assigned_outlets', true );
	$user_outlets = empty( $user_outlets ) ? array() : array_map(
		function( $id ) {
				return intval( $id );
		},
		(array) $user_outlets
	);

	if ( in_array( $register->get_outlet(), $user_outlets, true ) ) {
		return true;
	}

	return false;
}

/**
 * Check if the current user can force logout others from opened registers.
 */
function wc_pos_current_user_can_force_logout() {
	$force_logout = 'yes' === get_option( 'wc_pos_force_logout', 'no' );
	$current_user = wp_get_current_user();

	if ( $current_user->has_cap( 'force_logout_register' ) && $force_logout ) {
		return true;
	}

	return false;
}

/**
 * Check if a specific register is the default one.
 *
 * @since 5.0.0
 *
 * @param int $register_id Register ID.
 * @return bool
 */
function wc_pos_is_default_register( $register_id ) {
	return (int) get_option( 'wc_pos_default_register', 0 ) === $register_id;
}

/**
 * Create a temporary order of the post type pos_temp_order.
 *
 * @param int $register_id Register ID.
 * @return int The temp order ID.
 */
function wc_pos_create_temp_order( $register_id ) {
	$new_order = array(
		'post_title'  => 'POS Register #' . $register_id,
		'post_status' => 'publish',
		'post_author' => get_current_user_id(),
		'post_type'   => 'pos_temp_order',
	);

	// Insert the post into the database.
	$order_id = wp_insert_post( $new_order );

	// Update the order_id field of the register.
	$register = wc_pos_get_register( $register_id );
	$register->set_temp_order( $order_id );
	$register->save();

	return $order_id;
}
