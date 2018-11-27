<!DOCTYPE html>
<?php

    if(isset($_GET['q'])) {
        echo '<script type="text/javascript"> var q = '."'".$_GET['q']."'".';</script>';
    }

?>
<html>
    <head>
    <base href="https://localhost/DBGroupProject/">
        <?php 
            session_start();
            require_once('includes/head.php'); 
        ?>
        <link type="text/css" rel="stylesheet" href="includes/css/main.css" />
        <script type="text/javascript" src="controller/search.js"></script>
        <script type="text/javascript" src="includes/javascript/helperFunctions.js"></script>
    </head>

    <body>
        <?php require_once('includes/navbar.php'); ?>

        <div class="content content_search">
            
        </div>
    </body>
</html>