<?php
/**
 * Deals Carousel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load Single Product Gallery Scripts
$assets_path = str_replace( array( 'http:', 'https:' ), '', WC()->plugin_url() ) . '/assets/';
$suffix      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
wp_enqueue_script( 'zoom', $assets_path . 'js/zoom/jquery.zoom' . $suffix . '.js', array( 'jquery' ), '1.7.15', true );
wp_enqueue_script( 'flexslider', $assets_path . 'js/flexslider/jquery.flexslider' . $suffix . '.js', array( 'jquery' ), '2.6.1', true );
wp_enqueue_script( 'photoswipe', $assets_path . 'js/photoswipe/photoswipe' . $suffix . '.js', array( 'jquery' ), '4.1.1', true );
wp_enqueue_script( 'photoswipe-ui-default', $assets_path . 'js/photoswipe/photoswipe-ui-default' . $suffix . '.js', array( 'jquery' ), '4.1.1', true );
wp_enqueue_script( 'wc-single-product', $assets_path . 'js/frontend/single-product' . $suffix . '.js', array( 'jquery' ), WC_VERSION, true );
wp_enqueue_style( 'photoswipe', $assets_path . 'css/photoswipe/photoswipe.css' );
wp_enqueue_style( 'photoswipe-default-skin', $assets_path . 'css/photoswipe/default-skin/default-skin.css' );

$section_class = empty( $section_class ) ? 'deals-carousel-v2' : $section_class . ' deals-carousel-v2';

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'deals-carousel-v2' . uniqid();

if( isset( $header_custom_nav ) && $header_custom_nav ) {
	$carousel_args['arrows'] = true;
	$carousel_args['appendArrows'] = '#' . $section_id . ' .custom-slick-pagination';
}

$default_atts 		= array( 'template' => 'content-onsale-product-carousel-with-timer' );
$shortcode_atts 	= wp_parse_args( $default_atts, $shortcode_atts );

?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
	<div class="deals-carousel-inner-block">
		<header class="section-header">
			<?php if( ! empty( $section_title ) ) : ?>
				<h2 class="section-title"><?php echo wp_kses_post ( $section_title ); ?></h2>
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
				<nav class="custom-slick-pagination"></nav>
			<?php endif; ?>
		</header>
		<div class="sale-products-with-timer-carousel">
			<?php techmarket_get_products_carousel( $shortcode_tag, $shortcode_atts, $carousel_args ) ?>
		</div>
	</div>
</section>