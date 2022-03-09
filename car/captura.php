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
    }
    $Nombre=implode(" - ", $arraynombre);
    $Cantidad=implode(" - ", $arraycantidad);
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
        $query = "INSERT INTO `compra` (`id_user`, `id_transaccion`, `fecha`, `status`, `email`, `id_ciente`, `total_compra`, `nombre_producto`, `cantidad_productos`,`estado_entrega`) VALUES ('$id_user', '$id_transaccion', '$fecha_nueva', '$status', '$email', '$id_cliente', '$total', '$Nombre', '$Cantidad','PENDIENTE');";
        $result = mysqli_query($conn, $query);
    }
}
?>
