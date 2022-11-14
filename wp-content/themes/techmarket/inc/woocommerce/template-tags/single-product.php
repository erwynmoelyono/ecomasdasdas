<?php
/**
 * Template functions for single product
 */

if ( ! function_exists ( 'techmarket_wrap_single_product' ) ) {
	function techmarket_wrap_single_product() {
		?><div class="single-product-wrapper"><?php
	}
}

if ( ! function_exists( 'techmarket_wrap_single_product_close' ) ) {
	function techmarket_wrap_single_product_close() {
		?></div><!-- /.single-product-wrapper --><?php
	}
}

if ( ! function_exists ( 'techmarket_wrap_product_images' ) ) {
	function techmarket_wrap_product_images() {
		?><div class="product-images-wrapper"><?php
	}
}

if ( ! function_exists( 'techmarket_wrap_product_images_close' ) ) {
	function techmarket_wrap_product_images_close() {
		?></div><!-- /.product-images-wrapper --><?php
	}
}

if ( ! function_exists( 'techmarket_single_product_title_wrap_open' ) ) {
	function techmarket_single_product_title_wrap_open() {
		?><div class="single-product-header"><?php
	}
}

if ( ! function_exists( 'techmarket_single_product_title_wrap_close' ) ) {
	function techmarket_single_product_title_wrap_close() {
		?></div><!-- /.single-product-header --><?php
	}
}

