<?php

require '../php_scripts/dbconnect.php';

if (isset($_GET['page'])) {


    $number = $_GET['page'];


    $sql = "SELECT * FROM users LIMIT " . $number . ",10";
    $result = $conn->query($sql);

    $row = $result->fetch_all();


    echo json_encode($row);
}

?>
