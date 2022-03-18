<?php
include '../car/global/config.php';
include '../car/global/conect.php';
include '../car/carrito.php';
include 'conection.php';
$id = $_GET['id'];
$consulta = "DELETE FROM `products` WHERE id = '$id'";
$sentencia = mysqli_query($conn,$consulta);
if($sentencia){
    header("Location: admin.php"); 
}else{
    echo "<script>alert('Error')</script>";
}
?>