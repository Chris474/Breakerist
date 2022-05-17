<?php
/**
 * Short Call to action hook
 *
 * @package corponotch
 */

if ( ! function_exists( 'corponotch_add_short_cta_section' ) ) :
    /**
    * Add short_cta section
    *
    *@since CorpoNotch 1.0.0
    */
    function corponotch_add_short_cta_section() {

        // Check if short_cta is enabled on frontpage
        $short_cta_enable = apply_filters( 'corponotch_section_status', 'enable_short_cta', '' );

        if ( ! $short_cta_enable )
            return false;

        // Get short_cta section details
        $section_details = array();
        $section_details = apply_filters( 'corponotch_filter_short_cta_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render short_cta section now.
        corponotch_render_short_cta_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponotch_get_short_cta_section_details' ) ) :
    /**
    * short_cta section details.
    *
    * @since CorpoNotch 1.0.0
    * @param array $input short_cta section details.
    */
    function corponotch_get_short_cta_section_details( $input ) {

        $content = array();
        $page_id = corponotch_theme_option( 'short_cta_content_page', '' );
        
        $args = array(
            'post_type' => 'page',
            'page_id' => absint( $page_id ),
            'posts_per_page' => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// short_cta section content details.
add_filter( 'corponotch_filter_short_cta_section_details', 'corponotch_get_short_cta_section_details' );


if ( ! function_exists( 'corponotch_render_short_cta_section' ) ) :
  /**
   * Start short_cta section
   *
   * @return string short_cta content
   * @since CorpoNotch 1.0.0
   *
   */
   function corponotch_render_short_cta_section( $content_details = array() ) {
        $read_more = corponotch_theme_option( 'short_cta_btn_label', esc_html__( 'Contact Us', 'corponotch' ) );

        if ( empty( $content_details ) )
            return;

        foreach ( $content_details as $content ) :  ?>
            <div class="short-cta-section cta-section relative left-align">
                <div class="wrapper">
                    <?php if ( ! empty( $content['title'] ) ) : ?>
                        <div class="section-header align-center add-separator">
                            <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; ?>

                    <div class="read-more">
                        <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $read_more ); ?></a>
                    </div>
                </div><!-- .wrapper -->
            </div><!-- #short_cta -->
        <?php endforeach;
    }
endif;