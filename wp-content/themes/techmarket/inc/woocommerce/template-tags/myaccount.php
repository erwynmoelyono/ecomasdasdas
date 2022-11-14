<?php
/**
 * Template tags for My Account Page
 */
if ( ! function_exists( 'techmarket_before_login_text' ) ) {
	function techmarket_before_login_text() {
		$before_login_text = apply_filters( 'techmarket_before_login_text', esc_html__( 'Vestibulum lacus magna, faucibus vitae dui eget, aliquam fringilla.
In et commodo elit. Class aptent taciti sociosqu ad litora.', 'techmarket' ) );
		if ( ! empty( $before_login_text ) ) : ?>
		<p class="before-login-text">
			<?php echo esc_html( $before_login_text ); ?>
		</p><?php endif;
	}
}

if ( ! function_exists( 'techmarket_before_register_text' ) ) {
	function techmarket_before_register_text() {
		$before_register_text = apply_filters( 'techmarket_before_register_text', esc_html__( 'Create new account today to reap the benefits of a personalized shopping experience. Praesent placerat, est sed aliquet finibus.', 'techmarket' ) );
		if ( ! empty( $before_register_text ) ) : ?><p class="before-register-text">
			<?php echo esc_html( $before_register_text ); ?>
		</p><?php endif;
	}
}

if ( ! function_exists( 'techmarket_register_benefits' ) ) {
	function techmarket_register_benefits() {
		$benefits = apply_filters( 'techmarket_register_benefits', array(
			esc_html__( 'Speed your way through checkout', 'techmarket' ),
			esc_html__( 'Track your orders easily', 'techmarket' ),
			esc_html__( 'Keep a record of all your purchases', 'techmarket' )
		) );

		$register_benefits_title = apply_filters( 'techmarket_register_benefits_title', esc_html__( 'Sign up today and you will be able to :' , 'techmarket' ) );

		if ( ! empty( $benefits ) ) : ?><div class="register-benefits">
			<?php if ( ! empty( $register_benefits_title ) ): ?><h3><?php echo esc_html( $register_benefits_title ); ?></h3><?php endif; ?>
			<ul>
				<?php foreach ( $benefits as $benefit ) : ?>
				<li><?php echo esc_html( $benefit ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div><?php endif;
	}
}

if ( ! function_exists( 'techmarket_wrap_customer_login_form' ) ) {
	function techmarket_wrap_customer_login_form() {

		$classes = 'customer-login-form';
		$or_text = '<span class="or-text">' . apply_filters( 'techmarket_or_text', esc_html__( 'or', 'techmarket' ) ) . '</span>';

		if ( get_option( 'woocommerce_enable_myaccount_registration' ) !== 'yes' ) {
			$classes .= ' no-registration-form';
			$or_text = '';
		}

		?><div class="<?php echo esc_attr( $classes ); ?>">
		<?php
			echo wp_kses_post( $or_text );
	}
}

if ( ! function_exists( 'techmarket_wrap_customer_login_form_close' ) ) {
	function techmarket_wrap_customer_login_form_close() {
		?></div><!-- /.customer-login-form --><?php
	}
}
