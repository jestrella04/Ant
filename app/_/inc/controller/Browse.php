<?php
namespace Ant\Controller;

use Ant;

class Browse
{
    private $browseContentId;
    private $currentUser;
    private $currentUserPermissions;
    private $api;

    public function __construct($contentId)
    {
        $this->browseContentId = $contentId;
        $this->api = new Ant\Api();
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
                $params = array();
                $params['project_id'] = isset($_GET['projectId']) ? intval($_GET['projectId']) : 0;

                if (0 < $params['project_id'])
                {
                    $project = $this->api->executeApiCall('projectGet', $params);
                    $projectName = $project['name'];
                }

                else
                {
                    $projectName = 'All';
                }

                $issuesReport = new Ant\Report('issues', $params['project_id'], 0, 50);
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
