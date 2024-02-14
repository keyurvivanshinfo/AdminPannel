<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer autoloader
require 'dbconnect.php';
require '../vendor/autoload.php';

if (isset($_POST['forgotPassword'])) {

    $email = $_POST['usernameOrEmail'];

   
    



    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Please enter valid email');
             window.location.href='../views/forgetPassword.php'
     </script>";
    } else {

        $sql = "SELECT * FROM `users` WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        // execute query
        $stmt->execute();
        // store result (returns boolean)
        $result = $stmt->get_result();
        
        if ($result->num_rows == 0) {
            echo "<script> alert(' No account found with this username or email');
                 window.location.href='../views/forgetPassword.php'
         </script>";
        }

        $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
        $expDate = date("Y-m-d H:i:s", $expFormat);
        $key = md5($email);
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = $key . $addKey;

        $sql = "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES (?,?,? ) ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $email, $key, $expDate);
        // execute query
        $stmt->execute();


        $output = '<p>Dear user,</p>';
        $output .= '<p>Please click on the following link to reset your password.</p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p><a href="http://localhost/practice/views/resetPassword.php?key='.$key.'&email='. $email . '&action=reset" target="_blank">
         Click here to reset passwored</a></p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please be sure to copy the entire link into your browser.
         The link will expire after 1 day for security reason.</p>';
        $output .= '<p>If you did not request this forgotten password email, no action 
         is needed, your password will not be reset. However, you may want to log into 
         your account and change your security password as someone may have guessed it.</p>';
        $output .= '<p>Thanks,</p>';
        $output .= '<p>Creative_.ks</p>';
        $body = $output;



        // Set up PHPMailer
        $mail = new PHPMailer(true);


        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'mail.aptwebdesign.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mail@vivanshinfotech.com';
        $mail->Password   = 'ge%!,xc+=xY5';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('mail@vivanshinfotech.com');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset Password';
        $mail->Body    = $body;

        // Send email
        if ($mail->send()) {
            echo "<script> alert('Passwored reset link is successfully sent to your email address');
              window.location.href='../views/login.php'
              </script>";
        } else {
            echo "<script> alert('Cant sent email');
              window.location.href='../views/forgetPassword.php'
              </script>";
        }
    }
}
