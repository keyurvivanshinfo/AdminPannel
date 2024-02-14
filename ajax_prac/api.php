<?php

require "../php_scripts/dbconnect.php";

if (isset($_GET['number'])) {

    $number = $_GET['number'];
    // echo $number;

    $sql = "SELECT * FROM users LIMIT" . " " . $number;
    $result = $conn->query($sql);

    $row = $result->fetch_all();


    echo json_encode($row);
}

?>
