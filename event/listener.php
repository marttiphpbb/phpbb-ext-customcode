<?php
/**
* phpBB Extension - marttiphpbb customcode
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\customcode\event;

use phpbb\event\data as event;
use phpbb\auth\auth;
use phpbb\config\config;
use phpbb\request\request;
use phpbb\template\twig\twig as template;
use phpbb\user;
use phpbb\language\language;
use phpbb\template\twig\loader;
use marttiphpbb\customcode\model\customcode_directory;
use marttiphpbb\customcode\util\cnst;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $auth;
	protected $config;
	protected $request;
	protected $template;
	protected $user;
	protected $language;
	protected $loader;
	protected $phpbb_root_path;
	protected $php_ext;

	public function __construct(
		auth $auth,
		config $config,
		request $request,
		template $template,
		user $user,
		language $language,
		loader $loader,
		string $phpbb_root_path,
		string $php_ext
	)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->language = $language;
		$this->loader = $loader;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
	}

	static public function getSubscribedEvents()
	{
		return [
			'core.page_header'		=> 'core_page_header',
			'core.append_sid'		=> 'core_append_sid',
			'core.twig_environment_render_template_before'
				=> 'core_twig_environment_render_template_before',
		];
	}

	public function core_page_header(event $event)
	{
		if ($this->config['tpl_allow_php'])
		{
			return;
		}

		$this->loader->addSafeDirectory($this->phpbb_root_path . cnst::DIR);
		$this->template->assign_var('CUSTOMCODE_PATH', cnst::PATH . '/');
	}

	public function core_append_sid(event $event)
	{
		$url = $event['url'];
		$params = $event['params'];

		if (!$this->auth->acl_get('a_'))
		{
			return;
		}

		if (strpos($url, './adm/index') === 0)
		{
			return;
		}

		if (is_string($params))
		{
			if (strpos($params, 'customcode_show_events=0') !== false)
			{
				return;
			}
		}

		if ($this->request->variable('customcode_show_events', 0))
		{
			if (is_string($params))
			{
				if ($params !== '')
				{
					$params .= '&';
				}

				$params .= 'customcode_show_events=1';
			}
			else
			{
				if ($params === false)
				{
					$params = [];
				}

				$params['customcode_show_events'] = 1;
			}

			$event['params'] = $params;
		}
	}

	public function core_twig_environment_render_template_before(event $event)
	{
		global $phpbb_admin_path; // core.admin_path doesn't seem to exist.

		$context = $event['context'];
		$tpl = [];

		$show_events = $this->request->variable('customcode_show_events', 0) ? true : false;
		$show_events = $show_events && $this->auth->acl_get('a_');
		$show_events = $show_events && !$this->config['tpl_allow_php'];
		$tpl['show_events'] = $show_events;

		$query_string = $this->user->page['query_string'];
		$query = [];
		parse_str($query_string, $query);
		$tpl['query'] = $query;

		if (!$show_events)
		{
			$context['marttiphpbb_customcode'] = $tpl;
			$event['context'] = $context;
			return;
		}

		$this->language->add_lang('common', 'marttiphpbb/customcode');

		$page = $this->user->page['script_path'] . $this->user->page['page_name'];
		$query_string = str_replace([
			'&customcode_show_events=1',
			'&customcode_show_events=0',
		], '', $query_string);
		$query_string = str_replace([
			'customcode_show_events=1',
			'customcode_show_events=0',
		], '', $query_string);
		$query_string = trim($query_string, '&');
		$query_string .= $query_string ? '&' : '';

		$u_edit_events = [];
		$params = [
			'i'			=> '-marttiphpbb-customcode-acp-main_module',
			'mode'		=> 'edit',
		];

		foreach (customcode_directory::TEMPLATE_EVENTS as $event_name => $str)
		{
			$params['filename'] = $event_name . '.html';

			$u_edit_events[$event_name] = append_sid(
				$phpbb_admin_path . 'index.' . $this->php_ext,
				$params, true, $this->user->session_id);
		}

		$tpl['u_hide'] = append_sid($page, $query_string . 'customcode_show_events=0');
		$tpl['u_edit_events'] = $u_edit_events;

		$context['marttiphpbb_customcode'] = $tpl;
		$event['context'] = $context;
	}
}
