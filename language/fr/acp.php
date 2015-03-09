<?php

/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
* French translation by Galixte (http://www.galixte.com)
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

	'ACP_CUSTOMCODE_INCLUDE_EXAMPLE'			=> 'Pour inclure vos propres fichiers, ajoutez aux noms des fichiers <code>../../../../../../%1$s/</code><p><code>&lt;!-- INCLUDE ../../../../../../%1$s/mon_fichier.html --></code></p>',
	'ACP_CUSTOMCODE_CREATE_FILE'				=> 'Créer un fichier',
	'ACP_CUSTOMCODE_DELETE'						=> 'Supprimer',
	'ACP_CUSTOMCODE_DELETE_FILE_NAME'			=> 'Supprimer %s',
	'ACP_CUSTOMCODE_FILES_EXPLAIN'				=> 'Les fichiers incluant directement des évènements du template %1$s ne peuvent être supprimés. Tous les fichiers présents dans le répertoire %2$s.',
	'ACP_CUSTOMCODE_FILE_SIZE'					=> 'Taille',
	'ACP_CUSTOMCODE_FILE_NAME'					=> 'Nom',
	'ACP_CUSTOMCODE_FILE_COMMENT'				=> 'Commentaire',
	'ACP_CUSTOMCODE_FILE'						=> 'Fichier',
	'ACP_CUSTOMCODE_EDITOR_ROWS'				=> 'Modificateur de rangées',
	'ACP_CUSTOMCODE_SAVE_CONFIRM'				=> 'Souhaitez-vous sauvegarder le fichier %s?',
	'ACP_CUSTOMCODE_SAVE'						=> 'Sauvegarder',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE'			=> 'Sauvegarder puis vider le cache',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE_CONFIRM'	=> 'Voulez-vous sauvegarder le fichier %s et vider le cache ?',
	'ACP_CUSTOMCODE_FILE_SAVED'					=> 'Le fichier %s a été sauvegardé avec succès !',
	'ACP_CUSTOMCODE_FILE_SAVED_CACHE_PURGED'	=> 'Le fichier %s a été sauvegardé et le cache a été vidé avec succès !',
	'ACP_CUSTOMCODE_NOT_WRITABLE'				=> 'Le fichier %s n’est pas accessible en écriture.',
	'ACP_CUSTOMCODE_FILE_CREATED'				=> 'Le fichier %s a été créé.',
	'ACP_CUSTOMCODE_FILENAME_EMPTY'				=> 'Le nom du fichier était vide.',
	'ACP_CUSTOMCODE_FILE_NOT_CREATED'			=> 'Le fichier %s n’a pas pu être créé.',
	'ACP_CUSTOMCODE_FILE_ALREADY_EXISTS'		=> 'Le fichier %s existe déjà.',
	'ACP_CUSTOMCODE_DELETE_FILE_CONFIRM'		=> 'Supprimer le fichier %s ?',
	'ACP_CUSTOMCODE_FILE_DELETED'				=> 'Le fichier %s a été supprimé.',
	'ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'		=> 'Le fichier %s n’existe pas.',
	'ACP_CUSTOMCODE_FILE_NOT_DELETED'			=> 'Impossible de supprimer le fichier %s.',
	'ACP_CUSTOMCODE_EVENT_FILE_INDICATOR'		=> '(E)',
	'ACP_CUSTOMCODE_SHOW_TEMPLATE_EVENTS_LOCATIONS'	=> 'Afficher le code personnalisé dans les emplacements des évènements du template',
	'ACP_CUSTOMCODE_HIDE_TEMPLATE_EVENTS_LOCATIONS'	=> 'Masquer le code personnalisé dans les emplacements des évènements du template',
	'ACP_CUSTOMCODE_DIRECTORY_NOT_CREATED'		=> 'Impossible de créer le répertoire %s',

));
