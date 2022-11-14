<?php
/**
 * Print Receipt
 *
 * @package WooCommerce_Point_Of_Sale/Classes
 */

// Receipt options.
$gift_receipt                      = isset( $_GET['gift_receipt'] ) && 'true' === $_GET['gift_receipt'];
$no_copies                         = $receipt->get_no_copies();
$copy_types                        = $gift_receipt ? array( 'normal', 'gift' ) : array( 'normal' );
$receipt_title                     = __( 'Receipt', 'woocommerce-point-of-sale' );
$gift_receipt_title                = __( 'Gift Receipt', 'woocommerce-point-of-sale' );
$title_display                     = $receipt->get_show_title() ? 'block' : 'none';
$title_position                    = $receipt->get_title_position();
$width                             = $receipt->get_width() ? $receipt->get_width() . 'mm' : '100%';
$logo                              = wp_get_attachment_image( $receipt->get_logo(), 'full' );
$logo_position                     = $receipt->get_logo_position();
$logo_display                      = $receipt->get_logo() ? 'block' : 'none';
$outlet_details_position           = $receipt->get_outlet_details_position();
$shop_name_display                 = $receipt->get_show_shop_name() ? 'block' : 'none';
$outlet_name_display               = $receipt->get_show_outlet_name() ? 'block' : 'none';
$outlet_name                       = $outlet->get_name();
$outlet_address_display            = $receipt->get_show_outlet_address() ? 'block' : 'none';
$outlet_contact_details_display    = $receipt->get_show_outlet_contact_details() ? 'block' : 'none';
$outlet_phone                      = $outlet->get_phone();
$outlet_fax                        = $outlet->get_fax();
$outlet_email                      = $outlet->get_email();
$outlet_website                    = $outlet->get_website();
$outlet_phone_display              = empty( $outlet_phone ) ? 'none' : 'block';
$outlet_fax_display                = empty( $outlet_fax ) ? 'none' : 'block';
$outlet_email_display              = empty( $outlet_email ) ? 'none' : 'block';
$outlet_website_display            = empty( $outlet_website ) ? 'none' : 'block';
$social_details_position           = $receipt->get_social_details_position();
$social_accounts                   = $outlet->get_social_accounts();
$twitter                           = isset( $social_accounts['twitter'] ) ? $social_accounts['twitter'] : '';
$facebook                          = isset( $social_accounts['facebook'] ) ? $social_accounts['facebook'] : '';
$instagram                         = isset( $social_accounts['instagram'] ) ? $social_accounts['instagram'] : '';
$snapchat                          = isset( $social_accounts['snapchat'] ) ? $social_accounts['snapchat'] : '';
$twitter_display                   = $receipt->get_show_social_twitter() ? 'block' : 'none';
$facebook_display                  = $receipt->get_show_social_facebook() ? 'block' : 'none';
$instagram_display                 = $receipt->get_show_social_instagram() ? 'block' : 'none';
$snapchat_display                  = $receipt->get_show_social_snapchat() ? 'block' : 'none';
$wifi_details_display              = $receipt->get_show_wifi_details() ? 'block' : 'none';
$wifi_network                      = $outlet->get_wifi_network();
$wifi_password                     = $outlet->get_wifi_password();
$tax_number                        = get_option( 'wc_pos_tax_number', '' );
$tax_number_position               = $receipt->get_tax_number_position();
$tax_number_display                = $receipt->get_show_tax_number() ? 'block' : 'none';
$tax_number_label                  = $receipt->get_tax_number_label();
$tax_number_label_display          = ! empty( $receipt->get_tax_number_label() ) ? 'inline-block' : 'none';
$order_date_display                = $receipt->get_show_order_date() ? 'table-row' : 'none';
$order_date_format                 = $receipt->get_order_date_format();
$order_time_format                 = $receipt->get_order_time_format();
$customer_name                     = trim( implode( ' ', array( $order->get_billing_first_name(), $order->get_billing_last_name() ) ) );
$customer_email                    = $order->get_billing_email();
$customer_phone                    = $order->get_billing_phone();
$customer_shipping_address         = $order->get_formatted_shipping_address();
$customer_billing_address          = $order->get_formatted_billing_address();
$customer_name_display             = $receipt->get_show_customer_name() && ! empty( $customer_name ) ? 'table-row' : 'none';
$customer_email_display            = $receipt->get_show_customer_email() && ! empty( $customer_email ) ? 'table-row' : 'none';
$customer_phone_display            = $receipt->get_show_customer_phone() && ! empty( $customer_phone ) ? 'table-row' : 'none';
$customer_shipping_address_display = $receipt->get_show_customer_shipping_address() && ! empty( $customer_shipping_address ) && ! empty( $order->get_shipping_method() ) ? 'table-row' : 'none';
$customer_billing_address_display  = $receipt->get_show_customer_billing_address() && ! empty( $customer_billing_address ) ? 'table-row' : 'none';
$cashier_name_display              = $receipt->get_show_cashier_name() ? 'table-row' : 'none';
$dining_option_display             = ! empty( $order->get_meta( 'wc_pos_dining_option' ) ) ? 'table-row' : 'none';
$product_details_layout            = $receipt->get_product_details_layout();
$product_image_display             = $receipt->get_show_product_image() ? 'table-cell' : 'none';
$product_sku_display               = $receipt->get_show_product_sku() ? ( 'single' === $product_details_layout ? 'block' : 'inline-block' ) : 'none';
$product_cost_display              = $receipt->get_show_product_cost() ? ( 'single' === $product_details_layout ? 'table-cell' : 'inline-block' ) : 'none';
$wp_current_user                   = wp_get_current_user();
$register_name                     = $register->get_name();
$register_name_display             = $receipt->get_show_register_name() ? 'inline-block' : 'none';
$order_notes                       = $order->get_customer_note();
$order_notes_display               = ! empty( $order_notes ) ? 'table-row' : 'none';
$tax_summary_display               = $receipt->get_show_tax_summary() ? 'table' : 'none';
$order_barcode_display             = $receipt->get_show_order_barcode() ? 'block' : 'none';
$barcode_type                      = ! empty( $receipt->get_barcode_type() ) ? $receipt->get_barcode_type() : 'code128';
$signature                         = get_post_meta( $order->get_id(), 'wc_pos_signature', true );

