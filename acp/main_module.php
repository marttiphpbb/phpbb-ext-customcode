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
		'overall_header_head_append.html',
		'overall_header_content_before.html',
		'overall_header_stylesheets_after.html',
		
	);

	function main($id, $mode)
	{
		global $template, $request, $phpbb_root_path, $user;
		

		$user->add_lang_ext('marttiphpbb/customcode', 'common');
		add_form_key('marttiphpbb/customcode');
			
		$filenames = array_diff(scandir($phpbb_root_path . $this->dir), array('.', '..', '.htaccess'));
			
		switch($mode)
		{
			case 'edit': 
				$this->tpl_name = 'edit';
				$this->page_title = $user->lang('ACP_CUSTOMCODE_EDIT');

				$file =	$request->variable('filename', '', true);
				$editor_rows = max(5, min(999, $request->variable('editor_rows', 20)));

				if ($request->is_set_post('save'))
				{
					if (!check_form_key('marttiphpbb/customcode'))
					{
						trigger_error('FORM_INVALID');
					}
					
					
					if (!in_array($file, $filenames))
					{
						trigger_error($user->lang('ACP_CUSTOMCODE_FILE_NOT_EXIST') . adm_back_link($this->u_action), E_USER_WARNING);
					}

					$data	= utf8_normalize_nfc($request->variable('file_data', '', true));
					$data	= htmlspecialchars_decode($data);
					

					if (!($f = @fopen($phpbb_root_path . $this->dir . '/' . $file, 'wb')))
					{
						trigger_error($user->lang('ACP_CUSTOMCODE_NOT_WRITABLE') . adm_back_link($this->u_action), E_USER_WARNING);
					}
		
					fwrite($f, $data);
					fclose($f);

					trigger_error($user->lang('ACP_CUSTOMCODE_FILE_SAVED') . adm_back_link($this->u_action));
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
				
			case 'create_delete':
			
				$this->tpl_name = 'create_delete';
				$this->page_title = $user->lang('ACP_CUSTOMCODE_CREATE_DELETE');
				
				$new_file = $request->variable('new_file', '');
				$selected_files = array_keys($request->variable('filenames', array('' => '')));
				
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
						trigger_error($user->lang('ACP_CUSTOMCODE_FILE_ALREADY_EXISTS') . adm_back_link($this->u_action), E_USER_WARNING);
					}
					
					if (!touch($phpbb_root_path . $this->dir . '/' . $new_file))
					{
						trigger_error($user->lang('ACP_CUSTOMCODE_FILE_NOT_CREATED') . adm_back_link($this->u_action), E_USER_WARNING);
					}					

					trigger_error($user->lang('ACP_CUSTOMCODE_FILE_CREATED') . adm_back_link($this->u_action));
				}	
				
				if ($request->is_set_post('delete'))
				{
					if (confirm_box(true))
					{
						
						foreach ($selected_files as $selected_file)
						{
							if (!unlink($phpbb_root_path . $this->dir . '/' . $selected_file))
							{
								trigger_error($user->lang('ACP_CUSTOMCODE_FILE_NOT_DELETED') . adm_back_link($this->u_action), E_USER_WARNING);
							}
						}					

						$files_deleted_string = (sizeof($selected_files) == 1) ? 'ACP_CUSTOMCODE_FILE_DELETED' : 'ACP_CUSTOMCODE_FILES_DELETED';

						trigger_error($user->lang($files_deleted_string) . adm_back_link($this->u_action));	
					}
					
				
					if (!sizeof($selected_files))
					{
						trigger_error($user->lang('ACP_CUSTOMCODE_NO_FILE_SELECTED') . adm_back_link($this->u_action), E_USER_WARNING);
					}
				
					$s_hidden_fields = array(
						'mode'		=> 'create_delete',
						'delete'	=> 1
					);				
				
					foreach ($selected_files as $selected_file)
					{
						if (!in_array($selected_file, $filenames))
						{
							trigger_error($user->lang('ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST') . adm_back_link($this->u_action), E_USER_WARNING);
						}
						$s_hidden_fields['filenames'][$selected_file] = 1;
					}
				
					$confirm_delete_string = (sizeof($selected_files) == 1) ? 'ACP_CUSTOMCODE_DELETE_FILE_CONFIRM' : 'ACP_CUSTOMCODE_DELETE_FILES_CONFIRM';
				
					confirm_box(false, $user->lang($confirm_delete_string), build_hidden_fields($s_hidden_fields));				
				}				


				foreach ($filenames as $filename)
				{
					$is_event = (in_array($filename, $this->events)) ? true : false;

					$template->assign_block_vars('customfiles', array(
						'S_SELECTABLE'			=> !$is_event,
						'NAME'					=> $filename . (($is_event) ? ' (E)' : ''),
						'S_SELECTED'			=> in_array($filename, $selected_files),
					));
				}

				$template->assign_vars(array(
					'U_ACTION'					=> $this->u_action,
					'NEW_FILE'					=> $new_file,
				));				
				
				break;
		}
	}
}
