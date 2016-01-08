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

require_once(dirname(__FILE__).'/includes/error.php');

?>
<!DOCTYPE html>
<!--[if lte IE 6]><html class="isIE6" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 7]><html class="isIE7" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 8]><html class="isIE8" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 9]><html class="isIE9" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if gt IE 9]><!--><html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" prefix="og: http://ogp.me/ns#"><!--<![endif]-->
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $this->error->getCode(); ?> | <?php echo $this->title; ?></title>
		<meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0" />
		<script type="text/javascript">
			var errorMessages = {
				siteName: '<?php echo $app->getCfg('sitename'); ?>',
				siteUrl: '<?php echo JURI::root(); ?>',
				baseUrl: '<?php echo $this->baseurl; ?>/',
				currentUrl: '<?php echo $url; ?>',
				resultsContainer: 'googleSearchResults',
				errorCode: '<?php echo $this->error->getCode(); ?>',
				errorMsg: '<?php echo $this->error->getMessage(); ?>',
				googleResultsTitle: '<?php echo nuText('TPL_NU_FE_GOOGLE_RESULTS_MSG'); ?>',
				formTitle: '<?php echo nuText('TPL_NU_FE_SEARCH_FORM_MSG'); ?>',
				formAction: '<?php echo JRoute::_('index.php'); ?>',
				formSubmit: '<?php echo nuText('TPL_NU_FE_SEARCH_FORM_SUBMIT'); ?>',
				returnTo: '<?php echo nuText('TPL_NU_FE_RETURN_MSG'); ?>',
				returnLinkTitle: '<?php echo nuText('TPL_NU_FE_RETURN_HOME_TITLE'); ?>',
				returnLinkText: '<?php echo nuText('TPL_NU_FE_RETURN_HOME'); ?>'
			}
		</script>
		<script type="text/javascript" src="<?php echo NU_CDN; ?>/templates/error.js"></script>
		<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
		<![endif]-->
	</head>
	<body class="errorWrapper">
		<div id="loadErrorPage"><?php echo JText::_('TPL_NU_FE_LOADING'); ?></div>
	</body>
</html>
