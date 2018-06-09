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
	/* @var string */
	private $phpbb_root_path;

	/* @var language */
	private $language;

	/* @var string */
	private $htaccess_content = "<Files *>\r\n    Order Allow, Deny\r\n    Deny from All\r\n</Files>";

	/* @var array */
	private $template_events = array(
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
	);

	/* @var string */
	private $file_extension = '.html';

	/* @var array */
	protected $comment_tag = array(
		'open'		=> '<!--',
		'close'		=> '-->',
	);

	private $disallowed_file_extensions = [
		'php',
		'php3',
		'php4',
		'php5',
		'php6',
		'phtml',
	];

	private $disallowed_tags = [
		'<!-- PHP',
		'<!-- INCLUDEPHP',
		'{% PHP',
		'{% INCLUDEPHP',
		'<?',
	];

	protected $file_size_scales = ' KMGTP';

	/**
	 * @param  language $language
	 * @param string $phpbb_root_path
	 */
	public function __construct(
		language $language,
		string $phpbb_root_path
	)
	{
		$this->language = $language;
		$this->phpbb_root_path = $phpbb_root_path;

		$this->language->add_lang('acp', 'marttiphpbb/customcode');
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
			$start = strpos($first_line, $this->comment_tag['open']);

			if ($start !== false)
			{
				$start += strlen($this->comment_tag['open']);
				$end = strpos($first_line, $this->comment_tag['close'], $start);

				if ($end !== false)
				{
					$comment = trim(substr($first_line, $start, $end - $start));
				}
			}

		}

		fclose($f);

		return $comment;
	}

	/*
	 * @param string
	 * @return string
	 */
	public function get_filesize($filename)
	{
		$path = $this->phpbb_root_path . cnst::DIR . '/' . $filename;
		$size = @filesize($path);

		if ($size === false)
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_SIZE_FAIL'), $filename), E_USER_WARNING);
		}

		$mul = floor((strlen($size) - 1) / 3);
		return sprintf('%.0f', $size / pow(1024, $mul)) . @$this->file_size_scales[$mul];
	}

	/**
	 * @param string $filename
	 * @return bool
	 */
	public function is_event($filename)
	{
		$basename = $this->get_basename($filename);
		return ($filename === $basename . $this->file_extension && isset($this->template_events[$basename])) ? true : false;
	}

	/**
	 * @param string $filename
	 * @return string
	 */
	public function get_basename($filename)
	{
		return basename($filename, $this->file_extension);
	}

	/**
	 * @param string $filename
	 */
	public function delete_file($filename)
	{
		if (!@unlink($this->phpbb_root_path . cnst::DIR . '/' . $filename))
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_NOT_DELETED'), $filename), E_USER_WARNING);
		}
	}

	/**
	 * @param string $filename
	 */
	public function create_file($filename)
	{
		$file_extension = pathinfo($filename, PATHINFO_EXTENSION);

		if (in_array(strtolower($file_extension), $this->disallowed_file_extensions))
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_EXTENSION_NOT_ALLOWED'), $file_extension), E_USER_WARNING);
		}

		if (!@touch($this->phpbb_root_path . cnst::DIR . '/' . $filename))
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_NOT_CREATED'), $filename), E_USER_WARNING);
		}

		return;
	}

	/**
	 * @param string $filename
	 * @param string $data
	 * @return bool success
	 */
	public function save_to_file($filename, $data)
	{
		foreach ($this->disallowed_tags as $disallowed_tag)
		{
			if (strpos($data, $disallowed_tag) !== false)
			{
				trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_PHP_NOT_ALLOWED')), E_USER_WARNING);
			}
		}

		if (!($f = @fopen($this->phpbb_root_path . cnst::DIR . '/' . $filename, 'wb')))
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_NOT_OPENED'), $filename), E_USER_WARNING);
		}

		if (@fwrite($f, $data) === false)
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_WRITE_FAIL'), $filename), E_USER_WARNING);
		}

		fclose($f);

		return;
	}

	/*
	 * @param string $filename
	 * @return string data
	 */
	public function file_get_contents($filename)
	{
		$content = @file_get_contents($this->phpbb_root_path . cnst::DIR . '/' . $filename);

		if ($content === false)
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_READ_FAIL'), cnst::DIR), E_USER_WARNING);
		}

		return $content;
	}

	/**
	 * @return array
	 */
	public function get_filenames()
	{
		$list = @scandir($this->phpbb_root_path . cnst::DIR);

		if ($list === false)
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_DIRECTORY_LIST_FAIL'), cnst::DIR), E_USER_WARNING);
		}

		return array_diff($list, array('.', '..', '.htaccess'));
	}

	/**
	 *
	 */
	public function create()
	{
		$this->language->add_lang('common', 'marttiphpbb/customcode');

		$dir = $this->phpbb_root_path . cnst::DIR;

		if (!file_exists($dir))
		{
			@mkdir($dir, 0777);
			@chmod($dir, 0777);

			if (!is_dir($dir))
			{
				trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_DIRECTORY_NOT_CREATED'), cnst::DIR), E_USER_WARNING);
			}
		}

		$filename = $dir . '/.htaccess';

		if (@file_put_contents($filename, $this->htaccess_content) === false)
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_WRITE_FAIL'), $filename), E_USER_WARNING);
		}

		foreach ($this->template_events as $template_event => $content)
		{
			$filename = $dir . '/' . $template_event . $this->file_extension;

			if (!file_exists($filename))
			{
				if ($content)
				{
					$content = sprintf($this->language->lang($content), '<!-- ', " -->\r\n<br/>", '<a href="https://github.com/marttiphpbb/phpbb-ext-customcode">', '</a>', $template_event);
				}

				if (@file_put_contents($filename, $content) === false)
				{
					trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_WRITE_FAIL'), $filename), E_USER_WARNING);
				}
			}
		}
	}

	public function remove()
	{
		$this->remove_directory($this->phpbb_root_path . cnst::DIR);
	}

	private function remove_directory($dir)
	{
		if(!is_dir($dir))
		{
			return;
		}

		$objects = @scandir($dir);

		if ($objects === false)
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_DIRECTORY_LIST_FAIL'), $dir), E_USER_WARNING);
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
				trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_TYPE_FAIL'), $object), E_USER_WARNING);
			}

			if ($filetype == 'dir')
			{
				$this->remove_directory($object);
			}
			else
			{
				if (!@unlink($object))
				{
					trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_FILE_NOT_DELETED'), $object), E_USER_WARNING);
				}
			}
		}

		if (!@rmdir($dir))
		{
			trigger_error(sprintf($this->language->lang('ACP_CUSTOMCODE_DIRECTORY_NOT_DELETED'), $dir), E_USER_WARNING);
		}
	}
}
