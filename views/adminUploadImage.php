<?php
    session_start();
    require('../php_scripts/check_login.php');
    require_once('../php_scripts/adminHeader.php'); 
?>

<form action="../php_scripts/upload_image.php" method="post" enctype="multipart/form-data">


    <?php 
        if($_SESSION['error']!=""){
            if($_SESSION['error']=="Image successfully uploaded on the server"){
                echo '<div class="alert alert-success" role="alert">'.$_SESSION['error'].'</div>';
            }else{
                echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
            }
        }

        $_SESSION['error']="";
    ?>

    <div class="input-group mb-3">
       
        <input type="file" class="form-control" placeholder="Upload Image" id="image" name="image" aria-label="Example text with button addon"
            aria-describedby="button-addon1">
    </div>


    <button type="submit" class="btn btn-primary" id="submit" name="submit">Upload Image</button>
</form>






<?php
    require_once('../php_scripts/adminFooter.php');
?>