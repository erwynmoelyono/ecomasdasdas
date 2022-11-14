<?php
/**
 * WooCommerce Template Functions.
 *
 * @package techmarket
 */

if ( ! function_exists( 'techmarket_before_content' ) ) {
	/**
	 * Before Content
	 * Wraps all WooCommerce content in wrappers which match the theme markup
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function techmarket_before_content() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
		<?php
	}
}

if ( ! function_exists( 'techmarket_after_content' ) ) {
	/**
	 * After Content
	 * Closes the wrapping divs
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function techmarket_after_content() {
		?>
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php do_action( 'techmarket_sidebar' );
	}
}

if ( ! function_exists( 'techmarket_wc_reset_loop' ) ) {
	/**
	 * Reset the loop's template when we're done outputting a product loop.
	 * @return void
	 */
	function techmarket_wc_reset_loop() {
		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '<' ) ) {
			global $woocommerce_loop;
			$woocommerce_loop['template'] = '';
		} else {
			wc_reset_loop();
		}
	}
}

if( ! function_exists( 'techmarket_get_product_attr_taxonomies' ) ) {
	/**
	 * Get All Product Attribute Taxonomies
	 *
	 * @return array
	 */
	function techmarket_get_product_attr_taxonomies() {

		$product_taxonomies 	= array();
		$attribute_taxonomies 	= wc_get_attribute_taxonomies();

		if ( $attribute_taxonomies ) {
			foreach ( $attribute_taxonomies as $tax ) {
				$product_taxonomies[wc_attribute_taxonomy_name( $tax->attribute_name )] = $tax->attribute_label;
			}
		}

		return $product_taxonomies;
	}
}

if ( ! function_exists( 'techmarket_get_brand_taxonomy' ) ) {
	/**
	 * Products Brand Taxonomy
	 *
	 * @return string
	 */
	function techmarket_get_brand_taxonomy() {
		return apply_filters( 'techmarket_product_brand_taxonomy', '' );
	}
}

if ( ! function_exists( 'techmarket_get_brand_attr' ) ) {
	function techmarket_get_brand_attr() {

		$brand_taxonomy = techmarket_get_brand_taxonomy();
		return apply_filters( 'techmarket_product_brand_attr', str_replace( 'pa_', '', $brand_taxonomy ) );
	}
}

if ( ! function_exists( 'techmarket_get_label_taxonomy' ) ) {
	/**
	 * Products Label Taxonomy
	 *
	 * @return string
	 */
	function techmarket_get_label_taxonomy() {
		return apply_filters( 'techmarket_product_label_taxonomy', '' );
	}
}

if ( ! function_exists( 'techmarket_get_label_attr' ) ) {
	function techmarket_get_label_attr() {

		$label_taxonomy = techmarket_get_label_taxonomy();
		return apply_filters( 'techmarket_product_label_attr', str_replace( 'pa_', '', $label_taxonomy ) );
	}
}

if ( ! function_exists( 'techmarket_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments
	 * Ensure cart contents update when products are added to the cart via AJAX
	 *
	 * @param  array $fragments Fragments to refresh via AJAX.
	 * @return array            Fragments to refresh via AJAX
	 */
	function techmarket_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();
		techmarket_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		ob_start();
		techmarket_handheld_header_cart_link();
		$fragments['a.handheld-header-cart-link'] = ob_get_clean();

		return $fragments;
	}
}

if ( ! function_exists( 'techmarket_cart_link' ) ) {
	/**
	 * Cart Link
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function techmarket_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" data-toggle="dropdown" title="<?php esc_attr_e( 'View your shopping cart', 'techmarket' ); ?>">
			<i class="header-cart-icon <?php echo esc_attr( apply_filters( 'techmarket_header_cart_icon', 'tm tm-shopping-bag' ) ); ?>"></i>
			<span class="count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?></span>
			<span class="amount"><span class="price-label"><?php echo apply_filters( 'techmarket_header_cart_link_label', esc_html__( 'Your Cart', 'techmarket' ) ); ?></span><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'techmarket_product_search' ) ) {
	/**
	 * Display Product Search
	 *
	 * @since  1.0.0
	 * @uses  techmarket_is_woocommerce_activated() check if WooCommerce is activated
	 * @return void
	 */
	function techmarket_product_search() {
		if ( techmarket_is_woocommerce_activated() ) { ?>
			<div class="site-search">
				<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
			</div>
		<?php
		}
	}
}

