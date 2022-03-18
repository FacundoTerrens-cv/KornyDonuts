<?php
include '../car/global/config.php';
include '../car/carrito.php';
$numero = $_SESSION['rol'];
if($numero != 2){
      header('Location: ../front/index.php');
}
$local = $_SESSION['local'];?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <title>Korny Donuts</title>
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
      <link href="../css/font-awesome.min.css" rel="stylesheet" />
      <link href="../css/style.css" rel="stylesheet" />
      <link href="../css/stylenav.css" rel="stylesheet" />
      <script type="text/javascript" src="../js/app.js"></script>
      <link href="../css/responsive.css" rel="stylesheet" />
            <link href="../css/style-pop.css" rel="stylesheet" />
      <link rel="manifest" href="manifest.json" />
   </head>
   <body style="
      background-color: #efefef">
      <!-- header section strats -->
      <div style="background-color: #efefef; max-width:1500px; height: 100%;  margin-left: auto; margin-right: auto;">
         <header class="header_section">
            <nav class="menu" style="position: fixed;z-index: 20;background: #efefef;">
            <label class="logo"><a href="index-user.php"><img src="../images/korny-donut-colored.svg" alt="" style="width: 205px;margin-left: 40px;"></a></label>
                <ul class="menu_items"> 
               <!-- <li><a class="nav-link2" href="#"><img src="../images/info.svg" alt="" style="width: 35px;"></a></li> -->
                    <li style="display: ruby;"><a class="nav-link2" href="../car/mostrarcarrito.php"><img src="../images/cart.svg" alt="" style="width: 35px;"> <?php if(!empty ($_SESSION['carrito'])){$registros = count($_SESSION['carrito']); echo "<div style='background-color:#fff;border-radius:100%;width:auto;font-size:17px;color:#000;border:1px solid #32b8c6;padding-left:5%;padding-right:5%;'>".$registros."</div>"; }?></a></li>
                    <li><a class="nav-link2" href="perfil_user.php">Profil</a></li>
                    <li style="background: #e53b38; border-radius:20px; color: #fff;padding: 5px 0;"><a class="nav-link3" href="../back/logout.php">Logout</a></li>
                  </ul>
                <span class="btn_menu">
                <i class="fa fa-bars" style="color: black"></i>
            </span>
            </nav>

         </header>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container ">
                        <div class="row">
                           <div id="imagen_donas" class="col-md-12 col-lg-12 col-sm-6" style="padding: 0">
                              <div class="img-box">
                                 <img src="../images/donut.png" alt="" style="position:relative;min-height: 420px;float: inline-end;margin-top: 10%;">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <br><br><br>
         <section class="blog_section layout_padding" id="productos">
            <div  style="padding-left: 0px;
padding-right: 0px;">
               <div class="row">
               <div class="col-4 text-center" >
                  </div>
                        <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                     <?php if(!empty ($_SESSION['local'])){ 
                              echo "<div class='alert alert-success' style='text-align: center;'>
                              Stock is ".$_SESSION['local']." Store
                                    </div>";
                     }else{
                        echo "<div class='alert alert-success' style='text-align: center;'>
                        you must assign a store preference in <br> profile -> edit profile -> local
                              </div>";
                     }
                        ?>   
                        <h2>
                        Produkter 
                        </h2>
                        </div>
                  <div class="col-4 text-center" >
                  </div>
               </div>
                     <br>
               <div class="row" style="width: 100%;margin: 0 auto;" id="result">
               
                   <?php 

  include '../back/conection.php';
  $consulta="SELECT * FROM technorw_KornyDonuts.`products` WHERE tipo_producto  LIKE 'Donuts' AND cantidad >= 1 AND local = '$local' ORDER BY id";
  $resultado=mysqli_query($conn,$consulta);
  $filas=mysqli_fetch_array($resultado);
  
    while ($row = mysqli_fetch_array($resultado)) {
    ?>
    
    <div class="col-md-3 col-sm-6" style="padding: 0px;">
    <div class="box" style="  background: #17bcc0;width: 100% ;border-radius: 0px;height: 250px;display: flex; margin-top:0px;border:2px solid #fff">
    <div class="img-box" style="text-align: center;background: #17bcc0;padding-top: 20px;border-radius: 0px;margin-left: 30px; height:230px">
    <img src='../images/<?php echo$row["image"] ?>' alt='...' height='300px' width='300px' style='width: 150px;height: auto;background: white;margin: 0 auto;border-radius: 10px;'>
    <h4 class='blog_date' style="  margin-right: 10px;margin-left: 20px;"><?php echo $row["price"] ?>,-<br></h4>
    </div>
    <div class="detail-box" style="padding-left: 0px;padding-right: 0px;margin:0 auto; height:230px">
    <h5 style='  text-align: left;margin-bottom: 5px;height: 20px;width: 180px;font-size: 15px;'><?php echo $row["name"]?></h5>
    <h5 style='text-align: left;font-size: 13px;margin-bottom: 0px;height: 20px;font-weight: 300;width: 150px;'><?php echo $row["description"]?></h5>
    <div class="capa" style="margin: 0 auto;margin-bottom: 10px;">
                           <img src="../images/info.svg" alt="" style="width: 20px; height: 20px">
                           <div class="capa-info">
                              <h1 style="font-size: 15px; margin-left: 15%"><?php
                              if($row['alergenos'] > 0){
                              $alergenos = $row['alergenos'];
                              $porciones = explode("-", $alergenos); 
                              $numero_alergenos = count($porciones);
                              for($i = 0; $i < $numero_alergenos; $i++){
                              echo $i + 1 ."- ".$porciones[$i]."<br>";
                           }
                        }else{
                           echo "INGEN INFORMASJON OM ALLERGENER";
                        }?></h1>
                           </div>
                        </div>
    <form action='' method='POST'>
    <input type='hidden' name='id' id='id' value='<?php echo $row['id']?>'>
    <input type='hidden' name='nombre' id='nombre' value='<?php echo $row['name']?>'>
    <input type='hidden' name='precio' id='precio' value='<?php echo  $row['price']?>'>
    <div style='display: flex;align-items: center;justify-content: space-between;flex-direction: column;gap: 10px;'>
    <div class='valChanger' style='display: inline-flex;'>
    <div class='input-number-d'style='border-radius: 10px 0px 0px 10px;'>-</div>
    <input name='cantidad' class='inputNumber' value='1' max='<?php echo  $row['cantidad']?>' min='0' style='width:35px;text-align:center'>
    <div class='input-number-i' style='border-radius: 0px 10px 10px 0px;'>+</div>
    </div>
    <button class='button2' type='submit' name='btnAccion' value='agregar'>Add Cart</button>
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
         <table class="table">
   <thead class="thead-light">
      <?php
  include '../back/conection.php';
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
         <?php
            while ($products = mysqli_fetch_array($resultado)){ ?>
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