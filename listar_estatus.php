<?php
include('conexion.php');

    $query= "SELECT op.id_produccion,op.orden_produccion,op.numero_parte,op.numero_operacion,
    op.fecha_requerida,op.cantidad_requerida,op.UPH from 
    orden_produccion as op ORDER BY op.id_produccion";
    
    $result = mysqli_query($conexion,$query);
    while($data = mysqli_fetch_assoc($result)){
        $arreglo["data"][]=$data;
        }
        echo json_encode($arreglo);
        mysqli_free_result($result);
        mysqli_close($conexion);
    


    ?>