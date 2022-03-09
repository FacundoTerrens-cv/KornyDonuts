<?php
include '../car/global/config.php';
include '../car/global/conect.php';
include '../car/carrito.php';
include '../back/seguridad.php';
?>
   <?php 
   if($_SESSION['rol'] != 2){
      header('location: ../front/index.php');
   }
   include 'cabecera_user_log.php';?>
         <br><br>
         <div class="row">
               <div class="col-4 text-center" >
                  </div>
                        <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                        <h2>
                           FAQ
                        </h2>
                        </div>
                  <div class="col-4 text-center" >
                  </div>
               </div>
               <br>
<div class='faq'>
<?php
         $sentencia=$pdo->prepare("SELECT * FROM technorw_KornyDonuts.`faq_section`");
         $sentencia->execute();
         $listProducts=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         //print_r($listProducts);
         foreach ($listProducts as $faq){ 
              echo '<input id='.$faq['id'].' type="checkbox">';
              echo '<label for='.$faq['id'].'>';
              echo "<p class='faq-heading' style='padding-top:10px'>".$faq["titulo"]."</p>";
              echo "<div class='faq-arrow'></div>";
              echo '<p class="faq-text">'.$faq['texto'].'</p>';
              echo "</label>";
              echo "<input id='faq-b' type='checkbox'>";
        } ?>
  </div>
  <br><br>
         <!-- footer section -->
         <!-- jQery -->
         <script src="../js/jquery-3.4.1.min.js"></script>
         <!-- bootstrap js -->
         <script src="../js/bootstrap.js"></script>
         <!-- custom js -->
         <script src="../js/custom.js"></script>
         <!-- Google Map -->
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
         <script type="text/javascript" src="../js/index-user.js"></script>
<style>
@import url(https://fonts.googleapis.com/css?family=Lato);
.faq-heading {
  font-family: Lato;   
  font-weight: 400;
  font-size: 19px;
  text-indent: 20px;
  color: #333;
}
.faq-text {
  font-family: Open Sans;   
  font-weight: 400;
  color: #919191;
  width:95%;
  padding-left:20px;
  margin-bottom:30px;
}
.faq {
  width: 1000px;
  margin: 0 auto;
  background: white;
  border-radius: 4px;
  position: relative;
}
.faq label {
  display: block;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  height: 62px;
  padding-top:1px;
  border-bottom: 1px solid #17bcc0;
}
.faq input[type="checkbox"] {
  display: none;
}
.faq .faq-arrow {
  width: 5px;
  height: 5px;
  transition: -webkit-transform 0.8s;
  transition: transform 0.8s;
  transition: transform 0.8s, -webkit-transform 0.8s;
  transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
  border-top: 2px solid rgba(0, 0, 0, 0.33);
  border-right: 2px solid rgba(0, 0, 0, 0.33);
  float: right;
  position: relative;
  top: -30px;
  right: 27px;
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
}
 .faq input[type="checkbox"]:checked + label > .faq-arrow {
  transition: -webkit-transform 0.8s;
  transition: transform 0.8s;
  transition: transform 0.8s, -webkit-transform 0.8s;
  transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
  -webkit-transform: rotate(135deg);
          transform: rotate(135deg);
}
 .faq input[type="checkbox"]:checked + label {
  display: block;
  background: rgba(255,255,255,255) !important;
  color: #4f7351;
  height: 225px;
  transition: height 0.8s;
}
 .faq input[type='checkbox']:not(:checked) + label {
  display: block;
  transition: height 0.8s;
  height: 50px;
}
::-webkit-scrollbar {
  display: none;
}
</style>  
<?php include 'footer_user_log.php';?>