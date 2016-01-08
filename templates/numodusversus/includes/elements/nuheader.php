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

class JFormFieldNuHeader extends JFormField {

	var $type = 'NuHeader';

	function getInput() {
		return null;
	}

	function getLabel() {
		$class = (string)$this->element->attributes()->class ? ' '.(string)$this->element->attributes()->class : '';
		$output = '<div class="nuHeaderInner'.$class.'"><h3>'.JText::_((string)$this->element->attributes()->label).'</h3>';
		$description = JText::_((string)$this->element->attributes()->description);
		if ($description) {
			$output .= '<span>'.$description.'</span>';
		}
		$output .= '</div>';
		return $output;
	}

}
