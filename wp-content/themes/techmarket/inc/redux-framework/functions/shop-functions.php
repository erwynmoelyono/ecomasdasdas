<?php
/**
 * Filter functions for Shop Section of Theme Options
 */

if( ! function_exists( 'redux_toggle_shop_catalog_mode' ) ) {
	function redux_toggle_shop_catalog_mode() {
		global $techmarket_options;

		if( isset( $techmarket_options['catalog_mode'] ) && $techmarket_options['catalog_mode'] == '1' ) {
			$catalog_mode = true;
		} else {
			$catalog_mode = false;
		}

		return $catalog_mode;
	}
}

if( ! function_exists( 'redux_apply_catalog_mode_for_product_loop' ) ) {
	function redux_apply_catalog_mode_for_product_loop( $product_link, $product ) {
		global $techmarket_options;

		$product_id = $product->get_id();
		$product_type = $product->get_type();

		if ( apply_filters( 'techmarket_show_affiliate_link_in_loop', true ) && 'external' == $product_type ) {
			$product_link =
				sprintf( '<a rel="nofollow" target="_blank" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( isset( $quantity ) ? $quantity : 1 ),
					esc_attr( $product->get_id() ),
					esc_attr( $product->get_sku() ),
					esc_attr( isset( $class ) ? $class : 'button' ),
					esc_html( $product->add_to_cart_text() )
				);
			return $product_link;
		}

		if( isset( $techmarket_options['catalog_mode'] ) && $techmarket_options['catalog_mode'] == '1' ) {
			$product_link = sprintf( '<a href="%s" class="button product_type_%s">%s</a>',
				get_permalink( $product_id ),
				esc_attr( $product_type ),
				apply_filters( 'techmarket_catalog_mode_button_text', esc_html__( 'View Product', 'techmarket' ) )
			);
		}

		return $product_link;
	}
}

if( ! function_exists( 'redux_apply_product_brand_taxonomy' ) ) {
	function redux_apply_product_brand_taxonomy( $brand_taxonomy ) {
		global $techmarket_options;

		if( isset( $techmarket_options['product_brand_taxonomy'] ) ) {
			$brand_taxonomy = $techmarket_options['product_brand_taxonomy'];
		}

		return $brand_taxonomy;
	}
}

if( ! function_exists( 'redux_apply_product_label_taxonomy' ) ) {
	function redux_apply_product_label_taxonomy( $label_taxonomy ) {
		global $techmarket_options;

		if( isset( $techmarket_options['product_label_taxonomy'] ) ) {
			$label_taxonomy = $techmarket_options['product_label_taxonomy'];
		}

		return $label_taxonomy;
	}
}

if( ! function_exists( 'redux_apply_product_comparison_page_id' ) ) {
	function redux_apply_product_comparison_page_id( $compare_page_id ) {
		global $techmarket_options;

		if( isset( $techmarket_options['compare_page_id'] ) ) {
			$compare_page_id = $techmarket_options['compare_page_id'];
		}

		return $compare_page_id;
	}
}

if( ! function_exists( 'redux_toggle_checkout_sticky' ) ) {
	function redux_toggle_checkout_sticky() {
		global $techmarket_options;

		if( isset( $techmarket_options['checkout_sticky'] ) && $techmarket_options['checkout_sticky'] == '1' ) {
			$checkout_sticky = true;
		} else {
			$checkout_sticky = false;
		}

		return $checkout_sticky;
	}
}

