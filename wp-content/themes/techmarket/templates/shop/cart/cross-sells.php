<?php
/**
 * Techmarket Cross-sells
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_id                    = 'section-products-carousel' . uniqid();
$carousel_args['appendArrows'] = '#' . $section_id . ' .custom-slick-nav'; ?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="tm-cross-sells section-products-carousel">
	<header class="section-header">
			<h2 class="section-title"><?php echo apply_filters( 'techmarket_cross_sells_section_title',esc_html__( 'You may be interested in', 'techmarket' ) ); ?></h2>
			<nav class="custom-slick-nav"></nav>
	</header>
	<?php techmarket_get_products_carousel( $shortcode_tag, $shortcode_atts, $carousel_args ) ?>
</section>