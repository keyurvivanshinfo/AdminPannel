<?php

require('../php_scripts/dbconnect.php');

$sql = "SELECT * FROM query WHERE `answered`= 0";

$result = mysqli_query($conn, $sql);

?>