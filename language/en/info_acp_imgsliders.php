<?php
/**
 *
 * @package       Imgsliders
 * @copyright (c) 2021 Татьяна5
 * @license       http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [
	'ACP_IMGSLIDERS_TITLE'					=> 'Image sliders',
	'ACP_IMGSLIDERS_TITLE_EXPLAIN'			=> 'Settings',
	//
	'ACP_IMSLIDERS_CLASS'					=> 'Change slider',
	'ACP_IMGSLIDERS_MIN_SIZE'				=> 'Minimum size',
	'ACP_IMGSLIDERS_MIN_SIZE_EXPLAIN'		=> 'Images smaller than the specified size will not be displayed in the slider.',
	'ACP_IMGSLIDERS_MAX_SIZE'				=> 'Maximum size',
	'ACP_IMGSLIDERS_MAX_SIZE_EXPLAIN'		=> 'Images larger than the specified size (according to any of the width / height parameters) will be resize to it. Enter 0 to disable resize.',
	//
	'ACP_IMGSLIDERS_FANCYBOX'				=> 'Fancybox',
	'ACP_IMGSLIDERS_PHOTOSWIPE'				=> 'PhotoSwipe',
]);
