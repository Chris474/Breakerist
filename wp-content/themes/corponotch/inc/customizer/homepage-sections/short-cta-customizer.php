<?php
/**
 * Short Call to Action Customizer Options
 *
 * @package corponotch
 */

// Add short_cta section
$wp_customize->add_section( 'corponotch_short_cta_section', array(
	'title'             => esc_html__( 'Short Call to Action Section','corponotch' ),
	'description'       => esc_html__( 'Short Call to Action Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_homepage_sections_panel',
) );

// short_cta menu enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_short_cta]', array(
	'default'           => corponotch_theme_option('enable_short_cta'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_short_cta]', array(
	'label'             => esc_html__( 'Enable Short Call to Action', 'corponotch' ),
	'section'           => 'corponotch_short_cta_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// short_cta pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[short_cta_content_page]', array(
	'sanitize_callback' => 'corponotch_sanitize_page_post',
) );

$wp_customize->add_control( new CorpoNotch_Dropdown_Chosen_Control( $wp_customize, 'corponotch_theme_options[short_cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'corponotch' ),
	'section'           => 'corponotch_short_cta_section',
	'choices'			=> corponotch_page_choices(),
) ) );

// short_cta btn label chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[short_cta_btn_label]', array(
	'default'          	=> corponotch_theme_option('short_cta_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[short_cta_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'corponotch' ),
	'section'           => 'corponotch_short_cta_section',
	'type'				=> 'text',
) );
