<?php
/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\customcode\acp;

use marttiphpbb\customcode\model\customcode_directory;
use marttiphpbb\customcode\util\cnst;

class main_module
{
	public $u_action;

	function main($id, $mode)
	{
		global $phpbb_admin_path, $phpbb_container;

		$language = $phpbb_container->get('language');
		$config = $phpbb_container->get('config');
		$template = $phpbb_container->get('template');
		$request = $phpbb_container->get('request');
		$cache = $phpbb_container->get('cache');
		$user = $phpbb_container->get('user');

		$phpbb_root_path = $phpbb_container->getParameter('core.root_path');
		$php_ext = $phpbb_container->getParameter('core.php_ext');

		$language->add_lang('acp', 'marttiphpbb/customcode');
		add_form_key('marttiphpbb/customcode');

		$customcode_directory = new customcode_directory($language, $phpbb_root_path);

		$filenames = $customcode_directory->get_filenames();

		if ($config['tpl_allow_php'])
		{
			$params = [
				'i'		=> 'acp_board',
				'mode'	=> 'security',
			];
	
			$link = append_sid($phpbb_admin_path . 'index.' . $php_ext, 
				$params, true, $user->session_id) . '#tpl_allow_php';
			$template->assign_var(
				cnst::L_ACP . '_INCLUDEPHP_WARNING', 
				sprintf($language->lang(cnst::L_ACP . '_INCLUDEPHP_WARNING'),
				'<a href="' . $link . '">', '</a>'
			));
		}

		switch($mode)
		{
			case 'edit':
				$this->tpl_name = 'edit';
				$this->page_title = $language->lang(cnst::L_ACP . '_EDIT');

				$file =	$request->variable('filename', '', true);
		
				$save = $request->is_set_post('save');
				$save_purge_cache = $request->is_set_post('save_purge_cache');

				if ($save || $save_purge_cache)
				{
					$data	= utf8_normalize_nfc($request->variable('file_data', '', true));
					$data	= htmlspecialchars_decode($data);

					if (confirm_box(true))
					{
						$customcode_directory->save_to_file($file, $data);

						if ($save_purge_cache)
						{
							$config->increment('assets_version', 1);
							$cache->purge();
							trigger_error(sprintf($language->lang(cnst::L_ACP . '_FILE_SAVED_CACHE_PURGED'), $file) . adm_back_link($this->u_action . '&amp;filename='. $file));
						}

						trigger_error(sprintf($language->lang(cnst::L_ACP . '_FILE_SAVED'), $file) . adm_back_link($this->u_action . '&amp;filename=' . $file));
					}

					if (!in_array($file, $filenames))
					{
						trigger_error(sprintf($language->lang(cnst::L_ACP . '_FILE_DOES_NOT_EXIST'), $file) . adm_back_link($this->u_action), E_USER_WARNING);
					}

					$confirm_message = ($save_purge_cache) ? cnst::L_ACP . '_SAVE_PURGE_CACHE_CONFIRM' : cnst::L_ACP . '_SAVE_CONFIRM';

					$s_hidden_fields = [
						'filename'			=> $file,
						'file_data' 		=> utf8_htmlspecialchars($data),
						'mode'				=> 'edit',
					];

					$submit_field = ($save_purge_cache) ? 'save_purge_cache' : 'save';
					$s_hidden_fields[$submit_field] = 1;

					confirm_box(false, sprintf($language->lang($confirm_message), $file), build_hidden_fields($s_hidden_fields));
				}
				else
				{
					reset($filenames);
					$file = ($file == '') ? current($filenames) : $file;
				}

				$data = $customcode_directory->file_get_contents($file);

				foreach($filenames as $filename)
				{
					$template->assign_block_vars('filenames', [
						'NAME'			=> $filename,
						'S_IS_SELECTED'	=> $filename === $file,
						'S_IS_EVENT'	=> $customcode_directory->is_event($filename)
					]);					
				}

				$template->assign_vars([
					'U_ACTION'				=> $this->u_action,
					'FILENAME'				=> $file,
					'S_IS_EVENT'			=> $customcode_directory->is_event($file),
					'FILE_DATA'				=> utf8_htmlspecialchars($data),
					'INCLUDE_EXAMPLE'		=> $language->lang(cnst::L_ACP . '_INCLUDE_EXAMPLE'),
				]);

				break;

			case 'files':

				$this->tpl_name = 'files';
				$this->page_title = $language->lang(cnst::L_ACP . '_FILES');

				$new_file = $request->variable('new_file', '');
				$file_to_delete = array_keys($request->variable('delete', ['' => '']));
				$file_to_delete = (sizeof($file_to_delete)) ? $file_to_delete[0] : false;

				if ($request->is_set_post('create'))
				{
					if (!check_form_key('marttiphpbb/customcode'))
					{
						trigger_error('FORM_INVALID');
					}

					if (!$new_file)
					{
						trigger_error($language->lang(cnst::L_ACP . '_FILENAME_EMPTY') . adm_back_link($this->u_action), E_USER_WARNING);
					}

					if (in_array($new_file, $filenames))
					{
						trigger_error(sprintf($language->lang(cnst::L_ACP . '_FILE_ALREADY_EXISTS'), $new_file) . adm_back_link($this->u_action), E_USER_WARNING);
					}

					$customcode_directory->create_file($new_file);

					trigger_error(sprintf($language->lang(cnst::L_ACP . '_FILE_CREATED'), $new_file) . adm_back_link($this->u_action));
				}

				if ($request->is_set_post('delete'))
				{
					if (!in_array($file_to_delete, $filenames))
					{
						trigger_error(sprintf($language->lang(cnst::L_ACP . '_FILE_DOES_NOT_EXIST'), $file_to_delete) . adm_back_link($this->u_action), E_USER_WARNING);
					}

					if (confirm_box(true))
					{
						$customcode_directory->delete_file($file_to_delete);

						trigger_error(sprintf($language->lang(cnst::L_ACP . '_FILE_DELETED'), $file_to_delete) . adm_back_link($this->u_action));
					}

					$s_hidden_fields = [
						'mode'		=> 'files',
						'delete'	=> [
							$file_to_delete => 1
						],
					];

					confirm_box(false, sprintf($language->lang(
						cnst::L_ACP . '_DELETE_FILE_CONFIRM'), 
						$file_to_delete), build_hidden_fields($s_hidden_fields));
				}

				$u_edit = str_replace('mode=files', 'mode=edit', $this->u_action);

				foreach ($filenames as $filename)
				{
					$template->assign_block_vars('files', [
						'S_IS_EVENT'			=> $customcode_directory->is_event($filename),
						'NAME'					=> $filename,
						'U_EDIT'				=> $u_edit . '&amp;filename=' . $filename,
						'SIZE'					=> $customcode_directory->get_filesize($filename),
						'COMMENT'				=> $customcode_directory->get_comment($filename),
						'DELETE_FILE_NAME'		=> sprintf($language->lang(cnst::L_ACP . '_DELETE_FILE_NAME'), $filename),
					]);
				}

				$template->assign_vars([
					'U_ACTION'					=> $this->u_action,
					'NEW_FILE'					=> $new_file,
					'FILES_EXPLAIN'				=> sprintf($language->lang(
						cnst::L_ACP . '_FILES_EXPLAIN'), 
						$language->lang(cnst::L_ACP . '_EVENT_FILE_INDICATOR'), 
						$customcode_directory->get_dir()),
				]);

				if ($request->variable('customcode_show_events', 0))
				{
					$template->assign_var('U_CUSTOMCODE_HIDE_EVENTS', 
						append_sid($phpbb_root_path . 'index.' . $php_ext, [
							'customcode_hide_events' => 1,
						]));
				}
				else
				{
					$template->assign_var('U_CUSTOMCODE_SHOW_EVENTS', 
						append_sid($phpbb_root_path . 'index.' . $php_ext, [
							'customcode_show_events' => 1,
						]));
				}

				break;
		}
	}
}
