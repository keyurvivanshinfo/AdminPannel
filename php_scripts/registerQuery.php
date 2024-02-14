<?php

require('dbconnect.php');

if (isset($_POST['raiseQuery'])) {

    $name = $_POST['name'];
    $email=$_POST['email'];
    $queryDetails=$_POST['queryDetails'];

    function checkValidation($str){
        if(empty($str)){ return false; } else{ return true; }
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Please valid email');
               window.location.href='../views/raiseQuery.php'
        </script>";
    }

    if(checkValidation($name) && checkValidation($email) && checkValidation($queryDetails)){
        $sql="INSERT INTO `query` ( `name`, `email`, `queryDetails`) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",$name,$email,$queryDetails);

        if($stmt->execute()){
            echo "<script> alert('Query submited successfully');
            window.location.href='../views/raiseQuery.php'
            </script>";
        }else{
            echo "<script> alert('something is wrong');
            window.location.href='../views/raiseQuery.php'
            </script>";
        }
    }

}

?>