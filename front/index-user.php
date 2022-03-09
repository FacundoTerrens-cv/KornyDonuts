

<?php
   include '../car/global/config.php';
   include '../car/carrito.php';
   include '../back/conection.php';
   $numero = $_SESSION['rol'];
   if($numero != 2){
         header('Location: ../front/index.php');
   }
   include 'cabecera_user_log.php';
   //echo var_dump($_SESSION['carrito']);
      ?>
<div id="customCarousel1" class="carousel slide" data-ride="carousel">
   <div class="carousel-inner">
      <div class="carousel-item active">
         <div class="container ">
            <div class="row">
               <div id="imagen_donas" class="col-md-12 col-lg-12 col-sm-6" style="padding: 0">
                  <div class="img-box">
                     <img src="../images/donut.png" alt="" style="position:relative;min-height: 420px;float: inline-end; margin-top:10%;">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<br><br>
<section class="blog_section layout_padding" id="productos">
   <div class="container" >
      <div class="row">
         <div class="col-4 text-center" >
         </div>
         <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
            <h2>
               Produkter
            </h2>
         </div>
         <div class="col-4 text-center" >
         </div>
      </div>
      <br><br>
      <div class="row">
         <div class="col-lg-12 col-sm-12 col-xs-12 text-center" style="border-radius: 0px;">
            <!-- <button class="button" type="submit" id="donuts" value="Donuts"><img src="../images/donut-icon.png" style="width: 240px;"> <h1 style="font-size:25px">DONUTS</h1></button> -->
         </div>
      </div>
      <div class="row" style="width: 100%; max-width: 1400px; margin: 0 auto;" id="result">
         <?php 
            $consulta="SELECT * FROM technorw_KornyDonuts.`products` WHERE tipo_producto LIKE 'Donuts' ORDER BY id ";
            $resultado=mysqli_query($conn,$consulta);
            $filas=mysqli_fetch_array($resultado);
              foreach ($resultado as $row){
              ?>
         <div class="col-md-3 col-sm-6" style="padding: 20px;" >
            <div class="box" style="background: #17bcc0;max-width:250px;border-radius: 20px;margin: 0 auto;border: 3px solid #17bcc0;">
               <div class="img-box" style="text-align: center;background: #17bcc0;padding-top: 20px;border-radius:20px">
                  <img src='../images/<?php echo$row["image"]?>' alt='...' height='300px' width='300px' style='width: 200px;height: auto;background: white;margin: 0 auto;border-radius: 10px;'>
                  <h4 class='blog_date'><?php echo $row["price"]?>,-<br></h4>
               </div>
               <div class="detail-box">
                  <h5 style='text-align:center;'><?php echo $row['name']?></h5>
                  <form action='' method='POST'>
                     <input type='hidden' name='id' id='id' value='<?php echo $row['id']?>'>
                     <input type='hidden' name='nombre' id='nombre' value='<?php echo $row['name']?>'>
                     <input type='hidden' name='precio' id='precio' value='<?php echo $row['price']?>'>
                     <div style='display: flex; align-items: center; justify-content: space-between; flex-direction: column; gap: 10px;'>
                        <div class='valChanger' style='display: inline-flex;'>
                           <div class='input-number-d'style='border-radius: 10px 0px 0px 10px;'>-</div>
                           <input name='cantidad' class='inputNumber' value='1' max='10' min='0' style='width:65px;text-align:center'>
                           <div class='input-number-i' style='border-radius: 0px 10px 10px 0px;'>+</div>
                        </div>
                        <button class='button2' type='submit' name='btnAccion' value='agregar' style="border-radius: 5px;">Add Cart</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
            <?php
            }
            ?>
      </div>
   </div>
</section>
<br><br><br>
<style>
   #map {
   height: 100%;
   width: 100%;
   }
</style>
<!--
   <section class="contact_section layout_padding2-top layout_padding-bottom">
      <div class="container">
      <div class="row">
      <div class="col-4 text-center" >
            </div>
                  <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                  <h2>
                  Sted
                  </h2>
                  </div>
            <div class="col-4 text-center" >
            </div>
         </div>
         <br><br>
         <div class="row">
            <div class="col-md-12 px-0">
               <div class="map_container">
                  <div class="map">
                     <div id="map"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   -->
