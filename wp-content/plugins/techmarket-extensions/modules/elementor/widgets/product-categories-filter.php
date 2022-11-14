<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Product Categories Filter Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_product_Categories_Filter extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Product Categories Filter widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_product_categories_filter';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Categories Filter widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Product Categories Filter', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Categories Filter widget icon.
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
     * Retrieve the list of categories the Product Categories Filter widget belongs to.
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
     * Register Product Categories Filter widget controls.
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
                'default' => '<strong>Choose TV</strong> you are Looking for:',
                'placeholder' => esc_html__( 'Enter your section title here.', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'cat_show_all_text',
            [
                'label' => esc_html__( 'Category show all text', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => 'All Categories',
                'placeholder' => esc_html__( 'Enter your category title here.', 'techmarket-extensions' ),
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
            'number',
            [
                'label' => esc_html__( 'Limit', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'default' => '8',
                'placeholder' => esc_html__( 'Enter the number of categories to display', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'default' => '4',
                'placeholder' => esc_html__( 'Enter the number of columns to display.', 'techmarket-extensions' ),
            ]
        );        

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__( 'Order By', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'rows' => 2,
                'default' => 'date',
                'placeholder' => esc_html__( 'Enter order by', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( 'Order', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'rows' => 2,
                'default' => 'desc',
                'placeholder' => esc_html__( 'Enter order', 'techmarket-extensions' ),
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
     * Render Product Categories Filter widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $args = array(
            'section_title'     => $section_title,
            'category_args'     => array(
                'show_option_all'   => $cat_show_all_text,
                'taxonomy'          => 'product_cat',
                'hide_if_empty'     => $hide_empty,
                'slugs'             => '',
                'value_field'       => 'slug',
                'class'             => 'categories-dropdown'
            ),
            'shortcode_atts'    => array( 'per_page' => $number, 'columns' => $columns, 'order' => $order, 'orderby' => $orderby, 'template' => 'content-product-featured' ),
            'section_class'     => $el_class
        );

        if( function_exists( 'techmarket_product_categories_filter' ) ) {
            techmarket_product_categories_filter( $args  );
        }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_product_Categories_Filter );