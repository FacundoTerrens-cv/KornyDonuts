<?php
include 'global/config.php';
include 'global/conect.php';
include 'carrito.php';
include 'templates/cabecera.php'; 

?>
        <br>
        <?php if($mensaje!=""){ ?>
        <div class="alert alert-success">
            <?php echo $mensaje;?>
            <a href="mostrarcarrito.php" class="badge badge-success">ver carrito</a>
        </div>
        <?php }?>
        <div class="row">
            <?php
                $sentencia=$pdo->prepare("SELECT * FROM technorw_KornyDonuts.`products`");
                $sentencia->execute();
                $listProducts=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                //print_r($listProducts);
            ?>
            <?php
            foreach ($listProducts as $products){ ?>
                <div class="col-3">
                <div class="card">
                    <img title="titulo del producto" class="card-img-top" src="../imagenes/<?php echo $products['image'];?>" alt="titulo" height="317px">
                    <div class="card-body">
                        <span><?php echo $products['name'];?></span>
                        <h5 class="card-title">$<?php echo $products['price'];?></h5>
                        <p class="card-text"><?php echo $products['description'];?></p>

                        <form action="" method="post">

                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($products['id'],COD,KEY);?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($products['name'],COD,KEY);?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($products['price'],COD,KEY);?>">
                            <input type="number" name="cantidad" id="cantidad" min="1" max="10">

                        <button class="btn btn-primary" 
                        type="submit" 
                        name="btnAccion" 
                        value="agregar">agregar</button>
                        </form>

                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
<?php 
include "templates/pie.php"
?>