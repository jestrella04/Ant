<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class ProjectController extends BaseController
{
    public function getProject($id = '', $json = false)
    {
        if (!empty($id)) {
			$sp = $this->db->prepare('CALL sp_project_select(?)');
			$sp->execute(array($id));
			$op = $sp->fetch();
		} else {
			$sp = $this->db->query('CALL sp_project_select(NULL)');
			$op = $sp->fetchAll();
		}

		if ($json) {
			$op = json_encode($op);
		} 

		return $op;
	}
	
	public function showIndex(Request $request, Response $response, array $args)
	{
		$args = $this->getCsrfToken($args, $request);
		$args['settings'] = $this->settings;
		$args['projects'] = $this->getProject();
		
		return $this->renderer->render($response, 'project/index.php', $args);
	}
}
