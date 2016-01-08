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
$class = ' subCategoryContainerFirst';
if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
?>
<div class="itemListSubCategories">
<?php foreach($this->items[$this->parent->id] as $id => $item) : ?>
	<?php
	if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
	if (!isset($this->items[$this->parent->id][$id + 1]))
	{
		$class = ' subCategoryContainerLast';
	}
	?>
	<div class="subCategoryContainer<?php echo $class; ?>">
	<?php $class = ''; ?>
  	<div class="subCategory">
  		<h2><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id));?>">
  			<?php echo $this->escape($item->title); ?>
  			<?php if ($this->params->get('show_cat_num_articles_cat') == 1): ?>      
          <?php //echo JText::_('COM_CONTENT_NUM_ITEMS'); ?>
          (<?php echo $item->numitems; ?>)      
        <?php endif; ?>
        </a>
  		</h2>
  		<?php if ($this->params->get('show_subcat_desc_cat') == 1): ?>
    		<?php if ($item->description): ?>
    			<div class="subCategoryDesc">
    				<?php echo JHtml::_('content.prepare', $item->description, '', 'com_content.categories'); ?>
    			</div>
    		<?php endif; ?>
      <?php endif; ?>     
  
  		<?php if (count($item->getChildren()) > 0) :
  			$this->items[$item->id] = $item->getChildren();
  			$this->parent = $item;
  			$this->maxLevelcat--;
  			echo $this->loadTemplate('items');
  			$this->parent = $item->getParent();
  			$this->maxLevelcat++;
  		endif; ?> 
  		</div>
	</div>	
<?php endif; ?>
<?php endforeach; ?>
<div class="clr"></div>
</div>
<?php endif; ?>
