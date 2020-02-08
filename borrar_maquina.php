<?php
include('conexion.php');

$id_maquina =$_POST['id_maquina2'];

if(! $id_maquina== ""  ){



$query= "DELETE FROM maquinas WHERE id_maquina = '$id_maquina';";

mysqli_query($conexion,$query);

mysqli_close($conexion);
}

?>