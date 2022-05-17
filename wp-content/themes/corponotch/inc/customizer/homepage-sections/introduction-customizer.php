<?php
/**
 * Introduction Customizer Options
 *
 * @package corponotch
 */

// Add introduction section
$wp_customize->add_section( 'corponotch_introduction_section', array(
	'title'             => esc_html__( 'Introduction Section','corponotch' ),
	'description'       => esc_html__( 'Introduction Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_homepage_sections_panel',
) );

// introduction menu enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_introduction]', array(
	'default'           => corponotch_theme_option('enable_introduction'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_introduction]', array(
	'label'             => esc_html__( 'Enable Introduction', 'corponotch' ),
	'section'           => 'corponotch_introduction_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// introduction sub title drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[introduction_sub_title]', array(
	'default'          	=> corponotch_theme_option('introduction_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[introduction_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch' ),
	'section'           => 'corponotch_introduction_section',
	'type'				=> 'text',
) );

// introduction pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[introduction_content_page]', array(
	'sanitize_callback' => 'corponotch_sanitize_page_post',
) );

$wp_customize->add_control( new CorpoNotch_Dropdown_Chosen_Control( $wp_customize, 'corponotch_theme_options[introduction_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'corponotch' ),
	'section'           => 'corponotch_introduction_section',
	'choices'			=> corponotch_page_choices(),
) ) );

// introduction btn label chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[introduction_btn_label]', array(
	'default'          	=> corponotch_theme_option('introduction_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[introduction_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'corponotch' ),
	'section'           => 'corponotch_introduction_section',
	'type'				=> 'text',
) );
