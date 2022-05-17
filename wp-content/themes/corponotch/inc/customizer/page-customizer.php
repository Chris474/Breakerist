<?php
/**
 * Page Customizer Options
 *
 * @package corponotch
 */

// Add excerpt section
$wp_customize->add_section( 'corponotch_page_section', array(
	'title'             => esc_html__( 'Page Setting','corponotch' ),
	'description'       => esc_html__( 'Page Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_theme_options_panel',
) );

// frontpage setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_front_page]', array(
	'default'           => corponotch_theme_option( 'enable_front_page' ),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_front_page]', array(
	'label'             => esc_html__( 'Show Static Front Page', 'corponotch' ),
	'section'           => 'corponotch_page_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[sidebar_page_layout]', array(
	'sanitize_callback'   => 'corponotch_sanitize_select',
	'default'             => corponotch_theme_option('sidebar_page_layout'),
) );

$wp_customize->add_control(  new CorpoNotch_Radio_Image_Control ( $wp_customize, 'corponotch_theme_options[sidebar_page_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'corponotch' ),
	'section'             => 'corponotch_page_section',
	'choices'			  => corponotch_sidebar_position(),
) ) );