// Refund options.
$refunded_by = get_userdata( $refund ? $refund->get_refunded_by() : 0 );

$outlet_address = WC()->countries->get_formatted_address(
	array(
		'address_1' => $outlet->get_address_1(),
		'address_2' => $outlet->get_address_2(),
		'city'      => $outlet->get_city(),
		'postcode'  => $outlet->get_postcode(),
		'state'     => empty( $outlet->get_state() ) ? $outlet->get_state() : '',
		'country'   => $outlet->get_country(),
	)
);

switch ( $receipt->get_logo_size() ) {
	case 'small':
		$logo_width = '20mm';
		break;
	case 'large':
		$logo_width = '100%';
		break;
	default:
		$logo_width = '60mm';
		break;
}

switch ( $order->get_meta( 'wc_pos_dining_option' ) ) {
	case 'eat_in':
		$dining_option = __( 'Eat In', 'woocommerce-point-of-sale' );
		break;
	case 'take_away':
		$dining_option = __( 'Take Away', 'woocommerce-point-of-sale' );
		break;
	case 'delivery':
		$dining_option = __( 'Delivery', 'woocommerce-point-of-sale' );
		break;
	default:
		$dining_option = '';
		break;
}

$tax_display = get_option( 'woocommerce_tax_display_cart', 'incl' );

/*
 * Get order items.
 */
$order_items = $refund ? $refund->get_items( 'line_item' ) : $order->get_items( 'line_item' );
$items       = array();

