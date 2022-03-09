<?php
sleep(1);
if(!empty($_REQUEST["id"])){
include 'login&register/conection.php';
$lastID = $_REQUEST['id'];

$query  = ("SELECT COUNT(*) as num_rows FROM products WHERE id < ".$lastID." ORDER BY id DESC");
$row    = mysqli_query($conn, $query);
$array  = mysqli_fetch_array($row);
$totalRowCount = $array['num_rows'];
$showLimit = 3;


$Sqlquery    = ("SELECT * FROM products WHERE id < ".$lastID." ORDER BY id DESC LIMIT $showLimit");
$result   = mysqli_query($conn, $Sqlquery);
$totalRegist  = mysqli_num_rows($result);

if($totalRegist >0){
    while($dataComent = mysqli_fetch_array($result)){
        $idComentario = $dataComent['id'];
?>

<div class="row border_special item-comentario" id="<?php echo $dataComent['id']; ?>">
    <div class="col-md-2 col-sm-12">
         <div id="imgperfil">
            <img src="<?php echo $dataComent['image'];?>" alt="">
        </div>
    </div> 

    <div class="col-md-10 text-center marb-35">
        <div class="contenidouser">
            <h4><?php echo $dataComent['name'];?></h4>
            <p><?php   echo $dataComent['description'];?></p>
            <span><?php echo $dataComent['price'];?></span>
        </div>
    </div> 
</div>

<?php
 } 

if($totalRowCount > $showLimit){ ?>
<div class="show_more_main" id="show_more_main<?php echo $idComentario; ?>">
<div class="row clearfix">
    <div class="col-sm-12 text-center">
        <button class="btn btn-danger btn-lg btn-block waves-effect show_more" type="submit" id="<?php echo $idComentario; ?>">Cargar Más Registros</button>
    </div>
</div>
<div class="row clearfix">
    <div class="col-sm-12 text-center">
        <span class="loding" style="display: none;"><img src="imgs/cargando_more.gif" alt="Cargando"></span>
    </div>
</div>
</div>

<?php }else{ ?>

<div class="col-md-12 col-sm-12">
    <h4>No hay más Registros ...</h4>
</div>

<?php
    } 

   }
}
?>