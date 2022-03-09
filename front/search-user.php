<?php 
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');
function search()
{ 
  $search = $_POST['search'];
  include '../car/carrito.php';
  include '../back/conection.php';
  $consulta="SELECT * FROM mapas.`products` WHERE tipo_producto LIKE '%$search%' ORDER BY id ";
  $resultado=mysqli_query($conn,$consulta);
  $filas=mysqli_fetch_array($resultado);
    foreach ($resultado as $row){
    echo '<div class="col-md-3 col-sm-6" style="padding: 20px;" >';
    echo '<div class="box" style="background: #17bcc0;max-width:250px;border-radius: 20px;margin: 0 auto;border: 3px solid #17bcc0;">';
    echo '<div class="img-box" style="text-align: center;background: #17bcc0;padding-top: 20px;border-radius:20px">';
    echo "<img src='../images/".$row["image"]."' alt='...' height='300px' width='300px' style='width: 200px;height: auto;background: white;margin: 0 auto;border-radius: 10px;'>";
    echo "<h4 class='blog_date'>".$row["price"].",-<br></h4>";
    echo '</div>';
    echo '<div class="detail-box">';
    echo "<h5 style='text-align:center;'>".$row["name"]."</h5>";;
    echo "<form action='' method='POST'>";
    echo "<input type='hidden' name='id' id='id' value='".$row['id']."'>";
    echo "<input type='hidden' name='nombre' id='nombre' value='".$row['name']."'>";
    echo "<input type='hidden' name='precio' id='precio' value='".$row['price']."'>";
    echo "<div style='display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: column;
    gap: 10px;'>";
    echo "
    <div class='valChanger' style='display: inline-flex;'>
    <div class='input-number-d'style='border-radius: 10px 0px 0px 10px;'>-</div>
    <input name='cantidad' class='inputNumber' value='1' max='10' min='0' style='width:65px;text-align:center'>
    <div class='input-number-i' style='border-radius: 0px 10px 10px 0px;'>+</div>
    </div>
    ";
    echo "<button class='button2' type='submit' name='btnAccion' value='agregar'>Add Cart</button>";
    echo "</div>";
    echo "</form>";
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
}
search();
echo "<script src='../js/number.js'></script>";
?>
