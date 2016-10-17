<?php
namespace Ant\Controller;

use Ant;

class Create
{
    private $createContentType;
    private $currentUser;
    private $currentUserPermissions;

    public function __construct($contentType)
    {
        $this->createContentType = $contentType;
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
        if ('issue' == $this->createContentType && userPermissionCheck('issue_add', $this->currentUserPermissions))
        {
            // Print data on screen
            require_once ('_/inc/generic/navbar.php');
            require_once ('_/inc/view/create/issue.php');
        }

        else if ('project' == $this->createContentType && userPermissionCheck('project_add', $this->currentUserPermissions))
        {
            // Print data on screen
            require_once ('_/inc/generic/navbar.php');
            require_once ('_/inc/view/create/project.php');
        }

        else
        {
            require_once ('_/inc/generic/navbar.php');
            require_once ('_/inc/view/error/error.php');
        }
    }
}
