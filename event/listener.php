<?php
/**
*  phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 marttiphpbb <info@martti.be>
* @license http://opensource.org/licenses/MIT
*/

namespace marttiphpbb\customcode\event;

use phpbb\auth\auth;
use phpbb\request\request;
use phpbb\template\twig\twig as template;
use phpbb\user;

use marttiphpbb\customcode\model\customcode_directory;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/* @var auth */
	protected $auth;

	/* @var request */
	protected $request;
	
	/* @var template */
	protected $template;
	
	/* @var user */
	protected $user;	

	/* @var string */
	protected $phpbb_root_path;
	
	/* @var string */
	protected $php_ext;

	/**
	 * @param auth $auth
	 * @param request $request
	 * @param template $template
	 * @param user $user
	 * @param string $phpbb_root_path
	 * @param string $php_ext
	*/
	public function __construct(
		auth $auth,
		request $request,
		template $template,
		user $user,
		$phpbb_root_path,
		$php_ext
	)
	{	
		$this->auth = $auth;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_footer'		=> 'core_page_footer',
			'core.append_sid'		=> 'core_append_sid',
		);
	}
	

	public function core_page_footer($event)
	{
		global $phpbb_admin_path; // core.admin_path doesn't seem to exist.

		$page_name = $this->user->page['page_name'];

		$template_vars = array(
			'CUSTOMCODE_PAGE' 			=> $page_name,
			'CUSTOMCODE_LANG'			=> $this->user->lang_name,
		);
		
		$params = array();
		parse_str($this->user->page['query_string'], $params);

		foreach ($params as $name => $value)
		{
			$template_vars['CUSTOMCODE_PARAM_' . strtoupper($name)] = $value;
		}

		$this->template->assign_vars($template_vars);

		$show_events = ($this->request->variable('customcode_show_events', 0)) ? true : false;

		if ($show_events && $this->auth->acl_get('a_'))
		{	
			
			$query_string = $this->user->page['query_string'];

			$query_string = str_replace('&customcode_show_events=1', '&customcode_show_events=0', $query_string);
			$query_string = str_replace('customcode_show_events=1', 'customcode_show_events=0', $query_string);
			
			$this->template->assign_var('U_CUSTOMCODE_HIDE_EVENTS', append_sid($page_name, $query_string));
			
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
					append_sid($phpbb_admin_path . 'index.' . $this->php_ext, $params, true, $this->user->session_id)
				);
			}
			
			$this->user->add_lang_ext('marttiphpbb/customcode', 'common');
		}
	}
	


	public function core_append_sid($event)
	{
		$params = $event['params'];
		
		if (is_string($params))
		{
			if (strpos($params, 'customcode_show_events=0') !== false)
			{
				return;
			}
		}		

		if ($this->request->variable('customcode_show_events', 0) 
			&& $this->auth->acl_get('a_'))
		{
			if (is_string($params) && $params != '')
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
					$params = false;
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
