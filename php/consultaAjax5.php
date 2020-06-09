<?php 
require('conexion.php');
header('Content-Type: text/txt; charset=UTF-8');
if($_REQUEST['busqueda']){
    $busqueda=$_GET['busqueda'];
    $clasificacion=$_GET['clasificacion'];
	try {
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $busquedaLike="%".$busqueda."%";
            //echo $busquedaLike."<br>";
            if($clasificacion=="D"){
                $result1=$conn->query("SELECT count(*) from entretenimiento where nombre like '$busquedaLike' or genero like '$busquedaLike'");
			    foreach($result1 as $r1){
				    $Nencontrados=$r1[0];
			    }
            }
            else if($clasificacion=="C"){
                $result1=$conn->query("SELECT count(*) from entretenimiento where (nombre like '$busquedaLike' or genero like '$busquedaLike') and clasificacion<>'D'");
			    foreach($result1 as $r1){
				    $Nencontrados=$r1[0];
			    }
            }
            else if($clasificacion=="B15"){
                $result1=$conn->query("SELECT count(*) from entretenimiento where (nombre like '$busquedaLike' or genero like '$busquedaLike') and clasificacion<>'D' and clasificacion<>'C'");
			    foreach($result1 as $r1){
				    $Nencontrados=$r1[0];
			    }
            }
            else if($clasificacion=="B"){
                $result1=$conn->query("SELECT count(*) from entretenimiento where (nombre like '$busquedaLike' or genero like '$busquedaLike') and clasificacion<>'D' and clasificacion<>'C' and clasificacion<>'B15'");
			    foreach($result1 as $r1){
				    $Nencontrados=$r1[0];
			    }
            }
            else if($clasificacion=="A"){
                $result1=$conn->query("SELECT count(*) from entretenimiento where (nombre like '$busquedaLike' or genero like '$busquedaLike') and clasificacion<>'D' and clasificacion<>'C' and clasificacion<>'B15' and clasificacion<>'B'");
			    foreach($result1 as $r1){
				    $Nencontrados=$r1[0];
			    }
            }
            else{
                $result1=$conn->query("SELECT count(*) from entretenimiento where (nombre like '$busquedaLike' or genero like '$busquedaLike') and clasificacion<>'D' and clasificacion<>'C' and clasificacion<>'B15' and clasificacion<>'B' and clasificacion<>'A'");
			    foreach($result1 as $r1){
				    $Nencontrados=$r1[0];
			    }
            }


		} catch (Exception $e) {
			echo "Error: ".$e->getMessage();
		}
	    if($Nencontrados==0){
            echo "<div class='row'>";
                echo "<div class='col-2'></div>";
                echo "<div class='col-8 bg-dark rounded'>";
                    echo "<p class='h2 text-white text-center display-4 '>Huston tenemos un problema<br>No se encontro peliculas o series con: ".$busqueda."</p>";
                 echo "</div>";
                echo "<div class='col-2'></div>";
            echo "</div>";
	    }
	    else{
            echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5 p-5 m-5'>";
                if($clasificacion=="D"){
                    $result2=$conn->query("SELECT * from entretenimiento where nombre like '$busquedaLike' or genero like '$busquedaLike'");
			        foreach($result2 as $r2){
                        $idEntretenimiento=$r2['id'];
                        $nombreEntretenimiento=$r2['nombre'];
                        $clasificacionEntretenimiento=$r2['clasificacion'];
                        $generoEntretenimiento=$r2['genero'];
                        $calificacionEntretenimiento=$r2['calificacion'];
                        $tipoEntretenimiento=$r2['tipo'];
                        echo "<div class='col mb-5'>";
                                echo "<div class='card shadow-lg'>";
                                    echo "<div class='card-body'>";
                                        echo "<img src='resurce/cartelera/".$tipoEntretenimiento."/".$idEntretenimiento.".jpg' class='card-img-top'>";
                                        echo "<center><h2 class='h4 mb-1'>".$nombreEntretenimiento."</h2></center>";
                                        echo "<p class='my-0'>Genero: ".$generoEntretenimiento."</p><br>";
                                        if($clasificacionEntretenimiento=="A" || $clasificacionEntretenimiento=="AA")
                                            echo "<p>Clasificación: <span class='badge badge-success mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";
                                        else if($clasificacionEntretenimiento=="B" || $clasificacionEntretenimiento=="B15")
                                            echo "<p>Clasificación: <span class='badge badge-warning mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";
                                        else
                                            echo "<p>Clasificación: <span class='badge badge-danger mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";

                                        $auxEstrellas="";
                                        for($i=0; $i<$calificacionEntretenimiento; $i++){
                                            $auxEstrellas.="★";
                                        }
                                        echo "<p>Calificacion: <label>".$auxEstrellas."</label></p>";
                                        echo "<a href='detalles.php?id=".$idEntretenimiento."&tipo=".$tipoEntretenimiento."' class='btn btn-outline-info btn-block'>Ver</a>";
                                    echo "</div>";
                                echo "</div>";
                        echo "</div>";
			        }
                }
                else if($clasificacion=="C"){
                    $result2=$conn->query("SELECT * from entretenimiento where (nombre like '$busquedaLike' or genero like '$busquedaLike') and clasificacion<>'D'");
			        foreach($result2 as $r2){
                        $idEntretenimiento=$r2['id'];
                        $nombreEntretenimiento=$r2['nombre'];
                        $clasificacionEntretenimiento=$r2['clasificacion'];
                        $generoEntretenimiento=$r2['genero'];
                        $calificacionEntretenimiento=$r2['calificacion'];
                        $tipoEntretenimiento=$r2['tipo'];
                        echo "<div class='col mb-5'>";
                                echo "<div class='card shadow-lg'>";
                                    echo "<div class='card-body'>";
                                        echo "<img src='resurce/cartelera/".$tipoEntretenimiento."/".$idEntretenimiento.".jpg' class='card-img-top'>";
                                        echo "<center><h2 class='h4 mb-1'>".$nombreEntretenimiento."</h2></center>";
                                        echo "<p class='my-0'>Genero: ".$generoEntretenimiento."</p><br>";
                                        if($clasificacionEntretenimiento=="A" || $clasificacionEntretenimiento=="AA")
                                            echo "<p>Clasificación: <span class='badge badge-success mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";
                                        else if($clasificacionEntretenimiento=="B" || $clasificacionEntretenimiento=="B15")
                                            echo "<p>Clasificación: <span class='badge badge-warning mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";
                                        else
                                            echo "<p>Clasificación: <span class='badge badge-danger mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";

                                        $auxEstrellas="";
                                        for($i=0; $i<$calificacionEntretenimiento; $i++){
                                            $auxEstrellas.="★";
                                        }
                                        echo "<p>Calificacion: <label>".$auxEstrellas."</label></p>";
                                        echo "<a href='detalles.php?id=".$idEntretenimiento."&tipo=".$tipoEntretenimiento."' class='btn btn-outline-info btn-block'>Ver</a>";
                                    echo "</div>";
                                echo "</div>";
                        echo "</div>";
			        }
                }
                else if($clasificacion=="B15"){
                    $result2=$conn->query("SELECT * from entretenimiento where (nombre like '$busquedaLike' or genero like '$busquedaLike') and clasificacion<>'D' and clasificacion<>'C'");
			        foreach($result2 as $r2){
                        $idEntretenimiento=$r2['id'];
                        $nombreEntretenimiento=$r2['nombre'];
                        $clasificacionEntretenimiento=$r2['clasificacion'];
                        $generoEntretenimiento=$r2['genero'];
                        $calificacionEntretenimiento=$r2['calificacion'];
                        $tipoEntretenimiento=$r2['tipo'];
                        echo "<div class='col mb-5'>";
                                echo "<div class='card shadow-lg'>";
                                    echo "<div class='card-body'>";
                                        echo "<img src='resurce/cartelera/".$tipoEntretenimiento."/".$idEntretenimiento.".jpg' class='card-img-top'>";
                                        echo "<center><h2 class='h4 mb-1'>".$nombreEntretenimiento."</h2></center>";
                                        echo "<p class='my-0'>Genero: ".$generoEntretenimiento."</p><br>";
                                        if($clasificacionEntretenimiento=="A" || $clasificacionEntretenimiento=="AA")
                                            echo "<p>Clasificación: <span class='badge badge-success mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";
                                        else if($clasificacionEntretenimiento=="B" || $clasificacionEntretenimiento=="B15")
                                            echo "<p>Clasificación: <span class='badge badge-warning mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";
                                        else
                                            echo "<p>Clasificación: <span class='badge badge-danger mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";

                                        $auxEstrellas="";
                                        for($i=0; $i<$calificacionEntretenimiento; $i++){
                                            $auxEstrellas.="★";
                                        }
                                        echo "<p>Calificacion: <label>".$auxEstrellas."</label></p>";
                                        echo "<a href='detalles.php?id=".$idEntretenimiento."&tipo=".$tipoEntretenimiento."' class='btn btn-outline-info btn-block'>Ver</a>";
                                    echo "</div>";
                                echo "</div>";
                        echo "</div>";
			        }
                }
                else if($clasificacion=="B"){
                    $result2=$conn->query("SELECT * from entretenimiento where (nombre like '$busquedaLike' or genero like '$busquedaLike') and clasificacion<>'D' and clasificacion<>'C' and clasificacion<>'B15'");
			        foreach($result2 as $r2){
                        $idEntretenimiento=$r2['id'];
                        $nombreEntretenimiento=$r2['nombre'];
                        $clasificacionEntretenimiento=$r2['clasificacion'];
                        $generoEntretenimiento=$r2['genero'];
                        $calificacionEntretenimiento=$r2['calificacion'];
                        $tipoEntretenimiento=$r2['tipo'];
                        echo "<div class='col mb-5'>";
                                echo "<div class='card shadow-lg'>";
                                    echo "<div class='card-body'>";
                                        echo "<img src='resurce/cartelera/".$tipoEntretenimiento."/".$idEntretenimiento.".jpg' class='card-img-top'>";
                                        echo "<center><h2 class='h4 mb-1'>".$nombreEntretenimiento."</h2></center>";
                                        echo "<p class='my-0'>Genero: ".$generoEntretenimiento."</p><br>";
                                        if($clasificacionEntretenimiento=="A" || $clasificacionEntretenimiento=="AA")
                                            echo "<p>Clasificación: <span class='badge badge-success mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";
                                        else if($clasificacionEntretenimiento=="B" || $clasificacionEntretenimiento=="B15")
                                            echo "<p>Clasificación: <span class='badge badge-warning mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";
                                        else
                                            echo "<p>Clasificación: <span class='badge badge-danger mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";

                                        $auxEstrellas="";
                                        for($i=0; $i<$calificacionEntretenimiento; $i++){
                                            $auxEstrellas.="★";
                                        }
                                        echo "<p>Calificacion: <label>".$auxEstrellas."</label></p>";
                                        echo "<a href='detalles.php?id=".$idEntretenimiento."&tipo=".$tipoEntretenimiento."' class='btn btn-outline-info btn-block'>Ver</a>";
                                    echo "</div>";
                                echo "</div>";
                        echo "</div>";
			        }
                }
                else if($clasificacion=="A"){
                    $result2=$conn->query("SELECT * from entretenimiento where (nombre like '$busquedaLike' or genero like '$busquedaLike') and clasificacion<>'D' and clasificacion<>'C' and clasificacion<>'B15' and clasificacion<>'B'");
			        foreach($result2 as $r2){
                        $idEntretenimiento=$r2['id'];
                        $nombreEntretenimiento=$r2['nombre'];
                        $clasificacionEntretenimiento=$r2['clasificacion'];
                        $generoEntretenimiento=$r2['genero'];
                        $calificacionEntretenimiento=$r2['calificacion'];
                        $tipoEntretenimiento=$r2['tipo'];
                        echo "<div class='col mb-5'>";
                                echo "<div class='card shadow-lg'>";
                                    echo "<div class='card-body'>";
                                        echo "<img src='resurce/cartelera/".$tipoEntretenimiento."/".$idEntretenimiento.".jpg' class='card-img-top'>";
                                        echo "<center><h2 class='h4 mb-1'>".$nombreEntretenimiento."</h2></center>";
                                        echo "<p class='my-0'>Genero: ".$generoEntretenimiento."</p><br>";
                                        if($clasificacionEntretenimiento=="A" || $clasificacionEntretenimiento=="AA")
                                            echo "<p>Clasificación: <span class='badge badge-success mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";
                                        else if($clasificacionEntretenimiento=="B" || $clasificacionEntretenimiento=="B15")
                                            echo "<p>Clasificación: <span class='badge badge-warning mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";
                                        else
                                            echo "<p>Clasificación: <span class='badge badge-danger mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";

                                        $auxEstrellas="";
                                        for($i=0; $i<$calificacionEntretenimiento; $i++){
                                            $auxEstrellas.="★";
                                        }
                                        echo "<p>Calificacion: <label>".$auxEstrellas."</label></p>";
                                        echo "<a href='detalles.php?id=".$idEntretenimiento."&tipo=".$tipoEntretenimiento."' class='btn btn-outline-info btn-block'>Ver</a>";
                                    echo "</div>";
                                echo "</div>";
                        echo "</div>";
			        }
                }
                else{
                    $result2=$conn->query("SELECT * from entretenimiento where (nombre like '$busquedaLike' or genero like '$busquedaLike') and clasificacion<>'D' and clasificacion<>'C' and clasificacion<>'B15' and clasificacion<>'B' and clasificacion<>'A'");
			        foreach($result2 as $r2){
                        $idEntretenimiento=$r2['id'];
                        $nombreEntretenimiento=$r2['nombre'];
                        $clasificacionEntretenimiento=$r2['clasificacion'];
                        $generoEntretenimiento=$r2['genero'];
                        $calificacionEntretenimiento=$r2['calificacion'];
                        $tipoEntretenimiento=$r2['tipo'];
                        echo "<div class='col mb-5'>";
                                echo "<div class='card shadow-lg'>";
                                    echo "<div class='card-body'>";
                                        echo "<img src='resurce/cartelera/".$tipoEntretenimiento."/".$idEntretenimiento.".jpg' class='card-img-top'>";
                                        echo "<center><h2 class='h4 mb-1'>".$nombreEntretenimiento."</h2></center>";
                                        echo "<p class='my-0'>Genero: ".$generoEntretenimiento."</p><br>";
                                        if($clasificacionEntretenimiento=="A" || $clasificacionEntretenimiento=="AA")
                                            echo "<p>Clasificación: <span class='badge badge-success mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";
                                        else if($clasificacionEntretenimiento=="B" || $clasificacionEntretenimiento=="B15")
                                            echo "<p>Clasificación: <span class='badge badge-warning mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";
                                        else
                                            echo "<p>Clasificación: <span class='badge badge-danger mt-0 mb-0'>".$clasificacionEntretenimiento."</span></p>";

                                        $auxEstrellas="";
                                        for($i=0; $i<$calificacionEntretenimiento; $i++){
                                            $auxEstrellas.="★";
                                        }
                                        echo "<p>Calificacion: <label>".$auxEstrellas."</label></p>";
                                        echo "<a href='detalles.php?id=".$idEntretenimiento."&tipo=".$tipoEntretenimiento."' class='btn btn-outline-info btn-block'>Ver</a>";
                                    echo "</div>";
                                echo "</div>";
                        echo "</div>";
			        }
                }
            echo "<div>";
	    }
}

?>