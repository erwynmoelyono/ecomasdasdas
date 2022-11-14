<?php
/**
 * Filter functions for Social Block of Theme Options
 */

if ( ! function_exists( 'redux_apply_social_networks' ) ) {
	function redux_apply_social_networks( $social_icons ) {
		global $techmarket_options;

		$social_icons = array(
			'facebook' 		=> array(
				'label'	=> esc_html__( 'Facebook', 'techmarket' ),
				'icon'	=> 'fab fa-facebook',
				'id'	=> 'facebook_link',
			),
			'twitter' 		=> array(
				'label'	=> esc_html__( 'Twitter', 'techmarket' ),
				'icon'	=> 'fab fa-twitter',
				'id'	=> 'twitter_link',
			),
			'pinterest' 	=> array(
				'label'	=> esc_html__( 'Pinterest', 'techmarket' ),
				'icon'	=> 'fab fa-pinterest',
				'id'	=> 'pinterest_link',
			),
			'linkedin' 		=> array(
				'label'	=> esc_html__( 'LinkedIn', 'techmarket' ),
				'icon'	=> 'fab fa-linkedin',
				'id'	=> 'linkedin_link',
			),
			'googleplus' 	=> array(
				'label'	=> esc_html__( 'Google+', 'techmarket' ),
				'icon'	=> 'fab fa-google-plus',
				'id'	=> 'googleplus_link',
			),
			'tumblr' 	=> array(
				'label'	=> esc_html__( 'Tumblr', 'techmarket' ),
				'icon'	=> 'fab fa-tumblr',
				'id'	=> 'tumblr_link'
			),
			'instagram' 	=> array(
				'label'	=> esc_html__( 'Instagram', 'techmarket' ),
				'icon'	=> 'fab fa-instagram',
				'id'	=> 'instagram_link'
			),
			'youtube' 		=> array(
				'label'	=> esc_html__( 'Youtube', 'techmarket' ),
				'icon'	=> 'fab fa-youtube',
				'id'	=> 'youtube_link'
			),
			'vimeo' 		=> array(
				'label'	=> esc_html__( 'Vimeo', 'techmarket' ),
				'icon'	=> 'fab fa-vimeo-square',
				'id'	=> 'vimeo_link'
			),
			'dribbble' 		=> array(
				'label'	=> esc_html__( 'Dribbble', 'techmarket' ),
				'icon'	=> 'fab fa-dribbble',
				'id'	=> 'dribbble_link',
			),
			'stumbleupon' 	=> array(
				'label'	=> esc_html__( 'StumbleUpon', 'techmarket' ),
				'icon'	=> 'fab fa-stumbleupon',
				'id'	=> 'stumble_upon_link'
			),
			'soundcloud'	=> array(
				'label'	=> esc_html__('Sound Cloud', 'techmarket'),
				'icon'	=> 'fab fa-soundcloud',
				'id'	=> 'soundcloud',
			),
			'vine'			=> array(
				'label'	=> esc_html__('Vine', 'techmarket'),
				'icon'	=> 'fab fa-vine',
				'id'	=> 'vine',
			),
			'vk'			=> array(
				'label'	=> esc_html__('VKontakte', 'techmarket'),
				'icon'	=> 'fab fa-vk',
				'id'	=> 'vk',
			),
			'rss'			=> array(
				'label'	=> esc_html__( 'RSS', 'techmarket' ),
				'icon'	=> 'fas fa-rss',
				'id'	=> 'rss_link',
			)
		);

		foreach( $social_icons as $key => $social_icon ) {
			if( ! empty( $techmarket_options[$key] ) ) {
				$social_icons[$key]['link'] = $techmarket_options[$key];
			}
		}

		if( isset( $techmarket_options['show_footer_rss_icon'] ) && $techmarket_options['show_footer_rss_icon'] ) {
			$social_icons['rss']['link'] = get_bloginfo( 'rss2_url' );
		}

		return $social_icons;
	}
}
