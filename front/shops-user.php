<?php
session_start();
include '../car/global/config.php';
include '../car/carrito.php';
$iduser = $_SESSION['id_user'];
$emailuser = $_SESSION['usuario'];
$username = $_SESSION['username'];
$numero = $_SESSION['rol'];
if($numero != 2){
      header('Location: ../front/index.php');
}
include 'cabecera_user_log.php';
?>
         <br><br>
         <div class="row">
               <div class="col-4 text-center" >
                  </div>
                        <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                        <h2>
                        Butikk
                        </h2>
                        </div>
                  <div class="col-4 text-center" >
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
         <br>
<table class="table">
   <thead class="thead-light">
      <?php
         $sentencia=$pdo->prepare("SELECT * FROM technorw_KornyDonuts.`markers`");
         $sentencia->execute();
         $listProducts=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         ?>
      <tr>
         <th scope="col">#</th>
         <th scope="col">Nummer</th>
         <th scope="col">Adresse</th>
         <th scope="col">By</th>
         <th scope="col">Tid</th>
         <th scope="col">--</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <?php foreach ($listProducts as $products){ ?>
      <tr class="markers" data-lat="<?php echo $products['lat']?>" data-lng="<?php echo $products['lng']?>" style="cursor: pointer;">
         <th scope="row"><?php echo $products['id']?></th>
         <td><?php echo $products['name']?></td>
         <td><?php echo $products['address']?></td>
         <td><?php echo $products['city']?></td>
         <td><?php echo $products['time']?></td>
      </tr>
      <?php } ?>
   </tbody>
</table>
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
               infowincontent.setAttribute('id', parseFloat(markerElem.getAttribute('lat')));
            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
               map: map,
              position: point,
              label: icon.label,
               lat:  parseFloat(markerElem.getAttribute('lat')),
               lng:  parseFloat(markerElem.getAttribute('lng'))
            });
            marker.addListener('click', function() {
               var newMapLat = this.lat;
               var newMapLng = this.lng;
              infoWindow.setContent(infowincontent);
              infoWindow.open(map, marker);
              map.setZoom(13);      // This will trigger a zoom_changed on the map
               map.setCenter(new google.maps.LatLng(newMapLat, newMapLng));
            });
          });
        };
        function getdatam(){
            let centerLat = $(this).attr('data-lat');
            let centerLng = $(this).attr('data-lng');
            map.setZoom(13);      // This will trigger a zoom_changed on the map
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
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7h5ODHCzQORxo8jz8zONtVLH1puGIVSI&callback=initMap">
</script>
<?php include 'footer_user_log.php';?>
         
