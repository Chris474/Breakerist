<?php

/**
 * @package OpenUserMapPlugin
 */
namespace OpenUserMapPlugin\Pages;

use  OpenUserMapPlugin\Base\BaseController ;
class Frontend extends BaseController
{
    public function register()
    {
        // Shortcodes
        add_action( 'init', array( $this, 'set_shortcodes' ) );
    }
    
    /**
     * Setup Shortcode
     */
    public function set_shortcodes()
    {
        add_shortcode( 'open-user-map', array( $this, 'render_block_map' ) );
    }

}