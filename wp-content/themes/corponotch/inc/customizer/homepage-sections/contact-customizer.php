<?php
/**
 * Contact Customizer Options
 *
 * @package corponotch
 */

// Add contact section
$wp_customize->add_section( 'corponotch_contact_section', array(
	'title'             => esc_html__( 'Contact Section','corponotch' ),
	'description'       => esc_html__( 'Contact Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_homepage_sections_panel',
) );

// contact menu enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_contact]', array(
	'default'           => corponotch_theme_option('enable_contact'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_contact]', array(
	'label'             => esc_html__( 'Enable Contact', 'corponotch' ),
	'section'           => 'corponotch_contact_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// Client additional image setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[contact_image]', array(
	'sanitize_callback' => 'corponotch_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'corponotch_theme_options[contact_image]',
		array(
		'label'       		=> esc_html__( 'Select Background Image', 'corponotch' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'corponotch' ), 1920, 1080 ),
		'section'     		=> 'corponotch_contact_section',
) ) );

// contact sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[contact_sub_title]', array(
	'default'          	=> corponotch_theme_option('contact_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[contact_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch' ),
	'section'           => 'corponotch_contact_section',
	'type'				=> 'text',
) );

// contact label chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[contact_title]', array(
	'default'          	=> corponotch_theme_option('contact_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[contact_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch' ),
	'section'           => 'corponotch_contact_section',
	'type'				=> 'text',
) );

// contact btn label chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[contact_shortcode]', array(
	'default'          	=> corponotch_theme_option('contact_shortcode'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[contact_shortcode]', array(
	'label'             => esc_html__( 'Contact Form Shortcode', 'corponotch' ),
	'description'       => esc_html__( 'Note: Please add form shortcode from Contact Form 7.', 'corponotch' ),
	'section'           => 'corponotch_contact_section',
	'type'				=> 'text',
) );
