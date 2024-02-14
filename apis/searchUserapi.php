<?php

require '../php_scripts/dbconnect.php';


    if (isset($_GET['key'])) {

        $page = $_GET['page']*7 ;
        $key = $_GET['key'];

        $order = $_GET['order'];
        $orderBy = $_GET['orderBy'];
        $order= strtoupper($order);
        

        $key = "'%" . $key . "%'";


        $sql = "SELECT * FROM users WHERE username LIKE ".$key." OR firstname LIKE ".$key." OR lastname LIKE ".$key." OR email LIKE ".$key." OR phoneNo LIKE ".$key." OR address LIKE ".$key." OR gender LIKE ".$key." ORDER BY ".$orderBy." ". $order." LIMIT 7 OFFSET ".$page;
        
        $result = $conn->query($sql);

        echo json_encode($result->fetch_all());
        
        }
?>
