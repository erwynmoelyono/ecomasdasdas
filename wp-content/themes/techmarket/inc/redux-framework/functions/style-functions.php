<?php
/**
 * Filter functions for Styling Section of Theme Options
 */

if ( ! function_exists( 'redux_toggle_use_predefined_colors' ) ) {
	function redux_toggle_use_predefined_colors( $enable ) {
		global $techmarket_options;

		if ( isset( $techmarket_options['use_predefined_color'] ) && $techmarket_options['use_predefined_color'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if( ! function_exists( 'redux_apply_primary_color' ) ) {
	function redux_apply_primary_color( $color ) {
		global $techmarket_options;

		if ( isset( $techmarket_options['main_color'] ) ) {
			$color = $techmarket_options['main_color'];
		}

		return $color;
	}
}

if ( ! function_exists( 'sass_darken' ) ) {
	function sass_darken( $hex, $percent ) {
		preg_match( '/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $primary_colors );
		str_replace( '%', '', $percent );
		$percent = (int) $percent;
		$color = "#";
		for( $i = 1; $i <= 3; $i++ ) {
			$primary_colors[$i] = hexdec( $primary_colors[$i] );
			if ( $percent > 50 ) $percent = 50;
			$dv = 100 - ( $percent * 2 );
			$primary_colors[$i] = round( $primary_colors[$i] * ( $dv ) / 100 );
			$color .= str_pad( dechex( $primary_colors[$i] ), 2, '0', STR_PAD_LEFT );
		}
		return $color;
	}
}

if ( ! function_exists( 'sass_lighten' ) ) {
	function sass_lighten( $hex, $percent ) {
		preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $primary_colors);
		str_replace('%', '', $percent);
		$percent = (int) $percent;
		$color = "#";
		for($i = 1; $i <= 3; $i++) {
			$primary_colors[$i] = hexdec($primary_colors[$i]);
			$primary_colors[$i] = round($primary_colors[$i] * (100+($percent*2))/100);
			$color .= str_pad(dechex($primary_colors[$i]), 2, '0', STR_PAD_LEFT);
		}
		return $color;
	}
}

if ( ! function_exists( 'redux_get_custom_color_css' ) ) {
	function redux_get_custom_color_css() {
		global $techmarket_options;

		$primary_color      = isset( $techmarket_options['custom_primary_color'] ) ? $techmarket_options['custom_primary_color'] : '#0063d1';
		$primary_text_color = isset( $techmarket_options['custom_primary_text_color'] ) ? $techmarket_options['custom_primary_text_color'] : '#fff';

		$active_background  = sass_darken( $primary_color, '100%' );
		$active_border      = sass_darken( $primary_color, '100%' );

		$styles 	        = '
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.button,
		#scrollUp,
		.added_to_cart,
		.btn-primary,
		.fullwidth-notice,
		.top-bar.top-bar-v4,
		.site-header.header-v4,
		.site-header.header-v5,
		.navbar-search .btn-secondary,
		.header-v1 .departments-menu button,
		.widget_shopping_cart .buttons a:first-child,
		.section-landscape-products-widget-carousel.type-3 .section-header:after,
		.home-v1-slider .custom.tp-bullets .tp-bullet.selected,
		.home-v2-slider .custom.tp-bullets .tp-bullet.selected,
		.home-v3-slider .custom.tp-bullets .tp-bullet.selected,
		.home-v4-slider .custom.tp-bullets .tp-bullet.selected,
		.home-v5-slider .custom.tp-bullets .tp-bullet.selected,
		.home-v6-slider .custom.tp-bullets .tp-bullet.selected,
		.section-categories-filter .products .product-type-simple .button:hover,
		#respond.comment-respond .comment-form .form-submit input[type=submit]:hover,
		.contact-page-title:after,
		.comment-reply-title:after,
		article .more-link,
		article.post .more-link,
		.slick-dots li.slick-active button:before,
		.products .product .added_to_cart:hover,
		.products .product .button:hover,
		.banner-action.button:hover,
		.deal-progress .progress-bar,
		.section-products-tabs .section-products-tabs-wrap>.button:hover,
		#secondary.sidebar-blog .widget .widget-title:after,
		#secondary.sidebar-blog .widget_tag_cloud .tagcloud a:hover,
		.comments-title:after, .pings-title:after,
		.navbar-primary .nav .techmarket-flex-more-menu-item>a::after,
		.primary-navigation .nav .techmarket-flex-more-menu-item>a::after,
		.secondary-navigation .nav .techmarket-flex-more-menu-item>a::after,
		.header-v4 .sticky-wrapper .techmarket-sticky-wrap.stuck,
		.header-v5 .sticky-wrapper .techmarket-sticky-wrap.stuck,
		article .post-readmore .btn-primary:hover,
		article.post .post-readmore .btn-primary:hover,
		.table-compare tbody tr td .button:hover,
		.return-to-shop .button:hover,
		.contact-form .form-group input[type=button],
		.contact-form .form-group input[type=submit],
		.cart-collaterals .checkout-button,
		#payment .place-order .button,
		.single-product .single_add_to_cart_button:hover,
		.single-product .accessories .accessories-product-total-price .accessories-add-all-to-cart .button:hover,
		.single-product .accessories .accessories-product-total-price .accessories-add-all-to-cart .button:focus,
		.contact-form .form-group input[type=button],
		.contact-form .form-group input[type=submit],
		.about-accordion .kc-section-active .kc_accordion_header.ui-state-active a i,
		.about-accordion .vc_tta-panels .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title i,
		.about-accordion .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-title i,
		.home-v3-banner-with-products-carousel .banner .banner-action.button,
		.section-media-single-banner .button,
		.woocommerce-wishlist table.cart .product-add-to-cart a.button,
		table.cart td.actions div.coupon .button,
		.site-header.header-v10 .stretched-row,
		.site-header .handheld-header .handheld-header-cart-link .count,
		.products .product-carousel-with-timer-gallery .button,
		.banners-v2 .banner-action.button,
		.pace .pace-progress,
		input[type="submit"].dokan-btn-danger, a.dokan-btn-danger, .dokan-btn-danger,
		input[type="submit"].dokan-btn-danger:hover,
		a.dokan-btn-danger:hover,
		.dokan-btn-danger:hover,
		input[type="submit"].dokan-btn-danger:focus,
		a.dokan-btn-danger:focus,
		.dokan-btn-danger:focus,
		.wcmp_main_page .wcmp_main_menu ul li.hasmenu ul.submenu li.active a,
		.wcmp_main_page .wcmp_main_holder .wcmp_headding1 button,
		.wcmp_main_page .wcmp_main_menu ul li ul li a.active2,
		.wcmp_main_page .wcmp_main_holder .wcmp_headding1 button,
		input[type="submit"].dokan-btn-theme, a.dokan-btn-theme, .dokan-btn-theme,
		input[type="submit"].dokan-btn-theme:hover, a.dokan-btn-theme:hover, .dokan-btn-theme:hover,
		input[type="submit"].dokan-btn-theme:focus, a.dokan-btn-theme:focus, .dokan-btn-theme:focus,
		#secondary.sidebar-blog .widget .section-header .section-title:after,
		.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.active,
		.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li:hover,
		.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.dokan-common-links a:hover,
		.wcmp_regi_main .register p.woocomerce-FormRow input,
		.pagination .page-numbers li .page-numbers.current,
		.woocommerce-pagination .page-numbers li .page-numbers.current,
		#secondary .widget.widget_price_filter .price_slider .ui-slider-range,
		#secondary .widget.widget_price_filter .price_slider .ui-slider-handle, 
		div.wpforms-container-full.contact-form .wpforms-form input[type=submit],
		div.wpforms-container-full.contact-form .wpforms-form button[type=submit],
		div.wpforms-container-full.contact-form .wpforms-form .wpforms-page-button,
		.wpforms-container.contact-form input[type=submit],
		.wpforms-container.contact-form button[type=submit],
		.wpforms-container.contact-form .wpforms-page-button,
		div.wpforms-container-full.newsletter-form .wpforms-form input[type=submit],
		div.wpforms-container-full.newsletter-form .wpforms-form button[type=submit],
		div.wpforms-container-full.newsletter-form .wpforms-form .wpforms-page-button,
		.wpforms-container.newsletter-form input[type=submit],
		.wpforms-container.newsletter-form button[type=submit],
		.wpforms-container.newsletter-form .wpforms-page-button {
			background-color: ' . $primary_color . ';
		}

		.primary-navigation .nav .dropdown-menu,
		.secondary-navigation .nav .dropdown-menu,
		.navbar-primary .nav .dropdown-menu,
		.primary-navigation .nav .yamm-fw > .dropdown-menu > li,
		.navbar-primary .nav .yamm-fw > .dropdown-menu > li,
		.top-bar .nav .show>.dropdown-menu {
			border-top-color: ' . $primary_color . ';
		}

		.widget_shopping_cart .buttons a:first-child:hover,
		.navbar-primary .nav .techmarket-flex-more-menu-item>a:hover::after,
		.primary-navigation .nav .techmarket-flex-more-menu-item>a:hover::after,
		.secondary-navigation .nav .techmarket-flex-more-menu-item>a:hover::after,
		.cart-collaterals .checkout-button:hover,
		#payment .place-order .button:hover,
		.contact-form .form-group input[type=button]:hover,
		.contact-form .form-group input[type=submit]:hover,
		.section-media-single-banner .button:hover,
		.woocommerce-wishlist table.cart .product-add-to-cart a.button:hover,
		.products .product-carousel-with-timer-gallery .button:hover,
		table.cart td.actions div.coupon .button:hover,
		.banners-v2 .banner-action.button:hover,
		.wcmp_main_page .wcmp_main_holder .wcmp_headding1 button:hover,
		.btn-primary:hover,
		.navbar-search button:hover,
		div.wpforms-container-full.contact-form .wpforms-form input[type=submit]:hover,
		div.wpforms-container-full.contact-form .wpforms-form button[type=submit]:hover,
		div.wpforms-container-full.contact-form .wpforms-form .wpforms-page-button:hover,
		.wpforms-container.contact-form input[type=submit]:hover,
		.wpforms-container.contact-form button[type=submit]:hover,
		.wpforms-container.contact-form .wpforms-page-button:hover,
		div.wpforms-container-full.newsletter-form .wpforms-form input[type=submit]:hover,
		div.wpforms-container-full.newsletter-form .wpforms-form button[type=submit]:hover,
		div.wpforms-container-full.newsletter-form .wpforms-form .wpforms-page-button:hover,
		.wpforms-container.newsletter-form input[type=submit]:hover,
		.wpforms-container.newsletter-form button[type=submit]:hover,
		.wpforms-container.newsletter-form .wpforms-page-button:hover {
			background-color: ' . sass_darken( $primary_color, '4%' ) . ';
		}

		.home-v3-banner-with-products-carousel .banner .banner-action.button:hover {
			background-color: ' . sass_darken( $primary_color, '10%' ) . ';
		}

		.cart-collaterals .checkout-button:hover,
		#payment .place-order .button:hover,
		.contact-form .form-group input[type=button]:hover,
		.contact-form .form-group input[type=submit]:hover,
		.section-media-single-banner .button:hover,
		.products .product-carousel-with-timer-gallery .button:hover,
		.woocommerce-wishlist table.cart .product-add-to-cart a.button:hover,
		table.cart td.actions div.coupon .button:hover,
		.btn-primary:hover,
		div.wpforms-container-full.contact-form .wpforms-form input[type=submit]:hover,
		div.wpforms-container-full.contact-form .wpforms-form button[type=submit]:hover,
		div.wpforms-container-full.contact-form .wpforms-form .wpforms-page-button:hover,
		.wpforms-container.contact-form input[type=submit]:hover,
		.wpforms-container.contact-form button[type=submit]:hover,
		.wpforms-container.contact-form .wpforms-page-button:hover,
		div.wpforms-container-full.newsletter-form .wpforms-form input[type=submit],
		div.wpforms-container-full.newsletter-form .wpforms-form button[type=submit],
		div.wpforms-container-full.newsletter-form .wpforms-form .wpforms-page-button,
		.wpforms-container.newsletter-form input[type=submit]:hover,
		.wpforms-container.newsletter-form button[type=submit]:hover,
		.wpforms-container.newsletter-form .wpforms-page-button:hover {
			border-color: ' . sass_darken( $primary_color, '4%' ) . ';
		}

		.home-v3-banner-with-products-carousel .banner .banner-action.button:hover {
			border-color: ' . sass_darken( $primary_color, '10%' ) . ';
		}

		.top-bar.top-bar-v4 {
			border-bottom-color: ' . sass_lighten( $primary_color, '6%' ) . ';
		}

		.price,
		.features-list .feature i,
		.section-recent-posts-with-categories .post-items .post-item .post-info .btn-more,
		.section-products-with-image .load-more-button,
		.single-product .woocommerce-tabs .wc-tabs li.active a,
		.single-product .techmarket-tabs .tm-tabs li.active a,
		#respond.comment-respond .comment-form .form-submit input[type=submit],
		#respond.comment-respond .comment-form > p.logged-in-as a,
		.banner-action.button,
		.commentlist .comment .reply a,
		.pings-list .comment .reply a,
		.products .product .added_to_cart,
		.products .product .button,
		.full-width-banner .banner-bg .button,
		article.post.category-more-tag a[target=_blank],
		.commentlist .comment #respond .comment-reply-title small a,
		.commentlist .pingback #respond .comment-reply-title small a,
		.pings-list .comment #respond .comment-reply-title small a,
		.pings-list .pingback #respond .comment-reply-title small a,
		article.post.format-link .entry-content p a,
		article .post-readmore .btn-primary,
		article.post .post-readmore .btn-primary,
		.table-compare tbody tr td .button,
		.return-to-shop .button,
		.wcmp_main_page .wcmp_main_menu ul li a.active,
		.wcmp_main_page .wcmp_main_menu ul li a:hover,
		.wcmp_main_page .wcmp_displaybox2 h3,
		.wcmp_main_page .wcmp_displaybox3 h3,
		.widget_techmarket_poster_widget .poster-bg .caption .button:hover,
		.single-product .accessories .products .product .accessory-checkbox label input,
		.cart-collaterals .shop-features li i,
		.single-product .single_add_to_cart_button,
		.banners .banner .banner-bg .caption .price,
		.features-list .features .feature .media .feature-icon,
		.section-recent-posts-with-categories .nav .nav-link,
		.widget_techmarket_banner_widget .banner .banner-bg .caption .price,
		.single-product .accessories .accessories-product-total-price .accessories-add-all-to-cart .button,
		.wcmp_main_page  .wcmp_main_holder .wcmp_dashboard_display_box h3,
		#secondary .widget.widget_layered_nav ul li a:hover:before,
		#secondary .widget.widget_layered_nav ul li.chosen a:before {
			color: ' . $primary_color . ';
		}

		.top-bar.top-bar-v4 .nav-item+.nav-item .nav-link::before,
		.top-bar.top-bar-v4 .nav-item+.nav-item>a::before,
		.top-bar.top-bar-v4 .nav>.menu-item+.menu-item .nav-link::before,
		.top-bar.top-bar-v4 .nav>.menu-item+.menu-item>a::before,
		#respond.comment-respond .comment-form > p.logged-in-as a:hover,
		#respond.comment-respond .comment-form > p.logged-in-as a:focus,
		#comments .comment-list .reply a:hover,
		#comments .comment-list .reply a:focus,
		.comment-list #respond .comment-reply-title small:hover,
		.pings-list #respond .comment-reply-title small:hover,
		.comment-list #respond .comment-reply-title small a:focus,
		.pings-list #respond .comment-reply-title small a:focus {
			color: ' . sass_lighten( $primary_color, '10%' ) . ';
		}

		.top-bar.top-bar-v4 a,
		.site-header.header-v4 .site-header-cart .cart-contents .amount .price-label{
			color: ' . sass_lighten( $primary_color, '44%' ) . ';
		}

		.site-header.header-v4 .navbar-search button,
		.site-header.header-v5 .navbar-search button,
		.widget_shopping_cart .product_list_widget .mini_cart_item .remove,
		.widget_shopping_cart_content .product_list_widget .mini_cart_item .remove,
		.site-header.header-v4 .site-header-cart .cart-contents .count {
			background-color: ' . sass_lighten( $primary_color, '8%' ) . ';
		}

		.section-landscape-products-widget-carousel.product-widgets .section-header:after {
			border-bottom-color: ' . $primary_color . ';
		}

		.site-header.header-v4 .site-branding .cls-3,
		.site-header.header-v5 .site-branding .cls-3 {
			fill: ' . sass_lighten( $primary_color, '36%' ) . ';
		}

		.btn-primary,
		.wcmp_main_page .wcmp_ass_btn,
		.header-v4 .departments-menu>.dropdown-menu>li,
		.header-v4 .departments-menu>.dropdown-menu .menu-item-has-children>.dropdown-menu,
		.section-categories-filter .products .product-type-simple .button:hover,
		.contact-page-title:after,
		.navbar-search .btn-secondary,
		.products .product .added_to_cart,
		.products .product .button,
		.products .product .added_to_cart:hover,
		.products .product .button:hover,
		.section-products-carousel-tabs .nav-link.active::after,
		.full-width-banner .banner-bg .button,
		.banner-action.button,
		.section-products-tabs .section-products-tabs-wrap>.button:hover,
		.section-3-2-3-product-cards-tabs-with-featured-product .nav .nav-link.active:after,
		.section-product-cards-carousel-tabs .nav .nav-link.active:after,
		.section-products-carousel-with-vertical-tabs .section-title:before,
		#respond.comment-respond .comment-form .form-submit input[type=submit],
		.section-categories-filter .products .product-type-simple .button:hover,
		.home-v9-full-banner.full-width-banner .banner-bg .caption .banner-action.button:hover,
		.section-deals-carousel-and-products-carousel-tabs .deals-carousel-inner-block,
		article .post-readmore .btn-primary,
		article.post .post-readmore .btn-primary,
		.table-compare tbody tr td .button,
		.table-compare tbody tr td .button:hover,
		.return-to-shop .button,
		.col-2-full-width-banner .banner .banner-bg .caption .banner-action.button:hover,
		.return-to-shop .button:hover,
		.select2-container .select2-drop-active,
		.contact-form .form-group input[type=button],
		.contact-form .form-group input[type=submit],
		.widget_techmarket_poster_widget .poster-bg .caption .button,
		.cart-collaterals .checkout-button,
		.section-6-1-6-products-tabs ul.nav .nav-link.active:after,
		#payment .place-order .button,
		.products .sale-product-with-timer,
		.products .sale-product-with-timer:hover,
		.single-product .single_add_to_cart_button,
		.single-product .accessories .accessories-product-total-price .accessories-add-all-to-cart .button:hover,
		.single-product .accessories .accessories-product-total-price .accessories-add-all-to-cart .button:focus,
		.contact-form .form-group input[type=button],
		.contact-form .form-group input[type=submit],
		.about-accordion .kc-section-active .kc_accordion_header.ui-state-active a i,
		.about-accordion .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-title i,
		.section-landscape-full-product-cards-carousel .section-title::before,
		.section-media-single-banner .button,
		.woocommerce-wishlist table.cart .product-add-to-cart a.button,
		.widget_techmarket_poster_widget .poster-bg .caption .button,
		table.cart td.actions div.coupon .button,
		.header-v1 .departments-menu button,
		input[type="submit"].dokan-btn-danger,
		a.dokan-btn-danger,
		.dokan-btn-danger,
		input[type="submit"].dokan-btn-danger:hover,
		a.dokan-btn-danger:hover,
		.dokan-btn-danger:hover,
		input[type="submit"].dokan-btn-danger:focus,
		a.dokan-btn-danger:focus,
		.dokan-btn-danger:focus,
		input[type="submit"].dokan-btn-theme, a.dokan-btn-theme, .dokan-btn-theme,
		input[type="submit"].dokan-btn-theme:hover, a.dokan-btn-theme:hover, .dokan-btn-theme:hover,
		input[type="submit"].dokan-btn-theme:focus, a.dokan-btn-theme:focus, .dokan-btn-theme:focus,
		.section-product-carousel-with-featured-product.type-2 .section-title::before,
		.wcvendors-pro-dashboard-wrapper .wcv-grid nav.wcv-navigation ul li.active a:after,
		.header-v4 .departments-menu>.dropdown-menu, 
		div.wpforms-container-full.contact-form .wpforms-form input[type=submit]:hover,
		div.wpforms-container-full.contact-form .wpforms-form button[type=submit]:hover,
		div.wpforms-container-full.contact-form .wpforms-form .wpforms-page-button:hover,
		.wpforms-container.contact-form input[type=submit]:hover,
		.wpforms-container.contact-form button[type=submit]:hover,
		.wpforms-container.contact-form .wpforms-page-button:hover,
		div.wpforms-container-full.newsletter-form .wpforms-form input[type=submit]:hover,
		div.wpforms-container-full.newsletter-form .wpforms-form button[type=submit]:hover,
		div.wpforms-container-full.newsletter-form .wpforms-form .wpforms-page-button:hover,
		.wpforms-container.newsletter-form input[type=submit]:hover,
		.wpforms-container.newsletter-form button[type=submit]:hover,
		.wpforms-container.newsletter-form .wpforms-page-button:hover {
			border-color: ' . $primary_color . ';
		}

		.slider-sm-btn,
		.slider-sm-btn:hover {
			border-color: ' . $primary_color . ' !important;
		}

		.slider-sm-btn {
			color: ' . $primary_color . ' !important;
		}

		.slider-sm-btn:hover,
		.wcmp_main_page .wcmp_main_holder .wcmp_vendor_dashboard_content .action_div .wcmp_orange_btn {
			background-color: ' . $primary_color . ' !important;
		}

		@media (max-width: 1023px) {
			.shop-control-bar {
				background-color: ' . $primary_color . ';
			}
		}

		button,
		.button,
		button:hover,
		.button:hover,
		.btn-primary,
		input[type=submit],
		input[type=submit]:hover,
		.btn-primary:hover,
		.return-to-shop .button:hover,
		.top-bar.top-bar-v4 a,
		.fullwidth-notice .message,
		#payment .place-order .button,
		.cart-collaterals .checkout-button,
		.banners-v2 .banner-action.button,
		.header-v1 .departments-menu button,
		.section-media-single-banner .button,
		.full-width-banner .banner-bg .button:focus,
		.full-width-banner .banner-bg .button:hover,
		.banners-v2.full-width-banner .banner-bg .button,
		.site-header.header-v10 .navbar-primary .nav>li>a,
		.site-header.header-v10 .primary-navigation .nav>li>a,
		.top-bar.top-bar-v4 .nav-item+.nav-item .nav-link::before,
		.top-bar.top-bar-v4 .nav-item+.nav-item>a::before,
		.top-bar.top-bar-v4 .nav>.menu-item+.menu-item .nav-link::before,
		.top-bar.top-bar-v4 .nav>.menu-item+.menu-item>a::before,
		.site-header.header-v4 .navbar-nav .nav-link,
		.site-header.header-v4 .site-header-cart .cart-contents,
		.site-header.header-v4 .header-cart-icon,
		.site-header.header-v4 .departments-menu button i,
		.site-header.header-v5 .departments-menu button i,
		.site-header.header-v5 .navbar-primary .nav>li>a,
		.site-header.header-v5 .primary-navigation .nav>li>a,
		.section-products-tabs .section-products-tabs-wrap>.button:hover,
		.site-header.header-v4 .site-header-cart .cart-contents .amount .price-label,
		.home-v9-full-banner.full-width-banner .banner-bg .caption .banner-action.button:hover,
		.col-2-full-width-banner .banner .banner-bg .caption .banner-action.button:hover{
			color: ' . $primary_text_color . ';
		}

		.slider-sm-btn:hover,
		.slider-sm-btn {
			color: ' . $primary_text_color . ' !important;
		}

		.top-bar.top-bar-v4 {
			border-bottom-color: ' . sass_lighten( $primary_text_color, '25%' ) . ';
		}

		.site-header.header-v4 .site-header-cart .cart-contents .count {
			background-color: ' . sass_lighten( $primary_text_color, '55%' ) . ';
		}

		.site-header.header-v4 .navbar-search button,
		.site-header.header-v5 .navbar-search button {
			background-color: ' . $primary_text_color . ';
		}

		.site-header.header-v4 .navbar-search button:hover,
		.site-header.header-v5 .navbar-search button:hover {
			background-color: ' . sass_darken( $primary_text_color, '10%' ) . ';
		}

		.site-header.header-v4 .departments-menu button i,
		.site-header.header-v5 .departments-menu button i {
			text-shadow: ' . $primary_text_color . ' 0 1px 0;
		}

		.site-header.header-v4 .site-branding .cls-1,
		.site-header.header-v4 .site-branding .cls-2,
		.site-header.header-v5 .site-branding .cls-1,
		.site-header.header-v5 .site-branding .cls-2 {
			fill: ' . $primary_text_color . ';
		}

		.site-header.header-v4 .site-branding .cls-3,
		.site-header.header-v5 .site-branding .cls-3 {
			fill: ' . sass_lighten( $primary_text_color, '55%' ) . ';
		}
		';

		return $styles;
	}
}

if ( ! function_exists( 'redux_apply_custom_color_css' ) ) {
	function redux_apply_custom_color_css() {
		global $techmarket_options;

		if ( isset( $techmarket_options['use_predefined_color'] ) && $techmarket_options['use_predefined_color'] ) {
			return;
		}

		$how_to_include = isset( $techmarket_options['include_custom_color'] ) ? $techmarket_options['include_custom_color'] : '1';

		if ( $how_to_include == '1' ) {
			$custom_color_css_handle = techmarket_is_woocommerce_activated() ? 'techmarket-woocommerce-style' : 'techmarket-style';
			$custom_color_css = redux_get_custom_color_css();
			wp_add_inline_style( $custom_color_css_handle, $custom_color_css );
		} else {
			$custom_color_file = get_stylesheet_directory() . '/custom-color.css';

			if ( file_exists( $custom_color_file ) ) {
				wp_enqueue_style( 'techmarket-custom-color', get_stylesheet_directory_uri() . '/custom-color.css' );
			}
		}
	}
}

if ( ! function_exists( 'redux_toggle_custom_css_page' ) ) {
	function redux_toggle_custom_css_page() {
		global $techmarket_options;

		if ( isset( $techmarket_options['use_predefined_color'] ) && $techmarket_options['use_predefined_color'] ) {
			$should_add = false;
		} else {
			if ( !isset( $techmarket_options['include_custom_color'] ) ) {
				$techmarket_options['include_custom_color'] = '1';
			}

			if ( $techmarket_options['include_custom_color'] == '2' ) {
				$should_add = true;
			} else {
				$should_add = false;
			}
		}

		return $should_add;
	}
}
