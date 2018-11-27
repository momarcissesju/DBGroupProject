<?php

    session_start();
    require_once('../../includes/dbh.php');
    $getListings = $conn->prepare("SELECT title, publisher, developer, datePublished, platform, coverURL, l.listingID, price FROM Products p, Listings l WHERE l.listingID IN (SELECT l.listingID FROM Products p, Listings l WHERE l.productID = p.productID AND l.listingID NOT IN (SELECT l.listingID FROM Products p, Listings l, Orders o WHERE l.productID = p.productID AND o.listingID = l.listingID)) AND l.productID = p.productID");

    if($getListings->execute()) {
        $getListings->bind_result($title, $publisher, $developer, $datePublished, $platform, $coverURL, $listingID, $price);
        while($getListings->fetch()) {
            $datePublished = date_create($datePublished);
            echo '<div class="card">
                <img class="card-img-top" src="'.$coverURL.'" alt="'.$title.'">
                <div class="card-body">
                    <h5 class="card-title">'.$title.'</h5>
                    <div class="card-text">
                        <p>Platform: <span>'.$platform.'</span></p>
                        <p>Developer: <span>'.$developer.'</span></p>
                        <p>Publisher: <span>'.$publisher.'</span></p>
                        <p>Published: <span>'.date_format($datePublished, "M j 'y").'</span></p>
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

    $getListings->close();

?>