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
	'ACP_CUSTOMCODE_INCLUDE_EXAMPLE'			=> 'Pour inclure ses propres fichiers, ajouter aux noms des fichiers (fix this)',
	'ACP_CUSTOMCODE_EXAMPLE_FILE'				=> 'my_file.html',
	'ACP_CUSTOMCODE_CREATE_FILE'				=> 'Créer un fichier',
	'ACP_CUSTOMCODE_DELETE'						=> 'Supprimer',
	'ACP_CUSTOMCODE_DELETE_FILE_NAME'			=> 'Supprimer %s',
	'ACP_CUSTOMCODE_FILES_EXPLAIN'				=> 'Les fichiers incluant directement des évènements du template %1$s ne peuvent être supprimés. Tous les fichiers présents dans le répertoire %2$s.',
	'ACP_CUSTOMCODE_FILE_SIZE'					=> 'Taille',
	'ACP_CUSTOMCODE_FILE_NAME'					=> 'Nom',
	'ACP_CUSTOMCODE_FILE_COMMENT'				=> 'Commentaire',
	'ACP_CUSTOMCODE_FILE'						=> 'Fichier',
	'ACP_CUSTOMCODE_EDITOR_ROWS'				=> 'Modificateur de rangées',
	'ACP_CUSTOMCODE_SAVE_CONFIRM'				=> 'Confirmer la sauvegarde du fichier %s ?',
	'ACP_CUSTOMCODE_SAVE'						=> 'Sauvegarder',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE'			=> 'Sauvegarder puis vider le cache',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE_CONFIRM'	=> 'Voulez-vous sauvegarder le fichier %s et vider le cache ?',
	'ACP_CUSTOMCODE_FILE_SAVED'					=> 'Le fichier %s a été sauvegardé avec succès !',
	'ACP_CUSTOMCODE_FILE_SAVED_CACHE_PURGED'	=> 'Le fichier %s a été sauvegardé et le cache a été vidé avec succès !',
	'ACP_CUSTOMCODE_FILE_CREATED'				=> 'Le fichier %s a été créé.',
	'ACP_CUSTOMCODE_FILENAME_EMPTY'				=> 'Le nom du fichier était vide.',
	'ACP_CUSTOMCODE_FILE_NOT_CREATED'			=> 'Le fichier %s n’a pas pu être créé.',
	'ACP_CUSTOMCODE_FILE_ALREADY_EXISTS'		=> 'Le fichier %s existe déjà.',
	'ACP_CUSTOMCODE_DELETE_FILE_CONFIRM'		=> 'Supprimer le fichier %s ?',
	'ACP_CUSTOMCODE_FILE_DELETED'				=> 'Le fichier %s a été supprimé.',
	'ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'		=> 'Le fichier %s n’existe pas.',
	'ACP_CUSTOMCODE_FILE_NOT_DELETED'			=> 'Impossible de supprimer le fichier %s.',
	'ACP_CUSTOMCODE_FILE_NOT_OPENED'			=> 'Erreur d’ouverture du fichier %s.',
	'ACP_CUSTOMCODE_FILE_NOT_CLOSED'			=> 'Erreur de fermeture du fichier %s.',
	'ACP_CUSTOMCODE_FILE_WRITE_FAIL'			=> 'Erreur d’écriture du fichier %s.',
	'ACP_CUSTOMCODE_FILE_READ_FAIL'				=> 'Erreur de lecture du fichier %s.',
	'ACP_CUSTOMCODE_FILE_TYPE_FAIL'				=> 'Erreur pour déterminer le type de fichier de %s.',
	'ACP_CUSTOMCODE_FILE_SIZE_FAIL'				=> 'Erreur pour déterminer la taille du fichier %s.',
	'ACP_CUSTOMCODE_EVENT_FILE_INDICATOR'		=> '(E)',
	'ACP_CUSTOMCODE_SHOW_TEMPLATE_EVENTS_LOCATIONS'	=> 'Afficher les emplacements des évènements du template disponibles dans l’extension Custom Code',
	'ACP_CUSTOMCODE_DIRECTORY_NOT_CREATED'		=> 'Impossible de créer le répertoire %s',
	'ACP_CUSTOMCODE_DIRECTORY_NOT_DELETED'		=> 'Erreur de suppression du répertoire %s',
	'ACP_CUSTOMCODE_DIRECTORY_LIST_FAIL'		=> 'Erreur pour lister le contenu du répertoire %s',
	'ACP_CUSTOMCODE_FILE_EXTENSION_NOT_ALLOWED'	=> 'L’extension de fichier %s n’est pas autorisée pour des raisons de sécurité.',
	'ACP_CUSTOMCODE_PHP_NOT_ALLOWED'			=> 'L’inclusion du language PHP n’est pas autorisé pour des raisons de sécurité.',
	'ACP_CUSTOMCODE_INCLUDEPHP_WARNING'			=> 'Attention ! Pour des raisons de sécurité, les codes personnalisés ne seront pas inclus dans les templates lorsque l’analyse du code PHP (via les instructions PHP et INCLUDEPHP) est activée sur le forum. Merci de consulter les %sParamètres de sécurité%s pour désactiver l’option : « Autoriser le PHP dans les templates ».',		
]);
