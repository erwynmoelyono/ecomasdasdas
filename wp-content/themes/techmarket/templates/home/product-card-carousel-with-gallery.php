<?php
/**
 * Products Carousel
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

$section_class = empty( $section_class ) ? 'section-landscape-product-card-with-gallery' : $section_class;

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'section-landscape-product-card-with-gallery-' . uniqid();

if( isset( $header_custom_nav ) && $header_custom_nav ) {
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
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
	<?php ob_start(); ?>
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
	<?php $header_content_output = ob_get_clean(); ?>
	<div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
		<div class="container-fluid">
			<?php
				$default_atts 		= array( 'columns' => 1 );
				$shortcode_atts 	= wp_parse_args( $default_atts, $shortcode_atts );
				$products 			= Techmarket_Products::$shortcode_tag( $shortcode_atts );

				if ( $products->have_posts() ) {
					?>
					<div class="woocommerce columns-1">
						
						<?php woocommerce_product_loop_start();

						while ( $products->have_posts() ) : $products->the_post();

							?><div <?php post_class( 'content-landscape-product-card-with-gallery' ); ?>><?php
								techmarket_template_loop_media_open();
								techmarket_template_loop_media_body_open();
								echo wp_kses_post( $header_content_output );
								woocommerce_template_loop_product_link_open();
								techmarket_template_loop_product_labels();
								woocommerce_template_loop_price();
								woocommerce_template_loop_product_title();
								techmarket_template_loop_rating();
								woocommerce_template_loop_product_link_close();
								woocommerce_template_loop_add_to_cart();
								techmarket_template_loop_media_body_close();
								techmarket_wrap_product_images();
								techmarket_show_product_images();
								techmarket_wrap_product_images_close();
								techmarket_template_loop_media_close();
							?></div><?php

						endwhile;

						woocommerce_product_loop_end(); ?>
				
					</div>
					<?php
				}

				woocommerce_reset_loop();
				wp_reset_postdata();
			?>
		</div>
	</div>
</section>