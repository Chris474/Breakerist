<?php
/**
 * Slider Customizer Options
 *
 * @package corponotch
 */

// Add slider section
$wp_customize->add_section( 'corponotch_slider_section', array(
	'title'             => esc_html__( 'Slider Section','corponotch' ),
	'description'       => esc_html__( 'Slider Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_homepage_sections_panel',
) );

// slider menu enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_slider]', array(
	'default'           => corponotch_theme_option('enable_slider'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_slider]', array(
	'label'             => esc_html__( 'Enable Slider', 'corponotch' ),
	'section'           => 'corponotch_slider_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// slider social menu enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[slider_entire_site]', array(
	'default'           => corponotch_theme_option('slider_entire_site'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[slider_entire_site]', array(
	'label'             => esc_html__( 'Show Entire Site', 'corponotch' ),
	'section'           => 'corponotch_slider_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[slider_arrow]', array(
	'default'           => corponotch_theme_option('slider_arrow'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[slider_arrow]', array(
	'label'             => esc_html__( 'Show Arrow Controller', 'corponotch' ),
	'section'           => 'corponotch_slider_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// slider autoplay control enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[slider_autoplay]', array(
	'default'           => corponotch_theme_option('slider_autoplay'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[slider_autoplay]', array(
	'label'             => esc_html__( 'Enable Auto Slide', 'corponotch' ),
	'section'           => 'corponotch_slider_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// slider count control and setting
$wp_customize->add_setting( 'corponotch_theme_options[slider_opacity]', array(
	'default'          	=> corponotch_theme_option('slider_opacity'),
	'sanitize_callback' => 'corponotch_sanitize_number_range',
) );

$wp_customize->add_control( 'corponotch_theme_options[slider_opacity]', array(
	'label'             => esc_html__( 'Overlay Opacity', 'corponotch' ),
	'section'           => 'corponotch_slider_section',
	'type'				=> 'range',
	'input_attrs'		=> array(
		'min'	=> 0,
		'max'	=> 9,
		),
) );

// slider btn label chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[slider_btn_label]', array(
	'default'          	=> corponotch_theme_option('slider_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[slider_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'corponotch' ),
	'section'           => 'corponotch_slider_section',
	'type'				=> 'text',
) );

// slider alt btn label chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[slider_alt_btn_label]', array(
	'default'          	=> corponotch_theme_option('slider_alt_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[slider_alt_btn_label]', array(
	'label'             => esc_html__( 'Alt Button Label', 'corponotch' ),
	'section'           => 'corponotch_slider_section',
	'type'				=> 'text',
) );

// slider alt btn link chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[slider_alt_btn_link]', array(
	'default'          	=> corponotch_theme_option('slider_alt_btn_link'),
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'corponotch_theme_options[slider_alt_btn_link]', array(
	'label'             => esc_html__( 'Alt Button Url', 'corponotch' ),
	'section'           => 'corponotch_slider_section',
	'type'				=> 'url',
) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[slider_alt_btn_color]', array(
	'default'           => corponotch_theme_option('slider_alt_btn_color'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[slider_alt_btn_color]', array(
	'label'             => esc_html__( 'Enable Alt Button Color', 'corponotch' ),
	'section'           => 'corponotch_slider_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

for ( $i = 1; $i <= 5; $i++ ) :

	// slider title drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_theme_options[slider_sub_title_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_theme_options[slider_sub_title_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Sub Title %d', 'corponotch' ), $i ),
		'section'           => 'corponotch_slider_section',
		'type'				=> 'text',
	) );

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Dropdown_Chosen_Control( $wp_customize, 'corponotch_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponotch' ), $i ),
		'section'           => 'corponotch_slider_section',
		'choices'			=> corponotch_page_choices(),
	) ) );

endfor;
