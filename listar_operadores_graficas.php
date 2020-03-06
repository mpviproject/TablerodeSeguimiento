<?php

include('conexion.php');
$query=mysqli_query($conexion,"SELECT o.nombre_operador FROM herramentacion as h 
inner join operadores as o WHERE h.id_operador = o.id_operador GROUP BY h.id_operador");
$Qoperadores ="SELECT o.nombre_operador FROM herramentacion as h 
inner join operadores as o WHERE h.id_operador = o.id_operador GROUP BY h.id_operador";
$operadores= mysqli_query($conexion,$Qoperadores);

if(!$operadores){
    die("Error!");
}else{

while($data = mysqli_fetch_assoc($operadores)){
$arreglo["data"][]=$data;
}
$arreglo3=[];
for($i = 0;$i<mysqli_num_rows($query);$i++){
    array_push($arreglo3,$arreglo["data"][$i]["nombre_operador"]);
}


    
echo json_encode($arreglo3);


}
mysqli_free_result($operadores);
mysqli_close($conexion);

?>