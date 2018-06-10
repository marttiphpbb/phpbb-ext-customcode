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
	'CUSTOMCODE_HIDE_TEMPLATE_EVENTS_LOCATIONS'	=> 'Nascondi le posizioni degli eventi template di Custom code',
	'CUSTOMCODE_INSIDE_HTML_HEAD'				=> '(nell’<code>head</code> dell’html)',
	'CUSTOMCODE_GITHUB_LINK'					=> '%1$sLink Github a Custom code%2$s%3$sCustom code%4$s, estensione per phpBB',
		// CUSTOMCODE_GITHUB_LINK: This is the example github link in the footer to be loaded on installation.
		// Between %1$s and %2$s is a html comment. Between %3$s and %4$s is the link to the Custom Code repository on Github.
]);
