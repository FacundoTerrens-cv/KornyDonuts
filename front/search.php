
  <?php
  $consulta="SELECT * FROM technorw_KornyDonuts.`products` WHERE tipo_producto  LIKE 'Donuts' ORDER BY id ";
  $resultado=mysqli_query($conn,$consulta);
  $filas=mysqli_fetch_array($resultado);
    while ($row = mysqli_fetch_array($resultado)) {
      ?>
    <div class="col-md-3 col-sm-6" style="padding: 20px;" >
    <div class="box" style="background: #17bcc0;max-width:250px;border-radius: 20px;margin: 0 auto;">
    <div class="img-box" style="text-align: center;background: #17bcc0;padding-top: 20px;border-radius:20px">
    <img src='../images/"<?php echo $row["image"]?>' alt='...' height='300px' width='300px' style='width: 200px;height: auto;background: white;margin: 0 auto;border-radius: 10px;'>
    <h4 class='blog_date'><?php $row["price"]?>.-<br></h4>
    </div>
    <div class="detail-box">
    <h5 style='text-align:center'><?php $row["name"]?></h5>
    </div>
    </div>
    </div>
  <?php
  }
?>