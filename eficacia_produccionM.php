<?php

include('conexion.php');

if (isset($_POST['mesconsulta'])) {
    $mes = $_POST['mesconsulta'];
    //Espera de mes 
    /*   $operacion= $_POST['id_orden']; */
    class fecha
    {
        public $fecha;
        public $value = [];
        public $eficacia = [];
        public $reproceso = [];
        public $scrap = [];
    }
    class totales
    {
        public $fecha;
        public $productividadtotal;
        public $eficaciatotal;
        public $reprocesototal;
        public $scraptotal;
    }
    $sql = "SELECT f.id_forma,DATE(r.r_inicio) as fecha, r.r_cantidad_producida,r.reproceso,r.scrap, TIMESTAMPDIFF(HOUR,r.r_inicio,r.r_fin) as horas,o.UPH,SUM(ifnull(p.horas_paro,0)) as tiempo_demora,(o.UPH/60) as tiempo_operacion from forma_72 as f INNER JOIN registro_72 as r on f.id_forma = r.id_forma inner join orden_produccion as o on f.id_produccion = o.id_produccion left JOIN paro_maquinas as p on p.id_forma = f.id_forma where f.turno='M' && MONTH(r.r_inicio)=$mes GROUP BY f.id_forma";
    $sql2 = "SELECT f.id_forma,(((IFNULL(r.r_cantidad_producida,0))/ (TIMESTAMPDIFF(HOUR,r.r_inicio,r.r_fin) * IFNULL(o.UPH,0)))*100) as eficacia ,(IFNULL(r.reproceso,0))/IFNULL(r.r_cantidad_producida,0) as reproceso, (IFNULL(r.scrap,0)/IFNULL(r.r_cantidad_producida,0)) as SCRAP from forma_72 as f INNER JOIN registro_72 as r on f.id_forma = r.id_forma inner join orden_produccion as o on f.id_produccion = o.id_produccion where f.turno='M' && MONTH(r.r_inicio)=$mes ";
    $result2 = mysqli_query($conexion, $sql2);
    $result = mysqli_query($conexion, $sql);
    $count = 0;
    while ($data2 = mysqli_fetch_assoc($result2)) {
        $arreglo2["data"][] = $data2;
    }
    //echo json_encode($arreglo2);
    $arreglos = new ArrayObject();

    while ($data = mysqli_fetch_assoc($result)) {
        $arreglo["data"][] = $data;
        $fecha1 = $arreglo["data"][$count]['fecha'];
        //cambiar suma de porcentajes por promedio de ambas
        $temporal = $arreglo["data"][$count]['r_cantidad_producida'] / ($arreglo["data"][$count]['reproceso'] + $arreglo["data"][$count]['scrap'] + ($arreglo["data"][$count]['horas'] * $arreglo["data"][$count]['UPH']) + ($arreglo["data"][$count]['tiempo_demora'] / $arreglo["data"][$count]['tiempo_operacion']));
        $eficacia = $arreglo2["data"][$count]['eficacia'];
        $reproceso = $arreglo2["data"][$count]['reproceso'];
        $scrap = $arreglo2["data"][$count]['SCRAP'];
        $obj = new fecha;
        $obj->fecha = $fecha1;
        array_push($obj->value, round($temporal, 2));
        array_push($obj->eficacia, round($eficacia, 2));
        array_push($obj->reproceso, $reproceso);
        array_push($obj->scrap, $scrap);
        $bolean = false;
        $tem = 0;
        if (count($arreglos) >= 1) {
            for ($tem = 0; $tem < sizeof($arreglos); $tem++) {
                if ($arreglos[$tem]->fecha == $obj->fecha) {
                    array_push($arreglos[$tem]->value, $obj->value);
                    array_push($arreglos[$tem]->eficacia, $obj->eficacia);
                    array_push($arreglos[$tem]->reproceso, $obj->reproceso);
                    array_push($arreglos[$tem]->scrap, $obj->scrap);
                    $bolean = true;
                }
            }
            if ($bolean == false) {
                $arreglos[$tem] = $obj;
            }
        } else {
            $arreglos[$tem] = $obj;
        }
        $count++;
        //Falta funcion para sumar los elementos del arreglo del objeto y dividirlos entre el mismo.
    }

    $arreglostotales = new ArrayObject();

    for ($i = 0; $i < sizeof($arreglos); $i++) {
        $totalobj = new totales;
        $totalobj->fecha = $arreglos[$i]->fecha;
        $totalobj->productividadtotal = array_sum($arreglos[$i]->value) / sizeof($arreglos[$i]->value);
        $totalobj->eficaciatotal = array_sum($arreglos[$i]->eficacia);
        $totalobj->reprocesototal = array_sum($arreglos[$i]->reproceso);
        $totalobj->scraptotal = array_sum($arreglos[$i]->scrap);
        $arreglostotales[$i] = $totalobj;
    }
    echo json_encode($arreglostotales);
    //echo sizeof($arreglos[0]->value);
    mysqli_free_result($result);
    mysqli_close($conexion);
}else{
    echo "Missing Parameters";
}
//}
?>