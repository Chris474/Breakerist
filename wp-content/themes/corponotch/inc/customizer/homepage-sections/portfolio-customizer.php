<?php
/**
 * Portfolio Customizer Options
 *
 * @package corponotch
 */

// Add portfolio section
$wp_customize->add_section( 'corponotch_portfolio_section', array(
	'title'             => esc_html__( 'Portfolio Section','corponotch' ),
	'description'       => esc_html__( 'Portfolio Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_homepage_sections_panel',
) );

// portfolio menu enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_portfolio]', array(
	'default'           => corponotch_theme_option('enable_portfolio'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_portfolio]', array(
	'label'             => esc_html__( 'Enable Portfolio', 'corponotch' ),
	'section'           => 'corponotch_portfolio_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// portfolio sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[portfolio_sub_title]', array(
	'default'          	=> corponotch_theme_option('portfolio_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[portfolio_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch' ),
	'section'           => 'corponotch_portfolio_section',
	'type'				=> 'text',
) );

// portfolio label chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[portfolio_title]', array(
	'default'          	=> corponotch_theme_option('portfolio_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[portfolio_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch' ),
	'section'           => 'corponotch_portfolio_section',
	'type'				=> 'text',
) );

// portfolio button label chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[portfolio_btn_label]', array(
	'default'          	=> corponotch_theme_option('portfolio_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[portfolio_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'corponotch' ),
	'section'           => 'corponotch_portfolio_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 6; $i++ ) :

	// portfolio posts drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_theme_options[portfolio_content_post_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Dropdown_Chosen_Control( $wp_customize, 'corponotch_theme_options[portfolio_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'corponotch' ), $i ),
		'section'           => 'corponotch_portfolio_section',
		'choices'			=> corponotch_post_choices(),
	) ) );

endfor;
