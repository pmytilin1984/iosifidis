<?php
/**
 * @version     1.0.2
 * @package     nuModusVersus
 * @author      Nuevvo - http://nuevvo.com
 * @copyright   Copyright (c) 2010 - 2013 Nuevvo Webware Ltd. All rights reserved.
 * @license     http://nuevvo.com/license
 */

// no direct access
defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
?>

<div id="joomlaContainer" class="itemListArchiveView<?php echo $this->pageclass_sfx; ?>">

	<?php if ($this->params->get('show_page_heading', 1)): ?>
	<!-- Page Title -->
	<div class="componentheading<?php echo $this->pageclass_sfx; ?>">
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</div>
	<?php endif; ?>

	<form id="adminForm" action="<?php echo JRoute::_('index.php'); ?>" method="post">
		<!-- Filters  -->
		<fieldset class="catItemFilters">
			<div class="catItemFilterSearch">
				<legend class="catItemHideLabelTxt"><?php echo JText::_('JGLOBAL_FILTER_LABEL'); ?></legend>
				<?php if ($this->params->get('filter_field')!='hide'): ?>
					<label class="filter-search-lbl" for="filter-search"><?php echo JText::_('COM_CONTENT_'.$this->params->get('filter_field').'_FILTER_LABEL').'&#160;'; ?></label>
					<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->filter); ?>" class="inputbox" onchange="document.getElementById('adminForm').submit();" />
				<?php endif; ?>

				<?php echo $this->form->monthField; ?>
				<?php echo $this->form->yearField; ?>
				<?php echo $this->form->limitField; ?>
				<button type="submit" class="button"><?php echo JText::_('JGLOBAL_FILTER_BUTTON'); ?></button>
			</div>

			<input type="hidden" name="view" value="archive" />
			<input type="hidden" name="option" value="com_content" />
			<input type="hidden" name="limitstart" value="0" />
		</fieldset>
		<!-- END of filters -->

		<div class="itemList">

			<?php if (!empty($this->items)): ?>
			<!-- List of archived articles -->
			<div id="itemListArchive">
				<?php foreach ($this->items as $i=>&$item): ?>
				<?php
					// Define a CSS class for the last container of the list
					if (count($this->items)==($i+1)) {
						$lastItemList= ' itemContainerLast';
					} else {
						$lastItemList='';
					}
				?>

				<div class="itemContainer<?php echo $lastItemList; ?>">
					<?php
						$this->item=&$item;
						echo $this->loadTemplate('items');
					?>
				</div>
				<?php endforeach; ?>
			<div class="clr"></div>
			</div>
			<!-- END of list -->
			<?php endif; ?>

		</div>
	</form>

	<?php if(count($this->pagination->getPagesLinks())>1): ?>
	<!-- Joomla Pagination -->
	<div class="joomlaPagination">
		<?php echo $this->pagination->getPagesLinks(); ?>		
		<?php echo $this->pagination->getPagesCounter(); ?>		
	 <div class="clr"></div>
	</div>
	<?php endif; ?>

</div>