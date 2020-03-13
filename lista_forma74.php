<?php

include('conexion.php');
$query ="SELECT f.id_forma, f.id_produccion, f.id_operador, f.fecha_actual, f.PAP, f.POC, f.ATL, f.SCRAP, f.EMV, f.turno, op.orden_produccion, o.nombre_operador, o.apellido_operador  FROM forma_72 as f inner join orden_produccion as op on  f.id_produccion = op.id_produccion inner join operadores as o on f.id_operador = o.id_operador  ORDER BY id_forma;";
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