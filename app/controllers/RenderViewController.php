<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class RenderViewController extends BaseController
{
	public function showLogin(Request $request, Response $response, array $args)
	{
        $args = $this->getCsrfToken($args, $request);

        // Flash messages
		$args['flashMessages'] = $this->flash->getMessages();

        // Get app settings
		$args['settings'] = $this->settings;

		return $this->renderer->render($response, 'main/login.php', $args);
	}

	public function showHome(Request $request, Response $response, array $args)
	{
		$args = $this->getCsrfToken($args, $request);
		$issue = $this->container->get('IssueController');

        // Flash messages
		$args['flashMessages'] = $this->flash->getMessages();

		// Get app settings
		$args['settings'] = $this->settings;

		// Get last set of issues
		$args['issues'] = $issue->getIssue();

		// Get issue history
		$args['activities'] = $issue->getIssueHistory();
		
		return $this->renderer->render($response, 'main/index.php', $args);
	}

	public function showChangePassword(Request $request, Response $response, array $args)
	{
        $args = $this->getCsrfToken($args, $request);

        // Flash messages
		$args['flashMessages'] = $this->flash->getMessages();

        // Get current user
		$args['userId'] = getCurrentUserId();

        // Get app settings
		$args['settings'] = $this->settings;

		return $this->renderer->render($response, 'main/change-password.php', $args);
	}

	public function showForgotPassword(Request $request, Response $response, array $args)
	{
        $args = $this->getCsrfToken($args, $request);

        // Flash messages
		$args['flashMessages'] = $this->flash->getMessages();

        // Get app settings
		$args['settings'] = $this->settings;

		return $this->renderer->render($response, 'main/forgot-password.php', $args);
	}
}