<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Fullwidth Notice Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_Fullwidth_Notice extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Fullwidth Notice widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_fullwidth_notice';
    }

    /**
     * Get widget title.
     *
     * Retrieve Fullwidth Notice widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Fullwidth Notice', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Fullwidth Notice widget icon.
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
     * Retrieve the list of categories the Fullwidth Notice widget belongs to.
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
     * Register Fullwidth Notice widget controls.
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
            'notice_info',
            [
                'label'     => esc_html__( 'Notice Text', 'techmarket-extensions' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows'      => 2,
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
     * Render Fullwidth Notice widget output on the frontend.
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
            'notice_info'   => $notice_info,
            'section_class' => $el_class,
        );

        if( function_exists( 'techmarket_fullwidth_notice' ) ) {
            techmarket_fullwidth_notice( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_Fullwidth_Notice );