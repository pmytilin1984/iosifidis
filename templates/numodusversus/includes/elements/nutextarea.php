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

class JFormFieldNuTextArea extends JFormField {

	var $type = 'NuTextArea';
	
	function getClass(){
		return $this->element['class'] ? (string)$this->element['class'] : null;
	}

	function getInput() {
		// Initialize some field attributes
		$cols = $this->element['cols'] ? (int)$this->element['cols'] : 20;
		$rows = $this->element['rows'] ? (int)$this->element['rows'] : 8;
		$class = $this->element['class'] ? ' '.(string)$this->element['class'] : '';

		$document = JFactory::getDocument();
		$document->addScript('//cdn.nuevvo.net/ace/src-min-noconflict/ace.js');
		$document->addScriptDeclaration('
			(function($){
				$(document).ready(function(){
					var editor = ace.edit("editor_'.$this->id.'");
					editor.setTheme("ace/theme/twilight");
					editor.getSession().setMode("ace/mode/php");
					editor.getSession().setUseWrapMode(true);
					editor.resize();
					var t = $(\'textarea[name="'.$this->name.'"]\');
					t.hide();
					var textareaValue = t.val();
					editor.getSession().setValue(textareaValue);
					editor.getSession().on(\'change\', function(){
					  t.val(editor.getSession().getValue());
					});
				});
			})(jQuery);
		');

		return '<div id="editor_'.$this->id.'" class="aceEditorBlock'.$class.'"></div><textarea id="'.$this->id.'" name="'.$this->name.'" cols="'.$cols.'" rows="'.$rows.'">'.$this->value.'</textarea>';
	}

}
