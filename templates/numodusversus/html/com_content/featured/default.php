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
JHtml::_('behavior.caption');
?>

<div id="joomlaContainer" class="itemListView itemListFeaturedView<?php echo $this->pageclass_sfx; ?>">

	<?php if ($this->params->get('show_page_heading')) : ?>
  <div class="componentheading">
    <?php echo $this->escape($this->params->get('page_heading')); ?>
  </div>
  <?php endif; ?>

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


  <?php $counter=0; ?>
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
      <h4><?php echo JText::_('NU_MORE'); ?></h4>      
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
