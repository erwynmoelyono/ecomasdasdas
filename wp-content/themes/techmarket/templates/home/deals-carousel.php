<?php
/**
 * Deals Carousel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_class = empty( $section_class ) ? 'deals-carousel' : $section_class . ' deals-carousel';

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'deals-carousel-' . uniqid();

if( isset( $header_custom_nav ) && $header_custom_nav ) {
	$carousel_args['arrows'] = true;
	$carousel_args['appendArrows'] = '#' . $section_id . ' .custom-slick-nav';
}

$default_atts 		= array( 'columns' => 1, 'template' => 'content-sale-product-with-timer' );
$shortcode_atts 	= wp_parse_args( $default_atts, $shortcode_atts );

?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
	<div class="deals-carousel-inner-block">
		<header class="section-header">
			<?php if( ! empty( $section_title ) ) : ?>
				<h2 class="section-title"><?php echo wp_kses_post ( $section_title ); ?></h2>
			<?php endif; ?>
			<?php if( isset( $header_custom_nav ) && $header_custom_nav ) : ?>
				<nav class="custom-slick-nav"></nav>
			<?php endif; ?>
		</header>
		<div class="sale-products-with-timer-carousel">
			<?php techmarket_get_products_carousel( $shortcode_tag, $shortcode_atts, $carousel_args ); ?>
		</div>
		<footer class="section-footer">
			<nav class="custom-slick-pagination">
				<?php if( is_rtl() ) : ?>
					<a href="#" class="slider-prev" data-target="#<?php echo esc_attr( $section_id ); ?> .products"><i class="tm tm-arrow-right"></i><?php echo esc_html__( 'Previous deal', 'techmarket' ); ?></a>
					<a href="#" class="slider-next" data-target="#<?php echo esc_attr( $section_id ); ?> .products"><?php echo esc_html__( 'Next deal', 'techmarket' ); ?><i class="tm tm-arrow-left"></i></a>
				<?php else : ?>
					<a href="#" class="slider-prev" data-target="#<?php echo esc_attr( $section_id ); ?> .products"><i class="tm tm-arrow-left"></i><?php echo esc_html__( 'Previous deal', 'techmarket' ); ?></a>
					<a href="#" class="slider-next" data-target="#<?php echo esc_attr( $section_id ); ?> .products"><?php echo esc_html__( 'Next deal', 'techmarket' ); ?><i class="tm tm-arrow-right"></i></a>
				<?php endif; ?>
			</nav>
		</footer>
	</div>
</section>