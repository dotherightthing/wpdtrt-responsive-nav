<?php
/**
 * Form field partial for Admin Options page: Textfield
 *
 * This file contains PHP, and HTML
 *
 * @since       0.5.0
 *
 * @package     WPDTRT_Responsive_Nav
 * @subpackage  WPDTRT_Responsive_Nav/templates
 */
?>

<tr>
	<th>
		<label for="<?php echo $name; ?>"><?php echo $label; ?>:</label>
	</th>
	<td>
		<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo $value; ?>">
	</td>
</tr>
