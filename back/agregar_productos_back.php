<?php
session_start();
include 'conection.php';
if(isset($_POST['submit'])){
    $imagen = $_FILES['imagen']['name'];
    $name = $_POST['nombre'];
    $description = $_POST['description'];
    $tipo_producto = $_POST['tipo_producto'];
    $price = $_POST['price'];
    if(isset($imagen) && $imagen != ""){
        $tipo = $_FILES['imagen']['type'];
        $temp  = $_FILES['imagen']['tmp_name'];
       if( !((strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp') || strpos($tipo,'jpg')|| strpos($tipo,'png')))){
          header('location: agregar_productos.php');
       }else{
         $query = "INSERT INTO `products` (`id`, `name`, `tipo_producto`, `price`, `description`, `image`) VALUES (NULL, '$name', '$tipo_producto', '$price', '$description', '$imagen');";
         $resultado = mysqli_query($conn,$query);
         if($resultado){
              move_uploaded_file($temp,'../images/'.$imagen);   
             header('location: ../front/agregar_productos.php');
         }
       }
    }
}
?>


