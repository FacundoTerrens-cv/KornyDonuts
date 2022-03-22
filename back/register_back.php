<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
include 'conection.php';
error_reporting(0);
session_start();
if (isset($_SESSION["username"])) {
    header("Location: login.php");
}
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $pwd_hashed = password_hash($pass, PASSWORD_DEFAULT);
    $cpass = $_POST["cpass"];
    $phone = $_POST["phone"];
    $hash = md5( rand(0,1000) );
    if ($pass == $cpass) {
        $sql = "SELECT * FROM users_data WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO `user_data`(`username`, `pass`, `phone`, `email`, `rol_id`, `token`) VALUE ('$username', '$pwd_hashed', '$phone', '$email', 2, '$hash')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'pruebasterrens@gmail.com';                     //SMTP username
                        $mail->Password   = '42818490';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                        //Recipients
                        $mail->setFrom('elterrens800@gmail.com', 'KornyDonuts');
                        $mail->addAddress($email, $username);     //Add a recipient 
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'este es el registro';
                        $mail->Body    = 'http://localhost/kornydonuts/back/activar.php?email='.$email.'&hash='.$hash.'
                        ';
                        $mail->send();
                        echo 'mensaje enviado';
                    } catch (Exception $e) {
                        echo "error: {$mail->ErrorInfo}";
                    }
                    $username = "";
                    $email = "";
                    $_POST["pass"] = "";
                    $_POST["cpass"] = "";
                    header("Location: ../front/login.php");
            }
        }
    }
}
?>


    $hash = md5( rand(0,1000) );


