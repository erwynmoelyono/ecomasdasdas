<?php
/**
 * Filter functions for Footer Section of Theme Options
 */

if ( ! function_exists( 'redux_toggle_footer_before_block' ) ) {
	function redux_toggle_footer_before_block( $enable ) {
		global $techmarket_options;

		if( isset( $techmarket_options['show_footer_before_block'] ) && $techmarket_options['show_footer_before_block'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_toggle_footer_newsletter' ) ) {
	function redux_toggle_footer_newsletter( $enable ) {
		global $techmarket_options;

		if( isset( $techmarket_options['show_footer_newsletter'] ) && $techmarket_options['show_footer_newsletter'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_apply_footer_newsletter_title' ) ) {
	function redux_apply_footer_newsletter_title( $icon ) {
		global $techmarket_options;

		if( isset( $techmarket_options['footer_newsletter_title'] ) ) {
			$icon = $techmarket_options['footer_newsletter_title'];
		}

		return $icon;
	}
}

if ( ! function_exists( 'redux_apply_footer_newsletter_marketing_text' ) ) {
	function redux_apply_footer_newsletter_marketing_text( $address ) {
		global $techmarket_options;

		if( isset( $techmarket_options['footer_newsletter_marketing_text'] ) ) {
			$address = $techmarket_options['footer_newsletter_marketing_text'];
		}

		return $address;
	}
}

if ( ! function_exists( 'redux_apply_footer_newsletter_form' ) ) {
	function redux_apply_footer_newsletter_form( $form ) {
		global $techmarket_options;

		if( isset( $techmarket_options['footer_newsletter_signup_form'] ) && $techmarket_options['footer_newsletter_signup_form'] != '' ) {
			$form = do_shortcode( $techmarket_options['footer_newsletter_signup_form'] );
		}

		return $form;
	}
}

if ( ! function_exists( 'redux_toggle_footer_social_icons' ) ) {
	function redux_toggle_footer_social_icons( $enable ) {
		global $techmarket_options;

		if( isset( $techmarket_options['show_footer_social_icons'] ) && $techmarket_options['show_footer_social_icons'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_toggle_footer_logo' ) ) {
	function redux_toggle_footer_logo( $enable ) {
		global $techmarket_options;

		if( isset( $techmarket_options['show_footer_logo'] ) && $techmarket_options['show_footer_logo'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_apply_footer_logo' ) ) {
	function redux_apply_footer_logo( $logo ) {
		global $techmarket_options;

		if ( ! empty( $techmarket_options['site_footer_logo']['url'] ) ) {

			$logo_image_src = $techmarket_options['site_footer_logo']['url'];
			if ( is_ssl() ) {
				$logo_image_src = str_replace( 'http:', 'https:', $logo_image_src );
			}

			ob_start();
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home">
				<img src="<?php echo esc_url( $logo_image_src ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="<?php echo esc_attr( $techmarket_options['site_footer_logo']['width'] ); ?>" height="<?php echo esc_attr( $techmarket_options['site_footer_logo']['height'] ); ?>" />
			</a>
			<?php
			$logo = ob_get_clean();
		}

		return $logo;
	}
}

if ( ! function_exists( 'redux_toggle_footer_contact_block') ) {
	function redux_toggle_footer_contact_block( $enable ) {
		global $techmarket_options;

		$techmarket_options['show_footer_contact_block'] = isset( $techmarket_options['show_footer_contact_block'] ) ? $techmarket_options['show_footer_contact_block'] : true;

		if( $techmarket_options['show_footer_contact_block'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_apply_footer_contact_info' ) ) {
	function redux_apply_footer_contact_info( $args ) {
		global $techmarket_options;

		if( isset( $techmarket_options['footer_contact_info_title'] ) ) {
			$args['title'] = $techmarket_options['footer_contact_info_title'];
		}

		if( isset( $techmarket_options['footer_contact_info_text'] ) ) {
			$args['text'] = $techmarket_options['footer_contact_info_text'];
		}

		if( isset( $techmarket_options['footer_contact_info_icon'] ) ) {
			$args['icon'] = $techmarket_options['footer_contact_info_icon'];
		}

		return $args;
	}
}

if ( ! function_exists( 'redux_toggle_footer_contact_map_target' ) ) {
	function redux_toggle_footer_contact_map_target( $enable ) {
		global $techmarket_options;

		$techmarket_options['footer_contact_map_link_target'] = isset( $techmarket_options['footer_contact_map_link_target'] ) ? $techmarket_options['footer_contact_map_link_target'] : false;

		if ( $techmarket_options['footer_contact_map_link_target'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_toggle_footer_address' ) ) {
	function redux_toggle_footer_address( $enable ) {
		global $techmarket_options;

		if( isset( $techmarket_options['show_footer_address'] ) && $techmarket_options['show_footer_address'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_apply_footer_address_content' ) ) {
	function redux_apply_footer_address_content( $address ) {
		global $techmarket_options;

		if( isset( $techmarket_options['footer_address'] ) ) {
			$address = $techmarket_options['footer_address'];
		}

		return $address;
	}
}

if ( ! function_exists( 'redux_apply_footer_contact_map_link_args' ) ) {
	function redux_apply_footer_contact_map_link_args( $args ) {
		global $techmarket_options;

		if( isset( $techmarket_options['footer_contact_map_link'] ) ) {
			$args['link'] = $techmarket_options['footer_contact_map_link'];
		}

		if( isset( $techmarket_options['footer_contact_map_icon'] ) ) {
			$args['icon'] = $techmarket_options['footer_contact_map_icon'];
		}

		if( isset( $techmarket_options['footer_contact_map_text'] ) ) {
			$args['text'] = $techmarket_options['footer_contact_map_text'];
		}

		return $args;
	}
}

if ( ! function_exists( 'redux_toggle_footer_widgets' ) ) {
	function redux_toggle_footer_widgets( $enable ) {
		global $techmarket_options;

		$techmarket_options['show_footer_widgets'] = isset( $techmarket_options['show_footer_widgets'] ) ? $techmarket_options['show_footer_widgets'] : true;

		if( $techmarket_options['show_footer_widgets'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_toggle_footer_payment' ) ) {
	function redux_toggle_footer_payment( $enable ) {
		global $techmarket_options;

		$techmarket_options['show_footer_payment_block'] = isset( $techmarket_options['show_footer_payment_block'] ) ? $techmarket_options['show_footer_payment_block'] : true;

		if( $techmarket_options['show_footer_payment_block'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_apply_footer_payment_info' ) ) {
	function redux_apply_footer_payment_info( $args ) {
		global $techmarket_options;

		if( isset( $techmarket_options['footer_payment_info_title'] ) ) {
			$args['title'] = $techmarket_options['footer_payment_info_title'];
		}

		if( isset( $techmarket_options['footer_payment_info_icon'] ) ) {
			$args['icon'] = $techmarket_options['footer_payment_info_icon'];
		}

		return $args;
	}
}

if ( ! function_exists( 'redux_toggle_footer_payment_icons' ) ) {
	function redux_toggle_footer_payment_icons( $enable ) {
		global $techmarket_options;

		$techmarket_options['footer_payment_icons_enable'] = isset( $techmarket_options['footer_payment_icons_enable'] ) ? $techmarket_options['footer_payment_icons_enable'] : true;

		if( $techmarket_options['footer_payment_icons_enable'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_apply_footer_payment_icons' ) ) {
	function redux_apply_footer_payment_icons( $payment_icons ) {
		global $techmarket_options;

		if( ! empty( $techmarket_options['footer_payment_icons'] ) ) {

			$icons = array();
			$img_ids = explode( ',', $techmarket_options['footer_payment_icons'] );

			foreach( $img_ids as $img_id ) {
				$image_atts = wp_get_attachment_image_src( $img_id );
				$icons[] = array( 'icon' => false, 'image' => true, 'img_src' => $image_atts[0] );
			}

			if( ! empty( $icons ) ) {
				$payment_icons = $icons;
			}
		}

		return $payment_icons;
	}
}

if ( ! function_exists( 'redux_toggle_footer_payment_secure_icons' ) ) {
	function redux_toggle_footer_payment_secure_icons( $enable ) {
		global $techmarket_options;

		$techmarket_options['footer_payment_secure_icons_enable'] = isset( $techmarket_options['footer_payment_secure_icons_enable'] ) ? $techmarket_options['footer_payment_secure_icons_enable'] : true;

		if( $techmarket_options['footer_payment_secure_icons_enable'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_apply_footer_payment_secure_icons' ) ) {
	function redux_apply_footer_payment_secure_icons( $payment_icons ) {
		global $techmarket_options;

		if( ! empty( $techmarket_options['footer_payment_secure_icons'] ) ) {

			$icons = array();
			$img_ids = explode( ',', $techmarket_options['footer_payment_secure_icons'] );

			foreach( $img_ids as $img_id ) {
				$image_atts = wp_get_attachment_image_src( $img_id );
				$icons[] = array( 'icon' => false, 'image' => true, 'img_src' => $image_atts[0] );
			}

			if( ! empty( $icons ) ) {
				$payment_icons = $icons;
			}
		}

		return $payment_icons;
	}
}

if ( ! function_exists( 'redux_toggle_footer_site_info' ) ) {
	function redux_toggle_footer_site_info( $enable ) {
		global $techmarket_options;

		$techmarket_options['footer_site_info_enable'] = isset( $techmarket_options['footer_site_info_enable'] ) ? $techmarket_options['footer_site_info_enable'] : true;

		if( $techmarket_options['footer_site_info_enable'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_apply_footer_copyright_text' ) ) {
	function redux_apply_footer_copyright_text( $text ) {
		global $techmarket_options;

		if( isset( $techmarket_options['footer_copyright'] ) ) {
			$text = $techmarket_options['footer_copyright'];
		}

		return $text;
	}
}

if ( ! function_exists( 'redux_apply_footer_credit_text' ) ) {
	function redux_apply_footer_credit_text( $text ) {
		global $techmarket_options;

		if( isset( $techmarket_options['footer_credit'] ) ) {
			$text = $techmarket_options['footer_credit'];
		}

		return $text;
	}
}
