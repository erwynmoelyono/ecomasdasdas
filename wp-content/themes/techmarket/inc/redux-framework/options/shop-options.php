<?php
/**
 * Options available for Shop sub menu of Theme Options
 *
 */

$shop_options 	= apply_filters( 'techmarket_shop_options_args', array(
	'title'		=> esc_html__( 'Shop', 'techmarket' ),
	'icon'		=> 'fas fa-shopping-cart',
	'fields'	=> array(

		array(
			'title'		=> esc_html__( 'General', 'techmarket' ),
			'id'		=> 'shop_general_info_start',
			'type'		=> 'section',
			'indent'	=> true
		),

		array(
			'title' 	=> esc_html__( 'Brand Attribute', 'techmarket' ),
			'subtitle' 	=> esc_html__( 'Choose a product attribute that will be used as brands', 'techmarket' ),
			'desc'  	=> esc_html__( 'Once you choose a brand attribute, you will be able to add brand images to the attributes', 'techmarket' ),
			'id' 		=> 'product_brand_taxonomy',
			'type' 		=> 'select',
			'options' 	=> redux_get_product_attr_taxonomies()
		),

		array(
			'title' 	=> esc_html__( 'Label Attribute', 'techmarket' ),
			'subtitle' 	=> esc_html__( 'Choose a product attribute that will be used as label', 'techmarket' ),
			'desc'  	=> esc_html__( 'Once you choose a label attribute, you will be able to add label color code to the attributes', 'techmarket' ),
			'id' 		=> 'product_label_taxonomy',
			'type' 		=> 'select',
			'options' 	=> redux_get_product_attr_taxonomies()
		),

		array(
			'title'		=> esc_html__( 'Catalog Mode', 'techmarket' ),
			'subtitle'	=> esc_html__( 'Enable / Disable the Catalog Mode.', 'techmarket' ),
			'id'		=> 'catalog_mode',
			'type'		=> 'switch',
			'on'		=> esc_html__('Enabled', 'techmarket'),
			'off'		=> esc_html__('Disabled', 'techmarket'),
			'default'	=> 0,
		),

		array(
			'id'		=> 'compare_page_id',
			'title'		=> esc_html__( 'Shop Comparison Page', 'techmarket' ),
			'subtitle'	=> esc_html__( 'Choose a page that will be the product compare page for shop.', 'techmarket' ),
			'type'		=> 'select',
			'data'		=> 'pages',
		),

		array(
			'title'		=> esc_html__( 'Checkout Sticky', 'techmarket' ),
			'id'		=> 'checkout_sticky',
			'type'		=> 'switch',
			'on'		=> esc_html__( 'Enabled', 'techmarket' ),
			'off'		=> esc_html__( 'Disabled', 'techmarket' ),
			'default'	=> 0,
		),

		array(
			'title'		=> esc_html__( 'Recently Viewed Products', 'techmarket' ),
			'id'		=> 'shop_footer_recently_viewed',
			'type'		=> 'switch',
			'on'		=> esc_html__( 'Enabled', 'techmarket' ),
			'off'		=> esc_html__( 'Disabled', 'techmarket' ),
			'default'	=> 1,
		),

		array(
			'title'		=> esc_html__( 'Brands Carousel', 'techmarket' ),
			'id'		=> 'shop_footer_brands_carousel',
			'type'		=> 'switch',
			'on'		=> esc_html__( 'Enabled', 'techmarket' ),
			'off'		=> esc_html__( 'Disabled', 'techmarket' ),
			'default'	=> 1,
		),

		array(
			'id'		=> 'shop_general_info_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'title'		=> esc_html__( 'Shop/Catalog Pages', 'techmarket' ),
			'id'		=> 'product_archive_page_start',
			'type'		=> 'section',
			'indent'	=> true
		),

		array(
			'id'		=> 'shop_jumbotron_id',
			'title'		=> esc_html__( 'Shop Page Jumbotron', 'techmarket' ),
			'subtitle'	=> esc_html__( 'Choose a static block that will be the jumbotron element for shop page', 'techmarket' ),
			'type'		=> 'select',
			'data'		=> 'posts',
			'args'		=> array(
				'post_type'			=> 'static_block',
				'posts_per_page'	=> -1,
			)
		),

		array(
			'id'		=> 'product_archive_enabled_views',
			'type'		=> 'sorter',
			'title'		=> esc_html__( 'Product archive views', 'techmarket' ),
			'subtitle'	=> esc_html__( 'Please drag and arrange the views. Top most view will be the default view', 'techmarket' ),
			'options'	=> array(
				'enabled'	=> array(
					'grid'				=> esc_html__( 'Grid', 'techmarket' ),
					'grid-extended'		=> esc_html__( 'Grid Extended', 'techmarket' ),
					'list-view-large'	=> esc_html__( 'List View Large', 'techmarket' ),
					'list-view'			=> esc_html__( 'List', 'techmarket' ),
					'list-view-small'	=> esc_html__( 'List View Small', 'techmarket' )
				),
				'disabled'	=> array()
			)
		),

		array(
			'title'		=> esc_html__('Shop Page Layout', 'techmarket'),
			'subtitle'	=> esc_html__('Select the layout for the Shop Listing.', 'techmarket'),
			'id'		=> 'shop_layout',
			'type'		=> 'select',
			'options'	=> array(
				'full-width'		=> esc_html__( 'Full Width', 'techmarket' ),
				'left-sidebar'		=> esc_html__( 'Left Sidebar', 'techmarket' ),
				'right-sidebar'		=> esc_html__( 'Right Sidebar', 'techmarket' ),
				'two-sidebar'		=> esc_html__( 'Two Sidebar', 'techmarket' ),
			),
			'default'	=> 'left-sidebar',
		),

		array(
			'title'		=> esc_html__('Number of Product Sub-categories Columns', 'techmarket'),
			'subtitle'	=> esc_html__('Drag the slider to set the number of columns for displaying product sub-categories in shop and catalog pages.', 'techmarket' ),
			'id'		=> 'subcategory_columns',
			'min'		=> '2',
			'step'		=> '1',
			'max'		=> '8',
			'type'		=> 'slider',
			'default'	=> '5',
		),

		array(
			'title'		=> esc_html__('Number of Products Columns', 'techmarket'),
			'subtitle'	=> esc_html__('Drag the slider to set the number of columns for displaying products in shop and catalog pages.', 'techmarket' ),
			'id'		=> 'product_columns',
			'min'		=> '2',
			'step'		=> '1',
			'max'		=> '8',
			'type'		=> 'slider',
			'default'	=> '5',
		),

		array(
			'title'		=> esc_html__('Number of Products Per Page', 'techmarket'),
			'subtitle'	=> esc_html__('Drag the slider to set the number of products per page to be listed on the shop page and catalog pages.', 'techmarket' ),
			'id'		=> 'products_per_page',
			'min'		=> '3',
			'step'		=> '1',
			'max'		=> '48',
			'type'		=> 'slider',
			'default'	=> '20',
		),

		array(
			'id'		=> 'product_archive_page_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'title'		=> esc_html__( 'Single Product Page', 'techmarket' ),
			'id'		=> 'product_single_page_start',
			'type'		=> 'section',
			'indent'	=> true
		),

		array(
			'title'		=> esc_html__('Single Product Layout', 'techmarket'),
			'subtitle'	=> esc_html__('Select the layout for the Single Product.', 'techmarket'),
			'id'		=> 'single_product_layout',
			'type'		=> 'select',
			'options'	=> array(
				'full-width'		=> esc_html__( 'Full Width', 'techmarket' ),
				'left-sidebar'		=> esc_html__( 'Left Sidebar', 'techmarket' ),
				'right-sidebar'		=> esc_html__( 'Right Sidebar', 'techmarket' ),
			),
			'default'	=> 'left-sidebar',
		),

		array(
			'title'		=> esc_html__('Single Product Style', 'techmarket'),
			'subtitle'	=> esc_html__('Select the style for Full Width layout.', 'techmarket'),
			'id'		=> 'single_product_style',
			'type'		=> 'select',
			'options'	=> array(
				'normal'		=> esc_html__( 'Normal', 'techmarket' ),
				'extended'		=> esc_html__( 'Extended', 'techmarket' ),
			),
			'default'   => 'normal',
			'required'	=> array( 'single_product_layout', 'equals', 'full-width' )
		),

		array(
			'title'		=> esc_html__( 'Related Products', 'techmarket' ),
			'subtitle'	=> esc_html__( 'Enable / Disable the related products.', 'techmarket' ),
			'id'		=> 'related_products',
			'type'		=> 'switch',
			'on'		=> esc_html__('Enabled', 'techmarket'),
			'off'		=> esc_html__('Disabled', 'techmarket'),
			'default'	=> 1,
		),

		array(
			'id'        => 'shop_specs_tab_title',
			'title'     => esc_html__( 'Specifications Tab title', 'techmarket' ),
			'type'      => 'text',
			'default'   => esc_html__( 'Specifications', 'techmarket' )
		),

		array(
			'id'        => 'shop_default_attr_style',
			'title'     => esc_html__( 'Default Attributes Style', 'techmarket' ),
			'type'      => 'select',
			'options'   => array(
				'like_column' => esc_html__( 'Column View', 'techmarket' ),
				'like_table'  => esc_html__( 'Tabular View', 'techmarket' )
			),
			'default'   => 'like_column',
		),

		array(
			'id'        => 'shop_default_attr_col',
			'title'     => esc_html__( 'Columns in column view', 'techmarket' ),
			'type'      => 'select',
			'options'   => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6'
			),
			'default'   => '3',
			'required'	=> array( 'shop_default_attr_style', 'equals', 'like_column' )
		),

		array(
			'id'		=> 'product_single_page_end',
			'type'		=> 'section',
			'indent'	=> false
		),

		array(
			'title'		=> esc_html__( 'My Account Page', 'techmarket' ),
			'id'		=> 'myaccount_page_start',
			'type'		=> 'section',
			'indent'	=> true
		),

		array(
			'title'		=> esc_html__( 'Before login text', 'techmarket' ),
			'id'		=> 'myaccount_before_login_text',
			'type'		=> 'textarea',
			'default'	=> esc_html__( 'Vestibulum lacus magna, faucibus vitae dui eget, aliquam fringilla. In et commodo elit. Class aptent taciti sociosqu ad litora.', 'techmarket' ),
		),

		array(
			'title'		=> esc_html__( 'Before Register text', 'techmarket' ),
			'id'		=> 'myaccount_before_register_text',
			'type'		=> 'textarea',
			'default'	=> esc_html__( 'Create new account today to reap the benefits of a personalized shopping experience. Praesent placerat, est sed aliquet finibus.', 'techmarket' ),
		),

		array(
			'id'        => 'myaccount_register_benefits_title',
			'title'     => esc_html__( 'Register Benefits Title', 'techmarket' ),
			'type'      => 'text',
			'default'   => esc_html__( 'Sign up today and you will be able to :', 'techmarket' )
		),

		array(
			'id'        => 'myaccount_register_benefits',
			'title'     => esc_html__( 'Register Benefits', 'techmarket' ),
			'type'      => 'multi_text',
			'default'   => array(
				esc_html__( 'Speed your way through checkout', 'techmarket' ),
				esc_html__( 'Track your orders easily', 'techmarket' ),
				esc_html__( 'Keep a record of all your purchases', 'techmarket' ),
			),
		),

		array(
			'id'        => 'myaccount_page_end',
			'type'      => 'section',
			'indent'    => false
		)
	)
) );
