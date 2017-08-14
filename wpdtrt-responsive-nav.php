<?php
/*
Plugin Name:  DTRT Responsive Nav
Plugin URI:   https://github.com/dotherightthing/wpdtrt-responsive-nav
Description:  A plugin wrapper for responsive-nav.js
Version:      0.3.0
Author:       Dan Smith
Author URI:   http://dotherightthing.co.nz
License:      GPLv2 or later
License URI:  http://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wpdtrt-responsive-nav
Domain Path:  /languages
*/

/**
 * Constants
 * WordPress makes use of the following constants when determining the path to the content and plugin directories.
 * These should not be used directly by plugins or themes, but are listed here for completeness.
 * WP_CONTENT_DIR  // no trailing slash, full paths only
 * WP_CONTENT_URL  // full url
 * WP_PLUGIN_DIR  // full path, no trailing slash
 * WP_PLUGIN_URL  // full url, no trailing slash
 *
 * WordPress provides several functions for easily determining where a given file or directory lives.
 * Always use these functions in your plugins instead of hard-coding references to the wp-content directory
 * or using the WordPress internal constants.
 * plugins_url()
 * plugin_dir_url()
 * plugin_dir_path()
 * plugin_basename()
 *
 * @link https://codex.wordpress.org/Determining_Plugin_and_Content_Directories#Constants
 * @link https://codex.wordpress.org/Determining_Plugin_and_Content_Directories#Plugins
 */

/**
 * Plugin version
 * WP provides get_plugin_data(), but it only works within WP Admin,
 * so we define a constant instead.
 * @example $plugin_data = get_plugin_data( __FILE__ ); $plugin_version = $plugin_data['Version'];
 * @link https://wordpress.stackexchange.com/questions/18268/i-want-to-get-a-plugin-version-number-dynamically
 */
if( ! defined( 'WPDTRT_RESPONSIVE_NAV_VERSION' ) ) {
  define( 'WPDTRT_RESPONSIVE_NAV_VERSION', '0.1' );
}

/**
 * plugin_dir_path
 * @param string $file
 * @return The filesystem directory path (with trailing slash)
 * @link https://developer.wordpress.org/reference/functions/plugin_dir_path/
 * @link https://developer.wordpress.org/plugins/the-basics/best-practices/#prefix-everything
 */
if( ! defined( 'WPDTRT_RESPONSIVE_NAV_PATH' ) ) {
  define( 'WPDTRT_RESPONSIVE_NAV_PATH', plugin_dir_path( __FILE__ ) );
}

/**
 * The version information is only available within WP Admin
 * @param string $file
 * @return The URL (with trailing slash)
 * @link https://codex.wordpress.org/Function_Reference/plugin_dir_url
 * @link https://developer.wordpress.org/plugins/the-basics/best-practices/#prefix-everything
 */
if( ! defined( 'WPDTRT_RESPONSIVE_NAV_URL' ) ) {
  define( 'WPDTRT_RESPONSIVE_NAV_URL', plugin_dir_url( __FILE__ ) );
}


/**
 * Store all of our plugin options in an array
 * So that we only use have to consume one row in the WP Options table
 * WordPress automatically serializes this (into a string)
 * because MySQL does not support arrays as a data type
 * @example update_option('wpdtrt_responsive_nav', $wpdtrt_responsive_nav_options);
 * @example $wpdtrt_responsive_nav_options = get_option('wpdtrt_responsive_nav');
 */
  $wpdtrt_responsive_nav_options = array();

/**
 * Include plugin logic
 */

  require_once(WPDTRT_RESPONSIVE_NAV_PATH . 'app/wpdtrt-responsive-nav-api.php');
  require_once(WPDTRT_RESPONSIVE_NAV_PATH . 'app/wpdtrt-responsive-nav-css.php');
  require_once(WPDTRT_RESPONSIVE_NAV_PATH . 'app/wpdtrt-responsive-nav-js.php');
  require_once(WPDTRT_RESPONSIVE_NAV_PATH . 'app/wpdtrt-responsive-nav-options.php');
  require_once(WPDTRT_RESPONSIVE_NAV_PATH . 'app/wpdtrt-responsive-nav-shortcode.php');

  //require_once(WPDTRT_RESPONSIVE_NAV_PATH . 'vendor/tgm-plugin-activation/class-tgm-plugin-activation.php');
  //require_once(WPDTRT_RESPONSIVE_NAV_PATH . 'config/tgm-plugin-activation.php');

?>
