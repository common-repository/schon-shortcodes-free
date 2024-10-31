<?php
/**
 * Plugin Name: Schon Shortcodes for Schon Theme - Free
 * Description: This plugin provides many shortcodes for the free version of the theme Schon
 * Version: 1.0.1
 * Author: Webbaku
 * Author URI: https://themeforest.net/user/webbaku?ref=webbaku
 * License: GPL2 or later
 */

define( 'SCHON_SHORTCODES_FREE_PATH', plugin_dir_path( __FILE__ ) );
define( 'SCHON_SHORTCODES_FREE_URI', plugin_dir_url( __FILE__ ) );

add_filter('widget_text', 'do_shortcode');

require_once SCHON_SHORTCODES_FREE_PATH.'/shortcodes.php';
