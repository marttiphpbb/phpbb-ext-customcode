<?php

/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Translated By : Basil Taha Alhitary - www.alhitary.net
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

	'ACP_CUSTOMCODE_INCLUDE_EXAMPLE'			=> 'لإضافة الملفات الخاصة بك , يجب أن يحتوي الملف على <code>../../../../../../store/customcode/</code><p>مثال : <code>&lt;!-- INCLUDE ../../../../../../store/customcode/my_file.html --></code></p>',
	'ACP_CUSTOMCODE_CREATE_FILE'				=> 'إنشاء ملف',
	'ACP_CUSTOMCODE_DELETE'						=> 'حذف',
	'ACP_CUSTOMCODE_DELETE_FILE_NAME'			=> 'حذف %s',
	'ACP_CUSTOMCODE_FILES_EXPLAIN'				=> 'لا يمكن حذف ملفات القوالب الإفتراضية للإضافة (انجليزي). ستجد جميع الملفات التالية في المسار store/customcode.',
	'ACP_CUSTOMCODE_FILE_SIZE'					=> 'الحجم',
	'ACP_CUSTOMCODE_FILE_NAME'					=> 'الإسم',
	'ACP_CUSTOMCODE_FILE_COMMENT'				=> 'الملاحظة',
	'ACP_CUSTOMCODE_FILE'						=> 'الملف',
	'ACP_CUSTOMCODE_EDITOR_ROWS'				=> 'صفوف المُحرر',
	'ACP_CUSTOMCODE_SAVE_CONFIRM'				=> 'هل تريد حفظ الملف %s ؟',
	'ACP_CUSTOMCODE_SAVE'						=> 'حفظ',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE'			=> 'الحفظ وحذف الملفات المؤقتة',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE_CONFIRM'	=> 'هل تريد حفظ الملف %s  وحذف الملفات المؤقتة ؟',
	'ACP_CUSTOMCODE_FILE_SAVED'					=> 'تم حفظ الملف %s بنجاح !',
	'ACP_CUSTOMCODE_FILE_SAVED_CACHE_PURGED'	=> 'تم حفظ الملف %s والملفات المؤقتة بنجاح !',
	'ACP_CUSTOMCODE_NOT_WRITABLE'				=> 'لا يمكن الكتابة على الملف %s.',
	'ACP_CUSTOMCODE_FILE_CREATED'				=> 'تم إنشاء الملف %s.',
	'ACP_CUSTOMCODE_FILENAME_EMPTY'				=> 'إسم الملف غير موجود.',
	'ACP_CUSTOMCODE_FILE_NOT_CREATED'			=> 'لا يمكن إنشاء الملف %s.',
	'ACP_CUSTOMCODE_FILE_ALREADY_EXISTS'		=> 'الملف %s موجود مُسبقاً.',
	'ACP_CUSTOMCODE_DELETE_FILE_CONFIRM'		=> 'حذف الملف %s ؟',
	'ACP_CUSTOMCODE_FILE_DELETED'				=> 'تم حذف الملف %s.',
	'ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'		=> 'الملف %s غير موجود.',
	'ACP_CUSTOMCODE_FILE_NOT_DELETED'			=> 'لم يتم حذف الملف %s.',
	'ACP_CUSTOMCODE_EVENT_FILE_INDICATOR'		=> '(انجليزي)',
	'ACP_CUSTOMCODE_SHOW_TEMPLATE_EVENTS_LOCATIONS'	=> 'اظهار أماكن قالب الأحداث',
	'ACP_CUSTOMCODE_HIDE_TEMPLATE_EVENTS_LOCATIONS'	=> 'اخفاء أماكن قالب الأحداث',

));
