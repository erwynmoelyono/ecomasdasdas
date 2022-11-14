<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Jumbotron Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_Jumbotron extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Jumbotron widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_jumbotron';
    }

    /**
     * Get widget title.
     *
     * Retrieve Jumbotron widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Jumbotron', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Jumbotron widget icon.
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
     * Retrieve the list of categories the Jumbotron widget belongs to.
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
     * Register Jumbotron widget controls.
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
            'title',
            [
                'label'     => esc_html__( 'Notice Text', 'techmarket-extensions' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows'      => 2,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'     => esc_html__( 'Description', 'techmarket-extensions' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows'      => 3,
            ]
        );

        $this->add_control(
            'image',
            [
                'name'          => 'image',
                'label'         => esc_html__( 'Image', 'techmarket-extensions' ),
                'type'          => Controls_Manager::MEDIA,
                'placeholder'   => esc_html__( 'Upload Banner Image', 'techmarket-extensions' ),
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
     * Render Jumbotron widget output on the frontend.
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
            'title'         => $title,
            'sub_title'     => $sub_title,
            'image'         => ( isset( $image['id'] ) && $image['id'] != 0 ) ? wp_get_attachment_url( $image['id'] ) : '',
        );

        if( function_exists( 'techmarket_jumbotron' ) ) {
            techmarket_jumbotron( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_Jumbotron );