<?php

/**
 *
 * Custom Code. An extension for the phpBB Forum Software package.
 * French translation by Galixte (http://www.galixte.com)
 *
 * @copyright (c) 2019 marttiphpbb <info@martti.be>
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 *
 */

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
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
// ’ « » “ ” …
//

$lang = array_merge($lang, [

	'CUSTOMCODE_LINK_EDIT_TITLE'				=> 'Modifier le code personnalisé pour cet emplacement.',
	'CUSTOMCODE_HIDE'							=> 'Masquer',	
	'CUSTOMCODE_HIDE_TEMPLATE_EVENTS_LOCATIONS'	=> 'Masquer le code personnalisé dans les emplacements des évènements du template',
	'CUSTOMCODE_INSIDE_HTML_HEAD'				=> '(dans l’entête HTML)',
	'CUSTOMCODE_GITHUB_LINK'					=> '%1$sCustom Code Github link%2$s%3$sCustom Code%4$s extension pour phpBB',
		// CUSTOMCODE_GITHUB_LINK: Il s'agit d'un exemple de lien vers GitHub affiché dans le pied de page du forum (footer) lors de l'installation de cette extension.
		// Entre %1$s et %2$s il s'agit d'un commentaire en language HTML. Entre %3$s et %4$s il s'agit du lien vers le dépôt de fichiers de l'extension Custom Code sur GitHub.
]);
