<?php

include('conexion.php');
    //cambiar parametros del mes que se quiera solicitar
  
$query ="SELECT * from tipo_paro";
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
