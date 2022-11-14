<?php
/**
 * Product Categories Carousel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_class = empty( $section_args['section_class'] ) ? 'section-categories-carousel' : $section_args['section_class'] . ' section-categories-carousel';

if ( ! empty( $section_args['animation'] ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'categories-carousel-' . uniqid();
$category_args = techmarket_get_atts_for_taxonomy_slugs( $category_args );

if( isset( $section_args['header_custom_nav'] ) && $section_args['header_custom_nav'] ) {
	$carousel_args['arrows'] = true;
	$carousel_args['appendArrows'] = '#' . $section_id . ' .custom-slick-nav';
}

if( is_rtl() ) {
	$carousel_args['rtl'] = true;
	if( isset( $carousel_args['prevArrow'] ) && isset( $carousel_args['nextArrow'] ) ) {
		$carousel_args_temp_arrow = $carousel_args['prevArrow'];
		$carousel_args['prevArrow'] = $carousel_args['nextArrow'];
		$carousel_args['nextArrow'] = $carousel_args_temp_arrow;
	}
}

?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $section_args['animation'] ) ): ?>data-animation="<?php echo esc_attr( $section_args['animation'] );?>"<?php endif; ?>>
	<header class="section-header">
		<?php if( ! empty( $section_args['pre_title'] ) ) : ?>
			<h4 class="pre-title"><?php echo wp_kses_post ( $section_args['pre_title'] ); ?></h4>
		<?php endif; ?>
		<?php if( ! empty( $section_args['section_title'] ) ) : ?>
			<h2 class="section-title"><?php echo wp_kses_post ( $section_args['section_title'] ); ?></h2>
		<?php endif; ?>
		<?php if( isset( $section_args['header_custom_nav'] ) && $section_args['header_custom_nav'] ) : ?>
			<nav class="custom-slick-nav"></nav>
		<?php endif; ?>
		<?php if( ! empty( $section_args['button_text'] ) ) : ?>
			<a href="<?php echo esc_url( $section_args['button_link'] ); ?>" class="readmore-link"><?php echo wp_kses_post( $section_args['button_text'] ); ?></a>
		<?php endif; ?>
	</header>
	<div class="product-categories product-categories-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
		<?php echo Techmarket_Products::product_categories( $category_args ); ?>
	</div>
</section>