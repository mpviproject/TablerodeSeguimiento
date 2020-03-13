<?php

include('conexion.php');
    //cambiar parametros del mes que se quiera solicitar
    if(isset($_POST['mesconsulta'])){
        $mes = $_POST['mesconsulta'];
    $query ="SELECT p.id_paro,p.id_forma,f.id_operador,o.nombre_operador,o.apellido_operador,o.turno ,f.fecha_actual,p.horas_paro,p.id_tipo,tp.descripcion,p.comentario from paro_maquinas as p inner join forma_72 as f on p.id_forma = f.id_forma inner JOIN operadores as o on f.id_operador = o.id_operador inner join tipo_paro as tp on p.id_tipo =tp.id_tipo where MONTH(f.fecha_actual)=$mes;";
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
}else{
    $query ="SELECT p.id_paro,p.id_forma,f.id_operador,o.nombre_operador,o.apellido_operador,o.turno ,f.fecha_actual,p.horas_paro,p.id_tipo,tp.descripcion,p.comentario from paro_maquinas as p inner join forma_72 as f on p.id_forma = f.id_forma inner JOIN operadores as o on f.id_operador = o.id_operador inner join tipo_paro as tp on p.id_tipo =tp.id_tipo";
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