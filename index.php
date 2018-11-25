<!DOCTYPE html>
<html>
    <head>
        <?php 
            session_start();
            require_once('includes/head.php'); 
        ?>
    </head>

    <body>
        <?php
            if(isset($_SESSION['userID'])) {
                echo 'connected';
            } else {
                echo 'not connected';
            }
        ?>
    </body>
</html>