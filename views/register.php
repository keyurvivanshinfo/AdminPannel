<?php



include('../php_scripts/dbconnect.php');

$errors = array($firstNameError = array(), $lastNameError = array(), $usernameError = array(), $passwordError = array(), $emailError = array(), $birthDateError = array(), $phoneNoError = array(), $genderError = array(), $addressError = array());


// $errors = array("firstNameError" => "","lastNameError"=>"","usernameError"=>"","passwordError"=>"","emailError"=>"","birthDateError"=>"","phoneNoError"=>"","addressError"=>"","genderError"=>"");
if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    // $hashed_password = md5($password);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];

    $phoneno = $_POST['phoneno'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $canEnter = true;


    if ($firstname == null) {
        $canEnter = false;
        $errors["firstNameError"][] = "Please enter firstname";
        // array_push($errors["firstNameError"],"Please enter firstname");
    }
    if ($lastname == null) {
        $canEnter = false;
        $errors["lastNameError"][] = "Please enter lastname";
        // array_push($errors["lastNameError"],"Please enter lastname");
    }
    if ($username == null) {
        $canEnter = false;
        $errors["usernameError"][] = "Please enter username";
        // array_push($errors["lastNameError"],"Please enter username");
    }
    if ($password == null) {
        $canEnter = false;
        $errors["passwordError"][] = "Please enter password";
        // array_push($errors["passwordError"],"Please enter password");
    }
    if ($email == null) {
        $canEnter = false;
        $errors["emailError"][] = "Please enter email";
        // array_push($errors["emailError"],"Please enter email");

    }
    if ($birthdate == null) {
        $canEnter = false;
        $errors["birthDateError"][] = "Please select the birthdate";
        // array_push($errors["birthDateError"],"Please enter birthdate");

    }
    if ($phoneno == null) {
        $canEnter = false;
        $errors["phoneNoError"][] = "Please enter the phone number";
        // array_push($errors["phoneNoError"],"Please enter phone number");


    }
    if ($address == null) {
        $canEnter = false;
        $errors["addressError"][] = "Please enter the address";
        // array_push($errors["addressError"],"Please enter the address");

    }
    if ($gender == null) {
        $canEnter = false;
        $errors["genderError"][] = "Please select gender";
        // array_push($errors["genderError"],"Please enter the address");

    }


    // other validation

    if (!preg_match('/[A-Za-z]+$/', $firstname)) {
        $canEnter = false;
        $errors["firstNameError"][] = "Firstname should contains alphabet only";
        // array_push($errors["firstNameError"],"Firstname should contains alphabet only");

    }
    if (!preg_match('/[A-Za-z]+$/', $lastname)) {
        $canEnter = false;
        $errors["lastNameError"][] = "Lastname should contains alphabet only";
        // array_push($errors["lastNameError"],"Lastname should contains alphabet only");

    }
    if (!preg_match('/^[A-Za-z0-9_]+$/', $username)) {
        $canEnter = false;
        $errors["usernameError"][] = "Please enter valid username";
        // array_push($errors["usernameError"],"Please enter valid username");

    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $canEnter = false;
        $errors["emailError"][] = "Please enter valid email";
        // array_push($errors["emailError"],"Please enter valid email");

    }
    if (!preg_match('/^[0-9]{10}+$/', $phoneno)) {
        $canEnter = false;
        $errors["phoneNoError"][] = "Please enter valid phone number";
        // array_push($errors["phoneNoError"],"Please enter valid phone number");

    }





    // var_dump($errors);



    $stmt2 = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? ");
    $stmt2->bind_param("s", $username);
    $stmt2->execute();

    $result2 = $stmt2->get_result();

    // var_dump($result2->num_rows);

    if ($result2->num_rows >= 1) {


        $canEnter = false;
        // array_push($errors["usernameError"],"Please enter unique username");

        $errors["usernameError"][] = "Please enter unique username";
    }

    $stmt2->close();

    $stmt2 = $conn->prepare("SELECT * FROM `users` WHERE `email` = ? ");
    $stmt2->bind_param("s", $email);
    $stmt2->execute();

    $result2 = $stmt2->get_result();

    if ($result2->num_rows >= 1) {



        $canEnter = false;
        // array_push($errors["emailError"],"This email is already registered");
        $errors["emailError"][] = "This email is already registered";
    }

    $stmt2->close();




    if ($canEnter) {
        $stmt = $conn->prepare("INSERT INTO `users` (`username`, `password`,`firstname`,`lastname`,`email`,`birthdate`,`phoneNo`,`address`,`gender`) VALUES (?, ?,?,?,?,?,?,?,?) ");
        $stmt->bind_param("sssssssss", $username, $hashed_password, $firstname, $lastname, $email, $birthdate, $phoneno, $address, $gender);



        if ($stmt->execute()) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            setcookie("username", $username, time() + (86400 * 30), "/");
            setcookie("password", $password, time() + (86400 * 30), "/");
            header("Location: index.php");
        } else {
            echo "<script> alert('We are not able to register you..! PLease try again');
                window.location.href='register.php'
                </script>";
        }

        $stmt->close();
    }
}

?>



<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../assets/reg_css.css" rel="stylesheet">


    <!-- jquery cdn -->
    <script src="../assets/js/jqueryCDN.js"></script>


    <title>Registration</title>
</head>

