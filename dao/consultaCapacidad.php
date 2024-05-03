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

    $datos = mysqli_query($conex, "SELECT (SELECT Capacidad FROM Cursos where NombreCurso = '$Curso' AND Horario = '$Horario' AND Fecha = '$Fecha') as Capacidad, COUNT(IdBitacoraCurso) as Contador FROM BitacoraCursos WHERE Curso = '$Curso' AND Horario = '$Horario' AND Fecha = '$Fecha';");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));

}


?>