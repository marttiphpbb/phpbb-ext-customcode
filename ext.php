<?php
/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\customcode;

use phpbb\extension\base;
use marttiphpbb\customcode\model\customcode_directory;

class ext extends base
{
	/**
	* @param mixed 
	* @return mixed
	*/
	function enable_step($old_state)
	{
		switch ($old_state)
		{
			case '':
				// create directory
				$phpbb_root_path = $this->container->getParameter('core.root_path');
				$language = $this->container->get('language');
				$customcode_directory = new customcode_directory($language, $phpbb_root_path);
				$customcode_directory->create();
				return '1';
				break;
			default:
				return parent::enable_step($old_state);
			break;
		}
	}

	/**
	* @param mixed 
	* @return mixed
	*/
	function purge_step($old_state)
	{
		switch ($old_state)
		{
			case '':
				$phpbb_root_path = $this->container->getParameter('core.root_path');
				$language = $this->container->get('language');
				$customcode_directory = new customcode_directory($language, $phpbb_root_path);
				$customcode_directory->remove();
				return '1';
				break;
			default:
				return parent::purge_step($old_state);
				break;
		}
	}
}
