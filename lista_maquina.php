<?php

include('conexion.php');
$query ="SELECT * FROM maquinas ORDER BY id_maquina ;";
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