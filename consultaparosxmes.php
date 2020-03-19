<?php
include('conexion.php');
    //cambiar parametros del mes que se quiera solicitar
    if(isset($_POST['mesconsulta'])){
        $mes = $_POST['mesconsulta'];
        $sql = "SELECT t.descripcion,p.horas_paro from paro_maquinas as p inner join tipo_paro as t on p.id_tipo = t.id_tipo inner join forma_72 as f on p.id_forma = f.id_forma WHERE MONTH(f.fecha_actual) = $mes";   
    $result = mysqli_query($conexion,$sql);
    if(!$result){
        die("Error!");
    }else{
    while($data = mysqli_fetch_assoc($result)){
    $arreglo["data"][]=$data;
    }
    if (mysqli_num_rows($result) >= 1) {
        echo json_encode($arreglo);
       } else {
         echo "0";
       }
    
    }
    mysqli_free_result($result);
    mysqli_close($conexion);
}else{
    echo "Missing Parameters";
}
?>