<?php
/**
 * Techmarket Upsells
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wrap_id = 'tm-upsell-products-carousel-' . uniqid();
$carousel_args['appendArrows'] = '#' . $wrap_id . ' .custom-slick-nav'; ?>
<div id="<?php echo esc_attr( $wrap_id ); ?>" class="tm-upsell-products-carousel section-products-carousel">
	<section class="up-sells upsells">
		<header class="section-header">
				<h2 class="section-title"><?php echo apply_filters( 'techmarket_upsell_products_section_title',esc_html__( 'You may also like&hellip;', 'techmarket' ) ); ?></h2>
				<nav class="custom-slick-nav"></nav>
		</header>
		<?php techmarket_get_products_carousel( $shortcode_tag, $shortcode_atts, $carousel_args ) ?>
	</section>
</div>