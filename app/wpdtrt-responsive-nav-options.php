<?php
/**
 * Functionality for the WP Admin Plugin Options page
 *    WP Admin > Settings > DTRT Responsive Nav
 *
 * This file contains PHP.
 *
 * @link        https://github.com/dotherightthing/wpdtrt-responsive-nav
 * @since       0.1.0
 *
 * @package     WPDTRT_Responsive_Nav
 * @subpackage  WPDTRT_Responsive_Nav/app
 */

if ( !function_exists( 'wpdtrt_responsive_nav_menu' ) ) {


  /**
   * Display a link to the options page in the admin menu
   *
   * @since       0.1.0
   * @uses        ../../../../wp-admin/includes/plugin.php
   * @see         https://developer.wordpress.org/reference/functions/add_options_page/
   */
  function wpdtrt_responsive_nav_menu() {

    add_options_page(
      'DTRT Responsive Nav',
      'DTRT Responsive Nav',
      'manage_options',
      'wpdtrt-responsive-nav',
      'wpdtrt_responsive_nav_options_page'
    );
  }

  add_action('admin_menu', 'wpdtrt_responsive_nav_menu');

}

/**
 * Create the default plugin options
 *  This is called when the plugin is activated,
 *  so that it is available to all functions including shortcodes.
 */
function wpdtrt_responsive_nav_options_create() {

  /**
   * Set option defaults
   */
  $wpdtrt_responsive_nav_options_default = array(
    'wpdtrt_responsive_nav_menu_open_label'         => __('Open menu', 'wpdtrt-responsive-nav'),
    'wpdtrt_responsive_nav_menu_close_label'        => __('Close menu', 'wpdtrt-responsive-nav'),
    'wpdtrt_responsive_nav_dropdown_expand_label'   => __('Open sub menu', 'wpdtrt-responsive-nav'),
    'wpdtrt_responsive_nav_dropdown_collapse_label' => __('Close sub menu', 'wpdtrt-responsive-nav'),
    'wpdtrt_responsive_nav_header_nav_id'           => 'main-nav',
    'wpdtrt_responsive_nav_footer_nav_id'           => 'footer-nav',
    'wpdtrt_responsive_nav_toggle_class'            => 'navigation',
    'wpdtrt_responsive_nav_toggle_class_active'     => 'navigation-active',
    'wpdtrt_responsive_nav_slidedown'               => 'true',
    'wpdtrt_responsive_nav_responsive_breakpoint'   => '480px',
  );

  /**
   * Load any existing options, falling back to an empty array if they don't exist yet
   * @see https://developer.wordpress.org/reference/functions/get_option/#parameters
   */
  $wpdtrt_responsive_nav_options = get_option( 'wpdtrt_responsive_nav', array() );

  /**
   * Merge defaults with existing options
   * This overwrites the defaults with any user specified values
   */
  $wpdtrt_responsive_nav_options_combined = array_merge ( $wpdtrt_responsive_nav_options_default, $wpdtrt_responsive_nav_options );

  /**
   * Save options objectback to database
   *
   * Update the plugin data stored in the WP Options table
   * This function may be used in place of add_option, although it is not as flexible.
   * update_option will check to see if the option already exists.
   * If it does not, it will be added with add_option('option_name', 'option_value').
   * Unless you need to specify the optional arguments of add_option(),
   * update_option() is a useful catch-all for both adding and updating options.
   * @example update_option( string $option, mixed $value, string|bool $autoload = null )
   * @see https://codex.wordpress.org/Function_Reference/update_option
   */
  update_option( 'wpdtrt_responsive_nav', $wpdtrt_responsive_nav_options_combined, null );
}

/**
 * Create the plugin options page
 */
