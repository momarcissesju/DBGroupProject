<?php

    session_start();
    require_once('../../includes/dbh.php');
    date_default_timezone_set("UTC");
    $listItem = $conn->prepare("INSERT INTO Listings (productID, sellerID, price, date) VALUES (?, ?, ?, ?)");
    $listItem->bind_param("iiis", $productID, $sellerID, $price, $date);

    if($_SESSION['type'] == 'buyer') {
        die('BUYER');
    } else {
        $productID = $_POST['productID'];
        $sellerID = $_SESSION['userID'];
        $price = $_POST['price'];
        $date = date("Y-m-d H:i:s", time());

        if($listItem->execute()) {
            $listItem->close();
            die('listed');
        } else {
            $listItem->close();
            die('DB');
        }
    }

?>