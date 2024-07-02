<?php

include_once('db/db_RH.php');

ContadorApu();

function ContadorApu()
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT *, CONCAT('<button class=\"btn btn-primary\" onclick=\"verFormato(\'', `Curso`, '\',\'', `Horario`, '\',\'', `Fecha`, '\')\">Ver</button>') as boton,CONCAT('<button class=\"btn btn-info\" onclick=\"generarCertificado(\'', `Curso`, '\',\'', `Horario`, '\',\'', `Fecha`, '\',\'',`IdBitacoraCurso`, '\',\'',`Nombre`, '\')\">Descargar</button>') as certificados FROM `BitacoraCursos` WHERE 1;");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>