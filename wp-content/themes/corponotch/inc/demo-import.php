<?php
/**
 * demo import
 *
 * @package corponotch
 */

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function corponotch_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Get demo content files for CorpoNotch Theme.', 'corponotch' ),
    esc_url( 'https://sharkthemes.com/downloads/corponotch' ), esc_html__( 'Click Here', 'corponotch' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'corponotch_intro_text' );
