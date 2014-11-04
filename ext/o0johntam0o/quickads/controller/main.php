<?php
/**
*
* Quick Ads extension for the phpBB Forum Software package
*
* @copyright (c) 2014 o0johntam0o
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace o0johntam0o\quickads\controller;

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
