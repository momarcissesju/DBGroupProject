<?php

    require_once('../includes/dbh.php');

    $getResult = $conn->prepare("SELECT l.productID, coverURL, title, platform, developer, publisher, datePublished, price FROM Products p, Listings l WHERE p.productID = l.productID AND (title LIKE CONCAT('%',?,'%') OR platform LIKE CONCAT('%',?,'%') OR developer LIKE CONCAT('%',?,'%') OR publisher LIKE CONCAT('%',?,'%')) ORDER BY datePublished ASC");
    $getResult->bind_param("ssss", $q, $q, $q, $q);

    if(isset($_GET['q'])) {
        $q = $_GET['q'];
        
        if($getResult->execute()) {
            $getResult->bind_result($productID, $coverURL, $title, $platform, $developer, $publisher, $datePublished, $price);
            
            echo '<h1>Results for '.$q.'</h1>';

            while($getResult->fetch()) {
                echo '<div class="card">
                    <img class="card-img-top" src="'.$coverURL.'" alt="'.$title.'">
                    <div class="card-body">
                        <h5 class="card-title">'.$title.'</h5>
                        <div class="card-text">
                            <p>Platform: <span>'.$platform.'</span></p>
                            <p>Developer: <span>'.$developer.'</span></p>
                            <p>Publisher: <span>'.$publisher.'</span></p>
                            <p>Published: <span>'.$datePublished.'</span></p>
                        </div>';
                        if(isset($_SESSION['type']) && $_SESSION['type'] != 'seller') {
                            echo '<a href="checkout.php?listingID='.$listingID.'" class="btn btn-primary">BUY NOW ($'.$price.')</a>';
                        } else {
                            echo '<a href="#" class="btn btn-primary disabled">BUY NOW ($'.$price.')</a>';
                        }
                    echo '</div>
                </div>';
            }
        } else {
            die('DB');
        }
    } else {
        die('Empty');
    }

?>