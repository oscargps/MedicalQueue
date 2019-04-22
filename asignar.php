<?php
	session_start();
	if(isset($_SESSION['username'])){

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
		<meta charset="UTF-8">
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
				<div class="col-xm-12 col-md-4" style="align-content: center;">
					<div class="btn-group">
					<a class="btn btn-warning" href="change_pw.php" role="button">Cambiar Contraseña</a>
				
					<a class="btn btn-danger" href="cerrar.php" role="button">Cerrar Sesión</a>
					</div>
				</div>
				
			</div>
				</br>

		</div>
	</header>
	<?php
		include("conexion.php");
		$con=mysqli_connect($host, $user, $pw) or die ("error1");
		mysqli_select_db($con,$db)or die ("error2");

		if(isset($_POST['SubmitButton'])){ //check if form was submitted
		 $query = "SELECT nombre,identificacion,especialidad,motivo,eps,preferencial,correo,fecha FROM turnosgeneral  WHERE codigo='$_POST[codigo]'";
		}
		else
		{
			$query = "SELECT nombre,identificacion,especialidad,motivo,eps,preferencial,correo,fecha FROM turnosgeneral  WHERE codigo='1'";
		}
	?>
	<body>
		<form action= "" method="post" name="frm" class="container">
			<div class="form-group">
			<label for="label">Ingrese código de cita</label>
			<input type="text" name="codigo" class="form-control" placeholder="12345" />
			</div> 
			 <button type="submit"name="SubmitButton" value="Consultar" class="btn btn-success"> <span class="glyphicon  glyphicon-search"></span> Consultar</button>
			<br /><br />
			</div>
		</form>
		<?php

			$result = mysqli_query($con,$query)or die("fail query");
			while($row = mysqli_fetch_array($result))
			   {
					 $esp=$row['especialidad'];
			  	 echo "<div class='container'><table class='table'>
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
						Preferencial
					</td>
					<td> " ;if ($row['preferencial']=='1')
						   {
							    echo " Preferencial: SI <br />";
						   }else
						   {
							   echo "Preferencial: NO <br />";
						   }echo "</td>
				</tr>
					<tr>
					<td>
						Correo electrónico
					</td>
					<td> ".$row['correo']."</td>
				</tr>
					<tr>
					<td>
						Fecha de cita
					</td>
					<td> ".$row['fecha']."</td>
				</tr>
				</table></div>";
				
			   echo "<a class='btn btn-danger'  href='generar.php?codigo=".$_POST['codigo']."' role='button'>Generar turno</a>
				 ";
			}
	 	?>
		<script src="js/jquery.js" ></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
