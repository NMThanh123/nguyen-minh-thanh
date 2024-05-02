<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//required files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$alert = '';
//Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {

  $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'minh9thanh@gmail.com';   //SMTP write your email
    $mail->Password   = 'txfdufkzfkjigkgm';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    

    //Recipients
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $mail->setFrom($email, $name); // Sender Email and name
    $mail->addAddress('minh9thanh@gmail.com'); 
    $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email

    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = $subject . " from " . $name;   // email subject headings
    $mail->Body    = "Name: $name <br>Email: $email <br>Message: $message"; //email message

    // Success sent message alert
    $mail->send();
    // $alert = "<div class = 'sent-message'><span>Your message has been sent. Thank you for contact me!</span></div>";
    echo
    " 
    <script> 
     document.location.href = 'index.html';
    </script>
    ";
}
?>