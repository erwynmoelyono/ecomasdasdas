<?php
/**
 * Products Carousel with background
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_class = empty( $section_class ) ? 'section-products-carousel-with-bg' : $section_class . ' section-products-carousel-with-bg';

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'section-products-carousel-with-bg-' . uniqid();

if( isset( $header_custom_nav ) && $header_custom_nav ) {
	$carousel_args['arrows'] = true;
	$carousel_args['appendArrows'] = '#' . $section_id . ' .custom-slick-nav';
}

?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
	<div class="col-full">
		<div class="row">
			<header class="section-header">
				<?php if( ! empty( $section_title ) ) : ?>
					<h2 class="section-title"><?php echo wp_kses_post( $section_title ); ?></h2>
				<?php endif; ?>

				<?php if( isset( $header_timer ) && $header_timer && ! empty( $timer_value ) ) :
					$deal_end_time = strtotime( $timer_value );
					$current_time = strtotime( 'now' );
					$time_diff = ( $deal_end_time - $current_time );
					
					if( $time_diff > 0 ) : ?>
					<div class="deal-countdown-timer">
						<span class="deal-time-diff" style="display:none;"><?php echo esc_html( $time_diff ); ?></span>
						<div class="deal-countdown countdown"></div>
					</div>
					<?php endif;
				endif; ?>
				
				<?php if( isset( $header_custom_nav ) && $header_custom_nav ) : ?>
					<nav class="custom-slick-nav"></nav>
				<?php endif; ?>
				<?php if ( ! empty( $image[0] ) ) : ?>
					<img src="<?php echo esc_url( $image[0] ); ?>" alt="">
				<?php endif; ?>
			</header>
			<div class="products-carousel-with-bg"><?php techmarket_get_products_carousel( $shortcode_tag, $shortcode_atts, $carousel_args ) ?></div>
		</div>
	</div>
</section>
