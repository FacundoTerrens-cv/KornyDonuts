<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Icon -->
    <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="../css/stylelogin.css">
	<title>Recover Password</title>
</head>
<body style="height: auto; background-color:#efefef">
<div class="main">
<section class="sign-in">
            <div class="container">
                <div class="signin-content"style="border: 1 px solid #17bcc0" >
                    <div class="signin-image">
                        <figure><img src="../images/korny-donut-colored.svg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link" style="text-decoration:none;">Lag konto</a><br>
                        <a href="login.php" class="signup-image-link" style="text-decoration:none;">Jeg er medlem</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Recover Password</h2>
                        <form action="../back/recuperar_pass_back.php" method="POST"class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-email"></i></label>
                                <input require type="text" name="email" id="email" placeholder="E-post"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Send"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>