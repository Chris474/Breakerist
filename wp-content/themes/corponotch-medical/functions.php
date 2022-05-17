<?php
/**
 * Theme functions and definitions
 *
 * @package corponotch_medical
 */ 


if ( ! function_exists( 'corponotch_medical_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function corponotch_medical_enqueue_styles() {
		wp_enqueue_style( 'corponotch-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'corponotch-medical-style', get_stylesheet_directory_uri() . '/style.css', array( 'corponotch-style-parent' ), '1.0.0' );

        // Add custom fonts, used in the main stylesheet.
        wp_enqueue_style( 'corponotch-medical-fonts', corponotch_medical_fonts_url(), array(), null );
	}
endif;
add_action( 'wp_enqueue_scripts', 'corponotch_medical_enqueue_styles', 99 );

/**
 * Enqueue editor styles for Gutenberg
 */
function corponotch_medical_block_editor_styles() {
    // Add custom fonts.
    wp_enqueue_style( 'corponotch-medical-fonts', corponotch_medical_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'corponotch_medical_block_editor_styles' );

if ( ! function_exists( 'corponotch_medical_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function corponotch_medical_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'corponotch-medical' ) ) {
        $fonts[] = 'Playfair Display:300,400,500,600,700';
    }

    /* translators: If there are characters in your language that are not supported by Oxygen, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Oxygen font: on or off', 'corponotch-medical' ) ) {
        $fonts[] = 'Oxygen:300,400,500,600,700';
    }

    $query_args = array(
        'family' => urlencode( implode( '|', $fonts ) ),
        'subset' => urlencode( $subsets ),
    );

    if ( $fonts ) {
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}
endif;

// Add class to body.
add_filter( 'body_class', 'corponotch_medical_add_body_class' );
function corponotch_medical_add_body_class( $classes ) {
    return array_merge( $classes, array( 'header-font-8', 'body-font-6' ) );
}

if ( ! function_exists( 'corponotch_medical_theme_defaults' ) ) :
    /**
     * Customize theme defaults.
     *
     * @since 1.0.0
     *
     * @param array $defaults Theme defaults.
     * @param array Custom theme defaults.
     */
    function corponotch_medical_theme_defaults( $defaults ) {
        $defaults['enable_slider'] = false;
        $defaults['slider_opacity'] = 0;
        $defaults['enable_loader'] = false;

        return $defaults;
    }
endif;
add_filter( 'corponotch_default_theme_options', 'corponotch_medical_theme_defaults', 99 );

/**
* Start slider section
*
* @return string slider content
* @since CorpoNotch 1.0.0
*
*/
function corponotch_render_slider_section( $content_details = array() ) {
    if ( empty( $content_details ) )
        return;

    $slider_control = corponotch_theme_option( 'slider_arrow' );
    $slider_autoplay = corponotch_theme_option( 'slider_autoplay' );
    $slider_btn_label = corponotch_theme_option( 'slider_btn_label', '' );
    $slider_alt_btn_link = corponotch_theme_option( 'slider_alt_btn_link', '' );
    $slider_alt_btn_label = corponotch_theme_option( 'slider_alt_btn_label', '' );
    $slider_opacity = corponotch_theme_option( 'slider_opacity', 0 );
    $slider_alt_btn_color = corponotch_theme_option( 'slider_alt_btn_color' );
    ?>
	<div id="custom-header">
        <div class="section-content banner-slider left-align dark-text" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php echo $slider_control ? 'true' : 'false'; ?>, "autoplay": <?php echo $slider_autoplay ? 'true' : 'false'; ?>, "fade": true, "draggable": true }'>
            <?php foreach ( $content_details as $content ) : ?>
                <div class="custom-header-content-wrapper slide-item">
                    <?php if ( ! empty( $content['image'] ) ) : ?>
                        <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                    <?php endif; ?>
                    <div class="overlay" style="opacity: 0.<?php echo absint( $slider_opacity ); ?>"></div>
                    <div class="wrapper">
                        <div class="custom-header-content">
                             <?php if ( ! empty( $content['sub_title'] ) ) : ?>
                                <p class="sub-title"><?php echo esc_html( $content['sub_title'] ); ?></p>
                            <?php endif; 

                            if ( ! empty( $content['title'] ) ) : ?>
                                <h2><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            <?php endif; 

                            if ( ! empty( $slider_btn_label ) ) : ?>
                                <div class="read-more">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $slider_btn_label ); ?></a>
                                </div>
                            <?php endif;

                            if ( ! empty( $slider_alt_btn_label ) && ! empty( $slider_alt_btn_link ) ) : ?>
                                <div class="read-more alt-btn <?php echo $slider_alt_btn_color ? 'alt-btn-primary' : ''; ?>">
                                    <a href="<?php echo esc_url( $slider_alt_btn_link ); ?>"><?php echo esc_html( $slider_alt_btn_label ); ?></a>
                                </div>
                            <?php endif; ?>
                        </div><!-- .custom-header-content -->
                    </div>
                </div><!-- .custom-header-content-wrapper -->
            <?php endforeach; ?>
        </div><!-- .wrapper -->
    </div><!-- #custom-header -->
<?php 
}
