<?php
 include("conexion.php");
session_start();

session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta c harset="UTF-8">
	<title>Inicio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilo.css">
<center>
<img src="img/logo_medicina.png" alt="10px"></center>
</head>
<body><center>
<div class="row" >
<form class="container card " action="verificar.php" method="post" style="width:500px">
<div class="form-group">
	<div class="input-group">
	<div class="input-group-addon">Ingresar</div>
	<input class="form-control" type="text" name="user" placeholder="Nombre de Usuario" required>
	<input type="password" class="form-control" name="pw" placeholder="Contraseña" required>
</div></div>
<button class="btn btn-success">Ingresar</button>
</form>
</div></center>
<script
			  src="http://code.jquery.com/jquery-3.4.0.min.js"
			  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
			  crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>