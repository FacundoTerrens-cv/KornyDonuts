<?php
include '../car/global/config.php';
include '../car/global/conect.php';
include '../car/carrito.php';
$id = $_GET['id'];
$sentencia=$pdo->prepare("DELETE FROM technorw_KornyDonuts.`user_data` WHERE id = '$id'");
$sentencia->execute();
if($sentencia){
    header("Location: ../front/index.php"); 
}else{
    echo "<script>alert('Error')</script>";
}   