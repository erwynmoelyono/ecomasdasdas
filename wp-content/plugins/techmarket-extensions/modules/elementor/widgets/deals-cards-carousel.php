<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Deals Cards Carousel Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_Deals_Cards_Carousel extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Deals Cards Carousel widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_deals_cards_carousel';
    }

    /**
     * Get widget title.
     *
     * Retrieve Deals Cards Carousel widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Deals Cards Carousel', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Deals Cards Carousel widget icon.
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
     * Retrieve the list of categories the Deals Cards Carousel widget belongs to.
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
     * Register Deals Cards Carousel widget controls.
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
            'section_title',
            [
                'label' => esc_html__( 'Section Title', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => '',
                'placeholder' => esc_html__( 'Enter your section title here.', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'shortcode_tag',
            [
                'label' => esc_html__( 'Shortcode Tags', 'techmarket-extensions' ),
                'type'  => Controls_Manager::SELECT,
                'default' => 'recent_products',
                'options' => [
                    'featured_products'     => esc_html__( 'Featured Products','techmarket-extensions'),
                    'sale_products'         => esc_html__( 'On Sale Products','techmarket-extensions'),
                    'top_rated_products'    => esc_html__( 'Top Rated Products','techmarket-extensions'),
                    'recent_products'       => esc_html__( 'Recent Products','techmarket-extensions'),
                    'best_selling_products' => esc_html__( 'Best Selling Products','techmarket-extensions'),
                    'product_category'      => esc_html__( 'Product Category','techmarket-extensions'),
                    'products'              => esc_html__( 'Products','techmarket-extensions')
                ],
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'         => esc_html__( 'Orderby', 'techmarket-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Enter Orderby', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'order',
            [
                'label'         => esc_html__( 'Order', 'techmarket-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Enter Order', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'per_page',
            [
                'label'         => esc_html__( 'Limit', 'techmarket-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Enter the number of products to display', 'techmarket-extensions' ),
                'default'       => 6,
            ]
        );

        $this->add_control(
            'product_id',
            [
                'label'         => esc_html__('Product IDs', 'techmarket-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions'),
                'condition' => [
                    'shortcode_tag' => 'products',
                ],
            ]
        );

        $this->add_control(
            'category',
            [
                'label'         => esc_html__('Category', 'techmarket-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter id spearate by comma(,) Note: Only works with Category Shortcode.', 'techmarket-extensions'),
                'condition' => [
                    'shortcode_tag' => 'product_category',
                ],
            ]
        );

        $this->add_control(
            'header_custom_nav',
            [
                'label'         => esc_html__( 'Header Navigation?', 'techmarket-extensions' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Show', 'techmarket-extensions' ),
                'label_off'     => esc_html__( 'Hide', 'techmarket-extensions' ),
                'return_value'  => true,
                'default'       => true,
            ]
        );

        $this->add_control(
            'header_timer',
            [
                'label'         => esc_html__( 'Header Timer?', 'techmarket-extensions' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Show', 'techmarket-extensions' ),
                'label_off'     => esc_html__( 'Hide', 'techmarket-extensions' ),
                'return_value'  => true,
                'default'       => true,
            ]
        );

        $this->add_control(
            'timer_value',
            [
                'label' => esc_html__( 'Timer Value', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'default' => '+8 hours',
                'placeholder' => esc_html__( 'Enter your section title here.', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'ca_slidestoshow',
            [
                'label'         => esc_html__('slidesToShow', 'techmarket-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '2',
                'placeholder'   => esc_html__('Enter the number of brands to display.', 'techmarket-extensions'),
            ]
        );

        $this->add_control(
            'ca_slidestoscroll',
            [
                'label'         => esc_html__('slidesToScroll', 'techmarket-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '2',
                'placeholder'   => esc_html__('Enter the number of brands to scroll.', 'techmarket-extensions'),
            ]
        );

        $this->add_control(
            'ca_arrows',
            [
                'label'         => esc_html__( 'Arrows', 'techmarket-extensions' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Show', 'techmarket-extensions' ),
                'label_off'     => esc_html__( 'Hide', 'techmarket-extensions' ),
                'return_value'  => true,
                'default'       => true,
            ]
        );

        $this->add_control(
            'ca_dots',
            [
                'label'         => esc_html__( 'Dots', 'techmarket-extensions' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Show', 'techmarket-extensions' ),
                'label_off'     => esc_html__( 'Hide', 'techmarket-extensions' ),
                'return_value'  => true,
                'default'       => true,
            ]
        );

        $this->add_control(
            'ca_prevarrow',
            [
                'label' => esc_html__( 'Previous Arrow', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'default' => '<a href="#" class="slider-prev"><i class="tm tm-arrow-left"></i>' . esc_html__( 'Previous deal', 'techmarket-extensions' ) . '</a>',
            ]
        );

        $this->add_control(
            'ca_nextarrow',
            [
                'label' => esc_html__( 'Next Arrow', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'default' => '<a href="#" class="slider-next">' . esc_html__( 'Next deal', 'techmarket-extensions' ) . '<i class="tm tm-arrow-right"></i></a>',
            ]
        );

        $this->add_control(
            'el_class',
            [
                'label'         => esc_html__( 'Extra class name', 'techmarket-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'techmarket-extensions' ),
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render Deals Cards Carousel widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $shortcode_atts = function_exists( 'techmarket_get_atts_for_shortcode' ) ? techmarket_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'products_choice' => 'ids', 'products_ids_skus' => $product_id ) ) : array();

        $args = array(
            'section_title'     => $section_title,
            'shortcode_tag'     => isset( $shortcode_tag ) ? $shortcode_tag : 'products',
            'shortcode_atts'    => wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'columns' => $ca_slidestoshow, 'per_page' => $per_page ) ),
            'header_custom_nav' => isset( $header_custom_nav ) ? filter_var( $header_custom_nav, FILTER_VALIDATE_BOOLEAN ) : '',
            'header_timer'      => isset( $header_timer ) ? filter_var( $header_timer, FILTER_VALIDATE_BOOLEAN ) : '',
            'timer_value'       => $timer_value,
            'carousel_args'     => array(
                'slidesToShow'      => intval( $ca_slidestoshow ) != 0 ? intval( $ca_slidestoshow ): 1,
                'slidesToScroll'    => intval( $ca_slidestoscroll ) != 0 ? intval( $ca_slidestoscroll ): 1,
                'dots'              => filter_var( $ca_dots, FILTER_VALIDATE_BOOLEAN ),
                'arrows'            => filter_var( $ca_arrows, FILTER_VALIDATE_BOOLEAN ),
                'prevArrow'         => $ca_prevarrow,
                'nextArrow'         => $ca_nextarrow,
                'responsive'        => array(
                    array(
                        'breakpoint'    => 1400,
                        'settings'      => array(
                            'slidesToShow'      => 1,
                            'slidesToScroll'    => 1
                        )
                    ),
                ),
            ),
            'section_class'     => $el_class
        );

        if( function_exists( 'techmarket_deals_cards_carousel' ) ) {
            techmarket_deals_cards_carousel( $args );
        }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_Deals_Cards_Carousel );