<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('fpdf.php');
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
include 'conection.php';
if(isset($_POST['submit'])){
    $sucursal = $_POST['sucursal_retiro'];
    $nota_pedido = $_POST['nota_pedido'];
    $hora_retiro = $_POST['hora_retiro'];
    $id_transaccion = $_POST['id_transaccion'];
         $query = "UPDATE `compra` SET `sucursal` = '$sucursal', `nota_pedido` = '$nota_pedido', `hora_entrega` = '$hora_retiro' WHERE `compra`.`id_transaccion` = '$id_transaccion';";
         $resultado = mysqli_query($conn,$query);
         if($resultado){

            class PDF extends FPDF
                {
                // Cabecera de página
                function Header()
                {
                    // Logo
                    $this->Image('../images/logokd.png',10,1,50);
                    // Arial bold 15
                    $this->SetFont('Arial','B',15);
                    // Movernos a la derecha
                    $this->Cell(60);
                    // Título
                    $this->Cell(70,10,'Recibo de Compra',0,0,'C');
                    // Salto de línea
                    $this->Ln(20);
                }

                // Pie de página
                function Footer()
                {
                    // Posición: a 1,5 cm del final
                    $this->SetY(-15);
                    // Arial italic 8
                    $this->SetFont('Arial','I',8);
                    // Número de página
                    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
                }
                }      

            $consulta = "SELECT * FROM `compra` WHERE `id_transaccion` = '$id_transaccion'";
            $resultado = mysqli_query($conn, $consulta);
            $row = mysqli_fetch_array($resultado);



            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(70,10,'Productos', 1, 0, 'C',0);
            $pdf->Cell(50,10,'Precio Unitario', 1, 0, 'C',0);
            $pdf->Cell(50,10,'Cantidad', 1, 1, 'C',0);
            if($row['nombre_producto'] > 0){
                $nombre_producto = $row['nombre_producto'];
                $productos = explode("-", $nombre_producto); 
                $numero_productos = count($productos);

                $precio_unitario = $row['precio_unitario'];
                $precios = explode("-", $precio_unitario);

                $cantidad_productos = $row['cantidad_productos'];
                $cantidad = explode("-", $cantidad_productos); 

                for($i = 0; $i < $numero_productos; $i++){
            $pdf->Cell(70,10,$productos[$i], 1, 0, 'C',0);
            $pdf->Cell(50,10,$precios[$i], 1, 0, 'C',0);
            $pdf->Cell(50,10,$cantidad[$i], 1, 1, 'C',0);
                }
            }
            $pdf->Cell(70,10,'', 1, 0, 'C',0);
            $pdf->Cell(50,10,'TOTAL', 1, 0, 'C',0);
            $pdf->Cell(50,10,$row['total_compra'], 1, 1, 'C',0); 
            $doc = $pdf->Output('', 'S');
            $nombre =  "Tu-Recibo-".$id_transaccion.".pdf";
            try {
                $mail = new PHPMailer(true);
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'elterrens800@gmail.com';                     //SMTP username
                $mail->Password   = 'Facuterrens42818490';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                                //SMTP password    
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                //Recipients
                $mail->setFrom('elterrens800@gmail.com', 'KornyDonuts');
                $mail->addAddress('terrensfacundocv@gmail.com', 'Facundo');     //Add a recipient 
                $mail->addBCC('elterrens800@gmail.com');    //mail de KD
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Esto es para Luisina';
                $mail->Body    = $id_transaccion;
                $mail->AddStringAttachment($doc, $nombre, 'base64', 'application/pdf');
                $mail->send();
                echo 'mensaje enviado';
            } catch (Exception $e) {
                echo "error: {$mail->ErrorInfo}";
            }
             header('location: ../front/index-user.php');
         }else{
         }
       }
?>



