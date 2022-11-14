<?php
/**
 * Options available for Custom Code sub menu of Theme Options
 *
 */

$custom_code_options 	= apply_filters( 'techmarket_custom_code_options_args', array(
	'title'		=> esc_html__( 'Custom Code', 'techmarket' ),
	'icon'		=> 'fas fa-code',
	'fields'	=> array(
		array(
			'title'			=> esc_html__('Custom CSS', 'techmarket'),
			'subtitle'		=> esc_html__('Paste your custom CSS code here.', 'techmarket'),
			'id'			=> 'custom_css',
			'type'			=> 'ace_editor',
			'mode'			=> 'css',
		),
	)
) );
