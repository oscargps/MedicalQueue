<?php
session_start();?>
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
<?php
if(isset($_SESSION['username'])){
	//echo "Access granted";

}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
}
include("conexion.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");
$codigo=($_GET['codigo']);
//codigo para determinar turno por especialidad
$query = "SELECT id,nombre,identificacion,especialidad,motivo,eps,preferencial,correo,fecha FROM turnosgeneral  WHERE  codigo='$codigo'";
$result = mysqli_query($con,$query)or die("fail query");
$row = mysqli_fetch_array($result);
switch ($row['especialidad']) {
    case "pediatria":
        $esp="P";
        break;
    case "general":
         $esp="G";
        break;
    case "odontologia":
        $esp="O";
        break;
}
//codigo para consecutivo de turno
$query2="SELECT *  FROM turnosasignados WHERE especialidad='$row[especialidad]'";
$res = mysqli_query($con,$query2)or die("fail query");
$numFilas = mysqli_num_rows($res);
$turno= $esp.$row['id'];
//ingreso de turno a tabla de turnos asignados
$query3= "INSERT INTO turnosasignados(nombre, identificacion,especialidad,motivo,eps,preferencial,correo,codigo,turno) VALUES ('$row[nombre]','$row[identificacion]','$row[especialidad]','$row[motivo]','$row[eps]','$row[preferencial]','$row[correo]','$_GET[codigo]','$turno')";
$resu = mysqli_query($con,$query3)or die("fail query");

$query4= "DELETE FROM turnosgeneral WHERE codigo='$codigo'";
 $resul=mysqli_query($con,$query4)or die("fail query4");
 //echo $query4;
?>
<h1>Turno Asignado Correctamente</h1>
<center><h1>Turno: </h1>
    <div style="font-size: 100px;">
        <?php echo $turno?>
    </div>
 <h3><a href=asignar.php?>Volver</a></h3></center>

    <script src="/javascripts/jquery.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
