<?php

    session_start();
    require_once('../../includes/dbh.php');
    $getListings = $conn->prepare("SELECT A.title, A.publisher, A.developer, A.datePublished, A.platform, A.coverURL, A.listingID, A.price FROM (SELECT title, publisher, developer, datePublished, platform, coverURL, l.listingID, price FROM Products p, Listings l WHERE l.productID = p.productID) A LEFT JOIN (SELECT title, publisher, developer, datePublished, platform, coverURL, l.listingID, price FROM Products p, Listings l, Orders o WHERE l.productID = p.productID AND o.listingID = l.listingID) B ON A.listingID = B.listingID AND B.listingID IS NULL");

    if($getListings->execute()) {
        $getListings->bind_result($title, $publisher, $developer, $datePublished, $platform, $coverURL, $listingID, $price);
        while($getListings->fetch()) {
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
                    if($_SESSION['type'] != 'seller') {
                        if(isset($_SESSION['userID'])) {
                            echo '<a href="#" class="btn btn-primary">BUY NOW ($'.$price.')</a>';
                        } else {
                            echo '<a href="#" class="btn btn-primary disabled">BUY NOW ($'.$price.')</a>';
                        }
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