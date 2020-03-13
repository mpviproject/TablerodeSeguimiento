<?php
include('conexion.php');

$id_forma =$_POST['id_forma'];
$id_produccion =$_POST['id_produccion'];
$id_operador = $_POST['id_operador'];
$fecha_realizacion = $_POST['fecha_realizacion'];
$turno=$_POST['turno'];
$PAP=$_POST['PAP'];
$POC=$_POST['POC'];
$ATL=$_POST['ATL'];
$SCRAP=$_POST['SCRAP'];
$EMV=$_POST['EMV'];

if(! $id_forma== "" and ! $id_produccion== "" and ! $id_operador== "" and ! $fecha_realizacion== ""
and ! $turno== "" ){

    if(!$PAP== "0"){
        $PAP= 1;
    }else{
        $PAP= 0;
    }
    if(!$POC== "0"){
        $POC= 1;
    }else{
        $POC= 0;
    }
    if(!$ATL== "0"){
        $ATL= 1;
    }else{
        $ATL= 0;
    }
    if(!$SCRAP== "0"){
        $SCRAP= 1;
    }else{
        $SCRAP= 0;
    }
    if(!$EMV== "0"){
        $EMV= 1;
    }else{
        $EMV= 0;
    }
    

 

$query= "UPDATE forma_72 SET id_produccion='$id_produccion',id_operador='$id_operador' 
,fecha_actual='$fecha_realizacion',turno='$turno',PAP='$PAP'
,POC='$POC',ATL='$ATL',SCRAP='$SCRAP'
,EMV='$EMV'
WHERE id_forma='$id_forma' ;";

$result = mysqli_query($conexion,$query);
if(!$result){
    die("Error!");
}
mysqli_close($conexion);
}else{
    echo "missing parameters";
}

?>