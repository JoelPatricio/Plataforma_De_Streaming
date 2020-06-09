<?php 
require('conexion.php');
header('Content-Type: text/txt; charset=UTF-8');
if($_REQUEST['nombrePerfil']){
    $nombre=$_GET['nombrePerfil'];
    $idPrincipal=$_GET['nombreCuenta'];
	try {
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$result1=$conn->query("SELECT count(*) from cuenta_familiar where nombre='$nombre' and idPrincipal='$idPrincipal'");
			foreach($result1 as $r1){
				$Nencontrados=$r1[0];
			}
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage();
		}
	if($Nencontrados==0){
		echo "<div class=' alert alert-success '>Nombre: ".$nombre." disponible :) </div><input id='correoCorregido' type='hidden' name='correoCorregido'>";
	}
	else{
		echo "<div class=' alert alert-danger '>Nombre: ".$nombre." no disponible :( </div><input id='correoCorregido' type='hidden' name='correoCorregido'>";
		
	}
}
?>