<br><br><br>
<section class="blog_section layout_padding" style="height: auto;">
   <div class="container">
      <div class="row">
         <div class="col-4 text-center">
         </div>
         <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
            <h2>
               Om oss
            </h2>
         </div>
         <div class="col-4 text-center">
            <br><br>
         </div>
      </div>
      <div id="imagen_donas" class="col-md-12 col-lg-12 col-sm-6" style="padding: 0">
         <div class="img-box" style="display: flex;justify-content: center;">
            <img src="../images/korny-donut-colored.svg" alt="" style="width: 500px;padding-top: 40px;">
         </div>
      </div>
      <br>
      <div>
         <p style="font-size: 25px; font-weight: 100; text-align: center">
            We are a group of people who are in charge of making the richest Donuts in all of Norway, so that you can enjoy, we have a wide variety of flavors, 
            so that you have a choice, always prioritizing the quality of our products, as well as the comfort and happiness of our customers, we have several points 
            of sale around the country, so that wherever you are, you can enjoy a delicacy, always with the best attention, so that everything at Korny Donuts is a pleasant
            experience! Thanks for trusting us
         </p>
      </div>
   </div>
</section>
<br>
<!--
   <br><br><br>
   <section class="client_section ">
      <div class="container">
      <div class="row">
            <div class="col-4 text-center" >
            </div>
                  <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                  <h2>
                  Kunder
                  </h2>
                  </div>
            <div class="col-4 text-center" >
            </div>
         </div>
         <br><br>
      </div>
      <div class="container px-0">
         <div id="customCarousel2" class="carousel  slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="row">
                        <div class="col-lg-10 mx-auto">
                           <div class="box">
                              <div class="img-box">
                                 <img src="../images/client.jpg" alt="">
                              </div>
                              <div class="detail-box">
                                 <div class="client_info">
                                    <div class="client_name">
                                       <h5>
                                          Clary Kenton
                                       </h5>
                                       <h6>
                                          Customer
                                       </h6>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                 </div>
                                 <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore
                                    et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum
                                    dolore eu fugia
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel_btn-box">
               <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
               <i class="fa fa-angle-left" aria-hidden="true"></i>
               <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
               <i class="fa fa-angle-right" aria-hidden="true"></i>
               <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
      </div>
   </section>
   <br><br><br>
   -->
<!-- jQery -->
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/number.js"></script>
<!-- bootstrap js -->
<script src="../js/bootstrap.js"></script>
<!-- custom js -->
<script src="../js/custom.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
<script type="text/javascript" src="../js/index-user.js"></script>
<script>
   var customLabel = {
     restaurant: {
       label: 'R'
     },
     bar: {
       label: 'B'
     }
   };
     function initMap() {
     var map = new google.maps.Map(document.getElementById('map'), {
       center: new google.maps.LatLng(64.01665398373224, 11.495185348660218),
       zoom: 12
     });
     var infoWindow = new google.maps.InfoWindow;
   
       // Change this depending on the name of your PHP or XML file
       downloadUrl('http://localhost/maps/xml.php', function(data) {
         drawMarkers(data);
     });
   function drawMarkers(data){
     var xml = data.responseXML;
       var markers = xml.documentElement.getElementsByTagName('marker');
       Array.prototype.forEach.call(markers, function(markerElem) {
         var id = markerElem.getAttribute('id');
         var name = markerElem.getAttribute('name');
         var address = markerElem.getAttribute('address');
         var type = markerElem.getAttribute('type');
         var point = new google.maps.LatLng(
             parseFloat(markerElem.getAttribute('lat')),
             parseFloat(markerElem.getAttribute('lng')));
   
         var infowincontent = document.createElement('div');
         var strong = document.createElement('strong');
         strong.textContent = name
         infowincontent.appendChild(strong);
         infowincontent.appendChild(document.createElement('br'));
   
         var text = document.createElement('text');
         text.textContent = address
         infowincontent.appendChild(text);
         var icon = customLabel[type] || {};
         var marker = new google.maps.Marker({
           map: map,
           position: point,
           label: icon.label
         });
         marker.addListener('click', function() {
           infoWindow.setContent(infowincontent);
           infoWindow.open(map, marker);
         });
       });
     };
   }
   function downloadUrl(url, callback) {
     var request = window.ActiveXObject ?
         new ActiveXObject('Microsoft.XMLHTTP') :
         new XMLHttpRequest;
   
     request.onreadystatechange = function() {
       if (request.readyState == 4) {
         request.onreadystatechange = doNothing;
         callback(request, request.status);
       }
     };
   
     request.open('GET', url, true);
     request.send(null);
   }
   
   function doNothing() {}
</script>
<script
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7h5ODHCzQORxo8jz8zONtVLH1puGIVSI&callback=initMap"></script>
<script>
   window.onload = function(){
      var contenedor = document.getElementById('contenedor_carga');
      contenedor.style.visibility='hidden';
      contenedor.style.opacity= '0';
   }
</script>
<?php include 'footer_user_log.php';?>

