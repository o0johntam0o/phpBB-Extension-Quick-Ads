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

class main_module
{
	/** @var ContainerInterface */
	protected $phpbb_container;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\template\template */
	protected $template;
	
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\log\log */
	protected $log;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var string */
	protected $table_prefix;

	/** @var string */
	public $u_action;
	
	function main($id, $mode)
	{
		global $phpbb_container, $user, $template, $config, $request;
		
		$this->phpbb_container = $phpbb_container;
		
		$this->user = $user;
		$this->template = $template;
		$this->config = $config;
		$this->request = $request;
		$this->log = $this->phpbb_container->get('log');
		
		$this->tpl_name = 'acp_quick_ads';
		$this->page_title = $this->user->lang('QUICK_ADS_TITLE');
		add_form_key('o0johntam0o/acp_quick_ads');
		
		if ($mode == 'quick_ads_config_details')
		{
			global $db, $table_prefix;
			$this->db = $db;
			$this->table_prefix = $table_prefix;
		}

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('o0johntam0o/acp_quick_ads'))
			{
				trigger_error('FORM_INVALID');
			}
			// **************** INPUT **************** //
			if ($mode == 'quick_ads_config')
			{
				$this->config->set('quick_ads_enable', $this->request->variable('quick_ads_enable', 0));
				$this->config->set('quick_ads_allow_bot', $this->request->variable('quick_ads_allow_bot', 0));
				$this->config->set('quick_ads_custom_id', $this->request->variable('quick_ads_custom_id', ''));
				$this->config->set('quick_ads_zindex', $this->request->variable('quick_ads_zindex', 100));
				$this->config->set('quick_ads_closebt', $this->request->variable('quick_ads_closebt', 1));
				$this->config->set('quick_ads_cookie', $this->request->variable('quick_ads_cookie', 0));
				
				$this->config->set('quick_ads_cookie_time', ($this->request->variable('quick_ads_cookie_time', 0) < 0) ? 0 : $this->request->variable('quick_ads_cookie_time', 0));
				$this->config->set('quick_ads_wmin_left', ($this->request->variable('quick_ads_wmin_left', 0) < 0) ? 0 : $this->request->variable('quick_ads_wmin_left', 0));
				$this->config->set('quick_ads_hmin_left', ($this->request->variable('quick_ads_hmin_left', 0) < 0) ? 0 : $this->request->variable('quick_ads_hmin_left', 0));
				$this->config->set('quick_ads_wmin_right', ($this->request->variable('quick_ads_wmin_right', 0) < 0) ? 0 : $this->request->variable('quick_ads_wmin_right', 0));
				$this->config->set('quick_ads_hmin_right', ($this->request->variable('quick_ads_hmin_right', 0) < 0) ? 0 : $this->request->variable('quick_ads_hmin_right', 0));
				$this->config->set('quick_ads_wmin_top', ($this->request->variable('quick_ads_wmin_top', 0) < 0) ? 0 : $this->request->variable('quick_ads_wmin_top', 0));
				$this->config->set('quick_ads_hmin_top', ($this->request->variable('quick_ads_hmin_top', 0) < 0) ? 0 : $this->request->variable('quick_ads_hmin_top', 0));
				$this->config->set('quick_ads_wmin_bottom', ($this->request->variable('quick_ads_wmin_bottom', 0) < 0) ? 0 : $this->request->variable('quick_ads_wmin_bottom', 0));
				$this->config->set('quick_ads_hmin_bottom', ($this->request->variable('quick_ads_hmin_bottom', 0) < 0) ? 0 : $this->request->variable('quick_ads_hmin_bottom', 0));
			}
			else if ($mode == 'quick_ads_config_details')
			{
				$quick_ads_sql = 'SELECT ads_id FROM ' . $this->table_prefix . 'quick_ads';
				$result = $this->db->sql_query($quick_ads_sql);
				
				while ($row = $this->db->sql_fetchrow($result))
				{
					if ($this->request->variable('quick_ads_del_' . $row['ads_id'], 0))
					{
						$quick_ads_sql = 'DELETE FROM ' . $this->table_prefix . 'quick_ads WHERE ads_id=' . $row['ads_id'];
					}
					else
					{
						$ads_onpage_arr = $this->request->variable('quick_ads_onpage_' . $row['ads_id'], array(0));
						$ads_onpage_sql = '';
						
						foreach ($ads_onpage_arr as $key => $value)
						{
							// -----------------------------------
							$value = (int) $value;
							
							switch ($value)
							{
								case 0:
									$value = 'NULL';
								break;
								
								case 1:
									$value = 'faq';
								break;
								
								case 2:
									$value = 'index';
								break;
								
								case 3:
									$value = 'mcp';
								break;
								
								case 4:
									$value = 'memberlist';
								break;
								
								case 5:
									$value = 'posting';
								break;
								
								case 6:
									$value = 'report';
								break;
								
								case 7:
									$value = 'search';
								break;
								
								case 8:
									$value = 'ucp';
								break;
								
								case 9:
									$value = 'viewforum';
								break;
								
								case 10:
									$value = 'viewonline';
								break;
								
								case 11:
									$value = 'viewtopic';
								break;
								// === Custom pages ===
								// case 12:
								//	$value = 'your_stuff';
								// break;
								// === Custom pages ===
								default:
									$value = 'NULL';
								break;
							}
							// -------------------------------------
							$ads_onpage_sql .= $value . ',';
						}
						
						$ads_onpage_arr = $ads_onpage_sql . 'NULL';
						$ads_group_arr = $this->request->variable('quick_ads_group_' . $row['ads_id'], array(0));
						$ads_group_sql = '';
						
						foreach ($ads_group_arr as $key => $value)
						{
							$ads_group_sql .= (int) $value . ',';
						}
						
						$ads_group_arr = $ads_group_sql . 'NULL';
						$quick_ads_sql = array(
							'ads_name'		=> utf8_normalize_nfc($this->request->variable('quick_ads_name_' . $row['ads_id'], 'Undefined', true)),
							'ads_pos'		=> $this->request->variable('quick_ads_pos_' . $row['ads_id'], 2),
							'ads_onpage'	=> $ads_onpage_arr,
							'ads_text'		=> utf8_normalize_nfc($this->request->variable('quick_ads_text_' . $row['ads_id'], '', true)),
							'ads_width'		=> ($this->request->variable('quick_ads_width_' . $row['ads_id'], 50) < 0) ? 0 : $this->request->variable('quick_ads_width_' . $row['ads_id'], 50),
							'ads_height'	=> ($this->request->variable('quick_ads_height_' . $row['ads_id'], 50) < 0) ? 0 : $this->request->variable('quick_ads_height_' . $row['ads_id'], 50),
							'ads_bg_img'	=> utf8_normalize_nfc($this->request->variable('quick_ads_bg_img_' . $row['ads_id'], '')),
							'ads_bg_color'	=> utf8_normalize_nfc($this->request->variable('quick_ads_bg_color_' . $row['ads_id'], '#ffffff')),
							'ads_href'		=> utf8_normalize_nfc($this->request->variable('quick_ads_href_' . $row['ads_id'], '')),
							'ads_overf'		=> $this->request->variable('quick_ads_overf_' . $row['ads_id'], 0),
							'ads_group'		=> $ads_group_arr,
							'ads_priority'	=> $this->request->variable('quick_ads_priority_' . $row['ads_id'], 99),
						);
						$quick_ads_sql = 'UPDATE ' . $this->table_prefix . 'quick_ads' . '
								SET ' . $this->db->sql_build_array('UPDATE', $quick_ads_sql) . '
								WHERE ads_id = ' . $row['ads_id'];
					}
					$this->db->sql_query($quick_ads_sql);
				}
				$this->db->sql_freeresult($result);
			}
			
