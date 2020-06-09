<?php 
session_start();
require('php/conexion.php');

if(!empty($_POST['correo']) && !empty($_POST['pass'])){
	$correoUsuario=$_POST['correo'];
	$passUsuario=$_POST['pass'];
	if($result1=$conn->query("SELECT count(*) FROM cuenta_principal WHERE correo='$correoUsuario' AND password='$passUsuario'")){
		foreach($result1 as $r1){
			$cantidad=$r1[0];
			if($cantidad>0){
				$_SESSION['correo']=$correoUsuario;
				$_SESSION['pass']=$passUsuario;
				//session_start();
				header('location: inicioSesion.php');
			}
		}
		
		
	}
	
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>CINEMA</title>
	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="css/estilos.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/x-icon" href="resurce/ICONO_CINEMA.ico"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
</head>
<body>
	<header style="background-color: #ee2b47;">
		<div class="container">
			<div class="row">
				<div class="col-2">
					<p><br><a href="index.php"><img src="resurce/LOGO_CINEMA.png" width="100%" height="100%"></a></p>
				</div>
				<div class="col-7">
				</div>
				<div class="col-3">
					<span class="float-right">
						<br>
						<div class="container-fluid">
							<div class="container-fluid">
								<a href="registro.php" class="btn btn-secondary" style="background-color: #2c2e3e;">Crear cuenta</a><br><br>
								<button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="false" data-offset="10,20" style="background-color: #2c2e3e;">
									Iniciar sesión
								</button>
								
								
								<form class="dropdown-menu p-4" method="POST"  id="formulario_registro" >
									<div class="form-group">
										<label for="exampleDropdownFormEmail2">Correo: </label>
										<input type="email" class="form-control" id="correo" placeholder="correo@ejemplo.com" required name="correo">
									</div>
									<div id="checarUsuario"></div>
									<div class="form-group">
										<label for="exampleDropdownFormPassword2">Contraseña: </label>
										<input type="password" class="form-control" id="pass" placeholder="Contraseña" required minlength="6" name="pass">
									</div>
									<div id="checarPass" class=""></div>
									<div class="form-group">
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="dropdownCheck2">
											<label class="form-check-label" for="dropdownCheck2">
												Recuerdame
											</label>
										</div>
									</div>
									<button type="submit" class="btn btn-secondary" style="background-color: #2c2e3e;" id="submitInicioSesion">Iniciar</button>
								</form>
							</div>							
						</div>
						<br>
					</span>
				</div>
			</div>
		</div>
	</header>
	<br><br>
	<section style="background-color: #34374c;">
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<center>
						<img src="resurce/cartelera/1.jpg" class="d-block w-75" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<center><h5>Bienvenido a</h5></center>
							<p><center><img src="resurce/LOGO_CINEMA.png" class="d-block w-25" alt="..."></center></p>
						</div>
					</center>
				</div>
				<div class="carousel-item">
					<center>
						<img src="resurce/cartelera/2.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<center><h5>Bienvenido a</h5></center>
							<p><center><img src="resurce/LOGO_CINEMA.png" class="d-block w-25" alt="..."></center></p>
						</div>
					</center>
				</div>
				<div class="carousel-item">
					<center>
						<img src="resurce/cartelera/3.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<center><h5>Bienvenido a</h5></center>
							<p><center><img src="resurce/LOGO_CINEMA.png" class="d-block w-25" alt="..."></center></p>
						</div>
					</center>
				</div>
				<div class="carousel-item">
					<center>
						<img src="resurce/cartelera/4.jpg" class="d-block w-75" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<center><h5>Bienvenido a</h5></center>
							<p><center><img src="resurce/LOGO_CINEMA.png" class="d-block w-25" alt="..."></center></p>
						</div>
					</center>
				</div>
			</div>
		</div>
	</section>
	

<br><br><br>


	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>