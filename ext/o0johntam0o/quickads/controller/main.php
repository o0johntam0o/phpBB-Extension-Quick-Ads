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
	/** @var \phpbb\controller\helper */
	protected $helper;
	/** @var \phpbb\template\template */
	protected $template;
	
	public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template)
	{
		// Formally ;)
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
