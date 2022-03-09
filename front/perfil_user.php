<?php
include '../car/global/config.php';
include '../car/carrito.php';
include '../back/seguridad.php';
$iduser = $_SESSION['id_user'];
$emailuser = $_SESSION['usuario'];
$username = $_SESSION['username'];
?>
<?php
if ($_SESSION['rol'] != 2) {
   header('location: ../front/index.php');
}
include 'cabecera_user_log.php'; ?>

<br><br>
<div style="height: 55vh;">
   <div class="row ">
      <div class="col-4 text-center">
      </div>
      <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
         <h2>
            <?php echo $username; ?> Profile
         </h2>
      </div>
      <div class="col-4 text-center">
      </div>
   </div>
   <br>
   <div class="row">
      <div class="col-lg-4 col-xs-0 text-center">
      </div>
      <div class="col-lg-4 col-xs-12 text-center">
         <a href="historial_compra.php" class="button3" style="width:100%;max-width: 100%;margin: 0 auto;display:inline-block;"><h5 style="padding-top: 9px;">kjøpshistorikk</h5></a>
      </div>
      <div class="col-lg-4 col-xs-0 text-center">
      </div>
   </div>
   <br>
   <div class="row">
      <div class="col-lg-4 col-xs-0 text-center">
      </div>
      <div class="col-lg-4 col-xs-12 text-center">
         <a href="editar_perfil.php" class="button3" style="width:100%;max-width: 100%;margin: 0 auto;display:inline-block;"><h5 style="padding-top: 9px;">redigere profildata</h5></a>
      </div>
      <div class="col-lg-4 col-xs-0 text-center">
      </div>
   </div><br>
   <div class="row">
      <div class="col-lg-4 col-xs-0 text-center">
      </div>
      <div class="col-lg-4 col-xs-12 text-center">
         <button style="width:100%;max-width: 100%;margin: 0 auto;display:inline-block;" class="button3" id="btn-abrir-popup"><h5 style="padding-top: 9px;">Slett konto</h5></button>
      </div>
      <div class="col-lg-4 col-xs-0 text-center">
      </div>
   </div>

   <br>
</div>
<div class="overlay" id="overlay">
   <div class="popup" id="popup" style="border-radius: 10px;">

      <div style="height: auto; border: 3px solid #32b8c6; border-radius:10px;padding:20px;">
      <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><img src="../images/cruz.svg" style="width: 20px;"></i></a>
         <h3 style="color: #32b8c6">You are about to delete your account</h3>
         <h5>Do you want to do it?</h5>
         <p>remember that at any time you can re-register on the site</p>
         <a href="../back/delete_cuenta.php?id=<?php echo $iduser ?>" class="button3" style="width: 30%;
max-width: 100%;
margin: 0 auto;
  margin-bottom: 0px;
display: inline-block;
height: auto;
margin-bottom: 20px;">YES</a>
         <a href="perfil_user.php" class="button3" style="width: 30%;
max-width: 100%;
margin: 0 auto;
  margin-bottom: 0px;
display: inline-block;
height: auto;
margin-bottom: 20px;">NO</a>
      </div>
   </div>
</div>
<!-- jQery -->
<script src="../js/jquery-3.4.1.min.js"></script>
<!-- bootstrap js -->
<script src="../js/bootstrap.js"></script>
<!-- custom js -->
<script src="../js/custom.js"></script>
<script src="../js/popup.js"></script>
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