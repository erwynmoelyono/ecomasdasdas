<?php
/**
 * Options available for Footer sub menu in Theme Options
 */

$footer_options = apply_filters( 'techmarket_footer_options_args', array(
	'title' 	=> esc_html__( 'Footer', 'techmarket' ),
	'desc'		=> esc_html__( 'Options related to the footer section. The Footer has : Brands Slider, Footer Widgets, Footer Newsletter Section, Footer Contact Block, Footer Wigets', 'techmarket' ),
	'icon' 		=> 'fas fa-arrow-alt-circle-down',
	'fields' 	=> array(

		array(
			'id'		=> 'footer_before_block_start',
			'type'		=> 'section',
			'indent'	=> true,
			'title'		=> esc_html__( 'Footer Before Block', 'techmarket' ),
			'subtitle'	=> esc_html__( 'Please use this section to enable/disable Footer Before Block.', 'techmarket' ),
		),

		array(
			'id'		=> 'show_footer_before_block',
			'type'		=> 'switch',
			'title'		=> esc_html__( 'Show Footer Before Block ?', 'techmarket' ),
			'default'	=> 0,
		),

		array(
			'id'		=> 'footer_before_block_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'id'		=> 'footer_newsletter_start',
			'type'		=> 'section',
			'title'		=> esc_html__( 'Footer Newsletter Section', 'techmarket' ),
			'subtitle'	=> esc_html__( 'Please use this section to add a subscription form to your mailing list.', 'techmarket' ),
			'indent'	=> true,
		),

		array(
			'title'		=> esc_html__( 'Show Footer Newsletter block ?', 'techmarket' ),
			'id'		=> 'show_footer_newsletter',
			'type'		=> 'switch',
			'default'	=> 1,
		),

		array(
			'title'		=> esc_html__( 'Newsletter title', 'techmarket' ),
			'id'		=> 'footer_newsletter_title',
			'type'		=> 'text',
			'default'	=> esc_html__( 'Sign up to Newsletter', 'techmarket' ),
			'required'	=> array( 'show_footer_newsletter', 'equals', true )
		),

		array(
			'title'		=> esc_html__( 'Newsletter marketing text', 'techmarket' ),
			'id'		=> 'footer_newsletter_marketing_text',
			'type'		=> 'text',
			'default'	=> '...and receive <strong>$20 coupon for first shopping</strong>',
			'required'	=> array( 'show_footer_newsletter', 'equals', true )
		),

		array(
			'title'		=> esc_html__( 'Newsletter signup form', 'techmarket' ),
			'id'		=> 'footer_newsletter_signup_form',
			'type'		=> 'textarea',
			'subtitle'	=> esc_html__( 'Paste your newsletter signup form or shortcode', 'techmarket' ),
			'required'	=> array( 'show_footer_newsletter', 'equals', true )
		),

		array(
			'id'		=> 'footer_newsletter_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'id'		=> 'footer_social_start',
			'type'		=> 'section',
			'title'		=> esc_html__( 'Footer Social Section', 'techmarket' ),
			'subtitle'	=> esc_html__( 'Please use this section to enable/disable social icons.', 'techmarket' ),
			'indent'	=> true,
		),

		array(
			'id'		=> 'show_footer_social_icons',
			'type'		=> 'switch',
			'title'		=> esc_html__( 'Show Footer Social Icons', 'techmarket' ),
			'desc'		=> esc_html__( 'On enabling footer social icons, please make sure to add all social URLs to Techmarket > Social Media', 'techmarket' ),
			'default'	=> 1,
		),

		array(
			'id'		=> 'footer_social_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'id'		=> 'footer_logo_start',
			'type'		=> 'section',
			'indent'	=> true,
			'title'		=> esc_html__( 'Footer Logo Block', 'techmarket' ),
			'subtitle'	=> esc_html__( 'The Footer Logo Block is part of Footer widgets.', 'techmarket' ),
		),

		array(
			'id'		=> 'show_footer_logo',
			'type'		=> 'switch',
			'title'		=> esc_html__( 'Show Footer logo ?', 'techmarket' ),
			'default'	=> 1,
		),

		array(
			'title'		=> esc_html__( 'Your Logo', 'techmarket' ),
			'subtitle'	=> esc_html__( 'Upload your footer logo image.', 'techmarket' ),
			'id'		=> 'site_footer_logo',
			'type'		=> 'media',
			'required'	=> array( 'show_footer_logo', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_logo_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'id'		=> 'footer_contact_block_start',
			'type'		=> 'section',
			'indent'	=> true,
			'title'		=> esc_html__( 'Footer Contact Block', 'techmarket' ),
			'subtitle'	=> esc_html__( 'The Footer Contact Block is part of Footer widgets. However it is not available as a separate widget but are fully customizable with the options given below.', 'techmarket' ),
		),

		array(
			'id'		=> 'show_footer_contact_block',
			'type'		=> 'switch',
			'title'		=> esc_html__( 'Show Footer Contact Block', 'techmarket' ),
			'default'	=> 0,
		),

		array(
			'id'		=> 'footer_contact_info_title',
			'type'		=> 'text',
			'title'		=> esc_html__( 'Call us text', 'techmarket' ),
			'default'	=> esc_html__( 'Got Questions ? Call us 24/7!', 'techmarket' ),
			'required'	=> array( 'show_footer_contact_block', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_contact_info_icon',
			'type'		=> 'text',
			'title'		=> esc_html__( 'Call us icon', 'techmarket' ),
			'default'	=> 'tm tm-call-us-footer',
			'required'	=> array( 'show_footer_contact_block', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_contact_info_text',
			'type'		=> 'text',
			'title'		=> esc_html__( 'Call us number', 'techmarket' ),
			'default'	=> '(800) 8001-8588, (0600) 874 548',
			'required'	=> array( 'show_footer_contact_block', 'equals', 1 ),
		),

		array(
			'id'		=> 'show_footer_address',
			'type'		=> 'switch',
			'title'		=> esc_html__( 'Show Footer address ?', 'techmarket' ),
			'default'	=> 1,
			'required'	=> array( 'show_footer_contact_block', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_address',
			'type'		=> 'textarea',
			'title'		=> esc_html__( 'Footer address', 'techmarket' ),
			'default'	=> '17 Princess Road, London, Greater London NW1 8JR, UK',
			'required'	=> array( 'show_footer_address', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_contact_map_link',
			'type'		=> 'text',
			'title'		=> esc_html__( 'Map Link', 'techmarket' ),
			'default'	=> '#',
			'required'	=> array( 'show_footer_contact_block', 'equals', 1 ),
		),

		array(
			'id'        => 'footer_contact_map_link_target',
			'type'      => 'switch',
			'title'     => esc_html__( 'Open in a new link ?', 'techmarket' ),
			'default'   => 0,
		),

		array(
			'id'		=> 'footer_contact_map_icon',
			'type'		=> 'text',
			'title'		=> esc_html__( 'Map Icon', 'techmarket' ),
			'default'	=> 'tm tm-map-marker',
			'required'	=> array( 'show_footer_contact_block', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_contact_map_text',
			'type'		=> 'text',
			'title'		=> esc_html__( 'Map Text', 'techmarket' ),
			'default'	=> esc_html__( 'Find us on map', 'techmarket' ),
			'required'	=> array( 'show_footer_contact_block', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_contact_block_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'id'		=> 'footer_payment_block_start',
			'type'		=> 'section',
			'indent'	=> true,
			'title'		=> esc_html__( 'Footer Payment Block', 'techmarket' ),
			'subtitle'	=> esc_html__( 'The Footer Payment Block is part of Footer widgets. However it is not available as a separate widget but are fully customizable with the options given below.', 'techmarket' ),
		),

		array(
			'id'		=> 'show_footer_payment_block',
			'type'		=> 'switch',
			'title'		=> esc_html__( 'Enable Footer Payments Block ?', 'techmarket' ),
			'default'	=> 0,
		),

		array(
			'id'		=> 'footer_payment_info_title',
			'type'		=> 'text',
			'title'		=> esc_html__( 'Title', 'techmarket' ),
			'default'	=> esc_html__( 'We are using safe payments', 'techmarket' ),
			'required'	=> array( 'show_footer_payment_block', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_payment_info_icon',
			'type'		=> 'text',
			'title'		=> esc_html__( 'Icon', 'techmarket' ),
			'default'	=> 'tm tm-safe-payments',
			'required'	=> array( 'show_footer_payment_block', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_payment_icons_enable',
			'type'		=> 'switch',
			'title'		=> esc_html__( 'Enable Footer Payments Icons ?', 'techmarket' ),
			'default'	=> 1,
			'required'	=> array( 'show_footer_payment_block', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_payment_icons',
			'type'		=> 'gallery',
			'title'		=> esc_html__('Payment Icons', 'techmarket'),
			'subtitle'	=> esc_html__('Add Images for Footer Payment Icons', 'techmarket'),
			'required'  => array( 'footer_payment_icons_enable', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_payment_secure_icons_enable',
			'type'		=> 'switch',
			'title'		=> esc_html__( 'Enable Footer Payments Secure Icons ?', 'techmarket' ),
			'default'	=> 1,
			'required'	=> array( 'show_footer_payment_block', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_payment_secure_icons',
			'type'		=> 'gallery',
			'title'		=> esc_html__('Secure Icons', 'techmarket'),
			'subtitle'	=> esc_html__('Add Images for Footer Payment Secure Icons', 'techmarket'),
			'required'  => array( 'footer_payment_secure_icons_enable', 'equals', 1 ),
		),

		array(
			'id'		=> 'footer_payment_block_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'id'		=> 'footer_widgets_start',
			'type'		=> 'section',
			'indent'	=> true,
			'title'		=> esc_html__( 'Footer Widgets', 'techmarket' ),
			'subtitle'	=> esc_html__( 'Options related to Footer Widgets. Add your widgets to Appearance > Widgets > Footer Widgets. If the widget area is empty, it loads the default widgets.', 'techmarket' ),
		),

		array(
			'id'		=> 'show_footer_widgets',
			'type'		=> 'switch',
			'title'		=> esc_html__( 'Show Footer Widgets ?', 'techmarket' ),
			'default'	=> 1,
		),

		array(
			'id'		=> 'footer_widgets_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'title'		=> esc_html__( 'Footer Site Info Section', 'techmarket' ),
			'id'		=> 'footer_site_info_start',
			'type'		=> 'section',
			'indent'	=> true
		),

		array(
			'id'		=> 'footer_site_info_enable',
			'type'		=> 'switch',
			'title'		=> esc_html__( 'Enable Footer Site Info Block ?', 'techmarket' ),
			'default'	=> 1,
		),

		array(
			'id'		=> 'footer_copyright',
			'type'		=> 'textarea',
			'title'		=> esc_html__( 'Site Copyright', 'techmarket' ),
			'default'	=> sprintf( esc_html__( 'Copyright &copy; %s %s Theme. All rights reserved.', 'techmarket' ), date( 'Y' ), sprintf( '<a href="%s">%s</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ) ) ),
		),

		array(
			'id'		=> 'footer_credit',
			'type'		=> 'textarea',
			'title'		=> esc_html__( 'Site Credit', 'techmarket' ),
			'default'	=> sprintf( esc_html__( 'Made with %s', 'techmarket' ), '<i class="fas fa-heart"></i>' ),
		),

		array(
			'id'		=> 'footer_site_info_end',
			'type'		=> 'section',
			'indent'	=> false
		)
	)
) );
