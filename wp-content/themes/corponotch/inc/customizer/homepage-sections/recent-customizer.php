<?php
/**
 * Recent Customizer Options
 *
 * @package corponotch
 */

// Add recent section
$wp_customize->add_section( 'corponotch_recent_section', array(
	'title'             => esc_html__( 'Recent Section','corponotch' ),
	'description'       => esc_html__( 'Recent Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_homepage_sections_panel',
) );

// recent enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_recent]', array(
	'default'           => corponotch_theme_option('enable_recent'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_recent]', array(
	'label'             => esc_html__( 'Enable Recent', 'corponotch' ),
	'section'           => 'corponotch_recent_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// recent sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[recent_sub_title]', array(
	'default'          	=> corponotch_theme_option('recent_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[recent_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch' ),
	'section'           => 'corponotch_recent_section',
	'type'				=> 'text',
) );

// recent label chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[recent_title]', array(
	'default'          	=> corponotch_theme_option('recent_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[recent_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch' ),
	'section'           => 'corponotch_recent_section',
	'type'				=> 'text',
) );

// recent content type control and setting
$wp_customize->add_setting( 'corponotch_theme_options[recent_content_type]', array(
	'default'          	=> corponotch_theme_option('recent_content_type'),
	'sanitize_callback' => 'corponotch_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_theme_options[recent_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch' ),
	'section'           => 'corponotch_recent_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'recent' 	=> esc_html__( 'Recent', 'corponotch' ),
		'category' 	=> esc_html__( 'Category', 'corponotch' ),
	),
) );

// recent pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[recent_content_category]', array(
	'sanitize_callback' => 'corponotch_sanitize_category',
) );

$wp_customize->add_control( new CorpoNotch_Dropdown_Chosen_Control( $wp_customize, 'corponotch_theme_options[recent_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'corponotch' ),
	'section'           => 'corponotch_recent_section',
	'choices'			=> corponotch_category_choices(),
	'active_callback'	=> 'corponotch_recent_content_category_enable',
) ) );
