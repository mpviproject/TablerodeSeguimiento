<?php
include('conexion.php');

$id_maquina_herramentacion = $_POST['id_maquina_herramentacion'];
$id_operador_herramentacion = $_POST['id_operador_herramentacion'];
$fecha_herramentacion = $_POST['fecha_herramentacion'];
$tiempo_herramentacion = $_POST['tiempo_herramentacion'];
$reproceso_herramentacion = $_POST['reproceso_herramentacion'];
$scrap_herramentacion = $_POST['scrap_herramentacion'];
$observacion_herramentacion = $_POST['observacion_herramentacion'];
$paquete_op = $_POST['paquete_op'];
$it_herramentacion = $_POST['it_herramentacion'];
$diagrama_herramentacion = $_POST['diagrama_herramentacion'];
$amef_herramentacion = $_POST['amef_herramentacion'];

if(! $id_maquina_herramentacion== "" and ! $id_operador_herramentacion== ""and ! $fecha_herramentacion== ""and ! $tiempo_herramentacion== ""
and ! $reproceso_herramentacion== ""and ! $scrap_herramentacion== ""and ! $observacion_herramentacion== "" ){
if(!$paquete_op== "0"){
    $paquete_op1= 1;
}else{
    $paquete_op1= 0;
}
if(!$it_herramentacion== "0"){
    $it_herramentacion1= 1;
}else{
    $it_herramentacion1= 0;
}
if(!$diagrama_herramentacion== "0"){
    $diagrama_herramentacion1= 1;
}else{
    $diagrama_herramentacion1= 0;
}
if(!$amef_herramentacion== "0"){
    $amef_herramentacion1= 1;
}else{
    $amef_herramentacion1= 0;
}


$query= "INSERT INTO herramentacion VALUES (NULL,'$id_maquina_herramentacion','$id_operador_herramentacion','$fecha_herramentacion','$tiempo_herramentacion'
,'$reproceso_herramentacion','$scrap_herramentacion','$observacion_herramentacion','$paquete_op1','$it_herramentacion1','$diagrama_herramentacion1','$amef_herramentacion1') ;";
$result = mysqli_query($conexion,$query);
if(!$result){
    die("Error!");
}
mysqli_free_result($result);
mysqli_close($conexion);

}

?>