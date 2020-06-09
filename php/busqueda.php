<?php
require('conexion.php');

$salida="";
$result1="SELECT * FROM cuenta_principal";

if(isset($_POST['registro_nombre'])){
    $q=addslashes(htmlspecialchars($_POST['registro_nombre']));
    $result1="SELECT * FROM cuenta_principal where nombre='$q'";
}
$resultado=$conn->query($result1);
if(strlen($q)<4 && strlen($q)!=0){
    $salida.="El nombre: ".$q." es demasiado corto";
    ?>
    <script type="text/javascript">
		document.getElementById('resultado_registro_nombre').setAttribute("class","alert alert-secondary");
        document.getElementById("submitRegistroCuenta").disabled=true;
    </script>
    <?php
}
else if(strlen($q)>15){
    $salida.="El nombre: ".$q." es demasiado largo";
    ?>
    <script type="text/javascript">
		document.getElementById('resultado_registro_nombre').setAttribute("class","alert alert-secondary");
        document.getElementById("submitRegistroCuenta").disabled=true;
    </script>
    <?php
}
else if($resultado->rowCount()>0){
    $salida.="No es posible usar el nombre: ".$q;
    ?>
    <script type="text/javascript">
		document.getElementById('resultado_registro_nombre').setAttribute("class","alert alert-secondary");
        document.getElementById("submitRegistroCuenta").disabled=true;
    </script>
    <?php
}
else if($q==""){
    $salida.="";
}
else{
    $salida.="Nombre disponible: ".$q;
    ?>
    <script type="text/javascript">
		document.getElementById('resultado_registro_nombre').setAttribute("class","alert alert-success");
        document.getElementById("submitRegistroCuenta").disabled=false;
    </script>
    <?php
}
echo $salida;

$conn=null;
?>