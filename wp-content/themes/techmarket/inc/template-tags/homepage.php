<?php
/**
 * Template functions hooked into the homepage templates
 */

if ( ! function_exists( 'techmarket_get_atts_for_shortcode' ) ) {
	function techmarket_get_atts_for_shortcode( $args ) {
		$atts = array();

		if ( isset( $args['shortcode'] ) ) {

			if ( 'product_category' == $args['shortcode'] && ! empty( $args['product_category_slug'] ) ) {

				$atts['category'] = $args['product_category_slug'];

			} elseif ( 'products' == $args['shortcode'] && ! empty( $args['products_ids_skus'] ) ) {

				$ids_or_skus 		= ! empty( $args['products_choice'] ) ? $args['products_choice'] : 'ids';
				$atts[$ids_or_skus] = $args['products_ids_skus'];
				$atts['orderby']	= 'post__in';
			}
		}

		if( isset( $args['shortcode_atts'] ) ) {
			$atts = wp_parse_args( $atts, $args['shortcode_atts'] );
		}

		return $atts;
	}
}

if ( ! function_exists( 'techmarket_get_atts_for_taxonomy_slugs' ) ) {
	function techmarket_get_atts_for_taxonomy_slugs( $args ) {
		if ( ! empty( $args['slugs'] ) ) {
			$cat_slugs = is_array( $args['slugs'] ) ? $args['slugs'] : explode( ',', $args['slugs'] );
			$cat_slugs = array_map( 'trim', $cat_slugs );
			$args['slug'] 	= $cat_slugs;

			$include = array();

			foreach ( $cat_slugs as $slug ) {
				$include[] = "'" . $slug ."'";
			}

			if ( ! empty($include ) ) {
				$args['include'] 	= $include;
				$args['orderby']	= 'include';
			}
		}

		return $args;
	}
}

if ( ! function_exists( 'techmarket_revslider' ) ) {
	/**
	 * Display Revolution Sliders
	 *
	 */
	function techmarket_revslider( $slider_name = '' ) {

		if ( ! empty( $slider_name ) && function_exists( 'putRevSlider' ) ) {
			putRevSlider( $slider_name );
		}
	}
}

if ( ! function_exists( 'techmarket_products_with_image' ) ) {
	/**
	 * Displays Products with image
	 *
	 * @return void
	 */
	function techmarket_products_with_image( $args = array() ) {

		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_products_with_image_args', array(
				'section_title'		=> '',
				'section_class'		=> '',
				'description'		=> '',
				'shortcode_tag'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'			=> 5,
					'per_page'			=> 5,
				),
				'action_text'		=> '',
				'action_link'		=> '#',
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_get_template( 'templates/home/products-with-image.php', $args );
		}
	}
}

