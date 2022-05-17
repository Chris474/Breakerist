<?php
/**
 * Testimonial Customizer Options
 *
 * @package corponotch
 */

// Add testimonial section
$wp_customize->add_section( 'corponotch_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial Section','corponotch' ),
	'description'       => esc_html__( 'Testimonial Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_homepage_sections_panel',
) );

// testimonial enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_testimonial]', array(
	'default'           => corponotch_theme_option('enable_testimonial'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_testimonial]', array(
	'label'             => esc_html__( 'Enable Testimonial', 'corponotch' ),
	'section'           => 'corponotch_testimonial_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// testimonial control enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[testimonial_control]', array(
	'default'           => corponotch_theme_option('testimonial_control'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[testimonial_control]', array(
	'label'             => esc_html__( 'Show Arrow Control', 'corponotch' ),
	'section'           => 'corponotch_testimonial_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// testimonial count control and setting
$wp_customize->add_setting( 'corponotch_theme_options[testimonial_opacity]', array(
	'default'          	=> corponotch_theme_option('testimonial_opacity'),
	'sanitize_callback' => 'corponotch_sanitize_number_range',
) );

$wp_customize->add_control( 'corponotch_theme_options[testimonial_opacity]', array(
	'label'             => esc_html__( 'Overlay Opacity', 'corponotch' ),
	'section'           => 'corponotch_testimonial_section',
	'type'				=> 'range',
	'input_attrs'		=> array(
		'min'	=> 0,
		'max'	=> 9,
		),
) );

// testimonial additional image setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[testimonial_image]', array(
	'sanitize_callback' => 'corponotch_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'corponotch_theme_options[testimonial_image]',
		array(
		'label'       		=> esc_html__( 'Select Background Image', 'corponotch' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'corponotch' ), 1920, 1080 ),
		'section'     		=> 'corponotch_testimonial_section',
) ) );

for ( $i = 1; $i <= 3; $i++ ) :

	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Dropdown_Chosen_Control( $wp_customize, 'corponotch_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponotch' ), $i ),
		'section'           => 'corponotch_testimonial_section',
		'choices'			=> corponotch_page_choices(),
	) ) );

	// testimonial label chooser control and setting
	$wp_customize->add_setting( 'corponotch_theme_options[testimonial_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_theme_options[testimonial_position_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Position %d', 'corponotch' ), $i ),
		'section'           => 'corponotch_testimonial_section',
		'type'				=> 'text',
	) );

	// testimonial hr control and setting
	$wp_customize->add_setting( 'corponotch_theme_options[testimonial_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Horizontal_Line( $wp_customize, 'corponotch_theme_options[testimonial_custom_hr_' . $i . ']', array(
		'section'           => 'corponotch_testimonial_section',
	) ) );

endfor;
