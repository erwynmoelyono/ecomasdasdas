<?php
/**
 * Deals Carousel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_class = empty( $section_class ) ? 'deals-carousel-v3' : $section_class . ' deals-carousel-v3';

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'deals-carousel-' . uniqid();

$default_atts 		= array( 'columns' => 1, 'template' => 'content-product-carousel-with-timer-gallery' );
$shortcode_atts 	= wp_parse_args( $default_atts, $shortcode_atts );

?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
	<div class="deals-carousel-inner-block">
		<div class="sale-products-with-timer-carousel">
			<?php techmarket_get_products_carousel( $shortcode_tag, $shortcode_atts, $carousel_args ); ?>
		</div>
	</div>
</section>