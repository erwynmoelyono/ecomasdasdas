<?php
/**
 * Template functions for shop loop
 */

if ( ! function_exists( 'techmarket_shop_control_bar' ) ) {
	/**
	 * Outputs shop control bar
	 */
	function techmarket_shop_control_bar() {

		global $wp_query;

		if ( 1 === $wp_query->found_posts || ! woocommerce_products_will_display() ) {
			return;
		}

		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '>=' ) ) {
			if( wc_get_loop_prop( 'is_shortcode' ) ) {
				return;
			}
		}

		?><div class="shop-control-bar">
			<?php
			/**
			 * @hooked techmarket_shop_view_switcher - 10
			 * @hooked woocommerce_sorting - 20
			 */
			do_action( 'techmarket_shop_control_bar' );
			?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_shop_view_switcher' ) ) {
	/**
	 * Outputs view switcher
	 */
	function techmarket_shop_view_switcher() {

		global $wp_query;

		if ( 1 === $wp_query->found_posts || ! woocommerce_products_will_display() ) {
			return;
		}

		$shop_views = techmarket_get_shop_views();
		?>
		<ul class="shop-view-switcher nav nav-tabs" role="tablist">
		<?php foreach( $shop_views as $view_id => $shop_view ) : ?>
			<li class="nav-item"><a class="nav-link <?php $active_class = $shop_view[ 'active' ] ? 'active': ''; echo esc_attr( $active_class ); ?>" data-toggle="tab" title="<?php echo esc_attr( $shop_view[ 'label' ] ); ?>" href="#<?php echo esc_attr( $view_id );?>"><i class="<?php echo esc_attr( $shop_view[ 'icon' ] ); ?>"></i></a></li>
		<?php endforeach; ?>
		</ul>
		<?php
	}
}

if ( ! function_exists( 'techmarket_shop_loop' ) ) {
	/**
	 *
	 */
	function techmarket_shop_loop() {

		if ( ! woocommerce_products_will_display() ) {
			return;
		}

		$columns = techmarket_set_loop_shop_columns();
		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '<' ) ) {
			global $woocommerce_loop;
			$columns = ! empty( $woocommerce_loop['columns'] ) ? $woocommerce_loop['columns'] : $columns;
		} else {
			$columns = wc_get_loop_prop( 'columns', $columns );
		}

		$shop_views = techmarket_get_shop_views();
		?>
		<div class="tab-content">
			<?php foreach( $shop_views as $view_id => $shop_view ) : ?>
			<div id="<?php echo esc_attr( $view_id ); ?>" class="tab-pane <?php $active_class = $shop_view[ 'active' ] ? 'active': ''; echo esc_attr( $active_class ); ?>" role="tabpanel">

				<div class="woocommerce columns-<?php echo esc_attr( $columns ); ?>">
					<?php woocommerce_product_loop_start(); ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php wc_get_template_part( $shop_view['template']['slug'], $shop_view['template']['name'] ); ?>

						<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>
				</div>

			</div>
			<?php endforeach; ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'techmarket_shop_control_bar_bottom' ) ) {
	/**
	 * Outputs shop control bar bottom
	 */
	function techmarket_shop_control_bar_bottom() {

		global $wp_query;

		if ( 1 === $wp_query->found_posts || ! woocommerce_products_will_display() ) {
			return;
		}

		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '>=' ) ) {
			if( wc_get_loop_prop( 'is_shortcode' ) ) {
				return;
			}
		}
		?>
		<div class="shop-control-bar-bottom">
			<?php
			/**
			 * @hooked woocommerce_pagination - 20
			 */
			do_action( 'techmarket_shop_control_bar_bottom' );
			?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'techmarket_product_subcategories' ) ) {
	/**
	 * Wrapper woocommerce_product_subcategories
	 *
	 */
	function techmarket_product_subcategories() {

		$columns 	= techmarket_set_loop_shop_subcategories_columns();
		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '<' ) ) {
			global $woocommerce_loop;
			$woocommerce_loop[ 'columns' ] = $columns;
		} else {
			$display_type = woocommerce_get_loop_display_mode();
			if( ! in_array( $display_type, array( 'subcategories', 'both' ) ) ) {
				return;
			}
			if( wc_get_loop_prop( 'is_shortcode' ) ) {
				return;
			}

			wc_set_loop_prop( 'columns', $columns );
			if ( ! woocommerce_products_will_display() ) {
				remove_action( 'woocommerce_before_shop_loop', 'techmarket_product_subcategories', 0 );
			}
		}

		$class 		= 'woocommerce columns-' . $columns;
		$parent_id	= is_product_category() ? get_queried_object_id() : 0;
		$before 	= '<div class="' . esc_attr( $class ) . '"><div class="product-loop-categories">';
		$after 		= '</div></div>';

		if ( ! woocommerce_products_will_display() ) {
			add_action( 'techmarket_after_product_subcategories', 'techmarket_sale_products_carousel_in_category' );
			add_action( 'techmarket_after_product_subcategories', 'techmarket_best_sellers_carousel_in_category' );
		}

		do_action( 'techmarket_before_product_subcategories' );

		ob_start();
		if ( ! function_exists( 'woocommerce_output_product_categories' ) ) {
			woocommerce_product_subcategories( array( 'parent_id' => $parent_id, 'before' => $before, 'after' => $after ) );
		} else {
			woocommerce_output_product_categories( array( 'parent_id' => $parent_id, 'before' => $before, 'after' => $after ) );
		}
		$sub_categories_html = ob_get_clean();

		if ( ! empty( $sub_categories_html ) ):

			?><section class="section-product-categories">
				<header class="section-header">
					<h1 class="woocommerce-products-header__title page-title"><?php echo sprintf( apply_filters( 'techmarket_product_subcategories_title', esc_html__( '%s Categories', 'techmarket' ) ), woocommerce_page_title() ); ?></h1>
				</header><?php

				echo wp_kses_post( $sub_categories_html );

			?></section><?php

		endif;

		do_action( 'techmarket_after_product_subcategories' );

		$columns 	= techmarket_set_loop_shop_columns();
		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '<' ) ) {
			$woocommerce_loop[ 'columns' ] = $columns;
		} else {
			wc_set_loop_prop( 'columns', $columns );
			if ( 'subcategories' === $display_type ) {
				wc_set_loop_prop( 'total', 0 );
			}
			if ( ! woocommerce_products_will_display() ) {
				add_action( 'woocommerce_before_shop_loop', 'techmarket_product_subcategories', 0 );
			}
		}
	}
}

