<?php
	session_start();
	if(isset($_SESSION['username']) && ($_SESSION['rol']=="admin")){

	$auth="ok";
	}
	else
	{
		
		echo"<script>location.href='index.php';</script>";
	}
	include("conexion.php");
	$con=mysqli_connect($host, $user, $pw) or die ("error1");
	mysqli_select_db($con,$db)or die ("error2");
	 	$query = "SELECT nombre,identificacion,especialidad,motivo,eps,preferencial,correo,codigo,fecha,turno FROM turnosasignados";
			$result = mysqli_query($con,$query)or die("fail query1");
		 	 $numero = 0;
		 $query2 = "SELECT nombre,identificacion,especialidad,motivo,eps,preferencial,correo,codigo,fecha,turno,obs,atendio FROM turnosatendidos ";
		$result2 = mysqli_query($con,$query2)or die("fail query2");
	 	 $numero2 = 0;
	?>  
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilo.css">
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
		<center>
		<div class="container">	
					<button class="btn btn-success btn-lg" type="submit" onclick="mostrar()">Turnos Pendientes</button>
					<button class="btn btn-success btn-lg" type="submit" onclick="mostrar1()">Turnos Atendidos</button>
		</div>


		<div class="container" id="tabla" style="display: none">	
			<div class="container">
			        <h1 align="center">Lista de Turnos en espera</h1>   
			</div>
			<div class="table-responsive" >
					    <table class="table table-hover table-border">
									<tr>
										<th class="active">Nombre</th>
										<th class="active">Identificacion</th>
										<th class="active">Especialidad</th>
										<th class="active">Motivo </th>
										<th class="active">EPS</th>
										<th class="active">Preferencial</th>
										<th class="active">Correo electronico</th>
										<th class="active">Fecha</th>
										<th class="active">Codigo</th>
										<th class="active">Turno</th>
										<th class="active">Estado</th>
									</tr>
									<?php
										while($row = mysqli_fetch_array($result))
										{
											echo "<tr><td>" .
										       $row['nombre'] . "</td>";
										       echo "<td>" .
										       $row['identificacion'] . "</td>";
										    echo "<td>" .
										       $row['especialidad'] . "</td>";
										       echo "<td>" .
										       $row['motivo'] . "</td>";
										    echo "<td>" .
												$row['eps']."</td>";
											echo "<td>" .
										       $row['preferencial']. "</td>";
										     echo "<td>" .
										       $row['correo'] . "</td>";
										    echo "<td>" .
										       $row['fecha'] . "</td>";
										    echo "<td>" .
												$row['codigo']."</td>";
											echo "<td>" .
										       $row['turno']. "</td>";
										    echo "<td>" .
										       $row['estado'] . "</td></tr>";
										       $numero++;
										} echo "<tr><td colspan='15'><font face='verdana'><b>Total:  " . $numero .
					       				"</b></font></td></tr>";mysqli_free_result($result);
									   //mysqli_close($con);
									?>
						</table>
			</div>
		</div>

		<div class="container" id="tabla2" style="display: none">	
			<div class="container">
			    <h1 align="center">Listado de Turnos Atendidos</h1>
			</div>
			<div class="table-responsive" >
					    <table class="table table-hover table-border">
									<tr>
										<th class="active">Nombre</th>
										<th class="active">Identificacion</th>
										<th class="active">Especialidad</th>
										<th class="active">Motivo </th>
										<th class="active">EPS</th>
										<th class="active">Preferencial</th>
										<th class="active">Correo electronico</th>
										<th class="active">Fecha</th>
										<th class="active">Codigo</th>
										<th class="active">Turno</th>
										<th class="active">Observaciones</th>
										<th class="active">Med Asignado</th>
									</tr>
									<?php
										while($row2 = mysqli_fetch_array($result2))
										{
											echo "<tr><td>" .
										       $row2['nombre'] . "</td>";
										       echo "<td>" .
										       $row2['identificacion'] . "</td>";
										    echo "<td>" .
										       $row2['especialidad'] . "</td>";
										       echo "<td>" .
										       $row2['motivo'] . "</td>";
										    echo "<td>" .
												$row2['eps']."</td>";
											echo "<td>" .
										       $row2['preferencial']. "</td>";
										     echo "<td>" .
										       $row2['correo'] . "</td>";
										    echo "<td>" .
										       $row2['fecha'] . "</td>";
										    echo "<td>" .
												$row2['codigo']."</td>";
											echo "<td>" .
										       $row2['turno']. "</td>";
										    echo "<td>" .
										       $row2['obs'] . "</td>";
										       echo "<td>" .
										       $row2['atendio'] . "</td></tr>";
										       $numero2++;
										} echo "<tr><td colspan='15'><font face='verdana'><b>Total:  " . $numero2 .
					       "</b></font></td></tr>";mysqli_free_result($result2);
									   mysqli_close($con);
										?>
						</table>
			</div>
		</div>


		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			function mostrar(){
				document.getElementById('tabla').style="display:block";
				document.getElementById('tabla2').style="display:none";}
				//alert("funcion1");
			function mostrar1(){
				document.getElementById('tabla2').style="display:block";
				document.getElementById('tabla').style="display:none";}/*alert("funcion2");*/
		</script>
		</center>
	</body>
</html>