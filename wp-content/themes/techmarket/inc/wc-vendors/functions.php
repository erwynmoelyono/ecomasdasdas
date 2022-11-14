<?php
/**
 * All WC Vendors Related functions
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'techmarket_wc_vendors_scripts' ) ) {
	/**
	 * Enqueue WC Vendors Scripts
	 */
	function techmarket_wc_vendors_scripts() {
		global $techmarket_version;
		wp_enqueue_style( 'techmarket-wc-vendors-style', get_template_directory_uri() . '/assets/css/wc-vendors/wc-vendors.css', '', $techmarket_version );
	}
}

if ( ! function_exists( 'techmarket_wc_vendors_shop_jumbotron_id' ) ) {
	function techmarket_wc_vendors_shop_jumbotron_id( $static_block_id ) {

		if ( WCV_Vendors::is_vendor_page() ) {
			$static_block_id = '';
		}

		return $static_block_id;
	}
}

if ( ! function_exists( 'techmarket_wc_vendors_product_tab_seller_info_before_content' ) ) {
	function techmarket_wc_vendors_product_tab_seller_info_before_content() {
		global $post, $product;

		$vendor_id          = WCV_Vendors::get_vendor_from_product( $product->get_id() );
		$store_icon_src 	= wp_get_attachment_image_src( get_user_meta( $vendor_id, '_wcv_store_icon_id', true ), 'pt-vendor-main-logo' );
		$store_icon 		= '';
		$store_name         = get_user_meta( $vendor_id, 'pv_shop_name', true );

		// Get store details including social, adddresses and phone number
		$twitter_username 	= get_user_meta( $vendor_id , '_wcv_twitter_username', true );
		$instagram_username = get_user_meta( $vendor_id , '_wcv_instagram_username', true );
		$facebook_url 		= get_user_meta( $vendor_id , '_wcv_facebook_url', true );
		$linkedin_url 		= get_user_meta( $vendor_id , '_wcv_linkedin_url', true );
		$youtube_url 		= get_user_meta( $vendor_id , '_wcv_youtube_url', true );
		$googleplus_url  	= get_user_meta( $vendor_id , '_wcv_googleplus_url', true );
		$pinterest_url 		= get_user_meta( $vendor_id , '_wcv_pinterest_url', true );
		$snapchat_username 	= get_user_meta( $vendor_id , '_wcv_snapchat_username', true );

		// Social list
		$social_icons_list = '<ul class="social-icons">';
		if ( $facebook_url != '') { $social_icons_list .= '<li><a href="'.$facebook_url.'" target="_blank"><i class="fab fa-facebook"></i></a></li>'; }
		if ( $instagram_username != '') { $social_icons_list .= '<li><a href="//instagram.com/'.$instagram_username.'" target="_blank"><i class="fab fa-instagram"></i></a></li>'; }
		if ( $twitter_username != '') { $social_icons_list .= '<li><a href="//twitter.com/'.$twitter_username.'" target="_blank"><i class="fab fa-twitter"></i></a></li>'; }
		if ( $googleplus_url != '') { $social_icons_list .= '<li><a href="'.$googleplus_url.'" target="_blank"><i class="fab fa-google-plus"></i></a></li>'; }
		if ( $youtube_url != '') { $social_icons_list .= '<li><a href="'.$youtube_url.'" target="_blank"><i class="fab fa-youtube"></i></a></li>'; }
		if ( $linkedin_url != '') { $social_icons_list .= '<li><a href="'.$linkedin_url.'" target="_blank"><i class="fab fa-linkedin"></i></a></li>'; }
		if ( $snapchat_username != '') { $social_icons_list .= '<li><a href="//www.snapchat.com/add/'.$snapchat_username.'" target="_blank"><i class="fab fa-snapchat" aria-hidden="true"></i></a></li>'; }
		$social_icons_list .= '</ul>';

		$social_icons = empty( $twitter_username ) && empty( $instagram_username ) && empty( $facebook_url ) && empty( $linkedin_url ) && empty( $youtube_url ) && empty( $googleplus_url ) && empty( $pinterst_url ) && empty( $snapchat_username ) ? false : true;

		// see if the array is valid
		if ( is_array( $store_icon_src ) ) {
			$store_icon 	= '<img src="'. esc_url($store_icon_src[0]) .'" alt="'. esc_attr($store_name) .'" class="store-icon" />';
		}

		ob_start(); ?>
		<div class="pv_additional_seller_info">
			<?php if ($store_icon != '') { ?>
			<div class="store-brand">
				<div class="store-brand-inner">
					<?php echo $store_icon; ?>
				</div>
			</div>
			<?php } ?>

			<div class="store-info">
				<h3><?php echo '<a href="'. WCV_Vendors::get_vendor_shop_page( $post->post_author ).'">'. esc_html($store_name) . '</a>'; ?></h3>
				<?php if( class_exists( 'WCVendors_Pro' ) ) : ?>
					<div class="rating-container">
						<?php if ( ! WCVendors_Pro::get_option( 'ratings_management_cap' ) ) echo WCVendors_Pro_Ratings_Controller::ratings_link( $vendor_id, true ); ?>
					</div>
				<?php endif; ?>
				<?php if ( $social_icons ) echo $social_icons_list; ?>
			</div>
		</div>
		<?php
		$html = ob_get_clean();

		return $html;
	}
}

if ( ! function_exists( 'techmarket_wc_vendors_wp_loaded' ) ) {
	function techmarket_wc_vendors_wp_loaded() {
		global $wcvendors_pro;

		if( isset( $wcvendors_pro->wcvendors_pro_vendor_controller ) ) {
			remove_action( 'woocommerce_before_main_content', array( $wcvendors_pro->wcvendors_pro_vendor_controller, 'store_main_content_header' ), 30 );
			add_action( 'woocommerce_before_main_content', array( $wcvendors_pro->wcvendors_pro_vendor_controller, 'store_main_content_header' ), 8 );
		}
	}
}
