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

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $tipo=$_GET['tipo'];
    $result3=$conn->query("SELECT * FROM entretenimiento where id='$id' and tipo='$tipo'");
    foreach($result3 as $r3){
        $nombre=$r3['nombre'];
        $genero=$r3['genero'];
        $clasificacion=$r3['clasificacion'];
        $calificacion=$r3['calificacion'];
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
    <br><br>

    <div class="container" style="background-color: #2c2e3e;">
            <div class="row">
                <div class="col-11"></div>
                <div class="col">
                    <?php echo "<a class='btn btn-primary' style='background-color: #2c2e3e;' href='inicioSesion.php'>Regresar</a>"?>
                </div>
            </div>
    </div><br>
        

    <div class="container">
        <div class="row">
            <div class="col">
            </div>
            <div class="col-7">
                <center>
                    <div class="container rounded formularioRegistro" style="background-color: #ee2b47;">
                        <br>
                        <p aling="center m-2">
                            <?php echo "<img src='resurce/cartelera/".$tipo."/".$id.".jpg' width='25%' height='25%'>"; ?>
                        </p>
                        <h1 class='h1 font-weight-light mb-1'><?php echo $nombre ?></h1>
                        <p class='my-0'>Genero: <?php echo $genero?></p><br>
                        <?php
                        if($clasificacion=="A" || $clasificacion=="AA")
                            echo "<p>Clasificación: <span class='badge badge-success mt-0 mb-0'>".$clasificacion."</span></p>";
                        else if($clasificacion=="B" || $clasificacion=="B15")
                            echo "<p>Clasificación: <span class='badge badge-warning mt-0 mb-0'>".$clasificacion."</span></p>";
                        else
                            echo "<p>Clasificación: <span class='badge badge-danger mt-0 mb-0'>".$clasificacion."</span></p>";
                        $auxEstrellas="";
                        for($i=0; $i<$calificacion; $i++){
                            $auxEstrellas.="★";
                        }
                        echo "<p>Calificacion: <label>".$auxEstrellas."</label></p>";
                        ?>
                        <br>
                    </div>
                </center>
            </div>
            <div class="col">
            </div>
        </div>
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