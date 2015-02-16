<?php
/**
*
* Quick Ads extension for the phpBB Forum Software package [Swedish]
* Swedish translation by Holger (http://www.maskinisten.net)
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
	'QUICK_ADS_TITLE'					=> 'Kvickannons-tillägg',
	'QUICK_ADS_TITLE_SETTINGS1'			=> 'Generella inställningar',
	'QUICK_ADS_TITLE_SETTINGS2'			=> 'Detaljerade inställningar',

	'QUICK_ADS_ENABLE'					=> 'Aktivera kvickannonser',
	'QUICK_ADS_ENABLE_EXPLAIN'			=> 'Om du ej aktiverar detta tillägg så kommer annonserna ej att visas',
	'QUICK_ADS_ALLOW_BOT'				=> 'Tillåt botar',
	'QUICK_ADS_ALLOW_BOT_EXPLAIN'		=> 'Aktivera kvickannonser för botar',
	'QUICK_ADS_CUSTOM_ID'				=> 'Egen ID',
	'QUICK_ADS_CUSTOM_ID_EXPLAIN'		=> 'Använd endast <em style="color:#ff0000">a-z</em>, <em style="color:#ff0000">0-9</em> och <em style="color:#ff0000">understreck</em> (lämna tomt för att använda standardvärden). Exempel: mitt_egna_id_123',
	'QUICK_ADS_ZINDEX'					=> 'Z-Index (integer)',
	'QUICK_ADS_ZINDEX_EXPLAIN'			=> 'Placera kvickannonser "bakom" eller "över" andra element',
	'QUICK_ADS_CLOSEBT'					=> 'Visa stäng-knapp',
	'QUICK_ADS_CLOSEBT_EXPLAIN'			=> 'För att stänga kvickannons',
	'QUICK_ADS_CLOSEBT_FRAME'			=> 'On each frame',
	'QUICK_ADS_CLOSEBT_ADS'				=> 'On each Ads',
	'QUICK_ADS_COOKIE'					=> 'Aktivera cookie',
	'QUICK_ADS_COOKIE_EXPLAIN'			=> 'För att spara visningsstatusen för annons',
	'QUICK_ADS_COOKIE_TIME'				=> 'Cookie-tid (integer)',
	'QUICK_ADS_COOKIE_TIME_EXPLAIN'		=> 'Hur länge ska annonsen döljas (i minuter)',

	'QUICK_ADS_LEGEND'					=> '%s [%d]',
	'QUICK_ADS_ITEM_TOGGLE'				=> 'Klicka för att dölja',
	'QUICK_ADS_MORE_PROP'				=> '<em style="color:#0000ff">Avancerat</em> (klicka för att dölja)',
	'QUICK_ADS_NAME'					=> 'Annonsbenämning',
	'QUICK_ADS_NAME_EXPLAIN'			=> 'Ombenämn denna annons',
	'QUICK_ADS_POS'						=> 'Position',
	'QUICK_ADS_POS_EXPLAIN'				=> 'Välj position för denna annons<br/>Välj första värdet för att dölja denna annons',
	'QUICK_ADS_TOP'						=> 'Topp',
	'QUICK_ADS_LEFT'					=> 'Vänster',
	'QUICK_ADS_BOTTOM'					=> 'Botten',
	'QUICK_ADS_RIGHT'					=> 'Höger',

	'QUICK_ADS_ONPAGE'					=> 'På sidor',
	'QUICK_ADS_ONPAGE_EXPLAIN'			=> 'Vilken sida ska visa denna annons',
	'QUICK_ADS_ONPAGE_ITEM_FAQ'			=> 'Ofta ställda frågor (FAQ)',
	'QUICK_ADS_ONPAGE_ITEM_INDEX'		=> 'Index',
	'QUICK_ADS_ONPAGE_ITEM_MCP'			=> 'Moderatorkontrollpanelen (MCP)',
	'QUICK_ADS_ONPAGE_ITEM_MEMBERLIST'	=> 'Medlemslistan',
	'QUICK_ADS_ONPAGE_ITEM_POSTING'		=> 'Nytt inlägg/svar',
	'QUICK_ADS_ONPAGE_ITEM_REPORT'		=> 'Rapport',
	'QUICK_ADS_ONPAGE_ITEM_SEARCH'		=> 'Sök',
	'QUICK_ADS_ONPAGE_ITEM_UCP'			=> 'Användarkontrollpanel (UCP)',
	'QUICK_ADS_ONPAGE_ITEM_VIEWFORUM'	=> 'Forum',
	'QUICK_ADS_ONPAGE_ITEM_VIEWONLINE'	=> 'Vem är online',
	'QUICK_ADS_ONPAGE_ITEM_VIEWTOPIC'	=> 'Ämnen',
	// Custom pages
	// 'QUICK_ADS_ONPAGE_ITEM_YOUR_STUFF'	=> 'Your stuff',
	// Custom pages

	'QUICK_ADS_GROUP'					=> 'Gruppbehörighet',
	'QUICK_ADS_GROUP_EXPLAIN'			=> 'Vilken grupp kan se denna annons',
	'QUICK_ADS_HREF'					=> 'Länk',
	'QUICK_ADS_HREF_EXPLAIN'			=> 'Vilken länk ska öppnas när annonsen klickas',

	'QUICK_ADS_BG_IMG'					=> 'Bakgrundsbild',
	'QUICK_ADS_BG_IMG_EXPLAIN'			=> 'Länk till bild (www)',
	'QUICK_ADS_BG_COLOR'				=> 'Bakgrundsfärg',
	'QUICK_ADS_BG_COLOR_EXPLAIN'		=> 'Exempel: #ffffff, #000000, white, black,...',

	'QUICK_ADS_TEXT'					=> 'Annonstext',
	'QUICK_ADS_TEXT_EXPLAIN'			=> 'Meddelande (JS/HTML tillåtet).
											<br/>Du kan även använda variablerna nedan:
											<br/><em>{S_USERNAME}</em> = <em>%s</em>
											<br/><em>{S_USER_ID}</em> = <em>%s</em>
											<br/><em>{S_CURRENT_TIME}</em> = <em>%s</em>
											<br/><em>{SITE_URL}</em> = <em>%s</em>
											<br/><em>{FORUM_URL}</em> = <em>%s</em>
											<br/><em>{SITENAME}</em> = <em>%s</em>
											<br/><em>{SITE_DESCRIPTION}</em> = <em>%s</em>',
	'QUICK_ADS_SIZE'					=> 'Storlek (integer)',
	'QUICK_ADS_SIZE_EXPLAIN'			=> 'Annonsens storlek (bredd x höjd) i pixel. Noll (0) betyder "auto"',
	'QUICK_ADS_MSIZE'					=> 'Minimal storlek (integer)',
	'QUICK_ADS_MSIZE_EXPLAIN'			=> 'Minimal skärmstorlek för webbläsare som ska visa annonsen (bredd x höjd) i pixel',
	'QUICK_ADS_OVERF'					=> 'Overflow',
	'QUICK_ADS_OVERF_EXPLAIN'			=> 'Vad ska hända om elementets innehåll är större än dess tillordnade område?',
	'QUICK_ADS_OVERF_HIDDEN'			=> 'Dölj',
	'QUICK_ADS_OVERF_VISIBLE'			=> 'Visa',
	'QUICK_ADS_OVERF_SCROLL'			=> 'Skrolla',
	'QUICK_ADS_OVERF_AUTO'				=> 'Auto',
	'QUICK_ADS_PRIORITY'				=> 'Prioritet (integer)',
	'QUICK_ADS_PRIORITY_EXPLAIN'		=> 'Ju <strong>lägre</strong> värde, desto <strong>högre</strong> prioritet',

	'QUICK_ADS_NEW_ADS'					=> 'Ny annons',
	'QUICK_ADS_NEW_ADS_NAME'			=> 'Annonsbenämning',
	'QUICK_ADS_DEL_ADS'					=> '<strong>Delete this Ads</strong>',
	'QUICK_ADS_DEL_ADS_CONFIRM'			=> 'Do you really want to delete this Ads?<br/><strong style="color:#ff0000">Note: this action can not be undo</strong>',
	'QUICK_ADS_DEL_ADS_DELETED'			=> 'Deleted!',

	'QUICK_ADS_SAVED'					=> 'Kvickannons-inställningarna ändrades',
	'QUICK_ADS_LOG_MSG'					=> '<strong>Kvickannons-inställningarna ändrades</strong>',
));
