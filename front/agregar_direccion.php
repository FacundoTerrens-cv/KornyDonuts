<?php
session_start();
include '../back/conection.php';
include '../car/global/config.php';
include '../car/carrito.php';
$numero = $_SESSION['rol'];
if($numero != 2){
      header('Location: ../front/index.php');
}
?>
<?php
    $id_transaccion=$_SESSION['id_t'];
   ?>
                  <?php
                $consulta="SELECT * FROM technorw_KornyDonuts.`markers`";
                $resultado=mysqli_query($conn,$consulta);
                  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <link rel="icon" href="images/fevicon.png" type="image/gif" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Korny Donuts</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
        <!-- fonts style -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
        <!-- font awesome style -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="../css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="../css/responsive.css" rel="stylesheet" />
    </head>
    <body style="
        background-color: #efefef">
        <!-- header section strats -->
        <div id="contenedor_carga">
            <div id="carga"> 
            </div>
        </div>
        <div style="background-color: #efefef; max-width:1170px; height: 100%;  margin-left: auto; margin-right: auto;">
            <header class="header_section">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div>
                    </nav>
                </div>
            </header>
            <br>
            <div class="row">
                <div class="col-4 text-center" >
                </div>
                <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                    <h2>
                        Når vil du hente bestillingen?
                    </h2>
                </div>
                <div class="col-4 text-center" >
                </div>
            </div>
            <br>
            <form action="../back/agregar_sucursal_retiro.php" method="POST" class="register-form" id="login-form">
            <div class="row">
                <div class="col-4 text-center">
                </div>
                <div class="col-lg-4 col-sm-12 text-center" style="padding-left: 0px; padding-right: 0px;">
                    <input type="time" style=" margin: 0.5rem 0;padding: 20px;font-size: 50px;border: 2px solid #32b8c6;border-radius: 15px;width:400px;text-align:center" name="hora_retiro">  
                </div>
                <div class="col-4 text-center">
                </div>
                <br>
            </div>
            <br>
            <div class="row">
            <div class="col-4 text-center" >
            </div>
            <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
            <h2>
            Kommentar
            </h2>
            </div>
            <div class="col-4 text-center" >
            </div>
            </div>
            <br>
            <div class="row">
               <div class="col-3 text-center" >
               </div>
               <div class="col-lg-6">
               <textarea class="textarea" placeholder="Melding..." name="nota_pedido"></textarea>
               </div>
               <div class="col-3 text-center" >
               </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4 text-center" >
                </div>
                <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                    <h2>
                        Velg hvor du ønsker å hente din bestilling
                    </h2>
                </div>
                <div class="col-4 text-center" >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4 text-center">
                </div>
                <div class="col-lg-4 col-sm-12 text-center" style="padding-left: 0px; padding-right: 0px;">

                        <select style="width: 400px;margin: 0 auto;height: 50px;text-align: center;border: 2px solid #32b8c6;border-radius: 15px;" name="sucursal_retiro" id="" >
                        <?php while ($shops = mysqli_fetch_array($resultado)){  ?>
                            <option value="<?php echo $shops['name']?>"><?php echo $shops['name']?></option>
                            <?php }?>
                        </select>
                </div>
                <div class="col-4 text-center">
                </div>
                <br>
            </div>
            <br>
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
                $consulta="SELECT * FROM technorw_KornyDonuts.`markers`";
                $resultado=mysqli_query($conn,$consulta);
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
            <?php while ($products = mysqli_fetch_array($resultado)){ ?>
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
            <br>



            <br>
            <div class="row">
               <div class="col-4 text-center">
               </div>
               <div class="col-4 text-center">
               <input type="hidden" value="<?php echo $id_transaccion;?>" name="id_transaccion">
               <button class="button3" style="width:100%;max-width: 100%;margin: 0 auto;" type="submit" name="submit" id="submit">Add</button>
               </div>
               <div class="col-4 text-center">
               </div>
            </div>
            </form>
            <br>
            <style>
                #map {
                height: 100%;
                width: 100%;
                }
            </style>
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
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7h5ODHCzQORxo8jz8zONtVLH1puGIVSI&callback=initMap"></script>
            <!-- end info section -->
            <!-- footer section -->
        </div>
    </body>
    <script>
        window.onload = function(){
           var contenedor = document.getElementById('contenedor_carga');
           contenedor.style.visibility='hidden';
           contenedor.style.opacity= '0';
        }
    </script>
</html>

