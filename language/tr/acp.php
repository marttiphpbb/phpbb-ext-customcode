<?php

/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 - 2020 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
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

	'ACP_MARTTIPHPBB_CUSTOMCODE_INCLUDE_EXAMPLE'	=> 'Özel dosya eklemek için kullanın (fix this)',
	'ACP_MARTTIPHPBB_CUSTOMCODE_EXAMPLE_FILE'				=> 'my_file.html',
	'ACP_MARTTIPHPBB_CUSTOMCODE_CREATE_FILE'				=> 'Dosya oluştur',
	'ACP_MARTTIPHPBB_CUSTOMCODE_DELETE'						=> 'Sil',
	'ACP_MARTTIPHPBB_CUSTOMCODE_DELETE_FILE_NAME'	=> 'Sil %s',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILES_EXPLAIN'			=> 'Varsayılan olarak gelen şablon olayı %1$s dosyaları silinemez. Tüm dosyalar %2$s dizinin de bulunmaktadır.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_SIZE'					=> 'Boyut',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_NAME'				=> 'İsim',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_COMMENT'			=> 'Yorum',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE'							=> 'Dosya',
	'ACP_MARTTIPHPBB_CUSTOMCODE_EDITOR_ROWS'			=> 'Editör satır sayısı',
	'ACP_MARTTIPHPBB_CUSTOMCODE_SAVE_CONFIRM'			=> '%s Dosyasının kaydedilmesini istiyor musunuz"?',
	'ACP_MARTTIPHPBB_CUSTOMCODE_SAVE'						=> 'Kaydet',
	'ACP_MARTTIPHPBB_CUSTOMCODE_SAVE_PURGE_CACHE'	=> 'Kaydet ve önbelleği temizle',
	'ACP_MARTTIPHPBB_CUSTOMCODE_SAVE_PURGE_CACHE_CONFIRM'	=> '%s Dosyanın kaydedilmesini ve önbelleğin temizlenmesi istiyor musunuz?',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_SAVED'				=> '%s Dosyası başarıyla kaydedildi!',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_SAVED_CACHE_PURGED'	=> '%s Dosyası başarıyla kaydedildi ve önbellek temizlendi!',
	'ACP_MARTTIPHPBB_CUSTOMCODE_NOT_WRITABLE'			=> '%s Dosyası yazılabilir değil.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_CREATED'			=> '%s Dosyası oluşturuldu.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILENAME_EMPTY'		=> 'Dosya adı yok.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_NOT_CREATED'	=> '%s Dosyası oluşturulamıyor.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_ALREADY_EXISTS'	=> '%s Dosyası zaten var.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_DELETE_FILE_CONFIRM'	=> '%s Dosyası silinsin mi?',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_DELETED'				=> '%s Dosyası silindi.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_DOES_NOT_EXIST'	=> '%s Dosyası yok.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_NOT_DELETED'		=> '%s Dosyası silinirken bir hata oluştu.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_EVENT_FILE_INDICATOR'=> '(E)',
	'ACP_MARTTIPHPBB_CUSTOMCODE_SHOW_TEMPLATE_EVENTS_LOCATIONS'	=> 'Özel kod şablon olayı konumlarını göster',
	'ACP_MARTTIPHPBB_CUSTOMCODE_DIRECTORY_NOT_CREATED'	=> '%s dizini oluşturulamadı',
]);
