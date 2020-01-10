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

	'ACP_MARTTIPHPBB_CUSTOMCODE_EXAMPLE_FILE'				=> 'my_file.html',
	'ACP_MARTTIPHPBB_CUSTOMCODE'							=> 'Aangepaste Code',
	'ACP_MARTTIPHPBB_CUSTOMCODE_EDIT'						=> 'Bewerk',
	'ACP_MARTTIPHPBB_CUSTOMCODE_INCLUDE_EXAMPLE'			=> 'Om je zelf gemaakte bestand in te sluiten, gebruik (fix this)',
	'ACP_MARTTIPHPBB_CUSTOMCODE_CREATE_FILE'				=> 'Maak bestand',
	'ACP_MARTTIPHPBB_CUSTOMCODE_DELETE'						=> 'Verwijder',
	'ACP_MARTTIPHPBB_CUSTOMCODE_DELETE_FILE_NAME'			=> 'Verwijder %s',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILES_EXPLAIN'				=> 'Bestanden direct verbonden met template gebeurtenissen (E) kunnen niet worden verwijderd. Alle bestanden bevinden zich in directory store/customcode.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_SIZE'					=> 'Bestandsgrootte',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_NAME'					=> 'Naam',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_COMMENT'				=> 'Opmerking',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILES'						=> 'Bestanden',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE'						=> 'Bestand',
	'ACP_MARTTIPHPBB_CUSTOMCODE_EDITOR_ROWS'				=> 'Invoerveld rijen',
	'ACP_MARTTIPHPBB_CUSTOMCODE_SAVE_CONFIRM'				=> 'Wilt u bestand %s opslaan?',
	'ACP_MARTTIPHPBB_CUSTOMCODE_SAVE'						=> 'Opslaan',
	'ACP_MARTTIPHPBB_CUSTOMCODE_SAVE_PURGE_CACHE'			=> 'Opslaan en cache leegmaken',
	'ACP_MARTTIPHPBB_CUSTOMCODE_SAVE_PURGE_CACHE_CONFIRM'	=> 'Wilt u bestand %s opslaan en de cache leegmaken?',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_SAVED'					=> 'Bestand %s is succesvol opgeslagen!',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_SAVED_CACHE_PURGED'	=> 'Bestand %s is succesvol opgesalagen en de cache is geleegd!',
	'ACP_MARTTIPHPBB_CUSTOMCODE_NOT_WRITABLE'				=> 'Bestand %s is niet schrijfbaar.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_CREATED'				=> 'Bestand %s is aangemaakt.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILENAME_EMPTY'				=> 'Bestandsnaam was niet ingevuld.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_NOT_CREATED'			=> 'Bestand %s kon niet aangemaakt worden.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_ALREADY_EXISTS'		=> 'Bestand %s bestaat al.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_DELETE_FILE_CONFIRM'		=> 'Verwijder bestand %s ?',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_DELETED'				=> 'Bestand %s is verwijderd.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_DOES_NOT_EXIST'		=> 'Bestand %s bestaat niet.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_FILE_NOT_DELETED'			=> 'Verwijderen van bestand %s is mislukt.',
	'ACP_MARTTIPHPBB_CUSTOMCODE_EVENT_FILE_INDICATOR'		=> '(E)',
	'ACP_MARTTIPHPBB_CUSTOMCODE_SHOW_TEMPLATE_EVENTS_LOCATIONS'	=> 'Toon de Custom Code locaties',

]);