if ( ! function_exists( 'techmarket_get_products_carousel' ) ) {
	/**
	 * Displays Products Carousel
	 *
	 * @return void
	 */
	function techmarket_get_products_carousel( $shortcode_tag = 'recent_products', $shortcode_atts = array(), $carousel_args = array() ) {

		if ( techmarket_is_woocommerce_activated() ) {

			$default_shortcode_atts	= array(
				'columns'		=> 7,
			);

			$default_carousel_args	= array(
				'infinite'			=> false,
				'slidesToShow'		=> 7,
				'dots'				=> true,
				'arrows'			=> false,
				'slidesToScroll'	=> 7
			);

			$shortcode_atts = wp_parse_args( $shortcode_atts, $default_shortcode_atts );

			$carousel_args = wp_parse_args( $carousel_args, $default_carousel_args );

			if( is_rtl() ) {
				$carousel_args['rtl'] = true;
				if( isset( $carousel_args['prevArrow'] ) && isset( $carousel_args['nextArrow'] ) ) {
					$carousel_args_temp_arrow = $carousel_args['prevArrow'];
					$carousel_args['prevArrow'] = $carousel_args['nextArrow'];
					$carousel_args['nextArrow'] = $carousel_args_temp_arrow;
				}
			}

			$carousel_args = apply_filters( 'techmarket_get_products_carousel_carousel_args', $carousel_args );

			?><div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
				<div class="container-fluid">
					<?php echo techmarket_do_shortcode( $shortcode_tag, $shortcode_atts ); ?>
				</div>
			</div><?php

		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs' ) ) {
	/**
	 * Displays Products Carousel Tabs
	 *
	 * @return void
	 */
	function techmarket_products_carousel_tabs( $args = array() ) {

		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_products_carousel_tabs_args', array(
				'section_title'	=> esc_html__( 'Hot New Arrivals', 'techmarket' ),
				'section_class'	=> 'section-hot-new-arrivals',
				'tabs' 			=> array(
					array(
						'title'				=> esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'		=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'			=> '7'
						)
					),
					array(
						'title'				=> esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_tag'		=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'			=> '7'
						)
					),
					array(
						'title'				=> esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_tag'		=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'			=> '7'
						)
					),
					array(
						'title'				=> esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'		=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'			=> '7'
						)
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> 7,
					'dots'				=> true,
					'arrows'			=> false,
					'slidesToScroll'	=> 7
				)
			) );

			$args = wp_parse_args( $args, $defaults );

			$has_atleast_one_tab = false;

			foreach( $args['tabs'] as $tab ) {
				if ( !empty( $tab['title'] ) ) {
					$has_atleast_one_tab = true;
					break;
				}
			}

			if( $has_atleast_one_tab ) {
				techmarket_get_template( 'templates/home/products-carousel-tabs.php', $args );
			}
		}
	}
}

if ( ! function_exists( 'techmarket_products_tabs' ) ) {
	/**
	 * Displays Products Tabs
	 *
	 * @return void
	 */
	function techmarket_products_tabs( $args = array() ) {

		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_products_tabs_args', array(
				'section_title'	=> esc_html__( 'Featured Products', 'techmarket' ),
				'section_class'	=> '',
				'tabs' 			=> array(
					array(
						'title'				=> esc_html__( 'All Glasses', 'techmarket' ),
						'shortcode_tag'		=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'			=> 4,
							'per_page'			=> 12,
						)
					),
					array(
						'title'				=> esc_html__( 'Sunglasses', 'techmarket' ),
						'shortcode_tag'		=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'			=> 4,
							'per_page'			=> 12
						)
					),
					array(
						'title'				=> esc_html__( 'Eyeglasses', 'techmarket' ),
						'shortcode_tag'		=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'			=> 4,
							'per_page'			=> 12
						)
					),
					array(
						'title'				=> esc_html__( 'Special Collections', 'techmarket' ),
						'shortcode_tag'		=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'			=> 4,
							'per_page'			=> 12
						)
					),
				),
				'action_link'	=> '#',
				'action_text'	=> wp_kses_post( '<i class="tm tm-free-return"></i>' . esc_html__( 'See More Products', 'techmarket' ) ),
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_get_template( 'templates/home/products-tabs.php', $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_vertical_tabs' ) ) {
	/**
	 * Displays Products Carousel Vertical Tabs
	 *
	 * @return void
	 */
	function techmarket_products_carousel_vertical_tabs( $args = array() ) {

		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_products_carousel_vertical_tabs_args', array(
				'section_title'	=> wp_kses_post( __( '<strong>Today Gadgets &amp; Mobile </strong> accessories', 'techmarket' ) ),
				'section_class'	=> '',
				'tabs' 			=> array(
					array(
						'title'				=> esc_html__( 'Desktop PCs', 'techmarket' ),
						'shortcode_tag'		=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'			=> '6'
						)
					),
					array(
						'title'				=> esc_html__( 'Ultrabooks', 'techmarket' ),
						'shortcode_tag'		=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'			=> '6'
						)
					),
					array(
						'title'				=> esc_html__( 'Smartphones', 'techmarket' ),
						'shortcode_tag'		=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'			=> '6'
						)
					),
					array(
						'title'				=> esc_html__( 'Internet Cams', 'techmarket' ),
						'shortcode_tag'		=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'			=> '6'
						)
					),
					array(
						'title'				=> esc_html__( 'Accessories', 'techmarket' ),
						'shortcode_tag'		=> 'best_selling_products',
						'shortcode_atts'	=> array(
							'columns'			=> '6'
						)
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> 6,
					'dots'				=> true,
					'arrows'			=> false,
					'slidesToScroll'	=> 6
				)
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_get_template( 'templates/home/products-carousel-vertical-tabs.php', $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_with_featured_product' ) ) {
	/**
	 * Displays Products Carousel Tabs with Featured Product
	 *
	 * @return void
	 */
	function techmarket_products_carousel_tabs_with_featured_product( $args = array() ) {

		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_products_carousel_tabs_with_featured_product_args', array(
				'section_title'	=> esc_html__( 'Hot New Arrivals', 'techmarket' ),
				'section_class'	=> '',
				'tabs' 			=> array(
					array(
						'title'				=> esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'		=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'			=> '7'
						)
					),
					array(
						'title'				=> esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_tag'		=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'			=> '7'
						)
					),
					array(
						'title'				=> esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_tag'		=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'			=> '7'
						)
					),
					array(
						'title'				=> esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'		=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'			=> '7'
						)
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> 7,
					'dots'				=> true,
					'arrows'			=> false,
					'slidesToScroll'	=> 7
				)
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_get_template( 'templates/home/products-carousel-tabs-with-featured-product.php', $args );
		}
	}
}

