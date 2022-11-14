<?php

if (!defined('ABSPATH')) {
    exit;
}

class WC_Xendit_PG_API
{
    const DEFAULT_TIME_OUT = 70;

    function __construct()
    {
        $this->tpi_server_domain = 'https://tpi.xendit.co';

        $main_settings = get_option('woocommerce_xendit_gateway_settings');
        $this->developmentmode = $main_settings['developmentmode'];
        // old API keys are not deleted from DB but are hidden & no longer editable from settings
        $this->secret_api_key   = $this->developmentmode == 'yes' ? $main_settings['secret_key_dev'] : $main_settings['secret_key'];
        $this->public_api_key   = $this->developmentmode == 'yes' ? $main_settings['api_key_dev'] : $main_settings['api_key'];

        $this->for_user_id      = isset($main_settings['on_behalf_of']) ? $main_settings['on_behalf_of'] : '';

        $this->expired_duration = isset($main_settings['invoice_expire_duration']) ? (int) $main_settings['invoice_expire_duration'] : 0;
        $this->expired_unit     = isset($main_settings['invoice_expire_unit']) ? $main_settings['invoice_expire_unit'] : '';
        /* Generating the expired time for the payment. */
        $this->expired_time     = $this->for_user_id ? WC_Xendit_Expired::generateExpiredTime($this->expired_duration, $this->expired_unit) : 0;

        // since version 2.27.0
        $oauth_data = WC_Xendit_Oauth::getXenditOAuth();

        if (!empty($oauth_data)) {
            $this->oauth_data = $this->developmentmode == 'yes' ? $oauth_data['oauth_data_development'] : $oauth_data['oauth_data_production'];
        } else {
            $this->oauth_data = [];
        }
        $this->environment = $this->developmentmode == 'yes' ? "DEVELOPMENT" : "PRODUCTION";

        if (empty($this->oauth_data["environment"])) {
            $this->oauth_data["environment"] = $this->environment;
        }
    }

