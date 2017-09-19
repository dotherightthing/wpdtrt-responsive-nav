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
 * @example     [wpdtrt_responsive_nav location="header" header_nav_id="header-nav" footer_nav_id="footer-nav" slidedown="false"]
 * @example     do_shortcode( '[wpdtrt_responsive_nav location="header" header_nav_id="header-nav" footer_nav_id="footer-nav" slidedown="false"]' );
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
    $location = null;
    $header_nav_id = null;
    $footer_nav_id = null;
    $nav_toggle_class = null;
    $nav_toggle_class_active = null;
    $slidedown = null;
    $responsive_breakpoint = null;
    $shortcode = 'wpdtrt_responsive_nav_shortcode';

    /**
     * Combine user attributes with known attributes and fill in defaults when needed.
     * @see https://developer.wordpress.org/reference/functions/shortcode_atts/
     */
    $atts = shortcode_atts(
      array(
        'location' => 'header', // header|footer
        'header_nav_id' => 'main-nav',
        'footer_nav_id' => 'footer-nav',
        'nav_toggle_class' => 'navigation',
        'nav_toggle_class_active' => 'navigation-active',
        'slidedown' => 'true',
        'responsive_breakpoint' => '480px'
      ),
      $atts,
      $shortcode
    );

    // only overwrite predeclared variables
    extract( $atts, EXTR_IF_EXISTS );

    if ( $location === 'header' ) { // i.e. only do this once

      // load mobile CSS
      // TODO: calling this here causes it to be attached to the bottom of the <body>
      wp_enqueue_style( 'wpdtrt_responsive_nav_css_frontend_mobile',
        WPDTRT_RESPONSIVE_NAV_URL . 'css/wpdtrt-responsive-nav-mobile.css',
        array(
          'wpdtrt_responsive_nav_css_frontend'
        ),
        WPDTRT_RESPONSIVE_NAV_VERSION,
        'screen and (max-width: ' . $responsive_breakpoint . ')'
      );
    }
    else if ( $location === 'footer' ) { // i.e. only do this once

      // configure mobile JS
      wp_localize_script(
        'wpdtrt_responsive_nav_frontend_js',
        'wpdtrt_responsive_nav_wp',
        array(
          'responsive_breakpoint' => $responsive_breakpoint
        )
      );
    }

    // mimic WordPress template loading
    // to allow authors to override loaded templates
    $templates = new WPDTRT_Responsive_Nav_Template_Loader;

    // pass shortcode options to get_template_part()
    set_query_var( 'wpdtrt_responsive_nav_options', $atts );

    /**
     * ob_start — Turn on output buffering
     * This stores the HTML template in the buffer
     * so that it can be output into the content
     * rather than at the top of the page.
     */
    ob_start();

    if ( ( $location === 'header' ) && ( has_nav_menu( 'wpdtrt-responsive-nav-header-menu' ) ) ):

      echo '<div id="header-nav-wrapper">';
      $templates->get_template_part( 'navigation', 'toggle' );
      $templates->get_template_part( 'navigation', 'header' );
      echo '</div>';

    elseif ( ( $location === 'footer' ) && ( has_nav_menu( 'wpdtrt-responsive-nav-footer-menu' ) ) ):

      $templates->get_template_part( 'navigation', 'footer' );

    endif;


    /**
     * ob_get_clean — Get current buffer contents and delete current output buffer
     */
    $content = ob_get_clean();

    return $content;
  }

  add_shortcode( 'wpdtrt_responsive_nav', 'wpdtrt_responsive_nav_shortcode' );

}

?>
