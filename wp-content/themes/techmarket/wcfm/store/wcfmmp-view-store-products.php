<?php
/**
 * The Template for displaying all store products.
 *
 * @package WCfM Markeplace Views Store/products
 *
 * For edit coping this to yourtheme/wcfm/store 
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $WCFM, $WCFMmp;

$counter = 0;

wc_set_loop_prop( 'is_filtered', true );
?>

<?php do_action( 'wcfmmp_store_before_products', $store_user->get_id() ); ?>

<div class="" id="products">
	<div class="product_area">
	  <div id="products-wrapper" class="products-wrapper">
	
			<?php do_action( 'wcfmmp_before_store_product', $store_user->get_id(), $store_info ); ?>
			
			<?php if ( woocommerce_product_loop() ) { ?>
				
				<?php do_action( 'wcfmmp_woocommerce_before_shop_loop_before', $store_user->get_id(), $store_info ); ?>
				<?php do_action( 'woocommerce_before_shop_loop' ); ?>
				<?php do_action( 'wcfmmp_woocommerce_before_shop_loop_after', $store_user->get_id(), $store_info ); ?>
				
				<?php do_action( 'flatsome_category_title_alt'); // Flatsome Catalog support ?>
				<?php do_action( 'wcfmmp_before_store_product_loop', $store_user->get_id(), $store_info ); ?>
				
				<?php 
				$columns = techmarket_set_loop_shop_columns();
				if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '<' ) ) {
					global $woocommerce_loop;
					$columns = ! empty( $woocommerce_loop['columns'] ) ? $woocommerce_loop['columns'] : $columns;
				} else {
					$columns = wc_get_loop_prop( 'columns', $columns );
				}
		
				$shop_views = techmarket_get_shop_views();
				?>
				<div class="tab-content">
					<?php foreach( $shop_views as $view_id => $shop_view ) : ?>
					<div id="<?php echo esc_attr( $view_id ); ?>" class="tab-pane <?php $active_class = $shop_view[ 'active' ] ? 'active': ''; echo esc_attr( $active_class ); ?>" role="tabpanel">
		
						<div class="woocommerce columns-<?php echo esc_attr( $columns ); ?>">
							<?php woocommerce_product_loop_start(); ?>
		
								<?php while ( have_posts() ) : the_post(); ?>
		
									<?php wc_get_template_part( $shop_view['template']['slug'], $shop_view['template']['name'] ); ?>
		
								<?php endwhile; // end of the loop. ?>
		
							<?php woocommerce_product_loop_end(); ?>
						</div>
		
					</div>
					<?php endforeach; ?>
				</div>
				
				<?php do_action( 'wcfmmp_after_store_product_loop', $store_user->get_id(), $store_info ); ?>
				
				<?php do_action( 'wcfmmp_woocommerce_after_shop_loop_before', $store_user->get_id(), $store_info ); ?>
				<?php do_action( 'woocommerce_after_shop_loop' ); ?>
				<?php do_action( 'wcfmmp_woocommerce_after_shop_loop_after', $store_user->get_id(), $store_info ); ?>
				
				<?php //wcfmmp_content_nav( 'nav-below' ); ?>
		
			<?php } else { ?>
				<?php do_action( 'woocommerce_no_products_found' ); ?>
			<?php } ?>
			
			<?php do_action( 'wcfmmp_after_store_product', $store_user->get_id(), $store_info ); ?>
			
		</div><!-- .products-wrapper -->
	</div><!-- #products -->
</div><!-- .product_area -->

<?php do_action( 'wcfmmp_store_after_products', $store_user->get_id() ); ?>