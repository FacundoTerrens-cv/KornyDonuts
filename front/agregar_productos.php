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
                           Add Products
                        </h2>
                        </div>
                  <div class="col-4 text-center" >
                  </div>
               </div>
               <br>
<form action="agregar_productos_back.php" method="POST" enctype="multipart/form-data" id="agregar_p">
<table class="table">
    <thead class="thead-light">
        <tr>
            <th width="20%">Nombre</th>
            <th width="40%" class="text-center">Descripcion</th>
            <th width="10%" class="text-center">Precio</th>
            <th width="10%" class="text-center">imagen</th>
            <th width="10%" class="text-center">Tipo</th>
            
        </tr>
        </thead>
        <tbody>
        <tr> 
            <td width="20%"><input type="text"  name="nombre"></td>
            <td width="40%" class="text-right"><input type="text"  name="description"></td>
            <td width="10%" class="text-center"><input type="text"  name="price"></td>
            <td width="10%" class="text-center"><input type="file"  name="imagen"></td>
            <td width="20%">
            <select name="tipo_producto" id="tipo_producto" form="agregar_p">
                <option value="Donuts">Donuts</option>
                <option value="Varmmat">Varmmat</option>
                <option value="Drikke">Drikke</option>
            </select>
            </td>

        </tr>
        <tr>
        <td width="10%" class="text-center"><input type="submit" class="btn btn-primary" value="Add" name="submit"></td>
        </tr>
    </tbody>
</table>
</form>
<a class="btn btn-success" href="admin.php">Back</a></td>
<?php include "../car/templates/pieadmin.php"?>