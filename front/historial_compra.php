<?php
session_start();
include '../car/global/config.php';
include '../car/carrito.php';
$iduser = $_SESSION['id_user'];
$emailuser = $_SESSION['usuario'];
$numero = $_SESSION['rol'];
if($numero != 2){
      header('Location: ../front/index.php');
}
include 'cabecera_user_log.php';
?>
<script src="../node_modules/push.js/bin/push.min.js">
   Push.create("Hello world!");
</script>
<br><br>
<div class="row">
   <div class="col-4 text-center">
   </div>
   <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
      <h2>
         kjøpshistorikk
      </h2>
   </div>
   <div class="col-4 text-center">
   </div>
</div>
<br>
<?php
    include '../car/carrito.php';
    include '../back/conection.php';
  $consulta="SELECT * FROM technorw_KornyDonuts.`compra` WHERE `id_user` = '$iduser'";
  $resultado=mysqli_query($conn,$consulta);
  $num_compras = mysqli_num_rows($resultado);
?>
<div>
   <table class="table">

      <?php 
      if($num_compras>0){
      while ($pedido = mysqli_fetch_array($resultado)){ 
         $arraycantidad = $pedido['cantidad_productos'];
         $cantidadex = explode(" - ", $arraycantidad);
         $arraynombre = $pedido['nombre_producto'];
         $nombreex = explode(" - ", $arraynombre);
      ?>
         <thead style="background: #adeaeb">
            <tr>
               <th width="25%" class="col-xs-2 col-lg-2 col-md-2">Kjøpsdato</th>
               <th width="25%" class="col-xs-2 col-lg-2 col-md-2">Selger</th>
               <th width="25%" class="col-xs-2 col-lg-2 col-md-2">Totalt</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td width="25%" class="col-xs-2 col-lg-2 col-md-2"><?php echo $pedido['fecha'] ?></td>
               <td width="25%" class="col-xs-2 col-lg-2 col-md-2"><?php echo $pedido['sucursal'] ?></td>
               <td width="25%" class="col-xs-2 col-lg-2 col-md-2">NOK <?php echo $pedido['total_compra'] ?></td>
            </tr>
            <thead style="border: hidden">
               <tr>
                  <th width="25%" class="col-xs-2 col-lg-2 col-md-2">Varer</th>
                  <th width="25%" class="col-xs-2 col-lg-2 col-md-2"></th>
                  <th width="25%" class="col-xs-2 col-lg-2 col-md-2"></th>
               </tr>
            </thead>
         <tbody>
            <?php for ($i = 0; $i < count($nombreex); $i++) { ?>
               <tr width="5%">
                  <td><?php echo $nombreex[$i] . " - " . $cantidadex[$i] . "" ?></td>
               </tr>
            <?php } ?>
         </tbody>
      <?php }
      }else{ ?>
                  <div class="alert alert-success">
                     Usted no realizo Ninguna Compra...
                  </div>
     <?php } ?>
      </tbody>
   </table>
</div>
<br>
<!-- jQery -->
<script src="../js/jquery-3.4.1.min.js"></script>
<!-- bootstrap js -->
<script src="../js/bootstrap.js"></script>
<!-- custom js -->
<script src="../js/custom.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
<script type="text/javascript" src="../js/index-user.js"></script>
<script>
   window.onload = function() {
      var contenedor = document.getElementById('contenedor_carga');
      contenedor.style.visibility = 'hidden';
      contenedor.style.opacity = '0';
   }
</script>
<?php include 'footer_user_log.php'; ?>