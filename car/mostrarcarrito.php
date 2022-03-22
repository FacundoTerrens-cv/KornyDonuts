<?php
session_start();
include 'global/config.php';
include '../car/carrito.php';
$numero = $_SESSION['rol'];
?>
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
      <link href="../css/style-pop.css" rel="stylesheet" />
      <link href="../css/stylenav.css" rel="stylesheet" />
      <script type="text/javascript" src="../js/app.js"></script>
      <link href="../css/responsive.css" rel="stylesheet" />
   </head>
   <body style="
      background-color: #efefef">
      <!-- header section strats -->
      <div style="background-color: #efefef; max-width:1170px; height: 100%;  margin-left: auto; margin-right: auto;">
         <header class="header_section">
            <nav class="menu" style="position: fixed;z-index: 20;background: #efefef;">
            <label class="logo"><a href="../front/index-user.php"><img src="../images/korny-donut-colored.svg" alt="" style="width: 205px;margin-left: 40px;"></a></label>
                <ul class="menu_items"> 
               <!-- <li><a class="nav-link2" href="#"><img src="../images/info.svg" alt="" style="width: 35px;"></a></li> -->
                    <li style="display: ruby;"><a class="nav-link2" href="../car/mostrarcarrito.php"><img src="../images/cart.svg" alt="" style="width: 35px;"> <?php if(!empty ($_SESSION['carrito'])){$registros = count($_SESSION['carrito']); echo "<div style='background-color:#fff;border-radius:100%;width:auto;font-size:17px;color:#000;border:1px solid #32b8c6;padding-left:5%;padding-right:5%;'>".$registros."</div>"; }?></a></li>
                    <li><a class="nav-link2" href="../front/perfil_user.php">Profil</a></li>
                    <li style="background: #e53b38; border-radius:20px; color: #fff;padding: 5px 0;"><a class="nav-link3" href="../back/logout.php">Logout</a></li>
                  </ul>
                <span class="btn_menu">
                <i class="fa fa-bars" style="color: black"></i>
            </span>
            </nav>

         </header>
         <br>
         <div class="contenedor" style="height: 60%; margin-top:10%;margin-bottom: 38%;">
            <div class="row">
               <div class="col-4 text-center" >
               </div>
               <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                  <h2>
                     Handlevogn
                  </h2>
               </div>
               <div class="col-4 text-center" >
               </div>
            </div>
            <br>
            <?php 
            
            if(!empty ($_SESSION['carrito'])){?>
            <table class="table">
               <thead  class="thead-light">
                  <tr>
                  <th width="20%"  class="text-center">--</th>
                     <th width="40%">Produkt</th>
                     <th width="20%" class="text-center">Antal</th>
                     <th width="20%" class="text-center">Totalt</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $total = 0;
                        $test = 0;
                  ?>
                  <?php foreach($_SESSION['carrito'] as $indice=>$Producto){?>
                  <tr id="product-<?php echo $indice;?>" style="background: #efefef;">
                  <td width="20%">
                        <form action="" method="post">
                           <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($Producto['ID'],COD,KEY);?>">
                           <button class="btn btn-danger" type="submit"name="btnAccion"value="eliminar" style="margin-left: 0%;">X</button>
                     </td>
                     <td width="40%"><?php echo $Producto['Nombre']?></td>
                     <td width="20%" class="text-center"><?php echo $Producto['Cantidad']?></td>
                     <td width="20%" class="text-center"><?php echo number_format($Producto['Precio'] * $Producto['Cantidad'],2)?></td>

                     </form>
                  </tr>
                  <?php 

                     $total = $total + ($Producto['Precio'] * $Producto['Cantidad']);
                     $test = $test + (1 * $Producto['Cantidad']);
                     ?>
                  <?php }?>
                  <?php
                  if($test >= 1 && $test < 6){
                     $_SESSION['total'] = $total;
                  }elseif($test >= 6 && $test < 12){
                     $total = $total - ($total * 0.1);
                     $_SESSION['total'] = $total;
                     }elseif($test >= 12){
                        $total = $total - ($total * 0.2);
                        $_SESSION['total'] = $total;
                     }
                  ?>
                  <tr>
                     <td colspan="3" align="right">
                        <h3>total</h3>
                     </td>
                     <td align="center">
                     <?php 
                    if($test >= 1 && $test < 6){
                        echo "<h3>$".number_format($total,2)." </h3>";
                     }elseif($test >= 6 && $test < 12){
                        echo "<h3>$".number_format($total,2)." </h3>
                              <h4>(%10 de Descuento)</h4>";
                     }elseif($test >= 12){
                        echo "<h3>$".number_format($total,2)." </h3>
                              <h4>(%20 de Descuento)</h4>";
                     }
                  ?>

                     </td>
                     <td></td>
                  <tr>
                     <td colspan="12">     
                        <a href="pago.php" class="btn btn-primary btn-lg btn-block" style="max-width: 300px;margin: 0 auto;" type="submit" name="search">å betale</a>
                     </td>
                  </tr>
                  </tr>
               </tbody>
            </table>
            
            <?php   }else{ ?>
            <div class="alert alert-success">
               no hay productos en el carrito...
            </div>
            <?php } ?>
         </div>
         <section class="info_section ">
            <div class="info_container ">
               <div class="container">
                  <div class="info_logo">
                     <a class="navbar-brand" href="index.html">
                     <span>
                     Korny Donuts
                     </span>
                     </a>
                  </div>
                  <div class="social-box">
                     <a href="">
                     <i class="fa fa-facebook" aria-hidden="true"></i>
                     </a>
                     <a href="">
                     <i class="fa fa-instagram" aria-hidden="true"></i>
                     </a>
                  </div>
               </div>
            </div>
         </section>
         <!-- end info section -->
         <!-- footer section -->
         <footer class="footer_section">
            <div class="container">
               <p>
                  &copy; <span id="displayYear"></span> All Rights Reserved By
                  <a href="https://html.design/">Korny Donuts</a>
               </p>
            </div>
         </footer>
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
      </div>
   </body>
</html>

