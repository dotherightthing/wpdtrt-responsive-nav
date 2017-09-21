
=== DTRT Responsive Nav ===
Contributors: dotherightthingnz
Donate link: http://dotherightthing.co.nz
Tags: navigation, accessibility
Requires at least: 4.8.1
Tested up to: 4.8.1
Stable tag: 0.4.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin wrapper for responsive-nav.js

== Description ==

Features of responsive-nav.js:

= Summary =

* multi-tiered (nested menu items)
* separate button-controls (allowing menu 'parents' to link to pages, rather than just toggle child menus)
* keyboard accessible (usable by real people)
* clean slide-down effect (optional)
* lightweight and easy to customise for improved usability

= [Original responsive-nav.js by Viljami Salminen](https://github.com/viljamis/responsive-nav.js) =

* It’s lightweight.
* Doesn’t require any external Javascript library like jQuery.
* Works without Javascript too.
* Removes the 300 ms delay between a physical tap and the click event.
* Have been tested and works in all major desktop and mobile browsers, even IE 6.
* Have CSS3 transition build in.

= [Fork of responsive-nav.js by Sami Keijonenn](https://github.com/samikeijonen/responsive-nav.js/tree/dropdowns) =

* Better support for keyboard users.
* Better support for screen reader users.
* Using buttons instead of links for toggling.
* Try to remove 300 ms delay on dropdown buttons also.
* Demonstrate that we don’t always need hamburger icon.
* Use more ARIA markup.
* Still works without Javascript.
* Still doesn’t require any external Javascript libraries.

Read more: [Accessible multi-level dropdown navigation](https://foxland.fi/accessible-multi-level-dropdown-navigation/)

= Additional features of this implementation: =

* custom toggle button, to support independent placement of menu and toggle button
* noscript fallback, linking the menu button to a menu at the bottom of the page (for people with JavaScript disabled)
* loading state (to indicate when the menu has been set up and is ready to use)
* control of the point at which the responsive version kicks in (using enquire.js to implement CSS media queries in JavaScript)

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/wpdtrt-responsive-nav` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->DTRT Responsive Nav screen to configure the plugin

== Frequently Asked Questions ==

= How do I create the menu items? =

1. *WP Admin > Appearance > Menus > Create a new menu*
2. *Menu Structure*: Create items, drag to nest as desired
3. *Menu Settings > Display location*
	* *Responsive Nav Header Menu*: Check
	* *Responsive Nav Footer Menu (mobile noscript fallback)*: Check

= How do I add the menu to my templates? =

```
// header.php
<?php echo do_shortcode( '[wpdtrt_responsive_nav location="header"]' ); ?>
```

```
// footer.php
<?php echo do_shortcode( '[wpdtrt_responsive_nav location="footer"]' ); ?>
```

= Why are there two menus? =

Progressive enhancement:

|                     | Mobile  | Desktop |
|---------------------|---------|---------|
| JavaScript disabled | `MJ N2` | `N1`    |
| JavaScript enabled  | `MT N1` | `N1`    |

* `N1` = nav 1 visible (header)
* `N2` = nav 2 visible (footer)
* `MJ` = menu button visible, works as a jump link
* `MT` = menu button visible, works as a nav toggle

= What can I customise? =

1. __Text labels__ (*Settings > DTRT Responsive Nav*)
2. __JavaScript hooks__ (*Settings > DTRT Responsive Nav*)
3. __Styling hooks__ (*Settings > DTRT Responsive Nav*)
4. __HTML templates__
	1. Copy all files in `template-parts` to a `template-parts` folder in the root of your theme
	2. Edit your copies
5. __Responsive breakpoint__
	* The page width at which the responsive version changes to the desktop version (*Settings > DTRT Responsive Nav*)
6. __Skin__

	To remove the plugin styles and add your own:

	```
	// functions.php

	/**
	 * Remove wpdtrt-responsive-nav styles
	 */
	function yourTheme_dequeue_style() {
	    wp_dequeue_style( 'wpdtrt_responsive_nav_css_frontend' );
	}

	add_action( 'wp_enqueue_scripts', 'yourTheme_dequeue_style', 100 );

	/**
	 * Add your own styles after the responsive-nav.js CSS dependency:
	 */
	wp_enqueue_style( 'yourTheme_css_frontend',
	  'path/to/yourTheme.css',
	  array(
	  	// dependencies to load first:
	    'wpdtrt_responsive_nav_responsive_nav_css'
	  )
	);
	```

	To add your customisations on top of what's there:

	```
	// functions.php

	/**
	 * Add your own styles after the wpdtrt-responsive-nav styles:
	 */
	wp_enqueue_style( 'yourTheme_css_frontend',
	  'path/to/yourTheme.css',
	  array(
	  	// dependencies to load first:
	    'wpdtrt_responsive_nav_css_frontend'
	  )
	);
```

== Changelog ==

= 0.5.0 =
* Transferred most shortcode options to an options page
* JavaScript configuration now uses these options rather than HTML data attributes
* Updated documentation

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

= 0.5.0 =
* Menus are now configured in plugin settings rather than shortcode.

= 0.1 =
* Initial version

== Demo ==

This plugin is based on a manual WordPress integration for http://allotelecom.ca/.

