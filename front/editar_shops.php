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
$sentencia=$pdo->prepare("SELECT * FROM technorw_KornyDonuts.`markers` WHERE id = '$id'");
$sentencia->execute();
$listProducts=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="row">
               <div class="col-4 text-center" >
                  </div>
                        <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                        <h2>
                           Edit Shops
                        </h2>
                        </div>
                  <div class="col-4 text-center" >
                  </div>
               </div>
               <br>
<form action="../back/editar_shops_back.php" method="POST" enctype="multipart/form-data">
<table class="table">
    <thead class="thead-light" style="border: hidden;">
        <tr>
            <th width="20%" class="text-center">#</th>
            <th width="40%">Name</th>
            <th width="10%">Address</th>
            <th width="10%">City</th>           
        </tr>
        </thead>
        <tbody>
        <tr> 
        <?php
            foreach ($listProducts as $shops){ ?>
            <td width="5%"><input type="hidden" value="<?php echo $shops['id']?>" name="idp"></td>
            <td width="20%"><input type="text" value="<?php echo $shops['name']?>" name="namep"></td>
            <td width="40%"><input type="text" style="width: 300px;" value="<?php echo $shops['address']?>" name="addressp"></td>
            <td width="10%"><input type="text" value="<?php echo $shops['city']?>" name="cityp"></td>
        </tr>
    </tbody>
    <thead class="thead-light" style="border: hidden;">
        <tr>
        <th width="10%" class="text-center">Time</th>
        <th width="10%" class="text-center">Lat</th>
        <th width="10%" class="text-center">Lng</th>
        <th width="10%" class="text-center">--</th>
        <th width="10%" class="text-center"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td width="10%"><input type="text" value="<?php echo $shops['time']?>" name="timep"></td>
            <td width="10%" class="text-center"><input step="any" type="number"  name="latp" value="<?php echo $shops['lat']?>"></td>
            <td width="10%" class="text-center"><input step="any" type="number"  name="lngp" value="<?php echo $shops['lng']?>"></td>
            <td width="10%" class="text-center"><input type="submit" class="btn btn-primary" value="Edit" name="submit"></td>    
            <td width="10%" class="text-center"></td>
        </tr>
    </tbody>
    <?php } ?>
</table>
</form>
<?php include "../car/templates/pieadmin.php"?>