<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Team Member Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_Team_Member extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Team Member widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_team_member';
    }

    /**
     * Get widget title.
     *
     * Retrieve Team Member widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Team Member', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Team Member widget icon.
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
     * Retrieve the list of categories the Team Member widget belongs to.
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
     * Register Team Member widget controls.
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
            'name',
            [
                'label' => esc_html__( 'Name', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter team member name.', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'designation',
            [
                'label' => esc_html__( 'Designation', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter team member designation.', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'image',
            [
                'name' => 'image',
                'label' => esc_html__( 'Image', 'techmarket-extensions' ),
                'type' => Controls_Manager::MEDIA,
                'placeholder'   => esc_html__( 'Upload Image', 'techmarket-extensions' ),
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
     * Render Team Member widget output on the frontend.
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
            'name'          => $name,
            'designation'   => $designation,
            'image'         => isset( $image['id'] ) && intval( $image ) ? wp_get_attachment_image_src( $image['id'], 'full' ) : array( '//placehold.it/290x301', '290', '301' ),
        );

        if( function_exists( 'techmarket_team_member' ) ) {
            techmarket_team_member( $args );
        }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_Team_Member );