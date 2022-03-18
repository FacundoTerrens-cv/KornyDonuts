<?php
   include '../car/global/config.php';
   include '../car/global/conect.php';
   include '../car/carrito.php';
   include '../back/seguridad.php';
   include '../back/conection.php';
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
                           Admin Pedidos
                        </h2>
                        </div>
                  <div class="col-4 text-center" >
                  </div>
               </div>
               <br>
               <?php
                  $sentencia="SELECT * FROM technorw_KornyDonuts.`compra` WHERE `estado_entrega` = 'PENDIENTE' AND fecha >= now() - INTERVAL 1 DAY";
                  $consulta = mysqli_query($conn, $sentencia)
                  
               ?>
<table class="table">
<?php while ($pedido = mysqli_fetch_array($consulta)){    
            $arraycantidad = $pedido['cantidad_productos'];
            $cantidadex = explode(" - ", $arraycantidad);
            $arraynombre = $pedido['nombre_producto'];
            $nombreex = explode(" - ", $arraynombre);
         ?>
   <thead class="thead-dark" style="border: hidden;">
      <tr>
         <th class="col-sm-2 col-lg-2 col-md-2">Betalingsstatus</th>
         <th class="col-sm-2 col-lg-2 col-md-2">Klient</th>
         <th class="col-sm-2 col-lg-2 col-md-2">Totalt</th>
         <th class="col-sm-2 col-lg-2 col-md-2">Ordre status</th>
         <th class="col-sm-2 col-lg-2 col-md-2">Bestillingsseddel</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td class="col-sm-2 col-lg-2 col-md-2"><?php echo $pedido['status']?></td>
         <td class="col-sm-2 col-lg-2 col-md-2"><?php echo $pedido['id_ciente']?></td>
         <td class="col-sm-2 col-lg-2 col-md-2">NOK <?php echo $pedido['total_compra']?></td>
         <td class="col-sm-2 col-lg-2 col-md-2"><?php echo $pedido['estado_entrega']?></td>
         <td class="col-sm-2 col-lg-2 col-md-2"><?php echo $pedido['nota_pedido']?></td>
      </tr>
      <thead class="thead-light" style="border: hidden;">
         <tr>
         <th width="5%" scope="col-sm-2 col-lg-2 col-md-2">Produkter</th>
         </tr>
      </thead>
      <tbody> 
      <?php for ($i=0; $i < count($nombreex); $i++) { ?>
      <tr width="5%">
         <td><?php echo $nombreex[$i]." - ".$cantidadex[$i].""?></td>
      </tr>
      <?php }?>
      </tbody>
      <?php } ?>
   </tbody>
</table>
<?php include "../car/templates/pieadmin.php"?>

