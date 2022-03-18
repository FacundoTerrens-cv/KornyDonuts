<?php
include 'conection.php';
include '../car/carrito.php';
if(isset($_POST['submit'])){
$id = $_POST['id_user'];
$username = $_POST['username'];
$email = $_POST['email'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$local = $_POST['local_preferido'];
     $query = "UPDATE technorw_KornyDonuts.`user_data` SET username = '$username', email = '$email', age = '$age', phone = '$phone', local_preferido = '$local' WHERE id = '$id'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){
      header('location:../front/perfil_user.php');
     }
}
?>
