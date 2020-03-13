<?php
include('conexion.php');

    $query= "SELECT op.numero_parte, m.maquina, h.fecha_herramentacion,h.reproceso, o.nombre_operador, h.tiempo_herramentacion, h.scrap, op.cantidad_requerida
    from orden_produccion as op inner join maquinas_reservadas as mr inner join herramentacion as h inner join operadores as
    o inner join maquinas as m on mr.id_produccion = op.id_produccion and mr.id_maquina = m.id_maquina and h.id_reservada = mr.id_reservada and
    o.id_operador = h.id_operador";
    
    $result = mysqli_query($conexion,$query);
    while($data = mysqli_fetch_assoc($result)){
        $arreglo["data"][]=$data;
        }
        echo json_encode($arreglo);
        mysqli_free_result($result);
        mysqli_close($conexion);
    


    ?>