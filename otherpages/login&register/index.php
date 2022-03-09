<!-- in this seccion, get and show the data user, profile -->
<?php
$inc = include("conection.php");
session_start();
$iduser = $_SESSION["usuario"];

if ($inc) {
	$consulta = "SELECT * FROM user_data WHERE email = '$iduser'";
	$resultado = mysqli_query($conn,$consulta);
	if ($resultado) {
		while ($row = $resultado->fetch_array()) {
	    $id = $row['id'];
	    $username = $row['username'];
	    $email = $row['email'];
	    $age = $row['age'];
        $phone = $row['phone'];

	    }
	}
}
?>
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
    <link rel="stylesheet" href="../css2/style.css">
</head>
<body>
<div class="main">
<!-- Sign up form -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Welcome <?php echo $iduser ?></h2>
                <div>
        	<div>
        		<p>
        			<b>ID: </b> <?php echo $id ?><br>
        		    <b>Email: </b> <?php echo $email ?><br>
        		    <b>Age: </b> <?php echo $age ?><br>
                    <b>Phone: </b> <?php echo $phone ?><br>
        		</p>
        	</div>
            <a class="form-submit" href="logout.php">Logout</a>
			<a class="form-submit" href="../maps/map.php">Maps</a>
		
    </div>
</section>
<form action="../maps/map.php" method="POST">
	<input type="text" name="direction">
	<input type="submit" name="search">
</form>
</body>
</html> 