			$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'QUICK_ADS_LOG_MSG');
			trigger_error($this->user->lang('QUICK_ADS_SAVED') . adm_back_link($this->u_action));
		}
		else if ($this->request->is_set_post('add_field') && $mode == 'quick_ads_config_details')
		{
			if (!check_form_key('o0johntam0o/acp_quick_ads'))
			{
				trigger_error('FORM_INVALID');
			}
			
			$quick_ads_name = $this->db->sql_escape(utf8_normalize_nfc($this->request->variable('quick_ads_add_new', '', true)));
			$quick_ads_sql = 'INSERT INTO ' . $this->table_prefix . 'quick_ads(ads_text, ads_name) VALUES("","' . $quick_ads_name . '")';
			$this->db->sql_query($quick_ads_sql);
			
			$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'QUICK_ADS_LOG_MSG');
			trigger_error($this->user->lang('QUICK_ADS_SAVED') . adm_back_link($this->u_action));
		}
		// **************** OUTPUT **************** //
		if ($mode == 'quick_ads_config')
		{
			$this->template->assign_vars(array(
				'S_QUICK_ADS_ACP_INDEX'		=> true,
				'S_QUICK_ADS_ENABLE'		=> isset($this->config['quick_ads_enable']) ? $this->config['quick_ads_enable'] : false,
				'S_QUICK_ADS_ALLOW_BOT'		=> isset($this->config['quick_ads_allow_bot']) ? $this->config['quick_ads_allow_bot'] : false,
				'S_QUICK_ADS_CUSTOM_ID'		=> isset($this->config['quick_ads_custom_id']) ? $this->config['quick_ads_custom_id'] : '',
				'S_QUICK_ADS_ZINDEX'		=> isset($this->config['quick_ads_zindex']) ? $this->config['quick_ads_zindex'] : 0,
				'S_QUICK_ADS_CLOSEBT'		=> isset($this->config['quick_ads_closebt']) ? $this->config['quick_ads_closebt'] : false,
				'S_QUICK_ADS_COOKIE'		=> isset($this->config['quick_ads_cookie']) ? $this->config['quick_ads_cookie'] : 0,
				'S_QUICK_ADS_COOKIE_TIME'	=> isset($this->config['quick_ads_cookie_time']) ? $this->config['quick_ads_cookie_time'] : 0,
				
				'S_QUICK_ADS_WMIN_LEFT'		=> isset($this->config['quick_ads_wmin_left']) ? $this->config['quick_ads_wmin_left'] : 0,
				'S_QUICK_ADS_HMIN_LEFT'		=> isset($this->config['quick_ads_hmin_left']) ? $this->config['quick_ads_hmin_left'] : 0,
				'S_QUICK_ADS_WMIN_RIGHT'	=> isset($this->config['quick_ads_wmin_right']) ? $this->config['quick_ads_wmin_right'] : 0,
				'S_QUICK_ADS_HMIN_RIGHT'	=> isset($this->config['quick_ads_hmin_right']) ? $this->config['quick_ads_hmin_right'] : 0,
				'S_QUICK_ADS_WMIN_TOP'		=> isset($this->config['quick_ads_wmin_top']) ? $this->config['quick_ads_wmin_top'] : 0,
				'S_QUICK_ADS_HMIN_TOP'		=> isset($this->config['quick_ads_hmin_top']) ? $this->config['quick_ads_hmin_top'] : 0,
				'S_QUICK_ADS_WMIN_BOTTOM'	=> isset($this->config['quick_ads_wmin_bottom']) ? $this->config['quick_ads_wmin_bottom'] : 0,
				'S_QUICK_ADS_HMIN_BOTTOM'	=> isset($this->config['quick_ads_hmin_bottom']) ? $this->config['quick_ads_hmin_bottom'] : 0,
			));
		}
		else if ($mode == 'quick_ads_config_details')
		{
			// Fetch group items
			$group_sql = array(
				'SELECT'	=> 'g.group_id, g.group_name, g.group_type',
				'FROM'		=> array(GROUPS_TABLE => 'g'),
				'ORDER_BY'	=> 'g.group_id ASC',
				);
			
			// Fetch Quick Ads items
			$quick_ads_sql = array(
				'SELECT'	=> 'qa.*',
				'FROM'		=> array($this->table_prefix . 'quick_ads' => 'qa'),
				'ORDER_BY'	=> 'qa.ads_name ASC',
				);
			$result = $this->db->sql_query($this->db->sql_build_query('SELECT', $quick_ads_sql));
			
			while ($row = $this->db->sql_fetchrow($result))
			{
				$ads_onpage_arr = explode(',', $row['ads_onpage']);
				$ads_group_arr = explode(',', $row['ads_group']);
				$this->template->assign_block_vars('quick_ads_row', array(
					'QUICK_ADS_LEGEND'				=> sprintf($this->user->lang('QUICK_ADS_LEGEND'), $row['ads_name'], $row['ads_priority']),
					'QUICK_ADS_ID'					=> $row['ads_id'],
					'QUICK_ADS_NAME'				=> $row['ads_name'],
					'QUICK_ADS_POS'					=> $row['ads_pos'],
					'QUICK_ADS_ONPAGE_FAQ'			=> in_array('faq', $ads_onpage_arr) ? 1 : 0,
					'QUICK_ADS_ONPAGE_INDEX'		=> in_array('index', $ads_onpage_arr) ? 1 : 0,
					'QUICK_ADS_ONPAGE_MCP'			=> in_array('mcp', $ads_onpage_arr) ? 1 : 0,
					'QUICK_ADS_ONPAGE_MEMBERLIST'	=> in_array('memberlist', $ads_onpage_arr) ? 1 : 0,
					'QUICK_ADS_ONPAGE_POSTING'		=> in_array('posting', $ads_onpage_arr) ? 1 : 0,
					'QUICK_ADS_ONPAGE_REPORT'		=> in_array('report', $ads_onpage_arr) ? 1 : 0,
					'QUICK_ADS_ONPAGE_SEARCH'		=> in_array('search', $ads_onpage_arr) ? 1 : 0,
					'QUICK_ADS_ONPAGE_UCP'			=> in_array('ucp', $ads_onpage_arr) ? 1 : 0,
					'QUICK_ADS_ONPAGE_VIEWFORUM'	=> in_array('viewforum', $ads_onpage_arr) ? 1 : 0,
					'QUICK_ADS_ONPAGE_VIEWONLINE'	=> in_array('viewonline', $ads_onpage_arr) ? 1 : 0,
					'QUICK_ADS_ONPAGE_VIEWTOPIC'	=> in_array('viewtopic', $ads_onpage_arr) ? 1 : 0,
					// === Custom pages ===
					// 'QUICK_ADS_ONPAGE_YOUR_STUFF'	=> in_array('your_stuff', $ads_onpage_arr) ? 1 : 0,
					// === Custom pages ===
					'QUICK_ADS_TEXT'				=> $row['ads_text'],
					'QUICK_ADS_WIDTH'				=> $row['ads_width'],
					'QUICK_ADS_HEIGHT'				=> $row['ads_height'],
					'QUICK_ADS_BG_IMG'				=> $row['ads_bg_img'],
					'QUICK_ADS_BG_COLOR'			=> $row['ads_bg_color'],
					'QUICK_ADS_HREF'				=> $row['ads_href'],
					'QUICK_ADS_OVERF'				=> $row['ads_overf'],
					'QUICK_ADS_PRIORITY'			=> $row['ads_priority'],
					));
					
				$result2 = $this->db->sql_query($this->db->sql_build_query('SELECT', $group_sql));
				
				while ($row2 = $this->db->sql_fetchrow($result2))
				{
					if ($row2['group_name'] != 'BOTS')
					{
						$this->template->assign_block_vars('quick_ads_row.group', array(
							'GROUP_ID'			=> $row2['group_id'],
							'GROUP_NAME'		=> ($row2['group_type'] == GROUP_SPECIAL) ? $this->user->lang('G_' . $row2['group_name']) : $row2['group_name'],
							'GROUP_CHECKED'		=> in_array($row2['group_id'], $ads_group_arr) ? 1 : 0,
							));
					}
				}
				$this->db->sql_freeresult($result2);
			}
			$this->db->sql_freeresult($result);
			
			$this->template->assign_vars(array(
				'S_QUICK_ADS_TEXT_EXPLAIN'	=> sprintf($this->user->lang('QUICK_ADS_TEXT_EXPLAIN'), $this->user->data['username'], $this->user->data['user_id'], sprintf($this->user->lang('CURRENT_TIME'), $this->user->format_date(time(), false, true)), generate_board_url(true), generate_board_url(), $this->config['sitename'], $this->config['site_desc']),
			));
		}
		
		$this->template->assign_vars(array(
			'U_ACTION'						=> $this->u_action,
			'S_QUICK_ADS_VERSION'			=> isset($this->config['quick_ads_version']) ? $this->config['quick_ads_version'] : false,
		));
	}
}
