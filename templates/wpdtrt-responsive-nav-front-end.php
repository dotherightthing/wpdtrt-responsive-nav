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
 * @subpackage  Wpdtrt_Responsive_Nav/views
 */
?>

<?php
  // output widget customisations (not output with shortcode)
  echo $before_widget;
  echo $before_title . $title . $after_title;
?>

<p class="nav-toggle-wrapper" id="wpdtrt-responsive-nav-toggle-wrapper" data-header-nav-id="<?php echo $header_nav_id; ?>" data-footer-nav-id="<?php echo $footer_nav_id; ?>">
  <a href="#<?php echo $footer_nav_id; ?>" id="nav-toggle" class="nav-toggle nav-toggle-loading">
    <i class="nav-toggle-icon fa fa-bars" aria-hidden="true"></i>
    <span class="nav-toggle-text" id="nav-toggle-text">Open menu</span>
  </a>
</p>

<?php
  // output widget customisations (not output with shortcode)
  echo $after_widget;
?>