if ( ! function_exists( 'techmarket_deals_carousel' ) ) {
	/**
	 * Displays Deals Carousel
	 */
	function techmarket_deals_carousel( $args = array() ) {
		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_deals_carousel_args', array(
				'section_title'		=> wp_kses_post( __( '<strong>Deals</strong> of the week', 'techmarket' ) ),
				'section_class'		=> '',
				'header_custom_nav'	=> true,
				'shortcode_tag'		=> 'sale_products',
				'shortcode_atts'	=> array(
					'per_page'			=> 4,
				),
				'carousel_args'		=> array(
					'slidesToShow'		=> 1,
					'slidesToScroll'	=> 1,
					'dots'				=> false,
					'arrows'			=> true,
					'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_get_template( 'templates/home/deals-carousel.php', $args );
		}
	}
}

if ( ! function_exists( 'techmarket_deals_cards_carousel' ) ) {
	/**
	 * Displays Deals Cards Carousel
	 */
	function techmarket_deals_cards_carousel( $args = array() ) {
		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_deals_cards_carousel_args', array(
				'section_title'		=> wp_kses_post( __( '<strong>Daily deals!</strong> Get our best prices.', 'techmarket' ) ),
				'section_class'		=> '',
				'header_custom_nav'	=> true,
				'header_timer'		=> true,
				'timer_value'		=> '',
				'shortcode_tag'		=> 'sale_products',
				'shortcode_atts'	=> array(
					'columns'			=> 2,
					'per_page'			=> 4,
				),
				'carousel_args'		=> array(
					'slidesToShow'		=> 2,
					'slidesToScroll'	=> 2,
					'dots'				=> true,
					'arrows'			=> true,
					'prevArrow'			=> is_rtl() ? '<a href="#" class="slider-next">' . esc_html__( 'Next deal', 'techmarket' ) . '<i class="tm tm-arrow-left"></i></a>' : '<a href="#" class="slider-prev"><i class="tm tm-arrow-left"></i>' . esc_html__( 'Previous deal', 'techmarket' ) . '</a>',
					'nextArrow'			=> is_rtl() ? '<a href="#" class="slider-prev"><i class="tm tm-arrow-right"></i>' . esc_html__( 'Previous deal', 'techmarket' ) . '</a>' : '<a href="#" class="slider-next">' . esc_html__( 'Next deal', 'techmarket' ) . '<i class="tm tm-arrow-right"></i></a>'
				)
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_get_template( 'templates/home/deals-carousel-v2.php', $args );
		}
	}
}

