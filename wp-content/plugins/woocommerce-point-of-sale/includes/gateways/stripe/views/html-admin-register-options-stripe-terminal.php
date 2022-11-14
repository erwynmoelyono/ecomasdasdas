<?php
/**
 * Register Stripe Terminal options panel.
 *
 * @var WC_POS_Register $register_object
 *
 * @package WooCommerce_Point_Of_Sale/Gateways
 */

defined( 'ABSPATH' ) || exit;

$terminals         = array();
$stripe_api        = new WC_POS_Stripe_API();
$terminals['none'] = __( 'None', 'woocommerce-point-of-sale' );

foreach ( $stripe_api->get_terminals() as $terminal ) {
	$terminals[ $terminal['id'] ] = $terminal['label'] . '(' . $terminal['id'] . ')';
}
?>
<div id="stripe_terminal_register_options" class="panel woocommerce_options_panel">
	<?php
	woocommerce_wp_select(
		array(
			'id'          => 'stripe_terminal',
			'value'       => $register_object->get_meta( 'stripe_terminal', true ),
			'label'       => __( 'Terminal', 'woocommerce-point-of-sale' ),
			'options'     => $terminals,
			'desc_tip'    => true,
			'description' => __( 'Select the EMV terminal you want to use for this register.', 'woocommerce-point-of-sale' ),
		)
	);
	?>
</div>
