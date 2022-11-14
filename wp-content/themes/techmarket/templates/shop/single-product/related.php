<?php
/**
 * Techmarket Related
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wrap_id = 'tm-related-products-carousel-' . uniqid();
$carousel_args['appendArrows'] = '#' . $wrap_id . ' .custom-slick-nav'; ?>
<div id="<?php echo esc_attr( $wrap_id ); ?>" class="tm-related-products-carousel section-products-carousel">
	<section class="related">
		<header class="section-header">
				<h2 class="section-title"><?php echo apply_filters( 'techmarket_related_products_section_title',esc_html__( 'Related products', 'techmarket' ) ); ?></h2>
				<nav class="custom-slick-nav"></nav>
		</header>
		<?php techmarket_get_products_carousel( $shortcode_tag, $shortcode_atts, $carousel_args ) ?>
	</section>
</div>