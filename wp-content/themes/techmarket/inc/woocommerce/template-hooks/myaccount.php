<?php
/**
 * Hooks used in My Account page
 */

add_action( 'woocommerce_before_customer_login_form',	'techmarket_wrap_customer_login_form',				0  );
add_action( 'woocommerce_after_customer_login_form',	'techmarket_wrap_customer_login_form_close',		0  );
add_action( 'woocommerce_login_form_start',				'techmarket_before_login_text',					    10 );
add_action( 'woocommerce_register_form_start',			'techmarket_before_register_text',					10 );
add_action( 'woocommerce_register_form_end',			'techmarket_register_benefits',					    10 );