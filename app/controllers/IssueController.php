<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class IssueController extends BaseController
{
	public function getIssue($id = '')
	{
		if (!empty($id)) {
			$sp = $this->db->prepare('CALL sp_issue_select(?)');
			$sp->execute(array($id));
			$op = $sp->fetch();
		} else {
			$sp = $this->db->query('CALL sp_issue_select(NULL)');
			$op = $sp->fetchAll();
		}

		return $op;
	}

	public function getIssueHistory($id = 0, $offset = 0, $count = 25)
	{
		$sp = $this->db->prepare('CALL sp_issue_history_select(?,?,?)');
		$sp->execute(array($id, $offset, $count));
		$op = $sp->fetchAll();

		return $op;
	}

	public function getIssueComments($id = 0, $offset = 0, $count = 25)
	{
		$sp = $this->db->prepare('CALL sp_issue_comment_select(?,?,?)');
		$sp->execute(array($id, $offset, $count));
		$op = $sp->fetchAll();

		return $op;
	}

	public function getIssueFiles($id)
	{
		$sp = $this->db->prepare('CALL sp_issue_file_select(?)');
		$sp->execute(array($id));
		$op = $sp->fetchAll();

		return $op;
	}

	public function getIssueLabels($id = 0)
	{
		$sp = $this->db->prepare('CALL sp_issue_label_select(?)');
		$sp->execute(array($id));
		$op = $sp->fetchAll();

		return $op;
	}

	public function showIndex(Request $request, Response $response, array $args)
	{
		$args = $this->getCsrfToken($args, $request);
		$args['issues'] = $this->getIssue();
		//$args['labels'] = $this->getIssueLabels($id);
		
		return $this->renderer->render($response, 'issue/index.php', $args);
	}

	public function showIssue(Request $request, Response $response, array $args)
	{
		$id = $args['issueId'];
		$args = $this->getCsrfToken($args, $request);
		$args['issue'] = $this->getIssue($id);
		$args['labels'] = $this->getIssueLabels($id);
		$args['files'] = $this->getIssueFiles($id);
		
		return $this->renderer->render($response, 'issue/view.php', $args);
	}
}