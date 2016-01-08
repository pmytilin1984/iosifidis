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

require_once(dirname(__FILE__).'/includes/helper.php');

?>
<!DOCTYPE html>
<!--[if lte IE 6]><html class="isIE6" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 7]><html class="isIE7" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 8]><html class="isIE8" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 9]><html class="isIE9" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if gt IE 9]><!--><html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" prefix="og: http://ogp.me/ns#"><!--<![endif]-->
	<head>
		<?php echo NU_HEAD_TOP; ?>
		<jdoc:include type="head" />
		<script type="text/javascript">
			var offlineMessages = {
				siteName: '<?php echo nuText($app->getCfg('sitename')); ?>',
				offlineMsg: '<?php echo (strlen(trim($app->getCfg('offline_message'))<5)) ? nuText('JOFFLINE_MESSAGE') : nuText($app->getCfg('offline_message')); ?>',
				offlineImg: '<?php echo ($app->getCfg('offline_image') ? JURI::root(false).$app->getCfg('offline_image') : NU_CDN.'/templates/images/nuevvo_345x90_24.png'); ?>',
				formAction: '<?php echo JRoute::_('index.php', true); ?>',
				formLabelUsername: '<?php echo nuText('JGLOBAL_USERNAME'); ?>',
				formLabelPassword: '<?php echo nuText('JGLOBAL_PASSWORD'); ?>',
				formInputRemember: '<?php echo nuText('JGLOBAL_REMEMBER_ME'); ?>',
				formSubmit: '<?php echo nuText('JLOGIN'); ?>',
				formReturn: '<?php echo base64_encode(JURI::base()); ?>',
				formToken: '<?php echo JSession::getFormToken(); ?>'
			}
		</script>
		<script type="text/javascript" src="<?php echo NU_CDN; ?>/templates/offline.js"></script>
		<?php echo NU_HEAD_BOTTOM; ?>
	</head>
	<body class="offlineWrapper">
		<?php echo NU_BODY_TOP; ?>
		<jdoc:include type="message" />
		<div id="loadOfflinePage"><?php echo JText::_('TPL_NU_FE_LOADING'); ?></div>
		<?php echo NU_BODY_BOTTOM; ?>
	</body>
</html>
