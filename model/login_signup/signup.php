<?php

    require_once('../../includes/dbh.php');

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $addNewUser = $conn->prepare("INSERT INTO Users (firstName, lastName, username, address, email, password, type) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $addNewUser->bind_param("sssssss", $firstName, $lastName, $username, $address, $email, $hashedPassword, $type);

    $hashedPassword = md5($password);

    if($addNewUser->execute()) {
        $addNewUser->close();
        die('Registered');
    } else {
        $addNewUser->close();
        die('DB Error');
    }

?>