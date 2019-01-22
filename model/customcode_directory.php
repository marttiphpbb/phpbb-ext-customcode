<?php
/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\customcode\model;

use phpbb\language\language;
use marttiphpbb\customcode\util\cnst;

class customcode_directory
{
	protected $phpbb_root_path;
	protected $language;

	const HTACCESS = "<Files *>\r\n    Order Allow, Deny\r\n    Deny from All\r\n</Files>";

	const TEMPLATE_EVENTS = [
		'forumlist_body_category_header_before'	=> '',
		'overall_footer_after'					=> '',
		'overall_footer_body_after'				=> '',
		'overall_footer_copyright_append'		=> 'CUSTOMCODE_GITHUB_LINK',
		'overall_footer_page_body_after'		=> '',
		'overall_header_body_before'			=> '',
		'overall_header_content_before'			=> '',
		'overall_header_head_append'			=> '',
		'overall_header_page_body_before'		=> '',
		'overall_header_stylesheets_after'		=> '',
		'topiclist_row_append'					=> '',
		'viewtopic_body_postrow_post_after' 	=> '',
	];

	const FILE_EXTENSION = '.html';

	const COMMENT_TAGS = [
		['{#-', '-#}'],
		['{#-', '#}'],
		['{#', '-#}'],
		['{#', '#}'],
		['<!--', '-->'],
	];

	const DISALLOWED = [
		'file_extensions'	=> [
			'php',
			'php3',
			'php4',
			'php5',
			'php6',
			'phtml',
		],
		'tags'	=> [
			'<!-- PHP',
			'<!-- INCLUDEPHP',
			'{% PHP',
			'{% INCLUDEPHP',
			'{%- PHP',
			'{%- INCLUDEPHP',
			'<?',
		],
	];

	const FILE_SIZE_SCALES = ' KMGTP';

	public function __construct(
		language $language,
		string $phpbb_root_path
	)
	{
		$this->language = $language;
		$this->phpbb_root_path = $phpbb_root_path;

		$this->language->add_lang('acp', cnst::FOLDER);
	}

	public function get_dir():string
	{
		return cnst::DIR;
	}

	public function get_comment(string $filename):string
	{
		$comment = '';
		$path = $this->phpbb_root_path . cnst::DIR . '/' . $filename;

		$f = @fopen($path, 'r');

		if (!$f)
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_NOT_OPENED'), $filename), E_USER_WARNING);
		}

		if ($first_line = @fgets($f))
		{
			$comment = $this->get_comment_from_line($first_line);
		}

		fclose($f);

