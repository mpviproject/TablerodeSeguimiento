<?php

include('conexion.php');
    //cambiar parametros del mes que se quiera solicitar
    $queryv ="SELECT SUM(r_cantidad_producida) as cantidad from forma_72 as f inner join registro_72 as r on f.id_forma = r.id_forma where f.turno ='V' and MONTH(f.fecha_actual) = 02;";
    $querym ="SELECT SUM(r_cantidad_producida) as cantidad from forma_72 as f inner join registro_72 as r on f.id_forma = r.id_forma where f.turno ='M' and MONTH(f.fecha_actual) = 02;";
    $resultv = mysqli_query($conexion,$queryv);
    $resultm = mysqli_query($conexion,$querym);
    if(!$resultv ||!$resultm){
        die("Error!");
    }else{
    
    while($data = mysqli_fetch_assoc($resultv)){
    $arreglov["data"][]=$data;
    }
    while($data1 = mysqli_fetch_assoc($resultm)){
        $arreglom["data"][]=$data1;
    }
    $total=[];
    array_push($total,$arreglom["data"][0]["cantidad"]);
    array_push($total,$arreglov["data"][0]["cantidad"]);
    echo json_encode(($total));
    }
    mysqli_free_result($resultv);
    mysqli_close($conexion);
?>