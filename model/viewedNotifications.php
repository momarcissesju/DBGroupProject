<?php

    session_start();
    require_once('../includes/dbh.php');

    if(isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];
        $date = date("Y-m-d H:i:s", time());

        $markViewed = $conn->prepare("UPDATE Notifications SET viewed = '1' WHERE date < ? AND targetedTo = ?");
        $markViewed->bind_param("si", $date, $userID);

        if($markViewed->execute()) {
            die('good');
        } else {
            die('db');
        }
    } else {    
        die('not connected');
    }

?>