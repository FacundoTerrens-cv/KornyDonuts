<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
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
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form action="../back/register_back.php" method="POST" class="register-form" id="register-form">
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="username" id="username" placeholder="Brukernavn"  value=""/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="E-post" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Passord" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="cpass" id="cpass" placeholder="Gjenta passord" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="age"><i class="zmdi zmdi-hourglass"></i></label>
                        <input type="number" name="age" id="age" placeholder="Alder" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                        <input type="number" name="phone" id="phone" placeholder="Mobilnummer "  value=""/>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image" >
                <figure><img src="../images/korny-donut-colored.svg" alt="sing up image"></figure>
                <a href="login.php" class="signup-image-link">Jeg er medlem</a>
            </div>
        </div>
    </div>
</div>
</section>
</body>
</html> 