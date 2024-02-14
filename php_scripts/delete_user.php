<?php

require('dbconnect.php');

session_start();
$username = $_SESSION['username'];

$sql = " DELETE FROM users WHERE username = ? OR email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $username);

if ($stmt->execute()) {
    
    session_unset();
    session_destroy();

    echo "<script>
            window.location.href='../views/register.php'
            </script>";  // Success message
} else {
    header("Location: ../views/index.php");
}


?>