<?php
/**
 * WPBakery Visual Composer Shortcodes settings
 *
 * @package techmarket
 *
 */

$shortcode_params = array();

$shortcode_params['techmarket_3_2_3_product_cards_tab_with_featured_product'] = array(
	'name'			=> esc_html__( '3-2-3 Products Cards Tabs', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_3_2_3_product_cards_tab_with_featured_product',
	'description'	=> esc_html__( '3-2-3 Products Cards Tabs', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Section Title', 'techmarket-extensions'),
			'param_name'	=> 'section_title',
			'description'	=> esc_html__('Enter section title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Default Active Tab', 'techmarket-extensions'),
			'param_name'	=> 'default_active_tab',
			'description'	=> esc_html__('Enter default active tab id.', 'techmarket-extensions'),
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'tabs',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
					'param_name'	=> 'title',
					'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'techmarket-extensions' )					=> '',
						esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
					),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
					'param_name'	=> 'orderby',
					'description'	=> esc_html__( 'Field(s) to order terms by. Accepts term fields (\'name\', \'slug\', \'term_group\', \'term_id\', \'id\', \'description\'). Defaults to \'name\'.', 'techmarket-extensions' ),
					'value'			=> 'date'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
					'param_name'	=> 'order',
					'description'	=> esc_html__( 'Whether to order terms in ascending or descending order. Accepts \'ASC\' (ascending) or \'DESC\' (descending). Default \'ASC\'.', 'techmarket-extensions' ),
					'value'			=> 'desc'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter Product IDs', 'techmarket-extensions' ),
					'description'	=> esc_html__( 'This will only for Products Shortcode', 'techmarket-extensions' ),
					'param_name'	=> 'product_id',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter Category Slug', 'techmarket-extensions' ),
					'description'	=> esc_html__( 'This will only for Product Category Shortcode', 'techmarket-extensions' ),
					'param_name'	=> 'category',
				),
			)					
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_6_1_6_tabs_with_deals'] = array(
	'name'			=> esc_html__( '6-1-6 Products Tabs with Deals', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_6_1_6_tabs_with_deals',
	'description'	=> esc_html__( '6-1-6 Products Tabs with Deals', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Section Title', 'techmarket-extensions'),
			'param_name'	=> 'section_title',
			'description'	=> esc_html__('Enter section title.', 'techmarket-extensions'),
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'tabs',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
					'param_name'	=> 'title',
					'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'techmarket-extensions' )					=> '',
						esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
					),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
					'param_name'	=> 'orderby',
					'description'	=> esc_html__( 'Field(s) to order terms by. Accepts term fields (\'name\', \'slug\', \'term_group\', \'term_id\', \'id\', \'description\'). Defaults to \'name\'.', 'techmarket-extensions' ),
					'value'			=> 'date'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
					'param_name'	=> 'order',
					'description'	=> esc_html__( 'Whether to order terms in ascending or descending order. Accepts \'ASC\' (ascending) or \'DESC\' (descending). Default \'ASC\'.', 'techmarket-extensions' ),
					'value'			=> 'desc'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter Product IDs', 'techmarket-extensions' ),
					'description'	=> esc_html__( 'This will only for Products Shortcode', 'techmarket-extensions' ),
					'param_name'	=> 'product_id',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter Category Slug', 'techmarket-extensions' ),
					'description'	=> esc_html__( 'This will only for Product Category Shortcode', 'techmarket-extensions' ),
					'param_name'	=> 'category',
				),
			)					
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_banner'] = array(
	'name'			=> esc_html__( 'Banner', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_banner',
	'description'	=> esc_html__( 'Add Banner to your page', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type' 			=> 'dropdown',
			'heading'		=> esc_html__( 'Background Choice', 'techmarket-extensions' ),
			'value' 		=> array(
				esc_html__( 'Choose', 'techmarket-extensions' )		=> '',
				esc_html__( 'Image', 'techmarket-extensions' )		=> 'image',
				esc_html__( 'Color', 'techmarket-extensions' ) 		=> 'color'
			),
			'param_name'	=> 'bg_choice',
		),
		array(
			'type' 			=> 'attach_image',
			'heading' 		=> esc_html__( 'Background Image', 'techmarket-extensions' ),
			'param_name' 	=> 'bg_image',
		),
		array(
			'type'			=> 'colorpicker',
			'heading'		=> esc_html__( 'Background Color', 'techmarket-extensions' ),
			'param_name'	=> 'bg_color',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Height', 'techmarket-extensions' ),
			'param_name'	=> 'bg_height',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Pre Title', 'techmarket-extensions' ),
			'param_name'	=> 'pre_title',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Sub Title', 'techmarket-extensions' ),
			'param_name'	=> 'sub_title',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Action Text', 'techmarket-extensions' ),
			'param_name'	=> 'action_text',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Action Link', 'techmarket-extensions' ),
			'param_name'	=> 'action_link',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Price', 'techmarket-extensions' ),
			'param_name'	=> 'price',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_banners'] = array(
	'name'			=> esc_html__( 'Banners', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_banners',
	'description'	=> esc_html__( 'Banners', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'banners',
			'params' 	 => array(
				array(
					'type' 			=> 'dropdown',
					'heading'		=> esc_html__( 'Background Choice', 'techmarket-extensions' ),
					'value' 		=> array(
						esc_html__( 'Choose', 'techmarket-extensions' )		=> '',
						esc_html__( 'Image', 'techmarket-extensions' )		=> 'image',
						esc_html__( 'Color', 'techmarket-extensions' ) 		=> 'color'
					),
					'param_name'	=> 'bg_choice',
				),
				array(
					'type' 			=> 'attach_image',
					'heading' 		=> esc_html__( 'Background Image', 'techmarket-extensions' ),
					'param_name' 	=> 'bg_image',
				),
				array(
					'type'			=> 'colorpicker',
					'heading'		=> esc_html__( 'Background Color', 'techmarket-extensions' ),
					'param_name'	=> 'bg_color',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Height', 'techmarket-extensions' ),
					'param_name'	=> 'bg_height',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Pre Title', 'techmarket-extensions' ),
					'param_name'	=> 'pre_title',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
					'param_name'	=> 'title',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Sub Title', 'techmarket-extensions' ),
					'param_name'	=> 'sub_title',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Action Text', 'techmarket-extensions' ),
					'param_name'	=> 'action_text',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Action Link', 'techmarket-extensions' ),
					'param_name'	=> 'action_link',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Price', 'techmarket-extensions' ),
					'param_name'	=> 'price',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
					'param_name'	=> 'section_class',
					'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
				)
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_brands_carousel'] = array(
	'name'			=> esc_html__( 'Brands Carousel', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_brands_carousel',
	'description'	=> esc_html__( 'Brands Carousel', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Limit', 'techmarket-extensions' ),
			'param_name'	=> 'limit',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__( 'Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'techmarket-extensions' ),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__( 'Whether to order terms in ascending or descending order. Accepts \'ASC\' (ascending) or \'DESC\' (descending). Default \'DESC\'.', 'techmarket-extensions' ),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Include', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter id spearate by comma(,)', 'techmarket-extensions'),
			'param_name'	=> 'include'
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__('Hide Empty?', 'techmarket-extensions' ),
			'description'	=> esc_html__('Check to hide empty brands.', 'techmarket-extensions'),
			'param_name'	=> 'hide_empty',
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
			'param_name'	=> 'ca_slidestoshow'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
			'param_name'	=> 'ca_slidestoscroll'
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'ca_responsive',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_breakpoint',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoshow',
					'value'			=> 1
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoscroll',
					'value'			=> 1
				),
			)
		)
	),
);

$shortcode_params['techmarket_brands'] = array(
	'name'			=> esc_html__( 'Brands', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_brands',
	'description'	=> esc_html__( 'Brands', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Limit', 'techmarket-extensions' ),
			'param_name'	=> 'limit',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__( 'Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'techmarket-extensions' ),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__( 'Whether to order terms in ascending or descending order. Accepts \'ASC\' (ascending) or \'DESC\' (descending). Default \'DESC\'.', 'techmarket-extensions' ),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Include', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter id spearate by comma(,)', 'techmarket-extensions'),
			'param_name'	=> 'include'
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__('Hide Empty?', 'techmarket-extensions' ),
			'description'	=> esc_html__('Check to hide empty brands.', 'techmarket-extensions'),
			'param_name'	=> 'hide_empty',
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_deals_cards_carousel_with_gallery'] = array(
	'name'			=> esc_html__( 'Deals Cards Carousel with Gallery', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_deals_cards_carousel_with_gallery',
	'description'	=> esc_html__( 'Deals Cards Carousel with Gallery', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'param_name'	=> 'shortcode_tag',
			'value'			=> array(
				esc_html__( 'Select', 'techmarket-extensions' )					=> '',
				esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
				esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
				esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
				esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
				esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
				esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
				esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Limit', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'param_name'	=> 'per_page'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
			'param_name'	=> 'product_id',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
			'param_name'	=> 'category',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_deals_cards_carousel'] = array(
	'name'			=> esc_html__( 'Deals Cards Carousel', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_deals_cards_carousel',
	'description'	=> esc_html__( 'Deals Cards Carousel', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'param_name'	=> 'shortcode_tag',
			'value'			=> array(
				esc_html__( 'Select', 'techmarket-extensions' )					=> '',
				esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
				esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
				esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
				esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
				esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
				esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
				esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Limit', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'param_name'	=> 'per_page'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
			'param_name'	=> 'product_id',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
			'param_name'	=> 'category',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Header Navigation?', 'techmarket-extensions' ),
			'param_name'	=> 'header_custom_nav',
			'description'	=> esc_html__( 'Check to show Header Navigation.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Header Timer?', 'techmarket-extensions' ),
			'param_name'	=> 'header_timer',
			'description'	=> esc_html__( 'Check to show Header Timer.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Timer Value', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the timer value.', 'techmarket-extensions'),
			'param_name'	=> 'timer_value',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
			'param_name'	=> 'ca_slidestoshow',
			'value'			=> 2
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
			'param_name'	=> 'ca_slidestoscroll',
			'value'			=> 2
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'ca_responsive',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_breakpoint',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoshow',
					'value'			=> 1
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoscroll',
					'value'			=> 1
				),
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_deals_carousel'] = array(
	'name'			=> esc_html__( 'Deals Carousel', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_deals_carousel',
	'description'	=> esc_html__( 'Deals Carousel', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'param_name'	=> 'shortcode_tag',
			'value'			=> array(
				esc_html__( 'Select', 'techmarket-extensions' )					=> '',
				esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
				esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
				esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
				esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
				esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
				esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
				esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Limit', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'param_name'	=> 'per_page'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
			'param_name'	=> 'product_id',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
			'param_name'	=> 'category',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Header Navigation?', 'techmarket-extensions' ),
			'param_name'	=> 'header_custom_nav',
			'description'	=> esc_html__( 'Check to show Header Timer.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_features_list'] = array(
	'name'			=> esc_html__( 'Features List', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_features_list',
	'description'	=> esc_html__( 'Add Feature List to your page.', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'features',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Icon', 'techmarket-extensions' ),
					'param_name'	=> 'icon',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Label', 'techmarket-extensions' ),
					'param_name'	=> 'label',
				)
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_fullwidth_notice'] = array(
	'name'			=> esc_html__( 'Notice', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_fullwidth_notice',
	'description'	=> esc_html__( 'Notice', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Text', 'techmarket-extensions' ),
			'param_name'	=> 'notice_info',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_jumbotron'] = array(
	'name'			=> esc_html__( 'Jumbotron', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_jumbotron',
	'description'	=> esc_html__( 'Add Jumbotron to your page.', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Title', 'techmarket-extensions'),
			'param_name'	=> 'title',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Sub Title', 'techmarket-extensions'),
			'param_name'	=> 'sub_title',
		),
		array(
			'type' 			=> 'attach_image',
			'heading' 		=> esc_html__( 'Background Image', 'techmarket-extensions' ),
			'param_name' 	=> 'image',
		)
	),
);

$shortcode_params['techmarket_media_single_banner'] = array(
	'name'			=> esc_html__( 'Media Single Banner', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_media_single_banner',
	'description' => esc_html__( 'Media Single Banner', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'section_title',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Description', 'techmarket-extensions' ),
			'param_name'	=> 'description',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Action Text', 'techmarket-extensions' ),
			'param_name'	=> 'action_text',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Action Link', 'techmarket-extensions' ),
			'param_name'	=> 'action_link',
		),
		array(
			'type' 			=> 'attach_image',
			'heading' 		=> esc_html__( 'Image', 'techmarket-extensions' ),
			'param_name' 	=> 'image',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Media Align', 'techmarket-extensions' ),
			'param_name'	=> 'media_align',
			'value'			=> array(
				esc_html__( 'Select',      'techmarket-extensions' )		=> '',
				esc_html__( 'Media Left',  'techmarket-extensions' )		=> 'media-left',
				esc_html__( 'Media Right', 'techmarket-extensions' )		=> 'media-right',
			),
		),				
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_poster'] = array(
	'name'			=> esc_html__( 'Poster', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_poster',
	'description' => esc_html__( 'Poster', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type' 			=> 'dropdown',
			'heading'		=> esc_html__( 'Background Choice', 'techmarket-extensions' ),
			'value' 		=> array(
				esc_html__( 'Choose', 'techmarket-extensions' )		=> '',
				esc_html__( 'Image', 'techmarket-extensions' )		=> 'image',
				esc_html__( 'Color', 'techmarket-extensions' ) 		=> 'color'
			),
			'description'	=> esc_html__( 'Select choice for background.', 'techmarket-extensions' ),
			'param_name'	=> 'bg_choice',
		),
		array(
			'type' 			=> 'attach_image',
			'heading' 		=> esc_html__( 'Background Image', 'techmarket-extensions' ),
			'param_name' 	=> 'bg_image',
		),
		array(
			'type'			=> 'colorpicker',
			'heading'		=> esc_html__( 'Background Color', 'techmarket-extensions' ),
			'param_name'	=> 'bg_color',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Height', 'techmarket-extensions' ),
			'param_name'	=> 'bg_height',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Pre Title', 'techmarket-extensions' ),
			'param_name'	=> 'pre_title',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Sub Title', 'techmarket-extensions' ),
			'param_name'	=> 'sub_title',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Action Text', 'techmarket-extensions' ),
			'param_name'	=> 'action_text',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Action Link', 'techmarket-extensions' ),
			'param_name'	=> 'action_link',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Condition', 'techmarket-extensions' ),
			'param_name'	=> 'condition',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_product_card_carousel_with_gallery'] = array(
	'name'			=> esc_html__( 'Products Cards Carousel with Gallery', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_product_card_carousel_with_gallery',
	'description'	=> esc_html__( 'Products Cards Carousel with Gallery', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'param_name'	=> 'shortcode_tag',
			'value'			=> array(
				esc_html__( 'Select', 'techmarket-extensions' )					=> '',
				esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
				esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
				esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
				esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
				esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
				esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
				esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Limit', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'param_name'	=> 'per_page'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
			'param_name'	=> 'product_id',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
			'param_name'	=> 'category',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_product_categories_carousel'] = array(
	'name'			=> esc_html__( 'Products Categories Carousel', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_product_categories_carousel',
	'description'	=> esc_html__( 'Products Categories Carousel', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Pre Title', 'techmarket-extensions' ),
			'param_name'	=> 'pre_title',
			'description'	=> esc_html__('Enter pre title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'section_title',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Header Navigation?', 'techmarket-extensions' ),
			'param_name'	=> 'header_custom_nav',
			'description'	=> esc_html__( 'Check to show Custom Navigation.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Limit', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'param_name'	=> 'per_page'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Button Text', 'techmarket-extensions' ),
			'param_name'	=> 'button_text',
			'description'	=> esc_html__('Enter the button text.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Button Link', 'techmarket-extensions' ),
			'param_name'	=> 'button_link',
			'description'	=> esc_html__('Enter the button link.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Include', 'techmarket-extensions' ),
			'param_name'	=> 'include',
			'description'	=> esc_html__('Enter slugs spearate by comma(,)', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__('Hide Empty?', 'techmarket-extensions' ),
			'description'	=> esc_html__( 'Check to hide empty products.', 'techmarket-extensions' ),
			'param_name'	=> 'hide_empty',
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
			'param_name'	=> 'ca_slidestoshow'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
			'param_name'	=> 'ca_slidestoscroll'
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'ca_responsive',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_breakpoint',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoshow',
					'value'			=> 1
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoscroll',
					'value'			=> 1
				),
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_product_categories_filter'] = array(
	'name'			=> esc_html__( 'Product Categories Filter', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_product_categories_filter',
	'description'	=> esc_html__( 'Product Categories Filter', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Limit', 'techmarket-extensions' ),
			'param_name'	=> 'per_page',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
			'value'			=> 8
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Columns', 'techmarket-extensions' ),
			'param_name'	=> 'columns',
			'description'	=> esc_html__('Enter the number of columns to display.', 'techmarket-extensions'),
			'value'			=> 4
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Template', 'techmarket-extensions' ),
			'param_name'	=> 'template',
			'description'	=> esc_html__('Enter template.', 'techmarket-extensions'),
			'value'			=> 'content-product-featured',					
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Category show all text', 'techmarket-extensions' ),
			'param_name'	=> 'cat_show_all_text',
			'description'	=> esc_html__('Enter Category show all option text', 'techmarket-extensions'),
			'value'			=> esc_html__( 'All Categories', 'techmarket-extensions' ),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__('Hide Empty?', 'techmarket-extensions' ),
			'description'	=> esc_html__( 'Check to hide empty categories.', 'techmarket-extensions' ),
			'param_name'	=> 'cat_hide_if_empty',
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Include', 'techmarket-extensions' ),
			'param_name'	=> 'cat_include',
			'description'	=> esc_html__('Enter category slugs spearate by comma(,)', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_product_categories_list'] = array(
	'name'			=> esc_html__( 'Products Categories List', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_product_categories_list',
	'description'	=> esc_html__( 'Products Categories List', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'section_title',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Limit', 'techmarket-extensions' ),
			'param_name'	=> 'limit',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Include', 'techmarket-extensions' ),
			'param_name'	=> 'include',
			'description'	=> esc_html__('Enter slugs spearate by comma(,)', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Parent', 'techmarket-extensions' ),
			'param_name'	=> 'parent',
			'description'	=> esc_html__('Enter parent category id. Use 0 for list first level categories only.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__('Hide Empty?', 'techmarket-extensions' ),
			'description'	=> esc_html__( 'Check to hide empty products.', 'techmarket-extensions' ),
			'param_name'	=> 'hide_empty',
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		)
	),
);

$shortcode_params['techmarket_products_cards_carousel_with_bg'] = array(
	'name'			=> esc_html__( 'Products Cards Carousel with Image', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_products_cards_carousel_with_bg',
	'description'	=> esc_html__( 'Products Cards Carousel with Image', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
			'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'param_name'	=> 'shortcode_tag',
			'value'			=> array(
				esc_html__( 'Select', 'techmarket-extensions' )					=> '',
				esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
				esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
				esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
				esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
				esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
				esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
				esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Limit', 'techmarket-extensions' ),
			'param_name'	=> 'per_page',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
			'param_name'	=> 'product_id',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
			'param_name'	=> 'category',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
		),
		array(
			'type' 			=> 'attach_image',
			'heading' 		=> esc_html__( 'Image', 'techmarket-extensions' ),
			'param_name' 	=> 'image',
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'rows', 'techmarket-extensions' ),
			'param_name' 	=> 'ca_rows',
			'value'			=> 2,
			'description'	=> esc_html__('Enter the number of rows to display.', 'techmarket-extensions'),
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'slidesPerRow', 'techmarket-extensions' ),
			'param_name' 	=> 'ca_slidesperrow',
			'value'			=> 2,
			'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
			'param_name'	=> 'ca_slidestoshow',
			'value'			=> 1,
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
			'param_name'	=> 'ca_slidestoscroll',
			'value'			=> 1,
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'ca_responsive',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_breakpoint',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'slidesPerRow', 'techmarket-extensions' ),
					'param_name' 	=> 'ca_res_slidesperrow',
					'value'			=> 1,
					'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoshow',
					'value'			=> 1
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoscroll',
					'value'			=> 1
				),
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_carousel_tabs_with_featured_product'] = array(
	'name'			=> esc_html__( 'Products Carousel Tabs with Featured Product', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_products_carousel_tabs_with_featured_product',
	'description'	=> esc_html__( 'Products Carousel Tabs with Featured Product', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Section Title', 'techmarket-extensions' ),
			'param_name'	=> 'section_title',
			'description'	=> esc_html__('Enter section title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__('Header Align', 'techmarket-extensions' ),
			'param_name'	=> 'header_nav_align',
			'value'			=> array(
				esc_html__( 'Select',   'techmarket-extensions')	=> '',
				esc_html__( 'Start', 	'techmarket-extensions')	=> 'justify-content-start',
				esc_html__( 'Center',   'techmarket-extensions')	=> 'justify-content-center',
				esc_html__( 'End', 		'techmarket-extensions')	=> 'justify-content-end'
			),
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'heading'	 => esc_html__('Tabs', 'techmarket-extensions' ),
			'param_name' => 'tabs',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
					'param_name'	=> 'title',
					'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'techmarket-extensions' )					=> '',
						esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
					),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Limit', 'techmarket-extensions' ),
					'param_name'	=> 'per_page',
					'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
					'param_name'	=> 'orderby',
					'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
					'value'			=> 'date'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
					'param_name'	=> 'order',
					'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
					'value'			=> 'desc'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Template', 'techmarket-extensions' ),
					'param_name'	=> 'template',
					'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode Featured', 'techmarket-extensions' ),
					'param_name'	=> 'featured_shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'techmarket-extensions' )					=> '',
						esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
					),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Product IDs Featured', 'techmarket-extensions' ),
					'param_name'	=> 'featured_product_id',
					'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Featured', 'techmarket-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
				)
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'rows', 'techmarket-extensions' ),
			'param_name' 	=> 'ca_rows',
			'value'			=> 2,
			'description'	=> esc_html__('Enter the number of rows to display.', 'techmarket-extensions'),
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'slidesPerRow', 'techmarket-extensions' ),
			'param_name' 	=> 'ca_slidesperrow',
			'value'			=> 6,
			'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
			'param_name'	=> 'ca_slidestoshow',
			'value'			=> 1,
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
			'param_name'	=> 'ca_slidestoscroll',
			'value'			=> 1,
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'ca_responsive',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_breakpoint',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'slidesPerRow', 'techmarket-extensions' ),
					'param_name' 	=> 'ca_res_slidesperrow',
					'value'			=> 1,
					'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoshow',
					'value'			=> 1
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoscroll',
					'value'			=> 1
				),
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_carousel_tabs'] = array(
	'name'			=> esc_html__( 'Products Carousel Tabs', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_products_carousel_tabs',
	'description'	=> esc_html__( 'Products Carousel Tabs', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Section Title', 'techmarket-extensions' ),
			'param_name'	=> 'section_title',
			'description'	=> esc_html__('Enter section title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__('Header Align', 'techmarket-extensions' ),
			'param_name'	=> 'header_nav_align',
			'value'			=> array(
				esc_html__( 'Select',   'techmarket-extensions')	=> '',
				esc_html__( 'Start', 	'techmarket-extensions')	=> 'justify-content-start',
				esc_html__( 'Center',   'techmarket-extensions')	=> 'justify-content-center',
				esc_html__( 'End', 		'techmarket-extensions')	=> 'justify-content-end'
			),
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'heading'	 => esc_html__('Tabs', 'techmarket-extensions' ),
			'param_name' => 'tabs',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
					'param_name'	=> 'title',
					'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'techmarket-extensions' )					=> '',
						esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
					),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Limit', 'techmarket-extensions' ),
					'param_name'	=> 'per_page',
					'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
					'param_name'	=> 'orderby',
					'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
					'value'			=> 'date'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
					'param_name'	=> 'order',
					'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
					'value'			=> 'desc'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Template', 'techmarket-extensions' ),
					'param_name'	=> 'template',
					'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
				),						
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'rows', 'techmarket-extensions' ),
			'param_name' 	=> 'ca_rows',
			'description'	=> esc_html__('Enter the number of rows to display.', 'techmarket-extensions'),
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'slidesPerRow', 'techmarket-extensions' ),
			'param_name' 	=> 'ca_slidesperrow',
			'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
			'param_name'	=> 'ca_slidestoshow',
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
			'param_name'	=> 'ca_slidestoscroll',
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'ca_responsive',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_breakpoint',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'slidesPerRow', 'techmarket-extensions' ),
					'param_name' 	=> 'ca_res_slidesperrow',
					'value'			=> 1,
					'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoshow',
					'value'			=> 1
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoscroll',
					'value'			=> 1
				),
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_carousel_vertical_tabs'] = array(
	'name'			=> esc_html__( 'Products Carousel Vertical Tabs', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_products_carousel_vertical_tabs',
	'description'	=> esc_html__( 'Products Carousel Vertical Tabs', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Section Title', 'techmarket-extensions' ),
			'param_name'	=> 'section_title',
			'description'	=> esc_html__('Enter section title.', 'techmarket-extensions'),
		),
		array(
			'type' 			=> 'attach_image',
			'heading' 		=> esc_html__( 'Background Image', 'techmarket-extensions' ),
			'param_name' 	=> 'bg_image',
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'heading'	 => esc_html__('Tabs', 'techmarket-extensions' ),
			'param_name' => 'tabs',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
					'param_name'	=> 'title',
					'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'techmarket-extensions' )					=> '',
						esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
					),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Limit', 'techmarket-extensions' ),
					'param_name'	=> 'per_page',
					'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
					'param_name'	=> 'orderby',
					'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
					'value'			=> 'date'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
					'param_name'	=> 'order',
					'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
					'value'			=> 'desc'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Template', 'techmarket-extensions' ),
					'param_name'	=> 'template',
					'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
				)
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
			'param_name'	=> 'ca_slidestoshow',
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
			'param_name'	=> 'ca_slidestoscroll',
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'ca_responsive',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_breakpoint',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoshow',
					'value'			=> 1
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoscroll',
					'value'			=> 1
				),
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	)
);

$shortcode_params['techmarket_products_carousel_with_bg'] = array(
	'name'			=> esc_html__( 'Products Carousel with Image', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_products_carousel_with_bg',
	'description'	=> esc_html__( 'Products Carousel with Image', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
			'description'	=> esc_html__('Enter Title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'param_name'	=> 'shortcode_tag',
			'value'			=> array(
				esc_html__( 'Select', 'techmarket-extensions' )					=> '',
				esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
				esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
				esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
				esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
				esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
				esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
				esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Limit', 'techmarket-extensions' ),
			'param_name'	=> 'per_page',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Template', 'techmarket-extensions' ),
			'param_name'	=> 'template',
			'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
			'param_name'	=> 'product_id',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
			'param_name'	=> 'category',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__('Header Timer?', 'techmarket-extensions' ),
			'description'	=> esc_html__( 'Check to show Header Timer.', 'techmarket-extensions' ),
			'param_name'	=> 'header_timer',
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Timer Value', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the timer value.', 'techmarket-extensions'),
			'param_name'	=> 'timer_value',
		),
		array(
			'type' 			=> 'attach_image',
			'heading' 		=> esc_html__( 'Image', 'techmarket-extensions' ),
			'param_name' 	=> 'image',
		),				
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'rows', 'techmarket-extensions' ),
			'param_name' 	=> 'ca_rows',
			'description'	=> esc_html__('Enter the number of rows to display.', 'techmarket-extensions'),
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'slidesPerRow', 'techmarket-extensions' ),
			'param_name' 	=> 'ca_slidesperrow',
			'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
			'param_name'	=> 'ca_slidestoshow',
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
			'param_name'	=> 'ca_slidestoscroll',
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'ca_responsive',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_breakpoint',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'slidesPerRow', 'techmarket-extensions' ),
					'param_name' 	=> 'ca_res_slidesperrow',
					'value'			=> 1,
					'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoshow',
					'value'			=> 1
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoscroll',
					'value'			=> 1
				),
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_carousel'] = array(
	'name'			=> esc_html__( 'Products Carousel', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_products_carousel',
	'description'	=> esc_html__( 'Products Carousel', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
			'description'	=> esc_html__('Enter Title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'param_name'	=> 'shortcode_tag',
			'value'			=> array(
				esc_html__( 'Select', 'techmarket-extensions' )					=> '',
				esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
				esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
				esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
				esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
				esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
				esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
				esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
			),
		),				
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Limit', 'techmarket-extensions' ),
			'param_name'	=> 'per_page',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Template', 'techmarket-extensions' ),
			'param_name'	=> 'template',
			'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
			'param_name'	=> 'product_id',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
			'param_name'	=> 'category',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Header Navigation?', 'techmarket-extensions' ),
			'param_name'	=> 'header_custom_nav',
			'description'	=> esc_html__( 'Check to show Header Navigation.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Infinite?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_infinite',
			'description'	=> esc_html__( 'Check to show Infinite Carousel.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'rows', 'techmarket-extensions' ),
			'param_name' 	=> 'ca_rows',
			'description'	=> esc_html__('Enter the number of rows to display.', 'techmarket-extensions'),
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'slidesPerRow', 'techmarket-extensions' ),
			'param_name' 	=> 'ca_slidesperrow',
			'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
			'param_name'	=> 'ca_slidestoshow',
			'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
			'param_name'	=> 'ca_slidestoscroll',
			'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Dots?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_dots',
			'description'	=> esc_html__( 'Check to show Dots.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Arrows?', 'techmarket-extensions' ),
			'param_name'	=> 'ca_arrows',
			'description'	=> esc_html__( 'Check to show Arrows.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'param_name' => 'ca_responsive',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Breakpoint', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_breakpoint',
					'description'	=> esc_html__('Enter breakpoint.', 'techmarket-extensions'),
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'slidesPerRow', 'techmarket-extensions' ),
					'param_name' 	=> 'ca_res_slidesperrow',
					'value'			=> 1,
					'description'	=> esc_html__('Enter the number of items to display in a row.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToShow', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoshow',
					'value'			=> 1
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('slidesToScroll', 'techmarket-extensions' ),
					'description'	=> esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
					'param_name'	=> 'ca_res_slidestoscroll',
					'value'			=> 1
				),
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_isotope'] = array(
	'name'			=> esc_html__( 'Products Isotope', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_products_isotope',
	'description'	=> esc_html__( 'Products Isotope', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Pre Title', 'techmarket-extensions' ),
			'param_name'	=> 'pre_title',
			'description'	=> esc_html__('Enter pre title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
			'description'	=> esc_html__('Enter Title.', 'techmarket-extensions'),
		),
		array(
			'param_name'	=> 'style',
			'heading'		=> esc_html__( 'Style', 'techmarket-extensions' ),
			'type'			=> 'dropdown',
			'value'			=> array(
				esc_html__( 'Select', 'techmarket-extensions' ) 		=> '',
				esc_html__( 'Style 1', 'techmarket-extensions' )		=> 'style-1',
				esc_html__( 'Style 2', 'techmarket-extensions' )		=> 'style-2'
			),
			'description'	=> esc_html__( 'Select style for products.', 'techmarket-extensions' ),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'param_name'	=> 'shortcode_tag',
			'value'			=> array(
				esc_html__( 'Select', 'techmarket-extensions' )					=> '',
				esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
				esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
				esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
				esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
				esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
				esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
				esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
			),
		),				
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Limit', 'techmarket-extensions' ),
			'param_name'	=> 'per_page',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
			'param_name'	=> 'product_id',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
			'param_name'	=> 'category',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Header Timer?', 'techmarket-extensions' ),
			'param_name'	=> 'header_timer',
			'description'	=> esc_html__( 'Check to show Header Timer.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Timer Title', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the timer title.', 'techmarket-extensions'),
			'param_name'	=> 'timer_title',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Timer Value', 'techmarket-extensions' ),
			'description'	=> esc_html__('Enter the timer value.', 'techmarket-extensions'),
			'param_name'	=> 'timer_value',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Action Text', 'techmarket-extensions' ),
			'param_name'	=> 'action_text',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Action Link', 'techmarket-extensions' ),
			'param_name'	=> 'action_link',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_tabs'] = array(
	'name'			=> esc_html__( 'Products Tabs', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_products_tabs',
	'description'	=> esc_html__( 'Products Tabs', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Section Title', 'techmarket-extensions' ),
			'param_name'	=> 'section_title',
			'description'	=> esc_html__('Enter section title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__('Header Align', 'techmarket-extensions' ),
			'param_name'	=> 'header_nav_align',
			'value'			=> array(
				esc_html__( 'Select',   'techmarket-extensions')	=> '',
				esc_html__( 'Start', 	'techmarket-extensions')	=> 'justify-content-start',
				esc_html__( 'Center',   'techmarket-extensions')	=> 'justify-content-center',
				esc_html__( 'End', 		'techmarket-extensions')	=> 'justify-content-end'
			),
		),
		array(
			'type' 		 => 'param_group',
			'value' 	 => '',
			'heading'	 => esc_html__('Tabs', 'techmarket-extensions' ),
			'param_name' => 'tabs',
			'params' 	 => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
					'param_name'	=> 'title',
					'description'	=> esc_html__('Enter title.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'techmarket-extensions' )					=> '',
						esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
					),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Limit', 'techmarket-extensions' ),
					'param_name'	=> 'per_page',
					'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Columns', 'techmarket-extensions' ),
					'param_name'	=> 'columns',
					'description'	=> esc_html__('Enter the number of columns to display.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
					'param_name'	=> 'orderby',
					'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
					'value'			=> 'date'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
					'param_name'	=> 'order',
					'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
					'value'			=> 'desc'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Template', 'techmarket-extensions' ),
					'param_name'	=> 'template',
					'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
				),
			)
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Action Text', 'techmarket-extensions' ),
			'param_name'	=> 'action_text',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Action Link', 'techmarket-extensions' ),
			'param_name'	=> 'action_link',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_products_with_image'] = array(
	'name'			=> esc_html__( 'Products with Image', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_products_with_image',
	'description'	=> esc_html__( 'Products with Image', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'title',
			'description'	=> esc_html__('Enter Title.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Shortcode', 'techmarket-extensions' ),
			'param_name'	=> 'shortcode_tag',
			'value'			=> array(
				esc_html__( 'Select', 'techmarket-extensions' )					=> '',
				esc_html__( 'Featured Products', 'techmarket-extensions' )		=> 'featured_products' ,
				esc_html__( 'On Sale Products', 'techmarket-extensions' )		=> 'sale_products' 	,
				esc_html__( 'Top Rated Products', 'techmarket-extensions' )		=> 'top_rated_products' ,
				esc_html__( 'Recent Products', 'techmarket-extensions' )		=> 'recent_products' 	,
				esc_html__( 'Best Selling Products', 'techmarket-extensions' )	=> 'best_selling_products',
				esc_html__( 'Products', 'techmarket-extensions' )				=> 'products' ,
				esc_html__( 'Product Category', 'techmarket-extensions' )		=> 'product_category' ,
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Limit', 'techmarket-extensions' ),
			'param_name'	=> 'per_page',
			'description'	=> esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__('Enter orderby.', 'techmarket-extensions'),
			'value'			=> 'date'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__('Enter order.', 'techmarket-extensions'),
			'value'			=> 'desc'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Columns', 'techmarket-extensions' ),
			'param_name'	=> 'columns',
			'description'	=> esc_html__('Enter the number of columns to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Template', 'techmarket-extensions' ),
			'param_name'	=> 'template',
			'description'	=> esc_html__('Enter product template Default: content-product', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Product IDs', 'techmarket-extensions' ),
			'param_name'	=> 'product_id',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Category', 'techmarket-extensions' ),
			'param_name'	=> 'category',
			'description'	=> esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions')
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Action Text', 'techmarket-extensions' ),
			'param_name'	=> 'action_text',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Action Link', 'techmarket-extensions' ),
			'param_name'	=> 'action_link',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__('Description', 'techmarket-extensions' ),
			'param_name'	=> 'description',
		),	
		array(
			'type' 			=> 'attach_image',
			'heading' 		=> esc_html__( 'Image', 'techmarket-extensions' ),
			'param_name' 	=> 'image',
		),				
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_recent_posts_with_categories'] = array(
	'name'			=> esc_html__( 'Recent Posts with Categories', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_recent_posts_with_categories',
	'description'	=> esc_html__( 'Recent Posts with Categories', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Title', 'techmarket-extensions' ),
			'param_name'	=> 'section_title',
		),				
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__( 'Description', 'techmarket-extensions' ),
			'param_name'	=> 'description',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Choice', 'techmarket-extensions' ),
			'param_name'	=> 'post_choice',
			'value'			=> array(
				esc_html__( 'Select', 'techmarket-extensions' )		=> '',
				esc_html__('Recent', 'techmarket-extensions')		=> 'recent',
				esc_html__('Random', 'techmarket-extensions')		=> 'random',
				esc_html__('Specific', 'techmarket-extensions')		=> 'specific' 						
			),
			'description'	=> esc_html__( 'Select choice for posts.', 'techmarket-extensions' ),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'IDs', 'techmarket-extensions' ),
			'param_name'	=> 'ids',
			'description'	=> esc_html__('Enter id spearate by comma(,) Note: Only works with specific choice.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Limit', 'techmarket-extensions' ),
			'param_name'	=> 'limit',
			'description'	=> esc_html__('Enter the number of posts to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Show Read More', 'techmarket-extensions' ),
			'param_name'	=> 'show_read_more',
			'description'	=> esc_html__( 'Check to show Read More.', 'techmarket-extensions' ),
			'value'			=> array(
				esc_html__( 'Enable', 'techmarket-extensions' ) => 'true'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Category Limit', 'techmarket-extensions' ),
			'param_name'	=> 'cat_limit',
			'description'	=> esc_html__('Enter the number of category to display.', 'techmarket-extensions'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Category Slugs', 'techmarket-extensions' ),
			'param_name'	=> 'cat_slugs',
			'description'	=> esc_html__('Enter slug spearate by comma(,)', 'techmarket-extensions')
		),				
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_team_member'] = array(
	'name'			=> esc_html__( 'Team Member', 'techmarket-extensions' ),
	'base'  		=> 'techmarket_team_member',
	'description'	=> esc_html__( 'Team Member', 'techmarket-extensions' ),
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'icon' 			=> '',
	'params' 		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Name', 'techmarket-extensions' ),
			'param_name'	=> 'name',
		),				
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Designation', 'techmarket-extensions' ),
			'param_name'	=> 'designation',
		),
		array(
			'type' 			=> 'attach_image',
			'heading' 		=> esc_html__( 'Image', 'techmarket-extensions' ),
			'param_name' 	=> 'image',
		),				
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Extra Class', 'techmarket-extensions' ),
			'param_name'	=> 'el_class',
			'description'	=> esc_html__('If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions')
		)
	),
);

$shortcode_params['techmarket_terms'] = array(
	'name'			=> esc_html__( 'Terms', 'techmarket-extensions' ),
	'base'			=> 'techmarket_terms',
	'description'	=> esc_html__( 'Adds a shortcode for get_terms. Used to get terms including categories, product categories, etc.', 'techmarket-extensions' ),
	'class'			=> '',
	'controls'		=> 'full',
	'icon'			=> '',
	'category'		=> esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
	'params'		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Taxonomy', 'techmarket-extensions' ),
			'param_name'	=> 'taxonomy',
			'description'	=> esc_html__( 'Taxonomy name, or comma-separated taxonomies, to which results should be limited.', 'techmarket-extensions' ),
			'value'			=> 'category',
			'holder'		=> 'div'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order By', 'techmarket-extensions' ),
			'param_name'	=> 'orderby',
			'description'	=> esc_html__( 'Field(s) to order terms by. Accepts term fields (\'name\', \'slug\', \'term_group\', \'term_id\', \'id\', \'description\'). Defaults to \'name\'.', 'techmarket-extensions' ),
			'value'			=> 'name'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Order', 'techmarket-extensions' ),
			'param_name'	=> 'order',
			'description'	=> esc_html__( 'Whether to order terms in ascending or descending order. Accepts \'ASC\' (ascending) or \'DESC\' (descending). Default \'ASC\'.', 'techmarket-extensions' ),
			'value'			=> 'ASC'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Hide Empty ?', 'techmarket-extensions' ),
			'param_name'	=> 'hide_empty',
			'description'	=> esc_html__( 'Whether to hide terms not assigned to any posts. Accepts 1 or 0. Default 0.', 'techmarket-extensions' ),
			'value'			=> '0'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Include IDs', 'techmarket-extensions' ),
			'param_name'	=> 'include',
			'description'	=> esc_html__( 'Comma-separated string of term ids to include.', 'techmarket-extensions' ),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Exclude IDs', 'techmarket-extensions' ),
			'param_name'	=> 'exclude',
			'description'	=> esc_html__( 'Comma-separated string of term ids to exclude. If Include is non-empty, Exclude is ignored.', 'techmarket-extensions' ),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Number', 'techmarket-extensions' ),
			'param_name'	=> 'number',
			'description'	=> esc_html__( 'Maximum number of terms to return. Accepts 0 (all) or any positive number. Default 0 (all).', 'techmarket-extensions' ),
			'value'			=> '0',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Offset', 'techmarket-extensions' ),
			'param_name'	=> 'offset',
			'description'	=> esc_html__( 'The number by which to offset the terms query.', 'techmarket-extensions' ),
			'value'			=> '0',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Name', 'techmarket-extensions' ),
			'param_name'	=> 'name',
			'description'	=> esc_html__( 'Name or comma-separated string of names to return term(s) for.', 'techmarket-extensions' ),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Slug', 'techmarket-extensions' ),
			'param_name'	=> 'slug',
			'description'	=> esc_html__( 'Slug or comma-separated string of slugs to return term(s) for.', 'techmarket-extensions' ),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Hierarchical', 'techmarket-extensions' ),
			'param_name'	=> 'hierarchical',
			'description'	=> esc_html__( 'Whether to include terms that have non-empty descendants. Accepts 1 (true) or 0 (false). Default 1 (true)', 'techmarket-extensions' ),
			'value'			=> '1',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Child Of', 'techmarket-extensions' ),
			'param_name'	=> 'child_of',
			'description'	=> esc_html__( 'Term ID to retrieve child terms of. If multiple taxonomies are passed, child_of is ignored. Default 0.', 'techmarket-extensions' ),
			'value'			=> '0',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Include "Child Of" term ?', 'techmarket-extensions' ),
			'param_name'	=> 'include_parent',
			'description'	=> esc_html__( 'Include "Child Of" term in the terms list. Accepts 1 (yes) or 0 (no). Default 1.', 'techmarket-extensions' ),
			'value'			=> '1',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Parent', 'techmarket-extensions' ),
			'param_name'	=> 'parent',
			'description'	=> esc_html__( 'Parent term ID to retrieve direct-child terms of.', 'techmarket-extensions' ),
			'value'			=> '',
		)
	)
);

$shortcode_params = apply_filters( 'techmarket_vc_map_shortcode_params', $shortcode_params );

if ( function_exists( 'vc_map' ) ) :

	foreach ( $shortcode_params as $key => $shortcode_param ) {
		vc_map( $shortcode_param );
	}

endif;