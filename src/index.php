<?php
namespace Ant;

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);

require('_/inc/init.php');
?>
<!doctype html>
<html>
    <head>
        <title></title>
        <?php require('_/inc/head.php'); ?>
    </head>
    <body>
        <?php require('_/inc/header.php'); ?>
        <div class="fluid-container">
            <pre>
                <?php
                $test = new Api();
                echo $test->executeApiCall( 'clientSessionPrepare', array('jestrella', 1 ) );
                ?>
            </pre>
        </div>

        <!-- Footer -->
        <?php require('_/inc/footer.php'); ?>

        <!-- Javascript files -->
        <?php require('_/inc/tail.php'); ?>
    </body>
</html>
