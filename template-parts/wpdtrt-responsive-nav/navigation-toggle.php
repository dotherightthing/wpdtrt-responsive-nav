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

$options = get_query_var( 'wpdtrt_responsive_nav_options' );

if ( is_array( $options ) ) {

  /**
   * predeclare the expected variables
   * @see http://kb.dotherightthing.dan/php/wordpress/extract/
   */
    $location = null;
    $header_nav_id = null;
    $footer_nav_id = null;
    $nav_toggle_class = null;
    $nav_toggle_class_active = null;
    $slidedown = null;

  /**
   * only overwrite the predeclared variables
   * @see http://kb.dotherightthing.dan/php/wordpress/extract/
   */
  extract($options, EXTR_IF_EXISTS);
}

?>
<p class="nav-toggle-wrapper wpdtrt-responsive-nav-toggle-wrapper <?php echo $nav_toggle_class; ?>" id="wpdtrt-responsive-nav-toggle-wrapper" data-header-nav-id="<?php echo $header_nav_id; ?>" data-footer-nav-id="<?php echo $footer_nav_id; ?>" data-active-class="<?php echo $nav_toggle_class_active; ?>" data-slidedown="<?php echo $slidedown; ?>">
  <a href="#<?php echo $footer_nav_id; ?>" id="nav-toggle" class="nav-toggle nav-toggle-loading">
    <i class="nav-toggle-icon fa fa-bars" aria-hidden="true"></i>
    <span class="nav-toggle-text" id="nav-toggle-text">Open menu</span>
  </a>
</p>
