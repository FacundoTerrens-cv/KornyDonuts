<?php
include "conection.php";
include "../car/carrito.php";
$local = $_SESSION['local'];
$cantidad_productos = count($_SESSION['carrito']);
for($i = 0; $i < $cantidad_productos; $i++){
   $nombre = $_SESSION['carrito'][$i]['Nombre'];
   $consulta = "SELECT cantidad FROM technorw_KornyDonuts.`products` WHERE name = '$nombre' AND local = '$local'";
   $resultado=mysqli_query($conn,$consulta);
   while($row=mysqli_fetch_array($resultado)){
    $array[$i] = $row['cantidad'] - $_SESSION['carrito'][$i]['Cantidad'];
    $up="UPDATE technorw_KornyDonuts.`products` SET cantidad = '$array[$i]' WHERE name = '$nombre' AND local = '$local'";
    $ex = mysqli_query($conn, $up);
    header('location:../front/agregar_direccion.php');
}
}
?>