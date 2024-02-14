
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer autoloader
require '../vendor/autoload.php';
require 'dbconnect.php';


    if(isset($_POST['sendQuery'])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $queryDetails = $_POST["queryDetails"];
        $queryReply = $_POST["queryReply"];
        $queryId=$_POST['queryId'];


        // Set the recipient email address
        

            // Set up PHPMailer
            $mail = new PHPMailer(true);

        
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'mail.aptwebdesign.com';
            // $mail->Host       = 'localhost';
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
            $mail->Subject = 'Regarding query you raised';
            $mail->Body    = 'Query : '.$queryDetails.'<br><br>Solution :'.' '.$queryReply;

            // Send email
            if($mail->send()){


                $stmt = $conn->prepare("UPDATE `query` SET  `answered`= 1 WHERE `queryId`= ? ");
                $stmt->bind_param("i", $queryId);
                $stmt->execute();
        
               


                    echo "<script> alert('Email sent successfully');
                window.location.href='../views/showAllQuery.php'
                </script>";
            }else{
                echo "<script> alert('Cant sent email');
                window.location.href='../views/showAllQuery.php'
                </script>";
            }

            
         

    }
?>