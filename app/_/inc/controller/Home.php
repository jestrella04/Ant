<?php
namespace Ant;

class Home
{
    public function __construct()
    {
        if (! isset($currentUser))
        {
            require_once ('_/inc/view/home/login.php');
        }

        else if (isset($currentUser) && userPermissionCheck('issue_view', $currentUserPermissions) )
        {
            require_once ('_/inc/navbar.php');
            require_once ('_/inc/view/home/main.php');
        }

        else {
            require_once ('_/inc/navbar.php');
            require_once ('_/inc/view/home/error.php');
        }
    }
}
