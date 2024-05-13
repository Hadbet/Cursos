<?php

include_once('db/db_RH.php');

$Horario=$_GET['horario'];
$Curso=$_GET['curso'];
$Fecha=$_GET['fecha'];

ContadorApu($Horario,$Curso,$Fecha);
function ContadorApu($Horario,$Curso,$Fecha)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT YEAR(FechaRegistro) as Ano, MONTH(FechaRegistro) as Mes, SUM(TIMESTAMPDIFF(MINUTE, STR_TO_DATE(SUBSTRING_INDEX(Horario, ' - ', 1), '%H:%i'), STR_TO_DATE(SUBSTRING_INDEX(Horario, ' - ', -1), '%H:%i')) / 60) as TotalHorasCapacitacion FROM BitacoraCursos GROUP BY Ano, Mes ORDER BY Ano DESC, Mes DESC;");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));

}


?>