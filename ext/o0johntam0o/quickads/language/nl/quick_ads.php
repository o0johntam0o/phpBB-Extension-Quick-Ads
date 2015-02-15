<?php
/**
*
* Quick Ads extension for the phpBB Forum Software package [Dutch]
* Dutch translation by OmkePom
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
	'QUICK_ADS_TITLE'					=> 'Snel Advertenties maken',
	'QUICK_ADS_TITLE_SETTINGS1'			=> 'Algemene instellingen',
	'QUICK_ADS_TITLE_SETTINGS2'			=> 'Details instellingen',
	
	'QUICK_ADS_ENABLE'					=> 'Schakel Advertenties in',
	'QUICK_ADS_ENABLE_EXPLAIN'			=> 'Als Ja, zal de Advertenties worden getoont',
	'QUICK_ADS_ALLOW_BOT'				=> 'Bots toestaan',
	'QUICK_ADS_ALLOW_BOT_EXPLAIN'		=> 'Bots hebben toegang tot Advertenties',
	'QUICK_ADS_CUSTOM_ID'				=> 'Gebruik ID',
	'QUICK_ADS_CUSTOM_ID_EXPLAIN'		=> 'Gebruik <em style="color:#ff0000">a-z</em>, <em style="color:#ff0000">0-9</em> en <em style="color:#ff0000">underline</em> _ (laat leeg voor standaard instellingen).<br />Voorbeeld: mijn_1ste_advertentie',
	'QUICK_ADS_ZINDEX'					=> 'Z-Index (Integer)',
	'QUICK_ADS_ZINDEX_EXPLAIN'			=> 'Plaats Advertenties "achter" of "boven" een ander element',
	'QUICK_ADS_CLOSEBT'					=> 'Laat X zien',
	'QUICK_ADS_CLOSEBT_EXPLAIN'			=> 'Uitzetten door gebruiker mogelijk.',
	'QUICK_ADS_COOKIE'					=> 'Zet Cookie aan',
	'QUICK_ADS_COOKIE_EXPLAIN'			=> 'Het aantal weergeven van advertenties opslaan',
	'QUICK_ADS_COOKIE_TIME'				=> 'Cookie tijd (Integer)',
	'QUICK_ADS_COOKIE_TIME_EXPLAIN'		=> 'Hoe lang de advertenties zal worden verborgen (in minuten)',

	'QUICK_ADS_LEGEND'					=> '%s [%d]',
	'QUICK_ADS_ITEM_TOGGLE'				=> 'Klik om in te schakelen',
	'QUICK_ADS_MORE_PROP'				=> '<em style="color:#0000ff">Uitgebreid (Klik om in te schakelen)</em>',
	'QUICK_ADS_NAME'					=> 'Advertentie Titel',
	'QUICK_ADS_NAME_EXPLAIN'			=> 'Naam Advertentie',
	'QUICK_ADS_POS'						=> 'Positie',
	'QUICK_ADS_POS_EXPLAIN'				=> 'Bepaal positie van Advertentie <br/>Kies eerste waarde om Advertenties te verbergen',
	'QUICK_ADS_TOP'						=> 'Bovenaan',
	'QUICK_ADS_LEFT'					=> 'Links',
	'QUICK_ADS_BOTTOM'					=> 'Onderaan',
	'QUICK_ADS_RIGHT'					=> 'Rechts',
	
	'QUICK_ADS_ONPAGE'					=> 'Welke Forums',
	'QUICK_ADS_ONPAGE_EXPLAIN'			=> 'Welke Forums wordt Advertentie getoont',
	'QUICK_ADS_ONPAGE_ITEM_FAQ'			=> 'Veel gestelde vragen (FAQ)',
	'QUICK_ADS_ONPAGE_ITEM_INDEX'		=> 'Forumoverzicht',
	'QUICK_ADS_ONPAGE_ITEM_MCP'			=> 'Moderatorpaneel(MCP)',
	'QUICK_ADS_ONPAGE_ITEM_MEMBERLIST'	=> 'Ledenlijst',
	'QUICK_ADS_ONPAGE_ITEM_POSTING'		=> 'Berichten',
	'QUICK_ADS_ONPAGE_ITEM_REPORT'		=> 'Meldingen',
	'QUICK_ADS_ONPAGE_ITEM_SEARCH'		=> 'Zoeken',
	'QUICK_ADS_ONPAGE_ITEM_UCP'			=> 'Gebruikerspaneel (UCP)',
	'QUICK_ADS_ONPAGE_ITEM_VIEWFORUM'	=> 'Bekijk Forum',
	'QUICK_ADS_ONPAGE_ITEM_VIEWONLINE'	=> 'Wie is online',
	'QUICK_ADS_ONPAGE_ITEM_VIEWTOPIC'	=> 'Bekijk Onderwerp',
	// Custom pages
	// 'QUICK_ADS_ONPAGE_ITEM_YOUR_STUFF'	=> 'Your stuff',
	// Custom pages
	
	'QUICK_ADS_GROUP'					=> 'Groeppermissies',
	'QUICK_ADS_GROUP_EXPLAIN'			=> 'Welke Groepen kunnen Advertentie zien',
	'QUICK_ADS_HREF'					=> 'Link',
	'QUICK_ADS_HREF_EXPLAIN'			=> 'Welke link wordt geopend als je op Advertentie klikt',
	
	'QUICK_ADS_BG_IMG'					=> 'Achtergrond Afbeelding',
	'QUICK_ADS_BG_IMG_EXPLAIN'			=> 'Link naar de Afbeelding (www)',
	'QUICK_ADS_BG_COLOR'				=> 'Achtergrond Kleur',
	'QUICK_ADS_BG_COLOR_EXPLAIN'		=> 'Voorbeeld: #ffffff, #000000, wit, zwart,...',
	
	'QUICK_ADS_TEXT'					=> 'Advertentie tekst',
	'QUICK_ADS_TEXT_EXPLAIN'			=> 'Gebruik Opmaak (JS/HTML toegestaan).
											<br/>U kunt ook de variabelen hieronder gebruiken:
											<br/><em>{S_USERNAME}</em> = <em>%s</em>
											<br/><em>{S_USER_ID}</em> = <em>%s</em>
											<br/><em>{S_CURRENT_TIME}</em> = <em>%s</em>
											<br/><em>{SITE_URL}</em> = <em>%s</em>
											<br/><em>{FORUM_URL}</em> = <em>%s</em>
											<br/><em>{SITENAME}</em> = <em>%s</em>
											<br/><em>{SITE_DESCRIPTION}</em> = <em>%s</em>',
	'QUICK_ADS_SIZE'					=> 'Formaat (Integer)',
	'QUICK_ADS_SIZE_EXPLAIN'			=> 'Stel formaat in van deze Advertentie(Breedte x Hoogte) in pixel. (0) is Automatisch',
	'QUICK_ADS_MSIZE'					=> 'Minimaal Formaat(Integer)',
	'QUICK_ADS_MSIZE_EXPLAIN'			=> 'Stelt minmale Formaat in van Advertentie Box (Breedte x Hoogte) in pixels',
	'QUICK_ADS_OVERF'					=> 'Overloop',
	'QUICK_ADS_OVERF_EXPLAIN'			=> 'Stelt in wat er gebeurt als de inhoud het formaat overschreid',
	'QUICK_ADS_OVERF_HIDDEN'			=> 'Verborgen',
	'QUICK_ADS_OVERF_VISIBLE'			=> 'Zichtbaar',
	'QUICK_ADS_OVERF_SCROLL'			=> 'Scroll',
	'QUICK_ADS_OVERF_AUTO'				=> 'Auto',
	'QUICK_ADS_PRIORITY'				=> 'Prioriteit (Integer)',
	'QUICK_ADS_PRIORITY_EXPLAIN'		=> 'Hoe <strong>lager</strong> het nummer, hoe <strong>hoger</strong> prioriteit',

	'QUICK_ADS_NEW_ADS'					=> 'Nieuwe Advertentie',
	'QUICK_ADS_NEW_ADS_NAME'			=> 'Advertentie Titel',
	'QUICK_ADS_DEL_FIELD'				=> 'Verwijder deze Advertentie',
	'QUICK_ADS_DEL_FIELD_EXPLAIN'		=> '<strong style="color:#ff0000">Let Op! Dit kan niet ongedaan worden gemaakt</strong>',
	
	'QUICK_ADS_SAVED'					=> 'Advertentie Bewaard',
	'QUICK_ADS_LOG_MSG'					=> '<strong>Advertentie instellingen Aangepast</strong>',
));
