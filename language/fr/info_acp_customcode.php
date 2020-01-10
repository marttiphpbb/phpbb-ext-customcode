<?php

/**
*
* Custom Code extension for the phpBB Forum Software package.
* French translation by Galixte (http://www.galixte.com)
*
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*
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
	'ACP_MARTTIPHPBB_CUSTOMCODE'							=> 'Code personnalisé',
	'ACP_MARTTIPHPBB_CUSTOMCODE_EDIT'						=> 'Modifier',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILES'						=> 'Fichiers',
]);