if ( ! function_exists( 'techmarket_deals_cards_carousel_with_gallery' ) ) {
	/**
	 * Displays Deals Carousel with Gallery
	 */
	function techmarket_deals_cards_carousel_with_gallery( $args = array() ) {
		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_deals_cards_carousel_with_gallery_args', array(
				'section_class'		=> '',
				'shortcode_tag'		=> 'sale_products',
				'shortcode_atts'	=> array(
					'per_page'			=> 8,
				),
				'carousel_args'		=> array(
					'infinite'			=> false,
					'slidesToShow'		=> 1,
					'slidesToScroll'	=> 1,
					'dots'				=> false,
					'arrows'			=> true,
					'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_get_template( 'templates/home/deals-carousel-v3.php', $args );
		}
	}
}

if ( ! function_exists( 'techmarket_product_categories_carousel' ) ) {
	/**
	 * Displays Products Carousel
	 *
	 * @return void
	 */
	function techmarket_product_categories_carousel( $section_args = array(), $category_args = array(), $carousel_args = array() ) {

		if ( techmarket_is_woocommerce_activated() ) {

			$default_section_args	= array(
				'section_title'		=> wp_kses_post( __( 'Top categories <br>this week', 'techmarket' ) ),
			);

			$default_category_args	= array(
				'number'		=> 12,
				'columns'		=> 5,
			);

			$default_carousel_args	= array(
				'infinite'			=> false,
				'slidesToShow'		=> 5,
				'dots'				=> false,
				'arrows'			=> true,
				'slidesToScroll'	=> 5
			);

			$section_args = wp_parse_args( $section_args, $default_section_args );

			$category_args = wp_parse_args( $category_args, $default_category_args );

			$carousel_args = wp_parse_args( $carousel_args, $default_carousel_args );

			techmarket_get_template( 'home/product-categories-carousel.php', array( 'category_args' => $category_args, 'section_args' => $section_args, 'carousel_args' => $carousel_args ) );

		}
	}
}

if ( ! function_exists( 'techmarket_product_categories_filter' ) ) {
	/**
	 * Displays Products Categories Filter
	 *
	 * @return void
	 */
	function techmarket_product_categories_filter( $args = array() ) {

		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_product_categories_filter_args', array(
				'category_args'		=> array(
					'show_option_all' 	=> esc_html__( 'All Categories', 'techmarket' ),
					'taxonomy' 			=> 'product_cat',
					'hide_if_empty'		=> 1,
					'value_field'		=> 'slug',
					'class'				=> 'categories-dropdown'
				),
				'shortcode_atts'	=> array(
					'columns'			=> '4',
					'per_page'			=> '8',
				),
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_get_template( 'home/product-categories-filter.php', $args );

		}
	}
}

