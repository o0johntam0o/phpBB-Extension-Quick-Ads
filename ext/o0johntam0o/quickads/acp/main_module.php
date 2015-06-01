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
		
		$action	= $this->request->variable('action', '');
		$ads_id	= $this->request->variable('ads_id', 0);
		
		$this->tpl_name = 'acp_quick_ads';
		$this->page_title = $this->user->lang('QUICK_ADS_TITLE');
		
		if ($mode == 'quick_ads_config')
		{
			add_form_key('o0johntam0o/acp_quick_ads');
		}
		else if ($mode == 'quick_ads_config_details')
		{
			add_form_key('o0johntam0o/acp_quick_ads_details');
		}
		
		if ($mode == 'quick_ads_config_details')
		{
			global $db, $table_prefix;
			$this->db = $db;
			$this->table_prefix = $table_prefix;
		}

		// **************** INPUT **************** //
		if ($this->request->is_set_post('submit'))
		{
			if ($mode == 'quick_ads_config')
			{
				if (!check_form_key('o0johntam0o/acp_quick_ads'))
				{
					trigger_error('FORM_INVALID');
				}
			
				$this->config->set('quick_ads_allow_bot', $this->request->variable('quick_ads_allow_bot', 0));
				
				if ($this->request->variable('quick_ads_custom_id', '') == '')
				{
					$this->config->set('quick_ads_custom_id', 'quick_ads_');
				}
				else
				{
					$this->config->set('quick_ads_custom_id', $this->request->variable('quick_ads_custom_id', ''));
				}
				
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
				if (!check_form_key('o0johntam0o/acp_quick_ads_details'))
				{
					trigger_error('FORM_INVALID');
				}
				
				$quick_ads_sql = 'SELECT ads_id FROM ' . $this->table_prefix . 'quick_ads';
				$result = $this->db->sql_query($quick_ads_sql);
				
				while ($row = $this->db->sql_fetchrow($result))
				{
					// Onpage string
					$ads_onpage_arr = $this->request->variable('quick_ads_onpage_' . $row['ads_id'], array(0));
					$ads_onpage_sql = '';
					
					foreach ($ads_onpage_arr as $key => $value)
					{
						$value = (int) $value;
						
						switch ($value)
						{
							case 0:
								$ads_onpage_sql .= 'NULL,';
							break;
							
							case 1:
								$ads_onpage_sql .= 'faq,';
							break;
							
							case 2:
								$ads_onpage_sql .= 'index,';
							break;
							
							case 3:
								$ads_onpage_sql .= 'mcp,';
							break;
							
							case 4:
								$ads_onpage_sql .= 'memberlist,';
							break;
							
							case 5:
								$ads_onpage_sql .= 'posting,';
							break;
							
							case 6:
								$ads_onpage_sql .= 'report,';
							break;
							
							case 7:
								$ads_onpage_sql .= 'search,';
							break;
							
							case 8:
								$ads_onpage_sql .= 'ucp,';
							break;
							
							case 9:
								$ads_onpage_sql .= 'viewforum,';
							break;
							
							case 10:
								$ads_onpage_sql .= 'viewonline,';
							break;
							
							case 11:
								$ads_onpage_sql .= 'viewtopic,';
							break;
							// === Custom pages ===
							// case 12:
							//	$ads_onpage_sql .= 'custom_page,';
							// break;
							// === Custom pages ===
							default:
								$ads_onpage_sql .= 'NULL,';
							break;
						}
					}
					
					$ads_onpage_arr = $ads_onpage_sql . 'NULL';
					
					// Group string
					$ads_group_arr = $this->request->variable('quick_ads_group_' . $row['ads_id'], array(0));
					$ads_group_sql = '';
					
					foreach ($ads_group_arr as $key => $value)
					{
						$ads_group_sql .= (int) $value . ',';
					}
					
					$ads_group_arr = $ads_group_sql . 'NULL';
					
					// Main query
					$quick_ads_sql = array(
						'ads_name'		=> utf8_normalize_nfc($this->request->variable('quick_ads_name_' . $row['ads_id'], $this->user->lang['QUICK_ADS_NEW_ADS_NAME'], true)),
						'ads_pos'		=> $this->request->variable('quick_ads_pos_' . $row['ads_id'], 2),
						'ads_onpage'	=> $ads_onpage_arr,
						'ads_text'		=> utf8_normalize_nfc($this->request->variable('quick_ads_text_' . $row['ads_id'], '', true)),
						'ads_width'		=> ($this->request->variable('quick_ads_width_' . $row['ads_id'], 50) < 0) ? 0 : $this->request->variable('quick_ads_width_' . $row['ads_id'], 50),
						'ads_height'	=> ($this->request->variable('quick_ads_height_' . $row['ads_id'], 50) < 0) ? 0 : $this->request->variable('quick_ads_height_' . $row['ads_id'], 50),
						'ads_border'	=> ($this->request->variable('quick_ads_border_' . $row['ads_id'], 1) < 0) ? 0 : $this->request->variable('quick_ads_border_' . $row['ads_id'], 1),
						'ads_bg_img'	=> utf8_normalize_nfc($this->request->variable('quick_ads_bg_img_' . $row['ads_id'], '')),
						'ads_bg_color'	=> utf8_normalize_nfc($this->request->variable('quick_ads_bg_color_' . $row['ads_id'], 'transparent')),
						'ads_href'		=> utf8_normalize_nfc($this->request->variable('quick_ads_href_' . $row['ads_id'], '')),
						'ads_overf'		=> $this->request->variable('quick_ads_overf_' . $row['ads_id'], 0),
						'ads_group'		=> $ads_group_arr,
						'ads_priority'	=> $this->request->variable('quick_ads_priority_' . $row['ads_id'], 99),
					);
					$quick_ads_sql = 'UPDATE ' . $this->table_prefix . 'quick_ads' . '
							SET ' . $this->db->sql_build_array('UPDATE', $quick_ads_sql) . '
							WHERE ads_id = ' . (int)$row['ads_id'];
					
					$this->db->sql_query($quick_ads_sql);
				}
				$this->db->sql_freeresult($result);
			}
			
			$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'QUICK_ADS_LOG_MSG');
			trigger_error($this->user->lang('QUICK_ADS_SAVED') . adm_back_link($this->u_action));
		}
		else if ($mode == 'quick_ads_config_details')
		{
			if ($this->request->is_set_post('add_field'))
			{
				if (!check_form_key('o0johntam0o/acp_quick_ads_details'))
				{
					trigger_error('FORM_INVALID');
				}
				
				$quick_ads_sql = array(
					'ads_name'		=> utf8_normalize_nfc($this->request->variable('quick_ads_name_new', $this->user->lang['QUICK_ADS_NEW_ADS_NAME'], true)),
					'ads_pos'		=> $this->request->variable('quick_ads_pos_new', 2),
					'ads_text'		=> utf8_normalize_nfc($this->request->variable('quick_ads_text_new', '', true)),
					'ads_width'		=> ($this->request->variable('quick_ads_width_new', 50) < 0) ? 0 : $this->request->variable('quick_ads_width_new', 50),
					'ads_height'	=> ($this->request->variable('quick_ads_height_new', 50) < 0) ? 0 : $this->request->variable('quick_ads_height_new', 50),
					'ads_bg_img'	=> utf8_normalize_nfc($this->request->variable('quick_ads_bg_img_new', '')),
				);
				$quick_ads_sql = 'INSERT INTO ' . $this->table_prefix . 'quick_ads ' . $this->db->sql_build_array('INSERT', $quick_ads_sql);
				
				$this->db->sql_query($quick_ads_sql);
				
				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'QUICK_ADS_LOG_MSG');
				trigger_error($this->user->lang('QUICK_ADS_SAVED') . adm_back_link($this->u_action));
			}
			else if ($action == 'delete')
			{
				if (confirm_box(true))
				{
					$quick_ads_sql = 'DELETE FROM ' . $this->table_prefix . 'quick_ads WHERE ads_id=' . $ads_id;
					$this->db->sql_query($quick_ads_sql);
					
					$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'QUICK_ADS_LOG_MSG');

					if ($request->is_ajax())
					{
						$json_response = new \phpbb\json_response;
						$json_response->send(array(
							'MESSAGE_TITLE'	=> $this->user->lang['INFORMATION'],
							'MESSAGE_TEXT'	=> $this->user->lang['QUICK_ADS_DEL_ADS_DELETED'],
							'REFRESH_DATA'	=> array(
								'time'	=> 3
							)
						));
					}
				}
				else
				{
					confirm_box(false, $this->user->lang['QUICK_ADS_DEL_ADS_CONFIRM'], build_hidden_fields(array(
						'i'			=> $id,
						'mode'		=> $mode,
						'ads_id'	=> $ads_id))
					);
				}
			}
		}
		
		// **************** OUTPUT **************** //
		if ($mode == 'quick_ads_config')
		{
			$this->template->assign_vars(array(
				'S_QUICK_ADS_ACP_INDEX'		=> true,
				'S_QUICK_ADS_ALLOW_BOT'		=> isset($this->config['quick_ads_allow_bot']) ? $this->config['quick_ads_allow_bot'] : false,
				'S_QUICK_ADS_CUSTOM_ID'		=> isset($this->config['quick_ads_custom_id']) ? $this->config['quick_ads_custom_id'] : '',
				'S_QUICK_ADS_ZINDEX'		=> isset($this->config['quick_ads_zindex']) ? $this->config['quick_ads_zindex'] : 0,
				'S_QUICK_ADS_CLOSEBT'		=> isset($this->config['quick_ads_closebt']) ? $this->config['quick_ads_closebt'] : 1,
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
					'U_QUICK_ADS_DELETE'			=> $this->u_action . '&amp;action=delete&amp;ads_id=' . $row['ads_id'],
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
					// 'QUICK_ADS_ONPAGE_CUSTOM_PAGE'	=> in_array('custom_page', $ads_onpage_arr) ? 1 : 0,
					// === Custom pages ===
					'QUICK_ADS_TEXT'				=> $row['ads_text'],
					'QUICK_ADS_WIDTH'				=> $row['ads_width'],
					'QUICK_ADS_HEIGHT'				=> $row['ads_height'],
					'QUICK_ADS_BORDER'				=> $row['ads_border'],
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
