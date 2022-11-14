<?php
/**
 * 3-2-3 Product cards tabs with featured product
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( empty( $args['tabs'] ) ) {
	return;
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

$section_class = empty( $section_class ) ? 'section-3-2-3-product-cards-tabs-with-featured-product stretch-full-width' : $section_class . ' section-3-2-3-product-cards-tabs-with-featured-product stretch-full-width';

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$header_nav_align = empty( $header_nav_align ) ? 'justify-content-center' : $header_nav_align;

$default_active_tab = isset( $default_active_tab ) && ( $default_active_tab >= 1 ) ? ( $default_active_tab - 1 ) : 3;

$tab_uniqid = 'tab-' . uniqid();
?>
<section class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>

	<div class="col-full">

		<header class="section-header">
			<?php if( ! empty( $section_title ) ) : ?>
				<h2 class="section-title"><?php echo wp_kses_post( $section_title ); ?></h2>
			<?php endif; ?>
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
		</header>

		<div class="tab-content">

			<?php foreach( $args['tabs'] as $key => $tab ) :

				$tab_id = $tab_uniqid . $key; ?>

				<?php if ( !empty( $tab['title'] ) ) : ?>

				<div class="tab-pane <?php if ( $key == $default_active_tab ) echo esc_attr( 'active' ); ?>" id="<?php echo esc_attr( $tab_id ); ?>" role="tabpanel">
					<?php 
						$shortcode_tag 		= isset( $tab['shortcode_tag'] ) ? $tab['shortcode_tag'] : 'sale_products';
						$default_atts 		= array( 'per_page' => 9 );
						$shortcode_atts 	= wp_parse_args( $default_atts, $tab['shortcode_atts'] );
						$products 			= Techmarket_Products::$shortcode_tag( $shortcode_atts );
						$products_count 	= 0;

						if ( $products->have_posts() ) {
							?>
							<div class="product-cards-3-2-3-with-featured-product">
								<div class="row">
									<div class="products-3">
										<div class="woocommerce columns-1">
											
											<?php woocommerce_product_loop_start();

											while ( $products->have_posts() ) : $products->the_post();

												global $post;
												
												if( ! is_a( $post, 'WP_Query' ) && is_numeric( $post ) ) {
													$post_object = get_post( $post );
													$GLOBALS['post'] =& $post_object; // WPCS: override ok.
													setup_postdata( $post_object );
												}
												
												if ( $products_count == 3 ) {
													woocommerce_product_loop_end();
													echo '</div></div><div class="products-3-with-featured"><div class="woocommerce columns-1">';
													woocommerce_product_loop_start();
												} elseif ( $products_count == 6 ) {
													woocommerce_product_loop_end();
													echo '</div></div><div class="products-3"><div class="woocommerce columns-1">';
													woocommerce_product_loop_start();
												}
													
													if ( $products_count == 3 ) {
														techmarket_get_template( 'content-landscape-product-card-featured.php', array(), 'templates/contents/' );
													} else {
														techmarket_get_template( 'content-landscape-product-card.php', array(), 'templates/contents/' );
													}

												$products_count++;

											endwhile;

											woocommerce_product_loop_end(); ?>
									
										</div>
									</div>
								</div>
							</div>
							<?php
						}

						woocommerce_reset_loop();
						wp_reset_postdata();
					?>
				</div>

				<?php endif; ?>

			<?php endforeach; ?>

		</div>

	</div>

</section>
