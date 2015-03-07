<?php
/**
*
* Quick Ads extension for the phpBB Forum Software package [German]
* German translation by tas2580 (https://tas2580.net)
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
	'QUICK_ADS_TITLE'					=> 'Quick Ads Extension',
	'QUICK_ADS_TITLE_SETTINGS1'			=> 'Allgemeine Einstellungen',
	'QUICK_ADS_TITLE_SETTINGS2'			=> 'Erweiterte Einstellungen',
	
	'QUICK_ADS_ALLOW_BOT'				=> 'Bots erlauben',
	'QUICK_ADS_ALLOW_BOT_EXPLAIN'		=> 'Anzeigen für Bots aktivieren',
	'QUICK_ADS_CUSTOM_ID'				=> 'Custom ID',
	'QUICK_ADS_CUSTOM_ID_EXPLAIN'		=> 'Benutze nur <em style="color:#ff0000">a-z</em>, <em style="color:#ff0000">0-9</em> und <em style="color:#ff0000">Unterstriche</em> (Leer lassen um den Standard zu verwenden). Beispiel: my_custom_id_123',
	'QUICK_ADS_ZINDEX'					=> 'Z-Index (Integer)',
	'QUICK_ADS_ZINDEX_EXPLAIN'			=> 'Plaziere die Anzeigen "hinter" oder "über" einem anderen Element',
	'QUICK_ADS_CLOSEBT'					=> 'Zeige schließen Button',
	'QUICK_ADS_CLOSEBT_EXPLAIN'			=> 'Um die Anzeigen zu schließen.',
	'QUICK_ADS_CLOSEBT_FRAME'			=> 'On each frame',
	'QUICK_ADS_CLOSEBT_ADS'				=> 'On each Ads',
	'QUICK_ADS_COOKIE'					=> 'Cookies aktivieren',
	'QUICK_ADS_COOKIE_EXPLAIN'			=> 'Um den Status der Anzeigen speichern',
	'QUICK_ADS_COOKIE_TIME'				=> 'Cookie Zeit (Integer)',
	'QUICK_ADS_COOKIE_TIME_EXPLAIN'		=> 'Wie lange soll die Werbung ausgeblendet werden (In Minuten)',

	'QUICK_ADS_LEGEND'					=> '%s [%d]',
	'QUICK_ADS_ITEM_TOGGLE'				=> 'Klicken zum Umschalten',
	'QUICK_ADS_MORE_PROP'				=> '<em style="color:#0000ff">Erweitert</em> (Klicken zum Umschalten)',
	'QUICK_ADS_NAME'					=> 'Anzeigen Name',
	'QUICK_ADS_NAME_EXPLAIN'			=> 'Anzeige umbenennen',
	'QUICK_ADS_POS'						=> 'Position',
	'QUICK_ADS_POS_EXPLAIN'				=> 'Bestimme die Position für die Anzeige<br/>Der erste Wert deaktiviert die Anzeige',
	'QUICK_ADS_TOP'						=> 'Oben',
	'QUICK_ADS_LEFT'					=> 'Liks',
	'QUICK_ADS_BOTTOM'					=> 'Unten',
	'QUICK_ADS_RIGHT'					=> 'Rechts',
	
	'QUICK_ADS_ONPAGE'					=> 'Auf Seiten',
	'QUICK_ADS_ONPAGE_EXPLAIN'			=> 'Auf welchenSeiten soll die Anzeige angezeigt werden',
	'QUICK_ADS_ONPAGE_ITEM_FAQ'			=> 'Heufig gestelle Fragen (FAQ)',
	'QUICK_ADS_ONPAGE_ITEM_INDEX'		=> 'Index',
	'QUICK_ADS_ONPAGE_ITEM_MCP'			=> 'Moderationsbereich (MCP)',
	'QUICK_ADS_ONPAGE_ITEM_MEMBERLIST'	=> 'Mitglieder Liste',
	'QUICK_ADS_ONPAGE_ITEM_POSTING'		=> 'Beitrag',
	'QUICK_ADS_ONPAGE_ITEM_REPORT'		=> 'Beitrag melden',
	'QUICK_ADS_ONPAGE_ITEM_SEARCH'		=> 'Suche',
	'QUICK_ADS_ONPAGE_ITEM_UCP'			=> 'Benutzerbereich (UCP)',
	'QUICK_ADS_ONPAGE_ITEM_VIEWFORUM'	=> 'Forum anzeigen',
	'QUICK_ADS_ONPAGE_ITEM_VIEWONLINE'	=> 'Wer ist online',
	'QUICK_ADS_ONPAGE_ITEM_VIEWTOPIC'	=> 'Thema anzeigen',
	// Custom pages
	// 'QUICK_ADS_ONPAGE_ITEM_YOUR_STUFF'	=> 'Your stuff',
	// Custom pages
	
	'QUICK_ADS_GROUP'					=> 'Gruppen Rechte',
	'QUICK_ADS_GROUP_EXPLAIN'			=> 'Welche Gruppe kann die Anzeigen sehen',
	'QUICK_ADS_HREF'					=> 'Link',
	'QUICK_ADS_HREF_EXPLAIN'			=> 'Lik der geöffnet wird wenn man auf die Anzeige klickt',
	
	'QUICK_ADS_BG_IMG'					=> 'Hintergrund Bild',
	'QUICK_ADS_BG_IMG_EXPLAIN'			=> 'URL zum Bild (www)',
	'QUICK_ADS_BG_COLOR'				=> 'Hintergrund Farbe',
	'QUICK_ADS_BG_COLOR_EXPLAIN'		=> 'Beispiel: #ffffff, #000000, white, black,...',
	
	'QUICK_ADS_TEXT'					=> 'Anzeigen Text',
	'QUICK_ADS_TEXT_EXPLAIN'			=> 'Code für die Anzeige (JS/HTML erlaubt).
											<br/>Du kannst die folgenden Variablen verwenden:
											<br/><em>{S_USERNAME}</em> = <em>%s</em>
											<br/><em>{S_USER_ID}</em> = <em>%s</em>
											<br/><em>{S_CURRENT_TIME}</em> = <em>%s</em>
											<br/><em>{SITE_URL}</em> = <em>%s</em>
											<br/><em>{FORUM_URL}</em> = <em>%s</em>
											<br/><em>{SITENAME}</em> = <em>%s</em>
											<br/><em>{SITE_DESCRIPTION}</em> = <em>%s</em>',
	'QUICK_ADS_SIZE'					=> 'Größe (Integer)',
	'QUICK_ADS_SIZE_EXPLAIN'			=> 'Größe für die Anzeige (Breite x Höhe) Pixel. Null (0) bedeutet Auto',
	'QUICK_ADS_MSIZE'					=> 'Minimale Größe (Integer)',
	'QUICK_ADS_MSIZE_EXPLAIN'			=> 'Minimale Größe des Browser Fensters damit die Anzeige angezeigt wird (Breite x Höhe) Pixel',
	'QUICK_ADS_OVERF'					=> 'Überlappen',
	'QUICK_ADS_OVERF_EXPLAIN'			=> 'Wass passiert wenn die Größe überlappt',
	'QUICK_ADS_OVERF_HIDDEN'			=> 'Versteckt',
	'QUICK_ADS_OVERF_VISIBLE'			=> 'Anzeigen',
	'QUICK_ADS_OVERF_SCROLL'			=> 'Scrollen',
	'QUICK_ADS_OVERF_AUTO'				=> 'Auto',
	'QUICK_ADS_PRIORITY'				=> 'Priorität (Integer)',
	'QUICK_ADS_PRIORITY_EXPLAIN'		=> 'Um so <strong>kleiner</strong> der Wert, um so <strong>höher</strong> ist die Priorität',

	'QUICK_ADS_NEW_ADS'					=> 'Neue Anzeige',
	'QUICK_ADS_NEW_ADS_NAME'			=> 'Anzeigen Name',
	'QUICK_ADS_DEL_ADS'					=> '<strong>Delete this Ads</strong>',
	'QUICK_ADS_DEL_ADS_CONFIRM'			=> 'Do you really want to delete this Ads?<br/><strong style="color:#ff0000">Note: this action can not be undo</strong>',
	'QUICK_ADS_DEL_ADS_DELETED'			=> 'Deleted!',
	
	'QUICK_ADS_SAVED'					=> 'Die Quick Ads Einstellungen wurden aktualisiert',
	'QUICK_ADS_LOG_MSG'					=> '<strong>Quick Ads Einstellungen geändert</strong>',
));
