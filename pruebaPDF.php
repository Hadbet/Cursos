<?php

include_once('db/db_RH.php');

// Contenido HTML del documento


$css=file_get_contents("css/pdf.css");


$Horario = '17:32 - 19:32';
$Curso = 'SAPITO';
$Fecha = '2024-04-01';

$con = new LocalConector();
$conex = $con->conectar();

$datos = mysqli_query($conex, "SELECT * FROM `BitacoraCursos` WHERE `Curso`= '$Curso' and `Horario` = '$Horario' and `Fecha` = '$Fecha' and EstatusAsistencia=1;");
echo "SELECT * FROM `BitacoraCursos` WHERE `Curso`= '$Curso' and `Horario` = '$Horario' and `Fecha` = '$Fecha' and EstatusAsistencia=1;";
$resultados = mysqli_fetch_all($datos, MYSQLI_ASSOC);
ob_start();
?>