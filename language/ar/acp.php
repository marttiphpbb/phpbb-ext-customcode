<?php

/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Translated By : Bassel Taha Alhitary - www.alhitary.net
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [

	'ACP_CUSTOMCODE_INCLUDE_EXAMPLE'			=> 'لإضافة الملفات الخاصة بك , يجب أن يحتوي الملف على (fix this)',
	'ACP_CUSTOMCODE_EXAMPLE_FILE'				=> 'my_file.html',
	'ACP_CUSTOMCODE_CREATE_FILE'				=> 'إنشاء ملف',
	'ACP_CUSTOMCODE_DELETE'						=> 'حذف',
	'ACP_CUSTOMCODE_DELETE_FILE_NAME'			=> 'حذف %s',
	'ACP_CUSTOMCODE_FILES_EXPLAIN'				=> 'لا يُمكن حذف ملفات القوالب الإفتراضية للإضافة %1$s. ستجد جميع الملفات في المسار %2$s.',
	'ACP_CUSTOMCODE_FILE_SIZE'					=> 'الحجم',
	'ACP_CUSTOMCODE_FILE_NAME'					=> 'الإسم',
	'ACP_CUSTOMCODE_FILE_COMMENT'				=> 'الملاحظة',
	'ACP_CUSTOMCODE_FILE'						=> 'الملف',
	'ACP_CUSTOMCODE_EDITOR_ROWS'				=> 'صفوف المُحرر',
	'ACP_CUSTOMCODE_SAVE_CONFIRM'				=> 'هل تريد حفظ الملف %s ?',
	'ACP_CUSTOMCODE_SAVE'						=> 'حفظ',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE'			=> 'الحفظ وحذف الملفات المؤقتة',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE_CONFIRM'	=> 'هل تريد حفظ الملف %s وحذف الملفات المؤقتة ؟ ?',
	'ACP_CUSTOMCODE_FILE_SAVED'					=> 'تم حفظ الملف %s بنجاح !',
	'ACP_CUSTOMCODE_FILE_SAVED_CACHE_PURGED'	=> 'تم حفظ الملف %s وحذف الملفات المؤقتة بنجاح !',
	'ACP_CUSTOMCODE_FILE_CREATED'				=> 'تم إنشاء الملف %s.',
	'ACP_CUSTOMCODE_FILENAME_EMPTY'				=> 'إسم الملف غير موجود.',
	'ACP_CUSTOMCODE_FILE_NOT_CREATED'			=> 'لا يمكن إنشاء الملف %s.',
	'ACP_CUSTOMCODE_FILE_ALREADY_EXISTS'		=> 'الملف %s موجود مُسبقاً.',
	'ACP_CUSTOMCODE_DELETE_FILE_CONFIRM'		=> 'حذف الملف %s ?',
	'ACP_CUSTOMCODE_FILE_DELETED'				=> 'تم حذف الملف %s.',
	'ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'		=> 'الملف %s غير موجود.',
	'ACP_CUSTOMCODE_FILE_NOT_DELETED'			=> 'فشل في حذف الملف %s.',
	'ACP_CUSTOMCODE_FILE_NOT_OPENED'			=> 'فشل في فتح الملف %s.',
	'ACP_CUSTOMCODE_FILE_NOT_CLOSED'			=> 'فشل في غلق الملف %s.',
	'ACP_CUSTOMCODE_FILE_WRITE_FAIL'			=> 'فشل في الكتابة على الملف %s.',
	'ACP_CUSTOMCODE_FILE_READ_FAIL'				=> 'فشل في القراءة من الملف file %s.',
	'ACP_CUSTOMCODE_FILE_TYPE_FAIL'				=> 'فشل في الحصول على نوع الملف من %s.',
	'ACP_CUSTOMCODE_FILE_SIZE_FAIL'				=> 'فشل في الحصول على حجم الملف من %s.',
	'ACP_CUSTOMCODE_EVENT_FILE_INDICATOR'		=> '(انجليزي)',
	'ACP_CUSTOMCODE_SHOW_TEMPLATE_EVENTS_LOCATIONS'	=> 'إظهار أماكن أحداث القالب',
	'ACP_CUSTOMCODE_DIRECTORY_NOT_CREATED'		=> 'فشل في إنشاء المجلد %s',
	'ACP_CUSTOMCODE_DIRECTORY_NOT_DELETED'		=> 'فشل في حذف المجلد %s',
	'ACP_CUSTOMCODE_DIRECTORY_LIST_FAIL'		=> 'فشل في عرض محتوى المجلد %s',
	'ACP_CUSTOMCODE_FILE_EXTENSION_NOT_ALLOWED'	=> 'نوع الملف %s الذي تريد إنشائه غير مسموح به لدواعي أمنية.',
	'ACP_CUSTOMCODE_PHP_NOT_ALLOWED'			=> 'غير مسموح بأن يحتوي الملف على لغة الـ php لدواعي أمنية.',
]);
