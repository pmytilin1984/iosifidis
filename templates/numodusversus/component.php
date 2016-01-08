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
		<?php echo NU_HEAD_BOTTOM; ?>
	</head>
	<body id="<?php echo NU_BODY_ID; ?>" class="<?php echo NU_BODY_CLASS; ?>">
		<?php echo NU_BODY_TOP; ?>
		<jdoc:include type="message" />
		<jdoc:include type="component" />
		<?php echo NU_BODY_BOTTOM; ?>
	</body>
</html>
