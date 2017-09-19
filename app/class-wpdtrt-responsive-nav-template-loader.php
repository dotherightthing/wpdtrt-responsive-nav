<?php
/**
 * Template loader
 *
 * Displays templates in the Templates dropdown in the page edit screen
 * Allows the author to override these from the templates folder in their own theme
 *
 * @uses https://github.com/wpexplorer/page-templater
 * @see http://www.wpexplorer.com/wordpress-page-templates-plugin/
 * @version: 1.1.0
 * @author: WPExplorer
*/

require_once(WPDTRT_RESPONSIVE_NAV_PATH . 'vendor/gamajo/template-loader/class-gamajo-template-loader.php');

/**
 * Only need to specify class properties here.
 */
class WPDTRT_Responsive_Nav_Template_Loader extends Gamajo_Template_Loader {

	/**
	 * Prefix for filter names.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $filter_prefix = 'wpdtrt_responsive_nav';

	/**
	 * Directory name where custom templates for this plugin should be found in the plugin.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $plugin_template_directory = 'template-parts/wpdtrt-responsive-nav';

	/**
	 * Directory name where custom templates for this plugin should be found in the theme.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $theme_template_directory = 'template-parts/wpdtrt-responsive-nav';

	/**
	 * Reference to the root directory path of this plugin.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $plugin_directory = WPDTRT_RESPONSIVE_NAV_PATH;

}
