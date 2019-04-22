
<?php
session_start();

if(isset($_SESSION['username'])){
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
</br> <h1>Información de Usuario</h1></br>
<?php
//informacion del usuario de la cita
 $query = "SELECT nombre,identificacion,especialidad,motivo,eps,preferencial,correo,codigo,fecha,turno FROM turnosasignados  WHERE preferencial='0' AND especialidad='$_SESSION[rol]'";
$result = mysqli_query($con,$query)or die("fail query");
$i=1;
$numFilas = mysqli_num_rows($result);
if($numFilas == 0)
{

mysqli_free_result($result);
	$query2 = "SELECT nombre,identificacion,especialidad,motivo,eps,preferencial,correo,codigo,fecha,turno FROM turnosasignados  WHERE especialidad='$_SESSION[rol]'";
	$result = mysqli_query($con,$query2)or die("fail query");
}
else
{

}

while(($row = mysqli_fetch_array($result)) && $i<2 )
   {


echo "<div class='container'><table class='table' >
	<tr>
		<td>
			Nombre
		</td>
		<td> ".$row['nombre']."</td>
	</tr>
	<tr>
		<td>
			Identificacion
		</td>
		<td> ".$row['identificacion']."</td>
	</tr>
		<tr>
		<td>
			Especialidad
		</td>
		<td> ".$row['especialidad']."</td>
	</tr>
		<tr>
		<td>
			Motivo de consulta
		</td>
		<td> ".$row['motivo']."</td>
	</tr>
		<tr>
		<td>
			EPS
		</td>
		<td> ".$row['eps']."</td>
	</tr>
		<tr>
		<td>
			Código de cita
		</td>
		<td> ".$row['codigo']."</td>
	</tr>
		<tr>
		<td>
			Correo electrónico
		</td>
		<td> ".$row['correo']."</td>
	</tr>
		<tr>
		<td>
			Turno
		</td>
		<td>".$row['turno']. "</td>
	</tr>
</table></div>";

			   $nombre=$row['nombre'];
			   $id=$row['identificacion'];
			   $esp=$row['especialidad'];
			   $motivo=$row['motivo'];
			   $eps=$row['eps'];
			   $pref=$row['preferencial'];
			   $mail=$row['correo'];
			   $turno=$row['turno'];
			   $codigo=$row['codigo'];
			   $cons=$_SESSION["cons"];
  $i++;

}
$query3 = "INSERT INTO turnosllamados(nombre, identificacion,especialidad,motivo,eps,preferencial,correo,codigo,turno,consultorio) VALUES ('$nombre','$id','$esp','$motivo','$eps','$pref','$mail','$codigo','$turno','$cons')";

$res = mysqli_query($con,$query3)or die("fail query1");
//mysqli_free_result($res);
$query4 = "DELETE FROM turnosasignados  WHERE codigo='$codigo'";
$resul = mysqli_query($con,$query4)or die("fail query2");
//mysqli_free_result($resul);

?>


<form class="container " action= "fin_cita.php?turno=<?php echo $turno?>" method="post" name="frm">
	<div class="form-group">
		
		<label class="control-label">Observaciones de la consulta</label></div>
 <textarea name="observaciones" class="container" style="height: 100px" placeholder="Observaciones...." required></textarea>
	</br>

 <input type="submit" name="SubmitButton" value="Finalizar" class="btn btn-danger"/>
<br />
</form>

	<script src="/javascripts/jquery.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

