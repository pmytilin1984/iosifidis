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

class JFormFieldNuImage extends JFormField
{

	var $type = 'NuImage';

	function getInput()
	{
		$template = $this->form->getValue('template');
		$document = JFactory::getDocument();
		JHtml::_('behavior.modal');
		$document->addScriptDeclaration('
			function jInsertFieldValue(value, id) {
				var old_value = document.id(id).value;
				if (old_value != value) {
					var elem = document.id(id);
					elem.value = value;
					elem.fireEvent("change");
					if (typeof(elem.onchange) === "function") {
						elem.onchange();
					}
					jMediaRefreshPreview(id);
				}
			}
			function jMediaRefreshPreview(id) {
				var value = document.id(id).value;
				var img = document.id(id + "_preview");
				if (img) {
					if (value) {
						img.src = "'.JURI::root().'" + value;
						document.id(id + "_preview_empty").setStyle("display", "none");
						document.id(id + "_preview_img").setStyle("display", "");
					} else {
						img.src = ""
						document.id(id + "_preview_empty").setStyle("display", "");
						document.id(id + "_preview_img").setStyle("display", "none");
					}
				}
			}
			function jMediaRefreshPreviewTip(tip){
				var img = tip.getElement("img.media-preview");
				tip.getElement("div.tip").setStyle("max-width", "none");
				var id = img.getProperty("id");
				id = id.substring(0, id.length - "_preview".length);
				jMediaRefreshPreview(id);
				tip.setStyle("display", "block");
			}
		');
		$id = uniqid('nuImage');
		$output = '
			<div class="nuImage" id="'.$id.'">
				<a class="nuImagePreviewButton" data-nuimage-id="'.$id.'" href="#" title="'.JText::_('TPL_NU_BE_FIELDS_CLICKTOVIEW').' '.$this->value.'"><i class="icon-eye"></i></a>
				<input name="'.$this->name.'" id="'.$id.'_field" value="'.$this->value.'" readonly="readonly" type="text" />
				<a class="nuImageModalButton" data-nuimage-id="'.$id.'" title="'.JText::_('TPL_NU_BE_FIELDS_SELECT').'">'.JText::_('TPL_NU_BE_FIELDS_SELECT').'</a>
				<a class="nuImageClearButton" data-nuimage-id="'.$id.'" href="#"><i class="icon-remove"></i></a>
			</div>
		';
		return $output;
	}

}
