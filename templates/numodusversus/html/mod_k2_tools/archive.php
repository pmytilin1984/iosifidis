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
<div id="k2ModuleBox<?php echo $module->id; ?>" class="modArchivesBlock k2ArchivesBlock<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">
  <ul>
    <?php foreach ($months as $month): ?>
    <li>
      <i class="icon-circle-arrow-right"></i>
      <a href="<?php echo $month->link; ?>">
        <span class="catTitle"><?php echo $month->name.' '.$month->y; ?></span>
        <span class="catCounter"><?php if ($params->get('archiveItemsCounter')) echo '('.$month->numOfItems.')'; ?></span>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
