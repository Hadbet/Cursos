<?php

include_once('db/db_RH.php');

ContadorApu();

function ContadorApu()
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` = 0) as Inasistencias, (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` <> 0) as Asistencias, (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` >= 2 and `Evaluacion` >= 6) as Aprovados, (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` >= 2 and `Evaluacion` < 6) as Reprovados FROM `BitacoraCursos` LIMIT 1;");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>