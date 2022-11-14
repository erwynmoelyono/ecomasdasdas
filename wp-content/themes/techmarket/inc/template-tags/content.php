<?php
/**
 * Techmarket template functions used in content such as post, page, etc.
 *
 * @package techmarket
 */

if ( ! function_exists( 'techmarket_page_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function techmarket_page_header() {
		global $post;
		$page_meta_values = get_post_meta( $post->ID, '_techmarket_page_metabox', true );

		if ( isset( $page_meta_values['page_title'] ) && ! empty( $page_meta_values['page_title'] ) ) {
			$page_title = $page_meta_values['page_title'];
		} else {
			$page_title = get_the_title();
		}

		if( apply_filters( 'techmarket_show_page_header', true ) ) {
			?>
			<header class="entry-header">
				<?php techmarket_page_header_image(); ?>
				<div class="page-header-caption">
					<h1 class="entry-title"><?php echo apply_filters( 'techmarket_page_title', wp_kses_post( $page_title ) ); ?></h1>
					<?php techmarket_page_subtitle(); ?>
				</div>
			</header><!-- .entry-header -->
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_page_subtitle' ) ) {
	function techmarket_page_subtitle() {
		global $post;
		$page_meta_values = get_post_meta( $post->ID, '_techmarket_page_metabox', true );

		if ( isset( $page_meta_values['page_subtitle'] ) && ! empty( $page_meta_values['page_subtitle'] ) ) {
			?>
			<p class="entry-subtitle"><?php echo apply_filters( 'techmarket_page_subtitle', wp_kses_post( $page_meta_values['page_subtitle'] ), $post ); ?></p>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_page_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function techmarket_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'techmarket' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'techmarket_homepage_content' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function techmarket_homepage_content() {
		while ( have_posts() ) {
			the_post();

			?>
			<div class="entry-content">
				<?php
					the_content();
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'techmarket' ),
						'after'  => '</div>',
					) );
				?>
			</div>
			<?php

		} // end of the loop.
	}
}

if( ! function_exists( 'techmarket_page_header_image' ) ) {
	/**
	 * Display the page header image
	 * @since 1.0.0
	 * @return void
	 */
	function techmarket_page_header_image() {
		global $post;

		$image_url = apply_filters( 'techmarket_default_page_header_image', '' );

		if( ! is_front_page() ) {

			$image_width = apply_filters( 'techmarket_page_header_image_width', 1170 );

			if( $post ){
				$image_id = get_post_thumbnail_id( $post->ID );
				$image = wp_get_attachment_image_src( $image_id, array( $image_width, $image_width ) );
				if ( is_page() && has_post_thumbnail( $post->ID ) && $image[1] >= $image_width ) {
					echo '<div class="page-featured-image">' . get_the_post_thumbnail( $post->ID, 'full' ) . '</div>';
				}
			}
		}
	}
}

if ( ! function_exists( 'techmarket_post_meta' ) ) {
	/**
	 * Display the post meta
	 *
	 * @since 1.0.0
	 */
	function techmarket_post_meta() {
		?>
		<div class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search.

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'techmarket' ) );
			if ( $categories_list ) : ?>
				<span class="cat-links">
					<?php
					echo wp_kses_post( $categories_list );
					?>
				</span>
			<?php endif; // End if categories. ?> 

			<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'techmarket' ) );
			if ( $tags_list && apply_filters( 'techmarket_is_single_post_tags_list', false ) ) : ?>
				<span class="tags-links">
					<?php
					echo wp_kses_post( $tags_list );
					?>
				</span>
			<?php endif; // End if $tags_list. ?>

			<?php techmarket_posted_on(); ?>

			<?php if( is_multi_author() ) : ?>
				<span class="author">
					<?php
						the_author_posts_link();
					?>
				</span>
			<?php endif; ?>

			<?php endif; // End if 'post' == get_post_type(). ?>
			
		</div>
		<?php
	}
}

