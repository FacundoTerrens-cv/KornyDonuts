<?php
   include '../car/global/config.php';
   include '../car/global/conect.php';
   include '../car/carrito.php';
   include '../back/seguridad.php';
   $local = $_SESSION['local'];
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
                        Produktsjef
                        </h2>
                        </div>
                  <div class="col-4 text-center" >
                  </div>
               </div>
               <br>
<a href="agregar_productos.php" class="btn btn-info">Legg til produkt</a>
<table class="table">
   <thead class="thead-light">
      <?php
         include '../back/conection.php';
         $consulta="SELECT * FROM technorw_KornyDonuts.`products` WHERE local = '$local'";
         $resultado=mysqli_query($conn,$consulta);
         //print_r($listProducts);
         ?>
      <tr>
         <th scope="col">#</th>
         <th scope="col">Navn</th>
         <th scope="col">Beskrivelse</th>
         <th scope="col">Bilde</th>
         <th scope="col">Pris</th>
         <th scope="col">--</th>
         <th scope="col">--</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <?php
            while ($products = mysqli_fetch_array($resultado)){ ?>
      <tr>
         <th scope="row"><?php echo $products['id']?></th>
         <td><?php echo $products['name']?></td>
         <td><?php echo $products['description']?></td>
         <td><?php echo $products['image']?></td>
         <td><?php echo $products['price']?></td>
         <td>
            <form action="" method="post">
               <a class="btn btn-danger" type="submit" name="btn" value="eliminar" href="../back/delete_products.php?id=<?php echo $products['id']?>">Fjerne</a>
         </td>
         </form>
         </td>
         <td>
            <form action="" method="post">
               <a class="btn btn-success" type="submit" name="btn" value="eliminar" href="edit_product.php?id=<?php echo $products['id']?>">Redigere</a>
         </td>
         </form>
         </td>
      </tr>
      <?php } ?>
   </tbody>
</table>

<br><br>
<?php include "../car/templates/pieadmin.php"?>

