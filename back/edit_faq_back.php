<?php
include 'conection.php';
include '../car/carrito.php';

if(isset($_POST['submit'])){
$id = $_POST['idp'];
$title = $_POST['titulop'];
$text = $_POST['textop'];
     $query = "UPDATE technorw_KornyDonuts.`faq_section` SET titulo = '$title', texto = '$text' WHERE id = '$id'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){
      header('location:../front/admin_faq.php');
     }
}
?>
