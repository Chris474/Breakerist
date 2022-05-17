<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corponotch
 */

/**
 * corponotch_doctype_action hook
 *
 * @hooked corponotch_doctype -  10
 *
 */
do_action( 'corponotch_doctype_action' );

/**
 * corponotch_head_action hook
 *
 * @hooked corponotch_head -  10
 *
 */
do_action( 'corponotch_head_action' );

/**
 * corponotch_body_start_action hook
 *
 * @hooked corponotch_body_start -  10
 *
 */
do_action( 'corponotch_body_start_action' );
 
/**
 * corponotch_page_start_action hook
 *
 * @hooked corponotch_page_start -  10
 * @hooked corponotch_loader -  20
 *
 */
do_action( 'corponotch_page_start_action' );

/**
 * corponotch_header_start_action hook
 *
 * @hooked corponotch_header_start -  10
 *
 */
do_action( 'corponotch_header_start_action' );

/**
 * corponotch_site_branding_action hook
 *
 * @hooked corponotch_site_branding -  10
 *
 */
do_action( 'corponotch_site_branding_action' );

/**
 * corponotch_primary_nav_action hook
 *
 * @hooked corponotch_primary_nav -  10
 *
 */
do_action( 'corponotch_primary_nav_action' );

/**
 * corponotch_header_ends_action hook
 *
 * @hooked corponotch_header_ends -  10
 *
 */
do_action( 'corponotch_header_ends_action' );

/**
 * corponotch_site_content_start_action hook
 *
 * @hooked corponotch_site_content_start -  10
 *
 */
do_action( 'corponotch_site_content_start_action' );

/**
 * corponotch_primary_content_action hook
 *
 */
if ( is_front_page() && ! is_home() ) {
	$sections = corponotch_sortable_sections();
	$sorted = corponotch_theme_option( 'sortable' );
	$sorted = ! empty( $sorted ) ? explode( ',' , $sorted ) : array_keys( $sections );
	$i = 1;

	foreach ( $sorted as $section ) {
		add_action( 'corponotch_primary_content_action', 'corponotch_add_'. $section .'_section', $i . 0 );
		$i++;
	}
	do_action( 'corponotch_primary_content_action' );
}