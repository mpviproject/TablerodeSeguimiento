<?php

include('conexion.php');

$id_produccion = $_POST['produccion'];
$query ="SELECT mr.id_reservada,mr.id_produccion,mr.id_maquina,ma.maquina,ma.tipo_maquina,mr.tiempo_operacion,mr.tiempo_ciclo from maquinas_reservadas as mr inner join maquinas as ma on mr.id_maquina = ma.id_maquina
 where mr.id_produccion = $id_produccion";
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