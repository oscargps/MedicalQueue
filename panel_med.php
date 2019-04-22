
<?php
session_start();
$rol=$_SESSION['rol'];
$cons=$_SESSION['cons'];
if(!$cons){
	$_SESSION['cons']=$_GET["cons"];
}
if(!$rol){
	$_SESSION['rol']=$_GET["esp"];
}
echo "$_SESSION[cons]";
echo "$_SESSION[rol]";
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
				<h1>Bienvenido Dr: <?php echo $_SESSION['name'] ?></h1>
	
			</div>
			<div class="col-xm-12 col-md-4" style="vertical-align: center">
				<a class="btn btn-warning" href="change_pw.php" role="button">Cambiar Contraseña</a>
			
				<a class="btn btn-danger" href="cerrar.php" role="button">Cerrar Sesión</a>
			</div>
			
		</div>
			</br>
			<h3>Consultorio: <?php echo $_SESSION['cons']?></h3>
	</div>

</header>

<?php

include("conexion.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");
if(isset($_SESSION['username'])){
$auth="ok";
 
 //contador de turnos en espera
$query="SELECT * FROM turnosasignados WHERE especialidad='$_SESSION[rol]'";
$res = mysqli_query($con,$query)or die("fail query");
$numFilas = mysqli_num_rows($res);
if($numFilas>0)
{
	  echo "</br><a class='btn btn-primary btn-lg' href='cita.php' role='button'>Iniciar Atencion</a>";
}else{
	echo"<h1>No tiene turnos pendientes</h1>";
}
		 

}	  

else
{
	
	echo"<script>location.href='index.php';</script>";
}


?>

<body>
<?php


echo "<div class='divi'><h2>Turnos pendientes: ".$numFilas."</h2></div>";
?>
	<script
			  src="http://code.jquery.com/jquery-3.4.0.min.js"
			  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
			  crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
	<script></script>
</body>
</html>
