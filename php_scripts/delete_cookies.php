<?php

    $hour = time()-1;
    setcookie("username", $username, $hour, "/");
    setcookie("password", $password, $hour, "/");

    header("Location: ../views/index.php");




?>