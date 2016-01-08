<?php
/**
 * @version     1.0.1 (July 19th, 2013)
 * @package     Akhtarma
 * @author      Nuevvo - http://nuevvo.com
 * @copyright   Copyright (c) 2010 - 2013 Nuevvo Webware Ltd. All rights reserved.
 * @license     http://nuevvo.com/license
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

if(version_compare(JVERSION, '3.0', 'ge')!==false){
	$containerClass = "isJoomla3x";
} else {
	$containerClass = "isJoomla25";
}

?>

<div id="nuTemplateSettingsContainer" class="<?php echo $containerClass; ?>">

	<div class="nuSettingsTitle">
		<i></i>
		<a class="nuHelpLink" href="http://nuevvo.com/members" title="<?php echo JText::_('TPL_NU_BE_HELP_TIP'); ?>" target="_blank"></a>
		<span><?php echo JText::_('TPL_NU_BE_TEMPLATE_PARAMS'); ?></span>
		<div class="nuClear"></div>
	</div>

	<!-- the tabs -->
  <ul id="nuParamsTabs">
    <li><a href="#!/standard"><?php echo JText::_('TPL_NU_BE_PARAMS_STANDARD'); ?></a></li>
    <li><a href="#!/code-blocks"><?php echo JText::_('TPL_NU_BE_PARAMS_CODE_BLOCKS'); ?></a></li>
    <li><a href="#!/template-specific"><?php echo JText::_('TPL_NU_BE_PARAMS_TEMPLATE_SPECIFIC'); ?></a></li>
  </ul>

  <!-- tab "panes" -->
  <div id="nuParamsPanes">
    <div class="nuParamsPane">
			<table id="nuParamsStandard" class="nuTmplParams" cellpadding="0" cellspacing="0">
				<tbody>
					<?php foreach($this->form->getFieldset('nuParamsStandard') as $field): ?>
					<?php
						$label = $field->getLabel();
						$input = $field->getInput();
						$class = (JString::strtolower($field->type) == 'nutextarea') ? $field->getClass() : '';
					?>
					<?php if($input || $label): ?>
					<?php if(JString::strtolower($field->type) == 'nuheader'): ?>
					<tr class="nuHeaderRow">
						<?php if($label):?>
						<td class="nuHeader" colspan="2"><?php echo $label; ?></td>
						<?php endif; ?>
					</tr>
					<?php else: ?>
					<tr class="<?php echo $class; ?>">
						<?php if($label):?>
						<td class="nuLabel" colspan="<?php echo $input && $label ? '1' : '2'; ?>"><?php echo $label; ?></td>
						<?php endif; ?>
						<?php if($input):?>
						<td class="nuField" colspan="<?php echo $input && $label ? '1' : '2'; ?>"><?php echo $input; ?></td>
						<?php endif; ?>
					</tr>
					<?php endif; ?>
					<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
    </div>
    <div class="nuParamsPane">
			<table id="nuParamsCodeBlocks" class="nuTmplParams" cellpadding="0" cellspacing="0">
				<tbody>
					<?php foreach($this->form->getFieldset('nuParamsCodeBlocks') as $field): ?>
					<?php
						$label = $field->getLabel();
						$input = $field->getInput();
						$class = (JString::strtolower($field->type) == 'nutextarea') ? $field->getClass() : '';
					?>
					<?php if($input || $label): ?>
					<?php if(JString::strtolower($field->type) == 'nuheader'): ?>
					<?php if($label):?>
					<tr class="nuHeaderRow">
						<td class="nuHeader"><?php echo $label; ?></td>
					</tr>
					<?php endif; ?>
					<?php else: ?>
					<tr class="<?php echo $class; ?>">
						<td class="nuCodeBlock">
							<?php if($label):?>
							<?php echo $label; ?>
							<?php endif; ?>
							<?php if($input):?>
							<?php echo $input; ?>
							<?php endif; ?>
						</td>
					</tr>
					<?php endif; ?>
					<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
    </div>
    <div class="nuParamsPane">
			<table id="nuParamsTemplateSpecific" class="nuTmplParams" cellpadding="0" cellspacing="0">
				<tbody>
					<?php foreach($this->form->getFieldset('nuParamsTemplateSpecific') as $field): ?>
					<?php
						$label = $field->getLabel();
						$input = $field->getInput();
						$class = (JString::strtolower($field->type) == 'nutextarea') ? $field->getClass() : '';
					?>
					<?php if($input || $label): ?>
					<?php if(JString::strtolower($field->type) == 'nuheader'): ?>
					<tr class="nuHeaderRow">
						<?php if($label):?>
						<td class="nuHeader" colspan="2"><?php echo $label; ?></td>
						<?php endif; ?>
					</tr>
					<?php else: ?>
					<tr class="<?php echo $class; ?>">
						<?php if($label):?>
						<td class="nuLabel" colspan="<?php echo $input && $label ? '1' : '2'; ?>"><?php echo $label; ?></td>
						<?php endif; ?>
						<?php if($input):?>
						<td class="nuField" colspan="<?php echo $input && $label ? '1' : '2'; ?>"><?php echo $input; ?></td>
						<?php endif; ?>
					</tr>
					<?php endif; ?>
					<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
    </div>
  </div>
  <!-- nuImage Placeholder -->
	<a href="#" id="nuImagePreview"></a>
</div>
