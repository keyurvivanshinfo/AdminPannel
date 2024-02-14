<?php
    require('dbconnect.php');

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $userId  = $_GET['userId'];

        $sql = "SELECT * FROM users WHERE userId = ? ";
        
        
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        
        $user = mysqli_fetch_assoc($result);


    }
?>