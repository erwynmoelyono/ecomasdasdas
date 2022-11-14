<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Products Tabs Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_Product_Tabs extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Products Tabs widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_products_tabs';
    }

    /**
     * Get widget title.
     *
     * Retrieve Products Tabs widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Products Tabs', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Products Tabs widget icon.
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
     * Retrieve the list of categories the Products Tabs widget belongs to.
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
     * Register Products Tabs widget controls.
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
            'header_nav_align',
            [
                'label' => esc_html__( 'Header Align', 'techmarket-extensions' ),
                'type'  => Controls_Manager::SELECT,
                'default' => 'justify-content-center',
                'options' => [
                    'justify-content-start'     => esc_html__( 'Start','techmarket-extensions'),
                    'justify-content-center'    => esc_html__( 'Center','techmarket-extensions'),
                    'justify-content-end'       => esc_html__( 'End','techmarket-extensions'),
                ],
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label'  => esc_html__( 'Products Tabs', 'techmarket-extensions' ),
                'type'   => Controls_Manager::REPEATER,
                'fields' => [

                    [
                        'name'  => 'title',
                        'label' => esc_html__( 'Title', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter tab title.', 'techmarket-extensions'),
                    ],
                    [
                        'name'  => 'shortcode_tag',
                        'label' => esc_html__( 'Shortcode', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::SELECT,
                        'options'   => [
                            'featured_products'     => esc_html__( 'Featured Products','techmarket-extensions'),
                            'sale_products'         => esc_html__( 'On Sale Products','techmarket-extensions'),
                            'top_rated_products'    => esc_html__( 'Top Rated Products','techmarket-extensions'),
                            'recent_products'       => esc_html__( 'Recent Products','techmarket-extensions'),
                            'best_selling_products' => esc_html__( 'Best Selling Products','techmarket-extensions'),
                            'product_category'      => esc_html__( 'Product Category','techmarket-extensions'),
                            'products'              => esc_html__( 'Products','techmarket-extensions')
                        ],
                        'default' => 'recent_products',
                    ],
                    [
                        'name'  => 'per_page',
                        'label' => esc_html__( 'Limit', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => '12',
                        'description'   => esc_html__('Enter the number of products to display.', 'techmarket-extensions'),
                    ],
                    [
                        'name'  => 'columns',
                        'label' => esc_html__( 'Columns', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => '4',
                        'description'   => esc_html__('Enter the number of columns to display.', 'techmarket-extensions'),
                    ],
                    [
                        'name'  => 'orderby',
                        'label' => esc_html__( 'Order by', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter orderby.', 'techmarket-extensions'),
                        'default' => 'date',
                    ],
                    [
                        'name'  => 'order',
                        'label' => esc_html__( 'Order', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description' =>esc_html__('Enter order', 'techmarket-extensions' ),
                        'default' => 'DESC',
                    ],
                    [
                        'name'  => 'template',
                        'label' => esc_html__( 'Template', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description' =>esc_html__('Enter product template Default: content-product', 'techmarket-extensions' ),
                    ],
                    [
                        'name'  => 'product_id',
                        'label' => esc_html__( 'Product IDs', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description' =>esc_html__('Enter id spearate by comma(,) Note: Only works with Products Shortcode.', 'techmarket-extensions' ),
                        'condition' => [
                            'shortcode_tag' => 'products',
                        ],
                    ],
                    [
                        'name'  => 'category',
                        'label' => esc_html__( 'Category', 'techmarket-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter slug spearate by comma(,) Note: Only works with Product Category Shortcode.', 'techmarket-extensions'),
                        'condition' => [
                            'shortcode_tag' => 'product_category',
                        ],
                    ],
                ],
                'default' => [],
            ]
        );

        $this->add_control(
            'action_text',
            [
                'label' => esc_html__( 'Action text', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => '',
                'placeholder' => esc_html__( 'Enter your banner action text here', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'action_link',
            [
                'name' => 'action_link',
                'label' => esc_html__( 'Action Link', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__( 'Enter your banner url here', 'techmarket-extensions' ),
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
     * Render Products Tabs widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        if( is_object( $tabs ) || is_array( $tabs ) ) {
            $tabs = json_decode( json_encode( $tabs ), true );
        } else {
            $tabs = json_decode( urldecode( $tabs ), true );
        }

        $tabs_args = array();
        
        if( is_array( $tabs ) ) {
            foreach ( $tabs as $key => $tab ) {

                extract(shortcode_atts(array(
                    'title'                     => '',
                    'shortcode_tag'             => 'recent_products',
                    'per_page'                  => 12,
                    'columns'                   => 4,
                    'orderby'                   => 'date',
                    'order'                     => 'desc',
                    'template'                  => 'content-product',
                    'product_id'                => '',
                    'category'                  => '',
                ), $tab));
                
                $shortcode_atts = function_exists( 'techmarket_get_atts_for_shortcode' ) ? techmarket_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'products_choice' => 'ids', 'products_ids_skus' => $product_id ) ) : array();
                
                $tabs_args[] = array(
                    'title'                     => $title,
                    'shortcode_tag'             => $shortcode_tag,
                    'shortcode_atts'            => wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'columns' => $columns, 'per_page' => $per_page, 'template' => $template ) ),
                );
            }
        }

        $args = array(
            'section_title'     => $section_title,
            'header_nav_align'  => $header_nav_align,
            'tabs'              => $tabs_args,
            'action_link'       => $action_link,
            'action_text'       => $action_text,
            'section_class'     => $el_class
        );

        if( function_exists( 'techmarket_products_tabs' ) ) {
            techmarket_products_tabs( $args );
        }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_Product_Tabs );