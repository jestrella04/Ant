<?php

$app->group('/browse', function () {
	$this->get('/project/{projectId}', 'IssueController:showProject');
	$this->get('/projects', 'ProjectController:showIndex');
	$this->get('/issues', 'IssueController:showIndex');
});

$app->group('/issues', function () {
	$this->get('/{issueId}', 'IssueController:showIssue');
	$this->get('/{issueId}/edit', 'IssueController:showEditIssue');
});

$app->group('/projects', function () {
	$this->get('/browse', 'ProjectController:showIndex');
});

$app->group('/admin', function () {
	$this->get('', 'AdminController:showIndex');
});
