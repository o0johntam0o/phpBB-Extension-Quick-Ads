<?php
/**
*
* Quick Ads extension for the phpBB Forum Software package [Estonian]
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
	'QUICK_ADS_TITLE'					=> 'Reklaamide süsteem',
	'QUICK_ADS_TITLE_SETTINGS1'			=> 'Üldised seaded',
	'QUICK_ADS_TITLE_SETTINGS2'			=> 'Detailsed seaded',
	
	'QUICK_ADS_ALLOW_BOT'				=> 'Luba botid',
	'QUICK_ADS_ALLOW_BOT_EXPLAIN'		=> 'Luba botid "Reklaamide süsteemis"',
	'QUICK_ADS_DENY_ADSBLOCKER'			=> 'Deny Ads Blockers',
	'QUICK_ADS_DENY_ADSBLOCKER_EXPLAIN'	=> 'Prevent user from reading post with Ads Blockers',
	'QUICK_ADS_DENY_ADSBLOCKER_MSG1'	=> 'Please turn your Ads Blocker off to see post content',
	'QUICK_ADS_DENY_ADSBLOCKER_MSG2'	=> 'Please enable the JavaScript to see post content',
	'QUICK_ADS_ZINDEX'					=> 'Z-Indeks (Täisarv)',
	'QUICK_ADS_ZINDEX_EXPLAIN'			=> 'Aseta reklaamide süsteem teise elemendi "taha" või "üles"',
	'QUICK_ADS_CLOSEBT'					=> 'Näita sulge nuppu',
	'QUICK_ADS_CLOSEBT_EXPLAIN'			=> 'Et sulgeda reklaam',
	'QUICK_ADS_CLOSEBT_FRAME'			=> 'Iga raam',
	'QUICK_ADS_CLOSEBT_ADS'				=> 'Iga reklaam',
	'QUICK_ADS_COOKIE'					=> 'Luba küpsised',
	'QUICK_ADS_COOKIE_EXPLAIN'			=> 'Et salvestada näidatava reklaami olekut',
	'QUICK_ADS_COOKIE_TIME'				=> 'Küpsiste aeg (Täisarv)',
	'QUICK_ADS_COOKIE_TIME_EXPLAIN'		=> 'Kui kauaks reklaam on peidetud (minutites)',
	
	'QUICK_ADS_LEGEND'					=> '%s [%d]',
	'QUICK_ADS_ITEM_TOGGLE'				=> 'Vajuta, et näha seadeid',
	'QUICK_ADS_MORE_PROP'				=> '<em style="color:#0000ff">Täpsemad</em> (vajuta, et näha seadeid)',
	'QUICK_ADS_NAME'					=> 'Reklaami nimi',
	'QUICK_ADS_NAME_EXPLAIN'			=> 'Nimeta ümber reklaam',
	'QUICK_ADS_POS'						=> 'Asukoht',
	'QUICK_ADS_POS_EXPLAIN'				=> 'Seadista reklaamile asukoht<br/>Vali esimene väärtus, et peita antud reklaam',
	'QUICK_ADS_TOP'						=> 'Üleval',
	'QUICK_ADS_LEFT'					=> 'Vasakul',
	'QUICK_ADS_BOTTOM'					=> 'All',
	'QUICK_ADS_RIGHT'					=> 'Paremal',
	'QUICK_ADS_TOP_STATIC'				=> 'Üleval (Static)',
	'QUICK_ADS_BOTTOM_STATIC'			=> 'All (Static)',
	
	'QUICK_ADS_ONPAGE'					=> 'Lehekülgedel',
	'QUICK_ADS_ONPAGE_EXPLAIN'			=> 'Millistel lehekülgedel näidatakse antud reklaami',
	'QUICK_ADS_ONPAGE_ITEM_FAQ'			=> 'Korduma Kippuvad Küsimused (KKK)',
	'QUICK_ADS_ONPAGE_ITEM_INDEX'		=> 'Pealeht',
	'QUICK_ADS_ONPAGE_ITEM_MCP'			=> 'Moderaatori Juhtpaneel (MJP)',
	'QUICK_ADS_ONPAGE_ITEM_MEMBERLIST'	=> 'Liikmete nimekiri',
	'QUICK_ADS_ONPAGE_ITEM_POSTING'		=> 'Postitamine',
	'QUICK_ADS_ONPAGE_ITEM_REPORT'		=> 'Raporteerimine',
	'QUICK_ADS_ONPAGE_ITEM_SEARCH'		=> 'Otsing',
	'QUICK_ADS_ONPAGE_ITEM_UCP'			=> 'Kasutaja Juhtpaneel (KJP)',
	'QUICK_ADS_ONPAGE_ITEM_VIEWFORUM'	=> 'Foorumi vaates',
	'QUICK_ADS_ONPAGE_ITEM_VIEWONLINE'	=> 'Kes on online? vaates',
	'QUICK_ADS_ONPAGE_ITEM_VIEWTOPIC'	=> 'Teema vaates',
	// Custom pages = Kohandatud lehekülg
	// 'QUICK_ADS_ONPAGE_ITEM_YOUR_STUFF'	=> 'Sinu asjad',
	// Custom pages = Kohandatud lehekülg
	
	'QUICK_ADS_GROUP'					=> 'Grupid',
	'QUICK_ADS_GROUP_EXPLAIN'			=> 'Millised grupid näevad seda reklaami',
	'QUICK_ADS_HREF'					=> 'Link',
	'QUICK_ADS_HREF_EXPLAIN'			=> 'Lingi URL, kui kasutaja vajutab sellele reklaamile',
	
	'QUICK_ADS_BG_IMG'					=> 'Tagatausta pilt',
	'QUICK_ADS_BG_IMG_EXPLAIN'			=> 'Lingi URL pildile (www)',
	'QUICK_ADS_BG_COLOR'				=> 'Tagatausta värv',
	'QUICK_ADS_BG_COLOR_EXPLAIN'		=> 'Näiteks: #ffffff, #000000, white, black,...',
	
	'QUICK_ADS_TEXT'					=> 'Reklaami tekst',
	'QUICK_ADS_TEXT_EXPLAIN'			=> 'Reklaami sisu (JS/HTML lubatud).
											<br/>Sa võid ka kasutada järgnevaid muutujaid:
											<br/><em>{S_USERNAME}</em> = <em>%s</em>
											<br/><em>{S_USER_ID}</em> = <em>%s</em>
											<br/><em>{S_CURRENT_TIME}</em> = <em>%s</em>
											<br/><em>{SITE_URL}</em> = <em>%s</em>
											<br/><em>{FORUM_URL}</em> = <em>%s</em>
											<br/><em>{SITENAME}</em> = <em>%s</em>
											<br/><em>{SITE_DESCRIPTION}</em> = <em>%s</em>',
	'QUICK_ADS_SIZE'					=> 'Suurus (Täisarv)',
	'QUICK_ADS_SIZE_EXPLAIN'			=> 'Seadista reklaami suurus (Laius x Kõrgus) pikslites. Null (0) tähendab automaatset määramist',
	'QUICK_ADS_MSIZE'					=> 'Minimalne suurus (Täisarv)',
	'QUICK_ADS_MSIZE_EXPLAIN'			=> 'Seadista minimaalne suurus veebilehitseja aknas sellele reklaamile (Laius x Kõrgus) pikslites',
	'QUICK_ADS_OVERF'					=> 'Ülevool',
	'QUICK_ADS_OVERF_EXPLAIN'			=> 'Seadista, mida peaks tegema kui tekib ülevool antud alas',
	'QUICK_ADS_OVERF_HIDDEN'			=> 'Peidetud',
	'QUICK_ADS_OVERF_VISIBLE'			=> 'Nähtav',
	'QUICK_ADS_OVERF_SCROLL'			=> 'keritav',
	'QUICK_ADS_OVERF_AUTO'				=> 'Auto',
	'QUICK_ADS_BORDER'					=> 'Border style',
	'QUICK_ADS_BORDER_EXPLAIN'			=> 'Border around this Ads',
	'QUICK_ADS_BORDER0'					=> 'None',
	'QUICK_ADS_BORDER1'					=> 'Solid',
	'QUICK_ADS_BORDER2'					=> 'Dotted',
	'QUICK_ADS_BORDER3'					=> 'Dashed',
	'QUICK_ADS_PRIORITY'				=> 'Proriteet (Täisarv)',
	'QUICK_ADS_PRIORITY_EXPLAIN'		=> 'Mida <strong>madalam</strong> number, seda <strong>kõrgem</strong> on prioriteet',
	
	'QUICK_ADS_NEW_ADS'					=> 'Uus reklaam',
	'QUICK_ADS_NEW_ADS_NAME'			=> 'Reklaami nimi',
	'QUICK_ADS_DEL_ADS'					=> '<strong>Kustuta see reklaam</strong>',
	'QUICK_ADS_DEL_ADS_CONFIRM'			=> 'Kas oled täiesti kindel, et soovid kustutada antud reklaami?<br/><strong style="color:#ff0000">Pane tähele: seda tegevust ei ole võimalik taastada</strong>',
	'QUICK_ADS_DEL_ADS_DELETED'			=> 'Kustutatud!',
	
	'QUICK_ADS_SAVED'					=> 'Reklaamide süsteemi seaded on uuendatud',
	'QUICK_ADS_LOG_MSG'					=> '<strong>Reklaamide süsteemi seaded muudetud</strong>',
));
