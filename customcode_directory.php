<?php
/**
*  phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license http://opensource.org/licenses/MIT
*/

namespace marttiphpbb\customcode;



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
		'overall_footer_after'				=> '',
		'overall_footer_copyright_append'	=>
			"<!-- Custom Code Github link -->\r\n<br/><a href='https://github.com/marttiphpbb/phpbb-ext-customcode'>Custom Code</a> extension for phpBB",
		'overall_footer_page_body_after'	=> '',
		
		'overall_header_content_before'		=> '',
		'overall_header_head_append'		=> '',		
		'overall_header_page_body_before'	=> '',		
		'overall_header_stylesheets_after'	=> '',
	);
	
	/* @var string */
	private $file_extension = '.html';

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
	 * @return array
	 */
	public function get_filenames()
	{
		return array_map(function($template_event)
		{
			return $template_event . $this->file_extension;
		}, array_keys($this->template_events));
	}
	
	/*
	 * @return array
	 */
	public function get_events()
	{
		return array_keys($this->template_events);
	}
	
	/*
	 * @param string
	 * @return string
	 */
	public function get_initial_content($template_event)
	{
		return (in_array($this->template_events, $template_event)) ? $this->template_events[$template_event] : '';
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

