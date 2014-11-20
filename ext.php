<?php
/**
*  phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license http://opensource.org/licenses/MIT
*/

namespace marttiphpbb\customcode;



class ext extends \phpbb\extension\base
{
	
	public $dir = 'customcode';
	
	private $files = array(
		'overall_footer_after.html'				=> '',
		'overall_footer_copyright_append.html'	=>
			'<br/><a href="https://github.com/marttiphpbb/phpbb-ext-customcode">Custom Code</a> extension for phpBB',
		
		'overall_header_content_before.html'	=> '',
		'overall_header_head_append.html'		=> '',		
		'overall_header_stylesheets_after.html'	=> '',
	);

	/**
	* @param mixed $old_state State returned by previous call of this method
	* @return mixed Returns false after last step, otherwise temporary state
	*/
	function enable_step($old_state)
	{
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet
				// create directory /customcode
				$phpbb_root_path = $this->container->getParameter('core.root_path');
				$dir = $phpbb_root_path . $this->dir;
				if (!file_exists($dir)) 
				{
					if (!mkdir($dir, 0777, true))
					{	
						// translation is not possible here, language files are not yet included
						trigger_error(sprintf('Failed to create the directory %s', $this->dir), E_USER_WARNING);
					}
				}
				
				foreach ($this->files as $filename => $content)
				{
					$filename = $dir . '/' . $filename;
					if (!file_exists($filename))
					{
						file_put_contents($filename, $content);
					}
				}

				return '1';
				break;
			default:
				return parent::enable_step($old_state);
			break;
		}
	}
	

	/**
	* @param mixed $old_state State returned by previous call of this method
	* @return mixed Returns false after last step, otherwise temporary state
	*/
	function purge_step($old_state)
	{
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet
				$phpbb_root_path = $this->container->getParameter('core.root_path');			
				$dir = $phpbb_root_path . $this->dir;			
				$this->remove_directory($dir);
				return '1';
				break;
			default:
				return parent::purge_step($old_state);
				break;
		}
	}
	
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

