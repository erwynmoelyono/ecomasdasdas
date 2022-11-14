<?php
/**
 * Products Cards Carousel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_class = empty( $section_class ) ? 'section-landscape-full-product-cards-carousel' : $section_class . ' section-landscape-full-product-cards-carousel';

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'section-products-carousel' . uniqid();

if( isset( $header_custom_nav ) && $header_custom_nav ) {
	$carousel_args['arrows'] = true;
	$carousel_args['appendArrows'] = '#' . $section_id . ' .custom-slick-nav';
}

$style_attr = '';
if( isset( $bg_choice ) && $bg_choice == 'color' && ! empty( $bg_color ) && ! empty( $bg_height ) ) {
	$style_attr = 'background-color:' . $bg_color  . '; height:' . $bg_height . 'px;';
} elseif ( ! empty( $bg_image[0] ) ) {
	$style_attr = 'background-size: cover; background-position: center center; background-image: url( ' . esc_url( $bg_image[0] ) . ' ); height: ' . esc_attr( $bg_image[2] ) . 'px;';
}

$default_atts 		= array( 'template' => 'content-landscape-product-card' );
$shortcode_atts 	= wp_parse_args( $default_atts, $shortcode_atts );

?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?> <?php if ( !empty( $style_attr ) ) : ?>style="<?php echo esc_attr( $style_attr );?>"<?php endif; ?>>
	<div class="col-full">
		<header class="section-header">
			<?php if( ! empty( $section_title ) ) : ?>
				<h2 class="section-title"><?php echo wp_kses_post ( $section_title ); ?></h2>
			<?php endif; ?>
			<?php if( isset( $header_custom_nav ) && $header_custom_nav ) : ?>
				<nav class="custom-slick-nav"></nav>
			<?php endif; ?>
		</header>
		<div class="row">
			<div class="landscape-full-product-cards-carousel">
				<?php techmarket_get_products_carousel( $shortcode_tag, $shortcode_atts, $carousel_args ) ?>
			</div>
		</div>
	</div>
</section>
