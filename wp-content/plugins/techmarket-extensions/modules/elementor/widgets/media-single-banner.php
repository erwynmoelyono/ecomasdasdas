<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Media Single Banner Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_Media_Single_Banner extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Media Single Banner widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_media_single_banner';
    }

    /**
     * Get widget title.
     *
     * Retrieve Media Single Banner widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Media Single Banner', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Media Single Banner widget icon.
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
     * Retrieve the list of categories the Media Single Banner widget belongs to.
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
     * Register Media Single Banner widget controls.
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
                'label'     => esc_html__( 'Title', 'techmarket-extensions' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows'      => 2,
            ]
        );

        $this->add_control(
            'description',
            [
                'label'     => esc_html__( 'Description', 'techmarket-extensions' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows'      => 4,
            ]
        );

        $this->add_control(
            'action_text',
            [
                'label'         => esc_html__( 'Action Text', 'techmarket-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Enter the Action Text', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'action_link',
            [
                'label'         => esc_html__( 'Action Link', 'techmarket-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Enter the Action Link', 'techmarket-extensions' ),
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
            'media_align',
            [
                'label' => esc_html__( 'Media Align', 'techmarket-extensions' ),
                'type'  => Controls_Manager::SELECT,
                'default' => 'media-left',
                'options' => [
                    'media-left'    => esc_html__( 'Left','techmarket-extensions'),
                    'media-right'   => esc_html__( 'Rignt','techmarket-extensions'),
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
     * Render Media Single Banner widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $el_class = empty( $media_align ) ? $el_class : $media_align . ' ' . $el_class;

        $args = array(
            'section_title' => $section_title,
            'description'   => $description,
            'action_text'   => $action_text,
            'action_link'   => $action_link,
            'image'         => array(
                '0'         => ( isset( $image['id'] ) && $image['id'] != 0 ) ? wp_get_attachment_url( $image['id'] ) : '',
            ),
            'section_class' => $el_class,
        );

        if( function_exists( 'techmarket_media_single_banner' ) ) {
            techmarket_media_single_banner( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_Media_Single_Banner );