<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Features List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_Features_List extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Features List widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_features_list';
    }

    /**
     * Get widget title.
     *
     * Retrieve Features List widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Features List', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Features List widget icon.
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
     * Retrieve the list of categories the Features List widget belongs to.
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
     * Register Features List widget controls.
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
            'features',
            [
                'label' => esc_html__( 'Features List', 'techmarket-extensions' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'icon',
                        'label' => esc_html__( 'Icon', 'techmarket-extensions' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                    ],
                    [
                        'name' => 'label',
                        'label' => esc_html__( 'Feature Describtion', 'techmarket-extensions' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                    ],
                ],
                'default' => [],
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
     * Render Features List widget output on the frontend.
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
            'features'      => isset( $features ) ? $features : '',
            'section_class' => isset( $el_class ) ? $el_class : ''
        );

        if( function_exists( 'techmarket_features_list' ) ) {
            techmarket_features_list( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_Features_List );