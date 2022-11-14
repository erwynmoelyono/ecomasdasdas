<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Recent Posts With Categories Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Techmarket_Elementor_Recent_Posts_With_Categories extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Recent Posts With Categories widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'techmarket_recent_posts_with_categories';
    }

    /**
     * Get widget title.
     *
     * Retrieve Recent Posts With Categories widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Recent Posts With Categories', 'techmarket-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Recent Posts With Categories widget icon.
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
     * Retrieve the list of categories the Recent Posts With Categories widget belongs to.
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
     * Register Recent Posts With Categories widget controls.
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
                'default' => 'Welcome in Gaming World.',
                'placeholder' => esc_html__( 'Enter your section title here.', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 2,
                'placeholder' => esc_html__( 'Enter the description.', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'post_choice',
            [
                'label' => esc_html__( 'Post Choice', 'techmarket-extensions' ),
                'type'  => Controls_Manager::SELECT,
                'default' => 'Recent',
                'options' => [
                    'recent'    => esc_html__( 'Recent','techmarket-extensions'),
                    'random'    => esc_html__( 'Random','techmarket-extensions'),
                    'specific'  => esc_html__( 'Specific','techmarket-extensions'),
                ],
                'description'   => esc_html__( 'Select choice for posts.', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'ids',
            [
                'label'         => esc_html__('IDs', 'techmarket-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter id spearate by comma(,) Note: Only works with specific choice.', 'techmarket-extensions'),
                'condition' => [
                    'post_choice' => 'specific',
                ],
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => esc_html__( 'Limit', 'techmarket-extensions' ),
                'type' => Controls_Manager::TEXT,
                'default'       => 6,
                'placeholder' => esc_html__( 'Enter the number of posts to display.', 'techmarket-extensions' ),
            ]
        );

        $this->add_control(
            'show_read_more',
            [
                'label'         => esc_html__( 'Show Read More', 'techmarket-extensions' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Show', 'techmarket-extensions' ),
                'label_off'     => esc_html__( 'Hide', 'techmarket-extensions' ),
                'return_value'  => true,
                'default'       => true,
            ]
        );

        $this->add_control(
            'cat_limit',
            [
                'label'         => esc_html__('Category Limit', 'techmarket-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'       => 6,
                'placeholder'   => esc_html__('Enter the number of category to display.', 'techmarket-extensions'),
            ]
        );

        $this->add_control(
            'cat_slugs',
            [
                'label'         => esc_html__('Category Slugs', 'techmarket-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter slug spearate by comma(,)', 'techmarket-extensions'),
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
     * Render Recent Posts With Categories widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $category_args = array(
            'number'            => $cat_limit,
            'slugs'             => $cat_slugs,
        );

        $args = array(
            'section_title'     => $section_title,
            'description'       => $description,
            'category_args'     => $category_args,
            'post_choice'       => $post_choice,
            'post_id'           => $ids,
            'limit'             => $limit,
            'show_read_more'    => $show_read_more,
            'section_class'     => $el_class,
        );

        if( function_exists( 'techmarket_recent_posts_with_categories' ) ) {
            techmarket_recent_posts_with_categories( $args );
        }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Techmarket_Elementor_Recent_Posts_With_Categories );