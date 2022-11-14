<?php

$r = new WP_Query( apply_filters( 'techmarket_recent_posts_widget_args', array(
	'posts_per_page'      => $instance['number'],
	'no_found_rows'       => true,
	'post_status'         => 'publish',
	'ignore_sticky_posts' => true
) ) );

$section_id = 'posts-carousel-' . uniqid();

$carousel_args 	= apply_filters( 'techmarket_posts_carousel_widget_carousel_args', array(
	'slidesToShow'	=> 1,
	'slidesToScroll'=> 1,
	'dots'			=> false,
	'arrows'		=> true,
	'prevArrow'		=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
	'nextArrow'		=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
) );

$header_custom_nav = apply_filters( 'techmarket_posts_carousel_widget_show_custom_nav', true );

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

if ($r->have_posts()) :

	echo wp_kses_post( $args['before_widget'] );
	?>

	<section id="<?php echo esc_attr( $section_id );?>" class="section-posts-carousel">
		<?php if ( ! empty( $instance['title'] ) ) : ?>
		<header class="section-header">
			<?php if( ! empty( $instance['title'] ) ) : ?>
				<h2 class="section-title"><?php echo wp_kses_post( $instance['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( $header_custom_nav ) : ?>
				<div class="custom-slick-nav"></div>
			<?php endif; ?>
		</header>
		<?php endif; ?>

		<div data-ride="tm-slick-carousel" data-wrap=".post-items" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
			<div class="post-items">
				<?php while ( $r->have_posts() ) : $r->the_post(); ?>
					<?php
						$categories_list	= get_the_category_list( esc_html__( ', ', 'techmarket' ) );
					?>
					<div class="post-item">
						<a class="post-thumbnail" href="<?php the_permalink(); ?>">
							<?php echo techmarket_post_thumbnail( 'techmarket-blog-carousel' ); ?>
						</a>
						<div class="post-content">
							<?php if ( $instance['show_category'] && $categories_list ) : ?>
								<span class="post-category"><?php echo wp_kses_post( $categories_list ); ?></span> -
							<?php endif; ?>
							<?php if ( $instance['show_date'] ) : ?>
								<span class="post-date"><?php echo get_the_date(); ?></span>
							<?php endif; ?>
							<a class ="post-name" href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
							<?php techmarket_comment_meta(); ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<?php

	echo wp_kses_post( $args['after_widget'] );

endif;

wp_reset_postdata();
