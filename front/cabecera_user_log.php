
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
   </head>
   <body style="
      background-color: #efefef">
      <!-- header section strats -->
      <div style="background-color: #efefef; max-width:1170px; height: 100%;  margin-left: auto; margin-right: auto;">
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