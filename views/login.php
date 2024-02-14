<?php

session_start();
require '../vendor/autoload.php';

use Google\Service\Oauth2;


if (isset($_SESSION['username'])) {
   if($_SESSION['username']=="admin"){
            echo "<script> alert('You are good to go :) No need to login again');
            window.location.href='adminDashboard.php'
        </script>";
   }else{
        echo "<script> alert('You are good to go :) No need to login again');
        window.location.href='index.php'
    </script>";
   }
}




$clientId = "1051839090133-sude7dl9on7fu7opk7r3l4ngu8hggnum.apps.googleusercontent.com";
$clientSecret = "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";
$redirectURI = "http://localhost/practice/views/test.php";

$client = new Google_Client();
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectURI($redirectURI);
$client->addScope("email");
$client->addScope("profile");



if(isset($_GET["code"])){
    $token=$client->fetchAccessTokenWithAuthCode($_GET["code"]);
    $client->setAccessToken($token["access_token"]);
    
    $obj=new Google_Service_Oauth2($client);
    $data=$obj->userinfo->get();
    
    if(!empty($data->email)&&!empty($data->name)){
      
      //if you want to register user details, place mysql insert query here
      
      $_SESSION["email"]=$data->email;
      $_SESSION["username"]=$data->name;
      header("location:index.php");
    }
  }

?>







<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../assets/reg_css.css" rel="stylesheet">

    <title>Login</title>
</head>

<body>


    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Login Form</h3>
                            <form action="../php_scripts/login.php" method="post">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="usernameOrEmail" name="usernameOrEmail" class="form-control form-control-lg" value="<?php if (isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>" required />
                                            <label class="form-label" for="firstName">Username or Email</label>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" required />
                                            <label class="form-label" for="lastName">Password</label>
                                        </div>

                                    </div>
                                </div>

                                <div><input type="checkbox" name="remember" id="remember" />
                                    <label>Remember me</label>
                                </div>

                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" name="login" value="Login" />
                                </div>

                                <div class="mt-4 pt-2">
                                    <a href="../views/register.php">Don't have account..? click here to register</a>
                                </div>


                                <div class="mt-4 pt-2">
                                    <a href="forgetPassword.php">Forgot password</a>
                                </div>

                                <div class="mt-4 pt-2">
                                    <a class="btn btn-primary btn-lg" href="<?php echo $client->createAuthUrl();?>">Google Login</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>