if ( ! function_exists( 'techmarket_sale_products_carousel_in_category' ) ) {
	function techmarket_sale_products_carousel_in_category() {

		$term = get_queried_object();

		if ( ! ( $term instanceof WP_Term ) ) {
			return;
		}

		$args = apply_filters( 'techmarket_sale_products_carousel_in_category', array(
			'section_title'		=> esc_html__( 'Best Offers', 'techmarket' ),
			'section_class'		=> 'section-products-carousel',
			'header_custom_nav'	=> true,
			'shortcode_tag'		=> 'sale_products',
			'shortcode_atts'	=> array(
				'limit'				=> '18',
				'columns'			=> '6',
				'category'			=> $term->slug
			),
			'carousel_args'		=> array(
				'infinite'			=> false,
				'slidesToShow'		=> 6,
				'slidesToScroll'	=> 1,
				'dots'				=> true,
				'arrows'			=> true,
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>',
				'responsive'		=> array(
					array(
						'breakpoint'	=> 480,
						'settings'		=> array(
							'slidesToShow'		=> 1,
							'slidesToScroll'	=> 1
						)
					),
					array(
						'breakpoint'	=> 750,
						'settings'		=> array(
							'slidesToShow'		=> 2,
							'slidesToScroll'	=> 2
						)
					),
					array(
						'breakpoint'	=> 1200,
						'settings'		=> array(
							'slidesToShow'		=> 3,
							'slidesToScroll'	=> 3
						)
					),
					array(
						'breakpoint'	=> 1400,
						'settings'		=> array(
							'slidesToShow'		=> 4,
							'slidesToScroll'	=> 4
						)
					)
				)
			)
		) );

		techmarket_products_carousel( $args );
	}
}

