<?php
/**
*
* Quick Ads extension for the phpBB Forum Software package
*
* @copyright (c) 2014 o0johntam0o
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace o0johntam0o\quickads\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\o0johntam0o\quickads\acp\main_module',
			'title'		=> 'QUICK_ADS_TITLE',
			'modes'		=> array(
				'quick_ads_config'	=> array(
					'title' => 'QUICK_ADS_TITLE_SETTINGS1',
					'auth' => 'acl_a_board',
					'cat' => array('QUICK_ADS_TITLE_SETTINGS1')
				),
				'quick_ads_config_details'	=> array(
					'title' => 'QUICK_ADS_TITLE_SETTINGS2',
					'auth' => 'acl_a_board',
					'cat' => array('QUICK_ADS_TITLE_SETTINGS2')
				),
			),
		);
	}
}
