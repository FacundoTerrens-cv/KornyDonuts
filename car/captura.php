<?php
    include '../back/conection.php';
    include 'carrito.php';
    $id_user = $_SESSION['id_user'];
    $json = file_get_contents('php://input');
    $datos = json_decode($json, true);
if(!empty ($_SESSION['carrito'])){
    for ($i=0; $i < count($_SESSION['carrito']); $i++) { 
        $arraynombre[$i] = $_SESSION['carrito'][$i]['Nombre'];
        $arraycantidad[$i] = $_SESSION['carrito'][$i]['Cantidad'];
        $arrayprecio[$i] = $_SESSION['carrito'][$i]['Precio'];
    }
    $Nombre=implode(" - ", $arraynombre);
    $Cantidad=implode(" - ", $arraycantidad);
    $Precio=implode(" - ", $arrayprecio);
    echo '<pre>';
    print_r($datos);
    echo '</pre>';
    if(isset($datos)){
        $id_transaccion = $datos['detalles']['id'];
        $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
        $status = $datos['detalles']['status'];
        $fecha = $datos['detalles']['update_time'];
        $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
        $email = $datos['detalles']['payer']['email_address'];
        $id_cliente = $datos['detalles']['payer']['payer_id'];
        $_SESSION['id_t'] = $id_transaccion;
        $query = "INSERT INTO `compra` (`id_user`, `id_transaccion`, `fecha`, `status`, `email`, `id_ciente`, `total_compra`, `nombre_producto`, `precio_unitario`, `cantidad_productos`,`estado_entrega`,`tipo_pago`) VALUES ('$id_user', '$id_transaccion', '$fecha_nueva', '$status', '$email', '$id_cliente', '$total', '$Nombre', '$Precio', '$Cantidad','PENDIENTE','PayPal');";
        $result = mysqli_query($conn, $query);
    }
}
?>
