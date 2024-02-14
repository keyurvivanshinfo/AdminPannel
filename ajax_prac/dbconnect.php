<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // connect to the mysql db
    $servername = "localhost";
    $username = "root";
    $password = "Apt@1888";
    $dbname = "mydb";



    // mysqli object oriented
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed with error " . mysqli_connect_error());
    } 
    


?>