<?php

    require_once('../../includes/dbh.php');

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $addNewUser = $conn->prepare("INSERT INTO Users (firstName, lastName, username, email, password, type) VALUES (?, ?, ?, ?, ?, ?)");
    $addNewUser->bind_param("ssssss", $firstName, $lastName, $username, $email, $hashedPassword, $type);

    $getEmails = $conn->prepare("SELECT email FROM Users WHERE email = ?;");
    $getEmails->bind_param("s", $email);
    if($getEmails->execute()) {
        $getEmails->store_result();
        if($getEmails->num_rows > 0) {
            die('Email'); 
        }
    } else {
        die('DB Error');
    }

    $getUsernames = $conn->prepare("SELECT username FROM Users WHERE username = ?;");
    $getUsernames->bind_param("s", $username);
    if ($getUsernames->execute()) {
        $getUsernames->store_result();
        if($getUsernames->num_rows > 0) {
            die('Username');
        }
    } else {
        die('DB Error');
    }

    $hashedPassword = md5($password);

    if($addNewUser->execute()) {
        $addNewUser->close();
        die('Registered');
    } else {
        $addNewUser->close();
        die('DB Error');
    }

?>