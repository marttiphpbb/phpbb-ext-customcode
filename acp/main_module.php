<?php
/**
*  phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license http://opensource.org/licenses/MIT
*/

namespace marttiphpbb\customcode\acp;

class main_module
{
	var $u_action;
	
	protected $dir = 'store/customcode';
	
	protected $events = array(
		'overall_footer_after.html',
		'overall_footer_copyright_append.html',
		'overall_header_content_before.html',		
		'overall_header_head_append.html',
		'overall_header_stylesheets_after.html',
		
	);
	
	protected $comment_tag = array(
		'open'		=> '<!--',
		'close'		=> '-->',
	);

	function main($id, $mode)
	{
		global $template, $request, $phpbb_root_path, $user, $cache, $config;
		

		$user->add_lang_ext('marttiphpbb/customcode', 'common');
		add_form_key('marttiphpbb/customcode');
			
		$filenames = array_diff(scandir($phpbb_root_path . $this->dir), array('.', '..', '.htaccess'));
	
		switch($mode)
		{
			case 'edit': 
				$this->tpl_name = 'edit';
				$this->page_title = $user->lang('ACP_CUSTOMCODE_EDIT');

				$file =	$request->variable('filename', '', true);
				$editor_rows = max(5, min(999, $request->variable('editor_rows', 8)));

				$save = $request->is_set_post('save');
				$save_purge_cache = $request->is_set_post('save_purge_cache');

				if ($save || $save_purge_cache)
				{
					
					$data	= utf8_normalize_nfc($request->variable('file_data', '', true));
					$data	= htmlspecialchars_decode($data);					
					
					
					if (confirm_box(true))
					{
						if (!($f = @fopen($phpbb_root_path . $this->dir . '/' . $file, 'wb')))
						{
							trigger_error(sprintf($user->lang('ACP_CUSTOMCODE_NOT_WRITABLE'), $file) . adm_back_link($this->u_action . '&amp;filename=' . $file), E_USER_WARNING);
						}
			
						fwrite($f, $data);
						fclose($f);	
						
						if ($save_purge_cache)
						{
							$config->increment('assets_version', 1);
							$cache->purge();								
							trigger_error(sprintf($user->lang('ACP_CUSTOMCODE_FILE_SAVED_CACHE_PURGED'), $file) . adm_back_link($this->u_action . '&amp;filename='. $file));			
						}
						
						trigger_error(sprintf($user->lang('ACP_CUSTOMCODE_FILE_SAVED'), $file) . adm_back_link($this->u_action . '&amp;filename=' . $file));
					}

					if (!in_array($file, $filenames))
					{
						trigger_error(sprintf($user->lang('ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'), $file) . adm_back_link($this->u_action), E_USER_WARNING);
					}
					
					$confirm_message = ($save_purge_cache) ? 'ACP_CUSTOMCODE_SAVE_PURGE_CACHE_CONFIRM' : 'ACP_CUSTOMCODE_SAVE_CONFIRM';
					
					$s_hidden_fields = array(
						'filename'			=> $file,
						'file_data' 		=> utf8_htmlspecialchars($data),
						'mode'				=> 'edit',					
					);
					
					$submit_field = ($save_purge_cache) ? 'save_purge_cache' : 'save';
					$s_hidden_fields[$submit_field] = 1;
	
					confirm_box(false, sprintf($user->lang($confirm_message), $file), build_hidden_fields($s_hidden_fields));
				}
				else
				{
					reset($filenames);
					$file = ($file == '') ? current($filenames) : $file;
				}

				$data = ($file) ? file_get_contents($phpbb_root_path . $this->dir . '/' . $file) : '';		


				$options = '';

				foreach($filenames as $filename)
				{
					$options .= '<option value="' . $filename . '"';
					$options .= ($filename == $file) ? ' selected="selected"' : '';
					$options .= '>' . $filename;
					$options .= (in_array($filename, $this->events)) ? ' (E)' : '';
					$options .= '</option>';	
				}
				
				$template->assign_vars(array(
					'U_ACTION'					=> $this->u_action,
					'EDITOR_ROWS'				=> $editor_rows,
					'FILENAME'					=> $file . (in_array($file, $this->events) ? ' (E)' : ''),
					'FILE_DATA'					=> utf8_htmlspecialchars($data),
					'S_FILENAMES'				=> $options,
				));

				break;
				
			case 'files':
			
				$this->tpl_name = 'files';
				$this->page_title = $user->lang('ACP_CUSTOMCODE_FILES');
				
				$new_file = $request->variable('new_file', '');
				$file_to_delete = array_keys($request->variable('delete', array('' => '')));
				$file_to_delete = (sizeof($file_to_delete)) ? $file_to_delete[0] : false; 
	
				if ($request->is_set_post('create'))
				{
					if (!check_form_key('marttiphpbb/customcode'))
					{
						trigger_error('FORM_INVALID');
					}
					
					if (!$new_file)
					{
						trigger_error($user->lang('ACP_CUSTOMCODE_FILENAME_EMPTY') . adm_back_link($this->u_action), E_USER_WARNING);
					}					
					
					if (in_array($new_file, $filenames))
					{
						trigger_error(sprintf($user->lang('ACP_CUSTOMCODE_FILE_ALREADY_EXISTS'), $new_file) . adm_back_link($this->u_action), E_USER_WARNING);
					}
					
					if (!touch($phpbb_root_path . $this->dir . '/' . $new_file))
					{
						trigger_error(sprintf($user->lang('ACP_CUSTOMCODE_FILE_NOT_CREATED'), $new_file) . adm_back_link($this->u_action), E_USER_WARNING);
					}					

					trigger_error(sprintf($user->lang('ACP_CUSTOMCODE_FILE_CREATED'), $new_file) . adm_back_link($this->u_action));
				}	
				
				if ($request->is_set_post('delete'))
				{
					if (!in_array($file_to_delete, $filenames))
					{
						trigger_error(sprintf($user->lang('ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'), $file_to_delete) . adm_back_link($this->u_action), E_USER_WARNING);
					}
					
					if (confirm_box(true))
					{			
						if (!unlink($phpbb_root_path . $this->dir . '/' . $file_to_delete))
						{
							trigger_error(sprintf($user->lang('ACP_CUSTOMCODE_FILE_NOT_DELETED'), $file_to_delete) . adm_back_link($this->u_action), E_USER_WARNING);
						}

						trigger_error(sprintf($user->lang('ACP_CUSTOMCODE_FILE_DELETED'), $file_to_delete) . adm_back_link($this->u_action));	
					}					
					
					$s_hidden_fields = array(
						'mode'		=> 'files',
						'delete'	=> array($file_to_delete => 1),
					);					
					
					confirm_box(false, sprintf($user->lang('ACP_CUSTOMCODE_DELETE_FILE_CONFIRM'), $file_to_delete), build_hidden_fields($s_hidden_fields));				
				}				

				$file_size_ary = $file_comment_ary = array();

				foreach ($filenames as $filename)
				{
					$path = $phpbb_root_path . $this->dir . '/' . $filename;
					$comment = '';
					
					$file_size_ary[$filename] = $this->humanize_filesize(@filesize($path));
					
					$f = fopen($path, 'r');
					if ($f && ($first_line = @fgets($f))) 
					{
						$start = strpos($first_line, $this->comment_tag['open']);
						if ($start !== false)
						{
							$start += strlen($this->comment_tag['open']);
							$end = strpos($first_line, $this->comment_tag['close'], $start);
							if ($end !== false)
							{
								$comment = trim(substr($first_line, $start, $end - $start));
							}
						}
						
					}
					fclose($f);
					$file_comment_ary[$filename] = $comment;
				}
				

				foreach ($filenames as $filename)
				{
					$is_event = (in_array($filename, $this->events)) ? true : false;

					$template->assign_block_vars('files', array(
						'S_DELETABLE'			=> !$is_event,
						'NAME'					=> $filename . (($is_event) ? ' (E)' : ''),
						'SIZE'					=> $file_size_ary[$filename],
						'COMMENT'				=> $file_comment_ary[$filename],
						'DELETE_FILE_NAME'		=> sprintf($user->lang('ACP_CUSTOMCODE_DELETE_FILE_NAME'), $filename),
					));
				}

				$template->assign_vars(array(
					'U_ACTION'					=> $this->u_action,
					'NEW_FILE'					=> $new_file,
				));				
				
				break;
		}
	}
	
	/*
	 * @param int $bytes
	 * @param int $decimals
	 * @return string 
	 * Adapted from php.net comment of rommel at rommelsantor dot com 
	 */
	private function humanize_filesize($bytes, $decimals = 0) 
	{
		$sz = ' KMGTP';
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf('%.' . $decimals . 'f', $bytes / pow(1024, $factor)) . @$sz[$factor];
	}
}
