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

	'ACP_CUSTOMCODE_INCLUDE_EXAMPLE'	=> 'Özel dosya eklemek için kullanın <code>../../../../../../%1$s/</code><p><code>&lt;!-- INCLUDE ../../../../../../%1$s/my_file.html --></code></p>',
	'ACP_CUSTOMCODE_CREATE_FILE'				=> 'Dosya oluştur',
	'ACP_CUSTOMCODE_DELETE'						=> 'Sil',
	'ACP_CUSTOMCODE_DELETE_FILE_NAME'	=> 'Sil %s',
	'ACP_CUSTOMCODE_FILES_EXPLAIN'			=> 'Varsayılan olarak gelen şablon olayı %1$s dosyaları silinemez. Tüm dosyalar %2$s dizinin de bulunmaktadır.',
	'ACP_CUSTOMCODE_FILE_SIZE'					=> 'Boyut',
	'ACP_CUSTOMCODE_FILE_NAME'				=> 'İsim',
	'ACP_CUSTOMCODE_FILE_COMMENT'			=> 'Yorum',
	'ACP_CUSTOMCODE_FILE'							=> 'Dosya',
	'ACP_CUSTOMCODE_EDITOR_ROWS'			=> 'Editör satır sayısı',
	'ACP_CUSTOMCODE_SAVE_CONFIRM'			=> '%s Dosyasının kaydedilmesini istiyor musunuz"?',
	'ACP_CUSTOMCODE_SAVE'						=> 'Kaydet',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE'	=> 'Kaydet ve önbelleği temizle',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE_CONFIRM'	=> '%s Dosyanın kaydedilmesini ve önbelleğin temizlenmesi istiyor musunuz?',
	'ACP_CUSTOMCODE_FILE_SAVED'				=> '%s Dosyası başarıyla kaydedildi!',
	'ACP_CUSTOMCODE_FILE_SAVED_CACHE_PURGED'	=> '%s Dosyası başarıyla kaydedildi ve önbellek temizlendi!',
	'ACP_CUSTOMCODE_NOT_WRITABLE'			=> '%s Dosyası yazılabilir değil.',
	'ACP_CUSTOMCODE_FILE_CREATED'			=> '%s Dosyası oluşturuldu.',
	'ACP_CUSTOMCODE_FILENAME_EMPTY'		=> 'Dosya adı yok.',
	'ACP_CUSTOMCODE_FILE_NOT_CREATED'	=> '%s Dosyası oluşturulamıyor.',
	'ACP_CUSTOMCODE_FILE_ALREADY_EXISTS'	=> '%s Dosyası zaten var.',
	'ACP_CUSTOMCODE_DELETE_FILE_CONFIRM'	=> '%s Dosyası silinsin mi?',
	'ACP_CUSTOMCODE_FILE_DELETED'				=> '%s Dosyası silindi.',
	'ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'	=> '%s Dosyası yok.',
	'ACP_CUSTOMCODE_FILE_NOT_DELETED'		=> '%s Dosyası silinirken bir hata oluştu.',
	'ACP_CUSTOMCODE_EVENT_FILE_INDICATOR'=> '(E)',
	'ACP_CUSTOMCODE_SHOW_TEMPLATE_EVENTS_LOCATIONS'	=> 'Özel kod şablon olayı konumlarını göster',
	'ACP_CUSTOMCODE_HIDE_TEMPLATE_EVENTS_LOCATIONS'	=> 'Özel kod şablon olayı konumlarını gizle',
	'ACP_CUSTOMCODE_DIRECTORY_NOT_CREATED'	=> '%s dizini oluşturulamadı',
));
