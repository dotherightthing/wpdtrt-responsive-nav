
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

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/wpdtrt-responsive-nav` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->Plugin Name screen to configure the plugin

== Frequently Asked Questions ==

= How do I use the shortcode? =

```
<!-- within the editor -->
[wpdtrt_responsive_nav option="value"]

// in a PHP template, as a template tag
<?php echo do_shortcode( '[wpdtrt_responsive_nav option="value"]' ); ?>
```

= Shortcode options =

1. `header_nav_id="main-nav"` (default) - HTML `id` of the main navigation
2. `footer_nav_id="footer-nav"` (default) - HTML `id` of the footer navigation
3. `nav_toggle_class="navigation"` (default) - HTML `class` used for styling the menu toggle button
4. `nav_toggle_class_active="navigation-active" (default) - HTML `class` used for styling the menu toggle button when it is depressed

This plugin requires that there is a duplicate navigation menu at the footer of the page.

When JavaScript is disabled:

* the duplicate footer menu is shown
* the responsive nav toggle button jumps the user to the footer menu.

When JavaScript is enabled:

* the duplicate footer menu is hidden
* the responsive nav toggle button toggles the visibility of the header menu.

== Changelog ==

= 0.1 =
* Initial version

== Upgrade Notice ==

= 0.1 =
* Initial release
