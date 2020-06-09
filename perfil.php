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

if(isset($_GET['idCuenta'])){
    $idCuenta=$_GET['idCuenta'];
    $tipoCuenta=$_GET['tipo'];
    if($tipoCuenta=="0"){
        $result3=$conn->query("SELECT * FROM cuenta_principal where idPrincipal='$idCuenta'");
        foreach($result3 as $r3){
            $nombrePerfil=$r3['nombre'];
            $idiomaPerfil=$r3['idioma'];
            $clasificacionPerfil=$r3['clasificacion'];
        }
    }
    else{
        $result3=$conn->query("SELECT * FROM cuenta_familiar where idPerfil='$idCuenta'");
        foreach($result3 as $r3){
            $nombrePerfil=$r3['nombre'];
            $idiomaPerfil=$r3['idioma'];
            $clasificacionPerfil=$r3['clasificacion'];
            
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
                <div class="col-8"></div>
                <div class="col"></div>
            </div>
        </div>
    </header>
    <br><br>
    
    <div class="container">
        <div class="row">
            <div class="col-11">
                <p class="text-white text-center display-4 h4">Bienvenido <span class="text-uppercase"><?php echo $nombrePerfil?></span>, ¿Que veremos hoy?</p>
            </div>
            <div class="col"></div>
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #ee2b47;">
                        Opciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="inicioSesion.php">Cambiar de perfil</a>
                        <?php echo "<a class='dropdown-item' href='configuracionPerfil.php?idCuenta=".$idCuenta."&tipo=".$tipoCuenta."'>Configuración de perfil</a>"?>
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php">Salir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container rounded formularioRegistro p-0" style="background-color: #2c2e3e;">
        <form method="POST">
            <div class="row">
                <div class="col-3"></div>
                <div class="col">
                    <!-- Search form -->
                    <input class="form-control" type="text" placeholder="Buscar Pelicula, Series o Generos" aria-label="Search" id="busquedaCatalogo" name="busquedaCatalogo">
                    <?php 
                        echo "<input type='hidden' id='classi' name='classi' value='".$clasificacionPerfil."' />";
                    ?>
                </div>
                <div class="col-3"></div>
            </div>
        </form>
    </div><br><br>
    
    <div id="contenidoCatalogo" name="contenidoCatalogo">

    </div>

    <script type="text/javascript">
        $(document).ready(function(){
			$("#busquedaCatalogo").keyup(nombreDisponible);
		});
        
		function nombreDisponible(){
			var busqueda=document.getElementById('busquedaCatalogo').value;
            var clasificacion=document.getElementById('classi').value;
			var xhttp= new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
				if (xhttp.readyState==4 && xhttp.status=='200') {
					document.getElementById("contenidoCatalogo").innerHTML=xhttp.responseText;
					var respuestaUsuario=document.getElementById("contenidoCatalogo").value;
				}
			};
			xhttp.open("GET","php/consultaAjax5.php?busqueda="+busqueda+"&clasificacion="+clasificacion,true);
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