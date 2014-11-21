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
<<<<<<< HEAD
	'ACP_CUSTOMCODE_INCLUDE_EXAMPLE'			=> 'To include your own created files, prepend the filename with <code>../../../../../../customcode/</code><p><code>&lt;!-- INCLUDE ../../../../../../customcode/my_file.html --></code></p>',
	'ACP_CUSTOMCODE_INCLUDECSS_EXAMPLE'			=> 'Include your created stylesheet in overall_header_head_append.html <p><code>&lt;!-- INCLUDECSS ../../../../../../customcode/my_file.css --></code></p>',
	'ACP_CUSTOMCODE_INCLUDEJS_EXAMPLE'			=> 'To include a Javascript file that makes use of jQuery, use <code>INCLUDEJS</code> anywhere i.e. in overall_footer_after.html <p><code>&lt;!-- INCLUDEJS ../../../../../../customcode/my_file.js --></code></p>',
=======
	'ACP_CUSTOMCODE_INCLUDE_EXAMPLE'			=> 'To include your own created files, prepend the filename with <code>../../../../../../store/customcode/</code><p><code>&lt;!-- INCLUDE ../../../../../../store/customcode/my_file.html --></code></p>',
	'ACP_CUSTOMCODE_INCLUDECSS_EXAMPLE'			=> 'Include your created stylesheet in overall_header_head_append.html <p><code>&lt;!-- INCLUDECSS ../../../../../../store/customcode/my_file.css --></code></p>',
	'ACP_CUSTOMCODE_INCLUDEJS_EXAMPLE'			=> 'To include a Javascript file that makes use of jQuery, use <code>INCLUDEJS</code> anywhere i.e. in overall_footer_after.html <p><code>&lt;!-- INCLUDEJS ../../../../../../store/customcode/my_file.js --></code></p>',
>>>>>>> parent of 6008402... from store/customcode to customcode directory
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
	'ACP_CUSTOMCODE_FILE_EXPLAIN'				=> 'Files directly included with template events are marked with (E). All files are located in directory store/customcode.',
	'ACP_CUSTOMCODE_EDITOR_ROWS'				=> 'Editor rows',
	'ACP_CUSTOMCODE_SAVE_CONFIRM'				=> 'Do you want to save the file %s?',
	'ACP_CUSTOMCODE_SAVE'						=> 'Save',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE'			=> 'Save and purge the cache',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE_CONFIRM'	=> 'Do you want to save the file %s and purge the cache?',
	'ACP_CUSTOMCODE_FILE_SAVED'					=> 'The file %s has been saved successfully!',
	'ACP_CUSTOMCODE_FILE_SAVED_CACHE_PURGED'	=> 'The file %s has been saved and the cache has been purged successfully!',
	'ACP_CUSTOMCODE_FILE_NOT_EXIST'				=> 'The file %s does not exist.',
	'ACP_CUSTOMCODE_NOT_WRITABLE'				=> 'The file %s is not writable.',
	'ACP_CUSTOMCODE_FILE_CREATED'				=> 'The file %s has been created.',
	'ACP_CUSTOMCODE_FILENAME_EMPTY'				=> 'The filename was empty.',
	'ACP_CUSTOMCODE_FILE_NOT_CREATED'			=> 'The file %s could not be created.',
	'ACP_CUSTOMCODE_FILE_ALREADY_EXISTS'		=> 'The file %s already exists.',
	'ACP_CUSTOMCODE_DELETE_FILE_CONFIRM'		=> 'Delete the selected file %s ?',
	'ACP_CUSTOMCODE_DELETE_FILES_CONFIRM'		=> 'Delete the selected files?',
	'ACP_CUSTOMCODE_FILE_DELETED'				=> 'The file %s has been deleted.',
	'ACP_CUSTOMCODE_FILES_DELETED'				=> 'The files have been deleted.',
	'ACP_CUSTOMCODE_NO_FILE_SELECTED'			=> 'No file was selected.',
	'ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'		=> 'The file %s selected for delete does not exist.',
	'ACP_CUSTOMCODE_FILE_NOT_DELETED'			=> 'Failed to delete file %s.',

));
