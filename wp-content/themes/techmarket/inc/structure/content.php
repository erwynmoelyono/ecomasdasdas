<?php
/**
 * Techmarket functions used in content such as post, page, etc.
 *
 * @package techmarket
 */

if ( ! function_exists( 'techmarket_toggle_page_header' ) ) {
	function techmarket_toggle_page_header() {

		$should_show_page_header = true;

		global $post;
		$page_meta_values = get_post_meta( $post->ID, '_techmarket_page_metabox', true );

		if ( isset( $page_meta_values['hide_page_header'] ) && $page_meta_values['hide_page_header'] == '1' ) {
			$should_show_page_header = false;
		}

		if( techmarket_is_woocommerce_activated() && is_account_page() && !is_user_logged_in() ) {
			$should_show_page_header = false;

			if( is_wc_endpoint_url() ) {
				$should_show_page_header = true;
			}
		}

		if ( techmarket_is_woocommerce_activated() && is_cart() && WC()->cart->is_empty() ) {
			$should_show_page_header = false;
		}

		return $should_show_page_header;
	}
}

if ( ! function_exists( 'techmarket_toggle_breadcrumb' ) ) {
	function techmarket_toggle_breadcrumb( $show_breadcrumb ) {
		global $post;

		if ( isset( $post->ID ) ){
			$page_meta_values = get_post_meta( $post->ID, '_techmarket_page_metabox', true );

			if ( isset( $page_meta_values['hide_breadcrumb'] ) && $page_meta_values['hide_breadcrumb'] == '1' ) {
				$show_breadcrumb = false;
			}
		}

		return $show_breadcrumb;
	}
}

if ( ! function_exists( 'techmarket_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function techmarket_paging_nav() {
		global $wp_query;

		$args = array(
			'type' 	    => 'list',
			'next_text' => _x( 'Next', 'Next post', 'techmarket' ),
			'prev_text' => _x( 'Previous', 'Previous post', 'techmarket' ),
		);

		the_posts_pagination( $args );
	}
}

if ( ! function_exists( 'techmarket_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size the post thumbnail size.
	 * @since 1.5.0
	 */
	function techmarket_post_thumbnail( $size = 'thumbnail', $should_link = false, $should_placehold = false ) {

		global $post;

		$post_thumbnail = '';

		if ( has_post_thumbnail() ) {

			$post_thumbnail = apply_filters( 'techmarket_post_thumbnail', get_the_post_thumbnail( $post->ID, $size, array( 'itemprop' => 'image' ) ) );

		} else {

			if ( $should_placehold ) {
				$default_post_thumbnail = '<img src="//placehold.it/370x220" />';

				$post_thumbnail = apply_filters( 'techmarket_default_post_thumbnail', $default_post_thumbnail );
			}

		}

		if ( ! empty( $post_thumbnail ) ) {

			if ( $should_link ) {
				$post_thumbnail = sprintf( '<a href="%s">%s</a>', esc_url( get_permalink() ), $post_thumbnail );
			}

			echo wp_kses_post( sprintf( '<div class="post-thumbnail">%s</div>', $post_thumbnail ) );
		}
	}
}

if( ! function_exists( 'techmarket_custom_excerpt' ) ) {
	/**
	 * Custom Length Excerpts
	 */
	function techmarket_custom_excerpt( $excerpt = '', $excerpt_length = 20, $tags = '', $trailing = '' ) {

		$string_check = explode(' ', $excerpt);
		if (count($string_check, COUNT_RECURSIVE) > $excerpt_length) {
			$excerpt = strip_shortcodes( $excerpt );
			$new_excerpt_words = explode(' ', $excerpt, $excerpt_length+1);
			array_pop($new_excerpt_words);
			$excerpt_text = implode(' ', $new_excerpt_words);
			$temp_content = strip_tags($excerpt_text, $tags);
			$short_content = preg_replace('`\[[^\]]*\]`','',$temp_content);
			$short_content .= $trailing;

			return $short_content;
		} else {
			// no trimming needed, excerpt is too short.
			return $excerpt;
		}
	}
}

if ( ! function_exists( 'techmarket_display_comments' ) ) {
	/**
	 * Techmarket display comments
	 *
	 * @since  1.0.0
	 */
	function techmarket_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'techmarket_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function techmarket_post_nav() {
		$args = array(
			'next_text' => '%title &nbsp;<span class="meta-nav">&rarr;</span>',
			'prev_text' => '<span class="meta-nav">&larr;</span>&nbsp;%title',
			);
		the_post_navigation( $args );
	}
}

