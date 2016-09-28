<?php
namespace Ant\Controller;

use Ant;

class Issue
{
    private $currentUser;
    private $currentUserPermissions;

    public function setCurrentUser($currentUser)
    {
        $this->currentUser = $currentUser;
    }

    public function setCurrentUserPermissions($currentUserPermissions)
    {
        $this->currentUserPermissions = $currentUserPermissions;
    }

    public function loadView()
    {
        if (userPermissionCheck('issue_view', $this->currentUserPermissions) )
        {
            // Get needed data from database
            $issueId = intval($GLOBALS['identifier']);
            $issue = new Ant\Issue($issueId);

            $issueDetails = $issue->getData();
            $issueComments = $issue->getComments();
            $issueTags = $issue->getTags();
            $issueFiles = $issue->getFiles();

            // Print data on screen
            require_once ('_/inc/generic/navbar.php');
            require_once ('_/inc/view/issue/main.php');
        }

        else
        {
            // Print data on screen
            require_once ('_/inc/generic/navbar.php');
            require_once ('_/inc/view/issue/error.php');
        }
    }
}