    /*******************************************************************************
        Virtual Accounts
     *******************************************************************************/
    function createInvoice($body, $header)
    {
        $end_point = $this->tpi_server_domain.'/payment/xendit/invoice';

        if ($this->expired_time > 0) {
            $body["invoice_duration"] = $this->expired_time;
        }

        $payload = json_encode($body);
        $default_header = $this->defaultHeader();

        $args = array(
            'headers' => array_merge($default_header, $header),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT,
            'body' => $payload
        );

        try {
            $response = wp_remote_post($end_point, $args);
            $this->handleNetworkError($response);
            $jsonResponse = json_decode($response['body'], true);

            return $jsonResponse;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function getInvoice($invoice_id)
    {
        $end_point = $this->tpi_server_domain.'/payment/xendit/invoice/'.$invoice_id;

        $args = array(
            'headers' => $this->defaultHeader(),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT
        );

        try {
            $response = wp_remote_get($end_point, $args);
            $this->handleNetworkError($response);
            $jsonResponse = json_decode($response['body'], true);

            return $jsonResponse;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function trackOrderCancellation($body)
    {
        $end_point = $this->tpi_server_domain.'/payment/xendit/invoice/bulk-cancel';

        $payload = array(
            'invoice_data' => json_encode($body)
        );

        $args = array(
            'headers' => $this->defaultHeader(),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT,
            'body' => json_encode($payload)
        );
        $response = wp_remote_post($end_point, $args);

        if (is_wp_error($response) || empty($response['body'])) {
            return array();
        }

        $jsonResponse = json_decode($response['body'], true);
        return $jsonResponse;
    }

    /*******************************************************************************
        Credit Cards
     *******************************************************************************/
    /**
     * Send the request to Xendit's API
     *
     * @param array $payload
     * @return object|Exception
     */
    function createCharge($payload)
    {
        $end_point = $this->tpi_server_domain.'/payment/xendit/credit-card/charges';

        $args = array(
            'headers' => $this->defaultHeader(),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT,
            'body' => json_encode($payload),
            'user-agent' => 'WooCommerce ' . WC()->version
        );

        try {
            $response = wp_remote_post($end_point, $args);
            $this->handleNetworkError($response);
            $jsonResponse = json_decode($response['body'], true);

            return $jsonResponse;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /*******************************************************************************
        Authentication CC token
     *******************************************************************************/
    /**
     * Send the request to Xendit's API
     *
     * @param array $payload
     * @return object|Exception
     */
    function authenticateToken($payload)
    {
        $end_point = $this->tpi_server_domain.'/payment/xendit/credit-card/charges';

        $args = array(
            'headers' => $this->defaultHeader(),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT,
            'body' => json_encode($payload),
            'user-agent' => 'WooCommerce ' . WC()->version
        );

        try {
            $response = wp_remote_post($end_point, $args);
            $this->handleNetworkError($response);
            $jsonResponse = json_decode($response['body'], true);

            return $jsonResponse;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get CC Setting
     * Note: the return will be array, but if value is boolean (true) json_decode will convert to "1" otherwise if value is boolean (false) json_decode will convert to ""
     * @return array|WP_Error
     */
    function getCCSettings()
    {
        $end_point = $this->tpi_server_domain.'/payment/xendit/settings/credit-card';

        $args = array(
          'headers' => $this->defaultHeader(),
          'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT
        );
        $response = wp_remote_get($end_point, $args);

        if (is_wp_error($response) || empty($response['body'])) {
            return array();
        }

        $jsonResponse = json_decode($response['body'], true);

        // get MID settings
        $midData = $this->getMIDSettings();
        $jsonResponse['supported_card_brands'] = !empty($midData['supported_card_brands']) ? $midData['supported_card_brands'] : array();

        return $jsonResponse;
    }

    function getMIDSettings()
    {
        $end_point = $this->tpi_server_domain.'/payment/xendit/settings/mid';

        $args = array(
            'headers' => $this->defaultHeader(),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT
        );

        $response = wp_remote_get($end_point, $args);

        if (is_wp_error($response) || empty($response['body'])) {
            return array();
        }

        $jsonResponse = json_decode($response['body'], true);
        return $jsonResponse;
    }

    /**
     * Get credit card charge callback data
     *
     * @param string $charge_id
     * @return array
     */
    function getCharge($charge_id)
    {
        $end_point = $this->tpi_server_domain.'/payment/xendit/credit-card/charges/'.$charge_id;

        $args = array(
            'headers' => $this->defaultHeader(),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT
        );

        try {
            $response = wp_remote_get($end_point, $args);
            $this->handleNetworkError($response);
            $jsonResponse = json_decode($response['body'], true);

            return $jsonResponse;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get credit card token from webhook payload
     *
     * @param string $token
     * @return mixed
     * @throws Exception
     */
    function getCCToken(string $token)
    {
        $end_point = $this->tpi_server_domain.'/payment/xendit/credit-card/token/'.$token;

        $args = array(
            'headers' => $this->defaultHeader(),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT
        );

        try {
            $response = wp_remote_get($end_point, $args);
            $this->handleNetworkError($response);
            return json_decode($response['body'], true);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get hosted 3DS data
     *
     * @param string $hosted_3ds_id
     * @return object
     */
    function getHostedThreeDS($hosted_3ds_id)
    {
        $end_point = $this->tpi_server_domain.'/payment/xendit/credit-card/hosted-3ds/' . $hosted_3ds_id;

        $args = array(
            'headers' => $this->defaultHeader(),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT
        );

        try {
            $response = wp_remote_get($end_point, $args);
            $this->handleNetworkError($response);
            $jsonResponse = json_decode($response['body'], true);

            return $jsonResponse;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Create hosted 3DS using bundled charge
     * API Version: 2020-02-14
     *
     * @param array $payload
     * @return object
     */
    function createHostedThreeDS($payload)
    {
        $end_point = $this->tpi_server_domain . '/payment/xendit/credit-card/hosted-3ds';
        $default_header = $this->defaultHeader(true, '2020-02-14');

        $args = array(
            'headers' => $default_header,
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT,
            'body' => json_encode($payload)
        );

        try {
            $response = wp_remote_post($end_point, $args);
            $this->handleNetworkError($response);
            $jsonResponse = json_decode($response['body'], true);

            return $jsonResponse;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Initiate credit card refund through TPI service
     *
     * @param array $payload
     * @param string $charge_id
     * @return object
     */
    function createRefund($payload, $charge_id)
    {
        $end_point = $this->tpi_server_domain . '/payment/xendit/credit-card/charges/' . $charge_id . '/refund';

        $args = array(
            'headers' => $this->defaultHeader(),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT,
            'body' => json_encode($payload)
        );
        $response = wp_remote_post($end_point, $args);
        $jsonResponse = json_decode($response['body'], true);

        return $jsonResponse;
    }

    /**
     * Get credit card charges option for promotion & installment
     *
     * @param string $token_id
     * @param float $amount
     * @param string $currency
     * @return object
     */
    function getChargeOption($token_id, $amount, $currency)
    {
        $end_point = $this->tpi_server_domain . '/payment/xendit/credit-card/option?token_id='.$token_id.'&amount='.$amount.'&currency='.$currency;

        $args = array(
            'headers' => $this->defaultHeader(true),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT
        );

        $response = wp_remote_get($end_point, $args);
        $jsonResponse = json_decode($response['body'], true);

        return $jsonResponse;
    }

    /*******************************************************************************
        Tracking & Logging
     *******************************************************************************/

    function trackEvent($payload)
    {
        $end_point = $this->tpi_server_domain.'/payment/xendit/tracking';
        $args = array(
            'headers' => $this->defaultHeader(),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT,
            'body' => json_encode($payload)
        );

        $response = wp_remote_post($end_point, $args);

        if (is_wp_error($response) || empty($response['body'])) {
            return array();
        }

        $jsonResponse = json_decode($response['body'], true);
        return $jsonResponse;
    }

    /**
     * Log metrics to Datadog for monitoring
     *
     * @return boolean
     */
    function trackMetricCount($body)
    {
        $end_point = $this->tpi_server_domain . '/log/metrics/count';

        $args = array(
            'headers' => $this->defaultHeader(),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT,
            'body' => json_encode($body)
        );

        try {
            $response = wp_remote_post($end_point, $args);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function constructMetricPayload($name, $type, $payment_method, $error_code = '')
    {
        $metrics = array(
            'name'              => $name,
            'additional_tags'   => array(
                'type' => $type,
                'payment_method' => strtoupper($payment_method)
            )
        );

        if ($error_code) {
            $metrics['additional_tags']['error_code'] = $error_code;
        }

        return $metrics;
    }

    /**
     * Post a site info
     *
     * @param array $body
     * @return array
     */
    function createPluginInfo($body)
    {
        $end_point = $this->tpi_server_domain . '/log/plugin-info';

        $args = array(
            'headers' => $this->defaultHeader(),
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT,
            'body' => json_encode([
                'data' => (object) $body
            ])
        );
        try {
            $response = wp_remote_post($end_point, $args);
            $jsonResponse = json_decode($response['body'], true);

            if (isset($jsonResponse['error_code'])) {
                $jsonResponse['message'] = array($jsonResponse['message']);
                throw new Exception(json_encode($jsonResponse));
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $jsonResponse;
    }

    /*******************************************************************************
        Xendit OAuth
     *******************************************************************************/
    function getAccessToken($body)
    {
        $end_point = $this->tpi_server_domain.'/authorization/xendit/token';

        $args = array(
          'headers' => array('content-type' => 'application/json'),
          'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT,
          'body' => json_encode($body)
        );

        try {
            $response = wp_remote_post($end_point, $args);
            $this->handleNetworkError($response);
            $jsonResponse = json_decode($response['body'], true);

            return $jsonResponse;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function getAuthorizationData($oauth_id)
    {
        $end_point = $this->tpi_server_domain.'/authorization/xendit/'.$oauth_id;

        $args = array(
          'headers' => array('content-type' => 'application/json', 'validate-key' => WC_Xendit_Oauth::getValidationKey()),
          'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT
        );

        try {
            $response = wp_remote_get($end_point, $args);
            $this->handleNetworkError($response);
            $jsonResponse = json_decode($response['body'], true);

            return $jsonResponse;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function uninstallApp()
    {
        $app_id = '61e12bf5bfd5ff82ab9d6d15';
        if ($this->tpi_server_domain !== 'https://tpi.xendit.co') {
            $app_id = '61e128c1aa83ae905b6ab45a';
        }

        $end_point = $this->tpi_server_domain.'/marketplace/integrations/'.$app_id.'/uninstall';

        $args = array(
            'headers' => $this->defaultHeader(),
            'method' => 'DELETE',
            'timeout' => WC_Xendit_PG_API::DEFAULT_TIME_OUT
        );

        try {
            $response = wp_remote_request($end_point, $args);
            $this->handleNetworkError($response);
            $jsonResponse = json_decode($response['body'], true);

            return $jsonResponse;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /*******************************************************************************
        General
     *******************************************************************************/
    /**
     * Default Header
     *
     * @return array
     */
    function defaultHeader($usePublicKey = false, $version = '')
    {
        $default_header = array(
            'content-type' => 'application/json',
            'x-plugin-name' => 'WOOCOMMERCE',
            'x-plugin-version' => WC_XENDIT_PG_VERSION
        );

        if ($usePublicKey) { // prioritize use of public key than oauth data for CC requests
            $default_header['Authorization'] = 'Basic '.base64_encode($this->public_api_key.':');
        } else {
            if (!empty($this->oauth_data['refresh_token'])) {
                $oauthBody = array(
                    "oauth_data" => $this->oauth_data,
                    "platform" => "WOOCOMMERCE"
                );
                $oauth = $this->getAccessToken($oauthBody);

                $default_header['authorization-type'] = "OAuth";
                $default_header['Authorization'] = 'Bearer '.$oauth["access_token"];
            } else {
                $default_header['authorization-type'] = "ApiKey";
                $default_header['Authorization'] = 'Basic '.base64_encode($this->secret_api_key.':');
            }
        }

        if (!empty($version)) {
            $default_header['x-api-version'] = $version;
        }

        if ($this->for_user_id) {
            $default_header['for-user-id'] = $this->for_user_id;
        }

        return $default_header;
    }

    function handleNetworkError($response)
    {
        if (is_wp_error($response) || empty($response['body'])) {
            throw new Exception('We encountered an issue while processing the checkout. Please contact us. Code: 100007');
        }
    }

    function isCredentialExist()
    {
        return (!empty($this->secret_api_key) || !empty($this->oauth_data['refresh_token']));
    }
}
