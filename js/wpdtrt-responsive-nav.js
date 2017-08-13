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
   * This implementation:
   * - uses a custom_toggle, to support independent placement of the toggle button
   * - uses the dropdown branch of responsive-nav, to support sub-navigation menus
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
    //if ( ! $('#main-nav-placeholder').length ) {
    //  // inject a DOM placeholder for the original/desktop location
    //  $header_nav.after('<div id="main-nav-placeholder"></div>');
    //}

    //var $header_nav_placeholder = $('#main-nav-placeholder');

    if ( this.mobile ) {

      var $root = $('html');
      // var $alt_bar = $('.alt-bar .grid-nav'); // google translate language picker - Allo only
      var $custom_toggle = $toggle_wrapper.find('.nav-toggle'); // noscript link to footer nav
      var custom_toggle_id = $custom_toggle.attr('id') || 'wpdtrt-responsive-nav-toggle';
      var $custom_toggle_text = $toggle_wrapper.find('.nav-toggle-text');
      var toggle_wrapper_active_class = $toggle_wrapper.data('active-class');

      // show the menu toggle
      $toggle_wrapper.removeAttr('aria-hidden').show();

      // remove the link behaviour from the nav toggle
      $custom_toggle.on('click', function(e) {
        e.preventDefault();
       });

      // hide the footer nav
      // this will not be shown again as it is the noscript fallback
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
        customToggle: '#' + custom_toggle_id, // Selector: Specify the ID of a custom toggle
        enableFocus: true,
        enableDropdown: true,
        openDropdown: '<span class="screen-reader-text">Open sub menu</span>',
        closeDropdown: '<span class="screen-reader-text">Close sub menu</span>',
        //subMenu: 'sub-nav', // doesn't work, see DOM hooks at top
        init: function() {
          $custom_toggle.removeClass('nav-toggle-loading');
        },
        open: function () {
          $custom_toggle_text.text('Close menu');
          $toggle_wrapper.addClass(toggle_wrapper_active_class);
        },
        close: function () {
          $custom_toggle_text.text('Open menu');
          $toggle_wrapper.removeClass(toggle_wrapper_active_class);
          window.scrollTo(0,0);
        },
        resizeMobile: function () {
          $custom_toggle.attr('aria-controls', 'nav'); // TODO fix target
        },
        resizeDesktop: function () {
          $custom_toggle.removeAttr('aria-controls');
        }
      });

      // indicate that the nav has now been set up
      $header_nav.attr('data-responsive', true);
    }
    else {

      // hide the menu toggle
      $toggle_wrapper.attr('aria-hidden', true).hide();

      // show the footer nav
      // TODO - this should be controlled with media queries
      // so we don't see two navs on noscript desktop
      //if ( $footer_nav.length ) {
      //  $footer_nav.removeAttr('aria-hidden').show();
      //}

      // check whether nav has already been set up
      if ( $header_nav.is('[data-responsive]') ) {

        $header_nav.removeAttr('data-responsive');
        this.responsive_navigation_element.destroy();

        // move the nav back to its original/desktop location
        //$header_nav_placeholder.append( $header_nav );

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

    /**
     * desktop-first state
     * @see https://stackoverflow.com/a/24618131/6850747
     * @see http://wicky.nillia.ms/enquire.js/#quick-start
     */
    setup: function() {
      wpdtrt_responsive_nav_ui.mobile = false;
      wpdtrt_responsive_nav_ui.update($);
    },

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
