<?php
/**
 * Template partial for the navigation toggle button.
 *  This serves as a jumplink to the footer-nav duplicate, when JS is disabled.
 *
 * This file contains PHP, and HTML.
 *
 * @link        https://github.com/dotherightthing/wpdtrt-responsive-nav
 * @since       0.1.0
 *
 * @package     Wpdtrt_Responsive_Nav
 * @subpackage  Wpdtrt_Responsive_Nav/template-parts
 */

$options = get_query_var( 'wpdtrt_responsive_nav_options_all' );

if ( is_array( $options ) ) {

  /**
   * predeclare the expected variables
   * @see http://kb.dotherightthing.dan/php/wordpress/extract/
   */
    $location = null;
    $wpdtrt_responsive_nav_menu_open_label = null;
    $wpdtrt_responsive_nav_menu_close_label = null;
    $wpdtrt_responsive_nav_dropdown_expand_label = null;
    $wpdtrt_responsive_nav_dropdown_collapse_label = null;
    $wpdtrt_responsive_nav_header_nav_id = null;
    $wpdtrt_responsive_nav_footer_nav_id = null;
    $wpdtrt_responsive_nav_toggle_class = null;
    $wpdtrt_responsive_nav_toggle_class_active = null;
    $wpdtrt_responsive_nav_slidedown = null;
    $wpdtrt_responsive_nav_responsive_breakpoint = null;

  /**
   * only overwrite the predeclared variables
   * @see http://kb.dotherightthing.dan/php/wordpress/extract/
   */
  extract($options, EXTR_IF_EXISTS);
}

?>
<p class="nav-toggle-wrapper wpdtrt-responsive-nav-toggle-wrapper <?php echo $wpdtrt_responsive_nav_toggle_class; ?>" id="wpdtrt-responsive-nav-toggle-wrapper">
  <a href="#<?php echo $wpdtrt_responsive_nav_footer_nav_id; ?>" id="nav-toggle" class="nav-toggle nav-toggle-loading">
    <i class="nav-toggle-icon icon icon-bars" aria-hidden="true"></i>
    <span class="wpdtrt-responsive-nav-toggle-text" id="wpdtrt-responsive-nav-toggle-text"><?php echo $wpdtrt_responsive_nav_menu_open_label; ?></span>
  </a>
</p>