if ( ! function_exists( 'techmarket_single_product_meta' ) ) {
	function techmarket_single_product_meta() { ?>
		<div class="single-product-meta product_meta"><?php
			do_action( 'techmarket_single_product_meta' ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_show_product_images' ) ) {
	function techmarket_show_product_images() {
		global $post, $product;

		$post_id = 0;
		if( isset( $post->ID ) ) {
			$post_id = $post->ID;
		} elseif( is_numeric( $post ) ) {
			$post_id = $post;
		}

		$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
		$post_thumbnail_id = get_post_thumbnail_id( $post_id );
		$attachment_ids    = $product->get_gallery_image_ids();
		$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
		$thumbnail_post    = get_post( $post_thumbnail_id );
		$image_title       = $thumbnail_post->post_content;
		$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
		$wrapper_id        = 'techmarket-product-gallery-' . uniqid();
		$wrapper_classes   = apply_filters( 'techmarket_wc_single_product_image_gallery_classes', array(
			'techmarket-product-gallery',
			'techmarket-product-gallery--' . $placeholder,
			'techmarket-product-gallery--columns-' . absint( $columns ),
			'thumb-count-' . count( $attachment_ids ),
			'images',
		) );
		$carousel_single_args     = apply_filters( 'techmarket_wc_product_single_carousel_args', array(
			'infinite'			=> false,
			'slidesToShow'		=> 1,
			'slidesToScroll'	=> 1,
			'arrows'			=> false,
			'asNavFor'			=> '#' . $wrapper_id . ' .techmarket-wc-product-gallery-thumbnails__wrapper'
		) );
		$carousel_gallery_args    = apply_filters( 'techmarket_wc_product_gallery_carousel_args', array(
			'infinite'			=> false,
			'slidesToShow'		=> 3,
			'slidesToScroll'	=> 1,
			'arrows'			=> true,
			'dots'				=> false,
			'asNavFor'			=> '#' . $wrapper_id . ' .techmarket-wc-product-gallery__wrapper',
			'vertical'			=> true,
			'verticalSwiping'	=> true,
			'focusOnSelect'		=> true,
			'touchMove'			=> true,
			'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-up"></i></a>',
			'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-down"></i></a>',
			'responsive'		=> array(
				array(
					'breakpoint'	=> 767,
					'settings'		=> array(
						'vertical'			=> false,
						'verticalSwiping'	=> false,
						'slidesToShow'		=> 1
					)
				)
			)
		) );

		if( is_rtl() ) {
			$carousel_single_args['rtl'] = true;
		}

		?>
		<div id="<?php echo esc_attr( $wrapper_id ); ?>" class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
			<figure class="techmarket-wc-product-gallery__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery__wrapper" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_single_args ), ENT_QUOTES, 'UTF-8' ); ?>">
				<?php
				$attributes = array(
					'title'                   => $image_title,
					'data-large-image'        => $full_size_image[0],
					'data-large-image-width'  => $full_size_image[1],
					'data-large-image-height' => $full_size_image[2],
				);

				if ( has_post_thumbnail() ) {
					$html  = '<figure data-thumb="' . get_the_post_thumbnail_url( $post_id, 'shop_single' ) . '" class="techmarket-wc-product-gallery__image">';
					$html .= get_the_post_thumbnail( $post_id, 'shop_single', $attributes );
					$html .= '</figure>';
				} else {
					$html  = '<figure class="techmarket-wc-product-gallery__image--placeholder">';
					$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'techmarket' ) );
					$html .= '</figure>';
				}

				echo apply_filters( 'techmarket_wc_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post_id ) );

				if ( $attachment_ids ) {
					foreach ( $attachment_ids as $attachment_id ) {
						$full_size_image  = wp_get_attachment_image_src( $attachment_id, 'full' );
						$thumbnail        = wp_get_attachment_image_src( $attachment_id, 'shop_single' );
						$thumbnail_post   = get_post( $attachment_id );
						$image_title      = $thumbnail_post->post_content;

						$attributes = array(
							'title'                   => $image_title,
							'data-large-image'        => $full_size_image[0],
							'data-large-image-width'  => $full_size_image[1],
							'data-large-image-height' => $full_size_image[2],
						);

						$html  = '<figure data-thumb="' . esc_url( $thumbnail[0] ) . '" class="techmarket-wc-product-gallery__image">';
						$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
				 		$html .= '</figure>';

						echo apply_filters( 'techmarket_wc_product_image_thumbnail_html', $html, $attachment_id );
					}
				}
				?>
			</figure>
			<figure class="techmarket-wc-product-gallery-thumbnails__wrapper" data-ride="tm-slick-carousel" data-wrap=".techmarket-wc-product-gallery-thumbnails__wrapper" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_gallery_args ), ENT_QUOTES, 'UTF-8' ); ?>">
				<?php
				$attributes = array(
					'title'                   => $image_title,
					'data-large-image'        => $full_size_image[0],
					'data-large-image-width'  => $full_size_image[1],
					'data-large-image-height' => $full_size_image[2],
				);

				if ( has_post_thumbnail() ) {
					$html  = '<figure data-thumb="' . get_the_post_thumbnail_url( $post_id, 'shop_thumbnail' ) . '" class="techmarket-wc-product-gallery__image">';
					$html .= get_the_post_thumbnail( $post_id, 'shop_thumbnail', $attributes );
					$html .= '</figure>';
				} else {
					$html  = '<figure class="techmarket-wc-product-gallery__image--placeholder">';
					$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'techmarket' ) );
					$html .= '</figure>';
				}

				echo apply_filters( 'techmarket_wc_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post_id ) );

				if ( $attachment_ids ) {
					foreach ( $attachment_ids as $attachment_id ) {
						$full_size_image  = wp_get_attachment_image_src( $attachment_id, 'full' );
						$thumbnail        = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
						$thumbnail_post   = get_post( $attachment_id );
						$image_title      = $thumbnail_post->post_content;

						$attributes = array(
							'title'                   => $image_title,
							'data-large-image'        => $full_size_image[0],
							'data-large-image-width'  => $full_size_image[1],
							'data-large-image-height' => $full_size_image[2],
						);

						$html  = '<figure data-thumb="' . esc_url( $thumbnail[0] ) . '" class="techmarket-wc-product-gallery__image">';
						$html .= wp_get_attachment_image( $attachment_id, 'shop_thumbnail', false, $attributes );
				 		$html .= '</figure>';

						echo apply_filters( 'techmarket_wc_product_image_thumbnail_html', $html, $attachment_id );
					}
				}
				?>
			</figure>
		</div>
		<?php
	}
}

