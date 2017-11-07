<?php
/**
 * Form field partial for Admin Options page: Textfield
 *
 * This file contains PHP and HTML
 *
 * @since       0.5.0
 *
 * @package     WPDTRT_Responsive_Nav
 * @subpackage  WPDTRT_Responsive_Nav/templates
 */

    $theme = wp_get_theme();
    $TextDomain = $theme->get( 'TextDomain' );
    $is_handsoflight = ( $TextDomain === 'wpdtrt-handsoflight' );

    if ( $is_handsoflight ) {
    	$disabled = ' disabled="disabled"';
    }
?>

<tr>
	<th scope="row">
		<label for="<?php echo $name; ?>"><?php echo $label; ?>:</label>
	</th>
	<td>
		<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo $value; ?>" class="regular-text"<?php echo $disabled; ?>>
		<?php if ( isset($tip) ): ?>
		<p class="description"><?php echo $tip; ?></p>
		<?php endif; ?>
	</td>
</tr>