		return $comment;
	}

	public function get_filesize(string $filename):string
	{
		$path = $this->phpbb_root_path . cnst::DIR . '/' . $filename;
		$size = @filesize($path);

		if ($size === false)
		{
			trigger_error(sprintf($this->language->lang(
				'ACP_CUSTOMCODE_FILE_SIZE_FAIL'),
				$filename), E_USER_WARNING);
		}

		$mul = floor((strlen($size) - 1) / 3);
		return sprintf('%.0f', $size / pow(1024, $mul)) . @self::FILE_SIZE_SCALES[$mul];
	}

	public function is_event(string $filename):bool
	{
		$basename = $this->get_basename($filename);
		return ($filename === $basename . self::FILE_EXTENSION) && isset(self::TEMPLATE_EVENTS[$basename]);
	}

	public function get_basename(string $filename):string
	{
		return basename($filename, self::FILE_EXTENSION);
	}

	public function delete_file(string $filename)
	{
		if (!@unlink($this->phpbb_root_path . cnst::DIR . '/' . $filename))
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_NOT_DELETED'), $filename), E_USER_WARNING);
		}
	}

	public function create_file(string $filename)
	{
		$file_extension = pathinfo($filename, PATHINFO_EXTENSION);

		if (in_array(strtolower($file_extension), self::DISALLOWED['file_extensions']))
		{
			trigger_error(sprintf($this->language->lang(
				'ACP_CUSTOMCODE_FILE_EXTENSION_NOT_ALLOWED'),
				$file_extension), E_USER_WARNING);
		}

		if (!@touch($this->phpbb_root_path . cnst::DIR . '/' . $filename))
		{
			trigger_error(sprintf($this->language->lang(
				'ACP_CUSTOMCODE_FILE_NOT_CREATED'),
				$filename), E_USER_WARNING);
		}

		return;
	}

	public function save_to_file(string $filename, string $data)
	{
		foreach (self::DISALLOWED['tags'] as $disallowed_tag)
		{
			if (stripos($data, $disallowed_tag) !== false)
			{
				trigger_error(sprintf($this->language->lang(
					'ACP_CUSTOMCODE_PHP_NOT_ALLOWED')),
						E_USER_WARNING);
			}
		}

		if (!($f = @fopen($this->phpbb_root_path . cnst::DIR . '/' . $filename, 'wb')))
		{
			trigger_error(sprintf($this->language->lang(
				'ACP_CUSTOMCODE_FILE_NOT_OPENED'),
				$filename), E_USER_WARNING);
		}

		if (@fwrite($f, $data) === false)
		{
			trigger_error(sprintf($this->language->lang(
				'ACP_CUSTOMCODE_FILE_WRITE_FAIL'),
				$filename), E_USER_WARNING);
		}

		fclose($f);

		return;
	}

	public function file_get_contents(string $filename):string
	{
		$content = @file_get_contents($this->phpbb_root_path . cnst::DIR . '/' . $filename);

		if ($content === false)
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_READ_FAIL'), cnst::DIR), E_USER_WARNING);
		}

		return $content;
	}

	public function get_filenames():array
	{
		$list = @scandir($this->phpbb_root_path . cnst::DIR);

		if ($list === false)
		{
			trigger_error(sprintf($this->language->lang(
				'ACP_CUSTOMCODE_DIRECTORY_LIST_FAIL'),
				cnst::DIR), E_USER_WARNING);
		}

		return array_diff($list, ['.', '..', '.htaccess']);
	}

	public function create()
	{
		$this->language->add_lang('common', cnst::FOLDER);

		$dir = $this->phpbb_root_path . cnst::DIR;

		if (!file_exists($dir))
		{
			@mkdir($dir, 0777);
			@chmod($dir, 0777);

			if (!is_dir($dir))
			{
				trigger_error(sprintf($this->language->lang(
					'ACP_CUSTOMCODE_DIRECTORY_NOT_CREATED'),
					cnst::DIR), E_USER_WARNING);
			}
		}

		$filename = $dir . '/.htaccess';

		if (@file_put_contents($filename, self::HTACCESS) === false)
		{
			trigger_error(sprintf($this->language->lang(
				'ACP_CUSTOMCODE_FILE_WRITE_FAIL'),
				$filename), E_USER_WARNING);
		}

		foreach (self::TEMPLATE_EVENTS as $template_event => $content)
		{
			$filename = $dir . '/' . $template_event . self::FILE_EXTENSION;

			if (!file_exists($filename))
			{
				if ($content === 'CUSTOMCODE_GITHUB_LINK')
				{
					$content = sprintf($this->language->lang($content),
						'{# ',
						" #}\r\n<br>",
						'<a href="https://github.com/marttiphpbb/phpbb-ext-customcode">',
						'</a>',
						$template_event);
				}

				if (@file_put_contents($filename, $content) === false)
				{
					trigger_error(sprintf($this->language->lang(
						'ACP_CUSTOMCODE_FILE_WRITE_FAIL'),
						$filename), E_USER_WARNING);
				}
			}
		}
	}

	public function remove()
	{
		$this->remove_directory($this->phpbb_root_path . cnst::DIR);
	}

	private function remove_directory(string $dir)
	{
		if(!is_dir($dir))
		{
			return;
		}

		$objects = @scandir($dir);

		if ($objects === false)
		{
			trigger_error(sprintf($this->language->lang(
				'ACP_CUSTOMCODE_DIRECTORY_LIST_FAIL'),
				$dir), E_USER_WARNING);
		}

		foreach ($objects as $object)
		{
			if ($object == '.' || $object == '..')
			{
				continue;
			}

			$object = $dir . '/' . $object;

			$filetype = filetype($object);

			if ($filetype === false)
			{
				trigger_error(sprintf($this->language->lang(
					'ACP_CUSTOMCODE_FILE_TYPE_FAIL'),
					$object), E_USER_WARNING);
			}

			if ($filetype == 'dir')
			{
				$this->remove_directory($object);
			}
			else
			{
				if (!@unlink($object))
				{
					trigger_error(sprintf($this->language->lang(
						'ACP_CUSTOMCODE_FILE_NOT_DELETED'),
						$object), E_USER_WARNING);
				}
			}
		}

		if (!@rmdir($dir))
		{
			trigger_error(sprintf($this->language->lang(
				'ACP_CUSTOMCODE_DIRECTORY_NOT_DELETED'),
				$dir), E_USER_WARNING);
		}
	}

	private function get_comment_from_line(string $line):string
	{
		foreach (self::COMMENT_TAGS as $tag)
		{
			$comment = $this->get_content_between_tags($line, $tag[0], $tag[1]);

			if ($comment)
			{
				return trim($comment);
			}
		}

		return '';
	}

	private function get_content_between_tags(string $string, string $start_tag, string $end_tag):string
	{
		$start = strpos($string, $start_tag);

		if ($start === false)
		{
			return '';
		}

		$start += strlen($start_tag);

		$end = strpos($string, $end_tag, $start);

		if ($end === false)
		{
			return '';
		}

		return substr($string, $start, $end - $start);
	}
}