if ( ! function_exists( 'techmarket_wc_show_product_images' ) ) {
	function techmarket_wc_show_product_images() {
		global $post, $product;
		
		$post_id = 0;
		if( isset( $post->ID ) ) {
			$post_id = $post->ID;
		} elseif( is_numeric( $post ) ) {
			$post_id = $post;
		}

		$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
		$post_thumbnail_id = get_post_thumbnail_id( $post_id );
		$attachment_ids    = $product->get_gallery_image_ids();
		$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
		$thumbnail_post    = get_post( $post_thumbnail_id );
		$image_title       = $thumbnail_post->post_content;
		$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
		$wrapper_id        = 'techmarket-single-product-gallery-' . uniqid();
		$wrapper_classes   = apply_filters( 'techmarket_single_product_image_gallery_classes', array(
			'techmarket-single-product-gallery',
			'techmarket-single-product-gallery--' . $placeholder,
			'techmarket-single-product-gallery--columns-' . absint( $columns ),
			'thumb-count-' . count( $attachment_ids ),
			'images',
		) );
		$carousel_single_args     = apply_filters( 'techmarket_product_single_carousel_args', array(
			'infinite'			=> false,
			'slidesToShow'		=> 1,
			'slidesToScroll'	=> 1,
			'arrows'			=> false,
			'asNavFor'			=> '#' . $wrapper_id . ' .techmarket-single-product-gallery-thumbnails__wrapper'
		) );
		$carousel_gallery_args    = apply_filters( 'techmarket_wc_product_gallery_carousel_args', array(
			'infinite'			=> false,
			'slidesToShow'		=> 4,
			'slidesToScroll'	=> 1,
			'arrows'			=> true,
			'dots'				=> false,
			'asNavFor'			=> '#' . $wrapper_id . ' .woocommerce-product-gallery__wrapper',
			'vertical'			=> true,
			'verticalSwiping'	=> true,
			'focusOnSelect'		=> true,
			'touchMove'			=> true,
			'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-up"></i></a>',
			'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-down"></i></a>',
			'responsive'		=> array(
				array(
					'breakpoint'	=> 767,
					'settings'		=> array(
						'vertical'			=> false,
						'verticalSwiping'	=> false,
						'slidesToShow'		=> 3
					)
				)
			)
		) );

		if( is_rtl() ) {
			$carousel_single_args['rtl'] = true;
		}

		?>
		<div id="<?php echo esc_attr( $wrapper_id ); ?>" class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
			<div class="techmarket-single-product-gallery-images" data-ride="tm-slick-carousel" data-wrap=".woocommerce-product-gallery__wrapper" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_single_args ), ENT_QUOTES, 'UTF-8' ); ?>">
				<?php woocommerce_show_product_images(); ?>
			</div>
			<div class="techmarket-single-product-gallery-thumbnails" data-ride="tm-slick-carousel" data-wrap=".techmarket-single-product-gallery-thumbnails__wrapper" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_gallery_args ), ENT_QUOTES, 'UTF-8' ); ?>">
				<figure class="techmarket-single-product-gallery-thumbnails__wrapper">
					<?php
					$attributes = array(
						'title'                   => $image_title,
						'data-large-image'        => $full_size_image[0],
						'data-large-image-width'  => $full_size_image[1],
						'data-large-image-height' => $full_size_image[2],
					);

					if ( has_post_thumbnail() ) {
						$html  = '<figure data-thumb="' . get_the_post_thumbnail_url( $post_id, 'shop_thumbnail' ) . '" class="techmarket-wc-product-gallery__image">';
						$html .= get_the_post_thumbnail( $post_id, 'shop_thumbnail', $attributes );
						$html .= '</figure>';
					} else {
						$html  = '<figure class="techmarket-wc-product-gallery__image--placeholder">';
						$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'techmarket' ) );
						$html .= '</figure>';
					}

					echo apply_filters( 'techmarket_wc_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post_id ) );

					if ( $attachment_ids ) {
						foreach ( $attachment_ids as $attachment_id ) {
							$full_size_image  = wp_get_attachment_image_src( $attachment_id, 'full' );
							$thumbnail        = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
							$thumbnail_post   = get_post( $attachment_id );
							$image_title      = $thumbnail_post->post_content;

							$attributes = array(
								'title'                   => $image_title,
								'data-large-image'        => $full_size_image[0],
								'data-large-image-width'  => $full_size_image[1],
								'data-large-image-height' => $full_size_image[2],
							);

							$html  = '<figure data-thumb="' . esc_url( $thumbnail[0] ) . '" class="techmarket-wc-product-gallery__image">';
							$html .= wp_get_attachment_image( $attachment_id, 'shop_thumbnail', false, $attributes );
					 		$html .= '</figure>';

							echo apply_filters( 'techmarket_wc_product_image_thumbnail_html', $html, $attachment_id );
						}
					}
					?>
				</figure>
			</div>
			<?php
				$custom_script = "
					jQuery(document).ready( function($){
						$( 'body' ).on( 'woocommerce_gallery_init_zoom', function( e ) {
							$('.woocommerce-product-gallery__wrapper').slick( 'slickGoTo', 0 );
						});
					} );
				";

				if( apply_filters( 'techmarket_single_product_zoom_enabled', get_theme_support( 'wc-product-gallery-zoom' ) ) ) {
					$custom_script .= "
						jQuery(document).ready( function($){
							$( '.techmarket-single-product-gallery-images' ).each( function() {
								var target = $( this ).find( '.woocommerce-product-gallery' );
									images = $( '.woocommerce-product-gallery__image', target );
								var zoomTarget   = images,
									galleryWidth = target.width(),
									zoomEnabled  = false;

								$( zoomTarget ).each( function( index, target ) {
									var image = $( target ).find( 'img' );

									if ( image.data( 'large_image_width' ) > galleryWidth ) {
										zoomEnabled = true;
										return false;
									}
								} );

								// But only zoom if the img is larger than its container.
								if ( zoomEnabled ) {
									var zoom_options = {
										touch: false
									};

									if ( 'ontouchstart' in window ) {
										zoom_options.on = 'click';
									}

									zoomTarget.trigger( 'zoom.destroy' );
									zoomTarget.zoom( zoom_options );
								}
							} );
						} );
					";
				}
				wp_add_inline_script( 'techmarket-scripts', $custom_script );
			?>
		</div>
		<?php
	}
}

