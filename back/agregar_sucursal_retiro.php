<?php 
include 'conection.php';
if(isset($_POST['submit'])){
    $sucursal = $_POST['sucursal_retiro'];
    $nota_pedido = $_POST['nota_pedido'];
    $hora_retiro = $_POST['hora_retiro'];
    $id_transaccion = $_POST['id_transaccion'];
         $query = "UPDATE `compra` SET `sucursal` = '$sucursal', `nota_pedido` = '$nota_pedido', `hora_entrega` = '$hora_retiro' WHERE `compra`.`id_transaccion` = '$id_transaccion';";
         $resultado = mysqli_query($conn,$query);
         if($resultado){
             header('location: ../front/index-user.php');
         }else{
         }
       }
?>



