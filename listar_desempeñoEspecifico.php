<?php
include('conexion.php');

    $query= "SELECT o.nombre_operador, SUM(h.scrap+h.reproceso) as total_scrap, count(*) as total_h, SUM(h.tiempo_herramentacion) as total_t from herramentacion as h inner 
    join operadores as o on h.id_operador = o.id_operador GROUP BY h.id_operador";
    
    $result = mysqli_query($conexion,$query);
    while($data = mysqli_fetch_assoc($result)){
        $arreglo["data"][]=$data;
        }
        echo json_encode($arreglo);
        mysqli_free_result($result);
        mysqli_close($conexion);
    


    ?>