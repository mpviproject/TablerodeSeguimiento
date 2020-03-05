<?php

include('conexion.php');
$query ="SELECT date(r_inicio) as fecha, SUM(r_cantidad_producida) as cantidad,SUM(reproceso) as reproceso,SUM(scrap) as scrap FROM registro_72 GROUP BY date(r_inicio);";
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