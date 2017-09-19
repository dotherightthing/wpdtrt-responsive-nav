<?php
/**
 * Navigation menus
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

/**
 * Pluggable
 * Allow child themes to replace this function with their own
 */
if ( ! function_exists('wpdtrt_responsive_nav_register_menus') ) {

	/**
	 * Register Menus
	 * This sets the name that will appear at Appearance -> Menus.
	 * Add locations to Menu settings > Display location, and the Manage Locations tab
	 *
	 * @see http://www.wpbeginner.com/wp-themes/how-to-add-custom-navigation-menus-in-wordpress-3-0-themes/
	 * @see https://developer.wordpress.org/themes/functionality/navigation-menus/#register-menus
	 */
	add_action( 'init', 'wpdtrt_responsive_nav_register_menus' );

	function wpdtrt_responsive_nav_register_menus() {
	  register_nav_menus(
	    array(
	    	// menu location slug => description
	      	'wpdtrt-responsive-nav-header-menu' => __( 'Responsive Nav Header Menu', 'wpdtrt-responsive-nav' ),
	      	'wpdtrt-responsive-nav-footer-menu' => __( 'Responsive Nav Footer Menu (mobile-first noscript fallback)', 'wpdtrt-responsive-nav' )
	    )
	  );
	}
}

?>
