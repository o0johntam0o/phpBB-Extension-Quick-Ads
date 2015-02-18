<?php
/**
*
* Quick Ads extension for the phpBB Forum Software package [British English]
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
	'QUICK_ADS_TITLE'					=> 'System reklam',
	'QUICK_ADS_TITLE_SETTINGS1'			=> 'Ustawienia systemu',
	'QUICK_ADS_TITLE_SETTINGS2'			=> 'Ustawienia reklam',
	
	'QUICK_ADS_ENABLE'					=> 'Włącz reklamy:',
	'QUICK_ADS_ENABLE_EXPLAIN'			=> 'Jeżeli nie włączysz tej opcji, reklamy nie będą wyświetlane.',
	'QUICK_ADS_ALLOW_BOT'				=> 'Pokaż botom:',
	'QUICK_ADS_ALLOW_BOT_EXPLAIN'		=> 'Wyświetla reklamy botom.',
	'QUICK_ADS_CUSTOM_ID'				=> 'Własne ID:',
	'QUICK_ADS_CUSTOM_ID_EXPLAIN'		=> 'Używaj wyłącznie liter <em style="color:#ff0000">a-z</em>, cyfr <em style="color:#ff0000">0-9</em> oraz <em style="color:#ff0000">podkreślenia</em> w miejsce odstępu (Zostaw puste, by użyć domyślnej wartości). Przykład: my_custom_id_123',
	'QUICK_ADS_ZINDEX'					=> 'Z-Index (wartości całkowite):',
	'QUICK_ADS_ZINDEX_EXPLAIN'			=> 'Umieszczaj reklamy "za" lub "przed" innymi elementami.',
	'QUICK_ADS_CLOSEBT'					=> 'Pokaż przycisk zamykania:',
	'QUICK_ADS_CLOSEBT_EXPLAIN'			=> 'By użytkownik mógł zamykać wyświetlane reklamy.',
	'QUICK_ADS_COOKIE'					=> 'Włącz ciasteczka:',
	'QUICK_ADS_COOKIE_EXPLAIN'			=> 'Aby reklamy były wyświetlane poprawnie.',
	'QUICK_ADS_COOKIE_TIME'				=> 'Czas ciasteczek (wartości całkowite):',
	'QUICK_ADS_COOKIE_TIME_EXPLAIN'		=> 'Jak długo reklama będzie ukryta po jej zamknięciu (w minutach).',

	'QUICK_ADS_LEGEND'					=> '%s [%d]',
	'QUICK_ADS_ITEM_TOGGLE'				=> 'Kliknij by rozwinąć',
	'QUICK_ADS_MORE_PROP'				=> '<em style="color:#0000ff">Zaawansowane (kliknij by rozwinąć)</em>',
	'QUICK_ADS_NAME'					=> 'Nazwa reklamy:',
	'QUICK_ADS_NAME_EXPLAIN'			=> 'Możesz zmienić nazwę w dowolnej chwili.',
	'QUICK_ADS_POS'						=> 'Pozycja:',
	'QUICK_ADS_POS_EXPLAIN'				=> 'Ustaw pozycję reklamy.<br />Wybierz "Zablokuj" by wyłączyć wyświetlanie reklamy.',
	'QUICK_ADS_TOP'						=> 'reklama u góry',
	'QUICK_ADS_LEFT'					=> 'reklama po lewej',
	'QUICK_ADS_BOTTOM'					=> 'reklama na dole',
	'QUICK_ADS_RIGHT'					=> 'reklama po prawej',
	
	'QUICK_ADS_ONPAGE'					=> 'Pokaż reklamę na:',
	'QUICK_ADS_ONPAGE_EXPLAIN'			=> 'Na której stronie ma wyświetlać się reklama?',
	'QUICK_ADS_ONPAGE_ITEM_FAQ'			=> 'Najczęściej zadawane pytania (FAQ)',
	'QUICK_ADS_ONPAGE_ITEM_INDEX'		=> 'Główna',
	'QUICK_ADS_ONPAGE_ITEM_MCP'			=> 'Panel moderatora',
	'QUICK_ADS_ONPAGE_ITEM_MEMBERLIST'	=> 'Lista użytkowników',
	'QUICK_ADS_ONPAGE_ITEM_POSTING'		=> 'Pisanie postów',
	'QUICK_ADS_ONPAGE_ITEM_REPORT'		=> 'Raportowanie',
	'QUICK_ADS_ONPAGE_ITEM_SEARCH'		=> 'Wyszukiwarka',
	'QUICK_ADS_ONPAGE_ITEM_UCP'			=> 'Panel użytkownika',
	'QUICK_ADS_ONPAGE_ITEM_VIEWFORUM'	=> 'Podgląd forum',
	'QUICK_ADS_ONPAGE_ITEM_VIEWONLINE'	=> 'Podgląd online',
	'QUICK_ADS_ONPAGE_ITEM_VIEWTOPIC'	=> 'Podgląd tematu',
	// Custom pages
	// 'QUICK_ADS_ONPAGE_ITEM_YOUR_STUFF'	=> 'Your stuff',
	// Custom pages
	
	'QUICK_ADS_GROUP'					=> 'Pokaż reklamę grupom:',
	'QUICK_ADS_GROUP_EXPLAIN'			=> 'Której grupie ma wyświetlać się reklama?',
	'QUICK_ADS_HREF'					=> 'Link:',
	'QUICK_ADS_HREF_EXPLAIN'			=> 'Podaj link do strony, do której odeśle użytkownika po kliknięciu w reklamę.',
	
	'QUICK_ADS_BG_IMG'					=> 'Grafika w tle:',
	'QUICK_ADS_BG_IMG_EXPLAIN'			=> 'Link do obrazka (www).',
	'QUICK_ADS_BG_COLOR'				=> 'Kolor tła:',
	'QUICK_ADS_BG_COLOR_EXPLAIN'		=> 'Przykład: #ffffff, #000000, white, black,...',
	
	'QUICK_ADS_TEXT'					=> 'Treść reklamy',
	'QUICK_ADS_TEXT_EXPLAIN'			=> 'Treść wiadomosci - może zawierać JavaScript oraz HTML.
											<br/>Możesz także użyć poniższych zmiennych:
											<br/><em>{S_USERNAME}</em> = <em>%s</em>
											<br/><em>{S_USER_ID}</em> = <em>%s</em>
											<br/><em>{S_CURRENT_TIME}</em> = <em>%s</em>
											<br/><em>{SITE_URL}</em> = <em>%s</em>
											<br/><em>{FORUM_URL}</em> = <em>%s</em>
											<br/><em>{SITENAME}</em> = <em>%s</em>
											<br/><em>{SITE_DESCRIPTION}</em> = <em>%s</em>',
	'QUICK_ADS_SIZE'					=> 'Rozmiar (wartość całkowita)',
	'QUICK_ADS_SIZE_EXPLAIN'			=> 'Ustaw rozmiar reklamy - (szerokość x wysokość) w pikselach. Zero (0) ustawia rozmiar automatycznie.',
	'QUICK_ADS_MSIZE'					=> 'Minimalny rozmiar (wartości całkowite)',
	'QUICK_ADS_MSIZE_EXPLAIN'			=> 'Ustaw minimalny rozmiar okna przeglądarki, od którego wyświetlać reklamy - (szerokość x wysokość) w pikselach.',
	'QUICK_ADS_OVERF'					=> 'Przepełnienie:',
	'QUICK_ADS_OVERF_EXPLAIN'			=> 'Ustaw co się stanie, gdy element nie mieści się w podanym przez Ciebie rozmiarze.',
	'QUICK_ADS_OVERF_HIDDEN'			=> 'Ukryj nadmiar',
	'QUICK_ADS_OVERF_VISIBLE'			=> 'Pokazuj całość',
	'QUICK_ADS_OVERF_SCROLL'			=> 'Suwak do przewijania',
	'QUICK_ADS_OVERF_AUTO'				=> 'Suwak jeśli będzie konieczny',
	'QUICK_ADS_PRIORITY'				=> 'Priorytet (wartość całkowita)',
	'QUICK_ADS_PRIORITY_EXPLAIN'		=> 'Im <strong>mniejsza</strong> wartość, tym <strong>wyższy</strong> priorytet.',

	'QUICK_ADS_NEW_ADS'					=> 'Nowa reklama',
	'QUICK_ADS_NEW_ADS_NAME'			=> 'Reklama',
	'QUICK_ADS_DEL_FIELD'				=> 'Usuń reklamę',
	'QUICK_ADS_DEL_FIELD_EXPLAIN'		=> '<strong style="color:#ff0000">Uwaga: tej akcji nie można cofnąć</strong>.',
	
	'QUICK_ADS_SAVED'					=> 'Konfiguracja została zmieniona.',
	'QUICK_ADS_LOG_MSG'					=> '<strong>Zmienione ustawienia systemu reklam</strong>',
));
