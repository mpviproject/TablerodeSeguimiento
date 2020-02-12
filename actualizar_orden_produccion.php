<?php
include('conexion.php');

$id_produccion =$_POST['id_produccion1'];
$tipo_produccion =$_POST['tipo_produccion1'];
$cuando_solicito = $_POST['cuando_solicito1'];
$orden_produccion = $_POST['orden_produccion1'];
$numero_parte=$_POST['numero_parte1'];
$cantidad_requerida=$_POST['cantidad_requerida1'];
$fecha_requerida=$_POST['fecha_requerida1'];
$numero_operacion=$_POST['numero_operacion1'];
$UPH=$_POST['UPH1'];
$fecha_inicio=$_POST['fecha_inicio1'];
$fecha_fin=$_POST['fecha_fin1'];

if(! $id_produccion== "" and ! $tipo_produccion== "" and ! $cuando_solicito== "" and ! $orden_produccion== ""
and ! $numero_parte== ""
and ! $cantidad_requerida== ""and ! $fecha_requerida== ""and ! $numero_operacion== ""and ! $UPH== ""
and ! $fecha_inicio== ""and ! $fecha_fin== "" ){

 

$query= "UPDATE orden_produccion SET tipo_produccion='$tipo_produccion',fecha_solicitud='$cuando_solicito' 
,orden_produccion='$orden_produccion',numero_parte='$numero_parte',cantidad_requerida='$cantidad_requerida'
,fecha_requerida='$fecha_requerida',numero_operacion='$numero_operacion',UPH='$UPH'
,fecha_inicio='$fecha_inicio',fecha_fin='$fecha_fin'
WHERE id_produccion='$id_produccion' ;";

$result = mysqli_query($conexion,$query);
if(!$result){
    die("Error!");
}
mysqli_close($conexion);
}else{
    echo "missing parameters";
}

?>