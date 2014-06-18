<?php

/**
 * Colored Names
 *
 * @author  emanuele
 * @license BSD http://opensource.org/licenses/BSD-3-Clause
 *
 * @version 0.0.1
 */

function template_profile_colored_names_picker()
{
	global $context, $txt;

	foreach ($context['current_colored_name'] as $name => $values)
	{
		echo '
			<dt>
				<strong><label for="colored_names_vals_', $name, '">', isset($txt['colored_names_' . $name]) ? $txt['colored_names_' . $name] : $name, '</label></strong>
				<input type="hidden" name="colored_names_picker" value="1" />';
		if (isset($txt['colored_names_' . $name . '_desc']))
			echo '
				<br />
				<span class="smalltext">', $txt['colored_names_' . $name . '_desc'], '</span>';
		echo '
			</dt>
			<dd>', template_colored_names_picker($values['type'], $name, $values), '
			</dd>';
	}
}

function template_colored_names_picker($type, $name, $values)
{
	global $txt;

	$value = $values['value'];

	switch ($type)
	{
		case 'text':
			echo '
				<input type="text" id="colored_names_vals_', $name, '" name="colored_names_vals[', $name, ']" value="', $value, '" />';
			break;
		case 'color':
			echo '
				<label for="theme_default_', $name, '">', $txt['colored_names_theme_def'], '</label>
				<input type="checkbox" ', empty($value) ? ' checked="checked"' : '', 'id="theme_default_', $name, '" name="colored_names_vals[default_', $name, ']" value="1" />
				<input type="color" id="colored_names_vals_', $name, '" name="colored_names_vals[', $name, ']" class="toggleCheck" data-name="', $name, '" value="', $value, '" />';
			break;
		case 'select':
			echo '
				<select id="colored_names_vals_', $name, '" name="colored_names_vals[', $name, ']">';
			foreach ($values['values'] as $key => $val)
				echo '
					<option value="', $key, '"', $value == $val ? ' selected="selected"' : '', '>', $val, '</option>';
			echo '
				</select>';
			break;
	}
}