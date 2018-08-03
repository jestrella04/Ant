<?php

/* Display screens */
$app->get('/', 'RenderViewController:showHome')->setname('home');
$app->get('/login', 'RenderViewController:showLogin')->setname('login');
$app->get('/forgot-password', 'RenderViewController:showForgotPassword')->setname('forgot-password');
$app->get('/change-password', 'RenderViewController:showChangePassword')->setname('change-password');

/* Data validation */
$app->post('/login', 'DataValidationController:processPostLoginRequest')->setName('post-login');
$app->post('/forgot-password', 'DataValidationController:processPostForgotPasswordRequest')->setname('post-forgot-password');
$app->post('/change-password', 'DataValidationController:processPostChangePasswordRequest')->setname('post-change-password');
$app->any('/logout', 'DataValidationController:processLogoutRequest')->setName('logout');

/* API group */
$app->group('/json', function () {
    /* Issues */
    $this->get('/issues/{issueId}', 'IssueController:apiGetIssue');
});

/* Issues group */
$app->group('/issues', function () {
	$this->get('', 'IssueController:showIndex');
	$this->get('/create', 'IssueController:showIssueCreate');
	$this->get('/{issueId}/modify', 'IssueController:showIssueModify');
	$this->get('/{issueId}', 'IssueController:showIssue');
	$this->get('/project/{projectId}', 'IssueController:showProjectIndex');
});

/* Projects group */
$app->group('/projects', function () {
	$this->get('', 'ProjectController:showIndex');
	$this->get('/{projectId}', 'ProjectController:showProject');
});

/* Admin group */
$app->group('/admin', function () {
	$this->get('', 'AdminController:showIndex');
});

