<?php
/**
 * Products Isotope
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_class = empty( $section_class ) ? 'section-products-isotope-alt stretch-full-width' : $section_class . ' section-products-isotope-alt stretch-full-width';

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'section-products-isotope-' . uniqid();

?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
	<div class="col-full">
		<div class="isotope-products-wrap">
			<?php
				$products 			= Techmarket_Products::$shortcode_tag( $shortcode_atts );
				$products_count 	= 0;

				if ( $products->have_posts() ) {
					ob_start();
					?>
					<div class="section-header">
						<?php if( ! empty( $pre_title ) ) : ?>
							<h4 class="pre-title"><?php echo wp_kses_post( $pre_title ); ?></h4>
						<?php endif; ?>
						<?php if( ! empty( $section_title ) ) : ?>
							<h2 class="section-title"><?php echo wp_kses_post( $section_title ); ?></h2>
						<?php endif; ?>

						<?php if( isset( $header_timer ) && $header_timer && ! empty( $timer_value ) ) :
							$deal_end_time = strtotime( $timer_value );
							$current_time = strtotime( 'now' );
							$time_diff = ( $deal_end_time - $current_time );
							
							if( $time_diff > 0 ) : ?>
							<div class="marketing-text">
								<span><?php echo wp_kses_post( $timer_title ); ?></span>
							</div>
							<div class="deal-countdown-timer">
								<span class="deal-time-diff" style="display:none;"><?php echo esc_html( $time_diff ); ?></span>
								<div class="deal-countdown countdown"></div>
							</div>
							<?php endif;
						endif; ?>
						<?php if ( ! empty( $action_text ) && ! empty( $action_link ) ) : ?>	
							<a href="<?php echo esc_url( $action_link ); ?>" class="action button"><?php echo wp_kses_post( $action_text ); ?></a>
						<?php endif; ?>
					</div>
					<?php $header_content = ob_get_clean(); ?>
					<div class="isotope-products">
						<div class="row-1">
							<div class="woocommerce">
								
								<?php woocommerce_product_loop_start();

								while ( $products->have_posts() ) : $products->the_post();

									if ( $products_count == 0 ) {
										echo wp_kses_post( $header_content );
									} elseif ( $products_count == 8 ) {
										woocommerce_product_loop_end();
										echo '</div></div><div class="row-2"><div class="woocommerce">';
										woocommerce_product_loop_start();
									}
										
										techmarket_get_template( 'content-product-isotope.php', array(), 'templates/contents/' );

									$products_count++;

								endwhile;

								woocommerce_product_loop_end(); ?>
						
							</div>
						</div>
					</div>
					<?php
				}

				woocommerce_reset_loop();
				wp_reset_postdata();
			?>
		</div>
	</div>
</section>
