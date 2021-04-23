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
	'IMGSLIDERS_LANG'			=> 'ru',
	'IMGSLIDERS_CLOSE'			=> 'Закрыть',
	'IMGSLIDERS_NEXT'			=> 'Вперед',
	'IMGSLIDERS_PREV'			=> 'Назад',
	'IMGSLIDERS_ERROR'			=> 'Запрашиваемый контент не может быть загружен. <br/> Пожалуйста, попробуйте позже.',
	'IMGSLIDERS_PLAY_START'		=> 'Начать слайдшоу',
	'IMGSLIDERS_PLAY_STOP'		=> 'Пауза',
	'IMGSLIDERS_FULL_SCREEN'	=> 'На весь экран',
	'IMGSLIDERS_THUMBS'			=> 'Миниатюры',
	'IMGSLIDERS_DOWNLOAD'		=> 'Скачать',
	'IMGSLIDERS_SHARE'			=> 'Поделиться',
	'IMGSLIDERS_ZOOM'			=> 'Увеличить'
]);
