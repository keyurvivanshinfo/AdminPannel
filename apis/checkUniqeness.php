<?php

require '../php_scripts/dbconnect.php';


if (isset($_GET['usernameOrEmail'])) {

    $usernmaeOrEmail = $_GET['usernameOrEmail'];

    $row = [];

    if (filter_var($usernmaeOrEmail, FILTER_VALIDATE_EMAIL)) {
        $usernmaeOrEmail = "'%" . $usernmaeOrEmail . "%'";
        $sql = "SELECT * FROM users WHERE email LIKE " . $usernmaeOrEmail;
        $result = $conn->query($sql);
        if ($result->num_rows >= 1) {
            $row["status"] = false;
        } else {
            $row["status"] = true;
        }
    } else {
        $usernmaeOrEmail = "'%" . $usernmaeOrEmail . "%'";
        $sql = "SELECT * FROM users WHERE username LIKE " . $usernmaeOrEmail;
        $result = $conn->query($sql);
        if ($result->num_rows >= 1) {
            $row["status"] = false;
        } else {
            $row["status"] = true;
        }
    }




    echo json_encode($row);
}