if ( ! function_exists( 'techmarket_header_compare' ) ) {
	/**
	 * Displays a link to compare page in header
	 */
	function techmarket_header_compare() {
		if( function_exists( 'techmarket_get_compare_page_url' ) ) {
			global $yith_woocompare;
			?>
			<ul class="header-compare nav navbar-nav">
				<li class="nav-item">
					<a href="<?php echo esc_attr( techmarket_get_compare_page_url() ); ?>" class="nav-link"><i class="tm-compare-icon <?php echo esc_attr( apply_filters( 'techmarket_compare_icon', 'tm tm-compare' ) ); ?>"></i><span id="top-cart-compare-count" class="tm-woocompare-ajax-count value"><?php echo count( $yith_woocompare->obj->products_list ); ?></span></a>
				</li>
			</ul>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_header_wishlist' ) ) {
	/**
	 * Displays a link to wishlist page in header
	 */
	function techmarket_header_wishlist() {
		if( function_exists( 'techmarket_get_wishlist_url' ) ) {
			?>
			<ul class="header-wishlist nav navbar-nav">
				<li class="nav-item">
					<a href="<?php echo esc_attr( techmarket_get_wishlist_url() ); ?>" class="nav-link"><i class="tm-wishlist-icon <?php echo esc_attr( apply_filters( 'techmarket_wishlist_icon', 'tm tm-favorites' ) ); ?>"></i><span id="top-cart-wishlist-count" class="tm-wcwl-ajax-count value"><?php echo yith_wcwl_count_products(); ?></span></a>
				</li>
			</ul>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_header_cart' ) ) {
	/**
	 * Display Header Cart
	 *
	 * @since  1.0.0
	 * @uses  techmarket_is_woocommerce_activated() check if WooCommerce is activated
	 * @return void
	 */
	function techmarket_header_cart() {
		if( techmarket_get_shop_catalog_mode() == false ) {
			if ( techmarket_is_woocommerce_activated() ) {
				$class = 'animate-dropdown dropdown ';
			}
			?>
			<ul id="site-header-cart" class="site-header-cart menu">
				<li class="<?php echo esc_attr( $class ); ?>">
					<?php techmarket_cart_link(); ?>
					<ul class="dropdown-menu dropdown-menu-mini-cart">
						<li>
							<div class="widget_shopping_cart_content">
						  		<?php woocommerce_mini_cart(); ?>
							</div>
						</li>
					</ul>
				</li>
			</ul>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_upsell_display' ) ) {
	/**
	 * Upsells
	 * Replace the default upsell function with our own which displays the correct number product columns
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function techmarket_upsell_display() {

		global $product;

		$upsell_products_args = apply_filters( 'techmarket_upsell_products_args', array(
			'columns' 			=> 7,
			'orderby' 			=> 'rand',
			'order'				=> 'desc',
		) );

		$upsells = $product->get_upsell_ids();

		if ( ! $upsells ) {
			return;
		}

		$carousel_args	= apply_filters( 'techmarket_upsell_products_carousel_args', array(
			'infinite'			=> false,
			'slidesToShow'		=> 7,
			'slidesToScroll'	=> 7,
			'dots'				=> true,
			'arrows'			=> true,
			'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
			'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>',
			'responsive'		=> array(
				array(
					'breakpoint'	=> 767,
					'settings'		=> array(
						'slidesToShow'		=> 2,
						'slidesToScroll'	=> 2
					)
				),
				array(
					'breakpoint'	=> 780,
					'settings'		=> array(
						'slidesToShow'		=> 3,
						'slidesToScroll'	=> 3
					)
				),
				array(
					'breakpoint'	=> 1200,
					'settings'		=> array(
						'slidesToShow'		=> 4,
						'slidesToScroll'	=> 4
					)
				),
				array(
					'breakpoint'	=> 1600,
					'settings'		=> array(
						'slidesToShow'		=> 5,
						'slidesToScroll'	=> 5
					)
				)
			)
		) );

		$args = apply_filters( 'techmarket_wc_upsell_display_args', array(
			'shortcode_tag'		=> 'products',
			'shortcode_atts'	=> array(
				'columns'			=> $upsell_products_args['columns'],
				'orderby' 			=> $upsell_products_args['orderby'],
				'order'				=> $upsell_products_args['order'],
				'ids'				=> implode( ',', $upsells ),
			),
			'carousel_args'		=> $carousel_args
		) );

		techmarket_get_template( '/templates/shop/single-product/up-sells.php', $args );
	}
}

if ( ! function_exists( 'techmarket_related_display' ) ) {
	/**
	 * Related
	 * Replace the default related function with our own which displays the correct number product columns
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function techmarket_related_display() {

		if( apply_filters( 'techmarket_show_related_products', true ) ) {

			global $product;

			$related_products_args = apply_filters( 'techmarket_related_products_args', array(
				'posts_per_page' 	=> 14,
				'columns' 			=> 7,
				'orderby' 			=> 'rand',
				'order'				=> 'desc',
			) );

			$related = wc_get_related_products( $product->get_id(), $related_products_args['posts_per_page'], $product->get_upsell_ids() );

			if ( ! $related ) {
				return;
			}

			$carousel_args	= apply_filters( 'techmarket_related_products_carousel_args', array(
				'infinite'			=> false,
				'slidesToShow'		=> 7,
				'slidesToScroll'	=> 7,
				'dots'				=> true,
				'arrows'			=> true,
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>',
				'responsive'		=> array(
					array(
						'breakpoint'	=> 767,
						'settings'		=> array(
							'slidesToShow'		=> 2,
							'slidesToScroll'	=> 2
						)
					),
					array(
						'breakpoint'	=> 780,
						'settings'		=> array(
							'slidesToShow'		=> 3,
							'slidesToScroll'	=> 3
						)
					),
					array(
						'breakpoint'	=> 1200,
						'settings'		=> array(
							'slidesToShow'		=> 4,
							'slidesToScroll'	=> 4
						)
					),
					array(
						'breakpoint'	=> 1600,
						'settings'		=> array(
							'slidesToShow'		=> 5,
							'slidesToScroll'	=> 5
						)
					)
				)
			) );

			$args = apply_filters( 'techmarket_wc_related_display_args', array(
				'shortcode_tag'		=> 'products',
				'shortcode_atts'	=> array(
					'columns'			=> $related_products_args['columns'],
					'orderby' 			=> $related_products_args['orderby'],
					'order'				=> $related_products_args['order'],
					'ids'				=> implode( ',', $related ),
				),
				'carousel_args'		=> $carousel_args
			) );

			techmarket_get_template( '/templates/shop/single-product/related.php', $args );
		}
	}
}

if ( ! function_exists( 'techmarket_sorting_wrapper' ) ) {
	/**
	 * Sorting wrapper
	 *
	 * @since   1.4.3
	 * @return  void
	 */
	function techmarket_sorting_wrapper() {
		echo '<div class="techmarket-sorting">';
	}
}

if ( ! function_exists( 'techmarket_sorting_wrapper_close' ) ) {
	/**
	 * Sorting wrapper close
	 *
	 * @since   1.4.3
	 * @return  void
	 */
	function techmarket_sorting_wrapper_close() {
		echo '</div>';
	}
}

if ( ! function_exists( 'techmarket_shop_messages' ) ) {
	/**
	 * Techmarket shop messages
	 *
	 * @since   1.4.4
	 * @uses    techmarket_do_shortcode
	 */
	function techmarket_shop_messages() {
		if ( ! is_checkout() ) {
			echo wp_kses_post( techmarket_do_shortcode( 'woocommerce_messages' ) );
		}
	}
}

if ( ! function_exists( 'techmarket_woocommerce_pagination' ) ) {
	/**
	 * Techmarket WooCommerce Pagination
	 * WooCommerce disables the product pagination inside the woocommerce_product_subcategories() function
	 * but since Techmarket adds pagination before that function is excuted we need a separate function to
	 * determine whether or not to display the pagination.
	 *
	 * @since 1.4.4
	 */
	function techmarket_woocommerce_pagination() {
		if ( woocommerce_products_will_display() ) {
			woocommerce_pagination();
		}
	}
}

if ( ! function_exists( 'techmarket_promoted_products' ) ) {
	/**
	 * Featured and On-Sale Products
	 * Check for featured products then on-sale products and use the appropiate shortcode.
	 * If neither exist, it can fallback to show recently added products.
	 *
	 * @since  1.5.1
	 * @param integer $per_page total products to display.
	 * @param integer $columns columns to arrange products in to.
	 * @param boolean $recent_fallback Should the function display recent products as a fallback when there are no featured or on-sale products?.
	 * @uses  techmarket_is_woocommerce_activated()
	 * @uses  wc_get_featured_product_ids()
	 * @uses  wc_get_product_ids_on_sale()
	 * @uses  techmarket_do_shortcode()
	 * @return void
	 */
	function techmarket_promoted_products( $per_page = '4', $columns = '4', $recent_fallback = true ) {
		if ( techmarket_is_woocommerce_activated() ) {

			if ( wc_get_featured_product_ids() ) {

				echo '<h2>' . esc_html__( 'Featured Products', 'techmarket' ) . '</h2>';

				echo techmarket_do_shortcode( 'featured_products', array(
											'per_page' => $per_page,
											'columns'  => $columns,
				) );
			} elseif ( wc_get_product_ids_on_sale() ) {

				echo '<h2>' . esc_html__( 'On Sale Now', 'techmarket' ) . '</h2>';

				echo techmarket_do_shortcode( 'sale_products', array(
											'per_page' => $per_page,
											'columns'  => $columns,
				) );
			} elseif ( $recent_fallback ) {

				echo '<h2>' . esc_html__( 'New In Store', 'techmarket' ) . '</h2>';

				echo techmarket_do_shortcode( 'recent_products', array(
											'per_page' => $per_page,
											'columns'  => $columns,
				) );
			}
		}
	}
}

if ( ! function_exists( 'techmarket_handheld_header_links' ) ) {
	/**
	 * Display a menu intended for use on handheld devices
	 *
	 * @since 1.0.0
	 */
	function techmarket_handheld_header_links() {
		$links = array(
			'my-account' => array(
				'priority' => 40,
				'callback' => 'techmarket_handheld_header_account_link',
			),
		);

		if ( techmarket_is_yith_wcwl_activated() ) {
			$links['wishlist'] = array(
				'priority' => 20,
				'callback' => 'techmarket_handheld_header_wishlist_link',
			);
		}

		if( techmarket_is_yith_woocompare_activated() ) {
			$links['compare'] = array(
				'priority' => 30,
				'callback' => 'techmarket_handheld_header_compare_link',
			);
		}

		if ( wc_get_page_id( 'myaccount' ) === -1 ) {
			unset( $links['my-account'] );
		}

		$links = apply_filters( 'techmarket_handheld_header_links', $links );
		?>
		<div class="handheld-header-links">
			<ul class="columns-<?php echo count( $links ); ?>">
				<?php foreach ( $links as $key => $link ) : ?>
					<li class="<?php echo esc_attr( $key ); ?>">
						<?php
						if ( $link['callback'] ) {
							call_user_func( $link['callback'], $key, $link );
						}
						?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
}

if ( ! function_exists( 'techmarket_handheld_header_cart_link' ) ) {
	/**
	 * The cart callback function for the handheld footer bar
	 *
	 * @since 1.0.0
	 */
	function techmarket_handheld_header_cart_link() {
		if( techmarket_get_shop_catalog_mode() == false ) {
			?>
			<a class="handheld-header-cart-link has-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'techmarket' ); ?>">
				<i class="header-cart-icon <?php echo esc_attr( apply_filters( 'techmarket_header_cart_icon', 'tm tm-shopping-bag' ) ); ?>"></i><span class="count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
			</a>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_handheld_header_account_link' ) ) {
	/**
	 * The account callback function for the handheld footer bar
	 *
	 * @since 1.0.0
	 */
	function techmarket_handheld_header_account_link() {
		echo '<a href="' . esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) . '" class="has-icon"><i class="tm tm-login-register"></i>' . esc_attr__( '', 'techmarket' ) . '</a>';
	}
}

if ( ! function_exists( 'techmarket_wc_template_loop_hover' ) ) {
	/**
	 * Calls techmarket loop hover
	 */
	function techmarket_wc_template_loop_hover() {
		?><div class="hover-area"><?php
		/**
		 * @hooked techmarket_loop_action_buttons - 10
		 */
		do_action( 'techmarket_product_item_hover_area' );
		?></div><?php
	}
}

if ( ! function_exists( 'techmarket_sale_product_with_timer_header_open' ) ) {
	function techmarket_sale_product_with_timer_header_open() {
		?><div class="sale-product-with-timer-header"><?php
	}
}

if ( ! function_exists( 'techmarket_sale_product_with_timer_price_and_title_open' ) ) {
	function techmarket_sale_product_with_timer_price_and_title_open() {
		?><div class="price-and-title"><?php
	}
}

if ( ! function_exists( 'techmarket_sale_product_with_timer_price_and_title_close' ) ) {
	function techmarket_sale_product_with_timer_price_and_title_close() {
		?></div><!-- /.price-and-title --><?php
	}
}


if ( ! function_exists( 'techmarket_sale_product_with_timer_header_close' ) ) {
	function techmarket_sale_product_with_timer_header_close() {
		?></div><!-- /.sale-product-with-timer-header --><?php
	}
}

if ( ! function_exists( 'techmarket_sale_product_deal_progress_bar' ) ) {
	function techmarket_sale_product_deal_progress_bar() {

		$total_stock_quantity = get_post_meta( get_the_ID(), '_total_stock_quantity', true );

		if( ! empty( $total_stock_quantity ) ) {

			$stock_quantity		= round( $total_stock_quantity );
			$stock_available 	= ( $stock = get_post_meta( get_the_ID(), '_stock', true ) ) ? round( $stock ) : 0;
			$stock_sold 	 	= ( $stock_quantity > $stock_available ? $stock_quantity - $stock_available : 0 );
			$percentage 		= ( $stock_sold > 0 ? round( $stock_sold/$stock_quantity * 100 ) : 0 );

		} else {

			$stock_sold 	 	= ( $total_sales = get_post_meta( get_the_ID(), 'total_sales', true ) ) ? round( $total_sales ) : 0;
			$stock_available 	= ( $stock = get_post_meta( get_the_ID(), '_stock', true ) ) ? round( $stock ) : 0;
			$percentage 		= ( $stock_available > 0 ? round( $stock_sold/$stock_available * 100 ) : 0 );

		}

		if( $stock_available > 0 ) :
		?>
		<div class="deal-progress">
			<div class="deal-stock">
				<div class="stock-sold"><?php echo esc_html__( 'Already Sold:', 'techmarket' );?> <strong><?php echo esc_html( $stock_sold ); ?></strong></div>
				<div class="stock-available"><?php echo esc_html__( 'Available:', 'techmarket' );?> <strong><?php echo esc_html( $stock_available ); ?></strong></div>
			</div>
			<div class="progress">
				<span class="progress-bar" style="<?php echo esc_attr( 'width:' . $percentage . '%' ); ?>"><?php echo esc_html( $percentage ); ?></span>
			</div>
		</div>
		<?php
		endif;
	}
}

if ( ! function_exists( 'techmarket_sale_product_countdown_timer' ) ) {
	/**
	 *
	 */
	function techmarket_sale_product_countdown_timer( $product ) {
		global $product;

		$product_id = $product->get_id();
		$product_type = $product->get_type();
		$sale_price_dates_from = $sale_price_dates_to = '';
		if( $product_type == 'variable' ) {
			$var_sale_price_dates_from = array();
			$var_sale_price_dates_to = array();
			$available_variations = $product->get_available_variations();
			foreach ( $available_variations as $key => $available_variation ) {
				$variation_id = $available_variation['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
				if( $date_from = get_post_meta( $variation_id, '_sale_price_dates_from', true ) ) {
					$var_sale_price_dates_from[] = date_i18n( 'Y-m-d H:i:s', $date_from );
				}
				if( $date_to =get_post_meta( $variation_id, '_sale_price_dates_to', true ) ) {
					$var_sale_price_dates_to[] = date_i18n( 'Y-m-d H:i:s', $date_to );
				}
			}

			if( ! empty( $var_sale_price_dates_from ) )
				$sale_price_dates_from = min( $var_sale_price_dates_from );
			if( ! empty( $var_sale_price_dates_to ) )
				$sale_price_dates_to = max( $var_sale_price_dates_to );
		} else {
			if( $date_from = get_post_meta( $product_id, '_sale_price_dates_from', true ) ) {
				$sale_price_dates_from = date_i18n( 'Y-m-d H:i:s', $date_from );
			}
			if( $date_to = get_post_meta( $product_id, '_sale_price_dates_to', true ) ) {
				$sale_price_dates_to = date_i18n( 'Y-m-d H:i:s', $date_to );
			}
		}

		$deal_end_date = $sale_price_dates_to;
		$deal_end_time = strtotime( $deal_end_date );
		$current_date = current_time( 'Y-m-d H:i:s', true );
		$current_time = strtotime( $current_date );
		$time_diff = ( $deal_end_time - $current_time );

		if( $time_diff > 0 ) :
		?>
		<div class="deal-countdown-timer">
			<div class="marketing-text">
				<span class="line-1"><?php echo apply_filters( 'techmarket_deal_countdown_timer_info_text_line_1', esc_html__( 'Hurry up!', 'techmarket' ) ); ?></span>
				<span class="line-2"><?php echo apply_filters( 'techmarket_deal_countdown_timer_info_text_line_2', esc_html__( 'Offers ends in:', 'techmarket' ) ); ?></span>
			</div>
			<span class="deal-time-diff" style="display:none;"><?php echo apply_filters( 'techmarket_deal_countdown_timer_diff_time', $time_diff ); ?></span>
			<div class="deal-countdown countdown"></div>
		</div>
		<?php
		endif;
	}
}

if ( ! function_exists( 'techmarket_product_loop_sale_saved_label' ) ) {
	function techmarket_product_loop_sale_saved_label() {
		global $product;

		if ( $product->is_on_sale() ) {
			?>
			<div class="sale-label-outer">
				<div class="sale-saved-label">
					<span class="saved-label-text"><?php echo esc_html__( 'Save', 'techmarket' ); ?></span>
					<span class="saved-label-amount"><?php echo techmarket_get_savings_on_sale( $product ) ?></span>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_get_savings_on_sale' ) ) {
	function techmarket_get_savings_on_sale( $product, $in = 'amount' ) {

		if( $product->is_type( 'variable' ) ) {
			$var_regular_price = array();
			$var_sale_price = array();
			$var_diff_price = array();
			$available_variations = $product->get_available_variations();
			foreach ( $available_variations as $key => $available_variation ) {
				$variation_id = $available_variation['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
				$variable_product = new WC_Product_Variation( $variation_id );

				$variable_product_regular_price = $variable_product->get_regular_price();
				$variable_product_sale_price = $variable_product->get_sale_price();

				if( ! empty( $variable_product_regular_price ) ) {
					$var_regular_price[] = $variable_product_regular_price;
				} else {
					$var_regular_price[] = 0;
				}
				if( ! empty( $variable_product_sale_price ) ) {
					$var_sale_price[] = $variable_product_sale_price;
				} else {
					$var_sale_price[] = 0;
				}
			}

			foreach( $var_regular_price as $key => $reg_price ) {
				if( isset( $var_sale_price[$key] ) && $var_sale_price[$key] !== 0 ) {
					$var_diff_price[] = $reg_price - $var_sale_price[$key];
				} else { 
					$var_diff_price[] = 0;
				}
			}

			$best_key = array_search( max( $var_diff_price ), $var_diff_price );

			$regular_price = $var_regular_price[$best_key];
			$sale_price = $var_sale_price[$best_key];
		} else {
			$regular_price = $product->get_regular_price();
			$sale_price = $product->get_sale_price();
		}

		$regular_price = wc_get_price_to_display( $product, array( 'qty' => 1, 'price' => $regular_price ) );
		$sale_price = wc_get_price_to_display( $product, array( 'qty' => 1, 'price' => $sale_price ) );

		if ( 'amount' === $in ) {

			$savings = wc_price( $regular_price - $sale_price );

		} elseif ( 'percentage' === $in ) {

			$savings = '<span class="percentage">' . round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 ) . '%</span>';
		}

		return $savings;
	}
}

if ( ! function_exists( 'techmarket_template_loop_media_open' ) ) {
	function techmarket_template_loop_media_open() {
		?><div class="media"><?php
	}
}

if ( ! function_exists( 'techmarket_template_loop_media_body_open' ) ) {
	function techmarket_template_loop_media_body_open() {
		?><div class="media-body"><?php
	}
}

if ( ! function_exists( 'techmarket_template_loop_media_body_close' ) ) {
	function techmarket_template_loop_media_body_close() {
		?></div><!-- /.media-body --><?php
	}
}

if ( ! function_exists( 'techmarket_template_loop_media_close' ) ) {
	function techmarket_template_loop_media_close() {
		?></div><!-- /.media --><?php
	}
}

if( ! function_exists( 'techmarket_template_loop_product_labels' ) ) {
	function techmarket_template_loop_product_labels( $product_id = false ) {

		global $product;

		$label_taxonomy = techmarket_get_label_taxonomy();

		if( ! $product_id ) {
			$product_id = $product->get_id();
		}
		$labels = get_the_terms( $product_id, $label_taxonomy );
		$product_labels = '';

		if ( $labels && ! is_wp_error( $labels ) ){
			foreach( $labels as $label ){
				$product_labels .= '<div class="ribbon label-' . $label->term_id . '"><span>' . $label->name . '</span></div>';
			}
		}

		echo wp_kses_post( $product_labels );

	}
}

if ( ! function_exists( 'techmarket_template_loop_product_isotope_thumbnail' ) ) {

	/**
	 * Get the product thumbnail for the loop.
	 *
	 * @subpackage	Loop
	 */
	function techmarket_template_loop_product_isotope_thumbnail() {
		echo woocommerce_get_product_thumbnail( 'shop_single' );
	}
}

if( ! function_exists( 'techmarket_product_label_style' ) ) {
	function techmarket_product_label_style() {
		$label_taxonomy = techmarket_get_label_taxonomy();
		$product_labels = get_categories( array( 'taxonomy' => $label_taxonomy ) );
		$product_label_css = '';

		if ( $product_labels && ! is_wp_error( $product_labels ) && empty( $product_labels['errors'] ) ){
			foreach( $product_labels as $product_label ){
				if( isset( $product_label->term_id ) ){
					$background_color = get_term_meta( $product_label->term_id , 'background_color', true );
					$text_color = get_term_meta( $product_label->term_id , 'text_color', true );

					$product_label_css .= '.label-' . $product_label->term_id . ' > span {';
					$product_label_css .= 'color: '. $text_color . ';';
					$product_label_css .= '}';

					$product_label_css .= '.label-' .$product_label->term_id . '.ribbon:before {';
					$product_label_css .= 'background-color: '. $background_color . ';';
					$product_label_css .= '}';

					$product_label_css .= '.label-' .$product_label->term_id . '.ribbon:after {';
					$product_label_css .= is_rtl() ? 'border-right: 10px solid '. $background_color . ';' : 'border-left: 10px solid '. $background_color . ';';
					$product_label_css .= '}';
				}
			}
		}

		if( ! empty( $product_label_css ) ) {
			wp_add_inline_style( 'techmarket-woocommerce-style', $product_label_css );
		}
	}
}

require get_template_directory() . '/inc/woocommerce/template-tags/layout.php';
require get_template_directory() . '/inc/woocommerce/template-tags/shop-loop.php';
require get_template_directory() . '/inc/woocommerce/template-tags/single-product.php';
require get_template_directory() . '/inc/woocommerce/template-tags/checkout.php';
require get_template_directory() . '/inc/woocommerce/template-tags/cart.php';
require get_template_directory() . '/inc/woocommerce/template-tags/myaccount.php';
