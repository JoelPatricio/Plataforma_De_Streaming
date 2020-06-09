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
    $idEliminar=$_GET['idCuenta'];
    $result5=$conn->query("DELETE from cuenta_familiar where idPrincipal='$idPrincipal' and idPerfil='$idEliminar'");
    header('location: inicioSesion.php');
}

if(isset($_POST['registro_correo'])){
    $_SESSION['correo']=$_POST['registro_correo'];
	$_SESSION['pass']=$_POST['registro_correo'];
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
    <br><br><br>

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8"></div>
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #ee2b47;">
                        Opciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="nuevoUsuario.php">Nuevo perfil</a>
                        <a class="dropdown-item" href="configuracionPrincipal.php">Configurar cuenta</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php">Salir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div>
        <h1 class="text-white text-center">Bienvenido al mundo del cine</h1>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5 p-5 m-5">

        <div class='col mb-5'>
            <div class='card shadow-lg'>
                <div class='card-body'>
                    <?php 
                    echo "<img src='resurce/perfiles/perfil".$imagenPrincipal.".jpg' class='card-img-top'>"; 
                    echo "<center><h2 class='h4  mb-1'>".$nombrePrincipal."</h2></center>";
                    if($idiomaPrincipal=="es"){
                        echo "<p class='my-0'>Idioma: Español <span><img src='resurce/idioma/españa.jpg' width='10%' height='10%'></span> </p><br>";
                    }
                    else{
                        echo "<p class='my-0'>Idioma: Ingles <span><img src='resurce/idioma/ingles.jpg' width='10%' height='10%'></span> </p><br>";
                    }
                    if($clasificacionPrincipal=="C" || $clasificacionPrincipal=="D"){
                        echo "<p>Clasificación: <span class='badge badge-danger mt-0 mb-2'>".$clasificacionPrincipal."</span></p>";
                    }
                    else if($clasificacionPrincipal=="B" || $clasificacionPrincipal=="B15"){
                        echo "<p>Clasificación: <span class='badge badge-warning mt-0 mb-2'>".$clasificacionPrincipal."</span></p>";
                    }
                    else{
                        echo "<p>Clasificación: <span class='badge badge-success mt-0 mb-2'>".$clasificacionPrincipal."</span></p>";
                    }                    
                    echo "<a href='perfil.php?idCuenta=".$idPrincipal."&tipo=0' class='btn btn-outline-info btn-block'>Ingresar al perfil</a>";
                    ?>
                </div>
            </div>
        </div>
        <?php
            $result3=$conn->query("SELECT count(*) from cuenta_familiar where idPrincipal='$idPrincipal' and nombre<>'$nombrePrincipal'");
            foreach($result3 as $r3){
                if($r3[0]>0){
                    $result4=$conn->query("SELECT * from cuenta_familiar where idPrincipal='$idPrincipal' and nombre<>'$nombrePrincipal'");
                    foreach($result4 as $r4){
                        $idPerfil=$r4['idPerfil'];
                        $nombrePerfil=$r4['nombre'];
                        $idiomaPerfil=$r4['idioma'];
                        $clasificacionPerfil=$r4['clasificacion'];
                        $imagenPerfil=$r4['imagen'];

                        echo "<div class='col mb-5'>";
                            echo "<div class='card shadow-lg'>";
                                echo "<div class='card-body'>";                                    
                                    echo "<img src='resurce/perfiles/perfil".$imagenPerfil.".jpg' class='card-img-top'>"; 
                                    echo "<center><h2 class='h4  mb-1'>".$nombrePerfil."</h2></center>";
                                    if($idiomaPerfil=="es"){
                                        echo "<p class='my-0'>Idioma: Español <span><img src='resurce/idioma/españa.jpg' width='10%'                height='10%'></span> </p><br>";
                                    }
                                    else{
                                        echo "<p class='my-0'>Idioma: Ingles <span><img src='resurce/idioma/ingles.jpg' width='10%'                 height='10%'></span> </p><br>";
                                    }
                                    if($clasificacionPerfil=="C" || $clasificacionPerfil=="D"){
                                        echo "<p>Clasificación: <span class='badge badge-danger mt-0 mb-2'>".$clasificacionPerfil."              </span></p>";
                                    }
                                    else if($clasificacionPerfil=="B" || $clasificacionPerfil=="B15"){
                                        echo "<p>Clasificación: <span class='badge badge-warning mt-0 mb-2'>".$clasificacionPerfil."             </span></p>";
                                    }
                                    else{
                                        echo "<p>Clasificación: <span class='badge badge-success mt-0 mb-2'>".$clasificacionPerfil."             </span></p>";
                                    }                    
                                        
                                        echo "<div class='col'>";
                                            echo "<a href='perfil.php?idCuenta=".$idPerfil."&tipo=1' class='btn btn-outline-info btn-block'>Ingresar al perfil</a>";
                                            echo "<a href='inicioSesion.php?idCuenta=".$idPerfil."' class='btn btn-outline-danger btn-block'>Eliminar perfil</a>";
                                        echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    }
                }
            }
        ?>
    </div>





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