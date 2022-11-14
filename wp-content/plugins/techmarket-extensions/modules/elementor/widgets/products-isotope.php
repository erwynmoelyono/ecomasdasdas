<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Products Isotope Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_Products_Isotope extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Products Isotope widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_products_isotope';
    }

    /**
     * Get widget title.
     *
     * Retrieve Products Isotope widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Products Isotope', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Products Isotope widget icon.
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
     * Retrieve the list of categories the Products Isotope widget belongs to.
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
     * Register Products Isotope widget controls.
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
            'pre_title',
            [
                'label' => esc_html__( 'Pre Title', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => '',
                'placeholder' => esc_html__( 'Enter pre title.', 'techmarket-extensions' ),
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
            'style',
            [
                'label' => esc_html__( 'Style', 'techmarket-extensions' ),
                'type'  => Controls_Manager::SELECT,
                'default' => 'style-1',
                'options' => [
                    'style-1'   => esc_html__( 'Style 1','techmarket-extensions'),
                    'style-2'   => esc_html__( 'Style 2','techmarket-extensions'),
                ],
                'description'   => esc_html__( 'Select style for products.', 'techmarket-extensions' ),
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
            'timer_title',
            [
                'label' => esc_html__( 'Timer Title', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => esc_html__( 'Enter the timer title.', 'techmarket-extensions' ),
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
            'action_text',
            [
                'label' => esc_html__( 'Action Text', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => esc_html__( 'Enter your banner button text here', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'action_link',
            [
                'label' => esc_html__( 'Action Link', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__( 'Enter your banner url here', 'techmarket-extensions' ),
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
                'default'       => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label'         => esc_html__( 'Order', 'techmarket-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Enter Order', 'techmarket-extensions' ),
                'default'       => 'desc',
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
     * Render Products Isotope widget output on the frontend.
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

        $per_page = '';

        $args = array(
            'pre_title'         => $pre_title,
            'section_title'     => $section_title,
            'style'             => $style,
            'shortcode_tag'     => $shortcode_tag,
            'shortcode_atts'    => wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'per_page' => $per_page ) ),
            'header_timer'      => $header_timer,
            'timer_title'       => $timer_title,
            'timer_value'       => $timer_value,
            'action_text'       => $action_text,
            'action_link'       => $action_link,
            'section_class'     => $el_class
        );

        if( function_exists( 'techmarket_products_isotope' ) ) {
            techmarket_products_isotope( $args );
        }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_Products_Isotope );