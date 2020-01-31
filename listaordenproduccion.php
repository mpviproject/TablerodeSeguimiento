<?php
include('conexion.php');

    $query ="select * from orden_produccion";
    $result = mysqli_query($conexion,$query);
    while($data = mysqli_fetch_assoc($result)){
        $arreglo["data"][]=$data;
        }
        echo json_encode($arreglo);
        mysqli_free_result($result);
        mysqli_close($conexion);
    ?>