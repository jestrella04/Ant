<?php
namespace Ant\Controller;

use Ant;

class Home
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
        if (! isset($this->currentUser))
        {
            // Print data on screen
            require_once ('_/inc/view/home/login.php');
        }

        else if (userPermissionCheck('issue_view', $this->currentUserPermissions))
        {
            // Get needed data from database
            $issuesReport = new Ant\Report('issues', 0, 0, 25);
            $activityReport = new Ant\Report('activity', 0, 0, 25);

            $issues = $issuesReport->getData();
            $activities = $activityReport->getData();

            // Print data on screen
            require_once ('_/inc/generic/navbar.php');
            require_once ('_/inc/view/home/main.php');
        }

        else
        {
            // Print data on screen
            require_once ('_/inc/generic/navbar.php');
            require_once ('_/inc/view/error/error.php');
        }
    }
}
