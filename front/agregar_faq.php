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
                           Add FAQ
                        </h2>
                        </div>
                  <div class="col-4 text-center" >
                  </div>
               </div>
               <br>
<form action="../back/agregar_faq_back.php" method="POST" id="agregar_p">
<table class="table">
    <thead class="thead-light">
        <tr>
            <th width="33%" class="text-center">Title</th>
            <th width="33%" class="text-center">Text</th>   
        </tr>
        </thead>
        <tbody>
        <tr> 
            <td width="33%" class="text-center"><input type="text" id="title" name="title"></td>
            <td width="33%" class="text-center"><input type="text" id="text" name="text"></td>
        </tr>
        <tr>
        <td width="33%" class="text-center"><input type="submit" class="btn btn-primary" value="Add" name="submit"></td>
        </tr>
    </tbody>
</table>
</form>
<a class="btn btn-success" href="admin.php">Back</a></td>
<?php include "../car/templates/pieadmin.php"?>