if ( ! function_exists( 'techmarket_comment_meta' ) ) {
	/**
	 * Display the comment meta
	 *
	 * @since 1.0.0
	 */
	function techmarket_comment_meta() {
		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( esc_html__( 'Leave a comment', 'techmarket' ), '1', '%' ); ?></span>
		<?php endif;
	}
}

if ( ! function_exists( 'techmarket_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function techmarket_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			_x( '%s', 'post date', 'techmarket' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo wp_kses( apply_filters( 'techmarket_single_post_posted_on_html', '<span class="posted-on">' . $posted_on . '</span>', $posted_on ), array(
			'span' => array(
				'class'  => array(),
			),
			'a'    => array(
				'href'  => array(),
				'title' => array(),
				'rel'   => array(),
			),
			'time' => array(
				'datetime' => array(),
				'class'    => array(),
			),
		) );
	}
}

if ( ! function_exists( 'techmarket_comment' ) ) {
	/**
	 * techmarket comment template
	 * @since 1.0.0
	 */
	function techmarket_comment( $comment, $args, $depth ) {
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment-meta';
		}
		?>
		<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
			<div class="comment_container">
				
				<?php echo get_avatar( $comment, 100 ); ?>			
				

				<div class="comment-text">

					<div class="meta">

						<strong itemprop="author" class="woocommerce-review__author"><?php printf( '%s', get_comment_author_link() ); ?></strong>

						<?php if ( '0' == $comment->comment_approved ) : ?>
							<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'techmarket' ); ?></em>
							
						<?php endif; ?>

						<?php echo '<time class="woocommerce-review__published-date">' . get_comment_date() . '</time>'; ?>

						
					</div>

					<div id="div-comment-meta-<?php comment_ID() ?>" class="comment-content">
						<?php if ( 'div' != $args['style'] ) : ?>
						<div class="description">
							<?php endif; ?>

								<?php comment_text(); ?>

							<?php if ( 'div' != $args['style'] ) : ?>
						</div>
						<?php endif; ?>
						<div class="reply">
							<?php edit_comment_link( esc_html__( 'Edit', 'techmarket' ), '  ', '' ); ?>
							<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
							
						</div>
						
					</div>
		
				</div><!-- /.comment-text -->
			</div><!-- /.comment_container -->
			
	<?php
	}
}

