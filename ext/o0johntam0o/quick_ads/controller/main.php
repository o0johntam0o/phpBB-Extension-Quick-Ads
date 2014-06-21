<?php

/**
*
* @package phpBB Extension - Quick Ads
* @copyright (c) 2014 o0johntam0o
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace o0johntam0o\quick_ads\controller;

class main
{
	protected $helper, $template;
	
	public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template)
	{
		// TO-DO: Display all ads
		$this->helper = $helper;
		$this->template = $template;
	}
	
	public function base()
	{
		$this->template->assign_vars(array(
		'S_QUICK_ADS_AVAILABLE' 	=> true,
		));
		return $this->helper->render('quick_ads.html');
	}
}
