<?php

    session_start();
    include '../../includes/dbh.php';
    $getProducts = $conn->prepare("SELECT title, platform, productID FROM Products WHERE title LIKE CONCAT('%',?,'%') ORDER BY datePublished DESC LIMIT 25;");
    $getProducts->bind_param("s", $search);
    $search = $_POST['search'];

    if($getProducts->execute()) {
        $getProducts->bind_result($title, $platform, $productID);
        while($getProducts->fetch()) {
            echo '<div class="item-result" onclick="select_item('."'".$title."'".', '."'".$productID."'".');">
                <p>'.$title.' <span>'.$platform.'</span></p>
            </div>';
        }
    } else {
        die('');
    }

    
    $getProducts->close();
?>