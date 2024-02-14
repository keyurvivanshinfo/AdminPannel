<?php

session_start();



if (!isset($_SESSION['username'])) {
    echo "<script> alert('Please Login first');
               window.location.href='login.php'
        </script>";
}

// echo $_SESSION['username'];

?>
