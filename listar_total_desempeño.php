<?php
include('conexion.php');

    $query= "SELECT count(*) as NUM FROM herramentacion";
    
    $result = mysqli_query($conexion,$query);
    while($data = mysqli_fetch_assoc($result)){
        $arreglo["data"][]=$data;
        }
        echo json_encode($arreglo);
        mysqli_free_result($result);
        mysqli_close($conexion);
    


    ?>