<?php

session_start();

session_unset();
session_destroy();

// delete cookies
setcookie("username", $username, time()-1, "/");
setcookie("password", $password, time()-1, "/");

header("Location: ../views/login.php");

?>