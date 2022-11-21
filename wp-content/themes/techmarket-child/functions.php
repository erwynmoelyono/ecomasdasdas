<?php
/**
 * Techmarket Child
 *
 * @package techmarket-child
 */

/**
 * Include all your custom code here
 */



add_action('template_redirect','check_if_logged_in');
function check_if_logged_in()
{
    $pageid = get_option( 'woocommerce_checkout_page_id' );
    if(!is_user_logged_in() && is_page($pageid))
    {
        $url = add_query_arg(
            'redirect_to',
            get_permalink($pageid),
            site_url('/my-account/') // your my account url
        );
        wp_redirect($url);
        exit;
    }
    if(is_user_logged_in())
    {
        if(is_page(get_option( 'woocommerce_myaccount_page_id' )))
        {
            
            $redirect = $_GET['redirect_to'];
            if (isset($redirect)) {
            echo '<script>window.location.href = "'.$redirect.'";</script>';
            }

        }
    }
}