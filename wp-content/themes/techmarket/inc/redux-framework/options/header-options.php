<?php
/**
 * Options available for Header sub menu in Theme Options
 */

$header_options = apply_filters( 'techmarket_header_options_args', array(
	'title' 	=> esc_html__( 'Header', 'techmarket' ),
	'desc'		=> esc_html__( 'Options related to the header section.', 'techmarket' ),
	'icon' 		=> 'fas fa-arrow-alt-circle-up',
	'fields' 	=> array(

		array(
			'title'		=> esc_html__( 'General', 'techmarket' ),
			'id'		=> 'header_general_info_start',
			'type'		=> 'section',
			'indent'	=> true
		),

		array(
			'title'		=> esc_html__('Header Style', 'techmarket'),
			'subtitle'	=> esc_html__('Select the header style.', 'techmarket'),
			'id'		=> 'header_style',
			'type'		=> 'select',
			'options'	=> array(
				'v1'		=> esc_html__( 'Header v1', 'techmarket' ),
				'v2'		=> esc_html__( 'Header v2', 'techmarket' ),
				'v3'		=> esc_html__( 'Header v3', 'techmarket' ),
				'v4'		=> esc_html__( 'Header v4', 'techmarket' ),
				'v5'		=> esc_html__( 'Header v5', 'techmarket' ),
				'v6'		=> esc_html__( 'Header v6', 'techmarket' ),
				'v7'		=> esc_html__( 'Header v7', 'techmarket' ),
				'v8'		=> esc_html__( 'Header v8', 'techmarket' ),
				'v9'		=> esc_html__( 'Header v9', 'techmarket' ),
				'v10'		=> esc_html__( 'Header v10', 'techmarket' ),
			),
			'default'	=> 'v1',
		),

		array(
			'title'		=> esc_html__( 'Sticky Header', 'techmarket' ),
			'id'		=> 'sticky_header',
			'type'		=> 'switch',
			'on'		=> esc_html__( 'Enabled', 'techmarket' ),
			'off'		=> esc_html__( 'Disabled', 'techmarket' ),
			'default'	=> 0,
		),

		array(
			'id'		=> 'header_general_info_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'title'		=> esc_html__( 'Header Topbar Section', 'techmarket' ),
			'id'		=> 'header_topbar_section_start',
			'type'		=> 'section',
			'indent'	=> true
		),

		array(
			'title'		=> esc_html__( 'Enable Topbar ?', 'techmarket' ),
			'id'		=> 'show_header_topbar',
			'type'		=> 'switch',
			'on'		=> esc_html__( 'Enabled', 'techmarket' ),
			'off'		=> esc_html__( 'Disabled', 'techmarket' ),
			'default'	=> 1,
		),

		array(
			'id'		=> 'header_topbar_section_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'title'		=> esc_html__( 'Header Departments Menu Section', 'techmarket' ),
			'id'		=> 'header_departments_menu_start',
			'type'		=> 'section',
			'indent'	=> true
		),

		array(
			'title'		=> esc_html__( 'Departments Menu Title', 'techmarket' ),
			'id'		=> 'header_departments_menu_title',
			'type'		=> 'text',
			'default'	=> esc_html__( 'All Departments', 'techmarket' )
		),

		array(
			'title'		=> esc_html__( 'Departments Menu Icon', 'techmarket' ),
			'id'		=> 'header_departments_menu_icon',
			'type'		=> 'text',
			'default'	=> 'tm tm-departments-thin'
		),

		array(
			'id'		=> 'header_departments_menu_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'title'		=> esc_html__( 'Header Search Section', 'techmarket' ),
			'id'		=> 'header_search_bar_start',
			'type'		=> 'section',
			'indent'	=> true
		),

		array(
			'title'		=> esc_html__( 'Search Placeholder text', 'techmarket' ),
			'id'		=> 'header_search_placeholder_text',
			'type'		=> 'text',
			'default'	=> esc_html__( 'Search for products', 'techmarket' )
		),

		array(
			'title'		=> esc_html__( 'Search Dropdown text', 'techmarket' ),
			'id'		=> 'header_search_dropdown_text',
			'type'		=> 'text',
			'default'	=> esc_html__( 'All Categories', 'techmarket' )
		),

		array(
			'title'		=> esc_html__( 'Search Button text', 'techmarket' ),
			'id'		=> 'header_search_button_text',
			'type'		=> 'text',
			'default'	=> esc_html__( 'Search', 'techmarket' )
		),

		array(
			'title'		=> esc_html__( 'Live Search', 'techmarket' ),
			'id'		=> 'header_live_search',
			'type'		=> 'switch',
			'on'		=> esc_html__( 'Enabled', 'techmarket' ),
			'off'		=> esc_html__( 'Disabled', 'techmarket' ),
			'default'	=> 0,
		),

		array(
			'id'		=> 'header_search_bar_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'title'		=> esc_html__( 'Action Button Section', 'techmarket' ),
			'id'		=> 'header_action_btn_start',
			'type'		=> 'section',
			'indent'	=> true,
			'required'	=> array( 'header_style', 'equals', 'v6' )
		),

		array(
			'title'		=> esc_html__( 'Text', 'techmarket' ),
			'id'		=> 'header_action_btn_text',
			'type'		=> 'text',
			'default'	=> esc_html__( 'Go to TechMarket Shop', 'techmarket' ),
			'required'	=> array( 'header_style', 'equals', 'v6' )
		),

		array(
			'title'		=> esc_html__( 'Link', 'techmarket' ),
			'id'		=> 'header_action_btn_link',
			'type'		=> 'text',
			'default'	=> '#',
			'required'	=> array( 'header_style', 'equals', 'v6' )
		),

		array(
			'title'		=> esc_html__( 'Icon', 'techmarket' ),
			'id'		=> 'header_action_btn_icon',
			'type'		=> 'text',
			'default'	=> 'tm tm-long-arrow-right',
			'required'	=> array( 'header_style', 'equals', 'v6' )
		),

		array(
			'id'		=> 'header_action_btn_end',
			'type'		=> 'section',
			'indent'	=> false,
			'required'	=> array( 'header_style', 'equals', 'v6' )
		),

	)
) );
