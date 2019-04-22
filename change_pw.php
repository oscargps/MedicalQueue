<?php
session_start();
?>

<?php
if(isset($_SESSION['username'])){
	//echo "Access granted";

	$auth="ok";
}
else
{
	
	echo"<script>location.href='index.php';</script>";
	//#3f51b5ff
	//BGCOLOR="#3f51b5ff
}
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
				

			<!--</div>
			<div class="col-xm-12 col-md-2">-->
				<a class="btn btn-danger" href="cerrar.php" role="button">Cerrar Sesión</a>
			</div>
			
		</div>
			</br>

	</div>

</header>
<body>


<h1>CAMBIO DE CONTRASEÑA</h1>

<form action= "newpw.php" method="post" class="container form-inline">
	<div class="form group">
		<div class="input-group">
			<label class="control-label">Contraseña Actual</label>
			<input type="password" class="form-control" name="pw0"required>
		</div>
	</div>
	<div class="form group">
		<div class="input-group">
			<label class="control-label">Contraseña Nueva</label>
			<input type="password" class="form-control" name="pw1"required>
		</div>
	</div>
	<div class="form group">
		<div class="input-group">
			<label class="control-label">Repetir Contraseña</label>
			<input type="password" class="form-control" name="pw2"required>
		</div>
	</div></br>
		<input type="submit" name="SubmitButton" value="Enviar" class="btn btn-success"/>
</form>


    


	<script src="/javascripts/jquery.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
