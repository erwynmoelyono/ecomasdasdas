<?php
if (!defined('ABSPATH')) {
    exit;
}

/*
Plugin Name: Woocommerce - Xendit
Plugin URI: https://wordpress.org/plugins/woo-xendit-virtual-accounts
Description: Accept payments in Indonesia with Xendit. Seamlessly integrated into WooCommerce.
Version: 3.1.1
Author: Xendit
Author URI: https://www.xendit.co/
*/

define('WC_XENDIT_PG_VERSION', '3.1.1');
define('WC_XENDIT_PG_MAIN_FILE', __FILE__);
define('WC_XENDIT_PG_PLUGIN_PATH', untrailingslashit(plugin_dir_path(__FILE__)));

add_action('plugins_loaded', 'woocommerce_xendit_pg_init');

function woocommerce_xendit_pg_init()
{
    if (!class_exists('WC_Payment_Gateway')) {
        return;
    }

    load_plugin_textdomain('woocommerce-xendit', false, dirname(plugin_basename(__FILE__)).'/languages/');

    if (!class_exists('WC_Xendit_PG')) {
        class WC_Xendit_PG
        {
            private static $instance;

            public static function get_instance()
            {
                if (self::$instance === null) {
                    self::$instance = new self();
                }

                return self::$instance;
            }

            private function __construct()
            {
                $this->init();
            }

            public function init()
            {
                require_once dirname(__FILE__) . '/libs/class-wc-xendit-api.php';

                require_once dirname(__FILE__) . '/libs/helpers/class-wc-payment-fees.php';
                require_once dirname(__FILE__) . '/libs/helpers/class-wc-expired.php';
                require_once dirname(__FILE__) . '/libs/helpers/class-wc-oauth-data.php';
                require_once dirname(__FILE__) . '/libs/helpers/class-wc-xendit-logger.php';
                require_once dirname(__FILE__) . '/libs/helpers/class-wc-xendit-site-data.php';

                require_once dirname(__FILE__) . '/libs/class-wc-xendit-helper.php';
                require_once dirname(__FILE__) . '/libs/class-wc-xendit-invoice.php';
                require_once dirname(__FILE__) . '/libs/class-wc-xendit-cc.php';
                require_once dirname(__FILE__) . '/libs/class-wc-xendit-cc-redirect-handler.php';

                require_once dirname(__FILE__) . '/libs/cronjob/wc-cron-xendit-site-data.php';

                if ($this->should_load_addons()) {
                    require_once dirname(__FILE__) . '/libs/class-wc-xendit-cc-addons.php';
                }

                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-bcava.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-bniva.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-briva.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-bsiva.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-bjbva.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-mandiriva.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-permatava.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-alfamart.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-indomaret.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-shopeepay.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-paymaya.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-gcash.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-grabpay.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-qris.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-7eleven.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-dana.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-linkaja.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-ovo.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-billease.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-kredivo.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-cebuana.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-dd-bri.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-dd-bpi.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-dd-ubp.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-dp-mlhuillier.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-dp-palawan.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-dp-ecpay-loan.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-cashalo.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-uangme.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-astrapay.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-invoice-akulaku.php';
                require_once dirname(__FILE__) . '/libs/methods/class-wc-xendit-dd-rcbc.php';

                add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'plugin_action_links'));
                add_filter('woocommerce_payment_gateways', array($this, 'woocommerce_add_xendit_gateway'));
                add_filter('woocommerce_payment_complete_order_status', array($this, 'update_status_complete'));
            }

            /**
             * Adds plugin action links
             *
             * @since 1.0.0
             */
            public function plugin_action_links($links)
            {
                $setting_link = $this->get_setting_link();

                $plugin_links = array(
                    '<a href="' . $setting_link . '">' . esc_html(__('Settings', 'woocommerce-xendit')) . '</a>',
                    '<a href="https://docs.xendit.co/integrations/woocommerce/">' . __('Docs', 'woocommerce-xendit') . '</a>',
                    '<a href="https://help.xendit.co/hc/en-us">' . esc_html(__('Support', 'woocommerce-xendit')) . '</a>',
                );
                return array_merge($plugin_links, $links);
            }

            /**
             * Get setting link.
             *
             * @return string Setting link
             * @since 1.0.0
             *
             */
            public function get_setting_link()
            {
                $use_id_as_section = function_exists('WC') ? version_compare(WC()->version, '2.6', '>=') : false;

                $section_slug = $use_id_as_section ? 'xendit_gateway' : strtolower('WC_Xendit_CC');
                return admin_url('admin.php?page=wc-settings&tab=checkout&section=' . $section_slug);
            }

            /**
             * Show the payment settings in admin
             *
             * @param $methods
             * @return array
             */
            public function woocommerce_xendit_payment_settings($methods)
            {
                return array_merge(
                    $methods ?? [],
                    array(
                        'WC_Xendit_Invoice',
                        'WC_Xendit_BCAVA',
                        'WC_Xendit_BNIVA',
                        'WC_Xendit_BRIVA',
                        'WC_Xendit_BSIVA',
                        'WC_Xendit_BJBVA',
                        'WC_Xendit_MandiriVA',
                        'WC_Xendit_PermataVA',
                        'WC_Xendit_Alfamart',
                        'WC_Xendit_Indomaret',
                        'WC_Xendit_Shopeepay',
                        'WC_Xendit_OVO',
                        'WC_Xendit_DANA',
                        'WC_Xendit_LINKAJA',
                        'WC_Xendit_DD_BRI',
                        'WC_Xendit_QRIS',
                        'WC_Xendit_Kredivo',
                        'WC_Xendit_Uangme',
                        'WC_Xendit_DD_BPI',
                        'WC_Xendit_7Eleven',
                        'WC_Xendit_Paymaya',
                        'WC_Xendit_Gcash',
                        'WC_Xendit_Grabpay',
                        'WC_Xendit_DD_UBP',
                        'WC_Xendit_Billease',
                        'WC_Xendit_Cebuana',
                        'WC_Xendit_DP_Mlhuillier',
                        'WC_Xendit_DP_Palawan',
                        'WC_Xendit_DP_ECPay_Loan',
                        'WC_Xendit_Cashalo',
                        'WC_Xendit_Shopeepay',
                        'WC_Xendit_Astrapay',
                        'WC_Xendit_Akulaku',
                        'WC_Xendit_DD_RCBC',
                        $this->should_load_addons() ? 'WC_Xendit_CC_Addons' : 'WC_Xendit_CC'
                    )
                );
            }

            /**
             * Add xendit payment methods
             *
             * @param array $methods
             * @return array $methods
             */
            function woocommerce_add_xendit_gateway($methods)
            {
                $methods[] = 'WC_Xendit_Invoice';

                // For admin
                if (is_admin()) {
                    return $this->woocommerce_xendit_payment_settings($methods);
                }

                // On frontend
                $currency = get_woocommerce_currency();
                $cc_methods = '';
                if ($this->should_load_addons()) {
                    $cc_methods = 'WC_Xendit_CC_Addons';
                } else {
                    $cc_methods = 'WC_Xendit_CC';
                }

                switch ($currency) {
                    case 'IDR':
                        $methods[] = 'WC_Xendit_BCAVA';
                        $methods[] = 'WC_Xendit_BNIVA';
                        $methods[] = 'WC_Xendit_BRIVA';
                        $methods[] = 'WC_Xendit_BSIVA';
                        $methods[] = 'WC_Xendit_BJBVA';
                        $methods[] = 'WC_Xendit_MandiriVA';
                        $methods[] = 'WC_Xendit_PermataVA';
                        $methods[] = 'WC_Xendit_Alfamart';
                        $methods[] = 'WC_Xendit_Indomaret';
                        $methods[] = 'WC_Xendit_Shopeepay';
                        $methods[] = 'WC_Xendit_OVO';
                        $methods[] = 'WC_Xendit_DANA';
                        $methods[] = 'WC_Xendit_LINKAJA';
                        $methods[] = 'WC_Xendit_DD_BRI';
                        $methods[] = 'WC_Xendit_QRIS';
                        $methods[] = 'WC_Xendit_Kredivo';
                        $methods[] = 'WC_Xendit_Uangme';
                        $methods[] = 'WC_Xendit_Astrapay';
                        $methods[] = 'WC_Xendit_Akulaku';
                        break;
                    case 'PHP':
                        $methods[] = 'WC_Xendit_DD_BPI';
                        $methods[] = 'WC_Xendit_7Eleven';
                        $methods[] = 'WC_Xendit_Paymaya';
                        $methods[] = 'WC_Xendit_Gcash';
                        $methods[] = 'WC_Xendit_Grabpay';
                        $methods[] = 'WC_Xendit_DD_UBP';
                        $methods[] = 'WC_Xendit_DD_RCBC';
                        $methods[] = 'WC_Xendit_Billease';
                        $methods[] = 'WC_Xendit_Cebuana';
                        $methods[] = 'WC_Xendit_DP_Mlhuillier';
                        $methods[] = 'WC_Xendit_DP_Palawan';
                        $methods[] = 'WC_Xendit_DP_ECPay_Loan';
                        $methods[] = 'WC_Xendit_Cashalo';
                        $methods[] = 'WC_Xendit_Shopeepay';
                        break;
                    default:
                        break;
                }

                $methods[] = $cc_methods;

                return $methods;
            }

            function should_load_addons()
            {
                if (class_exists('WC_Subscriptions_Order') && function_exists('wcs_create_renewal_order')) {
                    return true;
                }

                if (class_exists('WC_Pre_Orders_Order')) {
                    return true;
                }

                return false;
            }

            public function update_status_complete($order_id)
            {
                global $wpdb, $woocommerce;
                $main_settings = get_option('woocommerce_xendit_gateway_settings');

                return $main_settings['success_payment_xendit'];
            }
        }

        $GLOBALS['wc_xendit_pg'] = WC_Xendit_PG::get_instance();
    }

    add_action('rest_api_init', function () {
        register_rest_route('xendit-wc/v1', '/disconnect', array(
            'methods' => 'DELETE',
            'callback' => 'xendit_disconect',
            'permission_callback' => function () {
                return current_user_can('administrator') || current_user_can('shop_manager');
            },
        ));
    });

    function xendit_disconect()
    {
        WC_Xendit_Oauth::removeXenditOAuth();

        $data = array('message' => 'success');

        // Create the response object
        $response = new WP_REST_Response($data);

        // Add a custom status code
        $response->set_status(201);

        return $response;
    }

    add_action('rest_api_init', function () {
        register_rest_route('xendit-wc/v1', '/oauth_status', array(
            'methods' => 'GET',
            'callback' => 'xendit_oauth_status',
            'permission_callback' => function () {
                return current_user_can('administrator') || current_user_can('shop_manager');
            },
        ));
    });

    function xendit_oauth_status()
    {
        $oauth_data = WC_Xendit_Oauth::getXenditOAuth();

        $data = array('is_connected' => !empty($oauth_data) ? true : false);

        // Create the response object
        $response = new WP_REST_Response($data);

        // Add a custom status code
        $response->set_status(200);

        return $response;
    }

    add_action('woocommerce_api_wc_xendit_callback', 'check_xendit_response');
    function check_xendit_response()
    {
        global $wpdb, $woocommerce;

        if (isset($_REQUEST['xendit_mode'])) {
            try {
                if ($_REQUEST['xendit_mode'] == 'xendit_invoice_callback') {
                    $xendit = WC_Xendit_Invoice::instance();
                } elseif ($_REQUEST['xendit_mode'] == 'xendit_cc_callback') {
                    $xendit = WC_Xendit_CC::instance();
                }

                $xendit_status = $xendit->developmentmode == 'yes' ? "[Development]" : "[Production]";

                $script_base = str_replace(array("https://", "http://"), "", home_url());
                $script_base = str_replace($_SERVER['SERVER_NAME'], "", $script_base);
                $script_base = rtrim($script_base, '/');

                $data = file_get_contents("php://input");
                $response = json_decode($data);

                $identifier = $response->external_id;

                if (($_SERVER["REQUEST_METHOD"] === "POST")) {
                    if ($identifier) {
                        $exploded_ext_id = explode("-", $identifier);
                        $order_id = end($exploded_ext_id);
                        $order = new WC_Order($order_id);

                        if (!$order->is_paid()) {
                            $xendit->validate_payment($response);
                        } else {
                            WC_Xendit_PG_Logger::log("{$xendit_status} [" . $identifier . "] Order ID $order_id is already updated.");
                            echo 'Order status is already updated';
                            exit;
                        }
                    }
                } else {
                    WC_Xendit_PG_Logger::log("{$xendit_status} [" . $identifier . "] Callback Request: Invalid callback! . $script_base " . $_SERVER["SCRIPT_NAME"]);
                    header('HTTP/1.1 501 Invalid Callback');
                    echo 'Invalid Callback';
                    exit;
                }
            } catch (Exception $e) {
                WC_Xendit_PG_Logger::log("{$xendit_status} [" . $identifier . "] Error in processing callback. " . $e->getMessage());
                header('HTTP/1.1 401');
                echo 'Error in processing callback. ' . $e->getMessage();
                exit;
            }
        }
    }

    add_action('woocommerce_api_wc_xendit_oauth', 'xendit_oauth');
    function xendit_oauth()
    {
        if (($_SERVER["REQUEST_METHOD"] !== "POST")) {
            header('HTTP/1.1 501 Not accessible on browser');
            echo 'Not accessible on browser';
            exit;
        }

        header('Content-Type: application/json; charset=utf-8');

        try {
            $script_base = str_replace(array("https://", "http://"), "", home_url());
            $script_base = str_replace($_SERVER['SERVER_NAME'], "", $script_base);
            $script_base = rtrim($script_base, '/');

            $data = file_get_contents("php://input");
            $response = json_decode($data, true);

            if ($response["validate_key"] !== WC_Xendit_Oauth::getValidationKey()) {
                throw new Exception("VALIDATE_KEY_MISMATCH", 1);
            }

            WC_Xendit_Oauth::updateXenditOAuth($response);

            set_transient('xendit_access_token_development', $response["oauth_data_development"]["access_token"], 3500);
            set_transient('xendit_access_token_production', $response["oauth_data_production"]["access_token"], 3500);

            header('HTTP/1.1 200 Success');
            $res = array('is_connected' => true);
            die(json_encode($res, JSON_PRETTY_PRINT));
        } catch (Exception $e) {
            $res = [];

            switch ($e->getMessage()) {
                case 'VALIDATE_KEY_MISMATCH':
                    $res = array(
                        'error_code' => 'VALIDATE_KEY_MISMATCH',
                        'message' => 'Validation key is mismatch'
                    );
                    header('HTTP/1.1 400 Validation Error');
                    break;

                default:
                    $res = array(
                        'error_code' => 'SERVER_ERROR',
                        'message' => 'Oops, something wrong happened! Please try again.'
                    );
                    header('HTTP/1.1 500 Server Error');
                    break;
            }

            die(json_encode($res, JSON_PRETTY_PRINT));
        }
    }

    /**
     * Endpoint to check if WooCommerce plugin is activated or not
     */
    add_action('woocommerce_api_wc_is_xendit_activated', 'is_xendit_activated');
    function is_xendit_activated()
    {
        $data = file_get_contents("php://input");
        $response = json_decode($data);

        if (($_SERVER["REQUEST_METHOD"] === "POST")) {
            include_once(ABSPATH . 'wp-admin/includes/plugin.php');
            header('Content-Type: application/json');
            if (is_plugin_active('woocommerce/woocommerce.php')) {
                $updateValidationKey = WC_Xendit_Oauth::updateValidationKey($response->validate_key);

                $res = array('status' => $updateValidationKey);
                die(json_encode($res, JSON_PRETTY_PRINT));
            }

            $res = array('status' => false);
            die(json_encode($res, JSON_PRETTY_PRINT)); // if WC is deactivated, it won't reach this function even if Xendit is activated
        } else {
            header('HTTP/1.1 501 Not accessible on browser');
            echo 'Not accessible on browser';
            exit;
        }
    }

    /**
     * Keep the old callback during transitioning period
     */
    $callback_modes = array(
        'xendit_invoice_callback',
        'xendit_cc_callback'
    );
    if (!isset($_REQUEST['wc-api']) && isset($_REQUEST['xendit_mode']) && in_array($_REQUEST['xendit_mode'], $callback_modes)) {
        add_action('init', 'check_xendit_response');
    }

    // register jquery and style on initialization
    add_action('init', 'xendit_register_script');
    function xendit_register_script()
    {
        wp_register_style('xendit_pg_style', plugins_url('/assets/css/xendit-pg-style.css', __FILE__), false, '1.0.1', 'all');
    }

    // use the registered jquery and style above
    add_action('wp_enqueue_scripts', 'xendit_enqueue_style');
    function xendit_enqueue_style()
    {
        wp_enqueue_style('xendit_pg_style');
    }

    add_action('admin_enqueue_scripts', 'xendit_admin_scripts');
    function xendit_admin_scripts($hook)
    {
        if ('post.php' !== $hook) {
            return;
        }
        $xendit = WC_Xendit_Invoice::instance();
        $public_api_key = $xendit->publishable_key; ?>
        <script>
            var xendit_pub_api_key = '<?=$public_api_key; ?>';
        </script>
        <?php
        wp_enqueue_script('woo_xendit_pg_admin', plugins_url('assets/js/xendit-admin.js', WC_XENDIT_PG_MAIN_FILE), array(), WC_XENDIT_PG_VERSION, true);
        wp_register_script('sweetalert', 'https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js', null, null, true);
        wp_enqueue_script('sweetalert');
    }

    add_filter('woocommerce_available_payment_gateways', 'xendit_show_hide_cc_old_method');
    function xendit_show_hide_cc_old_method($gateways)
    {
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');

        //latest PG version contain merged codes
        if (defined('WC_XENDIT_VERSION') && version_compare(WC_XENDIT_VERSION, '1.5.1', '>=') && is_plugin_active(plugin_basename(WC_XENDIT_MAIN_FILE))) {
            //check if both CC payment methods are enabled
            if (isset($gateways['xendit']) && isset($gateways['xendit_cc'])) {
                unset($gateways['xendit']);
            }
        }

        return $gateways;
    }

    /**
     * Migrate subscriptions with old payment method "xendit" to the new "xendit_cc" if:
     * - Subscription status is still active
     * - API key is not empty
     *
     * @return void
     */
    add_action('init', 'migrate_xendit_subscription');
    function migrate_xendit_subscription()
    {
        if (!is_admin()) {
            return;
        }

        if (!function_exists('get_option')) {
            return;
        }

        $should_not_migrate = get_transient('xendit_should_not_migrate_subscription');

        if ($should_not_migrate == true) {
            return;
        }

        $main_settings = get_option('woocommerce_xendit_gateway_settings');
        $secret_key = $main_settings['developmentmode'] == 'yes' && isset($main_settings['secret_key_dev'])
            ? $main_settings['secret_key_dev'] : (
                $main_settings['secret_key'] ?? ""
            );

        if (!$secret_key) {
            return;
        }

        $query_args = array(
            'post_type' => 'shop_subscription',
            'posts_per_page' => 100,
            'paged' => 1,
            'offset' => 0,
            'order' => 'DESC',
            'fields' => 'ids',
            'post_status' => 'wc-active',
            'meta_query' => array(
                array(
                    'key' => '_payment_method',
                    'value' => 'xendit',
                    'compare' => '=',
                )
            )
        );

        $subscription_post_ids = get_posts($query_args);

        if (empty($subscription_post_ids)) {
            set_transient('xendit_should_not_migrate_subscription', true, 86400); //expire in 24 hours
        }

        foreach ($subscription_post_ids as $post_id) {
            update_post_meta($post_id, '_payment_method', 'xendit_cc');
        }
    }

    add_action('woocommerce_review_order_before_submit', 'xendit_add_disclaimer_text', 9);
    function xendit_add_disclaimer_text()
    {
        $chosen_payment_method = WC()->session->get('chosen_payment_method');

        if (strpos($chosen_payment_method, 'xendit') !== false) {
            echo '<p>'.esc_html(__('By using this payment method, you agree that all submitted data for your order will be processed by payment processor.', 'woocommerce-xendit')).'</p>';
        }
    }

    add_filter('woocommerce_cart_needs_payment', 'filter_cart_needs_payment_callback', 100, 2);
    function filter_cart_needs_payment_callback($needs_payment, $cart)
    {
        return $cart->total > 0 ? $needs_payment : false;
    }

    add_action('woocommerce_admin_order_totals_after_total', 'xendit_custom_coupon_display');
    function xendit_custom_coupon_display($order_id)
    {
        global $pagenow, $typenow;

        $order = wc_get_order($order_id);
        $coupons = $order->get_items('coupon');
        $has_xendit_card_promotion = has_xendit_card_promotion($coupons);

        // Targeting admin shop order page with only xendit card promotion coupon
        if (is_admin() && in_array($pagenow, ['post.php', 'post-new.php']) && 'shop_order' === $typenow && $has_xendit_card_promotion === true) {
            // Get the actual total price for each item before discounted
            $items = $order->get_items();
            $subtotals = array();
            foreach ($items as $item) {
                array_push($subtotals, wc_price($item->get_subtotal()));
            }

            ?>
            <script>
                var subtotals = <?php echo json_encode($subtotals); ?>;
                var tableOrderItem = document.getElementsByClassName('woocommerce_order_items');
                var tableOrderItemRow = tableOrderItem[0].rows;

                for (var i = 1; i < tableOrderItemRow.length; i++) {
                    // Replace discounted total price with price before discounted
                    var lineCost = tableOrderItemRow[i].getElementsByClassName('line_cost')[0];
                    var subTotalItemSection = lineCost.getElementsByClassName('woocommerce-Price-amount amount')[0];
                    var subTotalItem = subTotalItemSection.getElementsByTagName('bdi')[0];
                    subTotalItem.innerHTML = subtotals[i - 1];

                    // Remove discount information
                    var discount = lineCost.getElementsByClassName('wc-order-item-discount')[0];
                    discount.innerHTML = '';

                    // Change coupon label
                    var totalItemSection = document.getElementsByClassName('wc-order-data-row wc-order-totals-items wc-order-items-editable')[0];
                    var couponList = totalItemSection.getElementsByClassName('wc_coupon_list')[0];
                    var coupons = couponList.getElementsByTagName('li');
                    totalItemSection.innerHTML = totalItemSection.innerHTML.replaceAll(coupons[0].textContent, couponLabelName);
                }
            </script>
            <?php
        }
    }

    function has_xendit_card_promotion($coupons)
    {
        // check wether only has card promotion as coupon
        if ($coupons) {
            $xendit_card_tag = 0;
            $coupon_tag = 0;
            foreach ($coupons as $coupon) {
                if (strpos($coupon->get_code(), "xendit_card_promotion_") !== false) {
                    $xendit_card_tag = $xendit_card_tag + 1;
                } else {
                    $coupon_tag = $coupon_tag + 1;
                }
            }

            if ($xendit_card_tag > 0 && $coupon_tag === 0) {
                ?>
                <script>
                    var couponLabelName = '<?php echo 'Card Promotion';?>';
                </script>
                <?php
                return true;
            } elseif ($xendit_card_tag > 0 && $coupon_tag > 0) {
                ?>
                <script>
                    var couponLabelName = '<?php echo 'Coupon and Card Promotion';?>';
                </script>
                <?php
                return true;
            }
        }

        return false;
    }

    add_filter('woocommerce_thankyou_order_received_text', 'xendit_woo_redirect_invoice', 10, 2);
    function xendit_woo_redirect_invoice($str, $order)
    {
        $order_data = $order->get_data();

        if (empty($_GET['order_id']) || !is_object($order)) {
            return $str;
        }

        if ('processing' === $order->get_status() || 'completed' === $order->get_status() || 'on-hold' === $order->get_status()) {
            return $str;
        }

        $order_id = wc_clean($_GET['order_id']);
        $invoice_url = get_post_meta($order_id, 'Xendit_invoice_url', true);
        $delay = 3;

        if (!empty($invoice_url)) {
            ?>
            <p id="xendit-invoice-countdown"></p>
            <script>
                var timeLeft = <?php echo $delay; ?>;
                var elem = document.getElementById('xendit-invoice-countdown');

                // Load after everything is rendered
                window.addEventListener("load", function () {
                    // Update the count down every 1 second
                    var x = setInterval(function () {
                        if (timeLeft == 0) {
                            clearTimeout(x);
                            var invoiceUrl = "<?php echo $invoice_url; ?>";
                            window.location.replace(invoiceUrl);
                            elem.innerHTML = 'Not redirected automatically? <button id="xendit-invoice-onclick">Pay Now</button>';

                            var button = document.getElementById('xendit-invoice-onclick');

                            button.onclick = function () {
                                location.href = invoiceUrl;
                            }
                        } else {
                            elem.innerHTML = 'Thank you for placing the order, you will be redirected in ' + timeLeft;
                            timeLeft--;
                        }
                    }, 1000);
                });
            </script>

            <style>
                #xendit-invoice-countdown {
                    font-size: 24px;
                    text-align: center;
                }

                #xendit-invoice-onclick {
                    background: #4481F1;
                    border-radius: 10px;
                    color: #FFFFFF;
                    line-height: 28px;
                    margin-left: 16px;
                }
            </style>
            <?php
        }

        return $str;
    }

    add_action('admin_notices', 'show_admin_notice_warning_on_test_mode');
    function show_admin_notice_warning_on_test_mode()
    {
        $xendit_invoice = WC_Xendit_Invoice::instance();
        $class = 'notice notice-warning';
        $message = wp_kses(__('Xendit payments in TEST mode. Disable "Test Environment" in settings to accept payments. Your Xendit account must also be activated. Learn more <a href=\"https://docs.xendit.co/getting-started/activate-account\" target=\"_blank\">here</a>', 'woocommerce-xendit'), ['a'=>['href'=>true,'target'=>true]]);

        if ($xendit_invoice->developmentmode == 'yes' && $xendit_invoice->id == 'xendit_gateway') {
            printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), $message);
        }
    }

    add_action('admin_notices', 'validate_order_expired');
    function validate_order_expired()
    {
        $xendit_invoice = WC_Xendit_Invoice::instance();
        $xendit_invoice->fail_expired_invoice_order();
    }
}