if( ! function_exists( 'techmarket_wc_show_product_thumbnails' ) ) {
	/**
	 *
	 */
	function techmarket_wc_show_product_thumbnails() {
		global $post, $product;
		
		$post_id = 0;
		if( isset( $post->ID ) ) {
			$post_id = $post->ID;
		} elseif( is_numeric( $post ) ) {
			$post_id = $post;
		}

		$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
		$post_thumbnail_id = get_post_thumbnail_id( $post_id );
		$attachment_ids    = $product->get_gallery_image_ids();
		$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
		$thumbnail_post    = get_post( $post_thumbnail_id );
		$image_title       = $thumbnail_post->post_content;
		$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
		$wrapper_id        = 'techmarket-wc-product-gallery-' . uniqid();
		$wrapper_classes   = apply_filters( 'techmarket_wc_single_product_image_gallery_classes', array(
			'techmarket-wc-product-gallery',
			'techmarket-wc-product-gallery--' . $placeholder,
			'techmarket-wc-product-gallery--columns-' . absint( $columns ),
			'thumb-count-' . count( $attachment_ids ),
			'images',
		) );
		$carousel_args     = apply_filters( 'techmarket_wc_product_thumbnails_carousel_args', array(
			'selector'		=> '.techmarket-wc-product-gallery__wrapper > .techmarket-wc-product-gallery__image',
			'animation'		=> 'slide',
			'controlNav'	=> false,
			'animationLoop'	=> false,
			'slideshow'		=> false,
			'itemWidth'		=> 100,
			'direction'		=> 'vertical',
			'asNavFor'		=> '.woocommerce-product-gallery'
		) );

		?>
		<div id="<?php echo esc_attr( $wrapper_id ); ?>" class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
			<figure class="techmarket-wc-product-gallery__wrapper">
				<?php
				$attributes = array(
					'title'                   => $image_title,
					'data-large-image'        => $full_size_image[0],
					'data-large-image-width'  => $full_size_image[1],
					'data-large-image-height' => $full_size_image[2],
				);

				if ( has_post_thumbnail() ) {
					$html  = '<figure data-thumb="' . get_the_post_thumbnail_url( $post_id, 'shop_thumbnail' ) . '" class="techmarket-wc-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
					$html .= get_the_post_thumbnail( $post_id, 'shop_thumbnail', $attributes );
					$html .= '</a></figure>';
				} else {
					$html  = '<figure class="techmarket-wc-product-gallery__image--placeholder">';
					$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'techmarket' ) );
					$html .= '</figure>';
				}

				echo apply_filters( 'techmarket_wc_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post_id ) );

				if ( $attachment_ids ) {
					foreach ( $attachment_ids as $attachment_id ) {
						$full_size_image  = wp_get_attachment_image_src( $attachment_id, 'full' );
						$thumbnail        = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
						$thumbnail_post   = get_post( $attachment_id );
						$image_title      = $thumbnail_post->post_content;

						$attributes = array(
							'title'                   => $image_title,
							'data-large-image'        => $full_size_image[0],
							'data-large-image-width'  => $full_size_image[1],
							'data-large-image-height' => $full_size_image[2],
						);

						$html  = '<figure data-thumb="' . esc_url( $thumbnail[0] ) . '" class="techmarket-wc-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
						$html .= wp_get_attachment_image( $attachment_id, 'shop_thumbnail', false, $attributes );
				 		$html .= '</a></figure>';

						echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
					}
				}
				?>
			</figure>
		</div>
		<?php
			$custom_script = "
				jQuery(document).ready( function($){
					var flex = $( '#" . esc_attr( $wrapper_id ) . "' );
					var flex_args = " . json_encode( $carousel_args ) . ";
					flex_args.asNavFor = flex.siblings( flex_args.asNavFor );
					flex.flexslider( flex_args );
				} );
			";
			wp_add_inline_script( 'techmarket-scripts', $custom_script );
	}
}

