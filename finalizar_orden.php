<?php
include('conexion.php');

$id_produccion =$_POST['id_produccion3'];

if(! $id_produccion== ""  ){



$query= "UPDATE orden_produccion SET estado = 0 WHERE id_produccion = '$id_produccion';";

mysqli_query($conexion,$query);

mysqli_close($conexion);
}

?>