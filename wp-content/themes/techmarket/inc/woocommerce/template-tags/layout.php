<?php
/**
 * WooCommerce Layout Template Tags
 */

if ( ! function_exists( 'techmarket_before_wc_content' ) ) {
	/**
	 * Before Content
	 * Wraps all WooCommerce content in wrappers which match the theme markup
	 *
	 * @return  void
	 */
	function techmarket_before_wc_content() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
			<?php
	}
}

if ( ! function_exists( 'techmarket_after_wc_content' ) ) {
	/**
	 * After Content
	 * Closes the wrapping divs
	 *
	 * @return  void
	 */
	function techmarket_after_wc_content() {
		?>
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php
		$layout = techmarket_get_shop_layout();

		switch ( $layout ) {
			case 'left-sidebar':
				do_action( 'techmarket_sidebar', 'shop-1' );
				break;

			case 'right-sidebar':
				do_action( 'techmarket_sidebar', 'shop-1' );
				break;

			case 'two-sidebar':
				do_action( 'techmarket_sidebar', 'shop-1' );
				do_action( 'techmarket_sidebar', 'shop-2' );
				break;

			default:
				break;
		}
	}
}

if ( ! function_exists( 'techmarket_shop_before_footer_content' ) ) {
	/**
	 * Before Footer Content
	 */
	function techmarket_shop_before_footer_content() {

		if( is_shop() || is_product_category() || is_tax( 'product_label' ) || is_tax( get_object_taxonomies( 'product' ) ) || is_product() || is_cart() ) {
			?><div class="col-full"><?php
				/**
				 * @hooked techmarket_shop_footer_products_carousel - 10
				 * @hooked techmarket_shop_footer_brands_carousel - 20
				 */
				do_action( 'techmarket_shop_before_footer_content' );
			?></div><?php
		}
	}
}

if ( ! function_exists( 'techmarket_shop_footer_products_carousel' ) ) {
	/**
	 * Display products carousel
	 */
	function techmarket_shop_footer_products_carousel() {

		if( techmarket_is_woocommerce_activated() && apply_filters( 'techmarket_enable_shop_footer_products_carousel', true ) ) {

			$viewed_products = techmarket_get_viewed_products();

			if ( empty( $viewed_products ) ) {
				return;
			}

			$args = apply_filters( 'techmarket_shop_footer_products_carousel_args', array(
				'section_title'		=> esc_html__( 'Recently viewed products', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-carousel',
				'header_custom_nav'	=> true,
				'shortcode_tag'		=> 'products',
				'shortcode_atts'	=> array( 'columns' => '5', 'template' => 'content-landscape-product', 'ids' => implode(',', $viewed_products ) ),
				'carousel_args'		=> array(
					'slidesToShow'		=> 5,
					'slidesToScroll'	=> 2,
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
							'breakpoint'	=> 992,
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
							'breakpoint'	=> 1700,
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
}

if ( ! function_exists( 'techmarket_shop_footer_brands_carousel' ) ) {
	/**
	 * Display brands carousel
	 */
	function techmarket_shop_footer_brands_carousel() {

		if( techmarket_is_woocommerce_activated() && apply_filters( 'techmarket_enable_shop_footer_brands_carousel', true ) ) {

			$args = apply_filters( 'techmarket_shop_footer_brands_carousel_args', array(
				'section_args'	=> array(
					'section_title'	=> '',
				),
				'taxonomy_args'	=> array(
					'orderby'		=> 'title',
					'order'			=> 'ASC',
					'number'		=> 12,
					'hide_empty'	=> false
				),
				'carousel_args'	=> array(
					'slidesToShow'	=> 6,
					'slidesToScroll'=> 1,
					'dots'			=> false,
					'arrows'		=> true,
					'responsive'	=> array(
						array(
							'breakpoint'	=> 767,
							'settings'		=> array(
								'slidesToShow'		=> 1,
								'slidesToScroll'	=> 1
							)
						),
						array(
							'breakpoint'	=> 992,
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
								'slidesToShow'		=> 5,
								'slidesToScroll'	=> 5
							)
						)
					)
				)
			) );

			techmarket_brands_carousel( $args['section_args'] , $args['taxonomy_args'] , $args['carousel_args'] );
		}
	}
}
