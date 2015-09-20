<?php
/**
*
* Quick Ads extension for the phpBB Forum Software package [Czech]
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
	'QUICK_ADS_TITLE'					=> 'Reklamy (Quick Ads)',
	'QUICK_ADS_TITLE_SETTINGS1'			=> 'Obecné nastavení',
	'QUICK_ADS_TITLE_SETTINGS2'			=> 'Rozšířené nastavení',
	
	'QUICK_ADS_ALLOW_BOT'				=> 'Povolit Boty',
	'QUICK_ADS_ALLOW_BOT_EXPLAIN'		=> 'Povolení Quick Ads pro boty',
	'QUICK_ADS_DENY_ADSBLOCKER'			=> 'Deny Ads Blockers',
	'QUICK_ADS_DENY_ADSBLOCKER_EXPLAIN'	=> 'Prevent user from reading post with Ads Blockers',
	'QUICK_ADS_DENY_ADSBLOCKER_MSG1'	=> 'Please turn your Ads Blocker off to see post content',
	'QUICK_ADS_DENY_ADSBLOCKER_MSG2'	=> 'Please enable the JavaScript to see post content',
	'QUICK_ADS_ZINDEX'					=> 'Z-Index (celé číslo)',
	'QUICK_ADS_ZINDEX_EXPLAIN'			=> 'Umístění reklam „za“ či „před“ jiné elementy.',
	'QUICK_ADS_CLOSEBT'					=> 'Zobrazovat tlačítko pro zavření',
	'QUICK_ADS_CLOSEBT_EXPLAIN'			=> 'Tlačítko pro skrytí reklamního bloku.',
	'QUICK_ADS_CLOSEBT_FRAME'			=> 'Na každém bloku',
	'QUICK_ADS_CLOSEBT_ADS'				=> 'Na každé reklamě',
	'QUICK_ADS_COOKIE'					=> 'Povolit soubory cookie',
	'QUICK_ADS_COOKIE_EXPLAIN'			=> 'Povolení ukládání informace o stavu zobrazení reklamy do cookies.',
	'QUICK_ADS_COOKIE_TIME'				=> 'Doba platnosti cookie (celé číslo)',
	'QUICK_ADS_COOKIE_TIME_EXPLAIN'		=> 'Určuje, jak dlouho budou reklamy skryté (v minutách).',

	'QUICK_ADS_LEGEND'					=> '%s [%d]',
	'QUICK_ADS_ITEM_TOGGLE'				=> 'Zobrazit/skrýt',
	'QUICK_ADS_MORE_PROP'				=> '<em style="color:#0000ff">Pokročilé</em> (Zobrazit/skrýt)',
	'QUICK_ADS_NAME'					=> 'Název reklamy',
	'QUICK_ADS_NAME_EXPLAIN'			=> 'Umožňuje přejmenování reklamy.',
	'QUICK_ADS_POS'						=> 'Pozice',
	'QUICK_ADS_POS_EXPLAIN'				=> 'Nastavení pozice této reklamy<br/>Pro skrytí této reklamy zvolte možnost „Zakázat“',
	'QUICK_ADS_TOP'						=> 'Nahoře',
	'QUICK_ADS_LEFT'					=> 'Vlevo',
	'QUICK_ADS_BOTTOM'					=> 'Dole',
	'QUICK_ADS_RIGHT'					=> 'Vpravo',
	'QUICK_ADS_TOP_STATIC'				=> 'Nahoře (statická)',
	'QUICK_ADS_BOTTOM_STATIC'			=> 'Dole (statická)',
	
	'QUICK_ADS_ONPAGE'					=> 'Na stránkách',
	'QUICK_ADS_ONPAGE_EXPLAIN'			=> 'Vyberte stránky, na kterých bude reklama zobrazována.',
	'QUICK_ADS_ONPAGE_ITEM_FAQ'			=> 'Často kladené otázky (FAQ)',
	'QUICK_ADS_ONPAGE_ITEM_INDEX'		=> 'Úvodní stránka',
	'QUICK_ADS_ONPAGE_ITEM_MCP'			=> 'Moderátorský panel (MCP)',
	'QUICK_ADS_ONPAGE_ITEM_MEMBERLIST'	=> 'Seznam členů',
	'QUICK_ADS_ONPAGE_ITEM_POSTING'		=> 'Editor zpráv',
	'QUICK_ADS_ONPAGE_ITEM_REPORT'		=> 'Hlášení',
	'QUICK_ADS_ONPAGE_ITEM_SEARCH'		=> 'Vyhledávání',
	'QUICK_ADS_ONPAGE_ITEM_UCP'			=> 'Uživatelský panel (UCP)',
	'QUICK_ADS_ONPAGE_ITEM_VIEWFORUM'	=> 'Zobrazení fóra',
	'QUICK_ADS_ONPAGE_ITEM_VIEWONLINE'	=> 'Zobrazení online',
	'QUICK_ADS_ONPAGE_ITEM_VIEWTOPIC'	=> 'Zobrazení tématu',
	// Custom pages
	// 'QUICK_ADS_ONPAGE_ITEM_YOUR_STUFF'	=> 'Your stuff',
	// Custom pages
	
	'QUICK_ADS_GROUP'					=> 'Skupinová oprávnění',
	'QUICK_ADS_GROUP_EXPLAIN'			=> 'Vyberte, které skupiny uvidí tuto reklamu.',
	'QUICK_ADS_HREF'					=> 'Odkaz',
	'QUICK_ADS_HREF_EXPLAIN'			=> 'Odkaz, který bude otevřen při klepnutí na tuto reklamu.',
	
	'QUICK_ADS_BG_IMG'					=> 'Obrázek na pozadí',
	'QUICK_ADS_BG_IMG_EXPLAIN'			=> 'Odkaz na obrázek (www).',
	'QUICK_ADS_BG_COLOR'				=> 'Barva pozadí',
	'QUICK_ADS_BG_COLOR_EXPLAIN'		=> 'Příklad: #ffffff, #000000, white, black,…',
	
	'QUICK_ADS_TEXT'					=> 'Text reklamy',
	'QUICK_ADS_TEXT_EXPLAIN'			=> 'Obsah zprávy uvnitř reklamního bloku (JS/HTML povoleno).
											<br/>Můžete také použít následující proměnné:
											<br/><em>{S_USERNAME}</em> = <em>%s</em>
											<br/><em>{S_USER_ID}</em> = <em>%s</em>
											<br/><em>{S_CURRENT_TIME}</em> = <em>%s</em>
											<br/><em>{SITE_URL}</em> = <em>%s</em>
											<br/><em>{FORUM_URL}</em> = <em>%s</em>
											<br/><em>{SITENAME}</em> = <em>%s</em>
											<br/><em>{SITE_DESCRIPTION}</em> = <em>%s</em>',
	'QUICK_ADS_SIZE'					=> 'Velikost (celé číslo)',
	'QUICK_ADS_SIZE_EXPLAIN'			=> 'Nastavení rozměrů této reklamy (šířka x výška) v pixelech. Nula (0) znamená automatický rozměr.',
	'QUICK_ADS_MSIZE'					=> 'Minimální velikost (celé číslo)',
	'QUICK_ADS_MSIZE_EXPLAIN'			=> 'Nastavení minimálních rozměrů (šířka x výška) okna prohlížeče pro zobrazení této reklamy v pixelech.',
	'QUICK_ADS_OVERF'					=> 'Přetečení (overflow)',
	'QUICK_ADS_OVERF_EXPLAIN'			=> 'Nastavení, co se stane pokud obsah bloku překročí jeho hranice.',
	'QUICK_ADS_OVERF_HIDDEN'			=> 'Skryté',
	'QUICK_ADS_OVERF_VISIBLE'			=> 'Viditelné',
	'QUICK_ADS_OVERF_SCROLL'			=> 'Scroll',
	'QUICK_ADS_OVERF_AUTO'				=> 'Auto',
	'QUICK_ADS_BORDER'					=> 'Styl čáry',
	'QUICK_ADS_BORDER_EXPLAIN'			=> 'Vzhled čáry okolo tohoto reklamního bloku.',
	'QUICK_ADS_BORDER0'					=> 'Žádná čára',
	'QUICK_ADS_BORDER1'					=> 'Plná',
	'QUICK_ADS_BORDER2'					=> 'Tečkovaná',
	'QUICK_ADS_BORDER3'					=> 'Čárkovaná',
	'QUICK_ADS_PRIORITY'				=> 'Priorita (celé číslo)',
	'QUICK_ADS_PRIORITY_EXPLAIN'		=> 'Čím <strong>nižší</strong> číslo, tím <strong>vyšší</strong> priorita.',

	'QUICK_ADS_NEW_ADS'					=> 'Nová reklama',
	'QUICK_ADS_NEW_ADS_NAME'			=> 'Název reklamy',
	'QUICK_ADS_DEL_ADS'					=> '<strong>Odstranit tuto reklamu</strong>',
	'QUICK_ADS_DEL_ADS_CONFIRM'			=> 'Opravdu chcete smazat tento reklamní blok?<br/><strong style="color:#ff0000">Poznámka: tuto akci nelze vrátit zpět.</strong>',
	'QUICK_ADS_DEL_ADS_DELETED'			=> 'Odstraněno!',
	
	'QUICK_ADS_SAVED'					=> 'Nastavení reklam aktualizováno',
	'QUICK_ADS_LOG_MSG'					=> '<strong>Nastavení reklam změněno</strong>',
));
