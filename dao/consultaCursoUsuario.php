<?php

include_once('db/db_RH.php');

$Nomina=$_GET['nomina'];

ContadorApu($Nomina);

function ContadorApu($Nomina)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT * FROM `Cursos` where Nomina = '$Nomina';");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>