foreach ( $order_items as $item_id => $item ) {
	$_product = $item->get_product();
	$_item    = array();

	$_item['sku']   = $_product ? $_product->get_sku() : '';
	$_item['image'] = $_product ? $_product->get_image( 'thumbnail', array( 'title' => '' ), false ) : '';
	$_item['qty']   = $item['qty'];
	$_item['name']  = $item['name'];


	// Get item meta.
	$_item['metadata'] = array();
	$metadata          = wc_get_order_item_meta( $item_id, '' );
	if ( $metadata ) {
		foreach ( $metadata as $key => $meta ) {

			// Skip hidden core fields.
			if ( in_array(
				$key,
				apply_filters(
					'woocommerce_hidden_order_itemmeta',
					array(
						'_qty',
						'_tax_class',
						'_product_id',
						'_variation_id',
						'_line_subtotal',
						'_line_subtotal_tax',
						'_line_total',
						'_line_tax',
						'_reduced_stock',
						'_refunded_item_id',
					)
				),
				true
			) ) {
				continue;
			}

			// Skip serialised meta.
			if ( is_serialized( $meta[0] ) ) {
				continue;
			}

			// Get attribute data.
			$attr = get_term_by( 'slug', $meta[0], wc_sanitize_taxonomy_name( $key ) );
			if ( taxonomy_exists( wc_sanitize_taxonomy_name( $key ) ) ) {
				$meta['meta_key'] = wc_attribute_label( $key );
			} else {
				$meta['meta_key'] = apply_filters( 'woocommerce_attribute_label', wc_attribute_label( $key, $_product ), $key, $_product );
			}
			$meta['meta_value'] = isset( $attr->name ) ? $attr->name : $meta[0];

			$_item['metadata'][] = $meta['meta_key'] . ': ' . $meta['meta_value'];
		}
	}

	$item_total    = floatval( $order->get_item_total( $item, 'incl' === $tax_display, true ) );
	$line_total    = floatval( $order->get_line_total( $item, 'incl' === $tax_display, true ) );
	$item_subtotal = floatval( $order->get_item_subtotal( $item, 'incl' === $tax_display, true ) );
	$line_subtotal = floatval( $order->get_line_subtotal( $item, 'incl' === $tax_display, true ) );

	$_item['cost']  = $item_subtotal;
	$_item['total'] = $line_subtotal;

	if ( $receipt->get_show_product_discount() && ( $item_total !== $item_subtotal ) ) {
		$_item['discounted_cost'] = $item_total;
	}

	if ( $receipt->get_show_product_discount() && ( $line_total !== $line_subtotal ) ) {
		$_item['discounted_total'] = $line_total;
	}

	// Add the item to our $items array.
	$items[] = $_item;
}

/*
 * Get order totals.
 */
$order_totals = $refund ? $refund->get_order_item_totals( $tax_display ) : $order->get_order_item_totals( $tax_display );
$total_rows   = array();

foreach ( $order_totals as $key => $total ) {
	if ( 'order_total' === $key ) {
		$total_rows['order_total']['label'] = __( 'Total', 'woocommerce-point-of-sale' );
		$total_rows['order_total']['value'] = $total['value'];
	} elseif ( 'discount' === $key ) {
		$total_rows['discount']['label'] = __( 'Discounts &amp; Coupons', 'woocommerce-point-of-sale' );
		$total_rows['discount']['value'] = $total['value'];
	} else {
		$total_rows[ $key ]['label'] = rtrim( $total['label'], ':' );
		$total_rows[ $key ]['value'] = $total['value'];
	}
}

/*
 * Additional order totals.
 */
if ( ! $refund ) {
	$payment_gateways     = WC()->payment_gateways() ? WC()->payment_gateways->payment_gateways() : array();
	$payment_method_title = isset( $payment_gateways[ $order->get_payment_method() ] ) ? $payment_gateways[ $order->get_payment_method() ]->get_title() : $order->get_payment_method();
	$amount_pay           = floatval( get_post_meta( $order->get_id(), 'wc_pos_amount_pay', true ) );
	$sales                = $amount_pay ? wc_price( $amount_pay, array( 'currency' => $order->get_currency() ) ) : $order->get_formatted_order_total();
	$total_rows['sales']  = array(
		'label' => __( 'Sales', 'woocommerce-point-of-sale' ) . '<small>' . $payment_method_title . '</small>',
		'value' => $sales,
	);

	if ( 'pos_cash' === $order->get_payment_method() ) {
		$amount_change = get_post_meta( $order->get_id(), 'wc_pos_amount_change', true );
		$amount_change = $amount_change ? $amount_change : 0;

		$total_rows['change'] = array(
			'label' => __( 'Change', 'woocommerce-point-of-sale' ),
			'value' => wc_price( $amount_change, array( 'currency' => $order->get_currency() ) ),
		);
	}
}

if ( $receipt->get_show_no_items() ) {
	$total_rows['no_items'] = array(
		'label' => __( 'Number of Items', 'woocommerce-point-of-sale' ),
		'value' => $refund ? $refund->get_item_count() : $order->get_item_count(),
	);
}

/*
 * Taxes.
 */
$order_taxes = $refund ? $refund->get_taxes() : $order->get_taxes();
$taxes       = array();

if ( ! empty( $order_taxes ) ) :
	foreach ( $order_taxes as $tx ) {
		$tax_label = $tx->get_label();
		$tax_rate  = WC_Tax::_get_tax_rate( $tx->get_rate_id() );
		$tax_rate  = number_format( $tax_rate['tax_rate'], 2 );
		$tax_total = wc_price( $tx->get_tax_total() );

		$taxes[] = array(
			'label' => $tax_label,
			'rate'  => $tax_rate,
			'total' => $tax_total,
		);

		if ( 0 !== $tx->get_shipping_tax_total() ) {
			$shipping_tax_label = $tax_label . __( ' (Shipping)', 'woocommerce-point-of-sale' );
			$shipping_tax_total = $tx->get_shipping_tax_total();

			$taxes[] = array(
				'label' => $shipping_tax_label,
				'rate'  => $tax_rate,
				'total' => $shipping_tax_total,
			);
		}
	}
