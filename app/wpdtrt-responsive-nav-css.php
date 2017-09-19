<?php
/**
 * CSS imports
 *
 * This file contains PHP.
 *
 * @link        https://github.com/dotherightthing/wpdtrt-responsive-nav
 * @since       0.1.0
 *
 * @package     Wpdtrt_Responsive_Nav
 * @subpackage  Wpdtrt_Responsive_Nav/app
 */

if ( !function_exists( 'wpdtrt_responsive_nav_css_frontend' ) ) {

  /**
   * Attach CSS for front-end widgets and shortcodes
   *
   * @since       0.1.0
   */
  function wpdtrt_responsive_nav_css_frontend() {

    $media = 'all';

    wp_enqueue_style( 'wpdtrt_responsive_nav_responsive_nav_css',
      WPDTRT_RESPONSIVE_NAV_URL . 'vendor/bower_components/responsive-nav/responsive-nav.css'
    );

    wp_enqueue_style( 'wpdtrt_responsive_nav_css_frontend',
      WPDTRT_RESPONSIVE_NAV_URL . 'css/wpdtrt-responsive-nav.css',
      array(
        'wpdtrt_responsive_nav_responsive_nav_css'
      ),
      WPDTRT_RESPONSIVE_NAV_VERSION,
      $media
    );

  }

  add_action( 'wp_enqueue_scripts', 'wpdtrt_responsive_nav_css_frontend' );

}

?>