if ( ! function_exists( 'techmarket_best_sellers_carousel_in_category' ) ) {
	function techmarket_best_sellers_carousel_in_category() {

		$term = get_queried_object();

		if ( ! ( $term instanceof WP_Term ) ) {
			return;
		}

		$args = apply_filters( 'techmarket_best_sellers_carousel_in_category', array(
			'section_title'		=> esc_html__( 'Top Selling', 'techmarket' ),
			'section_class'		=> 'section-products-carousel',
			'header_custom_nav'	=> true,
			'shortcode_tag'		=> 'best_selling_products',
			'shortcode_atts'	=> array(
				'limit'				=> '21',
				'columns'			=> '7',
				'category'			=> $term->slug
			),
			'carousel_args'		=> array(
				'infinite'			=> false,
				'slidesToShow'		=> 7,
				'slidesToScroll'	=> 1,
				'dots'				=> true,
				'arrows'			=> true,
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>',
				'responsive'		=> array(
					array(
						'breakpoint'	=> 650,
						'settings'		=> array(
							'slidesToShow'		=> 1,
							'slidesToScroll'	=> 1
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
						'breakpoint'	=> 1400,
						'settings'		=> array(
							'slidesToShow'		=> 5,
							'slidesToScroll'	=> 5
						)
					)
				)
			)
		) );

		techmarket_products_carousel( $args );
	}
}

if ( ! function_exists( 'techmarket_wc_handheld_sidebar' ) ) {
	/**
	 * Outputs WooCommerce Handheld Sidebar Toggle
	 */
	function techmarket_wc_handheld_sidebar() {

		if( apply_filters( 'techmarket_has_handheld_sidebar', true ) ) {
			$handheld_sidebar_title = apply_filters( 'techmarket_handheld_sidebar_title', esc_html__( 'Filters', 'techmarket' ) );
			$handheld_sidebar_icon  = apply_filters( 'techmarket_handheld_sidebar_icon', 'fas fa-sliders-h' );
			?><div class="handheld-sidebar-toggle"><button class="btn sidebar-toggler" type="button"><i class="<?php echo esc_attr( $handheld_sidebar_icon ); ?>"></i><span><?php echo esc_html( $handheld_sidebar_title ); ?></span></button></div><?php
		}
	}
}

if ( ! function_exists( 'techmarket_wc_loop_title' ) ) {
	/**
	 * Outputs WooCommerce Page title
	 */
	function techmarket_wc_loop_title() {

		if ( apply_filters( 'techmarket_wc_show_page_title', true ) && woocommerce_products_will_display() ) {
			if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '>=' ) ) {
				if( wc_get_loop_prop( 'is_shortcode' ) ) {
					return;
				}
			}
			?><h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1><?php
		}
	}
}

if ( ! function_exists( 'techmarket_template_loop_rating' ) ) {
	function techmarket_template_loop_rating() {
		global $product;

		if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ){
			return;
		}

		$rating = $product->get_average_rating();
		$review_count = $product->get_review_count();

		$rating_html  = '<div class="star-rating" title="' . sprintf( esc_attr__( 'Rated %s out of 5', 'techmarket' ), $rating ) . '">';
		$rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating">' . $rating . '</strong> ' . esc_html__( 'out of 5', 'techmarket' ) . '</span>';
		$rating_html .= '</div>';

		?><div class="techmarket-product-rating">
			<?php echo wp_kses_post( $rating_html ); ?> <span class="review-count">(<?php echo esc_html( $review_count ); ?>)</span>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_template_loop_single_product_thumbnail' ) ) {
	function techmarket_template_loop_single_product_thumbnail() {
		echo woocommerce_get_product_thumbnail( 'shop_single' );
	}
}

if ( ! function_exists ( 'techmarket_wrap_shop_loop_product_actions' ) ) {
	function techmarket_wrap_shop_loop_product_actions() {
		?><div class="product-actions"><?php
	}
}

if ( ! function_exists( 'techmarket_wrap_shop_loop_product_actions_close' ) ) {
	function techmarket_wrap_shop_loop_product_actions_close() {
		?></div><?php
	}
}

if ( ! function_exists ( 'techmarket_wrap_shop_loop_product_info' ) ) {
	function techmarket_wrap_shop_loop_product_info() {
		?><div class="product-info"><?php
	}
}

if ( ! function_exists( 'techmarket_wrap_shop_loop_product_info_close' ) ) {
	function techmarket_wrap_shop_loop_product_info_close() {
		?></div><?php
	}
}

if ( ! function_exists( 'techmarket_wrap_shop_loop_product_inner' ) ) {
	/**
	 * Wraps product with product-inner div
	 */
	function techmarket_wrap_shop_loop_product_inner() {
		?><div class="product-inner"><?php
	}
}

if ( ! function_exists( 'techmarket_wrap_shop_loop_product_inner_close' ) ) {
	/**
	 * Closes product-inner wrapper
	 */
	function techmarket_wrap_shop_loop_product_inner_close() {
		?></div><!-- /.product-inner --><?php
	}
}