if ( ! function_exists( 'techmarket_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 * @since 1.0.0
	 */
	function techmarket_post_header() { ?>
		<header class="entry-header">
		<?php
		if ( is_single() ) {
			$comments_link = '';
			ob_start();
			techmarket_comment_meta();
			$comments_link = ob_get_clean();

			the_title( '<h1 class="entry-title">', sprintf( '%s</h1>', $comments_link ) );
			techmarket_post_meta();
		} else {

			the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
			
			if ( 'post' == get_post_type() ) {
				techmarket_post_meta();
			}
		}
		?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'techmarket_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function techmarket_post_content() {
		?>
		<div class="entry-content">
		<?php
		the_content(
			sprintf(
				__( 'Continue reading %s', 'techmarket' ),
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			)
		);
		wp_link_pages( array(
			'before' => '<p class="page-links"><span class="page-links-label">' . esc_html__( 'Pages:', 'techmarket' ) . '</span>',
			'pagelink' => '<span>%</span>',
			'after'  => '</p>',
		) );
		?>
		</div><!-- .entry-content -->
		<?php
	}
}

if( ! function_exists( 'techmarket_author_info' ) ) {
	/**
	 * Display Author Info
	 */
	function techmarket_author_info() {
		$description = get_the_author_meta( 'description' );
		if( apply_filters( 'techmarket_show_author_info', true ) && ! empty( $description ) ) :
			?>
			<div class="post-author-info">
				<div class="media">
					<div class="media-left media-middle">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
							<?php echo get_avatar( get_the_author_meta( 'ID' ) , 160 ); ?>
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></h4>
						<p><?php echo wp_kses_post( $description ); ?></p>
					</div>
				</div>
			</div>
			<?php
		endif;
	}
}

if ( ! function_exists( 'techmarket_post_excerpt' ) ) {
	/**
	 * Display the post excerpt with a link to the single post
	 * @since 1.0.0
	 */
	function techmarket_post_excerpt() {
		?>
		<div class="entry-content">
		
		<?php
		the_excerpt();
		wp_link_pages( array(
			'before' => '<p class="page-links"><span class="page-links-label">' . esc_html__( 'Pages:', 'techmarket' ) . '</span>',
			'pagelink' => '<span>%</span>',
			'after'  => '</p>',
		) );
		?>

		</div><!-- .post-excerpt -->
		<?php
	}
}

if( ! function_exists( 'techmarket_post_loop_content' ) ) {
	function techmarket_post_loop_content() {
		if( apply_filters( 'techmarket_loop_post_force_excerpt', false ) ) {
			techmarket_post_excerpt();
			techmarket_post_readmore();
			techmarket_comment_meta();
		} else {
			techmarket_post_content();
		}
	}
}

if ( ! function_exists( 'techmarket_post_body_wrap_start' ) ) {
	function techmarket_post_body_wrap_start() {
		?>
		<div class="content-body">
		<?php
	}
}

if ( ! function_exists( 'techmarket_post_body_wrap_end' ) ) {
	function techmarket_post_body_wrap_end() {
		?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'techmarket_posts_loop_wrap_start' ) ) {
	function techmarket_posts_loop_wrap_start() {
		if( 'post' == get_post_type() && techmarket_get_blog_style() == 'blog-grid' ) {
			?>
			<div class="posts">
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_posts_loop_wrap_end' ) ) {
	function techmarket_posts_loop_wrap_end() {
		if( 'post' == get_post_type() && techmarket_get_blog_style() == 'blog-grid' ) {
			?>
			</div>
			<?php
		}
	}
}

if( ! function_exists( 'techmarket_excerpt_length' ) ) {
	function techmarket_excerpt_length() {
		return apply_filters( 'techmarket_excerpt_length', 30 );
	}
}

if( ! function_exists( 'techmarket_excerpt_more' ) ) {
	function techmarket_excerpt_more() {
		return apply_filters( 'techmarket_excerpt_more', '' );
	}
}

if( ! function_exists( 'techmarket_post_readmore' ) ) {
	/**
	 * Display the loop post read more link
	 * @since 1.0.0
	 */
	function techmarket_post_readmore() {
		?>
		<div class="post-readmore"><a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo apply_filters( 'techmarket_blog_post_readmore_text', esc_html__( 'Read More', 'techmarket' ) ); ?></a></div>
		<?php
	}
}

if ( ! function_exists( 'techmarket_blog_navigation' ) ) {
	/**
	 * Display Blog Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function techmarket_blog_navigation() {
		$blog_layout 	= techmarket_get_blog_layout();
		$blog_style 	= techmarket_get_blog_style();

		if( apply_filters( 'techmarket_enable_blog_navigation', true ) && $blog_layout == 'full-width' ) {
			?>
			<nav id="blog-navigation" class="blog-navigation navbar yamm" aria-label="<?php esc_attr_e( 'Blog Navigation', 'techmarket' ); ?>">
				<div class="navbar-header">
					<button class="navbar-toggle collapsed" data-target="#nav-blog-horizontal-menu-collapse" data-toggle="collapse" type="button">
						<span class="sr-only"><?php echo esc_html__( 'Toggle navigation', 'techmarket' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="nav-bg-class">
					<div class="collapse navbar-collapse" id="nav-blog-horizontal-menu-collapse">
						<div class="nav-outer">
							<?php
								wp_nav_menu(
									array(
										'theme_location'	=> 'blog-menu',
										'container'			=> 'false',
										'menu_class'        => 'nav list-unstyled blog-nav-menu',
										'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
										'walker'			=> new WP_Bootstrap_Navwalker()
									)
								);
							?>
						</div>
						<div class="clearfix"></div>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav><!-- #blog-navigation -->
			<?php
		}
	}
}