if ( ! function_exists( 'techmarket_product_card_carousel_with_gallery' ) ) {
	/**
	 * Displays Products Carousel
	 */
	function techmarket_product_card_carousel_with_gallery( $args = array() ) {
		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_product_card_carousel_with_gallery_args', array(
				'pre_title'			=> esc_html__( 'Featured Product', 'techmarket' ),
				'section_title'		=> sprintf( '<strong>%s</strong><br>%s', esc_html__( 'The features you want,', 'techmarket' ), esc_html__( 'all in one place', 'techmarket' ) ),
				'section_class'		=> '',
				'shortcode_tag'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'per_page'			=> 8,
				),
				'carousel_args'		=> array(
					'infinite'			=> false,
					'slidesToShow'		=> 1,
					'slidesToScroll'	=> 1,
					'dots'				=> false,
					'arrows'			=> true,
					'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_get_template( 'templates/home/product-card-carousel-with-gallery.php', $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel' ) ) {
	/**
	 * Displays Products Carousel
	 */
	function techmarket_products_carousel( $args = array() ) {
		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_products_carousel_args', array(
				'section_title'		=> esc_html__( 'Recently viewed products', 'techmarket' ),
				'section_class'		=> '',
				'header_custom_nav'	=> true,
				'shortcode_tag'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'			=> '5',
				),
				'carousel_args'		=> array(
					'infinite'			=> false,
					'slidesToShow'		=> 5,
					'slidesToScroll'	=> 2,
					'dots'				=> true,
					'arrows'			=> true,
					'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_get_template( 'templates/home/products-carousel.php', $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_with_bg' ) ) {
	/**
	 * Displays Products Carousel with background
	 */
	function techmarket_products_carousel_with_bg( $args = array() ) {
		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_products_carousel_with_bg_args', array(
				'section_title'		=> wp_kses_post( __( 'Make <br>dreams <br><span>your reality</span>', 'techmarket' ) ),
				'section_class'		=> '',
				'shortcode_tag'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'			=> '7',
					'per_page'			=> '14',
				),
				'carousel_args'		=> array(
					'infinite'			=> false,
					'slidesToShow'		=> 7,
					'slidesToScroll'	=> 7,
					'dots'				=> true,
					'arrows'			=> false
				)
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_get_template( 'home/products-carousel-with-bg.php', $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_cards_carousel_with_bg' ) ) {
	/**
	 * Displays Products Cards Carousel with background
	 */
	function techmarket_products_cards_carousel_with_bg( $args = array() ) {
		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_products_cards_carousel_with_bg_args', array(
				'section_title'		=> wp_kses_post( __( '<strong>Power Audio &amp; Visual </strong>entertainment', 'techmarket' ) ),
				'section_class'		=> '',
				'shortcode_tag'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'			=> '2',
					'per_page'			=> '12',
					'template'			=> 'content-landscape-product-card',
				),
				'carousel_args'		=> array(
					'infinite'			=> false,
					'rows'				=> 2,
					'slidesPerRow'		=> 2,
					'slidesToShow'		=> 1,
					'slidesToScroll'	=> 1,
					'dots'				=> true,
					'arrows'			=> false
				)
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_get_template( 'home/product-cards-carousel-with-bg.php', $args );
		}
	}
}

