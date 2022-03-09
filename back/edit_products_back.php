<?php
include 'conection.php';
include '../car/carrito.php';

if(isset($_POST['submit'])){
$id = $_POST['idp'];
$name = $_POST['namep'];
$description = $_POST['descriptionp'];
$price = $_POST['pricep'];

     $query = "UPDATE technorw_KornyDonuts.`products` SET name = '$name', description = '$description', price = '$price' WHERE id = '$id'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){
      header('location:../front/admin.php');
     }
}
?>
