<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class ApiController extends BaseController
{
	public function postUpdateConfig(Request $request, Response $response, array $args)
	{
		$c = $this->container->get('ConfigController');
		$post = $request->getParsedBody();

		foreach ($post as $key => $val) {
			if ('csrf_name' !== $key && 'csrf_value' !== $key) {
				$val = filterString($val);

				$c->updateConfig($key, $val);
			}
		}

		return json_encode('Config saved');
	}
}