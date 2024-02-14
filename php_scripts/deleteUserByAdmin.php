<?php
    require('dbconnect.php');

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $userId  = $_GET['userId'];

        $sqp = "DELETE FROM users WHERE userId = ?";
        $stmt = mysqli_prepare($conn, $sqp);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        if(mysqli_stmt_execute($stmt)){
            echo "<script> 
                window.location.href='../views/allUser.php'
                </script>";
        }else{
            echo "<script> alert('Dont able to delete the user');
                window.location.href='../views/allUser.php'
                </script>";
        }

    }
?>