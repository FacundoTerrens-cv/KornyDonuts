<?php
include 'conection.php';
error_reporting(0);
session_start();
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $text = $_POST['text'];
         $query = "INSERT INTO `faq_section` (`id`, `titulo`, `texto`) VALUES (NULL, '$title', '$text');";
         $resultado = mysqli_query($conn,$query);
         if($resultado){ 
             header('location: ../front/agregar_faq.php');
         }else{

         }
       }
?>


