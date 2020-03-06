<?php
include('conexion.php');


    $id_produccion=$_POST['produccion2'];
    $query=mysqli_query($conexion, "SELECT op.id_produccion,op.fecha_requerida,op.cantidad_requerida,op.UPH,cantidad from 
    orden_produccion as op,(SELECT SUM(rg.r_cantidad_producida) as cantidad from forma_72 as fm inner join 
    registro_72 as rg on fm.id_forma = rg.id_forma where fm.id_produccion = $id_produccion GROUP by fm.id_produccion) as
     cantidad where id_produccion =  $id_produccion"); 

$query2= "SELECT op.id_produccion,op.fecha_requerida,op.cantidad_requerida,op.UPH,cantidad from 
    orden_produccion as op,(SELECT SUM(rg.r_cantidad_producida) as cantidad from forma_72 as fm inner join 
    registro_72 as rg on fm.id_forma = rg.id_forma where fm.id_produccion = $id_produccion GROUP by fm.id_produccion) as
     cantidad where id_produccion =  $id_produccion";

$query3= "SELECT op.id_produccion,op.fecha_requerida,op.cantidad_requerida,op.UPH from orden_produccion as op  where id_produccion =  $id_produccion";

     if(mysqli_num_rows($query) < 1){
        $result1 = mysqli_query($conexion,$query3);
    
        while($data1 = mysqli_fetch_assoc($result1)){
            $arreglo["data"][]=$data1;
   
            }

             $arreglo["data"][0]["cantidad"] ="0";
             
            echo json_encode($arreglo);
            mysqli_free_result($result1);
            mysqli_close($conexion);
     }else{
        $result = mysqli_query($conexion,$query2);
        while($data = mysqli_fetch_assoc($result)){
            $arreglo["data"][]=$data;
            }

           
           $arreglo["data"][0]["cantidad"];
            echo json_encode($arreglo);
            mysqli_free_result($result);
            mysqli_close($conexion);
     }
  
    ?>