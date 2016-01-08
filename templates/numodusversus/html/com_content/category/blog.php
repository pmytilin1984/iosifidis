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
		
		
  <div class="itemListCategoriesBlock">		
  	<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1) || $this->params->get('show_category_title', 1) || $this->params->get('page_subheading')) : ?>
  		<div class="itemListCategory">
  			
  			<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
          <img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
        <?php endif; ?>
  			
  			<?php if ($this->params->get('show_category_title', 1) || $this->params->get('page_subheading')) : ?>
  			<h2>				
  				<?php if ($this->params->get('show_category_title')) : ?>
  					<?php echo $this->category->title;?>
  				<?php endif; ?>
  				<span class="subheading"><?php echo $this->escape($this->params->get('page_subheading')); ?></span>
  			</h2>
  			<?php endif; ?>	
  		
        <?php if ($this->params->get('show_description') && $this->category->description) : ?>
          <div class="categoryDesc"><?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?></div>
        <?php endif; ?>
        
      <div class="clr"></div>
          
      <?php if (version_compare(JVERSION, '3.1', 'ge')): /* Show Tags (through the Tags field) if Joomla! 3.1 */?>     
        <?php if ($this->params->get('show_tags', 1) && !empty($this->category->tags->itemTags)) : $this->category->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
          <div class="liItemTagsBlock tagsBlockJ31">
            <span><i class="icon-tags"></i><?php //echo JText::_('COM_CONTENT_TAGS'); ?></span>       
            <?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
            <div class="clr"></div>
          </div>          
        <?php endif; ?>
      <?php endif; ?>      
      </div>
    <?php endif; ?>
    
    <!-- Subcategories -->
    <?php if (!empty($this->children[$this->category->id])&& $this->maxLevel != 0) : ?>      
      <?php echo $this->loadTemplate('children'); ?>      
    <?php endif; ?> 
    <div class="clr"></div>  
  </div>
	
	<div class="itemList">
	
	<?php $leadingcount=0 ; ?>
	<?php if (!empty($this->lead_items)) : ?>
	<div id="itemListLeading">
		<?php foreach ($this->lead_items as &$item) : ?>
			<div class="itemContainer">
				<?php
					$this->item = &$item;
					echo $this->loadTemplate('item');
				?>
			</div>
			<?php $leadingcount++; ?>
		<?php endforeach; ?>
		<div class="clr"></div>
	</div>
	<?php endif; ?>
	
	
	<?php	$counter=0; ?>
	<?php if (!empty($this->intro_items)) : ?>		  
	<div id="itemListPrimary">
		<?php foreach ($this->intro_items as $key=>&$item) : ?>		  
		   <?php
      // Define a CSS class for the last container on each row
      if( (($key+1)%($this->columns)==0) || count($this->intro_items)<$this->columns)
        $lastContainer= ' itemContainerLast';
      else
        $lastContainer='';
      
      if ($this->columns==3 || $this->columns==4)
        $changeMargins= ' newMargins';
      else 
        $changeMargins= '';       
      ?>   		    		
          
		<div class="itemContainer<?php echo $lastContainer.$changeMargins; ?>"<?php echo (count($this->intro_items)==1) ? '' : ' style="width:'.number_format(100/$this->columns, 1).'%;"'; ?>>
		<?php
				$this->item = &$item;
				echo $this->loadTemplate('item_grid');
			?>
		</div>
		<?php if(($key+1)%($this->columns)==0): ?>
      <div class="clr"></div>
    <?php endif; ?>
		<?php $counter++; ?>	
		<?php endforeach; ?>
		<div class="clr"></div>
	</div>
	<?php endif; ?>	
	
	<?php if(!empty($this->link_items)): ?>
	  <div id="itemListLinks">
		  <?php echo $this->loadTemplate('links'); ?>
		  <div class="clr"></div>
    </div>
	<?php endif; ?>	
		
	</div>
	
	<?php if (($this->params->def('show_pagination', 1) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
	<div class="joomlaPagination">			
		<?php echo $this->pagination->getPagesLinks(); ?>
		<?php if ($this->params->def('show_pagination_results', 1)) : ?>    
      <?php echo $this->pagination->getPagesCounter(); ?> 
    <?php endif; ?> 
	</div>
	<?php endif; ?>

</div>	
