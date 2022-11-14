<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * WC_Xendit_Payment_Fees
 *
 * @since 2.39.0
 */

class WC_Xendit_Payment_Fees
{
    /**
     * @param WC_Order $order
     * @return array
     */
    public static function generatePaymentFees(WC_Order $order): array
    {
        $fees = [
            [
                'type' => esc_html(__('Discount', 'woocommerce-xendit')),
                'value' => (float) $order->get_discount_total() * -1
            ],
            [
                'type' => esc_html(__('Shipping fee', 'woocommerce-xendit')),
                'value' => (float) $order->get_shipping_total()
            ],
            [
                'type' => esc_html(__('Other Fees', 'woocommerce-xendit')),
                'value' => $order->get_total_fees()
            ],
            [
                'type' => esc_html(__('Tax fee', 'woocommerce-xendit')),
                'value' => $order->get_total_tax()
            ]
        ];

        return array_values(
            array_filter($fees, function ($value) {
                return $value['value'] != 0;
            }, ARRAY_FILTER_USE_BOTH)
        );
    }
}
