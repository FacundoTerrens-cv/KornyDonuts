<?php
include '../car/global/config.php';
include '../car/carrito.php';
?>
<?php include 'cabecera_user.php'; ?>
<div id="customCarousel1" class="carousel slide" data-ride="carousel">
   <div class="carousel-inner">
      <div class="carousel-item active">
         <div class="container ">
            <div class="row">
               <div id="imagen_donas" class="col-md-12 col-lg-12 col-sm-6" style="padding: 0">
                  <div class="img-box">
                     <img src="../images/donut.png" alt="" style="position:relative;min-height: 420px;float: inline-end;">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<br><br>
<section class="blog_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-4 text-center">
         </div>
         <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
            <h2>
               Produkter
            </h2>
         </div>
         <div class="col-4 text-center">
         </div>
      </div>
      <br><br>
      <div class="row">
         <div class="col-lg-4 col-sm-6 col-xs-12 text-center">
            <button class="button" type="submit" id="donuts" value="Donuts"><img src="../images/donut-icon.png" style="width: 240px;"></button>
         </div>
         <div class="col-lg-4 col-sm-6 col-xs-12 text-center">
            <button class="button" type="submit" id="empanadas" value="volvo"><img src="../images/empanadas-icon.png" style="width: 240px;"></button>
         </div>
         <div class="col-lg-4 col-sm-12 col-xs-12 text-center">
            <button class="button" type="submit" id="all" value=""><img src="../images/donurmasempanada.png" style="width: 240px;"></button>
         </div>
      </div>
      <br>
      <div class="alert alert-success" style="text-align: center;">
         Du må logge inn for å kjøpe
      </div>
      <div class="row" style="width: 100%; max-width: 1400px; margin: 0 auto;" id="result">
      </div>

   </div>
</section>

<br><br>
<div class="row">
   <div class="col-4 text-center">
   </div>
   <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
      <h2>
         Butikk
      </h2>
   </div>
   <div class="col-4 text-center">
   </div>
</div>
<br>
<style>
   #map {
      height: 100%;
      width: 100%;
   }
</style>
<section class="contact_section layout_padding2-top layout_padding-bottom">
   <div class="container">
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
<div style="max-width:1170px; margin: 0 auto">
<table class="table">
   <thead class="thead-light">
      <?php
      include '../back/conection.php';
      $consulta = "SELECT * FROM technorw_KornyDonuts.`markers`";
      $resultado = mysqli_query($conn, $consulta);
      ?>
      <tr>
         <th scope="col">Nummer</th>
         <th scope="col">Adresse</th>
         <th scope="col">By</th>
         <th scope="col">Tid</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <?php
         while ($products = mysqli_fetch_array($resultado)) { ?>
      <tr class="markers" data-lat="<?php echo $products['lat'] ?>" data-lng="<?php echo $products['lng'] ?>" style="cursor: pointer;">
  
         <td><?php echo $products['name'] ?></td>
         <td><?php echo $products['address'] ?></td>
         <td><?php echo $products['city'] ?></td>
         <td><?php echo $products['time'] ?></td>
      </tr>
   <?php } ?>
   </tbody>
</table>
</div>
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
      <div class="col-md-12 col-lg-12 col-sm-6" style="padding: 0">
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
      experience! Thanks for trusting us</p>
      </div>
   </div>
</section>
<br>

<!-- footer section -->
<!-- jQery -->
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/number.js"></script>
<!-- bootstrap js -->
<script src="../js/bootstrap.js"></script>
<!-- custom js -->
<script src="../js/custom.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
<script type="text/javascript" src="../js/index.js"></script>
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
      let map = new google.maps.Map(document.getElementById('map'), {
         center: new google.maps.LatLng(64.01665398373224, 11.495185348660218),
         zoom: 12
      });

      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP or XML file
      downloadUrl('http://localhost/maps/xml.php', function(data) {
         drawMarkers(data);
      });

      function drawMarkers(data) {
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
            infowincontent.setAttribute('id', parseFloat(markerElem.getAttribute('lat')));
            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
               map: map,
               position: point,
               label: icon.label,
               lat: parseFloat(markerElem.getAttribute('lat')),
               lng: parseFloat(markerElem.getAttribute('lng'))
            });
            marker.addListener('click', function() {
               var newMapLat = this.lat;
               var newMapLng = this.lng;
               infoWindow.setContent(infowincontent);
               infoWindow.open(map, marker);
               map.setZoom(13); // This will trigger a zoom_changed on the map
               map.setCenter(new google.maps.LatLng(newMapLat, newMapLng));
            });
         });
      };

      function getdatam() {

         let centerLat = $(this).attr('data-lat');
         let centerLng = $(this).attr('data-lng');
         map.setZoom(13); // This will trigger a zoom_changed on the map
         map.setCenter(new google.maps.LatLng(centerLat, centerLng));
      }
      let marcador = document.getElementsByClassName("markers");
      //console.log(marcador.length);
      for (var i = 0; i < marcador.length; i++) {
         console.log(i);
         marcador[i].addEventListener('click', getdatam);
      }
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7h5ODHCzQORxo8jz8zONtVLH1puGIVSI&callback=initMap">
</script>
<?php include 'footer_user_log.php'; ?>