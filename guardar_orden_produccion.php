<?php
include('conexion.php');
$tipo_produccion =$_POST['tipo_produccion'];
$cuando_solicito = $_POST['cuando_solicito'];
$orden_produccion = $_POST['orden_produccion'];
$numero_parte=$_POST['numero_parte'];
$cantidad_requerida=$_POST['cantidad_requerida'];
$fecha_requerida=$_POST['fecha_requerida'];
$numero_operacion=$_POST['numero_operacion'];
$UPH=$_POST['UPH'];
$fecha_inicio=$_POST['fecha_inicio'];
$fecha_fin=$_POST['fecha_fin'];
if(! $tipo_produccion== "" and ! $cuando_solicito== "" and ! $orden_produccion== ""and ! $numero_parte== ""
and ! $cantidad_requerida== ""and ! $fecha_requerida== ""and ! $numero_operacion== ""and ! $UPH== ""
and ! $fecha_inicio== ""and ! $fecha_fin== "" ){

$query= "INSERT INTO orden_produccion VALUES (NULL,'$tipo_produccion',
'$cuando_solicito','$orden_produccion','$numero_parte','$cantidad_requerida ','$fecha_requerida '
,'$numero_operacion ','$UPH ','$fecha_inicio ','$fecha_fin ') ;";
$result = mysqli_query($conexion,$query);
if(!$result){  
    die("Error!");
}
mysqli_free_result($result);
mysqli_close($conexion);
}
?>