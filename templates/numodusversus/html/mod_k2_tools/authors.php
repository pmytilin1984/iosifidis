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

<div id="k2ModuleBox<?php echo $module->id; ?>" class="modAuthorsListBlock k2AuthorsListBlock<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">
  <ul>
    <?php foreach ($authors as $author): ?>
    <li>
      <?php if ($params->get('authorAvatar')): ?>
      <a class="k2Avatar abAuthorAvatar" rel="author" href="<?php echo $author->link; ?>" title="<?php echo K2HelperUtilities::cleanHtml($author->name); ?>">
      	<img src="<?php echo $author->avatar; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($author->name); ?>" style="width:<?php echo $avatarWidth; ?>px;height:auto;" />
      </a>
      <?php endif; ?>

      <a class="abAuthorName" rel="author" href="<?php echo $author->link; ?>">
      	<?php echo $author->name; ?>

      	<?php if ($params->get('authorItemsCounter')): ?>
      	<span>(<?php echo $author->items; ?>)</span>
      	<?php endif; ?>
      </a>

      <?php if ($params->get('authorLatestItem')): ?>
      <div class="abAuthorLatestItem">
        <i class="icon-angle-right"></i>
        <a href="<?php echo $author->latest->link; ?>" title="<?php echo K2HelperUtilities::cleanHtml($author->latest->title); ?>">
        	<span><?php echo $author->latest->title; ?></span>
  	      <span class="abAuthorCommentsCount">
  	      	<i class="icon-comments"></i> <?php echo $author->latest->numOfComments; ?> <?php //if($author->latest->numOfComments=='1') echo JText::_('K2_MODK2TOOLS_COMMENT'); else echo JText::_('K2_MODK2TOOLS_COMMENTS'); ?>
  	      </span>
        </a>
      </div>
      <?php endif; ?>
      <div class="clr"></div>
    </li>
    <?php endforeach; ?>
    <li class="clearList"></li>
  </ul>
</div>
