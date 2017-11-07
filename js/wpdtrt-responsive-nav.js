/**
 * Scripts for the public front-end
 *
 * This file contains JavaScript.
 *    PHP variables are provided in wpdtrt_soundcloud_pages_config.
 *
 * @since       0.1.0
 *
 * @package     Wpdtrt_Responsive_Nav
 * @subpackage  Wpdtrt_Responsive_Nav/js
 */

// jshint
/* globals $, enquire, responsiveNav */

/**
 * Create a global object
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
    var $custom_toggle_wrapper = $('#wpdtrt-responsive-nav-toggle-wrapper');

    if ( ! $custom_toggle_wrapper.length ) {
      return;
    }

    var $header_nav = $('#' + wpdtrt_responsive_nav_options.header_nav_id);

    if ( ! $header_nav.length ) {
      return;
    }

    var $header_nav_wrapper = $('#header-nav-wrapper');

    if ( ! $header_nav_wrapper.length ) {
      $custom_toggle_wrapper.add( $header_nav ).wrapAll('<div id="header-nav-wrapper"></div>');
    }

    var $footer_nav = $('#' + wpdtrt_responsive_nav_options.footer_nav_id );
    var $root = $('html');
    var $custom_toggle = $custom_toggle_wrapper.find('.nav-toggle'); // noscript link to footer nav
    var custom_toggle_id = $custom_toggle.attr('id') || 'wpdtrt-responsive-nav-toggle';
    var $custom_toggle_text = $custom_toggle_wrapper.find('.wpdtrt-responsive-nav-toggle-text');
    var custom_toggle_wrapper_active_class = wpdtrt_responsive_nav_options.toggle_class_active;

    if ( this.mobile ) {

      // show the menu toggle
      $custom_toggle_wrapper.removeAttr('aria-hidden').show();

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
      $header_nav.find('ul.children').addClass('sub-menu'); // fixes dropdowns
      $header_nav.find('li.page_item_has_children').addClass('dropdown');
      $header_nav.find('li.page_item_has_children > a').addClass('has-dropdown');

      var label_start = '<span class="wpdtrt-responsive-nav-dropdown-button-text">';
      var label_end = '</span>';

      // Init responsive nav

      this.responsive_navigation_element = responsiveNav('#' + wpdtrt_responsive_nav_options.header_nav_id, {
        animate: wpdtrt_responsive_nav_options.slidedown === '1' ? true : false, // true|false, use CSS3 transitions
        transition: 284, // 284|custom, ms
        label: wpdtrt_responsive_nav_options.menu_label, // label for the built in navigation toggle
        insert: 'before', // before|after
        customToggle: '#' + custom_toggle_id, // Selector: Specify the ID of a custom toggle
        closeOnNavClick: false, // default, when links are clicked
        openPos: 'relative', // relative|static
        navClass: 'nav-collapse', // default, change requires CSS edits
        navActiveClass: 'js-nav-active', // js-nav-active|custom, applied to <html>
        jsClass: 'wpdtrt-js', // js|custom, applied to <html>
        /**
         * Additional dropdown options:
         * @see https://github.com/samikeijonen/responsive-nav.js/tree/dropdowns
         */
        enableFocus: true, // true|false
        enableDropdown: true, // true|false
        menuItems: 'menu-items', // menu-items|custom, applied to top <ul>
        subMenu: 'sub-menu', // sub-menu|custom, applied to child <ul> - doesn't work, see DOM hooks above
        openDropdown: label_start + wpdtrt_responsive_nav_options.dropdown_expand_label + label_end, // Open sub menu|custom, label for opening sub menu
        closeDropdown: label_start + wpdtrt_responsive_nav_options.dropdown_collapse_label + label_end, // Open sub menu|custom, label for closing sub menu
        init: function() {
          $custom_toggle.removeClass('nav-toggle-loading');
        },
        open: function () {
          $custom_toggle_text.text( wpdtrt_responsive_nav_options.menu_close_label );
          $custom_toggle_wrapper.addClass(custom_toggle_wrapper_active_class);
        },
        close: function () {
          $custom_toggle_text.text( wpdtrt_responsive_nav_options.menu_open_label );
          $custom_toggle_wrapper.removeClass(custom_toggle_wrapper_active_class);
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
      // this complements the CSS hiding
      $custom_toggle_wrapper.attr('aria-hidden', true).hide();

      // show the footer nav
      // so we don't see two navs on noscript desktop
      //if ( $footer_nav.length ) {
      //  $footer_nav.removeAttr('aria-hidden').show();
      //}

      // check whether nav has already been set up
      if ( $header_nav.is('[data-responsive]') ) {

        $header_nav.removeAttr('data-responsive');
        this.responsive_navigation_element.destroy();

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

  // WordPress plugin configuration object
  if ( typeof wpdtrt_responsive_nav_options !== 'object' ) {
    console.warn("DTRT Responsive Nav cannot be initialised: JavaScript config object missing");
    return;
  }

  enquire.register('screen and (max-width:' + wpdtrt_responsive_nav_options.responsive_breakpoint + ')', {

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
