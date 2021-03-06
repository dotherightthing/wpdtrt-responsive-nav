<?php
/**
 * Admin Notices
 *
 * This file contains PHP.
 *
 * @since       0.1.0
 *
 * @package     Wpdtrt_Responsive_Nav
 * @subpackage  Wpdtrt_Responsive_Nav/app
 */

/**
 * Display any error messages below the H1
 * @see https://digwp.com/2016/05/wordpress-admin-notices/
 */
add_action('admin_notices', 'wpdtrt_responsive_nav_add_settings_errors');

function wpdtrt_responsive_nav_add_settings_errors() {
    settings_errors();
}

/**
 * Display a custom admin notice below the H1
 * Possible classes: notice-error, notice-warning, notice-success, or notice-info
 * @see https://digwp.com/2016/05/wordpress-admin-notices/
 */
add_action('admin_notices', 'wpdtrt_responsive_nav_admin_notice_settings_updated');

function wpdtrt_responsive_nav_admin_notice_settings_updated() {

	$screen = get_current_screen();

	if ($screen->id === 'settings_page_wpdtrt-responsive-nav'):

		if ( isset( $_POST['wpdtrt_responsive_nav_form_submitted'] ) ):
?>

			<div class="notice notice-success is-dismissible">
				<p><?php _e('Responsive Nav settings successfully updated', 'wpdtrt-responsive-nav'); ?></p>
			</div>

<?php
		endif;
	endif;
}
?>