<body>


    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form action="" method="post">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="firstname" name="firstname" class="form-control form-control-lg" value="<?php if (isset($firstname)) echo $firstname; ?>" />
                                            <label class="form-label" for="firstName">First Name</label>
                                            <label class="form-label text-danger" for="firstName"><?php if (!empty($errors["firstNameError"]) != 0) {
                                                                                                        echo $errors["firstNameError"][0];
                                                                                                    } ?></label>

                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="lastname" name="lastname" class="form-control form-control-lg" value="<?php if (isset($lastname)) echo $lastname; ?>" />
                                            <label class="form-label" for="lastName">Last Name</label>
                                            <label class="form-label text-danger" for="firstName"><?php if (!empty($errors["lastNameError"]) != 0) {
                                                                                                        echo $errors["lastNameError"][0];
                                                                                                    } ?></label>

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">


                                        <div class="form-outline">
                                            <input type="text" id="username" name="username" class="form-control form-control-lg" value="<?php if (isset($username)) echo $username; ?>" />
                                            <label class="form-label">Username</label>
                                            <label class="form-label text-danger" id="usernameError" for="username"><?php if (!empty($errors["usernameError"]) != 0) {
                                                                                                                        echo $errors["usernameError"][0];
                                                                                                                    } ?></label>

                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">


                                        <div class="form-outline">
                                            <input type="email" id="email" name="email" class="form-control form-control-lg" value="<?php if (isset($email)) echo $email; ?>" />
                                            <label class="form-label">Email</label>
                                            <label class="form-label text-danger" id="emailError" for="email"><?php if (!empty($errors["emailError"]) != 0) {
                                                                                                    echo $errors["emailError"][0];
                                                                                                } ?></label>

                                        </div>



                                    </div>
                                </div>

                                <div class="row">


                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" value="<?php if (isset($password)) echo $password; ?>" />
                                            <label class="form-label">Password</label>
                                            <label class="form-label text-danger" for="firstName"><?php if (!empty($errors["passwordError"]) != 0) {
                                                                                                        echo $errors["passwordError"][0];
                                                                                                    } ?></label>

                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <input type="date" class="form-control form-control-lg" id="birthdate" name="birthdate" value="<?php if (isset($birthdate)) {
                                                                                                                                                $date = strtotime($birthdate);
                                                                                                                                                echo date('Y-m-d', $date);
                                                                                                                                            } ?>" />
                                            <label for="birthdate" class="form-label">Birthday</label>
                                            <label class="form-label text-danger" for="firstName"><?php if (!empty($errors["birthDateError"]) != 0) {
                                                                                                        echo $errors["birthDateError"][0];
                                                                                                    } ?></label>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline">
                                            <input type="tel" id="phoneno" name="phoneno" class="form-control form-control-lg" value="<?php if (isset($phoneno)) echo $phoneno; ?>" />
                                            <label class="form-label" for="phoneno">Phone Number</label>
                                            <label class="form-label text-danger" for="firstName"><?php if (!empty($errors["phoneNoError"]) != 0) {
                                                                                                        echo $errors["phoneNoError"][0];
                                                                                                    } ?></label>

                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline">
                                            <input type="text" id="address" name="address" class="form-control form-control-lg" value="<?php if (isset($address)) echo $address; ?>" />
                                            <label class="form-label" for="address">Address</label>
                                            <label class="form-label text-danger" for="firstName"><?php if (!empty($errors["addressError"]) != 0) {
                                                                                                        echo $errors["addressError"][0];
                                                                                                    } ?></label>

                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6 ">

                                        <h6 class="mb-2 pb-1">Gender: </h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female" />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" checked />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="otherGender" value="other" />
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>

                                    </div>

                                    <label class="form-label text-danger" for="firstName"><?php if (!empty($errors["genderError"]) != 0 && $errors["genderError"][0] != "") {
                                                                                                echo $errors["genderError"][0];
                                                                                            } ?></label>

                                </div>



                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" name="register" value="register" />
                                </div>

                                <div class="mt-4 pt-2">
                                    <a href="../views/login.php">Already have an account..? click here to login</a>
                                </div>




                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <script>
        $(document).ready(function() {


            

            $(document).on("keyup", "#username", function() {
                var usernameOrEmail = $("#username").val();

                $.ajax({
                    url: "../apis/checkUniqeness.php?usernameOrEmail=" + usernameOrEmail,
                    method: "GEt",
                    data: "",
                    dataType: "json",
                    success: function(data) {
                        if (!data["status"]) {
                            $("#usernameError").text("Please enter unique username");
                        } else {
                            $("#usernameError").text("");
                        }
                    },
                    error(jqHXR, testStatus, errorThrown) {
                        console.log("error");
                    }

                })

            })


            $(document).on("keyup", "#email", function() {
                var usernameOrEmail = $("#email").val();

                $.ajax({
                    url: "../apis/checkUniqeness.php?usernameOrEmail=" + usernameOrEmail,
                    method: "GEt",
                    data: "",
                    dataType: "json",
                    success: function(data) {
                        if (!data["status"]) {
                            $("#emailError").text("Please enter unique email");
                        } else {
                            $("#emailError").text("");
                        }
                    },
                    error(jqHXR, testStatus, errorThrown) {
                        console.log("error");
                    }

                })

            })



        })
    </script>



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