<?php
/**
 * Brands Carousel
 *
 * @author 		Transvelo
 * @package 	Techmarket/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_class = empty( $section_args['section_class'] ) ? 'brands-carousel' : $section_args['section_class'] . ' brands-carousel';

if ( ! empty( $section_args['animation'] ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'brands-carousel-' . uniqid();

if( isset( $section_args['header_custom_nav'] ) && $section_args['header_custom_nav'] ) {
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

$img_classes = apply_filters( 'techmarket_bc_should_desaturate', true ) ? 'img-responsive desaturate' : 'img-responsive'; ?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $section_args['animation'] ) ): ?>data-animation="<?php echo esc_attr( $section_args['animation'] );?>"<?php endif; ?>>
	<h2 class="sr-only"><?php echo empty( $section_args['section_title'] ) ? esc_html__( 'Brands Carousel', 'techmarket' ) : esc_html( $section_args['section_title'] ); ?></h2>
	<div class="col-full" data-ride="tm-slick-carousel" data-wrap=".brands" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
		<div class="brands">
		
			<?php foreach ( $terms as $term ) :	?>
			
			<div class="item">
				<a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
				<figure>
					<figcaption class="text-overlay">
						<div class="info">
							<h4><?php echo esc_html( $term->name ); ?></h4>
						</div><!-- /.info -->
					</figcaption>
				<?php
					$thumbnail_id 	  = get_term_meta( $term->term_id, 'thumbnail_id', true );
					$image_attributes = '';

					if ( $thumbnail_id ) {
						
						$image_attributes = wp_get_attachment_image_src( $thumbnail_id, 'full' );
						
						if( $image_attributes ) {
							$image_src    = $image_attributes[0];
							$image_width  = $image_attributes[1];
							$image_height = $image_attributes[2];
						}
					} 

					
					if ( empty( $image_attributes ) ) {
						
						$dimensions   = wc_get_image_size( 'shop_thumbnail' );
						$image_src    = wc_placeholder_img_src();
						$image_width  = $dimensions['width'];
						$image_height = $dimensions['height'];
					}

					$image_src = str_replace( ' ', '%20', $image_src ); 
				?>
					<img src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $term->name ); ?>" width="<?php echo esc_attr( $image_width ); ?>" height="<?php echo esc_attr( $image_height ); ?>" class="<?php echo esc_attr( $img_classes ); ?>">
				</figure>
				</a>
			</div><!-- /.item -->

			<?php endforeach; ?>
			
		</div>
	</div>
</section>