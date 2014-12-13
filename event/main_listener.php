<?php
/**
*  phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license http://opensource.org/licenses/MIT
*/

namespace marttiphpbb\customcode\event;


use phpbb\request\request;
use phpbb\template\twig\twig as template;

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

	/**
	 * @param request $request
	 * @param template $template
	 * @param string $phpbb_root_path 
	*/
	public function __construct(
		request $request,
		template $template,
		$phpbb_root_path
	)
	{	
		$this->request = $request;
		$this->template = $template;
		$this->phpbb_root_path = $phpbb_root_path;
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
		$show_customcode_events = ($this->request->variable('show_customcode_events', 0)) ? true : false;
		$this->template->assign_var('S_SHOW_CUSTOMCODE_EVENTS', $show_customcode_events);
		if ($show_customcode_events)
		{
			$template_edit_urls = array();
			$params = array(
				'i'			=> '-marttiphpbb-customcode-acp-main_module',
				'mode'		=> 'edit',
			);
			
			
			
			
		}
		
		
		
	}
	
	public function core_append_sid($event)
	{
		if ($this->request->variable('show_customcode_events', 0) && !$this->request->variable('hide_customcode_events', 0))
		{
			$params = $event['params'];
			if (is_string($params))
			{
				$params .= '&show_customcode_events=1';
			}
			else
			{
				if ($params === false)
				{
					$params = array();
				}
				if (isset($params['hide_customcode_events']))
				{
					unset($params['hide_customcode_events']);
				} 
				else
				{
					$params['show_customcode_events'] = 1;					
				}
			}
			$event['params'] = $params;
		}
	}
}
