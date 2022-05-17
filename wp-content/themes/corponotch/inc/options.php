<?php
/**
 * Options functions
 *
 * @package corponotch
 */

if ( ! function_exists( 'corponotch_show_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function corponotch_show_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'corponotch' ),
            'off'       => esc_html__( 'No', 'corponotch' )
        );
        return apply_filters( 'corponotch_show_options', $arr );
    }
endif;

if ( ! function_exists( 'corponotch_page_choices' ) ) :
    /**
     * List of pages for page choices.
     * @return Array Array of page ids and name.
     */
    function corponotch_page_choices() {
        $pages = get_pages();
        $choices = array();
        $choices[0] = esc_html__( 'None', 'corponotch' );
        foreach ( $pages as $page ) {
            $choices[ $page->ID ] = $page->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'corponotch_post_choices' ) ) :
    /**
     * List of posts for post choices.
     * @return Array Array of post ids and name.
     */
    function corponotch_post_choices() {
        $posts = get_posts( array( 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'corponotch' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'corponotch_category_choices' ) ) :
    /**
     * List of categories for category choices.
     * @return Array Array of category ids and name.
     */
    function corponotch_category_choices() {
        $args = array(
                'type'          => 'post',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => 0,
                'hierarchical'  => 0,
                'taxonomy'      => 'category',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'corponotch' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'corponotch_site_layout' ) ) :
    /**
     * site layout
     * @return array site layout
     */
    function corponotch_site_layout() {
        $corponotch_site_layout = array(
            'full'    => get_template_directory_uri() . '/assets/uploads/full.png',
            'boxed'   => get_template_directory_uri() . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'corponotch_site_layout', $corponotch_site_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'corponotch_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidebar position
     */
    function corponotch_sidebar_position() {
        $corponotch_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/uploads/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/uploads/full.png',
            'no-sidebar-content'    => get_template_directory_uri() . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'corponotch_sidebar_position', $corponotch_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'corponotch_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function corponotch_get_spinner_list() {
        $arr = array(
            'default'               => esc_html__( 'Default', 'corponotch' ),
            'spinner-two-way'       => esc_html__( 'Two Way', 'corponotch' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'corponotch' ),
            'spinner-dots'          => esc_html__( 'Dots', 'corponotch' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'corponotch' ),
        );
        return apply_filters( 'corponotch_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'corponotch_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function corponotch_selected_sidebar() {
        $corponotch_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'corponotch' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'corponotch' ),
        );

        $output = apply_filters( 'corponotch_selected_sidebar', $corponotch_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'corponotch_sortable_sections' ) ) :
    /**
     * homepage sections
     * @return array sortable sections
     */
    function corponotch_sortable_sections() {
        $output = array( 
            'slider'        => esc_html__( 'Slider Section', 'corponotch' ),
            'short_cta'     => esc_html__( 'Short Call to Action Section', 'corponotch' ),
            'introduction'  => esc_html__( 'Introduction Section', 'corponotch' ),
            'service'       => esc_html__( 'Service Section', 'corponotch' ),
            'portfolio'     => esc_html__( 'Portfolio Section', 'corponotch' ),
            'team'          => esc_html__( 'Team Section', 'corponotch' ),
            'testimonial'   => esc_html__( 'Testimonial Section', 'corponotch' ),
            'contact'       => esc_html__( 'Contact Section', 'corponotch' ),
            'recent'        => esc_html__( 'Recent Section', 'corponotch' ),
        );

        return $output;
    }
endif;
