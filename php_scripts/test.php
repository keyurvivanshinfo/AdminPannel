<?php

    if(isset($_POST['submit'])){
        $responce = [];
        $responce['success'] = true;
        $responce['name'] = $_POST['name'];

        echo json_encode($responce);
    }

?>