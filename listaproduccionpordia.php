<?php

include('conexion.php');
if(isset($_POST['mesconsulta'])){
    $mes = $_POST['mesconsulta'];
$query ="SELECT date(r_inicio) as fecha, SUM(r_cantidad_producida) as cantidad,SUM(reproceso) as reproceso,SUM(scrap) as scrap FROM registro_72 where MONTH(r_inicio) = $mes GROUP BY date(r_inicio);";
$result = mysqli_query($conexion,$query);

if(!$result){
    die("Error!");
}else{
if (mysqli_num_rows($result) >= 1) {
while($data = mysqli_fetch_assoc($result)){
    $arreglo["data"][]=$data;
    echo json_encode($arreglo);    
    }
   } else {
     echo "0";
   }


}
mysqli_free_result($result);
mysqli_close($conexion);
}else{
    echo "Missing parameters";
}
?>