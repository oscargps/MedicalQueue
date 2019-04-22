<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
include("conexion.php");
session_start();
if(isset($_SESSION['username']))
{
	//echo "Access granted";
	
	//echo "<br> <a href=cerrar.php> Cerrar Sesion</a><br>";
	
}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
	//#3f51b5ff
	//BGCOLOR="#3f51b5ff
}
if(isset($_POST['pw0']) && !empty($_POST['pw0']) && isset($_POST['pw1']) && !empty($_POST['pw1'])&& isset($_POST['pw2']) && !empty($_POST['pw2']) )
{
if ($_POST['pw2']!=$_POST['pw1'])
{
	echo"<script>alert('Las contraseñas no coinciden');</script>";
	
	echo"<script>location.href='change_pw.php';</script>";
}else
{
	$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");
$us=$_SESSION['username'];
$query="SELECT * FROM users WHERE usuario='$us'";
//echo $query;
$sel= mysqli_query($con,$query);


$session=mysqli_fetch_array($sel);

if($_POST['pw0']== $session['contrasena'])
	{
$query = "UPDATE `users` SET `contrasena` = '$_POST[pw1]' WHERE `users`.`usuario` ='$_SESSION[username]' ";
		   mysqli_query($con, $query);
		   session_destroy();
		   mysqli_close($con);
	//echo "<h2><b>Cambio de contraseña exitoso, por favor ingrese de nuevo</h2></b>";
	echo"<script>alert('Cambio de contraseña exitoso, por favor ingrese de nuevo');</script>";
	echo"<script>location.href='index.php';</script>";
	//*header('Location: consulta.php');
	}else
	{
		echo"<script>alert('Su contraseña actual es incorrecta');</script>";
		//echo "<h2><b>Su contraseña actual es incorrecta</h2></b>";
	echo"<script>location.href='change_pw.php';</script>";
	}
}
}
else
{
	echo"<script>alert('Por favor ingrese la informacion requerida');</script>";
	//echo "<h2><b>Por favor ingrese la informacion requerida</h2></b>";
	echo"<script>location.href='change_pw.php';</script>";
}

   
	?>
</body>
</html>