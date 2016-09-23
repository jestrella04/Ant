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
            require_once ('_/inc/view/home/login.php');
        }

        else if (isset($this->currentUser) && userPermissionCheck('issue_view', $this->currentUserPermissions) )
        {
            require_once ('_/inc/generic/navbar.php');
            require_once ('_/inc/view/home/main.php');
        }

        else {
            require_once ('_/inc/generic/navbar.php');
            require_once ('_/inc/view/home/error.php');
        }
    }
}
