<?php
/**
 * CorpoNotch Theme Customizer
 *
 * @package corponotch
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function corponotch_customize_register( $wp_customize ) {
	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/controls.php';

	// Load callback functions.
	require get_template_directory() . '/inc/customizer/callbacks.php';

	// Load validation functions.
	require get_template_directory() . '/inc/customizer/validate.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'corponotch_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'corponotch_customize_partial_blogdescription',
		) );
	}

	// Register custom section types.
	$wp_customize->register_section_type( 'CorpoNotch_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new CorpoNotch_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'CorpoNotch Pro', 'corponotch' ),
				'pro_text' => esc_html__( 'Buy Pro', 'corponotch' ),
				'pro_url'  => 'http://www.sharkthemes.com/downloads/corponotch-pro/',
				'priority'  => 10,
			)
		)
	);

	// Add panel for common Home Page Settings
	$wp_customize->add_panel( 'corponotch_homepage_sections_panel' , array(
	    'title'      => esc_html__( 'Homepage Sections','corponotch' ),
	    'description'=> esc_html__( 'CorpoNotch Homepage Sections.', 'corponotch' ),
	    'priority'   => 100,
	) );

	// topbar settings
	require get_template_directory() . '/inc/customizer/homepage-sections/topbar-customizer.php';

	// slider settings
	require get_template_directory() . '/inc/customizer/homepage-sections/slider-customizer.php';

	// short call to action settings
	require get_template_directory() . '/inc/customizer/homepage-sections/short-cta-customizer.php';

	// introduction settings
	require get_template_directory() . '/inc/customizer/homepage-sections/introduction-customizer.php';
	
	// service settings
	require get_template_directory() . '/inc/customizer/homepage-sections/service-customizer.php';

	// portfolio settings
	require get_template_directory() . '/inc/customizer/homepage-sections/portfolio-customizer.php';

	// team settings
	require get_template_directory() . '/inc/customizer/homepage-sections/team-customizer.php';

	// testimonial settings
	require get_template_directory() . '/inc/customizer/homepage-sections/testimonial-customizer.php';

	// contact settings
	require get_template_directory() . '/inc/customizer/homepage-sections/contact-customizer.php';

	// recent settings
	require get_template_directory() . '/inc/customizer/homepage-sections/recent-customizer.php';

	// Add panel for common Home Page Settings
	$wp_customize->add_panel( 'corponotch_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','corponotch' ),
	    'description'=> esc_html__( 'CorpoNotch Theme Options.', 'corponotch' ),
	    'priority'   => 100,
	) );

	// header settings
	require get_template_directory() . '/inc/customizer/header-customizer.php';

	// footer settings
	require get_template_directory() . '/inc/customizer/footer-customizer.php';
	
	// blog/archive settings
	require get_template_directory() . '/inc/customizer/blog-customizer.php';

	// single settings
	require get_template_directory() . '/inc/customizer/single-customizer.php';

	// page settings
	require get_template_directory() . '/inc/customizer/page-customizer.php';

	// global settings
	require get_template_directory() . '/inc/customizer/global-customizer.php';

	// sortable settings
	require get_template_directory() . '/inc/customizer/sortable-customizer.php';

}
add_action( 'customize_register', 'corponotch_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function corponotch_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function corponotch_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function corponotch_customize_preview_js() {
	wp_enqueue_script( 'corponotch-customizer', get_template_directory_uri() . '/assets/js/customizer' . corponotch_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'corponotch_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function corponotch_customize_control_js() {
	// Choose from select jquery.
	wp_enqueue_style( 'jquery-chosen', get_template_directory_uri() . '/assets/css/chosen' . corponotch_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen' . corponotch_min() . '.js', array( 'jquery' ), '1.4.2', true );

	// Choose fontawesome select jquery.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . corponotch_min() . '.css' );
	wp_enqueue_style( 'simple-iconpicker', get_template_directory_uri() . '/assets/css/simple-iconpicker' . corponotch_min() . '.css' );
	wp_enqueue_script( 'jquery-simple-iconpicker', get_template_directory_uri() . '/assets/js/simple-iconpicker' . corponotch_min() . '.js', array( 'jquery' ), '', true );

	// admin script
	wp_enqueue_style( 'corponotch-customizer-style', get_template_directory_uri() . '/assets/css/customizer' . corponotch_min() . '.css' );
	wp_enqueue_script( 'corponotch-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls' . corponotch_min() . '.js', array( 'jquery', 'jquery-chosen', 'jquery-simple-iconpicker' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'corponotch_customize_control_js' );

if ( ! function_exists( 'corponotch_reset_sortable_options' ) ) :
	/**
	 * Reset sortable options
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function corponotch_reset_sortable_options() {
		if ( true === corponotch_theme_option('sortable_reset') ) {

			$corponotch_default_options = corponotch_get_default_theme_options();
	  		$theme_data = wp_parse_args( get_theme_mod( 'corponotch_theme_options' ), $corponotch_default_options ) ;
	  		$sortable_update = array( 'sortable_reset' => false, 'sortable' => '' );
	  		$theme_data_update = array_replace( $theme_data, $sortable_update );

			// Reset sortable theme options.
			set_theme_mod( 'corponotch_theme_options', $theme_data_update );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'corponotch_reset_sortable_options' );
