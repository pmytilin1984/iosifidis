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
// Create a shortcut for params.
$params = &$this->item->params;
$images = json_decode($this->item->images);
$canEdit	= $this->item->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');

?>

<div class="liBlock catItemArchiveView<?php echo ' '.$this->pageclass_sfx; ?><?php if($this->item->state==0) echo ' system-unpublished'; ?>">
  
		<div class="liItemHeader">
		  
		  <?php if ($params->get('show_title')): ?>
      <!-- Article Title -->
      <h3 class="liItemTitle catItemTitle">
        <?php if ($params->get('link_titles') && $params->get('access-view')): ?>
          <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>">
            <?php echo $this->item->title; //echo $this->escape($this->item->title); ?>
          </a>
        <?php else: ?>
          <?php echo $this->escape($this->item->title); ?>
        <?php endif; ?>
      </h3>
      <?php endif; ?>
      
			<?php if ($params->get('show_create_date')): ?>
			<!-- Created Date -->
			<span class="liItemDateCreated">
				<?php echo JText::sprintf(JHtml::_('date', $this->item->created, 'd F Y')); ?>
			</span>
			<?php endif; ?>
			
			<?php if ($params->get('show_author') && !empty($this->item->author)): ?>
			<!-- Article Author -->
			<span class="liItemAuthor">
				<?php $author=$this->item->author; ?>
				<?php $author=($this->item->created_by_alias ? $this->item->created_by_alias: $author); ?>
					<?php if (!empty($this->item->contactid ) && $params->get('link_author')==true): ?>
						<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link',JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid), $author)); ?>
					<?php else: ?>
						<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
					<?php endif; ?>
			</span>
			<?php endif; ?>
	
			<?php if ($params->get('show_parent_category') && $this->item->parent_id!=1): ?>
			<!-- Article Parent Category -->
			<div class="liItemCategory">
				<?php if ($params->get('link_parent_category')): ?>
				<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_id)); ?>"><?php echo $this->escape($this->item->parent_title); ?></a>
				<?php else: ?>
				<?php echo $this->escape($this->item->parent_title); ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
	
			<?php if ($params->get('show_category')): ?>
			<!-- Article Category -->
			<div class="liItemCategory">
				<?php if ($params->get('link_category')): ?>
				<?php echo JText::_('NU_IN'); ?>
				<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catid)); ?>"><?php echo $this->escape($this->item->category_title); ?></a>
				<?php else: ?>
				<?php echo $this->escape($this->item->category_title); ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			
		</div>
		
		<div class="liItemBody">
		  		  
		  <?php if (!$params->get('show_intro')): ?>      
        <?php echo $this->item->event->afterDisplayTitle; ?>    
      <?php endif; ?>
		
  		<?php if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
      <div class="liItemImageBlock genericItemImageBlock">
        <span class="liItemImage">
          <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>">
            <img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
          </a>
        </span>
      </div>
      <?php endif; ?>
      
			<!-- Introtext --> 
      <?php if ($params->get('show_intro')): ?>  
      <div class="liItemIntroText">        
        <?php echo $this->item->introtext; ?>             
       <div class="clr"></div>
      </div> 
      <?php endif; ?>   
			
			<?php if ($params->get('show_readmore') && $this->item->readmore): ?>
			<!-- Read More -->
			<?php	$link=JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>
			<div class="liItemReadMore">
				<a class="joomlaReadMore" href="<?php echo $link; ?>">
					<?php echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE'); ?>
					<i class="icon-arrow-right"></i>
				</a>
			</div>
			<?php endif; ?>		
			<div class="clr"></div>
	 </div>			
			
		<?php if ($params->get('show_hits')): ?>
		<!-- Article Hits -->
		<div class="liItemHitsBlock">
			<span class="liItemHits">
			  <i class="icon-eye-open"></i>
				<?php echo JText::sprintf($this->item->hits); ?>					
			</span>
		</div>
		<?php endif; ?>					

		<?php if ($params->get('show_publish_date')): ?>
		<!-- Article Published Date -->
		<span class="liItemDatePublished">
			<?php echo JText::sprintf(JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC2'))); ?>
		</span>
		<?php endif; ?>

		<?php if ($params->get('show_modify_date')): ?>
		<!-- Article Modified Date -->
		<span class="liItemDateModified">
			<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
		</span>
		<?php endif; ?>	
		
<div class="clr"></div>
</div>
