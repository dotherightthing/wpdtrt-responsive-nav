<?php
/**
 * JS imports
 *
 * This file contains PHP.
 *
 * @link        https://github.com/dotherightthing/wpdtrt-responsive-nav
 * @see         https://codex.wordpress.org/AJAX_in_Plugins
 * @since       0.1.0
 *
 * @package     Wpdtrt_Responsive_Nav
 * @subpackage  Wpdtrt_Responsive_Nav/app
 */

if ( !function_exists( 'wpdtrt_responsive_nav_frontend_js' ) ) {

  /**
   * Attach JS for front-end widgets and shortcodes
   *
   * @since       0.1.0
   * @see         https://codex.wordpress.org/Function_Reference/wp_localize_script
   */
  function wpdtrt_responsive_nav_frontend_js() {

    $attach_to_footer = true;

    wp_enqueue_script( 'enquire',
      WPDTRT_RESPONSIVE_NAV_URL . 'vendor/bower_components/enquire/dist/enquire.min.js',
      array(),
      '2.1.6',
      $attach_to_footer
    );

    wp_enqueue_script( 'responsive_nav_dropdowns',
      WPDTRT_RESPONSIVE_NAV_URL . 'vendor/bower_components/responsive-nav/responsive-nav.min.js',
      array(),
      '1.0.39',
      $attach_to_footer
    );

    wp_enqueue_script( 'wpdtrt_responsive_nav_frontend_js',
      WPDTRT_RESPONSIVE_NAV_URL . 'js/wpdtrt-responsive-nav.js',
      array(
        'jquery',
        'enquire',
        'responsive_nav_dropdowns'
      ),
      WPDTRT_RESPONSIVE_NAV_VERSION,
      $attach_to_footer
    );
  }

  add_action( 'wp_enqueue_scripts', 'wpdtrt_responsive_nav_frontend_js' );

}

?>
