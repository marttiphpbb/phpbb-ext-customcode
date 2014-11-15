<?php

/**
*  phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license http://opensource.org/licenses/MIT
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}


// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine


$lang = array_merge($lang, array(
 
	'ACP_CUSTOMCODE'							=> 'Custom Code',
	'ACP_CUSTOMCODE_EDIT'						=> 'Edit custom file',
	'ACP_CUSTOMCODE_EDIT_EXPLAIN'				=> 'All files are located at store/customcode. The original template files are not touched. To include your own created files, use INCLUDE, INCLUDECSS (in overall_header_head_append.html) or INCLUDEJS (i.e. in overall_footer_after.html). In the INCLUDE, INCLUDECSS or INCLUDEJS statement prepend your filename with ../../../../../../store/customcode/  <br/>Purge the cache to apply the edits.',
	'ACP_CUSTOMCODE_CREATE_DELETE'				=> 'Create or delete custom files',
	'ACP_CUSTOMCODE_CREATE_DELETE_EXPLAIN'		=> 'These files reside at store/customcode',
	'ACP_CUSTOMCODE_CREATE'						=> 'Create',
	'ACP_CUSTOMCODE_NEW_FILE'					=> 'New custom file',
	'ACP_CUSTOMCODE_DELETE'						=> 'Delete',
	'ACP_CUSTOMCODE_DELETE_EXPLAIN'				=> 'Files directly linked from template events (E) cannot be deleted. Use the editor to disable or delete any code in them.',
	'ACP_CUSTOMCODE_DELETE_SELECTED'			=> 'Delete selected',
	'ACP_CUSTOMCODE_SELECT_ALL'					=> 'Select all',
	'ACP_CUSTOMCODE_UNSELECT_ALL'				=> 'Unselect all',
	'ACP_CUSTOMCODE_FILES'						=> 'Files',
	'ACP_CUSTOMCODE_FILE'						=> 'File',
	'ACP_CUSTOMCODE_FILE_EXPLAIN'				=> 'Files directly included with template events are marked with (E)',
	'ACP_CUSTOMCODE_EDITOR_ROWS'				=> 'Editor rows',
	'ACP_CUSTOMCODE_SAVE'						=> 'Save',
	'ACP_CUSTOMCODE_FILE_SAVED'					=> 'The file has been saved successfully!',
	'ACP_CUSTOMCODE_FILE_NOT_EXIST'				=> 'The file does not exist.',
	'ACP_CUSTOMCODE_NOT_WRITABLE'				=> 'The file is not writable.',
	'ACP_CUSTOMCODE_FILE_CREATED'				=> 'The file has been created.',
	'ACP_CUSTOMCODE_FILENAME_EMPTY'				=> 'The filename was empty.',
	'ACP_CUSTOMCODE_FILE_NOT_CREATED'			=> 'The file could not be created.',
	'ACP_CUSTOMCODE_FILE_ALREADY_EXISTS'		=> 'The file already exists.',
	'ACP_CUSTOMCODE_FILES_DELETED'				=> 'The file(s) has/have been deleted.',
	'ACP_CUSTOMCODE_NO_FILE_SELECTED'			=> 'No file was selected.',
	'ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'		=> 'A file selected for delete does not exist.',
	'ACP_CUSTOMCODE_FILE_NOT_DELETED'			=> 'Failed to delete file.',
	
 

));
