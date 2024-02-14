<?php
require '../php_scripts/dbconnect.php';

if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
    $key = $_GET["key"];
    $email = $_GET["email"];

    $curDate = date("Y-m-d H:i:s");

    $sql = "SELECT * FROM `password_reset_temp` WHERE `key`= ? AND `email`= ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $key, $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<script> alert('Invalid/expired link');
               window.location.href='resetPassword.php'
        </script>";
    }

    $row = $result->fetch_assoc();
    $expDate = $row['expDate'];

    if ($expDate >= $curDate) {
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../assets/reg_css.css" rel="stylesheet">

    <title>Reset password</title>
</head>

<body>


    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Reset password</h3>

                            <form action="../php_scripts/updatePassword.php" method="post" onclick="return verifyPassword()">
                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <input type="hidden" name="email" value="<?php echo $email;?>" />

                                        <div class="form-outline">
                                            <input type="text" id="pass1" name="pass1"
                                                class="form-control form-control-lg" value="" required />
                                            <label class="form-label" for="firstName">New Password</label>
                                        </div>

                                        <div class="form-outline">
                                            <input type="password" id="pass2" name="pass2"
                                                class="form-control form-control-lg" value="" required />
                                            <label class="form-label" for="firstName">confirm password</label>
                                            <p><span class="small"id="message"></span></p>
                                        </div>

                                    </div>

                                </div>

                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" name="updatePassword"
                                        value="Reset" />
                                </div>

                                <div class="mt-4 pt-2">
                                    <a href="login.php">Back to login</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Optional JavaScript; choose one of the two! -->


    <script>
    function verifyPassword() {
        var pw1 = document.getElementById("pass1").value;
        var pw2 = document.getElementById("pass2").value;



        if(pw1 !=pw2){
            document.getElementById("message").innerHTML = "**Password and confirm password should be same";
            return false;
        }else{
            document.getElementById("message").innerHTML = "";
            return true;
        }
    }
    </script>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>


<?php


    }
}

?>