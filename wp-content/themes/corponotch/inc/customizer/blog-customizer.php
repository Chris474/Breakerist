<?php
/**
 * Blog / Archive / Search Customizer Options
 *
 * @package corponotch
 */

// Add blog section
$wp_customize->add_section( 'corponotch_blog_section', array(
	'title'             => esc_html__( 'Blog/Archive Page Setting','corponotch' ),
	'description'       => esc_html__( 'Blog/Archive/Search Page Setting Options', 'corponotch' ),
	'panel'             => 'corponotch_theme_options_panel',
) );

// latest blog title drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_theme_options[latest_blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> corponotch_theme_option( 'latest_blog_title' ),
) );

$wp_customize->add_control( new CorpoNotch_Dropdown_Chosen_Control( $wp_customize, 'corponotch_theme_options[latest_blog_title]', array(
	'label'             => esc_html__( 'Latest Blog Title', 'corponotch' ),
	'description'       => esc_html__( 'Note: This title is displayed when your homepage displays option is set to latest posts.', 'corponotch' ),
	'section'           => 'corponotch_blog_section',
	'type'				=> 'text',
) ) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[sidebar_layout]', array(
	'sanitize_callback'   => 'corponotch_sanitize_select',
	'default'             => corponotch_theme_option( 'sidebar_layout' ),
) );

$wp_customize->add_control(  new CorpoNotch_Radio_Image_Control ( $wp_customize, 'corponotch_theme_options[sidebar_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'corponotch' ),
	'section'             => 'corponotch_blog_section',
	'choices'			  => corponotch_sidebar_position(),
) ) );

// column control and setting
$wp_customize->add_setting( 'corponotch_theme_options[column_type]', array(
	'default'          	=> corponotch_theme_option( 'column_type' ),
	'sanitize_callback' => 'corponotch_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_theme_options[column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'corponotch' ),
	'section'           => 'corponotch_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-1' 		=> esc_html__( 'One Column', 'corponotch' ),
		'column-2' 		=> esc_html__( 'Two Column', 'corponotch' ),
	),
) );

// excerpt count control and setting
$wp_customize->add_setting( 'corponotch_theme_options[excerpt_count]', array(
	'default'          	=> corponotch_theme_option( 'excerpt_count' ),
	'sanitize_callback' => 'corponotch_sanitize_number_range',
	'validate_callback' => 'corponotch_validate_excerpt_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponotch_theme_options[excerpt_count]', array(
	'label'             => esc_html__( 'Excerpt Length', 'corponotch' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'corponotch' ),
	'section'           => 'corponotch_blog_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 50,
		),
) );

// pagination control and setting
$wp_customize->add_setting( 'corponotch_theme_options[pagination_type]', array(
	'default'          	=> corponotch_theme_option( 'pagination_type' ),
	'sanitize_callback' => 'corponotch_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_theme_options[pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'corponotch' ),
	'section'           => 'corponotch_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'default' 		=> esc_html__( 'Default', 'corponotch' ),
		'numeric' 		=> esc_html__( 'Numeric', 'corponotch' ),
	),
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[show_date]', array(
	'default'           => corponotch_theme_option( 'show_date' ),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[show_date]', array(
	'label'             => esc_html__( 'Show Date', 'corponotch' ),
	'section'           => 'corponotch_blog_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[show_category]', array(
	'default'           => corponotch_theme_option( 'show_category' ),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[show_category]', array(
	'label'             => esc_html__( 'Show Category', 'corponotch' ),
	'section'           => 'corponotch_blog_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[show_author]', array(
	'default'           => corponotch_theme_option( 'show_author' ),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[show_author]', array(
	'label'             => esc_html__( 'Show Author', 'corponotch' ),
	'section'           => 'corponotch_blog_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );

// Archive comment meta setting and control.
$wp_customize->add_setting( 'corponotch_theme_options[show_comment]', array(
	'default'           => corponotch_theme_option( 'show_comment' ),
	'sanitize_callback' => 'corponotch_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Switch_Control( $wp_customize, 'corponotch_theme_options[show_comment]', array(
	'label'             => esc_html__( 'Show Comment', 'corponotch' ),
	'section'           => 'corponotch_blog_section',
	'on_off_label' 		=> corponotch_show_options(),
) ) );