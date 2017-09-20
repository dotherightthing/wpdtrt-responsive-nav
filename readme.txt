
=== DTRT Responsive Nav ===
Contributors: dotherightthingnz
Donate link: http://dotherightthing.co.nz
Tags: navigation, accessibility
Requires at least: 4.8.1
Tested up to: 4.8.1
Stable tag: 0.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin wrapper for responsive-nav.js

== Description ==

A plugin wrapper for responsive-nav.js

= Features of responsive-nav.js: =

* multi-tiered (nested menu items)
* separate button-controls (allowing menu 'parents' to link to pages, rather than just toggle child menus)
* keyboard accessible (usable by real people)
* clean slide-down effect (optional)
* lightweight and easy to customise for improved usability

= Additional features of this implementation: =

* custom toggle button, to support independent placement of menu and toggle button
* noscript fallback, linking the menu button to a menu at the bottom of the page (for people with JavaScript disabled)
* loading state (to indicate when the menu has been set up and can be used)
* control of the point at which the responsive version kicks in (using enquire.js to implement CSS media queries in JavaScript)

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/wpdtrt-responsive-nav` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

= How do I use the shortcode? =

```
<!-- within the editor -->
[wpdtrt_responsive_nav option="value"]

// in a PHP template, as a template tag
<?php echo do_shortcode( '[wpdtrt_responsive_nav option="value"]' ); ?>
```

= Basic usage =

```
[wpdtrt_responsive_nav location="header"]

Some content

[wpdtrt_responsive_nav location="footer"]
```

This plugin requires that there is a duplicate navigation menu at the footer of the page.

When JavaScript is disabled:

* the duplicate footer menu is shown
* the responsive nav toggle button jumps the user to the footer menu.

When JavaScript is enabled:

* the duplicate footer menu is hidden
* the responsive nav toggle button toggles the visibility of the header menu.

= Advanced usage =

The following default options may be added as required:

1. `location="header"` - `header` for the header part, `footer` for the footer part
2. `header_nav_id="main-nav"` - HTML `id` of the main navigation
3. `footer_nav_id="footer-nav"` - HTML `id` of the footer navigation
4. `nav_toggle_class="navigation"` - HTML `class` used for styling the menu toggle button
5. `nav_toggle_class_active="navigation-active"` - HTML `class` used for styling the menu toggle button when it is depressed
6. `slidedown="true"` - use a slide-down effect when the menu is opened (and up when it is closed)
7. `responsive_breakpoint="480px"` - the point after which the mobile menu should be hidden

The templates may be further customised as follows:

1. Copy all files in `template-parts` to a `template-parts` folder in the root of your theme
2. Edit your copies

== Changelog ==

= 0.4.0 =
* Menus now registered by plugin
* Shortcodes now load menu template partials
* Added support for customisation of template partial
* Added support for customisation of breakpoint
* Added styling
* Fixed output of custom menu structure
* Moved Bower dependencies to root of `vendor` folder
* Removed redundant files
* Improved documentation

= 0.1 =
* Initial version

== Upgrade Notice ==

= 0.1 =
* Initial release
