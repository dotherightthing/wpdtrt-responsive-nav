<?php
/**
 * Displays footer navigation
 *  This is a duplicate of header navigation,
 *  which is shown on mobile devices
 *  when JS is disabled.
 *
 * @link        https://github.com/dotherightthing/wpdtrt-responsive-nav
 * @since       0.1.0
 *
 * @package     Wpdtrt_Responsive_Nav
 * @subpackage  Wpdtrt_Responsive_Nav/template-parts
 */

$options = get_query_var( 'wpdtrt_responsive_nav_options' );

if ( is_array( $options ) ) {

  /**
   * predeclare the expected variables
   * @see http://kb.dotherightthing.dan/php/wordpress/extract/
   */
    $location = null;
    $header_nav_id = null;
    $footer_nav_id = null;
    $nav_toggle_class = null;
    $nav_toggle_class_active = null;
    $slidedown = null;

  /**
   * only overwrite the predeclared variables
   * @see http://kb.dotherightthing.dan/php/wordpress/extract/
   */
  extract($options, EXTR_IF_EXISTS);
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
            'menu' => 'wpdtrt-responsive-nav-footer-menu',
            'container' => 'div',
            'container_class' => 'wpdtrt-responsive-nav wpdtrt-responsive-nav-footer',
            'container_id' => $footer_nav_id,
            'menu_class' => 'navigation',
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
             * @see app/wpdtrt-responsive-nav-menus.php
             */
            'theme_location' => 'wpdtrt-responsive-nav-footer-menu'
         ) );
    ?>
</nav>
