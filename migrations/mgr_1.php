<?php
/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 - 2020 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\customcode\migrations;

use marttiphpbb\customcode\util\cnst;

class mgr_1 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\phpbb\db\migration\data\v330\v330',
		];
	}

	public function update_data()
	{
		return [
			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				cnst::L_ACP,
			]],
			['module.add', [
				'acp',
				cnst::L_ACP,
				[
					'module_basename'	=> '\marttiphpbb\customcode\acp\main_module',
					'modes'				=> [
						'files',
						'edit',
					],
				],
			]],
		];
	}
}
