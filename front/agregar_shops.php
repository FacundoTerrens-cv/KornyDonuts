<?php
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
<div class="row">
               <div class="col-4 text-center" >
                  </div>
                        <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                        <h2>
                           Add Shops
                        </h2>
                        </div>
                  <div class="col-4 text-center" >
                  </div>
               </div>
               <br>
<form action="../back/agregar_shops_back.php" method="POST" id="agregar_p">
<table class="table">
    <thead class="thead-light">
        <tr>
            <th width="20%" class="text-center">Name</th>
            <th width="40%" class="text-center">Address</th>
            <th width="10%" class="text-center">City</th>
            <th width="10%" class="text-center">Time</th>           
        </tr>
        </thead>
        <tbody>
        <tr> 
            <td width="20%"><input type="text"  name="name"></td>
            <td width="40%" class="text-center"><input type="text"  name="address"></td>
            <td width="10%" class="text-center"><input type="text"  name="city"></td>
            <td width="10%" class="text-center"><input type="text"  name="time"></td>
        </tr>
        </tbody>
        <thead class="thead-light" style="border: hidden;">
        <tr>
        <th width="10%" class="text-center">Lat</th>
        <th width="10%" class="text-center">Lng</th>
        <th width="10%" class="text-center">--</th>
        <th width="10%" class="text-center"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td width="10%" class="text-center"><input step="any" type="number"  name="lat"></td>
            <td width="10%" class="text-center"><input step="any" type="number"  name="lng"></td>
            <td width="10%" class="text-center"><input type="submit" class="btn btn-primary" value="Add" name="submit"></td>    
            <td width="10%" class="text-center"></td>
        </tr>
    </tbody>
</table>
</form>
<a class="btn btn-success" href="admin.php">Back</a></td>
<?php include "../car/templates/pieadmin.php"?>