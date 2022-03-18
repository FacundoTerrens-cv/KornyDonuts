<?php
   include '../car/global/config.php';
   include '../car/global/conect.php';
   include '../car/carrito.php';
   include '../back/seguridad.php';
   ?>
      <?php 
   if($_SESSION['rol'] != 1){
      header('location: ../front/index-user.php');
   }?>
   <?php
     include '../car/templates/cabeceradmin.php';
   ?>
<br>
<div class="row">
               <div class="col-4 text-center" >
                  </div>
                        <div class="col-lg-4 col-sm-12 text-center" style="border-bottom: 2px solid #17bcc0">
                        <h2>
                           Admin FAQ
                        </h2>
                        </div>
                  <div class="col-4 text-center" >
                  </div>
               </div>
               <br>
<a href="agregar_faq.php" class="btn btn-info">Legg til FAQ</a>
<table class="table">
   <thead class="thead-light">
      <?php
          include '../back/conection.php';
          $consulta="SELECT * FROM technorw_KornyDonuts.`faq_section`";
          $resultado=mysqli_query($conn,$consulta);
         //print_r($listProducts);
         ?>
      <tr>
         <th scope="col">#</th>
         <th scope="col">Tittel</th>
         <th scope="col">Spørsmål</th>
         <th scope="col" class="text center">--</th>
         <th scope="col" class="text center">--</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <?php
            while ($faq = mysqli_fetch_array($resultado)){ ?>
      <tr>
         <th scope="row"><?php echo $faq['id']?></th>
         <td><?php echo $faq['titulo']?></td>
         <td><?php echo $faq['texto']?></td>
         <td>
            <form action="" method="post">
               <a class="btn btn-danger" type="submit" name="btn" value="delete" href="../back/delete_faq.php?id=<?php echo $faq['id']?>">Fjerne</a>
         </td>
         </form>
         </td>
         <td>
            <form action="" method="post">
               <a class="btn btn-success" type="submit" name="btn" value="editar" href="editar_faq.php?id=<?php echo $faq['id']?>">Redigere</a>
         </td>
         </form>
         </td>
      </tr>
      <?php } ?>
   </tbody>
</table>

<br><br>
<?php include "../car/templates/pieadmin.php"?>

