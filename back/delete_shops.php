<?php
include '../car/global/config.php';
include '../car/global/conect.php';
include '../car/carrito.php';
$id = $_GET['id'];
$sentencia=$pdo->prepare("DELETE FROM technorw_KornyDonuts.`markers` WHERE id = '$id'");
$sentencia->execute();
if($sentencia){
    header("Location: ../front/admin_shops.php"); 
}else{
    echo "<script>alert('Error')</script>";
}   