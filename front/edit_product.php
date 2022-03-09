<?php

include '../car/global/config.php';
include '../car/global/conect.php';
include '../car/carrito.php';
include '../back/seguridad.php';
?>
<?php 
if($_SESSION['rol'] != 1){
header('location: ../front/index-user.php');
}?>
<?php
include '../car/templates/cabeceradmin.php';
?>
<?php
$id = $_GET['id'];
$sentencia=$pdo->prepare("SELECT * FROM technorw_KornyDonuts.`products` WHERE id = '$id'");
$sentencia->execute();
$listProducts=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="row">
               <div class="col-4 text-center" >
                  </div>
                        <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                        <h2>
                           Edit Products
                        </h2>
                        </div>
                  <div class="col-4 text-center" >
                  </div>
               </div>
               <br>
<form action="../back/edit_products_back.php" method="POST" enctype="multipart/form-data">
<table class="table">
    <thead class="thead-light">
        <tr>
            <th width="5%">#</th>
            <th width="20%">Nombre</th>
            <th width="40%">Descripcion</th>
            <th width="10%">Precio</th>
            <th width="10%" class="text-center">--</th>
            
        </tr>
        </thead>
        <tbody>
        <tr> 
        <?php
            foreach ($listProducts as $products){ ?>
            <td width="5%"><input type="hidden" value="<?php echo $products['id']?>" name="idp"></td>
            <td width="20%"><input type="text" value="<?php echo $products['name']?>" name="namep"></td>
            <td width="40%"><input type="text" style="width: 300px;" value="<?php echo $products['description']?>" name="descriptionp"></td>
            <td width="10%"><input type="text" value="<?php echo $products['price']?>" name="pricep"></td>
            <td width="10%" class="text-center"><input type="submit" class="btn btn-primary" value="editar" name="submit"></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</form>
<?php include "../car/templates/pieadmin.php"?>