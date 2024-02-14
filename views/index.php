<?php

session_start();


// if (isset($_COOKIE['username'])) {
//     $_SESSION['username'] =  $_COOKIE['username'];
// }

if (!isset($_SESSION['username'])) {
    echo "<script> alert('Please Login first');
               window.location.href='login.php'
        </script>";
}

// echo $_SESSION['username'];

?>


<?php

    require_once('../php_scripts/header.php');
    // include("../php_scripts/show_weather.php");



    require_once('../php_scripts/footer.php');
?>




               

