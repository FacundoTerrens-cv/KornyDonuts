<?php
include '../car/global/config.php';
include '../car/global/conect.php';
include '../car/carrito.php';
$id = $_GET['id'];
$sentencia=$conn->prepare("DELETE * FROM technorw_KornyDonuts.`products` WHERE id = '$id'");
$sentencia->execute();
if($sentencia){
    header("Location: admin.php"); 
}else{
    echo "<script>alert('Error')</script>";
}   