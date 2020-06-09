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

if(!empty($_POST['registro_nombre'])){
    $nombreRegistro=$_POST['registro_nombre'];
    $correRegistro=$_POST['registro_correo'];
    $passRegistro=$_POST['registro_pass1'];
    $idiomaRegistro=$_POST['idioma'];
    $paqueteRegistro=$_POST['paquete'];
    $clasificacionRegistro="D";
    $imagenRegistro=rand(1,9);
    $noPerfilesRegistro=$_POST['paquete'];
    $idRegistro="0";

    $result2=$conn->query("INSERT INTO cuenta_principal (idPrincipal,correo,password,nombre,idioma,clasificacion,imagen,noPerfiles) VALUES ('$idRegistro','$correRegistro','$passRegistro','$nombreRegistro','$idiomaRegistro','$clasificacionRegistro','$imagenRegistro','$noPerfilesRegistro')");
    $result3=$conn->query("SELECT idPrincipal FROM cuenta_principal where correo='$correRegistro'");
    foreach($result3 as $r3){
        $idNuevo=$r3['idPrincipal'];
    }
    $result4=$conn->query("INSERT INTO cuenta_familiar (idPerfil,nombre,idioma,clasificacion,imagen,idPrincipal) VALUES ('$idRegistro','$nombreRegistro','$idiomaRegistro','$clasificacionRegistro','$imagenRegistro','$idNuevo')");
    header('location: index.php');
}

?>


<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>CINEMA</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="resurce/ICONO_CINEMA.ico" />
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
                        <br><br>
                        <div class="container-fluid">
                            <div class="container-fluid">
                                <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    data-offset="10,20" style="background-color: #2c2e3e;">
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
    <br><br><br>

    <div class="container rounded p-5 formularioRegistro col-6" style="background-color: #ee2b47;">
        <form method="POST" id="formulario_registro" >
            <div class="form-row">
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Nombre</label>
                    <input type="text" class="form-control" id="registro_nombre" name="registro_nombre" placeholder="Nombre" required><br>
                    <div id="resultado_registro_nombre" name="resultado_registro_nombre" class=""></div>
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Correo</label>
                    <input type="email" class="form-control" id="registro_correo" name="registro_correo" placeholder="Email" required>
                    <div id="resultado_registro_correo" name="resultado_registro_correo" class=""></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Contraseña</label>
                    <input type="password" class="form-control" id="registro_pass1" name="registro_pass1" placeholder="Contraseña" required>
                    <div id="resultado_registro_pass1" name="resultado_registro_pass1" class=""></div>
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="registro_pass2" name="registro_pass2" placeholder="Contraseña" required>
                    <div id="resultado_registro_pass2" name="resultado_registro_pass2" class=""></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4">
                    <label for="inputState">Idioma Principal</label>
                    <select id="inputState" name="idioma" class="form-control" required>
                        <option value="">Seleccione su idioma...</option>
                        <option value="es">Español</option>
                        <option value="eu">English</option>
                    </select>
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4">
                    <label for="inputState">Tipo De Paquete</label>
                    <select id="inputState" name="paquete" class="form-control" required>
                        <option value="">Seleccione paquete...</option>
                        <option value="1">Individual</option>
                        <option value="2">En Pareja</option>
                        <option value="4">Familiar</option>
                        <option value="5">Extra-Familiar</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-1"></div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" required>
                    <label class="form-check-label" for="gridCheck">Acepto las condiciones de uso</label>
                </div>
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary" style="background-color: #2c2e3e;" id="submitRegistroCuenta">Registrarse</button>
                </div>
            </div>
            
        </form>
    <div>
    <br><br>

    <script src="js/jquery.min.js"></script>

    <script type="text/javascript">

		$(document).ready(function(){
			$("#registro_correo").keyup(correoDisponible);
		});
		$(document).ready(function(){
			$("#registro_pass1").keyup(longitudPass1);
        });
        $(document).ready(function(){
			$("#registro_pass2").keyup(verificar2);
        });
        $(document).ready(function(){
			$("#registro_nombre").keyup(nombreDisponibleRegistro);
        });
        

		function longitudPass1(){
			var pass=document.getElementById('registro_pass1').value;
			var longitudPassword=pass.length;
			if(longitudPassword<6){
				document.getElementById('resultado_registro_pass1').innerHTML="Contraseña demasiado corta";
				document.getElementById("resultado_registro_pass1").setAttribute("class","alert alert-warning");
				document.getElementById("submitRegistroCuenta").disabled=true;
			}
			else if(longitudPassword>15){
				document.getElementById("resultado_registro_pass1").style.display="block";
				document.getElementById('resultado_registro_pass1').innerHTML="Contraseña demasiado larga, (maximo 15 caractereres)";
				document.getElementById("resultado_registro_pass1").setAttribute("class","alert alert-warning");
				document.getElementById("submitRegistroCuenta").disabled=true;
			}
			else{
				document.getElementById("resultado_registro_pass1").style.display="block";
                document.getElementById('resultado_registro_pass1').innerHTML="Contraseña adecuada :)";
				document.getElementById("resultado_registro_pass1").setAttribute("class","alert alert-success");
				document.getElementById("submitRegistroCuenta").disabled=false;
			}
        }
        function verificar2(){
            var pass1=document.getElementById('registro_pass1').value;
            var pass2=document.getElementById('registro_pass2').value;
			if(pass1 != pass2){
				document.getElementById('resultado_registro_pass2').innerHTML="Contraseñas no coinciden :(";
				document.getElementById("resultado_registro_pass2").setAttribute("class","alert alert-warning");
				document.getElementById("submitRegistroCuenta").disabled=true;
			}
			else{
				document.getElementById("resultado_registro_pass2").style.display="none";
                document.getElementById("resultado_registro_pass2").removeAttribute("class");
				document.getElementById("submitRegistroCuenta").disabled=false;
			}
		}

		function correoDisponible(){
			var correo=document.getElementById('registro_correo').value;
			var xhttp= new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
				if (xhttp.readyState==4 && xhttp.status=='200') {
					document.getElementById("resultado_registro_correo").innerHTML=xhttp.responseText;
					var respuestaUsuario=document.getElementById("resultado_registro_correo").value;
				}
			};
			xhttp.open("GET","php/consultasAjax.php?correoRegistro="+correo,true);
			xhttp.send(null);
		}
        function nombreDisponibleRegistro(){
			var nombre=document.getElementById('registro_nombre').value;
            
			var xhttp= new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
				if (xhttp.readyState==4 && xhttp.status=='200') {
					document.getElementById("resultado_registro_nombre").innerHTML=xhttp.responseText;
					var respuestaUsuario=document.getElementById("resultado_registro_nombre").value;
				}
			};
			xhttp.open("GET","php/consultasAjax2.php?nombreRegistro="+nombre,true);
			xhttp.send(null);
		}
		
	</script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

            <!-- JS, Popper.js, and jQuery -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                crossorigin="anonymous"></script>
</body>

</html>