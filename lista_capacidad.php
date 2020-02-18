<?php

include('conexion.php');



    $query ="SELECT f.id_forma, r.id_registro,r.r_inicio,r.r_fin,f.turno,TIMESTAMPDIFF(hour,r.r_inicio,r.r_fin) as ht from forma_72 as f inner join registro_72 as r on f.id_forma = r.id_forma";
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