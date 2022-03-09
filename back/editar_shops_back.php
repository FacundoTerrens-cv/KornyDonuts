<?php
include 'conection.php';
include '../car/carrito.php';

if(isset($_POST['submit'])){
$id = $_POST['idp'];
$name = $_POST['namep'];
$address = $_POST['addressp'];
$city = $_POST['cityp'];
$time = $_POST['timep'];
$lat = $_POST['latp'];
$lng = $_POST['lngp'];

     $query = "UPDATE technorw_KornyDonuts.`markers` SET name = '$name', address = '$address', city = '$city', time = '$time', lat = '$lat', lng = '$lng' WHERE id = '$id'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){
      header('location:../front/admin_shops.php');
     }
}
?>
