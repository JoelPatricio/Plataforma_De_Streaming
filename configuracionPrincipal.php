<?php
session_start();
require('php/conexion.php');

if(!$_SESSION['correo'] && !$_SESSION['pass']){
    header('location: index.php');
}
else{
    $correo=$_SESSION['correo'];
    $pass=$_SESSION['pass'];
    $result1=$conn->query("SELECT * FROM cuenta_principal WHERE correo='$correo' AND password='$pass'");
    foreach($result1 as $r1){
			$idPrincipal=$r1['idPrincipal'];
    }
    $result2=$conn->query("SELECT * FROM cuenta_principal WHERE idPrincipal='$idPrincipal'");
    foreach($result2 as $r2){
        $nombrePrincipal=$r2['nombre'];
        $idiomaPrincipal=$r2['idioma'];
        $clasificacionPrincipal=$r2['clasificacion'];
        $imagenPrincipal=$r2['imagen'];
        $noPerfilesPrincipal=$r2['noPerfiles'];
    }
}
if(!empty($_POST['registro_correo']) ){
    $correnoNuevo=$_POST['registro_correo'];
    $idiomaNuevo=$_POST['idiomaNuevo'];
    $registro_pass1=$_POST['registro_pass1'];
    $result3=$conn->query("UPDATE cuenta_principal set correo='$correnoNuevo', password='$registro_pass1', idioma='$idiomaNuevo' where idPrincipal='$idPrincipal'");
    $_SESSION['correo']=$correnoNuevo;
	$_SESSION['pass']=$registro_pass1;
    header('location: inicioSesion.php');
}

?>

<!DOCTYPE html>
<html>

<head>
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
                <div class="col">
                    <p><br><img src="resurce/LOGO_CINEMA.png" width="100%" height="100%"></p>
                </div>
                <div class="col-8">
                </div>
                <div class="col">
                </div>
            </div>
        </div>
    </header>
    <br><br><br>

    <div class="container rounded p-5 formularioRegistro col-6" style="background-color: #ee2b47;">
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Correo</label>
                    <input type="email" class="form-control" id="registro_correo" name="registro_correo" placeholder="Email" required>
                    <div id="resultado_registro_correo" name="resultado_registro_correo" class=""></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-4">
                    <label for="inputState">Idioma Principal</label>
                    <select id="idiomaNuevo" class="form-control" name="idiomaNuevo" required>
                        <option value="">Seleccione su idioma...</option>
                        <option value="es">Español</option>
                        <option value="eu">English</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-3">
                    <label for="exampleDropdownFormPassword2">Contraseña Nueva: </label>
					<input type="password" class="form-control" id="registro_pass1" name="registro_pass1" placeholder="Contraseña Nueva" required>
                    <div id="resultado_registro_pass1" name="resultado_registro_pass1" class=""></div>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-1">
                    <button type="submit" class="btn btn-primary" style="background-color: #2c2e3e;" id="submitRegistroCuenta">Actualizar</button>
                </div>
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-1">
                    <a href="inicioSesion.php" class="btn btn-primary" style="background-color: #2c2e3e;">Cancelar</a>
                </div>
            </div>
            
        </form>
        <div>

            <script type="text/javascript">

		$(document).ready(function(){
			$("#registro_correo").keyup(correoDisponible);
		});
		$(document).ready(function(){
			$("#registro_pass1").keyup(longitudPass1);
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
                document.getElementById('resultado_registro_pass1').innerHTML="Contraseña adecuada :)";
				document.getElementById("resultado_registro_pass1").setAttribute("class","alert alert-success");
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
	</script>


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