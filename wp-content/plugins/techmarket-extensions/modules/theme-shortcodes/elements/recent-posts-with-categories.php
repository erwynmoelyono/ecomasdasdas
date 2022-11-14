<?php

if ( ! function_exists( 'techmarket_recent_posts_with_categories_element' ) ) {

	function techmarket_recent_posts_with_categories_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'section_title'		=> '',
			'description'		=> '',
			'post_choice'		=> 'recent',
			'limit'				=> 6,
			'ids'				=> '',
			'show_read_more'	=> false,
			'cat_limit'			=> 4,
			'cat_slugs'			=> '',
			'el_class'			=> '',
		), $atts));

		$category_args = array(
			'number'			=> $cat_limit,
			'slugs'				=> $cat_slugs,
		);
		
		$args = array(
			'section_title'		=> $section_title,
			'description'		=> $description,
			'category_args'		=> $category_args,
			'post_choice'		=> $post_choice,
			'post_id'			=> $ids,
			'limit'				=> $limit,
			'show_read_more'	=> $show_read_more,
			'section_class'		=> $el_class,
		);

		$html = '';
		if( function_exists( 'techmarket_recent_posts_with_categories' ) ) {
			ob_start();
			techmarket_recent_posts_with_categories( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_recent_posts_with_categories' , 'techmarket_recent_posts_with_categories_element' );