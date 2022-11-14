<?php
/**
 * Products Carousel Vertical Tabs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( empty( $args['tabs'] ) ) {
	return;
}

$section_class = empty( $section_class ) ? 'section-products-carousel-with-vertical-tabs' : $section_class . ' section-products-carousel-with-vertical-tabs';

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$style_attr = '';
if( isset( $bg_choice ) && $bg_choice == 'color' && ! empty( $bg_color ) && ! empty( $bg_height ) ) {
	$style_attr = 'background-color:' . $bg_color  . '; height:' . $bg_height . 'px;';
} elseif ( ! empty( $bg_image[0] ) ) {
	$style_attr = 'background-size: cover; background-position: center center; background-image: url( ' . esc_url( $bg_image[0] ) . ' ); height: ' . esc_attr( $bg_image[2] ) . 'px;';
}

$default_active_tab = empty( $default_active_tab ) ? 0 : $default_active_tab;

$tab_uniqid = 'tab-' . uniqid();
?>
<section class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>

	<?php if( ! empty( $section_title ) ) : ?>
		<header class="section-header">
			<h2 class="section-title"><?php echo wp_kses_post ( $section_title ); ?></h2>
		</header>
	<?php endif; ?>

	<div class="products-carousel-with-vertical-tabs row">
		<ul class="nav" role="tablist">
			<?php foreach( $args['tabs'] as $key => $tab ) :

				$tab_id = $tab_uniqid . $key; ?>

				<?php if ( !empty( $tab['title'] ) ) : ?>

				<li class="nav-item">
					<a data-toggle="tab" href="#<?php echo esc_attr( $tab_id ); ?>" class="nav-link <?php if ( $key == $default_active_tab ) echo esc_attr( 'active' ); ?>">
						<span class="category-title"><?php echo wp_kses_post ( $tab['title'] ); ?></span>
						<?php if( is_rtl() ) : ?>
							<i class="tm tm-arrow-left"></i>
						<?php else : ?>
							<i class="tm tm-arrow-right"></i>
						<?php endif; ?>
					</a>
				</li>

				<?php endif; ?>

			<?php endforeach; ?>
		</ul>

		<div class="tab-content" <?php if ( !empty( $style_attr ) ) : ?>style="<?php echo esc_attr( $style_attr );?>"<?php endif; ?>>

			<?php foreach( $args['tabs'] as $key => $tab ) :

				$tab_id = $tab_uniqid . $key; ?>

				<?php if ( !empty( $tab['title'] ) ) : ?>

				<div class="tab-pane <?php if ( $key == $default_active_tab ) echo esc_attr( 'active' ); ?>" id="<?php echo esc_attr( $tab_id ); ?>" role="tabpanel">
					<?php techmarket_get_products_carousel( $tab['shortcode_tag'], $tab['shortcode_atts'], $carousel_args ) ?>
				</div>

				<?php endif; ?>

			<?php endforeach; ?>

		</div>
	</div>

</section>
