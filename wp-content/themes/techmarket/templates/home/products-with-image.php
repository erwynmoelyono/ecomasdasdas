<?php
/**
 * Products Carousel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_class = empty( $section_class ) ? 'section-products-with-image' : $section_class;

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'section-products-with-image-' . uniqid();

?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
	<header class="section-header">
		<div class="col-full">
			<div class="row">
				<div class="product-info">
					<?php if( ! empty( $section_title ) ) : ?>
						<h2 class="section-title"><?php echo wp_kses_post ( $section_title ); ?></h2>
					<?php endif; ?>
					<?php if( ! empty( $description ) ) : ?>
						<div class="description"><?php echo wp_kses_post( $description ); ?></div>
					<?php endif; ?>
				</div>
				<div class="product-image">
					<?php if ( ! empty( $image[0] ) ) : ?>
						<img src="<?php echo esc_url( $image[0] ); ?>" alt="">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>
	<?php echo techmarket_do_shortcode( $shortcode_tag, $shortcode_atts ); ?>
	<?php if( ! empty( $action_text ) ) : ?>
		<a class="load-more-button" href="<?php echo esc_url( $action_link ); ?>"><?php echo wp_kses_post( $action_text ); ?></a>
	<?php endif; ?>
</section>