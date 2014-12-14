<?php
/**
*  phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license http://opensource.org/licenses/MIT
*/

namespace marttiphpbb\customcode\event;


use phpbb\request\request;
use phpbb\template\twig\twig as template;

use marttiphpbb\customcode\customcode_directory;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class main_listener implements EventSubscriberInterface
{
	/* @var request */
	protected $request;
	
	/* @var template */
	protected $template;

	/* @var string */
	protected $phpbb_root_path;
	
	/* @var string */
	protected $php_ext;

	/**
	 * @param request $request
	 * @param template $template
	 * @param string $phpbb_root_path 
	*/
	public function __construct(
		request $request,
		template $template,
		$phpbb_root_path,
		$php_ext
	)
	{	
		$this->request = $request;
		$this->template = $template;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'		=> 'load_language_on_setup',
			'core.page_footer'		=> 'core_page_footer',
			'core.append_sid'		=> 'core_append_sid',
		);
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'marttiphpbb/customcode',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}
	
	public function core_page_footer($event)
	{
		$show_customcode_events = ($this->request->variable('customcode_show_events', 0)) ? true : false;
		$this->template->assign_var('S_CUSTOMCODE_SHOW_EVENTS', $show_customcode_events);
		if ($show_customcode_events)
		{
			$customcode_directory = new customcode_directory($this->phpbb_root_path);
			$filenames = $customcode_directory->get_filenames();
			
			$template_edit_urls = array();
			$params = array(
				'i'			=> '-marttiphpbb-customcode-acp-main_module',
				'mode'		=> 'edit',
			);
			
			foreach ($filenames as $filename)
			{
				$params['filename'] = $filename;
				$this->template->assign_var(
					'U_CUSTOMCODE_' . strtoupper($customcode_directory->get_basename($filename)),
					append_sid($this->phpbb_root_path . 'adm/index.' . $this->php_ext, $params)
				);
			}
		}
	}
	
	public function core_append_sid($event)
	{
		if ($this->request->variable('customcode_show_events', 0) && !$this->request->variable('customcode_hide_events', 0))
		{
			$params = $event['params'];
			if (is_string($params))
			{
				$params .= '&customcode_show_events=1';
			}
			else
			{
				if ($params === false)
				{
					$params = array();
				}
				if (isset($params['customcode_hide_events']))
				{
					unset($params['customcode_hide_events']);
				} 
				else
				{
					$params['customcode_show_events'] = 1;					
				}
			}
			$event['params'] = $params;
		}
	}
}
