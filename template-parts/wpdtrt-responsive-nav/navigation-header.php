<?php
/**
 * Displays header navigation
 *
 * @link        https://github.com/dotherightthing/wpdtrt-responsive-nav
 * @since       0.1.0
 *
 * @package     Wpdtrt_Responsive_Nav
 * @subpackage  Wpdtrt_Responsive_Nav/template-parts
 * @version 0.1.0
 */

$options = get_query_var( 'wpdtrt_responsive_nav_options_all' );

if ( is_array( $options ) ) {

  /**
   * predeclare the expected variables
   * @see http://kb.dotherightthing.dan/php/wordpress/extract/
   */
    $location = null;
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

  /**
   * only overwrite the predeclared variables
   * @see http://kb.dotherightthing.dan/php/wordpress/extract/
   */
  extract($options, EXTR_IF_EXISTS);

  $wpdtrt_responsive_nav_label_class = ( $wpdtrt_responsive_nav_reveal_labels === '1' ? ' wpdtrt-responsive-nav-reveal-labels' : '' );
}

?>
<nav role="navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'wpdtrt-responsive-nav' ); ?>">
    <?php
        /**
         * wp_page_menu: 2.7.0+
         * wp_nav_menu: 3.0.0+
         */
        wp_nav_menu( array(
            /**
             * Apply Appearance > Menus > Menu Structure
             * otherwise fallback_cb is used
             */
            'menu' => 'wpdtrt-responsive-nav-header-menu',
            'container' => 'div',
            'container_class' => 'wpdtrt-responsive-nav wpdtrt-responsive-nav-header' . $wpdtrt_responsive_nav_label_class,
            'container_id' => $wpdtrt_responsive_nav_header_nav_id,
            'menu_class' => $wpdtrt_responsive_nav_toggle_class,
            'menu_id' => '',
            'echo' => true,
            /**
             * wp_page_menu() is sorted alphabetically
             * If menu is configured differently in wp-admin
             * then alphabetical sorting indicates a problem.
             */
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'item_spacing' => 'preserve',
            'depth' => 0,
            'walker' => '',
            /**
             * Theme location must be registered with register_nav_menu()
             * in order to be selectable by the user.
             * Note: this is the menu slug, not the wp-admin display value.
             * @see app/wpdtrt-responsive-nav-menus.php
             */
            'theme_location' => 'wpdtrt-responsive-nav-header-menu'
         ) );
    ?>
</nav>
