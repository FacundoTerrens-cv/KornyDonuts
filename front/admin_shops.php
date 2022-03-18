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
<br>
<div class="row">
               <div class="col-4 text-center" >
                  </div>
                        <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                        <h2>
                           Admin Shops
                        </h2>
                        </div>
                  <div class="col-4 text-center" >
                  </div>
               </div>
               <br>
<a href="agregar_shops.php" class="btn btn-info">legg til shops</a>
<table class="table">
   <thead class="thead-light">
      <?php
      include '../back/conection.php';
         $consulta="SELECT * FROM technorw_KornyDonuts.`markers`";
         $resultado=mysqli_query($conn,$consulta);
         //print_r($listProducts);
         ?>
      <tr>
         <th scope="col">#</th>
         <th scope="col">Nummer</th>
         <th scope="col">Adresse</th>
         <th scope="col">By</th>
         <th scope="col">Tid</th>
         <th scope="col">Lat</th>
         <th scope="col">Lng</th>
         <th scope="col">--</th>
         <th scope="col">--</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <?php
            while ($shops = mysqli_fetch_array($resultado)){ ?>
      <tr>
         <th scope="row"><?php echo $shops['id']?></th>
         <td><?php echo $shops['name']?></td>
         <td><?php echo $shops['address']?></td>
         <td><?php echo $shops['city']?></td>
         <td><?php echo $shops['time']?></td>
         <td><?php echo $shops['lat']?></td>
         <td><?php echo $shops['lng']?></td>
         <td>
            <form action="" method="post">
               <a class="btn btn-danger" type="submit" name="btn" value="eliminar" href="../back/delete_shops.php?id=<?php echo $shops['id']?>">Fjerne</a>
         </td>
         </form>
         </td>
         <td>
            <form action="" method="post">
               <a class="btn btn-success" type="submit" name="btn" value="eliminar" href="editar_shops.php?id=<?php echo $shops['id']?>">Redigere</a>
         </td>
         </form>
         </td>
      </tr>
      <?php } ?>
   </tbody>
</table>

<br><br>
<?php include "../car/templates/pieadmin.php"?>