if( ! function_exists( 'redux_toggle_shop_footer_products_carousel' ) ) {
	function redux_toggle_shop_footer_products_carousel() {
		global $techmarket_options;

		if( isset( $techmarket_options['shop_footer_recently_viewed'] ) && $techmarket_options['shop_footer_recently_viewed'] == '1' ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if( ! function_exists( 'redux_toggle_shop_footer_brands_carousel' ) ) {
	function redux_toggle_shop_footer_brands_carousel() {
		global $techmarket_options;

		if( isset( $techmarket_options['shop_footer_brands_carousel'] ) && $techmarket_options['shop_footer_brands_carousel'] == '1' ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if( ! function_exists( 'redux_apply_shop_jumbotron_id' ) ) {
	function redux_apply_shop_jumbotron_id( $static_block_id ) {
		global $techmarket_options;

		if( isset( $techmarket_options['shop_jumbotron_id'] ) ) {
			$static_block_id = $techmarket_options['shop_jumbotron_id'];
		}

		return $static_block_id;
	}
}

if ( ! function_exists( 'redux_set_shop_view_args' ) ) {
	function redux_set_shop_view_args( $shop_view_args ) {
		global $techmarket_options;

		if ( isset( $techmarket_options['product_archive_enabled_views'] ) ) {
			$shop_views = $techmarket_options['product_archive_enabled_views']['enabled'];

			if ( $shop_views ) {
				$new_shop_view_args = array();
				$count = 0;

				foreach( $shop_views as $key => $shop_view ) {

					if ( isset( $shop_view_args[ $key ] ) ) {
						$new_shop_view_args[ $key ] = $shop_view_args[ $key ];

						if ( 0 == $count ) {
							$new_shop_view_args[ $key ]['active'] = true;
						} else {
							$new_shop_view_args[ $key ]['active'] = false;
						}

						$count++;
					}
				}

				return $new_shop_view_args;
			}
		}

		return $shop_view_args;
	}
}

if ( ! function_exists( 'redux_apply_shop_layout' ) ) {
	function redux_apply_shop_layout( $shop_layout ) {
		global $techmarket_options;

		if( isset( $techmarket_options['shop_layout'] ) ) {
			$shop_layout = $techmarket_options['shop_layout'];
		}

		return $shop_layout;
	}
}

if ( ! function_exists( 'redux_apply_shop_loop_subcategories_columns' ) ) {
	function redux_apply_shop_loop_subcategories_columns( $columns ) {
		global $techmarket_options;

		if( isset( $techmarket_options['subcategory_columns'] ) ) {
			$columns = $techmarket_options['subcategory_columns'];
		}

		return $columns;
	}
}

if ( ! function_exists( 'redux_apply_shop_loop_products_columns' ) ) {
	function redux_apply_shop_loop_products_columns( $columns ) {
		global $techmarket_options;

		if( isset( $techmarket_options['product_columns'] ) ) {
			$columns = $techmarket_options['product_columns'];
		}

		return $columns;
	}
}

if ( ! function_exists( 'redux_apply_shop_loop_per_page' ) ) {
	function redux_apply_shop_loop_per_page( $per_page ) {
		global $techmarket_options;

		if( isset( $techmarket_options['products_per_page'] ) ) {
			$per_page = $techmarket_options['products_per_page'];
		}

		return $per_page;
	}
}

if ( ! function_exists( 'redux_apply_single_product_layout' ) ) {
	function redux_apply_single_product_layout( $single_product_layout ) {
		global $techmarket_options;

		if( isset( $techmarket_options['single_product_layout'] ) ) {
			$single_product_layout = $techmarket_options['single_product_layout'];
		}

		return $single_product_layout;
	}
}

if ( ! function_exists( 'redux_apply_single_product_style' ) ) {
	function redux_apply_single_product_style( $single_product_style ) {
		global $techmarket_options;

		if( isset( $techmarket_options['single_product_style'] ) ) {
			$single_product_style = $techmarket_options['single_product_style'];
		}

		return $single_product_style;
	}
}

if( ! function_exists( 'redux_toggle_related_products' ) ) {
	function redux_toggle_related_products() {
		global $techmarket_options;

		if( isset( $techmarket_options['related_products'] ) && $techmarket_options['related_products'] == '1' ) {
			$related_products = true;
		} else {
			$related_products = false;
		}

		return $related_products;
	}
}

if ( ! function_exists( 'redux_apply_specs_tab_title' ) ) {
	function redux_apply_specs_tab_title( $tabs ) {
		global $techmarket_options;

		if ( isset( $tabs['specification'] ) ) {

			if ( isset( $techmarket_options['shop_specs_tab_title'] ) && ! empty( $techmarket_options['shop_specs_tab_title'] ) ) {
				$tabs['specification']['title'] = $techmarket_options['shop_specs_tab_title'];
			}
		}

		return $tabs;
	}
}

if ( ! function_exists( 'redux_apply_default_attr_style' ) ) {
	function redux_apply_default_attr_style( $style ) {
		global $techmarket_options;

		if ( isset( $techmarket_options['shop_default_attr_style'] ) && ! empty( $techmarket_options['shop_default_attr_style'] ) ) {
			$style = $techmarket_options['shop_default_attr_style'];
		}

		return $style;
	}
}

if ( ! function_exists( 'redux_apply_default_attr_col' ) ) {
	function redux_apply_default_attr_col( $col ) {
		global $techmarket_options;

		if ( isset( $techmarket_options['shop_default_attr_col'] ) && ! empty( $techmarket_options['shop_default_attr_col'] ) ) {
			$col = $techmarket_options['shop_default_attr_col'];
		}

		return $col;
	}
}

if ( ! function_exists( 'redux_apply_myaccount_before_login_text' ) ) {
	function redux_apply_myaccount_before_login_text( $before_login_text ) {
		global $techmarket_options;

		if ( isset( $techmarket_options['myaccount_before_login_text'] ) ) {
			$before_login_text = $techmarket_options['myaccount_before_login_text'];
		}

		return $before_login_text;
	}
}

if ( ! function_exists( 'redux_apply_myaccount_before_register_text' ) ) {
	function redux_apply_myaccount_before_register_text( $before_register_text ) {
		global $techmarket_options;

		if ( isset( $techmarket_options['myaccount_before_register_text'] ) ) {
			$before_register_text = $techmarket_options['myaccount_before_register_text'];
		}

		return $before_register_text;
	}
}

if ( ! function_exists( 'redux_apply_myaccount_register_benefits_title' ) ) {
	function redux_apply_myaccount_register_benefits_title( $register_benefits_title ) {
		global $techmarket_options;

		if ( isset( $techmarket_options['myaccount_register_benefits_title'] ) ) {
			$register_benefits_title = $techmarket_options['myaccount_register_benefits_title'];
		}

		return $register_benefits_title;
	}
}

if ( ! function_exists( 'redux_apply_myaccount_register_benefits' ) ) {
	function redux_apply_myaccount_register_benefits( $benefits ) {
		global $techmarket_options;

		if ( isset( $techmarket_options['myaccount_register_benefits'] ) ) {
			if ( is_array( $techmarket_options['myaccount_register_benefits'] ) ) {
				$benefits = $techmarket_options['myaccount_register_benefits'];
			} else {
				$benefits = array();
			}
		}

		return $benefits;
	}
}
