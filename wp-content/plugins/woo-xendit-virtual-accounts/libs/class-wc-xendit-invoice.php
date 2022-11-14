<?php

if (!defined('ABSPATH')) {
    exit;
}

class WC_Xendit_Invoice extends WC_Payment_Gateway
{
    const DEFAULT_MAXIMUM_AMOUNT = 1000000000;
    const DEFAULT_MINIMUM_AMOUNT = 10000;
    const DEFAULT_EXTERNAL_ID_VALUE = 'woocommerce-xendit';
    const DEFAULT_CHECKOUT_FLOW = 'CHECKOUT_PAGE';

    /**
     * @var WC_Xendit_Invoice
     */
    private static $_instance;

    public function __construct()
    {
        global $woocommerce;

        $this->id = 'xendit_gateway';
        $this->has_fields = true;
        $this->method_title = 'Xendit';
        $this->method_description = sprintf(wp_kses(__('Collect payment from %1$s on checkout page and get the report realtime on your Xendit Dashboard. <a href="%2$s" target="_blank">Sign In</a> or <a href="%3$s" target="_blank">sign up</a> on Xendit and integrate with your <a href="%4$s" target="_blank">Xendit keys</a>', 'woocommerce-xendit'), ['a'=>['href'=>true,'target'=>true]]), 'Bank Transfer (Virtual Account)', 'https://dashboard.xendit.co/auth/login', 'https://dashboard.xendit.co/register', 'https://dashboard.xendit.co/settings/developers#api-keys');
        $this->method_code = $this->method_title;
        $this->supported_currencies = array(
            'IDR',
            'PHP',
            'USD'
        );

        $this->init_form_fields();
        $this->init_settings();

        // user setting variables
        $this->title = 'Payment Gateway';
        $this->description = 'Pay with Xendit';

        $this->DEFAULT_MAXIMUM_AMOUNT = self::DEFAULT_MAXIMUM_AMOUNT;
        $this->DEFAULT_MINIMUM_AMOUNT = self::DEFAULT_MINIMUM_AMOUNT;

        $this->developmentmode = $this->get_option('developmentmode');
        $this->showlogo = 'yes';

        $this->success_response_xendit = 'COMPLETED';
        $this->success_payment_xendit = $this->get_option('success_payment_xendit');
        $this->responce_url_sucess = $this->get_option('responce_url_calback');
        $this->checkout_msg = 'Thank you for your order, please follow the account numbers provided to pay with secured Xendit.';
        $this->xendit_callback_url = home_url() . '/?wc-api=wc_xendit_callback&xendit_mode=xendit_invoice_callback';
        $this->generic_error_message = 'We encountered an issue while processing the checkout. Please contact us. ';

        $this->xendit_status = $this->developmentmode == 'yes' ? "[Development]" : "[Production]";

        $this->msg['message'] = "";
        $this->msg['class'] = "";

        $this->external_id_format = !empty($this->get_option('external_id_format')) ? $this->get_option('external_id_format') : self::DEFAULT_EXTERNAL_ID_VALUE;
        $this->redirect_after = !empty($this->get_option('redirect_after')) ? $this->get_option('redirect_after') : self::DEFAULT_CHECKOUT_FLOW;
        $this->for_user_id = $this->get_option('on_behalf_of');
        $this->enable_xenplatform = $this->for_user_id ? 'yes' : $this->get_option('enable_xenplatform');

        // API Key
        $this->publishable_key = $this->developmentmode == 'yes' ? $this->get_option('api_key_dev') : $this->get_option('api_key');
        $this->secret_key = $this->developmentmode == 'yes' ? $this->get_option('secret_key_dev') : $this->get_option('secret_key');

        $this->xenditClass = new WC_Xendit_PG_API();

        $this->oauth_data = WC_Xendit_Oauth::getXenditOAuth();

        // Generate Validation Key
        if (empty(WC_Xendit_Oauth::getValidationKey())) {
            $key = md5(rand());
            WC_Xendit_Oauth::updateValidationKey($key);
        }

        // Generate OAuth link
        $this->oauth_link = "https://dashboard.xendit.co/oauth/authorize";
        $this->oauth_link .= "?client_id=906468d0-fefd-4179-ba4e-407ef194ab85"; // initiate with prod client
        $this->oauth_link .= "&response_type=code&state=WOOCOMMERCE|"
                                .WC_Xendit_Oauth::getValidationKey()."|"
                                .home_url()."?wc-api=wc_xendit_oauth";
        $this->oauth_link .= "&redirect_uri=https://tpi.xendit.co/authorization/xendit/redirect/v2";

        add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
        add_action('woocommerce_receipt_' . $this->id, array(&$this, 'receipt_page'));
        add_action('wp_enqueue_scripts', array(&$this, 'payment_scripts'));
        add_filter('woocommerce_available_payment_gateways', array(&$this, 'check_gateway_status'));

        wp_register_script('sweetalert', 'https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js', null, null, true);
        wp_enqueue_script('sweetalert');
    }

