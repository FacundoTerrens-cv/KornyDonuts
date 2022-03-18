<?php
include 'conection.php';
error_reporting(0);
session_start();
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $time = $_POST['time'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
         $query = "INSERT INTO `markers` (`id`, `name`, `address`, `city`, `time`, `lat`, `lng`) VALUES (NULL, '$name', '$address', '$city', '$time', '$lat', '$lng');";
         $resultado = mysqli_query($conn,$query);
         if($resultado){   
             header('location: ../front/agregar_shops.php');
         }else{

         }
       }
