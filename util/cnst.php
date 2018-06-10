<?php
/**
* phpBB Extension - marttiphpbb Custom Code
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\customcode\util;

class cnst
{
	const DIR = 'store/customcode';
	const FOLDER = 'marttiphpbb/customcode';
	const ID = 'marttiphpbb_customcode';
	const PREFIX = self::ID . '_';
	const L = 'CUSTOMCODE';
	const L_ACP = 'ACP_' . self::L;
	const L_MCP = 'MCP_' . self::L;
	const TPL = '@' . self::ID . '/';
	const PATH = self::TPL . '../../../../../../' . self::DIR . '/';
}
