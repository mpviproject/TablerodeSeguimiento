<?php
include('conexion.php');

$maquina =$_POST['maquina'];
$tipo_maquina = $_POST['tipo_maquina'];

if(! $maquina== "" and ! $tipo_maquina== "" ){


$query= "INSERT INTO maquinas VALUES (NULL,'$maquina','$tipo_maquina') ;";
$result = mysqli_query($conexion,$query);
if(!$result){
    die("Error!");
}
mysqli_free_result($result);
mysqli_close($conexion);
}

?>