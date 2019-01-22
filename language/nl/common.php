<?php
/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
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

	'CUSTOMCODE_LINK_EDIT_TITLE'				=> 'Edit custom code for this location.',
	'CUSTOMCODE_HIDE'							=> 'Hide',	
	'CUSTOMCODE_HIDE_TEMPLATE_EVENTS_LOCATIONS'	=> 'Verberg de Custom Code locaties',
	'CUSTOMCODE_INSIDE_HTML_HEAD'				=> '(binnen html header)',

]);
