<?php

    session_start();
    require_once('../includes/dbh.php');

    if(isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];

        $getNotifications = $conn->prepare("SELECT notificationID, notificationType, username, date FROM Notifications n, Users u WHERE targetedTo = ? AND viewed = '0' AND generatedBy = userID");
        $getNotifications->bind_param("i", $userID);
        $getNotifications->bind_result($notificationID, $notificationType, $generatedBy, $date);

        if($getNotifications->execute()) {
            while($getNotifications->fetch()) {
                $date = date_create($date);
                echo '<p>' . $generatedBy . ' bought your video game. ' . date_format($date,"M j G:i") . '</p>';
                echo '<button onclick="viewed()">OK.</button>';
            }
        }
    } else {    
        die('not connected');
    }

?>