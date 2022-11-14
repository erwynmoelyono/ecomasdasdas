<?php

if ( ! function_exists( 'techmarket_before_footer_block' ) ) {
	/**
	 * Displays Before Footer Block
	 */
	function techmarket_before_footer_block() {

		if ( apply_filters( 'techmarket_show_before_footer_block', false ) ) {
			/**
			 * @hooked techmarket_before_footer_wrap - 10
			 * @hooked techmarket_footer_newsletter - 10
			 * @hooked techmarket_social_icons - 30
			 * @hooked techmarket_before_footer_wrap_end - 40
			 */
			do_action( 'techmarket_before_footer_block' );
		}
	}
}

if ( ! function_exists( 'techmarket_footer_widgets' ) ) {
	/**
	 * Displays Footer Widgets & Footer Contact Block
	 */
	function techmarket_footer_widgets() {

		$show_footer_widgets = apply_filters( 'techmarket_show_footer_widgets', true );
		$show_footer_contact_payment = apply_filters( 'techmarket_show_footer_contact_payment', true );

		if ( $show_footer_widgets || $show_footer_contact_payment ) : ?>

		<div class="footer-widgets-block">
			<div class="row">
				<?php if ( $show_footer_contact_payment ) : ?>
					<div class="footer-contact">
						<?php techmarket_footer_contact_payment(); ?>
					</div>
				<?php endif; ?>
				<?php if ( $show_footer_widgets ) : ?>
					<div class="footer-widgets">
						<?php techmarket_display_footer_widgets(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div><?php

		endif;
	}
}

if ( ! function_exists( 'techmarket_footer_contact_payment' ) ) {
	/**
	 * Contact Block
	 */
	function techmarket_footer_contact_payment() {

		/**
		 * @hooked techmarket_footer_logo - 10
		 * @hooked techmarket_footer_contact - 30
		 * @hooked techmarket_footer_payment - 40
		 */
		do_action( 'techmarket_footer_contact_payment' );
	}
}

if ( ! function_exists( 'techmarket_display_footer_widgets' ) ) {
	/**
	 * Displays footer widgets
	 */
	function techmarket_display_footer_widgets() {
		if ( is_active_sidebar( 'footer-widgets-1' ) ) {
			dynamic_sidebar( 'footer-widgets-1' );
		} else {
			if ( apply_filters( 'techmarket_show_default_footer_widgets', true ) ) {
				$footer_widget_args = apply_filters( 'techmarket_footer_widget_args', array(
					'before_widget' => '<div class="columns"><aside class="widget clearfix"><div class="body">',
					'after_widget'  => '</div></aside></div>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
					'widget_id'     => '',
				) );
				do_action( 'techmarket_default_footer_widgets', $footer_widget_args );
			}
		}
	}
}

if ( ! function_exists( 'techmarket_default_footer_widgets' ) ) {
	/**
	 * Displays default footer widgets
	 */
	function techmarket_default_footer_widgets( $args ) {

		$args['widget_id'] = 'recent-posts';
		the_widget( 'WP_Widget_Recent_Posts', array( 'title' => esc_html__( 'Recent Posts', 'techmarket'), 'number' => 5 ), $args );

		$args['widget_id'] = 'categories';
		the_widget( 'WP_Widget_Categories', array( 'title' => esc_html__( 'Categories', 'techmarket') ), $args );

		$args['widget_id'] = 'meta-footer';
		the_widget( 'WP_Widget_Meta', array( 'title' => esc_html__( 'Meta', 'techmarket') ), $args );

		$args['widget_id'] = 'pages-widget-footer';
		the_widget( 'WP_Widget_Pages', array( 'title' => esc_html__( 'Pages', 'techmarket') ), $args );
	}
}
