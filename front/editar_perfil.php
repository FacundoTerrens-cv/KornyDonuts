<?php
session_start();
include "../back/conection.php";
$iduser = $_SESSION['id_user'];
$emailuser = $_SESSION['usuario'];
$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="../css/stylelogin.css">
</head>
<body style="background: #efefef; height:auto;">
<div class="main">
<!-- Sign up form -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form" style="width: 100%;">
                <div><h2 class="form-title" style="text-align: center;">Edit Profile</h2></div>
                <form action="../back/editar_perfil_back.php" method="POST" class="register-form" id="register-form">
                    <?php
                    $sql = "SELECT * FROM technorw_KornyDonuts.`user_data` WHERE id = '$iduser'";
                    $resultado = mysqli_query($conn, $sql);
                     while ($filas = mysqli_fetch_array($resultado)){
                    ?>
                    <div class="form-group">
                        <input type="hidden" name="id_user" value="<?php echo $iduser;?>">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="username" id="username" value="<?php echo $filas['username']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="E-post" value="<?php echo $filas['email']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="age"><i class="zmdi zmdi-hourglass"></i></label>
                        <input type="number" name="age" id="age" placeholder="Alder" value="<?php echo $filas['age']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                        <input type="number" name="phone" id="phone" placeholder="Mobilnummer "  value="<?php echo $filas['phone']; ?>"/>
                    </div>
                    <?php }?>
                    <div class="form-group">
                    <select style="width: 100%;margin: 0 auto;height: 50px;text-align: center;border-top: 0px;border-left: 0px;border-right: 0px;border-bottom: 1px solid #999; background-color:#fff" name="local_preferido" id="" >
                        <option value="KD1">KD1</option>
                        <option value="KD2">KD2</option>
                        <option value="KD3">KD3</option>
                    </select>
                    </div>
                    <div class="form-group form-button" style="display: flex; justify-content:center">
                        <input style="margin-right: 10px;" type="submit" name="submit" id="submit" class="form-submit" value="Update"/>
                        <a class="form-submit" href="perfil_user.php" style="text-decoration: none;">Back</a>
                    </div>
                    
                </form>
            </div>

        </div>
    </div>
</div>
</section>
</body>
</html> 