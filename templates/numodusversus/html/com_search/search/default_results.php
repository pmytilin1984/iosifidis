<?php
/**
 * @version     1.0.2
 * @package     BusinessOne
 * @author      Nuevvo - http://nuevvo.com
 * @copyright   Copyright (c) 2010 - 2013 Nuevvo Webware Ltd. All rights reserved.
 * @license     http://nuevvo.com/license
 */

// no direct access
defined('_JEXEC') or die;
?>

<dl class="search-results<?php echo $this->pageclass_sfx; ?>">
<?php foreach($this->results as $result) : ?>
	<dt class="result-title">
		<?php //echo $this->pagination->limitstart + $result->count.'. ';?>
		<?php if ($result->href) :?>
			<a href="<?php echo JRoute::_($result->href); ?>"<?php if ($result->browsernav == 1) :?> target="_blank"<?php endif;?>>
				<?php echo $this->escape($result->title);?>
			</a>
		<?php else:?>
			<?php echo $this->escape($result->title);?>
		<?php endif; ?>
	</dt>
	<dd class="result-text">
		<p><?php echo $result->text; ?></p>
		
		<?php if ($this->params->get('show_date')) : ?>
		<span class="result-created<?php echo $this->pageclass_sfx; ?>">
			<?php echo JText::sprintf('JGLOBAL_CREATED_DATE_ON', $result->created); ?>
		</span>
		<?php endif; ?>
		
		<?php if ($result->section) : ?>
		<span class="result-category <?php echo $this->pageclass_sfx; ?>">
			(<?php echo $this->escape($result->section); ?>)
		</span>
		<?php endif; ?>
	
	</dd>
<?php endforeach; ?>
</dl>

<?php if ($this->pagination->getPagesLinks()): ?>
<div class="joomlaPagination">
  <?php echo $this->pagination->getPagesLinks(); ?>
  <div class="pageCounter">
    <?php echo $this->pagination->getPagesCounter(); ?>
  </div>
  <div class="clr"></div>
</div>
<?php endif; ?>
