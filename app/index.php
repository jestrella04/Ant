<?php
namespace Ant;

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);
session_start();

require ('_/inc/init.php');

$sessionHandler = new SessionHandler();
$isValidSession = $sessionHandler->isValidSession();
?>
<!doctype html>
<html>
    <head>
        <?php require ('_/inc/head.php'); ?>
    </head>
    <body>
        <div class="container">
            <?php require ('_/inc/header.php'); ?>
            <?php
            if (! $isValidSession)
            {
                include ('_/inc/view/login.php');
            }

            else
            {
                var_dump($isValidSession);
            }
            ?>

            <!-- Footer -->
            <?php require ('_/inc/footer.php'); ?>

            <!-- Javascript files -->
            <?php require ('_/inc/tail.php'); ?>
        </div>
    </body>
</html>
<?php session_write_close(); ?>
