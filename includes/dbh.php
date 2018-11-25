<?php
    $hostname = "160.153.75.102";
    $username = "DBGroup3";
    $password = "Vh=LfB]j(A.N";
    $dbname = "DBGroupProject";

    //Create connection to DB
    $conn = new mysqli($hostname, $username, $password, $dbname);
    //Check Connection
    if ($conn->connect_error) {
        printf("Connection Failed: %s\n", mysqli_connect_error());
        exit();
    }
?>