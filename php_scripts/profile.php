<?php
    require ('dbconnect.php');

    // session_start();
    $username = $_SESSION['username'];

    $stmt = $conn->prepare("SELECT * FROM users where username = ? ");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    $user = $result->fetch_assoc();
?>