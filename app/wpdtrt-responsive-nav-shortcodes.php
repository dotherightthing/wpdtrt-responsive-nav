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
 * @example     [wpdtrt_responsive_nav location="header"]
 * @example     do_shortcode( '[wpdtrt_responsive_nav location="header"]' );
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
   * @see         https://codex.wordpress.org/Shortcode_API#Enclosing_vs_self-closing_shortcodes
   * @see         http://php.net/manual/en/function.ob-start.php
   * @see         http://php.net/manual/en/function.ob-get-clean.php
   */
  function wpdtrt_responsive_nav_shortcode( $atts, $content = null ) {

    // post object to get info about the post in which the shortcode appears
    global $post;

    // predeclare wp variables
    $before_widget = null;
    $before_title = null;
    $title = null;
    $after_title = null;
    $after_widget = null;

    // predeclare shortcode option variables
    $location = null;
    $shortcode = 'wpdtrt_responsive_nav_shortcode';

    /**
     * Combine user attributes with known attributes and fill in defaults when needed.
     * @see https://developer.wordpress.org/reference/functions/shortcode_atts/
     */
    $atts = shortcode_atts(
      array(
        'location' => 'header', // header|footer
      ),
      $atts,
      $shortcode
    );

    // only overwrite predeclared variables
    extract( $atts, EXTR_IF_EXISTS );

    /**
     * Get plugin options
     */
    $wpdtrt_responsive_nav_options = get_option( 'wpdtrt_responsive_nav' );

    // predeclare options variables
    $wpdtrt_responsive_nav_menu_label = null;
    $wpdtrt_responsive_nav_menu_open_label = null;
    $wpdtrt_responsive_nav_menu_close_label = null;
    $wpdtrt_responsive_nav_dropdown_expand_label = null;
    $wpdtrt_responsive_nav_dropdown_collapse_label = null;
    $wpdtrt_responsive_nav_header_nav_id = null;
    $wpdtrt_responsive_nav_footer_nav_id = null;
    $wpdtrt_responsive_nav_toggle_class = null;
    $wpdtrt_responsive_nav_toggle_class_active = null;
    $wpdtrt_responsive_nav_slidedown = null;
    $wpdtrt_responsive_nav_reveal_labels = null;
    $wpdtrt_responsive_nav_responsive_breakpoint = null;

    // only overwrite predeclared variables
    extract( $wpdtrt_responsive_nav_options, EXTR_IF_EXISTS );

    if ( $location === 'header' ) { // i.e. only do this once

      // load mobile CSS
      // TODO: calling this here causes it to be attached to the bottom of the <body>
      wp_enqueue_style( 'wpdtrt_responsive_nav_css_frontend_mobile',
        WPDTRT_RESPONSIVE_NAV_URL . 'css/wpdtrt-responsive-nav-mobile.css',
        array(
          'wpdtrt_responsive_nav_css_frontend'
        ),
        WPDTRT_RESPONSIVE_NAV_VERSION,
        'screen and (max-width: ' . $wpdtrt_responsive_nav_responsive_breakpoint . ')'
      );
    }
    else if ( $location === 'footer' ) { // i.e. only do this once

      // configure mobile JS
      wp_localize_script(
        'wpdtrt_responsive_nav_frontend_js',
        'wpdtrt_responsive_nav_options',
        array(
          'menu_label' => $wpdtrt_responsive_nav_menu_label,
          'menu_open_label' => $wpdtrt_responsive_nav_menu_open_label,
          'menu_close_label' => $wpdtrt_responsive_nav_menu_close_label,
          'dropdown_expand_label' => $wpdtrt_responsive_nav_dropdown_expand_label,
          'dropdown_collapse_label' => $wpdtrt_responsive_nav_dropdown_collapse_label,
          'header_nav_id' => $wpdtrt_responsive_nav_header_nav_id,
          'footer_nav_id' => $wpdtrt_responsive_nav_footer_nav_id,
          'toggle_class' => $wpdtrt_responsive_nav_toggle_class,
          'toggle_class_active' => $wpdtrt_responsive_nav_toggle_class_active,
          'slidedown' => $wpdtrt_responsive_nav_slidedown,
          'reveal_labels' => $wpdtrt_responsive_nav_reveal_labels,
          'responsive_breakpoint' => $wpdtrt_responsive_nav_responsive_breakpoint
        )
      );
    }

    // mimic WordPress template loading
    // to allow authors to override loaded templates
    $templates = new WPDTRT_Responsive_Nav_Template_Loader;

    // pass options to get_template_part()
    $wpdtrt_responsive_nav_options_all = array_merge( $atts, $wpdtrt_responsive_nav_options );
    set_query_var( 'wpdtrt_responsive_nav_options_all', $wpdtrt_responsive_nav_options_all );

    /**
     * ob_start — Turn on output buffering
     * This stores the HTML template in the buffer
     * so that it can be output into the content
     * rather than at the top of the page.
     */
    ob_start();

    if ( ( $location === 'header' ) && ( has_nav_menu( 'wpdtrt-responsive-nav-header-menu' ) ) ):

      $templates->get_template_part( 'navigation', 'toggle' );
      $templates->get_template_part( 'navigation', 'header' );

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
