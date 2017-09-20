<?php
/**
 * Template partial for Admin Options page
 *    WP Admin > Settings > DTRT Responsive Nav
 *
 * This file contains PHP, and HTML from the WordPress_Admin_Style plugin.
 *
 * @link        https://github.com/dotherightthing/wpdtrt-responsive-nav
 * @link        /wp-admin/admin.php?page=WordPress_Admin_Style#twocolumnlayout2
 * @since       0.1.0
 *
 * @package     WPDTRT_Responsive_Nav
 * @subpackage  WPDTRT_Responsive_Nav/templates
 */
?>

<div class="wrap">

  <div id="icon-options-general" class="icon32"></div>
  <h1><?php esc_attr_e( 'DTRT Responsive Nav', 'wp_admin_style' ); ?></h1>

  <div id="poststuff">

    <div id="post-body" class="metabox-holder columns-2">

      <!-- main content -->
      <div id="post-body-content">

        <div class="meta-box-sortables ui-sortable">

          <div class="postbox">

            <h2>
              <span>
                <?php esc_attr_e( 'DTRT Responsive Nav Options', 'wpdtrt-responsive-nav' ); ?>
              </span>
            </h2>

            <div class="inside">

              <form name="wpdtrt_responsive_nav_data_form" method="post" action="">

                <input type="hidden" name="wpdtrt_responsive_nav_form_submitted" value="Y" />

                <table class="form-table">
                  <?php
                    echo wpdtrt_responsive_nav_options_page_textfield(
                      'wpdtrt_responsive_nav_menu_open_label',
                      __('Label for menu open button', 'wpdtrt-responsive-nav')
                    );

                    echo wpdtrt_responsive_nav_options_page_textfield(
                      'wpdtrt_responsive_nav_menu_close_label',
                      __('Label for menu close button', 'wpdtrt-responsive-nav')
                    );

                    echo wpdtrt_responsive_nav_options_page_textfield(
                      'wpdtrt_responsive_nav_dropdown_expand_label',
                      __('Label for dropdown expand button', 'wpdtrt-responsive-nav')
                    );

                    echo wpdtrt_responsive_nav_options_page_textfield(
                      'wpdtrt_responsive_nav_dropdown_collapse_label',
                      __('Label for dropdown collapse button', 'wpdtrt-responsive-nav')
                    );

                    echo wpdtrt_responsive_nav_options_page_textfield(
                      'wpdtrt_responsive_nav_header_nav_id',
                      __('Header nav ID', 'wpdtrt-responsive-nav'),
                      __('HTML <code>id</code> of the top navigation bar', 'wpdtrt-responsive-nav')
                    );

                    echo wpdtrt_responsive_nav_options_page_textfield(
                      'wpdtrt_responsive_nav_footer_nav_id',
                      __('Footer nav ID', 'wpdtrt-responsive-nav'),
                      __('HTML <code>id</code> of the bottom navigation bar', 'wpdtrt-responsive-nav')
                    );

                    echo wpdtrt_responsive_nav_options_page_textfield(
                      'wpdtrt_responsive_nav_toggle_class',
                      __('Menu button class', 'wpdtrt-responsive-nav'),
                      __('HTML <code>class</code> used to style the menu toggle button', 'wpdtrt-responsive-nav')
                    );

                    echo wpdtrt_responsive_nav_options_page_textfield(
                      'wpdtrt_responsive_nav_toggle_class_active',
                      __('Active menu button class', 'wpdtrt-responsive-nav'),
                      __('HTML <code>class</code> used to style the menu toggle button when it is depressed', 'wpdtrt-responsive-nav')
                    );

                    echo wpdtrt_responsive_nav_options_page_textfield(
                      'wpdtrt_responsive_nav_slidedown',
                      __('Slidedown effect', 'wpdtrt-responsive-nav'),
                      __('Use a slide-down effect when the menu is opened (and up when it is closed)', 'wpdtrt-responsive-nav')
                    );

                    echo wpdtrt_responsive_nav_options_page_textfield(
                      'wpdtrt_responsive_nav_responsive_breakpoint',
                      __('Responsive breakpoint', 'wpdtrt-responsive-nav'),
                      __('The point after which the mobile menu should be hidden', 'wpdtrt-responsive-nav')
                    );
                  ?>

                </table>

                <?php
                /**
                 * submit_button( string $text = null, string $type = 'primary', string $name = 'submit', bool $wrap = true, array|string $other_attributes = null )
                 */
                  submit_button(
                    $text = 'Save',
                    $type = 'primary',
                    $name = 'wpdtrt_responsive_nav_submit',
                    $wrap = true,
                    $other_attributes = null
                  );
                ?>

              </form>
            </div>
            <!-- .inside -->

          </div>
          <!-- .postbox -->

        </div>
        <!-- .meta-box-sortables .ui-sortable -->

      </div>
      <!-- post-body-content -->

      <!-- sidebar -->
      <div id="postbox-container-1" class="postbox-container">
        <p>Support info</p>
      </div>
      <!-- #postbox-container-1 .postbox-container -->

    </div>
    <!-- #post-body .metabox-holder .columns-2 -->

    <br class="clear">
  </div>
  <!-- #poststuff -->

</div> <!-- .wrap -->
