<?php
include('conexion.php');

    $query= "SELECT op.id_produccion,op.orden_produccion,op.numero_parte,op.numero_operacion,
    op.fecha_requerida,op.cantidad_requerida,op.UPH,cantidad from 
    orden_produccion as op,(SELECT SUM(rg.r_cantidad_producida) as cantidad from forma_72 as fm inner join 
    registro_72 as rg on fm.id_forma = rg.id_forma where fm.id_produccion = 3 GROUP by fm.id_produccion) as
     cantidad ORDER BY op.id_produccion";
    
    $result = mysqli_query($conexion,$query);
    while($data = mysqli_fetch_assoc($result)){
        $arreglo["data"][]=$data;
        }
        echo json_encode($arreglo);
        mysqli_free_result($result);
        mysqli_close($conexion);
    


    ?>