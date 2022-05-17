<?php
/**
 * Footer Customizer Options
 *
 * @package corponotch
 */

// Add footer section
$wp_customize->add_section( 'corponotch_footer_section', array(
	'title'             => esc_html__( 'Footer Section','corponotch' ),
	'description'       => esc_html__( 'Footer Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_theme_options_panel',
) );

// slide to top enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[slide_to_top]', array(
	'default'           => corponotch_theme_option('slide_to_top'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[slide_to_top]', array(
	'label'             => esc_html__( 'Show Slide to Top', 'corponotch' ),
	'section'           => 'corponotch_footer_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// copyright text
$wp_customize->add_setting( 'corponotch_theme_options[copyright_text]',
	array(
		'default'       		=> corponotch_theme_option('copyright_text'),
		'sanitize_callback'		=> 'corponotch_santize_allow_tags',
	)
);
$wp_customize->add_control( 'corponotch_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'corponotch' ),
		'section'    			=> 'corponotch_footer_section',
		'type'		 			=> 'textarea',
    )
);

