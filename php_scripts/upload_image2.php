<?php



session_start();
require('dbconnect.php');

$_SESSION['error'] = "";



$upload_ok = false;
$insert_ok = false;


if($_FILES["image2"]["error"]>0){
    $_SESSION['error'] = $_FILES["image2"]["error"];
    echo $_SESSION['image2']['error'];
    header("Location: ../views/upload_images.php");
}
else{

    
    
    
    
    
    
    $target_dir = "../images/";
    
    $target_file = $target_dir . basename($_FILES["image2"]["name"]);
    
    $file_name = basename($_FILES["image2"]["name"]);
    
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    
    
    if (move_uploaded_file($_FILES['image2']['tmp_name'], $target_file)) {
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
    }else{
        $_SESSION['error']= "Failed to upload file.";
    }

    if($upload_ok && $insert_ok){
        $_SESSION['error']= "Image successfully uploaded on the server";
        header("Location: ../views/upload_images.php");

    }






}



?>
