<?php
/**
 * Products Carousel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( isset( $shortcode_atts['template'] ) && in_array( $shortcode_atts['template'], array( 'content-landscape-product-card-featured' ) ) ) {
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
}

$section_class = empty( $section_class ) ? 'section-products-carousel' : $section_class;
$section_class = ( isset( $carousel_args['slidesPerRow'] ) && $carousel_args['slidesPerRow'] > 1 ) ? $section_class . ' row-multiple' : $section_class;

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'section-products-carousel-' . uniqid();

if( isset( $header_custom_nav ) && $header_custom_nav ) {
	$carousel_args['arrows'] = true;
	$carousel_args['appendArrows'] = '#' . $section_id . ' .custom-slick-nav';
}

?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
	<header class="section-header">
		<?php if( ! empty( $pre_title ) ) : ?>
			<h4 class="pretitle"><?php echo wp_kses_post ( $pre_title ); ?></h4>
		<?php endif; ?>
		<?php if( ! empty( $section_title ) ) : ?>
			<h2 class="section-title"><?php echo wp_kses_post ( $section_title ); ?></h2>
		<?php endif; ?>
		<?php if( isset( $header_custom_nav ) && $header_custom_nav ) : ?>
			<nav class="custom-slick-nav"></nav>
		<?php endif; ?>
	</header>
	<?php techmarket_get_products_carousel( $shortcode_tag, $shortcode_atts, $carousel_args ) ?>
</section>