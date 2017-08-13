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

// jshint
/* globals $, enquire, responsiveNav */

/** Create a global object
 * This acts as a namespace for the UI functions, now methods of it.
 *
 * @since 1.2.0
 * @author Dan Smith <dev@dotherightthing.co.nz>
 */
var wpdtrt_responsive_nav_ui = {

  /**
   * Responsive Navigation
   * When JS is enabled the menu toggle opens a menu below the toggle button
   * When JS is disabled the menu toggle jumps the user down to a duplicate nav in the footer of the page
   *
   * @requires jQuery
   * @requires enquire.js (matchMedia)
   * @requires responsive-nav.js (accessible 'dropdowns' branch)
   * @see https://github.com/samikeijonen/responsive-nav.js
   * @since 1.2.0
   * @author Dan Smith <dev@dotherightthing.co.nz>
   *
   * @todo add support for lightbox-style menu
   */
  responsive_navigation: function($) {

    "use strict";

    // check for the shortcode HTML
    var $toggle_wrapper = $('#wpdtrt-responsive-nav-toggle-wrapper');

    if ( ! $toggle_wrapper.length ) {
      return;
    }

    var data_header_nav_id = $toggle_wrapper.data('header-nav-id');
    var $header_nav = $('#' + data_header_nav_id);

    if ( ! $header_nav.length ) {
      return;
    }

    var data_footer_nav_id = $toggle_wrapper.data('footer-nav-id');
    var $footer_nav = $('#' + data_footer_nav_id);

    // if first run
    if ( ! $('#main-nav-placeholder').length ) {
      // inject a DOM placeholder for the original/desktop location
      $header_nav.after('<div id="main-nav-placeholder"></div>');
    }

    var $header_nav_placeholder = $('#main-nav-placeholder');

    if ( this.mobile ) {

      var $root = $('html');
      // var $alt_bar = $('.alt-bar .grid-nav'); // google translate language picker - Allo only
      var $nav_toggle = $toggle_wrapper.find('.nav-toggle'); // noscript link to footer nav
      var nav_toggle_id = $nav_toggle.attr('id') || 'wpdtrt-responsive-nav-toggle';
      var $customToggle = $nav_toggle;
      var $customToggleText = $toggle_wrapper.find('.nav-toggle-text');
      var toggle_wrapper_active_class = $toggle_wrapper.data('active-class');

      // remove the link behaviour from the nav toggle
      // and indicate that setup is underway
      $nav_toggle.on('click', function(e) {
        e.preventDefault();
       });

      // hide the footer nav
      if ( $footer_nav.length ) {
        $footer_nav.attr('aria-hidden', 'true').hide();
      }

      // add the DOM hooks required by the script
      // currently these are safe to leave in for the desktop version
      $root.addClass('js');
      $header_nav.find('ul').eq(0).addClass('menu-items');
      $header_nav.find('ul.sub-nav').addClass('sub-menu'); // fixes dropdowns
      $header_nav.find('li.menu-item-has-children').addClass('dropdown');
      $header_nav.find('li.menu-item-has-children > a').addClass('has-dropdown');

      // move the nav to a better mobile location
      // $alt_bar.append( $header_nav ); Allo only

      // Init responsive nav

      this.responsive_navigation_element = responsiveNav('#' + data_header_nav_id, {
        customToggle: '#' + nav_toggle_id, // Selector: Specify the ID of a custom toggle
        enableFocus: true,
        enableDropdown: true,
        openDropdown: '<span class="screen-reader-text">Open sub menu</span>',
        closeDropdown: '<span class="screen-reader-text">Close sub menu</span>',
        //subMenu: 'sub-nav', // doesn't work, see DOM hooks at top
        init: function() {
          $nav_toggle.removeClass('nav-toggle-loading');
        },
        open: function () {
          $customToggleText.text('Close menu');
          $toggle_wrapper.addClass(toggle_wrapper_active_class);
        },
        close: function () {
          $customToggleText.text('Open menu');
          $toggle_wrapper.removeClass(toggle_wrapper_active_class);
          window.scrollTo(0,0);
        },
        resizeMobile: function () {
          $customToggle.attr('aria-controls', 'nav');
        },
        resizeDesktop: function () {
          $customToggle.removeAttr('aria-controls');
        }
      });

      // indicate that the nav has now been set up
      $header_nav.attr('data-responsive', true);
    }
    else {

      // show the footer nav
      if ( $footer_nav.length ) {
        $footer_nav.removeAttr('aria-hidden').show();
      }

      // check whether nav has already been set up
      if ( $header_nav.is('[data-responsive]') ) {

        $header_nav.removeAttr('data-responsive');
        this.responsive_navigation_element.destroy();

        // move the nav back to its original/desktop location
        $header_nav_placeholder.append( $header_nav );

        // the dropdowns branch of the responsive-nav menu
        // doesn't implement destroy() properly
        $header_nav.find('.dropdown-toggle').remove();
      }
    }
  },

  /**
   * Update
   *
   * @since 1.2.0
   * @author Dan Smith <dev@dotherightthing.co.nz>
   */
  update: function($) {

    "use strict";

    this.init($);
  },

  /**
   * Init
   *
   * @since 1.2.0
   * @author Dan Smith <dev@dotherightthing.co.nz>
   */
  init: function($) {

    "use strict";

    this.responsive_navigation($);
  }

};

jQuery(document).ready(function($) {

  "use strict";

  enquire.register("screen and (max-width:480px)", {

    match: function() {
      wpdtrt_responsive_nav_ui.mobile = true;
      wpdtrt_responsive_nav_ui.update($);
    },

    unmatch: function() {
      wpdtrt_responsive_nav_ui.mobile = false;
      wpdtrt_responsive_nav_ui.update($);
    }

  });
});
