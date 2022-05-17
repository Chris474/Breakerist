<?php
/**
 * Global Customizer Options
 *
 * @package corponotch
 */

// Add Global section
$wp_customize->add_section( 'corponotch_global_section', array(
	'title'             => esc_html__( 'Global Setting','corponotch' ),
	'description'       => esc_html__( 'Global Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_theme_options_panel',
) );

// breadcrumb setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_breadcrumb]', array(
	'default'           => corponotch_theme_option( 'enable_breadcrumb' ),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_breadcrumb]', array(
	'label'             => esc_html__( 'Enable Breadcrumb', 'corponotch' ),
	'section'           => 'corponotch_global_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// site layout setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[site_layout]', array(
	'sanitize_callback'   => 'corponotch_sanitize_select',
	'default'             => corponotch_theme_option('site_layout'),
) );

$wp_customize->add_control(  new CorpoNotch_Radio_Image_Control ( $wp_customize, 'corponotch_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'corponotch' ),
	'section'             => 'corponotch_global_section',
	'choices'			  => corponotch_site_layout(),
) ) );

// loader setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_loader]', array(
	'default'           => corponotch_theme_option( 'enable_loader' ),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_loader]', array(
	'label'             => esc_html__( 'Enable Loader', 'corponotch' ),
	'section'           => 'corponotch_global_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// loader type control and setting
$wp_customize->add_setting( 'corponotch_theme_options[loader_type]', array(
	'default'          	=> corponotch_theme_option('loader_type'),
	'sanitize_callback' => 'corponotch_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_theme_options[loader_type]', array(
	'label'             => esc_html__( 'Loader Type', 'corponotch' ),
	'section'           => 'corponotch_global_section',
	'type'				=> 'select',
	'choices'			=> corponotch_get_spinner_list(),
) );
