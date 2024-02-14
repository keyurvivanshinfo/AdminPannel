<?php
    require('dbconnect.php');
    $sql = "SELECT * FROM `users` WHERE role != 1";
    $result = mysqli_query($conn, $sql);

?>