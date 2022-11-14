<?php
/**
 * Options available for Typography sub menu of Theme Options
 *
 */

$typography_options 	= apply_filters( 'techmarket_typography_options_args', array(
	'title'		=> esc_html__( 'Typography', 'techmarket' ),
	'icon'		=> 'fas fa-font',
	'fields'	=> array(
		array(
			'title'			=> esc_html__( 'Use default font scheme ?', 'techmarket' ),
			'on'			=> esc_html__('Yes', 'techmarket'),
			'off'			=> esc_html__('No', 'techmarket'),
			'type'			=> 'switch',
			'default'		=> true,
			'id'			=> 'use_predefined_font',
		),

		array(
			'title'			=> esc_html__( 'Use Roboto for Window 7 ?', 'techmarket' ),
			'on'			=> esc_html__('Yes', 'techmarket'),
			'off'			=> esc_html__('No', 'techmarket'),
			'type'			=> 'switch',
			'default'		=> false,
			'id'			=> 'switch_to_roboto',
			'required'		=> array( 'use_predefined_font', 'equals', true ),
		),

		array(
			'title'			=> esc_html__( 'Font Family', 'techmarket' ),
			'type'			=> 'typography',
			'id'			=> 'techmarket_content_font',
			'text-align'	=> false,
			'font-style'	=> false,
			'font-size'		=> false,
			'line-height'	=> false,
			'color'			=> false,
			'font-weight'	=> false,
			'default'		=> array(
				'font-family'	=> 'Open Sans',
				'subsets'		=> 'latin',
			),
			'required'		=> array( 'use_predefined_font', 'equals', false ),
		),
	)
) );
