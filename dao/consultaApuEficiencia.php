<?php

include_once('db/db_RH.php');

ContadorApu();
function ContadorApu()
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT APU, SUM(CASE WHEN EstatusAsistencia >= 2 AND Evaluacion >= 6 THEN 1 ELSE 0 END) as Aprobados, SUM(CASE WHEN EstatusAsistencia >= 2 AND Evaluacion < 6 THEN 1 ELSE 0 END) as Reprobados FROM BitacoraCursos GROUP BY APU;");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));

}


?>