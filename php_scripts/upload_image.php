<?php



session_start();
require('dbconnect.php');

$_SESSION['error'] = "";



$upload_ok = false;
$insert_ok = false;



if (isset($_POST['submit'])) {

   




    $target_dir = "../images/";

    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    $file_name = basename($_FILES["image"]["name"]);

    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));






    if($_FILES["image"]["name"]=="" || $_FILES["image"]["name"]==NULL){
        
        $_SESSION['error'] = "Please select the file";
    }else{
        if ($file_type == "jpg" or $file_type == "jpeg" or $file_type == "png") {

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $upload_ok = true;
    
    
                $sql = "INSERT INTO images (img_name) values (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $file_name);
                $stmt->execute();
    
                if ($stmt->error) {
                    $_SESSION['error'] = "Error inserting into database";
                } else {
                    $insert_ok = true;
                }
            } else {
                $_SESSION['error'] = "Not able to upload the file on server";
            }
        } else {
            $_SESSION['error'] = "Only allowed (jpg,jpeg,png) files";
        }
    }


    if ($upload_ok && $insert_ok) {
        $_SESSION['error'] = "Image successfully uploaded on the server";
        header("Location: ../views/upload_images.php");

    } else {
        $_SESSION['error'] = "Oops..!! Something went wrong";
        header("Location: ../views/upload_images.php");
    }

    echo $_SESSION['error'];


}else{

    $_SESSION['error'] = "Image size is too large";
    header("Location: ../views/upload_images.php");

}



?>











