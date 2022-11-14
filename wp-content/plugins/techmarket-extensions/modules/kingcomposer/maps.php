<?php

if( ! defined('KC_FILE' ) ) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

$kc = KingComposer::globe();

$shortcode_params = array();

$shortcode_params['techmarket_3_2_3_product_cards_tab_with_featured_product'] = array(
	'name' => esc_html__( '3-2-3 Products Cards Tabs', 'techmarket-extensions' ),
	'description' => esc_html__( '3-2-3 Products Cards Tabs', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( '3-2-3 Products Cards Tabs Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'section_title',
			'label'			=> esc_html__('Section Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'description'	=> esc_html__('Enter section title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'default_active_tab',
			'label'			=> esc_html__('Default Active Tab', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter default active tab id.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Tabs', 'techmarket-extensions' ),
			'name'			=> 'tabs',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new tab', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'title',
					'label'			=> esc_html__('Title', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'shortcode_tag',
					'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
					'type'			=> 'select',
					'options'		=> array(
						'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
						'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
						'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
						'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
						'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
						'products'				=> esc_html__( 'Products','techmarket-extensions'),
						'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
					),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'orderby',
					'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
					'value'			=> 'date',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'order',
					'label'			=> esc_html__('Order', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
					'value'			=> 'desc',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'product_id',
					'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'category',
					'label'			=> esc_html__('Category', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_6_1_6_tabs_with_deals'] = array(
	'name' => esc_html__( '6-1-6 Products Tabs with Deals', 'techmarket-extensions' ),
	'description' => esc_html__( '6-1-6 Products Tabs with Deals', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( '6-1-6 Products Tabs with Deals Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'section_title',
			'label'			=> esc_html__('Section Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'description'	=> esc_html__('Enter section title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Tabs', 'techmarket-extensions' ),
			'name'			=> 'tabs',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new tab', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'title',
					'label'			=> esc_html__('Title', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'shortcode_tag',
					'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
					'type'			=> 'select',
					'options'		=> array(
						'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
						'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
						'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
						'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
						'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
						'products'				=> esc_html__( 'Products','techmarket-extensions'),
						'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
					),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'orderby',
					'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
					'value'			=> 'date',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'order',
					'label'			=> esc_html__('Order', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
					'value'			=> 'desc',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'product_id',
					'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'category',
					'label'			=> esc_html__('Category', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_banner'] = array(
	'name' => esc_html__( 'Banner', 'techmarket-extensions' ),
	'description' => esc_html__( 'Banner', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Banner Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'bg_choice',
			'label'			=> esc_html__( 'Background Choice', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'image'			=> esc_html__('Image', 'techmarket-extensions'),
				'color'			=> esc_html__('Color', 'techmarket-extensions')
			),
			'description'	=> esc_html__( 'Select choice for background.', 'techmarket-extensions' ),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'bg_image',
			'type'			=> 'attach_image',
			'label'			=> esc_html__( 'Background Image', 'techmarket-extensions' ),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'bg_color',
			'label'			=> esc_html__( 'Background Color', 'techmarket-extensions' ),
			'type'			=> 'color_picker',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'bg_height',
			'label'			=> esc_html__('Height', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'pre_title',
			'label'			=> esc_html__('Pre Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'sub_title',
			'label'			=> esc_html__('Sub Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'action_text',
			'label'			=> esc_html__('Action Text', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'action_link',
			'label'			=> esc_html__('Action Link', 'techmarket-extensions'),
			'type'			=> 'text',
			'value'			=> '#',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'price',
			'label'			=> esc_html__('Price', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_banners'] = array(
	'name' => esc_html__( 'Banners', 'techmarket-extensions' ),
	'description' => esc_html__( 'Banners', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Banners Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Banners', 'techmarket-extensions' ),
			'name'			=> 'banners',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new banner', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'bg_choice',
					'label'			=> esc_html__( 'Background Choice', 'techmarket-extensions' ),
					'type'			=> 'select',
					'options'		=> array(
						'image'			=> esc_html__('Image', 'techmarket-extensions'),
						'color'			=> esc_html__('Color', 'techmarket-extensions')
					),
					'description'	=> esc_html__( 'Select choice for background.', 'techmarket-extensions' ),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'bg_image',
					'type'			=> 'attach_image',
					'label'			=> esc_html__( 'Background Image', 'techmarket-extensions' ),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'bg_color',
					'label'			=> esc_html__( 'Background Color', 'techmarket-extensions' ),
					'type'			=> 'color_picker',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'bg_height',
					'label'			=> esc_html__('Height', 'techmarket-extensions'),
					'type'			=> 'text',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'pre_title',
					'label'			=> esc_html__('Pre Title', 'techmarket-extensions'),
					'type'			=> 'textarea',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'title',
					'label'			=> esc_html__('Title', 'techmarket-extensions'),
					'type'			=> 'textarea',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'sub_title',
					'label'			=> esc_html__('Sub Title', 'techmarket-extensions'),
					'type'			=> 'textarea',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'action_text',
					'label'			=> esc_html__('Action Text', 'techmarket-extensions'),
					'type'			=> 'textarea',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'action_link',
					'label'			=> esc_html__('Action Link', 'techmarket-extensions'),
					'type'			=> 'text',
					'value'			=> '#',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'price',
					'label'			=> esc_html__('Price', 'techmarket-extensions'),
					'type'			=> 'textarea',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'section_class',
					'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
				)
			)
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_brands_carousel'] = array(
	'name' => esc_html__( 'Brands Carousel', 'techmarket-extensions' ),
	'description' => esc_html__( 'Brands Carousel', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Brands Carousel Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'limit',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of brands to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'include',
			'label'			=> esc_html__('Include', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter id spearate by comma(,)', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Hide Empty?', 'techmarket-extensions' ),
			'name'			=> 'hide_empty',
			'description'	=> esc_html__( 'Check to hide empty brands.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'ca_slidestoshow',
			'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoscroll',
			'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Responsive', 'techmarket-extensions' ),
			'name'			=> 'ca_responsive',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new breakpoint', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'ca_res_breakpoint',
					'label'			=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoshow',
					'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoscroll',
					'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		)
	),
);

$shortcode_params['techmarket_brands'] = array(
	'name' => esc_html__( 'Brands', 'techmarket-extensions' ),
	'description' => esc_html__( 'Brands', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Brands Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'limit',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of brands to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'include',
			'label'			=> esc_html__('Include', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter id spearate by comma(,)', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Hide Empty?', 'techmarket-extensions' ),
			'name'			=> 'hide_empty',
			'description'	=> esc_html__( 'Check to hide empty brands.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		)
	),
);

$shortcode_params['techmarket_deals_cards_carousel_with_gallery'] = array(
	'name' => esc_html__( 'Deals Cards Carousel with Gallery', 'techmarket-extensions' ),
	'description' => esc_html__( 'Deals Cards Carousel with Gallery', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Deals Cards Carousel with Gallery Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'shortcode_tag',
			'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
				'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
				'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
				'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
				'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
				'products'				=> esc_html__( 'Products','techmarket-extensions'),
				'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
			),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'per_page',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'product_id',
			'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'category',
			'label'			=> esc_html__('Category', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'name'			=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'name'			=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'name'			=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_deals_cards_carousel'] = array(
	'name' => esc_html__( 'Deals Cards Carousel', 'techmarket-extensions' ),
	'description' => esc_html__( 'Deals Cards Carousel', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Deals Cards Carousel Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'shortcode_tag',
			'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
				'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
				'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
				'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
				'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
				'products'				=> esc_html__( 'Products','techmarket-extensions'),
				'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
			),
			'value'			=> 'sale_products',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'per_page',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'product_id',
			'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'category',
			'label'			=> esc_html__('Category', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Header Navigation?', 'techmarket-extensions' ),
			'name'			=> 'header_custom_nav',
			'description'	=> esc_html__( 'Check to show Custom Navigation.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Header Timer?', 'techmarket-extensions' ),
			'name'			=> 'header_timer',
			'description'	=> esc_html__( 'Check to show Header Timer.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'timer_value',
			'label'			=> esc_html__('Timer Value', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the timer value.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoshow',
			'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
			'value'			=> 2,
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoscroll',
			'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
			'value'			=> 2,
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'name'			=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Responsive', 'techmarket-extensions' ),
			'name'			=> 'ca_responsive',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new breakpoint', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'ca_res_breakpoint',
					'label'			=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoshow',
					'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoscroll',
					'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_deals_carousel'] = array(
	'name' => esc_html__( 'Deals Carousel', 'techmarket-extensions' ),
	'description' => esc_html__( 'Deals Carousel', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Deals Carousel Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'shortcode_tag',
			'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
				'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
				'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
				'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
				'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
				'products'				=> esc_html__( 'Products','techmarket-extensions'),
				'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
			),
			'value'			=> 'sale_products',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'per_page',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'product_id',
			'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'category',
			'label'			=> esc_html__('Category', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Header Navigation?', 'techmarket-extensions' ),
			'name'			=> 'header_custom_nav',
			'description'	=> esc_html__( 'Check to show Custom Navigation.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_features_list'] = array(
	'name' => esc_html__( 'Features List', 'techmarket-extensions' ),
	'description' => esc_html__( 'Features List', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Features List Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Features', 'techmarket-extensions' ),
			'name'			=> 'features',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new feature', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'icon',
					'label'			=> esc_html__('Icon', 'techmarket-extensions'),
					'type'			=> 'icon_picker',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'label',
					'label'			=> esc_html__('Label', 'techmarket-extensions'),
					'type'			=> 'textarea',
					'admin_label'	=> true
				)
			)
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_fullwidth_notice'] = array(
	'name' => esc_html__( 'Notice', 'techmarket-extensions' ),
	'description' => esc_html__( 'Notice', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Notice Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'notice_info',
			'label'			=> esc_html__('Text', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_jumbotron'] = array(
	'name' => esc_html__( 'Jumbotron', 'techmarket-extensions' ),
	'description' => esc_html__( 'Add Jumbotron to your page.', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Jumbotron Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'sub_title',
			'label'			=> esc_html__('Sub Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'image',
			'type'			=> 'attach_image',
			'label'			=> esc_html__( 'Background Image', 'techmarket-extensions' ),
			'admin_label'	=> true
		)
	),
);

$shortcode_params['techmarket_media_single_banner'] = array(
	'name' => esc_html__( 'Media Single Banner', 'techmarket-extensions' ),
	'description' => esc_html__( 'Media Single Banner', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Media Single Banner Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'section_title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'description',
			'label'			=> esc_html__('Description', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'action_text',
			'label'			=> esc_html__('Action Text', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'action_link',
			'label'			=> esc_html__('Action Link', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'image',
			'type'			=> 'attach_image',
			'label'			=> esc_html__( 'Image', 'techmarket-extensions' ),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'media_align',
			'label'			=> esc_html__( 'Media Align', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'media-left'			=> esc_html__( 'Left','techmarket-extensions'),
				'media-right'			=> esc_html__( 'Rignt','techmarket-extensions')
			),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_poster'] = array(
	'name' => esc_html__( 'Poster', 'techmarket-extensions' ),
	'description' => esc_html__( 'Poster', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Poster Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'bg_choice',
			'label'			=> esc_html__( 'Background Choice', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'image'			=> esc_html__('Image', 'techmarket-extensions'),
				'color'			=> esc_html__('Color', 'techmarket-extensions')
			),
			'description'	=> esc_html__( 'Select choice for background.', 'techmarket-extensions' ),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'bg_image',
			'type'			=> 'attach_image',
			'label'			=> esc_html__( 'Background Image', 'techmarket-extensions' ),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'bg_color',
			'label'			=> esc_html__( 'Background Color', 'techmarket-extensions' ),
			'type'			=> 'color_picker',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'bg_height',
			'label'			=> esc_html__('Height', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'pre_title',
			'label'			=> esc_html__('Pre Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'sub_title',
			'label'			=> esc_html__('Sub Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'action_text',
			'label'			=> esc_html__('Action Text', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'action_link',
			'label'			=> esc_html__('Action Link', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'condition',
			'label'			=> esc_html__('Condition', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_product_card_carousel_with_gallery'] = array(
	'name' => esc_html__( 'Products Cards Carousel with Gallery', 'techmarket-extensions' ),
	'description' => esc_html__( 'Products Cards Carousel with Gallery', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Products Cards Carousel with Gallery Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'shortcode_tag',
			'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
				'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
				'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
				'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
				'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
				'products'				=> esc_html__( 'Products','techmarket-extensions'),
				'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
			),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'per_page',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'product_id',
			'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'category',
			'label'			=> esc_html__('Category', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'name'			=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'name'			=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'name'			=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_product_categories_carousel'] = array(
	'name' => esc_html__( 'Products Categories Carousel', 'techmarket-extensions' ),
	'description' => esc_html__( 'Products Categories Carousel', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Products Categories Carousel Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'pre_title',
			'label'			=> esc_html__('Pre Title', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter pre title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'section_title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Header Navigation?', 'techmarket-extensions' ),
			'name'			=> 'header_custom_nav',
			'description'	=> esc_html__( 'Check to show Custom Navigation.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'limit',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'button_text',
			'label'			=> esc_html__('Button Text', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the button text.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'button_link',
			'label'			=> esc_html__('Button Link', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the button link.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'include',
			'label'			=> esc_html__('Include', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter slugs spearate by comma(,)', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Hide Empty?', 'techmarket-extensions' ),
			'name'			=> 'hide_empty',
			'description'	=> esc_html__( 'Check to hide empty products.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'ca_slidestoshow',
			'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoscroll',
			'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Responsive', 'techmarket-extensions' ),
			'name'			=> 'ca_responsive',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new breakpoint', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'ca_res_breakpoint',
					'label'			=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoshow',
					'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoscroll',
					'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_product_categories_filter'] = array(
	'name' => esc_html__( 'Product Categories Filter', 'techmarket-extensions' ),
	'description' => esc_html__( 'Product Categories Filter', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Product Categories Filter Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'per_page',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'value'			=> 8,
			'admin_label'	=> true
		),
		array(
			'name'			=> 'columns',
			'label'			=> esc_html__('Columns', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of columns to display.', 'techmarket-extensions'),
			'value'			=> 4,
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'template',
			'label'			=> esc_html__('Template', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter template.', 'techmarket-extensions'),
			'value'			=> 'content-product-featured',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'cat_show_all_text',
			'label'			=> esc_html__('Category show all text', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter Category show all option text', 'techmarket-extensions'),
			'value'			=> esc_html__( 'All Categories', 'techmarket-extensions' ),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Hide Empty?', 'techmarket-extensions' ),
			'name'			=> 'cat_hide_if_empty',
			'description'	=> esc_html__( 'Check to hide empty categories.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'cat_include',
			'label'			=> esc_html__('Include', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter category slugs spearate by comma(,)', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_product_categories_list'] = array(
	'name' => esc_html__( 'Products Categories List', 'techmarket-extensions' ),
	'description' => esc_html__( 'Products Categories List', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Products Categories List Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'section_title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'limit',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'include',
			'label'			=> esc_html__('Include', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter slugs spearate by comma(,)', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'parent',
			'label'			=> esc_html__('Parent', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter parent category id. Use 0 for list first level categories only.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Hide Empty?', 'techmarket-extensions' ),
			'name'			=> 'hide_empty',
			'description'	=> esc_html__( 'Check to hide empty products.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		)
	),
);

$shortcode_params['techmarket_products_cards_carousel_with_bg'] = array(
	'name' => esc_html__( 'Products Cards Carousel with Image', 'techmarket-extensions' ),
	'description' => esc_html__( 'Products Cards Carousel with Image', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Products Cards Carousel with Image Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'shortcode_tag',
			'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
				'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
				'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
				'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
				'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
				'products'				=> esc_html__( 'Products','techmarket-extensions'),
				'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
			),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'per_page',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'product_id',
			'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'category',
			'label'			=> esc_html__('Category', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'image',
			'type'			=> 'attach_image',
			'label'			=> esc_html__( 'Image', 'techmarket-extensions' ),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'name'			=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'ca_rows',
			'label'			=> esc_html__('rows', 'techmarket-extensions'),
			'type'			=> 'text',
			'value'			=> 2,
			'description'	=> esc_html__('Enter the number of rows to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidesperrow',
			'label'			=> esc_html__('slidesPerRow', 'techmarket-extensions'),
			'type'			=> 'text',
			'value'			=> 2,
			'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoshow',
			'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
			'type'			=> 'text',
			'value'			=> 1,
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoscroll',
			'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
			'type'			=> 'text',
			'value'			=> 1,
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'name'			=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'name'			=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Responsive', 'techmarket-extensions' ),
			'name'			=> 'ca_responsive',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new breakpoint', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'ca_res_breakpoint',
					'label'			=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidesperrow',
					'label'			=> esc_html__('slidesPerRow', 'techmarket-extensions'),
					'type'			=> 'text',
					'value'			=> 1,
					'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoshow',
					'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoscroll',
					'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_carousel_tabs_with_featured_product'] = array(
	'name' => esc_html__( 'Products Carousel Tabs with Featured Product', 'techmarket-extensions' ),
	'description' => esc_html__( 'Products Carousel Tabs with Featured Product', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Products Carousel Tabs with Featured Product Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'section_title',
			'label'			=> esc_html__('Section Title', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter section title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'header_nav_align',
			'label'			=> esc_html__( 'Header Align', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'justify-content-start'		=> esc_html__( 'Start', 'techmarket-extensions'),
				'justify-content-center'	=> esc_html__( 'Center', 'techmarket-extensions'),
				'justify-content-end'		=> esc_html__( 'End', 'techmarket-extensions'),
			),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Tabs', 'techmarket-extensions' ),
			'name'			=> 'tabs',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new tab', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'title',
					'label'			=> esc_html__('Title', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'shortcode_tag',
					'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
					'type'			=> 'select',
					'options'		=> array(
						'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
						'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
						'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
						'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
						'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
						'products'				=> esc_html__( 'Products','techmarket-extensions'),
						'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
					),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'per_page',
					'label'			=> esc_html__('Limit', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'orderby',
					'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
					'value'			=> 'date',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'order',
					'label'			=> esc_html__('Order', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
					'value'			=> 'desc',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'template',
					'label'			=> esc_html__('Template', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'product_id',
					'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'category',
					'label'			=> esc_html__('Category', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'featured_shortcode_tag',
					'label'			=> esc_html__( 'Shortcode Featured', 'techmarket-extensions' ),
					'type'			=> 'select',
					'options'		=> array(
						'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
						'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
						'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
						'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
						'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
						'products'				=> esc_html__( 'Products','techmarket-extensions'),
						'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
					),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'featured_product_id',
					'label'			=> esc_html__('Product IDs Featured', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'featured_category',
					'label'			=> esc_html__('Category Featured', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'name'			=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'ca_rows',
			'label'			=> esc_html__('rows', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of rows to display.', 'techmarket-extensions'),
			'value'			=> 2,
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidesperrow',
			'label'			=> esc_html__('slidesPerRow', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
			'value'			=> 6,
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoshow',
			'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
			'value'			=> 1,
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoscroll',
			'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
			'value'			=> 1,
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'name'			=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'name'			=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Responsive', 'techmarket-extensions' ),
			'name'			=> 'ca_responsive',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new breakpoint', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'ca_res_breakpoint',
					'label'			=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidesperrow',
					'label'			=> esc_html__('slidesPerRow', 'techmarket-extensions'),
					'type'			=> 'text',
					'value'			=> 1,
					'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoshow',
					'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoscroll',
					'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_carousel_tabs'] = array(
	'name' => esc_html__( 'Products Carousel Tabs', 'techmarket-extensions' ),
	'description' => esc_html__( 'Products Carousel Tabs', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Products Carousel Tabs Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'section_title',
			'label'			=> esc_html__('Section Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'description'	=> esc_html__('Enter section title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'header_nav_align',
			'label'			=> esc_html__( 'Header Align', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'justify-content-start'		=> esc_html__( 'Start', 'techmarket-extensions'),
				'justify-content-center'	=> esc_html__( 'Center', 'techmarket-extensions'),
				'justify-content-end'		=> esc_html__( 'End', 'techmarket-extensions'),
			),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Tabs', 'techmarket-extensions' ),
			'name'			=> 'tabs',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new tab', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'title',
					'label'			=> esc_html__('Title', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'shortcode_tag',
					'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
					'type'			=> 'select',
					'options'		=> array(
						'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
						'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
						'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
						'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
						'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
						'products'				=> esc_html__( 'Products','techmarket-extensions'),
						'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
					),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'per_page',
					'label'			=> esc_html__('Limit', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'orderby',
					'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
					'value'			=> 'date',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'order',
					'label'			=> esc_html__('Order', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
					'value'			=> 'desc',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'template',
					'label'			=> esc_html__('Template', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'product_id',
					'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'category',
					'label'			=> esc_html__('Category', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'name'			=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'ca_rows',
			'label'			=> esc_html__('rows', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of rows to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidesperrow',
			'label'			=> esc_html__('slidesPerRow', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoshow',
			'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoscroll',
			'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'name'			=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'name'			=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Responsive', 'techmarket-extensions' ),
			'name'			=> 'ca_responsive',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new breakpoint', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'ca_res_breakpoint',
					'label'			=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidesperrow',
					'label'			=> esc_html__('slidesPerRow', 'techmarket-extensions'),
					'type'			=> 'text',
					'value'			=> 1,
					'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoshow',
					'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoscroll',
					'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_carousel_vertical_tabs'] = array(
	'name' => esc_html__( 'Products Carousel Vertical Tabs', 'techmarket-extensions' ),
	'description' => esc_html__( 'Products Carousel Vertical Tabs', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Products Carousel Vertical Tabs Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'section_title',
			'label'			=> esc_html__('Section Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'description'	=> esc_html__('Enter section title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'bg_image',
			'type'			=> 'attach_image',
			'label'			=> esc_html__( 'Background Image', 'techmarket-extensions' ),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Tabs', 'techmarket-extensions' ),
			'name'			=> 'tabs',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new tab', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'title',
					'label'			=> esc_html__('Title', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'shortcode_tag',
					'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
					'type'			=> 'select',
					'options'		=> array(
						'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
						'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
						'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
						'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
						'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
						'products'				=> esc_html__( 'Products','techmarket-extensions'),
						'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
					),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'per_page',
					'label'			=> esc_html__('Limit', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'orderby',
					'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
					'value'			=> 'date',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'order',
					'label'			=> esc_html__('Order', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
					'value'			=> 'desc',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'template',
					'label'			=> esc_html__('Template', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'product_id',
					'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'category',
					'label'			=> esc_html__('Category', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'name'			=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'ca_slidestoshow',
			'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoscroll',
			'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'name'			=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Responsive', 'techmarket-extensions' ),
			'name'			=> 'ca_responsive',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new breakpoint', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'ca_res_breakpoint',
					'label'			=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoshow',
					'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoscroll',
					'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_carousel_with_bg'] = array(
	'name' => esc_html__( 'Products Carousel with Image', 'techmarket-extensions' ),
	'description' => esc_html__( 'Products Carousel with Image', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Products Carousel with Image Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'shortcode_tag',
			'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
				'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
				'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
				'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
				'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
				'products'				=> esc_html__( 'Products','techmarket-extensions'),
				'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
			),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'per_page',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'template',
			'label'			=> esc_html__('Template', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'product_id',
			'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'category',
			'label'			=> esc_html__('Category', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Header Timer?', 'techmarket-extensions' ),
			'name'			=> 'header_timer',
			'description'	=> esc_html__( 'Check to show Header Timer.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'timer_value',
			'label'			=> esc_html__('Timer Value', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the timer value.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'image',
			'type'			=> 'attach_image',
			'label'			=> esc_html__( 'Image', 'techmarket-extensions' ),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'name'			=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'ca_rows',
			'label'			=> esc_html__('rows', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of rows to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidesperrow',
			'label'			=> esc_html__('slidesPerRow', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoshow',
			'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoscroll',
			'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'name'			=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'name'			=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Responsive', 'techmarket-extensions' ),
			'name'			=> 'ca_responsive',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new breakpoint', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'ca_res_breakpoint',
					'label'			=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidesperrow',
					'label'			=> esc_html__('slidesPerRow', 'techmarket-extensions'),
					'type'			=> 'text',
					'value'			=> 1,
					'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoshow',
					'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoscroll',
					'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_carousel'] = array(
	'name' => esc_html__( 'Products Carousel', 'techmarket-extensions' ),
	'description' => esc_html__( 'Products Carousel', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Products Carousel Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'shortcode_tag',
			'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
				'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
				'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
				'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
				'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
				'products'				=> esc_html__( 'Products','techmarket-extensions'),
				'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
			),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'per_page',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'template',
			'label'			=> esc_html__('Template', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'product_id',
			'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'category',
			'label'			=> esc_html__('Category', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Header Navigation?', 'techmarket-extensions' ),
			'name'			=> 'header_custom_nav',
			'description'	=> esc_html__( 'Check to show Custom Navigation.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'name'			=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'ca_rows',
			'label'			=> esc_html__('rows', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of rows to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidesperrow',
			'label'			=> esc_html__('slidesPerRow', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoshow',
			'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ca_slidestoscroll',
			'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'name'			=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'name'			=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Responsive', 'techmarket-extensions' ),
			'name'			=> 'ca_responsive',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new breakpoint', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'ca_res_breakpoint',
					'label'			=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidesperrow',
					'label'			=> esc_html__('slidesPerRow', 'techmarket-extensions'),
					'type'			=> 'text',
					'value'			=> 1,
					'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoshow',
					'label'			=> esc_html__('slidesToShow', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'ca_res_slidestoscroll',
					'label'			=> esc_html__('slidesToScroll', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_isotope'] = array(
	'name' => esc_html__( 'Products Isotope', 'techmarket-extensions' ),
	'description' => esc_html__( 'Products Isotope', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Products Isotope Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'pre_title',
			'label'			=> esc_html__('Pre Title', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter pre title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'style',
			'label'			=> esc_html__( 'Style', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'style-1'		=> esc_html__('Style 1', 'techmarket-extensions'),
				'style-2'		=> esc_html__('Style 2', 'techmarket-extensions')
			),
			'description'	=> esc_html__( 'Select style for products.', 'techmarket-extensions' ),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'shortcode_tag',
			'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
				'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
				'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
				'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
				'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
				'products'				=> esc_html__( 'Products','techmarket-extensions'),
				'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
			),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'per_page',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'product_id',
			'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'category',
			'label'			=> esc_html__('Category', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Header Timer?', 'techmarket-extensions' ),
			'name'			=> 'header_timer',
			'description'	=> esc_html__( 'Check to show Header Timer.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'timer_title',
			'label'			=> esc_html__('Timer Title', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the timer title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'timer_value',
			'label'			=> esc_html__('Timer Value', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the timer value.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'action_text',
			'label'			=> esc_html__('Action Text', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'action_link',
			'label'			=> esc_html__('Action Link', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_tabs'] = array(
	'name' => esc_html__( 'Products Tabs', 'techmarket-extensions' ),
	'description' => esc_html__( 'Products Tabs', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Products Tabs Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'section_title',
			'label'			=> esc_html__('Section Title', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter section title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'header_nav_align',
			'label'			=> esc_html__( 'Header Align', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'justify-content-start'		=> esc_html__( 'Start', 'techmarket-extensions'),
				'justify-content-center'	=> esc_html__( 'Center', 'techmarket-extensions'),
				'justify-content-end'		=> esc_html__( 'End', 'techmarket-extensions'),
			),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'group',
			'label'			=> esc_html__( 'Tabs', 'techmarket-extensions' ),
			'name'			=> 'tabs',
			'description'	=> '',
			'options'		=> array(
				'add_text'			=> esc_html__( 'Add new tab', 'techmarket-extensions' )
			),
			'params' => array(
				array(
					'name'			=> 'title',
					'label'			=> esc_html__('Title', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'shortcode_tag',
					'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
					'type'			=> 'select',
					'options'		=> array(
						'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
						'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
						'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
						'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
						'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
						'products'				=> esc_html__( 'Products','techmarket-extensions'),
						'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
					),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'per_page',
					'label'			=> esc_html__('Limit', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'columns',
					'label'			=> esc_html__('Columns', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter the number of columns to display.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'orderby',
					'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
					'value'			=> 'date',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'order',
					'label'			=> esc_html__('Order', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
					'value'			=> 'desc',
					'admin_label'	=> true
				),
				array(
					'name'			=> 'template',
					'label'			=> esc_html__('Template', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'product_id',
					'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				),
				array(
					'name'			=> 'category',
					'label'			=> esc_html__('Category', 'techmarket-extensions'),
					'type'			=> 'text',
					'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
					'admin_label'	=> true
				)
			)
		),
		array(
			'name'			=> 'action_text',
			'label'			=> esc_html__('Action Text', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'action_link',
			'label'			=> esc_html__('Action Link', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_with_image'] = array(
	'name' => esc_html__( 'Products with Image', 'techmarket-extensions' ),
	'description' => esc_html__( 'Products with Image', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Products with Image Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'shortcode_tag',
			'label'			=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'featured_products'		=> esc_html__( 'Featured Products','techmarket-extensions'),
				'sale_products'			=> esc_html__( 'On Sale Products','techmarket-extensions'),
				'top_rated_products'	=> esc_html__( 'Top Rated Products','techmarket-extensions'),
				'recent_products'		=> esc_html__( 'Recent Products','techmarket-extensions'),
				'best_selling_products'	=> esc_html__( 'Best Selling Products','techmarket-extensions'),
				'products'				=> esc_html__( 'Products','techmarket-extensions'),
				'product_category'		=> esc_html__( 'Product Category','techmarket-extensions')
			),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'per_page',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'orderby',
			'label'			=> esc_html__('Orderby', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'order',
			'label'			=> esc_html__('Order', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'columns',
			'label'			=> esc_html__('Columns', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of columns to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'template',
			'label'			=> esc_html__('Template', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'product_id',
			'label'			=> esc_html__('Product IDs', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'category',
			'label'			=> esc_html__('Category', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'action_text',
			'label'			=> esc_html__('Action Text', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'action_link',
			'label'			=> esc_html__('Action Link', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'description',
			'label'			=> esc_html__('Description', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'image',
			'type'			=> 'attach_image',
			'label'			=> esc_html__( 'Image', 'techmarket-extensions' ),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_recent_posts_with_categories'] = array(
	'name' => esc_html__( 'Recent Posts with Categories', 'techmarket-extensions' ),
	'description' => esc_html__( 'Recent Posts with Categories', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Recent Posts with Categories Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'section_title',
			'label'			=> esc_html__('Title', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'description',
			'label'			=> esc_html__('Description', 'techmarket-extensions'),
			'type'			=> 'textarea',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'post_choice',
			'label'			=> esc_html__( 'Choice', 'techmarket-extensions' ),
			'type'			=> 'select',
			'options'		=> array(
				'recent'		=> esc_html__('Recent', 'techmarket-extensions'),
				'random'		=> esc_html__('Random', 'techmarket-extensions'),
				'specific'		=> esc_html__('Specific', 'techmarket-extensions')
			),
			'description'	=> esc_html__( 'Select choice for posts.', 'techmarket-extensions' ),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'ids',
			'label'			=> esc_html__('IDs', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with specific choice.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'limit',
			'label'			=> esc_html__('Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of posts to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Show Read More', 'techmarket-extensions' ),
			'name'			=> 'show_read_more',
			'description'	=> esc_html__( 'Check to show Read More.', 'techmarket-extensions' ),
			'options'		=> array( 'true' => esc_html__( 'Enable', 'techmarket-extensions' ) ),
		),
		array(
			'name'			=> 'cat_limit',
			'label'			=> esc_html__('Category Limit', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter the number of category to display.', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'cat_slugs',
			'label'			=> esc_html__('Category Slugs', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('Enter slug spearate by comma(,)', 'techmarket-extensions'),
			'admin_label'	=> true
		),
		array(
			'name'			=> 'el_class',
			'label'			=> esc_html__('Extra class name', 'techmarket-extensions'),
			'type'			=> 'text',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_team_member'] = array(
	'name' => esc_html__( 'Team Member', 'techmarket-extensions' ),
	'description' => esc_html__( 'Team Member', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Team Member Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'name'			=> 'name',
			'label'			=> esc_html__('Name', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'designation',
			'label'			=> esc_html__('Designation', 'techmarket-extensions'),
			'type'			=> 'text',
			'admin_label'	=> true
		),
		array(
			'name'			=> 'image',
			'type'			=> 'attach_image',
			'label'			=> esc_html__( 'Image', 'techmarket-extensions' ),
			'admin_label'	=> true
		)
	),
);

$shortcode_params['techmarket_terms'] = array(
	'name' => esc_html__( 'Terms', 'techmarket-extensions' ),
	'description' => esc_html__( 'Adds a shortcode for get_terms. Used to get terms including categories, product categories, etc.', 'techmarket-extensions' ),
	'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'title' => esc_html__( 'Terms Settings', 'techmarket-extensions' ),
	'is_container' => true,
	'params' => array(
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Taxonomy', 'techmarket-extensions' ),
			'name'			=> 'taxonomy',
			'description'	=> esc_html__( 'Taxonomy name, or comma-separated taxonomies, to which results should be limited.', 'techmarket-extensions' ),
			'value'			=> 'category',
			'admin_label'	=> true
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'name'			=> 'orderby',
			'description'	=> esc_html__( 'Field(s) to order terms by. Accepts term fields (\'name\', \'slug\', \'term_group\', \'term_id\', \'id\', \'description\'). Defaults to \'name\'.', 'techmarket-extensions' ),
			'value'			=> 'name'
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Order', 'techmarket-extensions' ),
			'name'			=> 'order',
			'description'	=> esc_html__( 'Whether to order terms in ascending or descending order. Accepts \'ASC\' (ascending) or \'DESC\' (descending). Default \'ASC\'.', 'techmarket-extensions' ),
			'value'			=> 'ASC'
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Hide Empty ?', 'techmarket-extensions' ),
			'name'			=> 'hide_empty',
			'description'	=> esc_html__( 'Whether to hide terms not assigned to any posts. Accepts 1 or 0. Default 0.', 'techmarket-extensions' ),
			'value'			=> '0'
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Include IDs', 'techmarket-extensions' ),
			'name'			=> 'include',
			'description'	=> esc_html__( 'Comma-separated string of term ids to include.', 'techmarket-extensions' ),
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Exclude IDs', 'techmarket-extensions' ),
			'name'			=> 'exclude',
			'description'	=> esc_html__( 'Comma-separated string of term ids to exclude. If Include is non-empty, Exclude is ignored.', 'techmarket-extensions' ),
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Number', 'techmarket-extensions' ),
			'name'			=> 'number',
			'description'	=> esc_html__( 'Maximum number of terms to return. Accepts 0 (all) or any positive number. Default 0 (all).', 'techmarket-extensions' ),
			'value'			=> '0',
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Offset', 'techmarket-extensions' ),
			'name'			=> 'offset',
			'description'	=> esc_html__( 'The number by which to offset the terms query.', 'techmarket-extensions' ),
			'value'			=> '0',
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Name', 'techmarket-extensions' ),
			'name'			=> 'name',
			'description'	=> esc_html__( 'Name or comma-separated string of names to return term(s) for.', 'techmarket-extensions' ),
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Slug', 'techmarket-extensions' ),
			'name'			=> 'slug',
			'description'	=> esc_html__( 'Slug or comma-separated string of slugs to return term(s) for.', 'techmarket-extensions' ),
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Hierarchical', 'techmarket-extensions' ),
			'name'			=> 'hierarchical',
			'description'	=> esc_html__( 'Whether to include terms that have non-empty descendants. Accepts 1 (true) or 0 (false). Default 1 (true)', 'techmarket-extensions' ),
			'value'			=> '1',
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Child Of', 'techmarket-extensions' ),
			'name'			=> 'child_of',
			'description'	=> esc_html__( 'Term ID to retrieve child terms of. If multiple taxonomies are passed, child_of is ignored. Default 0.', 'techmarket-extensions' ),
			'value'			=> '0',
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Include "Child Of" term ?', 'techmarket-extensions' ),
			'name'			=> 'include_parent',
			'description'	=> esc_html__( 'Include "Child Of" term in the terms list. Accepts 1 (yes) or 0 (no). Default 1.', 'techmarket-extensions' ),
			'value'			=> '1',
		),
		array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Parent', 'techmarket-extensions' ),
			'name'			=> 'parent',
			'description'	=> esc_html__( 'Parent term ID to retrieve direct-child terms of.', 'techmarket-extensions' ),
			'value'			=> '',
		)
	),
);

if ( class_exists( 'RevSlider' ) ) {
	$revsliders = array();
	
	$slider = new RevSlider();
	$arrSliders = $slider->getArrSliders();

	if ( $arrSliders ) {
		foreach ( $arrSliders as $slider ) {
			$revsliders[ $slider->getAlias() ] = $slider->getTitle();
		}
	} else {
		$revsliders[0] = esc_html__( 'No sliders found', 'techmarket-extensions' );
	}

	$shortcode_params['rev_slider'] = array(
		'name' => esc_html__( 'Revolution Slider', 'techmarket-extensions' ),
		'description' => esc_html__( 'Select your Revolution Slider.', 'techmarket-extensions' ),
		'category' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
		'title' => esc_html__( 'Revolution Slider Settings', 'techmarket-extensions' ),
		'is_container' => true,
		'params' => array(
			array(
				'name'			=> 'alias',
				'label'			=> esc_html__('Revolution Slider', 'techmarket-extensions' ),
				'type'			=> 'select',
				'options'		=> $revsliders,
				'admin_label'	=> true
			)
		),
	);
}

$shortcode_params = apply_filters( 'techmarket_kc_map_shortcode_params', $shortcode_params );

$kc->add_map( $shortcode_params );