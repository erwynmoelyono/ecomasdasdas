<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Banners Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_Banners extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Banners widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_banners';
    }

    /**
     * Get widget title.
     *
     * Retrieve Banners widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Banners', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Banners widget icon.
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
     * Retrieve the list of categories the Banners widget belongs to.
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
     * Register Banners widget controls.
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
            'banners',
            [
                'label'  => esc_html__( 'banners', 'techmarket-extensions' ),
                'type'   => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'bg_image',
                        'label' => esc_html__( 'Background Image', 'techmarket-extensions' ),
                        'type' => Controls_Manager::MEDIA,
                        'placeholder'   => esc_html__( 'Upload Banner Image', 'techmarket-extensions' ),
                    ],
                    [
                        'name'  => 'pre_title',
                        'label' => esc_html__( 'Pre Title', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Enter your banner pre title here', 'techmarket-extensions' ),
                    ],
                    [
                        'name'  => 'title',
                        'label' => esc_html__( 'Title', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Enter your banner title here', 'techmarket-extensions' ),
                    ],
                    [
                        'name'  => 'sub_title',
                        'label' => esc_html__( 'Sub Title', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Enter your banner sub title here', 'techmarket-extensions' ),
                    ],
                    [
                        'name'  => 'action_text',
                        'label' => esc_html__( 'Action Text', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Enter your banner button text here', 'techmarket-extensions' ),
                    ],
                    [   
                        'name'  => 'action_link',
                        'label' => esc_html__( 'Action Link', 'techmarket-extensions' ),
                        'type' => Controls_Manager::TEXT,
                        'input_type' => 'url',
                        'default' => '#',
                        'placeholder' => esc_html__( 'Enter your banner url here', 'techmarket-extensions' ),
                    ],
                    [
                        'name'  => 'price',
                        'label' => esc_html__( 'Price', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Enter your banner price here', 'techmarket-extensions' ),
                    ],
                    [   
                        'name'      => 'section_class',
                        'label'         => esc_html__( 'Extra class name', 'techmarket-extensions' ),
                        'type'          => Controls_Manager::TEXT,
                        'placeholder'   => esc_html__( 'Extra class name', 'techmarket-extensions' ),
                    ]
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
     * Render Banners widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        if( is_object( $banners ) || is_array( $banners ) ) {
            $banners = json_decode( json_encode( $banners ), true );
        } else {
            $banners = json_decode( urldecode( $banners ), true );
        }

        $banners_args = array();

        if( is_array( $banners ) ) {
            foreach ( $banners as $key => $banner ) {

                extract(shortcode_atts(array(
                    'pre_title'         => '',
                    'title'             => '',
                    'sub_title'         => '',
                    'action_text'       => '',
                    'action_link'       => '',
                    'price'            => '',
                    'section_class'     => '',
                    'bg_image'          => '',
                ), $banner));

                $banners_args[] = array(
                    'pre_title'         => $pre_title,
                    'title'             => $title,
                    'sub_title'         => $sub_title,
                    'action_text'       => $action_text,
                    'action_link'       => $action_link,
                    'price'            => $price,
                    'section_class'     => $section_class,
                    'bg_image'          => isset( $bg_image['id'] ) ? wp_get_attachment_image_src ($bg_image['id'], 'full' ) : '',
                );
            }
        }

        $args = array(
            'banners'           => $banners_args,
            'section_class'     => $el_class
        );

        if( function_exists( 'techmarket_banners' ) ) {
            techmarket_banners( $args );
        }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_Banners );