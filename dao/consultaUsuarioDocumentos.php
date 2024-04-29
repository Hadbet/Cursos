<?php

include_once('db/db_RH.php');

$Nombre=$_GET['nomina'];
$Horario=$_GET['horario'];
ContadorApu($Nombre,$Horario);

function ContadorApu($Nombre,$Horario)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT * FROM `Documentos_Operativos` WHERE `Nomina` = '$Nombre' and `IdCurso` = '$Horario'");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>