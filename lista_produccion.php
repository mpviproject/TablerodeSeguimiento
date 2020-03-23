<?php

include('conexion.php');
if(isset($_POST['mesconsulta'])){
    $mes = $_POST['mesconsulta'];
$query ="SELECT * FROM dias_productivos where month(fecha_cambio)=$mes ORDER BY id_productivos DESC LIMIT 1;";
$result = mysqli_query($conexion,$query);

if(!$result){
    die("Error!");
}else{
    if (mysqli_num_rows($result) >= 1) {
while($data = mysqli_fetch_assoc($result)){
$arreglo["data"][]=$data;
}
echo json_encode($arreglo);
    }else{
        echo "No coincidence";
    }
}
mysqli_free_result($result);
mysqli_close($conexion);
}else{
    echo "Missing Parameters";
}
