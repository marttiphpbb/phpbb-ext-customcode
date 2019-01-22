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

	'ACP_CUSTOMCODE_INCLUDE_EXAMPLE'			=> 'Per includere i propri file aggiungere prima del nome file (fix this)',
	'ACP_CUSTOMCODE_EXAMPLE_FILE'				=> 'my_file.html',
	'ACP_CUSTOMCODE_CREATE_FILE'				=> 'Crea file',
	'ACP_CUSTOMCODE_DELETE'						=> 'Rimuovi',
	'ACP_CUSTOMCODE_DELETE_FILE_NAME'			=> 'Rimuovi %s',
	'ACP_CUSTOMCODE_FILES_EXPLAIN'				=> 'I file direttamente inclusi con l’evento template %1$s non possono essere rimossi. Tutti i file risiedono nella cartella %2$s.',
	'ACP_CUSTOMCODE_FILE_SIZE'					=> 'Dimensione',
	'ACP_CUSTOMCODE_FILE_NAME'					=> 'Nome',
	'ACP_CUSTOMCODE_FILE_COMMENT'				=> 'Commento',
	'ACP_CUSTOMCODE_FILE'						=> 'File',
	'ACP_CUSTOMCODE_EDITOR_ROWS'				=> 'Righe campo di testo',
	'ACP_CUSTOMCODE_SAVE_CONFIRM'				=> 'Vuoi salvare il file %s?',
	'ACP_CUSTOMCODE_SAVE'						=> 'Salva',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE'			=> 'Salva e vuota la cache',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE_CONFIRM'	=> 'Vuoi salvare il file %s e vuotare la cache?',
	'ACP_CUSTOMCODE_FILE_SAVED'					=> 'File %s salvato correttamente!',
	'ACP_CUSTOMCODE_FILE_SAVED_CACHE_PURGED'	=> 'File %s salvato e cache svuotata correttamente!',
	'ACP_CUSTOMCODE_FILE_CREATED'				=> 'Il file %s è stato creato.',
	'ACP_CUSTOMCODE_FILENAME_EMPTY'				=> 'Nome file vuoto.',
	'ACP_CUSTOMCODE_FILE_NOT_CREATED'			=> 'Il file %s non può essere creato.',
	'ACP_CUSTOMCODE_FILE_ALREADY_EXISTS'		=> 'Un file di nome %s esiste già.',
	'ACP_CUSTOMCODE_DELETE_FILE_CONFIRM'		=> 'Rimuovere il file %s ?',
	'ACP_CUSTOMCODE_FILE_DELETED'				=> 'File %s rimosso.',
	'ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'		=> 'Il file %s non esiste.',
	'ACP_CUSTOMCODE_FILE_NOT_DELETED'			=> 'Impossibile rimuovere il file %s.',
	'ACP_CUSTOMCODE_FILE_NOT_OPENED'			=> 'Impossibile aprire il file %s.',
	'ACP_CUSTOMCODE_FILE_NOT_CLOSED'			=> 'Impossibile chiudere il file %s.',
	'ACP_CUSTOMCODE_FILE_WRITE_FAIL'			=> 'Impossibile scrivere nel file %s.',
	'ACP_CUSTOMCODE_FILE_READ_FAIL'				=> 'Impossibile leggere dal file %s.',
	'ACP_CUSTOMCODE_FILE_TYPE_FAIL'				=> 'Impossibile ottenere il tipo file di %s.',
	'ACP_CUSTOMCODE_FILE_SIZE_FAIL'				=> 'Impossibile ottenere la dimensione del file %s.',
	'ACP_CUSTOMCODE_EVENT_FILE_INDICATOR'		=> '(E)',
	'ACP_CUSTOMCODE_SHOW_TEMPLATE_EVENTS_LOCATIONS'	=> 'Mostra le posizioni degli eventi template di Custom code',
	'ACP_CUSTOMCODE_DIRECTORY_NOT_CREATED'		=> 'Impossibile creare la cartella %s',
	'ACP_CUSTOMCODE_DIRECTORY_NOT_DELETED'		=> 'Impossibile rimuovere la cartella %s',
	'ACP_CUSTOMCODE_DIRECTORY_LIST_FAIL'		=> 'Impossibile elencare il contenuto della cartella %s',
	'ACP_CUSTOMCODE_FILE_EXTENSION_NOT_ALLOWED'	=> 'Per motivi di sicurezza, l’estensione file %s non è permessa.',
	'ACP_CUSTOMCODE_PHP_NOT_ALLOWED'			=> 'Per motivi di sicurezza, l’inclusione di php non è permessa.',
	'ACP_CUSTOMCODE_INCLUDEPHP_WARNING'			=> 'Attenzione! Per motivi di sicurezza, il codice personalizzato non sarà incluso nei template se è attiva nella board l’inclusione di codice PHP con le istruzioni PHP e INCLUDEPHP. Controllare le proprie %simpostazioni di sicurezza%s per disattivare le istruzioni PHP e INCLUDEPHP.',
]);
