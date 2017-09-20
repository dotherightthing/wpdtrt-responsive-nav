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
                <?php esc_attr_e( 'Accessible labels', 'wpdtrt-responsive-nav' ); ?>
              </span>
            </h2>

            <div class="inside">

              <form name="wpdtrt_responsive_nav_data_form" method="post" action="">

                <input type="hidden" name="wpdtrt_responsive_nav_form_submitted" value="Y" />


                <fieldset>
                  <legend>
                    <?php esc_attr_e( 'Accessible labels', 'wpdtrt-responsive-nav' ); ?>
                  </legend>
                  <label title='g:i a'>
                    <input type="radio" name="example" value="" />
                    <span><?php esc_attr_e( 'Radio description with legend class .screen-reader-text', 'WpAdminStyle' ); ?></span>
                  </label><br>
                  <label title='g:i a'>
                    <input type="radio" name="example" value="" />
                    <span><?php esc_attr_e( 'Radio description #2 with legend class .screen-reader-text', 'WpAdminStyle' ); ?></span>
                  </label>
                </fieldset>

                <table class="form-table">
                  <?php
                    echo wpdtrt_responsive_nav_options_page_textfield(
                      __('Label for menu open button', 'wpdtrt-responsive-nav'),
                      'wpdtrt_responsive_nav_menu_open_label'
                    );
                  ?>
                  <?php
                    echo wpdtrt_responsive_nav_options_page_textfield(
                      __('Label for menu close button', 'wpdtrt-responsive-nav'),
                      'wpdtrt_responsive_nav_menu_close_label'
                    );
                  ?>
                  <?php
                    echo wpdtrt_responsive_nav_options_page_textfield(
                      __('Label for dropdown expand button', 'wpdtrt-responsive-nav'),
                      'wpdtrt_responsive_nav_dropdown_expand_label'
                    );
                  ?>
                  <?php
                    echo wpdtrt_responsive_nav_options_page_textfield(
                      __('Label for dropdown collapse button', 'wpdtrt-responsive-nav'),
                      'wpdtrt_responsive_nav_dropdown_collapse_label'
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
