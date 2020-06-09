<?php 
require('conexion.php');
header('Content-Type: text/txt; charset=UTF-8');
if($_REQUEST['passNueva']){
    $passw=$_GET['passNueva'];
    $idPrincipal=$_GET['idPrincipal'];
	try {
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$result1=$conn->query("SELECT count(*) from cuenta_principal where password='$passw' and idPrincipal='$idPrincipal'");
			foreach($result1 as $r1){
				$Ncorreos=$r1[0];
				
			}
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage();
		}
	if($Ncorreos==0){
		echo "<div class=' alert alert-success '>Contraseña disponible :) </div><input id='correoCorregido' type='hidden' name='correoCorregido'>";
	}
	else{
		echo "<div class=' alert alert-danger '>Contraseña anteriormente usada :( </div><input id='correoCorregido' type='hidden' name='correoCorregido'>";
		
			/*echo "<script type='text/javascript'>";
				echo "document.getElementById('submitRegistroCuenta').disabled=true;";
			echo "</script>";*/
		
	}
}

?>