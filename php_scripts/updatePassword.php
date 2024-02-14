<?php

require 'dbconnect.php';

if (isset($_POST['updatePassword'])) {

    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    
    
    if ($pass1 == $pass2) {
        
        $hashed_password = password_hash($pass1, PASSWORD_DEFAULT);
        $sql = "UPDATE `users` SET `password` = ? WHERE `users`.`email` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $email);
        
        if ($stmt->execute()) {
            echo "post";

            $stmt->close();
            $sql = "DELETE FROM `password_reset_temp`  WHERE `password_reset_temp`.`email` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            echo "<script> alert('Password updated successfully');
                window.location.href='../views/login.php'
            </script>";
        }
    } else {

        echo "<script> alert('Password should be the same as confirmed password');
            window.location.href='../views/resetPassword.php'
        </script>";
    }
}