if ( ! function_exists( 'techmarket_wc_single_product_carousel_option_remove_thumb' ) ) {
	function techmarket_wc_single_product_carousel_option_remove_thumb( $args ) {
		$args['controlNav'] = false;
		return $args;
	}
}

if ( ! function_exists( 'techmarket_single_product_sku' ) ) {
	/**
	 * Outputs shop product sku
	 */
	function techmarket_single_product_sku() {

		global $product;

		// if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) {
		if ( wc_product_sku_enabled() ) {
			?><span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'techmarket' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'techmarket' ); ?></span></span><?php
		}
	}
}

if ( ! function_exists( 'techmarket_single_product_categories' ) ) {
	/**
	 * Outputs shop product categories
	 */
	function techmarket_single_product_categories() {

		global $product;

		echo wc_get_product_category_list( $product->get_id(), '> ', '<span class="posted_in categories">', '</span>' );
	}
}

if ( ! function_exists( 'techmarket_single_product_tags' ) ) {
	/**
	 * Outputs shop product sku
	 */
	function techmarket_single_product_tags() {

		global $product;

		echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'techmarket' ) . ' ', '</span>' );
	}
}

if ( ! function_exists( 'techmarket_single_product_availability' ) ) {
	function techmarket_single_product_availability() {

		global $product;

		if ( $product->is_type( 'variable' ) ) {

			// Find all stock available variation ids
			$available_variation_ids = array();
			$available_variations = $product->get_available_variations();
			foreach ( $available_variations as $key => $available_variation ) {
				if( $available_variation['is_in_stock'] ) {
					$available_variation_ids[] = $available_variation['variation_id'];
				}
			}

			if( ! empty( $available_variation_ids ) ) {

				// Find default selected variation id
				if( method_exists( $product, 'get_default_attributes' ) ) {
					$default_attributes = $product->get_default_attributes();
				} else {
					$default_attributes = $product->get_variation_default_attributes();
				}

				foreach( $default_attributes as $key => $value ) {
					if( strpos( $key, 'attribute_' ) === 0 ) {
						continue;
					}

					unset( $default_attributes[ $key ] );
					$default_attributes[ sprintf( 'attribute_%s', $key ) ] = $value;
				}

				if( class_exists('WC_Data_Store') ) {
					$data_store = WC_Data_Store::load( 'product' );
					$variation_id = $data_store->find_matching_product_variation( $product, $default_attributes );
				} else {
					$variation_id = $product->get_matching_variation( $default_attributes );
				}

				// Check default selected variation id with availability in loop page
				if( ! is_product() && ! in_array( $variation_id, $available_variation_ids ) ) {
					$variation_id = min( $available_variation_ids );
				} elseif( is_product() && empty( $variation_id ) ) {
					$variation_id = min( $available_variation_ids );
				}

			}
		}

		if( ! empty( $variation_id ) ) {
			$variation    = new WC_Product_Variation( $variation_id );
			$availability = $variation->get_availability();
		} else {
			$availability = $product->get_availability();
		}

		if ( ! empty( $availability[ 'availability'] ) ) : ?>

			<div class="availability">
				<?php echo esc_html__( 'Availability:', 'techmarket' );?> <span class="techmarket-stock-availability"><p class="stock <?php echo esc_attr( $availability['class'] ); ?>"><?php echo esc_html( $availability['availability'] ); ?></p></span>
			</div>

		<?php endif;
	}
}

