<?php

if ( ! function_exists( 'techmarket_footer_logo' ) ) {
	/**
	 * Display the logo at footer
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function techmarket_footer_logo() {
		if( apply_filters( 'techmarket_footer_logo', true ) ) {
			ob_start();
			techmarket_site_title_or_logo();
			$footer_logo = apply_filters( 'techmarket_footer_logo_html', ob_get_clean() );
			echo '<div class="footer-logo">' . $footer_logo . '</div>';
		}
	}
}

if ( ! function_exists( 'techmarket_before_footer_wrap' ) ) {
	/**
	 * Wraps newsletter and social icons
	 */
	function techmarket_before_footer_wrap() {
		?><div class="before-footer-wrap">
			<div class="col-full"><?php
	}
}

if ( ! function_exists( 'techmarket_before_footer_wrap_end' ) ) {
	/**
	 * Closes newsletter and social icons wrap
	 */
	function techmarket_before_footer_wrap_end() {
			?></div><!-- /.col-full -->
		</div><!-- /.before-footer-wrap --><?php
	}
}

if ( ! function_exists( 'techmarket_footer_newsletter' ) ) {
	/**
	 * Display Footer Newsletter
	 */
	function techmarket_footer_newsletter() {

		if( apply_filters( 'techmarket_footer_newsletter', true  ) ) {
			$footer_newsletter_icon             = 'footer-newsletter-icon ' . apply_filters( 'techmarket_footer_newsletter_icon', 'tm tm-newsletter' );
			$footer_newsletter_title 			= apply_filters( 'techmarket_footer_newsletter_title', esc_html__( 'Sign up for Newsletter', 'techmarket' ) );
			$footer_newsletter_marketing_text 	= apply_filters( 'techmarket_footer_newsletter_marketing_text', esc_html__( '...and receive $20 coupon for first shopping.', 'techmarket' ) );
			?>
			<div class="footer-newsletter">
				<div class="media">
					<?php if ( ! empty( $footer_newsletter_icon ) ) : ?><i class="<?php echo esc_attr( $footer_newsletter_icon ); ?>"></i><?php endif; ?>
					<div class="media-body">
						<div class="clearfix">
							<div class="newsletter-header">
								<h5 class="newsletter-title"><?php echo esc_html( $footer_newsletter_title ); ?></h5>
								<?php if ( ! empty( $footer_newsletter_marketing_text ) ) : ?>
								<span class="newsletter-marketing-text"><?php echo wp_kses_post( $footer_newsletter_marketing_text ); ?></span>
								<?php endif; ?>
							</div>
							<div class="newsletter-body"><?php techmarket_newsletter_form(); ?></div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_social_icons' ) ) {
	/**
	 * Displays footer social icons
	 */
	function techmarket_social_icons() {
		$social_networks 		= apply_filters( 'techmarket_set_social_networks', techmarket_get_social_networks() );
		$social_links_output 	= '';
		$social_link_html		= apply_filters( 'techmarket_footer_social_link_html', '<a class="sm-icon-label-link nav-link" href="%2$s"><i class="%1$s"></i> %3$s</a>' );

		foreach ( $social_networks as $social_network ) {
			if ( isset( $social_network[ 'link' ] ) && !empty( $social_network[ 'link' ] ) ) {
				$social_links_output .= sprintf( '<li class="nav-item">' . $social_link_html . '</li>', $social_network[ 'icon' ], $social_network[ 'link' ], $social_network[ 'label' ] );
			}
		}

		if ( apply_filters( 'techmarket_show_footer_social_icons', true ) && ! empty( $social_links_output ) ) {

			ob_start();
			?>
			<div class="footer-social-icons">
				<ul class="social-icons nav">
					<?php echo wp_kses_post( $social_links_output ); ?>
				</ul>
			</div>
			<?php
			echo apply_filters( 'techmarket_footer_social_links_html', ob_get_clean() );
		}
	}
}

if ( ! function_exists( 'techmarket_footer_contact_payment_wrap' ) ) {
	function techmarket_footer_contact_payment_wrap() {
		?><div class="contact-payment-wrap"><?php
	}
}

if ( ! function_exists( 'techmarket_footer_contact_payment_wrap_end' ) ) {
	function techmarket_footer_contact_payment_wrap_end() {
		?></div><!-- /.contact-payment-wrap --><?php
	}
}

if ( ! function_exists( 'techmarket_footer_contact' ) ) {
	/**
	 * Contact Block
	 */
	function techmarket_footer_contact() {

		$contact_info = apply_filters( 'techmarket_footer_contact_info', array(
			'title' => esc_html__( 'Got Questions ? Call us 24/7!', 'techmarket' ),
			'text' => '801 017 197',
			'icon' => 'tm tm-call-us-footer',
		) );

		if ( apply_filters( 'techmarket_show_footer_contact', false ) ) : ?>
		<div class="footer-contact-info">
			<div class="media">
				<?php if ( ! empty( $contact_info['icon'] ) ) : ?>
				<span class="media-left icon media-middle"><i class="<?php echo esc_attr( $contact_info['icon'] ); ?>"></i></span>
				<?php endif; ?>
				<div class="media-body">
					<span class="call-us-title"><?php echo esc_html( $contact_info['title'] ); ?></span>
					<span class="call-us-text"><?php echo esc_html( $contact_info['text'] ); ?></span>
					<?php techmarket_footer_contact_address(); ?>
					<?php techmarket_footer_contact_map_link(); ?>
				</div>
			</div>
		</div>
		<?php endif;
	}
}

if ( ! function_exists( 'techmarket_footer_contact_address' ) ) {
	/**
	 * Displays shop address at the footer
	 */
	function techmarket_footer_contact_address() {

		$footer_address = apply_filters( 'techmarket_footer_contact_address_content', esc_html__( '17 Princess Road, London, Greater London NW1 8JR, UK', 'techmarket' ) );

		if ( apply_filters( 'techmarket_footer_contact_address', true ) && ! empty( $footer_address ) ) : ?>
			<address class="footer-contact-address"><?php echo wp_kses_post( nl2br( $footer_address ) ); ?></address>
		<?php endif;
	}
}

if ( ! function_exists( 'techmarket_footer_contact_map_link' ) ) {
	/**
	 * Displays map link at the footer
	 */
	function techmarket_footer_contact_map_link() {

		$action_button_args = apply_filters( 'techmarket_footer_contact_map_link_args', array(
			'text'  => esc_html__( 'Find us on map', 'techmarket' ),
			'icon'  => 'tm tm-map-marker',
			'link'	=> '#',
		) );

		if ( apply_filters( 'techmarket_show_footer_contact_map', true ) ) : ?>
		<a href="<?php echo esc_url( $action_button_args['link'] );?>"<?php if ( apply_filters( 'techmarket_footer_contact_map_target_new', false ) ):?> target="_blank"<?php endif; ?> class="footer-address-map-link">
			<i class="<?php echo esc_attr( $action_button_args['icon'] );?>"></i>
			<?php echo esc_html( $action_button_args['text'] ); ?>
		</a>
		<?php endif;
	}
}

if ( ! function_exists( 'techmarket_footer_payment' ) ) {
	/**
	 * Payment Block
	 */
	function techmarket_footer_payment() {

		$payment_info = apply_filters( 'techmarket_footer_payment_info', array(
			'title' => esc_html__( 'We are using safe payments', 'techmarket' ),
			'icon' => 'tm tm-safe-payments',
		) );

		if ( apply_filters( 'techmarket_show_footer_payment', false ) ) : ?>
		<div class="footer-payment-info">
			<div class="media">
				<span class="media-left icon media-middle"><i class="<?php echo esc_attr( $payment_info['icon'] ); ?>"></i></span>
				<div class="media-body">
					<h5 class="footer-payment-info-title"><?php echo esc_html( $payment_info['title'] ); ?></h5>
					<?php techmarket_footer_payment_icons(); ?>
					<?php techmarket_footer_payment_secure_by_info(); ?>
				</div>
			</div>
		</div>
		<?php endif;
	}
}

if ( ! function_exists( 'techmarket_footer_payment_icons' ) ) {
	/**
	 * Payment Icons Block
	 */
	function techmarket_footer_payment_icons() {
		$payment_icons = apply_filters( 'techmarket_footer_payment_icons_args', array(
			'mastercard' => array(
				'icon' 		 => false,
				'icon_class' => 'fab fa-cc-mastercard',
				'image'      => true,
				'img_src'    => get_template_directory_uri() . '/assets/images/credit-cards/mastercard.svg',
			),
			'visa' => array(
				'icon' 		 => false,
				'icon_class' => 'fab fa-cc-visa',
				'image'      => true,
				'img_src'    => get_template_directory_uri() . '/assets/images/credit-cards/visa.svg',
			),
			'paypal' => array(
				'icon' 		 => false,
				'icon_class' => 'fab fa-cc-paypal',
				'image'      => true,
				'img_src'    => get_template_directory_uri() . '/assets/images/credit-cards/paypal.svg',
			),
			'maestro' => array(
				'icon' 		 => false,
				'icon_class' => 'fab fa-cc-maestro',
				'image'      => true,
				'img_src'    => get_template_directory_uri() . '/assets/images/credit-cards/maestro.svg',
			),
		) );
		if ( apply_filters( 'techmarket_footer_payment_icons', true ) && ! empty( $payment_icons ) ) : ?>
			<div class="footer-payment-icons">
				<ul class="list-payment-icons nav">
					<?php foreach( $payment_icons as $key => $payment_icon ) : ?>
						<li class="nav-item">
							<?php if( isset( $payment_icon['icon'] ) && $payment_icon['icon'] ) :
								?><i class="<?php echo esc_attr( $payment_icon['icon_class'] ); ?>"></i>
							<?php elseif( isset( $payment_icon['image'] ) && $payment_icon['image'] ) :
								?><img class="payment-icon-image" src="<?php echo esc_url( $payment_icon['img_src'] ); ?>" alt="<?php echo esc_attr( $key ); ?>" />
							<?php endif ; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif;
	}
}

if ( ! function_exists( 'techmarket_footer_payment_secure_by_info' ) ) {
	/**
	 * Payment Secure Icons Block
	 */
	function techmarket_footer_payment_secure_by_info() {
		$secure_icons = apply_filters( 'techmarket_footer_payment_secure_icons_args', array(
			'norton' => array(
				'img_src' => get_template_directory_uri() . '/assets/images/secured-by/norton.svg',
				'link'    => '#',
				'image'      => true,
				'icon' 		 => false,
				'icon_class' => 'false',
			),
			'mcafee' => array(
				'img_src' => get_template_directory_uri() . '/assets/images/secured-by/mcafee.svg',
				'link'    => '#',
				'image'      => true,
				'icon' 		 => false,
				'icon_class' => 'false',
			)
		));
		if ( apply_filters( 'techmarket_footer_payment_secure_by_info', true ) && ! empty( $secure_icons ) ) : ?>
			<div class="footer-secure-by-info">
				<h6 class="footer-secured-by-title"><?php echo apply_filters( 'techmarket_footer_payment_secure_icons_title', esc_html__( 'Secured by:', 'techmarket' ) ); ?></h6>
				<ul class="footer-secured-by-icons">
					<?php foreach( $secure_icons as $key => $secure_icons ) : ?>
						<li class="nav-item">
							<?php if( isset( $secure_icons['icon'] ) && $secure_icons['icon'] ) :
								?><i class="<?php echo esc_attr( $secure_icons['icon_class'] ); ?>"></i>
							<?php elseif( isset( $secure_icons['image'] ) && $secure_icons['image'] ) :
								?><img class="secure-icons-image" src="<?php echo esc_url( $secure_icons['img_src'] ); ?>" alt="<?php echo esc_attr( $key ); ?>" />
							<?php endif ; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif;
	}
}

if ( ! function_exists( 'techmarket_footer_site_info' ) ) {
	/**
	 * Displays the copyright credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function techmarket_footer_site_info() {

		$website_title_with_url 	= sprintf( '<a href="%s">%s</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ) );
		$footer_copyright_text 		= apply_filters( 'techmarket_footer_copyright_text', sprintf( esc_html__( 'Copyright &copy; %s %s Theme. All rights reserved.', 'techmarket' ), date( 'Y' ), $website_title_with_url ) );
		$footer_credit_text 		= apply_filters( 'techmarket_footer_credit_text', sprintf( esc_html__( 'Made with %s', 'techmarket' ), '<i class="fas fa-heart"></i>' ) );

		if ( apply_filters( 'techmarket_footer_site_info', true ) ) : ?>

		<div class="site-info">
			<div class="col-full">
				<div class="copyright"><?php echo wp_kses_post( $footer_copyright_text ); ?></div>
				<div class="credit"><?php echo wp_kses_post( $footer_credit_text ); ?></div>
			</div>
		</div><?php

		endif;
	}
}
