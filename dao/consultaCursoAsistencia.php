<?php

include_once('db/db_RH.php');

$Horario=$_GET['horario'];

ContadorApu($Horario);

function ContadorApu($Horario)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $horarioParts = explode(", ", $Horario);

    $Curso = trim($horarioParts[0]);
    $Fecha = trim($horarioParts[1]);
    $HorarioCurso = trim($horarioParts[2]);

    $datos = mysqli_query($conex, "SELECT * FROM `BitacoraCursos` WHERE `Curso`= '$Curso' and `Horario` = '$HorarioCurso' and `Fecha` = '$Fecha';");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>