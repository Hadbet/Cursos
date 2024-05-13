<?php

include_once('db/db_RH.php');

ContadorApu();

function ContadorApu()
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT 
    IdBitacoraCurso, 
    Nomina, 
    Nombre, 
    FechaRegistro, 
    Curso, 
    Horario, 
    Fecha, 
    EstatusAsistencia, 
    Evaluacion, 
    APU, 
    ShiftLeader, 
    Supervisor, 
    Vigencia,
    CASE
        WHEN EstatusAsistencia = 0 AND Fecha < CURDATE() THEN '<span class=\"badge badge-pill badge-danger\">Falto</span>'
        WHEN EstatusAsistencia = 0 AND Fecha >= CURDATE() THEN '<span class=\"badge badge-pill badge-warning\">En proceso</span>'
        WHEN EstatusAsistencia = 1 THEN '<span class=\"badge badge-pill badge-info\">Asistio</span>'
        WHEN EstatusAsistencia = 2 AND Evaluacion < 6 THEN '<span class=\"badge badge-pill badge-danger\">Asistio</span>'
        WHEN EstatusAsistencia = 2 AND Evaluacion >= 6 THEN '<span class=\"badge badge-pill badge-success\">Aprobado</span>'
        WHEN EstatusAsistencia = 3 THEN '<span class=\"badge badge-pill badge-info\">Certificado entregado</span>'
        ELSE 'Estado desconocido'
    END as Estatus
FROM 
    BitacoraCursos
WHERE 1;");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>