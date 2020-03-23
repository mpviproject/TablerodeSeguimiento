<?php

include('conexion.php');
if(isset($_POST['mesconsulta'])){
    $mes = $_POST['mesconsulta'];
$query=mysqli_query($conexion,"SELECT count(*) FROM herramentacion where month(fecha_herramentacion)=$mes GROUP BY id_operador");
$Qoperadores ="SELECT count(*) FROM herramentacion where month(fecha_herramentacion)=$mes GROUP BY id_operador";
$Qtotal ="SELECT count(*) FROM herramentacion where month(fecha_herramentacion)=$mes";
$operadores= mysqli_query($conexion,$Qoperadores);
$total = mysqli_query($conexion,$Qtotal);

if(!$operadores ||  !$total){
    die("Error!");
}else{

    while($data2 = mysqli_fetch_assoc($total)){
        $arreglo2["data"][]=$data2 ;
        }
while($data = mysqli_fetch_assoc($operadores)){
$arreglo["data"][]=$data;
}
$arreglo3=[];
for($i = 0;$i<mysqli_num_rows($query);$i++){
    array_push($arreglo3,$arreglo["data"][$i]["count(*)"] /$arreglo2["data"][0]["count(*)"] *100);
}


    
echo json_encode($arreglo3);


}
mysqli_free_result($total);
mysqli_close($conexion);
}else{
    echo "Missing parameters";
}
?>