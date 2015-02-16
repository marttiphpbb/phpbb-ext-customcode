<?php
/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\customcode;

use phpbb\extension\base;
use marttiphpbb\customcode\model\customcode_directory;

class ext extends base
{
	/**
	* @param mixed $old_state State returned by previous call of this method
	* @return mixed Returns false after last step, otherwise temporary state
	*/
	function enable_step($old_state)
	{
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet
				// create directory
				$phpbb_root_path = $this->container->getParameter('core.root_path');
				$user = $this->container->get('user');
				$customcode_directory = new customcode_directory($user, $phpbb_root_path);
				$customcode_directory->create();
				return '1';
				break;
			default:
				return parent::enable_step($old_state);
			break;
		}
	}

	/**
	* @param mixed $old_state State returned by previous call of this method
	* @return mixed Returns false after last step, otherwise temporary state
	*/
	function purge_step($old_state)
	{
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet
				$phpbb_root_path = $this->container->getParameter('core.root_path');
				$user = $this->container->get('user');
				$customcode_directory = new customcode_directory($user, $phpbb_root_path);
				$customcode_directory->remove();
				return '1';
				break;
			default:
				return parent::purge_step($old_state);
				break;
		}
	}
}
