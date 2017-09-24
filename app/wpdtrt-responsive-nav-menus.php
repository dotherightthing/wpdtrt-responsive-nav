<?php
/**
 * Navigation menus
 *
 * This file contains PHP.
 *
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
	 *
	 * Adds locations to Appearance > Menus > Edit Menus tab > Menu settings > Display location,
	 * Adds locations to Appearance > Menus > Manage Locations tab
	 *
	 * @see http://www.wpbeginner.com/wp-themes/how-to-add-custom-navigation-menus-in-wordpress-3-0-themes/
	 * @see https://developer.wordpress.org/themes/functionality/navigation-menus/#register-menus
	 */
	add_action( 'init', 'wpdtrt_responsive_nav_register_menus' );

	function wpdtrt_responsive_nav_register_menus() {
	  register_nav_menus(
	    array(
	    	// Menu name set in wp_nav_menu => wp-admin Display location / Theme Location
	      	'wpdtrt-responsive-nav-header-menu' => __( 'Responsive Nav Header Menu', 'wpdtrt-responsive-nav' ),
	      	'wpdtrt-responsive-nav-footer-menu' => __( 'Responsive Nav Footer Menu (mobile noscript fallback)', 'wpdtrt-responsive-nav' )
	    )
	  );
	}
}

?>
