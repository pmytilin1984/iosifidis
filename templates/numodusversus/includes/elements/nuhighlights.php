<?php
/**
 * @version			1.0.1 (May 8th, 2014)
 * @package			Akhtarma
 * @author			Nuevvo - http://nuevvo.com
 * @copyright		Copyright (c) 2010 - 2015 Nuevvo Webware Ltd. All rights reserved.
 * @license			http://nuevvo.com/license
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class JFormFieldNuHighlights extends JFormField
{

	var $type = 'NuHighlights';

	function getInput()
	{
		jimport('joomla.filesystem.folder');

		$template = $this->form->getValue('template');

		// Fonts
		$options = array();
		$options[] = JHTML::_('select.option', '', JText::_('TPL_NU_BE_FIELDS_NONE'));
		$options[] = JHTML::_('select.option', 'entypo', 'Entypo');
		$options[] = JHTML::_('select.option', 'fontawesome', 'Font Awesome');
		$options[] = JHTML::_('select.option', 'zocial', 'Zocial');
		$fontsSelect = JHTML::_('select.genericlist', $options, $this->name.'[font]', '', 'value', 'text', @$this->value['font'], 'nuHighlightsFont');

		require_once dirname(__FILE__).'/nuimage.php';

		$media = new JFormFieldNuImage;
		$xml = '<field name="'.$this->name.'[entries][][image]'.'" type="nuImage" label="TPL_NU_BE_LOGO_IMAGE" description="TPL_NU_BE_LOGO_IMAGE_DESC" filter="raw" />';
		$element = new SimpleXMLElement($xml);
		$media->setup($element, null);
		$media->setForm($this->form);
		$output = '
		<div id="nuHighlights">
			<label for="nuHighlightsFont" id="nuHighlightsFamilySelect">'.JText::_('TPL_NU_BE_FIELDS_SELECT_FONT').'</label>'.$fontsSelect.'
			<div class="clr"></div>
			<a id="nuAddHighlightButton" class="nuButton nuAddButton">'.JText::_('TPL_NU_BE_FIELDS_ADD_HIGHLIGHT').'</a>
			<div id="nuHighlightPlaceholder" class="nuHighlight">
				<div class="nuHighlightInner">
					<input size="58" type="text" placeholder="'.JText::_('TPL_NU_BE_FIELDS_TITLE').'" disabled="disabled" name="'.$this->name.'[entries][][title]'.'" value="" />
					<textarea disabled="disabled" placeholder="'.JText::_('TPL_NU_BE_FIELDS_DESCRIPTION').'" name="'.$this->name.'[entries][][description]'.'" cols="40" rows="5"></textarea>
					<input size="58" type="text" placeholder="'.JText::_('TPL_NU_BE_FIELDS_TAGLINE').'" disabled="disabled" name="'.$this->name.'[entries][][tagline]'.'" value="" />
					<input size="58" type="text" placeholder="'.JText::_('TPL_NU_BE_FIELDS_LINK').'" disabled="disabled" name="'.$this->name.'[entries][][link]'.'" value="" />
					<div class="nuHighlightsImageContainer">
						<label>'.JText::_('TPL_NU_BE_FIELDS_IMAGE').'</label>
						'.str_replace('<input ', '<input disabled="disabled" ', $media->getInput()).'
					</div>
					<div class="nuHighlightsIconContainer">
						<label>'.JText::_('TPL_NU_BE_FIELDS_ICON').'</label>
						<input disabled="disabled" type="hidden" name="'.$this->name.'[entries][][icon]'.'" />
						<a href="#" class="nuHighlightSelectIconButton">'.JText::_('TPL_NU_BE_FIELDS_SELECT').'</a>
						<span class="nuHighlightFontNotice">'.JText::_('TPL_NU_BE_MUST_SELECT_A_FONT_FAMILY_FIRST').'</span>
						<div class="nuHighlightIconsList nuHighlightIconsListHidden"></div>
						<span class="nuHighlightsIconPreview"></span>
					</div>
				</div>
				<a class="nuRemoveButton"></a>
			</div>
		';
		if ($this->value && isset($this->value['entries']) && is_array($this->value['entries']))
		{
			foreach ($this->value['entries'] as $key => $highlight)
			{
				$highlight = (object)$highlight;
				$output .= '
				<div class="nuHighlight">
					<div class="nuHighlightInner">
						<input size="58" type="text" name="'.$this->name.'[entries]['.$key.'][title]'.'" value="'.htmlspecialchars($highlight->title, ENT_QUOTES, 'UTF-8').'" />
						<textarea name="'.$this->name.'[entries]['.$key.'][description]'.'" cols="40" rows="5">'.$highlight->description.'</textarea>
						<input size="58" type="text" placeholder="'.JText::_('TPL_NU_BE_FIELDS_TAGLINE').'" name="'.$this->name.'[entries]['.$key.'][tagline]'.'" value="'.htmlspecialchars($highlight->tagline, ENT_QUOTES, 'UTF-8').'" />
						<input size="58" type="text" placeholder="'.JText::_('TPL_NU_BE_FIELDS_LINK').'" name="'.$this->name.'[entries]['.$key.'][link]'.'" value="'.htmlspecialchars($highlight->link, ENT_QUOTES, 'UTF-8').'" />
						<div class="nuHighlightsImageContainer">
							<label>'.JText::_('TPL_NU_BE_FIELDS_IMAGE').'</label>
							'.str_replace(array('value=""', '[entries][][image]'), array('value="'.htmlspecialchars($highlight->image, ENT_QUOTES, 'UTF-8').'"', '[entries]['.$key.'][image]'), $media->getInput()).'
						</div>
						<div class="nuHighlightsIconContainer">
							<label>'.JText::_('TPL_NU_BE_FIELDS_ICON').'</label>
							<input type="hidden" name="'.$this->name.'[entries]['.$key.'][icon]'.'" value="'.htmlspecialchars($highlight->icon, ENT_QUOTES, 'UTF-8').'" />
							<a href="#" class="nuHighlightSelectIconButton">'.JText::_('TPL_NU_BE_FIELDS_SELECT').'</a>
							<span class="nuHighlightFontNotice">'.JText::_('TPL_NU_BE_MUST_SELECT_A_FONT_FAMILY_FIRST').'</span>
							<div class="nuHighlightIconsList nuHighlightIconsListHidden"></div>
							<span class="nuHighlightsIconPreview">'.$highlight->icon.'</span>
						</div>
						<div class="clr"></div>
				</div>
				<a class="nuRemoveButton" title="'.JText::_('TPL_NU_BE_FIELDS_REMOVE').'"></a>
			</div>
			';
			}
		}
		$output .= '</div>';
		return $output;
	}

	function getLabel()
	{
		return null;
	}

}