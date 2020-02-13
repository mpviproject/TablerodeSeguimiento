<?php
include('conexion.php');

$id_maquina =$_POST['id_maquina'];
$tiempo_operacion =$_POST['tiempo_operacion'];
$tiempo_ciclo =$_POST['tiempo_ciclo'];
$id_produccion = $_POST['id_produccion_maquina'];

if(! $id_maquina== "" and ! $tiempo_operacion== ""and ! $tiempo_ciclo== "" and ! $id_produccion== ""){


$query= "INSERT INTO maquinas_reservadas VALUES (NULL,$id_produccion,$id_maquina,$tiempo_operacion,$tiempo_ciclo);";

$result = mysqli_query($conexion,$query);
if(!$result){
    die("Error!");
}
mysqli_free_result($result);
mysqli_close($conexion);
}else{
    echo "Missing parameters";
}

?>