endif;

defined( 'ABSPATH' ) || exit;
?>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php esc_html_e( 'Receipt', 'woocommerce-point-of-sale' ); ?></title>
		<style>
			<?php echo esc_html( wc_pos_file_get_contents( WC_POS()->plugin_url() . '/assets/dist/css/admin/receipt.min.css' ) ); ?>
		</style>
		<style>
			@page {
				margin: 0;
			}

			#receipt-print {
				width: <?php echo esc_html( $width ); ?>;
			}

			#receipt-print .break {
				page-break-after: always;
			}

			#receipt-print .line-through {
				text-decoration: line-through;
			}

			#receipt-title {
				text-align: <?php echo esc_html( $title_position ); ?>;
				display: <?php echo esc_html( $title_display ); ?>;
			}

			#receipt-logo {
				text-align: <?php echo esc_html( $logo_position ); ?>;
				display: <?php echo esc_html( $logo_display ); ?>;
			}

			#receipt-logo img {
				width: <?php echo esc_html( $logo_width ); ?>;
			}

			#receipt-outlet-details,
			.receipt-outlet-details {
				text-align: <?php echo esc_html( $outlet_details_position ); ?>;
			}

			#receipt-shop-name {
				display: <?php echo esc_html( $shop_name_display ); ?>;
			}

			#receipt-outlet-name {
				display: <?php echo esc_html( $outlet_name_display ); ?>;
			}

			#receipt-outlet-address {
				display: <?php echo esc_html( $outlet_address_display ); ?>;
			}

			#receipt-outlet-contact-details {
				display: <?php echo esc_html( $outlet_contact_details_display ); ?>;
			}

			#receipt-outlet-phone {
				display: <?php echo esc_html( $outlet_phone_display ); ?>;
			}

			#receipt-outlet-fax {
				display: <?php echo esc_html( $outlet_fax_display ); ?>;
			}

			#receipt-outlet-email {
				display: <?php echo esc_html( $outlet_email_display ); ?>;
			}

			#receipt-outlet-website {
				display: <?php echo esc_html( $outlet_website_display ); ?>;
			}

			#receipt-social-twitter {
				display: <?php echo esc_html( $twitter_display ); ?>;
			}

			#receipt-social-facebook {
				display: <?php echo esc_html( $facebook_display ); ?>;
			}

			#receipt-social-instagram {
				display: <?php echo esc_html( $instagram_display ); ?>;
			}

			#receipt-social-snapchat {
				display: <?php echo esc_html( $snapchat_display ); ?>;
			}

			#receipt-wifi-details {
				display: <?php echo esc_html( $wifi_details_display ); ?>;
			}

			#receipt-tax-number {
				text-align: <?php echo esc_html( $tax_number_position ); ?>;
				display: <?php echo esc_html( $tax_number_display ); ?>;
			}

			#receipt-tax-number-label {
				display: <?php echo esc_html( $tax_number_label_display ); ?>;
			}

			#receipt-order-date,
			#receipt-refund-date, {
				display: <?php echo esc_html( $order_date_display ); ?>;
			}

			#receipt-customer-name {
				display: <?php echo esc_html( $customer_name_display ); ?>;
			}

			#receipt-customer-email {
				display: <?php echo esc_html( $customer_email_display ); ?>;
			}

			#receipt-customer-phone {
				display: <?php echo esc_html( $customer_phone_display ); ?>;
			}

			#receipt-customer-shipping-address {
				display: <?php echo esc_html( $customer_shipping_address_display ); ?>;
			}

			#receipt-customer-billing-address {
				display: <?php echo esc_html( $customer_billing_address_display ); ?>;
			}

			#receipt-cashier-name,
			#receipt-refunded-by {
				display: <?php echo esc_html( $cashier_name_display ); ?>;
			}

			#receipt-register-name {
				display: <?php echo esc_html( $register_name_display ); ?>;
			}

			#receipt-order-notes {
				display: <?php echo esc_html( $order_notes_display ); ?>;
			}

			#receipt-dining-option {
				display: <?php echo esc_html( $dining_option_display ); ?>;
			}

			.receipt-product-sku {
				display: <?php echo esc_html( $product_sku_display ); ?> !important;
			}

			.receipt-product-image,
			#receipt-product-details th.image {
				display: <?php echo esc_html( $product_image_display ); ?>;
			}

			.receipt-product-cost,
			#receipt-product-details th.cost {
				display: <?php echo esc_html( $product_cost_display ); ?>;
			}

			#receipt-tax-summary {
				display: <?php echo esc_html( $tax_summary_display ); ?>;
			}

			#receipt-order-barcode {
				display: <?php echo esc_html( $order_barcode_display ); ?>;
			}

			#receipt-order-barcode img {
				max-width: <?php echo esc_html( $width ); ?>;
			}

			.receipt-type-gift #receipt-product-details .cost,
			.receipt-type-gift #receipt-product-details .total,
			.receipt-type-gift .receipt-product-cost,
			.receipt-type-gift #receipt-product-total,
			.receipt-type-gift #receipt-product-details tfoot,
			.receipt-type-gift #receipt-tax-summary {
				display: none !important;
			}
		</style>
		<style type="text/less">
			#receipt-print {<?php echo esc_html( $receipt->get_custom_css() ); ?>}
		</style>
	</head>
	<body> 
		<div id="receipt-print" class="text-<?php echo esc_attr( $receipt->get_text_size() ); ?>">
			<?php foreach ( $copy_types as $_type ) : ?>
				<?php for ( $copy = 1; $copy <= $no_copies; $copy++ ) : ?>
					<?php
					$totals_colspan = 4;
					$totals_colspan = ! $receipt->get_show_product_image() || $gift_receipt ? $totals_colspan - 1 : $totals_colspan;
					$totals_colspan = ! $receipt->get_show_product_cost() || $gift_receipt ? $totals_colspan - 1 : $totals_colspan;
					?>

					<div class="receipt-type-<?php echo esc_attr( $_type ); ?>">
						<div id="receipt-title"><?php echo esc_html( 'gift' === $_type ? $gift_receipt_title : $receipt_title ); ?></div>
						<div id="receipt-logo"><?php echo wp_kses_post( $logo ); ?></div>

						<div id="receipt-outlet-details" class="receipt-outlet-details">
							<div id="receipt-shop-name"><?php echo esc_html( bloginfo( 'name' ) ); ?></div>
							<div id="receipt-outlet-name"><?php echo esc_html( $outlet_name ); ?></div>
							<div id="receipt-outlet-address"><?php echo wp_kses_post( $outlet_address ); ?></div>
							<div id="receipt-outlet-contact-details">
								<div id="receipt-outlet-phone"><?php esc_html_e( 'Phone:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $outlet_phone ); ?></div>
								<div id="receipt-outlet-fax"><?php esc_html_e( 'Fax:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $outlet_fax ); ?></div>
								<div id="receipt-outlet-email"><?php esc_html_e( 'Email:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $outlet_email ); ?></div>
								<div id="receipt-outlet-website"><?php esc_html_e( 'Website:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $outlet_website ); ?></div>
							</div>
							<div id="receipt-wifi-details">
								<span><?php esc_html_e( 'Wi-Fi Network:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $wifi_network ); ?></span><br />
								<span><?php esc_html_e( 'Wi-Fi Password:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $wifi_password ); ?></span>
							</div>
							<?php if ( 'header' === $social_details_position ) : ?>
							<div id="receipt-social-details">
								<div id="receipt-social-twitter"><?php esc_html_e( 'Twitter:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $twitter ); ?></div>
								<div id="receipt-social-facebook"><?php esc_html_e( 'Facebook:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $facebook ); ?></div>
								<div id="receipt-social-instagram"><?php esc_html_e( 'Instagram:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $instagram ); ?></div>
								<div id="receipt-social-snapchat"><?php esc_html_e( 'Snapchat:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $snapchat ); ?></div>
							</div>
							<?php endif; ?>
							<div id="receipt-tax-number">
								<span id="receipt-tax-number-label"><?php echo esc_html( $tax_number_label ); ?>:</span> <?php echo esc_html( $tax_number ); ?>
							</div>
						</div>

						<div id="receipt-header-text">
							<?php
							/**
							 * Filter the receipt header text.
							 *
							 * @since 5.2.6
							 *
							 * @param WC_Order
							 * @param WC_POS_Register
							 */
							$header_text = apply_filters( 'wc_pos_receipt_header_text', $receipt->get_header_text(), $order, $register );

							echo esc_html( $header_text );
							?>
						</div>

						<table id="receipt-order-details">
							<tbody>
								<tr id="receipt-order-number">
									<th><?php esc_html_e( 'Order Number', 'woocommerce-point-of-sale' ); ?></th>
									<td><?php echo esc_html( $order->get_order_number() ); ?></td>
								</tr>
								<?php if ( $refund ) : ?>
								<tr id="receipt-refund-number">
									<th><?php esc_html_e( 'Refund Number', 'woocommerce-point-of-sale' ); ?></th>
									<td><?php echo esc_html( $refund->get_id() ); ?></td>
								</tr>
								<?php endif; ?>
								<?php if ( $refund ) : ?>
									<tr id="receipt-refund-date">
									<th><?php esc_html_e( 'Date', 'woocommerce-point-of-sale' ); ?></th>
									<td>
										<span class="date"><?php echo esc_html( $refund->get_date_created()->date_i18n( $order_date_format ) ); ?></span>
										<span class="at"> <?php echo esc_html_x( 'at', 'At time', 'woocommerce-point-of-sale' ); ?> </span>
										<span class="time"><?php echo esc_html( $refund->get_date_created()->date_i18n( $order_time_format ) ); ?></span>
									</td>
								</tr>
								<?php else : ?>
								<tr id="receipt-order-date">
									<th><?php esc_html_e( 'Date', 'woocommerce-point-of-sale' ); ?></th>
									<td>
										<span class="date"><?php echo esc_html( $order->get_date_created()->date_i18n( $order_date_format ) ); ?></span>
										<span class="at"> <?php echo esc_html_x( 'at', 'At time', 'woocommerce-point-of-sale' ); ?> </span>
										<span class="time"><?php echo esc_html( $order->get_date_created()->date_i18n( $order_time_format ) ); ?></span>
									</td>
								</tr>
								<?php endif; ?>
								<tr id="receipt-customer-name">
									<th><?php esc_html_e( 'Customer', 'woocommerce-point-of-sale' ); ?></th>
									<td><?php echo esc_html( $customer_name ); ?></td>
								</tr>
								<tr id="receipt-customer-email">
									<th><?php esc_html_e( 'Email', 'woocommerce-point-of-sale' ); ?></th>
									<td><?php echo esc_html( $customer_email ); ?></td>
								</tr>
								<tr id="receipt-customer-phone">
									<th><?php esc_html_e( 'Phone', 'woocommerce-point-of-sale' ); ?></th>
									<td><?php echo esc_html( $customer_phone ); ?></td>
								</tr>
								<tr id="receipt-customer-shipping-address">
									<th><?php esc_html_e( 'Shipping', 'woocommerce-point-of-sale' ); ?></th>
									<td><?php echo wp_kses_post( $customer_shipping_address ); ?></td>
								</tr>
								<tr id="receipt-customer-billing-address">
									<th><?php esc_html_e( 'Billing', 'woocommerce-point-of-sale' ); ?></th>
									<td><?php echo wp_kses_post( $customer_billing_address ); ?></td>
								</tr>
								<?php if ( $refund ) : ?>
								<tr id="receipt-refunded-by">
									<th><?php esc_html_e( 'Refunded by', 'woocommerce-point-of-sale' ); ?></th>
									<td>
										<span class="cashier"><?php echo esc_html( $refunded_by->{ $receipt->get_cashier_name_format() } ); ?></span>
										<span id="receipt-register-name"><?php esc_html_e( 'on', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $register_name ); ?> </span>
									</td>
								</tr>
								</tr>
								<?php endif; ?>
								<?php if ( $refund && $refund->get_refund_reason() ) : ?>
									<th><?php echo esc_html_e( 'Refund Reason', 'woocommerce-point-of-sale' ); ?></th>
									<td><?php echo wp_kses_post( wptexturize( str_replace( "\n", '<br/>', $refund->get_refund_reason() ) ) ); ?></td>
								<?php endif; ?>
								<tr id="receipt-cashier-name">
									<th><?php esc_html_e( 'Served by', 'woocommerce-point-of-sale' ); ?></th>
									<td>
										<span class="cashier"><?php echo esc_html( $wp_current_user->{ $receipt->get_cashier_name_format() } ); ?></span>
										<span id="receipt-register-name"><?php esc_html_e( 'on', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $register_name ); ?> </span>
									</td>
								</tr>
								<tr id="receipt-order-notes">
									<th><?php echo esc_html_e( 'Order Notes', 'woocommerce-point-of-sale' ); ?></th>
									<td><?php echo wp_kses_post( wptexturize( str_replace( "\n", '<br/>', $order->get_customer_note() ) ) ); ?></td>
								</tr>
								<tr id="receipt-dining-option">
									<th><?php echo esc_html_e( 'Dining Option', 'woocommerce-point-of-sale' ); ?></th>
									<td><?php echo esc_html( $dining_option ); ?></td>
								</tr>
							</tbody>
						</table>

						<table id="receipt-product-details">
							<thead class="receipt-product-details-layout-<?php echo esc_attr( $product_details_layout ); ?>">
								<?php if ( 'single' === $product_details_layout ) : ?>
								<tr>
									<th class="qty"><?php esc_html_e( 'Qty', 'woocommerce-point-of-sale' ); ?></th>
									<th class="product"><?php esc_html_e( 'Product', 'woocommerce-point-of-sale' ); ?></th>
									<th class="image">&nbsp;</th>
									<th class="cost"><?php esc_html_e( 'Price', 'woocommerce-point-of-sale' ); ?></th>
									<th class="total"><?php esc_html_e( 'Total', 'woocommerce-point-of-sale' ); ?></th>
								</tr>
								<?php elseif ( 'multiple' === $product_details_layout ) : ?>
								<tr>
									<th class="item" colspan="4"><?php esc_html_e( 'Item', 'woocommerce-point-of-sale' ); ?></th>
									<th class="total"><?php esc_html_e( 'Total', 'woocommerce-point-of-sale' ); ?></th>
								</tr>
								<?php endif; ?>
							</thead>
							<tbody class="receipt-product-details-layout-<?php echo esc_attr( $product_details_layout ); ?>">
								<?php foreach ( $items as $item ) : ?>
									<?php if ( 'single' === $product_details_layout ) : ?>
									<tr>
										<td class="qty"><?php echo esc_html( $item['qty'] ); ?></td>
										<td class="product">
											<strong><?php echo esc_html( $item['name'] ); ?></strong>
											<?php if ( ! empty( $item['sku'] ) ) : ?>
												<small class="receipt-product-sku"><?php esc_html_e( 'SKU:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $item['sku'] ); ?></small>
											<?php endif; ?>
											<?php foreach ( $item['metadata'] as $meta ) : ?>
												<small><?php echo esc_html( $meta ); ?></small>
											<?php endforeach; ?>
										</td>
										<td class="image receipt-product-image"><?php echo wp_kses_post( $item['image'] ); ?></td>
										<td class="receipt-product-cost">
											<div class="<?php echo isset( $item['discounted_cost'] ) ? 'line-through' : ''; ?>"><?php echo wp_kses_post( wc_price( $item['cost'], array( 'currency' => $order->get_currency() ) ) ); ?></div>
											<?php if ( isset( $item['discounted_cost'] ) ) : ?>
												<div><?php echo wp_kses_post( wc_price( $item['discounted_cost'], array( 'currency' => $order->get_currency() ) ) ); ?></div>
											<?php endif; ?>
										</td>
										<td class="total">
											<div class="<?php echo isset( $item['discounted_total'] ) ? 'line-through' : ''; ?>"><?php echo wp_kses_post( wc_price( $item['total'], array( 'currency' => $order->get_currency() ) ) ); ?></div>
											<?php if ( isset( $item['discounted_total'] ) ) : ?>
												<div><?php echo wp_kses_post( wc_price( $item['discounted_total'], array( 'currency' => $order->get_currency() ) ) ); ?></div>
											<?php endif; ?>
										</td>
									</tr>
								<?php elseif ( 'multiple' === $product_details_layout ) : ?>
									<tr>
										<td class="product" colspan="4">
											<p>
												<strong><?php echo esc_html( $item['name'] ); ?></strong>
												<?php if ( ! empty( $item['sku'] ) ) : ?>
													<span class="receipt-product-sku"> – <?php esc_html_e( 'SKU:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $item['sku'] ); ?></span>
												<?php endif; ?>
											</p>
											<p class="indent">
												<?php foreach ( $item['metadata'] as $meta ) : ?>
													<small><?php echo esc_html( $meta ); ?></small>
												<?php endforeach; ?>
											</p>
											<p class="indent">
												<span><?php esc_html_e( 'Qty:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $item['qty'] ); ?></span>
												<span class="receipt-product-cost">
													<span> &times; </span>
													<span class="<?php echo isset( $item['discounted_cost'] ) ? 'line-through' : ''; ?>"><?php echo wp_kses_post( wc_price( $item['cost'], array( 'currency' => $order->get_currency() ) ) ); ?></span>
													<?php if ( isset( $item['discounted_cost'] ) ) : ?>
														<?php echo wp_kses_post( wc_price( $item['discounted_cost'], array( 'currency' => $order->get_currency() ) ) ); ?>
													<?php endif; ?>
												</span>
											</p>
										</td>
										<td class="total">
											<div class="<?php echo isset( $item['discounted_total'] ) ? 'line-through' : ''; ?>"><?php echo wp_kses_post( wc_price( $item['total'], array( 'currency' => $order->get_currency() ) ) ); ?></div>
											<?php if ( isset( $item['discounted_total'] ) ) : ?>
												<div><?php echo wp_kses_post( wc_price( $item['discounted_total'], array( 'currency' => $order->get_currency() ) ) ); ?></div>
											<?php endif; ?>
										</td>
									</tr>
								<?php endif; ?>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<?php foreach ( $total_rows as $total ) : ?>
								<tr>
									<th scope="row" colspan="<?php echo esc_html( $totals_colspan ); ?>"><?php echo wp_kses_post( $total['label'] ); ?></th>
									<td><?php echo wp_kses_post( $total['value'] ); ?></td>
								</tr>
								<?php endforeach; ?>
							<tfoot>
						</table>

						<table id="receipt-tax-summary">
							<thead>
								<tr>
									<th class="tax-summary"><?php echo esc_html_e( 'Tax Summary', 'woocommerce-point-of-sale' ); ?></th>
									<th class="tax-name"><?php echo esc_html_e( 'Tax Name', 'woocommerce-point-of-sale' ); ?></th>
									<th class="tax-rate"><?php echo esc_html_e( 'Tax Rate', 'woocommerce-point-of-sale' ); ?></th>
									<th class="tax"><?php echo esc_html_e( 'Tax', 'woocommerce-point-of-sale' ); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ( $taxes as $tx ) : ?>
								<tr>
									<td>&nbsp;</td>
									<td><?php echo esc_html( $tx['label'] ); ?></td>
									<td><?php echo esc_html( $tx['rate'] ); ?></td>
									<td><?php echo wp_kses_post( $tx['total'] ); ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

						<div id="receipt-outlet-details-footer" class="receipt-outlet-details">
							<?php if ( 'footer' === $social_details_position ) : ?>
							<div id="receipt-social-details">
								<div id="receipt-social-twitter"><?php esc_html_e( 'Twitter:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $twitter ); ?></div>
								<div id="receipt-social-facebook"><?php esc_html_e( 'Facebook:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $facebook ); ?></div>
								<div id="receipt-social-instagram"><?php esc_html_e( 'Instagram:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $instagram ); ?></div>
								<div id="receipt-social-snapchat"><?php esc_html_e( 'Snapchat:', 'woocommerce-point-of-sale' ); ?> <?php echo esc_html( $snapchat ); ?></div>
							</div>
							<?php endif; ?>
						</div>

						<?php if ( 'yes' === get_option( 'wc_pos_signature', 'no' ) && ! empty( $signature ) ) : ?>
							<div style="width: 400px; height: 150px; margin: 5px auto; text-align: center">
								<img style="height: 100%; width: auto;" src="data:image/png;base64,<?php echo esc_attr( str_replace( 'data:image/png;base64,', '', $signature ) ); ?>">
							</div>
						<?php endif; ?>

						<div id="receipt-order-barcode" class="receipt-order-barcode">
							<img />
						</div>


						<div id="receipt-footer-text">
							<?php
							/**
							 * Filter the receipt footer text.
							 *
							 * @since 5.2.6
							 *
							 * @param WC_Order
							 * @param WC_POS_Register
							 */
							$footer_text = apply_filters( 'wc_pos_receipt_footer_text', $receipt->get_footer_text(), $order, $register );

							echo esc_html( $footer_text );
							?>
						</div>

						<div class="break"></div>
					</div>

				<?php endfor; ?>
			<?php endforeach; ?>

		</div>

		<?php if ( isset( $_GET['print_from_wc'] ) ) : ?>
			<script>
				window.print();
			</script>
		<?php endif; ?>
		<?php
		do_action( 'admin_enqueue_scripts' );
			print_footer_scripts();
		?>
		<script>
			(function($) {
				$(function() {
					var barcodeCanvas = document.createElement('canvas');
					bwipjs.toCanvas(barcodeCanvas, {
						bcid: '<?php echo esc_html( $barcode_type ); ?>',
						text: '<?php echo esc_html( str_replace( '#', '', $order->get_order_number() ) ); ?>',
						scale: 2,
						includetext: true,
						textxalign:  'center',
					});
					$( '.receipt-order-barcode img' ).each( function() {
						$( this ).attr( 'src', barcodeCanvas.toDataURL('image/png') );
					});
				});
			})(jQuery);
		</script>
	</body>
</html>
