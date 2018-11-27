<?php

    session_start();
    require_once('../../includes/dbh.php');
    $date = date("Y-m-d H:i:s", time());
    $conn->autocommit(false);

    $addOrder = $conn->prepare("INSERT INTO Orders (listingID, buyerID, orderStatus, date) VALUES (?, ?, ?, ?)");
    $addOrder->bind_param("iiss", $listingID, $buyerID, $orderStatus, $date);

    $addShipping = $conn->prepare("INSERT INTO Shipping (orderID, recipientName, recipientAddress, shippingCost) VALUES (?, ?, ?, ?)"); 
    $addShipping->bind_param("issd", $orderID, $recipientName, $recipientAddress, $shippingCost);

    $addNotification = $conn->prepare("INSERT INTO Notifications (notificationType, generatedBy, targetedTo, date) VALUES (?, ?, ?, ?)");
    $addNotification->bind_param("siis", $notificationType, $buyerID, $sellerID, $date);

    $getOrderID = $conn->prepare("SELECT orderID FROM Orders WHERE buyerID = ? AND date = ?");
    $getOrderID->bind_param("is", $buyerID, $date);

    if(!isset($_SESSION['userID'])) {
        die('Not connected');
    } else {
        $listingID = $_POST['listingID'];
        $buyerID = $_SESSION['userID'];
        $orderStatus = 'waiting shipment';

        if($addOrder->execute()) {
            $getOrderID->execute();
            $getOrderID->bind_result($orderID);
            $getOrderID->fetch();
            $recipientAddress = $_POST['recipientAddress'];
            $recipientName = $_POST['recipientName'];
            $shippingCost = $_POST['shipping'];
            $sellerID = $_POST['sellerID'];
            $notificationType = 'sale';
            
            $getOrderID->close();
            $addOrder->close();

            if($addShipping->execute()) {
                $addShipping->close();
                if($addNotification->execute()) {
                    $addNotification->close();
                    $conn->commit();
                    die('Order Placed');
                } else {
                    die('DB1');
                }
            } else {
                $conn->rollback();
                die('DB2');
            }
        } else {
            $conn->rollback();
            die('DB3');
        }
    }
?>