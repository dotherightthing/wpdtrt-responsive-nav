# DTRT Responsive Nav

A WordPress plugin wrapper for responsive-nav.js

## Installation

1. Upload the plugin files to the `/wp-content/plugins/wpdtrt-responsive-nav` directory
2. Activate the plugin through the 'Plugins' screen in WordPress

## Frequently Asked Questions

### How do I use the shortcode?

```
<!-- within the editor -->
[wpdtrt_responsive_nav option="value"]

// in a PHP template, as a template tag
<?php echo do_shortcode( '[wpdtrt_responsive_nav option="value"]' ); ?>
```

### Shortcode options

1. `header_nav_id="main-nav"` (default) - HTML `id` of the main navigation
2. `footer_nav_id="footer-nav"` (default) - HTML `id` of the footer navigation
3. `nav_toggle_class="navigation"` (default) - HTML `class` used for styling the menu toggle button
4. `nav_toggle_class_active="navigation-active" (default) - HTML `class` used for styling the menu toggle button when it is depressed
4. `slidedown="true" (default) - use a slide-down effect when the menu is opened (and up when it is closed)

This plugin requires that there is a duplicate navigation menu at the footer of the page.

When JavaScript is disabled:

* the duplicate footer menu is shown
* the responsive nav toggle button jumps the user to the footer menu.

When JavaScript is enabled:

* the duplicate footer menu is hidden
* the responsive nav toggle button toggles the visibility of the header menu.
