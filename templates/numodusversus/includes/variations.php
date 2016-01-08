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


/* -------------------- Load additional Google Web Fonts per language [CAN EDIT] -------------------- */
/*
switch($language->getTag()){
  case 'el-GR';
    $document->addStyleSheet('//fonts.googleapis.com/css?family=X|Y|Z');
    break;
  case 'vi-VN';
    $document->addStyleSheet('//fonts.googleapis.com/css?family=X|Y|Z');
    break;
  case 'km-KH';
    $document->addStyleSheet('//fonts.googleapis.com/css?family=X|Y|Z');
    break;
}
*/

/* -------------------- Content Hightlights [CAN EDIT] -------------------- */
if($this->params->get('contentHighlights')){
	$highlights = $this->params->get('contentHighlights');
	
	// Set the icon font
	if($highlights->font){
		$font = $highlights->font;
		$document->addScriptDeclaration('
			WebFontConfig = {
				custom: {
					families: [\''.$font.'\'],
					urls: [\'//cdn.nuevvo.net/webfonts/'.$font.'/css/fontello.css\']
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
			<link rel="stylesheet" href="//cdn.nuevvo.net/webfonts/'.$font.'/css/fontello-ie7.css">
			<![endif]-->
		');
	}
	
	// Set the rest of the output
	if(is_array($highlights)){
		foreach($highlights as $highlight){
			// Do something with each highlight object/array returned
		}
	} else {
		// We probably have 1 highlight set so let's loop through its object/array
	}
}



/* -------------------- Content Variations [CAN EDIT] -------------------- */
if($this->params->get('contentVariations', 'default')){
	// Do something with the specific content (site) variation
}


/* -------------------- Color Variations [CAN EDIT] -------------------- */
if($this->params->get('colorVariations', 'default') && $this->params->get('colorVariations')!='default'){
	ob_start();
	include(JPATH_SITE.'/templates/'.$this->template.'/css/colorvariations.css');
	$colorVariations = ob_get_clean(); 
	if(strpos($this->params->get('colorVariations'),'|')!==false && $this->params->get('colorVariations')!='custom'){
		$colors = explode('|', $this->params->get('colorVariations'));
		foreach($colors as $key=>$color){
			if($key==0){
				$colorVariations = str_replace('_IMAGEFOLDER_', $color, $colorVariations);
			} else {
			  $colorsInRGB = hex2rgb($color);
        $colorVariations = str_replace('_COLOR'.$key.'_RGB_', $colorsInRGB, $colorVariations);
				$colorVariations = str_replace('_COLOR'.$key.'_', $color, $colorVariations);        
			}
		}
	} else {
	  $colorsInRGB_1 =  hex2rgb($this->params->get('_COLOR1_'));
    $colorsInRGB_2 =  hex2rgb($this->params->get('_COLOR2_'));    
		$colorVariations = str_replace('_IMAGEFOLDER_', 'default', $colorVariations);
    $colorVariations = str_replace('_COLOR1_RGB_', $colorsInRGB_1, $colorVariations);
		$colorVariations = str_replace('_COLOR1_', $this->params->get('_COLOR1_'), $colorVariations);
    $colorVariations = str_replace('_COLOR2_RGB_', $colorsInRGB_2, $colorVariations);
		$colorVariations = str_replace('_COLOR2_', $this->params->get('_COLOR2_'), $colorVariations);		
	}
	if(strlen($colorVariations)>10){
		$colorVariations = str_replace('_TEMPLATEPATH_', $templatePath, $colorVariations);
		$document->addStyleDeclaration($colorVariations);
	}
}

/* -------------------- Category Colors [CAN EDIT] -------------------- */
if($this->params->get('categoryColors')){
	$categoryColors = $this->params->get('categoryColors');
	if(is_array($categoryColors)){
		foreach($categoryColors as $categoryColor){
			// Do something with each category color array returned
			// Type: $categoryColor['type'], 'joomla' or 'k2'
			// Category: $categoryColor['category'], The id of the category
			// Color: $categoryColor['category'], The color value
		}
	}
}


/* -------------------- Sub-templates [CAN EDIT] -------------------- */
/* component.php */
if($tmpl=='component'){
  // do stuff here for the component sub-template
}

/* raw.php */
if($tmpl=='raw'){
  // do stuff here for the raw sub-template
}


/* -------------------- Custom Template Logic [CAN EDIT] -------------------- */
// Get pageSuffix in the body
$active = $menu->getActive();
if ($active) {
  $pageHeading = $active->params->get('page_heading');
  $pageSuffix = $active->params->get('pageclass_sfx');
}

if ($pageSuffix)
  $bodyClass .= " ".$pageSuffix;


