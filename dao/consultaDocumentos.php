<?php

include_once('db/db_RH.php');

$Nombre=$_GET['nombre'];
ContadorApu($Nombre);

function ContadorApu($Nombre)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT * FROM `Documentacion_Instructores` where `NombreInstructor`='$Nombre';");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>