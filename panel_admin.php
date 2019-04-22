<?php
session_start();
if(!$_SESSION['rol']){
	$_SESSION['rol']=$_GET['rol'];
}
if(isset($_SESSION['username']) && ($_SESSION['rol']=="admin")){
	//echo "Access granted";
	$auth="ok";
	$_SESSION['rol']='admin';
}
else
{
	
	echo"<script>location.href='index.php';</script>";
	
}


include("conexion.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta c harset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilo.css">
<center>

</head>
<header>
	<div class="container" >
		<div class="row">
			<div class=" col-xm- 12 col-md-8">
				<h1>Bienvenido Sr: <?php echo $_SESSION['name'] ?></h1>
	
			</div>
			<div class="col-xm-12 col-md-4">
				<a class="btn btn-warning" href="change_pw.php" role="button">Cambiar Contraseña</a>
			<!--</div>
			<div class="col-xm-12 col-md-2">-->
				<a class="btn btn-danger" href="cerrar.php" role="button">Cerrar Sesión</a>
			</div>
			
		</div>
			</br>

	</div>

</header>
<body>
	</br></br></br>
	
<div class="container">
		<a class="btn btn-success btn-lg" href="admin_users.php" role="button">Administrar Usuarios</a>
		<a class="btn btn-success btn-lg" href="reporte.php" role="button">Reporte de Turnos</a>
</div> 


<script src="js/jquery.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="js/bootstrap.min.js"></script>
</html>

