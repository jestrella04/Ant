<?php
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);
session_start();

require ('_/inc/generic/init.php');
?>
<!doctype html>
<html>
    <head>
        <?php require ('_/inc/generic/head.php'); ?>
    </head>
    <body>
        <div class="container">
            <!-- Main content -->
            <?php require ('_/inc/generic/routes.php'); ?>

            <!-- Footer -->
            <?php require ('_/inc/generic/footer.php'); ?>

            <!-- Javascript files -->
            <?php require ('_/inc/generic/tail.php'); ?>
        </div>
    </body>
</html>
<?php session_write_close(); ?>