if ( !function_exists( 'wpdtrt_responsive_nav_options_page' ) ) {

  /**
   * Render the appropriate UI on Settings > DTRT Responsive Nav
   *
   *    1. Take the user's options (from the form input)
   *    2. Store the user's options
   *    3. Render the options page
   *
   *    Note: Shortcode/widget options are specific to each instance of the shortcode/widget
   *    and are thus stored with those individual instances.
   *
   * @since       0.1.0
   */
  function wpdtrt_responsive_nav_options_page() {

    if ( ! current_user_can( 'manage_options' ) ) {
      wp_die( 'Sorry, you do not have sufficient permissions to access this page.' );
    }

    /**
     * Make this global available within the required statement
     */
    global $wpdtrt_responsive_nav_options;

    if ( ! isset( $_POST['wpdtrt_responsive_nav_form_submitted'] ) ) {

      /**
       * Load existing options
       */
      $wpdtrt_responsive_nav_options = get_option( 'wpdtrt_responsive_nav' );

      // Create variables
      $wpdtrt_responsive_nav_menu_open_label = null;
      $wpdtrt_responsive_nav_menu_close_label = null;
      $wpdtrt_responsive_nav_dropdown_expand_label = null;
      $wpdtrt_responsive_nav_dropdown_collapse_label = null;
      $wpdtrt_responsive_nav_header_nav_id = null;
      $wpdtrt_responsive_nav_footer_nav_id = null;
      $wpdtrt_responsive_nav_toggle_class = null;
      $wpdtrt_responsive_nav_toggle_class_active = null;
      $wpdtrt_responsive_nav_slidedown = null;
      $wpdtrt_responsive_nav_responsive_breakpoint = null;

      // Assign values to variables
      extract( $wpdtrt_responsive_nav_options, EXTR_IF_EXISTS );


      update_option( 'wpdtrt_responsive_nav', $wpdtrt_responsive_nav_options, null );
    }
    else {

      // check that the form submission was legitimate
      $hidden_field = esc_html( $_POST['wpdtrt_responsive_nav_form_submitted'] );

      if ( $hidden_field === 'Y' ) {

        // Load existing options
        $wpdtrt_responsive_nav_options = get_option( 'wpdtrt_responsive_nav' );

        /**
         * Save default/user values from form submission
         * @see https://stackoverflow.com/a/13461680/6850747
         */
        foreach( $wpdtrt_responsive_nav_options as $key => $value ) {

          // if a value was submitted
          if ( !empty( $_POST[ $key ] ) ) {
            // overwrite the existing value
            $wpdtrt_responsive_nav_options[ $key ] = $_POST[ $key ];
          }
        }

        // Update options object in database
        update_option( 'wpdtrt_responsive_nav', $wpdtrt_responsive_nav_options, null );
      }
    }

    /**
     * Load the HTML template
     * This function's variables will be available to this template.
     */
    require_once(WPDTRT_RESPONSIVE_NAV_PATH . 'templates/wpdtrt-responsive-nav-options.php');
  }

}

function wpdtrt_responsive_nav_options_page_textfield( $name, $label, $tip=null ) {

  /**
   * Load options array
   */
  $wpdtrt_responsive_nav_options = get_option( 'wpdtrt_responsive_nav' );

  /**
   * Create variables and values fro the array items
   */
  extract( $wpdtrt_responsive_nav_options );

  /**
   * Set the value to the variable with the same name as the $name string
   * e.g. $name="wpdtrt_responsive_nav_toggle_label" => $wpdtrt_responsive_nav_toggle_label => ('Open menu', 'wpdtrt-responsive-nav')
   * @see http://php.net/manual/en/language.variables.variable.php
   */
  $value = ${$name};

  /**
   * Load the HTML template
   * The supplied arguments will be available to this template.
   */

  /**
   * ob_start — Turn on output buffering
   * This stores the HTML template in the buffer
   * so that it can be output into the content
   * rather than at the top of the page.
   */
  ob_start();

  require(WPDTRT_RESPONSIVE_NAV_PATH . 'templates/wpdtrt-responsive-nav-options-textfield.php');

  /**
   * ob_get_clean — Get current buffer contents and delete current output buffer
   */
  return ob_get_clean();
}

?>