    /**
     * @return WC_Xendit_Invoice
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function is_valid_for_use()
    {
        return in_array(get_woocommerce_currency(), apply_filters(
            'woocommerce_' . $this->id . '_supported_currencies',
            $this->supported_currencies
        ));
    }

    public function payment_scripts()
    {
        wp_enqueue_script('xendit-gateway', plugins_url('assets/xendit.app.js', WC_XENDIT_PG_MAIN_FILE), array('wc-checkout'), false, true);
    }

    public function admin_options()
    {
        // Display success connected to xendit thought OAuth
        if (!empty($_GET['xendit_oauth_status'])) {
            echo "<div id='message' class='updated inline'>
                    <p>You have successfully authenticated your WooCommerce store with Xendit! You can now start accepting payments from our gateway.</p>
                </div>";
        }

        // Check for OAuth data
        $oauth_id = (!empty($_GET['xendit_oauth_id'])) ? $_GET['xendit_oauth_id'] : "";

        if (!empty($oauth_id)) {
            $authData = $this->xenditClass->getAuthorizationData($oauth_id);

            if (!empty($authData["oauth_data_production"])) {
                WC_Xendit_Oauth::updateXenditOAuth($authData);

                wp_redirect(get_admin_url(null, "/admin.php?page=wc-settings&tab=checkout&section=xendit_gateway&xendit_oauth_status=1"));
            } else {
                echo "<div class='notice notice-error'>
                        <p>It seems that there's a problem verifying your authentication. Please try again.</p>
                    </div>";
            }
        }

        echo "<h3>Integration</h3>";

        echo '<div ><p>'.wp_kses(__('Use Xendit to accept payments in South East Asia. See our <a href="https://docs.xendit.co/integrations/woocommerce/steps-to-integrate" target="_blank">documentation</a> for full description and integration instructions', 'woocommerce-xendit'), ['a'=>['href'=>true,'target'=>true]]).'</p></div>';

        if (empty($this->oauth_data)) {
            echo "<button class='components-button is-primary' id='woocommerce_xendit_connect_button'>".esc_html(__('Connect to Xendit', 'woocommerce-xendit'))."</button>";
        } else {
            echo "<button class='components-button is-secondary' disabled>".esc_html(__('Connected', 'woocommerce-xendit'))."</button>";
        }

        if (empty($this->oauth_data)) {
            echo "<button class='components-button is-secondary' disabled>".esc_html(__('Disconnect', 'woocommerce-xendit'))."</button>";
        } else {
            echo "<button class='components-button is-secondary' id='woocommerce_xendit_gateway_disconect_button'>".esc_html(__('Disconnect', 'woocommerce-xendit'))."</button>";
        }
        ?>

        <table class="form-table">
            <?php $this->generate_settings_html(); ?>
        </table>

        <style>
            .xendit-ttl-wrapper {
                width: 400px;
                position: relative;
            }

            .xendit-ttl,
            .xendit-ext-id {
                width: 320px !important;
            }

            .xendit-form-suffix {
                width: 70px;
                position: absolute;
                bottom: 6px;
                right: 0;
            }
        </style>

        <script>
            jQuery(document).ready(function($) {
                // always hide oauth fields
                $(".xendit-oauth").parents("tr").hide();

                // Disconect action
                let disconect_button = $('#woocommerce_xendit_gateway_disconect_button');
                disconect_button.on('click', function(e) {
                    e.preventDefault();
                    new swal({
                        title: "Are you sure you want to disconnect Xendit payment?",
                        text: "Transactions can no longer be made, and all settings will be lost.",
                        icon: "warning",
                        dangerMode: true,
                        buttons: ["Cancel", "Disconnect"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            disconect_button.text('Loading, please wait a moment...').attr('disabled', true);

                            fetch("<?= home_url(); ?>/wp-json/xendit-wc/v1/disconnect", {
                                method: "DELETE",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-WP-Nonce": '<?php echo wp_create_nonce('wp_rest')?>'
                                }
                            })
                            .then((response) => response.json())
                            .then(json => {
                                switch (json.message) {
                                    case 'success':
                                        location.reload();
                                        break;
                                    case 'Sorry, you are not allowed to do that.':
                                        new swal({
                                            type: 'error',
                                            title: 'Failed',
                                            text: 'Only Administrators and Shop Managers can disconnect'
                                        }).then(
                                            function(){
                                                location.reload();
                                            }
                                        )
                                        break;
                                    default:
                                        new swal({
                                            type: 'error',
                                            title: 'Failed',
                                            text: json.message
                                        }).then(
                                            function(){
                                                location.reload();
                                            }
                                        )
                                        break;
                                }
                            })
                            .catch(error => {
                                new swal({
                                    type: 'error',
                                    title: 'Failed',
                                    text: 'Oops, something wrong happened! Please try again.'
                                }).then(
                                    function(){
                                        location.reload();
                                    }
                                )
                            });
                        }
                    });
                });

                // Change send data value
                let send_data_button = $('#woocommerce_xendit_gateway_send_site_data_button');
                send_data_button.val('<?= esc_html(__('Send site data to Xendit', 'woocommerce-xendit')); ?>');

                send_data_button.on('click', function(e) {
                    <?php
                    try {
                        $site_data = WC_Xendit_Site_Data::retrieve();
                        $create_plugin = $this->xenditClass->createPluginInfo($site_data);
                        ?>
                                new swal({
                                    type: 'success',
                                    title: '<?= esc_html(__('Success', 'woocommerce-xendit')); ?>',
                                    text: '<?= esc_html(__('Thank you! We have successfully collected all the basic information that we need to assist you with any issues you may have. All data will remain private & confidential', 'woocommerce-xendit')); ?>'
                                }).then(
                                    function(){
                                        location.reload();
                                    }
                                )
                        <?php
                    } catch (\Throwable $th) {
                        ?>
                                new swal({
                                    type: 'error',
                                    title: '<?= esc_html(__('Failed', 'woocommerce-xendit')); ?>',
                                    text: '<?= esc_html(__('Oops, something wrong happened! Please try again', 'woocommerce-xendit')); ?>'
                                }).then(
                                    function(){
                                        location.reload();
                                    }
                                )
                        <?php
                    }
                    ?>
                });

                let xendit_connect_button = $('#woocommerce_xendit_connect_button');
                xendit_connect_button.on('click', function(e) {
                    e.preventDefault();
                    window.open("<?= $this->oauth_link; ?>", '_blank').focus();

                    new swal({
                        title:"<?= esc_html(__('Loading', 'woocommerce-xendit')); ?> ...",
                        text:"<?= esc_html(__('Please finish your integration on Xendit', 'woocommerce-xendit')); ?>",
                        buttons: true,
                        buttons: ["Cancel", false],
                        closeOnClickOutside: false,
                    }).then(
                        function(){
                            location.reload();
                        }
                    );

                    // Check OAuth status every 5 seconds
                    setInterval(() => {
                        fetch("<?= home_url(); ?>/wp-json/xendit-wc/v1/oauth_status", {
                            method: "GET",
                            headers: {
                                "Content-Type": "application/json",
                                "X-WP-Nonce": '<?php echo wp_create_nonce('wp_rest')?>'
                            }
                        })
                        .then((response) => response.json())
                        .then(json => {
                            if (json.is_connected) {
                                location.reload();
                            }
                        });
                    }, 5000);
                });

                <?php if ($this->developmentmode == 'yes') { ?>
                    $('.xendit_dev').parents('tr').show();
                    $('.xendit_live').parents('tr').hide();
                <?php } else { ?>
                    $('.xendit_dev').parents('tr').hide();
                    $('.xendit_live').parents('tr').show();
                <?php } ?>

                <?php if ($this->for_user_id) { ?>
                    $("#woocommerce_<?= $this->id; ?>_enable_xenplatform").prop('checked', true);
                    $('.xendit-xenplatform').parents('tr').show();
                <?php } else { ?>
                    $("#woocommerce_<?= $this->id; ?>_enable_xenplatform").prop('checked', false);
                    $('.xendit-xenplatform').parents('tr').hide();
                <?php } ?>

                $(".xendit-ttl").wrap("<div class='xendit-ttl-wrapper'></div>");
                $("<span class='xendit-form-suffix'>Seconds</span>").insertAfter(".xendit-ttl");

                $(".xendit-ext-id").wrap("<div class='input-text regular-input xendit-ttl-wrapper'></div>");
                $("<span class='xendit-form-suffix'>-order_id</span>").insertAfter(".xendit-ext-id");

                $("#ext-id-example").text(
                    "<?= $this->external_id_format ?>-4245");

                $("#woocommerce_<?= $this->id; ?>_external_id_format").change(
                    function() {
                        $("#ext-id-example").text($(this).val() + "-4245");
                    });

                var isSubmitCheckDone = false;

                $('button[name="save"]').on('click', function(e) {
                    if (isSubmitCheckDone) {
                        isSubmitCheckDone = false;
                        return;
                    }

                    e.preventDefault();

                    //empty "on behalf of" if enable xenplatform is uncheck
                    if (!$("#woocommerce_<?= $this->id; ?>_enable_xenplatform").is(":checked")) {
                        $("#woocommerce_<?= $this->id; ?>_on_behalf_of").val('');
                    }

                    var externalIdValue = $(
                        "#woocommerce_<?= $this->id; ?>_external_id_format"
                    ).val();

                    if (externalIdValue.length === 0) {
                        return new swal({
                            type: 'error',
                            title: 'Invalid External ID Format',
                            text: 'External ID cannot be empty, please input one or change it to woocommerce-xendit'
                        }).then(function() {
                            e.preventDefault();
                        });
                    }

                    if (/[^a-z0-9-]/gmi.test(externalIdValue)) {
                        return new swal({
                            type: 'error',
                            title: 'Unsupported Character',
                            text: 'The only supported characters in external ID are alphanumeric (a - z, 0 - 9) and dash (-)'
                        }).then(function() {
                            e.preventDefault();
                        });
                    }

                    if (externalIdValue.length <= 5 || externalIdValue.length > 54) {
                        return new swal({
                            type: 'error',
                            title: 'External ID length is outside range',
                            text: 'External ID must be between 6 to 54 characters'
                        }).then(function() {
                            e.preventDefault();
                        });
                    }

                    isSubmitCheckDone = true;
                    $("button[name='save']").trigger('click');
                });

                $("#woocommerce_<?= $this->id; ?>_enable_xenplatform").change(
                    function() {
                        if (this.checked) {
                            $(".xendit-xenplatform").parents("tr").show();
                        } else {
                            $(".xendit-xenplatform").parents("tr").hide();
                        }
                    }
                );

                $("#woocommerce_<?= $this->id; ?>_developmentmode").change(
                    function() {
                        if (this.checked) {
                            $(".xendit_dev").parents("tr").show();
                            $(".xendit_live").parents("tr").hide();
                        } else {
                            $(".xendit_dev").parents("tr").hide();
                            $(".xendit_live").parents("tr").show();
                        }
                    }
                );

                // Overwrite default value
                $("#woocommerce_<?= $this->id; ?>_dummy_api_key").val("<?= $this->generateStarChar(strlen($this->get_option('api_key'))); ?>");
                $("#woocommerce_<?= $this->id; ?>_dummy_secret_key").val("<?= $this->generateStarChar(strlen($this->get_option('secret_key'))); ?>");
                $("#woocommerce_<?= $this->id; ?>_dummy_api_key_dev").val("<?= $this->generateStarChar(strlen($this->get_option('api_key_dev'))); ?>");
                $("#woocommerce_<?= $this->id; ?>_dummy_secret_key_dev").val("<?= $this->generateStarChar(strlen($this->get_option('secret_key_dev'))); ?>");
            });
        </script>
        <?php
    }

    public function init_form_fields()
    {
        $this->form_fields = array(
            'general_options' => array(
                'title' => esc_html(__('Xendit Payment Gateway Options', 'woocommerce-xendit')),
                'type' => 'title',
            ),

            'enabled' => array(
                'title' => esc_html(__('Enable', 'woocommerce-xendit')),
                'type' => 'checkbox',
                'label' => esc_html(__('Enable Xendit Gateway', 'woocommerce-xendit')),
                'default' => 'no',
            ),

            'developmentmode' => array(
                'title' => esc_html(__('Test Environment', 'woocommerce-xendit')),
                'type' => 'checkbox',
                'label' => esc_html(__('Enable Test Environment - Please uncheck for processing real transaction', 'woocommerce-xendit')),
                'default' => 'no',
            ),

            'dummy_api_key' => array(
                'class' => 'xendit_live',
                'title' => esc_html(__('Xendit Public API Key', 'woocommerce-xendit')).'<br/>['.esc_html(__('Live Mode', 'woocommerce-xendit'), []).']',
                'type' => 'password',
                'description' => wp_kses(__('Live public API key from Xendit. Found <a href="https://dashboard.xendit.co/settings/developers#api-keys" target="_blank">here</a>', 'woocommerce-xendit'), ['a'=>['href'=>true,'target'=>true]]),
                'default' => esc_html(__('****', 'woocommerce-xendit')),
            ),

            'dummy_secret_key' => array(
                'class' => 'xendit_live',
                'title' => esc_html(__('Xendit Secret API Key', 'woocommerce-xendit')).'<br/>['.esc_html(__('Live Mode', 'woocommerce-xendit'), []).']',
                'type' => 'password',
                'description' => wp_kses(__('Live secret API key from Xendit. Found <a href="https://dashboard.xendit.co/settings/developers#api-keys" target="_blank">here</a>', 'woocommerce-xendit'), ['a'=>['href'=>true,'target'=>true]]),
                'default' => esc_html(__('****', 'woocommerce-xendit')),
            ),

            'dummy_api_key_dev' => array(
                'class' => 'xendit_dev',
                'title' => esc_html(__('Xendit Public API Key', 'woocommerce-xendit')).'<br/>['.esc_html(__('Test Mode', 'woocommerce-xendit'), []).']',
                'type' => 'password',
                'description' => wp_kses(__('Test public API key from Xendit. Found <a href="https://dashboard.xendit.co/settings/developers#api-keys" target="_blank">here</a>', 'woocommerce-xendit'), ['a'=>['href'=>true,'target'=>true]]),
                'default' => esc_html(__('****', 'woocommerce-xendit')),
            ),

            'dummy_secret_key_dev' => array(
                'class' => 'xendit_dev',
                'title' => esc_html(__('Xendit Secret API Key', 'woocommerce-xendit')).'<br/>['.esc_html(__('Test Mode', 'woocommerce-xendit'), []).']',
                'type' => 'password',
                'description' => wp_kses(__('Test secret API key from Xendit. Found <a href="https://dashboard.xendit.co/settings/developers#api-keys" target="_blank">here</a>', 'woocommerce-xendit'), ['a'=>['href'=>true,'target'=>true]]),
                'default' => esc_html(__('****', 'woocommerce-xendit')),
            ),

            'external_id_format' => array(
                'title' => esc_html(__('External ID Format', 'woocommerce-xendit')),
                'class' => 'xendit-ext-id',
                'type' => 'text',
                'description' => wp_kses(__('External ID of the payment that will be created on Xendit, for example <b><span id="ext-id-example"></span></b>.<br/> Must be between 6 to 54 characters', 'woocommerce-xendit'), ['b'=>[], 'br'=>[], 'span'=>['id'=>true]]),
                'default' => esc_html(__(self::DEFAULT_EXTERNAL_ID_VALUE, 'woocommerce-xendit')),
            ),

            'send_site_data_button' => array(
                'title' => esc_html(__('Site Data Collection', 'woocommerce-xendit')),
                'type' => 'button',
                'description' => esc_html(__("Allow Xendit to retrieve this store's plugin and environment information for debugging purposes. E.g. WordPress version, WooCommerce version", 'woocommerce-xendit')),
                'class' => 'button-primary',
                'default' => esc_html(__('Send site data to Xendit', 'woocommerce-xendit'))
            ),

            'woocommerce_options' => array(
                'title' => esc_html(__('WooCommerce Order & Checkout Options', 'woocommerce-xendit')),
                'type' => 'title',
            ),

            'success_payment_xendit' => array(
                'title' => esc_html(__('Successful Payment Status', 'woocommerce-xendit')),
                'type' => 'select',
                'description' => esc_html(__('The status that WooCommerce should show when a payment is successful', 'woocommerce-xendit')),
                'default' => 'processing',
                'class' => 'form-control',
                'options' => array(
                    'pending' => esc_html(__('Pending payment', 'woocommerce-xendit')),
                    'processing' => esc_html(__('Processing', 'woocommerce-xendit')),
                    'completed' => esc_html(__('Completed', 'woocommerce-xendit')),
                    'on-hold' => esc_html(__('On Hold', 'woocommerce-xendit')),
                ),
            ),

            'redirect_after' => array(
                'title' => esc_html(__('Display Invoice Page After', 'woocommerce-xendit')),
                'type' => 'select',
                'description' => esc_html(__('Choose "Order received page" to get better tracking of your order conversion if you are using an analytic platform', 'woocommerce-xendit')),
                'default' => 'CHECKOUT_PAGE',
                'class' => 'form-control',
                'options' => array(
                    'CHECKOUT_PAGE' => esc_html(__('Checkout page', 'woocommerce-xendit')),
                    'ORDER_RECEIVED_PAGE' => esc_html(__('Order received page', 'woocommerce-xendit')),
                ),
            ),

            'xenplatform_options' => array(
                'title' => esc_html(__('XenPlatform Options', 'woocommerce-xendit')),
                'type' => 'title',
            ),

            'enable_xenplatform' => array(
                'title' => esc_html(__('XenPlatform User', 'woocommerce-xendit')),
                'type' => 'checkbox',
                'label' => esc_html(__('Enable your XenPlatform Sub Account in WooCommerce', 'woocommerce-xendit')),
                'default' => ''
            ),

            'on_behalf_of' => array(
                'title' => esc_html(__('On Behalf Of', 'woocommerce-xendit')),
                'class' => 'form-control xendit-xenplatform',
                'type' => 'text',
                'description' => esc_html(__('Your Xendit Sub Account Business ID. All transactions will be linked to this account', 'woocommerce-xendit')),
                'default' => esc_html(__('', 'woocommerce-xendit')),
                'placeholder' => 'e.g. 5f57be181c4ff635452d817d'
            ),
            'invoice_expire_duration' => array(
                'title' => esc_html(__('Invoice Expire Time', 'woocommerce-xendit')),
                'class' => 'form-control xendit-xenplatform',
                'type' => 'text',
                'default' => esc_html(__(1, 'woocommerce-xendit')),
                'placeholder' => 'e.g. 30'
            ),
            'invoice_expire_unit' => array(
                'title' => esc_html(__('', 'woocommerce-xendit')),
                'type' => 'select',
                'default' => 'DAYS',
                'class' => 'form-control xendit-xenplatform',
                'options' => array(
                    'MINUTES' => esc_html(__('Minutes', 'woocommerce-xendit')),
                    'HOURS' => esc_html(__('Hours', 'woocommerce-xendit')),
                    'DAYS' => esc_html(__('Days', 'woocommerce-xendit')),
                ),
            ),
        );
    }

    public function payment_fields()
    {
        if ($this->description) {
            $test_description = '';
            if ($this->developmentmode == 'yes') {
                $test_description = wp_kses(__('<strong>TEST MODE</strong> - Real payment will not be detected', 'woocommerce-xendit'), ['strong'=>[]]);
            }

            echo '<p>' . $this->description . '</p>
                <p style="color: red; font-size:80%; margin-top:10px;">' . $test_description . '</p>';
        }
    }

    public function receipt_page($order_id)
    {
        global $wpdb, $woocommerce;

        $order = new WC_Order($order_id);

        $payment_gateway = wc_get_payment_gateway_by_order($order_id);
        if ($payment_gateway->id != $this->id) {
            return;
        }

        $invoice = get_post_meta($order_id, 'Xendit_invoice', true);
        $invoice_exp = get_post_meta($order_id, 'Xendit_expiry', true);

        $return = '<div style="text-align:left;"><strong>' . $this->checkout_msg . '</strong><br /><br /></div>';

        if ($this->developmentmode == 'yes') {
            $testDescription = sprintf(wp_kses(__('<strong>TEST MODE.</strong> The bank account numbers shown below are for testing only. Real payments will not be detected', 'woocommerce-xendit'), ['strong'=>[]]));
            $return .= '<div style="text-align:left;">' . $testDescription . '</div>';
        }

        echo $return;
    }

    public function process_payment($order_id)
    {
        global $wpdb, $woocommerce;

        try {
            $order = new WC_Order($order_id);
            $amount = $order->get_total();
            $currency = $order->get_currency();

            if ($amount < $this->DEFAULT_MINIMUM_AMOUNT) {
                WC_Xendit_PG_Helper::cancel_order($order, 'Cancelled because amount is below minimum amount');

                $err_msg = sprintf(__(
                    'The minimum amount for using this payment is %1$s %2$s. Please put more item(s) to reach the minimum amount. Code: 100001',
                    'woocommerce-gateway-xendit'
                ), $currency, wc_price($this->DEFAULT_MINIMUM_AMOUNT));

                wc_add_notice($this->get_localized_error_message('INVALID_AMOUNT_ERROR', $err_msg), 'error');
                return;
            }

            if ($amount > $this->DEFAULT_MAXIMUM_AMOUNT) {
                WC_Xendit_PG_Helper::cancel_order($order, 'Cancelled because amount is above maximum amount');

                $err_msg = sprintf(__(
                    'The maximum amount for using this payment is %1$s %2$s. Please remove one or more item(s) from your cart. Code: 100002',
                    'woocommerce-gateway-xendit'
                ), $currency, wc_price($this->DEFAULT_MAXIMUM_AMOUNT));

                wc_add_notice($this->get_localized_error_message('INVALID_AMOUNT_ERROR', $err_msg), 'error');
                return;
            }

            $blog_name = html_entity_decode(get_option('blogname'), ENT_QUOTES | ENT_HTML5);
            $productinfo = "Payment for Order #{$order_id} at " . $blog_name;

            $payer_email = !empty($order->get_billing_email()) ? $order->get_billing_email() : 'noreply@mail.com';
            $order_number = $this->external_id_format . "-" . $order_id;

            $payment_gateway = wc_get_payment_gateway_by_order($order_id);

            if ($payment_gateway->id != $this->id) {
                return;
            }

            $invoice = get_post_meta($order_id, 'Xendit_invoice', true);
            $invoice_exp = get_post_meta($order_id, 'Xendit_expiry', true);

            $additional_data = WC_Xendit_PG_Helper::generate_items_and_customer($order, $amount);

            $invoice_data = array(
                'external_id' => $order_number,
                'amount' => $amount,
                'currency' => $currency,
                'payer_email' => $payer_email,
                'description' => $productinfo,
                'client_type' => 'INTEGRATION',
                'success_redirect_url' => $this->get_return_url($order),
                'failure_redirect_url' => wc_get_checkout_url(),
                'platform_callback_url' => $this->xendit_callback_url,
                'checkout_redirect_flow' => $this->redirect_after,
                'customer'  => !empty($additional_data['customer']) ? $additional_data['customer'] : '',
                'items' => !empty($additional_data['items']) ? $additional_data['items'] : ''
            );

            // Generate Xendit payment fees
            $fees = WC_Xendit_Payment_Fees::generatePaymentFees($order);
            if (!empty($fees)) {
                $invoice_data['fees'] = $fees;
            }

            $header = array(
                'x-plugin-method' => strtoupper($this->method_code),
                'x-plugin-store-name' => $blog_name
            );

            if ($invoice && $invoice_exp > time()) {
                $response = $this->xenditClass->getInvoice($invoice);
            } else {
                $response = $this->xenditClass->createInvoice($invoice_data, $header);
            }

            if (!empty($response['error_code'])) {
                $response['message'] = !empty($response['code']) ? $response['message'] . ' Code: ' . $response['code'] : $response['message'];
                $message = $this->get_localized_error_message($response['error_code'], $response['message']);
                $order->add_order_note('Checkout with invoice unsuccessful. Reason: ' . $message);

                throw new Exception($message);
            }

            if ($response['status'] == 'PAID' || $response['status'] == 'COMPLETED') {
                return;
            }

            update_post_meta($order_id, 'Xendit_invoice', esc_attr($response['id']));
            update_post_meta($order_id, 'Xendit_invoice_url', esc_attr($response['invoice_url'] . '#' . strtolower($this->method_code)));
            update_post_meta($order_id, 'Xendit_expiry', esc_attr(strtotime($response['expiry_date'])));

            switch ($this->redirect_after) {
                case 'ORDER_RECEIVED_PAGE':
                    $args = array(
                        'utm_nooverride' => '1',
                        'order_id'       => $order_id,
                    );
                    $return_url = esc_url_raw(add_query_arg($args, $this->get_return_url($order)));
                    break;
                case 'CHECKOUT_PAGE':
                default:
                    $return_url = get_post_meta($order_id, 'Xendit_invoice_url', true);
            }

            // Set payment pending
            $order->update_status('pending', __('Awaiting Xendit payment', 'woocommerce-xendit'));

            // log success metrics
            $metrics = $this->xenditClass->constructMetricPayload('woocommerce_checkout', 'success', $this->method_code);
            $this->xenditClass->trackMetricCount($metrics);

            // Return thankyou redirect
            return array(
                'result' => 'success',
                'redirect' => $return_url,
            );
        } catch (Exception $e) {
            wc_add_notice($e->getMessage(), 'error');

            // log error metrics
            $error_code = !empty($response['error_code']) ? $response['error_code'] : '';
            $metrics = $this->xenditClass->constructMetricPayload('woocommerce_checkout', 'error', $this->method_code, $error_code);
            $this->xenditClass->trackMetricCount($metrics);
            return;
        }
    }

    public function validate_payment($response)
    {
        global $wpdb, $woocommerce;

        try {
            $invoice = $this->xenditClass->getInvoice($response->id);

            if (!empty($invoice['error_code'])) {
                $invoice['message'] = !empty($invoice['code']) ? $invoice['message'] . ' Code: ' . $invoice['code'] : $invoice['message'];
                $message = $this->get_localized_error_message($invoice['error_code'], $invoice['message']);
                header('HTTP/1.1 400 Invalid Data Received');
                die($message);
            }

            $external_id = $invoice['external_id'];
            $exploded_ext_id = explode("-", $external_id);
            $order_num = end($exploded_ext_id);

            if (!is_numeric($order_num)) {
                $exploded_ext_id = explode("_", $external_id);
                $order_num = end($exploded_ext_id);
            }

            $order = new WC_Order($order_num);
            $order_id = version_compare(WC()->version, '3.0.0', '<') ? $order->id : $order->get_id();

            if ($this->developmentmode != 'yes') {
                $payment_gateway = wc_get_payment_gateway_by_order($order_id);
                if (false === get_post_status($order_id) || strpos($payment_gateway->id, 'xendit')) {
                    header('HTTP/1.1 400 Invalid Data Received');
                    die('Xendit is live and require a valid order id');
                }
            }

            $successMetrics = $this->xenditClass->constructMetricPayload('woocommerce_callback', 'success', $invoice['payment_channel']);

            if ('PAID' == $invoice['status'] || 'SETTLED' == $invoice['status']) {
                //update payment method in case customer change method after invoice is generated
                $method = $this->map_payment_channel($invoice['payment_channel']);
                if ($method) {
                    $order->set_payment_method($method['id']);
                    $order->set_payment_method_title($method['title']);

                    //save charge ID if paid by credit card
                    if ($method['id'] == 'xendit_cc' && !empty($invoice['credit_card_charge_id'])) {
                        $order->set_transaction_id($invoice['credit_card_charge_id']);
                    }

                    $order->save();
                }

                $notes = WC_Xendit_PG_Helper::build_order_notes(
                    $invoice['id'],
                    $invoice['status'],
                    $invoice['payment_channel'],
                    $invoice['currency'],
                    $invoice['paid_amount']
                );
                WC_Xendit_PG_Helper::complete_payment($order, $notes, $this->success_payment_xendit);

                // Empty cart in action
                $woocommerce->cart->empty_cart();

                $this->xenditClass->trackMetricCount($successMetrics);

                die('Success');
            } else {
                $order->update_status('failed');

                $notes = WC_Xendit_PG_Helper::build_order_notes(
                    $invoice['id'],
                    $invoice['status'],
                    $invoice['payment_channel'],
                    $invoice['currency'],
                    $invoice['paid_amount']
                );

                $order->add_order_note("<b>Xendit payment failed.</b><br>" . $notes);

                $this->xenditClass->trackMetricCount($successMetrics);

                die('Invoice ' . $invoice['payment_method'] . ' status is ' . $invoice['status']);
            }
        } catch (Exception $e) {
            // log error metrics
            $errorMetrics = $this->xenditClass->constructMetricPayload('woocommerce_callback', 'error', $invoice['payment_channel']);
            $this->xenditClass->trackMetricCount($errorMetrics);
        }
    }

    public function check_gateway_status($gateways)
    {
        global $wpdb, $woocommerce;

        if (is_null($woocommerce->cart)) {
            return $gateways;
        }

        if ($this->enabled == 'no') {
            unset($gateways[$this->id]);
            return $gateways;
        }

        if ($this->xenditClass->isCredentialExist() == false) {
            unset($gateways[$this->id]);
            return $gateways;
        }

        if ($this->id == 'xendit_gateway') {
            unset($gateways[$this->id]);
            return $gateways;
        }

        if (!$this->is_valid_for_use()) {
            unset($gateways[$this->id]);
            return $gateways;
        }

        /**
         * get_cart_contents_total() will give us just the final (float) amount after discounts.
         * Compatible with WC version 3.2.0 & above.
         * Source: https://woocommerce.github.io/code-reference/classes/WC-Cart.html#method_get_cart_contents_total
         */
        $amount = $woocommerce->cart->get_cart_contents_total();
        if ($amount > $this->DEFAULT_MAXIMUM_AMOUNT) {
            unset($gateways[$this->id]);
            return $gateways;
        }

