<?php
/**
 * Sortable Customizer Options
 *
 * @package corponotch
 */

// Add sortable section
$wp_customize->add_section( 'corponotch_sortable', array(
	'title'               => esc_html__('Homepage Sortable','corponotch'),
	'description'         => esc_html__( 'Homepage Sortable Settings.', 'corponotch' ),
	'panel'               => 'corponotch_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[sortable]', array(
	'sanitize_callback'   => 'corponotch_sanitize_sortable',
) );

$wp_customize->add_control( new CorpoNotch_Customize_Sortable_Control ( $wp_customize, 'corponotch_theme_options[sortable]', array(
	'label'               => esc_html__( 'Sortable Homepage', 'corponotch' ),
	'description'         => esc_html__( 'Drag and Drop to sort the sections according to your preference.', 'corponotch' ),
	'section'             => 'corponotch_sortable',
	'type'                => 'sortable',
	'choices'			  => corponotch_sortable_sections(),
) ) );

// sortable reset setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[sortable_reset]', array(
	'default'           => corponotch_theme_option('sortable_reset'),
	'sanitize_callback' => 'corponotch_sanitize_checkbox',
) );

$wp_customize->add_control( 'corponotch_theme_options[sortable_reset]', array(
	'label'             => esc_html__( 'Reset Sortable', 'corponotch' ),
	'description'       => esc_html__( 'Note: Refresh the page as you publish the settings to see the change.', 'corponotch' ),
	'type'              => 'checkbox',
	'section'           => 'corponotch_sortable',
) );
