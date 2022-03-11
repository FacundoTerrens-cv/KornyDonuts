<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('fpdf.php');
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'¡Hola, Mundo!');
$doc = $pdf->Output('', 'S');

try {
    $mail = new PHPMailer(true);
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'elterrens800@gmail.com';                     //SMTP username
    $mail->Password   = 'facuterrens123';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                                //SMTP password    
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('elterrens800@gmail.com', 'KornyDonuts');
    $mail->addAddress('terrensfacundocv@gmail.com', 'Facundo');     //Add a recipient 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'este es el registro';
    $mail->Body    = 'prueba';
    $mail->AddStringAttachment($doc, 'doc.pdf', 'base64', 'application/pdf');
    $mail->send();
    echo 'mensaje enviado';
} catch (Exception $e) {
    echo "error: {$mail->ErrorInfo}";
}

?>