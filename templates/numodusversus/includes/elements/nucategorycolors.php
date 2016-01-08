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

class JFormFieldNuCategoryColors extends JFormField
{

	var $type = 'NuCategoryColors';

	function getInput()
	{

		jimport('joomla.filesystem.file');
		// Joomla! categories and placeholder
		$JCategories = JHtml::_('category.options', 'com_content');
		$output = '
		<div id="nuCategoryColors">
			<a class="nuButton nuAddButton" id="nuAddJCategoryButton">'.JText::_('TPL_NU_BE_FIELDS_ADD_JOOMLA_CATEGORY').'</a>
		';
		if (JFile::exists(JPATH_SITE.'/components/com_k2/k2.php'))
		{
			$output .= '<a class="nuButton nuAddButton" id="nuAddK2CategoryButton">'.JText::_('TPL_NU_BE_FIELDS_ADD_K2_CATEGORY').'</a>';
		}
		$output .= '
		<div id="nuJCategoryPlaceholder" class="nuTemplateColor nuJCategory">
			'.JHTML::_('select.genericlist', $JCategories, $this->name.'[][category]', 'disabled="disabled"', 'value', 'text', NULL, 'jCategories').'
			<input type="text" value="" disabled="disabled" name="'.$this->name.'[][color]'.'" />
			<input type="hidden" value="joomla" disabled="disabled" name="'.$this->name.'[][type]'.'" />
			<a class="nuRemoveButton" title="'.JText::_('TPL_NU_BE_FIELDS_REMOVE').'"></a>
		</div>
		';

		if (JFile::exists(JPATH_SITE.'/components/com_k2/k2.php'))
		{
			$K2Categories = $this->getK2Categories();
			$output .= '
			<div id="nuK2CategoryPlaceholder" class="nuTemplateColor nuK2Category">
				'.JHTML::_('select.genericlist', $K2Categories, $this->name.'[][category]', 'disabled="disabled"', 'value', 'text', NULL, 'k2Categories').'
				<input type="text" value="" disabled="disabled" name="'.$this->name.'[][color]'.'" />
				<input type="hidden" value="k2" disabled="disabled" name="'.$this->name.'[][type]'.'" />
				<a class="nuRemoveButton" title="'.JText::_('TPL_NU_BE_FIELDS_REMOVE').'"></a>
			</div>';
		}

		if ($this->value && is_array($this->value))
		{
			foreach ($this->value as $key => $categoryColor)
			{

				if ($categoryColor['type'] == 'joomla')
				{
					$class = 'nuJCategory';
					$select = JHTML::_('select.genericlist', $JCategories, $this->name.'['.$key.'][category]', '', 'value', 'text', $categoryColor['category'], 'jCategories'.$key);
				}
				else
				{
					$class = 'nuK2Category';
					$select = JHTML::_('select.genericlist', $K2Categories, $this->name.'['.$key.'][category]', '', 'value', 'text', $categoryColor['category'], 'k2Categories'.$key);
				}

				$output .= '
				<div class="nuTemplateColor '.$class.'">
					'.$select.'
					<input class="nuColorPicker" type="text" name="'.$this->name.'['.$key.'][color]'.'" value="'.$categoryColor['color'].'" />
					<input type="hidden" value="'.$categoryColor['type'].'" name="'.$this->name.'['.$key.'][type]'.'" />
					<a class="nuRemoveButton" title="'.JText::_('TPL_NU_BE_FIELDS_REMOVE').'"></a>
				</div>
				';
			}
		}

		$output .= "</div>";
		return $output;
	}

	function getLabel()
	{
		return null;
	}

	function getK2Categories()
	{
		$db = JFactory::getDBO();
		$query = 'SELECT * FROM #__k2_categories WHERE published = 1 ORDER BY parent, ordering';
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		$children = array();
		if ($rows)
		{
			foreach ($rows as $row)
			{
				$row->title = $row->name;
				$row->parent_id = $row->parent;
				$index = $row->parent;
				$list = @$children[$index] ? $children[$index] : array();
				array_push($list, $row);
				$children[$index] = $list;
			}
		}
		$categories = JHTML::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0);
		$options = array();
		foreach ($categories as $category)
		{
			$category->treename = JString::str_ireplace('&#160;&#160;', '- ', $category->treename);
			$category->treename = JString::str_ireplace('- ', ' ', $category->treename, 1);
			$options[] = JHTML::_('select.option', $category->id, $category->treename);
		}
		return $options;
	}

}
