<?php

/**
*
* @package phpBB Extension - Quick Ads
* @copyright (c) 2014 o0johntam0o
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace o0johntam0o\quick_ads\acp;

class main_module
{
	var $u_action;
	
	function main($id, $mode)
	{
		global $user, $template, $config;
		global $request, $phpbb_log;
		
		if ($mode == 'quick_ads_config_details')
		{
			global $db, $table_prefix;
		}
		
		$this->tpl_name = 'acp_quick_ads';
		$this->page_title = $user->lang['QUICK_ADS_TITLE_ACP'];
		add_form_key('o0johntam0o/acp_quick_ads');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('o0johntam0o/acp_quick_ads'))
			{
				trigger_error('FORM_INVALID');
			}
			// **************** INPUT **************** //
			if ($mode == 'quick_ads_config')
			{
				$config->set('quick_ads_enable', $request->variable('quick_ads_enable', 0));
				$config->set('quick_ads_allow_bot', $request->variable('quick_ads_allow_bot', 0));
				$config->set('quick_ads_custom_id', $request->variable('quick_ads_custom_id', ''));
				$config->set('quick_ads_zindex', $request->variable('quick_ads_zindex', 100));
				$config->set('quick_ads_closebt', $request->variable('quick_ads_closebt', 1));
				$config->set('quick_ads_cookie', $request->variable('quick_ads_cookie', 0));
				
				$config->set('quick_ads_cookie_time', ($request->variable('quick_ads_cookie_time', 0) < 0) ? 0 : $request->variable('quick_ads_cookie_time', 0));
				$config->set('quick_ads_wmin_left', ($request->variable('quick_ads_wmin_left', 0) < 0) ? 0 : $request->variable('quick_ads_wmin_left', 0));
				$config->set('quick_ads_hmin_left', ($request->variable('quick_ads_hmin_left', 0) < 0) ? 0 : $request->variable('quick_ads_hmin_left', 0));
				$config->set('quick_ads_wmin_right', ($request->variable('quick_ads_wmin_right', 0) < 0) ? 0 : $request->variable('quick_ads_wmin_right', 0));
				$config->set('quick_ads_hmin_right', ($request->variable('quick_ads_hmin_right', 0) < 0) ? 0 : $request->variable('quick_ads_hmin_right', 0));
				$config->set('quick_ads_wmin_top', ($request->variable('quick_ads_wmin_top', 0) < 0) ? 0 : $request->variable('quick_ads_wmin_top', 0));
				$config->set('quick_ads_hmin_top', ($request->variable('quick_ads_hmin_top', 0) < 0) ? 0 : $request->variable('quick_ads_hmin_top', 0));
				$config->set('quick_ads_wmin_bottom', ($request->variable('quick_ads_wmin_bottom', 0) < 0) ? 0 : $request->variable('quick_ads_wmin_bottom', 0));
				$config->set('quick_ads_hmin_bottom', ($request->variable('quick_ads_hmin_bottom', 0) < 0) ? 0 : $request->variable('quick_ads_hmin_bottom', 0));
			}
			else if ($mode == 'quick_ads_config_details')
			{
				$quick_ads_sql = 'SELECT ads_id FROM ' . $table_prefix . 'quick_ads';
				$result = $db->sql_query($quick_ads_sql);
				
				while ($row = $db->sql_fetchrow($result))
				{
					if ($request->variable('quick_ads_del_' . $row['ads_id'], 0))
					{
						$quick_ads_sql = 'DELETE FROM ' . $table_prefix . 'quick_ads WHERE ads_id=' . $row['ads_id'];
					}
					else
					{
						$ads_onpage_arr = $request->variable('quick_ads_onpage_' . $row['ads_id'], array(0));
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
						$ads_group_arr = $request->variable('quick_ads_group_' . $row['ads_id'], array(0));
						$ads_group_sql = '';
						
						foreach ($ads_group_arr as $key => $value)
						{
							$ads_group_sql .= (int) $value . ',';
						}
						
						$ads_group_arr = $ads_group_sql . 'NULL';
						$quick_ads_sql = array(
							'ads_name'		=> utf8_normalize_nfc($request->variable('quick_ads_name_' . $row['ads_id'], 'Undefined', true)),
							'ads_pos'		=> $request->variable('quick_ads_pos_' . $row['ads_id'], 2),
							'ads_onpage'	=> $ads_onpage_arr,
							'ads_text'		=> utf8_normalize_nfc($request->variable('quick_ads_text_' . $row['ads_id'], '', true)),
							'ads_width'		=> ($request->variable('quick_ads_width_' . $row['ads_id'], 50) < 0) ? 0 : $request->variable('quick_ads_width_' . $row['ads_id'], 50),
							'ads_height'	=> ($request->variable('quick_ads_height_' . $row['ads_id'], 50) < 0) ? 0 : $request->variable('quick_ads_height_' . $row['ads_id'], 50),
							'ads_bg_img'	=> utf8_normalize_nfc($request->variable('quick_ads_bg_img_' . $row['ads_id'], '')),
							'ads_bg_color'	=> utf8_normalize_nfc($request->variable('quick_ads_bg_color_' . $row['ads_id'], '#ffffff')),
							'ads_href'		=> utf8_normalize_nfc($request->variable('quick_ads_href_' . $row['ads_id'], '')),
							'ads_overf'		=> $request->variable('quick_ads_overf_' . $row['ads_id'], 0),
							'ads_group'		=> $ads_group_arr,
							'ads_priority'	=> $request->variable('quick_ads_priority_' . $row['ads_id'], 99),
						);
						$quick_ads_sql = 'UPDATE ' . $table_prefix . 'quick_ads' . '
								SET ' . $db->sql_build_array('UPDATE', $quick_ads_sql) . '
								WHERE ads_id = ' . $row['ads_id'];
					}
					$db->sql_query($quick_ads_sql);
				}
				$db->sql_freeresult($result);
			}
			
			$phpbb_log->add('admin', $user->data['user_id'], $user->ip, 'QUICK_ADS_LOG_MSG');
			trigger_error($user->lang['QUICK_ADS_SAVED'] . adm_back_link($this->u_action));
		}
		else if ($request->is_set_post('add_field') && $mode == 'quick_ads_config_details')
		{
			if (!check_form_key('o0johntam0o/acp_quick_ads'))
			{
				trigger_error('FORM_INVALID');
			}
			
			$quick_ads_name = $db->sql_escape(utf8_normalize_nfc($request->variable('quick_ads_add_new', '', true)));
			$quick_ads_sql = 'INSERT INTO ' . $table_prefix . 'quick_ads(ads_text, ads_name) VALUES("","' . $quick_ads_name . '")';
			$db->sql_query($quick_ads_sql);
			
			$phpbb_log->add('admin', $user->data['user_id'], $user->ip, 'QUICK_ADS_LOG_MSG');
			trigger_error($user->lang['QUICK_ADS_SAVED'] . adm_back_link($this->u_action));
		}
		// **************** OUTPUT **************** //
		if ($mode == 'quick_ads_config')
		{
			$template->assign_vars(array(
				'S_QUICK_ADS_ACP_INDEX'		=> true,
				'S_QUICK_ADS_ENABLE'		=> isset($config['quick_ads_enable']) ? $config['quick_ads_enable'] : false,
				'S_QUICK_ADS_ALLOW_BOT'		=> isset($config['quick_ads_allow_bot']) ? $config['quick_ads_allow_bot'] : false,
				'S_QUICK_ADS_CUSTOM_ID'		=> isset($config['quick_ads_custom_id']) ? $config['quick_ads_custom_id'] : '',
				'S_QUICK_ADS_ZINDEX'		=> isset($config['quick_ads_zindex']) ? $config['quick_ads_zindex'] : 0,
				'S_QUICK_ADS_CLOSEBT'		=> isset($config['quick_ads_closebt']) ? $config['quick_ads_closebt'] : false,
				'S_QUICK_ADS_COOKIE'		=> isset($config['quick_ads_cookie']) ? $config['quick_ads_cookie'] : 0,
				'S_QUICK_ADS_COOKIE_TIME'	=> isset($config['quick_ads_cookie_time']) ? $config['quick_ads_cookie_time'] : 0,
				
				'S_QUICK_ADS_WMIN_LEFT'		=> isset($config['quick_ads_wmin_left']) ? $config['quick_ads_wmin_left'] : 0,
				'S_QUICK_ADS_HMIN_LEFT'		=> isset($config['quick_ads_hmin_left']) ? $config['quick_ads_hmin_left'] : 0,
				'S_QUICK_ADS_WMIN_RIGHT'	=> isset($config['quick_ads_wmin_right']) ? $config['quick_ads_wmin_right'] : 0,
				'S_QUICK_ADS_HMIN_RIGHT'	=> isset($config['quick_ads_hmin_right']) ? $config['quick_ads_hmin_right'] : 0,
				'S_QUICK_ADS_WMIN_TOP'		=> isset($config['quick_ads_wmin_top']) ? $config['quick_ads_wmin_top'] : 0,
				'S_QUICK_ADS_HMIN_TOP'		=> isset($config['quick_ads_hmin_top']) ? $config['quick_ads_hmin_top'] : 0,
				'S_QUICK_ADS_WMIN_BOTTOM'	=> isset($config['quick_ads_wmin_bottom']) ? $config['quick_ads_wmin_bottom'] : 0,
				'S_QUICK_ADS_HMIN_BOTTOM'	=> isset($config['quick_ads_hmin_bottom']) ? $config['quick_ads_hmin_bottom'] : 0,
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
				'FROM'		=> array($table_prefix . 'quick_ads' => 'qa'),
				'ORDER_BY'	=> 'qa.ads_name ASC',
				);
			$result = $db->sql_query($db->sql_build_query('SELECT', $quick_ads_sql));
			
			while ($row = $db->sql_fetchrow($result))
			{
				$ads_onpage_arr = explode(',', $row['ads_onpage']);
				$ads_group_arr = explode(',', $row['ads_group']);
				$template->assign_block_vars('quick_ads_row', array(
					'QUICK_ADS_LEGEND'				=> sprintf($user->lang['QUICK_ADS_LEGEND'], $row['ads_name'], $row['ads_priority']),
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
					
				$result2 = $db->sql_query($db->sql_build_query('SELECT', $group_sql));
				
				while ($row2 = $db->sql_fetchrow($result2))
				{
					if ($row2['group_name'] != 'BOTS')
					{
						$template->assign_block_vars('quick_ads_row.group', array(
							'GROUP_ID'			=> $row2['group_id'],
							'GROUP_NAME'		=> ($row2['group_type'] == GROUP_SPECIAL) ? $user->lang['G_' . $row2['group_name']] : $row2['group_name'],
							'GROUP_CHECKED'		=> in_array($row2['group_id'], $ads_group_arr) ? 1 : 0,
							));
					}
				}
				$db->sql_freeresult($result2);
			}
			$db->sql_freeresult($result);
			
			$template->assign_vars(array(
				'S_QUICK_ADS_TEXT_EXPLAIN'	=> sprintf($user->lang['QUICK_ADS_TEXT_EXPLAIN'], $user->data['username'], $user->data['user_id'], sprintf($user->lang['CURRENT_TIME'], $user->format_date(time(), false, true)), generate_board_url(true), generate_board_url(), $config['sitename'], $config['site_desc']),
			));
		}
		
		$template->assign_vars(array(
			'U_ACTION'						=> $this->u_action,
			'S_QUICK_ADS_VERSION'			=> isset($config['quick_ads_version']) ? $config['quick_ads_version'] : false,
		));
	}
}
