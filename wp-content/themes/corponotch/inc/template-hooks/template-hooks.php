<?php
/**
 * Templated sections init
 *
 * @package corponotch
 */

/**
 * Add template hooks defaults.
 */

// slider
require get_template_directory() . '/inc/template-hooks/slider.php';

// short call to action
require get_template_directory() . '/inc/template-hooks/short-cta.php';

// introduction
require get_template_directory() . '/inc/template-hooks/introduction.php';

// service
require get_template_directory() . '/inc/template-hooks/service.php';

// portfolio
require get_template_directory() . '/inc/template-hooks/portfolio.php';

// team
require get_template_directory() . '/inc/template-hooks/team.php';

// testimonial
require get_template_directory() . '/inc/template-hooks/testimonial.php';

// contact
require get_template_directory() . '/inc/template-hooks/contact.php';

// recent
require get_template_directory() . '/inc/template-hooks/recent.php';
