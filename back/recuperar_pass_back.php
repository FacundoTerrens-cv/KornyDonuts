<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
include 'conection.php';
error_reporting(0);
session_start();
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $hash = md5( rand(0,1000));
    $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
    $name =  generate_string($permitted_chars, 5);

            $sql = "UPDATE user_data SET token_pass='".$hash."' WHERE email='".$email."'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $evento = "CREATE EVENT $name ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 MINUTE DO UPDATE `user_data` SET `token_pass` = NULL WHERE email = '$email'";
                $resultado = mysqli_query($conn, $evento);
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
                        $mail->addAddress($email);     //Add a recipient 
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Recover Password';
                        $mail->Body    = 'http://localhost/kornydonuts/back/cambiar_pass.php?email='.$email.'&hash='.$hash.'
                        ';
                        $mail->send();
                        echo 'mensaje enviado';
                    } catch (Exception $e) {
                        echo "error: {$mail->ErrorInfo}";
                    }
                    header("Location: ../front/login.php");
            }
        }
?>



