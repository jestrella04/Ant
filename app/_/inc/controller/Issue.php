<?php
namespace Ant\Controller;

use Ant;

class Issue
{
    private $issueId;
    private $currentUser;
    private $currentUserPermissions;

    public function __construct($issueId)
    {
        $this->issueId = $issueId;
    }

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
            $issue = new Ant\Issue($this->issueId);

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
