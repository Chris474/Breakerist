<?php
/**
 * Team Customizer Options
 *
 * @package corponotch
 */

// Add team section
$wp_customize->add_section( 'corponotch_team_section', array(
	'title'             => esc_html__( 'Team Section','corponotch' ),
	'description'       => esc_html__( 'Team Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_homepage_sections_panel',
) );

// team menu enable setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[enable_team]', array(
	'default'           => corponotch_theme_option('enable_team'),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[enable_team]', array(
	'label'             => esc_html__( 'Enable Team', 'corponotch' ),
	'section'           => 'corponotch_team_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// team sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[team_sub_title]', array(
	'default'          	=> corponotch_theme_option('team_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[team_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch' ),
	'section'           => 'corponotch_team_section',
	'type'				=> 'text',
) );

// team label chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[team_title]', array(
	'default'          	=> corponotch_theme_option('team_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_theme_options[team_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch' ),
	'section'           => 'corponotch_team_section',
	'type'				=> 'text',
) );

// team column type control and setting
$wp_customize->add_setting( 'corponotch_theme_options[team_column]', array(
	'default'          	=> corponotch_theme_option('team_column'),
	'sanitize_callback' => 'corponotch_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_theme_options[team_column]', array(
	'label'             => esc_html__( 'Column Type', 'corponotch' ),
	'section'           => 'corponotch_team_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-2'  => esc_html__( 'Two Column', 'corponotch' ),
        'column-4'  => esc_html__( 'Four Column', 'corponotch' ),
	),
) );

for ( $i = 1; $i <= 4; $i++ ) :

	// team pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_theme_options[team_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Dropdown_Chosen_Control( $wp_customize, 'corponotch_theme_options[team_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponotch' ), $i ),
		'section'           => 'corponotch_team_section',
		'choices'			=> corponotch_page_choices(),
	) ) );

	// team label chooser control and setting
	$wp_customize->add_setting( 'corponotch_theme_options[team_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_theme_options[team_position_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Position %d', 'corponotch' ), $i ),
		'section'           => 'corponotch_team_section',
		'type'				=> 'text',
	) );

	// team hr control and setting
	$wp_customize->add_setting( 'corponotch_theme_options[team_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Horizontal_Line( $wp_customize, 'corponotch_theme_options[team_custom_hr_' . $i . ']', array(
		'section'           => 'corponotch_team_section',
	) ) );

endfor;
