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

if ( !function_exists( 'wpdtrt_responsive_nav_css_backend' ) ) {

  /**
   * Attach CSS for Settings > DTRT Responsive Nav
   *
   * @since       0.1.0
   */
  function wpdtrt_responsive_nav_css_backend() {

    wp_enqueue_style( 'wpdtrt_responsive_nav_css_backend',
      WPDTRT_RESPONSIVE_NAV_URL . 'css/wpdtrt-responsive-nav-admin.css',
      array(),
      WPDTRT_RESPONSIVE_NAV_VERSION
      //'all'
    );
  }

  add_action( 'admin_head', 'wpdtrt_responsive_nav_css_backend' );

}

if ( !function_exists( 'wpdtrt_responsive_nav_css_frontend' ) ) {

  /**
   * Attach CSS for front-end widgets and shortcodes
   *
   * @since       0.1.0
   */
  function wpdtrt_responsive_nav_css_frontend() {

    wp_enqueue_style( 'wpdtrt_responsive_nav_css_frontend',
      WPDTRT_RESPONSIVE_NAV_URL . 'css/wpdtrt-responsive-nav.css',
      array(),
      WPDTRT_RESPONSIVE_NAV_VERSION
      //'all'
    );

  }

  add_action( 'wp_enqueue_scripts', 'wpdtrt_responsive_nav_css_frontend' );

}

?>
