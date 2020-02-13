<?php

include('conexion.php');

if(isset($_POST['id_orden'])){
    $operacion= $_POST['id_orden'];
    $query ="SELECT * FROM calidad WHERE id_operacion = $operacion ;";
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
    
}
?>