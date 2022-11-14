<?php
/**
 * Daily Deals
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( empty( $args['tabs'] ) ) {
	return;
}

$section_class = empty( $section_class ) ? 'section-6-1-6-products-tabs' : $section_class . ' section-6-1-6-products-tabs';

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$header_nav_align = empty( $header_nav_align ) ? 'justify-content-center' : $header_nav_align;

$default_active_tab = empty( $default_active_tab ) ? 1 : $default_active_tab;

$tab_uniqid = 'tab-' . uniqid();
?>
<section class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>

	<?php if( ! empty( $section_title ) ) : ?>
		<header class="section-header">
			<h2 class="section-title"><?php echo wp_kses_post( $section_title ); ?></h2>
		</header>
	<?php endif; ?>

	<div class="6-1-6-products-tabs">
		<ul class="nav <?php echo esc_attr( $header_nav_align ); ?>" role="tablist">
			<?php foreach( $args['tabs'] as $key => $tab ) :

				$tab_id = $tab_uniqid . $key; ?>

				<?php if ( !empty( $tab['title'] ) ) : ?>

				<li class="nav-item">
					<a data-toggle="tab" href="#<?php echo esc_attr( $tab_id ); ?>" class="nav-link <?php if ( $key == $default_active_tab ) echo esc_attr( 'active' ); ?>"><?php echo wp_kses_post ( $tab['title'] ); ?></a>
				</li>

				<?php endif; ?>

			<?php endforeach; ?>
		</ul>

		<div class="tab-content">

			<?php foreach( $args['tabs'] as $key => $tab ) :

				$tab_id = $tab_uniqid . $key; ?>

				<?php if ( !empty( $tab['title'] ) ) : ?>

				<div class="tab-pane <?php if ( $key == $default_active_tab ) echo esc_attr( 'active' ); ?>" id="<?php echo esc_attr( $tab_id ); ?>" role="tabpanel">
					<div class="row row-6-1-6-products">
						<?php 
							$shortcode_tag 		= isset( $tab['shortcode_tag'] ) ? $tab['shortcode_tag'] : 'sale_products';
							$default_atts 		= array( 'per_page' => 13 );
							$shortcode_atts 	= wp_parse_args( $default_atts, $tab['shortcode_atts'] );
							$products 			= Techmarket_Products::$shortcode_tag( $shortcode_atts );
							$products_count 	= 0;

							if ( $products->have_posts() ) {
								?>
								<div class="product-1">
									<div class="woocommerce columns-1">
										
										<?php woocommerce_product_loop_start();

										while ( $products->have_posts() ) : $products->the_post();

											if ( $products_count == 1 ) {
												woocommerce_product_loop_end();
												echo '</div></div><div class="products-6"><div class="woocommerce columns-3">';
												woocommerce_product_loop_start();
											} elseif ( $products_count == 7 ) {
												woocommerce_product_loop_end();
												echo '</div></div><div class="products-6"><div class="woocommerce columns-3">';
												woocommerce_product_loop_start();
											}
												
												if ( $products_count == 0 ) {
													techmarket_get_template( 'content-sale-product-with-timer.php', array(), 'templates/contents/' );
												} else {
													techmarket_get_template( 'content-product.php', array(), 'templates/contents/' );
												}

											$products_count++;

										endwhile;

										woocommerce_product_loop_end(); ?>
								
									</div>
								</div>
								<?php
							}

							woocommerce_reset_loop();
							wp_reset_postdata();
						?>
					</div>
				</div>

				<?php endif; ?>

			<?php endforeach; ?>

		</div>
	</div>

</section>
