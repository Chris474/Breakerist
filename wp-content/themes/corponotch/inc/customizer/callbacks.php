<?php
/**
 * Callbacks functions
 *
 * @package corponotch
 */

if ( ! function_exists( 'corponotch_recent_content_category_enable' ) ) :
	/**
	 * Check if recent content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_recent_content_category_enable( $control ) {
		return 'category' == $control->manager->get_setting( 'corponotch_theme_options[recent_content_type]' )->value();
	}
endif;
