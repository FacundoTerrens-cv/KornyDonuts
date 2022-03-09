<?php
include '../back/conection.php';
if(isset($_POST['search'])){
    $direccion = $_POST['direccion'];
    $query = "INSERT INTO technorw_KornyDonuts.`direccion` (`id`, `direccion` ) VALUES (NULL, '$direccion');";
    $resultado = mysqli_query($conn,$query);
    if($resultado){
        header('location: pago.php');
    }
};

?>