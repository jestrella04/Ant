<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class IssueController extends BaseController
{
	public function getIssue($id = '', $json = false)
	{
		if (!empty($id)) {
			$sp = $this->db->prepare('CALL sp_issue_select(?)');
			$sp->execute(array($id));
			$op = $sp->fetch();
		} else {
			$sp = $this->db->query('CALL sp_issue_select(NULL)');
			$op = $sp->fetchAll();
		}

		if ($json) {
			$op = json_encode($op);
		} 

		return $op;
	}

	public function apiGetIssue(Request $request, Response $response, array $args)
	{
		$id = isset($args['issueId']) ? $args['issueId'] : '';
		$op = $this->getIssue($id, $json = true);

		return $op;
	}

	public function apiPostIssue(Request $request, Response $response, array $args)
	{
		$post = $request->getParsedBody();
		$projectId = filter_var($post['project_id']);
		$categoryId = filter_var($post['category_id']);
		$title = filter_var($post['issue_title']);
		$description = filter_var($post['issue_description']);
		$reporterUserId = filter_var($post['reporter_user_id']);
		$statusId = filter_var($post['status_id']);
		$priorityId = filter_var($post['priority_id']);

		return json_encode($post);
	}

	public function apiPatchIssue()
	{
		$post = $request->getParsedBody();

	}

	public function getIssueHistory($id = 0, $offset = 0, $count = 25, $json = false)
	{
		$sp = $this->db->prepare('CALL sp_issue_history_select(?,?,?)');
		$sp->execute(array($id, $offset, $count));
		$op = $sp->fetchAll();

		if ($json) {
			$op = json_encode($op);
		} 

		return $op;
	}

	public function getIssueComments($id = 0, $offset = 0, $count = 25, $json = false)
	{
		$sp = $this->db->prepare('CALL sp_issue_comment_select(?,?,?)');
		$sp->execute(array($id, $offset, $count));
		$op = $sp->fetchAll();

		if ($json) {
			$op = json_encode($op);
		} 

		return $op;
	}

	public function getIssueFiles($id, $json = false)
	{
		$sp = $this->db->prepare('CALL sp_issue_file_select(?)');
		$sp->execute(array($id));
		$op = $sp->fetchAll();

		if ($json) {
			$op = json_encode($op);
		} 

		return $op;
	}

	public function getIssueLabels($id = 0, $json = false)
	{
		$sp = $this->db->prepare('CALL sp_issue_label_select(?)');
		$sp->execute(array($id));
		$op = $sp->fetchAll();

		if ($json) {
			$op = json_encode($op);
		} 

		return $op;
	}

	public function showIndex(Request $request, Response $response, array $args)
	{
		$args = $this->getCsrfToken($args, $request);
		$args['settings'] = $this->settings;
		$args['issues'] = $this->getIssue();
		//$args['labels'] = $this->getIssueLabels($id);
		
		return $this->renderer->render($response, 'issue/index.php', $args);
	}

	public function showIssue(Request $request, Response $response, array $args)
	{
		$id = $args['issueId'];
		$args = $this->getCsrfToken($args, $request);
		$args['settings'] = $this->settings;
		$args['issue'] = $this->getIssue($id);
		$args['labels'] = $this->getIssueLabels($id);
		$args['files'] = $this->getIssueFiles($id);
		
		return $this->renderer->render($response, 'issue/view.php', $args);
	}

	public function showIssueCreate(Request $request, Response $response, array $args)
	{
		$category = $this->container->get('CategoryController');
		$project = $this->container->get('ProjectController');
		$priority = $this->container->get('PriorityController');

		$args = $this->getCsrfToken($args, $request);
		$args['settings'] = $this->settings;
		$args['categories'] = $category->getCategory();
		$args['projects'] = $project->getProject();
		$args['priorities'] = $priority->getPriority();

		return $this->renderer->render($response, 'issue/create.php', $args);
	}
}