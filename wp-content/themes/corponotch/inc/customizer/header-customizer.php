<?php
/**
 * Header Customizer Options
 *
 * @package corponotch
 */

// Add header section
$wp_customize->add_section( 'corponotch_header_section', array(
	'title'             => esc_html__( 'Header Section','corponotch' ),
	'description'       => esc_html__( 'Header Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_theme_options_panel',
) );

// header sticky setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_sticky_header]', array(
	'default'           => corponotch_theme_option( 'enable_sticky_header' ),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_sticky_header]', array(
	'label'             => esc_html__( 'Make Header Sticky', 'corponotch' ),
	'section'           => 'corponotch_header_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );
