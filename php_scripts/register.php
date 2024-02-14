<?php
    // error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

include('dbconnect.php');
$errors = array ( $firstNameError = array(),$lastNameError = array(),$usernameError = array(),$passwordError = array(),$emailError = array(),$birthDateError = array(),$phoneNoError = array(),$genderError = array(),$addressError = array());
// $errors = array("firstNameError" => "","lastNameError"=>"","usernameError"=>"","passwordError"=>"","emailError"=>"","birthDateError"=>"","phoneNoError"=>"","addressError"=>"","genderError"=>"");
if(isset($_POST['update'])){

    $userId= $_POST['userId'];

    $username = $_POST['username'];

   
    

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    
    $birthdate = $_POST['birthdate'];

    $phoneno = $_POST['phoneno'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $canEnter = true;

    $sql="UPDATE `users` SET `firstname` = ? , `lastname` = ? ,`birthdate` = ? , `phoneNo` = ? ,`address` = ? ,`gender` = ? WHERE `users`.`userId` = ?";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi",  $firstname, $lastname,  $birthdate, $phoneno, $address, $gender,$userId);



    if ($stmt->execute()) {
       
        header("Location: ../views/allUser.php");
    } else {
       
        header("Location: ../views/allUser.php");
    }

    $stmt->close();

}elseif(isset($_POST['editByUser'])){

    $userId= $_POST['userId'];
    $role = $_POST['role'];

    $username = $_POST['username'];

   
    

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    
    $birthdate = $_POST['birthdate'];

    $phoneno = $_POST['phoneno'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $canEnter = true;

    $sql="UPDATE `users` SET `firstname` = ? , `lastname` = ? ,`birthdate` = ? , `phoneNo` = ? ,`address` = ? ,`gender` = ? WHERE `users`.`userId` = ?";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi",  $firstname, $lastname,  $birthdate, $phoneno, $address, $gender,$userId);



    if ($stmt->execute()) {
       
        header("Location: ../views/profile.php");
    } else {
       
        header("Location: ../views/profile.php");
    }

    $stmt->close();

}
