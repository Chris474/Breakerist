<?php
/**
 * Default Theme Customizer Values
 *
 * @package corponotch
 */

function corponotch_get_default_theme_options() {
	$corponotch_default_options = array(
		// default options

		/* Homepage Sections */

		// Top Bar
		'enable_topbar'			=> true,
		'show_social_menu'		=> false,
		'show_top_search'		=> true,

		// Slider
		'enable_slider'			=> true,
		'slider_entire_site'	=> false,
		'slider_arrow'			=> true,
		'slider_autoplay'		=> true,
		'slider_opacity'		=> 3,
		'slider_btn_label'		=> esc_html__( 'Learn More', 'corponotch' ),
		'slider_alt_btn_url'	=> '#',
		'slider_alt_btn_color'	=> false,

		// Short Call to action
		'enable_short_cta'			=> false,
		'short_cta_btn_label'		=> esc_html__( 'Contact Us Now', 'corponotch' ),

		// Introduction
		'enable_introduction'		=> false,
		'introduction_sub_title'	=> esc_html__( 'About Us', 'corponotch' ),
		'introduction_btn_label'	=> esc_html__( 'Explore Us', 'corponotch' ),

		// Service
		'enable_service'		=> false,
		'service_sub_title'		=> esc_html__( 'Our Service', 'corponotch' ),
		'service_title'			=> esc_html__( 'What we can do for you', 'corponotch' ),

		// Portfolio
		'enable_portfolio'		=> false,
		'portfolio_sub_title'	=> esc_html__( 'Portfolio', 'corponotch' ),
		'portfolio_title'		=> esc_html__( 'Our popular case studies', 'corponotch' ),
		'portfolio_btn_label'	=> esc_html__( 'Read More', 'corponotch' ),

		// Team
		'enable_team'			=> false,
		'team_sub_title'		=> esc_html__( 'Our Team', 'corponotch' ),
		'team_title'			=> esc_html__( 'Meet our exclusive team members', 'corponotch' ),
		'team_column'			=> 'column-4',

		// Testimonial
		'enable_testimonial'	=> false,
		'testimonial_control'	=> true,
		'testimonial_opacity'	=> 8,

		// Recent
		'enable_recent'			=> false,
		'recent_sub_title'		=> esc_html__( 'Latest News', 'corponotch' ),
		'recent_title'			=> esc_html__( 'Check latest blogs for more inspiration', 'corponotch' ),
		'recent_content_type'	=> 'recent',

		// Contact
		'enable_contact'		=> false,
		'contact_sub_title'		=> esc_html__( 'Contact', 'corponotch' ),
		'contact_title'			=> esc_html__( 'Send Your Requirements', 'corponotch' ),
		'contact_align'			=> 'right-align',
		
		// Footer
		'slide_to_top'			=> true,
		'copyright_text'		=> esc_html__( 'Copyright &copy; 2021 | All Rights Reserved.', 'corponotch' ),

		/* Theme Options */

		// blog / archive
		'latest_blog_title'		=> esc_html__( 'Blogs', 'corponotch' ),
		'excerpt_count'			=> 25,
		'pagination_type'		=> 'numeric',
		'sidebar_layout'		=> 'right-sidebar',
		'column_type'			=> 'column-2',
		'show_date'				=> true,
		'show_category'			=> true,
		'show_author'			=> true,
		'show_comment'			=> true,

		// single post
		'sidebar_single_layout'	=> 'right-sidebar',
		'show_single_date'		=> true,
		'show_single_category'	=> true,
		'show_single_tags'		=> true,
		'show_single_author'	=> true,

		// page
		'enable_front_page'		=> false,
		'sidebar_page_layout'	=> 'right-sidebar',

		// global
		'enable_loader'			=> true,
		'enable_breadcrumb'		=> true,
		'enable_sticky_header'	=> false,
		'loader_type'			=> 'default',
		'site_layout'			=> 'full',
		
	);

	$output = apply_filters( 'corponotch_default_theme_options', $corponotch_default_options );
	return $output;
}