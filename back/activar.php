<?php
include 'conection.php';
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verificar datos
    $email = ($_GET['email']); // Asignar el correo electrónico a una variable
    $hash = ($_GET['hash']); // Asignar el hash a una variable

    $consulta="SELECT email, token, estado FROM user_data WHERE email='".$email."' AND token='".$hash."' AND estado='0'";
    $resultado=mysqli_query($conn,$consulta);
    $match = mysqli_num_rows($resultado);
                 
    if($match > 0){
        // Hay una coincidencia, activar la cuenta
        $update = "UPDATE user_data SET estado='1' WHERE email='".$email."' AND token ='".$hash."' AND estado='0'";
        $update_ex = mysqli_query($conn, $update);
        echo '<html>
        <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!-- Font Icon -->
            <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">
            <!-- Main css -->
            <link rel="stylesheet" href="../css/stylelogin.css">
            <title>Sign in</title>
        </head>
        <body style="height: auto; background-color:#efefef">
        <div class="main">
        <section class="sign-in">
                    <div class="container">
                        <div class="signin-content"style="border: 1 px solid #17bcc0" >
                            <div class="signin-form" style="margin: 0 auto;text-align: center;">
                                <h2 class="form-title">Your account has been activated successfully!</h2>
                                <h4>Thanks for signing up to KornyDonuts!</h4>
                                <a href="#"class="form-submit" style="text-decoration: none;">Go to Login</a>
                            </div>

                        </div>
                    </div>
                </section>
        </body>
        </html>';
    }else{
        // No hay coincidencias
        echo '<div class="statusmsg">La URL es inválida  o ya has activado tu cuenta.</div>';
    }
}else{
    // Intento nó válido (ya sea porque se ingresa sin tener el hash o porque la cuenta ya ha sido registrada)
    echo '<div class="statusmsg">Intento inválido, por favor revisa el mensaje que enviamos correo electrónico</div>';
}
?>