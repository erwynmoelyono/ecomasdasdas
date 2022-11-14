<?php

if (!defined('ABSPATH')) {
    exit;
}

final class WC_Xendit_PG_Helper
{
    public static function is_wc_lt($version)
    {
        return version_compare(WC_VERSION, $version, '<');
    }

    public static function get_order_id($order)
    {
        return self::is_wc_lt('3.0') ? $order->id : $order->get_id();
    }

    /**
     * @param WC_Product $product
     * @return float|int|string
     */
    public static function get_product_price(WC_Product $product)
    {
        if ($product->is_taxable()) {
            return (float) wc_get_price_excluding_tax($product);
        }
        return (float) !empty($product->get_price()) ? $product->get_price() : 0;
    }

    /**
     * Generate items and customers
     *
     * @param $order
     * @param $total_amount
     * @param string $type
     * @return array|void
     */
    public static function generate_items_and_customer($order, $total_amount, string $type = '')
    {
        global $woocommerce;

        if (!is_object($order)) {
            return;
        }

        $items = array();
        foreach ($order->get_items() as $item_data) {
            if (!is_object($item_data)) {
                continue;
            }

            // Get an instance of WC_Product object
            /** @var WC_Product $product */
            $product = $item_data->get_product();
            if (!is_object($product)) {
                continue;
            }

            // Get all category names of item
            $category_names = wp_get_post_terms($item_data->get_product_id(), 'product_cat', ['fields' => 'names']);

            $item = array();
            $item['id']         = $product->get_id();
            $item['name']       = $product->get_name();
            $item['price']      = self::get_product_price($product);
            $item['type']       = "PRODUCT";
            $item['quantity']   = $item_data->get_quantity();

            if (!empty(get_permalink($item['id']))) {
                $item['url']    = get_permalink($item['id']);
            }

            if (!empty($category_names)) {
                $item['category']   = implode(', ', $category_names);
            }

            array_push($items, json_encode(array_map('strval', $item)));
        }

        $customer = array();
        $email = $order->get_billing_email();
        $phone_number = $order->get_billing_phone();
        $customer['given_names']            = $order->get_billing_first_name();
        $customer['surname']                = $order->get_billing_last_name();

        if (!empty($email)) {
            $customer['email']                  = $email;
        }

        if (!empty($phone_number)) {
            $customer['mobile_number']          = $phone_number;
        }

        $address_details = array_filter(
            array(
            'country'       => $order->get_billing_country(),
            'street_line1'  => $order->get_billing_address_1(),
            'street_line2'  => $order->get_billing_address_2(),
            'city'          => $order->get_billing_city(),
            'state'         => $order->get_billing_state(),
            'postal_code'   => $order->get_billing_postcode()
            )
        );

        if (!empty($address_details)) {
            $customer['addresses']              = array(
                    (object) $address_details
            );
        }

        return array(
            'items' => '[' . implode(",", $items) . ']',
            'customer' => json_encode($customer)
        );
    }

    public static function build_order_notes($transaction_id, $status, $payment_method, $currency, $amount, $installment = '')
    {
        $notes  = "Transaction ID: " . $transaction_id . "<br>";
        $notes .= "Status: " . $status . "<br>";
        $notes .= "Payment Method: " . str_replace("_", " ", $payment_method) . "<br>";
        $notes .= "Amount: " . $currency . " " . number_format($amount);

        if ($installment) {
            $notes .= " (" . $installment . " installment)";
        }

        return $notes;
    }

    public static function complete_payment($order, $notes, $success_payment_status = 'processing', $transaction_id = '')
    {
        global $woocommerce;

        // Add a default payment status.
        // Our default value doesn't working properly on some merchant's site.
        if (empty($success_payment_status)) {
            $success_payment_status = "processing";
        }

        $order->add_order_note('<b>Xendit payment successful.</b><br>' . $notes);
        $order->payment_complete($transaction_id);

        $order_id = self::get_order_id($order);

        $re_get_order = new WC_Order($order_id);
        if ($re_get_order->get_status() != $success_payment_status) {
            $re_get_order->set_status($success_payment_status, '--');
            $re_get_order->save();
        }

        // Reduce stock levels
        version_compare(WC_VERSION, '3.0.0', '<') ? $order->reduce_order_stock() : wc_reduce_stock_levels($order_id);
    }

    public static function cancel_order($order, $note)
    {
        $order->update_status('wc-cancelled');
        $order->add_order_note($note);
    }

    public function validate_form($data)
    {
        global $wpdb, $woocommerce;

        $countries = new WC_Countries();
        $result = [];
        $billlingfields = $countries->get_address_fields($countries->get_base_country(), 'billing_');
        $shippingfields = $countries->get_address_fields($countries->get_base_country(), 'shipping_');
        foreach ($billlingfields as $key => $val) {
            if ($val['required'] == 1) {
                if (empty($data[$key])) {
                    array_push($result, 'Billing '.$val['label'].' is a required field.');
                }
            }
        }

        foreach ($shippingfields as $key => $val) {
            if ($val['required'] === 1) {
                if (empty($data[$key])) {
                    array_push($result, 'Shipping '.$val['label'].' is a required field.');
                }
            }
        }

        return (count($result) > 0) ? array('error_code' => 'VALIDATION_ERROR', 'message' => $result) : $result;
    }

    /**
     * Checks if subscriptions are enabled on the site.
     *
     * @return bool Whether subscriptions is enabled or not.
     * @since  5.6.0
     */
    public static function is_subscriptions_enabled()
    {
        return class_exists('WC_Subscriptions') && version_compare(WC_Subscriptions::$version, '2.2.0', '>=');
    }

    /**
     * Is $order_id a subscription?
     *
     * @param  int $order_id
     * @return boolean
     * @since  5.6.0
     */
    public static function has_subscription($order_id)
    {
        return (function_exists('wcs_order_contains_subscription') && (wcs_order_contains_subscription($order_id) || wcs_is_subscription($order_id) || wcs_order_contains_renewal($order_id)));
    }

    /**
     * Returns whether this user is changing the payment method for a subscription.
     *
     * @return bool
     * @since  5.6.0
     */
    public static function is_changing_payment_method_for_subscription()
    {
        if (isset($_GET['change_payment_method'])) { // phpcs:ignore WordPress.Security.NonceVerification
            return wcs_is_subscription(wc_clean(wp_unslash($_GET['change_payment_method']))); // phpcs:ignore WordPress.Security.NonceVerification
        }
        return false;
    }

    /**
     * Maybe process payment method change for subscriptions.
     *
     * @param  int $order_id
     * @return bool
     * @since  5.6.0
     */
    public static function order_contains_subscription($order_id)
    {
        return (
            self::is_subscriptions_enabled() &&
            self::has_subscription($order_id)
        );
    }

    /**
     * Check if order is subscription
     *
     * @param  $order
     * @return bool
     */
    public static function is_subscription($order)
    {
        return (
            self::is_subscriptions_enabled() &&
            wcs_is_subscription($order)
        );
    }

    /**
     * Maybe process payment method change for subscriptions.
     *
     * @param  int $order_id
     * @return bool
     * @since  5.6.0
     */
    public static function maybe_change_subscription_payment_method($order_id)
    {
        return (
            self::is_subscriptions_enabled() &&
            self::has_subscription($order_id) &&
            self::is_changing_payment_method_for_subscription()
        );
    }
}
