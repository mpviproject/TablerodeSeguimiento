<?php
include('conexion.php');

$id_registro =$_POST['id_registro'];
$r_inicio =$_POST['r_inicio'];
$r_fin = $_POST['r_fin'];
$r_cantidad_producida = $_POST['r_cantidad_producida'];
$reproceso2=$_POST['reproceso2'];
$scrap2=$_POST['scrap2'];

if(! $id_registro== "" and ! $r_inicio== "" and ! $r_fin== "" and ! $r_cantidad_producida== ""
and ! $reproceso2== ""and ! $scrap2== "" ){


 

$query= "UPDATE registro_72 SET r_inicio='$r_inicio',r_fin='$r_fin' 
,r_cantidad_producida='$r_cantidad_producida',reproceso='$reproceso2',scrap='$scrap2'
WHERE id_registro='$id_registro' ;";

$result = mysqli_query($conexion,$query);
if(!$result){
    die("Error!");
}
mysqli_close($conexion);
}else{
    echo "missing parameters";
}

?>