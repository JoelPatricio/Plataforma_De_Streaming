<?php 
require('conexion.php');
header('Content-Type: text/txt; charset=UTF-8');
if($_REQUEST['correoRegistro']){
	$correo=$_GET['correoRegistro'];
	try {
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$result1=$conn->query("SELECT count(correo) from cuenta_principal where correo='$correo'");
			foreach($result1 as $r1){
				$Ncorreos=$r1[0];
				
			}
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage();
		}
	if($Ncorreos==0){
		echo "<div class=' alert alert-success '>Correo: ".$correo." disponible :) </div><input id='correoCorregido' type='hidden' name='correoCorregido'>";
	}
	else{
		echo "<div class=' alert alert-danger '>Correo: ".$correo." no disponible :( </div><input id='correoCorregido' type='hidden' name='correoCorregido'>";
		
			/*echo "<script type='text/javascript'>";
				echo "document.getElementById('submitRegistroCuenta').disabled=true;";
			echo "</script>";*/
		
	}
}

?>