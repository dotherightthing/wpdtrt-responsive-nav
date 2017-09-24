<?php
/**
 * Template partial for Admin Options page
 *    WP Admin > Settings > DTRT Responsive Nav
 *
 * This file contains PHP, and HTML from the WordPress_Admin_Style plugin.
 *
 * @link        https://github.com/dotherightthing/wpdtrt-responsive-nav
 * @since       0.1.0
 *
 * @package     WPDTRT_Responsive_Nav
 * @subpackage  WPDTRT_Responsive_Nav/templates
 */
?>

<div class="wrap">

  <div id="icon-options-general" class="icon32"></div>
  <h1>
    <?php esc_attr_e( 'DTRT Responsive Nav', 'wpdtrt-responsive-nav' ); ?>
    <span class="wpdtrt-responsive-nav-version"><?php echo WPDTRT_RESPONSIVE_NAV_VERSION; ?></span>
  </h1>

  <form name="wpdtrt_responsive_nav_data_form" method="post" action="">

    <input type="hidden" name="wpdtrt_responsive_nav_form_submitted" value="Y" />

    <h2 class="title"><?php esc_attr_e('Label Settings', 'wpdtrt-responsive-nav'); ?></h2>
    <p><?php _e('All buttons have accessible text alternatives.', 'wpdtrt-responsive-nav'); ?></p>

    <fieldset>
      <legend class="screen-reader-text">
        <span><?php esc_attr_e('Label Settings', 'wpdtrt-responsive-nav'); ?></span>
      </legend>
      <table class="form-table">
        <tbody>
          <?php
            echo wpdtrt_responsive_nav_options_page_field(
              'textfield',
              'wpdtrt_responsive_nav_menu_label',
              __('Label for default menu button', 'wpdtrt-responsive-nav')
            );

            echo wpdtrt_responsive_nav_options_page_field(
              'textfield',
              'wpdtrt_responsive_nav_menu_open_label',
              __('Label for menu open button', 'wpdtrt-responsive-nav'),
              __('Displayed when the menu is closed', 'wpdtrt-responsive-nav')
            );

            echo wpdtrt_responsive_nav_options_page_field(
              'textfield',
              'wpdtrt_responsive_nav_menu_close_label',
              __('Label for menu close button', 'wpdtrt-responsive-nav'),
              __('Displayed when the menu is open', 'wpdtrt-responsive-nav')
            );

            echo wpdtrt_responsive_nav_options_page_field(
              'textfield',
              'wpdtrt_responsive_nav_dropdown_expand_label',
              __('Label for sub-menu open button', 'wpdtrt-responsive-nav'),
              __('Displayed when the sub-menu is closed', 'wpdtrt-responsive-nav')
            );

            echo wpdtrt_responsive_nav_options_page_field(
              'textfield',
              'wpdtrt_responsive_nav_dropdown_collapse_label',
              __('Label for sub-menu close button', 'wpdtrt-responsive-nav'),
              __('Displayed when the sub-menu is open', 'wpdtrt-responsive-nav')
            );

            echo wpdtrt_responsive_nav_options_page_field(
              'checkbox',
              'wpdtrt_responsive_nav_reveal_labels',
              __('Reveal accessible labels', 'wpdtrt-responsive-nav'),
              __('Display to everybody', 'wpdtrt-responsive-nav')
            );
          ?>
        </tbody>
      </table>
    </fieldset>

    <h2 class="title"><?php esc_attr_e('Attribute Settings', 'wpdtrt-responsive-nav'); ?></h2>
    <p><?php _e('HTML <code>id</code> and <code>class</code> attributes are used to style the toggle button and sub/menus, and wire the toggle button and sub/menus together.', 'wpdtrt-responsive-nav'); ?></p>

    <fieldset>
      <legend class="screen-reader-text">
        <span><?php esc_attr_e('Attribute Settings', 'wpdtrt-responsive-nav'); ?></span>
      </legend>
      <table class="form-table">
        <tbody>
          <?php
            echo wpdtrt_responsive_nav_options_page_field(
              'textfield',
              'wpdtrt_responsive_nav_header_nav_id',
              __('Header nav ID', 'wpdtrt-responsive-nav'),
              __('HTML <code>id</code> of the top navigation bar', 'wpdtrt-responsive-nav')
            );

            echo wpdtrt_responsive_nav_options_page_field(
              'textfield',
              'wpdtrt_responsive_nav_footer_nav_id',
              __('Footer nav ID', 'wpdtrt-responsive-nav'),
              __('HTML <code>id</code> of the bottom navigation bar', 'wpdtrt-responsive-nav')
            );

            echo wpdtrt_responsive_nav_options_page_field(
              'textfield',
              'wpdtrt_responsive_nav_toggle_class',
              __('Menu button class', 'wpdtrt-responsive-nav'),
              __('HTML <code>class</code> used to style the menu toggle button', 'wpdtrt-responsive-nav')
            );

            echo wpdtrt_responsive_nav_options_page_field(
              'textfield',
              'wpdtrt_responsive_nav_toggle_class_active',
              __('Active menu button class', 'wpdtrt-responsive-nav'),
              __('HTML <code>class</code> used to style the menu toggle button when it is depressed', 'wpdtrt-responsive-nav')
            );
          ?>
        </tbody>
      </table>
    </fieldset>

    <h2 class="title"><?php esc_attr_e('Transition Settings', 'wpdtrt-responsive-nav'); ?></h2>
    <p><?php _e('Change is inevitable.', 'wpdtrt-responsive-nav'); ?></p>

    <fieldset>
      <legend class="screen-reader-text">
        <span><?php esc_attr_e('Transition Settings', 'wpdtrt-responsive-nav'); ?></span>
      </legend>
      <table class="form-table">
        <tbody>
          <?php
            echo wpdtrt_responsive_nav_options_page_field(
              'checkbox',
              'wpdtrt_responsive_nav_slidedown',
              __('Slidedown effect', 'wpdtrt-responsive-nav'),
              __('Use a slide-down effect when the menu is opened (and up when it is closed)', 'wpdtrt-responsive-nav')
            );

            echo wpdtrt_responsive_nav_options_page_field(
              'textfield',
              'wpdtrt_responsive_nav_responsive_breakpoint',
              __('Responsive breakpoint', 'wpdtrt-responsive-nav'),
              __('The point after which the mobile menu should be hidden', 'wpdtrt-responsive-nav')
            );
          ?>
        </tbody>
      </table>
    <fieldset>

    <?php
    /**
     * submit_button( string $text = null, string $type = 'primary', string $name = 'submit', bool $wrap = true, array|string $other_attributes = null )
     */
      submit_button(
        $text = __('Save Changes', 'wpdtrt-responsive-nav'),
        $type = 'primary',
        $name = 'wpdtrt_responsive_nav_submit',
        $wrap = true, // wrap in paragraph
        $other_attributes = null
      );
    ?>

  </form>

</div> <!-- .wrap -->
