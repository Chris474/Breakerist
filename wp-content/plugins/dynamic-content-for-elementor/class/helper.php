<?php

#phpcs:ignoreFile
namespace DynamicContentForElementor;

if (!\defined('ABSPATH')) {
    exit;
}
/**
 * Main Helper Class
 *
 * @since 0.1.0
 */
class Helper
{
    use \DynamicContentForElementor\Plugins;
    use \DynamicContentForElementor\Filesystem;
    use \DynamicContentForElementor\Wp;
    use \DynamicContentForElementor\Meta;
    use \DynamicContentForElementor\Elementor;
    use \DynamicContentForElementor\Form;
    use \DynamicContentForElementor\Strings;
    use \DynamicContentForElementor\Image;
    use \DynamicContentForElementor\Navigation;
    use \DynamicContentForElementor\Notices;
    use \DynamicContentForElementor\Options;
    use \DynamicContentForElementor\Date;
    use \DynamicContentForElementor\Pagination;
    use \DynamicContentForElementor\Conditions;
    use \DynamicContentForElementor\I18n;
    public static function can_register_unsafe_controls()
    {
        if (current_user_can('administrator')) {
            return \true;
        }
        if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
            return \false;
        }
        if (($_REQUEST['action'] ?? '') === 'elementor_ajax') {
            return \false;
        }
        return \true;
    }
    public static function update_elementor_control($widget, $control_name, $callback)
    {
        $elementor = \ElementorPro\Plugin::elementor();
        $control_data = $elementor->controls_manager->get_control_from_stack($widget->get_unique_name(), $control_name);
        if (is_wp_error($control_data)) {
            return;
        }
        $control_data = $callback($control_data);
        $widget->update_control($control_name, $control_data);
    }
    /** Make sure the given dir is created and has protection files. */
    public static function ensure_dir($path)
    {
        if (\file_exists($path . '/index.php')) {
            return $path;
        }
        wp_mkdir_p($path);
        $files = [['file' => 'index.php', 'content' => ['<?php', '// Silence is golden.']], ['file' => '.htaccess', 'content' => ['Options -Indexes', '<ifModule mod_headers.c>', '	<Files *.*>', '       Header set Content-Disposition attachment', '	</Files>', '</IfModule>']]];
        foreach ($files as $file) {
            if (!\file_exists(trailingslashit($path) . $file['file'])) {
                $content = \implode(\PHP_EOL, $file['content']);
                @\file_put_contents(trailingslashit($path) . $file['file'], $content);
            }
        }
    }
    /**
     * A list of safe tage for `validate_html_tag` method.
     */
    const ALLOWED_HTML_WRAPPER_TAGS = ['article', 'aside', 'div', 'footer', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'header', 'main', 'nav', 'p', 'section', 'span', 'code'];
}
