<?php
/**
 * Form field partial for Admin Options page: Checkbox
 *
 * This file contains PHP and HTML
 *
 * @since       0.5.0
 *
 * @package     WPDTRT_Responsive_Nav
 * @subpackage  WPDTRT_Responsive_Nav/templates
 */
?>

<tr>
	<th scope="row">
		<label for="<?php echo $name; ?>"><?php echo $label; ?>:</label>
	</th>
	<td>
		<input type="checkbox" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="1" <?php checked( $value, '1', true ); ?>>
		<?php if ( isset($tip) ): ?>
		<p class="description"><?php echo $tip; ?></p>
		<?php endif; ?>
	</td>
</tr>