if ( ! function_exists( 'techmarket_single_product_brand' ) ) {
	function techmarket_single_product_brand( $product_id = null ) {

		global $product;

		if( ! $product_id ) {
			$product_id = $product->get_id();
		}

		$brands_tax = techmarket_get_brand_taxonomy();
		$terms 		= get_the_terms( $product_id, $brands_tax );
		$brand_html = '';

		if ( $terms && ! is_wp_error( $terms ) ) {

			foreach ( $terms as $term ) {
				$thumbnail_id 	= get_term_meta( $term->term_id, 'thumbnail_id', true );

				if ( $thumbnail_id ) {
					$image_attributes = wp_get_attachment_image_src( $thumbnail_id, 'full' );

					if( $image_attributes ) {
						$image_src = $image_attributes[0];
					}

					$image_src = str_replace( ' ', '%20', $image_src );
					$brand_img = '<img src="' . esc_url( $image_src ) . '" alt="' . esc_attr( $term->name ) . '" />';
				} else {
					// $image_src = wc_placeholder_img_src();
					// $brand_img = '<img src="' . esc_url( $image_src ) . '" alt="' . esc_attr( $term->name ) . '" />';
					$brand_img = $term->name;
				}

				$brand_html .= '<a href="' . esc_url( get_term_link( $term ) ). '">' . $brand_img . '</a>';
			}
		}

		if ( ! empty( $brand_html ) ) : ?>

		<div class="brand">
			<?php echo wp_kses_post( $brand_html ); ?>
		</div><?php

		endif;
	}
}

