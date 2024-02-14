<?php

require('dbconnect.php');


if (isset($_POST['login'])) {

    $usernameOrEmail = $_POST['usernameOrEmail'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];
    $hashed_password = md5($password);

    $result = "";






    if ($usernameOrEmail == null || $password==null) {
        echo "<script> alert('Please enter all the fields');
               window.location.href='../views/login.php'
        </script>";
    }

    // var_dump(filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL));

    
// --------------------------------------------------------------------------------------

    if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {

        $stmt = $conn->prepare("SELECT * FROM users where email = ? ");
        $stmt->bind_param("s", $usernameOrEmail);
        $stmt->execute();

        $result = $stmt->get_result();


        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['username'] = $row['username'];

                if (isset($remember)) {
                    // var_dump($usernameOrEmail);
                    $hour = time() + (86400 * 30);
                    setcookie("username", $usernameOrEmail, $hour, "/");
                    setcookie("password", $password, $hour, "/");                    
                }

                    if($row['role']==1){
                        header("Location: ../views/adminDashboard.php");
                    }else{
                        header("Location: ../views/index.php");
                    }

            } else {
                echo "<script> alert('Invalid Email or Password');
                window.location.href='../views/login.php'
                </script>";
            }
        } 
    } else {
        $stmt = $conn->prepare("SELECT * FROM users where username = ? ");
        $stmt->bind_param("s", $usernameOrEmail);
        $stmt->execute();

        $result = $stmt->get_result();


        if ($result->num_rows == 1) {

            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['username'] = $row['username'];

                if (isset($remember)) {
                    $hour = time() + (86400 * 30);
                    setcookie("username", $usernameOrEmail, $hour, "/");
                    setcookie("password", $password, $hour, "/");
                    // echo "ok";
                }


                if($row['role']==1){
                    header("Location: ../views/adminDashboard.php");
                }else{
                    header("Location: ../views/index.php");
                }



            } else {
                echo "<script> alert('Invalid Username or Password');
                window.location.href='../views/login.php'
                </script>";
            }
        } else {
            header("Location: ../views/login.php");
        }
    }


// --------------------------------------------------------------------------------------------
}
