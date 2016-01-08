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

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);
JHtml::_('behavior.caption');
?>

<div id="joomlaContainer" class="itemView<?php echo ' '.$this->pageclass_sfx; ?>">
	
	<div class="itemHeader">
	  
	 <div class="itemHeaderInner">		
		<?php if ($params->get('show_title')): ?>
    <!-- Article Title -->
    <h2 class="itemTitle">
      <?php if ($canEdit): ?>
      <!-- Edit Article Icon -->
      <span class="itemEditLink">
        <?php echo JHtml::_('icon.edit', $this->item, $params); ?>
      </span>
      <?php endif; ?>
        
      <?php if ($params->get('link_titles') && !empty($this->item->readmore_link)): ?>
        <a href="<?php echo $this->item->readmore_link; ?>">
        <?php echo $this->escape($this->item->title); ?></a>
      <?php else: ?>
        <?php echo $this->escape($this->item->title); ?>
      <?php endif; ?>
    </h2>
    <?php endif; ?>
		
		<?php if ($params->get('show_create_date') || $params->get('show_parent_category') || $params->get('show_category') || $params->get('show_author')): ?>
		<div class="itemHeaderToolbar">					
				
				<?php if ($params->get('show_create_date')): ?>				
				<!-- Article Created Date -->
				<span class="itemDateCreated">
					<?php echo JText::sprintf(JHtml::_('date', $this->item->created, 'd F Y')); ?>
				</span>				
				<?php endif; ?>
				
				<?php if ($params->get('show_author') && !empty($this->item->author)): ?>			
				<!-- Article Author -->
				<span class="itemAuthor">
					<?php $author = $this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author; ?>
					<?php if (!empty($this->item->contactid) && $params->get('link_author')==true): ?>
					<?php
						$needle = 'index.php?option=com_contact&view=contact&id='.$this->item->contactid;
						$item   = JSite::getMenu()->getItems('link', $needle, true);
						$cntlink= !empty($item) ? $needle.'&Itemid='.$item->id : $needle;
					?>
						<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', JRoute::_($cntlink), $author)); ?>
					<?php else: ?>
						<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
					<?php endif; ?>
				</span>			
				<?php endif; ?>
				
				
		    <?php if (version_compare(JVERSION, '3.0', 'ge')): ?>  
				   
          <?php if ($params->get('show_parent_category') && !empty($this->item->parent_slug)): ?>
          <!-- Article Parent Category -->
          <div class="itemCategory">
            <?php if ($params->get('link_parent_category') && !empty($this->item->parent_slug)) : ?>
            <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)); ?>"><?php echo $this->escape($this->item->parent_title); ?></a>
            <?php else: ?>
            <?php echo $this->escape($this->item->parent_title); ?>
            <?php endif; ?>
          </div>
          <?php endif; ?> 
      
        <?php else: ?>
      
          <?php if ($params->get('show_parent_category') && $this->item->parent_slug!='1:root'): ?>
          <!-- Article Parent Category -->
          <div class="itemCategory">
            <?php if ($params->get('link_parent_category') && $this->item->parent_slug): ?>
            <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)); ?>"><?php echo $this->escape($this->item->parent_title); ?></a>
            <?php else: ?>
            <?php echo $this->escape($this->item->parent_title); ?>
            <?php endif; ?>
          </div>
          <?php endif; ?>
      
        <?php endif; ?>
  
        <?php if ($params->get('show_category')): ?>
        <!-- Article Category -->
        <div class="itemCategory">
          <?php if ($params->get('link_category') && $this->item->catslug): ?>
          <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)); ?>"><?php echo $this->escape($this->item->category_title); ?></a>
          <?php else: ?>
          <?php echo $this->escape($this->item->category_title); ?>
          <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <?php if (version_compare(JVERSION, '3.1', 'ge')): /* Show Tags (through the Tags field) if Joomla! 3.1 */?>      
          <?php if ($params->get('show_tags', 1) && !empty($this->item->tags)): 
              $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
              <div class="itemTagsBlock articleTagsBlockJ31">
                <span><i class="icon-tags"></i><?php //echo JText::_('COM_CONTENT_TAGS'); ?></span> 
                <?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
              </div>             
          <?php endif; ?>        
        <?php endif; ?>
        <div class="clr"></div>				
      </div>
      <?php endif; ?>         
      </div>  
         
      <?php if (!$this->print): ?>
        <?php if ($params->get('show_print_icon') || $params->get('show_email_icon')): ?>
          <div class="small-6 floatRight itemToolbar">
            <ul>  
    				<?php if ($params->get('show_print_icon')): ?>
    				<!-- Print Icon -->
    				<li class="itemPrintLink">    					
    					<?php echo JHtml::_('icon.print_popup', $this->item, $params); ?>
    				</li>
    				<?php endif; ?>
    
    				<?php if ($params->get('show_email_icon')): ?>
    				<!-- Email Icon -->
    				<li class="itemEmailLink">    				  
    					<?php echo JHtml::_('icon.email', $this->item, $params); ?>
    				</li>
    				<?php endif; ?>	
  				  </ul>
          </div>
  			<?php endif; ?>			
  				
  		  <?php else: ?>
  		  <div class="small-6 floatRight itemToolbar">
          <ul> 
            <!-- Print Screen Icon -->
            <li class="itemPrintLink">              
              <?php echo JHtml::_('icon.print_screen', $this->item, $params); ?>
            </li>
          </ul>
        </div>
      <?php endif; ?> 
      
      <?php if ($params->get('show_vote')): ?>
      <div class="small-6 floatLeft itemRatingBlock">
        <!-- Rating -->
        <?php echo $this->item->event->beforeDisplayContent; ?>
      </div>  
      <?php endif; ?>
        
    <div class="clr"></div>
  </div>			

	<div class="clr"></div>
	
	<div class="itemBody">

		<?php if (isset($this->item->toc)): ?>
		<!-- Table of contents -->
		<div class="articleTOC">
			<?php echo $this->item->toc; ?>
		</div>
		<?php endif; ?>
		
		<?php if (!$params->get('show_intro')) echo $this->item->event->afterDisplayTitle; ?>

		<?php if ($params->get('access-view')): ?>		  
		  <?php if (isset($images->image_fulltext) && !empty($images->image_fulltext)) : ?>
      <?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
      <div class="itemImageBlock img-fulltext-<?php echo htmlspecialchars($imgfloat); ?>"> 
        <span class="itemImage">
          <img <?php if ($images->image_fulltext_caption) echo 'class="caption"'.' title="' .htmlspecialchars($images->image_fulltext_caption) . '"'; ?> src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"/>
        </span>
      <div class="clr"></div>
      </div>
      <?php endif; ?>		  
  		<!-- Article Full text -->
  		<div class="itemFullText">
  			<?php echo $this->item->text; ?>      
  		</div>
		<?php elseif ($params->get('show_noauth')==true && $user->get('guest')): ?>
  		<!-- Optional Intro text for guests -->
  		<div class="itemIntroText">
  			<?php echo $this->item->introtext; ?>
  		</div>
		<?php endif; ?>		
				
		<?php if($params->get('show_hits') || $params->get('show_publish_date') || $params->get('show_modify_date')): ?>
		<div class="itemContentFooter">
		  <?php if ($params->get('show_hits')): ?>
      <!-- Article Hits -->     
      <span class="itemHits">
        <i class="icon-eye-open"></i> <?php echo $this->item->hits; ?><?php //echo JText::sprintf('COM_CONTENT_ARTICLE_HITS'); ?>
      </span>     
      <?php endif; ?>
		  
			<?php if ($params->get('show_publish_date')): ?>
			<!-- Article Published Date -->
			<span class="itemDatePublished">
			  <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC2'))); ?>				
			</span>
			<?php endif; ?>
	
			<?php if ($params->get('show_modify_date')): ?>
			<!-- Article Modified Date -->
			<span class="itemDateModified">
				<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
			</span>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		
		<?php echo $this->item->event->afterDisplayContent; ?>
		<div class="clr"></div>
  </div>
		
	<div class="itemSocialAndNavigation">			
	<!-- Social sharing -->
	<div class="small-10 mobile-4 floatLeft itemSocialSharing">
		<!-- Twitter Button -->
		<div class="itemTwitterButton">
			<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal">
				<?php echo JText::_('TWEET'); ?>
			</a>
			<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
		</div>
		<!-- Facebook Button -->
		<div class="itemFacebookButton">
			<div id="fb-root"></div>
			<script type="text/javascript">
				(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script>
			<div class="fb-like" data-send="false" data-width="200" data-show-faces="true"></div>
		</div>
		<!-- Google +1 Button -->
		<div class="itemGooglePlusOneButton">
			<g:plusone annotation="inline" width="120"></g:plusone>
			<script type="text/javascript">
			  (function() {
			  	window.___gcfg = {lang: 'en'}; // Define button default language here
			    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			    po.src = 'https://apis.google.com/js/plusone.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
		</div>
		<div class="clr"></div>
	</div>

  <?php if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative): ?>
   <div class="small-2 mobile-4 floatRight itemNavigation">
     <?php echo $this->item->pagination; ?> 
   </div>
  <?php endif; ?>
  
  <div class="clr"></div>
  </div>
	
</div>	

