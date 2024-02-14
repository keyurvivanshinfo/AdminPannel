<?php
   
    require 'dbconnect.php';

    if (isset($_GET['number'])) {

        $number = $_GET['number'];
        
    
        $sql = "SELECT * FROM users LIMIT ".$number;
        $result = $conn->query($sql);
    
        $row = $result->fetch_all();
    
        
        echo json_encode($row);
    
    
    }


?>