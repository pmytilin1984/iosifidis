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

<!-- Links Article Title -->
<?php foreach ($this->link_items as &$item): ?>
<div class="liBlock catItemView<?php echo $this->pageclass_sfx; ?>">
	<h3 class="liItemTitle catItemTitle">
		<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid)); ?>">
			<?php echo $item->title; ?>
		</a>
	</h3>
</div>
<?php endforeach; ?>
