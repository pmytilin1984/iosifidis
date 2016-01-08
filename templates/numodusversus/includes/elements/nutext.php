<?php
/**
 * @version     1.0.1 (July 19th, 2013)
 * @package     Akhtarma
 * @author      Nuevvo - http://nuevvo.com
 * @copyright   Copyright (c) 2010 - 2013 Nuevvo Webware Ltd. All rights reserved.
 * @license     http://nuevvo.com/license
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldNuText extends JFormField {

	var $type = 'NuText';

	function getInput() {
		// Initialize some field attributes
		$size = $this->element['size'] ? ' size="'.(int)$this->element['size'].'"' : '';
		$maxLength = $this->element['maxlength'] ? ' maxlength="'.(int)$this->element['maxlength'].'"' : '';
		$class = $this->element['class'] ? ' class="'.(string)$this->element['class'].'"' : '';
		$readonly = ((string)$this->element['readonly'] == 'true') ? ' readonly="readonly"' : '';
		$disabled = ((string)$this->element['disabled'] == 'true') ? ' disabled="disabled"' : '';
		$required = $this->required ? ' required="required" aria-required="true"' : '';

		// Initialize JavaScript field attributes
		$onchange = $this->element['onchange'] ? ' onchange="'.(string)$this->element['onchange'].'"' : '';

		// Prefix for field
		$prefix = $this->element['prefix'] ? '<span id="'.$this->element['name'].'" class="nuFieldTextPrefix">'.(string)$this->element['prefix'].'</span>' : '';

		return $prefix.'<input type="text" name="'.$this->name.'" id="'.$this->id.'" value="'.htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8').'"'.$class.$size.$disabled.$readonly.$onchange.$maxLength.$required.' />';
	}

}
