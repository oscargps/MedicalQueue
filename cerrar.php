<!DOCTYPE html>
<html lang="en">
<head>
	<meta c harset="UTF-8">
	<title>Logout</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilo.css">


</head>
<body style="vertical-align: 50%">
	<center>
<?php
session_start();

session_destroy();


?>
<h1>Sesion Cerrada</h1>
<a href="index.php">Volver a inicio</a>
</center>
	<script src="/javascripts/jquery.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
