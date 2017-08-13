/**
 * Scripts for the public front-end
 *
 * This file contains JavaScript.
 *    PHP variables are provided in wpdtrt_soundcloud_pages_config.
 *
 * @link        https://github.com/dotherightthing/wpdtrt-responsive-nav
 * @since       0.1.0
 *
 * @package     Wpdtrt_Responsive_Nav
 * @subpackage  Wpdtrt_Responsive_Nav/views
 */

jQuery(document).ready(function($){

	$('.wpdtrt-responsive-nav-badge').hover(function() {
		$(this).find('.wpdtrt-responsive-nav-badge-info').stop(true, true).fadeIn(200);
	}, function() {
		$(this).find('.wpdtrt-responsive-nav-badge-info').stop(true, true).fadeOut(200);
	});

  $.post( wpdtrt_responsive_nav_config.ajax_url, {
    action: 'wpdtrt_responsive_nav_data_refresh'
  }, function( response ) {
    //console.log( 'Ajax complete' );
  });

});
