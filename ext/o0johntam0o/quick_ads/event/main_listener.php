<?php

/**
*
* @package phpBB Extension - Quick Ads
* @copyright (c) 2014 o0johntam0o
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace o0johntam0o\quick_ads\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class main_listener implements EventSubscriberInterface
{
	protected $helper, $template, $user, $config, $request, $db, $table_prefix, $root_path, $php_ext;
	
	public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user, \phpbb\config\config $config, \phpbb\request\request $request, \phpbb\db\driver\driver $db, $table_prefix, $root_path, $php_ext)
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
            'ext_name' => 'o0johntam0o/quick_ads',
            'lang_set' => 'quick_ads',
        );
        $event['lang_set_ext'] = $lang_set_ext;
    }
	
    public function load_quick_ads($event)
    {
		if ($this->user->page['page_dir'] != '')
		{
			// === Custom pages ===
			// if ($user->page['page_dir'] != 'your-stuff')
			// {
			//	return;
			// }
			// === Custom pages ===
			return;
		}
		
		// Check page is being used
		$quick_ads_script_name = str_replace('.' . $this->php_ext, '', $this->user->page['page_name']);
		// === Custom pages ===
		// if ($user->page['page_dir'] == 'your-stuff')
		// {
		//	$quick_ads_script_name = 'your_stuff';
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
			// 'your_stuff',
			// === Custom pages ===
		);
		
		if (!in_array($quick_ads_script_name, $check))
		{
			return;
		}
		
		$total = $top = $bottom = $left = $right = 0;
		
		// Assign Quick Ads data into template
		$quick_ads_sql = array(
			'SELECT'	=> 'qa.*',
			'FROM'		=> array($this->table_prefix . 'quick_ads' => 'qa'),
			'ORDER_BY'	=> 'qa.ads_priority ASC',
			);
		$result = $this->db->sql_query($this->db->sql_build_query('SELECT', $quick_ads_sql));
		while ($row = $this->db->sql_fetchrow($result))
		{
			$ads_onpage_arr = explode(',', $row['ads_onpage']);
			$ads_check_group = explode(',', $row['ads_group']);
			if (in_array($quick_ads_script_name, $ads_onpage_arr) && $row['ads_pos'] != 0 && in_array($this->user->data['group_id'], $ads_check_group))
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
				
				$this->template->assign_block_vars($block_name, array(
					'QUICK_ADS_ID'			=> $row['ads_id'],
					'QUICK_ADS_TEXT'		=> $this->quick_ads_rebuild_message($row['ads_text']),
					'QUICK_ADS_WIDTH'		=> $row['ads_width'],
					'QUICK_ADS_HEIGHT'		=> $row['ads_height'],
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
				'S_QUICK_ADS_AVAILABLE'			=> isset($this->config['quick_ads_enable']) ? $this->config['quick_ads_enable'] : false,
				'S_QUICK_ADS_CUSTOM_ID'			=> isset($this->config['quick_ads_custom_id']) ? $this->config['quick_ads_custom_id'] : 'quick_ads_',
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
				
				'S_QUICK_ADS_JQUERY_PATH'		=> $this->root_path . 'ext/o0johntam0o/quick_ads/styles/prosilver/template/jquery-1.11.1.min.js',
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
