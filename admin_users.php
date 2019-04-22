<?php
session_start();

if(isset($_SESSION['username']) && ($_SESSION['rol']=="administrador")){
	
	$auth="ok";



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
		
	<a class="btn btn-primary btn-lg" href="listar_usuario.php" role="button">Listado de Usuarios del Sistema</a>
	<button class="btn btn-primary btn-lg" type="submit" onclick="mostrar()">Agregar Usuario</button>
	<button class="btn btn-primary btn-lg" type="submit" onclick="mostrar1()">Otras Acciones</button>


</div>
</br></br></br>
	
<div class="container "id="oculto" style="display: none">
	<form action="new_user.php" method="post">
	    <div class="form-group col-md-8">
	        <div class="input-group">
	          <div class="input-group-addon">Nombre Completo</div>
	          <input type="text" class="form-control" placeholder="Nombre"  required name="name">
	          <input type="text" class="form-control" placeholder="Apellido"  required name="last">

	        </div>
	    </div>
        <div >
	        <div class="input-group">
	          <div class="input-group-addon">No de Identificacion</div>
	          <input type="text" class="form-control" placeholder="Sin puntos"  required name="id">
	        </div>
        </div>
        <div class="form-group">
	        <div class="input-group">
	          <div class="input-group-addon">Rol</div>
	          <input type="text" class="form-control" placeholder="Max 3, separadors por (;)"  required name="rol">
	        </div>
        </div>
        
        <div class="form-group col-md-8">
	        <div class="input-group">
	          <div class="input-group-addon">Correo</div>
	          <input type="text" class="form-control" placeholder="usuario@example.com"  required name="mail">
	        </div>
		</div>
        <div class="form-group ">
	        <div class="input-group">
	          <div class="input-group-addon">Telefono</div>
	          <input type="text" class="form-control" placeholder=""  required name="tel">
	        </div>
        </div>
        <input type="submit" name="submitted" value="Enviar" class="form-control btn btn-success">
	</form>
</div>
<div class="container"id="oculto1" style="display: none">
	<form action="admin_ejecutar.php" class="form-inline" method="post">
		<div class="form-group">
	        <div class="input-group">
	          <div class="input-group-addon">Usuario</div>
	          <input type="text" class="form-control" placeholder="Username"  required name="user">
	        </div>
        </div>
        <div class="input-group">
			<label class="sr-only">Accion a realizar</label>
			<select class="form-control" name="accion" id="select">
				<option selected>Accion a realizar</option>
				<option value="nouser">Desactivar Usuario</option>
				<option value="actuser">Reactivar Usuario</option>
				<option value="reuser">Restablecer Contraseña de Usuario</option>
			</select>
		</div>
		<input type="submit" name="submitted" class="form-control btn btn-success">
	</form>
</div>
	
<script src="js/jquery.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	function mostrar(){
		document.getElementById('oculto').style.display = 'block';
		document.getElementById('oculto1').style.display = 'none';}
	function mostrar1(){
		document.getElementById('oculto1').style.display = 'block';
		document.getElementById('oculto').style.display = 'none';}
</script>
</body>
</html>

