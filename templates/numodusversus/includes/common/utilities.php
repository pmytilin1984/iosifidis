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

class NuTemplateUtilities {

	function nuText($str)
	{
		return str_replace("'","\\'",JText::_($str));
	}

	// Get remote file
	function getFile($url, $cacheTime = 86400)
	{
	
		jimport('joomla.filesystem.file');
	
		// Check cache folder
		$cacheFolderPath = dirname(__FILE__).'/cache';
		if (file_exists($cacheFolderPath) && is_dir($cacheFolderPath))
		{
			// all OK
		}
		else
		{
			mkdir($cacheFolderPath);
		}
	
		$url = trim($url);
	
		$tmpFile = $cacheFolderPath.'/gwf.json';
	
		// Check if a cached copy exists otherwise create it
		if (file_exists($tmpFile) && is_readable($tmpFile) && ((filemtime($tmpFile) + $cacheTime) > time() || $cacheTime == 0))
		{
			$result = $tmpFile;
		}
		else
		{
			// Get file
			if (substr($url, 0, 4) == "http")
			{
				// remote file
				if (ini_get('allow_url_fopen'))
				{
					// file_get_contents
					$fgcOutput = JFile::read($url);
					// cleanup the content received
					$fgcOutput = preg_replace("#(\n|\r|\s\s+|<!--(.*?)-->)#s", "", $fgcOutput);
					$fgcOutput = preg_replace("#(\t)#s", " ", $fgcOutput);
					JFile::write($tmpFile, $fgcOutput);
				}
				elseif (in_array('curl', get_loaded_extensions()))
				{
					// cURL
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_HEADER, false);
					curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					$chOutput = curl_exec($ch);
					curl_close($ch);
					JFile::write($tmpFile, $chOutput);
				}
				else
				{
					// fsockopen
					$readURL = parse_url($url);
					$relativePath = (isset($readURL['query'])) ? $readURL['path']."?".$readURL['query'] : $readURL['path'];
					$fp = fsockopen($readURL['host'], 80, $errno, $errstr, 5);
					if (!$fp)
					{
						JFile::write($tmpFile, '');
					}
					else
					{
						$out = "GET ".$relativePath." HTTP/1.1\r\n";
						$out .= "Host: ".$readURL['host']."\r\n";
						$out .= "Connection: Close\r\n\r\n";
						fwrite($fp, $out);
						$header = '';
						$body = '';
						do
						{
							$header .= fgets($fp, 128);
						}
						while (strpos($header,"\r\n\r\n")=== false); // get the header data
						while (!feof($fp))
							$body .= fgets($fp, 128);
						// get the actual content
						fclose($fp);
						JFile::write($tmpFile, $body);
					}
				}
				$result = $tmpFile;
			}
			else
			{
				// local file
				$result = $url;
			}
		}
		return $result;
	}
	
}
