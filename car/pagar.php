<?php
include 'global/config.php';
include 'global/conect.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>

<?php
if($_POST){
    $total = 0;
    $SID = session_id();
    $Correo=$_POST['email'];
    foreach($_SESSION['carrito'] as $indice=>$Producto){
        $total=$total+($Producto['Precio']*$Producto['Cantidad']);
    }
    $sentencia = $pdo->prepare("INSERT INTO  technorw_KornyDonuts.`tblventas` (`id`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `Status`) 
                                VALUES (NULL, :ClaveTransaccion, '', NOW(), :Correo, :Total, 'pendiente'); ");
    
    $sentencia->bindParam(":ClaveTransaccion",$SID);
    $sentencia->bindParam(":Correo",$Correo);
    $sentencia->bindParam(":Total",$total);
    $sentencia->execute();
    $idVenta=$pdo->lastInsertId();


    foreach($_SESSION['carrito'] as $indice=>$Producto){

        $sentencia = $pdo->prepare("INSERT INTO  technorw_KornyDonuts.`tbldetalleventa` (`id`, `IDVenta`, `IDProducto`, `PrecioUnitario`, `Cantidad`, `Entregado`) 
                                    VALUES (NULL, :IDVenta, :IDProducto, :PrecioUnitario, :Cantidad, '0');"); 

                    $sentencia->bindParam(":IDVenta", $idVenta);
                    $sentencia->bindParam(":IDProducto",$Producto['ID']);
                    $sentencia->bindParam(":PrecioUnitario",$Producto['Precio']);
                    $sentencia->bindParam(":Cantidad",$Producto['Cantidad']);
                    $sentencia->execute();
    }
   // echo "<h3>".$total."</h3>";
}
?>

<div class="jumbotron text-center">
    <h1 class="display-4">¡Paso Final!</h1>
    <hr class="my-4">
    <p class="lead">estas a punto de pagar con PayPal la cantidad de:
        <h4>$<?php echo number_format($total,2);?></h4>
    </p>
    
    <p>Tu pedido se comenzara a preparar una vez procesado el Pago <br/>
        <strong>(Para reclamos Donuts@gmail.com)</strong>
    </p>
</div>

<?php 
include "templates/pie.php"
?>