<?php
include("conexion.php");
session_start();

if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pw']) && !empty($_POST['pw']) )
{
	$con=mysqli_connect($host, $user, $pw) or die ("error1");
	mysqli_select_db($con,$db)or die ("error2");
	$us=$_POST['user'];
	$query="SELECT * FROM users WHERE usuario='$us'";
	//echo $query;
	$sel= mysqli_query($con,$query);


	$session=mysqli_fetch_array($sel);

	if($_POST['pw']== $session['contrasena'] && $session['estado'] == 1){
		$_SESSION['username'] = $_POST['user'];
		$_SESSION['name'] = $session['nombre'];
		$_SESSION['especiali'] = $session['id_user'];
		$_SESSION['rol'] = "";
		$_SESSION['cons'] = "";
		
		$col = explode(";",$session['rol']);
		$i= count($col);
		//echo $i;
		/*for($a=1;$a<=$i;$a++){
			$rol="rol".$a
			 ($rol.$a)=	$col[$a];
			
		}
	echo $rol2;
		$rol1=$col[0];
		$rol2=$col[1];
		$rol3=$col[2];*/
		
	}
	else{
		
		echo"<script>alert('Error al ingresar el usuario y la contraseña');</script>";
		echo"<script>location.href='index.php';</script>";
		}
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
					<h1>Bienvenid@ <?php echo $_SESSION['name'] ?></h1>
				</div>
				<div class="col-xm-12 ">
			
					<a class="btn btn-danger" href="cerrar.php" role="button">Cerrar Sesión</a>
				</div>
				
			</div>
				</br>

		</div>
	</header>
<body>

	<div class="container">
		<h1>Elija rol con el cual desea ingresar:</h1>
<form action="#" method="post" class="" id='form'>
	<div class="input-group">
	<select name="rol" id="rol" class="form-control">
	<option value='0'>Seleccione....</option>
	<?php
	foreach ($col as &$valor) {
    echo "<option value='".$valor."'>".$valor."</option>";
}
	
	?>
</select>
<label for="">Consultorio: </label>
	<input  class="form-control" type="text" placeholder="Solo Aplica para medicos" id="cons" required>
	
</div></br><input type="submit" value="Ingresar" name="submitted" class="btn btn-success">
</form>
</div>
	<script src="js/redireccion.js"></script>
	<script
			  src="http://code.jquery.com/jquery-3.4.0.min.js"
			  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
			  crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

