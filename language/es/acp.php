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

	'ACP_CUSTOMCODE_INCLUDE_EXAMPLE'			=> 'Para incluir sus propios archivos, anteponga el nombre del archivo con (fix this)',
	'ACP_CUSTOMCODE_EXAMPLE_FILE'				=> 'my_file.html',
	'ACP_CUSTOMCODE_CREATE_FILE'				=> 'Crear archivo',
	'ACP_CUSTOMCODE_DELETE'						=> 'Borrar',
	'ACP_CUSTOMCODE_DELETE_FILE_NAME'			=> 'Borrar %s',
	'ACP_CUSTOMCODE_FILES_EXPLAIN'				=> 'Los archivos incluidos directamente con eventos plantilla %1$s no se pueden eliminar. Todos los archivos residen en el directorio %2$s.',
	'ACP_CUSTOMCODE_FILE_SIZE'					=> 'Tamaño',
	'ACP_CUSTOMCODE_FILE_NAME'					=> 'Nombre',
	'ACP_CUSTOMCODE_FILE_COMMENT'				=> 'Comentario',
	'ACP_CUSTOMCODE_FILE'						=> 'Archivo',
	'ACP_CUSTOMCODE_EDITOR_ROWS'				=> 'Filas del editor',
	'ACP_CUSTOMCODE_SAVE_CONFIRM'				=> '¿ Quiere guardar el archivo %s ?',
	'ACP_CUSTOMCODE_SAVE'						=> 'Guardar',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE'			=> 'Guardar y limpiar el caché',
	'ACP_CUSTOMCODE_SAVE_PURGE_CACHE_CONFIRM'	=> '¿Quiere guardar el archivo %s y purgar el caché?',
	'ACP_CUSTOMCODE_FILE_SAVED'					=> '¡El archivo %s ha sido guardado correctamente!',
	'ACP_CUSTOMCODE_FILE_SAVED_CACHE_PURGED'	=> '¡El archivo %s ha sido guardado, y el caché purgado correctamente!',
	'ACP_CUSTOMCODE_FILE_CREATED'				=> 'El archivo %s ha sido creado.',
	'ACP_CUSTOMCODE_FILENAME_EMPTY'				=> 'El nombre del archivo estaba vacío.',
	'ACP_CUSTOMCODE_FILE_NOT_CREATED'			=> 'El archivo %s no pudo ser creado.',
	'ACP_CUSTOMCODE_FILE_ALREADY_EXISTS'		=> 'El archivo %s ya existe.',
	'ACP_CUSTOMCODE_DELETE_FILE_CONFIRM'		=> '¿ Borrar el archivo %s ?',
	'ACP_CUSTOMCODE_FILE_DELETED'				=> 'El archivo %s ha sido borrado.',
	'ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'		=> 'El archivo %s no existe.',
	'ACP_CUSTOMCODE_FILE_NOT_DELETED'			=> 'Error al eliminar el archivo %s.',
	'ACP_CUSTOMCODE_FILE_NOT_OPENED'			=> 'Error al abrir el archivo %s.',
	'ACP_CUSTOMCODE_FILE_NOT_CLOSED'			=> 'Error al cerrar el archivo %s.',
	'ACP_CUSTOMCODE_FILE_WRITE_FAIL'			=> 'Error al escribir en el archivo %s.',
	'ACP_CUSTOMCODE_FILE_READ_FAIL'				=> 'Error al leer el archivo %s.',
	'ACP_CUSTOMCODE_FILE_TYPE_FAIL'				=> 'No se pudo obtener el tipo de archivo de %s.',
	'ACP_CUSTOMCODE_FILE_SIZE_FAIL'				=> 'No se pudo obtener el tamaño del archivo %s.',
	'ACP_CUSTOMCODE_EVENT_FILE_INDICATOR'		=> '(E)',
	'ACP_CUSTOMCODE_SHOW_TEMPLATE_EVENTS_LOCATIONS'	=> 'Mostrar código personalizado de las ubicaciones de eventos de plantilla',
	'ACP_CUSTOMCODE_DIRECTORY_NOT_CREATED'	=> 'Error al crear el directorio %s',
	'ACP_CUSTOMCODE_DIRECTORY_NOT_DELETED'		=> 'Error al borrar el directorio %s',
	'ACP_CUSTOMCODE_DIRECTORY_LIST_FAIL'		=> 'Error al mostrar el contenido del directorio %s',
	'ACP_CUSTOMCODE_FILE_EXTENSION_NOT_ALLOWED'	=> 'La extensión de archivo %s no se permite por seguridad.',
	'ACP_CUSTOMCODE_PHP_NOT_ALLOWED'			=> 'La inclusión de PHP no está permitido por seguridad.',
]);
