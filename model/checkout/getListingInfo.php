<?php

    session_start();
    require_once('../../includes/dbh.php');
    $getListingInfo = $conn->prepare("SELECT coverURL, title, price, sellerID FROM Listings l, Products p WHERE l.listingID = ? AND l.productID = p.productID");
    $getListingInfo->bind_param("i", $listingID);

    if(!isset($_SESSION['userID'])) {
        die('Not Connected');
    } else {
        $listingID = $_POST['listingID'];
        if($getListingInfo->execute()) {
            $getListingInfo->bind_result($coverURL, $title, $price, $sellerID);
            $getListingInfo->fetch();

            $json = array();

            $data = array(
                'coverURL' => $coverURL,
                'title' => $title,
                'price' => $price,
                'shipping' => 8.00,
                'sellerID' => $sellerID
            );
                            
            array_push($json, $data);

            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            $getListingInfo->close();
            die('DB');
        }
    }

?>