if( ! function_exists( 'techmarket_post_loop_media' ) ) {
	function techmarket_post_loop_media() {
		$blog_style = techmarket_get_blog_style();

		if( $blog_style != 'blog-list' && $blog_style != 'blog-grid' ) {
			techmarket_post_media_attachment();
		} else {
			$image_size = techmarket_get_post_thumbnail_size();
			$should_link = is_single() ? false : true ;
			$should_placehold = is_single() ? false : apply_filters( 'techmarket_loop_post_placeholder_img', false );

			echo '<div class="media-attachment">';
			techmarket_post_thumbnail( $image_size, $should_link, $should_placehold );
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'techmarket_get_blog_layout' ) ) {
	function techmarket_get_blog_layout() {
		if ( is_single() && 'post' == get_post_type() ) {
			return techmarket_get_single_post_layout();
		} elseif( is_home() || ( 'post' == get_post_type() && ( is_category() || is_tag() || is_author() || is_date() || is_year() || is_month() || is_time() ) ) ) {
			return apply_filters( 'techmarket_blog_layout', 'right-sidebar' );
		} else {
			return apply_filters( 'techmarket_default_layout', 'right-sidebar' );
		}
	}
}

if ( ! function_exists( 'techmarket_get_blog_style' ) ) {
	function techmarket_get_blog_style() {
		return apply_filters( 'techmarket_blog_style', 'blog-default' );
	}
}

if ( ! function_exists( 'techmarket_get_single_post_layout' ) ) {
	function techmarket_get_single_post_layout() {
		return apply_filters( 'techmarket_single_post_layout', 'right-sidebar' );
	}
}

if( ! function_exists( 'techmarket_post_media_attachment' ) ) {
	/**
	 * Displays the media attachment of the post
	 * @since 1.0.0
	 */
	function techmarket_post_media_attachment() {

		$id = get_the_ID();
		$post_format = get_post_format();
		$should_media = is_single() ? true : apply_filters( 'techmarket_loop_post_display_media', true );
		$image_size = techmarket_get_post_thumbnail_size();
		$should_link = is_single() ? false : true ;
		$should_placehold = is_single() ? false : apply_filters( 'techmarket_loop_post_placeholder_img', false );

		ob_start();

		if( $should_media && $post_format == 'gallery' ){
			techmarket_gallery_slideshow( $id, $image_size );
		} else if ( $should_media && $post_format == 'video' ){
			techmarket_video_player( $id );
		} else if ( $should_media && $post_format == 'audio' ){
			techmarket_audio_player( $id );
		} else if ( $post_format == 'image' || has_post_thumbnail() ){
			techmarket_post_thumbnail( $image_size, $should_link, $should_placehold );
		} else {
			techmarket_post_thumbnail( $image_size, $should_link, $should_placehold );
		}

		$media_attachment = ob_get_clean();

		if( ! empty( $media_attachment ) ) {
			echo '<div class="media-attachment">' . $media_attachment . '</div>';
		}

	}
}

if ( ! function_exists( 'techmarket_get_post_thumbnail_size' ) ) {
	/**
	 * Returns post thumbnail size
	 *
	 * @since 1.0.0
	 */
	function techmarket_get_post_thumbnail_size() {
		$blog_style = techmarket_get_blog_style();
		$blog_layout = techmarket_get_blog_layout();

		if ( is_single() ) {

			$image_size = 'techmarket-blog-large';

			if( $blog_layout == 'full-width' ) {
				$image_size = 'techmarket-blog-extra-large';
			}

		} elseif( $blog_style == 'blog-grid' || $blog_style == 'blog-list' ) {

			$image_size = 'techmarket-blog-small';

			if( $blog_layout == 'full-width' ) {
				$image_size = 'techmarket-blog-medium';
			}

		} elseif( $blog_style == 'blog-default' && $blog_layout == 'full-width' ) {

			$image_size = 'techmarket-blog-extra-large';

		} else {

			$image_size = 'techmarket-blog-large';

		}

		return $image_size;
	}
}

if ( !function_exists( 'techmarket_gallery_slideshow' ) ) {
	/**
	 * Output Gallery (slide show) for Post Format.
	 */
	function techmarket_gallery_slideshow($post_id , $thumbnail = 'post-thumbnail') {
		global $post;

		$post_id = esc_attr( ( $post_id ? $post_id : $post->ID ) );

		// Get the media ID's
		$ids = esc_attr( get_post_meta($post_id, 'postformat_gallery_ids', true) );

		// Query the media data
		$attachments = get_posts( array(
			'post__in' 			=> explode(",", $ids),
			'orderby' 			=> 'post__in',
			'post_type' 		=> 'attachment',
			'post_mime_type' 	=> 'image',
			'post_status' 		=> 'any',
			'numberposts' 		=> -1
		));

		$carousel_args = apply_filters( 'techmarket_gallery_slideshow_carousel_args', array(
			'slidesToShow'		=> 1,
			'slidesToScroll'	=> 1,
			'dots'				=> true,
			'arrows'			=> false,
			'infinite'			=> false
		) );

		if( is_rtl() ) {
			$carousel_args['rtl'] = true;
			if( isset( $carousel_args['prevArrow'] ) && isset( $carousel_args['nextArrow'] ) ) {
				$carousel_args_temp_arrow = $carousel_args['prevArrow'];
				$carousel_args['prevArrow'] = $carousel_args['nextArrow'];
				$carousel_args['nextArrow'] = $carousel_args_temp_arrow;
			}
		}

		// Create the media display
		if ($attachments) :
			?>
			<div class="media-attachment-gallery" data-ride="tm-slick-carousel" data-wrap=".blog-post-gallery" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">

				<div class="blog-post-gallery">
				<?php foreach ($attachments as $attachment): ?>
					<div class="item">
						<figure>
							<?php echo wp_get_attachment_image($attachment->ID, $thumbnail); ?>
						</figure>
					</div><!-- /.item -->
				<?php endforeach; ?>
				</div>

			</div><!-- /.media-attachment-gallery -->
			<?php
		endif;
	}
}

if ( !function_exists( 'techmarket_audio_player' ) ) {
	/**
	 *  Output Audio Player for Post Format
	 */
    function techmarket_audio_player($post_id, $width = 1200) {
    	global $post;

    	$post_id = esc_attr( ( $post_id ? $post_id : $post->ID ) );

    	// Get the player media
		$mp3    = get_post_meta($post_id, 'postformat_audio_mp3', 		TRUE);
		$ogg    = get_post_meta($post_id, 'postformat_audio_ogg', 		TRUE);
		$embed  = get_post_meta($post_id, 'postformat_audio_embedded', 	TRUE);
		$height = get_post_meta($post_id, 'postformat_poster_height', 	TRUE);

		if ( isset($embed) && $embed != '' ) {
			// Embed Audio
			if( !empty($embed) ) {
				// run oEmbed for known sources to generate embed code from audio links
				echo ( $GLOBALS['wp_embed']->autoembed( stripslashes( htmlspecialchars_decode( $embed ) ) ) );

				return; // and.... Done!
			}

		} else if( ! empty( $mp3 ) || ! empty ( $ogg ) ) {

			wp_enqueue_script( 'jplayer', get_template_directory_uri() . '/assets/js/jquery.jplayer.min.js', array( 'jquery' ), '1.10.2', true );

			// Other audio formats
			ob_start();
			?>
			jQuery(document).ready(function(){

				if(jQuery().jPlayer) {
					jQuery("#jquery_jplayer_<?php echo esc_attr( $post_id ); ?>").jPlayer({
						ready: function (event) {

							// set media
							jQuery(this).jPlayer("setMedia", {
								<?php
								if($mp3 != '') :
									echo 'mp3: "'. $mp3 .'",';
								endif;
								if($ogg != '') :
									echo 'oga: "'. $ogg .'",';
								endif; ?>
								end: ""
							});
						},
						<?php if( !empty($poster) ) { ?>
						size: {
							width: "<?php echo esc_js( $width ); ?>px",
							height: "<?php echo esc_js( $height ); ?>px"
						},
						<?php } ?>
						swfPath: "<?php echo get_template_directory_uri(); ?>/assets/js",
						cssSelectorAncestor: "#jp_interface_<?php echo esc_attr( $post_id ); ?>",
						supplied: "<?php if($ogg != '') : ?>oga,<?php endif; ?><?php if($mp3 != '') : ?>mp3, <?php endif; ?> all"
					});

				}
			});
			<?php
				$custom_script = ob_get_clean();
				wp_add_inline_script( 'techmarket-scripts', $custom_script );
			?>

			<div id="jquery_jplayer_<?php echo esc_attr( $post_id ); ?>" class="jp-jplayer jp-jplayer-audio"></div>

			<div class="jp-audio-container">
				<div class="jp-audio">
					<div class="jp-type-single">
						<div id="jp_interface_<?php echo esc_attr( $post_id ); ?>" class="jp-interface">
							<ul class="jp-controls">
								<li><div class="seperator-first"></div></li>
								<li><div class="seperator-second"></div></li>
								<li><a href="#" class="jp-play" tabindex="1"><i class="fas fa-play"></i><span>play</span></a></li>
								<li><a href="#" class="jp-pause" tabindex="1"><i class="fas fa-pause"></i><span>pause</span></a></li>
								<li><a href="#" class="jp-mute" tabindex="1"><i class="fas fa-volume-up"></i><span>mute</span></a></li>
								<li><a href="#" class="jp-unmute" tabindex="1"><i class="fas fa-volume-off"></i><span>unmute</span></a></li>
							</ul>
							<div class="jp-progress-container">
								<div class="jp-progress">
									<div class="jp-seek-bar">
										<div class="jp-play-bar"></div>
									</div>
								</div>
							</div>
							<div class="jp-volume-bar-container">
								<div class="jp-volume-bar">
									<div class="jp-volume-bar-value"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		} // End if embedded/else
    }
}

if ( !function_exists( 'techmarket_video_player' ) ) {
	/**
	 * Video Player / Embeds (self-hosted, jPlayer)
	 */
    function techmarket_video_player($post_id, $width = 1200) {
    	global $post;

    	$post_id = esc_attr( ( $post_id ? $post_id : $post->ID ) );

    	// Get the player media options
    	$embed 		= get_post_meta($post_id, 'postformat_video_embed', 	true);
    	$height 	= get_post_meta($post_id, 'postformat_video_height', 	true);
    	$m4v 		= get_post_meta($post_id, 'postformat_video_m4v', 		true);
    	$ogv 		= get_post_meta($post_id, 'postformat_video_ogv', 		true);
    	$webm 		= get_post_meta($post_id, 'postformat_video_webm', 		true);
    	$poster 	= get_post_meta($post_id, 'postformat_video_poster', 	true);

		if( !empty($embed) ) {
			$embed = do_shortcode( $embed );
			// run oEmbed for known sources to generate embed code from video links
			echo '<div class="video-container"><div class="embed-responsive embed-responsive-16by9">'. $GLOBALS['wp_embed']->autoembed( stripslashes(htmlspecialchars_decode($embed)) ) .'</div></div>';

			return; // and.... Done!
		} else if( ! empty( $m4v ) || ! empty ( $ogv ) || ! empty ( $webm ) || ! empty ( $poster ) ) {
			wp_enqueue_script( 'jplayer', get_template_directory_uri() . '/assets/js/jquery.jplayer.min.js', array( 'jquery' ), '1.10.2', true );

			ob_start();
			?>
			jQuery(document).ready(function(){

				if(jQuery().jPlayer) {
					jQuery("#jquery_jplayer_<?php echo esc_attr( $post_id ); ?>").jPlayer({
						ready: function (event) {
							// mobile display helper
							// if(event.jPlayer.status.noVolume) {	$('#jp_interface_<?php echo esc_attr( $post_id ); ?>').addClass('no-volume'); }
							// set media
							jQuery(this).jPlayer("setMedia", {
								<?php if($m4v != '') : ?>
								m4v: "<?php echo esc_js( $m4v ); ?>",
								<?php endif; ?>
								<?php if($ogv != '') : ?>
								ogv: "<?php echo esc_js( $ogv ); ?>",
								<?php endif; ?>
								<?php if($webm != '') : ?>
								webmv: "<?php echo esc_js( $webm ); ?>",
								<?php endif; ?>
								<?php if ($poster != '') : ?>
								poster: "<?php echo esc_js( $poster ); ?>"
								<?php endif; ?>
							});
						},
						size: {
						    width: "<?php echo esc_js( $width ); ?>px",
						},
						swfPath: "<?php echo get_template_directory_uri(); ?>/assets/js",
						cssSelectorAncestor: "#jp_interface_<?php echo esc_attr( $post_id ); ?>",
						supplied: "<?php if($m4v != '') : ?>m4v, <?php endif; ?><?php if($ogv != '') : ?>ogv, <?php endif; ?> all"
					});
				}
			});
			<?php
				$custom_script = ob_get_clean();
				wp_add_inline_script( 'techmarket-scripts', $custom_script );
			?>

			<div id="jquery_jplayer_<?php echo esc_attr( $post_id ); ?>" class="jp-jplayer jp-jplayer-video"></div>

		    <div class="jp-video-container">
		        <div class="jp-video">
		            <div class="jp-type-single">
		                <div id="jp_interface_<?php echo esc_attr( $post_id ); ?>" class="jp-interface">
		                    <ul class="jp-controls">
		                    	<li><div class="seperator-first"></div></li>
		                        <li><div class="seperator-second"></div></li>
		                        <li><a href="#" class="jp-play" tabindex="1"><i class="fas fa-play"></i><span>play</span></a></li>
		                        <li><a href="#" class="jp-pause" tabindex="1"><i class="fas fa-pause"></i><span>pause</span></a></li>
		                        <li><a href="#" class="jp-mute" tabindex="1"><i class="fas fa-volume-up"></i><span>mute</span></a></li>
		                        <li><a href="#" class="jp-unmute" tabindex="1"><i class="fas fa-volume-off"></i><span>unmute</span></a></li>
		                    </ul>
		                    <div class="jp-progress-container">
		                        <div class="jp-progress">
		                            <div class="jp-seek-bar">
		                                <div class="jp-play-bar"></div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="jp-volume-bar-container">
		                        <div class="jp-volume-bar">
		                            <div class="jp-volume-bar-value"></div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <?php
		}
	}
}
