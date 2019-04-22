<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
session_start();
?>
<title>Finalizar Cita</title>


<?php
if(isset($_SESSION['username'])){

}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
}
include("conexion.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");
//echo $_SESSION['rol'];
?>
</head>

<body>
<?php
$turno=$_GET['turno'];
//echo $turno;
$query = "SELECT nombre,identificacion,especialidad,motivo,eps,preferencial,correo,codigo,fecha FROM turnosllamados WHERE turno='$turno'";
$result = mysqli_query($con,$query)or die("fail query1");
$row=mysqli_fetch_array($result);
$obs=$_POST['observaciones'];

//echo $obs;
$query2="INSERT INTO turnosatendidos(nombre, identificacion,especialidad,motivo,eps,preferencial,correo,codigo,turno,obs,consultorio,atendio) VALUES ('$row[nombre]','$row[identificacion]','$row[especialidad]','$row[motivo]','$row[eps]','$row[preferencial]','$row[correo]','$row[codigo]','$turno','$obs','$_SESSION[cons]','$_SESSION[name]')";

$res = mysqli_query($con,$query2)or die("fail query2");
$query3="DELETE FROM turnosllamados  WHERE codigo='$row[codigo]'";
echo $query3;
$resu = mysqli_query($con,$query3)or die("fail query3");
echo"<script>alert('Consulta finalizada exitosamente');</script>";
echo"<script>location.href='panel_med.php';</script>";
?>
</body>
</html>
