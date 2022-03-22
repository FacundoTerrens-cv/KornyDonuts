<?php
include 'conection.php';
include '../car/carrito.php';
if(isset($_POST['submit'])){
$id = $_POST['idp'];
$estado = $_POST['estado'];

     $query = "UPDATE technorw_KornyDonuts.`compra` SET estado_entrega = '$estado' WHERE id = '$id'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){
      header('location:../front/admin_pedidos.php');
     }
}
?>
