<?php

    require_once('../../includes/dbh.php');

    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $pwd = md5($pwd);

    $getUser = $conn->prepare("SELECT * FROM Users WHERE username = ? OR email = ?");
    $getUser->bind_param("ss", $username, $username);
    $getUser->bind_result($userID, $firstName, $lastName, $username, $address, $email, $password, $type);

    if($getUser->execute()) {
        $getUser->store_result();
        if($getUser->num_rows < 1) {
            die('credentials');
        } else {
            $getUser->fetch();
            if($password != $pwd) {
                die('credentials');
            } else {
                session_start();
                $_SESSION['userID'] = $userID;
                $_SESSION['firstName'] = $firstName;
                $_SESSION['lastName'] = $lastName;
                $_SESSION['username'] = $username;
                $_SESSION['address'] = $address;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['type'] = $type;
                die('connected');
            }
        }
    } else {
        $getUser->close();
        die('DB Error');
    }

?>