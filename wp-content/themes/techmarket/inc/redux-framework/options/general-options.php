<?php
/**
 * General Theme Options
 *
 */

$general_options 	= apply_filters( 'techmarket_general_options_args', array(
	'title'		=> esc_html__( 'General', 'techmarket' ),
	'icon'		=> 'far fa-dot-circle',
	'fields'	=> array(

		array(
			'title'		=> esc_html__( 'Logo SVG', 'techmarket'),
			'subtitle'	=> esc_html__( 'Enable to display svg logo instead of site title.', 'techmarket' ),
			'desc'		=> esc_html__( 'This will not work when you use site logo in customizer.', 'techmarket' ),
			'id'		=> 'logo_svg',
			'type'		=> 'switch',
			'on'		=> esc_html__( 'Enabled', 'techmarket' ),
			'off'		=> esc_html__( 'Disabled', 'techmarket' ),
			'default'	=> 0,
		),

		array(
			'title'		=> esc_html__( 'Scroll To Top', 'techmarket' ),
			'id'		=> 'scrollup',
			'type'		=> 'switch',
			'on'		=> esc_html__( 'Enabled', 'techmarket' ),
			'off'		=> esc_html__( 'Disabled', 'techmarket' ),
			'default'	=> 0,
		),

		array(
			'title'		=> esc_html__( 'Register Image Size', 'techmarket' ),
			'subtitle'	=> esc_html__( 'Enable and regenerate thumbnails to enable theme registered image sizes.', 'techmarket' ),
			'id'		=> 'reg_image_size',
			'type'		=> 'switch',
			'on'		=> esc_html__('Enabled', 'techmarket'),
			'off'		=> esc_html__('Disabled', 'techmarket'),
			'default'	=> 0,
		)
	)
) );
