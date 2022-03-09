<?php
session_start();
$mensaje="";
if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']){
        //agrega productos al carrito
        case 'agregar': 

            if(is_numeric(($_POST['id']))){
                $ID=$_POST['id'];
               // $mensaje.= "Ok ID Correcto".$ID."</br>";
            }else{ $mensaje.= "ID Incorrecto".$ID."</br>";};

            if(is_string(($_POST['nombre']))){
                $NOMBRE=$_POST['nombre'];
               // $mensaje.= "Ok nombre Correcto".$NOMBRE."</br>";
            }else{ $mensaje.= "Nombre Incorrecto".$NOMBRE."</br>"; break;}

            if(is_numeric(($_POST['precio']))){
                $PRECIO=$_POST['precio'];
               // $mensaje.= "Ok precio Correcto".$PRECIO."</br>";
            }else{ $mensaje.= "Precio Incorrecto".$PRECIO."</br>"; break;}

           if(is_numeric(($_POST['cantidad']))){
              $CANTIDAD=($_POST['cantidad']);
              //  $mensaje.= "Ok cantidad Correcto".$CANTIDAD."</br>";
            }else{ $mensaje.= "Cantidad Incorrecto".$CANTIDAD."</br>"; break;}
            
            if(!isset($_SESSION['carrito'])){
                $Producto=array(
                    'ID'=>$ID,
                    'Nombre'=>$NOMBRE,
                    'Cantidad'=>$CANTIDAD,
                    'Precio'=>$PRECIO
                );
                $_SESSION['carrito'][0]=$Producto;
                $mensaje= "Producto agregado al carrito...";
            }else{
                $idproducto = array_column($_SESSION['carrito'], "ID");
                if(in_array($ID, $idproducto)){
                    echo "<script>alert('el producto ya a sido agregado')</script>";
                }else{
                $numeroproductos=count($_SESSION['carrito']);
                $Producto=array(
                    'ID'=>$ID,
                    'Nombre'=>$NOMBRE,
                    'Cantidad'=>$CANTIDAD,
                    'Precio'=>$PRECIO
                );
                $_SESSION['carrito'][$numeroproductos]=$Producto;
                $mensaje= "Producto agregado al carrito...";
                header('location:../front/index-user.php#productos');
                }
            }
        break;
        
        //elimina productos del carrito
        case 'eliminar':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);

                foreach($_SESSION['carrito'] as $indice=>$Producto){
                    if($Producto['ID']==$ID){
                        unset($_SESSION['carrito'][$indice]);
                   break; }
                }
            }else{ $mensaje.= "ID Incorrecto".$ID."</br>";};

        break;
    }
}
?>