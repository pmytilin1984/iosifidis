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

?>

<!-- Start K2 Item Layout -->
<div class="liBlock latestItemView">

	<!-- Plugins: BeforeDisplay -->
	<?php echo $this->item->event->BeforeDisplay; ?>

	<!-- K2 Plugins: K2BeforeDisplay -->
	<?php echo $this->item->event->K2BeforeDisplay; ?>

	<div class="liItemHeader latestItemHeader">
	  <?php if($this->item->params->get('latestItemTitle')): ?>
	  <!-- Item title -->
	  <h3 class="liItemTitle latestItemTitle">
	  	<?php if ($this->item->params->get('latestItemTitleLinked')): ?>
			<a href="<?php echo $this->item->link; ?>">
	  		<?php echo $this->item->title; ?>
	  	</a>
	  	<?php else: ?>
	  	<?php echo $this->item->title; ?>
	  	<?php endif; ?>
	  </h3>
	  <?php endif; ?>
	  
	  <?php if($this->item->params->get('latestItemDateCreated')): ?>
    <!-- Date created -->
    <span class="liItemDateCreated latestItemDateCreated">
      <?php echo JHTML::_('date', $this->item->created , 'd F Y'); ?>
    </span>
    <?php endif; ?>
    
    <?php if($this->item->params->get('latestItemCategory')): ?>
    <!-- Item category name -->
    <div class="liItemCategory latestItemCategory">
      <span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>
      <a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
    </div>
    <?php endif; ?>
    
    <?php if($this->item->params->get('latestItemCommentsAnchor') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
    <!-- Anchor link to comments below -->
    <div class="liItemCommentsLink latestItemCommentsLink">
      <i class="icon-comments"></i>
      <?php if(!empty($this->item->event->K2CommentsCounter)): ?>
        <!-- K2 Plugins: K2CommentsCounter -->
        <?php echo $this->item->event->K2CommentsCounter; ?>
      <?php else: ?>
        <?php if($this->item->numOfComments > 0): ?>
        <a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
          <?php echo $this->item->numOfComments; ?> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
        </a>
        <?php else: ?>
        <a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
          <?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
        </a>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <?php endif; ?>

    <?php if($this->item->params->get('latestItemTags') && count($this->item->tags)): ?>
    <!-- Item tags -->
    <div class="liItemTagsBlock latestItemTagsBlock">
      <span><i class="icon-tags"></i><?php //echo JText::_('K2_TAGGED_UNDER'); ?></span>
      <ul class="liItemTags latestItemTags">
        <?php foreach ($this->item->tags as $tagCounter=>$tag): ?>
        <li>
         <?php if (($tagCounter+1)==count($this->item->tags)): ?>  
            <a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a>
          <?php else: ?>
            <a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?>,</a>
          <?php endif; ?> 
        </li>   
        <?php endforeach; ?>
      </ul>
      <div class="clr"></div>
    </div>
    <?php endif; ?>  
    
    <div class="clr"></div>	  	  
  </div> 
	

  <!-- Plugins: AfterDisplayTitle -->
  <?php echo $this->item->event->AfterDisplayTitle; ?>

  <!-- K2 Plugins: K2AfterDisplayTitle -->
  <?php echo $this->item->event->K2AfterDisplayTitle; ?>

  <div class="liItemBody latestItemBody">

	  <!-- Plugins: BeforeDisplayContent -->
	  <?php echo $this->item->event->BeforeDisplayContent; ?>

	  <!-- K2 Plugins: K2BeforeDisplayContent -->
	  <?php echo $this->item->event->K2BeforeDisplayContent; ?>

	  <?php if($this->item->params->get('latestItemImage') && !empty($this->item->image)): ?>
	  <!-- Item Image -->
	  <div class="liItemImageBlock latestItemImageBlock">
		  <span class="liItemImage latestItemImage">
		    <a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
		    	<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px;height:auto;" />
		    </a>
		  </span>
		  <div class="clr"></div>
	  </div>
	  <?php endif; ?>

	  <?php if($this->item->params->get('latestItemIntroText')): ?>
	  <!-- Item introtext -->
	  <div class="liItemIntroText latestItemIntroText">
	  	<?php echo $this->item->introtext; ?>
	  </div>
	  <?php endif; ?>

		<div class="clr"></div>

	  <!-- Plugins: AfterDisplayContent -->
	  <?php echo $this->item->event->AfterDisplayContent; ?>

	  <!-- K2 Plugins: K2AfterDisplayContent -->
	  <?php echo $this->item->event->K2AfterDisplayContent; ?>

	  <div class="clr"></div>
  </div>  

  <?php if($this->params->get('latestItemVideo') && !empty($this->item->video)): ?>
  <!-- Item video -->
  <div class="liItemVideoBlock latestItemVideoBlock">
  	<h3><?php echo JText::_('K2_RELATED_VIDEO'); ?></h3>
	  <span class="latestItemVideo<?php if($this->item->videoType=='embedded'): ?> embedded<?php endif; ?>"><?php echo $this->item->video; ?></span>
  </div>
  <?php endif; ?>	

	<?php if ($this->item->params->get('latestItemReadMore')): ?>
	<!-- Item "read more..." link -->
	<div class="liItemReadMore latestItemReadMore">
		<a class="k2ReadMore" href="<?php echo $this->item->link; ?>">
			<?php echo JText::_('K2_READ_MORE'); ?>
			<i class="icon-arrow-right"></i>
		</a>
	</div>
	<?php endif; ?>

	<div class="clr"></div>

  <!-- Plugins: AfterDisplay -->
  <?php echo $this->item->event->AfterDisplay; ?>

  <!-- K2 Plugins: K2AfterDisplay -->
  <?php echo $this->item->event->K2AfterDisplay; ?>

	<div class="clr"></div>
</div>
<!-- End K2 Item Layout -->
