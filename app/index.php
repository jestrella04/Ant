<?php
namespace Ant;

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);
session_start();

require ('_/inc/init.php');

$sessionHandler = new SessionHandler();
$isValidSession = $sessionHandler->isValidSession();

if ($isValidSession)
{
    $currentUser = new User($_SESSION['user_id']);
    $currentUserPermissions = $currentUser->getPermission();
}
?>
<!doctype html>
<html>
    <head>
        <?php require ('_/inc/head.php'); ?>
    </head>
    <body>
        <div class="container">
            <?php
            require ('_/inc/header.php');
            include ('_/inc/view/home.php');
            ?>

            <!-- Footer -->
            <?php require ('_/inc/footer.php'); ?>

            <!-- Javascript files -->
            <?php require ('_/inc/tail.php'); ?>
        </div>
    </body>
</html>
<?php session_write_close(); ?>
