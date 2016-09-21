<?php
if (! isset($currentUser))
{
    require_once ('_/inc/view/login.php');
}

else if (isset($currentUser) && userPermissionCheck('issue_view', $currentUserPermissions) )
{
    require_once ('_/inc/navbar.php');
    require_once ('_/inc/view/main.php');
}

else {
    require_once ('_/inc/navbar.php');
    require_once ('_/inc/view/nopermission.php');
}
