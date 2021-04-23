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
	'ACP_IMGSLIDERS_TITLE'					=> 'Слайдеры изображений',
	'ACP_IMGSLIDERS_TITLE_EXPLAIN'			=> 'Настройки',
	//
	'ACP_IMSLIDERS_CLASS'					=> 'Выбор слайдера',
	'ACP_IMGSLIDERS_MIN_SIZE'				=> 'Минимальный размер',
	'ACP_IMGSLIDERS_MIN_SIZE_EXPLAIN'		=> 'Изображения меньше указанного размера не будут отображаться в слайдере.',
	'ACP_IMGSLIDERS_MAX_SIZE'				=> 'Максимальный размер',
	'ACP_IMGSLIDERS_MAX_SIZE_EXPLAIN'		=> 'Изображения больше указанного размера (по любому из параметров ширина/высота) будут уменьшаться до него. Для отключения уменьшения введите 0.',
	//
	'ACP_IMGSLIDERS_FANCYBOX'				=> 'Fancybox',
	'ACP_IMGSLIDERS_PHOTOSWIPE'				=> 'PhotoSwipe',
]);
