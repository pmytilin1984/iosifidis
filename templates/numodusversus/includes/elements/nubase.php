<?php
/**
 * @version     1.0.1 (May 8th, 2013)
 * @package     Akhtarma
 * @author      Nuevvo - http://nuevvo.com
 * @copyright   Copyright (c) 2010 - 2013 Nuevvo Webware Ltd. All rights reserved.
 * @license     http://nuevvo.com/license
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class JFormFieldNuBase extends JFormField {

	var $type = 'NuBase';

	function getInput() {
		$template = $this->form->getValue('template');
		$document = JFactory::getDocument();
		$document->addStyleSheet(JURI::root(true).'/templates/'.$template.'/includes/elements/assets/css/style.css');
		if (version_compare(JVERSION, '3.0', 'ge')) {
			JHtml::_('jquery.framework');
		} else {
			$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js');
		}
		$document->addScript('//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js');
		$document->addScript(JURI::root(true).'/templates/'.$template.'/includes/elements/assets/js/behaviour.js');
	/*	$document->addScriptDeclaration('
			WebFontConfig = {
				custom: {
					families: [\'entypoftp\'],
					urls: [\'//cdn.nuevvo.net/webfonts/entypoftp/css/fontello.css\']
				}
			};
			(function() {
				var wf = document.createElement(\'script\');
				wf.src = (\'https:\' == document.location.protocol ? \'https\' : \'http\') + \'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js\';
				wf.type = \'text/javascript\';
				wf.async = \'true\';
				var s = document.getElementsByTagName(\'script\')[0];
				s.parentNode.insertBefore(wf, s);
			})();
		');
		$document->addCustomTag('
			<!--[if IE 7]>
			<link rel="stylesheet" href="//cdn.nuevvo.net/webfonts/entypoftp/css/fontello-ie7.css">
			<![endif]-->
		');
		*/
		ob_start();
		include dirname(__FILE__).'/tmpl/settings.php';
		$contents = ob_get_clean();
		$this->form->removeGroup('params');
		return $contents;
	}

	function getLabel() {
		return null;
	}

}
