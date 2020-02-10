<?php
include('conexion.php');

$id_produccion =$_POST['id_produccion2'];

if(! $id_produccion== ""  ){



$query= "DELETE FROM orden_produccion WHERE id_produccion = '$id_produccion';";

mysqli_query($conexion,$query);

mysqli_close($conexion);
}

?>