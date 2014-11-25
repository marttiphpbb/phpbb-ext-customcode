<?php
/**
*  phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license http://opensource.org/licenses/MIT
*/

namespace marttiphpbb\customcode\migrations;

class v_0_1_0 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_CUSTOMCODE'
			)), 
			array('module.add', array(
				'acp',
				'ACP_CUSTOMCODE',
				array(
					'module_basename'	=> '\marttiphpbb\customcode\acp\main_module',
					'modes'				=> array(
						'files',					
						'edit',
					),
				),
			)),
		);
	}


	
	public function update_schema()
	{
	}	
	
	public function revert_schema()
	{
	}	

}
