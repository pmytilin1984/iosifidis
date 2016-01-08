<?php
/**
 * @version     1.0.2
 * @package     nuModusVersus
 * @author      Nuevvo - http://nuevvo.com
 * @copyright   Copyright (c) 2010 - 2013 Nuevvo Webware Ltd. All rights reserved.
 * @license     http://nuevvo.com/license
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the sliders style, you would use the following include:
 * <jdoc:include type="module" name="test" style="slider" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

function modChrome_nu($module, &$params, &$attribs)
{
	if (!empty($module->content)): ?>
		<div class="module <?php echo $params->get('moduleclass_sfx'); ?>">
			<?php if ($module->showtitle): ?>
				<h3 class="moduleTitle"><?php echo $module->title; ?></h3>
			<?php endif; ?>
      <div class="moduleContent">
	     <?php echo $module->content; ?>
      </div>
		</div>
	<?php endif;
}

?>