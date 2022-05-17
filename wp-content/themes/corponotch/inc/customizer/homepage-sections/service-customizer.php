<?php
/**
 * Service Customizer Options
 *
 * @package corponotch
 */

// Add service section
$wp_customize->add_section( 'corponotch_service_section', array(
	'title'             => esc_html__( 'Service Section','corponotch' ),
	'description'       => esc_html__( 'Service Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_homepage_sections_panel',
) );

// service menu enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_service]', array(
	'default'           => corponotch_theme_option('enable_service'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_service]', array(
	'label'             => esc_html__( 'Enable Service', 'corponotch' ),
	'section'           => 'corponotch_service_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// service sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[service_sub_title]', array(
	'default'          	=> corponotch_theme_option('service_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[service_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch' ),
	'section'           => 'corponotch_service_section',
	'type'				=> 'text',
) );

// service label chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[service_title]', array(
	'default'          	=> corponotch_theme_option('service_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[service_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch' ),
	'section'           => 'corponotch_service_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 6; $i++ ) :

	// service menu enable setting and control.
	$wp_customize->add_setting( 'corponotch_theme_options[service_icon_' . $i . ']', array(
		// 'default'           => corponotch_theme_option('service_icon_' . $i . ''),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new CorpoNotch_Icon_Picker_Control( $wp_customize, 'corponotch_theme_options[service_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'corponotch' ), $i ),
		'section'           => 'corponotch_service_section',
		'type' 				=> 'icon_picker',
	) ) );

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Dropdown_Chosen_Control( $wp_customize, 'corponotch_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponotch' ), $i ),
		'section'           => 'corponotch_service_section',
		'choices'			=> corponotch_page_choices(),
	) ) );

	// service hr control and setting
	$wp_customize->add_setting( 'corponotch_theme_options[service_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Horizontal_Line( $wp_customize, 'corponotch_theme_options[service_custom_hr_' . $i . ']', array(
		'section'           => 'corponotch_service_section',
	) ) );

endfor;