if ( ! function_exists( 'techmarket_single_product_cat_and_sku' ) ) {
	function techmarket_single_product_cat_and_sku() { ?>
		<div class="cat-and-sku">
			<?php techmarket_single_product_categories(); ?>
			<?php techmarket_single_product_sku(); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_single_product_action' ) ) {
	function techmarket_single_product_action() { ?>
		<div class="product-actions-wrapper">
			<div class="product-actions"><?php
				do_action( 'techmarket_single_product_action' ); ?>
			</div>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_product_description_tab' ) ) {
	function techmarket_product_description_tab() { ?>
		<div class="techmarket-description">';
			<?php wc_get_template( 'single-product/tabs/description.php' ); ?>
		</div><?php
		woocommerce_template_single_meta();
	}
}

if ( ! function_exists( 'techmarket_product_accessories_tab' ) ) {
	function techmarket_product_accessories_tab() {
		techmarket_get_template( 'shop/single-product/tabs/accessories.php' );
	}
}

if ( ! function_exists( 'techmarket_product_specification_tab' ) ) {
	function techmarket_product_specification_tab() {
		techmarket_get_template( 'shop/single-product/tabs/specifications.php' );
	}
}

if ( ! function_exists( 'techmarket_output_product_data_tabs' ) ) {
	function techmarket_output_product_data_tabs() {
		techmarket_get_template( 'shop/single-product/tabs/techmarket-tabs.php' );
	}
}

if ( ! function_exists( 'techmarket_wc_review_meta' ) ) {
	function techmarket_wc_review_meta( $comment ) {

		if ( $comment->comment_approved == '0' ) : ?>

			<p class="meta"><em><?php _e( 'Your comment is awaiting approval', 'techmarket' ); ?></em></p>

		<?php else : ?>

			<p class="meta">
				<strong><?php comment_author(); ?></strong> <?php
					if ( get_option( 'woocommerce_review_rating_verification_label' ) === 'yes' )
						if ( isset( $verified ) && $verified )
							echo '<em class="verified">(' . esc_html__( 'verified owner', 'techmarket' ) . ')</em> ';
				?>&ndash; <time datetime="<?php echo get_comment_date( 'c' ); ?>"><?php echo get_comment_date( wc_date_format() ); ?></time>
			</p>

		<?php endif;
	}
}

if ( ! function_exists( 'techmarket_output_related_products' ) ) {
	function techmarket_output_related_products() {
		if ( apply_filters( 'techmarket_enable_related_products', true ) ) {
			woocommerce_output_related_products();
		}
	}
}

if ( ! function_exists( 'techmarket_single_product_label' ) ) {
	function techmarket_single_product_label() { ?>
		<div class="product-label"><?php
			techmarket_template_loop_product_labels(); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_single_product_additional_info' ) ) {
	function techmarket_single_product_additional_info() {

		$additional_info = get_post_meta( get_the_ID(), '_additional_info', true );
		if( ! empty( $additional_info ) ) {
			?><div class="additional-info">
				<?php echo wp_kses_post( $additional_info ); ?>
			</div><?php
		}
	}
}

if ( ! function_exists( 'techmarket_wrap_rating_and_sharing_open' ) ) {
	function techmarket_wrap_rating_and_sharing_open() {
		?><div class="rating-and-sharing-wrapper"><?php
	}
}

if ( ! function_exists( 'techmarket_wrap_rating_and_sharing_close' ) ) {
	function techmarket_wrap_rating_and_sharing_close() {
		?></div><!-- /.rating-and-sharing-wrapper --><?php
	}
}

if ( ! function_exists ( 'techmarket_wc_gallery_thumbnail_size' ) ) {
    function techmarket_wc_gallery_thumbnail_size( $size ) {
        return 'woocommerce_single';
    }
}

if ( ! function_exists( 'techmarket_single_product_review_comment_text_inner_open' ) ) {
    function techmarket_single_product_review_comment_text_inner_open() {
        ?><div class="comment-text-inner"><?php
    }
}

if ( ! function_exists( 'techmarket_single_product_review_comment_text_inner_close' ) ) {
    function techmarket_single_product_review_comment_text_inner_close() {
        ?></div><!-- /.comment-text-inner --><?php
    }
}