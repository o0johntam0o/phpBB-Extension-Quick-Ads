<?php
/**
*
* Quick Ads extension for the phpBB Forum Software package [Rushian]
* Rushian translation by FomenkoAndrey
*
* @copyright (c) 2014 o0johntam0o
* @license GNU General Public License, version 2 (GPL-2.0)
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
	$lang = array();
}

$lang = array_merge($lang, array(
	'QUICK_ADS_TITLE'					=> 'Быстрые объявления',
	'QUICK_ADS_TITLE_SETTINGS1'			=> 'Общие настройки',
	'QUICK_ADS_TITLE_SETTINGS2'			=> 'Подробные настройки',
	
	'QUICK_ADS_ENABLE'					=> 'Включить быстрые объявления',
	'QUICK_ADS_ENABLE_EXPLAIN'			=> 'Если вы не включете эту опцию, вы не будете видеть объявления.',
	'QUICK_ADS_ALLOW_BOT'				=> 'Разрещить ботам',
	'QUICK_ADS_ALLOW_BOT_EXPLAIN'		=> 'Показывать объявления ботам.',
	'QUICK_ADS_CUSTOM_ID'				=> 'Custom ID',
	'QUICK_ADS_CUSTOM_ID_EXPLAIN'		=> 'Используйте только <em style="color:#ff0000">a-z</em>, <em style="color:#ff0000">0-9</em> и <em style="color:#ff0000">underline</em> (оставьте пустым, чтобы использовать значение по умолчанию). Например: my_custom_id_123.',
	'QUICK_ADS_ZINDEX'					=> 'Z-Index (Integer)',
	'QUICK_ADS_ZINDEX_EXPLAIN'			=> 'Размещение объявлений "перед" или "после" других элементов.',
	'QUICK_ADS_CLOSEBT'					=> 'Показывать кнопку Закрыть',
	'QUICK_ADS_CLOSEBT_EXPLAIN'			=> 'Включить, чтобы пользователи могли закрывать объявления.',
	'QUICK_ADS_COOKIE'					=> 'Включить cookie',
	'QUICK_ADS_COOKIE_EXPLAIN'			=> 'Включить, чтобы хранить статус объявлений.',
	'QUICK_ADS_COOKIE_TIME'				=> 'Время жизни cookie',
	'QUICK_ADS_COOKIE_TIME_EXPLAIN'		=> 'Определяет, как долго объявления будут скрыты (целое число, в минутах)',

	'QUICK_ADS_LEGEND'					=> '%s [%d]',
	'QUICK_ADS_ITEM_TOGGLE'				=> 'Нажмите, чтобы открыть',
	'QUICK_ADS_MORE_PROP'				=> '<em style="color:#0000ff">Расширенные настройки (нажмите, чтобы открыть)</em>',
	'QUICK_ADS_NAME'					=> 'Название объявления',
	'QUICK_ADS_NAME_EXPLAIN'			=> 'Rename this Ads',
	'QUICK_ADS_POS'						=> 'Положение',
	'QUICK_ADS_POS_EXPLAIN'				=> 'Установить место отображения объявления.<br/>Выберите "Отключить", чтобы не показывать объявление.',
	'QUICK_ADS_TOP'						=> 'Верх',
	'QUICK_ADS_LEFT'					=> 'Слева',
	'QUICK_ADS_BOTTOM'					=> 'Низ',
	'QUICK_ADS_RIGHT'					=> 'Справа',
	
	'QUICK_ADS_ONPAGE'					=> 'Показывать на страницах',
	'QUICK_ADS_ONPAGE_EXPLAIN'			=> 'На каких страницах будет показано объявление',
	'QUICK_ADS_ONPAGE_ITEM_FAQ'			=> 'Frequently asked questions (FAQ)',
	'QUICK_ADS_ONPAGE_ITEM_INDEX'		=> 'Index',
	'QUICK_ADS_ONPAGE_ITEM_MCP'			=> 'Moderator control panel (MCP)',
	'QUICK_ADS_ONPAGE_ITEM_MEMBERLIST'	=> 'Member list',
	'QUICK_ADS_ONPAGE_ITEM_POSTING'		=> 'Posting',
	'QUICK_ADS_ONPAGE_ITEM_REPORT'		=> 'Report',
	'QUICK_ADS_ONPAGE_ITEM_SEARCH'		=> 'Search',
	'QUICK_ADS_ONPAGE_ITEM_UCP'			=> 'User control panel (UCP)',
	'QUICK_ADS_ONPAGE_ITEM_VIEWFORUM'	=> 'View forum',
	'QUICK_ADS_ONPAGE_ITEM_VIEWONLINE'	=> 'View online',
	'QUICK_ADS_ONPAGE_ITEM_VIEWTOPIC'	=> 'View topic',
	// Custom pages
	// 'QUICK_ADS_ONPAGE_ITEM_YOUR_STUFF'	=> 'Your stuff',
	// Custom pages
	
	'QUICK_ADS_GROUP'					=> 'Права групп',
	'QUICK_ADS_GROUP_EXPLAIN'			=> 'Какие группы будут видеть объявление',
	'QUICK_ADS_HREF'					=> 'Ссылка',
	'QUICK_ADS_HREF_EXPLAIN'			=> 'Какая ссылка будет открываться при нажатии на объявление.',
	
	'QUICK_ADS_BG_IMG'					=> 'Фоновое изображение',
	'QUICK_ADS_BG_IMG_EXPLAIN'			=> 'Ссылка на изображение (www)',
	'QUICK_ADS_BG_COLOR'				=> 'Цвет фона',
	'QUICK_ADS_BG_COLOR_EXPLAIN'		=> 'Пример: #ffffff, #000000, white, black,...',
	
	'QUICK_ADS_TEXT'					=> 'Текст объявления',
	'QUICK_ADS_TEXT_EXPLAIN'			=> 'Код объявления (JS/HTML допускаются).
											<br/>Вы также можете использовать следующие переменные:
											<br/><em>{S_USERNAME}</em> = <em>%s</em>
											<br/><em>{S_USER_ID}</em> = <em>%s</em>
											<br/><em>{S_CURRENT_TIME}</em> = <em>%s</em>
											<br/><em>{SITE_URL}</em> = <em>%s</em>
											<br/><em>{FORUM_URL}</em> = <em>%s</em>
											<br/><em>{SITENAME}</em> = <em>%s</em>
											<br/><em>{SITE_DESCRIPTION}</em> = <em>%s</em>',
	'QUICK_ADS_SIZE'					=> 'Размеры (целое число)',
	'QUICK_ADS_SIZE_EXPLAIN'			=> 'Установите размеры этого объявления в пикселях (Ширина x Высота) pixel. Ноль (0) означает автоматические размеры.',
	'QUICK_ADS_MSIZE'					=> 'Минимальный размер (целое число)',
	'QUICK_ADS_MSIZE_EXPLAIN'			=> 'Установить минимальный размер окна браузера в пикселях для показа объявлений (Ширина x Высота)',
	'QUICK_ADS_OVERF'					=> 'Переполнение',
	'QUICK_ADS_OVERF_EXPLAIN'			=> 'Укажите, что произойдет, если контент блока выйдет за предустановленные границы.',
	'QUICK_ADS_OVERF_HIDDEN'			=> 'Скрыть',
	'QUICK_ADS_OVERF_VISIBLE'			=> 'Показать',
	'QUICK_ADS_OVERF_SCROLL'			=> 'Прокрутить',
	'QUICK_ADS_OVERF_AUTO'				=> 'Авто',
	'QUICK_ADS_PRIORITY'				=> 'Приоритет (целове число)',
	'QUICK_ADS_PRIORITY_EXPLAIN'		=> '<strong>Меньшее</strong> число, <strong>высокий</strong> приоритет.',

	'QUICK_ADS_NEW_ADS'					=> 'Новое объявление',
	'QUICK_ADS_NEW_ADS_NAME'			=> 'Введите название',
	'QUICK_ADS_DEL_FIELD'				=> 'Удалить это объявление',
	'QUICK_ADS_DEL_FIELD_EXPLAIN'		=> '<strong style="color:#ff0000">Важно: это действие не может быть отменено.</strong>',
	
	'QUICK_ADS_SAVED'					=> 'Настройки сохранены',
	'QUICK_ADS_LOG_MSG'					=> '<strong>Изменение настроек объявления</strong>',
));
