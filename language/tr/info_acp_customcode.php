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

	'ACP_MARTTIPHPBB_CUSTOMCODE'				=> 'Özel Kod',
	'ACP_MARTTIPHPBB_CUSTOMCODE_EDIT'		=> 'Düzenle',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILES'	=> 'Dosyalar',
]);
