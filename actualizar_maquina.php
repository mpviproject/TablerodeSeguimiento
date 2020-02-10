<?php
include('conexion.php');

$id_maquina =$_POST['id_maquina1'];
$maquina =$_POST['maquina1'];
$tipo_maquina = $_POST['tipo_maquina1'];

if(! $id_maquina== "" and ! $maquina== "" and ! $tipo_maquina== "" ){

 

$query= "UPDATE maquinas SET maquina='$maquina',tipo_maquina='$tipo_maquina' WHERE id_maquina='$id_maquina' ;";

$result = mysqli_query($conexion,$query);
if(!$result){
    die("Error!");
}
mysqli_close($conexion);
}

?>