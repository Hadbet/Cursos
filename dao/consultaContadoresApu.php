<?php

include_once('db/db_RH.php');

ContadorApu();

function ContadorApu()
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT 

(SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` = 0 and APU like '%APU 1%') as InasistenciasApu1, (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` <> 0 and APU like '%APU 1%') as AsistenciasApu1, (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` >= 2 and `Evaluacion` >= 6 and APU like '%APU 1%') as AprovadosApu1, (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` >= 2 and `Evaluacion` < 6 and APU like '%APU 1%') as ReprovadosApu1,

(SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` = 0 and APU like '%APU 2%') as InasistenciasApu2, (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` <> 0 and APU like '%APU 2%') as AsistenciasApu2, (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` >= 2 and `Evaluacion` >= 6 and APU like '%APU 2%') as AprovadosApu2, (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` >= 2 and `Evaluacion` < 6 and APU like '%APU 2%') as ReprovadosApu2,

(SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` = 0 and APU like '%APU 3%') as InasistenciasApu3, (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` <> 0 and APU like '%APU 3%') as AsistenciasApu3, (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` >= 2 and `Evaluacion` >= 6 and APU like '%APU 3%') as AprovadosApu3, (SELECT COUNT(*) FROM `BitacoraCursos` WHERE `EstatusAsistencia` >= 2 and `Evaluacion` < 6 and APU like '%APU 3%') as ReprovadosApu3 

FROM `BitacoraCursos` LIMIT 1;");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>