if ( ! function_exists( 'techmarket_brands_carousel' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel( $section_args = array(), $taxonomy_args = array(), $carousel_args = array() ) {

		if( techmarket_is_woocommerce_activated() ) {

			$default_section_args = array(
				'section_title'	=> ''
			);

			$default_taxonomy_args = array(
				'orderby'		=> 'title',
				'order'			=> 'ASC',
				'number'		=> 12,
				'hide_empty'	=> false
			);

			$default_carousel_args 	= array(
				'infinite'		=> false,
				'slidesToShow'	=> 6,
				'slidesToScroll'=> 6,
				'dots'			=> false,
				'arrows'		=> true
			);

			$section_args 		= wp_parse_args( $section_args, $default_section_args );
			$taxonomy_args 		= wp_parse_args( $taxonomy_args, $default_taxonomy_args );
			$carousel_args 		= wp_parse_args( $carousel_args, $default_carousel_args );

			$brand_taxonomy = techmarket_get_brand_taxonomy();

			if( ! empty( $brand_taxonomy ) ) {

				$terms = get_terms( $brand_taxonomy, $taxonomy_args );

				if( ! is_wp_error( $terms ) && !empty( $terms ) ) {
					techmarket_get_template( 'sections/brands-carousel.php', array( 'terms' => $terms, 'section_args' => $section_args, 'carousel_args' => $carousel_args ) );
				}
			}
		}
	}
}

if ( ! function_exists( 'techmarket_brands' ) ) {
	/**
	 * Display brands
	 *
	 */
	function techmarket_brands( $section_args = array(), $taxonomy_args = array() ) {

		if( techmarket_is_woocommerce_activated() ) {

			$default_section_args = array(
				'section_title'	=> esc_html__( 'Featured Brands', 'techmarket' ),
			);

			$default_taxonomy_args = array(
				'orderby'		=> 'title',
				'order'			=> 'ASC',
				'number'		=> 12,
				'hide_empty'	=> false
			);

			$section_args 		= wp_parse_args( $section_args, $default_section_args );
			$taxonomy_args 		= wp_parse_args( $taxonomy_args, $default_taxonomy_args );

			$brand_taxonomy = techmarket_get_brand_taxonomy();

			if( ! empty( $brand_taxonomy ) ) {

				$terms = get_terms( $brand_taxonomy, $taxonomy_args );

				if( ! is_wp_error( $terms ) && !empty( $terms ) ) {
					techmarket_get_template( 'sections/brands.php', array( 'terms' => $terms, 'section_args' => $section_args ) );
				}
			}
		}
	}
}

if ( ! function_exists( 'techmarket_features_list' ) ) {
	/**
	 * Display Features list
	 */
	function techmarket_features_list( $args = array() ) {

		$defaults =  array(
			'features' 		=> array(),
		);

		$args = wp_parse_args( $args, $defaults );
		techmarket_get_template( 'home/features-list.php', $args );
	}
}

if ( ! function_exists( 'techmarket_fullwidth_notice' ) ) {
	function techmarket_fullwidth_notice( $args = array() ) {

		$defaults = apply_filters( 'techmarket_fullwidth_notice_args', array(
			'animation' 		=> '',
			'section_class'		=> '',
			'notice_info'		=> esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
		) );

		$args = wp_parse_args( $args, $defaults );
		$section_class = empty( $args['section_class'] ) ? 'fullwidth-notice' : 'fullwidth-notice ' . $args['section_class'];
		?>
		<div class="<?php echo esc_attr( $section_class ); ?>" <?php if ( !empty( $args['animation'] ) ) : ?>data-animation="<?php echo esc_attr( $args['animation'] );?>"<?php endif; ?>>
			<div class="col-full">
				<p class="message"><?php echo wp_kses_post( $args['notice_info'] ); ?></p>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'techmarket_6_1_6_tabs_with_deals' ) ) {
	function techmarket_6_1_6_tabs_with_deals( $args = array() ) {

		$defaults = apply_filters( 'techmarket_6_1_6_tabs_with_deals_args', array(
			'section_title'	=> wp_kses_post( __( 'Daily Deals! <span>Get our best prices.</span>', 'techmarket' ) ),
			'tabs' 			=> array(
				array(
					'title'				=> '-30%',
					'shortcode_tag'		=> 'recent_products',
					'shortcode_atts'	=> array()
				),
				array(
					'title'				=> '-50%',
					'shortcode_tag'		=> 'sale_products',
					'shortcode_atts'	=> array()
				),
				array(
					'title'				=> '-70%',
					'shortcode_tag'		=> 'featured_products',
					'shortcode_atts'	=> array()
				),
			),
		) );

		$args = wp_parse_args( $args, $defaults );

		techmarket_get_template( '/templates/home/6-1-6-tabs-with-deals.php', $args );
	}
}

if ( ! function_exists( 'techmarket_3_2_3_product_cards_tab_with_featured_product' ) ) {
	function techmarket_3_2_3_product_cards_tab_with_featured_product( $args = array() ) {

		$defaults = apply_filters( 'techmarket_3_2_3_product_cards_tab_with_featured_product_args', array(
			'section_title'	=> wp_kses_post( __('Hurry up! <span>Special Offers</span>', 'techmarket' ) ),
			'tabs' 			=> array(
				array(
					'title'				=> esc_html__( 'Cameras', 'techmarket' ),
					'shortcode_tag'		=> 'recent_products',
					'shortcode_atts'	=> array()
				),
				array(
					'title'				=> esc_html__( 'Audio', 'techmarket' ),
					'shortcode_tag'		=> 'featured_products',
					'shortcode_atts'	=> array()
				),
				array(
					'title'				=> esc_html__( 'GPS &amp; Navigation', 'techmarket' ),
					'shortcode_tag'		=> 'sale_products',
					'shortcode_atts'	=> array()
				),
				array(
					'title'				=> esc_html__( 'TV &amp; Video', 'techmarket' ),
					'shortcode_tag'		=> 'top_rated_products',
					'shortcode_atts'	=> array()
				),
				array(
					'title'				=> esc_html__( 'Cell Phones', 'techmarket' ),
					'shortcode_tag'		=> 'best_selling_products',
					'shortcode_atts'	=> array()
				),
				array(
					'title'				=> esc_html__( 'Computers', 'techmarket' ),
					'shortcode_tag'		=> 'recent_products',
					'shortcode_atts'	=> array()
				),
				array(
					'title'				=> esc_html__( 'Accessories', 'techmarket' ),
					'shortcode_tag'		=> 'sale_products',
					'shortcode_atts'	=> array()
				),
			),
		) );

		$args = wp_parse_args( $args, $defaults );

		techmarket_get_template( 'home/3-2-3-product-cards-tab-with-featured-product.php', $args );
	}
}

if ( ! function_exists( 'techmarket_products_isotope' ) ) {
	function techmarket_products_isotope( $args = array() ) {

		if ( techmarket_is_woocommerce_activated() ) {

			$defaults = apply_filters( 'techmarket_products_isotope_args', array(
				'section_class'		=> '',
				'animation'			=> '',
				'pre_title'			=> '',
				'section_title'		=> '',
				'header_timer'		=> true,
				'timer_title'		=> esc_html__( 'Hurry up! Offers ends in:', 'techmarket' ),
				'timer_value'		=> '',
				'shortcode_tag'		=> 'recent_products',
				'shortcode_atts'	=> array(),
			) );

			$args = wp_parse_args( $args, $defaults );

			if( isset( $args['style'] ) && $args['style'] == 'style-2' ) {
				$args['shortcode_atts']['per_page'] = 14;
				techmarket_get_template( 'home/products-isotope-alt.php', $args );
			} else {
				$args['shortcode_atts']['per_page'] = 13;
				techmarket_get_template( 'home/products-isotope.php', $args );
			}
		}
	}
}

if ( ! function_exists( 'techmarket_poster' ) ) {
	/**
	 * Display Poster
	 */
	function techmarket_poster( $args = array() ) {
		$defaults = apply_filters( 'techmarket_poster_args', array(
			'section_class'	=> '',
			'title'			=> '',
			'sub_title'		=> '',
			'action_text'	=> '',
			'action_link'	=> '#',
			'condition'		=> '',
			'bg_image'		=> array( '//placehold.it/260x705', '260', '705' )
		) );

		$args = wp_parse_args( $args, $defaults );
		techmarket_get_template( 'home/poster.php', $args );
	}
}

if ( ! function_exists( 'techmarket_banner' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_banner( $args = array() ) {
		$defaults = apply_filters( 'techmarket_banner_args', array(
			'section_class'	=> '',
			'title'			=> wp_kses_post( __( 'New Arrivals<br> in <strong>Accessories</strong> <br> at Best Prices.', 'techmarket' ) ),
			'sub_title'		=> '',
			'action_text'	=> '',
			'action_link'	=> '#',
			'bg_image'		=> array( '//placehold.it/1740x236', '1740', '236' )
		) );

		$args = wp_parse_args( $args, $defaults );
		techmarket_get_template( 'home/banner.php', $args );
	}
}

if ( ! function_exists( 'techmarket_banners' ) ) {
	/**
	 * Display Banners
	 */
	function techmarket_banners( $args = array() ) {
		$defaults = apply_filters( 'techmarket_banners_args', array(
			'banners'		=> array(
				array(
					'title'			=> wp_kses_post( __( 'New Arrivals<br> in <strong>Accessories</strong> <br> at Best Prices.', 'techmarket' ) ),
					'action_text'	=> esc_html__( 'View all', 'techmarket' ),
					'action_link'	=> '#',
					'bg_image'		=> array( '//placehold.it/420x259', '420', '259' ),
					'section_class'	=> 'small-banner text-in-left',
				),
				array(
					'title'			=> wp_kses_post( __( 'Catch Hottest<br> <strong>Deals</strong> on the <br> Curved Soundbars.', 'techmarket' ) ),
					'action_text'	=> esc_html__( 'Browse', 'techmarket' ),
					'action_link'	=> '#',
					'bg_image'		=> array( '//placehold.it/860x259', '860', '259' ),
					'section_class'	=> 'large-banner text-in-right',
				),
				array(
					'title'			=> wp_kses_post( __( '<strong>1000 mAh</strong> <br> Power Bank Pro', 'techmarket' ) ),
					'price'			=> '$34.99',
					'action_text'	=> esc_html__( 'Buy Now', 'techmarket' ),
					'action_link'	=> '#',
					'bg_image'		=> array( '//placehold.it/420x259', '420', '259' ),
					'section_class'	=> 'small-banner text-in-left',
				)
			)
		) );

		$args = wp_parse_args( $args, $defaults );
		$section_class = empty( $args['section_class'] ) ? 'banners' : 'banners ' . $args['section_class'];
		?>
		<div class="<?php echo esc_attr( $section_class ); ?>">
			<div class="row">
				<?php foreach ( $args['banners'] as $key => $banner ) {
					techmarket_banner( $banner );
				} ?>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'techmarket_recent_posts_with_categories' ) ) {
	/**
	 * Display Posts
	 */
	function techmarket_recent_posts_with_categories( $args = array() ) {

		$defaults = apply_filters( 'techmarket_recent_posts_with_categories_args', array(
			'section_class'		=> '',
			'animation'			=> '',
			'section_title'		=> '',
			'description'		=> '',
			'category_args'		=> array(
				'number'			=> 4,
				'slugs'				=> '',
			),
			'limit'				=> 6,
			'post_choice'		=> 'recent',
			'post_id'			=> '',
			'show_read_more'	=> true,
			'show_comment_link'	=> false,
		) );

		$args 	= wp_parse_args( $args, $defaults );
		techmarket_get_template( 'home/recent-posts-with-categories.php', $args );
	}
}

if ( ! function_exists( 'techmarket_media_single_banner' ) ) {
	/**
	 * Display Media Single Banner
	 */
	function techmarket_media_single_banner( $args = array() ) {
		$defaults = apply_filters( 'techmarket_media_single_banner_args', array(
			'section_class'	=> '',
			'section_title'	=> '',
			'description'	=> '',
			'action_text'	=> '',
			'action_link'	=> '#',
			'image'			=> array( '//placehold.it/840x620', '840', '620' )
		) );

		$args = wp_parse_args( $args, $defaults );
		techmarket_get_template( 'home/media-single-banner.php', $args );
	}
}

if ( ! function_exists( 'techmarket_product_categories_list' ) ) {
	/**
	 *
	 */
	function techmarket_product_categories_list( $args = array() ) {

		$default_args = apply_filters( 'techmarket_product_categories_list_args', array(
			'section_title'			=> '',
			'section_class'			=> '',
			'category_args'			=> array(
				'orderby'				=> 'name',
				'order'					=> 'ASC',
				'hide_empty'			=> true,
				'number'				=> 8,
				'hierarchical'			=> false,
				'slugs'					=> '',
			),
			'child_category_args'	=> array(
				'echo' 					=> false,
				'title_li' 				=> '',
				'show_option_none' 		=> '',
				'number' 				=> 6,
				'depth'					=> 1,
				'hide_empty'			=> false
			)
		) );

		$args = wp_parse_args( $args, $default_args );

		techmarket_get_template( 'templates/home/product-categories-list.php', $args );

	}
}


if ( ! function_exists( 'techmarket_team_member' ) ) {
	/**
	 * Display Team Member
	 */
	function techmarket_team_member( $args = array() ) {

		$defaults = apply_filters( 'techmarket_team_member_args', array(
			'name'			=> '',
			'designation'	=> '',
			'image'			=> array( '//placehold.it/290x301', '290', '301' )
		) );

		$args = wp_parse_args( $args, $defaults );

		techmarket_get_template( 'home/team-member.php', $args );
	}
}

if ( ! function_exists( 'techmarket_jumbotron' ) ) {
	function techmarket_jumbotron( $args = array() ) {
		techmarket_get_template( 'sections/jumbotron.php', $args );
	}
}
