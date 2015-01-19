<?php
/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\customcode\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\marttiphpbb\customcode\acp\main_module',
			'title'		=> 'ACP_CUSTOMCODE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'files'	=> array(
					'title' => 'ACP_CUSTOMCODE_FILES',
					'auth' => 'ext_marttiphpbb/customcode && acl_a_board',
					'cat' => array('ACP_CUSTOMCODE'),
				),
				'edit'	=> array(
					'title' => 'ACP_CUSTOMCODE_EDIT',
					'auth' => 'ext_marttiphpbb/customcode && acl_a_board',
					'cat' => array('ACP_CUSTOMCODE'),
				),
			),
		);
	}
}
