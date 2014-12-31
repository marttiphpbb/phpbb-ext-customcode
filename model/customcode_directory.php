<?php
/**
*  phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license http://opensource.org/licenses/MIT
*/

namespace marttiphpbb\customcode\model;



class customcode_directory
{
	
	/* @var string */
	private $phpbb_root_path;

	/* @var string */
	private $dir = 'store/customcode';

	/* @var string */
	private $htaccess_content = "<Files *>\r\n    Order Allow, Deny\r\n    Deny from All\r\n</Files>";

	/* @var array */
	private $template_events = array(
		'forumlist_body_category_header_before'	=> '',
		'overall_footer_after'					=> '',
		'overall_footer_copyright_append'		=>
			"<!-- Custom Code Github link -->\r\n<br/><a href='https://github.com/marttiphpbb/phpbb-ext-customcode'>Custom Code</a> extension for phpBB",
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

	protected $comment_tag = array(
		'open'		=> '<!--',
		'close'		=> '-->',
	);

	protected $file_size_scales = ' KMGTP';


	public function __construct($phpbb_root_path)
	{
		$this->phpbb_root_path = $phpbb_root_path;
	}

	/*
	 * @return string
	 */
	public function get_dir()
	{
		return $this->dir;
	}
	
	/*
	 * @param string
	 * @return string
	 */
	public function get_comment($filename)
	{
		$comment = '';
		$path = $this->phpbb_root_path . $this->dir . '/' . $filename;		
		$f = fopen($path, 'r');
		if ($f && ($first_line = @fgets($f))) 
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
		$path = $this->phpbb_root_path . $this->dir . '/' . $filename;		
		$size = @filesize($path);
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
	 * @return bool success
	 */
	public function delete_file($filename)
	{
		return (unlink($this->phpbb_root_path . $this->dir . '/' . $filename)) ? true : false;
	}

	/**
	 * @param string $filename
	 * @return bool success
	 */
	public function create_file($filename)
	{
		return (touch($this->phpbb_root_path . $this->dir . '/' . $filename)) ? true : false;		
	}

	/**
	 * @param string $filename
	 * @param string $data
	 * @return bool success
	 */
	public function save_to_file($filename, $data)
	{
		if (!($f = @fopen($this->phpbb_root_path . $this->dir . '/' . $filename, 'wb')))
		{
			return false;
			trigger_error(sprintf($user->lang('ACP_CUSTOMCODE_NOT_WRITABLE'), $file) . adm_back_link($this->u_action . '&amp;filename=' . $file), E_USER_WARNING);
		}

		fwrite($f, $data);
		fclose($f);	
		return true;		
	}
	
	/*
	 * @param string $filename
	 * @return string data
	 */
	public function file_get_contents($filename)
	{
		return ($filename) ? file_get_contents($this->phpbb_root_path . $this->dir . '/' . $filename) : '';	
	}

	/**
	 * @return array
	 */
	public function get_filenames()
	{
		return array_diff(scandir($this->phpbb_root_path . $this->dir), array('.', '..', '.htaccess'));
	}


	/**
	 * 
	 */
	public function create()
	{
		$dir = $this->phpbb_root_path . $this->dir;
		if (!file_exists($dir)) 
		{
			@mkdir($dir, 0777);
			@chmod($dir, 0777);
			
			if (!is_dir($dir))
			{	
				// translation is not possible here, language files are not yet included
				trigger_error(sprintf('Failed to create the directory %s', $this->dir), E_USER_WARNING);
			}
		}
		
		file_put_contents($dir . '/.htaccess', $this->htaccess_content);
			
		foreach ($this->template_events as $template_event => $content)
		{
			$filename = $dir . '/' . $template_event . $this->file_extension;
			if (!file_exists($filename))
			{
				file_put_contents($filename, $content);
			}
		}
		
				
	}
	
	/**
	 * 
	 */
	public function remove()
	{
		$this->remove_directory($this->phpbb_root_path . $this->dir);
	}
	
	/**
	 * 
	 */
	private function remove_directory($dir)
	{
		if(!is_dir($dir))
		{
			return;
		}
		$objects = scandir($dir);
		foreach ($objects as $object)
		{
			if ($object == '.' || $object == '..')
			{
				continue;
			}
			$object = $dir . '/' . $object;
			if (filetype($object) == 'dir')
			{
				$this->remove_directory($object);
			} 
			else 
			{
				unlink($object);
			}
		}
		rmdir($dir);
	}	
}	

