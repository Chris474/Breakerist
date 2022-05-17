<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corponotch
 */

/**
 * corponotch_site_content_ends_action hook
 *
 * @hooked corponotch_site_content_ends -  10
 *
 */
do_action( 'corponotch_site_content_ends_action' );

/**
 * corponotch_footer_start_action hook
 *
 * @hooked corponotch_footer_start -  10
 *
 */
do_action( 'corponotch_footer_start_action' );

/**
 * corponotch_site_info_action hook
 *
 * @hooked corponotch_site_info -  10
 *
 */
do_action( 'corponotch_site_info_action' );

/**
 * corponotch_footer_ends_action hook
 *
 * @hooked corponotch_footer_ends -  10
 * @hooked corponotch_slide_to_top -  20
 *
 */
do_action( 'corponotch_footer_ends_action' );

/**
 * corponotch_page_ends_action hook
 *
 * @hooked corponotch_page_ends -  10
 *
 */
do_action( 'corponotch_page_ends_action' );

wp_footer();

/**
 * corponotch_body_html_ends_action hook
 *
 * @hooked corponotch_body_html_ends -  10
 *
 */
do_action( 'corponotch_body_html_ends_action' );
