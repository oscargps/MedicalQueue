<?php
session_start();

if(isset($_SESSION['username']) && ($_SESSION['rol']=="administrador")){
	//echo "Access granted";

	$auth="ok";
	
}
else
{
	
	echo"<script>location.href='index.php';</script>";
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
        <h1>Actualizacion de datos de Usuarios</h1>
  
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
<?php
include("conexion.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");

if(isset($_POST['submitted'])){ //check if form was submitted
  $query="UPDATE `users` SET `$_POST[dato]` = '$_POST[new_data]' WHERE `users`.`usuario` = '$_POST[user]'";
}
else
{
   $query="UPDATE `users` SET `estado` = '0' WHERE `users`.`usuario` = 'a'";
}
//echo $query;
?>
<body > </br></br></br>
<div class="container">
  <form action="" class="form-inline" method="post">
    <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Usuario</div>
            <input type="text" class="form-control" placeholder="Username"  required name="user">
          </div>
        </div>
        <div class="input-group">
      <label class="sr-only">Accion a realizar</label>
      <select class="form-control" name="dato" id="select">
        <option selected>Dato a cambiar</option>
        <option value="nombre">Nombre de Usuario</option>
        <option value="rol">Rol</option>
        <option value="telefono">Telefono de Contacto</option>
        <option value="correo">Correo electronico</option>
      </select>
    </div>
    <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Nuevo Dato</div>
            <input type="text" class="form-control" placeholder=""  required name="new_data">
          </div>
        </div>
    <input type="submit" name="submitted" value="Enviar" class="form-control btn btn-success">
  </form>
  </div>
  <?php mysqli_query($con,$query)or die("fail query");
   $query2 = "SELECT nombre,usuario,rol,cedula,correo,telefono,estado FROM users WHERE usuario = '$_POST[user]'";

   $result = mysqli_query($con,$query2);
   $numero = 0;
   ?>
<div id="imprimible">
  <div class="container" >
         <h1 align="center">Lista de Usuarios Registrados en el Sistema </h1>
  </div>
  <div class="container">
    <div class="table-responsive" >
        <table class="table table table-border">
          <tr>
          <th class="active">Nombre de Usuario</th>
          <th class="active">Usuario de Ingreso</th>
          <th class="active">Rol</th>
          <th class="active">Identificación</th>
          <th class="active">Correo Electrónico</th>
          <th class="active">Teléfono</th>
          <th class="active">Estado</th>
          </tr>
            <?php

                 $row = mysqli_fetch_array($result);
                 

                   echo "<tr><td>" .
                     $row["nombre"] . "</td>";
                   echo "<td>" .
                     $row["usuario"] . "</td>";
                      echo "<td>" .
                     $row["rol"] . "</td>";
                   echo "<td>" .
                     $row["cedula"] . "</td>";
                  echo "<td>" .
                  $row["correo"]."</td>";
                   echo "<td>" .
                     $row["telefono"]. "</td>";
                   echo "<td>" .
                     $row["estado"] . "</td></tr>";
                   
                 
                 
                    mysqli_free_result($result) or die;
                 mysqli_close($con);

              ?>
        </table> 
    </div>
  </div>
</div>
<script src="/javascripts/jquery.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>