<?php
/**
*  phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license http://opensource.org/licenses/MIT
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


$lang = array_merge($lang, array(
 
   'ACP_CUSTOMCODE'                     => 'Aangepaste Code',
   'ACP_CUSTOMCODE_EDIT'                  => 'Bewerk aangepast code bestand',
   'ACP_CUSTOMCODE_EXAMPLES'					=> 'Uitleg',
   'ACP_CUSTOMCODE_EDIT_EXPLAIN'            => 'Alle bestanden staan opgeslagen onder store/customcode. De originele template bestanden zijn niet gewijzigd. Om je zelf gemaakte bestand in te sluiten, gebruik INCLUDE, INCLUDECSS (in overall_header_head_append.html) of INCLUDEJS (bijv. in overall_footer_after.html). In de INCLUDE, INCLUDECSS of INCLUDEJS opdracht moet je je bestandsnaam vooraf laten gaan met ../../../../../../store/customcode/  <br/>Purge de cache om de wijzigingen te laten werken.',
   'ACP_CUSTOMCODE_CREATE_DELETE'            => 'Maak of verwijder bestanden met aangepaste code',
   'ACP_CUSTOMCODE_CREATE_DELETE_EXPLAIN'      => 'Deze bestanden staan onder store/customcode/',
   'ACP_CUSTOMCODE_CREATE'                  => 'Maak',
   'ACP_CUSTOMCODE_NEW_FILE'               => 'Nieuw aangepaste code bestand',
   'ACP_CUSTOMCODE_DELETE'                  => 'Verwijder',
   'ACP_CUSTOMCODE_DELETE_EXPLAIN'            => 'Bestanden direct verbonden met template gebeurtenissen (E) kunnen niet worden verwijderd. Gebruik de editor voor het wijzigen of verwijderen van code.',
   'ACP_CUSTOMCODE_DELETE_SELECTED'         => 'Verwijder geselecteerd',
   'ACP_CUSTOMCODE_SELECT_ALL'               => 'Selecteer alles',
   'ACP_CUSTOMCODE_UNSELECT_ALL'            => 'De-selecteer alles',
   'ACP_CUSTOMCODE_FILES'                  => 'Bestanden',
   'ACP_CUSTOMCODE_FILE'                  => 'Bestand',
   'ACP_CUSTOMCODE_FILE_EXPLAIN'            => 'Bestanden direct ingesloten met template gebeurtenissen zijn gemarkeerd met (E)',
   'ACP_CUSTOMCODE_EDITOR_ROWS'            => 'Invoerveld regels',
   'ACP_CUSTOMCODE_SAVE'                  => 'Opslaan',
   'ACP_CUSTOMCODE_FILE_SAVED'               => 'Het bestand is succesvol opgeslagen!',
   'ACP_CUSTOMCODE_FILE_NOT_EXIST'            => 'Dit bestand bestaat niet.',
   'ACP_CUSTOMCODE_NOT_WRITABLE'            => 'Bestand is niet beschrijfbaar.',
   'ACP_CUSTOMCODE_FILE_CREATED'            => 'Bestand is gemaakt.',
   'ACP_CUSTOMCODE_FILENAME_EMPTY'            => 'Bestandsnaam was niet ingevuld.',
   'ACP_CUSTOMCODE_FILE_NOT_CREATED'         => 'Bestand kon niet worden gemaakt.',
   'ACP_CUSTOMCODE_FILE_ALREADY_EXISTS'      => 'Bestand bestaat al.',
   'ACP_CUSTOMCODE_FILES_DELETED'            => 'Het bestand is / de bestanden zijn verwijderd.',
   'ACP_CUSTOMCODE_NO_FILE_SELECTED'         => 'Geen bestand geselecteerd.',
   'ACP_CUSTOMCODE_FILE_DOES_NOT_EXIST'      => 'Bestand geselecteerd voor verwijderen is niet aangetroffen.',
   'ACP_CUSTOMCODE_FILE_NOT_DELETED'         => 'Verwijderen van bestand MISLUKT.',
   
 
));
