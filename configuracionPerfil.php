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
}

if(!empty($_POST['idiomaId'])){
    $nombrePerfil=$_POST['registro_perfil_nombre'];
    $idiomaPerfil=$_POST['idiomaId'];
    $imagenPerfil=$_POST['imagenId'];
    $clasificacionPerfil=$_POST['clasificacionId'];
    if($tipoCuenta=="0"){
        $result4=$conn->query("UPDATE cuenta_familiar set nombre='$nombrePerfil', idioma='$idiomaPerfil', clasificacion='$clasificacionPerfil', imagen='$imagenPerfil' where idPrincipal='$idPrincipal' and nombre='$nombrePrincipal'");
        $result4=$conn->query("UPDATE cuenta_principal set nombre='$nombrePerfil', idioma='$idiomaPerfil', clasificacion='$clasificacionPerfil', imagen='$imagenPerfil' where idPrincipal='$idPrincipal'");
        header('location: inicioSesion.php');
    }
    else{
        $result4=$conn->query("UPDATE cuenta_familiar set nombre='$nombrePerfil', idioma='$idiomaPerfil', clasificacion='$clasificacionPerfil', imagen='$imagenPerfil' where idPrincipal='$idPrincipal' and idPerfil='$idCuenta'");
        header('location: inicioSesion.php');
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
                <div class="col-8">
                </div>
                <div class="col">
                </div>
            </div>
        </div>
    </header>
    <br><br><br>

    <div class="container rounded p-5 formularioRegistro" style="background-color: #ee2b47;">
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Nombre de perfil</label>
                    <input type="text" class="form-control" id="registro_perfil_nombre"  name="registro_perfil_nombre" placeholder="Nombre" required>
                    <div id="resultado_registro_perfil_nombre" name="resultado_registro_perfil_nombre" class=""></div>
                    <?php 
                        echo "<input type='hidden' id='aux' name='aux' value='".$idPrincipal."' />";
                    ?>
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-3">
                    <label for="inputState">Idioma</label>
                    <select id="idiomaId" name="idiomaId" class="form-control" required>
                        <option value="">Seleccione su idioma...</option>
                        <option value="es">Español</option>
                        <option value="eu">English</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">
                    <label for="inputState">Clasificación</label>
                    <select id="clasificacionId" name="clasificacionId" class="form-control" required>
                        <option value="">Seleccione su clasificación...</option>
                        <option value="A">A</option>
                        <option value="AA">AA</option>
                        <option value="B">B</option>
                        <option value="B15">B15</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-3">
                    <label for="inputState">Seleccione imagen de perfil</label>
                    <select id="imagenId" name="imagenId" class="form-control" required onchange="cargarFoto();">
                        <option value="">Seleccione su imagen...</option>
                        <option value="1">Imagen 1</option>
                        <option value="2">Imagen 2</option>
                        <option value="3">Imagen 3</option>
                        <option value="4">Imagen 4</option>
                        <option value="5">Imagen 5</option>
                        <option value="6">Imagen 6</option>
                        <option value="7">Imagen 7</option>
                        <option value="8">Imagen 8</option>
                        <option value="9">Imagen 9</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">
                    
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4">
                    <img id="imgSalida" />
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-1">
                    <button type="submit" class="btn btn-primary" style="background-color: #2c2e3e;">Actualizar</button>
                </div>
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-1">
                    <?php echo "<a class='btn btn-primary' style='background-color: #2c2e3e;' href='perfil.php?idCuenta=".$idCuenta."&tipo=".$tipoCuenta."'>Cancelar</a>"?>
                    
                </div>
            </div>
            
        </form>
        <div>

        <script type="text/javascript">
            function cargarFoto(){
                var cod=document.getElementById("imagenId").value;
                if (cod) {
                    var file1="resurce/perfiles/perfil";
                    var file2=".jpg";
                    var file3=file1.concat(cod);
                    var file4=file3.concat(file2);
                    document.getElementById("imgSalida").setAttribute("src",file4);
                    document.getElementById("imgSalida").setAttribute("width","100");
                    document.getElementById("imgSalida").setAttribute("height","100");
                }
            }


            $(document).ready(function(){
			$("#registro_perfil_nombre").keyup(nombreDisponible);
		});
        
		function nombreDisponible(){
			var nombre=document.getElementById('registro_perfil_nombre').value;
            var nombreCuenta=document.getElementById('aux').value;
			var xhttp= new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
				if (xhttp.readyState==4 && xhttp.status=='200') {
					document.getElementById("resultado_registro_perfil_nombre").innerHTML=xhttp.responseText;
					var respuestaUsuario=document.getElementById("resultado_registro_perfil_nombre").value;
				}
			};
			xhttp.open("GET","php/consultasAjax3.php?nombrePerfil="+nombre+"&nombreCuenta="+nombreCuenta,true);
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