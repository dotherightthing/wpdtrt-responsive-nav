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

     $media = 'all';

    wp_enqueue_style( 'wpdtrt_responsive_nav_css_backend',
      WPDTRT_RESPONSIVE_NAV_URL . 'css/wpdtrt-responsive-nav-admin.css',
      array(),
      WPDTRT_RESPONSIVE_NAV_VERSION,
      $media
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

    $media = 'all';

    wp_enqueue_style( 'wpdtrt_responsive_nav_responsive_nav_css',
      WPDTRT_RESPONSIVE_NAV_URL . 'vendor/responsive-nav/responsive-nav.css',
      array(),
      '1.0.39',
      $media
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
