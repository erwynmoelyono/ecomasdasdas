<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Product Categories List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_Product_Categories_List extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Product Categories List widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_product_categories_list';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Categories List widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Product Categories List', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Categories List widget icon.
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
     * Retrieve the list of categories the Product Categories List widget belongs to.
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
     * Register Product Categories List widget controls.
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
                'default' => 'Top Categories this Week',
                'placeholder' => esc_html__( 'Enter your section title here.', 'techmarket-extensions' ),
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
            'include',
            [
                'label' => esc_html__( 'Include', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'rows' => 2,
                'default' => '',
                'placeholder' => esc_html__( 'Enter slugs spearate by comma(,)', 'techmarket-extensions' ),
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
     * Render Product Categories List widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $parent         = '';
        $hierarchical   = '';

        $category_args = array(
            'number'            => isset( $number ) ? $number : '',
            'hide_empty'        => $hide_empty,
            'orderby'           => $orderby,
            'order'             => $order,
            'slugs'             => $include,
            'parent'            => $parent,
            'hierarchical'      => $hierarchical
        );

        $args = array(
            'section_title'     => $section_title,
            'category_args'     => $category_args,
        );

        if( function_exists( 'techmarket_product_categories_list' ) ) {
            techmarket_product_categories_list( $args  );
        }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_Product_Categories_List );