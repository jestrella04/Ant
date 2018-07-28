<?php

$app->group('/json', function () {
    /* Issues */
    $this->get('/{issueId}', 'IssueController:getIssue');
    $this->post('/{issueId}', 'IssueController:postIssue');
    $this->patch('/{issueId}', 'IssueController:patchIssue');
});
