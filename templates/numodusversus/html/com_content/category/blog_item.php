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

// Create a shortcut for params.
$params = &$this->item->params;
$images = json_decode($this->item->images);
$canEdit = $this->item->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
$info = $this->item->params->get('info_block_position', 0);
JHtml::_('behavior.tooltip');
JHtml::_('behavior.framework');

?>

<div class="liBlock catItemView<?php echo ' '.$this->pageclass_sfx; ?><?php if($this->item->state==0) echo ' system-unpublished'; ?>">
	
	<?php if ($params->get('show_create_date')): ?>
  <!-- Created Date -->
  <div class="column small-1 liItemDateCreatedBlock">
    <span class="liItemDateCreated catItemDateCreated">
      <?php //echo JText::sprintf(JHtml::_('date', $this->item->created, 'd F Y')); ?>
      <?php echo JHTML::_('date', $this->item->created, 'M'); ?>
      <span><?php echo JHTML::_('date', $this->item->created, 'd'); ?></span>
    </span>
  </div>
  <?php endif; ?>
	
	<div class="column<?php if (!$params->get('show_create_date')) echo ' small-12'; else echo ' small-11'; ?> liItemBodyBlock">
	
	<div class="liItemHeader catItemHeader">
	  
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

    
    <?php if ($params->get('show_author') || $params->get('show_parent_category') || $params->get('show_category') || (version_compare(JVERSION, '3.1', 'ge') && ($this->params->get('show_tags', 1) && count($this->item->tags->itemTags)))): ?>
    <div class="liItemHeaderToolbar">
      
  		<?php if ($params->get('show_author') && !empty($this->item->author)): ?>
  		<!-- Article Author -->
  		<span class="liItemAuthor catItemAuthor">
  			<?php $author=$this->item->author; ?>
  			<?php $author=($this->item->created_by_alias ? $this->item->created_by_alias: $author); ?>
  				<?php if (!empty($this->item->contactid ) && $params->get('link_author')==true): ?>
  					<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link',JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid), $author)); ?>
  				<?php else: ?>
  					<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
  				<?php endif; ?>
  		</span>
  		<?php endif; ?>
  		
  		<?php if (version_compare(JVERSION, '3.0', 'ge')): ?>  
      <?php if ($params->get('show_parent_category') && !empty($this->item->parent_slug)): // Joomla 3.0 ?>
  		<!-- Article Parent Category -->
  		<div class="liItemCategory catItemCategory">
  			<?php if ($params->get('link_parent_category')): ?>
  			<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)); ?>"><?php echo $this->escape($this->item->parent_title); ?></a>
  			<?php else: ?>
  			<?php echo $this->escape($this->item->parent_title); ?>
  			<?php endif; ?>
  		</div>
  		<?php endif; ?>
  		
  		<?php if ($params->get('show_category')): ?>
  		<!-- Article Category -->
  		<div class="liItemCategory catItemCategory">
  			<?php if ($params->get('link_category')): ?>
  			<?php echo JText::_('NU_IN'); ?>
  			<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)); ?>"><?php echo $this->escape($this->item->category_title); ?></a>
  			<?php else: ?>
  			<?php echo $this->escape($this->item->category_title); ?>
  			<?php endif; ?>
  		</div>
  		<?php endif; ?>					
  					
  		<?php else: // Joomla 2.5 ?>
  		
  		<?php if ($params->get('show_parent_category') && $this->item->parent_id!=1): ?>
  		<!-- Article Parent Category -->
  		<div class="liItemCategory catItemCategory">
  			<?php if ($params->get('link_parent_category')): ?>
  			<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_id)); ?>"><?php echo $this->escape($this->item->parent_title); ?></a>
  			<?php else: ?>
  			<?php echo $this->escape($this->item->parent_title); ?>
  			<?php endif; ?>
  		</div>
  		<?php endif; ?>
  		
  		<?php if ($params->get('show_category')): ?>
  		<!-- Article Category -->
  		<div class="liItemCategory catItemCategory">
  			<?php if ($params->get('link_category')): ?>
  			<?php echo JText::_('NU_IN'); ?>
  			<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catid)); ?>"><?php echo $this->escape($this->item->category_title); ?></a>
  			<?php else: ?>
  			<?php echo $this->escape($this->item->category_title); ?>
  			<?php endif; ?>
  		</div>
  		<?php endif; ?>
  					
  		<?php endif; ?>
  				  		
  		<?php if (version_compare(JVERSION, '3.1', 'ge')): /* Show Tags (through the Tags field) if Joomla! 3.1 */?>
        <?php if ($this->params->get('show_tags', 1) && count($this->item->tags->itemTags)) : $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
          <div class="liItemTagsBlock catItemTagsBlock">
            <span><i class="icon-tags"></i><?php //echo JText::_('COM_CONTENT_TAGS'); ?></span> 
            <?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
          </div>  
        <?php endif; ?>
      <?php endif; ?>    
      <div class="clr"></div>  
    </div>
    <?php endif; ?>
    <div class="clr"></div>
	</div>
	
	<?php if ($params->get('show_vote')): ?>
	<!-- Rating -->
	 <div class="liItemRatingBlock catItemRatingBlock">
      <?php echo $this->item->event->beforeDisplayContent; ?> 
   </div>  
  <div class="clr"></div>
  <?php endif; ?>	
	
	<div class="liItemBody catItemBody">
	
		<?php if (!$params->get('show_intro')): ?>		
			<?php echo $this->item->event->afterDisplayTitle; ?>		
		<?php endif; ?>
	
		<?php if (isset($images->image_intro) && !empty($images->image_intro)): ?>
	  <?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
	  <div class="liItemImageBlock catItemImageBlock <?php echo htmlspecialchars($imgfloat); ?>">
	    <span class="liItemImage catItemImage">
		    <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>">
		      <img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
		    </a>
	    </span>
	  </div>
	  <?php endif; ?>
	    		  
	  <!-- Introtext -->	
	  <?php if ($params->get('show_intro')): ?>  
    <div class="liItemIntroText catItemIntroText">        
      <?php echo $this->item->introtext; ?>             
     <div class="clr"></div>
    </div> 
    <?php endif; ?>		
			
	<div class="clr"></div>
  </div>
    		
    <?php if ($params->get('show_hits')): ?>      
    <!-- Article Hits -->
    <div class="liItemLinks catItemLinks">
      <div class="liItemHitsBlock catItemHitsBlock">
        <span class="liItemHits">
          <i class="icon-eye-open"></i>
          <?php echo JText::sprintf($this->item->hits); ?>          
        </span>       
       </div>
     </div>
    <?php endif; ?>   		
    		
      
    <?php if ($params->get('show_readmore') && $this->item->readmore): ?>
    <!-- Read More -->
    <?php if ($params->get('access-view')):
          $link=JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
        else:
        $menu=JFactory::getApplication()->getMenu();
        $active=$menu->getActive();
        $itemId=$active->id;
        $link1=JRoute::_('index.php?option=com_users&view=login&Itemid='.$itemId);
        $returnURL=JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
        $link=new JURI($link1);
        $link->setVar('return', base64_encode($returnURL));
         endif;
      ?>
      <div class="liItemReadMore catItemReadMore">
        <a class="joomlaReadMore" href="<?php echo $link; ?>">
          <?php if (!$params->get('access-view')):
            echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
          elseif ($readmore=$this->item->alternative_readmore):
            echo $readmore;
            if ($params->get('show_readmore_title',0)!=0):
                echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
            endif;
          elseif ($params->get('show_readmore_title',0)==0):
            echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
          else:
            echo JText::_('COM_CONTENT_READ_MORE');
            echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
          endif; ?>
          <i class="icon-arrow-right"></i>
        </a>
      </div>
      <?php endif; ?>
									
			<?php if ($params->get('show_publish_date')): ?>
			<!-- Article Published Date -->
			<span class="liItemDatePublished catItemDatePublished">
				<?php echo JText::sprintf(JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC2'))); ?>
			</span>
			<?php endif; ?>

			<?php if ($params->get('show_modify_date')): ?>
			<!-- Article Modified Date -->
			<span class="liItemDateModified catItemDateModified">
				<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
			</span>
			<?php endif; ?>
	
			<div class="clr"></div>		
	
			<?php echo $this->item->event->afterDisplayContent; ?>
		</div>
		
		<div class="clr"></div>
  </div>