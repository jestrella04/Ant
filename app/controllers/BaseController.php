<?php

namespace App\Controllers;

use Slim\Container;

class BaseController
{
	protected $container;
	protected $renderer;
	protected $db;
	protected $csrf;
	protected $auth;

	public function __construct(Container $c)
	{
		$this->container = $c;

		$this->renderer = $this->container->get('renderer');
		$this->db = $this->container->get('db');
		$this->csrf = $this->container->get('csrf');
		$this->flash = $this->container->get('flash');
		$this->settings = $this->getAppSettings();
	}

	private function getAppSettings()
	{
		$sp = $this->db->query('CALL sp_settings_select');
		$op = $sp->fetchAll();
		$settings = array();

		foreach ($op as $idx => $config) {
			$settings[$config['name']] = $config['value'];
		}

		return $settings;
	}

	public function getCsrfToken($args, $request)
	{
		// CSRF token name and value
		$args['nameKey'] = $this->csrf->getTokenNameKey();
		$args['valueKey'] = $this->csrf->getTokenValueKey();
		$args['name'] = $request->getAttribute($args['nameKey']);
		$args['value'] = $request->getAttribute($args['valueKey']);

		return $args;
	}
}