        return $gateways;
    }

    /**
     * Return filter of PG icon image in checkout page. Called by this class automatically.
     */
    public function get_icon()
    {
        if ($this->showlogo !== 'yes') {
            return;
        }
        $width = '65px';
        if ($this->method_code == 'Permata' || $this->method_code == 'GRABPAY') {
            $width = '75px';
        }
        $style = version_compare(WC()->version, '2.6', '>=') ? "style='margin-left: 0.3em; max-height: 28px; max-width: $width;'" : '';
        $file_name = strtolower($this->method_code) . '.svg';
        $icon = '<img src="' . plugins_url('assets/images/' . $file_name, WC_XENDIT_PG_MAIN_FILE) . '" alt="Xendit" ' . $style . ' />';

        return apply_filters('woocommerce_gateway_icon', $icon, $this->id);
    }

    public function get_xendit_method_title()
    {
        return $this->method_type . ' - ' . str_replace('_', ' ', $this->method_code);
    }

    public function get_xendit_method_description()
    {
        switch (strtoupper($this->method_code)) {
            case 'ALFAMART':
                return sprintf(wp_kses(__('Pay at your nearest %1$s via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'Alfa group (Alfamart, Alfamidi & Dan+Dan)');
            case 'INDOMARET':
                return sprintf(wp_kses(__('Pay at your nearest %1$s via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'Indomaret, Indogrosir, Superindo, atau i.saku');
            case 'SHOPEEPAY':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'ShopeePay');
            case 'DD_BRI':
                return sprintf(wp_kses(__('Pay with your Direct Debit %1$s via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'BRI');
            case 'DD_BPI':
                return sprintf(wp_kses(__('Pay with your Direct Debit %1$s via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'BPI');
            case 'DD_UBP':
                return sprintf(wp_kses(__('Pay with your Direct Debit %1$s via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'UBP');
            case 'DD_RCBC':
                return sprintf(wp_kses(__('Pay with your Direct Debit %1$s via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'RCBC');
            case 'PAYMAYA':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'PayMaya');
            case 'GCASH':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'GCash');
            case 'GRABPAY':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'GrabPay');
            case '7ELEVEN':
                return sprintf(wp_kses(__('Pay at your nearest %1$s via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), '7-Eleven');
            case 'DANA':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'DANA');
            case 'OVO':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'OVO');
            case 'LINKAJA':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'LINKAJA');
            case 'QRIS':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'QRIS');
            case 'BILLEASE':
                return sprintf(wp_kses(__('Buy now and pay later with your %1$s via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'BillEase');
            case 'KREDIVO':
                return sprintf(wp_kses(__('Buy now and pay later with your %1$s via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'Kredivo');
            case 'CEBUANA':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'Cebuana');
            case 'DP_MLHUILLIER':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'M Lhuillier');
            case 'DP_PALAWAN':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'Palawan Express Pera Padala');
            case 'DP_ECPAY_LOAN':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'ECPay Loan');
            case 'CASHALO':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'Cashalo');
            case 'UANGME':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'Uangme');
            case 'ASTRAPAY':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'AstraPay');
            case 'AKULAKU':
                return sprintf(wp_kses(__('Pay with your %1$s account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), 'Akulaku');
            default:
                return sprintf(wp_kses(__('Pay with bank transfer %1$s or virtual account via <strong>Xendit</strong>', 'woocommerce-xendit'), ['strong'=>[]]), $this->method_code);
        }
    }

    public function get_xendit_admin_description()
    {
        return sprintf(wp_kses(__('Collect payment from %1$s on checkout page and get the report realtime on your Xendit Dashboard. <a href="%2$s" target="_blank">Sign In</a> or <a href="%3$s" target="_blank">sign up</a> on Xendit and integrate with your <a href="%4$s" target="_blank">Xendit keys</a>', 'woocommerce-xendit'), ['a'=>['href'=>true,'target'=>true]]), $this->method_code, 'https://dashboard.xendit.co/auth/login', 'https://dashboard.xendit.co/register', 'https://dashboard.xendit.co/settings/developers#api-keys');
    }

    public function process_admin_options()
    {
        $this->init_settings();
        $post_data = $this->get_post_data();

        foreach ($this->get_form_fields() as $key => $field) {
            if ('title' !== $this->get_field_type($field)) {
                try {
                    $value = $this->get_field_value($key, $field, $post_data);

                    // map dummy api keys
                    $api_fields = array('dummy_api_key', 'dummy_secret_key', 'dummy_api_key_dev', 'dummy_secret_key_dev');
                    if (in_array($key, $api_fields)) {
                        $real_key_field = str_replace('dummy_', '', $key);
                        $dummy_api_key_char_count = $value ? strlen($value) : 0;
                        $real_api_key_char_count = $this->settings[$real_key_field] ? strlen($this->settings[$real_key_field]) : 0;

                        if ($value === $this->generateStarChar($real_api_key_char_count)) { // skip when no changes
                            continue;
                        } else {
                            $this->settings[$real_key_field] = $value; // save real api keys in original field name
                        }
                        $this->settings[$key] = $this->generateStarChar($real_api_key_char_count); // always set dummy fields to ****
                        continue;
                    }

                    $this->settings[$key] = $value;
                } catch (Exception $e) {
                    $this->add_error($e->getMessage());
                }
            }
        }

        if (!isset($post_data['woocommerce_' . $this->id . '_enabled']) && $this->get_option_key() == 'woocommerce_' . $this->id . '_settings') {
            $this->settings['enabled'] = $this->enabled;
        }

        return update_option($this->get_option_key(), apply_filters('woocommerce_settings_api_sanitized_fields_' . $this->id, $this->settings), 'yes');
    }

    private function generateStarChar($count = 0)
    {
        $result='';
        for ($i=0; $i < $count; $i++) {
            $result .= '*';
        }

        return $result;
    }

    public function get_localized_error_message($error_code, $message)
    {
        return $message ? $message : $error_code;
    }

    public function map_payment_channel($channel)
    {
        switch (strtoupper($channel)) {
            case 'BCA':
                $xendit = new WC_Xendit_BCAVA();
                break;
            case 'BNI':
                $xendit = new WC_Xendit_BNIVA();
                break;
            case 'BRI':
                $xendit = new WC_Xendit_BRIVA();
                break;
            case 'MANDIRI':
                $xendit = new WC_Xendit_MandiriVA();
                break;
            case 'PERMATA':
                $xendit = new WC_Xendit_PermataVA();
                break;
            case 'BSI':
                $xendit = new WC_Xendit_BSIVA();
                break;
            case 'BJB':
                $xendit = new WC_Xendit_BJBVA();
                break;
            case 'ALFAMART':
                $xendit = new WC_Xendit_Alfamart();
                break;
            case 'INDOMARET':
                $xendit = new WC_Xendit_Indomaret();
                break;
            case 'SHOPEEPAY':
                $xendit = new WC_Xendit_Shopeepay();
                break;
            case 'DANA':
                $xendit = new WC_Xendit_DANA();
                break;
            case 'OVO':
                $xendit = new WC_Xendit_OVO();
                break;
            case 'LINKAJA':
                $xendit = new WC_Xendit_LINKAJA();
                break;
            case 'QRIS':
                $xendit = new WC_Xendit_QRIS();
                break;
            case 'CREDIT_CARD':
                $xendit = new WC_Xendit_CC();
                break;
            case 'DD_BRI':
                $xendit = new WC_Xendit_DD_BRI();
                break;
            case 'DD_BPI':
                $xendit = new WC_Xendit_DD_BPI();
                break;
            case 'DD_UBP':
                $xendit = new WC_Xendit_DD_UBP();
                break;
            case 'DD_RCBC':
                $xendit = new WC_Xendit_DD_RCBC();
                break;
            case 'BILLEASE':
                $xendit = new WC_Xendit_Billease();
                break;
            case 'KREDIVO':
                $xendit = new WC_Xendit_Kredivo();
                break;
            case 'PAYMAYA':
                $xendit = new WC_Xendit_Paymaya();
                break;
            case '7ELEVEN':
                $xendit = new WC_Xendit_7Eleven();
                break;
            case 'GCASH':
                $xendit = new WC_Xendit_Gcash();
                break;
            case 'GRABPAY':
                $xendit = new WC_Xendit_Grabpay();
                break;
            case 'CEBUANA':
                $xendit = new WC_Xendit_Cebuana();
                break;
            case 'DP_MLHUILLIER':
                $xendit = new WC_Xendit_DP_Mlhuillier();
                break;
            case 'DP_PALAWAN':
                $xendit = new WC_Xendit_DP_Palawan();
                break;
            case 'DP_ECPAY_LOAN':
                $xendit = new WC_Xendit_DP_ECPay_Loan();
                break;
            case 'CASHALO':
                $xendit = new WC_Xendit_Cashalo();
                break;
            case 'UANGME':
                $xendit = new WC_Xendit_Uangme();
            case 'ASTRAPAY':
                $xendit = new WC_Xendit_Astrapay();
                break;
            case 'AKULAKU':
                $xendit = new WC_Xendit_Akulaku();
                break;
            default:
                return false;
        }

        return array('id' => $xendit->id, 'title' => $xendit->title);
    }

    /**
     * @return array|mixed|void
     * @throws Exception
     */
    public function fail_expired_invoice_order()
    {
        $customer_orders = wc_get_orders(array(
            'status' => array('wc-pending'),
        ));
        $bulk_cancel_data = array();

        foreach ($customer_orders as $order) {
            $payment_method = $order->get_payment_method();
            $invoice_id = get_post_meta($order->get_id(), 'Xendit_invoice', true);
            $invoice_expiry = get_post_meta($order->get_id(), 'Xendit_expiry', true);

            if (preg_match('/xendit/i', $payment_method) &&
                !empty($invoice_id) &&
                $invoice_expiry < time()
            ) {
                $order->update_status('wc-cancelled');
                $bulk_cancel_data[] = array(
                    'id' => $invoice_id,
                    'expiry_date' => $invoice_expiry,
                    'order_number' => strval($order->get_id()),
                    'amount' => $order->get_total()
                );
            }
        }

        if (!empty($bulk_cancel_data)) {
            return $this->xenditClass->trackOrderCancellation($bulk_cancel_data);
        }
    }

    /**
     * @return string
     */
    public function get_xendit_option(string $key)
    {
        return $this->get_option($key);
    }
}
