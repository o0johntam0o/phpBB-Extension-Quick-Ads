<?php
/**
*
* Quick Ads extension for the phpBB Forum Software package
*
* @copyright (c) 2014 o0johntam0o
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace o0johntam0o\quickads\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class main_listener implements EventSubscriberInterface
{
	/** @var \phpbb\controller\helper */
	protected $helper;
	/** @var \phpbb\template\template */
	protected $template;
	/** @var \phpbb\user */
	protected $user;
	/** @var \phpbb\config\config */
	protected $config;
	/** @var \phpbb\request\request */
	protected $request;
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;
	/** @var string */
	protected $table_prefix;
	/** @var string */
	protected $root_path;
	/** @var string */
	protected $php_ext;
	
	public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user, \phpbb\config\config $config, \phpbb\request\request $request, \phpbb\db\driver\driver_interface $db, $table_prefix, $root_path, $php_ext)
	{
		$this->helper = $helper;
		$this->template = $template;
		$this->user = $user;
		$this->config = $config;
		$this->request = $request;
		$this->db = $db;
		$this->table_prefix = $table_prefix;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
	}
	
	static public function getSubscribedEvents()
    {
        return array(
            'core.user_setup'		=> 'load_language_on_setup',
            'core.page_header'		=> 'load_quick_ads',
        );
    }
	
    public function load_language_on_setup($event)
    {
        $lang_set_ext = $event['lang_set_ext'];
        $lang_set_ext[] = array(
            'ext_name' => 'o0johntam0o/quickads',
            'lang_set' => 'quick_ads',
        );
        $event['lang_set_ext'] = $lang_set_ext;
    }
	
    public function load_quick_ads($event)
    {
		if ($this->user->page['page_dir'] != '')
		{
			// === Custom pages ===
			// if ($user->page['page_dir'] != 'custom-page')
			// {
			//	return;
			// }
			// === Custom pages ===
			return;
		}
		
		// Check page is being used
		$quick_ads_script_name = str_replace('.' . $this->php_ext, '', $this->user->page['page_name']);
		// === Custom pages ===
		// if ($user->page['page_dir'] == 'custom-page')
		// {
		//	$quick_ads_script_name = 'custom-page';
		// }
		// === Custom pages ===
		$check = array(
			'faq',
			'index',
			'mcp',
			'memberlist',
			'posting',
			'report',
			'search',
			'ucp',
			'viewforum',
			'viewonline',
			'viewtopic',
			// === Custom pages ===
			// 'custom_page',
			// === Custom pages ===
		);
		
		if (!in_array($quick_ads_script_name, $check))
		{
			return;
		}
		
		$total = $top = $bottom = $left = $right = $top_static = $bottom_static = 0;
		
		// Assign Quick Ads data into template
		$quick_ads_sql = array(
			'SELECT'	=> 'qa.*',
			'FROM'		=> array($this->table_prefix . 'quick_ads' => 'qa'),
			'WHERE'		=> 'qa.ads_pos > 0',
			'ORDER_BY'	=> 'qa.ads_priority ASC',
			);
		$result = $this->db->sql_query($this->db->sql_build_query('SELECT', $quick_ads_sql));
		while ($row = $this->db->sql_fetchrow($result))
		{
			$ads_onpage_arr = explode(',', $row['ads_onpage']);
			$ads_check_group = explode(',', $row['ads_group']);
			if (in_array($quick_ads_script_name, $ads_onpage_arr) && in_array($this->user->data['group_id'], $ads_check_group))
			{
				if ($row['ads_pos'] == 1)	// Top
				{
					$top++;
					$block_name = 'quick_ads_row_top';
				}
				else if ($row['ads_pos'] == 2)	// Bottom
				{
					$bottom++;
					$block_name = 'quick_ads_row_bottom';
				}
				else if ($row['ads_pos'] == 3)	// Left
				{
					$left++;
					$block_name = 'quick_ads_row_left';
				}
				else if ($row['ads_pos'] == 4)	// Right
				{
					$right++;
					$block_name = 'quick_ads_row_right';
				}
				else if ($row['ads_pos'] == 5)	// Top (Static)
				{
					$top_static++;
					$block_name = 'quick_ads_row_top_static';
				}
				else if ($row['ads_pos'] == 6)	// Bottom (Static)
				{
					$bottom_static++;
					$block_name = 'quick_ads_row_bottom_static';
				}
				
				$this->template->assign_block_vars($block_name, array(
					'QUICK_ADS_ID'			=> $row['ads_id'],
					'QUICK_ADS_TEXT'		=> $this->quick_ads_rebuild_message($row['ads_text']),
					'QUICK_ADS_WIDTH'		=> $row['ads_width'],
					'QUICK_ADS_HEIGHT'		=> $row['ads_height'],
					'QUICK_ADS_BORDER'		=> $row['ads_border'],
					'QUICK_ADS_BG_IMG'		=> $row['ads_bg_img'],
					'QUICK_ADS_BG_COLOR'	=> ($row['ads_bg_color'] == '') ? 'transparent' : $row['ads_bg_color'],
					'QUICK_ADS_HREF'		=> $row['ads_href'],
					'QUICK_ADS_OVERF'		=> $this->quick_ads_rebuild_select($row['ads_overf']),
					));
					
				$total++;
			}
		}
		$this->db->sql_freeresult($result);
		
		//Standard template variables
		if ($total>0)
		{
			$this->template->assign_vars(array(
				'S_QUICK_ADS_TOP'				=> ($top > 0) ? true : false,
				'S_QUICK_ADS_BOTTOM'			=> ($bottom > 0) ? true : false,
				'S_QUICK_ADS_LEFT'				=> ($left > 0) ? true : false,
				'S_QUICK_ADS_RIGHT'				=> ($right > 0) ? true : false,
				'S_QUICK_ADS_TOP_STATIC'		=> ($top_static > 0) ? true : false,
				'S_QUICK_ADS_BOTTOM_STATIC'		=> ($bottom_static > 0) ? true : false,
				'S_QUICK_ADS_ALLOW_BOT'			=> isset($this->config['quick_ads_allow_bot']) ? $this->config['quick_ads_allow_bot'] : false,
				'S_QUICK_ADS_CUSTOM_ID'			=> isset($this->config['quick_ads_custom_id']) ? $this->config['quick_ads_custom_id'] : '',
				'S_QUICK_ADS_ZINDEX'			=> isset($this->config['quick_ads_zindex']) ? $this->config['quick_ads_zindex'] : 0,
				'S_QUICK_ADS_CLOSEBT'			=> isset($this->config['quick_ads_closebt']) ? $this->config['quick_ads_closebt'] : false,
				'S_QUICK_ADS_COOKIE'			=> isset($this->config['quick_ads_cookie']) ? $this->config['quick_ads_cookie'] : false,
				'S_QUICK_ADS_COOKIE_TIME'		=> isset($this->config['quick_ads_cookie_time']) ? $this->config['quick_ads_cookie_time'] : 0,
				
				'S_QUICK_ADS_WMIN_LEFT'			=> isset($this->config['quick_ads_wmin_left']) ? $this->config['quick_ads_wmin_left'] : 0,
				'S_QUICK_ADS_HMIN_LEFT'			=> isset($this->config['quick_ads_hmin_left']) ? $this->config['quick_ads_hmin_left'] : 0,
				'S_QUICK_ADS_WMIN_RIGHT'		=> isset($this->config['quick_ads_wmin_right']) ? $this->config['quick_ads_wmin_right'] : 0,
				'S_QUICK_ADS_HMIN_RIGHT'		=> isset($this->config['quick_ads_hmin_right']) ? $this->config['quick_ads_hmin_right'] : 0,
				'S_QUICK_ADS_WMIN_TOP'			=> isset($this->config['quick_ads_wmin_top']) ? $this->config['quick_ads_wmin_top'] : 0,
				'S_QUICK_ADS_HMIN_TOP'			=> isset($this->config['quick_ads_hmin_top']) ? $this->config['quick_ads_hmin_top'] : 0,
				'S_QUICK_ADS_WMIN_BOTTOM'		=> isset($this->config['quick_ads_wmin_bottom']) ? $this->config['quick_ads_wmin_bottom'] : 0,
				'S_QUICK_ADS_HMIN_BOTTOM'		=> isset($this->config['quick_ads_hmin_bottom']) ? $this->config['quick_ads_hmin_bottom'] : 0,
				'S_QUICK_ADS_WMIN_TOP_STATIC'			=> isset($this->config['quick_ads_wmin_top_static']) ? $this->config['quick_ads_wmin_top_static'] : 0,
				'S_QUICK_ADS_HMIN_TOP_STATIC'			=> isset($this->config['quick_ads_hmin_top_static']) ? $this->config['quick_ads_hmin_top_static'] : 0,
				'S_QUICK_ADS_WMIN_BOTTOM_STATIC'		=> isset($this->config['quick_ads_wmin_bottom_static']) ? $this->config['quick_ads_wmin_bottom_static'] : 0,
				'S_QUICK_ADS_HMIN_BOTTOM_STATIC'		=> isset($this->config['quick_ads_hmin_bottom_static']) ? $this->config['quick_ads_hmin_bottom_static'] : 0,
			));
		}
		else
		{
			$this->template->assign_vars(array(
				'S_QUICK_ADS_AVAILABLE'			=> false,
			));
		}
    }
	
	private function quick_ads_rebuild_message($message)
	{
		$quick_ads_template = array(
			'S_USERNAME'		=> ($this->user->data['user_id'] != ANONYMOUS) ? $this->user->data['username'] : $this->user->lang['GUEST'],
			'S_USER_ID'			=> ($this->user->data['user_id'] != ANONYMOUS) ? $this->user->data['user_id'] : '',
			'S_CURRENT_TIME'	=> sprintf($this->user->lang['CURRENT_TIME'], $this->user->format_date(time(), false, true)),
			'SITE_URL'			=> generate_board_url(),
			'FORUM_URL'			=> generate_board_url(true),
			'SITENAME'			=> $this->config['sitename'],
			'SITE_DESCRIPTION'	=> $this->config['site_desc'],
			);
		
		foreach ($quick_ads_template as $key => $value)
		{
			$message = str_replace('{' . $key . '}', $value, $message);
		}
		
		return htmlspecialchars_decode($message);
	}
	
	private function quick_ads_rebuild_select($value)
	{
		$value = (int) $value;
		
		switch ($value)
		{
			case 0:
				return 'hidden';
			break;
			
			case 1:
				return 'visible';
			break;
			
			case 2:
				return 'scroll';
			break;
			
			case 3:
				return 'auto';
			break;
			
			default:
				return 'auto';
			break;
		}
	}
}
