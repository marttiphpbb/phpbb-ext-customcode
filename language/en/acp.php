<?php

/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
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
//
// Some characters you may want to copy&paste:
// ’ » “ ” …

$lang = array_merge($lang, array(

	'ACP_CUSTOMCODE_INCLUDE_EXAMPLE'			=> 'To include your own created files, prepend the filename with <code>../../../../../../%1$s/</code><p><code>&lt;!-- INCLUDE ../../../../../../%1$s/my_file.html --></code></p>',
	'ACP_CUSTOMCODE_CREATE_FILE'				=> 'Create file',
	'ACP_CUSTOMCODE_DELETE'						=> 'Delete',
	'ACP_CUSTOMCODE_DELETE_FILE_NAME'			=> 'Delete %s',
	'ACP_CUSTOMCODE_FILES_EXPLAIN'				=> 'Files directly included with template events %1$s cannot be deleted. All files reside at directory %2$s.',
	'ACP_CUSTOMCODE_FILE_SIZE'					=> 'Size',
	'ACP_CUSTOMCODE_FILE_NAME'					=> 'Name',
	'ACP_CUSTOMCODE_FILE_COMMENT'				=> 'Comment',
	'ACP_CUSTOMCODE_FILE'						=> 'File',
	'ACP_CUSTOMCODE_EDITOR_ROWS'				=> 'Editor rows',
	'ACP_CUSTOMCODE_SAVE_CONFIRM'				=> 'Do you want to save the file %s?',
	'ACP_CUSTOMCODE_SAVE'						=> 'Save',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE'			=> 'Save and purge the cache',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE_CONFIRM'	=> 'Do you want to save the file %s and purge the cache?',
	'ACP_CUSTOMCODE_FILE_SAVED'					=> 'The file %s has been saved successfully!',
	'ACP_CUSTOMCODE_FILE_SAVED_CACHE_PURGED'	=> 'The file %s has been saved and the cache has been purged successfully!',
	'ACP_CUSTOMCODE_FILE_CREATED'				=> 'The file %s has been created.',
	'ACP_CUSTOMCODE_FILENAME_EMPTY'				=> 'The filename was empty.',
	'ACP_CUSTOMCODE_FILE_NOT_CREATED'			=> 'The file %s could not be created.',
	'ACP_CUSTOMCODE_FILE_ALREADY_EXISTS'		=> 'The file %s already exists.',
	'ACP_CUSTOMCODE_DELETE_FILE_CONFIRM'		=> 'Delete file %s ?',
	'ACP_CUSTOMCODE_FILE_DELETED'				=> 'The file %s has been deleted.',
	'ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'		=> 'The file %s does not exist.',
	'ACP_CUSTOMCODE_FILE_NOT_DELETED'			=> 'Failed to delete file %s.',
	'ACP_CUSTOMCODE_FILE_NOT_OPENED'			=> 'Failed to open file %s.',
	'ACP_CUSTOMCODE_FILE_NOT_CLOSED'			=> 'Failed to close file %s.',
	'ACP_CUSTOMCODE_FILE_WRITE_FAIL'			=> 'Failed to write to file %s.',
	'ACP_CUSTOMCODE_FILE_READ_FAIL'				=> 'Failed to read from file %s.',
	'ACP_CUSTOMCODE_FILE_TYPE_FAIL'				=> 'Failed to get the file type of %s.',
	'ACP_CUSTOMCODE_FILE_SIZE_FAIL'				=> 'Failed to get the file size of %s.',
	'ACP_CUSTOMCODE_EVENT_FILE_INDICATOR'		=> '(E)',
	'ACP_CUSTOMCODE_SHOW_TEMPLATE_EVENTS_LOCATIONS'	=> 'Show Custom Code template events locations',
	'ACP_CUSTOMCODE_HIDE_TEMPLATE_EVENTS_LOCATIONS'	=> 'Hide Custom Code template events locations',
	'ACP_CUSTOMCODE_DIRECTORY_NOT_CREATED'		=> 'Failed to create the directory %s',
	'ACP_CUSTOMCODE_DIRECTORY_NOT_DELETED'		=> 'Failed to delete the directory %s',
	'ACP_CUSTOMCODE_DIRECTORY_LIST_FAIL'		=> 'Failed to list content of directory %s',
	'ACP_CUSTOMCODE_FILE_EXTENSION_NOT_ALLOWED'	=> 'File extension %s is not allowed for security.',
	'ACP_CUSTOMCODE_PHP_NOT_ALLOWED'			=> 'Inclusion of php is not allowed for security.',
	'ACP_CUSTOMCODE_INCLUDEPHP_WARNING'			=> 'Warning! For security, your custom code will not be included in templates when PHP code inclusion with PHP and INCLUDEPHP statements is enabled on your board. See %ssecurity settings%s to switch off PHP inclusion in templates.',		
));
