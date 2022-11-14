<?php
/**
 * Template tags used in Cart Page
 */

if ( ! function_exists( 'techmarket_wc_cart_wrap_open' ) ) {
	function techmarket_wc_cart_wrap_open() {
		?><div class="cart-wrapper"><?php
	}
}

if ( ! function_exists( 'techmarket_wc_cart_wrap_close' ) ) {
	function techmarket_wc_cart_wrap_close() {
		?></div><!-- /.cart-wrapper --><?php
	}
}

if ( ! function_exists( 'techmarket_wc_link_back_to_shop' ) ) {
	function techmarket_wc_link_back_to_shop() {
		$back_to_shop_text = apply_filters( 'techmarket_back_to_shop_text', esc_html__( 'Back to Shopping', 'techmarket' ) ) ;
		$back_to_shop_url  = get_permalink( wc_get_page_id( 'shop' ) );
		?><a href="<?php echo esc_url( $back_to_shop_url ); ?>" class="back-to-shopping"><?php echo esc_html( $back_to_shop_text ); ?></a><?php
	}
}

if ( ! function_exists( 'techmarket_shop_features' ) ) {
	function techmarket_shop_features() {

		if ( apply_filters( 'techmarket_show_shop_features', false ) ) {

			$shop_features = apply_filters( 'techmarket_shop_features', array(
				array( 	
					'icon' => 'tm tm-free-return', 
					'text' => wp_kses_post( __( '<strong>30 Days</strong> for free return', 'techmarket' ) ) 
				),
				array( 	
					'icon' => 'tm tm-safe-payments', 
					'text' => wp_kses_post( __( '<strong>Secure Payment</strong> system', 'techmarket' ) )
				),
				array( 	
					'icon' => 'tm tm-call-us-footer', 
					'text' => wp_kses_post( __( '<strong>Call us</strong> 801 017 917', 'techmarket' ) )
				)
			) ); 
			?><ul class="shop-features"><?php foreach( $shop_features as $shop_feature ) : ?>
				<li><i class="<?php echo esc_attr( $shop_feature['icon'] ); ?>"></i> <?php echo wp_kses_post( $shop_feature['text'] ); ?></li>
			<?php endforeach; ?></ul><?php
		}
	}
}