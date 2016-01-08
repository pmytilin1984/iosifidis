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

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

?>
<div id="joomlaContainer" class="itemListView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">
  
<?php if ($this->params->get('show_page_heading')) : ?>
<div class="componentheading">
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</div>
<?php endif; ?>

<div class="itemListCategoriesBlock<?php echo $this->pageclass_sfx;?>">
    <?php if ($this->params->get('show_base_description')) : ?>
      <div class="itemListCategory">    
    	<?php //If there is a description in the menu parameters use that; ?>
    		<?php if($this->params->get('categories_description')) : ?>
    			<div class="categoryDesc">
    			 <?php echo JHtml::_('content.prepare', $this->params->get('categories_description'), '', 'com_content.categories'); ?>
    			</div>
    		<?php else: ?>
    			<?php //Otherwise get one from the database if it exists. ?>
    			<?php if ($this->parent->description) : ?>
    				<div class="categoryDesc">
    					<?php  echo JHtml::_('content.prepare', $this->parent->description, '', 'com_content.categories'); ?>
    				</div>
    			<?php endif; ?>
    		<?php endif; ?>
    	</div>
    	<?php endif; ?>
    
    <?php echo $this->loadTemplate('items'); ?>
    <div class="clr"></div>
  </div>
</div>
