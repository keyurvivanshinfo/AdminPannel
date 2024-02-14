<?php

require('../php_scripts/dbconnect.php');

if(isset($_GET['queryId'])){
    
    $id = $_GET["queryId"];

//     $sql = " DELETE FROM users WHERE username = ? OR email = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("ss", $username, $username);


    $sql = "SELECT * FROM query WHERE queryId=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();

}
?>