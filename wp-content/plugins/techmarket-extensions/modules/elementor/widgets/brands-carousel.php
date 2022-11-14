<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Brands Carousel Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_Brands_Carousel extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Brands Carousel widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_brands_carousel';
    }

    /**
     * Get widget title.
     *
     * Retrieve Brands Carousel widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Brands Carousel', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Brands Carousel widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'fa fa-shopping-bag';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Brands Carousel widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'techmarket-elements' ];
    }

    /**
     * Register Brands Carousel widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'techmarket-extensions' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => esc_html__( 'Limit', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'rows' => 2,
                'default' => '',
                'placeholder' => esc_html__( 'Enter the number of brands to display', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'hide_empty',
            [
                'label'         => esc_html__( 'Hide Emtpy', 'techmarket-extensions' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Hide', 'techmarket-extensions' ),
                'label_off'     => esc_html__( 'Show', 'techmarket-extensions' ),
                'return_value'  => true,
                'default'       => false,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__( 'Order By', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'rows' => 2,
                'default' => '',
                'placeholder' => esc_html__( 'Enter order by', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( 'Order', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'rows' => 2,
                'default' => '',
                'placeholder' => esc_html__( 'Enter order', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'ca_slidestoshow',
            [
                'label'         => esc_html__('slidesToShow', 'techmarket-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '6',
                'placeholder'   => esc_html__('Enter the number of brands to display.', 'techmarket-extensions'),
            ]
        );

        $this->add_control(
            'ca_slidestoscroll',
            [
                'label'         => esc_html__('slidesToScroll', 'techmarket-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'   => '6',
                'placeholder'   => esc_html__('Enter the number of brands to scroll.', 'techmarket-extensions'),
            ]
        );

        $this->add_control(
            'ca_responsive',
            [
                'label'  => esc_html__( 'Responsive', 'techmarket-extensions' ),
                'type'   => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'  => 'ca_res_breakpoint',
                        'label' => esc_html__( 'Breakpoint', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter breakpoint.', 'techmarket-extensions'),
                    ],
                    [
                        'name'  => 'ca_res_slidestoshow',
                        'label' => esc_html__( 'SlidesToShow', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter the number of items to display.', 'techmarket-extensions'),
                    ],
                    [
                        'name'  => 'ca_res_slidestoscroll',
                        'label' => esc_html__( 'SlidesToScroll', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter the number of items to scroll.', 'techmarket-extensions'),
                    ],
                ],
                'default' => [],
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render Brands Carousel widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $section_args = '';

        $taxonomy_args = array(
            'orderby'       => isset( $orderby ) ? $orderby : '',
            'order'         => isset( $order ) ? $order : '',
            'number'        => isset( $limit ) ? $limit : '',
            'hide_empty'    => isset( $hide_empty ) ? filter_var( $hide_empty, FILTER_VALIDATE_BOOLEAN ) : '',
        );

        $carousel_args  = array(
            'slidesToShow'      => intval( $ca_slidestoshow ) != 0 ? intval( $ca_slidestoshow ): 1,
            'slidesToScroll'    => intval( $ca_slidestoscroll ) != 0 ? intval( $ca_slidestoscroll ): 1,
        );

        if( is_object( $ca_responsive ) || is_array( $ca_responsive ) ) {
            $ca_responsive = json_decode( json_encode( $ca_responsive ), true );
        } else {
            $ca_responsive = json_decode( urldecode( $ca_responsive ), true );
        }

        if( ! empty( $ca_responsive ) ) {
            $responsive_args = array();
            
            foreach ( $ca_responsive as $key => $responsive ) {

                extract(shortcode_atts(array(
                    'ca_res_breakpoint'         => 767,
                    'ca_res_slidestoshow'       => 1,
                    'ca_res_slidestoscroll'     => 1,
                ), $responsive));

                $responsive_args[] = array(
                    'breakpoint'    => $ca_res_breakpoint,
                    'settings'      => array(
                        'slidesToShow'      => intval( $ca_res_slidestoshow ) > 0 ? intval( $ca_res_slidestoshow ) : 1,
                        'slidesToScroll'    => intval( $ca_res_slidestoscroll ) > 0 ? intval( $ca_res_slidestoscroll ) : 1,
                    ),
                );
            }

            $carousel_args['responsive'] = $responsive_args;
        }

        if( function_exists( 'techmarket_brands_carousel' ) ) {
            techmarket_brands_carousel( $section_args, $taxonomy_args, $carousel_args  );
        }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_Brands_Carousel );