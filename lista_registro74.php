<?php

include('conexion.php');
$id_forma =$_POST['tmp'];
$query ="SELECT * FROM registro_72 where id_forma = $id_forma;";
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