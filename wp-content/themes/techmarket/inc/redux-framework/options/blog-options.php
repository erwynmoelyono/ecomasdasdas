<?php
/**
 * Options available for Blog sub menu of Theme Options
 *
 */

$blog_options 	= apply_filters( 'techmarket_blog_options_args', array(
	'title'		=> esc_html__( 'Blog', 'techmarket' ),
	'icon'		=> 'far fa-list-alt',
	'fields'	=> array(
		array(
			'title'     => esc_html__('Blog Page View', 'techmarket'),
			'subtitle'  => esc_html__('Select the view for the Blog Listing.', 'techmarket'),
			'id'        => 'blog_view',
			'type'      => 'select',
			'options'   => array(
				'blog-default'		=> esc_html__( 'Normal', 'techmarket' ),
				'blog-grid'			=> esc_html__( 'Grid', 'techmarket' ),
				'blog-list'			=> esc_html__( 'List', 'techmarket' ),
			),
			'default'   => 'blog-default',
		),

		array(
			'title'     => esc_html__('Blog Page Layout', 'techmarket'),
			'subtitle'  => esc_html__('Select the layout for the Blog Listing.', 'techmarket'),
			'id'        => 'blog_layout',
			'type'      => 'select',
			'options'   => array(
				'full-width'  	      => esc_html__( 'Full Width', 'techmarket' ),
				'left-sidebar'        => esc_html__( 'Left Sidebar', 'techmarket' ),
				'right-sidebar'       => esc_html__( 'Right Sidebar', 'techmarket' ),
			),
			'default'   => 'right-sidebar',
		),

		array(
			'title'     => esc_html__( 'Enable Placeholder Image', 'techmarket' ),
			'id'        => 'post_placeholder_img',
			'on'        => esc_html__('Yes', 'techmarket'),
			'off'       => esc_html__('No', 'techmarket'),
			'type'      => 'switch',
			'default'   => false,
		),

		array(
			'title'     => esc_html__( 'Force Excerpt', 'techmarket' ),
			'subtitle'	=> esc_html__( 'Show only excerpt instead of blog content in archive pages', 'techmarket' ),
			'id'        => 'post_force_excerpt',
			'on'        => esc_html__('Yes', 'techmarket'),
			'off'       => esc_html__('No', 'techmarket'),
			'type'      => 'switch',
			'default'   => false,
		),

		array(
			'title'     => esc_html__('Single Post Layout', 'techmarket'),
			'subtitle'  => esc_html__('Select the layout for the Single Post.', 'techmarket'),
			'id'        => 'single_post_layout',
			'type'      => 'select',
			'options'   => array(
				'full-width'  	      => esc_html__( 'Full Width', 'techmarket' ),
				'left-sidebar'        => esc_html__( 'Left Sidebar', 'techmarket' ),
				'right-sidebar'       => esc_html__( 'Right Sidebar', 'techmarket' ),
			),
			'default'   => 'right-sidebar',
		),
	)
) );
