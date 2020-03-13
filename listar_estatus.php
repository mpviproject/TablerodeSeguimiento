<?php
include('conexion.php');

    $query= "SELECT o.numero_parte, o.tipo_produccion,o.fecha_solicitud, o.orden_produccion, o.cantidad_requerida,o.fecha_requerida,o.numero_operacion,o.UPH, o.fecha_inicio, o.fecha_fin, o.id_produccion,IFNULL(SUM(r_cantidad_producida),0) as cantidad from orden_produccion as o left join forma_72 as f on o.id_produccion=f.id_produccion left join registro_72 as r on r.id_forma = f.id_forma GROUP by f.id_produccion";
    
    $result = mysqli_query($conexion,$query);
    while($data = mysqli_fetch_assoc($result)){
        $arreglo["data"][]=$data;
        }
        echo json_encode($arreglo);
        mysqli_free_result($result);
        mysqli_close($conexion);
    


    ?>