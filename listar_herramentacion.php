<?php

include('conexion.php');


$query ="SELECT op.id_produccion,op.numero_parte,ma.maquina,op.cantidad_requerida,h.fecha_herramentacion,
h.id_operador, o.nombre_operador,h.scrap,h.tiempo_herramentacion ,(h.scrap/op.cantidad_requerida) as nc 
from orden_produccion as op inner join maquinas_reservadas as mr on op.id_produccion = mr.id_produccion 
inner join herramentacion as h on mr.id_reservada = h.id_reservada inner join operadores as o on 
h.id_operador =o.id_operador inner join maquinas as ma on mr.id_maquina = ma.id_maquina";
$result = mysqli_query($conexion,$query);

if(!$result){
    die("Error!");
}else{
while($data = mysqli_fetch_assoc($result)){
$arreglo["data"][]=$data;

}
echo json_encode($arreglo);

}
mysqli_free_result($result);
mysqli_close($conexion);

?>