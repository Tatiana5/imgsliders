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
	'IMGSLIDERS_LANG'			=> 'en',
	'IMGSLIDERS_CLOSE'			=> 'Close',
	'IMGSLIDERS_NEXT'			=> 'Next',
	'IMGSLIDERS_PREV'			=> 'Previous',
	'IMGSLIDERS_ERROR'			=> 'The requested content cannot be loaded. <br/> Please try again later.',
	'IMGSLIDERS_PLAY_START'		=> 'Start slideshow',
	'IMGSLIDERS_PLAY_STOP'		=> 'Pause slideshow',
	'IMGSLIDERS_FULL_SCREEN'	=> 'Full screen',
	'IMGSLIDERS_THUMBS'			=> 'Thumbnails',
	'IMGSLIDERS_DOWNLOAD'		=> 'Download',
	'IMGSLIDERS_SHARE'			=> 'Share',
	'IMGSLIDERS_ZOOM'			=> 'Zoom'
]);
