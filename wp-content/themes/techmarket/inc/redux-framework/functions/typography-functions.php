<?php
/**
 * Filter functions for Typography Section of Theme Options
 */

if( ! function_exists( 'redux_has_google_fonts' ) ) {
	function redux_has_google_fonts( $load_default ) {
		global $techmarket_options;

		if( isset( $techmarket_options['use_predefined_font'] ) ) {
			$load_default = $techmarket_options['use_predefined_font'];
		}

		return $load_default;
	}
}

if( ! function_exists( 'redux_switch_to_roboto' ) ) {
	function redux_switch_to_roboto( $enable ) {
		global $techmarket_options;

		if( isset( $techmarket_options['switch_to_roboto'] ) ) {
			$enable = $techmarket_options['switch_to_roboto'];
		}

		return $enable;
	}
}

if( ! function_exists( 'redux_apply_custom_fonts' ) ) {
	function redux_apply_custom_fonts() {
		global $techmarket_options;

		if( isset( $techmarket_options['use_predefined_font'] ) && !$techmarket_options['use_predefined_font'] ) {
			$content_font			= $techmarket_options['techmarket_content_font'];
			$content_font_family	= $content_font['font-family'];
			$custom_font_css		= '
				body,
				button,
				input,
				textarea,
				select {
					font-family: ' . $content_font_family . ';
				}
			';
			$custom_font_css_handle = techmarket_is_woocommerce_activated() ? 'techmarket-woocommerce-style' : 'techmarket-style';
			wp_add_inline_style( $custom_font_css_handle, $custom_font_css );
		}
	}
}

if ( ! function_exists( 'redux_get_roboto_vietnamese_css' ) ) {
	function redux_get_roboto_vietnamese_css() {
		global $techmarket_options;

		if( isset( $techmarket_options['use_predefined_font'] ) && !$techmarket_options['use_predefined_font'] ) {
			$content_font			= $techmarket_options['techmarket_content_font'];
			$content_font_family	= $content_font['font-family'];
			$content_font_subsets	= $content_font['subsets'];
			if( $content_font_family == 'Roboto' || $content_font_family == 'Arial, Helvetica, sans-serif' || $content_font_family == 'Tahoma,Geneva, sans-serif' || $content_font_family == 'Open Sans' || $content_font_family == 'Lato' || $content_font_family == 'Raleway' || $content_font_family == 'Titillium Web' ) {
				$styles 	        = '
				.price,
				.price ins,
				b, strong,
				.site-footer h1,
				.site-footer h2,
				.site-footer h3,
				.site-footer h4,
				.site-footer h5,
				.site-footer h6,
				.site-footer strong,
				.site-header-cart .cart-contents .amount,
				.banner .banner-bg .caption h3 strong,
				.techmarket-banner .banner-bg .caption h3 strong,
				.navbar-primary .nav>li>a,
				.primary-navigation .nav>li>a,
				.departments-menu button,
				.navbar-search button,
				.order-review-wrapper .order_review_heading,
				.departments-menu>.dropdown-menu>li.highlight>a,
				.features-list .features .feature .media .media-body h5,
				.section-products-carousel-tabs .nav-link.active,
				.section-deals-carousel-and-products-carousel-tabs .deals-carousel-inner-block .section-title strong,
				.products .sale-product-with-timer .deal-countdown-timer .marketing-text .line-1,
				.products .sale-product-with-timer .deal-countdown-timer .deal-countdown>span .value,
				.section-categories-carousel.section-top-categories .section-title,
				.section-categories-carousel.section-top-categories .readmore-link,
				.product-loop-categories .product-category .woocommerce-loop-category__title,
				.product-loop-categories .product-category h2,
				.product-loop-categories .product-category h3,
				.products .product-category .woocommerce-loop-category__title,
				.products .product-category h2, .products .product-category h3,
				.section-landscape-full-product-cards-carousel .section-title strong,
				.footer-contact .footer-contact-info .call-us-text,
				.footer-payment-info .footer-payment-info-title,
				.section-products-carousel-with-vertical-tabs .section-title strong,
				#secondary .widget_product_categories .category-single>li>ul:last-child li.current-cat>a,
				.widget_shopping_cart .product_list_widget .mini_cart_item .quantity,
				.widget_shopping_cart_content .product_list_widget .mini_cart_item .quantity,
				.widget_shopping_cart .buttons .button,
				.widget_shopping_cart_content .buttons .button
				.full-width-banner .banner-bg .caption h3.title strong,
				.full-width-banner .banner-bg .button,
				table.cart td.product-price,
				table.cart td.product-subtotal,
				.cart-collaterals .checkout-button,
				.cart-collaterals .cart_totals .shop_table td .woocommerce-Price-amount,
				.full-width-banner .banner-bg article .more-link,
				article .full-width-banner .banner-bg .more-link,
				.single-product .product_title,
				.techmarket-tabs .tm-tabs li a,
				.techmarket-tabs ul.tabs li a,
				.woocommerce-tabs .tm-tabs li a,
				.woocommerce-tabs ul.tabs li a {
					font-weight: 600;
				}

				.single-product .techmarket-tabs .techmarket-tab p,
				.single-product .techmarket-tabs .tm-tabs p,
				.single-product .techmarket-tabs .wc-tab p,
				.single-product .woocommerce-tabs .techmarket-tab p,
				.single-product .woocommerce-tabs .tm-tabs p,
				.single-product .woocommerce-tabs .wc-tab p,
				.handheld-navigation>.handheld-navigation-menu>.nav>li>a{
					font-weight: normal;
				}
				';

				$handle = techmarket_is_woocommerce_activated() ? 'techmarket-woocommerce-style' : 'techmarket-style';
				wp_add_inline_style( $handle, $styles );
			}
		}
	}
}
