<?php
/**
 * Generate a shortcode, to embed the widget inside a content area.
 *
 * This file contains PHP.
 *
 * @link        https://github.com/dotherightthing/wpdtrt-responsive-nav
 * @link        https://generatewp.com/shortcodes/
 * @since       0.1.0
 *
 * @example     [wpdtrt_responsive_nav number="4" enlargement="yes"]
 * @example     do_shortcode( '[wpdtrt_responsive_nav number="4" enlargement="yes"]' );
 *
 * @package     Wpdtrt_Responsive_Nav
 * @subpackage  Wpdtrt_Responsive_Nav/app
 */

if ( !function_exists( 'wpdtrt_responsive_nav_shortcode' ) ) {

  /**
   * add_shortcode
   * @param       string $tag
   *    Shortcode tag to be searched in post content.
   * @param       callable $func
   *    Hook to run when shortcode is found.
   *
   * @since       0.1.0
   * @uses        ../../../../wp-includes/shortcodes.php
   * @see         https://codex.wordpress.org/Function_Reference/add_shortcode
   * @see         http://php.net/manual/en/function.ob-start.php
   * @see         http://php.net/manual/en/function.ob-get-clean.php
   */
  function wpdtrt_responsive_nav_shortcode( $atts, $content = null ) {

    // post object to get info about the post in which the shortcode appears
    global $post;

    // predeclare variables
    $before_widget = null;
    $before_title = null;
    $title = null;
    $after_title = null;
    $after_widget = null;
    $header_nav_id = null;
    $footer_nav_id = null;
    $shortcode = 'wpdtrt_responsive_nav_shortcode';

    /**
     * Combine user attributes with known attributes and fill in defaults when needed.
     * @see https://developer.wordpress.org/reference/functions/shortcode_atts/
     */
    $atts = shortcode_atts(
      array(
        'header_nav_id' => 'main-nav',
        'footer_nav_id' => 'footer-nav'
      ),
      $atts,
      $shortcode
    );

    // only overwrite predeclared variables
    extract( $atts, EXTR_IF_EXISTS );

    //$wpdtrt_responsive_nav_options = get_option('wpdtrt_responsive_nav');
    //$wpdtrt_responsive_nav_data = $wpdtrt_responsive_nav_options['wpdtrt_responsive_nav_data'];

    /**
     * ob_start — Turn on output buffering
     * This stores the HTML template in the buffer
     * so that it can be output into the content
     * rather than at the top of the page.
     */
    ob_start();

    require(WPDTRT_RESPONSIVE_NAV_PATH . 'templates/wpdtrt-responsive-nav-front-end.php');

    /**
     * ob_get_clean — Get current buffer contents and delete current output buffer
     */
    $content = ob_get_clean();

    return $content;
  }

  add_shortcode( 'wpdtrt_responsive_nav', 'wpdtrt_responsive_nav_shortcode' );

}

?>
