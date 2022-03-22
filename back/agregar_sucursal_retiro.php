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
                    $this->Cell(70,10,'Your purchase receipt',0,0,'C');
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
            //crear pdf
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',10);
            $pdf->setX(20);
            $pdf->Cell(85,5,'Proveedor', 0, 0, 'L',0);
            $pdf->Cell(85,5,'Cliente', 0, 1, 'R',0);
            $pdf->setX(20);
            $pdf->Cell(85,5,'Proveedor', 0, 0, 'L',0);
            $pdf->Cell(85,5,'Cliente', 0, 1, 'R',0);
            $pdf->setX(20);
            $pdf->Cell(85,5,'Proveedor', 0, 0, 'L',0);
            $pdf->Cell(85,5,'Cliente', 0, 1, 'R',0);
            $pdf->setX(20);
            $pdf->Cell(85,5,'Proveedor', 0, 0, 'L',0);
            $pdf->Cell(85,5,'Cliente', 0, 1, 'R',0);
            $pdf->Ln(10);
            $pdf->setX(20);
            $pdf->SetFillColor(50, 184, 198);
            $pdf->Cell(20,10,'#', 1, 0, 'C',0);
            $pdf->Cell(70,10,'Products', 1, 0, 'C',0);
            $pdf->Cell(40,10,'Unit price', 1, 0, 'C',0);
            $pdf->Cell(40,10,'Quantity', 1, 1, 'C',0);
            if($row['nombre_producto'] > 0){
                $nombre_producto = $row['nombre_producto'];
                $productos = explode("-", $nombre_producto); 
                $numero_productos = count($productos);

                $precio_unitario = $row['precio_unitario'];
                $precios = explode("-", $precio_unitario);

                $cantidad_productos = $row['cantidad_productos'];
                $cantidad = explode("-", $cantidad_productos); 

                for($i = 0; $i < $numero_productos; $i++){
            $pdf->setX(20);
            $pdf->Cell(20,7,$i+1, 1, 0, 'C',1);
            $pdf->Cell(70,7,$productos[$i], 1, 0, 'C',0);
            $pdf->Cell(40,7,",-".$precios[$i], 1, 0, 'C',0);
            $pdf->Cell(40,7,$cantidad[$i], 1, 1, 'C',0);
                }
            }
            $pdf->setX(20);
            $pdf->Cell(20,7,'', 1, 0, 'C',0);
            $pdf->Cell(70,7,"Numero de pedido: ".$id_transaccion."", 1, 0, 'C',0);
            $pdf->Cell(40,7,'TOTAL', 1, 0, 'C',0);
            $pdf->Cell(40,7,",-".$row['total_compra'], 1, 1, 'C',0); 

            $doc = $pdf->Output('', 'S');

            //enviar mail
            $nombre =  "Tu-Recibo-".$id_transaccion.".pdf";
            try {
                $mail = new PHPMailer(true);
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = '';                     //SMTP username
                $mail->Password   = '';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                                //SMTP password    
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                //Recipients
                $mail->setFrom('elterrens800@gmail.com', 'KornyDonuts');
                $mail->addAddress($mail_user, 'Facundo');     //Add a recipient 
                $mail->addBCC('elterrens800@gmail.com');    //mail de KD
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Esto es su Recibo';
                $mail->Body    = $id_transaccion;
                $mail->AddStringAttachment($doc, $nombre, 'base64', 'application/pdf');
                $mail->send();
                echo 'mensaje enviado';
            } catch (Exception $e) {
                echo "error: {$mail->ErrorInfo}";
            }
             header('location: ../front/index-user.php');
         }
       }
?>



