<?php session_start();
if(isset($_SESSION['username']) && ($_SESSION['rol']=="administrador")){

}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta c harset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilo.css">
<center>
<h1>Otras Acciones</h1>
</head>
<body>
<?php


include("conexion.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");
 $estado=$_POST['accion'];
 $usuario=$_POST['user'];

switch ($estado) {
    case "nouser":
        $query="UPDATE `users` SET `estado` = '0' WHERE `users`.`usuario` = '".$usuario."'";
        
        break;
    case "actuser":
        $query="UPDATE `users` SET `estado` = '1' WHERE `users`.`usuario` = '".$usuario."'";
        break;
    case "reuser":
       $query="UPDATE `users` SET `contrasena` = cedula WHERE `users`.`usuario` = '".$usuario."'";

        break;
}
mysqli_query($con,$query) or die("Error realizando la accion");
   
	mysqli_close($con);
?>
<script>alert("Accion realizada con exito")
location.href='admin_users.php';
</script>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
