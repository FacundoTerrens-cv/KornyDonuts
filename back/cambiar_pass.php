<?php
include 'conection.php';
if (isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['hash']) && !empty($_GET['hash'])) {
    // Verificar datos
    $email = ($_GET['email']); // Asignar el correo electrónico a una variable
    $hash = ($_GET['hash']); // Asignar el hash a una variable
    $sql = "SELECT token_pass FROM user_data WHERE token_pass = '$hash'";
    $result = mysqli_query($conn, $sql);
    $resultado = mysqli_num_rows($result);
    if($resultado > 0){
        if (!empty($_POST['pass'])) {
            $pass = $_POST["pass"];
            $pwd_hashed = password_hash($pass, PASSWORD_DEFAULT);
            $update = "UPDATE user_data SET pass='" . $pwd_hashed . "' WHERE email='" . $email . "' AND token_pass ='" . $hash . "'";
            $update_ex = mysqli_query($conn, $update);
            if ($update_ex) {
                header("location:../front/cambio_pass_activo.php");
            }
        }
    } else {
        header('location: ../front/cambio_pass_error.php');
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Icon -->
    <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="../css/stylelogin.css">
    <title>Change Password</title>
</head>
<body style="height: auto; background-color:#efefef">
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content" style="border: 1 px solid #17bcc0">
                    <div class="signin-image">
                        <figure><img src="../images/korny-donut-colored.svg" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Change Password</h2>
                        <form action="" method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-email"></i></label>
                                <input require type="password" name="pass" id="pass" placeholder="New Pass" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Log in" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>