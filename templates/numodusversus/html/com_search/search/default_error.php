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

<?php if($this->error): ?>
<div class="searchintro condensed">
			<?php echo $this->escape($this->error); ?>
</div>
<?php endif; ?>
