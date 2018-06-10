<?php
/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\customcode\acp;

use marttiphpbb\customcode\util\cnst;

class main_info
{
	function module()
	{
		return [
			'filename'	=> '\marttiphpbb\customcode\acp\main_module',
			'title'		=> cnst::L_ACP,
			'version'	=> '1.0.0',
			'modes'		=> [
				'files'	=> [
					'title' => cnst::L_ACP . '_FILES',
					'auth' => 'ext_marttiphpbb/customcode && acl_a_board',
					'cat' => [cnst::L_ACP],
				],
				'edit'	=> [
					'title' => cnst::L_ACP . '_EDIT',
					'auth' => 'ext_marttiphpbb/customcode && acl_a_board',
					'cat' => [cnst::L_ACP],
				],
			],
		];
	}
}
