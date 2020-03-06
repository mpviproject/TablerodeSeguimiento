<?php

include('conexion.php');
    $query ="SELECT date(r_inicio) as fecha, SUM(r_cantidad_producida) as cantidad,(SELECT hrs_prod_dia from dias_productivos order by id_productivos DESC LIMIT 1 ) as horas FROM registro_72 as horadia GROUP BY date(r_inicio);";
    $result = mysqli_query($conexion,$query);
    
    if(!$result){
        die("Error!");
    }else{
    
    while($data = mysqli_fetch_assoc($result)){
    $arreglo["data"][]=$data;
    }
    $total=[];
    for($i=0;$i<mysqli_num_rows($result);$i++){
        array_push($total,($arreglo["data"][$i]["cantidad"]/$arreglo["data"][$i]["horas"])*100);
    }
    $promedio = array_sum($total)/count($total);
    echo json_encode(round($promedio));
    }
    mysqli_free_result($result);
    mysqli_close($conexion);
    

?>