<?php
/**
*  phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license http://opensource.org/licenses/MIT
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
				'edit'	=> array(
					'title' => 'ACP_CUSTOMCODE_EDIT', 
					'auth' => 'ext_marttiphpbb/customcode && acl_a_board', 
					'cat' => array('ACP_CUSTOMCODE'),
				),
				'create_delete'	=> array(
					'title' => 'ACP_CUSTOMCODE_CREATE_DELETE', 
					'auth' => 'ext_marttiphpbb/customcode && acl_a_board', 
					'cat' => array('ACP_CUSTOMCODE'),
				),								
			),
		);
	}
}
