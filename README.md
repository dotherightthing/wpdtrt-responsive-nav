# DTRT Responsive Nav

A WordPress plugin wrapper for responsive-nav.js

## Features of responsive-nav.js:

* multi-tiered (nested menu items)
* separate button-controls (allowing menu 'parents' to link to pages, rather than just toggle child menus)
* keyboard accessible (usable by real people)
* clean slide-down effect (optional)
* lightweight and easy to customise for improved usability

## Additional features of this implementation:

* custom toggle button, to support independent placement of menu and toggle button
* noscript fallback, linking the menu button to a menu at the bottom of the page (for people with JavaScript disabled)
* loading state (to indicate when the menu has been set up and can be used)
* control of the point at which the responsive version kicks in (using enquire.js to implement CSS media queries in JavaScript)

## Installation

1. Upload the plugin files to the `/wp-content/plugins/wpdtrt-responsive-nav` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->DTRT Responsive Nav screen to configure the plugin

## Frequently Asked Questions

### How do I use the menu?

Please use the provided shortcodes:

```
<!-- within the editor -->
[wpdtrt_responsive_nav location="header"]

// in a PHP template, as a template tag
<?php echo do_shortcode( '[wpdtrt_responsive_nav location="header"]' ); ?>
```

#### Basic usage

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

#### Advanced usage

Use the Settings->DTRT Responsive Nav screen to configure the plugin.

The following default shortcode options may be added as required:

1. `location="header"` - `header` for the header part, `footer` for the footer part

The templates may be further customised as follows:

1. Copy all files in `template-parts` to a `template-parts` folder in the root of your theme
2. Edit your copies

## Changelog

### 0.5.0
* Transferred most shortcode options to an options page
* JavaScript configuration now uses these options rather than HTML data attributes
* Updated documentation

### 0.4.0
* Menus now registered by plugin
* Shortcodes now load menu template partials
* Added support for customisation of template partial
* Added support for customisation of breakpoint
* Added styling
* Fixed output of custom menu structure
* Moved Bower dependencies to root of `vendor` folder
* Removed redundant files
* Improved documentation

### 0.1
* Initial version

## Demo

This plugin is based on a manual WordPress integration for http://allotelecom.ca/.
