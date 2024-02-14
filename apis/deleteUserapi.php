<?php

require '../php_scripts/dbconnect.php';

if (isset($_GET['userId'])) {


    $userId = $_GET['userId'];

    $row = [];

    $sql = "DELETE FROM users WHERE userId = ".$userId;
    if ($conn->query($sql) == TRUE) {
        $row["status"]=true;
    }



    echo json_encode($row);
}

?>
