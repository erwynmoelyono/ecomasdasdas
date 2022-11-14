<?php
/**
 * Options available for Social Media sub menu of Theme Options
 *
 */

$social_options 	= apply_filters( 'techmarket_social_media_options_args', array(
	'title'     => esc_html__('Social Media', 'techmarket'),
	'icon'      => 'far fa-share-square',
	'desc'      => esc_html__('Please type in your complete social network URL', 'techmarket' ),
	'fields'    => array(
		array(
			'title'     => esc_html__('Facebook', 'techmarket'),
			'id'        => 'facebook',
			'type'      => 'text',
			'icon'      => 'fab fa-facebook',
		),

		array(
			'title'     => esc_html__('Twitter', 'techmarket'),
			'id'        => 'twitter',
			'type'      => 'text',
			'icon'      => 'fab fa-twitter',
		),

		array(
			'title'     => esc_html__('Google+', 'techmarket'),
			'id'        => 'googleplus',
			'type'      => 'text',
			'icon'      => 'fab fa-google-plus',
		),

		array(
			'title'     => esc_html__('Pinterest', 'techmarket'),
			'id'        => 'pinterest',
			'type'      => 'text',
			'icon'      => 'fab fa-pinterest',
		),

		array(
			'title'     => esc_html__('LinkedIn', 'techmarket'),
			'id'        => 'linkedin',
			'type'      => 'text',
			'icon'      => 'fab fa-linkedin',
		),

		array(
			'title'     => esc_html__('Tumblr', 'techmarket'),
			'id'        => 'tumblr',
			'type'      => 'text',
			'icon'      => 'fab fa-tumblr',
		),

		array(
			'title'     => esc_html__('Instagram', 'techmarket'),
			'id'        => 'instagram',
			'type'      => 'text',
			'icon'      => 'fab fa-instagram',
		),

		array(
			'title'     => esc_html__('Youtube', 'techmarket'),
			'id'        => 'youtube',
			'type'      => 'text',
			'icon'      => 'fab fa-youtube',
		),

		array(
			'title'     => esc_html__('Vimeo', 'techmarket'),
			'id'        => 'vimeo',
			'type'      => 'text',
			'icon'      => 'fab fa-vimeo-square',
		),

		array(
			'title'     => esc_html__('Dribbble', 'techmarket'),
			'id'        => 'dribbble',
			'type'      => 'text',
			'icon'      => 'fab fa-dribbble',
		),

		array(
			'title'     => esc_html__('Stumble Upon', 'techmarket'),
			'id'        => 'stumbleupon',
			'type'      => 'text',
			'icon'      => 'fab fa-stumpleupon',
		),

		array(
			'title'     => esc_html__('Sound Cloud', 'techmarket'),
			'id'        => 'soundcloud',
			'type'      => 'text',
			'icon'      => 'fab fa-soundcloud',
		),

		array(
			'title'     => esc_html__('Vine', 'techmarket'),
			'id'        => 'vine',
			'type'      => 'text',
			'icon'      => 'fab fa-vine',
		),

		array(
			'title'     => esc_html__('VKontakte', 'techmarket'),
			'id'        => 'vk',
			'type'      => 'text',
			'icon'      => 'fab fa-vk',
		),
		array(
			'id'		=> 'show_footer_rss_icon',
			'type'		=> 'switch',
			'title'		=> esc_html__( 'RSS', 'techmarket' ),
			'desc'		=> esc_html__( 'On enabling footer rss icon.', 'techmarket' ),
			'default'	=> 0,
		),
	),
) );
