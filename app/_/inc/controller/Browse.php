<?php
namespace Ant\Controller;

use Ant;

class Browse
{
    private $browseContentId;
    private $currentUser;
    private $currentUserPermissions;

    public function __construct($contentId)
    {
        $this->browseContentId = $contentId;
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
        switch ($this->browseContentId)
        {
            case 'issues':
                // Get needed data from database
                $issuesReport = new Ant\Report('issues', 0, 0, 50);
                $issues = $issuesReport->getData();

                // Print data on screen
                require_once ('_/inc/generic/navbar.php');
                require_once ('_/inc/view/browse/issues.php');
                break;

            case 'projects':
                // Get needed data from database
                $projectReport = new Ant\Report('projects', 0, 0, 0);
                $projects = $projectReport->getData();

                // Print data on screen
                require_once ('_/inc/generic/navbar.php');
                require_once ('_/inc/view/browse/projects.php');
                break;

            default:
                require_once ('_/inc/generic/navbar.php');
                require_once ('_/inc/view/error/error.php');
                break;
        }
    }
}
