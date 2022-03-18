<?php
    include '../back/conection.php';
    include '../car/carrito.php';
    $pago_local = $_POST['pago_local'];
if(!empty ($_SESSION['carrito'])){
    for ($i=0; $i < count($_SESSION['carrito']); $i++) { 
        $arraynombre[$i] = $_SESSION['carrito'][$i]['Nombre'];
        $arraycantidad[$i] = $_SESSION['carrito'][$i]['Cantidad'];
        $arrayprecio[$i] = $_SESSION['carrito'][$i]['Precio'];
    }
    $Nombre=implode(" - ", $arraynombre);
    $Cantidad=implode(" - ", $arraycantidad);
    $Precio=implode(" - ", $arrayprecio);
    if(isset($pago_local)){
        $total = $_SESSION['total'];
        $status = "PAGO LOCAL";
        $fecha_nueva = date('Y-m-d H:i:s', time());
        $email = $_SESSION['email'];
        $id_user = $_SESSION['id_user'];
        $id_transaccion = mt_rand(1, 100000);
        $_SESSION['id_t'] = $id_transaccion;
        $query = "INSERT INTO `compra` (`id_user`, `id_transaccion`, `fecha`, `status`, `email`, `total_compra`, `nombre_producto`, `precio_unitario`, `cantidad_productos`,`estado_entrega`,`tipo_pago`) VALUES ('$id_user', '$id_transaccion', '$fecha_nueva', '$status', '$email', '$total', '$Nombre', '$Precio', '$Cantidad','PENDIENTE','Pago en Local');";
        $result = mysqli_query($conn, $query);
        header('Location:select.php');
    }
}
?>
