<?php
/**
 * Options available for Styling sub menu of Theme Options
 *
 */

$custom_css_page_link = '<a href="' . esc_url( add_query_arg( array( 'page' => 'custom-primary-color-css-page' ) ), admin_url( 'themes.php' ) ) . '">' . esc_html__( 'Custom Primary CSS', 'techmarket' ) . '</a>';

$style_options 	= apply_filters( 'techmarket_style_options_args', array(
	'title'		=> esc_html__( 'Styling', 'techmarket' ),
	'icon'		=> 'fas fa-pen-square',
	'fields'	=> array(
		array(
			'id'		=> 'styling_general_info_start',
			'type'		=> 'section',
			'title'		=> esc_html__( 'General', 'techmarket' ),
			'subtitle'	=> esc_html__( 'General Theme Style Settings', 'techmarket' ),
			'indent'	=> true,
		),

		array(
			'title'		=> esc_html__( 'Use a predefined color scheme', 'techmarket' ),
			'on'		=> esc_html__('Yes', 'techmarket'),
			'off'		=> esc_html__('No', 'techmarket'),
			'type'		=> 'switch',
			'default'	=> 1,
			'id'		=> 'use_predefined_color'
		),

		array(
			'title'		=> esc_html__( 'Main Theme Color', 'techmarket' ),
			'subtitle'	=> esc_html__( 'The main color of the site.', 'techmarket' ),
			'id'		=> 'main_color',
			'type'		=> 'select',
			'options'	=> array(
				'blue'			=> esc_html__( 'Blue', 'techmarket' ),
				'flat-green'	=> esc_html__( 'Flat Green', 'techmarket' ),
				'green'			=> esc_html__( 'Green', 'techmarket' ),
				'orange'		=> esc_html__( 'Orange', 'techmarket' ),
				'red'			=> esc_html__( 'Red', 'techmarket' ),
				'yellow'		=> esc_html__( 'Yellow', 'techmarket' ),
			),
			'default'	=> 'blue',
			'required'	=> array( 'use_predefined_color', 'equals', 1 ),
		),

		array(
			'id'		  => 'custom_primary_color',
			'title'		  => esc_html__( 'Custom Primary Color', 'techmarket' ),
			'type'		  => 'color',
			'transparent' => false,
			'default'	  => '#0063d1',
			'required'	  => array( 'use_predefined_color', 'equals', 0 ),
		),

		array(
			'id'		  => 'custom_primary_text_color',
			'title'		  => esc_html__( 'Custom Primary Text Color', 'techmarket' ),
			'type'		  => 'color',
			'transparent' => false,
			'default'     => '#fff',
			'required'	  => array( 'use_predefined_color', 'equals', 0 ),
		),

		array(
			'id'		  => 'include_custom_color',
			'title'		  => esc_html__( 'How to include custom color ?', 'techmarket' ),
			'type'		  => 'radio',
			'options'     => array(
				'1'  => esc_html__( 'Inline', 'techmarket' ),
				'2'  => esc_html__( 'External File', 'techmarket' )
			),
			'default'     => '1',
			'required'	  => array( 'use_predefined_color', 'equals', 0 ),
		),

		array(
			'id'		=> 'external_file_css',
			'type'      => 'raw',
			'title'		=> esc_html__( 'Custom Primary Color CSS', 'techmarket' ),
			'content'  	=> esc_html__( 'If you choose "External File", then please "Save Changes" and then click on ths link to get the custom color primary CSS: ', 'techmarket' ) . $custom_css_page_link,
			'required'	=> array( 'use_predefined_color', 'equals', 0 ),
		),

		array(
			'id'		=> 'styling_general_info_end',
			'type'		=> 'section',
			'indent'	=> false,
		),
	)
) );
