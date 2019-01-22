<?php

/**
*
* Custom Code extension for the phpBB Forum Software package.
* French translation by Galixte (http://www.galixte.com)
*
* @copyright (c) 2015 marttiphpbb <info@martti.be>
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

	'CUSTOMCODE_LINK_EDIT_TITLE'				=> 'Edit custom code for this location.',
	'CUSTOMCODE_HIDE'							=> 'Hide',	
	'CUSTOMCODE_HIDE_TEMPLATE_EVENTS_LOCATIONS'	=> 'Masquer le code personnalisé dans les emplacements des évènements du template',
	'CUSTOMCODE_INSIDE_HTML_HEAD'				=> '(dans l’entête HTML)',
	'CUSTOMCODE_GITHUB_LINK'					=> '%1$sCustom Code Github link%2$s%3$sCustom Code%4$s extension pour phpBB',
		// CUSTOMCODE_GITHUB_LINK: Il s'agit d'un exemple de lien vers GitHub affiché dans le pied de page du forum (footer) lors de l'installation de cette extension.
		// Entre %1$s et %2$s il s'agit d'un commentaire en language HTML. Entre %3$s et %4$s il s'agit du lien vers le dépôt de fichiers de l'extension Custom Code sur GitHub.
]);
