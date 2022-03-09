<?php
session_start();
include 'conection.php';
$email               = $_POST['email'];
$pass                = $_POST['pass'];
$_SESSION['usuario'] = $email;
$consulta            = "SELECT*FROM user_data where email='$email' OR username = '$email'";
$resultado           = mysqli_query($conn, $consulta);
$filas               = mysqli_fetch_array($resultado);
$filas_num           = mysqli_num_rows($resultado);
if ($filas_num > 0) {
    $hash                 = $filas['pass'];
    $_SESSION['rol']      = $filas['rol_id'];
    $_SESSION['id_user']  = $filas['id'];
    $_SESSION['username'] = $filas['username'];
    if (password_verify($pass, $hash)) {
        if ($filas['estado'] == 1) {
            if ($filas['rol_id'] == 2) {
                header("Location: ../front/index-user.php");
            } elseif ($filas['rol_id'] == 1) {
                header("Location: ../front/admin.php");
            } else {
                echo "error";
            }
        } else {
            echo '<script type="text/javascript">
    alert("Su Cuenta no esta Verificada");
    window.location.href="../front/login.php";
    </script>';
        }
    } else {
        echo '<script type="text/javascript">
        alert("Contraseña incorrecta");
        window.location.href="../front/login.php";
        </script>';
    }
} else {
    echo '<script type="text/javascript">
    alert("Nombre o Contraseña Incorrectos");
    window.location.href="../front/login.php";
    </script>';
} 